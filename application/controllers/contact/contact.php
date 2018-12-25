<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class contact extends CI_Controller {

	public function __construct() {
            // parent constructor
		parent::__construct();
            // load global
		$this->load->library('session');
		// $this->load->model('dongeng/m_isi_dongeng');

	}


	public function index()
	{
		// $data['data'] = $this->m_isi_dongeng->tampil_dongeng();
		// $data['no'] = $this->uri->segment(4, 0) + 1;
		$this->load->view('user/contact.html');
	}
}