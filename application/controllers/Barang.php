<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barang extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_barang');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['barang'] = $this->Model_barang->getDataBarang()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('barang/view_barang', $data);
        $this->load->view('template/footer');
    }

    // function inputBarang()
    // {
    //     $this->load->view('barang/input_barang');
    // }

    function simpanbarang()
    {
        $barang = $this->Model_barang;
        $idbarang = $this->input->post('idbarang');
        $namabarang = $this->input->post('namabarang');
        $kategoribarang = $this->input->post('kategoribarang');
        $hargabarang = $this->input->post('hargabarang');
        $stokbarang = $this->input->post('stokbarang');
        $this->form_validation->set_rules($barang->rules());

        $data = array(
            'id_barang' => $idbarang,
            'nama_barang' => $namabarang,
            'kategori_barang' => $kategoribarang,
            'harga_barang' => $hargabarang,
            'stok_barang' => $stokbarang
        );

        $simpan = $this->Model_barang->insertbarang($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Berhasil Menambah Produk.</div>');
            redirect('barang');
        } else {
            echo "Gagal Disimpan";
        }
    }

    function hapus($idbarang)
    {
        if ($idbarang == "") {
            redirect('barang');
        } else {
            $this->db->where('id_barang', $idbarang);
            $this->db->delete('barang');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('barang');
        }
    }

    function edit()
    {
        $model = new Model_barang();
        $data['barang'] = $model->where('id_barang', $idbarang)->first();
        redirect('barang');
    }

    function updatebarang()
    {
        $idbarang = $this->input->post('idbarang');
        $namabarang = $this->input->post('namabarang');
        $kategoribarang = $this->input->post('kategoribarang');
        $hargabarang = $this->input->post('hargabarang');
        $stokbarang = $this->input->post('stokbarang');

        $data = array(
            'nama_barang' => $namabarang,
            'kategori_barang' => $kategoribarang,
            'harga_barang' => $hargabarang,
            'stok_barang' => $stokbarang
        );

        $simpan = $this->Model_barang->editbarang($data, $idbarang);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit.</div>');
            redirect('barang');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('barang');
        }
    }
}
