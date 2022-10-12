<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Input extends CI_Controller {
		public function __construct(){
			parent:: __construct();
			if($this->session->userdata('status') != "login"){
	 				 redirect(base_url("login"));
	 		 }

		}
		public function index(){
			$this->load->model('M_input');

			$data['pelanggan'] = $this->M_input->getAll();
			$data['paket_produk'] = $this->M_input->getPaket();

			$this->load->view('home/template/header.php');
      $this->load->view("v_input", $data);
      $this->load->view('home/template/footer.php');
		}
		public function simpanData()
		{
			$this->load->model('M_input');
			$akun_pppoe = $this->input->post('akun_pppoe');
			$id_pelanggan = $this->input->post('id_pelanggan');
			$id_paket_produk = $this->input->post('id_paket_produk');

			$data = [
				'akun_pppoe' => $akun_pppoe,
				'id_pelanggan' => $id_pelanggan,
				'id_paket_produk' => $id_paket_produk
			];

			$simpan = $this->M_input->insert($data);

			if ($simpan) {
				$this->session->set_flashdata('msg_success', 'Data sudah tersimpan');
				$this->insertlog->log('User '.$this->session->userdata('nama').' menambah data layanan');
			}else {
				$this->session->set_flashdata('msg_error', 'Data gagal disimpan');
			}
			redirect('datalayanan');
		}
	}
