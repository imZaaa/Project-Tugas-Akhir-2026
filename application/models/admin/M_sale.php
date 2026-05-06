<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sale extends CI_Model {

    private $tbl_header = 'sales';
    private $tbl_detail = 'sale_details';

    // ===== GET TERBARU UNTUK DASHBOARD =====
    public function get_terbaru($limit = 10) {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, u.username AS nama_kasir')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('s.status', 'Lunas')
            ->order_by('s.tgl_jual', 'DESC')
            ->limit($limit)
            ->get()->result_array();
    }

    // ===== GET ALL (admin — audit trail semua kasir) =====
    public function get_all() {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at, u.username AS nama_kasir')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->order_by('s.created_at', 'DESC')
            ->get()->result_array();
    }

    // ===== GET BY KASIR (kasir — hanya milik sendiri) =====
    public function get_by_kasir($id_user) {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at, u.username AS nama_kasir')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('s.id_user', $id_user)
            ->order_by('s.created_at', 'DESC')
            ->get()->result_array();
    }

    // ===== GET TODAY BY KASIR (dashboard kasir) =====
    public function get_today_by_kasir($id_user) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at, u.username AS nama_kasir')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('s.id_user', $id_user)
            ->where('DATE(s.tgl_jual)', date('Y-m-d'))
            ->order_by('s.tgl_jual', 'DESC')
            ->get()->result_array();
    }

    // ===== GET HEADER BY ID =====
    public function get_by_id($id_sale) {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.nama_pelanggan, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at, u.username AS nama_kasir, u.id_user')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('s.id_sale', $id_sale)
            ->get()->row_array();
    }

    // ===== GET DETAIL BY ID_SALE =====
    public function get_detail($id_sale) {
        return $this->db
            ->select('sd.id_detail, sd.id_sale, sd.id_product, sd.qty, sd.harga_jual, sd.subtotal, p.nama_produk, p.satuan, c.nama_kategori')
            ->from($this->tbl_detail . ' sd')
            ->join('products p',   'p.id_product  = sd.id_product',  'left')
            ->join('categories c', 'c.id_category = p.id_category',  'left')
            ->where('sd.id_sale', $id_sale)
            ->get()->result_array();
    }

    // ===== GENERATE KODE TRANSAKSI =====
    public function generate_kode() {
        date_default_timezone_set('Asia/Jakarta');
        $prefix = 'TRX-' . date('Ymd') . '-';
        $this->db->like('kode_transaksi', $prefix, 'after');
        $count = $this->db->count_all_results($this->tbl_header);
        $next  = $count + 1;
        $kode  = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
        while ($this->kode_exists($kode)) {
            $next++;
            $kode = $prefix . str_pad($next, 3, '0', STR_PAD_LEFT);
        }
        return $kode;
    }

    public function kode_exists($kode) {
        return $this->db->get_where($this->tbl_header, ['kode_transaksi' => $kode])->num_rows() > 0;
    }

    // ===== SIMPAN TRANSAKSI (ATOMIC OPERATION) =====
    // Keterangan: Fungsi ini adalah kunci utama Modul Penjualan (Jantung POS).
    // Kenapa dipanggil 'Atomic'? Karena menggunakan Database Transaction (trans_start & trans_complete).
    // Artinya: Jika ada yang gagal/error di tengah-tengah foreach (misal produk ke-5 error), 
    // maka produk ke 1-4 dan nota akan dibatalkan/dihapus otomatis oleh database dengan rollback.
    public function simpan_transaksi($header, $items) {
        // [1] MULAI TRANSAKSI KUNCI DATABASE (Mencegah data separuh-masuk saat mati lampu/error)
        $this->db->trans_start();

        // [2] SIMPAN HEADER KE TABEL SALES
        // Menyimpan data umum struk belanja: tanggal, kasir, total belanja, dan kembalian
        $this->db->insert($this->tbl_header, $header);
        
        // $id_sale ini digenerate otomatis berdasarkan nomor Auto Increment dari tabel sales yang baru masuk
        // Berguna untuk mengikat data barang belanjaan (detail) dengan struk/notanya 
        $id_sale = $this->db->insert_id();

        // [3] PROSES DAFTAR BARANG YANG DIBELI (Bisa puluhan barang dlm 1 nota)
        foreach ($items as $item) {
            
            // Hitung harga asli dikali jumlah (qty) agar punya rekaman subtotal untuk auditing
            $subtotal = (int)$item['qty'] * (float)$item['harga_jual'];
            
            // Insert produk ke tabel 'sale_details' (keranjang per-nota)
            $this->db->insert($this->tbl_detail, [
                'id_sale'    => $id_sale, // Diikat dengan nomor urut struk utama
                'id_product' => $item['id_product'],
                'qty'        => (int)$item['qty'],
                'harga_jual' => (float)$item['harga_jual'],
                'subtotal'   => (int)$subtotal,
            ]);

            // [4] AUTOMATIC STOCK DEDUCTION (Pengurangan Stok Otomatis)
            // Tanpa perlu mengambil sisa stok ke PHP, kita set langsung secara matematika di MySQL
            // Menggunakan FALSE di parameter ketiga agar codeigniter tidak memanipulasi string "stok -"
            $this->db->set('stok', 'stok - ' . (int)$item['qty'], FALSE);
            $this->db->where('id_product', $item['id_product']);
            $this->db->update('products'); // eksekusi: UPDATE products SET stok = stok - qty WHERE id_product = X
        }

        // [5] TUTUP TRANSAKSI DATABASE KUNCI (Jika sampai sini dengan selamat, COMMIT datanya)
        $this->db->trans_complete();
        
        // Cek apakah transaksinya berstatus TRUE (sukses keseluruhan tanpa ada tabel tersedak error)
        return $this->db->trans_status() ? $id_sale : FALSE;
    }

    // ===== VOID TRANSAKSI (admin only — rollback stok, ubah status jadi Batal) =====
    public function void_transaksi($id_sale) {
        $this->db->trans_start();

        $details = $this->get_detail($id_sale);
        foreach ($details as $d) {
            $this->db->set('stok', 'stok + ' . (int)$d['qty'], FALSE);
            $this->db->where('id_product', $d['id_product']);
            $this->db->update('products');
        }

        // Update status → Batal, bukan hapus (untuk audit trail)
        $this->db->update($this->tbl_header, ['status' => 'Batal'], ['id_sale' => $id_sale]);

        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    // ===== STATS =====
    public function omzet_hari_ini() {
        date_default_timezone_set('Asia/Jakarta');
        $row = $this->db->select_sum('total_harga')
            ->where('DATE(tgl_jual)', date('Y-m-d'))
            ->where('status', 'Lunas')
            ->get($this->tbl_header)->row_array();
        return $row['total_harga'] ?? 0;
    }

    public function count_hari_ini() {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->where('DATE(tgl_jual)', date('Y-m-d'))
            ->where('status', 'Lunas')
            ->count_all_results($this->tbl_header);
    }

    public function omzet_by_kasir_hari_ini($id_user) {
        date_default_timezone_set('Asia/Jakarta');
        $row = $this->db->select_sum('total_harga')
            ->where('id_user', $id_user)
            ->where('DATE(tgl_jual)', date('Y-m-d'))
            ->where('status', 'Lunas')
            ->get($this->tbl_header)->row_array();
        return $row['total_harga'] ?? 0;
    }

    public function count_by_kasir_hari_ini($id_user) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db
            ->where('id_user', $id_user)
            ->where('DATE(tgl_jual)', date('Y-m-d'))
            ->where('status', 'Lunas')
            ->count_all_results($this->tbl_header);
    }

    // Chart 7 hari terakhir (admin dashboard) — jumlah transaksi per hari
    public function omzet_7_hari() {
        date_default_timezone_set('Asia/Jakarta');
        $result = [];
        for ($i = 6; $i >= 0; $i--) {
            $tgl = date('Y-m-d', strtotime("-$i days"));
            $count = $this->db->where('DATE(tgl_jual)', $tgl)
                ->where('status', 'Lunas')
                ->count_all_results($this->tbl_header);
            $result[] = [
                'tanggal' => $tgl,
                'label'   => date('d M', strtotime($tgl)),
                'total'   => (int)$count,
            ];
        }
        return $result;
    }

    // ===== LAPORAN: GET TRANSAKSI BY DATE RANGE =====
    public function get_laporan($tgl_awal, $tgl_akhir) {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at, u.username AS nama_kasir')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('DATE(s.tgl_jual) >=', $tgl_awal)
            ->where('DATE(s.tgl_jual) <=', $tgl_akhir)
            ->where('s.status', 'Lunas')
            ->order_by('s.tgl_jual', 'DESC')
            ->get()->result_array();
    }

    // ===== LAPORAN: OMZET BY DATE RANGE =====
    public function omzet_by_range($tgl_awal, $tgl_akhir) {
        $row = $this->db->select_sum('total_harga')
            ->where('DATE(tgl_jual) >=', $tgl_awal)
            ->where('DATE(tgl_jual) <=', $tgl_akhir)
            ->where('status', 'Lunas')
            ->get($this->tbl_header)->row_array();
        return (float)($row['total_harga'] ?? 0);
    }

    // ===== LAPORAN: COUNT TRANSAKSI BY DATE RANGE =====
    public function count_by_range($tgl_awal, $tgl_akhir) {
        return $this->db
            ->where('DATE(tgl_jual) >=', $tgl_awal)
            ->where('DATE(tgl_jual) <=', $tgl_akhir)
            ->where('status', 'Lunas')
            ->count_all_results($this->tbl_header);
    }

    // ===== LAPORAN: TOP PRODUK TERLARIS =====
    public function get_top_produk($tgl_awal, $tgl_akhir, $limit = 10) {
        return $this->db
            ->select('p.id_product, p.nama_produk, p.satuan, c.nama_kategori, SUM(sd.qty) AS total_qty, SUM(sd.subtotal) AS total_pendapatan')
            ->from($this->tbl_detail . ' sd')
            ->join($this->tbl_header . ' s', 's.id_sale = sd.id_sale')
            ->join('products p', 'p.id_product = sd.id_product', 'left')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('DATE(s.tgl_jual) >=', $tgl_awal)
            ->where('DATE(s.tgl_jual) <=', $tgl_akhir)
            ->where('s.status', 'Lunas')
            ->group_by('sd.id_product')
            ->order_by('total_qty', 'DESC')
            ->limit($limit)
            ->get()->result_array();
    }

    // ===== LAPORAN: OMZET PER HARI (chart) =====
    public function omzet_per_day($tgl_awal, $tgl_akhir) {
        return $this->db
            ->select("DATE(tgl_jual) AS tanggal, SUM(total_harga) AS total", FALSE)
            ->from($this->tbl_header)
            ->where('DATE(tgl_jual) >=', $tgl_awal)
            ->where('DATE(tgl_jual) <=', $tgl_akhir)
            ->where('status', 'Lunas')
            ->group_by('DATE(tgl_jual)')
            ->order_by('tanggal', 'ASC')
            ->get()->result_array();
    }

    // ===== LAPORAN: OMZET PER KASIR =====
    public function omzet_per_kasir($tgl_awal, $tgl_akhir) {
        return $this->db
            ->select('u.username AS nama_kasir, COUNT(s.id_sale) AS jumlah_trx, SUM(s.total_harga) AS total_omzet')
            ->from($this->tbl_header . ' s')
            ->join('users u', 'u.id_user = s.id_user', 'left')
            ->where('DATE(s.tgl_jual) >=', $tgl_awal)
            ->where('DATE(s.tgl_jual) <=', $tgl_akhir)
            ->where('s.status', 'Lunas')
            ->group_by('s.id_user')
            ->order_by('total_omzet', 'DESC')
            ->get()->result_array();
    }

    // ===== KASIR REPORT: TRANSAKSI BY DATE RANGE (filtered by kasir) =====
    public function get_laporan_kasir($id_user, $tgl_awal, $tgl_akhir) {
        return $this->db
            ->select('s.id_sale, s.kode_transaksi, s.tgl_jual, s.total_harga, s.bayar, s.kembalian, s.status, s.created_at')
            ->from($this->tbl_header . ' s')
            ->where('s.id_user', $id_user)
            ->where('DATE(s.tgl_jual) >=', $tgl_awal)
            ->where('DATE(s.tgl_jual) <=', $tgl_akhir)
            ->where('s.status', 'Lunas')
            ->order_by('s.tgl_jual', 'DESC')
            ->get()->result_array();
    }

    // ===== KASIR REPORT: OMZET BY DATE RANGE (filtered by kasir) =====
    public function omzet_kasir_range($id_user, $tgl_awal, $tgl_akhir) {
        $row = $this->db->select_sum('total_harga')
            ->where('id_user', $id_user)
            ->where('DATE(tgl_jual) >=', $tgl_awal)
            ->where('DATE(tgl_jual) <=', $tgl_akhir)
            ->where('status', 'Lunas')
            ->get($this->tbl_header)->row_array();
        return (float)($row['total_harga'] ?? 0);
    }

    // ===== KASIR REPORT: COUNT BY DATE RANGE (filtered by kasir) =====
    public function count_kasir_range($id_user, $tgl_awal, $tgl_akhir) {
        return $this->db
            ->where('id_user', $id_user)
            ->where('DATE(tgl_jual) >=', $tgl_awal)
            ->where('DATE(tgl_jual) <=', $tgl_akhir)
            ->where('status', 'Lunas')
            ->count_all_results($this->tbl_header);
    }

    // ===== KASIR REPORT: TOP PRODUK BY KASIR + DATE RANGE =====
    public function get_top_produk_kasir($id_user, $tgl_awal, $tgl_akhir, $limit = 10) {
        return $this->db
            ->select('p.id_product, p.nama_produk, p.satuan, c.nama_kategori, SUM(sd.qty) AS total_qty, SUM(sd.subtotal) AS total_pendapatan')
            ->from($this->tbl_detail . ' sd')
            ->join($this->tbl_header . ' s', 's.id_sale = sd.id_sale')
            ->join('products p', 'p.id_product = sd.id_product', 'left')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('s.id_user', $id_user)
            ->where('DATE(s.tgl_jual) >=', $tgl_awal)
            ->where('DATE(s.tgl_jual) <=', $tgl_akhir)
            ->where('s.status', 'Lunas')
            ->group_by('sd.id_product')
            ->order_by('total_qty', 'DESC')
            ->limit($limit)
            ->get()->result_array();
    }
}