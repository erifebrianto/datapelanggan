<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reaktivasi extends CI_Controller {
	function __construct(){
	 parent::__construct();
	 $this->load->model('M_dapel');
	 if($this->session->userdata('status') != "login"){
				 redirect(base_url("login"));
		 }
 }

	public function add(){
		$data['action'] = 'reaktivasi';
		$data['data_pelanggan'] = $this->M_dapel->join3db('reaktivasi');
		// $data['data_pelanggan'] = $this->M_dapel->tampil_dapel()->result();
		$this->load->view('home/template3/header.php');
		$this->load->view('add', $data);
		$this->load->view('home/template3/footer.php');
	}
	public function add_action(){

	}

	public function index()
	{
		$data['data_pelanggan'] = $this->M_dapel->tampil_data('0')->result();
		$this->load->view('home/template3/header.php');
		$this->load->view('reaktivasi',$data);
		$this->load->view('home/template3/footer.php');
	}

}
