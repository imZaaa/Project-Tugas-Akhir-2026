<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_kasir extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_sale');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin/laporan');
            return;
        }
    }

    // ===== HALAMAN LAPORAN SAYA =====
    public function index() {
        date_default_timezone_set('Asia/Jakarta');

        $id_user   = $this->session->userdata('id_user');
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-d');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');
        $preset    = $this->input->get('preset')     ?: 'hari_ini';

        switch ($preset) {
            case 'hari_ini':
                $tgl_awal = $tgl_akhir = date('Y-m-d');
                break;
            case 'minggu_ini':
                $tgl_awal  = date('Y-m-d', strtotime('monday this week'));
                $tgl_akhir = date('Y-m-d');
                break;
            case 'bulan_ini':
                $tgl_awal  = date('Y-m-01');
                $tgl_akhir = date('Y-m-d');
                break;
            case 'custom':
                break;
        }

        $data['title']        = 'Laporan Penjualan Saya | PT Pordjo';
        $data['tgl_awal']     = $tgl_awal;
        $data['tgl_akhir']    = $tgl_akhir;
        $data['preset']       = $preset;

        $data['sales']        = $this->M_sale->get_laporan_kasir($id_user, $tgl_awal, $tgl_akhir);
        $data['total_omzet']  = $this->M_sale->omzet_kasir_range($id_user, $tgl_awal, $tgl_akhir);
        $data['total_trx']    = $this->M_sale->count_kasir_range($id_user, $tgl_awal, $tgl_akhir);
        $data['top_produk']   = $this->M_sale->get_top_produk_kasir($id_user, $tgl_awal, $tgl_akhir, 10);
        $data['rata_rata']    = ($data['total_trx'] > 0) ? $data['total_omzet'] / $data['total_trx'] : 0;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_laporan_kasir', $data);
        $this->load->view('layout/footer');
    }

    // ===== CETAK LAPORAN SETORAN =====
    public function cetak() {
        date_default_timezone_set('Asia/Jakarta');

        $id_user   = $this->session->userdata('id_user');
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-d');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');

        $data['title']        = 'Cetak Laporan Setoran | PT Pordjo';
        $data['tgl_awal']     = $tgl_awal;
        $data['tgl_akhir']    = $tgl_akhir;
        $data['nama_kasir']   = $this->session->userdata('nama') ?: $this->session->userdata('username');
        $data['sales']        = $this->M_sale->get_laporan_kasir($id_user, $tgl_awal, $tgl_akhir);
        $data['total_omzet']  = $this->M_sale->omzet_kasir_range($id_user, $tgl_awal, $tgl_akhir);
        $data['total_trx']    = $this->M_sale->count_kasir_range($id_user, $tgl_awal, $tgl_akhir);
        $data['top_produk']   = $this->M_sale->get_top_produk_kasir($id_user, $tgl_awal, $tgl_akhir, 10);

        $this->load->view('kasir/v_laporan_kasir_cetak', $data);
    }
}
