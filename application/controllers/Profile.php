<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        if (!$is_login) {
            redirect(base_url());
            return;
        }
        $this->load->model('Mod_karyawan', 'karyawan');
    }

    public function index($karyawanid)
    {
        $data['title']      = 'Profile User';
        $data['footer']     = 'Lukman Aditiya';
        $data['page']       = 'profile/index';
        $data['profile']    = $this->karyawan->getProfile($karyawanid)->row();
        $data['idKaryawan'] = $this->karyawan->getIdKaryawan();

        $this->load->view('karyawan/main', $data);
    }

    public function UpdateDetail()
    {
        $this->form_validation->set_rules('namakaryawan', 'Nama Karyawan', 'required');
        $this->form_validation->set_rules('noteleponkaryawan', 'Nomor Telepon', 'required');
        $this->form_validation->set_rules('emailkaryawan', 'Email', 'required');
        $idkaryawan = $this->input->post('idkaryawan', TRUE);
        $karyawanid = $this->input->post('idkaryawan', TRUE);
        if ($this->form_validation->run()==FALSE) {
            $this->session->set_flashdata('gagal', 'Detail Karyawan Gagal Disimpan');
            redirect("Profile/index/$karyawanid");
        } else {
            $this->karyawan->UpdateDetail($idkaryawan);
            $this->session->set_flashdata('berhasil', 'Data Karyawan Berhasil Disimpan');
            redirect("Profile/index/$karyawanid");
        }
    }
}