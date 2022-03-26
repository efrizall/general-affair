<?php
class Transportasi_model extends CI_Model
{
    public function selectTransportasi()
    {
    }

    public function selectTransportasiId($id)
    {
    }

    public function tambahTransportasi()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'mobil_id' => $this->input->post('permintaan', true),
            'tujuan' => $this->input->post('keterangan', true),
            'keperluan' => 'Belum diproses',
            'tgl_pakai' => $this->input->post('tanggal', true),
            'tgl_kembali' => 1,
            'jam_pakai' => $this->input->post('tanggal', true),
            'jam_kembali' => $this->input->post('tanggal', true),
            'pemeriksa' => $this->input->post('tanggal', true),
            'ttd_avp' => 'Belum Disetujui',
            'ttd_pemeriksa' => 'Belum Disetujui',
            'status' => 'Belum Dikembalikan',
            'tanggal' => $this->input->post('tanggal', true),
            'file' => 'Tidak ada',
            'user_id' => 1
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
}
