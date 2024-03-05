 <?php
	class Dashboard extends CI_Controller
	{
		public function index()
		{
			$ip    = $this->input->ip_address(); // Mendapatkan IP user
			$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
			$waktu = time(); //
			$timeinsert = date("Y-m-d H:i:s");

			// Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
			$s = $this->db->query("SELECT * FROM visitor WHERE ip='" . $ip . "' AND date='" . $date . "'")->num_rows();
			$ss = isset($s) ? ($s) : 0;


			// Kalau belum ada, simpan data user tersebut ke database
			if ($ss == 0) {
				$this->db->query("INSERT INTO visitor(ip, date, hits, online, time) VALUES('" . $ip . "','" . $date . "','1','" . $waktu . "','" . $timeinsert . "')");
			}

			// Jika sudah ada, update
			else {
				$this->db->query("UPDATE visitor SET hits=hits+1, online='" . $waktu . "' WHERE ip='" . $ip . "' AND date='" . $date . "'");
			}


			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/dashboard');
			$this->load->view('templates_pengguna/footer');
		}
		public function login()
		{
	


			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/login');
			$this->load->view('templates_pengguna/footer');
		}

		function cek_user() {
			$data = array( 
				'active_user' => 'active',
			);
			//Field validation succeeded.  Validate against database
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			//query the database
			 $hashPass = password_hash($password,PASSWORD_DEFAULT);
			$test     = password_verify($password, $hashPass);
			// query chek users
			$this->db->select('*');
			$this->db->from('user');
			$this->db->where('user_name',$username);
			//$this->db->where('password',  $test);
			$users = $this->db->get();
			if($users->num_rows()>0){
				$user = $users->row_array();
				if(password_verify($password,$user['password'])){
					// retrive user data to session
					
				$sess_array = array();
				   $sess_array = array(
						'id_user' => $user['id_user'],
						'user_name' => $user['user_name'],
						'nama_lengkap' => $user['nama_lengkap'],
						'no_hp' => $user['no_hp'],
						'no_wa'=>$user['no_wa'],
						'login_status'=>true,
					);
					//set session with value from database
					$this->session->set_userdata($sess_array);
					$this->session->set_flashdata('sweet', 'Login Berhasil');
					$this->load->view("user/_partials/head");  
					$this->load->view("user/profil_v");    
					$this->load->view("user/_partials/footer_v", $data);
					redirect('userlog'); 
					
				}else{ $this->session->set_flashdata('gagal', 'Yah Coba masukan username dan password kamu kembali');
				redirect("userlog");
				return FALSE;
				}
			}else{
				//if form validate false
			$this->session->set_flashdata('gagal', 'Yah Coba masukan username dan password kamu kembali');
				redirect("userlog");
				return FALSE;
			}
		 
		}
	}

	?>
