<?php


class Login extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('html');
        $this->load->database();
        //load the login model
        $this->load->model('login_model');
    }

    public function index()
    {
        $link =  $this->session->userdata('last_page');
        if ($this->session->userdata('is_logged')) {
            redirect($link);
        } else {
            $username = $this->input->post("txt_username");
            $password = $this->input->post("txt_password");

            //set validations
            $this->form_validation->set_rules("txt_username", "Username", "trim|required");
            $this->form_validation->set_rules("txt_password", "Password", "trim|required");

            if ($this->form_validation->run() == FALSE)
            {
                //validation fails
                //$this->load->view('login_view');
                $this->load->view('pages/new_login');
            }
            else
            {
                //validation succeeds
                if ($this->input->post('btn_login') == "Login")
                {
                    //check if username and password is correct
                    $usr_result = $this->login_model->get_user($username, $password);
                    if ($usr_result > 0) //active user record is present
                    {
                        $user_id = $this->login_model->get_id($username);

                        //set the session variables
                        $sessiondata = array(
                            'user_id' => $user_id,
                            'username' => $username,
                            'is_logged' => TRUE
                        );
                        $this->session->set_userdata($sessiondata);
                        $link =  $this->session->userdata('last_page');
                        $this->session->unset_userdata('last_page');
                        redirect($link);
                    }
                    else
                    {
                        $this->session->set_flashdata('msg', '<div class="alert alert-danger text-center">Invalid username and password!</div>');
                        redirect('login/index');
                    }
                }
                else
                {
                    redirect('login/index');
                }
            }
        }

    }


}