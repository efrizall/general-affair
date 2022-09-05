<?php
class Divisi_model extends CI_Model
{
    public function getDivisi()
    {
        $this->db->select('*');
        $this->db->from('divisi');
        $this->db->order_by('divisi', 'ASC');
        return $this->db->get()->result_array();
    }
}
