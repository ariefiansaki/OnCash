<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Model_barang extends CI_Model
{

    function rules()
    {
        return [
            [
                'field' => 'id_barang',
                'label' => 'id',
                'rules' => 'required'
            ],
            [
                'field' => 'nama_barang',
                'label' => 'nama',
                'rules' => 'required'
            ],
            [
                'field' => 'kategori_barang',
                'label' => 'kategori',
                'rules' => 'required'
            ],
            [
                'field' => 'harga_barang',
                'label' => 'harga',
                'rules' => 'required'
            ],
            [
                'field' => 'stok_barang',
                'label' => 'stok',
                'rules' => 'required'
            ],
        ];
    }

    function getDataBarang()
    {
        return $this->db->get('barang');
        $this->db->order_by('id_barang', 'asc');
    }

    public function getByID($idbarang)
    {
        return $this->db->get_where('barang', ['id_barang' => $idbarang])->row();
    }

    function insertbarang($data)
    {
        $simpan = $this->db->insert('barang', $data);
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function editbarang($data, $idbarang)
    {
        $simpan = $this->db->update('barang', $data, array('id_barang' => $idbarang));
        if ($simpan) {
            return 1;
        } else {
            return 0;
        }
    }

    function check_barcode($code, $id = null)
    {
        $this->db->from('barang');
        $this->db->where('barcode', $code);
        if ($id != null) {
            $this->db->where('item_id !=', $id);
        }
        $query = $this->db->get();
        return $query;
    }
}
