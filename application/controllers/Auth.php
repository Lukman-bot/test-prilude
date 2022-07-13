<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function index()
    {
        $this->validasi();
        if ($this->form_validation->run() == false) {
            $data['title']      = 'Login Page';
            $this->load->view('karyawan/login', $data);
        } else {
            $this->db->where('username', $this->input->post('username', TRUE));
            $query = $this->db->get('karyawan');
            if ($query->row_array() > 0) {
                foreach ($query->result() as $k) {
                    if (password_verify($this->input->post('password', TRUE), $k->password)) {
                        $session_data = array(
                            'karyawanid'    => $k->karyawanid,
                            'username'      => $k->username,
                            'photo'         => $k->photo,
                            'is_login'      => TRUE
                        );
                        $this->session->set_userdata($session_data);
                        $this->session->set_flashdata('message', 'Selamat Datang!');

                        redirect('Dashboard');
                    } else {
                        $this->session->set_flashdata('pesan', 'Password yang anda masukkan tidak sesuai, silahkan cek kembali');
                        $data['title']      = 'Login Page';
                        $this->load->view('karyawan/login', $data);
                    }
                }
            } else {
                $this->session->set_flashdata('pesan', 'User yang anda cari tidak ditemukan.!');
                $data['title']      = 'Login Page';
                $this->load->view('karyawan/login', $data);
            }
        }
    }

    public function validasi()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_message('required', '{field} tidak boleh kosong');
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('Auth', 'refresh');
        die();
    }
}

/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */