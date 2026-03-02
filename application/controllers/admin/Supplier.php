<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_supplier');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'admin') {
            $this->session->set_flashdata('error', 'Akses ditolak.');
            redirect('kasir');
        }
    }

    public function index() {
        $data['title']     = 'Data Supplier | PT Pordjo';
        $data['suppliers'] = $this->M_supplier->get_all();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_supplier', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $nama  = $this->input->post('nama_supplier', TRUE);

        if (empty($nama)) {
            $this->session->set_flashdata('error', 'Nama Supplier wajib diisi!');
            redirect('admin/supplier'); return;
        }

        // Generate kode otomatis
        $kode = $this->M_supplier->generate_kode();

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'kode_supplier' => $kode,
            'nama_supplier' => $nama,
            'nama_kontak'   => $this->input->post('nama_kontak',  TRUE),
            'no_telp'       => $this->input->post('no_telp',      TRUE),
            'email'         => $this->input->post('email',        TRUE),
            'alamat'        => $this->input->post('alamat',       TRUE),
            'keterangan'    => $this->input->post('keterangan',   TRUE),
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        if ($this->M_supplier->insert($data)) {
            $this->session->set_flashdata('success', 'Supplier "' . $nama . '" berhasil ditambahkan!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menambahkan supplier.');
        }
        redirect('admin/supplier');
    }

    public function update() {
        $id   = $this->input->post('id_supplier',  TRUE);
        $kode = $this->input->post('kode_supplier', TRUE);
        $nama = $this->input->post('nama_supplier', TRUE);

        if (empty($id) || empty($kode) || empty($nama)) {
            $this->session->set_flashdata('error', 'Data tidak lengkap!');
            redirect('admin/supplier'); return;
        }

        if ($this->M_supplier->kode_exists_except($kode, $id)) {
            $this->session->set_flashdata('error', 'Kode supplier "' . $kode . '" sudah digunakan supplier lain!');
            redirect('admin/supplier'); return;
        }

        date_default_timezone_set('Asia/Jakarta');
        $data = [
            'kode_supplier' => $kode,
            'nama_supplier' => $nama,
            'nama_kontak'   => $this->input->post('nama_kontak',  TRUE),
            'no_telp'       => $this->input->post('no_telp',      TRUE),
            'email'         => $this->input->post('email',        TRUE),
            'alamat'        => $this->input->post('alamat',       TRUE),
            'keterangan'    => $this->input->post('keterangan',   TRUE),
            'updated_at'    => date('Y-m-d H:i:s'),
        ];

        if ($this->M_supplier->update($id, $data)) {
            $this->session->set_flashdata('success', 'Supplier "' . $nama . '" berhasil diperbarui!');
        } else {
            $this->session->set_flashdata('error', 'Gagal memperbarui supplier.');
        }
        redirect('admin/supplier');
    }

    public function hapus() {
        $id = $this->input->post('id_supplier', TRUE);
        if ($this->M_supplier->delete($id)) {
            $this->session->set_flashdata('success', 'Supplier berhasil dihapus!');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus supplier.');
        }
        redirect('admin/supplier');
    }
}