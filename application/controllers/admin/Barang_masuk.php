<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang_masuk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_purchase');
        $this->load->model('admin/M_supplier');
        $this->load->model('admin/M_produk');
        if (!$this->session->userdata('logged_in')) redirect('auth');
    }

    // ===== LIST HISTORY (admin & kasir) =====
    public function index() {
        $role = $this->session->userdata('role');
        $data['title']     = 'Barang Masuk | PT Pordjo';
        $data['purchases'] = $this->M_purchase->get_all();

        if ($role === 'admin') {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('admin/v_barang_masuk', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('admin/v_barang_masuk', $data);
            $this->load->view('layout/footer');
        }
    }

    // ===== FORM INPUT (kasir only — admin tidak diizinkan input) =====
    public function create() {
        $role = $this->session->userdata('role');

        // Admin tidak boleh input barang masuk
        if ($role === 'admin') {
            $this->session->set_flashdata('error', 'Admin tidak dapat menginput barang masuk. Fitur ini khusus Kasir.');
            redirect('admin/barang_masuk'); return;
        }

        $data['title']     = 'Tambah Barang Masuk | PT Pordjo';
        $data['suppliers'] = $this->M_supplier->get_all();
        $data['produk']    = $this->M_produk->get_all();
        $data['no_faktur'] = $this->M_purchase->generate_no_faktur();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_barang_masuk_form', $data);
        $this->load->view('layout/footer');
    }

    // ===== SIMPAN TRANSAKSI (kasir only) =====
    public function simpan() {
        $role = $this->session->userdata('role');

        // Admin tidak boleh simpan barang masuk
        if ($role === 'admin') {
            $this->session->set_flashdata('error', 'Admin tidak dapat menginput barang masuk.');
            redirect('admin/barang_masuk'); return;
        }

        $no_faktur   = $this->input->post('no_faktur',   TRUE);
        $id_supplier = $this->input->post('id_supplier', TRUE);
        $tgl_beli    = $this->input->post('tgl_beli',    TRUE);
        $keterangan  = $this->input->post('keterangan',  TRUE);
        $id_products = $this->input->post('id_product',  TRUE); // array
        $qtys        = $this->input->post('qty',         TRUE); // array
        $prices      = $this->input->post('purchase_price', TRUE); // array

        $redirect = 'kasir/barang_masuk'; // Hanya kasir yang bisa sampai sini

        // Validasi header
        if (empty($no_faktur) || empty($id_supplier) || empty($tgl_beli)) {
            $this->session->set_flashdata('error', 'No Faktur, Supplier, dan Tanggal wajib diisi!');
            redirect($redirect . '/create'); return;
        }

        // Cek duplikat no faktur
        if ($this->M_purchase->faktur_exists($no_faktur)) {
            $this->session->set_flashdata('error', 'No Faktur "' . $no_faktur . '" sudah digunakan!');
            redirect($redirect . '/create'); return;
        }

        // Validasi items
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal 1 produk harus ditambahkan!');
            redirect($redirect . '/create'); return;
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
            $this->session->set_flashdata('error', 'Data produk tidak valid, periksa kembali!');
            redirect($redirect . '/create'); return;
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
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan! Stok otomatis diperbarui. No Faktur: ' . $no_faktur);
            redirect($redirect);
        } else {
            $this->session->set_flashdata('error', 'Transaksi gagal disimpan. Silakan coba lagi.');
            redirect($redirect . '/create');
        }
    }

    // ===== DETAIL (modal — load via AJAX atau langsung) =====
    public function detail($id_purchase) {
        $role = $this->session->userdata('role');
        $data['title']    = 'Detail Barang Masuk | PT Pordjo';
        $data['header']   = $this->M_purchase->get_by_id($id_purchase);
        $data['detail']   = $this->M_purchase->get_detail($id_purchase);

        if (!$data['header']) {
            $this->session->set_flashdata('error', 'Data tidak ditemukan.');
            redirect(($role === 'admin') ? 'admin/barang_masuk' : 'kasir/barang_masuk');
            return;
        }

        if ($role === 'admin') {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('admin/v_barang_masuk_detail', $data);
            $this->load->view('layout/footer');
        } else {
            $this->load->view('layout/header', $data);
            $this->load->view('layout/sidebar', $data);
            $this->load->view('admin/v_barang_masuk_detail', $data);
            $this->load->view('layout/footer');
        }
    }

    // ===== HAPUS (admin only) =====
    public function hapus() {
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak.');
            redirect('kasir/barang_masuk'); return;
        }

        $id = $this->input->post('id_purchase', TRUE);
        if ($this->M_purchase->hapus_transaksi($id)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dihapus dan stok dikembalikan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus transaksi.');
        }
        redirect('admin/barang_masuk');
    }
}