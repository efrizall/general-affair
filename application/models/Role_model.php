<?php 
class Role_model extends CI_Model{
    
    public function role(){
        $this->db->select('*');
        $this->db->from('user');
        $this->db->join('user_role','user.role_id = user_role.id');      
        $query = $this->db->get();
        return $query;
    }
}