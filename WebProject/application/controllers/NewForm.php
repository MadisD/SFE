<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewForm extends CI_Controller{

    public function index(){

        $this->load->view('pages/newFormView');
    }


    public function create(){
        //echo $_POST['pealkiri'];
        $this->load->model('form_create_model');
        $pealkiri = $_POST['pealkiri'];
        $kirjeldus = $_POST['kirjeldus'];
        $content = array();
        $kasutaja = $this->session->userdata('username');

        foreach ($_POST as $key => $value) {
            if ($key == 'pealkiri' or $key == 'kirjeldus') {
            }
            else{
                $content[$key] = $value;
            }

        }

        $this->form_create_model->addForm($pealkiri,$kirjeldus,$content,$kasutaja);



    }


}