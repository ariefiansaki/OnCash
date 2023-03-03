<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_user');
        $this->load->library('form_validation');
    }

    function index()
    {
        $data['user'] = $this->Model_user->getDatauser()->result();
        $this->load->view('template/header');
        // $this->load->view('template/topbar');
        $this->load->view('template/sidebar');
        $this->load->view('user/view_user', $data);
        $this->load->view('template/footer');
    }

    // function inputuser()
    // {
    //     $this->load->view('user/input_user');
    // }

    function simpanuser()
    {
        $user = $this->Model_user;
        $iduser = $this->input->post('id_user');
        $namalengkap = $this->input->post('namalengkap');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $level = $this->input->post('level');
        $this->form_validation->set_rules($user->rules());

        $data = array(
            'id_user' => $iduser,
            'nama_lengkap' => $namalengkap,
            'no_hp' => $phone,
            'email' => $email,
            'password' => $password,
            'level' => $level
        );

        $simpan = $this->Model_user->insertuser($data);
        if ($simpan == 1) {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Berhasil Menambah User.</div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('msg', '<div class="alert alert-success" role="alert">Anda Gagal Menambah User.</div>');
            redirect('user');
        }
    }

    function hapus($iduser)
    {
        if ($iduser == "") {
            redirect('user');
        } else {
            $this->db->where('id_user', $iduser);
            $this->db->delete('users');
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus User.</div>');
            redirect('user');
        }
    }

    function edit()
    {
        $model = new Model_user();
        $data['users'] = $model->where('id_user', $iduser)->first();
        redirect('user');
    }

    function updateuser()
    {
        $iduser = $this->input->post('id_user');
        $namalengkap = $this->input->post('nama_lengkap');
        $phone = $this->input->post('phone');
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $level = $this->input->post('level');

        $data = array(
            'id_user' => $iduser,
            'nama_lengkap' => $namalengkap,
            'no_hp' => $phone,
            'email' => $email,
            'password' => $password,
            'level' => $level
        );

        $simpan = $this->Model_user->edituser($data, $iduser);
        if ($simpan == 1) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Mengedit.</div>');
            redirect('user');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Berhasil Menghapus.</div>');
            redirect('user');
        }
    }
}
