<?php

use LDAP\Result;

class data_kuliner extends CI_Controller
{
	public function index()
	{

		$this->load->library('pagination');
		$config['base_url'] = site_url('data_kuliner');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->rental_model->get_data('kuliner');
		$config['per_page'] = 8;
		$config['first_link']       = 'First';
		$config['last_link']        = 'Last';
		$config['next_link']        = 'Next';
		$config['prev_link']        = 'Prev';
		$config['full_tag_open']    = '<div class="pagination full-right"><nav><ul class="pagination">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only"></span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';


		$this->pagination->initialize($config);
		$limit = $config['per_page'];
		$offset = html_escape($this->input->get('per_page'));
		$data['kuliner'] = $this->rental_model->get_published_kuliner($limit, $offset);


		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_kuliner', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_kuliner()
	{
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '2'),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_kuliner', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_kuliner_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_kuliner();
		} else {
			$nama_kuliner		= $this->input->post('nama_kuliner');
			$kategori				= $this->input->post('kategori');
			$alamat				= $this->input->post('alamat');
			$latitude			= $this->input->post('latitude');
			$longitude			= $this->input->post('longitude');
			$gambar				= $_FILES['gambar']['name'];
			if ($gambar == '') {
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$deskripsi			= $this->input->post('deskripsi');
			$data = array(
				'nama_kuliner'  		=> $nama_kuliner,
				'alamat' 				=> $alamat,
				'latitude' 				=> $latitude,
				'idkategori' 			=> $kategori,
				'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				'deskripsi' 			=> $deskripsi
			);
			$this->rental_model->insert_data($data, 'kuliner');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('data_kuliner');
		}
	}

	public function detail_kuliner($id)
	{
		$jenis="kuliner";
		$data['detail'] = $this->rental_model->ambil_id_kuliner($id);
		$data['gambar'] = $this->rental_model->ambil_gambar($id,$jenis);
		$data['idw'] = $id;
		
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_kuliner', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_kuliner($id)
	{
		$where = array('id_kuliner' => $id);
		$this->rental_model->delete_data($where, 'kuliner');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
		redirect('data_kuliner');
	}

	public function delete_foto($id)
	{
		$where = array('id' => $id);
		$this->rental_model->delete_data($where, 'detail_gambar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
		redirect('data_kuliner');
	}

	public function update_kuliner($id)
	{
		$where = array('id_kuliner' => $id);
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '2'),
			'kuliner' => $this->db->query("SELECT * FROM kuliner WHERE id_kuliner='$id'")->result(),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_kuliner', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_kuliner_aksi()
	{
		$this->form_validation->set_rules('id_kuliner', 'ID Kuliner', 'required');
		$this->form_validation->set_rules('nama_kuliner', 'Nama Kuliner', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			return(false);
		} else {
			$id 				= $this->input->post('id_kuliner');
			$nama_kuliner 		= $this->input->post('nama_kuliner');
			$alamat 			= $this->input->post('alamat');
			$latitude 			= $this->input->post('latitude');
			$kategori 			= $this->input->post('kategori');
			$longitude 			= $this->input->post('longitude');
			$gambar				= $_FILES['gambar']['name'];
			if ($gambar == '') {
				$gambar = $this->input->post('foto_old', TRUE);
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$deskripsi 			= $this->input->post('deskripsi');

			$data = array(
				'nama_kuliner'	=> $nama_kuliner,
				'alamat' 		=> $alamat,
				'latitude' 		=> $latitude,
				'idkategori' 		=> $kategori,
				'longitude' 	=> $longitude,
				'gambar' 		=> $gambar,
				'deskripsi' 	=> $deskripsi
			);

			$where = array(
				'id_kuliner' => $id
			);
			$this->rental_model->update_data('kuliner', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Kuliner Berhasil Diupdate</div>');
			redirect('data_kuliner');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_kuliner', 'nama_kuliner', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
	}
	public function import_excel()
	{
		if (isset($_FILES["fileExcel"]["name"])) {
			$path_xlsx = $_FILES["fileExcel"]["tmp_name"];
			$reader = new 	\PhpOffice\PhpSpreadsheet\Reader\Xlsx();
			$spreadsheet = $reader->load($path_xlsx);
			$d = $spreadsheet->getSheet(0)->toArray();
			unset($d[0]);
			$datas = array();
			foreach ($d as $t) {

				$data["nama_kuliner"] = $t[1];
				$data["alamat"] = $t[2];
				$data["gambar"] = $t[3];
				$data["deskripsi"] = $t[4];
				$data["latitude"] = $t[5];
				$data["longitude"] = $t[6];
				$data["idkategori"] = $t[7];
				array_push($datas, $data);
			}
			$result = $this->rental_model->add_data($datas, 'kuliner');
			if ($result) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Berhasil Ditambahkan</div>');
				redirect('data_kuliner');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Gagal Ditambahkan</div>');
				redirect('data_kuliner');
			}
		}
	}
	//new update
	public function tambah_gambar()
	{
		$idw			= $this->input->post('idw');
		$jenis			= $this->input->post('jenis');
		$gambar				= $_FILES['gambar']['name'];
		if ($gambar == '') {
		} else {
			$config['upload_path'] = './assets/upload';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('gambar')) {
				echo 'Gambar Gagal Diupload';
			} else {
				$gambar = $this->upload->data('file_name');
			}
		}

		$data = array(
			'jenis'  			=> $jenis,
			'id_jenis' 				=> $idw,
			'gambar' 				=> $gambar
		);
		$this->rental_model->insert_data($data, 'detail_gambar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
		redirect('data_kuliner/detail_kuliner/'.$idw);
	}
}
