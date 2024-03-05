<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Rental_model extends CI_model
{
	public $table = 'wisata';
	public $id = 'id_wisata';
	public $idk = 'id_kuliner';
	public $idp = 'id_penginapan';
	public $desc = 'DESC';
	public $asc = 'ASC';
	public function get_data($table)
	{
		$query = $this->db->get($table);
		return $query->num_rows();
	}

	public function get_datawisata2($table, $key, $keyl)
	{


		
		if($keyl!=''){
			$query = $this->db->query("select * from(SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like'%$key%'  or  wisata.nama_wisata like'%$key%' 
			GROUP BY id_wisata
			ORDER BY `rat` DESC) as a
			where a.rat >= 4
			");
		}  else {
			$query = $this->db->query("SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like'%$key%'  or  wisata.nama_wisata like'%$key%' 
			GROUP BY id_wisata
			ORDER BY `rat` DESC 
				");
		}
		return $query->num_rows();
	}

	public function get_published_wisata2($limit = null, $offset = null, $key = null, $keyl = null)
	{


		if($keyl!='' && $offset != ''){
			$query = $this->db->query("select * from(SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like '%$key%'  or  wisata.nama_wisata like '%$key%' 
			and avg(rating.ratings) >= $keyl
			GROUP BY id_wisata
			ORDER BY `rat` DESC LIMIT $limit, $offset) as a
			where a.rat >= 4");
		}else if($keyl!=''){
			$query = $this->db->query("select * from(SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like'%$key%'  or  wisata.nama_wisata like'%$key%' 
			GROUP BY id_wisata
			ORDER BY `rat` DESC LIMIT $limit) as a
			where a.rat >= 4
			");
		}
		else if ($offset != '') {
			$query = $this->db->query("SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like '%$key%'  or  wisata.nama_wisata like '%$key%' 
			GROUP BY id_wisata
			ORDER BY `rat` DESC LIMIT $limit, $offset");
		}  else {
			$query = $this->db->query("SELECT wisata.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `wisata` 
			JOIN `kategori` ON `wisata`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `wisata`.`id_wisata` AND `rating`.`jenis` = 'wisata'
			where kategori.namakategori like'%$key%'  or  wisata.nama_wisata like'%$key%' 
			GROUP BY id_wisata
			ORDER BY `rat` DESC LIMIT $limit
				");
		}
		
		return $query->result();
	}

	public function get_datakuliner2($table, $key, $keyl)
	{
		if($keyl!=''){
			$query = $this->db->query("select * from(SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like'%$key%'  or  kuliner.nama_kuliner like'%$key%' 
			GROUP BY id_kuliner
			ORDER BY `rat` ) as a
			where a.rat >= 4
			");
		}else {
			$query = $this->db->query("SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like'%$key%'  or  kuliner.nama_kuliner like'%$key%' 
			GROUP BY id_kuliner
			ORDER BY `rat` DESC 
				");
		}
		return $query->num_rows();
	}

	public function get_published_kuliner2($limit = null, $offset = null, $key = null, $keyl = null)
	{
		if($keyl!='' && $offset != ''){
			$query = $this->db->query("select * from(SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like '%$key%'  or  kuliner.nama_kuliner like '%$key%' 
			and avg(rating.ratings) >= $keyl
			GROUP BY id_kuliner
			ORDER BY `rat` DESC LIMIT $limit, $offset) as a
			where a.rat >= 4");
		}else if($keyl!=''){
			$query = $this->db->query("select * from(SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like'%$key%'  or  kuliner.nama_kuliner like'%$key%' 
			GROUP BY id_kuliner
			ORDER BY `rat` DESC LIMIT $limit) as a
			where a.rat >= 4
			");
		}
		else if ($offset != '') {
			$query = $this->db->query("SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like '%$key%'  or  kuliner.nama_kuliner like '%$key%' 
			GROUP BY id_kuliner
			ORDER BY `rat` DESC LIMIT $limit, $offset");
		}  else {
			$query = $this->db->query("SELECT kuliner.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `kuliner` 
			JOIN `kategori` ON `kuliner`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `kuliner`.`id_kuliner` AND `rating`.`jenis` = 'kuliner'
			where kategori.namakategori like'%$key%'  or  kuliner.nama_kuliner like'%$key%' 
			GROUP BY id_kuliner
			ORDER BY `rat` DESC LIMIT $limit
				");
		}
		
		return $query->result();
	}

	public function get_datapenginapan2($table, $key, $keyl)
	{
		 if($keyl!=''){
			$query = $this->db->query("select * from(SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like'%$key%'  or  penginapan.nama_penginapan like'%$key%' 
			GROUP BY id_penginapan
			ORDER BY `rat` ) as a
			where a.rat >= 4
			");
		}else {
			$query = $this->db->query("SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like'%$key%'  or  penginapan.nama_penginapan like'%$key%' 
			GROUP BY id_penginapan
			ORDER BY `rat` DESC 
				");
		}
		return $query->num_rows();
	}

	public function get_published_penginapan2($limit = null, $offset = null, $key = null,$keyl=null)
	{
		if($keyl!='' && $offset != ''){
			$query = $this->db->query("select * from(SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like '%$key%'  or  penginapan.nama_penginapan like '%$key%' 
			and avg(rating.ratings) >= $keyl
			GROUP BY id_penginapan
			ORDER BY `rat` DESC LIMIT $limit, $offset) as a
			where a.rat >= 4");
		}else if($keyl!=''){
			$query = $this->db->query("select * from(SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like'%$key%'  or  penginapan.nama_penginapan like'%$key%' 
			GROUP BY id_penginapan
			ORDER BY `rat` DESC LIMIT $limit) as a
			where a.rat >= 4
			");
		}
		else if ($offset != '') {
			$query = $this->db->query("SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like '%$key%'  or  penginapan.nama_penginapan like '%$key%' 
			GROUP BY id_penginapan
			ORDER BY `rat` DESC LIMIT $limit, $offset");
		}  else {
			$query = $this->db->query("SELECT penginapan.*,
			kategori.namakategori,
			avg(rating.ratings)as rat
			FROM `penginapan` 
			JOIN `kategori` ON `penginapan`.`idKategori` = `kategori`.`idKategori` 
			LEFT JOIN `rating` ON `rating`.`jenisid`= `penginapan`.`id_penginapan` AND `rating`.`jenis` = 'penginapan'
			where kategori.namakategori like'%$key%'  or  penginapan.nama_penginapan like'%$key%' 
			GROUP BY id_penginapan
			ORDER BY `rat` DESC LIMIT $limit
				");
		}

		return $query->result();
	}

	public function get_alldata($table, $jenis)
	{
		$res = $this->db->where('jenis', $jenis);
		$res = $this->db->get($table);
		return $res->result();
	}

	function add_data($datas, $table)
	{
		return $this->db->insert_batch($table, $datas);
	}

	public function getmulti($table)
	{
		$res = $this->db->get($table);
		return $res->result();
	}

	public function getwisata()
	{
		$res = $this->db->query("select a.* from(select nama_wisata, latitude, longitude, gambar, alamat, deskripsi from wisata 
                                   ) as a");
		return $res->result();
	}

	public function getkuliner()
	{
		$res = $this->db->query("select b.* from(select nama_kuliner, latitude, longitude, gambar, alamat,deskripsi from kuliner 
                                   ) as b");
		return $res->result();
	}

	public function getpenginapan()
	{
		$res = $this->db->query("select c.* from(select nama_penginapan, latitude, longitude, gambar, alamat, deskripsi from penginapan 
                                   ) as c");
		return $res->result();
	}

	public function insert_data($data, $table)
	{
		$this->db->insert($table, $data);
	}

	public function update_data($table, $data, $where)
	{
		$this->db->update($table, $data, $where);
	}

	public function delete_data($where, $table)
	{
		$this->db->where($where);
		$this->db->delete($table);
	}
	public function delete_like($idw, $where, $table)
	{
		$this->db->where($idw);
		$this->db->where($where);
		$this->db->delete($table);
	}

	public function ambil_id_wisata($id)
	{
		$hasil = $this->db->where('id_wisata', $id)->get('wisata');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}
	public function ambil_gambar($id, $jenis)
	{
		$this->db->select('*');
		$this->db->from('detail_gambar');
		$this->db->where('id_jenis', $id);
		$this->db->where('jenis', $jenis);
		return $this->db->get()->result();
	}
	public function ambil_ratings($id, $jenis)
	{
		$query = $this->db->query("SELECT avg(rating.ratings)as rat
			FROM  `rating`
			where jenis ='$jenis'  and jenisid='$id' ");
				
		return $query->result();
	}
	public function ambil_rating($id, $jenis)
	{
		$query = $this->db->query("SELECT *
			FROM  `rating`
			join user on user.id =rating.iduser
			where jenis ='$jenis'  and jenisid='$id' ");
				
		return $query->result();
	}
	public function ambil_activity($id)
	{
		$query = $this->db->query("SELECT ratings, jenis,jenisid, nama, note FROM rating join user on user.id =rating.iduser where iduser='$id' ");
				
		return $query->result();
	}

	public function ambil_user($id)
	{
		$query = $this->db->query("SELECT * FROM user  where id='$id' ");
				
		return $query->result();
	}
	
	public function ambil_id_transportasi($id)
	{
		$hasil = $this->db->where('id_wisata', $id)->get('transportasi');

		return  $hasil->result();
	}

	public function ambil_id_komentar($id)
	{
		$hasil = $this->db->where('id_komentar_wisata', $id)->get('komentar');

		return  $hasil->result();
	}
	public function ambil_id_komentark($id)
	{
		$hasil = $this->db->where('id_komentar_kuliner', $id)->get('komentar');

		return  $hasil->result();
	}
	
	public function ambil_id_komentarp($id)
	{
		$hasil = $this->db->where('id_komentar_penginapan', $id)->get('komentar');

		return  $hasil->result();
	}
	public function ambil_id_like($id)
	{
		$hasil = $this->db->where('id_like_wisata', $id)->get('like_user');

		return  $hasil->result();
	}
	public function ambil_id_likek($id)
	{
		$hasil = $this->db->where('id_like_kuliner', $id)->get('like_user');

		return  $hasil->result();
	}
	
	public function ambil_id_likep($id)
	{
		$hasil = $this->db->where('id_like_penginapan', $id)->get('like_user');

		return  $hasil->result();
	}
	public function ambil_id_likeuser($id, $idu)
	{
		$hasil = $this->db->where('id_like_wisata', $id)->where('id_user', $idu)->get('like_user');

		return  $hasil->result();
	}
	public function ambil_id_likeuserk($id, $idu)
	{
		$hasil = $this->db->where('id_like_kuliner', $id)->where('id_user', $idu)->get('like_user');

		return  $hasil->result();
	}
	public function ambil_id_likeuserp($id, $idu)
	{
		$hasil = $this->db->where('id_like_penginapan', $id)->where('id_user', $idu)->get('like_user');

		return  $hasil->result();
	}
	public function ambil_id_berita($id)
	{
		$hasil = $this->db->where('idBerita', $id)->get('berita');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}
	public function ambil_id_kuliner($id)
	{
		$hasil = $this->db->where('id_kuliner', $id)->get('kuliner');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}

	public function ambil_id_penginapan($id)
	{
		$hasil = $this->db->where('id_penginapan', $id)->get('penginapan');
		if ($hasil->num_rows() > 0) {
			return $hasil->result();
		} else {
			return false;
		}
	}

	public function get_keyword_wisata($keyword)
	{
		$this->db->select('*');
		$this->db->from('wisata');
		$this->db->like('nama_wisata', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		$this->db->or_like('longitude', $keyword);
		$this->db->or_like('latitude', $keyword);
		return $this->db->get()->result();
	}
	public function get_keyword_kuliner($keyword)
	{
		$this->db->select('*');
		$this->db->from('kuliner');
		$this->db->like('nama_kuliner', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		$this->db->or_like('longitude', $keyword);
		$this->db->or_like('latitude', $keyword);
		return $this->db->get()->result();
	}

	public function get_keyword_penginapan($keyword)
	{
		$this->db->select('*');
		$this->db->from('penginapan');
		$this->db->like('nama_penginapan', $keyword);
		$this->db->or_like('alamat', $keyword);
		$this->db->or_like('deskripsi', $keyword);
		$this->db->or_like('longitude', $keyword);
		$this->db->or_like('latitude', $keyword);
		return $this->db->get()->result();
	}

	public function get_published_wisata($limit = null, $offset = null)
	{
		$query =  $this->db->get('wisata', $limit, $offset);
		return $query->result();
	}


	public function get_published_kuliner($limit = null, $offset = null)
	{
		$query =  $this->db->get('kuliner', $limit, $offset);
		return $query->result();
	}

	public function get_published_penginapan($limit = null, $offset = null)
	{
		$query =  $this->db->get('penginapan', $limit, $offset);
		return $query->result();
	}

	public function get_published_jenis($limit = null, $offset = null)
	{
		$query =  $this->db->get('jenis', $limit, $offset);
		return $query->result();
	}
	public function get_published_kecamatan($limit = null, $offset = null)
	{
		$query =  $this->db->get('kecamatan', $limit, $offset);
		return $query->result();
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

	// function total_rows($q = NULL, $status = NULL) {
	// 	$this->db->group_start();
	// 	$this->db->like('nama_wisata', $q);
	// 	$this->db->or_like('alamat', $q);
	// 	$this->db->group_end(); 
	// 	$this->db->from('wisata');
	// 		return $this->db->count_all_results();
	// 	}


	// 	function get_limit_data($limit, $start = 0, $q = NULL , $status = NULL) {
	// 		$this->db->order_by($this->id, $this->desc);
	// 		$this->db->group_start();
	// 		$this->db->like('nama_wisata', $q);
	// 		$this->db->or_like('alamat', $q);
	// 		$this->db->group_end();
	// 		$this->db->limit($limit, $start);
	// 		return $this->db->get('wisata')->result();
	// 		}

	function maps_where_kategori($id)
	{
		$query = $this->db->select('*')
			->from('kategori')
			->where('jenis', $id);
		return $query->get()->result();
	}

	function maps_wisata($id)
	{
		$query = $this->db->select('wisata.id_wisata as id, wisata.nama_wisata,wisata.gambar,wisata.alamat,  wisata.latitude, wisata.longitude, kategori.jenis')
			->from('wisata')
			->join('kategori', 'wisata.idkategori = kategori.idkategori')
			->where('wisata.idkategori', $id);
		return $query->get()->result();
	}

	function maps_kuliner($id)
	{
		$query = $this->db->select('kuliner.id_kuliner as id, kuliner.nama_kuliner,kuliner.gambar,kuliner.alamat, kuliner.latitude, kuliner.longitude, kategori.jenis')
			->from('kuliner')
			->join('kategori', 'kuliner.idkategori = kategori.idkategori')
			->where('kuliner.idkategori', $id);
		return $query->get()->result();
	}

	function maps_penginapan($id)
	{
		$query = $this->db->select('penginapan.id_penginapan as id, penginapan.nama_penginapan,penginapan.gambar,penginapan.alamat, penginapan.latitude, penginapan.longitude, kategori.jenis')
			->from('penginapan')
			->join('kategori', 'penginapan.idkategori = kategori.idkategori')
			->where('penginapan.idkategori', $id);
		return $query->get()->result();
	}

	function maps_spbu($id)
	{
		$query = $this->db->select('spbu.id_spbu as id, spbu.nama_spbu,spbu.gambar,spbu.alamat, spbu.latitude, spbu.longitude, kategori.jenis')
			->from('spbu')
			->join('kategori', 'spbu.id_kategori = kategori.idkategori')
			->where('spbu.id_kategori', $id);
		return $query->get()->result();
	}
	function maps_atm($id)
	{
		$query = $this->db->select('atm.id_atm as id, atm.nama_atm,atm.gambar,atm.alamat, atm.latitude, atm.longitude, kategori.jenis')
			->from('atm')
			->join('kategori', 'atm.id_kategori = kategori.idkategori')
			->where('atm.id_kategori', $id);
		return $query->get()->result();
	}
	public function get_kecamatan()
	{
		$res = $this->db->get('kecamatan');
		return $res->result();
	}

}
