 <?php

	//Memanggil file autoload
	require 'vendor/autoload.php';

	//Memanggil class dari PhpSpreadsheet dengan namespace
	class jenis extends CI_Controller
	{


		public function index()
		{

			$this->load->library('pagination');
			$config['base_url'] = site_url('jenis');
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_data('jenis');
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
			$data['jenis'] = $this->rental_model->get_published_jenis($limit, $offset);

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/jenis', $data);
			$this->load->view('templates_admin/footer');
		}

		public function tambah_jenis()
		{
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_tambah_jenis');
			$this->load->view('templates_admin/footer');
		}

		public function tambah_jenis_aksi()
		{
			$this->_rules();
			if ($this->form_validation->run() == FALSE) {
				$this->tambah_jenis();
			} else {
				$nama_jenis		= $this->input->post('nama_jenis');
			}

			$data = array(
				'nama_jenis'  			=> $nama_jenis
			);
			$this->rental_model->insert_data($data, 'jenis');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('jenis');
		}

		public function delete_wisata($id)
		{
			$where = array('id_wisata' => $id);
			$this->rental_model->delete_data($where, 'wisata');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
			redirect('data_wisata');
		}

		public function delete_jenis($id)
		{
			$where = array('id_jenis' => $id);
			$this->rental_model->delete_data($where, 'jenis');
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
 		Data Berhasil Dihapus</div>');
			redirect('jenis');
		}

		public function update_jenis($id)
		{

			$where = array('id_jenis' => $id);
			$data = array(
				'jenis' => $this->db->query("SELECT * FROM jenis WHERE id_jenis='$id'")->result(),
			);
			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/form_update_jenis', $data);
			$this->load->view('templates_admin/footer');
		}

		public function update_jenis_aksi()
		{
			$this->_rules();
			if ($this->form_validation->run() == FALSE) {
				$this->update_wisata();
			} else {
				$id 				= $this->input->post('id_jenis');
				$nama_jenis 		= $this->input->post('nama_jenis');

				$data = array(
					'nama_jenis'	=> $nama_jenis
				);

				$where = array(
					'id_jenis' => $id
				);
				$this->rental_model->update_data('jenis', $data, $where);
				$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Wisata Berhasil Diupdate</div>');
				redirect('jenis');
			}
		}

		public function _rules()
		{
			$this->form_validation->set_rules('nama_jenis', 'nama_jenis', 'required');
		}
	}
