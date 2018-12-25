<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_kategori extends CI_Model{

	public function tampil_kategori()
	{
		$sql = "SELECT * FROM kategori";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
		} else {
			return array();
		}
	}

	function tampil_kategori_search($where){
		$sql = "SELECT * FROM kategori where nama_kategori like '%$where%'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->result_array();
			$query->free_result();
			return $result;
		} else {
			return array();
		}
	}

	 function tampil_kategori_id($where){
		$sql = "SELECT * FROM kategori where id_kategori = '$where'";
	        $query = $this->db->query($sql);
	        if ($query->num_rows() > 0) {
	            $result = $query->row_array();
	            $query->free_result();
	            return $result;
	        } else {
	            return 0;
	    }
    }

	public function insert_kategori($params){
		return $this->db->insert('kategori', $params); 
	}

	function delete_kategori($params){
        $sql = "DELETE FROM kategori WHERE id_kategori = ?";
        return $this->db->query($sql, $params);
    }

    function update_kategori($params, $where){
        return $this->db->update('kategori', $params, $where);
    }

}