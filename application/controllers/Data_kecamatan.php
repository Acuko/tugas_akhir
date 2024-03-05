 <?php

	//Memanggil file autoload
	require 'vendor/autoload.php';

	//Memanggil class dari PhpSpreadsheet dengan namespace
	class data_kecamatan extends CI_Controller
	{

		function __construct()
		{
			parent::__construct();
			$this->load->library('form_validation');
		}

		public function index()
		{

			$this->load->library('pagination');
			$config['base_url'] = site_url('data_kecamatan');
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_data('kecamatan');
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
			$data['kecamatan'] = $this->rental_model->get_published_kecamatan($limit, $offset);

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/data_kecamatan', $data);
			$this->load->view('templates_admin/footer');
		}

		public function tambah_kecamatan()
		{
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_tambah_kecamatan');
			$this->load->view('templates_admin/footer');
		}

		public function tambah_kecamatan_aksi()
		{
			$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
			$this->form_validation->set_rules('warna', 'Warna', 'required');
			$this->form_validation->set_rules('geojson', 'GeoJson', 'required');
			if ($this->form_validation->run() == FALSE) {
				return(false);
			} else {
				$nama_kecamatan		= $this->input->post('nama_kecamatan');
				$warna				= $this->input->post('warna');
				$geojson			= $this->input->post('geojson');
			}

			$data = array(
				'nama_kecamatan'  	=> $nama_kecamatan,
				'warna'  			=> $warna,
				'geojson'  			=> $geojson
			);
			$this->rental_model->insert_data($data, 'kecamatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('data_kecamatan');
		}

		public function delete_kecamatan($id)
		{
			$where = array('id_kecamatan' => $id);
			$this->rental_model->delete_data($where, 'kecamatan');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
			redirect('data_kecamatan');
		}

		public function update_kecamatan($id)
		{

			$where = array('id_kecamatan' => $id);
			$data = array(
				'kecamatan' => $this->db->query("SELECT * FROM kecamatan WHERE id_kecamatan='$id'")->result(),
			);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_update_kecamatan', $data);
			$this->load->view('templates_admin/footer');
		}

		public function update_kecamatan_aksi()
		{
			$this->form_validation->set_rules('nama_kecamatan', 'Nama Kecamatan', 'required');
			$this->form_validation->set_rules('warna', 'Warna', 'required');
			$this->form_validation->set_rules('geojson', 'GeoJson', 'required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">Data Wisata Gagal Diupdate</div>');
				redirect('data_kecamatan');
			} else {
				$id 				= $this->input->post('id_kecamatan');
				$nama_kecamatan 		= $this->input->post('nama_kecamatan');
				$warna 		= $this->input->post('warna');
				$geojson 		= $this->input->post('geojson');

				$data = array(
					'nama_kecamatan'	=> $nama_kecamatan,
					'warna'	=> $warna,
					'geojson'	=> $geojson
				);

				$where = array(
					'id_kecamatan' => $id
				);
				$this->rental_model->update_data('kecamatan', $data, $where);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Wisata Berhasil Diupdate</div>');
				redirect('data_kecamatan');
			}
		}
	}
