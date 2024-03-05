<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_like extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("like_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->like_m;
		$data = array(
			'title' => 'like',
			'likew' => $lik->getalw(),
			'likek' => $lik->getalk(),
			'likep' => $lik->getalp(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/like_v', $data);
		$this->load->view('templates_admin/footer');
	}
	
	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->like_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_like'));
		}
	}


}
        
    /* End of file  Kategory.php */
