<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data_atm extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model("atm_m");
		$this->load->library('form_validation');
	}

	public function index()
	{


		$lik = $this->atm_m;
		$data = array(
			'title' => 'atm',
			'atmu' => $lik->getal(),

		);

		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/atm_v', $data);
		$this->load->view('templates_admin/footer');
	}
	public function tambah_atm()
	{
		$data = array(
			'kategori' => $this->rental_model->get_alldata('kategori', '1'),
		);
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/form_tambah_atm', $data);
		$this->load->view('templates_admin/footer');
	}

	public function tambah_atm_aksi()
	{
		
			$nama_atm		= $this->input->post('nama_atm');  
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
			$idk=53;
			$deskripsi			= $this->input->post('deskripsi');
			$data = array(
				'nama_atm'  			=> $nama_atm,
				'alamat' 				=> $alamat,
				'latitude' 				=> $latitude,
				'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				'deskripsi' 			=> $deskripsi,
				'id_kategori'			=> $idk
			);
			$this->rental_model->insert_data($data, 'atm');
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Berhasil Ditambahkan</div>');
			redirect('data_atm');
	}


	public function update()
	{

	
			$id 				= $this->input->post('ids');
			$nama_atm		= $this->input->post('nama');  
			$alamat				= $this->input->post('alamat');
			// $latitude			= $this->input->post('latitude');
			// $longitude			= $this->input->post('longitude');
			$gambar				= $_FILES['gambar']['name'];

			if ($gambar == '') {
				$gambar = $this->input->post('gambar_old', TRUE);
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
			//$deskripsi 			= $this->input->post('deskripsi');

			$data = array(
				'nama_atm'  			=> $nama_atm,
				'alamat' 				=> $alamat,
				// 'latitude' 				=> $latitude,
				// 'longitude' 			=> $longitude,
				'gambar' 				=> $gambar,
				//'deskripsi' 			=> $deskripsi
			);

			$where = array(
				'id_atm' => $id
			);
			//print_r($where);
			$this->rental_model->update_data('atm', $data, $where);
			$this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
 		Data Wisata Berhasil Diupdate</div>');
			redirect('data_atm');
		
	}

	public function _rules()
	{
		$this->form_validation->set_rules('nama_atm', 'nama_kuliner', 'required');
		$this->form_validation->set_rules('alamat', 'alamat', 'required');
		$this->form_validation->set_rules('longitude', 'longitude', 'required');
		$this->form_validation->set_rules('latitude', 'latitude', 'required');
		$this->form_validation->set_rules('deskripsi', 'deskripsi', 'required');
	}


	public function hapus($id = Null)
	{
		if (!isset($id)) show_404();

		if ($this->atm_m->deleteData($id)) {
			$this->session->set_flashdata('success', 'Data Successfully deleted');
			redirect(site_url('data_atm'));
		}
	}

}
        
    /* End of file  Kategory.php */
