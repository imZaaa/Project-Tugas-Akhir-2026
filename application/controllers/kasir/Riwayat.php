<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Riwayat extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_sale');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin/penjualan');
            return;
        }
    }

    // ===== HALAMAN RIWAYAT TRANSAKSI =====
    public function index() {
        date_default_timezone_set('Asia/Jakarta');

        $id_user = $this->session->userdata('id_user');

        $data['title'] = 'Riwayat Transaksi | PT Pordjo';
        $data['sales'] = $this->M_sale->get_by_kasir($id_user); // semua trx (DESC)

        // Stats
        $data['total_trx'] = count($data['sales']);
        $trx_lunas = array_filter($data['sales'], fn($s) => ($s['status'] ?? '') === 'Lunas');
        $data['total_lunas'] = count($trx_lunas);
        $data['total_omzet'] = array_sum(array_column($trx_lunas, 'total_harga'));

        // Transaksi hari ini
        $today = date('Y-m-d');
        $trx_today = array_filter($data['sales'], fn($s) => date('Y-m-d', strtotime($s['tgl_jual'])) === $today);
        $data['trx_hari_ini'] = count($trx_today);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_riwayat', $data);
        $this->load->view('layout/footer');
    }

    // ===== DETAIL — redirect ke penjualan detail =====
    public function detail($id_sale) {
        redirect('kasir/penjualan/detail/' . $id_sale);
    }
}
