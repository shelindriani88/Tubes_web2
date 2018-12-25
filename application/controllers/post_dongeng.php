<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class post_dongeng extends CI_Controller {

	public function __construct() {
        // parent constructor
		parent::__construct();
        // load global
		$this->load->library('session');
		$this->load->model('m_login');
		$this->load->model('dongeng/m_isi_dongeng');

	}

	public function index()
	{
		$data['data'] = $this->m_isi_dongeng->tampil_dongeng();
		$this->load->view('user/index.html',$data);
	}

	public function view($id_dongeng = '')
	{
		$data['data'] = $this->m_isi_dongeng->tampil_dongeng_id($id_dongeng);
		$this->load->view('user/blog.html',$data);
	}

}