<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard1 extends CI_Controller {

	
	 public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->library('session');
        $this->load->model('m_login');
    }

	public function index()
	{

		$data['tes']="coba";
			if ($this->session->userdata('status') == "login") {
				$this->template->load('admin/templete','admin/Dashboard1',$data);
			}else{
				redirect('auth/login');
			}
		
	}
}
