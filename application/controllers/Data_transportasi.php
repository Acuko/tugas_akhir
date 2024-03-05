<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_transportasi extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("transportasi_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->transportasi_m;
		$data = array(
			'title' => 'transportasi',
			'transportasiu' => $lik->getal(),
			'wisata' => $lik->getWisata(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/transportasi_v', $data);
		$this->load->view('templates_admin/footer');
	}
	public function saave()
	{
	

		$data = array(
			'id_wisata' => $this->input->post('idw', TRUE),
			'jenis_transportasi' => $this->input->post('jenis', TRUE),
			'waktu' => $this->input->post('waktu', TRUE),
		);

		$this->transportasi_m->insert($data);
		$this->session->set_flashdata('success', 'Data successfully saved');
		redirect(site_url('data_transportasi'));
	}

	public function update()
	{
	
		$id['id'] =  $this->input->post('idt', TRUE);
		$data = array(
			'id_wisata' => $this->input->post('idw', TRUE),
			'jenis_transportasi' => $this->input->post('jenis', TRUE),
			'waktu' => $this->input->post('waktu', TRUE),
		);


		$this->transportasi_m->updateData('transportasi', $data, $id);

		$this->session->set_flashdata('success', 'Data updated successfully');
		redirect("data_transportasi");
	}
	
	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->transportasi_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_transportasi'));
		}
	}

}
        
    /* End of file  Kategory.php */
