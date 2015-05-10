<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Form_read_model extends CI_Model{

    public function getUserForms(){
        $user_id = $this->session->userdata('user_id');
        $query = "SELECT form_id,pealkiri, kirjeldus,date FROM form where user_id = ?";
        $arg = array($user_id);
        $result = $this->db->query($query,$arg);

        return $result;

    }

    public function deleteForm($form_id){
        $query = "DELETE FROM form where form_id = ?";
        $arg = array($form_id);
        $this->db->query($query,$arg);
        $query2 = "DELETE FROM form_content where form_id =?";
        $this->db->query($query2,$arg);


    }

    public function getFullForm($form_id){
        //$query = "SELECT User.name as username ,form.pealkiri,form.kirjeldus,form.date,form_content.form_type, form_content.content FROM User INNER JOIN form ON User.id = form.user_id INNER JOIN form_content ON form.form_id = form_content.form_id where form.form_id = ?";
        $query1 = "SELECT User.name FROM User INNER JOIN form ON User.id = form.user_id where form.form_id = ?";
        $query2 = "SELECT form.pealkiri,form.kirjeldus,form.date from form where form.form_id = ?";
        $query3 = "SELECT form_content.form_type, form_content.content,form_content.question_id from form_content WHERE form_content.form_id = ?";
        $arg = array($form_id);



        $userName = $this->db->query($query1,$arg);
        $main = $this->db->query($query2,$arg);
        $questions = $this->db->query($query3,$arg);

        $result = array();

        foreach ($userName->result_array() as $row) {
            $result['name'] = $row['name'];
        }

        foreach ($main->result_array() as $row) {
            $result['pealkiri'] = $row['pealkiri'];
            $result['kirjeldus'] = $row['kirjeldus'];
            $result['date'] = $row['date'];
        }

        $result['sisu'] = $questions->result_array();

        return $result;
    }

}