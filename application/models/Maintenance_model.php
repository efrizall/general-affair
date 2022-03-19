<?php 
class Maintenance_model extends CI_Model{
    
    public function select(){
        return $this->db->get('maintenance')->result_array();
    }

    public function selectId($id){
        return $this->db->get_where('maintenance',['id'=>$id])->row_array();
    }

    public function tambahMaintenance($id){
        $data = [
            'nama' => $this->input->post('nama', true),
            'divisi' => $this->input->post('divisi',true),
            'permintaan' => $this->input->post('permintaan',true),
            'keterangan' => $this->input->post('keterangan',true),
            'status' => 'Belum diproses',
            'tanggal' => $this->input->post('tanggal',true),
            'app_maintenance_id' => 1,
            'file' => 'Tidak ada',
            'user_id' => 1
        ];

        $this->db->insert('maintenance', $data);
    }
}