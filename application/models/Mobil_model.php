<?php
class Mobil_model extends CI_Model
{
    public function select()
    {
        return $this->db->get("mobil")->result_array();
    }
}