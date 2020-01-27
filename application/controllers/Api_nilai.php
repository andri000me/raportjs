<?php
class Api_nilai extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model nilai
		$this->load->model('Model_nilai');
		//agar jadi data JSON
		header("Access-Control-Allow-Origin: *");
		header("Content-type:application/json");
	}

	function lihat() {
		//ambil data semua nilai dari database
		$data=$this->Model_nilai->viewAll()->result();

		// var_dump($data);
		echo json_encode($data);
	}

	function cari() {
		$nis=$_GET['nis']; //ambil parameter nis di API

		$data=$this->Model_nilai->cari($nis)->result();

		echo json_encode($data);
	}
}