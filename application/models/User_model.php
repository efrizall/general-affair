<?php
class User_model extends CI_Model
{
    public function selectUser()
    {
        return $this->db->get('user')->result_array();
    }

    public function tambahUser()
    {
        $data = [
            'nip' => $this->input->post('nip'),
            'name' => $this->input->post('nama'),
            'divisi' => $this->input->post('divisi'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role')
        ];

        $this->db->insert('user', $data);
    }
}