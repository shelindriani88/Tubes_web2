<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class isi_dongeng extends CI_Controller {

  public function __construct() {
            // parent constructor
    parent::__construct();
            // load global
    $this->load->library('session');
    $this->load->model('dongeng/m_isi_dongeng');

}


public function index()
{
    $data['data'] = $this->m_isi_dongeng->tampil_dongeng();
    $data['no'] = $this->uri->segment(4, 0) + 1;
    $this->template->load('admin/templete','admin/dongeng/isi_dongeng/index.html',$data);
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

public function tambah_dongeng($status = '')
{
    if (empty($status)) {
        $isi['status'] = 2;
    }else{
        $isi['status'] = $status;
    }
    $isi['data'] = $this->m_isi_dongeng->tampil_kategori();
    $this->template->load('admin/templete','admin/dongeng/isi_dongeng/tambah_dongeng.html', $isi);
}

public function tambah_process()
{

    $config['upload_path'] = './assets/image/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '8000';
    $config['max_width']  = '4024';


    $this->upload->initialize($config);
    $this->load->library('upload', $config);

    if ( !$this->upload->do_upload('gambar')){
        $data=$this->upload->display_errors();
        $isi = 0;
        $this->load->view('/dongeng/isi_dongeng/tambah_dongeng',$isi);
    }
    else{

        $data = $this->upload->data();
        $name_file=$data['file_name'];
        $file_size=$data['file_size'];
        $file_type=$data['file_type'];

        $params = array(
            'judul_dongeng'   => $this->input->post("judul_dongeng"),
            'id_kategori'     => $this->input->post("id_kategori"),
            'isi_dongeng'     => $this->input->post("isi_dongeng"),
            'gambar_path'     => $config['upload_path'],
            'gambar_nama'     => $name_file
        );

        $this->m_isi_dongeng->insert_dongeng($params);
        $isi = 1;
        redirect('dongeng/isi_dongeng/tambah_dongeng/'.$isi);
          // $this->load->view('/admin/tambah_produk',$isi);

    }


}

public function delete_process($id_dongeng='')
{
    if ($this->m_isi_dongeng->delete_dongeng($id_dongeng)) {
        redirect('dongeng/isi_dongeng');
    }
}

public function edit($id_dongeng='', $status = '')
{
    if (empty($status)) {
        $data['status'] = 2;
    }else{
        $data['status'] = $status;
    }
    $data['data'] = $this->m_isi_dongeng->tampil_dongeng_id($id_dongeng);
    $data['kat'] = $this->m_isi_dongeng->tampil_kategori();
    $this->template->load('admin/templete','admin/dongeng/isi_dongeng/edit.html', $data);
}

public function edit_process()
{

    $config['upload_path'] = './assets/image/';
    $config['allowed_types'] = 'gif|jpg|png';
    $config['max_size']  = '8000';
    $config['max_width']  = '4024';


    $this->upload->initialize($config);
    $this->load->library('upload', $config);

    if ( !$this->upload->do_upload('gambar')){
        $data=$this->upload->display_errors();
        $isi = 0;
        $this->load->view('/dongeng/isi_dongeng/edit',$isi);
    }
    else{

        $data = $this->upload->data();
        $name_file=$data['file_name'];
        $file_size=$data['file_size'];
        $file_type=$data['file_type'];

        $where = array(
            'id_dongeng' => $this->input->post('id_dongeng'),
        );


        $params = array(
            'judul_dongeng'   => $this->input->post("judul_dongeng"),
            'id_kategori'     => $this->input->post("id_kategori"),
            'isi_dongeng'     => $this->input->post("isi_dongeng"),
            'gambar_path'     => $config['upload_path'],
            'gambar_nama'     => $name_file
        );

        $this->m_isi_dongeng->update_dongeng($params, $where);
        $isi = 1;
        redirect('dongeng/isi_dongeng/edit/'.$this->input->post('id_dongeng').'/'.$isi);
          // $this->load->view('/admin/tambah_produk',$isi);

    }

}


    // public function edit($id_kategori='', $status = '')
    // {
    //     if (empty($status)) {
    //         $data['status'] = 2;
    //     }else{
    //         $data['status'] = $status;
    //     }
    //     $data['data'] = $this->m_kategori->tampil_kategori_id($id_kategori);
    //     $this->template->load('admin/templete','admin/dongeng/kategori/edit.html', $data);
    // }

    // public function edit_process()
    // {
    //    $params = array(
    //     'nama_kategori'   => $this->input->post("nama_kategori"),
    //     'deskripsi'     => $this->input->post("deskripsi")
    //     );

    //        $where = array(
    //         'id_kategori' => $this->input->post('id_kategori'),
    //     );

    //        if ($this->m_kategori->update_kategori($params, $where)) {
    //         $isi = 1;
    //         redirect('dongeng/kategori/edit/'.$this->input->post('id_kategori').'/'.$isi);  
    //     }else{
    //         $isi = 0;
    //         redirect('dongeng/kategori/edit/'.$this->input->post('id_kategori').'/'.$isi);  
    //     }
    // }
}
