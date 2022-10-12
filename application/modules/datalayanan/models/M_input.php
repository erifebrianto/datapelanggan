<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_input extends CI_Model {
	public function getTable()
	{
		$this->db->select('akun_layanan_pelanggan.*, pelanggan.id_data_pelanggan');
		$this->db->from('akun_layanan_pelanggan');
		$this->db->join('pelanggan', 'pelanggan.id = akun_layanan_pelanggan.id_pelanggan');
		$query = $this->db->get();
		return $query->result();
	}
	public function getAll()
		{
			return $this->db->get('pelanggan')->result();
		}
		public function getPaket()
			{
				return $this->db->get('paket_produk')->result();
			}
			public function insert($data)
	{
		return $this->db->insert('akun_layanan_pelanggan', $data);
	}

	public function insert_log($data){
		$datas = array (
			'log' => $data
		);
			$this->db->insert('tabel_log',$datas);
		}

	}
