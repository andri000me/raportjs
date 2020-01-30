<?php
 class Model_login extends CI_Model {
		
	function __construct() {
		parent:: __construct(); 	
	}

	function cek_admin($user,$pass) { //cek data admin
		$data=$this->db->get_where('tb_admin',array('username'=>$user,'password'=>$pass)); //cari data
		if($data->num_rows() > 0) { //apakah ditemukan
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function cek_siswa($nis,$pass) { //cek data siswa
		$data=$this->db->get_where('tb_siswa',array('nis'=>$nis,'password'=>$pass)); //cari data
		if($data->num_rows() > 0) { //apakah ditemukan
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function update_pass($username,$password) {
		$data=array(
			'password'=>$password
			);
		$this->db->where('username',$username);
		$this->db->update('tb_admin',$data);
	}
}