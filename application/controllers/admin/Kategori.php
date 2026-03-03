<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_kategori');
        // Hanya admin
        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak.');
            redirect('kasir');
        }
    }

    public function index() {
        $data['title']    = 'Kategori Produk | PT Pordjo';
        $data['kategori'] = $this->M_kategori->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_kategori', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $nama = $this->input->post('nama_kategori', TRUE);
        if (empty($nama)) {
            $this->session->set_flashdata('error', 'Nama kategori wajib diisi.');
            redirect('admin/kategori'); return;
        }
        if ($this->M_kategori->nama_exists($nama)) {
            $this->session->set_flashdata('error', 'Kategori "' . $nama . '" sudah terdaftar.');
            redirect('admin/kategori'); return;
        }
        if ($this->M_kategori->insert(['nama_kategori' => $nama])) {
            $this->session->set_flashdata('success', 'Kategori "' . $nama . '" berhasil ditambahkan.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan kategori.');
        }
        redirect('admin/kategori');
    }

    public function update() {
        $id   = $this->input->post('id_category', TRUE);
        $nama = $this->input->post('nama_kategori', TRUE);
        if (empty($id) || empty($nama)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap.');
            redirect('admin/kategori'); return;
        }
        if ($this->M_kategori->update($id, ['nama_kategori' => $nama])) {
            $this->session->set_flashdata('success', 'Kategori berhasil diperbarui.');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui kategori.');
        }
        redirect('admin/kategori');
    }

    public function hapus() {
        $id = $this->input->post('id_category', TRUE);
        // Cek apakah masih ada produk yang pakai kategori ini
        $this->load->model('admin/M_produk');
        if ($this->M_produk->count_by_category($id) > 0) {
            $this->session->set_flashdata('error', 'Kategori tidak dapat dihapus karena masih terkait dengan data produk.');
            redirect('admin/kategori'); return;
        }
        if ($this->M_kategori->delete($id)) {
            $this->session->set_flashdata('success', 'Kategori berhasil dihapus.');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kategori.');
        }
        redirect('admin/kategori');
    }
}