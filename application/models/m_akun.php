<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_akun extends CI_Model{

	function insert_akun($nama_lengkap, $email, $password){
         $sql = "insert into akun (id_akun, nama_lengkap) values ('', '$nama_lengkap')";
        $this->db->query($sql);
        $id_baru = $this->db->insert_id();
        $sql2 = "insert into com_akun (id_akun, id_role, email, password) values ('$id_baru', 2, '$email', '$password')";
        $this->db->query($sql2);
    }

    function tampil_akun(){
		$sql = "SELECT * FROM akun";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	    }
    }


    function tampil_akun_admin($id){
        $sql = "SELECT akun.id_akun AS 'id_akun', akun.nama_lengkap, com_akun.email, com_akun.password, role_akun.id_role, role_akun.role
                From akun left join com_akun on akun.id_akun = com_akun.id_akun
                left join role_akun on com_akun.id_role = role_akun.id_role 
                where akun.id_akun != '$id'";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $query->free_result();
                return $result;
            } else {
                return array();
        }
    }
    


    function get_akun_byid($id_akun){
        $sql = "SELECT * FROM akun where id_akun=$id_akun";
            $query = $this->db->query($sql);
            if ($query->num_rows() > 0) {
                $result = $query->result_array();
                $query->free_result();
                return $result;
            } else {
                return array();
        }
    }

    function get_akun_byemail($email){
		$sql = "SELECT akun.id_akun AS 'id_akun', akun.nama_lengkap, com_akun.email, com_akun.password, role_akun.id_role, role_akun.role
                From akun left join com_akun on akun.id_akun = com_akun.id_akun
                left join role_akun on com_akun.id_role = role_akun.id_role 
                where com_akun.email = '$email'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            $result = $query->row_array();
            $query->free_result();
            return $result;
        } else {
            return NULL;
        }
    }


    function delete_akun($where){
        $sql = "DELETE FROM akun WHERE id_akun = ?";
        return $this->db->query($sql, $where);
    }
}