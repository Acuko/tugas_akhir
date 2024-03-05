<?php 

class Auth extends CI_Controller{
	public function __construct()
    {
        parent::__construct();
        $this->load->model("Login_m");
       
       
	}
	public function index()
	{
		if ($this->session->userdata('login_status') == TRUE) {
			redirect('dashboard');
		}else{
	
			$this->load->view('templates_admin/header');
			$this->load->view('admin/form_login');
			$this->load->view('templates_admin/footer');  
		}
	} 
	function logout(){
		$this->session->sess_destroy();
		redirect('admin');
	}
	public function sigin()
	{

   
	   $username = $this->input->post('username');
	   $password = $this->input->post('password');
	   //query the database
	   $result = $this->Login_m->login($username, $password);
	   if($result) {
		   $sess_array = array();
		   foreach($result as $row) {
			   //create the session
			   $sess_array = array(
				   'id_admin' => $row->id_admin,
				   'username' => $row->username,
				   'nama_admin' => $row->nama_admin,
				   'login_status'=>true,
			   );
			   //set session with value from database
			   $this->session->set_userdata($sess_array);
			   redirect('dashboard');  
		   }
		   return TRUE;
	   } else {
		   //if form validate false
	   $this->session->set_flashdata('gagal', 'username dan password kamu Salah');
	   $this->load->view('templates_admin/header');
	   $this->load->view('admin/form_login');
	   $this->load->view('templates_admin/footer');  
		   return FALSE;
	   }  

	}  
	  
   }
