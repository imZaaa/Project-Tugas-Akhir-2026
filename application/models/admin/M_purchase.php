<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_purchase extends CI_Model {

    private $tbl_header = 'purchases';
    private $tbl_detail = 'purchase_details';

    // ===== GET ALL (untuk list history — semua user, admin scope) =====
    public function get_all() {
        return $this->db
            ->select('p.*, s.nama_supplier, s.kode_supplier, u.username AS nama_kasir')
            ->from($this->tbl_header . ' p')
            ->join('suppliers s', 's.id_supplier = p.id_supplier', 'left')
            ->join('users u',    'u.id_user = p.id_user',         'left')
            ->order_by('p.created_at', 'DESC')
            ->get()->result_array();
    }

    // ===== GET BY USER (hanya data milik kasir tertentu) =====
    public function get_by_user($id_user) {
        return $this->db
            ->select('p.*, s.nama_supplier, s.kode_supplier, u.username AS nama_kasir')
            ->from($this->tbl_header . ' p')
            ->join('suppliers s', 's.id_supplier = p.id_supplier', 'left')
            ->join('users u',    'u.id_user = p.id_user',         'left')
            ->where('p.id_user', $id_user)
            ->order_by('p.created_at', 'DESC')
            ->get()->result_array();
    }

    // ===== GET DETAIL BY ID_PURCHASE =====
    public function get_detail($id_purchase) {
        return $this->db
            ->select('pd.*, pr.nama_produk, pr.satuan, c.nama_kategori')
            ->from($this->tbl_detail . ' pd')
            ->join('products pr',    'pr.id_product  = pd.id_product',   'left')
            ->join('categories c',   'c.id_category  = pr.id_category',  'left')
            ->where('pd.id_purchase', $id_purchase)
            ->get()->result_array();
    }

    // ===== GET HEADER BY ID =====
    public function get_by_id($id_purchase) {
        return $this->db
            ->select('p.*, s.nama_supplier, s.kode_supplier, u.username AS nama_kasir')
            ->from($this->tbl_header . ' p')
            ->join('suppliers s', 's.id_supplier = p.id_supplier', 'left')
            ->join('users u',    'u.id_user = p.id_user',         'left')
            ->where('p.id_purchase', $id_purchase)
            ->get()->row_array();
    }

    // ===== CEK NO FAKTUR DUPLIKAT =====
    public function faktur_exists($no_faktur) {
        return $this->db->get_where($this->tbl_header, ['no_faktur' => $no_faktur])->num_rows() > 0;
    }

    // ===== GENERATE NO FAKTUR OTOMATIS =====
    public function generate_no_faktur() {
        date_default_timezone_set('Asia/Jakarta');
        $prefix = 'BMK-' . date('Ymd') . '-';
        $this->db->like('no_faktur', $prefix, 'after');
        $count = $this->db->count_all_results($this->tbl_header);
        $next  = $count + 1;
        $no    = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
        // Pastikan tidak bentrok
        while ($this->faktur_exists($no)) {
            $next++;
            $no = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
        }
        return $no;
    }

    // ===== SIMPAN TRANSAKSI BARANG MASUK (ATOMIC OPERATION) =====
    // Keterangan: Sama krusialnya dengan Penjualan, ini adalah jantung kulakan (restock).
    // Kenapa Atomic? Karena ada 3 operasi database yang tidak boleh gagal di tengah jalan:
    // 1. Simpan nota pembelian (header)
    // 2. Simpan daftar barang yang masuk (detail)
    // 3. Tambahkan stok barang tersebut ke master produk (restocking otomatis)
    // Jika mati lampu saat simpan barang ke-3, maka barang 1 dan 2 akan dibatalkan (rollback).
    public function simpan_transaksi($header, $items) {
        // [1] MULAI KUNCI TRANSAKSI
        $this->db->trans_start();

        // [2] SIMPAN NOTA UTAMA (Faktur, Tanggal, Supplier, Total Bayar)
        $this->db->insert($this->tbl_header, $header);
        
        // Ambil ID Nota/Faktur yang baru saja tercipta untuk disematkan ke  barang-barangnya
        $id_purchase = $this->db->insert_id();

        // [3] PROSES DAFTAR BARANG SATU PER SATU
        foreach ($items as $item) {
            // Hitung subtotal harga beli (Modal Beli x Jumlah Masuk)
            $subtotal = $item['qty'] * $item['purchase_price'];
            
            // Simpan setiap item ke "keranjang/detail barang masuk" milik nota di atas
            $this->db->insert($this->tbl_detail, [
                'id_purchase'    => $id_purchase,
                'id_product'     => $item['id_product'],
                'qty'            => $item['qty'],
                'purchase_price' => $item['purchase_price'], // Merekam riwayat harga modal
                'subtotal'       => $subtotal,
            ]);

            // [4] PERHITUNGAN AVERAGE COST & PENAMBAHAN STOK OTOMATIS KE GUDANG UTAMA
            // Ambil data produk lama terlebih dahulu untuk mendapat stok lama dan harga beli lama
            $produk_lama = $this->db->get_where('products', ['id_product' => $item['id_product']])->row_array();
            if ($produk_lama) {
                $stok_lama = (int)$produk_lama['stok'];
                $harga_beli_lama = (float)$produk_lama['harga_beli'];
                
                $qty_masuk = (int)$item['qty'];
                $harga_beli_masuk = (float)$item['purchase_price'];
                
                $stok_baru = $stok_lama + $qty_masuk;
                
                // Rumus Average Cost: [(Stok Lama x Modal Lama) + (Stok Baru x Modal Baru)] / Total Stok Baru
                if ($stok_baru > 0) {
                    $total_nilai_lama = $stok_lama * $harga_beli_lama;
                    $total_nilai_masuk = $qty_masuk * $harga_beli_masuk;
                    $harga_beli_rata2 = ($total_nilai_lama + $total_nilai_masuk) / $stok_baru;
                } else {
                    $harga_beli_rata2 = $harga_beli_masuk; // Fallback jika stok aneh
                }
                
                // Update tabel produk dengan stok baru dan modal rata-rata baru
                $this->db->update('products', [
                    'stok' => $stok_baru,
                    'harga_beli' => round($harga_beli_rata2)
                ], ['id_product' => $item['id_product']]);
            }
        }

        // [5] TUTUP TRANSAKSI (Evaluasi apakah sukses total atau ada error query)
        $this->db->trans_complete();

        // Jika trans_status TRUE, kirimkan ID-nya kembali ke Controller untuk dialihkan halamannya
        return $this->db->trans_status() ? $id_purchase : FALSE;
    }

    // ===== HAPUS TRANSAKSI BARANG MASUK (ATOMIC OPERATION) =====
    // Keterangan: Saat admin salah input faktur dan mau menghapusnya, sistem harus cerdas.
    // Tidak boleh asal hapus histori, stok yang tadinya masuk HARUS ditarik kembali (dikurangi)
    public function hapus_transaksi($id_purchase) {
        // [1] MULAI TRANSAKSI KUNCI DATABASE JAGA-JAGA ERROR
        $this->db->trans_start();

        // [2] AMBIL RIWAYAT BARANG YANG MASUK SAAT FAKTUR INI DIBUAT
        $details = $this->get_detail($id_purchase);
        
        foreach ($details as $d) {
            // [3] TARIK KEMBALI STOK GUDANG (Kurangi)
            // Karena fakturnya dibatalkan, anggap barangnya ditarik lagi ke luar pabrik
            $this->db->set('stok', 'stok - ' . (int)$d['qty'], FALSE);
            $this->db->where('id_product', $d['id_product']);
            $this->db->update('products');
        }

        // [4] HAPUS KERANJANG DETAIL (Wajib hapus "anaknya" dulu sebelum hapus "induknya")
        $this->db->delete($this->tbl_detail, ['id_purchase' => $id_purchase]);

        // [5] BARULAH HAPUS NOTA INDUK
        $this->db->delete($this->tbl_header, ['id_purchase' => $id_purchase]);

        // Kunci dan selesaikan
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    // ===== STAT UNTUK DASHBOARD =====

    // Ambil semua transaksi barang masuk HARI INI (untuk monitoring real-time)
    // Hasilnya: array of purchases beserta supplier & nama user yang input
    public function get_today() {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->select('p.id_purchase, p.no_faktur, p.created_at, p.total_bayar, s.nama_supplier, u.username AS nama_input')
            ->from($this->tbl_header . ' p')
            ->join('suppliers s', 's.id_supplier = p.id_supplier', 'left')
            ->join('users u',    'u.id_user = p.id_user',          'left')
            ->where('DATE(p.created_at)', date('Y-m-d'))
            ->order_by('p.created_at', 'DESC')
            ->get()->result_array();
    }

    // Hitung total item/produk yang masuk hari ini (dari purchase_details)
    public function count_today_items() {
        date_default_timezone_set('Asia/Jakarta');
        $row = $this->db
            ->select_sum('pd.qty')
            ->from($this->tbl_detail . ' pd')
            ->join($this->tbl_header . ' p', 'p.id_purchase = pd.id_purchase', 'inner')
            ->where('DATE(p.created_at)', date('Y-m-d'))
            ->get()->row_array();
        return (int)($row['qty'] ?? 0);
    }

    // Ambil detail semua item yang masuk hari ini (untuk card monitoring)
    public function get_today_items() {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->select('pd.qty, pd.purchase_price, pd.subtotal, pr.nama_produk, pr.satuan, c.nama_kategori, p.no_faktur, p.created_at, s.nama_supplier')
            ->from($this->tbl_detail . ' pd')
            ->join($this->tbl_header . ' p', 'p.id_purchase = pd.id_purchase', 'inner')
            ->join('products pr',   'pr.id_product  = pd.id_product',  'left')
            ->join('categories c',  'c.id_category  = pr.id_category', 'left')
            ->join('suppliers s',   's.id_supplier  = p.id_supplier',  'left')
            ->where('DATE(p.created_at)', date('Y-m-d'))
            ->order_by('p.created_at', 'DESC')
            ->get()->result_array();
    }

    public function count_hari_ini() {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->where('DATE(created_at)', date('Y-m-d'))
            ->count_all_results($this->tbl_header);
    }

    public function total_bulan_ini() {
        date_default_timezone_set('Asia/Jakarta');
        $row = $this->db
            ->select_sum('total_bayar')
            ->where('MONTH(created_at)', date('m'))
            ->where('YEAR(created_at)', date('Y'))
            ->get($this->tbl_header)->row_array();
        return $row['total_bayar'] ?? 0;
    }
}