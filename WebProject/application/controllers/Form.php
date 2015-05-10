<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Form extends CI_Controller{

    public function getForm($form_id = null){
        $this->load->model('form_read_model');


        $result = $this->form_read_model->getFullForm($form_id);
        $data = array('form_id' => $form_id,
            'form_data' => $result);
        $this->load->view('pages/answerFormView',$data);
    }

    public function submit(){

        echo "VALMIMISEL";

    }

}