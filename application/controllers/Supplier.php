<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Supplier extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_supplier');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['supplier'] = $this->Model_supplier->getDatasupplier()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('supplier/view_supplier', $data);
        $this->load->view('template/footer');
    }

    // function inputsupplier()
    // {
    //     $this->load->view('supplier/input_supplier');
    // }

    function simpansupplier()
    {
        $supplier = $this->Model_supplier;
        $idsupplier = $this->input->post('idsupplier');
        $namasupplier = $this->input->post('namasupplier');
        $phone = $this->input->post('phone');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');
        $this->form_validation->set_rules($supplier->rules());

        $data = array(
            'id_supplier' => $idsupplier,
            'nama_supplier' => $namasupplier,
            'phone' => $phone,
            'alamat' => $alamat,
            'keterangan' => $keterangan
        );

        $simpan = $this->Model_supplier->insertsupplier($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Berhasil Menambah Supplier.</div>');
            redirect('supplier');
        } else {
            echo "Gagal Disimpan";
        }
    }

    function hapus($idsupplier)
    {
        if ($idsupplier == "") {
            redirect('supplier');
        } else {
            $this->db->where('id_supplier', $idsupplier);
            $this->db->delete('supplier');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('supplier');
        }
    }

    function edit()
    {
        $model = new Model_supplier();
        $data['supplier'] = $model->where('id_supplier', $idsupplier)->first();
        redirect('supplier');
    }

    function updatesupplier()
    {
        $idsupplier = $this->input->post('idsupplier');
        $namasupplier = $this->input->post('namasupplier');
        $phone = $this->input->post('phone');
        $alamat = $this->input->post('alamat');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'id_supplier' => $idsupplier,
            'nama_supplier' => $namasupplier,
            'phone' => $phone,
            'alamat' => $alamat,
            'keterangan' => $keterangan
        );

        $simpan = $this->Model_supplier->editsupplier($data, $idsupplier);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit.</div>');
            redirect('supplier');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('supplier');
        }
    }
}
