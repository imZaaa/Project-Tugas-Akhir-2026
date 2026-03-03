<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_sale');
        $this->load->model('admin/M_produk');
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('kasir/penjualan');
            return;
        }
    }

    // ===== LIST RIWAYAT PENJUALAN =====
    public function index() {
        $data['title']     = 'Penjualan Offline | PT Pordjo';
        $data['sales']     = $this->M_sale->get_all();
        $data['omzet_hari'] = $this->M_sale->omzet_hari_ini();
        $data['trx_hari']   = $this->M_sale->count_hari_ini();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_penjualan', $data);
        $this->load->view('layout/footer');
    }

    // ===== FORM INPUT TRANSAKSI BARU =====
    public function create() {
        $data['title']      = 'Transaksi Baru | PT Pordjo';
        $data['produk']     = $this->M_produk->get_all();
        $data['kode']       = $this->M_sale->generate_kode();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_penjualan_form', $data);
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

        // Validasi header
        if (empty($kode_transaksi) || empty($bayar)) {
            $this->session->set_flashdata('error', 'Kode transaksi dan nominal pembayaran wajib diisi.');
            redirect('admin/penjualan/create');
            return;
        }

        // Validasi items
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal satu produk harus ditambahkan.');
            redirect('admin/penjualan/create');
            return;
        }

        // Susun items, hitung total, validasi stok
        $items       = [];
        $total_harga = 0;
        foreach ($id_products as $i => $id_product) {
            if (empty($id_product) || empty($qtys[$i]) || empty($harga_juals[$i])) continue;

            $qty        = (int) $qtys[$i];
            $harga_jual = (float) $harga_juals[$i];
            $subtotal   = $qty * $harga_jual;

            // Cek stok real-time
            $produk = $this->M_produk->get_by_id($id_product);
            if (!$produk || $produk['stok'] < $qty) {
                $nama = $produk ? $produk['nama_produk'] : 'Unknown';
                $sisa = $produk ? $produk['stok'] : 0;
                $this->session->set_flashdata('error', 'Stok "' . $nama . '" tidak mencukupi. Sisa stok: ' . $sisa . ', jumlah yang diminta: ' . $qty);
                redirect('admin/penjualan/create');
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
            $this->session->set_flashdata('error', 'Data produk tidak valid, harap periksa kembali.');
            redirect('admin/penjualan/create');
            return;
        }

        // Validasi bayar >= total
        if ($bayar < $total_harga) {
            $this->session->set_flashdata('error', 'Nominal pembayaran (Rp ' . number_format($bayar, 0, ',', '.') . ') kurang dari total belanja (Rp ' . number_format($total_harga, 0, ',', '.') . ').');
            redirect('admin/penjualan/create');
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

        // Simpan atomic (header + detail + update stok)
        $id_sale = $this->M_sale->simpan_transaksi($header, $items);

        if ($id_sale) {
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan dengan kode transaksi: ' . $kode_transaksi);
            redirect('admin/penjualan/detail/' . $id_sale);
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal disimpan. Silakan coba kembali.');
            redirect('admin/penjualan/create');
        }
    }

    // ===== DETAIL TRANSAKSI =====
    public function detail($id_sale) {
        $data['title']  = 'Detail Penjualan | PT Pordjo';
        $data['header'] = $this->M_sale->get_by_id($id_sale);
        $data['detail'] = $this->M_sale->get_detail($id_sale);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data transaksi tidak ditemukan.');
            redirect('admin/penjualan');
            return;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_penjualan_detail', $data);
        $this->load->view('layout/footer');
    }

    // ===== CETAK NOTA / INVOICE =====
    public function cetak($id_sale) {
        $data['title']  = 'Cetak Nota | PT Pordjo';
        $data['header'] = $this->M_sale->get_by_id($id_sale);
        $data['detail'] = $this->M_sale->get_detail($id_sale);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data transaksi tidak ditemukan.');
            redirect('admin/penjualan');
            return;
        }

        // Load tanpa sidebar/header — layout cetak
        $this->load->view('admin/v_penjualan_cetak', $data);
    }

    // ===== VOID TRANSAKSI =====
    public function void_transaksi() {
        $id_sale = $this->input->post('id_sale', TRUE);

        if ($this->M_sale->void_transaksi($id_sale)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dibatalkan! Stok telah dikembalikan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal membatalkan transaksi.');
        }
        redirect('admin/penjualan');
    }

    // ===== AJAX: Get Produk JSON (untuk search real-time) =====
    public function get_produk_json() {
        $produk = $this->M_produk->get_all();
        $this->output
            ->set_content_type('application/json')
            ->set_output(json_encode($produk));
    }
}
