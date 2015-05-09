<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_create_model extends CI_Model{


    public function addForm($pealkiri,$kirjeldus,$content,$kasutaja){
        $user_id = $this->getUserId($kasutaja);
        $form_id = $this->getId();

        if (strlen($kirjeldus) > 0) {
            $query = "INSERT INTO form (form_id,user_id,pealkiri,kirjeldus) VALUES (?,?,?,?)";
            $arg = array($form_id,$user_id,$pealkiri,$kirjeldus);
            $this->db->query($query,$arg)or die(mysql_error());


        } else {
            $query = "INSERT INTO form (form_id,user_id,pealkiri) VALUES (?,?,?)";
            $arg = array($form_id,$user_id,$pealkiri);
            $this->db->query($query,$arg)or die(mysql_error());

        }


        foreach ($content as $key => $value) {
            $newQuery = "INSERT INTO form_content (form_id,form_type,content) VALUES (?,?,?)";
            $type = explode("field",$key);
            $type_id = -1;
            if ($type[0] == "text") {
                $type_id = 1;
            }
            $arg = array($form_id,$type_id,$value);
            $this->db->query($newQuery,$arg) or die(mysql_error());
        }



    }

    private function getId(){
        $query = "SELECT id FROM form";
        $result = $this->db->query($query) or die(mysql_error());
        $max = 0;
        if ($result->num_rows()== 0) {
            return $max;
        } else {
            foreach ($result->result_array() as $id) {
                if ($id['id'] > $max) {
                    $max = $id['id'];
                }
            }
        }
        return $max++;
    }

    private function getUserId($username){
        $query ="SELECT id FROM User WHERE name = ?";
        $arg = array($username);
        $id = $this->db->query($query,$arg)or die(mysql_error());

        if ($id->num_rows()== 0) {
            echo "User not found. Huge error";
        } else {
        foreach ($id->result_array() as $row)
        {
            return  $row['id'];
        }
        }
        //echo $row['Object']['id'];
    }


}