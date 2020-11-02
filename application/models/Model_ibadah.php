<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_ibadah extends CI_Model{
	// Method Masukan Data Baptisan
	public function insertIbadah(){
		$data = [
			'ibd_tgl'		=> htmlspecialchars($this->input->post('tgl', true)),
			'ibd_jam'		=> htmlspecialchars($this->input->post('jam', true)),
			'ibd_firman'	=> htmlspecialchars($this->input->post('firman', true)),
			'ibd_pujian'	=> htmlspecialchars($this->input->post('pujian', true)),
			'ibd_kategori'	=> htmlspecialchars($this->input->post('kategori', true)),
			'ibd_tempat'	=> htmlspecialchars($this->input->post('tempat', true)),
		];

		$this->db->insert('ibadah', $data);
		$kat = $this->input->post('kategori');
		return $kat;
	}

	// Method Menampilkan Data
	public function readIbadah($kat){
		$this->db->where('ibd_kategori', $kat);
		$query = $this->db->get('ibadah');
		return $query->result_array();
	}

	public function getIbadah(){
		$query = $this->db->get('ibadah');
		return $query->result_array();
	}

	public function getIbadahByMinggu($ktgr){
		$this->db->where('ibd_tgl LIKE', date('Y-').'08-%');
		$this->db->where('ibd_kategori', $ktgr);
		$query = $this->db->get('ibadah');
		return $query->result_array();
	}

	public function updateIbadah($id){
		$data = [
			'ibd_tgl'		=> htmlspecialchars($this->input->post('tgl', true)),
			'ibd_jam'		=> htmlspecialchars($this->input->post('jam', true)),
			'ibd_firman'	=> htmlspecialchars($this->input->post('firman', true)),
			'ibd_pujian'	=> htmlspecialchars($this->input->post('pujian', true)),
			'ibd_kategori'	=> htmlspecialchars($this->input->post('kategori', true)),
			'ibd_tempat'	=> htmlspecialchars($this->input->post('tempat', true)),
		];
		
		$this->db->where('ibd_id', $id);
		$this->db->update('ibadah', $data);
		return true;
	}

	public function deleteIbadah($id){
		$this->db->where('ibd_id', $id);
		$this->db->delete('ibadah');
		return true;
	}

}
