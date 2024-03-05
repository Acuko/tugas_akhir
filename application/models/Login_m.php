<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login_m extends CI_Model
{
	function login($username, $password)
	{
		//create query to connect user login database
		$this->db->select('*');
		$this->db->from('admin');
		$this->db->where('username', $username);
		$this->db->where('password', MD5($password));
		//$this->db->limit(1);

		//get query and processing
		$query = $this->db->get();
		if ($query->num_rows() == 1) {
			return $query->result();
		} else {
			return false; //if data is wrong
		}
	}
}
/* End of file login_m.php */
