<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_auth');
    }

    public function index() {
        // Kalau udah login, langsung tendang ke dashboard biar gak bisa buka halaman login lagi
        if ($this->session->userdata('role') == 'admin') {
            redirect('admin/admin'); 
        } elseif ($this->session->userdata('role') == 'kasir') {
            redirect('kasir/kasir'); 
        }
        
        $this->load->view('login');
    }

    public function proses() {
    $username = $this->input->post('username', TRUE);
    $password = $this->input->post('password', TRUE);

    $user = $this->M_auth->cek_login($username);

    if ($user) {
        // BANDINGIN LANGSUNG (TANPA HASH)
        if ($password == $user->password) {

         date_default_timezone_set('Asia/Jakarta');
            
            $session_data = array(
                'id_user'   => $user->id_user,
                'username'  => $user->username,
                'nama'      => $user->nama_lengkap,
                'role'      => $user->role,
                'logged_in' => TRUE,
                'login_time' => date('Y-m-d H:i')
            );
            $this->session->set_userdata($session_data);

            if ($user->role == 'admin') {
                redirect('admin/admin');
            } else {
                redirect('kasir');
            }
        } else {
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Password yang dimasukkan salah.</div>');
            redirect('auth');
        }
    } else {
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger">Username tidak ditemukan.</div>');
        redirect('auth');
    }
}

    public function logout() {
        // Hancurkan session saat logout
        $this->session->sess_destroy();
        redirect('auth');
    }
}