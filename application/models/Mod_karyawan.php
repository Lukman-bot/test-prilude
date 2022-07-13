<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mod_karyawan extends CI_Model {
    public function getDataKaryawan()
    {   
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->get();
    }

    public function getIdKaryawan()
    {   
        $this->db->select('*');
        $this->db->from('karyawan');
        return $this->db->get();
    }

    public function getDefaultValues()
    {
        return [
            'username'          => '',
            'password'          => '',
            'photo'             => ''
        ];
    }

    public function uploadImage($imageName)
    {
        $config = [
            'upload_path'           => './__assets/img/karyawan',
            'file_name'             => $imageName,
            'allowed_types'         => 'jpg|jpeg|png|JPG|PNG',
            'max_size'              => 3000,
            'max_width'             => 0,
            'max_height'            => 0,
            'overwrite'             => TRUE,
            'file_ext_tollower'     => TRUE
        ];

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('photo')) {
            return $this->upload->data('file_name');
        } else {
            $this->session->set_flashdata('image_error', 'Jenis file yang diupload tidak diizinkan atau file terlalu besar.');
            return false;
        }

    }

    public function insert($data)
    {
        $this->db->insert('karyawan', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('karyawan', ['karyawanid' => $id])->row();
    }

    public function update($id, $data)
    {
        $this->db->update('karyawan', $data, ['karyawanid' => $id]);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where('karyawanid', $id);
        $this->db->delete('karyawan');
    }

    public function AmbilAkses()
    {
        return $this->db->get('akses');
    }

    public function getDetail($karyawanid)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('detailkaryawan', 'karyawan.karyawanid=detailkaryawan.idkaryawan', 'left');
        $this->db->where('karyawan.karyawanid', $karyawanid);
        return $this->db->get();
    }

    public function AddDetail()
    {
        $idkaryawan         = $this->input->post('idkaryawan', TRUE);
        $nama               = $this->input->post('namakaryawan', TRUE);
        $notelepon          = $this->input->post('noteleponkaryawan', TRUE);
        $emailkaryawan      = $this->input->post('emailkaryawan', TRUE);
        $kotalahir          = $this->input->post('kotalahirkaryawan', TRUE);
        $tanggallahir       = $this->input->post('tanggallahirkaryawan', TRUE);
        $nik                = $this->input->post('nikkaryawan', TRUE);
        $alamat             = $this->input->post('alamatkaryawan', TRUE);

        $data=array(
            'idkaryawan'            => $idkaryawan,
            'namakaryawan'          => $nama,
            'noteleponkaryawan'     => $notelepon,
            'emailkaryawan'         => $emailkaryawan,
            'kotalahirkaryawan'     => $kotalahir,
            'tanggallahirkaryawan'  => $tanggallahir,
            'nikkaryawan'           => $nik,
            'alamatkaryawan'        => $alamat
        );

        $this->db->insert('detailkaryawan', $data);
    }

    public function getProfile($karyawanid)
    {
        $this->db->select('*');
        $this->db->from('karyawan');
        $this->db->join('detailkaryawan', 'karyawan.karyawanid=detailkaryawan.idkaryawan', 'left');
        $this->db->where('karyawan.karyawanid', $karyawanid);

        return $this->db->get();
    }
}