<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Crudmod extends CI_Model {

    function user_login($username, $userpassword) {
        $this->db->where('username', $username);
        $this->db->where('password', do_hash($userpassword));
        $this->db->where('status', 1);
        $this->db->limit(1);
        $get_result = $this->db->get('user');
        return $get_result->result();
    }

    function user_group($tbl, $col1, $val1, $col2, $val2) {
        $this->db->where($col1, $val1);
        $this->db->where($col2, $val2);
        $res = $this->db->get($tbl);
        return count($res->result());
    }

    function s_tbl($tbl) {
        $s_res = $this->db->get($tbl);
        return $s_res->result();
    }

    function s_where_one($tbl, $col, $val) {
        $this->db->where($col, $val);
        $s_res = $this->db->get($tbl);
        return $s_res->result();
    }

    function s_where_two($tbl, $col, $val, $col1, $val1) {
        $this->db->where($col, $val);
        $this->db->where($col1, $val1);
        $s_res = $this->db->get($tbl);
        return $s_res->result();
    }
    
    function s_where_or_one($tbl, $col, $val, $col1, $val1) {
        $this->db->where($col, $val);
        $this->db->or_where($col1, $val1);
        $s_res = $this->db->get($tbl);
        return $s_res->result();
    }

    function s_where_not($tbl, $col, $val) {
        $this->db->where_not_in($col, $val);
        $s_res = $this->db->get($tbl);
        return $s_res->result();
    }

    function s_record($tbl, $col, $val) {
        $query = $this->db->get_where($tbl, array($col => $val));
        return $query->row();
    }

    function add_data($tbl, $data) {
        $add_result = $this->db->insert($tbl, $data);
        return $add_result;
    }

    function add_data_last($tbl, $data) {
        $this->db->insert($tbl, $data);
        return $this->db->insert_id();
    }

    function update_data($tbl, $data, $col, $val) {
        $this->db->where($col, $val);
        $s_res = $this->db->update($tbl, $data);
        return $s_res;
    }

}
