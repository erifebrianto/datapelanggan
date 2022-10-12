<?php

class Login extends CI_Controller{

    function __construct(){
        parent::__construct();
        $this->load->model('m_login');
    }

    function index(){
      $this->load->view('home/template/header_login.php');
  		$this->load->view('v_login');
  		$this->load->view('home/template/footer_login.php');

    }

    function aksi_login(){
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $where = array(
            'username' => $username,
            'password' => md5($password)
            );
        $cek = $this->m_login->cek_login("user",$where)->num_rows();
        if($cek > 0){

            $data_session = array(
                'nama' => $username,
                'status' => "login"
                );

            $this->session->set_userdata($data_session);
            $this->insertlog->log('User '.$username.' login');
            redirect(base_url("dashboard"));

        }else{
          $this->session->set_flashdata('error','Username / Password salah');
          $this->insertlog->log('User '.$username.' gagal login');
          redirect(base_url("login"));
        }
    }

    function logout(){
        $this->insertlog->log('User '.$this->session->userdata('nama').' logout');
        $this->session->set_flashdata('logout','Username / Password salah');
        redirect(base_url('login'));
    }
}
