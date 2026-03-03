<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_purchase');
        $this->load->model('admin/M_supplier');
        $this->load->model('admin/M_produk');
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('kasir/barang_masuk');
            return;
        }
    }

    // ===== LIST HISTORY =====
    public function index() {
        $data['title']     = 'Barang Masuk | PT Pordjo';
        $data['purchases'] = $this->M_purchase->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_barang_masuk', $data);
        $this->load->view('layout/footer');
    }

    // ===== FORM INPUT =====
    public function create() {
        $data['title']     = 'Tambah Barang Masuk | PT Pordjo';
        $data['suppliers'] = $this->M_supplier->get_all();
        $data['produk']    = $this->M_produk->get_all();
        $data['no_faktur'] = $this->M_purchase->generate_no_faktur();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_barang_masuk_form', $data);
        $this->load->view('layout/footer');
    }

    // ===== SIMPAN TRANSAKSI =====
    public function simpan() {
        $no_faktur   = $this->input->post('no_faktur',   TRUE);
        $id_supplier = $this->input->post('id_supplier', TRUE);
        $tgl_beli    = $this->input->post('tgl_beli',    TRUE);
        $keterangan  = $this->input->post('keterangan',  TRUE);
        $id_products = $this->input->post('id_product',  TRUE);
        $qtys        = $this->input->post('qty',         TRUE);
        $prices      = $this->input->post('purchase_price', TRUE);

        // Validasi header
        if (empty($no_faktur) || empty($id_supplier) || empty($tgl_beli)) {
            $this->session->set_flashdata('error', 'No. Faktur, Supplier, dan Tanggal wajib diisi.');
            redirect('admin/barang_masuk/create'); return;
        }

        // Cek duplikat no faktur
        if ($this->M_purchase->faktur_exists($no_faktur)) {
            $this->session->set_flashdata('error', 'No. Faktur "' . $no_faktur . '" sudah terdaftar.');
            redirect('admin/barang_masuk/create'); return;
        }

        // Validasi items
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal satu produk harus ditambahkan.');
            redirect('admin/barang_masuk/create'); return;
        }

        // Susun items & hitung total
        $items       = [];
        $total_bayar = 0;
        foreach ($id_products as $i => $id_product) {
            if (empty($id_product) || empty($qtys[$i]) || empty($prices[$i])) continue;
            $qty      = (int) $qtys[$i];
            $price    = (float) $prices[$i];
            $subtotal = $qty * $price;
            $items[]  = [
                'id_product'     => $id_product,
                'qty'            => $qty,
                'purchase_price' => $price,
            ];
            $total_bayar += $subtotal;
        }

        if (empty($items)) {
            $this->session->set_flashdata('error', 'Data produk tidak valid, harap periksa kembali.');
            redirect('admin/barang_masuk/create'); return;
        }

        date_default_timezone_set('Asia/Jakarta');
        $header = [
            'no_faktur'   => $no_faktur,
            'id_supplier' => $id_supplier,
            'id_user'     => $this->session->userdata('id_user'),
            'tgl_beli'    => $tgl_beli,
            'total_bayar' => $total_bayar,
            'keterangan'  => $keterangan,
            'created_at'  => date('Y-m-d H:i:s'),
        ];

        // Simpan atomic (header + detail + update stok)
        $result = $this->M_purchase->simpan_transaksi($header, $items);

        if ($result) {
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan. Stok telah diperbarui secara otomatis. No. Faktur: ' . $no_faktur);
            redirect('admin/barang_masuk');
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal disimpan. Silakan coba kembali.');
            redirect('admin/barang_masuk/create');
        }
    }

    // ===== DETAIL =====
    public function detail($id_purchase) {
        $data['title']    = 'Detail Barang Masuk | PT Pordjo';
        $data['header']   = $this->M_purchase->get_by_id($id_purchase);
        $data['detail']   = $this->M_purchase->get_detail($id_purchase);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect('admin/barang_masuk');
            return;
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_barang_masuk_detail', $data);
        $this->load->view('layout/footer');
    }

    // ===== HAPUS =====
    public function hapus() {
        $id = $this->input->post('id_purchase', TRUE);
        if ($this->M_purchase->hapus_transaksi($id)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dihapus dan stok telah dikembalikan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus transaksi.');
        }
        redirect('admin/barang_masuk');
    }
}