<?php

defined('BASEPATH') or exit('No direct script access allowed');

class user_m extends CI_Model
{
	private $_user = "user";

	public function getal()
	{
		$this->db->select('*');
		$this->db->from('user');
		$res = $this->db->get();
		return $res->result();
	}

	function insert($data)
	{
		$this->db->insert($this->_user, $data);
	}
	
	function deleteData($id)
	{

		return $this->db->delete($this->_user, array("id" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
