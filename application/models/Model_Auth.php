<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_Auth extends CI_Model
{
    function getlogin($email, $password)
    {
        return $this->db->get_where('users', array('email' => $email, 'password' => $password));
    }

    public function login($post)
    {
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where('email', $post['email']);
        $this->db->where('password', sha1($post['password']));
        $query = $this->db->get();
        return $query;
    }
}
