<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_supplier extends CI_Model
{

    function rules()
    {
        return [
            [
                'field' => 'id_supplier',
                'label' => 'id',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_supplier',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'kategori_supplier',
                'label' => 'kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'harga_supplier',
                'label' => 'harga',
                'rules' => 'required'
            ],
            [
                'field' => 'stok_supplier',
                'label' => 'stok',
                'rules' => 'required'
            ],
        ];
    }

    function getDatasupplier()
    {
        return $this->db->get('supplier');
        $this->db->order_by('id_supplier', 'asc');
    }

    public function getByID($idsupplier)
    {
        return $this->db->get_where('supplier', ['id_supplier' => $idsupplier])->row();
    }

    function insertsupplier($data)
    {
        $simpan = $this->db->insert('supplier', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function editsupplier($data, $idsupplier)
    {
        $simpan = $this->db->update('supplier', $data, array('id_supplier' => $idsupplier));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
}
