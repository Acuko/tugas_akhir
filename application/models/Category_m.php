<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Category_m extends CI_Model
{
	private $_kategori = "kategori";

	public function getal()
	{
		$this->db->select('*');
		$this->db->from('kategori');
		$this->db->join('jenis', 'kategori.jenis = jenis.id_jenis');
		$res = $this->db->get();
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_kategori, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_kategori, array("idkategori " => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
