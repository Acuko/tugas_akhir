 <?php

	defined('BASEPATH') or exit('No direct script access allowed');

	class Berita_m extends CI_Model
	{

		private $_berita = "berita";

		public function getal($table)
		{
			$res = $this->db->get($table);
			return $res->result();
		}

		public function get_published_berita($limit = null, $offset = null, $key)
		{
			$query =  $this->db->like('judul', $key);
			$query =  $this->db->order_by('insertedDate', 'DESC')->get('berita', $limit, $offset);
			return $query->result();
		}
		public function get_data($table, $key)
		{
			$query =  $this->db->like('judul', $key);
			$query = $this->db->get($table);
			return $query->num_rows();
		}
		public function getalKategori($table)
		{
			$res = $this->db->where('jenis', '4');
			$res = $this->db->get($table);
			return $res->result();
		}
		public function recent()
		{
			$hasil = $this->db->order_by('insertedDate', 'DESC')->limit(4)->get('berita');
			if ($hasil->num_rows() > 0) {
				return $hasil->result();
			} else {
				return false;
			}
		}

		function insert($data)
		{
			$this->db->insert($this->_berita, $data);
		}
		function deleteData($id)
		{

			return $this->db->delete($this->_berita, array("idberita " => $id));
		}

		function updateData($table, $data, $field_key)
		{
			$this->db->update($table, $data, $field_key);
		}

		function count()
		{
			$res = $this->db->query("SELECT b.namakategori, COUNT(a.idBerita) as tot FROM berita as a inner join kategori as b on a.idkategori=b.idkategori group by b.namakategori");
			return $res->result();
		}
	}
                        
/* End of file Berita_m.php */
