<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_purchase extends CI_Model {

    private $tbl_header = 'purchases';
    private $tbl_detail = 'purchase_details';

    // ===== GET ALL (untuk list history) =====
    public function get_all() {
        return $this->db
            ->select('p.*, s.nama_supplier, s.kode_supplier, u.username AS nama_kasir')
            ->from($this->tbl_header . ' p')
            ->join('suppliers s', 's.id_supplier = p.id_supplier', 'left')
            ->join('users u',    'u.id_user = p.id_user',         'left')
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

    // ===== SIMPAN TRANSAKSI (ATOMIC) =====
    // Melakukan 3 operasi sekaligus:
    // 1. Insert header ke purchases
    // 2. Insert rows ke purchase_details
    // 3. Update stok di products
    // Jika salah satu gagal, semua di-rollback
    public function simpan_transaksi($header, $items) {
        $this->db->trans_start();

        // 1. Insert header
        $this->db->insert($this->tbl_header, $header);
        $id_purchase = $this->db->insert_id();

        // 2. Insert detail + update stok per item
        foreach ($items as $item) {
            $subtotal = $item['qty'] * $item['purchase_price'];
            $this->db->insert($this->tbl_detail, [
                'id_purchase'    => $id_purchase,
                'id_product'     => $item['id_product'],
                'qty'            => $item['qty'],
                'purchase_price' => $item['purchase_price'],
                'subtotal'       => $subtotal,
            ]);

            // 3. Update stok otomatis: stok_baru = stok_lama + qty_masuk
            $this->db->set('stok', 'stok + ' . (int)$item['qty'], FALSE);
            $this->db->where('id_product', $item['id_product']);
            $this->db->update('products');
        }

        $this->db->trans_complete();

        // Kembalikan id_purchase jika sukses, FALSE jika gagal
        return $this->db->trans_status() ? $id_purchase : FALSE;
    }

    // ===== HAPUS TRANSAKSI (ATOMIC) =====
    // Rollback stok sebelum hapus
    public function hapus_transaksi($id_purchase) {
        $this->db->trans_start();

        // Ambil detail dulu untuk rollback stok
        $details = $this->get_detail($id_purchase);
        foreach ($details as $d) {
            $this->db->set('stok', 'stok - ' . (int)$d['qty'], FALSE);
            $this->db->where('id_product', $d['id_product']);
            $this->db->update('products');
        }

        // Hapus detail
        $this->db->delete($this->tbl_detail, ['id_purchase' => $id_purchase]);

        // Hapus header
        $this->db->delete($this->tbl_header, ['id_purchase' => $id_purchase]);

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