<?php

defined('BASEPATH') or exit('No direct script access allowed');

class jenis_m extends CI_Model
{
	private $_jenis = "jenis";

	public function getal()
	{
		$res = $this->db->get('jenis');
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_jenis, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_jenis, array("id_jenis " => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
	public function getPeta($id,$whereid,$tabel)
	{
		$this->db->select('*');
		$this->db->from($tabel);
		$this->db->where($whereid, $id);
		return $this->db->get()->row();
		// $this->db->select('*');
		// $this->db->from($tabel);
		// $this->db->where($whereid, $id);
		// return $this->db->result();
	}
}
                        
/* End of file category.php */
