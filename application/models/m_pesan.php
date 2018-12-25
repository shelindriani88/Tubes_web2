<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_pesan extends CI_Model{

	function kirim_pesan($id_akun, $keluhan){
         $sql = "insert into pesan (id_akun, keluhan) values ('$id_akun', '$keluhan')";
        $this->db->query($sql);
    }

        function tampil_pesan(){
		$sql = "SELECT akun.id_akun AS 'id_akun', akun.nama_lengkap, pesan.id_pesan, pesan.keluhan
                From akun inner join pesan on akun.id_akun = pesan.id_akun";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	    }
    }

}