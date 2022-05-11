<?php
class Ekspedisi_model extends CI_Model
{
    public function selectEkspedisi()
    {
        return $this->db->get("ekspedisi")->result_array();
    }

    public function selectEkspedisiId($id)
    {
        return $this->db->get_where("ekspedisi", ['id' => $id])->row_array();
    }

    public function tambahEkspedisi()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'tujuan' => $this->input->post('tujuan', true),
            'sifat' => $this->input->post('sifat', true),
            'no_surat' => $this->input->post('nosurat', true),
            'no_resi' => $this->input->post('noresi', true),
            'tgl_surat' => $this->input->post('tanggal', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
            'user_id' => $this->input->post('id', true),
            'ttd_avp' => "Belum Disetujui",
            'ttd_pemeriksa' => "Belum Disetujui",
        ];

        $this->db->insert('ekspedisi', $data);
    }

    public function editEkspedisi($id)
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'tujuan' => $this->input->post('tujuan', true),
            'sifat' => $this->input->post('sifat', true),
            'no_surat' => $this->input->post('nosurat', true),
            'no_resi' => $this->input->post('noresi', true),
            'tgl_surat' => $this->input->post('tanggal', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
        ];
        $this->db->where('id', $id);
        $this->db->update('ekspedisi', $data);
    }

    public function hapusEkspedisi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('ekspedisi');
    }
}
