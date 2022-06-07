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

    public function selectUserId($id)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id', $id);
        $query = $this->db->get()->row_array();
        return $query;
    }

    public function editUser($id)
    {
        $data = [
            'nip' => $this->input->post('nip', true),
            'name' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi', true),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'role_id' => $this->input->post('role', true)
        ];
        $this->db->where('id', $id);
        $this->db->update('user', $data);
    }

    public function hapus($id){        
        $this->db->where('id', $id);
        $this->db->delete('user');
    }
}