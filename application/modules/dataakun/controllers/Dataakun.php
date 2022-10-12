<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataakun extends CI_Controller {

	function __construct(){
	 parent::__construct();
	 
	 if($this->session->userdata('status') != "login"){
				 redirect(base_url("login"));
		 }
	}
	public function index()
	{
		if (!$this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'))) {
			echo '<script> alert("koneksi mikrotik gagal")</script>';
			$this->load->view('home/template/header.php');
			$this->load->view('home/template/footer.php');
		} else {
			$this->load->view('home/template/header.php');
			$this->load->view('dataakun');
			$this->load->view('home/template/footer.php');
		};
		// $API = new ApiMik();
		// $this->ApiMik->connect()

			// $this->routerosapi->write('/tool/user-manager/profile/print');
			// $profprint = $this->routerosapi->read();
			// $profprint = json_encode($profprint);
			// $profprint = json_decode($profprint, true);



	}

	public function add_user(){
		$this->load->view('home/template/header.php');
		$this->load->view('add_user');
		$this->load->view('home/template/footer.php');
	}
}
