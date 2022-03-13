<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index(){
        // Rules
        // Mengecek semua input sudah sesuai rules
        $this->form_validation->set_rules('nik', 'NIK', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'LARAS | Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login(){
        $nik = $this->input->post('nik');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['nik' => $nik])->row_array();
        if($user){
            if($password == $user['password']){
                // Mengirim data menggunakan session
                $data = [
                    'nama' => $user['name'],
                    'nik' => $user['nik'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                $this->session->set_userdata('logged',true);

                // cek role
                if($user['role_id'] == 1){
                    redirect('admin');
                }elseif($user['role_id'] == 2){
                    redirect('pemeriksa');
                }elseif($user['role_id'] == 3){
                    redirect('staff');
                }else{
                    redirect('umum');
                }
            }else{
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Password salah</div>');
                redirect(base_url(''));
            }
        }else{
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">NIK tidak terdaftar</div>');
            redirect(base_url(''));
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('role_id');

        // Redirect ke login page
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berhasil Logout</div>'); // Menampilkan pesan berhasil

        redirect(base_url('')); //Redirect ke base url
    }
}