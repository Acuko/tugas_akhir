 <?php
	class peta_wilayah extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model("jenis_m");
			$this->load->model("rental_model");
		}

		public function index()
		{
			$data['jenis'] = $this->jenis_m->getal();
			$data['kecamatan'] = $this->rental_model->get_kecamatan();
			$this->load->view('templates_pengguna/header');
			$this->load->view('pengguna/peta_wilayah', $data);
			$this->load->view('templates_pengguna/footer');
		}

		public function direction($id, $idjenis){
			$jenis="Wisata";
			if($idjenis=='1'){
				$jenis="wisata";
				$whereid="id_wisata";
			}else if($idjenis=='2'){
				$jenis="kuliner";
				$whereid="id_kuliner";
			}else if($idjenis=='3'){
				$jenis="penginapan";
				$whereid="id_penginapan";
			}else if($idjenis=='4'){
				$jenis="spbu";
				$whereid="id_spbu";
			}else if($idjenis=='5'){
				$jenis="atm";
				$whereid="id_atm";
			}
			
			$data['peta'] = $this->jenis_m->getPeta($id,$whereid, $jenis);
		
			$this->load->view('pengguna/direction', $data);
		}
	}

	?>
