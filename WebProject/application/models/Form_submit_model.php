<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_submit_model extends CI_Model{


    public function submitForm($data){

        $form_id = $data['form_id'];
        $query = "INSERT INTO submit_info (form_id) VALUES (?)";
        $arg = array($form_id);
        $this->db->query($query,$arg);

        $submit_id = $this->getId();

        foreach ($data as $key => $value) {
            $newQuery = "INSERT INTO submit_content (submit_id,form_type,content) VALUES (?,?,?)";
            $type = explode("field",$key);
            $type_id = -1;
            if ($type[0] == "text") {
                $type_id = 1;
                $arg = array($submit_id,$type_id,$value);
                $this->db->query($newQuery,$arg) or die(mysql_error());
            }
        }

    }

    private function getId(){
        $query = "SELECT id FROM submit_info";
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

}