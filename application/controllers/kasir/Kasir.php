<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kasir extends CI_Controller {

    public function index() {
        $data['title'] = 'Dashboard Kasir | PT Pordjo';
        
        // Manggil urutan template
        $this->load->view('layout/header', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('kasir/dashboard', $data);
        $this->load->view('layout/footer');
    }
}