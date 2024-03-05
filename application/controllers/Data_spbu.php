<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_spbu extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("spbu_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->spbu_m;
		$data = array(
			'title' => 'spbu',
			'spbuu' => $lik->getal(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/spbu_v', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_spbu()
	{
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '1'),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_spbu', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_spbu_aksi()
	{
		
			$nama_spbu		= $this->input->post('nama_spbu');  
			$alamat				= $this->input->post('alamat');
			$latitude			= $this->input->post('latitude');
			$longitude			= $this->input->post('longitude');
			$gambar				= $_FILES['gambar']['name'];
			if ($gambar == '') {
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$idk=52;
			$deskripsi			= $this->input->post('deskripsi');
			$data = array(
				'nama_spbu'  			=> $nama_spbu,
				'alamat' 				=> $alamat,
				'latitude' 				=> $latitude,
				'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				'deskripsi' 			=> $deskripsi,
				'id_kategori'			=> $idk
			);
			$this->rental_model->insert_data($data, 'spbu');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('data_spbu');
	}


	public function update()
	{

	
			$id 				= $this->input->post('ids');
			$nama_spbu		= $this->input->post('nama_spbu');  
			$alamat				= $this->input->post('alamat');
			$latitude			= $this->input->post('latitude');
			$longitude			= $this->input->post('longitude');
			$gambar				= $_FILES['gambar']['name'];

			if ($gambar == '') {
				$gambar = $this->input->post('foto_old', TRUE);
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}		
			$deskripsi 			= $this->input->post('deskripsi');

			$data = array(
				'nama_spbu'  			=> $nama_spbu,
				'alamat' 				=> $alamat,
				'latitude' 				=> $latitude,
				'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				'deskripsi' 			=> $deskripsi
			);

			$where = array(
				'id_spbu' => $id
			);
			$this->rental_model->update_data('spbu', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Wisata Berhasil Diupdate</div>');
			redirect('data_spbu');
		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_spbu', 'nama_kuliner', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
	}


	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->spbu_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_spbu'));
		}
	}

}
        
    /* End of file  Kategory.php */
