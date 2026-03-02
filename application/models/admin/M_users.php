<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_users extends CI_Model {

    private $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    // ===== GET SEMUA USER =====
    public function get_all_users() {
        return $this->db
            ->select('id_user, username, nama_lengkap, role, created_at')
            ->from($this->table)
            ->order_by('created_at', 'DESC')
            ->get()
            ->result_array();
    }

    // ===== GET USER BY ID =====
    public function get_user_by_id($id_user) {
        return $this->db
            ->get_where($this->table, ['id_user' => $id_user])
            ->row_array();
    }

    // ===== CEK USERNAME SUDAH ADA? =====
    public function username_exists($username) {
        return $this->db
            ->get_where($this->table, ['username' => $username])
            ->num_rows() > 0;
    }

    // ===== CEK USERNAME SUDAH ADA DI USER LAIN (untuk edit) =====
    public function username_exists_except($username, $id_user) {
        $this->db->where('username', $username);
        $this->db->where('id_user !=', $id_user);
        return $this->db->get($this->table)->num_rows() > 0;
    }

    // ===== INSERT USER BARU =====
    public function insert_user($data) {
        return $this->db->insert($this->table, $data);
    }

    // ===== UPDATE USER =====
    public function update_user($id_user, $data) {
        $this->db->where('id_user', $id_user);
        return $this->db->update($this->table, $data);
    }

    // ===== HAPUS USER =====
    public function delete_user($id_user) {
        return $this->db->delete($this->table, ['id_user' => $id_user]);
    }

    // ===== HITUNG USER BERDASARKAN ROLE =====
    public function count_by_role($role) {
        return $this->db->get_where($this->table, ['role' => $role])->num_rows();
    }
}