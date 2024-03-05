<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_komentar extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("komentar_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->komentar_m;
		$data = array(
			'title' => 'komentar',
			'komentarw' => $lik->getalw(),
			'komentarp' => $lik->getalp(),
			'komentark' => $lik->getalk(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/komentar_v', $data);
		$this->load->view('templates_admin/footer');
	}
	
	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->komentar_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_komentar'));
		}
	}

}
        
    /* End of file  Kategory.php */
