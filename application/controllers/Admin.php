<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    var $role_id, $role;
    public function __construct(){
        parent::__construct();
        $this->load->model('Maintenance_model');
        $this->role_id = $this->session->userdata('role_id'); //For role id
        if($this->role_id == 1){
            $this->role = 'admin';
        }elseif($this->role == 2){
            $this->role = 'pemeriksa';
        }elseif($this->role == 3){
            $this->role = 'staff';
        }else{
            $this->role = 'umum';
        }
    }

    public function index(){
        $role_id = $this->role_id;
        $logged = $this->session->userdata('logged');

        if($role_id == 1 && $logged){
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();    

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak memiliki akses</div>');
            redirect('auth');
        }
    }

    public function pMaintenance(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Maintenance";
        $data['data'] = $this->Maintenance_model->select('maintenance');
        $data['role_id'] = $this->role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function pTransportasi(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Transportasi";
        $data['data'] = $this->Maintenance_model->select('transportasi');
        $data['role_id'] = $this->role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/transportasi', $data);
        $this->load->view('templates/footer',$data);
    }

    public function pEkspedisi(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function rMaintenance(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Maintenance";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/maintenance', $data);
        $this->load->view('templates/footer');
    }

    public function rTransportasi(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Transportasi";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/transportasi', $data);
        $this->load->view('templates/footer');
    }

    public function rEkspedisi(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('rekap/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function mUser(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen User";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/user', $data);
        $this->load->view('templates/footer');
    }

    public function mMobil(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen Mobil";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/mobil', $data);
        $this->load->view('templates/footer');
    }

    public function mDetail($id){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        $data['data'] = $this->Maintenance_model->selectId('maintenance',$id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_m', $data);
        $this->load->view('templates/footer');
    }

    public function tDetail(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_t', $data);
        $this->load->view('templates/footer');
    }

    public function eDetail(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_e', $data);
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
            $this->Maintenance_model->tambahMaintenance();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan');
            redirect('admin/pMaintenance');
        }
    }

    public function tTambah(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/tambah_t', $data);
        $this->load->view('templates/footer');
    }

    public function eTambah(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/tambah_e', $data);
        $this->load->view('templates/footer');
    }

    public function mEdit(){

        $data['title'] = "Edit";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/edit_m', $data);
        $this->load->view('templates/footer');
    }

    public function tEdit(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/edit_t', $data);
        $this->load->view('templates/footer');
    }

    public function eEdit(){
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        // $data['data'] = $this->Maintenance_model->selectId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/edit_e', $data);
        $this->load->view('templates/footer');
    }

    public function tambahProses(){
        $nama = $this->session->userdata('nama');
        $divisi = $this->session->userdata('divisi');
        $id = $this->input->post('id');

        $this->form_validation->set_rules('status', 'Status', 'required',array(
            'required' => 'Status harus diubah !'
        ));

        // Jika catatan proses ada maka..
        $cek_proses = $this->db->get_where('proses', ['maintenance_id' => $id])->row_array();
        if($cek_proses){
            $this->Maintenance_model->updateProses($id); // Diupdate saja
        }else{
            $this->Maintenance_model->tambahProses($id, $nama, $divisi); //Jika tidak ada ditambah prosesnya
        }
        $this->Maintenance_model->updateStatus($id);
        $this->session->set_flashdata(
            'berhasil',
            'Proses diubah');
        redirect('admin/pMaintenance');
    }

    public function mHapus($id){
        $this->Maintenance_model->hapusMaintenance($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus');
        redirect('admin/pMaintenance');
    }
}
