<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class P_Anak extends CI_Controller {
	public function __construct(){
		parent::__construct();
		if (!$this->session->has_userdata('user')) {
			redirect(base_url('autentikasi/index'));
		}
	}

	public function index(){
		// Judul
		$data['judul'] = 'Penyerehan Anak';
		// Menu
		$data['menu0'] = '';//halaman utama
		$data['menu1'] = '';//visi & misi
		$data['menu2'] = '';//progam kerja
		$data['menu3'] = '';//struktur organisasi
		$data['menu4'] = '';//baptisan
		$data['menu5'] = 'class="active"';//penyerahan anak
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
		// Data Wisata
		$data['panak'] = $this->Model_panak->readPanak();
		// tampilan
		$this->load->view('static/header', $data);
		$this->load->view('panak/index', $data);
		$this->load->view('static/footer');
	}

	public function tambah(){
		$nama = 'penyerahan'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
	    	$this->Model_panak->insertPanak();
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Penyerahan berhasil ditambahkan.</div>');
			redirect(base_url('p_anak/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Ekstensi file tidak diijikan. Harus (.jpeg / .png / .jpg)</div>');
			redirect(base_url('p_anak/index'));
		}
	}

	public function edit($id){
		$nama = 'penyerahan'.time();
        $config['allowed_types'] = 'pdf';
        $config['max_size']      = '2048';
        $config['upload_path']   = './assets/img/upload/';
        $config['file_name']	 = $nama;
        $this->upload->initialize($config);

        if ($this->upload->do_upload('file') == TRUE) {
        	$query = $this->db->get_where('panak', array('panak_id' => $id));
			$gambar = $query->result_array()[0]['panak_file'];
			unlink(FCPATH . 'assets/img/upload/'.$gambar);//ini harus diperbaiki
	    	$this->Model_panak->updatePanak($id);
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Penyerahan berhasil diubah.</div>');
			redirect(base_url('p_anak/index'));
		} else {
			$this->session->set_flashdata('pesan', '<div class="callout callout-danger"><h4><b>Gagal !</b></h4> Ekstensi file tidak diijikan. Harus (.jpeg / .png / .jpg)</div>');
			redirect(base_url('p_anak/index'));
		}
	}

	public function hapus($id){
		$this->Model_panak->deletePanak($id);
		$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Berhasil !</b></h4> Data Penyerahan telah dihapus.</div>');
		redirect(base_url('p_anak/index'));
	}
	
}