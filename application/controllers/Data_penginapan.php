 <?php

	//Memanggil file autoload
	require 'vendor/autoload.php';

	//Memanggil class dari PhpSpreadsheet dengan namespace
	class data_penginapan extends CI_Controller
	{


		public function index()
		{


			$this->load->library('pagination');
			$config['base_url'] = site_url('data_penginapan');
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_data('penginapan');
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
			$data['penginapan'] = $this->rental_model->get_published_penginapan($limit, $offset);



			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_penginapan', $data);
			$this->load->view('templates_admin/footer');
		}
		public function tambah_penginapan()
		{
			$data = array(
				'kategori' => $this->rental_model->get_alldata('kategori', '3'),
			);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_tambah_penginapan', $data);
			$this->load->view('templates_admin/footer');
		}

		public function tambah_penginapan_aksi()
		{
			$this->_rules();
			if ($this->form_validation->run() == FALSE) {
				$this->tambah_penginapan();
			} else {
				$nama_penginapan	= $this->input->post('nama_penginapan');
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
					'nama_penginapan'  		=> $nama_penginapan,
					'alamat' 				=> $alamat,
					'idkategori' 			=> $kategori,
					'latitude' 				=> $latitude,
					'longitude' 			=> $longitude,
					'gambar' 				=> $gambar,
					'deskripsi' 			=> $deskripsi
				);
				$this->rental_model->insert_data($data, 'penginapan');
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
				redirect('data_penginapan');
			}
		}

		public function detail_penginapan($id)
		{
			$jenis = "penginapan";
			$data['detail'] = $this->rental_model->ambil_id_penginapan($id);
			$data['gambar'] = $this->rental_model->ambil_gambar($id, $jenis);
			$data['idw'] = $id;
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/detail_penginapan', $data);
			$this->load->view('templates_admin/footer');
		}

		public function delete_penginapan($id)
		{
			$where = array('id_penginapan' => $id);
			$this->rental_model->delete_data($where, 'penginapan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
			redirect('data_penginapan');
		}

		public function delete_foto($id)
		{
			$where = array('id' => $id);
			$this->rental_model->delete_data($where, 'detail_gambar');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			 Data Berhasil Dihapus</div>');
			redirect('data_penginapan');
		}

		public function update_penginapan($id)
		{

			$where = array('id_penginapan' => $id);
			$data = array(
				'kategori' => $this->rental_model->get_alldata('kategori', '3'),
				'penginapan' => $this->db->query("SELECT * FROM penginapan WHERE id_penginapan='$id'")->result(),
			);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_update_penginapan', $data);
			$this->load->view('templates_admin/footer');
		}

		public function update_penginapan_aksi()
		{
			$this->form_validation->set_rules('id_penginapan', 'ID penginapan', 'required');
			$this->form_validation->set_rules('nama_penginapan', 'Nama penginapan', 'required');
			$this->form_validation->set_rules('alamat', 'Alamat', 'required');
			$this->form_validation->set_rules('latitude', 'Latitude', 'required');
			$this->form_validation->set_rules('kategori', 'Kategori', 'required');
			$this->form_validation->set_rules('longitude', 'Longitude', 'required');
			$this->_rules();
			if ($this->form_validation->run() == FALSE) {
				return (false);
			} else {
				$id 				= $this->input->post('id_penginapan');
				$nama_penginapan 	= $this->input->post('nama_penginapan');
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
					'nama_penginapan'	=> $nama_penginapan,
					'alamat' 			=> $alamat,
					'idkategori' 		=> $idkategori,
					'latitude' 			=> $latitude,
					'longitude' 		=> $longitude,
					'gambar' 			=> $gambar,
					'deskripsi' 		=> $deskripsi
				);

				$where = array(
					'id_penginapan' => $id
				);
				$this->rental_model->update_data('penginapan', $data, $where);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Penginapan Berhasil Diupdate</div>');
				redirect('data_penginapan');
			}
		}

		public function _rules()
		{
			$this->form_validation->set_rules('nama_penginapan', 'nama_penginapan', 'required');
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

					$data["nama_penginapan"] = $t[1];
					$data["alamat"] = $t[2];
					$data["gambar"] = $t[3];
					$data["deskripsi"] = $t[4];
					$data["latitude"] = $t[5];
					$data["longitude"] = $t[6];
					$data["idkategori"] = $t[7];
					array_push($datas, $data);
				}
				$result = $this->rental_model->add_data($datas, 'penginapan');
				if ($result) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
			Data Berhasil Ditambahkan</div>');
					redirect('data_penginapan');
				} else {
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
		Data Gagal Ditambahkan</div>');
					redirect('data_penginapan');
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
			redirect('data_penginapan/detail_penginapan/' . $idw);
		}
	}
