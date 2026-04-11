<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
    private $table = 'products';

    // Join dengan categories untuk dapat nama_kategori
    public function get_all() {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->order_by('p.id_product', 'ASC')
            ->get()->result_array();
    }

    public function get_by_category($id_category) {
        return $this->db
            ->select('p.*, c.nama_kategori')
            ->from($this->table . ' p')
            ->join('categories c', 'c.id_category = p.id_category', 'left')
            ->where('p.id_category', $id_category)
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

    public function count_all() {
        return $this->db->count_all($this->table);
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
}