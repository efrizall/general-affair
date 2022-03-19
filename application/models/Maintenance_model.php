<?php 
class Maintenance_model extends CI_Model{
    
    public function select(){
        return $this->db->get('maintenance')->result_array();
    }

    public function selectId($id){
        return $this->db->get_where('maintenance',['id'=>$id])->row_array();
    }
}