<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Statistics extends CI_Controller{

    public function getData($form_id){

        if ($this->session->userdata('is_logged')) {
            $this->load->model('form_statistic_model');
            $this->load->model('form_read_model');

            $result = $this->form_statistic_model->getStatistics($form_id);
            $questions = $this->form_read_model->getQuestions($form_id);

            $textQuestions = array();
            $textAnswers = array();

            foreach ($questions as $row) {
                if ($row['form_type'] == 1) {
                    $textQuestions[$row['question_id']] = $row['content'];
                    $textAnswers[$row['question_id']] = array();
                }
            }
            foreach ($result as $row) {
                if ($row['form_type'] == 1) {
                    $textAnswers[$row['question_id']][] = $row['content'];
                }
            }

            $submits = $this->form_statistic_model->getCount($form_id);

            $data = array(
                'textQuestions' => $textQuestions,
                'textAnswers' => $textAnswers,
                'submits' => $submits

            );
            $this->load->view('pages/showDataView',$data);
        } else {
            $this->session->set_userdata('last_page',current_url());
            redirect(base_url('Login'));
        }
    }


}