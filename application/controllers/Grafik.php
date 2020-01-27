<?php
class Grafik extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model nilai
		$this->load->model('Model_nilai');
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		$data['konten']=$this->Model_nilai->viewAll();
		$data['judul']="Grafik Nilai";
		$this->template->display('data_grafik',$data);
	}

	function cari() {
		$nis=$this->input->post('nis',true);
		$data['konten']=$this->Model_nilai->cari($nis);
		$data['judul']="Grafik Nilai";
		$this->template->display('data_grafik',$data);
	}
}