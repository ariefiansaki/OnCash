<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_pelanggan');
    }

    function index()
    {
        $data['pelanggan'] = $this->Model_pelanggan->getDataPelanggan()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('pelanggan/view_pelanggan', $data);
        $this->load->view('template/footer');
    }

    function simpanpelanggan()
    {
        $idpelanggan = $this->input->post('idpelanggan');
        $namapelanggan = $this->input->post('namaplg');
        $alamatpelanggan = $this->input->post('alamatplg');
        $teleponpelanggan = $this->input->post('teleponplg');

        $data = array(
            'id_pelanggan' => $idpelanggan,
            'nama_pelanggan' => $namapelanggan,
            'alamat_pelanggan' => $alamatpelanggan,
            'telepon_pelanggan' => $teleponpelanggan
        );

        $simpan = $this->Model_pelanggan->insertpelanggan($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Berhasil Menambah Produk.</div>');
            redirect('pelanggan');
        } else {
            echo "Gagal Disimpan";
        }
    }

    function hapus($idpelanggan)
    {
        if ($idpelanggan == "") {
            redirect('pelanggan');
        } else {
            $this->db->where('id_pelanggan', $idpelanggan);
            $this->db->delete('pelanggan');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('pelanggan');
        }
    }
}
