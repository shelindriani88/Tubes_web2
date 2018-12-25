<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class register extends CI_Controller {

	 public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->library('session');
        $this->load->model('m_login');
        $this->load->model('m_akun');
    }


	public function index()
	{
		$isi['status'] = "1";
		$this->load->view('/user/register',$isi);		
	}

	public function daftar(){
		$email = $this->input->post('input_email');
		$password = $this->input->post('input_password');
		$nama_lengkap = $this->input->post('nama_lengkap');

		if ($nama_lengkap == NULL or $email == NULL or $password == NULL) {
			$isi['status'] = "0";
			$this->load->view('admin/login', $isi);
		}else{
			$this->m_akun->insert_akun($nama_lengkap, $email, $password);
			$isi['status'] = "1";
			$this->load->view('admin/login', $isi);		
		}
	}
        
}
