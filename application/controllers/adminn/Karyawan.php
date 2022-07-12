<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Karyawan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mod_karyawan', 'karyawan');
        if ($this->session->userdata('hak_akses') != '2') {
            redirect('adminn/Auth', 'refresh');
        }
    }

    public function index()
    {
        $data = array(
            'title'             => 'Data Karyawan',
            'page'              => 'karyawan/index',
            'footer'            => 'LukmanSoft',
            'dataKaryawan'      => $this->karyawan->getDataKaryawan()->result(),
            'user'              => $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array(),
            'photo'             => $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array()
        );

        $this->load->view('admin/main', $data);
    }

    public function Add()
    {
        if (!$_POST) {
            $input = (object) $this->karyawan->getDefaultValues();
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('username', 'Username', 'is_unique[user.username]', [
            'required'  => "Mohon isi.!!"
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Input Karyawan',
                'page'          => 'karyawan/form',
                'footer'        => 'LukmanSoft',
                'dataakses'     => $this->karyawan->AmbilAkses()->result(),
                'form_action'   => base_url("adminn/Karyawan/Add"),
                'input'         => $input,
                'user'          => $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('admin/main', $data);
        } else {
            $passwordhash=password_hash($this->input->post('password', true),PASSWORD_DEFAULT);
            $data = [
                'username'              => $this->input->post('username', true),
                'password'              => $passwordhash,
            ];

            if (!empty($_FILES['photo']['name'])){
                $imageName = url_title($data['username'], true) . '-' . 'Karyawan';
                $upload = $this->karyawan->uploadImage($imageName);
                $this->_create_thumbs($upload);
                $data['photo']  = $upload;
            }

            $this->karyawan->insert($data);
            $this->session->set_flashdata('success', 'Karyawan Berhsil Ditambahkan.');

            redirect(base_url('adminn/Karyawan/'));
        }
    }

    public function Update($id)
    {
        if(!$_POST) {
            $input = (object) $this->karyawan->getDataById($id);
        } else {
            $input = (object) $this->input->post(null, true);
        }

        $this->form_validation->set_rules('username', 'Username', 'is_unique[user.username]', [
            'required'  => "Mohon isi.!!"
            ]
        );
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required'  => "Mohon diisi.!!"
            ]
        );

        if ($this->form_validation->run() == false) {
            $data = array(
                'title'         => 'Edit Karyawan',
                'page'          => 'karyawan/form',
                'footer'        => 'LukmanSoft',
                'form_action'   => base_url('adminn/Karyawan/Update/' . $id),
                'input'         => $input,
                'user'          => $this->admin->mengambil('user',['namauser' => $this->session->userdata('namauser')])->row_array(),
                'photo'         => $this->admin->mengambil('user',['photo' => $this->session->userdata('photo')])->row_array()
            );

            $this->load->view('admin/main', $data);
        } else {
            $passwordhash=password_hash($this->input->post('password', true),PASSWORD_DEFAULT);
            $data = [
                'username'              => $this->input->post('username', true),
                'password'              => $passwordhash,
            ];

            if (!empty($_FILES['photo']['name'])) {
                $imageName = url_title($data['username'], '-', true) . '-' . 'Karyawan';
                $upload = $this->karyawan->uploadImage($imageName);
                $this->_create_thumbs($upload);

                if ($upload) {
                    $karyawan = $this->karyawan->getDataById($id);

                    if (file_exists('__assets/img/karyawan/' . $karyawan->photo) && $karyawan->photo) {
                        unlink('__assets/img/karyawan/' . $karyawan->photo);
                        unlink('__assets/img/karyawan/thumbs/' . $karyawan->photo);
                    }

                    $data['photo'] = $upload;
                } else {
                    redirect(base_url("adminn/Karyawan/Update/$id"));
                }
            }

            $this->karyawan->update($id, $data);
            $this->session->set_flashdata('success', 'karyawan Berhasil Diupdate.');

            redirect(base_url('adminn/karyawan/'));
        }
    }

    public function Delete()
    {
        $id = $this->input->post('id_hapus', true);
        $karyawan = $this->karyawan->getDataById($id);

        if (file_exists('__assets/img/karyawan/' . $karyawan->photo) && $karyawan->photo) {
            unlink('__assets/img/karyawan/' . $karyawan->photo);
            unlink('__assets/img/karyawan/thumbs/' . $karyawan->photo);
        }

        $this->karyawan->delete($id);
        $this->session->set_flashdata('success', 'Karyawan Berhasil dihapus');

        redirect(base_url('adminn/Karyawan/'));
    }

    public function _create_thumbs($file_name) 
    {
        $config = [
            // Thumbnail Image
            [
                'image_library'         => 'GD2',
                'source_image'          => './__assets/img/karyawan/' . $file_name,
                'maintain_ratio'        => TRUE,
                'width'                 => 350,
                'height'                => 200,
                'new_image'             => './__assets/img/karyawan/thumbs/' . $file_name
            ]
        ];

        $this->load->library('image_lib', $config[0]);

        foreach ($config as $item) {
            $this->image_lib->initialize($item);

            if (!$this->image_lib->resize()) {
                return false;
            }

            $this->image_lib->clear();
        }
    }

    public function Getid($karyawanid=null)
    {
        $this->db->where('karyawanid', $karyawanid);
        $data=$this->db->get('karyawan')->row();
        echo json_encode($data);
    }

}