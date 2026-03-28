<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_produk');
        $this->load->model('admin/M_sale');
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin');
            return;
        }
    }

    public function index() {
        $data['title'] = 'Dashboard Kasir | PT Pordjo';
        $id_user = $this->session->userdata('id_user');

        // Stat cards — real data
        $data['my_trx_hari']   = $this->M_sale->count_by_kasir_hari_ini($id_user);
        $data['my_omzet_hari'] = $this->M_sale->omzet_by_kasir_hari_ini($id_user);

        // Total produk tersedia (stok > 0)
        $all_produk = $this->M_produk->get_all();
        $data['total_produk_tersedia'] = count(array_filter($all_produk, fn($p) => (int)$p['stok'] > 0));

        // Transaksi saya hari ini — real data with item counts
        $my_sales_today = $this->M_sale->get_today_by_kasir($id_user);
        foreach ($my_sales_today as &$s) {
            $details = $this->M_sale->get_detail($s['id_sale']);
            $s['jumlah_item'] = count($details);
        }
        unset($s);
        $data['my_transaksi_hari'] = $my_sales_today;

        // Data untuk Cek Stok
        $data['daftar_produk'] = $this->M_produk->get_stok_menipis(10);
        $data['produk_habis']  = array_filter($all_produk, fn($p) => (int)$p['stok'] === 0);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('layout/footer');
    }
}