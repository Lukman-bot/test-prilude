<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $is_login   = $this->session->userdata('is_login');
        if (!$is_login) {
            redirect(base_url());
            return;
        }
        $idkaryawan = $this->session->userdata('karyawanid');
        $this->load->model('Mod_absen', 'absen');
    }

    public function index($idkaryawan)
    {
        $data['title']      = 'Beranda';
        $data['footer']     = 'Lukman Aditiya';
        $data['page']       = 'dashboard/index';
        $data['dataAbsen']  = $this->absen->getAbsenKaryawan($idkaryawan)->result();

        $this->load->view('karyawan/main', $data);
    }
}