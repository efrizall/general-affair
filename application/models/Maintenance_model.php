<?php
class Maintenance_model extends CI_Model
{

    public function select($table)
    {
        return $this->db->get("$table")->result_array();
    }

    public function selectId($table, $id)
    {
        return $this->db->get_where("$table", ['id' => $id])->row_array();
    }

    function selectMaintenance()
    {
        $this->db->select('*');
        $this->db->from('maintenance');
        $this->db->join('proses', 'anggota.id_anggota = simpanan.id_anggota');
        $query = $this->db->get();
        return $query;
    }

    public function tambahMaintenance()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'permintaan' => $this->input->post('permintaan', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status' => 'Belum diproses',
            'tanggal' => $this->input->post('tanggal', true),
            'pemeriksa' => $this->input->post('pemeriksa', true),
            'file' => 'Tidak ada',
            'user_id' => 1,
            'ttd_avp' => 'Belum Disetujui',
            'ttd_pemeriksa' => 'Belum Disetujui'
        ];

        $this->db->insert('maintenance', $data);
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

    public function tambahEkspedisi()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'permintaan' => $this->input->post('permintaan', true),
            'keterangan' => $this->input->post('keterangan', true),
            'status' => 'Belum diproses',
            'tanggal' => $this->input->post('tanggal', true),
            'app_maintenance_id' => 1,
            'file' => 'Tidak ada',
            'user_id' => 1
        ];

        $this->db->insert('maintenance', $data);
    }

    public function editMaintenance($id)
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
        $this->db->update('maintenance', $data);
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

    public function editEkspedisi($id)
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
        $this->db->update('maintenance', $data);
    }

    public function tambahProses($id, $nama, $divisi)
    {

        $data = [
            'nama' => $nama,
            'divisi' => $divisi,
            'catatan' => '',
            'status' => $this->input->post('status', true),
            'maintenance_id' => $id,
            'update_at' => date('Y-m-d H:i:s'),
        ];

        $this->db->insert('proses', $data);
    }

    public function updateProses($id)
    {
        $data = [
            'status' => $this->input->post('status', true)
        ];
        $this->db->where('maintenance_id', $id);
        $this->db->update('proses', $data);
    }

    public function updateStatus($id)
    {
        $data = [
            'status' => $this->input->post('status', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }

    public function hapusMaintenance($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('maintenance');
    }

    public function ttdAvp($id)
    {
        $data = [
            'ttd_avp' => 'Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }

    public function ttdPemeriksa($id)
    {
        $data = [
            'ttd_pemeriksa' => 'Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }

    public function tolakAvp($id)
    {
        $data = [
            'ttd_avp' => 'Tidak Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }

    public function tolakPemeriksa($id)
    {
        $data = [
            'ttd_pemeriksa' => 'Tidak Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }
}
