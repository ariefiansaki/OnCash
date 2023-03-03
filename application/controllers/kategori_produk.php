<?php
defined('BASEPATH') or exit('No direct script access allowed');

class kategori_produk extends CI_Controller
{
    function index()
    {
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('kategori/view_kategori');
        $this->load->view('template/footer');
    }
}
