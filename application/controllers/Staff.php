<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Staff extends CI_Controller
{

    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        if($role_id == 3 && $logged){
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();    

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('staff/index', $data);
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/mobil', $data);
        $this->load->view('templates/footer');
    }
}
