<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '2') {
            redirect('adminn/Auth', 'refresh');
        }
    }

    public function index()
    {
        $data['title']      = 'Beranda';
        $data['footer']     = 'Lukman Aditiya';
        $data['page']       = 'dashboard/index';
        $data['user']       = $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array();
        $data['photo']      = $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array();

        $this->load->view('admin/main', $data);
    }
    
}