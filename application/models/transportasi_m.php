<?php

defined('BASEPATH') or exit('No direct script access allowed');

class transportasi_m extends CI_Model
{
	private $_transportasi = "transportasi";

	public function getal()
	{
		$this->db->select('wisata.nama_wisata, wisata.alamat, transportasi.*');
		$this->db->from('transportasi');
		$this->db->join('wisata', 'wisata.id_wisata  = transportasi.id_wisata');
		$res = $this->db->get();
		return $res->result();
	}
	public function getWisata()
	{
		$this->db->select('*');
		$this->db->from('wisata');
		$res = $this->db->get();
		return $res->result();
	}
	function insert($data)
	{
		$this->db->insert($this->_transportasi, $data);
	}
	function deleteData($id)
	{

		return $this->db->delete($this->_transportasi, array("id" => $id));
	}

	function updateData($table, $data, $field_key)
	{
		$this->db->update($table, $data, $field_key);
	}
}
                        
/* End of file category.php */
