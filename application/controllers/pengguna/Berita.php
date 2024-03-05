   <?php
		class berita extends CI_Controller
		{
			public function __construct()
			{
				parent::__construct();
				$this->load->model("berita_m");
				$this->load->library('form_validation');
			}

			public function index()
			{
				$cat = $this->berita_m;
				$this->load->library('pagination');
				$keyword = $this->input->get('q');
				$this->load->library('pagination');
				if ($keyword <> '') {
					$config['base_url'] = base_url() . 'pengguna/berita?q=' . urlencode($keyword);
					$config['first_url'] = base_url() . 'pengguna/berita?q=' . urlencode($keyword);
				} else {
					$config['base_url'] = base_url() . 'pengguna/berita';
					$config['first_url'] = base_url() . 'pengguna/berita';
				}
				$config['page_query_string'] = TRUE;
				$config['total_rows'] = $cat->get_data('berita', $keyword);
				$config['per_page'] = 3;
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

				$data = array(
					'title' => 'berita',
					'berita' => $cat->get_published_berita($limit, $offset, $keyword),
					'kategori' => $cat->count(),
					'recent' => $cat->recent(),
				);
				$this->load->view('templates_pengguna/header');
				$this->load->view('pengguna/berita', $data);
				$this->load->view('templates_pengguna/footer');
			}
			public function detail_berita($id)
			{
				$data['detail'] = $this->rental_model->ambil_id_berita($id);
				$data['recent'] = $this->rental_model->recent();

				$this->load->view('templates_pengguna/header');
				$this->load->view('pengguna/detail_berita', $data);
				$this->load->view('templates_pengguna/footer');
			}
		}

		?>
