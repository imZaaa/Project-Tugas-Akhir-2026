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
        // Ambil semua (aktif + nonaktif) agar view bisa mengelompokkan keduanya
        $data['suppliers'] = $this->M_supplier->get_all_including_nonaktif();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('admin/v_supplier', $data);
        $this->load->view('layout/footer');
    }

    public function tambah() {
        $this->load->library('form_validation');

        // Aturan validasi
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_kontak', 'Nama Kontak', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'   => '%s wajib diisi!',
            'valid_email' => 'Format %s tidak valid!'
        ]);
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|trim|numeric|min_length[9]|max_length[15]', [
            'required'   => '%s wajib diisi!',
            'numeric'    => '%s hanya boleh berisi angka!',
            'min_length' => '%s minimal 9 digit!',
            'max_length' => '%s maksimal 15 digit!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            // Format ulang pesan error agar rapi (tanpa tag <p>)
            $this->form_validation->set_error_delimiters('', '<br>');
            $pesan = validation_errors();
            $this->session->set_flashdata('error', $pesan);
            redirect('admin/supplier');
            return;
        }

        $nama = $this->input->post('nama_supplier', TRUE);

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
        $this->load->library('form_validation');

        // Aturan validasi sama dengan tambah
        $this->form_validation->set_rules('nama_supplier', 'Nama Supplier', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_kontak', 'Nama Kontak', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required'   => '%s wajib diisi!',
            'valid_email' => 'Format %s tidak valid!'
        ]);
        $this->form_validation->set_rules('no_telp', 'No. Telepon', 'required|trim|numeric|min_length[9]|max_length[15]', [
            'required'   => '%s wajib diisi!',
            'numeric'    => '%s hanya boleh berisi angka!',
            'min_length' => '%s minimal 9 digit!',
            'max_length' => '%s maksimal 15 digit!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required|trim', [
            'required' => '%s wajib diisi!'
        ]);

        if ($this->form_validation->run() == FALSE) {
            $this->form_validation->set_error_delimiters('', '<br>');
            $this->session->set_flashdata('error', validation_errors());
            redirect('admin/supplier');
            return;
        }

        $id   = $this->input->post('id_supplier',  TRUE);
        $kode = $this->input->post('kode_supplier', TRUE);
        $nama = $this->input->post('nama_supplier', TRUE);

        if (empty($id) || empty($kode)) {
            $this->session->set_flashdata('error', 'Data ID / Kode tidak lengkap!');
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

        if (empty($id)) {
            $this->session->set_flashdata('error', 'ID supplier tidak valid.');
            redirect('admin/supplier');
            return;
        }

        // Cek apakah supplier ini masih punya riwayat transaksi barang masuk
        if ($this->M_supplier->has_transaksi($id)) {
            // Tidak bisa dihapus permanen, nonaktifkan saja (soft delete)
            if ($this->M_supplier->nonaktifkan($id)) {
                $this->session->set_flashdata('warning', 'Supplier tidak dapat dihapus permanen karena memiliki riwayat transaksi. Supplier telah <strong>dinonaktifkan</strong> dan tidak akan muncul di form transaksi baru.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menonaktifkan supplier.');
            }
        } else {
            // Tidak punya transaksi, aman untuk dihapus permanen
            if ($this->M_supplier->delete($id)) {
                $this->session->set_flashdata('success', 'Supplier berhasil dihapus secara permanen.');
            } else {
                $this->session->set_flashdata('error', 'Gagal menghapus supplier.');
            }
        }
        redirect('admin/supplier');
    }

    public function aktifkan() {
        $id = $this->input->post('id_supplier', TRUE);

        if (empty($id)) {
            $this->session->set_flashdata('error', 'ID supplier tidak valid.');
            redirect('admin/supplier');
            return;
        }

        if ($this->M_supplier->aktifkan($id)) {
            $this->session->set_flashdata('success', 'Supplier berhasil diaktifkan kembali.');
        } else {
            $this->session->set_flashdata('error', 'Gagal mengaktifkan supplier.');
        }
        redirect('admin/supplier');
    }
}