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

}