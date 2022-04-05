<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    var $role_id, $role;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Maintenance_model');
        $this->role_id = $this->session->userdata('role_id'); //For role id
        if($this->role_id == 1){
            $this->role = 'admin';
        }elseif($this->role_id == 2){
            $this->role = 'pemeriksa';
        }elseif($this->role_id == 3){
            $this->role = 'staff';
        }else{
            $this->role = 'umum';
        }
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        if($role_id == 4 && $logged){
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();    

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak memiliki akses</div>');
            redirect('auth');
        }
    }

    public function pMaintenance(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Maintenance";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function pTransportasi(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Transportasi";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/transportasi', $data);
        $this->load->view('templates/footer');
    }

    public function pEkspedisi(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function rMaintenance(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Maintenance";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function rTransportasi(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Transportasi";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/transportasi', $data);
        $this->load->view('templates/footer');
    }

    public function rEkspedisi(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function mUser(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen User";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/user', $data);
        $this->load->view('templates/footer');
    }

    public function mMobil(){
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen Mobil";
        $data['role_id'] = $role_id;
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/mobil', $data);
        $this->load->view('templates/footer');
    }

    public function mTambah(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Tambah Maintenance";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        // Set Rules
        $this->form_validation->set_rules('nama', 'Nama', 'required',array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required',array(
            'required' => 'Divisi harus diisi !'
        ));
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required',array(
            'required' => 'Permintaan harus diisi !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required',array(
            'required' => 'Tanggal harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required',array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        if($this->form_validation->run() == false){
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/tambah_m', $data);
            $this->load->view('templates/footer');
        }else{
            $id = $this->session->userdata('id');
            $this->Maintenance_model->tambahMaintenance();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan');
            redirect('pemeriksa/pMaintenance');
        }
    }
}
