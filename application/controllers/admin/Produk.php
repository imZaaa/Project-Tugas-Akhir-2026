<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_produk');
        $this->load->model('admin/M_kategori');
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            redirect('kasir/produk');
            return;
        }
    }

    // ===== INDEX =====
    public function index() {
        $id_category = $this->input->get('id_category', TRUE);

        $data['title']   = 'Stok Produk | PT Pordjo';
        $data['kategori'] = $this->M_kategori->get_all();
        $data['filter_kategori'] = '';

        if (!empty($id_category)) {
            $data['produk'] = $this->M_produk->get_by_category($id_category);
            $kat = $this->M_kategori->get_by_id($id_category);
            $data['filter_kategori'] = $kat ? $kat['nama_kategori'] : '';
        } else {
            $data['produk'] = $this->M_produk->get_all();
        }

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_produk', $data);
        $this->load->view('layout/footer');
    }

    // ===== TAMBAH PRODUK BARU KE KATALOG =====
    // Berfungsi layaknya mendaftarkan menu baru ke sistem
    public function tambah() {
        // [1] PENAMPUNGAN DATA (Mencegah skrip berbahaya dengan TRUE)
        $data = [
            'nama_produk'  => $this->input->post('nama_produk', TRUE),
            'id_category'  => $this->input->post('id_category', TRUE), // Foreign key ke tabel kategori
            'harga_jual'   => $this->input->post('harga_jual', TRUE),
            'stok'         => $this->input->post('stok', TRUE), // Stok awal
            'satuan'       => $this->input->post('satuan', TRUE), // Misal: Pcs, Kg, Box
        ];

        // [2] VALIDASI TAHAP DASAR
        // Cek keliling apakah ada bagian dari array $data yang dibiarkan kosong oleh Admin
        foreach ($data as $val) {
            if ($val === '' || $val === null) {
                // Tolak dan putar balik arah jika ditemukan 1 saja inputan blank
                $this->session->set_flashdata('error', 'Semua isian formulir produk wajib dilengkapi sebelum disimpan!');
                redirect('admin/produk'); return;
            }
        }

        // [3] PROSES QUERY KE MODEL
        // Lempar data matang ke M_produk
        if ($this->M_produk->insert($data)) {
            $this->session->set_flashdata('success', 'Katalog baru: "' . $data['nama_produk'] . '" berhasil diperkenalkan!');
        } else {
            $this->session->set_flashdata('error', 'Gangguan server, gagal merekam produk.');
        }
        
        // Lempar kembali ke halaman etalase (index)
        redirect('admin/produk');
    }

    // ===== UPDATE =====
    public function update() {
        $id   = $this->input->post('id_product', TRUE);
        $data = [
            'nama_produk'  => $this->input->post('nama_produk', TRUE),
            'id_category'  => $this->input->post('id_category', TRUE),
            'harga_jual'   => $this->input->post('harga_jual', TRUE),
            'stok'         => $this->input->post('stok', TRUE),
            'satuan'       => $this->input->post('satuan', TRUE),
        ];

        if ($this->M_produk->update($id, $data)) {
            $this->session->set_flashdata('success', 'Produk berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui produk.');
        }
        redirect('admin/produk');
    }

    // ===== UPDATE STOK MANUAL (PENYESUAIAN/OPNAME) =====
    // Terkadang di gudang asli ada barang hilang/rusak, sehingga admin perlu menimpa angka stok secara hard-code
    public function update_stok() {
        $id   = $this->input->post('id_product', TRUE);
        $stok = $this->input->post('stok', TRUE); // Angka stok baru hasil ketikan paksa admin

        // Keamanan: Cek apakah yang diketik sungguhan angka dan tidak negatif
        if ($stok === '' || $stok === null || !is_numeric($stok) || $stok < 0) {
            $this->session->set_flashdata('error', 'Angka stok cacat atau tidak sesuai format matematis!');
            redirect('admin/produk'); return;
        }

        // Timpa stok lama dengan hasil perhitungan opname gudang terbaru
        if ($this->M_produk->update($id, ['stok' => $stok])) {
            $this->session->set_flashdata('success', 'Sistem berhasil menyesuaikan sisa stok gudang!');
        } else {
            $this->session->set_flashdata('error', 'Gagal membongkar ruang penyimpanan database.');
        }
        redirect('admin/produk');
    }

    // ===== HAPUS PRODUK PERMANEN =====
    // (Peringatan: Jika produk ini pernah dijual, penghapusan gagal jika ada foreign key restrict dari tb_penjualan)
    public function hapus() {
        // Ambil ID dari "Hidden Input" yang dikirim oleh tombol Modal Hapus
        $id = $this->input->post('id_product', TRUE);
        
        // Minta model eksekusi query DELETE FROM products
        if ($this->M_produk->delete($id)) {
            $this->session->set_flashdata('success', 'Identitas barang telah ditarik permanen dari katalog.');
        } else {
            // Bisa error jika ForeignKey Cascade di database tidak mengizinkan (Constraint protect)
            $this->session->set_flashdata('error', 'Gagal membuang barang, kemungkinan data barang beririsan dengan nota penjualan lama.');
        }
        redirect('admin/produk');
    }
}