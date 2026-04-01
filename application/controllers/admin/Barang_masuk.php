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

    // ===== SIMPAN TRANSAKSI BARANG MASUK =====
    // Menangkap form "Tambah Kulakan" dari Admin
    public function simpan() {
        // [1] PENERIMAAN DATA INPUT (Telah difilter XSS dengan parameter TRUE)
        $no_faktur   = $this->input->post('no_faktur',   TRUE); // Nomor Resi dari pabrik/supplier
        $id_supplier = $this->input->post('id_supplier', TRUE); // Dari PT. mana barang ini dibeli
        $tgl_beli    = $this->input->post('tgl_beli',    TRUE); // Tanggal di faktur
        $keterangan  = $this->input->post('keterangan',  TRUE); // Opsional
        
        // Data Multi-row (Satu nota gudang bisa berisi puluhan jenis barang)
        $id_products = $this->input->post('id_product',  TRUE);
        $qtys        = $this->input->post('qty',         TRUE); // Qty Masuk Gudang
        $prices      = $this->input->post('purchase_price', TRUE); // Harga modal (HB) saat ini

        // [2] CEK PERSYARATAN WAJIB STRUK HEADER
        if (empty($no_faktur) || empty($id_supplier) || empty($tgl_beli)) {
            $this->session->set_flashdata('error', 'No. Faktur, Supplier, dan Tanggal wajib diisi.');
            redirect('admin/barang_masuk/create'); return;
        }

        // --- PROTEKSI DUPLIKASI DATA ---
        // Mencegah admin mem-posting dua kali faktur / resi yang secara fisik sama
        if ($this->M_purchase->faktur_exists($no_faktur)) {
            $this->session->set_flashdata('error', 'No. Faktur "' . $no_faktur . '" sudah terdaftar.');
            redirect('admin/barang_masuk/create'); return;
        }

        // Memastikan admin minimal meng-input 1 barang, tidak boleh simpan keranjang kosong
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal satu produk harus ditambahkan.');
            redirect('admin/barang_masuk/create'); return;
        }

        // [3] PROSES VALIDASI KERANJANG KULAKAN (ITEMS)
        $items       = []; // Wadah untuk detail pesanan bersih
        $total_bayar = 0;  // Akumulasi modal uang keluar (outflow)
        
        foreach ($id_products as $i => $id_product) {
            // Tolak barisan (row) input yang cacat tapi jangan hentikan perulangan (continue)
            if (empty($id_product) || empty($qtys[$i]) || empty($prices[$i])) continue;
            
            $qty      = (int) $qtys[$i];
            $price    = (float) $prices[$i];
            
            // Subtotal modal keluar per item = Jumlah x Harga Kulak per Satuan
            $subtotal = $qty * $price;
            
            // Bungkus menjadi satu set array
            $items[]  = [
                'id_product'     => $id_product,
                'qty'            => $qty,
                'purchase_price' => $price,
            ];
            
            // Masukkan nilai belanjanya ke total tagihan supplier
            $total_bayar += $subtotal;
        }

        if (empty($items)) {
            $this->session->set_flashdata('error', 'Data produk tidak valid, harap periksa kembali.');
            redirect('admin/barang_masuk/create'); return;
        }

        // [4] SUSUN HEADER FINAL UNTUK DIKIRIM KE DATABASE
        date_default_timezone_set('Asia/Jakarta');
        $header = [
            'no_faktur'   => $no_faktur,
            'id_supplier' => $id_supplier,
            'id_user'     => $this->session->userdata('id_user'), // Siapa petugas admin yang mendata ini
            'tgl_beli'    => $tgl_beli,
            'total_bayar' => $total_bayar, // Menentukan pencatatan beban piutang/uang keluar
            'keterangan'  => $keterangan,
            'created_at'  => date('Y-m-d H:i:s'), // Waktu aktual disistem
        ];

        // [5] EKSEKUSI DATABASE LEVEL TINGGI
        // Panggil M_purchase untuk melakukan Query ATOMIC (Insert Header, Insert Details, UPDATE STOK GUDANG)
        $result = $this->M_purchase->simpan_transaksi($header, $items);

        // Umpan balik ke admin pengisi form
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

    // ===== HAPUS / PEMBATALAN BARANG MASUK =====
    // Berfungsi layaknya "Void / Retur". Jika Admin menghapus rekaman kulakan, barang di gudang akan otomatis dikurangi (-)
    public function hapus() {
        $id = $this->input->post('id_purchase', TRUE);
        
        // Operasi database hapus ditanggung oleh Model
        if ($this->M_purchase->hapus_transaksi($id)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dihapus dan jumlah stok yang tadinya masuk telah ditarik kembali.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus blok transaksi.');
        }
        redirect('admin/barang_masuk');
    }
}