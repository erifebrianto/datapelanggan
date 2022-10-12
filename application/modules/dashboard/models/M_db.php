<?php

class M_db extends CI_Model{

  function countData($tabel){
    $query = $this->db->get($tabel);
      if($query->num_rows()>0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
  	}

    function countDataStatus($status){
      $this->db->where('status_suspend', $status);
      $query = $this->db->get('status_suspend')->num_rows();
      return $query;
    }

    function join($table,$tbljoin,$join){
      $this->db->join($tbljoin,$join);
      return $this->db->get($table);
    }

    public function insert_log($data){
      $datas = array (
        'log' => $data
      );
        $this->db->insert('tabel_log',$datas);
      }
  }
