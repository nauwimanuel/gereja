<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_per extends CI_Model{
	// Method Masukan Data Baptisan
	public function insertPer(){
		$data = [
			'per_nos'	=> htmlspecialchars($this->input->post('nos', true)),
			'per_namap'	=> htmlspecialchars($this->input->post('namap', true)),
			'per_namaw'	=> htmlspecialchars($this->input->post('namaw', true)),
			'per_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'per_lks'	=> htmlspecialchars($this->input->post('lks', true)),
			'per_pdt'	=> htmlspecialchars($this->input->post('pdt', true)),
			'per_file'	=> $this->upload->data('file_name'),
		];

		$this->db->insert('pernikahan', $data);
	}

	// Method Menampilkan Data
	public function readPer(){
		$query = $this->db->get('pernikahan');
		return $query->result_array();
	}

	// Method Mengunah Data
	public function updatePer($id){
		$data = [
			'per_nos'	=> htmlspecialchars($this->input->post('nos', true)),
			'per_namap'	=> htmlspecialchars($this->input->post('namap', true)),
			'per_namaw'	=> htmlspecialchars($this->input->post('namaw', true)),
			'per_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'per_lks'	=> htmlspecialchars($this->input->post('lks', true)),
			'per_pdt'	=> htmlspecialchars($this->input->post('pdt', true)),
			'per_file'	=> $this->upload->data('file_name'),
		];

		$this->db->where('per_id', $id);
		$this->db->update('pernikahan', $data);
	}

	// Method menghapus Data
	public function deletePer($id){
		$query = $this->db->get_where('pernikahan', array('per_id' => $id));
		$gambar = $query->result_array();	
		unlink(FCPATH . 'assets/img/upload/' . $gambar[0]['per_file']);
		$this->db->where('per_id', $id);
		$this->db->delete('pernikahan');
		return true;
	}

}
