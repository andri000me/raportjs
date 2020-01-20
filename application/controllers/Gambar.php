<?php
class Gambar extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model 
		$this->load->model('Model_gambar');
		$this->load->model('Model_siswa');
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		$data['judul']="Data Gambar Siswa";
		$data['konten']=$this->Model_gambar->getAll();
		$data['siswa']=$this->Model_siswa->getAll();
		//$this->load->view('data_kelas',$data);
		$this->template->display('data_gambar',$data);
	}

	function simpan() {
		// konfigurasi library upload
		$config=array(
			'allowed_types'=>'jpg|jpeg|png', 'upload_path'=>'./foto/', 'max_size'=>'1024', 
			'file_name'=>url_title($this->input->post('gambar'))			
			);

		// inisialisasi
		$this->upload->initialize($config);

		if ($this->upload->do_upload('gambar')) {
			$nis=$this->input->post('nis',true);
			$gambar=$this->upload->file_name;
			$aktif=$this->input->post('aktif',true);

			$simpan=$this->Model_gambar->simpan($nis,$gambar,$aktif);
			$this->session->set_flashdata('info','Data Berhasil Diupload!');
			redirect('gambar');
		}	else {
			$error=$this->upload->display_errors();
			$this->session->set_flashdata('danger',$error);
			redirect('gambar');
		}
	}
}