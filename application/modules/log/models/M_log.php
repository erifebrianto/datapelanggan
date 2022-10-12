<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_log extends CI_Model {
		public function getAll()
		{
			return $this->db->get('tabel_log')->result();
		}


	}
