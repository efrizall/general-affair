<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    var $role_id, $role;
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Maintenance_model');
        $this->load->model('Ekspedisi_model');
        $this->load->model('Approval_model');
        $this->load->model('User_model');
        $this->load->model('Transportasi_model');
        $this->load->model('Divisi_model');
        $this->role_id = $this->session->userdata('role_id'); //For role id
        if ($this->role_id == 1) {
            $this->role = 'admin';
        } elseif ($this->role_id == 2) {
            $this->role = 'pemeriksa';
        } elseif ($this->role_id == 3) {
            $this->role = 'staff';
        } else {
            $this->role = 'umum';
        }
    }

    public function index()
    {
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        if ($role_id == 4 && $logged) {
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['role'] = $this->role;
            $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('umum/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert"> Anda tidak memiliki akses</div>');
            redirect('auth');
        }
    }

    public function pMaintenance()
    {
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

    public function pTransportasi()
    {
        $data['title'] = "Transportasi";
        $data['data'] = $this->Transportasi_model->selectTransportasi();
        $data['role_id'] = $this->role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/transportasi', $data);
        $this->load->view('templates/footer');
    }

    public function pEkspedisi()
    {
        $data['title'] = "Ekspedisi";
        $data['data'] = $this->Ekspedisi_model->selectEkspedisi();
        $data['role_id'] = $this->role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function mTambah()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Tambah Maintenance";
        $data['role_id'] = $this->role_id;
        $data['divisi'] = $this->Divisi_model->getDivisi();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();


        // Set Rules
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', array(
            'required' => 'Divisi harus diisi !'
        ));
        $this->form_validation->set_rules('permintaan', 'Permintaan', 'required', array(
            'required' => 'Permintaan harus diisi !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array(
            'required' => 'Tanggal harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required', array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/tambah_m', $data);
            $this->load->view('templates/footer');
        } else {
            $id = $this->session->userdata('id');
            $this->Maintenance_model->tambahMaintenance();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan'
            );
            redirect('umum/pMaintenance');
        }
    }


    public function tTambah()
    {
        $data['title'] = "Tambah Transportasi";
        $data['role_id'] = $this->role_id;
        $data['mobil'] = $this->Maintenance_model->select('mobil');
        $data['pemeriksa'] = $this->Maintenance_model->select('pemeriksa');
        $data['divisi'] = $this->Divisi_model->getDivisi();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', array(
            'required' => 'Divisi harus diisi !'
        ));
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required', array(
            'required' => 'Tujuan harus diisi !'
        ));
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required', array(
            'required' => 'Keperluan harus diisi !'
        ));
        $this->form_validation->set_rules('tanggal_pakai', 'Tanggal Pakai', 'required', array(
            'required' => 'Tanggal pakai harus ditentukan !'
        ));
        $this->form_validation->set_rules('tanggal_kembali', 'Tanggal Kembali', 'required', array(
            'required' => 'Tanggal kembali harus ditentukan !'
        ));
        $this->form_validation->set_rules('jam_pakai', 'Jam Pakai', 'required', array(
            'required' => 'Jam pakai harus diisi !'
        ));
        $this->form_validation->set_rules('jam_kembali', 'Jam Kembali', 'required', array(
            'required' => 'Jam kembali harus diisi !'
        ));
        $this->form_validation->set_rules('mobil', 'Jenis Mobil', 'required', array(
            'required' => 'Jenis mobil harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required', array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array(
            'required' => 'Tanggal harus ditentukan !'
        ));
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/tambah_t', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Transportasi_model->tambahTransportasi();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan'
            );
            redirect('umum/pTransportasi');
        }
    }
}
