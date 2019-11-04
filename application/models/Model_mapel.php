<?php
 class Model_mapel extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 
		//load library database
		//$this->load->library('database');		
	}

	function getAll() { //ambil data semua
		$data=$this->db->order_by('id_mapel', 'ASC');
		$data=$this->db->get('tb_mapel');
		return $data;
	}

	//untuk simpan data
	function simpan($id_mapel,$nama_mapel,$guru,$aktif) {
		$data=array(
			'id_mapel'=>$id_mapel,
			'nama_mapel'=>$nama_mapel,
			'guru'=>$guru,
			'aktif'=>$aktif
		);
		$this->db->insert('tb_mapel',$data);
	}

	function edit($id_mapel)	{
		$data=$this->db->where('id_mapel',$id_mapel);
		$data=$this->db->get('tb_mapel');
		return $data;
	}

	function update($id_mapel,$nama_mapel,$guru,$aktif) {
		$data=array(
			'nama_mapel'=>$nama_mapel,
			'guru'=>$guru,
			'aktif'=>$aktif
		);
		$this->db->where('id_mapel',$id_mapel);
		$this->db->update('tb_mapel',$data);
	}

	function hapus($id_mapel) {
		$this->db->where('id_mapel',$id_mapel);
		$this->db->delete('tb_mapel');
	}

} 	