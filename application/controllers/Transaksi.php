<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model('Model_barang');
    }

    function index()
    {
        $data['barang'] = $this->Model_barang->getDataBarang()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/view_transaksi', $data);
        $this->load->view('template/footer');
    }

    function addToCart()
    {
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => $this->input->post('qty'),
            'price'   => $this->input->post('price'),
            'name'    => $this->input->post('name'),
        );
        $this->cart->insert($data);
        redirect('transaksi');
    }

    function detailCart()
    {
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/view_cart');
        $this->load->view('template/footer');
    }

    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        // var_dump($rowid);
        // die;
        redirect('transaksi/detailCart');
    }

    public function update()
    {
        $cart = $this->cart->contents();
        $i = 1;
        foreach ($cart as $item) {
            $data = array(
                'rowid' => $item['rowid'],
                'qty'   => $this->input->post($i . '[qty]'),
            );
            var_dump($data);
            die;
            $this->cart->update($data);
            $i++;
        }
        redirect('transaksi/detailCart');
    }

    public function clear()
    {
        $this->cart->destroy($data);
        redirect('transaksi/detailCart');
    }

    public function checkout()
    {
        $cart = $this->cart->contents();

        foreach ($cart as $item) {
            $data = array(
                'date' => date('Y-m-d'),
                'qty' => $this->cart->total_items(),
                'subtotal' => $this->cart->total(),
            );
            $this->db->insert('detail_transaksi', $data);
            $this->cart->destroy($data);
            redirect('transaksi');
        }
    }

    function barcode($id)
    {
        $this->data['barang'] = $this->Model_barang->getByID($id);
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('transaksi/barcode', $this->data);
        $this->load->view('template/footer');
    }

    // function inputtransaksi()
    // {
    //     $this->load->view('template/header');
    //     // $this->load->view('template/topbar');
    //     $this->load->view('template/sidebar');
    //     $this->load->view('transaksi/input_transaksi');
    //     // $this->load->view('template/footer');
    // }
}
