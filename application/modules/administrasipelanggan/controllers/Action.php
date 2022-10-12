<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Action extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			$this->load->model('M_dapel');
			$this->load->model('M_cron');
		}

		public function add(){
			$val = $this->input->post('deleteids_arr');
			$action = $this->input->post('action');
			$this->session->set_flashdata('success', $action.' Berhasil');
		}

	public	function suspendMik($username,$profile){
			if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik')))
			{
				if($this->routerosapi->comm('/tool/user-manager/user/print',array(
					'?username' => $username, )))
					{
						$hasil = $this->routerosapi->comm('/tool/user-manager/user/print',array(
							'?username' => $username,
						));
						sleep(1);
						$id = $hasil[0]['.id'];
						$this->routerosapi->comm('/tool/user-manager/user/disable',array(
			        '.id' => $id,
			      ));
			      sleep(1);
			      $this->routerosapi->comm('/tool/user-manager/user/clear-profiles',array(
			        '.id' => $id,
			      ));
			      $this->routerosapi->comm('/tool/user-manager/user/create-and-activate-profile',array(
			        '.id' => $id,
			        'customer' => $this->config->item('customer'),
			        'profile' =>  $profile,
			      ));
			      $this->routerosapi->comm('/tool/user-manager/user/enable',array(
			        '.id' => $id,
			      ));

					}
			}
		}

		public function suspend(){
			$list = $this->input->post('ids_arr');
				foreach ($list as $i) {
					$data= $this->M_dapel->findData('akun_layanan_pelanggan','akun_pppoe',$i);
					foreach ($data as $a){
						$id_akun_layanan_pel = $a['id_layanan'];
						$akun_pppoe = $a['akun_pppoe'];
					};
					$data2 = $this->M_dapel->findData('pelanggan','id',$id_akun_layanan_pel);
					foreach ($data2 as $a){
						$id_data_pelanggan = $a['id_data_pelanggan'];
					};
					$status_suspend = '1';
					$data = array(
						'id_akun_layanan_pel' => $id_akun_layanan_pel,
						'status_suspend' => $status_suspend
					);
					$cek_ada = $this->M_dapel->cekData($id_akun_layanan_pel);
					if ($cek_ada == 0) {
						$this->M_dapel->insert_data($data,'status_suspend');
						$this->suspendMik($akun_pppoe,'ISOLIR');
					} else{
						$this->M_dapel->updateSuspend($id_akun_layanan_pel,$status_suspend);
						$this->suspendMik($akun_pppoe, 'ISOLIR');
					};
					$this->M_dapel->insert_log('User '.$this->session->userdata('nama').' melakukan Suspend pelanggan ID '.$id_data_pelanggan);
				};
		}

		public function suspend_action(){
			$list = $this->input->post('ids_arr');
				foreach ($list as $i) {
					$data= $this->M_dapel->findData('akun_layanan_pelanggan','akun_pppoe',$i);
					foreach ($data as $a){
						$id_akun_layanan_pel = $a['id_layanan'];
						$akun_pppoe = $a['akun_pppoe'];
					};
					$data2 = $this->M_dapel->findData('pelanggan','id',$id_akun_layanan_pel);
					foreach ($data2 as $a){
						$id_data_pelanggan = $a['id_data_pelanggan'];
					};
					$status_suspend = '1';
					$data = array(
						'id_akun_layanan_pel' => $id_akun_layanan_pel,
						'status_suspend' => $status_suspend
					);
					$cek_ada = $this->M_dapel->cekData($id_akun_layanan_pel);
					if ($cek_ada == 0) {
						$this->M_dapel->insert_data($data,'status_suspend');
						$this->suspendMik($akun_pppoe,'ISOLIR');
					} else{
						$this->M_dapel->updateSuspend($id_akun_layanan_pel,$status_suspend);
						$this->suspendMik($akun_pppoe, 'ISOLIR');
					};
					$this->M_dapel->insert_log('User '.$this->session->userdata('nama').' melakukan Suspend pelanggan ID '.$id_data_pelanggan);
					redirect(base_url().'administrasipelanggan/reaktivasi');
				};
		}

		function reaktivasi(){
			$list = $this->input->post('ids_arr');
				foreach ($list as $i) {
					// echo $i;
					$data= $this->M_dapel->findData('akun_layanan_pelanggan','akun_pppoe',$i);
					foreach ($data as $a){
						$id_akun_layanan_pel = $a['id_layanan'];
						$id_produk = $a['id_paket_produk'];
						$akun_pppoe = $a['akun_pppoe'];
					};
					$data2 = $this->M_dapel->findData('pelanggan','id',$id_akun_layanan_pel);
					foreach ($data2 as $a){
						$id_data_pelanggan = $a['id_data_pelanggan'];
					};
					$data2 = $this->M_dapel->findProduk('id_produk',$id_produk);
					foreach ($data2 as $b){
						$profile = $b['profile'];
					};
					$status_suspend = '0';
					$data = array(
						'id_akun_layanan_pel' => $id_akun_layanan_pel,
						'status_suspend' => $status_suspend
					);
					$cek_ada = $this->M_dapel->cekData($id_akun_layanan_pel);
					if ($cek_ada == 0) {
						// echo $profile;
						$this->M_dapel->insert_data($data,'status_suspend');
						$this->suspendMik($akun_pppoe, $profile);
					} else{
						// echo $profile;
						$this->M_dapel->updateSuspend($id_akun_layanan_pel,$status_suspend);
						$this->suspendMik($akun_pppoe, $profile);
					};
						$this->M_dapel->insert_log('User '.$this->session->userdata('nama').' melakukan reaktivasi pelanggan ID '.$id_data_pelanggan);
				};
				redirect(base_url().'administrasipelanggan/suspend');
		}
	}
