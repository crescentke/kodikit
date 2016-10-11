<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Account extends CI_Controller {

    function user_group_id() {
        $session_data = $this->session->userdata('user_ses');
        $user_id = $session_data['user_id'];

        $user_group_id_array = $this->Crudmod->s_where_one('user', 'user_id', $user_id);
        foreach ($user_group_id_array as $row) {
            $user_group_id = $row->user_group_id;
        }

        return $user_group_id;
    }

    function user_agency() {
        $session_data = $this->session->userdata('user_ses');
        $user_id = $session_data['user_id'];

        $user_group_id_array = $this->Crudmod->s_where_one('user', 'user_id', $user_id);
        foreach ($user_group_id_array as $row) {
            $user_agency = $row->code;
        }

        return $user_agency;
    }

    function receivable() {
        if ($this->session->userdata('user_ses')) {
            $session_data = $this->session->userdata('user_ses');
            $user_id = $session_data['user_id'];

            $data = array(
                'user_id' => $user_id,
                'user_group_id' => $this->user_group_id(),
                'user_details' => $this->Crudmod->s_where_one('user', 'user_id', $user_id),
                'payment_details' => $this->Crudmod->s_where_one('payment', 'agency', $this->user_agency())
            );
            $this->load->view('account_receivable', $data);
        } else {
            $this->logout();
        }
    }

    function payable() {
        echo "Not ready yet. Go back to home<br/>";
        echo "<a href='" . base_url('home') . "'>Back Home</a>";
    }

    function logout() {
        $this->session->unsetuserdata['user_ses'];
        $this->session->sess_destroy();

        redirect(base_url());
    }

}
