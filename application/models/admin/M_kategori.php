<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kategori extends CI_Model {
    private $table = 'categories';

    public function get_all() {
        return $this->db->order_by('id_category', 'ASC')->get($this->table)->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_category' => $id])->row_array();
    }

    public function nama_exists($nama) {
        return $this->db->get_where($this->table, ['nama_kategori' => $nama])->num_rows() > 0;
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);
    }

    public function update($id, $data) {
        $this->db->where('id_category', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_category' => $id]);
    }
}