<?php
 class Model_gambar extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 
		//load library database
		//$this->load->library('database');		
	}

	function getAll() { //ambil data semua
		$data=$this->db->order_by('id', 'ASC');
		$data=$this->db->get('tb_gambar');
		return $data;
	}

	//untuk simpan data
	function simpan($nis,$gambar,$aktif) {
		$data=array(
			'nis'=>$nis,
			'gambar'=>$gambar,
			'aktif'=>$aktif
		);
		$this->db->insert('tb_gambar',$data);
	}

	function edit($id)	{
		$data=$this->db->where('id',$id);
		$data=$this->db->get('tb_gambar');
		return $data;
	}

	function update($id,$nis,$gambar,$aktif) {
		$data=array(
			'nis'=>$nis,
			'gambar'=>$gambar,
			'aktif'=>$aktif
		);
		$this->db->where('id',$id);
		$this->db->update('tb_gambar',$data);
	}

	function hapus($id) {
		$this->db->where('id',$id);
		$this->db->delete('tb_gambar');
	}

} 	