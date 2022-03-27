<?php
class Approval_model extends CI_Model
{
    public function ttdAvp($table, $id)
    {
        $data = [
            'ttd_avp' => 'Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update("$table", $data);
    }

    public function ttdPemeriksa($table, $id)
    {
        $data = [
            'ttd_pemeriksa' => 'Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update("$table", $data);
    }

    public function tolakAvp($table, $id)
    {
        $data = [
            'ttd_avp' => 'Tidak Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update("$table", $data);
    }

    public function tolakPemeriksa($table, $id)
    {
        $data = [
            'ttd_pemeriksa' => 'Tidak Disetujui'
        ];

        $this->db->where('id', $id);
        $this->db->update("$table", $data);
    }
}
