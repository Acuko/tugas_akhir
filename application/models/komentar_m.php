<?php

defined('BASEPATH') or exit('No direct script access allowed');

class komentar_m extends CI_Model
{
	private $_komentar = "komentar";

	public function getalw()
	{
		$this->db->select('user.nama,wisata.nama_wisata,komentar.*');
		$this->db->from('komentar');
		$this->db->join('user', 'user.id = komentar.id_user');
		$this->db->join('wisata', 'wisata.id_wisata  = komentar.id_komentar_wisata');
		$res = $this->db->get();
		return $res->result();
	}

	
	public function getalp()
	{
		$this->db->select('user.nama,wisata.nama_wisata,komentar.*');
		$this->db->from('komentar');
		$this->db->join('user', 'user.id = komentar.id_user');
		$this->db->join('wisata', 'wisata.id_wisata  = komentar.id_komentar_penginapan');
		$res = $this->db->get();
		return $res->result();
	}

	
	public function getalk()
	{
		$this->db->select('user.nama,wisata.nama_wisata,komentar.*');
		$this->db->from('komentar');
		$this->db->join('user', 'user.id = komentar.id_user');
		$this->db->join('wisata', 'wisata.id_wisata  = komentar.id_komentar_kuliner');
		$res = $this->db->get();
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_komentar, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_komentar, array("id" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
