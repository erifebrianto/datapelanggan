<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_kproduk extends CI_Model {
		public function getAll()
		{
			return $this->db->get('kategori_produk')->result();
		}


	}
