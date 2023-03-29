<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Model_Auth', 'auth_model');
        $this->load->library('session');
        $this->load->database();
    }

    function login()
    {
        checklog();
        $this->load->view('auth/login');
    }

    function ceklogin()
    {
        // $email = $this->input->post('email');
        // $password = $this->input->post('password');
        // $login = $this->Model_Auth->getlogin($email, $password);
        // $ceklogin = $login->num_rows();
        // $datalogin = $login->row_array();
        // $data = array(
        //     'id' => $datalogin['id_user'],
        //     'email' => $datalogin['email'],
        //     'password' => $datalogin['password'],
        //     'level' => $datalogin['level'],
        //     'role' => $datalogin['role']
        // );
        // $this->session->set_userdata($data);
        // if ($ceklogin == 'administator') {
        //     redirect('dashboard');
        // } else {
        //     $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Email atau Password salah!.</div>');
        //     redirect('Auth/login');
        // }

        $post = $this->input->post(null, true);
        if (isset($post['login'])) {
            $query = $this->auth_model->login($post);
            if ($query->num_rows() > 0) {
                $row = $query->row();
                $params = array(
                    'userid' => $row->id_user,
                    'level' => $row->level
                );
                if ($params['level'] == 1) {
                    $this->session->set_userdata($params);
                    echo "<script>
                    alert('Selamat Login Berhasil ADMIN');
                    window.location='" . site_url('dashboard') . "'
                    </script>";
                } else if ($params['level'] == 2) {
                    // $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Anda Gagal Login.</div>');
                    // redirect('auth');
                    $this->session->set_userdata($params);
                    var_dump($params['level'] == 2);
                    die;
                    echo "<script>
                    alert('Selamat Login Berhasil KASIR');
                    window.location='" . site_url('transaksi') . "'
                    </script>";
                }
            } else {
                echo "<script>
				alert('Maaf Login Gagal');
				window.location='" . site_url('auth/login') . "'
				</script>";
            }
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
        redirect('auth/login');
    }
}
