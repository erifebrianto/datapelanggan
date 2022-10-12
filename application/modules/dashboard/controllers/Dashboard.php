<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
	 parent::__construct();
	 $this->load->model('M_db');
	 if($this->session->userdata('status') != "login"){
				 redirect(base_url("login"));
		 }
 }

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */


	public function index()
	{
		if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'))) {
			$this->routerosapi->write('/tool/user-manager/user/print');
			$totakun = $this->routerosapi->read();
			$this->routerosapi->write('/system/resource/print');
			$resource = $this->routerosapi->read();
			$this->routerosapi->disconnect();
			$resource = json_encode($resource);
			$resource = json_decode($resource, true);
			$data = [
								'total_akun' => count($totakun),
								'uptime'=> $resource['0']['uptime'],
								'total_pelanggan' => $this->M_db->countData('pelanggan'),
								'pelanggan_suspend' => $this->M_db->countDataStatus('1'),
								'pelanggan_aktif' => $this->M_db->countDataStatus('0'),
							];
			$this->load->view('home/template/header.php');
			$this->load->view('dasboard', $data);
			$this->load->view('home/template/footer.php');
		} else {
			echo '<script> alert("koneksi mikrotik gagal")</script>';
		}
	}
}
