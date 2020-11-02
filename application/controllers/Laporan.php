<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
	}

	public function index(){
		// Judul
		$data['judul'] = 'Laporan Keuangan';
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
		$data['menu11'] = '';//sekolah minggu
		$data['menu12'] = '';//surat masuk/keluar
		$data['menu13'] = '';//sk
		$data['menu14'] = 'class="active"';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['kas'] = $this->Model_profil->getAllKas();
		// tampilan
		$this->load->view('static/header', $data);
		$this->load->view('administrasi/laporan', $data);
		$this->load->view('static/footer');
	}

	public function cetak(){
		$jenis = ['', 'Persembahan', 'Persepuluhan', 'Penginjilan', 'Diakonia', 'Pembangunan', 'Iuran Wajib', 'Keyboard'];
		for($i=1; $i<8; $i++){
			$laporan = 'laporan'.$i; $saldom = 'saldom'.$i; $saldok = 'saldok'.$i;
			$data[$laporan] = $this->Model_profil->getKasByBulan($jenis[$i]);
			$data[$saldom] = $this->Model_profil->getSUMSaldo('kas_masuk', $jenis[$i]);
			$data[$saldok] = $this->Model_profil->getSUMSaldo('kas_keluar', $jenis[$i]);
		}

		// $data['laporan2'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom2'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok2'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');

		// $data['laporan3'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom3'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok3'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');

		// $data['laporan4'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom4'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok4'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');

		// $data['laporan5'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom5'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok5'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');

		// $data['laporan6'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom6'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok6'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');

		// $data['laporan7'] = $this->Model_profil->getKasByBulan('Persepuluhan');
		// $data['saldom7'] = $this->Model_profil->getSUMSaldo('kas_masuk', 'Persepuluhan');
		// $data['saldok7'] = $this->Model_profil->getSUMSaldo('kas_keluar', 'Persepuluhan');
		$this->load->view('administrasi/cetak', $data);
	}

	public function tambah(){
		if($this->Model_profil->insertKas() == true ){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Laporan Keuangan telah ditambahkan.</div>');
			redirect(base_url('laporan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat ditambahkan, coba lagi.</div>');
			redirect(base_url('laporan/index'));
		}
	}

	public function edit($id){
		if($this->Model_profil->updateKas($id) == true){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Laporan Keuangan berhasil diudah.</div>');
			redirect(base_url('laporan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat diubah, coba lagi.</div>');
			redirect(base_url('laporan/index'));
		}
	}

	public function hapus($id){
		if($this->Model_profil->deleteKas($id) == true){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Laporan Keuangan telah dihapus.</div>');
			redirect(base_url('laporan/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat dihapus, coba lagi.</div>');
			redirect(base_url('laporan/index'));
		}
	}
	
}