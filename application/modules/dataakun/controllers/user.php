<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  public function __construct()
    {
      parent::__construct();
      if($this->session->userdata('status') != "login"){
   				 redirect(base_url("login"));
   		 }
    }

  public function add(){
    if(isset($_POST['add'])){
      $name = $this->input->post('username');
      $password = $this->input->post('password');
      $profile = $this->input->post('profile');
      $comment = $this->input->post('comment');
      if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik')))
      {
        if ($this->routerosapi->comm('/tool/user-manager/user/print',array(
          '?username' => $name,
          ))) {
          $this->session->set_flashdata('error','Akun Sudah ada');
          redirect(base_url().'dataakun');
        } else {
          $this->routerosapi->comm('/tool/user-manager/user/add',array(
            'username' => $name,
            'password' => $password,
            'customer' => $this->config->item('customer'),
            'comment' =>  $comment,
            'shared-users' => 'unlimited',
          ));
          sleep(2);
          $hasil = $this->routerosapi->comm('/tool/user-manager/user/print',array(
            '?username' => $name,
          ));
          $uid = $hasil[0]['.id'];
          $this->routerosapi->comm('/tool/user-manager/user/create-and-activate-profile',array(
            'numbers' => $uid,
            'customer' => $this->config->item('customer'),
            'profile' =>  $profile,
          ));
          $this->session->set_flashdata('success','Akun Berhasil Dibuat');
          $this->insertlog->log('User '.$this->session->userdata('nama').' Menambahkan akun PPPOE');
          redirect(base_url().'dataakun');
        }
      }
    }
  }

  public function remove($ids){
    $id = $this->enkrip->decrypt($ids);
    if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik')))
    {
        if($this->routerosapi->comm('/tool/user-manager/user/print',array(
          '?.id' => $id, )))
          {
            $this->routerosapi->comm('/tool/user-manager/user/remove',array(
              '.id' => $id, ));
            $this->session->set_flashdata('success','Akun berhasil dihapus');
            $this->insertlog->log('User '.$this->session->userdata('nama').' menghapus akun PPPOE');
            redirect(base_url().'dataakun');
          } else {
          $this->session->set_flashdata('error','Akun tidak ditemukan sehingga tidak bisa dihapus');
          redirect(base_url().'dataakun');
        }
    }

  }
  // --->

  public function deletebluck(){
    $list = $this->input->post('deleteids_arr');
    if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik')))
    {
      foreach($list as $i){
      // <
      $this->routerosapi->comm('/tool/user-manager/user/remove',array(
        '.id' => $this->enkrip->decrypt($i), ));
        $this->insertlog->log('User '.$this->session->userdata('nama').' menghapus akun PPPOE');
      }
      //

    };

  }

  public function getData(){
    if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik'))) {
      $this->routerosapi->write('/tool/user-manager/user/print');
      $alluser = $this->routerosapi->read();
      $this->routerosapi->disconnect();
      // $alluser = json_encode($alluser);
      #$alluser = json_decode($alluser, true);
      $response = array(
         "aaData" => $alluser
      );
         echo json_encode($response);
    } else {
      echo "";
    };


  }

  public function changeProfile(){
    $val = $this->input->post('val');
    $id = $this->input->post('id');
    if ($this->routerosapi->connect($this->config->item('hostname_mikrotik'),$this->config->item('username_mikrotik'),$this->config->item('password_mikrotik'),$this->config->item('port_mikrotik')))
    {
      if($this->routerosapi->comm('/tool/user-manager/user/print',array(
        '?.id' => $id, )))
        {
          $this->routerosapi->comm('/tool/user-manager/user/disable',array(
            '.id' => $id,
          ));
          sleep(2);
          $this->routerosapi->comm('/tool/user-manager/user/clear-profiles',array(
            '.id' => $id,
          ));
          $this->routerosapi->comm('/tool/user-manager/user/create-and-activate-profile',array(
            '.id' => $id,
            'customer' => $this->config->item('customer'),
            'profile' =>  $val,
          ));
          $this->routerosapi->comm('/tool/user-manager/user/enable',array(
            '.id' => $id,
          ));
          $this->insertlog->log('User '.$this->session->userdata('nama').' merubah profile akun PPPOE');
          $this->session->set_flashdata('success','Paket Berhasil Diganti');
          redirect(base_url().'dataakun');
        } else {
          $this->session->set_flashdata('error','Akun tidak ditemukan');
          redirect(base_url().'dataakun');
        }
    }
  }


}
