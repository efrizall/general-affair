<?php 
class Maintenance_model extends CI_Model{
    
    public function select($table){
        return $this->db->get("$table")->result_array();
    }

    public function selectId($table, $id){
        return $this->db->get_where("$table",['id'=>$id])->row_array();
    }

    public function tambahMaintenance(){
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

    public function tambahTransportasi(){
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

    public function tambahEkspedisi(){
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

    public function tambahProses($nama, $divisi){

        $data = [
            'nama' => $nama,
            'divisi' => $divisi,
            'catatan' => '',
            'status' => $this->input->post('status',true)
        ];

        $this->db->insert('proses', $data);
    }
    
    public function updateStatus($id){
        $data = [
            'status' => $this->input->post('status',true)
        ];
        $this->db->where('id', $id);
        $this->db->update('maintenance', $data);
    }
}