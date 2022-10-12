<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_produk extends CI_Model {
	public function getTable()
	{
		$this->db->select('paket_produk.*, kategori_produk.nama_produk');
		$this->db->from('paket_produk');
		$this->db->join('kategori_produk', 'kategori_produk.id = paket_produk.id_jenis_produk');
		$query = $this->db->get();
		return $query->result();
	}
  public function insert($data)
	{
		return $this->db->insert('paket_produk', $data);
	}
}
