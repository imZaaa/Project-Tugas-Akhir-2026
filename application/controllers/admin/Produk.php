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

    // ===== TAMBAH =====
    public function tambah() {
        $data = [
            'nama_produk'  => $this->input->post('nama_produk', TRUE),
            'id_category'  => $this->input->post('id_category', TRUE),
            'harga_jual'   => $this->input->post('harga_jual', TRUE),
            'stok'         => $this->input->post('stok', TRUE),
            'satuan'       => $this->input->post('satuan', TRUE),
        ];

        foreach ($data as $val) {
            if ($val === '' || $val === null) {
                $this->session->set_flashdata('error', 'Semua field wajib diisi!');
                redirect('admin/produk'); return;
            }
        }

        if ($this->M_produk->insert($data)) {
            $this->session->set_flashdata('success', 'Produk "' . $data['nama_produk'] . '" berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan produk.');
        }
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

    // ===== UPDATE STOK =====
    public function update_stok() {
        $id   = $this->input->post('id_product', TRUE);
        $stok = $this->input->post('stok', TRUE);

        if ($stok === '' || $stok === null || !is_numeric($stok) || $stok < 0) {
            $this->session->set_flashdata('error', 'Stok tidak valid!');
            redirect('admin/produk'); return;
        }

        if ($this->M_produk->update($id, ['stok' => $stok])) {
            $this->session->set_flashdata('success', 'Stok berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui stok.');
        }
        redirect('admin/produk');
    }

    // ===== HAPUS =====
    public function hapus() {
        $id = $this->input->post('id_product', TRUE);
        if ($this->M_produk->delete($id)) {
            $this->session->set_flashdata('success', 'Produk berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus produk.');
        }
        redirect('admin/produk');
    }
}