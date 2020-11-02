<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_vm extends CI_Model{
	// Method Mengambil Data Visi Misi
	public function getAllVimi(){
		$this->db->where('vm_id', 101010);
		$query = $this->db->get('visimisi');
		return $query->result_array();
	}

	public function updateVisi(){
		$data = [
			'vm_visi' => $this->input->post('editor1')
		];


		$this->db->where('vm_id', $this->input->post('id'));
		$this->db->update('visimisi', $data);
	}

	public function updateMisi(){
		$data = [
			'vm_misi' => $this->input->post('editor1'),
		];


		$this->db->where('vm_id', $this->input->post('id'));
		$this->db->update('visimisi', $data);
	}
}