<?php

//Memanggil file autoload
require 'vendor/autoload.php';

//Memanggil class dari PhpSpreadsheet dengan namespace
class data_wisata extends CI_Controller
{
	public function index()
	{

		$this->load->library('pagination');
		$config['base_url'] = site_url('data_wisata');
		$config['page_query_string'] = TRUE;
		$config['total_rows'] = $this->rental_model->get_data('wisata');
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
		$data['wisata'] = $this->rental_model->get_published_wisata($limit, $offset);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/data_wisata', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_wisata()
	{
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '1'),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_wisata', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_wisata_aksi()
	{
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			$this->tambah_wisata();
		} else {
			$nama_wisata		= $this->input->post('nama_wisata');
			$kategori			= $this->input->post('kategori');
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
				'nama_wisata'  			=> $nama_wisata,
				'alamat' 				=> $alamat,
				'idkategori' 			=> $kategori,
				'latitude' 				=> $latitude,
				'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				'deskripsi' 			=> $deskripsi
			);
			$this->rental_model->insert_data($data, 'wisata');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('data_wisata');
		}
	}

	public function detail_wisata($id)
	{
		$jenis="wisata";
		$data['detail'] = $this->rental_model->ambil_id_wisata($id);
		$data['gambar'] = $this->rental_model->ambil_gambar($id,$jenis);
		$data['idw'] = $id;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/detail_wisata', $data);
		$this->load->view('templates_admin/footer');
	}

	public function delete_wisata($id)
	{
		$where = array('id_wisata' => $id);
		$this->rental_model->delete_data($where, 'wisata');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
		redirect('data_wisata');
	}

	public function delete_foto($id)
	{
		$where = array('id' => $id);
		$this->rental_model->delete_data($where, 'detail_gambar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
		redirect('data_wisata');
	}

	public function update_wisata($id)
	{

		$where = array('id_wisata' => $id);
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '1'),
			'wisata' => $this->db->query("SELECT * FROM wisata WHERE id_wisata='$id'")->result(),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_update_wisata', $data);
		$this->load->view('templates_admin/footer');
	}

	public function update_wisata_aksi()
	{
		$this->form_validation->set_rules('id_wisata', 'ID Wisata', 'required');
		$this->form_validation->set_rules('nama_wisata', 'Nama Wisata', 'required');
		$this->form_validation->set_rules('alamat', 'Alamat', 'required');
		$this->form_validation->set_rules('latitude', 'Latitude', 'required');
		$this->form_validation->set_rules('kategori', 'Kategori', 'required');
		$this->form_validation->set_rules('longitude', 'Longitude', 'required');
		$this->_rules();
		if ($this->form_validation->run() == FALSE) {
			return (false);
		} else {
			$id 				= $this->input->post('id_wisata');
			$nama_wisata 		= $this->input->post('nama_wisata');
			$alamat 			= $this->input->post('alamat');
			$idkategori 		= $this->input->post('kategori');
			$latitude 			= $this->input->post('latitude');
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
				'nama_wisata'	=> $nama_wisata,
				'alamat' 		=> $alamat,
				'idkategori' 	=> $idkategori,
				'latitude' 		=> $latitude,
				'longitude' 	=> $longitude,
				'gambar' 		=> $gambar,
				'deskripsi' 	=> $deskripsi
			);

			$where = array(
				'id_wisata' => $id
			);
			$this->rental_model->update_data('wisata', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Wisata Berhasil Diupdate</div>');
			redirect('data_wisata');
		}
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_wisata', 'nama_wisata', 'required');
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

				$data["nama_wisata"] = $t[1];
				$data["alamat"] = $t[2];
				$data["gambar"] = $t[3];
				$data["deskripsi"] = $t[4];
				$data["latitude"] = $t[5];
				$data["longitude"] = $t[6];
				$data["idkategori"] = $t[7];
				array_push($datas, $data);
			}
			$result = $this->rental_model->add_data($datas, 'wisata');
			if ($result) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Berhasil Ditambahkan</div>');
				redirect('data_wisata');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Gagal Ditambahkan</div>');
				redirect('data_wisata');
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
		redirect('data_wisata/detail_wisata/'.$idw);
	}
}
