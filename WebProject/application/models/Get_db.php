<?php


class Get_db extends CI_Model{

    public function sisu(){
        $query = $this->db->query("Select * from User");

        return $query->result();
    }

    public function getId(){
            $result = $this->db->query("SELECT MAX(id) as max_id from User");
        return $result->result_array()[0]['max_id'];
    }
    
    public function insert1($data){
        $this->db->insert("User",$data);
    }

    public function insert2($data){

        $this->db->insert_batch("User",$data);
    }

    public function update1($data){
        $this->db->update("User",$data, "id = 2");
    }

    public function delete1($data){
        $this->db->delete("User",$data);
    }
}