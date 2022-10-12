<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {
		public function __construct(){
			parent:: __construct();
			$this->load->model('M_produk');
			if($this->session->userdata('status') != "login"){
	 				 redirect(base_url("login"));
	 		 }
		}
		public function index()
		{
			$data['data_pelanggan'] = $this->M_produk->getTable();
      $this->load->view('home/template/header.php');
      $this->load->view("v_produk", $data);
      $this->load->view('home/template/footer.php');

		}
    public function input()
		{
			$this->load->model('M_kproduk');
			$data['kategori_produk'] = $this->M_kproduk->getAll();
      $this->load->view('home/template/header.php');
			$this->load->view('v_input_produk', $data);
      $this->load->view('home/template/footer.php');
		}
    public function simpanData()
		{
			$this->load->model('M_produk');
			$nama_paket = $this->input->post('nama_paket');
			$profile = $this->input->post('profile');
			$id_jenis_produk = $this->input->post('id_jenis_produk');

			$data = [
				'nama_paket' => $nama_paket,
				'profile' => $profile,
				'id_jenis_produk' => $id_jenis_produk
			];

			$simpan = $this->M_produk->insert($data);

			if ($simpan) {
				$this->session->set_flashdata('msg_success', 'Data sudah tersimpan');
				$this->insertlog->log('User '.$this->session->userdata('nama').' menambah data produk');
			}else {
				$this->session->set_flashdata('msg_error', 'Data gagal disimpan');
			}
			redirect('/masterdata/produk');
		}
}
