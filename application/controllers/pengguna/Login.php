 <?php
	class Login extends CI_Controller
	{

		public function __construct()
		{
			parent::__construct();
			$this->load->model("user_m");
			$this->load->library('form_validation');
		}
		public function index()
		{


			include_once APPPATH . "../vendor/autoload.php";
			$google_client = new Google_Client();
			$google_client->setClientId('870642434779-2u8br6qca498d9dfbmbe64ha3tico7jc.apps.googleusercontent.com'); //masukkan ClientID anda 
			$google_client->setClientSecret('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'); //masukkan Client Secret Key anda
			$google_client->setRedirectUri('http://localhost/visitlebakasli/pengguna/login'); //Masukkan Redirect Uri anda
			$google_client->addScope('email');
			$google_client->addScope('profile');
			$code=$this->input->get('code');
		
			if (isset($code)) {

				
				$sess_array = array();
				$sess_array = array(
					'id_user' => 1,
					'nama' => "Login By Google",
					'email' => "Login By Google",
					'alamat' => "Login By Google",
					'nohp' => "Login By Google",
					'login_status' => true,
				);
				//set session with value from database
				$this->session->set_userdata($sess_array);
			}
			$login_button = '';
			if (!$this->session->userdata('login_status')) {

				//$login_button = '<a href="' . $google_client->createAuthUrl() . '"><img src="https://1.bp.blogspot.com/-gvncBD5VwqU/YEnYxS5Ht7I/AAAAAAAAAXU/fsSRah1rL9s3MXM1xv8V471cVOsQRJQlQCLcBGAsYHQ/s320/google_logo.png" /></a>';
				$data['login_button'] = $login_button;
				$this->load->view('templates_pengguna/header', $data);
				$this->load->view('pengguna/login');
				$this->load->view('templates_pengguna/footer');
			} else {
				redirect('pengguna/login/profil');
			}
		}

		function cek_user()
		{
			$data = array(
				'active_user' => 'active',
			);
			//Field validation succeeded.  Validate against database
			$username = $this->input->post('username');
			$password = md5($this->input->post('password'));
			//query the database
			// query chek users
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('email', $username);
			$this->db->where('password', $password);

			$users = $this->db->get();
			if ($users->num_rows() > 0) {
				$user = $users->row_array();

				$sess_array = array();
				$sess_array = array(
					'id_user' => $user['id'],
					'nama' => $user['nama'],
					'email' => $user['email'],
					'alamat' => $user['alamat'],
					'nohp' => $user['nohp'],
					'login_status' => true,
				);
				//set session with value from database
				$this->session->set_userdata($sess_array);
				$this->session->set_flashdata('pesan', 'Login Berhasil');
				$this->load->view('templates_pengguna/header');
				$this->load->view('pengguna/login');
				$this->load->view('templates_pengguna/footer');
				redirect('pengguna/dashboard');
			} else {
				//if form validate false
				$this->session->set_flashdata('gagal', 'Yah Coba masukan username dan password kamu kembali');
				redirect("pengguna/login");
				return FALSE;
			}
		}

		public function profil()
		{
			$id = $this->session->userdata('id_user');
			$data['ratings'] = $this->rental_model->ambil_activity($id);

			$data['user'] = $this->rental_model->ambil_user($id);

			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/profil', $data);
			$this->load->view('templates_pengguna/footer');
		}
		function logout()
		{
			$this->session->sess_destroy();
			$this->session->unset_userdata('access_token');

			$this->session->unset_userdata('user_data');
			redirect('pengguna/dashboard');
		}

		public function saave()
		{


			$data = array(
				'nama' => $this->input->post('nama', TRUE),
				'email' => $this->input->post('email', TRUE),
				'password' => MD5($this->input->post('password', TRUE)),
				'nohp' => $this->input->post('nohp', TRUE),
				'alamat' => $this->input->post('alamat', TRUE)
			);

			$this->user_m->insert($data);
			$this->session->set_flashdata('pesan', 'Data successfully saved, silahkan login');
			redirect(site_url('pengguna/dashboard'));
		}

		
	}

	?>
