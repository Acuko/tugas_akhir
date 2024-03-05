  <?php
	class Kuliner extends CI_Controller
	{
		public function index()
		{
			$keyword = $this->input->get('q');
			$keywordl = $this->input->get('l');
			$this->load->library('pagination');
			if ($keyword <> '' || $keywordl) {
				$config['base_url'] = base_url() . 'pengguna/kuliner?q=' . urlencode($keyword) . '&l=' . urlencode($keywordl);
				$config['first_url'] = base_url() . 'pengguna/kuliner?q=' . urlencode($keyword) . '&l=' . urlencode($keywordl);
			} else {
				$config['base_url'] = base_url() . 'pengguna/kuliner';
				$config['first_url'] = base_url() . 'pengguna/Kuliner';
			}
			$config['page_query_string'] = TRUE;
			$config['total_rows'] = $this->rental_model->get_datakuliner2('kuliner', $keyword, $keywordl);
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
			$config['prev_tagl_close']  = '   <span class="lnr lnr-chevron-left"></span></span></li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"> <span class="page-link" aria-hidden="true">';
			$config['last_tagl_close']  = '<span class="lnr lnr-chevron-right"></span></span></li>';
			$this->pagination->initialize($config);
			$limit = $config['per_page'];
			$offset = html_escape($this->input->get('per_page'));
			$data['kuliner'] = $this->rental_model->get_published_kuliner2($limit, $offset, $keyword, $keywordl);
			$data['kategori'] = $this->rental_model->get_alldata('kategori', '2');

			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/kuliner', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function detail_kuliner($id)
		{
			$jenis="kuliner";
			if ($this->session->userdata('login_status') != TRUE) {
				$data['detail'] = $this->rental_model->ambil_id_kuliner($id);
				$data['ratings'] = $this->rental_model->ambil_rating($id, $jenis);
			
				$data['totrating'] = $this->rental_model->ambil_ratings($id, $jenis);
				$data['gambar'] = $this->rental_model->ambil_gambar($id,$jenis);
			} else {
				$idu = $this->session->userdata('id_user');
				$data['detail'] = $this->rental_model->ambil_id_kuliner($id);
				$data['ratings'] = $this->rental_model->ambil_rating($id, $jenis);
			
				$data['totrating'] = $this->rental_model->ambil_ratings($id, $jenis);
				$data['gambar'] = $this->rental_model->ambil_gambar($id,$jenis);
				
			}

			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/detail_kuliner', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function search()
		{
			$keyword = $this->input->post('keyword');
			$data['kuliner'] = $this->rental_model->get_keyword_kuliner($keyword);
			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/kuliner', $data);
			$this->load->view('templates_pengguna/footer');
		}
		public function komentar()
		{

			$idw = $this->input->post('idkuliner', TRUE);
			$data = array(
				'id_user' => $this->input->post('iduser', TRUE),
				'id_komentar_kuliner' => $this->input->post('idkuliner', TRUE),
				'komentar' => $this->input->post('kome', TRUE),
			);

			$this->rental_model->insert_data($data, "komentar");
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/kuliner/detail_kuliner/' . $idw));
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
			redirect(site_url('pengguna/kuliner/detail_kuliner/' . $idw));
		}
		public function addlike()
		{

			$idw = $this->input->post('idkuliner', TRUE);
			$data = array(
				'id_user' => $this->input->post('iduser', TRUE),
				'id_like_kuliner' => $this->input->post('idkuliner', TRUE),
				'jumlah_like' => 1,
			);

			$this->rental_model->insert_data($data, "like_user");
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/kuliner/detail_kuliner/' . $idw));
		}

		public function removelike()
		{

			$idw = $this->input->post('idkuliner', TRUE);
			$idu = $this->input->post('iduser', TRUE);
			$idwi = array('id_user' => $idu);
			$where = array('id_like_kuliner' => $idw);
			$this->rental_model->delete_like($idwi, $where, 'like_user');

			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('pengguna/kuliner/detail_kuliner/' . $idw));
		}
	}

	?>
