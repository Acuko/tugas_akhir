 <?php

	defined('BASEPATH') or exit('No direct script access allowed');

	class Berita extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("berita_m");
			$this->load->library('form_validation');
		}

		public function index()
		{


			$cat = $this->berita_m;
			$data = array(
				'title' => 'berita',
				'berita' => $cat->getal('berita'),
				'kategori' => $cat->getalKategori('kategori'),
			);

			$this->load->view('templates_admin/header');
			$this->load->view('templates_admin/sidebar');
			$this->load->view('admin/berita_v', $data);
			$this->load->view('templates_admin/footer');
		}
		public function saave()
		{
			$gambar                = $_FILES['gambar']['name'];
			if ($gambar == '') {
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}
			$data = array(
				'judul' => $this->input->post('judul', TRUE),
				// 'idkategori' => $this->input->post('kategori', TRUE),
				'deskripsi' => $this->input->post('deskripsi', FALSE),
				'foto' => $gambar,
				'inertedBy' => $this->session->userdata('nama_admin'),
				'insertedDate' => date('Y-m-d'),
			);

			$this->berita_m->insert($data);
			$this->session->set_flashdata('success', 'Data successfully saved');
			redirect(site_url('Berita'));
		}
		public function hapus($id = Null)
		{
			if (!isset($id)) show_404();

			if ($this->berita_m->deleteData($id)) {
				$this->session->set_flashdata('success', 'Data Successfully deleted');
				redirect(site_url('Berita'));
			}
		}

		public function Update()
		{
			$gambar                = $_FILES['gambar']['name'];
			if ($gambar == '') {
				$gambar = $this->input->post('foto_old', TRUE);
			} else {
				$config['upload_path'] = './assets/upload';
				$config['allowed_types'] = 'jpg|jpeg|png';
				$this->load->library('upload', $config);
				if ($this->upload->do_upload('gambar')) {
					echo 'Gambar Gagal Diupload';
				} else {
					$gambar = $this->upload->data('file_name');
				}
			}

			$id['idberita'] =  $this->input->post('id', TRUE);
			$data = array(
				'judul' => $this->input->post('judul', TRUE),
				'idkategori' => $this->input->post('kategori', TRUE),
				'deskripsi' => $this->input->post('deskripsi', FALSE),
				'foto' =>   $gambar,
			);


			$this->berita_m->updateData('berita', $data, $id);

			$this->session->set_flashdata('success', 'Data updated successfully');
			redirect("Berita");
		}
	}
   
        
    /* End of file  Berita.php */
