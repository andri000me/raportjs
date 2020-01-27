<?php
class Raport extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model nilai
		$this->load->model('Model_nilai');
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		//ambil nis dari session
		$nis=$this->session->userdata('nis'); 
		$data['judul']="Data Raport Siswa";
		//cari data nilai dari nis
		$data['konten']=$this->Model_nilai->cari($nis); 
		$this->load->view('view_raport',$data);
	}

}