<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
        $this->load->view('pages/mainPageView');

	}

    public function getUsers(){
        if ($this->session->userdata('is_logged')) {
            $this->load->model('get_db');
            $data['results'] = $this->get_db->sisu();
            $data['last_id'] = $this->get_db->getId();
            $this->load->view('pages/userView',$data);

        } else {
            $this->session->set_userdata('last_page',current_url());
            redirect(base_url('Login'));
        }

    }
}

