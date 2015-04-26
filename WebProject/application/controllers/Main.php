<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
        $this->load->view('templates/header');

        $this->load->view('pages/main');
        $this->load->view('templates/footer');

	}

    public function avalikud()
    {
        $this->load->view('pages/avalikud');

    }

    public function login(){
        $this->load->view('pages/login');

    }



    public function view($page){
        //$this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page);
        //$this->load->view('templates/footer', $data);
    }

    public function getValues(){
        $this->load->model('get_db');
        $data['results'] = $this->get_db->sisu();
//        $query = $this->db->query('SELECT * FROM User');
//        $result = $query->result();
//        $data['results'] = $result;

        $this->load->view('pages/uusVorm',$data);

        
    }

    public function insertValues(){
        $this->load->model('get_db');
        $newRow = array(
            'name' => "bob",
            'password' => "secret",
            'email' => 'bob@mail.cc'

        );

        $this->get_db->insert1($newRow);
    }

    public function insertValues2(){
        $this->load->model('get_db');
        $newRow = array(
            array('name' => "Brotha",
                'password' => "secret",
                'email' => 'bro@mail.cc'),
            array('name' => "Second Brotha",
                'password' => "secret",
                'email' => 'bruh@mail.cc')

        );

        $this->get_db->insert2($newRow);
    }

    public function updateValues(){
        $this->load->model('get_db');
        $newRow = array(
            "name" => "BROUH",
            "password" => "doge"
        );

        $this->get_db->update1($newRow);
        echo "work";

    }

    public function deleteValues(){

        $this->load->model('get_db');

        $oldRow = array(
            'id' => "2"
        );

        $this->get_db->delete1($oldRow);

    }

}

