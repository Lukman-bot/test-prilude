<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_absen extends CI_Model
{
    public function getDataAbsen()
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('detailkaryawan', 'absen.iddetailkaryawan=detailkaryawan.detailid', 'left');
        return $this->db->get();
    }
}