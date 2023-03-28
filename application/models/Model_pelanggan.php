<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelanggan extends CI_Model
{
    function getDatapelanggan()
    {
        return $this->db->get('pelanggan');
        $this->db->order_by('id_pelanggan', 'asc');
    }

    public function getByID($idpelanggan)
    {
        return $this->db->get_where('pelanggan', ['id_pelanggan' => $idpelanggan])->row();
    }

    function insertpelanggan($data)
    {
        $simpan = $this->db->insert('pelanggan', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function editpelanggan($data, $idpelanggan)
    {
        $simpan = $this->db->update('pelanggan', $data, array('id_pelanggan' => $idpelanggan));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
}
