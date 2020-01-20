<?php
class Login extends CI_controller {
		
		function __construct() {
			parent:: __construct();
		}

		function index() {
			$data['judul']="Login Raport";
			$this->load->view('view_login',$data);
		}
}