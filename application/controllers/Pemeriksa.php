<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksa extends CI_Controller
{
    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        // cegah role lain masuk dan yang sudah login
        if($role_id == 2 && $logged){
            $data['title'] = "Dashboard";
            $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();
    
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('pemeriksa/index', $data);
            $this->load->view('templates/footer');
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak memiliki akses</div>');
            redirect('auth');
        }
    }
}
