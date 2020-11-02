<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
		$this->load->library('form_validation');
	}

	// VISI & MISI
	public function index(){
		// Judul
		$data['judul'] = 'Visi & Misi Gereja';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = 'class="active"';//visi & misi
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
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['vimi'] = $this->Model_vm->getAllVimi();
		$this->load->view('static/header', $data);
		$this->load->view('profil/index');
		$this->load->view('static/footer');
	}

	public function v_edit(){
		$this->Model_vm->updateVisi();
		redirect(base_url('profil/index'));
	}

	public function m_edit(){
		$this->Model_vm->updateMisi();
		redirect(base_url('profil/index'));
	}


	// PROGRAM KERJA
	public function proker(){
		// Judul
		$data['judul'] = 'Program Kerja Jemaat';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = '';//visi & misi
		$data['menu2'] = 'class="active"';//progam kerja
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
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['proker'] = $this->Model_profil->readProfil();
		$id = "";
		$data['prokerbyid'] = $this->Model_profil->readProfilById($id);
		$this->load->view('static/header', $data);
		$this->load->view('profil/proker', $data);
		$this->load->view('static/footer');
	}

	public function tambah(){
		if($this->Model_profil->insertProfil() == true ){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Program Kerja berhasil ditambahkan.</div>');
			redirect(base_url('profil/proker'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat ditambahkan, coba lagi.</div>');
			redirect(base_url('profil/proker'));
		}
	}

	public function edit($id){
		if($this->Model_profil->updateProfil($id) == true){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Program Kerja berhasil diudah.</div>');
			redirect(base_url('profil/proker'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat diubah, coba lagi.</div>');
			redirect(base_url('profil/proker'));
		}
	}

	public function hapus($id){
		if($this->Model_profil->deleteProfil($id)){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Program Kerja telah dihapus.</div>');
			redirect(base_url('profil/proker'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data tidak dapat dihapus, coba lagi.</div>');
			redirect(base_url('profil/proker'));
		}
	}


	// STRUKTUR ORGANISASI
	public function struktur(){
		// Judul
		$data['judul'] = 'Struktur Organisasi Gereja';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = '';//visi & misi
		$data['menu2'] = '';//progam kerja
		$data['menu3'] = 'class="active"';//struktur organisasi
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
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['struktur'] = $this->Model_profil->readSo();
		$this->load->view('static/header', $data);
		$this->load->view('profil/struktur', $data);
		$this->load->view('static/footer');
	}

	public function ubahSo($id){
		$nama = 'struktur'.time();
        $config['allowed_types'] = 'jpeg|png|jpg';
        $config['max_size']      = '10048';
        $config['upload_path']   = './assets/img/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
        	$query = $this->db->get_where('struktur', array('so_id' => $id));
			$gambar = $query->result_array()[0]['so_nama'];
			unlink(FCPATH . 'assets/img/upload/'.$gambar);
			$this->Model_profil->updateSo($id);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Struktur Oraganisasi telah diubah.</div>');
			redirect(base_url('profil/struktur'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Struktur Oraganisasi belum diubah, coba lagi.</div>');
			redirect(base_url('profil/struktur'));
		}
	}
}