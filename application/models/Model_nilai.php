<?php
 class Model_nilai extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 
		//load library database
		//$this->load->library('database');		
	}

	function viewAll() {
		$query="select tb_siswa.nis AS nis, tb_siswa.nama AS nama ,tb_nilai.nilai AS nilai, tb_nilai.id_nilai AS id_nilai, tb_nilai.tanggal AS tanggal,tb_nilai.mapel AS mapel, tb_mapel.guru AS guru, tb_mapel.nama_mapel FROM tb_siswa LEFT JOIN tb_nilai ON tb_siswa.nis=tb_nilai.nis RIGHT JOIN tb_mapel ON tb_nilai.mapel=tb_mapel.id_mapel ";
		$data=$this->db->query($query);
		return $data;
	}

	function cari($nis) {
		$query="select tb_siswa.nis AS nis, tb_siswa.nama AS nama ,tb_nilai.nilai AS nilai, tb_nilai.id_nilai AS id_nilai, tb_nilai.tanggal AS tanggal,tb_nilai.mapel AS mapel, tb_mapel.guru AS guru, tb_mapel.nama_mapel FROM tb_siswa LEFT JOIN tb_nilai ON tb_siswa.nis=tb_nilai.nis RIGHT JOIN tb_mapel ON tb_nilai.mapel=tb_mapel.id_mapel WHERE tb_nilai.nis='$nis'";
		$data=$this->db->query($query);
		return $data;
	}

	

	function getAll() { //ambil data semua
		$data=$this->db->order_by('id_nilai', 'ASC');
		$data=$this->db->get('tb_nilai');
		return $data;
	}

	//untuk simpan data
	function simpan($nis,$mapel,$nilai) {
		$data=array(
			'nis'=>$nis,
			'mapel'=>$mapel,
			'nilai'=>$nilai
		);
		$this->db->insert('tb_nilai',$data);
	}

	function edit($id_nilai)	{
		$data=$this->db->where('id_nilai',$id_nilai);
		$data=$this->db->get('tb_nilai');
		return $data;
	}

	function update($id_nilai,$nis,$mapel,$nilai) {
		$data=array(
			'nis'=>$nis,
			'mapel'=>$mapel,
			'nilai'=>$nilai
		);
		$this->db->where('id_nilai',$id_nilai);
		$this->db->update('tb_nilai',$data);
	}

	function hapus($id_nilai) {
		$this->db->where('id_nilai',$id_nilai);
		$this->db->delete('tb_nilai');
	}

} 	