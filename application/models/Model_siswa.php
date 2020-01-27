<?php
 class Model_siswa extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 
		//load library database
		//$this->load->library('database');		
	}

	function viewAll() {//ambil semua data dan join dengan kelas
		// $query="select tb_siswa.nis AS nis, tb_siswa.nama AS nama, tb_siswa.password AS password,tb_siswa.alamat AS alamat, tb_siswa.kota_kab AS kota_kab,tb_siswa.gender AS gender, tb_siswa.kelas AS kelas, tb_kelas.kode_kelas AS kode_kelas,tb_kelas.nama_kelas AS nama_kelas FROM tb_siswa LEFT JOIN tb_kelas ON tb_siswa.kelas = tb_kelas.kode_kelas ORDER BY tb_siswa.nis DESC";

		$query="select a.nis AS nis, a.nama AS nama, a.password AS password,a.alamat AS alamat, a.kota_kab AS kota_kab,a.gender AS gender, a.kelas AS kelas, b.kode_kelas AS kode_kelas, b.nama_kelas AS nama_kelas FROM tb_siswa a LEFT JOIN tb_kelas b ON a.kelas = b.kode_kelas ORDER BY a.nis DESC";
		
		// $query="select * FROM tb_siswa INNER JOIN tb_kelas ON tb_siswa.kelas = tb_kelas.kode_kelas";
		$data=$this->db->query($query);
		return $data;
	}

	function getAll() { //ambil data semua
		$data=$this->db->order_by('nis', 'ASC');
		$data=$this->db->get('tb_siswa');
		return $data;
	}

	//untuk simpan data
	function simpan($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas) {
		$data=array(
			'nis'=>$nis,
			'nama'=>$nama,
			'password'=>$password,
			'alamat'=>$alamat,
			'kota_kab'=>$kota_kab,
			'gender'=>$gender,
			'kelas'=>$kelas
		);
		$this->db->insert('tb_siswa',$data);
	}

	function edit($nis)	{
		$data=$this->db->where('nis',$nis);
		$data=$this->db->get('tb_siswa');
		return $data;
	}

	function update($nis,$nama,$password,$alamat,$kota_kab,$gender,$kelas) {
		$data=array(
			'nama'=>$nama,
			'password'=>$password,
			'alamat'=>$alamat,
			'kota_kab'=>$kota_kab,
			'gender'=>$gender,
			'kelas'=>$kelas
		);
		$this->db->where('nis',$nis);
		$this->db->update('tb_siswa',$data);
	}

	function hapus($nis) {
		$this->db->where('nis',$nis);
		$this->db->delete('tb_siswa');
	}

} 	