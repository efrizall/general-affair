<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
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
        $this->load->model('Mobil_model');
        $this->load->model('Divisi_model');
        $this->role_id = $this->session->userdata('role_id'); //For role id
        if ($this->role_id == 1) {
            $this->role = 'admin';
        } elseif ($this->role == 2) {
            $this->role = 'pemeriksa';
        } elseif ($this->role == 3) {
            $this->role = 'staff';
        } else {
            $this->role = 'umum';
        }
    }

    public function index()
    {
        $role_id = $this->role_id;
        $logged = $this->session->userdata('logged');

        if ($role_id == 1 && $logged) {
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
            $data['data_maintenance'] = $this->Maintenance_model->hitungMaintenance();
            $data['data_transportasi'] = $this->Transportasi_model->hitungTransportasi();
            $data['data_ekspedisi'] = $this->Ekspedisi_model->hitungEkspedisi();
            $data['selesai'] = [
                'm' => $this->Maintenance_model->hitungMaintenanceWhere('Selesai'),
                't' => $this->Transportasi_model->hitungTransportasiWhere('Sudah Dikembalikan')
            ];
            $data['sedang_diproses'] = $this->Maintenance_model->hitungMaintenanceWhere('Sedang diproses');
            $data['belum_diproses'] = [
                'm' => $this->Maintenance_model->hitungMaintenanceWhere('Belum diproses'),
                't' => $this->Transportasi_model->hitungTransportasiWhere('Belum Dikembalikan')
            ];

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('index', $data);
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
        // $role_id = $this->session->userdata('role_id');
        $this->load->helper('date');

        $data['title'] = "Transportasi";
        $data['data'] = $this->Maintenance_model->select('transportasi');
        $data['role_id'] = $this->role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['waktu'] = date("d M Y");
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/transportasi', $data);
        $this->load->view('templates/footer');
    }

    public function pEkspedisi()
    {
        // $role_id = $this->session->userdata('role_id');

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

    public function rMaintenance()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Maintenance";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('mulai', 'Mulai', 'required', array(
            'required' => 'Mulai harus diisi !'
        ));
        $this->form_validation->set_rules('akhir', 'Akhir', 'required', array(
            'required' => 'Akhir harus diisi !'
        ));

        $mulai = $this->input->post('mulai', true);
        $akhir = $this->input->post('akhir', true);
        $tes = $this->input->post('tes');
        $data['result'] = $this->Maintenance_model->selectMaintenanceWhere($mulai, $akhir);

        if ($this->form_validation->run() == false) {
            // $data['result'] = $this->Maintenance_model->selectMaintenanceWhere();
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/maintenance_staff', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/maintenance_staff', $data);
            $this->load->view('templates/footer');
        }
    }

    public function rTransportasi()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Transportasi";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('mulai', 'Mulai', 'required', array(
            'required' => 'Mulai harus diisi !'
        ));
        $this->form_validation->set_rules('akhir', 'Akhir', 'required', array(
            'required' => 'Akhir harus diisi !'
        ));

        $mulai = $this->input->post('mulai', true);
        $akhir = $this->input->post('akhir', true);
        $tes = $this->input->post('tes');
        $data['result'] = $this->Transportasi_model->selectTransportasiWhere($mulai, $akhir);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/transportasi_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/transportasi_admin', $data);
            $this->load->view('templates/footer');
        }
    }

    public function rEkspedisi()
    {
        $role_id = $this->session->userdata('role_id');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('mulai', 'Mulai', 'required', array(
            'required' => 'Mulai harus diisi !'
        ));
        $this->form_validation->set_rules('akhir', 'Akhir', 'required', array(
            'required' => 'Akhir harus diisi !'
        ));

        $mulai = $this->input->post('mulai', true);
        $akhir = $this->input->post('akhir', true);
        $data['result'] = $this->Ekspedisi_model->selectEkspedisiWhere($mulai, $akhir);

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/ekspedisi_admin', $data);
            $this->load->view('templates/footer');
        } else {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('rekap/ekspedisi_admin', $data);
            $this->load->view('templates/footer');
        }
    }

    public function mUser()
    {
        $data['title'] = "Manajemen User";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['data'] = $this->User_model->selectUser();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/user', $data);
        $this->load->view('templates/footer');
    }

    public function tambahUser()
    {
        $data['title'] = "Manajemen User";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim|is_unique[user.nip]', array(
            'required' => 'NIP harus diisi !',
            'is_unique' => 'NIP sudah terdaftar'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim', array(
            'required' => 'Password harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', array(
            'required' => 'Divisi harus dipilih !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/tambah_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->tambahUser();
            $this->session->set_flashdata(
                'berhasil',
                'User ditambahkan'
            );
            redirect('admin/mUser');
        }
    }

    public function editUser($id)
    {
        $data['title'] = "Manajemen User";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['data'] = $this->User_model->selectUserId($id);

        // Set Rules
        $this->form_validation->set_rules('nip', 'NIP', 'required|trim', array(
            'required' => 'NIP harus diisi !'
        ));
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required|trim', array(
            'required' => 'Password harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', array(
            'required' => 'Divisi harus dipilih !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/edit_user', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->editUser($id);
            $this->session->set_flashdata(
                'berhasil',
                'User diubah'
            );
            redirect('admin/mUser');
        }
    }

    public function hapusUser($id)
    {
        $this->User_model->hapus($id);
        $this->session->set_flashdata(
            'berhasil',
            'User dihapus'
        );
        redirect('admin/mUser');
    }

    public function mMobil()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen Mobil";
        $data['role_id'] = $this->role_id;
        $data['data'] = $this->Mobil_model->select();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('manajemen/mobil', $data);
        $this->load->view('templates/footer');
    }

    public function tambahMobil()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Manajemen Mobil";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', array(
            'required' => 'Jenis harus diisi !'
        ));
        $this->form_validation->set_rules('nopol', 'No Polisi', 'required', array(
            'required' => 'No Polisi harus diisi !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/tambah_mobil', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mobil_model->tambah();
            $this->session->set_flashdata(
                'berhasil',
                'Mobil ditambahkan'
            );
            redirect('admin/mMobil');
        }
    }

    public function hapusMobil($id)
    {
        $this->Mobil_model->hapus($id);
        $this->session->set_flashdata(
            'berhasil',
            'Data mobil dihapus'
        );
        redirect('admin/mMobil');
    }

    public function editMobil($id)
    {
        $data['title'] = "Edit Mobil";
        $data['role_id'] = $this->role_id;
        $data['data'] = $this->Mobil_model->selectId($id);
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('jenis', 'Jenis', 'required', array(
            'required' => 'Jenis harus diisi !'
        ));
        $this->form_validation->set_rules('nopol', 'No Polisi', 'required', array(
            'required' => 'No Polisi harus diisi !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('manajemen/edit_mobil', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mobil_model->edit($id);
            $this->session->set_flashdata(
                'berhasil',
                'Data Mobil diedit'
            );
            redirect('admin/mMobil');
        }
    }

    public function mDetail($id)
    {
        $data['title'] = "Detail";
        $data['data'] = $this->Maintenance_model->selectId('maintenance', $id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_m', $data);
        $this->load->view('templates/footer');
    }

    public function tDetail($id)
    {
        $data['title'] = "Detail";
        $data['data'] = $this->Transportasi_model->selectTransportasiId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_t', $data);
        $this->load->view('templates/footer');
    }

    public function eDetail($id)
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        $data['data'] = $this->Ekspedisi_model->selectEkspedisiId($id);
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/detail_e', $data);
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
            'required' => 'Divisi harus dipilih !'
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
            $this->Maintenance_model->tambahMaintenance();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan'
            );
            redirect('admin/pMaintenance');
        }
    }

    public function tTambah()
    {

        $data['title'] = "Tambah Transportasi";
        $data['role_id'] = $this->role_id;
        $data['mobil'] = $this->Transportasi_model->selectMobilWhere();
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
            $id = $this->input->post('mobil');
            $this->Transportasi_model->tambahTransportasi();
            $this->Transportasi_model->updateStatusMobil($id);
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan'
            );
            redirect('admin/pTransportasi');
        }
    }

    public function eTambah()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Tambah Ekspedisi";
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
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required', array(
            'required' => 'Tujuan harus diisi !'
        ));
        $this->form_validation->set_rules('sifat', 'Sifat', 'required', array(
            'required' => 'Sifat harus dipilih !'
        ));
        $this->form_validation->set_rules('nosurat', 'No Surat', 'required', array(
            'required' => 'No Surat harus diisi !'
        ));
        $this->form_validation->set_rules('noresi', 'No Resi', 'required', array(
            'required' => 'No Resi harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required', array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal Permintaan', 'required', array(
            'required' => 'Tanggal Permintaan harus dipilih !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/tambah_e', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Ekspedisi_model->tambahEkspedisi();
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan ditambahkan'
            );
            redirect('admin/pEkspedisi');
        }
    }

    public function mEdit($id)
    {
        $data['title'] = "Edit Maintenance";
        $data['data'] = $this->Maintenance_model->selectId('maintenance', $id);
        $data['role_id'] = $this->role_id;
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
            $this->load->view('permintaan/edit_m', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Maintenance_model->editMaintenance($id);
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan diupdate'
            );
            redirect('admin/pMaintenance');
        }
    }

    public function tEdit($id)
    {

        $data['title'] = "Edit Transportasi";
        $data['data'] = $this->Transportasi_model->selectTransportasiId($id);
        $data['mobil'] = $this->Transportasi_model->selectMobil();
        $data['pemeriksa'] = $this->Transportasi_model->selectPemeriksa();
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        // Set Rules
        $this->form_validation->set_rules('nama', 'Nama', 'required', array(
            'required' => 'Nama harus diisi !'
        ));
        $this->form_validation->set_rules('divisi', 'Divisi', 'required', array(
            'required' => 'Divisi harus diisi !'
        ));
        $this->form_validation->set_rules('mobil', 'Jenis mobil', 'required', array(
            'required' => 'Jenis mobil harus dipilih !'
        ));
        $this->form_validation->set_rules('tujuan', 'Tujuan', 'required', array(
            'required' => 'Tujuan harus diisi !'
        ));
        $this->form_validation->set_rules('keperluan', 'Keperluan', 'required', array(
            'required' => 'Keperluan harus diisi !'
        ));
        $this->form_validation->set_rules('tgl_pakai', 'Tanggal pakai', 'required', array(
            'required' => 'Tanggal pakai harus diisi !'
        ));
        $this->form_validation->set_rules('tgl_kembali', 'Tanggal kembali', 'required', array(
            'required' => 'Tanggal kembali harus diisi !'
        ));
        $this->form_validation->set_rules('jam_pakai', 'Jam pakai', 'required', array(
            'required' => 'Jam pakai harus diisi !'
        ));
        $this->form_validation->set_rules('jam_kembali', 'Jam kembali', 'required', array(
            'required' => 'Jam kembali harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required', array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', array(
            'required' => 'Tanggal harus diisi !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/edit_t', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Transportasi_model->editTransportasi($id);
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan diupdate'
            );
            redirect('admin/pTransportasi');
        }
    }

    public function eEdit($id)
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Detail";
        $data['data'] = $this->Ekspedisi_model->selectEkspedisiId($id);
        $data['role_id'] = $this->role_id;
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
        $this->form_validation->set_rules('sifat', 'Sifat', 'required', array(
            'required' => 'Sifat harus dipilih !'
        ));
        $this->form_validation->set_rules('nosurat', 'No Surat', 'required', array(
            'required' => 'No Surat harus diisi !'
        ));
        $this->form_validation->set_rules('noresi', 'No Resi', 'required', array(
            'required' => 'No Resi harus diisi !'
        ));
        $this->form_validation->set_rules('pemeriksa', 'Pemeriksa', 'required', array(
            'required' => 'Pemeriksa harus dipilih !'
        ));
        $this->form_validation->set_rules('tanggal', 'Tanggal Permintaan', 'required', array(
            'required' => 'Tanggal Permintaan harus dipilih !'
        ));

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('permintaan/edit_e', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Ekspedisi_model->editEkspedisi($id);
            $this->session->set_flashdata(
                'berhasil',
                'Permintaan diupdate'
            );
            redirect('admin/pEkspedisi');
        }
    }

    public function tambahProses()
    {
        $nama = $this->session->userdata('nama');
        $divisi = $this->session->userdata('divisi');
        $id = $this->input->post('id');

        $this->form_validation->set_rules('status', 'Status', 'required', array(
            'required' => 'Status harus diubah !'
        ));

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata(
                'Gagal',
                'Proses diubah'
            );
            redirect('admin/pMaintenance');
        } else {
            $this->Maintenance_model->updateStatus($id);
            $this->session->set_flashdata(
                'berhasil',
                'Proses diubah'
            );
            redirect('admin/pMaintenance');
        }

        // Jika catatan proses ada maka..
        // $cek_proses = $this->db->get_where('proses', ['maintenance_id' => $id])->row_array();
        // if ($cek_proses) {
        //     $this->Maintenance_model->updateProses($id); // Diupdate saja
        //     echo 'ada';
        // } else {
        //     $this->Maintenance_model->tambahProses($id, $nama, $divisi); //Jika tidak ada ditambah prosesnya
        //     $this->Maintenance_model->updateStatus($id);
        //     echo 'tidak ada';
        // }
    }

    public function tambahStatus()
    {
        $nama = $this->session->userdata('nama');
        $divisi = $this->session->userdata('divisi');
        $id = $this->input->post('id');

        $this->form_validation->set_rules('status', 'Status', 'required', array(
            'required' => 'Status harus diubah !'
        ));

        // Jika catatan proses ada maka..
        $cek_proses = $this->db->get_where('status_mobil', ['transportasi_id' => $id])->row_array();
        if ($cek_proses) {
            $this->Transportasi_model->updateStatus($id); // Diupdate saja
        } else {
            $this->Transportasi_model->tambahStatus($id, $nama, $divisi); //Jika tidak ada ditambah prosesnya
            $this->Transportasi_model->updateStatus($id);
        }
        $this->session->set_flashdata(
            'berhasil',
            'Status diubah'
        );
        redirect('admin/pTransportasi');
    }

    public function mHapus($id)
    {
        $this->Maintenance_model->hapusMaintenance($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('admin/pMaintenance');
    }

    public function tHapus($id)
    {
        $this->Transportasi_model->hapusTransportasi($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('admin/pTransportasi');
    }

    public function eHapus($id)
    {
        $this->Ekspedisi_model->hapusEkspedisi($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('admin/pEkspedisi');
    }

    public function ttdM($id)
    {
        $this->Approval_model->ttdAvp('maintenance', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan disetujui'
        );
        redirect('admin/pMaintenance');
    }

    public function tolakM($id)
    {
        $this->Approval_model->tolakAvp('maintenance', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan tidak disetujui'
        );
        redirect('admin/pMaintenance');
    }

    public function ttdT($id)
    {
        if ($this->role == 'admin') {
            $this->Approval_model->ttdAvp('transportasi', $id);
        } else {
            $this->Approval_model->ttdPemeriksa('transportasi', $id);
        }

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan disetujui'
        );
        redirect('admin/pTransportasi');
    }

    public function tolakT($id)
    {
        if ($this->role == 'admin') {
            $this->Approval_model->tolakAvp('transportasi', $id);
        } else {
            $this->Approval_model->tolakPemeriksa('transportasi', $id);
        }

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan tidak disetujui'
        );
        redirect('admin/pTransportasi');
    }

    public function ttdE($id)
    {
        $this->Approval_model->ttdAvp('ekspedisi', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan disetujui'
        );
        redirect('admin/pEkspedisi');
    }

    public function tolakE($id)
    {
        $this->Approval_model->tolakAvp('ekspedisi', $id);
        // if ($this->role == 'admin') {
        // } else {
        //     $this->Approval_model->tolakPemeriksa('ekspedisi', $id);
        // }

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan tidak disetujui'
        );
        redirect('admin/pEkspedisi');
    }
}
