<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_user extends CI_Model
{

    function rules()
    {
        return [
            [
                'field' => 'id_user',
                'label' => 'id',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_user',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'kategori_user',
                'label' => 'kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'harga_user',
                'label' => 'harga',
                'rules' => 'required'
            ],
            [
                'field' => 'stok_user',
                'label' => 'stok',
                'rules' => 'required'
            ],
        ];
    }

    function getDatauser()
    {
        return $this->db->get('users');
        $this->db->order_by('id_user', 'asc');
    }

    public function getByID($iduser)
    {
        return $this->db->get_where('users', ['id_user' => $iduser])->row();
    }

    function insertuser($data)
    {
        $simpan = $this->db->insert('users', $data);
        $this->db->distinct('users');
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function edituser($data, $iduser)
    {
        $simpan = $this->db->update('users', $data, array('id_user' => $iduser));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
}
