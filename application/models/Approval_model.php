<?php
class Approval_model extends CI_Model
{
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
