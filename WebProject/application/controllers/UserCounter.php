<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserCounter extends CI_Controller{

    public function getCount(){
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $query = "SELECT COUNT(id) as count FROM User";
        $result = $this->db->query($query);

        $count = $result->result_array()[0]['count'];

        echo "data: <h3>Kasutajate arv: $count </h3> \n\n";
        flush();


    }

    public function getUsers(){
        header('Content-Type: text/event-stream');
        header('Cache-Control: no-cache');

        $id = $this->getId();
        $name = $this->getName($id);
        $email = $this->getMail($id);




            echo "id: $id\n";
            echo "data: $name|\n";
            echo "data: $email\n\n";
            flush();



    }

    public function getId(){
        $result = $this->db->query("SELECT MAX(id) as max_id from User");
        return $result->result_array()[0]['max_id'];
    }

    public function getName($user_id){
        $arg = array($user_id);
        $result = $this->db->query("SELECT name from User where id = ?",$arg);
        return $result->result_array()[0]['name'];
    }

    public function getMail($user_id){
        $arg = array($user_id);
        $result = $this->db->query("SELECT email from User where id = ?",$arg);
        return $result->result_array()[0]['email'];
    }





}
