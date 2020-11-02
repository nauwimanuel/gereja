<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_profil extends CI_Model{
	public function insertProfil(){
		$ktgr = "";
		if($this->input->post('jdl') == "Persekutuan Kaum Pria" || $this->input->post('jdl') == "Persekutuan Wanita" || $this->input->post('jdl') == "Persekutuan Kaum Muda Babtis" || $this->input->post('jdl') == "Sekolah Minggu"){
			$ktgr = "unsur";
		} else {
			$ktgr = "komisi";
		}
		$data = [
			'pro_tgl'	=> date('Y-m-d'),
			'pro_ktgr'	=> $ktgr,
			'pro_jdl'	=> htmlspecialchars($this->input->post('jdl', true)),
			'pro_isi'	=> $this->input->post('isi', true)
		];

		$this->db->insert('proker', $data);
		return true;
	}

	public function readProfil(){
		$query = $this->db->get('proker');
		return $query->result_array();
	}

	public function readProfilById($id){
		$this->db->where('pro_id', $id);
		$query = $this->db->get_where('proker');
		return $query->result_array();
	}

	public function getProgramByParams($params){
		$this->db->where('pro_ktgr', $params);
		$query = $this->db->get('proker');
		return $query->result_array();
	}

	public function updateProfil($id){
		$ktgr = "";
		if($this->input->post('jdl') == "Persekutuan Kaum Pria" || $this->input->post('jdl') == "Persekutuan Wanita" || $this->input->post('jdl') == "Persekutuan Kaum Muda Babtis" || $this->input->post('jdl') == "Sekolah Minggu"){
			$ktgr = "unsur";
		} else {
			$ktgr = "komisi";
		}
		$data = [
			'pro_tgl'	=> date('Y-m-d'),
			'pro_ktgr'	=> $ktgr,
			'pro_jdl'	=> htmlspecialchars($this->input->post('jdl', true)),
			'pro_isi'	=> $this->input->post('isi', true)
		];

		$this->db->where('pro_id', $id);
		$this->db->update('proker', $data);
		return true;
	}

	public function deleteProfil($id){
		$this->db->where('pro_id', $id);
		$this->db->delete('proker');
		return true;
	}


	// Strukur Organisasi
	public function readSo(){
		$query = $this->db->get('struktur');
		return $query->result_array();
	}

	public function updateSo($id){
		$data = [
			'so_nama'	=> $this->upload->data('file_name'),
			'so_tgl'	=> date('Y-m-d')
		];

		$this->db->where('so_id', $id);
		$this->db->update('struktur', $data);
	}


	// Kas Keuangan
	public function getAllKas(){
		$query = $this->db->get('kas');
		return $query->result_array();
	}

	public function getKasByBulan($jenis){
		$this->db->where('kas_jenis', $jenis);
		$this->db->where('kas_tanggal LIKE', date('Y').'-'.$this->input->post('tgl').'%');
		// $this->db->like('kas_tanggal', $this->input->post('tgl'));
		$query = $this->db->get('kas');
		return $query->result_array();
	}

	public function getSUMSaldo($kolom, $jenis){
		$this->db->where('kas_jenis', $jenis);
		$this->db->where('YEAR(kas_tanggal) =', date('Y'));
		$this->db->where('MONTH(kas_tanggal) <', $this->input->post('tgl'));
		$this->db->select_sum($kolom);
		$this->db->select($kolom);
		$this->db->from('kas');
		$query = $this->db->get();
		return $query->result_array();
	}	

	public function insertKas(){
		if($this->input->post('jenis') == "Pemasukan"){
			$jenis = "kas_masuk";
		} elseif($this->input->post('jenis') == "Pengeluaran"){
			$jenis = "kas_keluar";
		}
		$rupiah = trim(str_replace('.', '',$this->input->post('rupiah')), 'Rp. ');
		$data = [
			'kas_jenis'		=> $this->input->post('ktgr'),
			'kas_tanggal'	=> $this->input->post('tgl'),
			$jenis  		=> $rupiah,
			'Kas_keterangan'=> $this->input->post('ket'),
		];

		$this->db->insert('kas', $data);
		return true;
	}

	public function updateKas($id){
		if($this->input->post('jenis') == "Pemasukan"){
			$jenis = "kas_masuk";
		} elseif($this->input->post('jenis') == "Pengeluaran"){
			$jenis = "kas_keluar";
		}
		
		$rupiah = trim(str_replace('.', '',$this->input->post('rupiah')), 'Rp. ');
		$data = [
			'kas_jenis'		=> $this->input->post('ktgr'),
			'kas_tanggal'	=> $this->input->post('tgl'),
			$jenis  		=> $rupiah,
			'Kas_keterangan'=> $this->input->post('ket'),
		];
		$this->db->where('kas_id', $id);
		$this->db->update('kas', $data);
		return true;
	}

	public function deleteKas($id){
		$this->db->where('kas_id', $id);
		$this->db->delete('kas');
		return true;
	}
}