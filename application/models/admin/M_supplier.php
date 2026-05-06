<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_supplier extends CI_Model {

    private $table = 'suppliers';

    public function get_all() {
        return $this->db
            ->where('status', 'aktif')
            ->order_by('id_supplier', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_all_including_nonaktif() {
        return $this->db
            ->order_by('status', 'ASC')
            ->order_by('id_supplier', 'ASC')
            ->get($this->table)
            ->result_array();
    }

    public function get_by_id($id) {
        return $this->db->get_where($this->table, ['id_supplier' => $id])->row_array();
    }

    public function kode_exists($kode) {
        return $this->db->get_where($this->table, ['kode_supplier' => $kode])->num_rows() > 0;
    }

    public function kode_exists_except($kode, $id) {
        $this->db->where('kode_supplier', $kode);
        $this->db->where('id_supplier !=', $id);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    public function insert($data) {
        return $this->db->insert($this->table, $data);  
    }

    public function update($id, $data) {
        $this->db->where('id_supplier', $id);
        return $this->db->update($this->table, $data);
    }

    public function delete($id) {
        return $this->db->delete($this->table, ['id_supplier' => $id]);
    }

    // Cek apakah supplier masih punya transaksi di tabel purchases
    public function has_transaksi($id) {
        return $this->db
            ->where('id_supplier', $id)
            ->count_all_results('purchases') > 0;
    }

    // Soft delete: ubah status menjadi nonaktif
    public function nonaktifkan($id) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->update($this->table, [
            'status'     => 'nonaktif',
            'updated_at' => date('Y-m-d H:i:s'),
        ], ['id_supplier' => $id]);
    }

    // Aktifkan kembali supplier yang nonaktif
    public function aktifkan($id) {
        date_default_timezone_set('Asia/Jakarta');
        return $this->db->update($this->table, [
            'status'     => 'aktif',
            'updated_at' => date('Y-m-d H:i:s'),
        ], ['id_supplier' => $id]);
    }

    public function count_all() {
        return $this->db->count_all($this->table);
    }

    public function count_aktif() {
        return $this->db->where('status', 'aktif')->count_all_results($this->table);
    }

    public function count_nonaktif() {
        return $this->db->where('status', 'nonaktif')->count_all_results($this->table);
    }

    // Generate kode otomatis: SUP-001, SUP-002, dst
    // Pakai COUNT bukan MAX supaya tidak loncat kalau ada data yang dihapus
    public function generate_kode() {
        $count = $this->db->count_all($this->table);
        $next  = $count + 1;
        // Pastikan kode tidak bentrok (loop jika sudah ada)
        $kode = 'SUP-' . str_pad($next, 3, '0', STR_PAD_LEFT);
        while ($this->kode_exists($kode)) {
            $next++;
            $kode = 'SUP-' . str_pad($next, 3, '0', STR_PAD_LEFT);
        }
        return $kode;
    }
}