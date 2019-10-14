<?php
class Kelas extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model Kelas
		$this->load->model('Model_kelas');
	}

	function index() {
		$data['judul']="Data Kelas";
		$data['konten']=$this->Model_kelas->getAll();
		//$this->load->view('data_kelas',$data);
		$this->template->display('data_kelas',$data);
	}
}