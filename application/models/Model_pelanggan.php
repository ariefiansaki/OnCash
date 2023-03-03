<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_pelanggan extends CI_Model
{
    function getDataPelanggan()
    {
        return $this->db->get('pelanggan');
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
}
