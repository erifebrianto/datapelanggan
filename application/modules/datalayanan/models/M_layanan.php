<?php

class M_layanan extends CI_Model{

  function tampil_dalay(){
  		return $this->db->get('akun_layanan_pelanggan');
  	}

    // function join($table,$tbljoin,$join){
    //  $this->db->join($tbljoin,$join);
    //   return $this->db->get($table);
    // }
    public function join3table(){
       $this->db->select('*');
       $this->db->from('akun_layanan_pelanggan');
       $this->db->join('pelanggan','akun_layanan_pelanggan.id_pelanggan = pelanggan.id','LEFT');
       $this->db->join('paket_produk','akun_layanan_pelanggan.id_paket_produk = paket_produk.id_produk','LEFT');
       $this->db->join('status_langganan','status_langganan.id_akun_layanan = pelanggan.id','LEFT');
       $query = $this->db->get();
       return $query;
    }
}
