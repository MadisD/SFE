<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MyForms extends CI_Controller{

    public function index(){
        if ($this->session->userdata('is_logged')) {
            $forms = $this->loadForms();
            $data = array('forms' => $forms);
            $this->load->view('pages/myFormsView',$data);
        } else {
            $this->session->set_userdata('last_page',current_url());
            redirect(base_url('Login'));
        }

    }

    public function deleteForm($form_id){
        if ($this->session->userdata('is_logged')) {
            $this->load->model('form_read_model');
            $this->form_read_model->deleteForm($form_id);
            redirect(base_url('MyForms'));
        } else {
            show_404();
        }

    }


    private function loadForms(){
        $this->load->model("form_read_model");
        $formData = $this->form_read_model->getUserForms();

        $data = array();

        $count = 1;
        foreach ($formData->result_array() as $row) {
            $form = array();
            $form['form_id'] = $row['form_id'];
            $form['pealkiri'] = $row['pealkiri'];
            $form['kirjeldus'] = $row['kirjeldus'];

            $form['date'] = $row['date'];

            $data[$count] = $form;
            $count++;
        }
        return $data;

    }

}