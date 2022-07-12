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
    }
    public function index()
    {
        $data['title']      = 'Beranda';
        $data['footer']     = 'Lukman Aditiya';
        $data['page']       = 'dashboard/index';

        $this->load->view('karyawan/main', $data);
    }
}