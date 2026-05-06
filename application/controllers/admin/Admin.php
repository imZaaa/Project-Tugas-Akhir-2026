<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_produk');
        $this->load->model('admin/M_kategori');
        $this->load->model('admin/M_supplier');
        $this->load->model('admin/M_sale');
        $this->load->model('admin/M_purchase');
        $this->load->model('admin/M_users');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') redirect('kasir');
    }

    public function index() {
        $data['title'] = 'Dashboard Admin | PT Pordjo';

        // ===== PRODUK =====
        $data['total_produk']   = $this->M_produk->count_all();
        $produk_menipis         = $this->M_produk->get_stok_menipis(10);
        $data['produk_menipis'] = $produk_menipis;
        $data['stok_menipis']   = count($produk_menipis);
        $data['produk_habis']   = array_filter($produk_menipis, fn($p) => (int)$p['stok'] === 0);

        // ===== ALERT HARGA JUAL DI BAWAH MODAL =====
        $data['produk_rugi'] = $this->M_produk->get_jual_dibawah_modal();

        // ===== SUPPLIER =====
        $data['total_supplier'] = $this->M_supplier->count_all();

        // ===== KASIR =====
        $data['kasir_aktif'] = $this->M_users->count_by_role('kasir');

        // ===== PENJUALAN =====
        $data['total_penjualan_hari'] = $this->M_sale->count_hari_ini();
        $data['total_trx_hari']       = $this->M_sale->count_hari_ini();
        $data['pendapatan_hari']      = $this->M_sale->omzet_hari_ini();
        $data['transaksi_terbaru']    = $this->M_sale->get_terbaru(10);

        // Chart 7 hari penjualan
        $chart_data           = $this->M_sale->omzet_7_hari();
        $data['chart_labels'] = array_column($chart_data, 'label');
        $data['chart_values'] = array_column($chart_data, 'total');

        // ===== BARANG MASUK HARI INI (MONITORING REAL-TIME) =====
        $barang_masuk_hari_ini          = $this->M_purchase->get_today();
        $data['barang_masuk_hari_ini']  = $barang_masuk_hari_ini;
        $data['barang_masuk_hari']      = count($barang_masuk_hari_ini);
        $data['barang_masuk_items']     = $this->M_purchase->get_today_items();
        $data['barang_masuk_qty_total'] = $this->M_purchase->count_today_items();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('layout/footer');
    }
}