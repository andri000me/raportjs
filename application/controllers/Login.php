<?php
class Login extends CI_controller {
		
		function __construct() {
			parent:: __construct();
			//load model
			$this->load->model('Model_login');
		}

		function index() {
			$data['judul']="Login Raport";
			$this->load->view('view_login',$data);
		}

		function cek() {
			$username=$this->input->post('username',true);
			$password=$this->input->post('password',true);
			$akses=$this->input->post('akses',true);

			//cek akses
			if($akses=='admin') { //admin
				// echo "ini admin";
				$cek_login=$this->Model_login->cek_admin($username,md5($password));

				if($cek_login) {
					// echo "selamat datang admin";

					//data session
					$data=array('username'=>$username,'logged_in'=>true);
					$this->session->set_userdata($data);

					//jika berhasil login ke laman crud siswa
					redirect('siswa');
				} else {
					// echo "Login admin gagal";
					//kembali ke laman login
					$this->session->set_flashdata('danger','Maaf Login Gagal!');
					redirect('login','refresh');
				}

			} else { //siswa
				// echo "ini siswa";
				$cek_siswa=$this->Model_login->cek_siswa($username,md5($password));

				if($cek_siswa) {
					// echo "selamat datang siswa";
					//data session
					$data=array('nis'=>$username,'logged_in'=>true);
					$this->session->set_userdata($data);

					//jika berhasil masuk ke laman raport
					redirect('raport');
				} else {
					// echo "data tidak ditemukan";
					//kembali ke laman login
					$this->session->set_flashdata('danger','Data tidak ditemukan!');
					redirect('login','refresh');
				}

			}
		}

	function logout() {
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('logged_in');
		//kembali ke laman login
		$this->session->set_flashdata('danger','Berhasil Logout!');
		redirect('login','refresh');
	}		

}