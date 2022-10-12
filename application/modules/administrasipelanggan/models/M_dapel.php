<?php

class M_dapel extends CI_Model{

  function tampil_dapel(){
  		return $this->db->get('akun_layanan_pelanggan');
  	}

    function join($table,$tbljoin,$join){
      $this->db->join($tbljoin,$join);
      return $this->db->get($table);
    }

    function join3db($data){
      $this->db->select('*');
      $this->db->from('akun_layanan_pelanggan');
      $this->db->join('pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id','LEFT');
      $this->db->join('status_langganan', 'akun_layanan_pelanggan.id_pelanggan = status_langganan.id_akun_layanan', 'LEFT');
      $this->db->join('status_suspend', 'akun_layanan_pelanggan.id_layanan = status_suspend.id_akun_layanan_pel', 'LEFT');
      $this->db->join('paket_produk', 'akun_layanan_pelanggan.id_paket_produk = paket_produk.id_produk', 'LEFT');
      $query = $this->db->get();
      return $query->result_array();
    }

    function tampil_data($status){
      $this->db->select('*');
      $this->db->from('akun_layanan_pelanggan');
      $this->db->join('pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id','LEFT');
      $this->db->join('status_suspend', 'akun_layanan_pelanggan.id_layanan = status_suspend.id_akun_layanan_pel', 'LEFT');
      // $this->db->join('status_pembayaran', 'akun_layanan_pelanggan.id = status_pembayaran.id_akun_layanan', 'LEFT');
      $this->db->WHERE('status_suspend' , $status);
      // $this->db->WHERE('month(tanggal_bayar)=' , date("m"));
      $query= $this->db->get();
      return $query;
    }

    function findData($db,$find,$akun){
      $this->db->select('*');
      $this->db->from($db);
      $this->db->where($find , $akun);
      $query= $this->db->get();
      return $query->result_array();
    }
    function findData2($db,$find,$cari1,$cari2){
      $this->db->select('*');
      $this->db->from($db);
      $this->db->where($find , $cari1);
      $this->db->where('id_akun_layanan' , $cari2);
      $query= $this->db->get();
      return $query->result_array();
    }

    function findProduk($find,$id){
      $this->db->select('*');
      $this->db->from('paket_produk');
      $this->db->where($find , $id);
      $query= $this->db->get();
      return $query->result_array();
    }

    function cekData($data){
      $this->db->select('*');
      $this->db->from('status_suspend');
      $this->db->where('id_akun_layanan_pel' , $data);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
    }
    function cekData2($data){
      $this->db->select('*');
      $this->db->from('pelanggan');
      $this->db->where('id_data_pelanggan' , $data);
      $query = $this->db->get();
      if($query->num_rows()>0)
      {
        return $query->num_rows();
      }
      else
      {
        return 0;
      }
    }

    public function insert_data($data,$table){
        $this->db->insert($table,$data);
      }

    public function insert_log($data){
        $datas = array (
          'log' => $data
        );
          $this->db->insert('tabel_log',$datas);
        }

    public function updateSuspend($id,$datas){
      $data = array (
        'status_suspend' => $datas
      );
      $this->db->where('id_akun_layanan_pel', $id);
      $this->db->update('status_suspend',$data);

    }

    public function findLastPaid($data){
      $this->db->select('*');
      $this->db->from('status_pembayaran');
      $this->db->where('id_akun_layanan' , $data);
      $this->db->order_by('tanggal_bayar', 'DESC');
      $this->db->limit(1);
      $query = $this->db->get();
      return $query;
    }

  }
