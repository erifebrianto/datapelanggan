<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Datapelanggan extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	 function __construct(){
 		parent::__construct();
		$this->load->model('M_dapel');

		if($this->session->userdata('status') != "login"){
          redirect(base_url("login"));
      }
 	}

	public function index()
	{
		// $data['data_pelanggan'] = $this->M_dapel->join('pelanggan','paket_produk','pelanggan.id_produk = paket_produk.id_produk')->result();
		$data['data_pelanggan'] = $this->M_dapel->tampil_dapel()->result();
		$this->load->view('home/template/header.php');
		$this->load->view('datapelanggan', $data);
		$this->load->view('home/template/footer.php');
	}
	public function input(){
		$this->load->view('home/template/header.php');
		$this->load->view('v_input');
		$this->load->view('home/template/footer.php');
}
public function save_data(){
		$id_data_pelanggan = $this->input->post('id_data_pelanggan');
		$nama_pelanggan = $this->input->post('nama_pelanggan');	
		$alamat = $this->input->post('alamat');
		$no_kontak = $this->input->post('no_kontak');				
		$email = $this->input->post('email');		
		$pekerjaan = $this->input->post('pekerjaan');

	 $data = array(
		 'id_data_pelanggan' => $id_data_pelanggan,
		 'nama_pelanggan' => $nama_pelanggan,
		 'alamat' => $alamat,		 
		 'no_kontak' => $no_kontak,
		 'email' => $email,
		 'pekerjaan' => $pekerjaan

		 );
		$this->insertlog->log('User '.$this->session->userdata('nama').' menambah data pelanggan');
	 $this->M_dapel->input_data($data, 'pelanggan');
	 redirect('datapelanggan');
	}

	public function imports(){
      $this->load->view('home/template/header.php');
  		$this->load->view('import');
      $this->load->view('home/template/footer.php');
  	}

	  public function import(){
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';

		$excelreader = new PHPExcel_Reader_Excel2007();
		$loadexcel = $excelreader->load('upload/excel/file_import.xlsx'); // Load file yang telah diupload ke folder excel
		$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);


		$data = array();

		$numrow = 2;
		foreach($sheet as $row){

			if($numrow > 2){

			array_push($data, array(
			'id_data_pelanggan'=>$row['A'],
			'nama_pelanggan'=>$row['B'],
			'alamat'=>$row['D'],
			'no_kontak'=>$row['E'],
			'email' =>$row['F'],
		  	'pekerjaan' =>$row['I'],

			));

			}

			$numrow++; // Tambah 1 setiap kali looping
		}

		// Panggil fungsi insert_multiple yg telah kita buat sebelumnya di model
		$info = $this->M_dapel->insert_multiple($data);
		if(isset($info)){
			$pesan = $info['message'];
			$this->session->set_flashdata('no', $pesan);
			redirect("/datapelanggan");
 		} else {
			$this->session->set_flashdata('ok', $pesan);
			redirect("/datapelanggan");
		};

		 // Redirect ke halaman awal (ke controller siswa fungsi index)
	}

	public function priviews(){
		$upload = $this->M_dapel->upload_file('file');
		// $get = $this->db->query("SELECT * FROM pelanggan WHERE id = 1")->row();
		// $sekolah['nama_pelanggan'] = $get->nama_pelanggan;
		$data = array();
		if(isset($upload)){
			if($upload['result'] == "success"){
				include APPPATH.'third_party/PHPExcel/PHPExcel.php';

					$excelreader = new PHPExcel_Reader_Excel2007();
					$loadexcel = $excelreader->load('upload/excel/file_import.xlsx');
					$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

					$data['sheet'] = $sheet;
				}else{
					$data['upload_error'] = $upload['error'];
				}
				$this->load->view('home/template/header.php');
				$this->load->view('v_import1', $data);
				$this->load->view('home/template/footer.php');
			}
	  }

		public function previews(){
			$this->load->view('previews');
		}

}
