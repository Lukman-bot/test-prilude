<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_absen extends CI_Model
{
    public function getDataAbsen()
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.karyawanid=absen.idkaryawan', 'left');
        $this->db->join('detailkaryawan', 'karyawan.karyawanid=detailkaryawan.idkaryawan', 'left');
        $this->db->order_by('tanggal', 'desc');
        return $this->db->get();
    }

    public function getDefaultValuesAbsen()
    {
        return [
            'idkaryawan'    => '',
            'tanggal'       => '',
            'absen'         => ''
        ];
    }

    public function insertAbsen($data)
    {
        $this->db->insert('absen', $data);
    }

    public function getAbsenKaryawan($idkaryawan)
    {
        $this->db->select('*');
        $this->db->from('absen');
        $this->db->join('karyawan', 'karyawan.karyawanid=absen.idkaryawan', 'left');
        $this->db->join('detailkaryawan', 'karyawan.karyawanid=detailkaryawan.idkaryawan', 'left');
        $this->db->order_by('tanggal', 'desc');
        $this->db->where('karyawan.karyawanid', $idkaryawan);
        return $this->db->get();
    }
}