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

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->absen->getDefaultValuesAbsen();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('tanggal', 'Tanggal Absen', 'required', [
            'required'  => "Mohon dipilih.!!"
            ]
        );
        $this->form_validation->set_rules('absen', 'Absen', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input Absen',
                'page'          => 'absen/form',
                'footer'        => 'Lukman Aditiya',
                'form_action'   => base_url("adminn/Absen/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('admin/main', $data);
        } else {
            $data = [
                'idkaryawan'     => $this->input->post('idkaryawan', true),
                'tanggal'        => $this->input->post('tanggal', true),
                'absen'          => $this->input->post('absen', true)
            ];

            $this->absen->insertAbsen($data);
            $this->session->set_flashdata('success', 'Absen Berhsil Ditambahkan.');

            redirect(base_url('adminn/Absen'));
        }
    }
}