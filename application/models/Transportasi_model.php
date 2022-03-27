<?php
class Transportasi_model extends CI_Model
{
    public function selectTransportasi()
    {
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
            'permintaan' => $this->input->post('permintaan', true),
            'keterangan' => $this->input->post('keterangan', true),
            'tanggal' => $this->input->post('tanggal', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
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
        $this->db->where('mobil_id', $id);
        $this->db->update('transportasi', $data);
    }
}
