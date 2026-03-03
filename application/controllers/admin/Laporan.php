<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_sale');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak. Menu ini khusus untuk peran Admin.');
            redirect('kasir/kasir');
            return;
        }
    }

    // ===== HALAMAN UTAMA LAPORAN =====
    public function index() {
        date_default_timezone_set('Asia/Jakarta');

        // Default: bulan ini
        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');
        $preset    = $this->input->get('preset')     ?: 'bulan_ini';

        // Handle presets
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
            case 'bulan_lalu':
                $tgl_awal  = date('Y-m-01', strtotime('first day of last month'));
                $tgl_akhir = date('Y-m-t', strtotime('last day of last month'));
                break;
            case 'tahun_ini':
                $tgl_awal  = date('Y-01-01');
                $tgl_akhir = date('Y-m-d');
                break;
            case 'custom':
                // use GET params as-is
                break;
        }

        $data['title']        = 'Laporan Penjualan | PT Pordjo';
        $data['tgl_awal']     = $tgl_awal;
        $data['tgl_akhir']    = $tgl_akhir;
        $data['preset']       = $preset;

        // Data utama
        $data['sales']        = $this->M_sale->get_laporan($tgl_awal, $tgl_akhir);
        $data['total_omzet']  = $this->M_sale->omzet_by_range($tgl_awal, $tgl_akhir);
        $data['total_trx']    = $this->M_sale->count_by_range($tgl_awal, $tgl_akhir);
        $data['top_produk']   = $this->M_sale->get_top_produk($tgl_awal, $tgl_akhir, 10);
        $data['per_kasir']    = $this->M_sale->omzet_per_kasir($tgl_awal, $tgl_akhir);

        // Chart data — omzet per hari
        $chart_data           = $this->M_sale->omzet_per_day($tgl_awal, $tgl_akhir);
        $data['chart_labels'] = array_column($chart_data, 'tanggal');
        $data['chart_values'] = array_map('floatval', array_column($chart_data, 'total'));

        // Rata-rata per transaksi
        $data['rata_rata']    = ($data['total_trx'] > 0) ? $data['total_omzet'] / $data['total_trx'] : 0;

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_laporan', $data);
        $this->load->view('layout/footer');
    }

    // ===== CETAK LAPORAN (print-friendly) =====
    public function cetak() {
        date_default_timezone_set('Asia/Jakarta');

        $tgl_awal  = $this->input->get('tgl_awal')  ?: date('Y-m-01');
        $tgl_akhir = $this->input->get('tgl_akhir') ?: date('Y-m-d');

        $data['title']        = 'Cetak Laporan Penjualan | PT Pordjo';
        $data['tgl_awal']     = $tgl_awal;
        $data['tgl_akhir']    = $tgl_akhir;
        $data['sales']        = $this->M_sale->get_laporan($tgl_awal, $tgl_akhir);
        $data['total_omzet']  = $this->M_sale->omzet_by_range($tgl_awal, $tgl_akhir);
        $data['total_trx']    = $this->M_sale->count_by_range($tgl_awal, $tgl_akhir);
        $data['top_produk']   = $this->M_sale->get_top_produk($tgl_awal, $tgl_akhir, 10);
        $data['per_kasir']    = $this->M_sale->omzet_per_kasir($tgl_awal, $tgl_akhir);

        // Load tanpa sidebar/header — layout cetak
        $this->load->view('admin/v_laporan_cetak', $data);
    }
}
