<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Log extends CI_Controller {
		public function __construct(){
			parent:: __construct();
			$this->load->model('M_log');
			if($this->session->userdata('status') != "login"){
	 				 redirect(base_url("login"));
	 		 }
		}
		public function index()
		{
			$data['tabel_log'] = $this->M_log->getAll();
      $this->load->view('home/template/header.php');
      $this->load->view("v_log", $data);
      $this->load->view('home/template/footer.php');

		}

}
