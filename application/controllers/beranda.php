<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class beranda extends CI_Controller {

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


// public function search_produk()
// {

//     $params = $this->input->post('cari_produk');

//     if ($params == "") {
//         redirect('beranda');
//     }else{
//         $data['tampil'] = $this->m_produk->tampil_produk_search($params);
//         $this->load->view('user/index.html',$data);    
//     }

// }

}
