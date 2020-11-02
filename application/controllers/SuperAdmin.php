<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SuperAdmin extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			if( !$this->db->get_where('users', array('user_id' => $this->session->has_userdata('user') )) ){
				redirect(base_url('autentikasi/index'));
			}
		}

	}

	public function index(){
		// Data Judul
		$data['judul'] = 'Kelola Pengguna';
		// Data Menu Aktif
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
		$data['menu14'] = '';//laporan
		$data['menu15'] = 'class="active"';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['users'] = $this->Model_user->getAllUsers();

		$this->load->view('static/header', $data);
		$this->load->view('admin/index');
		$this->load->view('static/footer');
	}

	public function tambah(){
		$this->load->library('form_validation');

		$this->form_validation->set_rules('name', 'Username', 'required|trim|min_length[5]');
		$this->form_validation->set_rules('pass', 'Password', 'required|trim|min_length[5]');
		if($this->form_validation->run() == true){
			if( empty($this->db->get_where('users',  array('user_name' => $this->input->post('name')))->result_array()) ){
				$this->Model_user->insertUser();
				$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data User telah dihapus.</div>');
				redirect(base_url('superadmin/index'));
			} else {
				$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Username "<u>'.$this->input->post("name").'</u>" sudah tepakai, pilih usename yang lain.</div>');
				redirect(base_url('superadmin/index'));
			} 
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Username dan Password tidak boleh kurang dari 5 karakter.</div>');
			redirect(base_url('superadmin/index'));
		}
	}

	public function hapus($id){
		$this->Model_user->deleteUser($id);
		$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data User telah dihapus.</div>');
		redirect(base_url('superadmin/index'));
	}




}