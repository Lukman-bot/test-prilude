<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Absen extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('hak_akses') != '2') {
            redirect('adminn/Auth', 'refresh');
        }
        $this->load->model('Mod_absen', 'absen');
    }

    public function index()
    {
        $data['title']      = 'Data Absen';
        $data['footer']     = 'Lukman Aditiya';
        $data['page']       = 'absen/index';
        $data['user']       = $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array();
        $data['photo']      = $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array();
        $data['dataAbsen']  = $this->absen->getDataAbsen()->result();

        $this->load->view('admin/main', $data);
    }
}