<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supplier extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin/M_supplier');

        if (!$this->session->userdata('logged_in')) redirect('auth');
        if ($this->session->userdata('role') !== 'kasir') {
            redirect('admin/supplier');
            return;
        }
    }

    // ===== INDEX (kasir: read-only) =====
    public function index() {
        $data['title']     = 'Data Supplier | PT Pordjo';
        $data['suppliers'] = $this->M_supplier->get_all();

        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/v_supplier', $data);
        $this->load->view('layout/footer');
    }
}
