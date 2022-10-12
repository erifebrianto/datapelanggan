<?php

class M_pembayaran extends CI_Model{

  function tampil_dalay(){
  		return $this->db->get('akun_layanan_pelanggan');
  	}

    // function join($table,$tbljoin,$join){
    //  $this->db->join($tbljoin,$join);
    //   return $this->db->get($table);
    // }
    public function join3table(){
       $this->db->select('*');
       $this->db->distinct();
       $this->db->from('akun_layanan_pelanggan');
       $this->db->join('pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id','LEFT');
       $this->db->join('paket_produk','akun_layanan_pelanggan.id_paket_produk = paket_produk.id_produk','LEFT');
       $this->db->join('status_langganan','status_langganan.id_akun_layanan = akun_layanan_pelanggan.id_layanan','LEFT');
       // $this->db->join('status_suspend','status_suspend.id_akun_layanan_pel = pelanggan.id','LEFT');
       // $this->db->join('status_pembayaran','akun_layanan_pelanggan.id = status_pembayaran.id_akun_layanan','LEFT');
       // $this->db->order_by('tanggal_bayar', 'DESC');
       // $this->db->where('id_akun_layanan' , '1');
       // $this->db->limit(2);
       $query = $this->db->get();
       return $query;
    }

    public function detailData($id){
      $this->db->select('*');
      $this->db->distinct();
      $this->db->from('akun_layanan_pelanggan');
      $this->db->join('paket_produk','akun_layanan_pelanggan.id_paket_produk = paket_produk.id_produk','LEFT');
      $this->db->join('pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id','LEFT');
      // $this->db->join('status_suspend','status_suspend.id_akun_layanan_pel = pelanggan.id','LEFT');
      $this->db->join('status_pembayaran','akun_layanan_pelanggan.id_layanan = status_pembayaran.id_akun_layanan','LEFT');
      $this->db->order_by('tanggal_bayar', 'DESC');
      $this->db->where('id_akun_layanan' , $id);
      // $this->db->limit(2);
      $query = $this->db->get();
      return $query;
    }

    public function find($id){
      $this->db->select('*');
      $this->db->from('status_pembayaran');
      $this->db->where('id_akun_layanan',$idpelanggan);
      $this->db->where('month(tanggal_bayar)=' , date("m"));
      $query = $this->db->get();
      return $query;
    }
    public function findLastPaid($idpelanggan){
      $this->db->select('*');
      $this->db->from('status_pembayaran');
      $this->db->where('id_akun_layanan',$idpelanggan);
      $this->db->order_by('tanggal_bayar', 'DESC');
      $this->db->limit(1);
      // $this->db->where('month(tanggal_bayar)=' , date("m"));
      $query = $this->db->get();
      return $query;
    }

}
