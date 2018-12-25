<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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
		if ($this->session->userdata('status') == "login") {
			$this->template->load('admin/templete','admin/Dashboard1');
		}else{
			$isi['status'] = "1";
			$this->load->view('admin/login', $isi);
		}

	}
        
	public function login()
	{

		$email = $this->input->post('email');
		$password = $this->input->post('password');

		$restult_login = $this->m_login->login($email, $password);

			if ($restult_login == NULL) {
				$isi['status'] = "0";
				$this->load->view('admin/login', $isi);
			}else{

			$akun =  $this->m_akun->get_akun_byemail($email);


			$data_session = array(
				'nama' => $akun['nama_lengkap'],
				'id_akun' => $akun['id_akun'],
				'id_role' => $akun['id_role'],
				'email' => $akun['email'],
				'password' => $akun['password'],
				'status' => "login"

			 );

			$this->session->set_userdata($data_session);
				redirect('dashboard1');
			}

                // redirect('dashboard1');
	}
        
        public function logout()
	{
				$this->session->sess_destroy();
                $isi['status'] = "1";
				$this->load->view('admin/login', $isi);
	}
}
