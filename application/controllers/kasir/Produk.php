<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_produk');
        $this->load->model('admin/M_kategori');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin/produk');
            return;
        }
    }

    // ===== INDEX (kasir: lihat stok + update stok saja) =====
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
        $this->load->view('kasir/v_produk', $data);
        $this->load->view('layout/footer');
    }

    // ===== UPDATE STOK (dengan audit trail) =====
    public function update_stok() {
        $id   = $this->input->post('id_product', TRUE);
        $stok = $this->input->post('stok', TRUE);

        if ($stok === '' || $stok === null || !is_numeric($stok) || $stok < 0) {
            $this->session->set_flashdata('error', 'Stok tidak valid!');
            redirect('kasir/produk');
            return;
        }

        // [AUDIT] Ambil stok lama sebelum ditimpa untuk keperluan log
        $produk_lama = $this->M_produk->get_by_id($id);
        $stok_sebelum = $produk_lama ? (int) $produk_lama['stok'] : 0;

        if ($this->M_produk->update($id, ['stok' => $stok])) {
            // [AUDIT] Catat perubahan ke tabel stok_log
            $this->M_produk->log_stok_change(
                $id,
                $this->session->userdata('id_user'),
                $stok_sebelum,
                (int) $stok,
                'Penyesuaian stok manual oleh Kasir'
            );
            $this->session->set_flashdata('success', 'Stok berhasil diperbarui! (Sebelumnya: ' . $stok_sebelum . ' → Sekarang: ' . $stok . ')');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui stok.');
        }
        redirect('kasir/produk');
    }
}
