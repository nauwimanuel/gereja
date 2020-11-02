<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index(){
		// Judul
		$data['judul'] = '';
		// Menu
		$data['menu0'] = '';
		$data['menu1'] = '';
		$data['menu2'] = '';
		$data['menu3'] = '';
		$data['menu4'] = '';
		$data['menu5'] = '';
		$data['menu6'] = '';
		$data['menu7'] = 'class="active"';

		$data['vimi']	= $this->Model_vm->getAllVimi();
		$data['so']		= $this->Model_profil->readSo();
		$data['jadwal1'] = $this->Model_ibadah->getIbadahByMinggu('Ibadah Minggu');
		$data['jadwal2'] = $this->Model_ibadah->getIbadahByMinggu('Kaum Bapak2');
		$data['jadwal3'] = $this->Model_ibadah->getIbadahByMinggu('Kaum Ibu');
		$data['jadwal4'] = $this->Model_ibadah->getIbadahByMinggu('Kaum Mudah');
		$data['jadwal5'] = $this->Model_ibadah->getIbadahByMinggu('Sekolah Minggu');

		$this->load->view('static/header1', $data);
		$this->load->view('web/index');
		$this->load->view('static/footer1');
	}

	public function foto(){
		// Judul
		$data['judul'] = ' - Foto-foto';
		// Menu

		$this->load->view('static/header1', $data);
		$this->load->view('web/foto');
		$this->load->view('static/footer1');	
	}

	public function program($params){
		// Judul
		$data['judul'] = ' - Program Kerja';
		// Menu

		// data
		$data['proker'] = $this->Model_profil->getProgramByParams($params);

		$this->load->view('static/header1', $data);
		$this->load->view('web/program');
		$this->load->view('static/footer1');
	}

	public function jadwal(){
		// Judul
		$data['judul'] = ' - Jadwal Sepekan';
		// Menu

		// data
		$data['jadwal'] = $this->Model_ibadah->getIbadah();

		$this->load->view('static/header1', $data);
		$this->load->view('web/jadwal');
		$this->load->view('static/footer1');
	}
}
