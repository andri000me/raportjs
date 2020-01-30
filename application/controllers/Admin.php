<?php
class Admin extends CI_controller {
		
	function __construct() {
		parent:: __construct();
		//load model nilai
		$this->load->model('Model_login');
		if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
	}

	function index() {
		$username=$this->session->userdata('username');
		$data['judul']="Data Kelas";
		$data['username']=$username;
		//$this->load->view('data_kelas',$data);
		$this->template->display('ganti_password',$data);
	}

	function update() {
		$username=$this->input->post('username',true);
		$password=$this->input->post('password',true);
		$update=$this->Model_login->update_pass($username,md5($password));
		//untuk pesan operasi berhasil
		$this->session->set_flashdata('info','Data Berhasil Diubah!');
		redirect('Admin');
	}
}