<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
		$this->load->library('form_validation');
	}


	// Method Utama
	public function index(){
		$data['judul'] = 'Halaman Utama';
		$data['menu0'] = 'class="active"';//halaman utama
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
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		
		$this->load->view('static/header', $data);
		$this->load->view('home/index', $data);
		$this->load->view('static/footer');
	}


	// Method Edit Profil
	public function editProfil(){
		$this->form_validation->set_rules('nama', 'Nama Pengguna', 'required|trim');
		$this->form_validation->set_rules('nohp', 'Nama Pengguna', 'required|trim');
		$this->form_validation->set_rules('email', 'Nama Pengguna', 'required|trim');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data Profil gagal di ubah, silahkan cobah lagi.</div>');
			redirect(base_url('admin/index'));
		} else {
			$this->Model_user->updateProfil($this->session->user);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Profil berhasil di ubah.</div>');
			redirect(base_url('admin/index'));
		}
	}


	// Method Ganti Kata Sandi
	public function gantiSandi(){
		$this->form_validation->set_rules('sandilama', 'Sandi Lama', 'required|trim');
		$this->form_validation->set_rules('sandibaru', 'Sandi Baru', 'required|trim|min_length[5]|matches[sandibaru]');
		$this->form_validation->set_rules('ceksandibaru', 'Cek Sandi Baru', 'required|trim|matches[ceksandibaru]');

		if($this->form_validation->run() == false){
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Kata Sandi gagal di ubah, silahkan cobah lagi.</div>');
			redirect(base_url('admin/index/#us'));
		} else {
			$sandi1 = $this->input->post('sandilama');
			$nip = $this->session->user;
			$this->db->where('user_name', $nip);
			$query = $this->db->get('users');
			$sandi2 = $query->result_array()[0]['user_kata_sandi'];
			
			if($this->input->post('sandibaru') == $this->input->post('ceksandibaru')){
				if(password_verify($sandi1, $sandi2)){
					$this->Model_user->updateSandiUser($this->session->user);
					$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Kata Sandi berhasil di ubah.</div>');
					redirect(base_url('admin/index'));
				} else {
					$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Kata Sandi lama tidak cocok, silahkan coba lagi.</div>');
					redirect(base_url('admin/index'));
				}
			} else {
				$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Konfirmasi Kata Sandi Baru Gagal (tidak cocok).</div>');
				redirect(base_url('admin/index'));
			}
		}
	}









}








