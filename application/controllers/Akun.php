<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akun extends CI_Controller {

	 public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->library('session');
        $this->load->model('m_akun');
    }


	public function index()
	{

        $id = $this->session->userdata('id_akun');
		$data['akun'] = $this->m_akun->tampil_akun_admin($id);
		$data['no'] = $this->uri->segment(4, 0) + 1;
		$this->template->load('admin/templete','admin/tampil_akun', $data);
	}


 	function delete_akun($where){
 		$this->m_akun->delete_akun($where);
 		redirect('akun');	
 	}
 	
 

}
