<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class S_Minggu extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
	}

	public function index(){
		// Judul
		$data['judul'] = 'Sekolah Minggu';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = '';//visi & misi
		$data['menu2'] = '';//progam kerja
		$data['menu3'] = '';//struktur organisasi
		$data['menu4'] = '';//baptisan
		$data['menu5'] = '';//penyerahan anak
		$data['menu6'] = '';//pernikahan
		$data['menu7'] = '';//ibadah minggu
		$data['menu8'] = '';//kaum pria
		$data['menu9'] = '';//kaum wanita
		$data['menu10'] = '';//kaum pemuda
		$data['menu11'] = 'class="active"';//sekolah minggu
		$data['menu12'] = '';//surat masuk/keluar
		$data['menu13'] = '';//sk
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		// Data Jadwal Sekolah Minggu
		$data['ibadah'] = $this->Model_ibadah->readIbadah('Sekolah Minggu');
		// tampilan
		$this->load->view('static/header', $data);
		$this->load->view('ibadah/index', $data);
		$this->load->view('static/footer');
	}

	public function tambah(){
		if($this->Model_ibadah->insertIbadah()){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Jadwal Ibadah berhasil ditambahkan.</div>');
			redirect(base_url('S_Minggu/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Jadwal Ibadah tidak dapat ditambahkan, coba lagi</div>');
			redirect(base_url('S_Minggu/index'));
		}
	}

	public function edit($id){
		if($this->Model_ibadah->updateIbadah($id) == treu){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Jadwal Ibadah berhasil diedit.</div>');
			redirect(base_url('S_Minggu/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Jadwal Ibadah tidak dapat diedit, coba lagi</div>');
			redirect(base_url('S_Minggu/index'));	
		}
	}
	
	public function hapus($id){
		if($this->Model_ibadah->deleteIbadah($id) == treu){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Jadwal Ibadah telah dihapus.</div>');
			redirect(base_url('S_Minggu/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Jadwal Ibadah tidak dapat dihapus, coba lagi</div>');
			redirect(base_url('S_Minggu/index'));
		}
	}
	
}