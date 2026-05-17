<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
    private $table = 'products';

    // Join dengan categories untuk dapat nama_kategori
    // Hanya produk aktif (untuk tampilan umum & form transaksi)
    public function get_all() {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.status', 'aktif')
            ->order_by('p.id_product', 'ASC')
            ->get()->result_array();
    }

    // Semua produk (aktif + nonaktif) untuk halaman admin kelola produk
    public function get_all_including_nonaktif() {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->order_by('p.status', 'ASC')
            ->order_by('p.id_product', 'ASC')
            ->get()->result_array();
    }

    public function get_by_category($id_category) {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.id_category', $id_category)
            ->where('p.status', 'aktif')
            ->order_by('p.id_product', 'ASC')
            ->get()->result_array();
    }

    // Termasuk nonaktif (untuk halaman admin kelola produk + filter)
    public function get_by_category_including_nonaktif($id_category) {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.id_category', $id_category)
            ->order_by('p.status', 'ASC')
            ->order_by('p.id_product', 'ASC')
            ->get()->result_array();
    }

    public function get_by_id($id) {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.id_product', $id)
            ->get()->row_array();
    }

    public function count_by_category($id_category) {
        return $this->db->get_where($this->table, ['id_category' => $id_category])->num_rows();
    }

    // Produk stok menipis (untuk dashboard)
    public function get_stok_menipis($batas = 10) {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.stok <=', $batas)
            ->where('p.status', 'aktif')
            ->order_by('p.stok', 'ASC')
            ->get()->result_array();
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id_product', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_product' => $id]);
    }

    // ===== CEK RELASI TRANSAKSI =====
    // Cek apakah produk ini pernah muncul di sale_details atau purchase_details
    public function has_transaksi($id) {
        // Cek tabel sale_details (penjualan)
        if ($this->db->where('id_product', $id)->count_all_results('sale_details') > 0) return true;
        // Cek tabel purchase_details (barang masuk)
        if ($this->db->where('id_product', $id)->count_all_results('purchase_details') > 0) return true;
        return false;
    }

    // ===== SOFT DELETE: NONAKTIFKAN =====
    public function nonaktifkan($id) {
        return $this->db->update($this->table, [
            'status' => 'nonaktif'
        ], ['id_product' => $id]);
    }

    // ===== AKTIFKAN KEMBALI =====
    public function aktifkan($id) {
        return $this->db->update($this->table, [
            'status' => 'aktif'
        ], ['id_product' => $id]);
    }

    // ===== HITUNG PRODUK BERDASARKAN STATUS =====
    public function count_aktif() {
        return $this->db->where('status', 'aktif')->count_all_results($this->table);
    }

    public function count_nonaktif() {
        return $this->db->where('status', 'nonaktif')->count_all_results($this->table);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    // Produk yang harga jualnya di bawah/sama dengan harga beli (potensi rugi)
    public function get_jual_dibawah_modal() {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.harga_jual <=', 'p.harga_beli', FALSE)
            ->where('p.harga_beli >', 0)
            ->order_by('p.nama_produk', 'ASC')
            ->get()->result_array();
    }

    // ===== LOG PERUBAHAN STOK (AUDIT TRAIL) =====
    // Mencatat setiap perubahan stok manual ke tabel stok_log
    // agar dapat dilacak siapa mengubah, kapan, dari berapa ke berapa
    public function log_stok_change($id_product, $id_user, $stok_sebelum, $stok_sesudah, $keterangan = null) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->insert('stok_log', [
            'id_product'   => $id_product,
            'id_user'      => $id_user,
            'stok_sebelum' => $stok_sebelum,
            'stok_sesudah' => $stok_sesudah,
            'selisih'      => $stok_sesudah - $stok_sebelum,
            'keterangan'   => $keterangan,
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    // ===== LOG PERUBAHAN HARGA =====
    public function log_harga_change($id_product, $id_user, $tipe_harga, $harga_lama, $harga_baru, $keterangan = null) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->insert('harga_log', [
            'id_product'   => $id_product,
            'id_user'      => $id_user,
            'tipe_harga'   => $tipe_harga,
            'harga_lama'   => $harga_lama,
            'harga_baru'   => $harga_baru,
            'keterangan'   => $keterangan,
            'created_at'   => date('Y-m-d H:i:s'),
        ]);
    }

    public function get_riwayat_harga($id_product) {
        return $this->db
            ->select('h.*, u.username as nama_user')
            ->from('harga_log h')
            ->join('users u', 'u.id_user = h.id_user', 'left')
            ->where('h.id_product', $id_product)
            ->order_by('h.created_at', 'DESC')
            ->get()->result_array();
    }

    // ===== GENERATE KODE PRODUK =====
    public function generate_kode($id_category) {
        // Ambil nama kategori
        $this->db->select('nama_kategori');
        $this->db->where('id_category', $id_category);
        $kategori = $this->db->get('categories')->row_array();
        
        $prefix = 'UMU';
        if ($kategori && !empty($kategori['nama_kategori'])) {
            $prefix = strtoupper(substr(preg_replace('/[^A-Za-z]/', '', $kategori['nama_kategori']), 0, 3));
            if (strlen($prefix) < 3) {
                $prefix = str_pad($prefix, 3, 'X');
            }
        }

        // Cari urutan terakhir untuk kategori ini
        $this->db->select('kode_produk');
        $this->db->like('kode_produk', $prefix . '-', 'after');
        $this->db->order_by('CAST(SUBSTRING(kode_produk, 5) AS UNSIGNED)', 'DESC');
        $this->db->limit(1);
        $last_product = $this->db->get($this->table)->row_array();

        if ($last_product && !empty($last_product['kode_produk'])) {
            $last_number = (int) substr($last_product['kode_produk'], 4);
            $next_number = $last_number + 1;
        } else {
            // Hitung semua produk di kategori ini jika tidak ada yang pakai prefix (fallback)
            $count = $this->count_by_category($id_category);
            $next_number = $count + 1;
        }

        return $prefix . '-' . str_pad($next_number, 4, '0', STR_PAD_LEFT);
    }
}