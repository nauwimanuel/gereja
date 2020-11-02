<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surat extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
	}

	public function index(){
		// Judul
		$data['judul'] = 'Surat Masuk - Keluar';
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
		$data['menu12'] = 'class="active"';//surat masuk/keluar
		$data['menu13'] = '';//surat sk
		$data['menu14'] = '';//laporan
		$data['menu15'] = '';//kelola pengguna
		// Data User
		$data['user'] = $this->Model_user->getAllUserById($this->session->user);
		$data['surat'] = $this->Model_surat->getAllSurat('');
		$data['suratm'] = $this->Model_surat->getAllSurat('Masuk');
		$data['suratk'] = $this->Model_surat->getAllSurat('Keluar');
		// tampilan
		$this->load->view('static/header', $data);
		$this->load->view('administrasi/surat', $data);
		$this->load->view('static/footer');
	}

	public function tambah(){
		$nama = 'S_'.$this->input->post('jenis').'_'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '5060'; //5mb (1012=1mb)
        $config['upload_path']   = './assets/doc/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
	    	$this->Model_surat->insertSurat();
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Surat berhasil ditambahkan.</div>');
			redirect(base_url('surat/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data belum ditambahkan, periksa kembali data dan file yang akan ditambahkan.');
			redirect(base_url('surat/index'));
		}
	}

	public function edit($id){
		$nama = 'S_'.$this->input->post('jenis').'_'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '5060'; //5mb (1012=1mb)
        $config['upload_path']   = './assets/doc/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
        	$query = $this->db->get_where('surat', array('s_id' => $id));
			$file = $query->result_array()[0]['s_file'];
			unlink(FCPATH . 'assets/doc/upload/'.$file);
	    	$this->Model_surat->updateSurat($id);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Surat berhasil diubah.</div>');
			redirect(base_url('surat/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Data belum diubah, periksa kembali data dan file yang akan ditambahkan.');
			redirect(base_url('surat/index'));
		}
	}

	public function hapus($id){
		$query = $this->db->get_where('surat', array('s_id' => $id));
		$file = $query->result_array()[0]['s_file'];
		unlink(FCPATH . 'assets/doc/upload/'.$file);
		
		if($this->Model_surat->deleteSurat($id)){
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Surat telah dihapus.</div>');
			redirect(base_url('surat/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-dager"><h4><b>Gagal !</b></h4> Data Belum dihapus, silahkan coba lagi.</div>');
			redirect(base_url('surat/index'));
		}
	}
	
}