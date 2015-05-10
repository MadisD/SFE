<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class NewForm extends CI_Controller{

    public function index(){

        if ($this->session->userdata('is_logged')) {
            $this->load->view('pages/newFormView');
        } else {
            show_404();
        }
    }

    public function create(){

        if ($this->session->userdata('is_logged')) {
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

            redirect(base_url('MyForms'));
        } else {
            show_404();
        }




    }


}