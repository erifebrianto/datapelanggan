<?php

class M_dapel extends CI_Model{

  function tampil_dapel(){
  		return $this->db->get('pelanggan');
  	}

    function input_data($data,$table){
		$this->db->insert($table,$data);
	}


      public function insert_log($data){
        $datas = array (
          'log' => $data
        );
          $this->db->insert('tabel_log',$datas);
        }

  // function join($table,$tbljoin,$join){
  //   $this->db->join($tbljoin,$join);
  //   return $this->db->get($table);
  // }
  public function upload_file($filename){

		$config['upload_path'] = FCPATH .'/upload/excel/';
		$config['allowed_types'] = 'xlsx';
		$config['max_size']	= '2048';
		$config['overwrite'] = true;
		$config['file_name'] = 'file_import';

	   $this->load->library('upload' , $config); // Load librari upload
		if($this->upload->do_upload($filename)){ // Lakukan upload dan Cek jika proses upload berhasil
			// Jika berhasil :
			$return = array('result' => 'success', 'filepath' => $this->upload->data(), 'error' => '');
			return $return;
		}else{
			// Jika gagal :
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}

	// Buat sebuah fungsi untuk melakukan insert lebih dari 1 data
	public function insert_multiple($data){
    $this->db->db_debug = false;
    if (!$this->db->insert_batch('pelanggan', $data)) {
      $error = $this->db->error();
      return $error;
    }
    $this->db->db_debug = true;
	}
}
