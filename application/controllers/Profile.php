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

        $this->load->view('karyawan/main', $data);
    }
}