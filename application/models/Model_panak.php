<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_panak extends CI_Model{
	// Method Masukan Data Baptisan
	public function insertPanak(){
		$data = [
			'panak_nos'		=> htmlspecialchars($this->input->post('nos', true)),
			'panak_tgl'		=> htmlspecialchars($this->input->post('tgl', true)),
			'panak_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'panak_mm'		=> htmlspecialchars($this->input->post('mm', true)),
			'panak_bp'		=> htmlspecialchars($this->input->post('bp', true)),
			'panak_pdt'		=> htmlspecialchars($this->input->post('ptd', true)),
			'panak_file'	=> $this->upload->data('file_name'),
		];

		$this->db->insert('panak', $data);
	}

	// Method Menampilkan Data
	public function readPanak(){
		$query = $this->db->get('panak');
		return $query->result_array();
	}

	public function updatePanak($id){
		$data = [
			'panak_nos'		=> htmlspecialchars($this->input->post('nos', true)),
			'panak_tgl'		=> htmlspecialchars($this->input->post('tgl', true)),
			'panak_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'panak_mm'		=> htmlspecialchars($this->input->post('mm', true)),
			'panak_bp'		=> htmlspecialchars($this->input->post('bp', true)),
			'panak_pdt'		=> htmlspecialchars($this->input->post('ptd', true)),
			'panak_file'	=> $this->upload->data('file_name'),
		];

		$this->db->where('panak_id', $id);
		$this->db->update('panak', $data);
	}

	public function deletePanak($id){
		$query = $this->db->get_where('panak', array('panak_id' => $id));
		$gambar = $query->result_array();	
		unlink(FCPATH . 'assets/img/upload/' . $gambar[0]['panak_file']);
		$this->db->where('panak_id', $id);
		$this->db->delete('panak');
	}

}
