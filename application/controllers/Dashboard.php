<?php
class Dashboard extends CI_controller {
		
		function __construct() {
			parent:: __construct();
		}

		function index() {
			$data['judul']="Admin Raport Online";
			$this->template->display('welcome_message',$data);
		}
}