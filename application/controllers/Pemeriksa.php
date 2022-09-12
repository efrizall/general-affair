<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemeriksa extends CI_Controller
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

        // cegah role lain masuk dan yang sudah login
        if ($role_id == 2 && $logged) {
            $data['title'] = "Dashboard";
            $data['role_id'] = $role_id;
            $data['role'] = $this->role;
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
        $role_id = $this->session->userdata('role_id');
        $data['role_id'] = $role_id;
        $data['role'] = $this->role;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/maintenance', $data);
        $this->load->view('templates/footer', $data);
    }

    public function pTransportasi()
    {
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        $data['title'] = "Transportasi";
        $data['role_id'] = $role_id;
        $data['data'] = $this->Transportasi_model->selectTransportasi();
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
        $role_id = $this->session->userdata('role_id');
        $logged = $this->session->userdata('logged');

        $data['title'] = "Ekspedisi";
        $data['role_id'] = $role_id;
        $data['role'] = $this->role;
        $data['data'] = $this->Ekspedisi_model->selectEkspedisi();
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('permintaan/ekspedisi', $data);
        $this->load->view('templates/footer');
    }

    public function mDetail($id)
    {
        // $role_id = $this->session->userdata('role_id');

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
        // $role_id = $this->session->userdata('role_id');

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
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['divisi'] = $this->Divisi_model->getDivisi();


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
            redirect('pemeriksa/pMaintenance');
        }
    }

    public function tTambah()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Tambah Transportasi";
        $data['role_id'] = $this->role_id;
        $data['mobil'] = $this->Maintenance_model->select('mobil');
        $data['pemeriksa'] = $this->Maintenance_model->select('pemeriksa');
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['divisi'] = $this->Divisi_model->getDivisi();

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
            redirect('pemeriksa/pTransportasi');
        }
    }

    public function eTambah()
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Tambah Ekspedisi";
        $data['role_id'] = $this->role_id;
        $data['user'] = $this->db->get_where('user', ['nip' => $this->session->userdata('nip')])->row_array();
        $data['divisi'] = $this->Divisi_model->getDivisi();

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
            redirect('pemeriksa/pEkspedisi');
        }
    }

    public function mEdit($id)
    {
        // $role_id = $this->session->userdata('role_id');

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
            redirect('pemeriksa/pMaintenance');
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
            redirect('pemeriksa/pTransportasi');
        }
    }

    public function eEdit($id)
    {
        // $role_id = $this->session->userdata('role_id');

        $data['title'] = "Edit Ekspedisi";
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
            redirect('pemeriksa/pEkspedisi');
        }
    }

    public function mHapus($id)
    {
        $this->Maintenance_model->hapusMaintenance($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('pemeriksa/pMaintenance');
    }

    public function tHapus($id)
    {
        $this->Transportasi_model->hapusTransportasi($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('pemeriksa/pTransportasi');
    }

    public function eHapus($id)
    {
        $this->Ekspedisi_model->hapusEkspedisi($id);
        $this->session->set_flashdata(
            'berhasil',
            'Permintaan dihapus'
        );
        redirect('pemeriksa/pEkspedisi');
    }

    public function ttdM($id)
    {
        $this->Approval_model->ttdPemeriksa('maintenance', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan disetujui'
        );
        redirect('pemeriksa/pMaintenance');
    }

    public function tolakM($id)
    {
        $this->Approval_model->tolakPemeriksa('maintenance', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan tidak disetujui'
        );
        redirect('pemeriksa/pMaintenance');
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
        redirect('pemeriksa/pTransportasi');
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
        redirect('pemeriksa/pTransportasi');
    }

    public function tambahStatus()
    {
        $nama = $this->session->userdata('nama');
        $divisi = $this->session->userdata('divisi');
        $id = $this->input->post('id');
        $role_id = $this->session->userdata('role_id');
        $data['role_id'] = $role_id;
        $data['role'] = $this->role;

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
        redirect('pemeriksa/pTransportasi');
    }

    public function ttdE($id)
    {
        $this->Approval_model->ttdPemeriksa('ekspedisi', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan disetujui'
        );
        redirect('pemeriksa/pEkspedisi');
    }

    public function tolakE($id)
    {
        $this->Approval_model->tolakPemeriksa('ekspedisi', $id);

        $this->session->set_flashdata(
            'berhasil',
            'Permintaan tidak disetujui'
        );
        redirect('pemeriksa/pEkspedisi');
    }
}
