<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_produk extends CI_Model{

	function insert_produk($id ,$judul_produk, $deskripsi, $harga, $file){
         $sql = "insert into produk(id_akun, nama_produk, harga, deskripsi, foto) values ('$id', '$judul_produk', '$harga','$deskripsi', '$file')";
        $this->db->query($sql);
    }

    function tampil_produk(){
		$sql = "SELECT * FROM produk";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	    }
    }

        function tampil_produk_search($where){
		$sql = "SELECT * FROM produk where nama_produk like '%$where%'";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	    }
    }


    function tampil_produk_id($where){
		$sql = "SELECT * FROM produk where id_produk = '$where'";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->result_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return array();
	    }
    }

    function update_produk($params, $where){
        return $this->db->update('produk', $params, $where);
    }

    function delete_produk($params){
        $sql = "DELETE FROM produk WHERE id_produk = ?";
        return $this->db->query($sql, $params);
    }

}