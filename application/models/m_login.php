<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model{

	function login($email, $password){
        $this->db->select('*');
        $this->db->from('com_akun');
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get();
        if ($query->num_rows() > 0) {
            $result = $query->result_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }

}