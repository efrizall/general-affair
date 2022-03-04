<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksa extends CI_Controller
{
    public function index()
    {
        $data['title'] = "Dashboard";
        $data['user'] = $this->db->get_where('user', ['nik' => $this->session->userdata('nik')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pemeriksa/index', $data);
        $this->load->view('templates/footer');
    }
}
