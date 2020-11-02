<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_surat extends CI_Model{
	// SURAT SK
	public function insertSsk(){
		$data = [
			'sk_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'sk_jenis'	=> htmlspecialchars($this->input->post('jenis', true)),
			'sk_no'		=> htmlspecialchars($this->input->post('no', true)),
			'sk_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'sk_file'	=> $this->upload->data('file_name')
		];

		$this->db->insert('sk', $data);
	}

	public function getSsk(){
		$query = $this->db->get('sk');
		return $query->result_array();
	}

	public function updateSsk($id){
		$data = [
			'sk_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			'sk_jenis'	=> htmlspecialchars($this->input->post('jenis', true)),
			'sk_no'		=> htmlspecialchars($this->input->post('no', true)),
			'sk_nama'	=> htmlspecialchars($this->input->post('nama', true)),
			'sk_file'	=> $this->upload->data('file_name')
		];

		$this->db->where('sk_id', $id);
		$this->db->update('sk', $data);
	}

	public function deleteSsk($id){
		$this->db->where('sk_id', $id);
		$this->db->delete('sk');
		return true;
	}




	// Surat Masuk dan Keluar
	public function insertSurat(){
		$data = [
			's_tgl_mk'	=> htmlspecialchars($this->input->post('tgl_mk', true)),
			's_jenis'	=> htmlspecialchars($this->input->post('jenis', true)),
			's_no'	=> htmlspecialchars($this->input->post('no', true)),
			's_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			's_at'	=> htmlspecialchars($this->input->post('at', true)),
			's_perihal'	=> htmlspecialchars($this->input->post('perihal', true)),
			's_file'	=> $this->upload->data('file_name'),
		];

		$this->db->insert('surat', $data);
	}

	public function getAllSurat($jenis){
		if(!empty($jenis)){
			$this->db->where('s_jenis', $jenis);
		}
		$query = $this->db->get('surat');
		return $query->result_array();
	}

	public function updateSurat($id){
		$data = [
			's_tgl_mk'	=> htmlspecialchars($this->input->post('tgl_mk', true)),
			's_jenis'	=> htmlspecialchars($this->input->post('jenis', true)),
			's_no'	=> htmlspecialchars($this->input->post('no', true)),
			's_tgl'	=> htmlspecialchars($this->input->post('tgl', true)),
			's_at'	=> htmlspecialchars($this->input->post('at', true)),
			's_perihal'	=> htmlspecialchars($this->input->post('perihal', true)),
			's_file'	=> $this->upload->data('file_name'),
		];

		$this->db->where('s_id', $id);
		$this->db->update('surat', $data);
		return $this->db->affected_rows();
	}

	public function deleteSurat($id){
		$this->db->where('s_id', $id);
		$this->db->delete('surat');
		return true;
	}
}
