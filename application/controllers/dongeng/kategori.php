<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kategori extends CI_Controller {

  public function __construct() {
            // parent constructor
        parent::__construct();
            // load global
        $this->load->library('session');
        $this->load->model('dongeng/m_kategori');

    }


    public function index()
    {
        $data['data'] = $this->m_kategori->tampil_kategori();
        $data['no'] = $this->uri->segment(4, 0) + 1;
        $this->template->load('admin/templete','admin/dongeng/kategori/index.html',$data);
    }

    public function search_process()
    {
        if ($this->input->post('save') == 'Reset') {
            $params = '';
            redirect('dongeng/kategori');
        }
        $params = $this->input->post('cari_kategori');
        if ($params == "") {
            redirect('dongeng/kategori');
        }else{
            $data['data'] = $this->m_kategori->tampil_kategori_search($params);
            $data['no'] = $this->uri->segment(4, 0) + 1;
            $data['keyword'] = $params;
            $this->template->load('admin/templete','admin/dongeng/kategori/index.html',$data);
        }
    }   

    public function tambah_kategori($status = '')
    {
        if (empty($status)) {
            $isi['status'] = 2;
        }else{
            $isi['status'] = $status;
        }
        $this->template->load('admin/templete','admin/dongeng/kategori/tambah_kategori.html', $isi);
    }

    public function tambah_process()
    {
        $params = array(
            'nama_kategori'   => $this->input->post("nama_kategori"),
            'deskripsi'     => $this->input->post("deskripsi")
        );
        if ($this->m_kategori->insert_kategori($params)) {
            $isi = 1;
            redirect('dongeng/kategori/tambah_kategori/'.$isi);

        }else{
            $isi = 0;
            redirect('dongeng/kategori/tambah_kategori/'.$isi);
        }
    }

    public function delete_process($id_kategori='')
    {
        if ($this->m_kategori->delete_kategori($id_kategori)) {
            redirect('dongeng/kategori');
        }
    }

    public function edit($id_kategori='', $status = '')
    {
        if (empty($status)) {
            $data['status'] = 2;
        }else{
            $data['status'] = $status;
        }
        $data['data'] = $this->m_kategori->tampil_kategori_id($id_kategori);
        $this->template->load('admin/templete','admin/dongeng/kategori/edit.html', $data);
    }

    public function edit_process()
    {
       $params = array(
        'nama_kategori'   => $this->input->post("nama_kategori"),
        'deskripsi'     => $this->input->post("deskripsi")
        );

           $where = array(
            'id_kategori' => $this->input->post('id_kategori'),
        );

           if ($this->m_kategori->update_kategori($params, $where)) {
            $isi = 1;
            redirect('dongeng/kategori/edit/'.$this->input->post('id_kategori').'/'.$isi);  
        }else{
            $isi = 0;
            redirect('dongeng/kategori/edit/'.$this->input->post('id_kategori').'/'.$isi);  
        }
    }
}
