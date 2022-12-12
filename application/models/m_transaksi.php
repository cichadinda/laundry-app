<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_transaksi extends CI_Model {

public function getHargaPaket($kode_paket)
{
    $thhis->db->where('kode_paket', $kode_paket);
    return $this->db->get('paket')->row_array();
}

}