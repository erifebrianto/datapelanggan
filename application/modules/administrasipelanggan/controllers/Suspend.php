<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suspend extends CI_Controller {

	function __construct(){
	 parent::__construct();
	 $this->load->model('M_dapel');
	 if($this->session->userdata('status') != "login"){
				 redirect(base_url("login"));
		 }
 }


	public function add($action){
		$data['action'] = $action;
		$data['data_pelanggan'] = $data['data_pelanggan'] = $this->M_dapel->join3db('suspend');
		// $data['data_pelanggan'] = $this->M_dapel->tampil_dapel()->result();
		$this->load->view('home/template/header.php');
		$this->load->view('add', $data);
		$this->load->view('home/template/footer.php');
	}

	public function add_action(){

	}

	public function index()
	{
		$data['data_pelanggan'] = $this->M_dapel->tampil_data('1')->result();
		$this->load->view('home/template/header.php');
		$this->load->view('suspend', $data);
		$this->load->view('home/template/footer.php');
	}

}
