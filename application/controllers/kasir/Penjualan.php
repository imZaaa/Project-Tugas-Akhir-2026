<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_sale');
        $this->load->model('admin/M_produk');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin/penjualan');
            return;
        }
    }

    // ===== LIST RIWAYAT PENJUALAN (hari ini, milik kasir) =====
    public function index() {
        $id_user = $this->session->userdata('id_user');

        $data['title']      = 'Penjualan Offline | PT Pordjo';
        $data['sales']      = $this->M_sale->get_today_by_kasir($id_user);
        $data['omzet_hari'] = $this->M_sale->omzet_by_kasir_hari_ini($id_user);
        $data['trx_hari']   = $this->M_sale->count_by_kasir_hari_ini($id_user);

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_penjualan', $data);
        $this->load->view('layout/footer');
    }

    // ===== FORM INPUT TRANSAKSI BARU =====
    public function create() {
        $data['title']  = 'Transaksi Baru | PT Pordjo';
        $data['produk'] = $this->M_produk->get_all();
        $data['kode']   = $this->M_sale->generate_kode();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_penjualan_form', $data);
        $this->load->view('layout/footer');
    }

    // ===== SIMPAN TRANSAKSI =====
    public function simpan() {
        $kode_transaksi = $this->input->post('kode_transaksi', TRUE);
        $nama_pelanggan = $this->input->post('nama_pelanggan', TRUE);
        $bayar          = (float) $this->input->post('bayar', TRUE);
        $id_products    = $this->input->post('id_product', TRUE);
        $qtys           = $this->input->post('qty', TRUE);
        $harga_juals    = $this->input->post('harga_jual', TRUE);

        if (empty($kode_transaksi) || empty($bayar)) {
            $this->session->set_flashdata('error', 'Kode transaksi dan jumlah bayar wajib diisi!');
            redirect('kasir/penjualan/create');
            return;
        }

        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal 1 produk harus ditambahkan!');
            redirect('kasir/penjualan/create');
            return;
        }

        $items       = [];
        $total_harga = 0;
        foreach ($id_products as $i => $id_product) {
            if (empty($id_product) || empty($qtys[$i]) || empty($harga_juals[$i])) continue;

            $qty        = (int) $qtys[$i];
            $harga_jual = (float) $harga_juals[$i];
            $subtotal   = $qty * $harga_jual;

            $produk = $this->M_produk->get_by_id($id_product);
            if (!$produk || $produk['stok'] < $qty) {
                $nama = $produk ? $produk['nama_produk'] : 'Unknown';
                $sisa = $produk ? $produk['stok'] : 0;
                $this->session->set_flashdata('error', 'Stok "' . $nama . '" tidak cukup! Sisa: ' . $sisa . ', diminta: ' . $qty);
                redirect('kasir/penjualan/create');
                return;
            }

            $items[] = [
                'id_product' => $id_product,
                'qty'        => $qty,
                'harga_jual' => $harga_jual,
            ];
            $total_harga += $subtotal;
        }

        if (empty($items)) {
            $this->session->set_flashdata('error', 'Data produk tidak valid, periksa kembali!');
            redirect('kasir/penjualan/create');
            return;
        }

        if ($bayar < $total_harga) {
            $this->session->set_flashdata('error', 'Jumlah bayar (Rp ' . number_format($bayar, 0, ',', '.') . ') kurang dari total belanja (Rp ' . number_format($total_harga, 0, ',', '.') . ')!');
            redirect('kasir/penjualan/create');
            return;
        }

        $kembalian = $bayar - $total_harga;

        date_default_timezone_set('Asia/Jakarta');
        $header = [
            'kode_transaksi'  => $kode_transaksi,
            'id_user'         => $this->session->userdata('id_user'),
            'nama_pelanggan'  => $nama_pelanggan ?: null,
            'tgl_jual'        => date('Y-m-d H:i:s'),
            'total_harga'     => $total_harga,
            'bayar'           => $bayar,
            'kembalian'       => $kembalian,
            'status'          => 'Lunas',
            'created_at'      => date('Y-m-d H:i:s'),
        ];

        $id_sale = $this->M_sale->simpan_transaksi($header, $items);

        if ($id_sale) {
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan! Kode: ' . $kode_transaksi);
            redirect('kasir/penjualan/detail/' . $id_sale);
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal disimpan. Silakan coba lagi.');
            redirect('kasir/penjualan/create');
        }
    }

    // ===== DETAIL TRANSAKSI =====
    public function detail($id_sale) {
        $data['title']  = 'Detail Penjualan | PT Pordjo';
        $data['header'] = $this->M_sale->get_by_id($id_sale);
        $data['detail'] = $this->M_sale->get_detail($id_sale);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data transaksi tidak ditemukan.');
            redirect('kasir/penjualan');
            return;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_penjualan_detail', $data);
        $this->load->view('layout/footer');
    }

    // ===== CETAK NOTA / INVOICE =====
    public function cetak($id_sale) {
        $data['title']  = 'Cetak Nota | PT Pordjo';
        $data['header'] = $this->M_sale->get_by_id($id_sale);
        $data['detail'] = $this->M_sale->get_detail($id_sale);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data transaksi tidak ditemukan.');
            redirect('kasir/penjualan');
            return;
        }

        $this->load->view('kasir/v_penjualan_cetak', $data);
    }

    // ===== AJAX: Get Produk JSON =====
    public function get_produk_json() {
        $produk = $this->M_produk->get_all();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($produk));
    }
}
