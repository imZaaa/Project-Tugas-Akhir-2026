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

    // ===== SIMPAN TRANSAKSI (FUNGSI UTAMA PENJUALAN) =====
    // Menangkap data dari form penjualan dan memprosesnya ke sistem
    public function simpan() {
        // [1] PENERIMAAN DATA (Dari form view)
        // Menangkap data input, TRUE berarti di-filter dari serangan XSS (Cross Site Scripting)
        $kode_transaksi = $this->input->post('kode_transaksi', TRUE);
        $nama_pelanggan = $this->input->post('nama_pelanggan', TRUE);
        $bayar          = (float) $this->input->post('bayar', TRUE);
        
        // Data berupa array, karena dalam 1 struk bisa ada banyak produk sekaligus
        $id_products    = $this->input->post('id_product', TRUE);
        $qtys           = $this->input->post('qty', TRUE);
        $harga_juals    = $this->input->post('harga_jual', TRUE);

        // [2] VALIDASI LEVEL SEDERHANA
        // Validasi header (identitas struk)
        if (empty($kode_transaksi) || empty($bayar)) {
            $this->session->set_flashdata('error', 'Kode transaksi dan nominal pembayaran wajib diisi.');
            redirect('admin/penjualan/create'); // Kembalikan jika ditolak
            return; // Hentikan script
        }

        // Validasi keranjang: Pastikan keranjang belanja (items) tidak kosong
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal satu produk harus ditambahkan.');
            redirect('admin/penjualan/create');
            return;
        }

        // [3] PROSES KERANJANG DAN VALIDASI STOK WAKTU-NYATA (Real-time)
        $items       = []; // Wadah untuk menyimpan rincian barang sementara
        $total_harga = 0;  // Akumulator (penjumlah) total tagihan struk

        // Looping (perulangan) untuk setiap ID Produk yang ada di array kasir
        foreach ($id_products as $i => $id_product) {
            // Abaikan jika data per-barisnya ada yang kosong/cacat
            if (empty($id_product) || empty($qtys[$i]) || empty($harga_juals[$i])) continue;

            $qty        = (int) $qtys[$i];
            $harga_jual = (float) $harga_juals[$i];
            $subtotal   = $qty * $harga_jual;

            // --- PROTEKSI STOK NEGATIF ---
            // Cek sisa stok produk ini langsung ke database sebelum mengizinkan penjualan
            $produk = $this->M_produk->get_by_id($id_product);
            
            // Jika produk tidak ada, ATAU stok di gudang kurang dari jumlah yang diminta kasir
            if (!$produk || $produk['stok'] < $qty) {
                $nama = $produk ? $produk['nama_produk'] : 'Unknown';
                $sisa = $produk ? $produk['stok'] : 0;
                
                // Beri peringatan bahwa stoknya kurang dan sebutkan sisa aslinya
                $this->session->set_flashdata('error', 'Stok "' . $nama . '" tidak mencukupi. Sisa stok: ' . $sisa . ', jumlah yang diminta: ' . $qty);
                redirect('admin/penjualan/create');
                return; // Batalkan SELURUH simpan belanja karena salah satu stoknya habis
            }

            // Jika stok aman, masukkan ke keranjang belanja (array)
            $items[] = [
                'id_product' => $id_product,
                'qty'        => $qty,
                'harga_jual' => $harga_jual,
            ];
            // Tambahkan subtotal barang ke total keseluruhan struk
            $total_harga += $subtotal;
        }

        // Cek lagi, barangkali semua barang di-skip jadinya array kosong
        if (empty($items)) {
            $this->session->set_flashdata('error', 'Data produk tidak valid, harap periksa kembali.');
            redirect('admin/penjualan/create');
            return;
        }

        // [4] VALIDASI PEMBAYARAN: Uang pelanggan harus lebih besar dari tagihan
        if ($bayar < $total_harga) {
            $this->session->set_flashdata('error', 'Nominal pembayaran (Rp ' . number_format($bayar, 0, ',', '.') . ') kurang dari total belanja (Rp ' . number_format($total_harga, 0, ',', '.') . ').');
            redirect('admin/penjualan/create');
            return;
        }

        // Hitung uang kembalian
        $kembalian = $bayar - $total_harga;

        // [5] SIAPKAN KEPALA STRUK (HEADER) YANG FINAL
        date_default_timezone_set('Asia/Jakarta');
        $header = [
            'kode_transaksi'  => $kode_transaksi,
            'id_user'         => $this->session->userdata('id_user'), // Siapa admin/kasir yang melayani
            'nama_pelanggan'  => $nama_pelanggan ?: null,
            'tgl_jual'        => date('Y-m-d H:i:s'),
            'total_harga'     => $total_harga,
            'bayar'           => $bayar,
            'kembalian'       => $kembalian,
            'status'          => 'Lunas', // Status langsung lunas
            'created_at'      => date('Y-m-d H:i:s'),
        ];

        // [6] LEMPAR KE MODEL UNTUK DISIMPAN (Proses Potong Stok & Pembuatan ID)
        $id_sale = $this->M_sale->simpan_transaksi($header, $items);

        // Jika operasi sukses, lempar pengguna (redirect) ke halaman detail/cetak nota
        if ($id_sale) {
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan dengan kode transaksi: ' . $kode_transaksi);
            redirect('admin/penjualan/detail/' . $id_sale);
        } else {
            // Jika ada gangguan database
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

    // ===== VOID TRANSAKSI (PEMBATALAN TRANSAKSI) =====
    // Fitur krusial bagi Admin untuk membatalkan nota tanpa menghapus histori/jejak auditnya
    public function void_transaksi() {
        $id_sale = $this->input->post('id_sale', TRUE);

        // Model `void_transaksi` bertugas:
        // 1. Ambil list barang di transaksi tsb
        // 2. Tambahkan kembali isi stok barang tersebut (+) ke database (Restocking)
        // 3. Ubah status struk di DB jadi 'Batal' (Sistem dilarang sewenang-wenang menghapus rekaman keuangan)
        if ($this->M_sale->void_transaksi($id_sale)) {
            $this->session->set_flashdata('success', 'Transaksi berhasil dibatalkan! Stok telah dikembalikan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal membatalkan transaksi.');
        }
        
        // Membawa admin kembali ke list data transaksi
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
