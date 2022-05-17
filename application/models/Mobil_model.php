<?php
class Mobil_model extends CI_Model
{
    public function select()
    {
        return $this->db->get("mobil")->result_array();
    }

    public function selectId($id)
    {
        return $this->db->get_where("mobil", ['id' => $id])->row_array();
    }

    public function tambah(){
        $data = [
            'jenis' => $this->input->post('jenis', true),
            'nopol' => $this->input->post('nopol', true),
        ];

        $this->db->insert('mobil', $data);
    }

    public function hapus($id){        
        $this->db->where('id', $id);
        $this->db->delete('mobil');
    }

    public function edit($id){
        $data = [
            'jenis' => $this->input->post('jenis', true),
            'nopol' => $this->input->post('nopol', true),
        ];

        $this->db->where('id', $id);
        $this->db->update('mobil', $data);
    }
}