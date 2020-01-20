<?php
class Dashboard extends CI_controller {
		
		function __construct() {
			parent:: __construct();
			if(!$this->session->userdata('logged_in')) {redirect('login','refresh');}
		}

		function index() {
			$data['judul']="Admin Raport Online";
			$this->template->display('welcome_message',$data);
		}
}