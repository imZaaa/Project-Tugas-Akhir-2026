<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_produk');
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin');
            return;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Kasir | PT Pordjo';

        // Data untuk Cek Stok
        $data['daftar_produk'] = $this->M_produk->get_stok_menipis(10);
        $all_produk = $this->M_produk->get_all();
        $data['produk_habis'] = array_filter($all_produk, fn($p) => (int)$p['stok'] === 0);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('layout/footer');
    }
}