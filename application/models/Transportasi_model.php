<?php
class Transportasi_model extends CI_Model
{
    public function selectTransportasi()
    {
        return $this->db->get("transportasi")->result_array();
    }

    public function selectMobil()
    {
        return $this->db->get("mobil")->result_array();
    }

    public function selectPemeriksa()
    {
        return $this->db->get("pemeriksa")->result_array();
    }

    public function selectTransportasiId($id)
    {
        $this->db->select('*');
        $this->db->from('transportasi');
        $this->db->join('mobil', "transportasi.mobil_id = mobil.id AND transportasi.id = $id");
        // $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function selectTransportasiWhere($mulai, $akhir)
    {
        // $mulai = $this->input->post('mulai' . true);
        // $akhir = $this->input->post('akhir' . true);
        $query = $this->db->query("SELECT * FROM transportasi WHERE tanggal BETWEEN '$mulai' AND '$akhir' ORDER BY tanggal ASC");
        return $query->result_array();
    }

    public function tambahTransportasi()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'mobil_id' => $this->input->post('mobil', true),
            'tujuan' => $this->input->post('tujuan', true),
            'keperluan' => $this->input->post('keperluan', true),
            'tgl_pakai' => $this->input->post('tanggal_pakai', true),
            'tgl_kembali' => $this->input->post('tanggal_kembali', true),
            'jam_pakai' => $this->input->post('jam_pakai', true),
            'jam_kembali' => $this->input->post('jam_kembali', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
            'ttd_avp' => 'Belum Disetujui',
            'ttd_pemeriksa' => 'Belum Disetujui',
            'status' => 'Belum Dikembalikan',
            'tanggal' => $this->input->post('tanggal', true),
            'file' => 'Tidak ada',
            'user_id' => $this->input->post('id', true),
        ];

        $this->db->insert('transportasi', $data);
    }

    public function editTransportasi($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'mobil_id' => $this->input->post('mobil', true),
            'tujuan' => $this->input->post('tujuan', true),
            'keperluan' => $this->input->post('keperluan', true),
            'tgl_pakai' => $this->input->post('tgl_pakai', true),
            'tgl_kembali' => $this->input->post('tgl_kembali', true),
            'jam_pakai' => $this->input->post('jam_pakai', true),
            'jam_kembali' => $this->input->post('jam_kembali', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
            'tanggal' => $this->input->post('tanggal', true),
            'user_id' => $this->input->post('id', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('transportasi', $data);
    }

    public function hapusTransportasi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transportasi');
    }

    public function tambahStatus($id, $nama, $divisi)
    {

        $data = [
            'nama' => $nama,
            'divisi' => $divisi,
            'catatan' => '',
            'status' => $this->input->post('status', true),
            'transportasi_id' => $id,
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('status_mobil', $data);
    }

    public function updateStatus($id)
    {
        $data = [
            'status' => $this->input->post('status', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('transportasi', $data);
    }
}
