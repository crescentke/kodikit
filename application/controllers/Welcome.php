<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index() {
        $data = array(
            'cls' => "display: none",
            'error' => ""
        );
        $this->load->view('welcome_message', $data);
    }

    function login() {

        $this->form_validation->set_rules('log_username', 'Username', 'trim|required');
        $this->form_validation->set_rules('log_password', 'Password', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == FALSE) {
            $data = array(
                'cls' => "",
                'error' => validation_errors()
            );
            $this->load->view('welcome_message', $data);
        } else {

            redirect('home');
        }
    }

    function check_database($password) {
        $username = $this->input->post('log_username');

        $result = $this->Crudmod->user_login($username, $password);
        if ($result) {
            $sess_array = array();
            foreach ($result as $row) {
                $sess_array = array(
                    'user_id' => $row->user_id,
                    'user_group_id' => $row->user_group_id
                );
                $this->session->set_userdata('user_ses', $sess_array);
            }
            return TRUE;
        } else {
            $this->form_validation->set_message('check_database', "The username and password you entered did not match our records. Cross-check and try again.");
            return false;
        }
    }

}
