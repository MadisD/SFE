<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{

    public function index(){

        $rules = array(
            //callback_username_is_taken
            "username" => array(
                "field" => "username",
                "label" => "Username",
                "rules" => "required|max_length[15]|min_length[3]|callback_username_is_taken"
            ),
            "password" => array(
                "field" => "password",
                "label" => "Password",
                "rules" => "required|max_length[30]|min_length[3]"
            ),
            "password_repeat" => array(
                "field" => "password_repeat",
                "label" => "Repeat Password",
                "rules" => "required|matches[password]"
            ),
            "email" => array(
                "field" => "email",
                "label" => "E-mail Address",
                "rules" => "required|valid_email|callback_email_is_taken"
            ),
        );

        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() != true) {
            $this->load->view('pages/register');
        } else {
            $form = array();
            $form['username'] = $this->input->post("username");
            $form['password'] = md5($this->input->post("password"));
            $form['email'] = $this->input->post("email");

            if (self::createUser($form['username'],$form['password'],$form['email']) == true) {
                redirect('register/success');

            } else {
                echo "Failed";
            }
        }
    }


    public function username_is_taken($input){
        $query ="SELECT * FROM User WHERE name = ?";
        $arg = array($input);
        $exec = $this->db->query($query,$arg)or die(mysql_error());

        if ($exec->num_rows()> 0) {
            $this->form_validation->set_message('username_is_taken',"Sorry the username  $input  is taken.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function email_is_taken($input){
        $query ="SELECT * FROM User WHERE email = ?";
        $arg = array($input);
        $exec = $this->db->query($query,$arg)or die(mysql_error());

        if ($exec->num_rows()> 0) {
            $this->form_validation->set_message('email_is_taken',"Sorry the email $input is taken.");
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function createUser($user, $pass, $email)
    {
        $query = "INSERT INTO User (name, password,email) VALUES (?, ?, ?)";
        $arg = array(self::protect($user),self::protect($pass),self::protect($email));
        if ($this->db->query($query,$arg) == true) {
            return true;
        } else {
            return false;
        }
    }

    public function protect($str)
    {
        return mysql_real_escape_string($str);
    }

    public function success(){
        $this->load->view('pages/registerSuccessView');
    }


}