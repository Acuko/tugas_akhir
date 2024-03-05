  <?php
	class penginapan extends CI_Controller
	{
		public function index()
		{
			$keyword = $this->input->get('q');
			$keywordl = $this->input->get('l');
			$this->load->library('pagination');
			if ($keyword <> '' || $keywordl) {
				$config['base_url'] = base_url() . 'pengguna/penginapan?q=' . urlencode($keyword) . '&l=' . urlencode($keywordl);
				$config['first_url'] = base_url() . 'pengguna/penginapan?q=' . urlencode($keyword) . '&l=' . urlencode($keywordl);
			} else {
				$config['base_url'] = base_url() . 'pengguna/penginapan';
				$config['first_url'] = base_url() . 'pengguna/penginapan';
			}
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_datapenginapan2('penginapan', $keyword, $keywordl);
			$config['per_page'] = 6;
			$config['first_link']       = 'First';
			$config['last_link']        = 'Last';
			$config['next_link']        = '<span class="lnr lnr-chevron-right"></span>';
			$config['prev_link']        = '<span class="lnr lnr-chevron-left"></span>';
			$config['full_tag_open']    = '<nav class="blog-pagination justify-content-center d-flex"><ul class="pagination">';
			$config['full_tag_close']   = '</ul></nav>';
			$config['num_tag_open']     = '<li class="page-item"><div class="page-link">';
			$config['num_tag_close']    = '</div></li>';
			$config['cur_tag_open']     = '<li class="page-item active"><div class="page-link">';
			$config['cur_tag_close']    = '<div class="sr-only"></div></div></li>';
			$config['next_tag_open']    = '<li class="page-item"><div class="page-link">';
			$config['next_tagl_close']  = '<div aria-hidden="true">&raquo;</div></div></li>';
			$config['prev_tag_open']    = '<li class="page-item"> <span class="page-link" aria-hidden="true">';
			$config['prev_tagl_close']  = '<span class="lnr lnr-chevron-left"></span></span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"> <span class="page-link" aria-hidden="true">';
			$config['last_tagl_close']  = '<span class="lnr lnr-chevron-right"></span></span></li>';
			$this->pagination->initialize($config);
			$limit = $config['per_page'];
			$offset = html_escape($this->input->get('per_page'));
			$data['penginapan'] = $this->rental_model->get_published_penginapan2($limit, $offset, $keyword, $keywordl);
			$data['kategori'] = $this->rental_model->get_alldata('kategori', '3');

			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/penginapan', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function detail_penginapan($id)
		{
			$jenis = "penginapan";
			if ($this->session->userdata('login_status') != TRUE) {
				$data['detail'] = $this->rental_model->ambil_id_penginapan($id);
				$data['gambar'] = $this->rental_model->ambil_gambar($id, $jenis);

				$data['gambar'] = $this->rental_model->ambil_gambar($id, $jenis);
				$data['ratings'] = $this->rental_model->ambil_rating($id, $jenis);

				$data['totrating'] = $this->rental_model->ambil_ratings($id, $jenis);
			} else {
				$idu = $this->session->userdata('id_user');
				$data['detail'] = $this->rental_model->ambil_id_penginapan($id);
				$data['gambar'] = $this->rental_model->ambil_gambar($id, $jenis);

				$data['komentar'] = $this->rental_model->ambil_id_komentarp($id);
				$data['gambar'] = $this->rental_model->ambil_gambar($id,$jenis);
				$data['ratings'] = $this->rental_model->ambil_rating($id, $jenis);
				
				$data['totrating'] = $this->rental_model->ambil_ratings($id, $jenis);
			}

			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/detail_penginapan', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function search()
		{
			$this->load->library('pagination');
			$config['base_url'] = site_url('pengguna/penginapan');
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_data('penginapan');
			$config['per_page'] = 3;
			$config['full_tag_open'] = '<div class="pagination">';
			$config['full_tag_close'] = '</div>';
			$this->pagination->initialize($config);
			$limit = $config['per_page'];
			$offset = html_escape($this->input->get('per_page'));
			$data['penginapan'] = $this->rental_model->get_published_penginapan($limit, $offset);

			$keyword = $this->input->post('keyword');
			$data['penginapan'] = $this->rental_model->get_keyword_penginapan($keyword);
			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/penginapan', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function komentar()
		{

			$idw = $this->input->post('idpenginapan', TRUE);
			$data = array(
				'id_user' => $this->input->post('iduser', TRUE),
				'id_komentar_penginapan' => $this->input->post('idpenginapan', TRUE),
				'komentar' => $this->input->post('kome', TRUE),
			);

			$this->rental_model->insert_data($data, "komentar");
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/penginapan/detail_penginapan/' . $idw));
		}
		public function rating()
		{
	
			$idw = $this->input->post('jenisid', TRUE);
			$data = array(
				'iduser' => $this->input->post('iduser', TRUE),
				'jenisid' => $this->input->post('jenisid', TRUE),
				'jenis' => $this->input->post('jenis', TRUE),
				'ratings' => $this->input->post('ratings', TRUE),
				'note' => $this->input->post('note', TRUE),
			);
	
			$this->rental_model->insert_data($data, "rating");
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/penginapan/detail_penginapan/' . $idw));
		}

		public function addlike()
		{

			$idw = $this->input->post('idpenginapan', TRUE);
			$data = array(
				'id_user' => $this->input->post('iduser', TRUE),
				'id_like_penginapan' => $this->input->post('idpenginapan', TRUE),
				'jumlah_like' => 1,
			);

			$this->rental_model->insert_data($data, "like_user");
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/penginapan/detail_penginapan/' . $idw));
		}

		public function removelike()
		{

			$idw = $this->input->post('idpenginapan', TRUE);
			$idu = $this->input->post('iduser', TRUE);
			$idwi = array('id_user' => $idu);
			$where = array('id_like_penginapan' => $idw);
			$this->rental_model->delete_like($idwi, $where, 'like_user');

			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/penginapan/detail_penginapan/' . $idw));
		}
	}


	?>
