<?php

defined('BASEPATH') or exit('No direct script access allowed');

class data_user extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("user_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->user_m;
		$data = array(
			'title' => 'user',
			'useru' => $lik->getal(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/user_v', $data);
		$this->load->view('templates_admin/footer');
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
		$this->session->set_flashdata('success', 'Data successfully saved');
		redirect(site_url('data_user'));
	}

	public function Update()
	{
	
		$id['id'] =  $this->input->post('idu', TRUE);
		$data = array(
			'nama' => $this->input->post('nama', TRUE),
			'email' => $this->input->post('email', TRUE),
			'password' => MD5($this->input->post('password', TRUE)),
			'nohp' => $this->input->post('nohp', TRUE),
			'alamat' => $this->input->post('alamat', TRUE)
		);


		$this->user_m->updateData('user', $data, $id);

		$this->session->set_flashdata('success', 'Data updated successfully');
		redirect("data_user");
	}

	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->user_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_user'));
		}
	}

}
        
    /* End of file  Kategory.php */
