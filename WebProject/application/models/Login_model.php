<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model{
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }

    function get_user($usr,$pwd){
        $query ="SELECT * FROM User WHERE name = ? and password = ?";
        $arg = array($usr,md5($pwd));
        $exec = $this->db->query($query,$arg)or die(mysql_error());
        return $exec->num_rows();
    }


    public function get_id($username){
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
    }
}

