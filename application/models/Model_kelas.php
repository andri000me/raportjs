<?php
 class Model_kelas extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 
		//load library database
		//$this->load->library('database');		
	}

	function getAll() { //ambil data tb_kelas semua
		$data=$this->db->order_by('kode_kelas', 'ASC');
		$data=$this->db->get('tb_kelas');
		return $data;
	}	

} 	