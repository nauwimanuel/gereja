<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_bap extends CI_Model{
	// Method Masukan Data Baptisan
	public function insertBaptisan(){
		$data = [
			'bab_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'bab_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'bab_nos'	=> htmlspecialchars($this->input->post('nos', true)),
			'bab_file'	=> $this->upload->data('file_name'),
		];

		$this->db->insert('baptisan', $data);
	}

	// Method Menampilkan Data
	public function readBaptisan(){
		$query = $this->db->get('baptisan');
		return $query->result_array();
	}

	public function updateBaptisan($id){
		$data = [
			'bab_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'bab_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'bab_nos'	=> htmlspecialchars($this->input->post('nos', true)),
			'bab_file'	=> $this->upload->data('file_name'),
		];

		$this->db->where('bab_id', $id);
		$this->db->update('baptisan', $data);
	}

	public function deleteBaptisan($id){
		$query = $this->db->get_where('baptisan', array('bab_id' => $id));
		$gambar = $query->result_array();	
		unlink(FCPATH . 'assets/img/upload/' . $gambar[0]['bab_file']);
		$this->db->where('bab_id', $id);
		$this->db->delete('baptisan');
	}

}
