<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_detail extends CI_Model
{

    function getDatatransaksi()
    {
        return $this->db->get('detail_transaksi');
        $this->db->order_by('id_transaksi', 'asc');
    }

    public function getByID($idtransaksi)
    {
        return $this->db->get_where('transaksi', ['id_transaksi' => $idtransaksi])->row();
    }

    function inserttransaksi($data)
    {
        $simpan = $this->db->insert('transaksi', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function edittransaksi($data, $idtransaksi)
    {
        $simpan = $this->db->update('transaksi', $data, array('id_transaksi' => $idtransaksi));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }
}
