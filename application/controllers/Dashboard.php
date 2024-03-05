<?php

class Dashboard extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('login_status') != TRUE) {
			$this->session->set_flashdata('gagal', 'LOGIN GAGAL USERNAME ATAU PASSWORD ANDA SALAH !');
			redirect('auth');
		};
	}
	public function index()
	{
		$date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
		$pengunjunghariini  = $this->db->query("SELECT * FROM visitor WHERE date='" . $date . "' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung

		$databerita  = $this->db->query("SELECT * FROM berita ")->num_rows(); // Hitung jumlah pengunjung
		$datawisata  = $this->db->query("SELECT * FROM wisata")->num_rows(); // Hitung jumlah pengunjung
		$datakuliner  = $this->db->query("SELECT * FROM kuliner")->num_rows(); // Hitung jumlah pengunjung
		$datapenginapan  = $this->db->query("SELECT * FROM penginapan")->num_rows(); // Hitung jumlah pengunjung

		$data['pengunjunghariini'] = $pengunjunghariini;
		$data['databerita'] = $databerita;
		$data['datapenginapan'] = $datapenginapan;
		$data['datawisata'] = $datawisata;
		$data['datakuliner'] = $datakuliner;
		$this->load->view('templates_admin/header');
		$this->load->view('templates_admin/sidebar');
		$this->load->view('admin/dashboard', $data);
		$this->load->view('templates_admin/footer');
	}
}
