<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapembayaran extends CI_Controller {

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
	 function __construct(){
 		parent::__construct();
		$this->load->model('M_pembayaran');
	$this->load->library('encrypt');
		if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
      }
 	}

	public function index()
	{
		// $data['layanan'] = $this->M_layanan->join('akun_layanan_pelanggan','pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id')->result();
		// $data['layanan'] = $this->M_layanan->join('status_langganan','pelanggan','status_langganan.id_akun_layanan = pelanggan.id')->result();
		$this->load->view('home/template3/header.php');
		$this->load->view('pembayaran');
		$this->load->view('home/template3/footer.php');
	}

	public function detail($id)
	{
		$duren = $this->enkrip->decrypt($id);
		// $data['layanan'] = $this->M_layanan->join('akun_layanan_pelanggan','pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id')->result();
		// $data['layanan'] = $this->M_layanan->join('status_langganan','pelanggan','status_langganan.id_akun_layanan = pelanggan.id')->result();
		$data['layanan'] = $this->M_pembayaran->detailData($duren)->result();
		$this->load->view('v_detail', $data);
	}

	public function v_pembayaran()
	{
		$data['layanan'] = $this->M_pembayaran->join3table()->result();
		$this->load->view('v_pembayaran', $data);
	}
}
