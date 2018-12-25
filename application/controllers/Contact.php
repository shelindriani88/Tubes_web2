<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	 public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->model('m_login');
        $this->load->model('m_pesan');
    }


	public function index()
	{
		if ($this->session->userdata('id_role') == "1") {

			$data['pesan'] = $this->m_pesan->tampil_pesan();
			$data['no'] = $this->uri->segment(4, 0) + 1;
			$this->template->load('admin/templete','admin/tampil_pesan',$data);
		}else{
			$hasil['st'] = "0";
			$this->template->load('admin/templete','user/Contact_admin', $hasil);	
		}

	}

	public function kirim()
	{

		$id_akun = $this->input->post('id_akun');
		$keluhan = $this->input->post('keluhan');
		$this->m_pesan->kirim_pesan($id_akun, $keluhan);

		$hasil['st'] = "1";
		$this->template->load('admin/templete','user/Contact_admin', $hasil);		
	}	
       
}
