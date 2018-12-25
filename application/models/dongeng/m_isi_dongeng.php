<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_isi_dongeng extends CI_Model{

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

	public function tampil_dongeng()
	{
		$sql = "SELECT isi_dongeng.*, kategori.* FROM isi_dongeng 
				INNER JOIN kategori on isi_dongeng.id_kategori = kategori.id_kategori";
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

	function tampil_dongeng_id($where){
		$sql = "SELECT * FROM isi_dongeng where id_dongeng = '$where'";
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0) {
			$result = $query->row_array();
			$query->free_result();
			return $result;
		} else {
			return 0;
		}
	}

	public function insert_dongeng($params){
		return $this->db->insert('isi_dongeng', $params); 
	}

	function delete_dongeng($params){
		$sql = "DELETE FROM isi_dongeng WHERE id_dongeng = ?";
		return $this->db->query($sql, $params);
	}

	function update_dongeng($params, $where){
		return $this->db->update('isi_dongeng', $params, $where);
	}

}