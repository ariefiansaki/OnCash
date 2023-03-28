<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail_Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_detail');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['detail'] = $this->Model_detail->getDatatransaksi()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/view_detail', $data);
        $this->load->view('template/footer');
    }
}
