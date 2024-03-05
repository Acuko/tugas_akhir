<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Like_m extends CI_Model
{
	private $_like_user = "like_user";

	public function getalw()
	{
		$this->db->select('user.nama,wisata.nama_wisata,like_user.*');
		$this->db->from('like_user');
		$this->db->join('user', 'user.id = like_user.id_user');
		$this->db->join('wisata', 'wisata.id_wisata  = like_user.id_like_wisata');
		$res = $this->db->get();
		return $res->result();
	}

	public function getalk()
	{
		$this->db->select('user.nama,kuliner.nama_kuliner,like_user.*');
		$this->db->from('like_user');
		$this->db->join('user', 'user.id = like_user.id_user');
		$this->db->join('kuliner', 'kuliner.id_kuliner  = like_user.id_like_kuliner');
		$res = $this->db->get();
		return $res->result();
	}

	public function getalp()
	{
		$this->db->select('user.nama,penginapan.nama_penginapan,like_user.*');
		$this->db->from('like_user');
		$this->db->join('user', 'user.id = like_user.id_user');
		$this->db->join('penginapan', 'penginapan.id_penginapan  = like_user.id_like_penginapan');
		$res = $this->db->get();
		return $res->result();
	}
	function insert($data)
	{
		$this->db->insert($this->_like_user, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_like_user, array("id" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
