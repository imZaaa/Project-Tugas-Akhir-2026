<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_users');

        // Cek login & hanya admin yang boleh akses
        if (!$this->session->userdata('logged_in')) {
            redirect('auth');
        }
        if ($this->session->userdata('role') !== 'admin') {
            // Kasir tidak boleh akses halaman ini
            $this->session->set_flashdata('error', 'Anda tidak memiliki akses ke halaman ini.');
            redirect('kasir');
        }
    }

    // ===== INDEX — tampilkan semua user =====
    public function index() {
        $data['title'] = 'Kelola Akun | PT Pordjo';
        $data['users'] = $this->M_users->get_all_users();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_users', $data);
        $this->load->view('layout/footer');
    }

    // ===== TAMBAH USER =====
    public function tambah() {
        $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
        $username     = $this->input->post('username', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);

        // Validasi kosong
        if (empty($nama_lengkap) || empty($username) || empty($password) || empty($role)) {
            $this->session->set_flashdata('error', 'Semua field wajib diisi!');
            redirect('admin/users');
            return;
        }

        // Cek username sudah ada
        if ($this->M_users->username_exists($username)) {
            $this->session->set_flashdata('error', 'Username "' . $username . '" sudah digunakan!');
            redirect('admin/users');
            return;
        }

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'username'     => $username,
            'password'     => $password, // plain text sesuai sistem yang sudah ada
            'role'         => $role,
            'created_at'   => date('Y-m-d H:i:s'),
        ];

        if ($this->M_users->insert_user($data)) {
            $this->session->set_flashdata('success', 'User "' . $nama_lengkap . '" berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan user. Coba lagi.');
        }

        redirect('admin/users');
    }

    // ===== UPDATE USER =====
    public function update() {
        $id_user      = $this->input->post('id_user', TRUE);
        $nama_lengkap = $this->input->post('nama_lengkap', TRUE);
        $username     = $this->input->post('username', TRUE);
        $password     = $this->input->post('password', TRUE);
        $role         = $this->input->post('role', TRUE);

        if (empty($id_user) || empty($nama_lengkap) || empty($username) || empty($role)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap!');
            redirect('admin/users');
            return;
        }

        // Cek username sudah ada di user LAIN
        if ($this->M_users->username_exists_except($username, $id_user)) {
            $this->session->set_flashdata('error', 'Username "' . $username . '" sudah digunakan oleh user lain!');
            redirect('admin/users');
            return;
        }

        $data = [
            'nama_lengkap' => $nama_lengkap,
            'username'     => $username,
            'role'         => $role,
        ];

        // Hanya update password jika diisi
        if (!empty($password)) {
            $data['password'] = $password;
        }

        if ($this->M_users->update_user($id_user, $data)) {
            $this->session->set_flashdata('success', 'User "' . $nama_lengkap . '" berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui user.');
        }

        redirect('admin/users');
    }

    // ===== HAPUS USER =====
    public function hapus() {
        $id_user = $this->input->post('id_user', TRUE);

        // Tidak boleh hapus diri sendiri
        if ($id_user == $this->session->userdata('id_user')) {
            $this->session->set_flashdata('error', 'Tidak dapat menghapus akun yang sedang digunakan!');
            redirect('admin/users');
            return;
        }

        if ($this->M_users->delete_user($id_user)) {
            $this->session->set_flashdata('success', 'User berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus user.');
        }

        redirect('admin/users');
    }
}