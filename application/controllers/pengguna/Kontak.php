<?php
class kontak extends CI_Controller
{
	public function index()
	{
		$this->load->view('templates_pengguna/header');
		$this->load->view('pengguna/kontak');
		$this->load->view('templates_pengguna/footer');
	}
}
