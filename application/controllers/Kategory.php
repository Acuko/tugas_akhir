<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kategory extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("category_m");
		$this->load->model("jenis_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$cat = $this->category_m;
		$jenis = $this->jenis_m;
		$data = array(
			'title' => 'kategori',
			'kategori' => $cat->getal(),
			'pesanan' => $cat->getal(),
			'jenis' => $jenis->getal()

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/category_v', $data);
		$this->load->view('templates_admin/footer');
	}
	public function saave()
	{
		$icon = $_FILES['icon']['name'];
		if ($icon == '') {
			$icon = "";
		} else {
			$config['upload_path'] = './assets/icon';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->load->library('upload', $config);
			if ($this->upload->do_upload('icon')) {
				echo 'Gambar icon Gagal Diupload';
			} else {
				$icon = $this->upload->data('file_name');
			}
		}

		$data = array(
			'namakategori' => $this->input->post('nama', TRUE),
			'jenis' => $this->input->post('jenis', TRUE),
			'icon' => $icon,
		);

		$this->category_m->insert($data);
		$this->session->set_flashdata('success', 'Data successfully saved');
		redirect(site_url('kategory'));
	}
	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->category_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('kategory'));
		}
	}

	public function Update()
	{
		$icon = $_FILES['icon']['name'];
		if ($icon == '') {
			$icon = $this->input->post('foto_old', TRUE);
		} else {
			$config['upload_path'] = './assets/icon';
			$config['allowed_types'] = 'jpg|jpeg|png';
			$this->load->library('upload', $config);
			if (!$this->upload->do_upload('icon')) {
				echo 'Gambar icon Gagal Diupload';
			} else {
				$icon = $this->upload->data('file_name');
			}
		}

		$id['idkategori'] =  $this->input->post('id', TRUE);
		$data = array(
			'namakategori' => $this->input->post('nama', TRUE),
			'jenis' => $this->input->post('jenis', TRUE),
			'icon' => $icon,
		);


		$this->category_m->updateData('kategori', $data, $id);

		$this->session->set_flashdata('success', 'Data updated successfully');
		redirect("kategory");
	}
}
        
    /* End of file  Kategory.php */
