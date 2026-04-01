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

    // ===== SIMPAN TRANSAKSI (FUNGSI UTAMA KASIR) =====
    // Menangkap keranjang belanjaan pelanggan, di-submit oleh tombol bayar Kasir
    public function simpan() {
        // [1] PENANGKAPAN DATA DARI VIEW (Cegah XSS dengan TRUE)
        $kode_transaksi = $this->input->post('kode_transaksi', TRUE);
        $nama_pelanggan = $this->input->post('nama_pelanggan', TRUE); // Opsional
        $bayar          = (float) $this->input->post('bayar', TRUE); // Uang yang diserahkan pembeli
        
        // Data Multi-Row (karena struk bisa berisi banyak baris barang)
        $id_products    = $this->input->post('id_product', TRUE);
        $qtys           = $this->input->post('qty', TRUE);
        $harga_juals    = $this->input->post('harga_jual', TRUE);

        // [2] CEK PERSYARATAN WAJIB (Identitas Transaksi)
        if (empty($kode_transaksi) || empty($bayar)) {
            $this->session->set_flashdata('error', 'Kode transaksi dan nominal pembayaran wajib diisi.');
            redirect('kasir/penjualan/create');
            return;
        }

        // Pastikan keranjang tidak kosong sepenuhnya sebelum lanjut proses
        if (empty($id_products) || !is_array($id_products)) {
            $this->session->set_flashdata('error', 'Minimal satu produk harus ditambahkan.');
            redirect('kasir/penjualan/create');
            return;
        }

        // [3] PROSES VALIDASI BARANG SATU PER SATU
        $items       = []; // Keranjang bersih yang siap masuk database
        $total_harga = 0;  // Kalkulator tagihan riil sistem
        
        foreach ($id_products as $i => $id_product) {
            // Abaikan inputan kosong tak beraturan
            if (empty($id_product) || empty($qtys[$i]) || empty($harga_juals[$i])) continue;

            $qty        = (int) $qtys[$i];
            $harga_jual = (float) $harga_juals[$i];
            $subtotal   = $qty * $harga_jual;

            // --- PERLINDUNGAN STOK KOSONG (REAL-TIME CHECK) ---
            // Di sini kita narik info barang ke database: "Eh, barang ini masih ada ga?"
            $produk = $this->M_produk->get_by_id($id_product);
            
            // Logika tolakan: Jika produk ga ketemu ATAU qty yang dibeli kasir > stok toko
            if (!$produk || $produk['stok'] < $qty) {
                $nama = $produk ? $produk['nama_produk'] : 'Unknown';
                $sisa = $produk ? $produk['stok'] : 0;
                
                // Kasih tau kasirnya kalau barangnya kurang
                $this->session->set_flashdata('error', 'Stok "' . $nama . '" tidak mencukupi. Sisa stok: ' . $sisa . ', jumlah yang diminta: ' . $qty);
                redirect('kasir/penjualan/create');
                return; // Gagalkan semua keranjang!
            }

            // Kalau aman, siapkan dalam bentuk format array object
            $items[] = [
                'id_product' => $id_product,
                'qty'        => $qty,
                'harga_jual' => $harga_jual, // Harga dikunci, agar kalau harga barang naik besok, struk lama ga berubah harganya
            ];
            $total_harga += $subtotal; // Gulung terus angkanya
        }

        if (empty($items)) {
            $this->session->set_flashdata('error', 'Data produk tidak valid, harap periksa kembali.');
            redirect('kasir/penjualan/create');
            return;
        }

        // [4] VALIDASI LOGIKA PEMBAYARAN KASIR
        // Mencegah kasir ngasih kembalian jika pembayaran pelanggan kurang
        if ($bayar < $total_harga) {
            $this->session->set_flashdata('error', 'Nominal pembayaran (Rp ' . number_format($bayar, 0, ',', '.') . ') kurang dari total belanja (Rp ' . number_format($total_harga, 0, ',', '.') . ').');
            redirect('kasir/penjualan/create');
            return;
        }

        $kembalian = $bayar - $total_harga; // Math SD: Uang pembeli dikurang Tagihan System

        // [5] PENYUSUNAN STRUK HEADER AKHIR (Kunci data ke Database)
        date_default_timezone_set('Asia/Jakarta');
        $header = [
            'kode_transaksi'  => $kode_transaksi, // TRX-202610xxx
            'id_user'         => $this->session->userdata('id_user'), // Siapa akun kasirnya? Supaya bs masuk Laporan Komisi Kasir
            'nama_pelanggan'  => $nama_pelanggan ?: null,
            'tgl_jual'        => date('Y-m-d H:i:s'), // Tanggal real server skrg
            'total_harga'     => $total_harga,
            'bayar'           => $bayar,
            'kembalian'       => $kembalian,
            'status'          => 'Lunas', // POS retail default lunas
            'created_at'      => date('Y-m-d H:i:s'),
        ];

        // [6] PENGIRIMAN DATA KE MODEL (DATABASE QUERY)
        // Disinilah fungsi ATOMIC TRANSACTIONS M_sale dipanggil
        $id_sale = $this->M_sale->simpan_transaksi($header, $items);

        // Feedback ke kasir, pindah halaman ke cetak nota / detail struk
        if ($id_sale) {
            $this->session->set_flashdata('success', 'Transaksi berhasil disimpan dengan kode transaksi: ' . $kode_transaksi);
            redirect('kasir/penjualan/detail/' . $id_sale);
        } else {
            // Biasanya masuk kesini kalau ada database trigger yang gagal
            $this->session->set_flashdata('error', 'Transaksi gagal disimpan. Silakan coba kembali.');
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
