<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_statistic_model extends CI_Model{


    public function getStatistics($form_id){
        $query = "SELECT submit_content.question_id,submit_content.form_type,submit_content.content from submit_info INNER JOIN submit_content ON submit_content.submit_id = submit_info.id where submit_info.form_id = ?";
        $arg = array($form_id);

        $result = $this->db->query($query,$arg);

        return $result->result_array();



    }

    public function getCount($form_id){
        $query = "SELECT COUNT(form_id) as count FROM submit_info WHERE form_id = ?";
        $arg = array($form_id);
        $result = $this->db->query($query,$arg);

        foreach ($result->result_array() as $value) {
            return $value;
        }

        return 0;

    }

}