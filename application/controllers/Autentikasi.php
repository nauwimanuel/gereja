<?php

	class Autentikasi extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->library('form_validation');
		}


		public function index(){
			if ($this->session->has_userdata('user')) {
				redirect(base_url('admin/index'));
			}

			$this->form_validation->set_rules('nip', 'Username', 'required|trim|min_length[5]');
			$this->form_validation->set_rules('sandi', 'Password', 'required|trim|min_length[5]');

			if($this->form_validation->run() == false) {
				$this->load->view('masuk');
			} else {
				$nip = $this->input->post('nip');
				$sandi = $this->input->post('sandi');

				$user = $this->db->get_where('users', ['user_name' => $nip])->row_array();

				if($user){
					if(password_verify($sandi, $user['user_kata_sandi'])){
						$this->session->set_userdata('user', $user['user_name']);
						$this->session->set_userdata('status', $user['user_status']);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> <h4><b>Syalom !</b></h4>Selamat Datang di Sistem Informasi Marturia.</div>');
						redirect(base_url('admin/index'));
					} else {
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Gagal !</b></h4> Kata sandi Salah</div>');
						redirect(base_url('autentikasi/index'));
					}
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><h4><b>Gagal !</b></h4> Nama Pengguna Salah atau belum terdaftar</div>');
					redirect(base_url('autentikasi/index'));
				}
			}
		}

		public function keluar(){
			if (!$this->session->has_userdata('user')) {
				redirect(base_url('autentikasi/index'));
			}

			$this->session->unset_userdata('user');
			$this->session->unset_userdata('status');
			$this->session->set_flashdata('pesan', '<div class="callout callout-success"><h4><b>Terima Kasih!</b></h4> Telah menggunakan SI Marturia.<br>Tuhan Yesus Memberkati</div>');
			redirect(base_url('autentikasi/index'));
		}
	}