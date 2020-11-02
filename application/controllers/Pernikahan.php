<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pernikahan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
	}

	public function index(){
		// Judul
		$data['judul'] = 'Pernikahan';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = '';//visi & misi
		$data['menu2'] = '';//progam kerja
		$data['menu3'] = '';//struktur organisasi
		$data['menu4'] = '';//baptisan
		$data['menu5'] = '';//penyerahan anak
		$data['menu6'] = 'class="active"';//pernikahan
		$data['menu7'] = '';//ibadah minggu
		$data['menu8'] = '';//kaum pria
		$data['menu9'] = '';//kaum wanita
		$data['menu10'] = '';//kaum pemuda
		$data['menu11'] = '';//sekolah minggu
		$data['menu12'] = '';//surat masuk/keluar
		$data['menu13'] = '';//sk
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		// Data Wisata
		$data['pernikahan'] = $this->Model_per->readPer();
		// tampilan
		$this->load->view('static/header', $data);
		$this->load->view('pernikahan/index', $data);
		$this->load->view('static/footer');
	}

	public function tambah(){
		$nama = 'baptisan'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
	    	$this->Model_per->insertPer();
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Pernikahan berhasil ditambahkan.</div>');
			redirect(base_url('pernikahan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Ekstensi file tidak diijikan. Harus (.jpeg / .png / .jpg)</div>');
			redirect(base_url('pernikahan/index'));
		}
	}

	public function edit($id){
		$nama = 'pernikahan'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
        	$query = $this->db->get_where('pernikahan', array('per_id' => $id));
			$gambar = $query->result_array()[0]['per_file'];
			unlink(FCPATH . 'assets/img/upload/'.$gambar);//ini harus diperbaiki
	    	$this->Model_per->updatePer($id);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Pernikahan berhasil diubah.</div>');
			redirect(base_url('pernikahan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat diubah, coba lagi.</div>');
			redirect(base_url('pernikahan/index'));
		}
	}

	public function hapus($id){
		if($this->Model_per->deletePer($id)){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Pernikahan telah dihapus.</div>');
			redirect(base_url('pernikahan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Gagal !</b></h4> Data Pernikahan didak dapat dihapus.</div>');
			redirect(base_url('pernikahan/index'));
		}
	}
	
}