<?php

defined('BASEPATH') or exit('No direct script access allowed');

class spbu_m extends CI_Model
{
	private $_spbu = "spbu";

	public function getal()
	{
		$this->db->select('*');
		$this->db->from('spbu');
		$res = $this->db->get();
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_spbu, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_spbu, array("id_spbu" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
