<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_user extends CI_Model{
	// Method Menambahkan User
	public function insertUser(){
		$data = [
			'user_status' => htmlspecialchars($this->input->post('status', true)),
			'user_name' => htmlspecialchars($this->input->post('name', true)),
			'user_kata_sandi' => password_hash($this->input->post('pass'), PASSWORD_DEFAULT),
			'user_nama' => htmlspecialchars($this->input->post('nama', true)),
			'user_nohp' => htmlspecialchars($this->input->post('nohp', true)),
			'user_email' => htmlspecialchars($this->input->post('email', true))
		];

		$this->db->insert('users', $data);
	}

	// Method Mengambil User
	public function getAllUserById($id){
		$this->db->where("user_name", $id);
		$query = $this->db->get('users');
		return $query->result_array();
	}

	public function getAllUsers(){
		$this->db->where('user_status !=', 'a');
		$query = $this->db->get('users');
		return $query->result_array();
	}

	// Method Mengubah Data User
	public function updateProfil($id){
		$data = [
			'user_nama' => htmlspecialchars($this->input->post('nama', true)),
			'user_nohp' => htmlspecialchars($this->input->post('nohp', true)),
			'user_email' => htmlspecialchars($this->input->post('email', true)),
		];

		$this->db->where('user_name', $id);
		$this->db->update('users', $data);
	}

	// Method Mengubah Sandi User
	public function updateSandiUser($id){
		$data = [
			'user_kata_sandi' => password_hash($this->input->post('ceksandibaru', true), PASSWORD_DEFAULT)
		];

		$this->db->where('user_name', $id);
		$this->db->update('users', $data);
	}

	// Method Hapus Pengguna
	public function deleteUser($id){
		$this->db->where('user_id', $id);
		$this->db->delete('users');
	}


}
