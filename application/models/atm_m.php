<?php

defined('BASEPATH') or exit('No direct script access allowed');

class atm_m extends CI_Model
{
	private $_atm = "atm";

	public function getal()
	{
		$this->db->select('*');
		$this->db->from('atm');
		$res = $this->db->get();
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_atm, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_atm, array("id_atm" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
