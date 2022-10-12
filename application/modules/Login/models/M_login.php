<?php

class M_login extends CI_Model{
    function cek_login($table,$where){
        return $this->db->get_where($table,$where);
    }
      public function insert_log($data){
        $datas = array (
          'log' => $data
        );
          $this->db->insert('tabel_log',$datas);
        }
}
