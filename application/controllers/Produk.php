<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

	 public function __construct() {
        // parent constructor
        parent::__construct();
        // load global
        $this->load->library('session');
        $this->load->model('m_login');
        $this->load->model('m_akun');
        $this->load->model('m_produk');
    }


	public function index()
	{
		$data['percobaan'] = $this->m_produk->tampil_produk();
		$data['no'] = $this->uri->segment(4, 0) + 1;
		$this->template->load('admin/templete','admin/produk',$data);
	}




 	function detail_produk(){
 				$this->load->view('/user/bayar.php');
 	}

 	function edit_produk($params){
 		$data['percobaan'] = $this->m_produk->tampil_produk_id($params);
 		$data['status'] = "1";
		$this->template->load('admin/templete','admin/edit_produk',$data);
 	}

	function edit_process(){

		$id_akun = $this->session->userdata('id_akun');

		$config['upload_path'] = './assets/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '8000';
		$config['max_width']  = '4024';



		$this->upload->initialize($config);
		// $this->load->library('upload', $config);


		$data = $this->upload->data();
	      $name_file=$data['file_name'];
	      $file_size=$data['file_size'];
	      $file_type=$data['file_type'];

			$params = array(
                'nama_produk'   => $this->input->post("judul_produk"),
                'deskripsi'     => $this->input->post("deskripsi"),   
                'harga'    		=> $this->input->post("harga"),
                'foto'     		=> $this->input->post('old')  
            );

            $where = array(
                'id_produk' => $this->input->post('id_produk'),
            );

            if (!$this->m_produk->update_produk($params, $where)) {
            	$isi['status'] = "0";
				redirect('produk/edit_produk/'.$this->input->post('id_produk'));	
            }else{
            	if ( !$this->upload->do_upload('gambar')){
			
					$data=$this->upload->display_errors();
					$isi['status'] = "0";
					redirect('produk/');
				}
				else{

			      $data = $this->upload->data();
			      $name_file=$data['file_name'];
			      $file_size=$data['file_size'];
			      $file_type=$data['file_type'];

			      // var_dump($params, $where);
			      // exit();
				$params = array(
                'foto'     		=> $name_file
           		 );

            	$where = array(
                'id_produk' => $this->input->post('id_produk'),
            	);
			      $this->m_produk->update_produk($params, $where);
			      unlink(FCPATH ."/assets/image/".$this->input->post('old'));
				  $isi['status'] = "1";
				  redirect('produk');
				  // $this->load->view('/admin/tambah_produk',$isi);

				}
           }
 	}

 	function delete_produk($params){
 		$data = $this->m_produk->tampil_produk_id($params);
 		foreach ($data as $dt) {
 			$foto = $dt['foto'];
 		}
 		// $path = ;
 		// var_dump($path);
 		// exit();
 		unlink(FCPATH ."/assets/image/".$foto);
 		$this->m_produk->delete_produk($params);
 		redirect('produk');	
 	}
 	
 	
    public function tambah_produk()
	{
		// $data['percobaan'] = $this->m_akun->tampil_akun();
		$isi['status'] = "1";
		$this->template->load('admin/templete','admin/tambah_produk',$isi);
	}


	public function tambah_produk_process(){
		// $fls = $this->input->post("gambar");
		$harga = $this->input->post('harga');
		$judul = $this->input->post('judul_produk');
		$deskripsi = $this->input->post('deskripsi');
		$id_akun = $this->session->userdata('session_operator');


		$config['upload_path'] = './assets/image/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']  = '8000';
		$config['max_width']  = '4024';
		// $config['file_name'] = $id_akun ; //nama yang terupload nantinya
		//$config['max_height']  = '768';
		
		$this->upload->initialize($config);
		$this->load->library('upload', $config);

		if ( ! $this->upload->do_upload('gambar')){
			
			$data=$this->upload->display_errors();
			$isi['status'] = "0";
			$this->load->view('/admin/tambah_produk',$isi);
		}
		else{

	      $data = $this->upload->data();
	      $name_file=$data['file_name'];
	      $file_size=$data['file_size'];
	      $file_type=$data['file_type'];

	      $this->m_produk->insert_produk(print_r($id_akun), $judul, $deskripsi, $harga, $name_file);
		  $isi['status'] = "1";
		  redirect('produk');
		  // $this->load->view('/admin/tambah_produk',$isi);

		}
	}

		// if ($judul == NULL or $harga == NULL or $deskripsi == NULL or $fls == NULL) {
		// 	$isi['status'] = "0";
		// 	$this->load->view('/admin/tambah_produk',$isi);
		// }else{

		// 	$this->m_produk->save($upload);
        
  //       	redirect('produk');

		// 	$this->m_produk->insert_produk($judul, $deskripsi, $harga, $fls);
		// 	$isi['status'] = "1";
		// 	// $this->load->view('/admin/tambah_produk',$isi);
		// }


}
