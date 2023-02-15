<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }

	public function index()
	{
		$this->load->model('DataBerita_model');
		$data['DataBerita'] = $this->DataBerita_model->get_all_DataBerita();

		$this->load->view('beranda', $data);
	}
	
	public function profil()
	{
		if($this->input->get('struktur_desa')) {
			$data['struktur_desa'] = $this->db->get('dataprofiledesa')->row();
		}

		$this->load->model('Dataagama_model');
		$this->load->model('DataPanduanLayanan_model');
		$this->load->model('DataGaleri_model');
		$this->load->model('DataProfileDesa_model');
		$data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();
		$data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();
		$data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();
		
		$tahun = ((int) date('Y')) - 4;
		
		$index = 1;
		for ($i = $tahun; $i <= $tahun + 4; $i++) {
			$penduduk = $this->db->like('created_at', $i)->get('datapenduduk');
		$penduduk_tetap = $this->db->like('created_at', $i)->get('datapenduduktetap');
			$penduduk_meninggal = $this->db->like('created_at', $i)->get('datapendudukmeninggal');
			$penduduk_pindah = $this->db->like('created_at', $i)->get('datapendudukpindah');
			$penduduk_lahir = $this->db->like('created_at', $i)->get('datapenduduklahir');
			$penduduk_datang = $this->db->like('created_at', $i)->get('datapendudukdatang');

			$data['tahuns'][] = $i;
			$data['informasi_penduduk'][$index]['penduduk_total'] = number_format($penduduk->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_tetap'] = number_format($penduduk_tetap->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_meninggal'] = number_format($penduduk_meninggal->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_pindah'] = number_format($penduduk_pindah->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_datang'] = number_format($penduduk_datang->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_lahir'] = number_format($penduduk_lahir->num_rows(), 0, '', '.');

			$index++;
		}

		$this->load->view('profil', $data);
	}
	
	public function informasi_penduduk()
	{
		$this->load->model('Dataagama_model');
		$this->load->model('DataPanduanLayanan_model');
		$this->load->model('DataGaleri_model');
		$this->load->model('DataProfileDesa_model');
		$data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();
		$data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();
		$data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();
		
		$tahun = ((int) date('Y')) - 4;
		
		$index = 1;
		for ($i = $tahun; $i <= $tahun + 4; $i++) {
			$penduduk = $this->db->like('created_at', $i)->get('datapenduduk');
			$penduduk_tetap = $this->db->like('created_at', $i)->get('datapenduduktetap');
			$penduduk_meninggal = $this->db->like('created_at', $i)->get('datapendudukmeninggal');
			$penduduk_pindah = $this->db->like('created_at', $i)->get('datapendudukpindah');
			$penduduk_lahir = $this->db->like('created_at', $i)->get('datapenduduklahir');
			$penduduk_datang = $this->db->like('created_at', $i)->get('datapendudukdatang');

			$data['tahuns'][] = $i;
			$data['informasi_penduduk'][$index]['penduduk_total'] = number_format($penduduk->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_tetap'] = number_format($penduduk_tetap->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_meninggal'] = number_format($penduduk_meninggal->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_pindah'] = number_format($penduduk_pindah->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_datang'] = number_format($penduduk_datang->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_lahir'] = number_format($penduduk_lahir->num_rows(), 0, '', '.');

			$index++;
		}

		$this->load->view('informasi_penduduk', $data);

	}
	
	public function panduan_layanan()
	{
		$this->load->model('Dataagama_model');
		$this->load->model('DataPanduanLayanan_model');
		$this->load->model('DataGaleri_model');
		$this->load->model('DataProfileDesa_model');
		$data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();
		$data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();
		$data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();
		
		$tahun = ((int) date('Y')) - 4;
		
		$index = 1;
		for ($i = $tahun; $i <= $tahun + 4; $i++) {
			$penduduk = $this->db->like('created_at', $i)->get('datapenduduk');
		$penduduk_tetap = $this->db->like('created_at', $i)->get('datapenduduktetap');
			$penduduk_meninggal = $this->db->like('created_at', $i)->get('datapendudukmeninggal');
			$penduduk_pindah = $this->db->like('created_at', $i)->get('datapendudukpindah');
			$penduduk_lahir = $this->db->like('created_at', $i)->get('datapenduduklahir');
			$penduduk_datang = $this->db->like('created_at', $i)->get('datapendudukdatang');

			$data['tahuns'][] = $i;
			$data['informasi_penduduk'][$index]['penduduk_total'] = number_format($penduduk->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_tetap'] = number_format($penduduk_tetap->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_meninggal'] = number_format($penduduk_meninggal->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_pindah'] = number_format($penduduk_pindah->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_datang'] = number_format($penduduk_datang->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_lahir'] = number_format($penduduk_lahir->num_rows(), 0, '', '.');

			$index++;
		}

		$this->load->view('panduan_layanan', $data);
	
	}
	
	public function galeri()
	{
		$this->load->model('Dataagama_model');
		$this->load->model('DataPanduanLayanan_model');
		$this->load->model('DataGaleri_model');
		$this->load->model('DataProfileDesa_model');
		$data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();
		$data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();
		$data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();
		
		$tahun = ((int) date('Y')) - 4;
		
		$index = 1;
		for ($i = $tahun; $i <= $tahun + 4; $i++) {
			$penduduk = $this->db->like('created_at', $i)->get('datapenduduk');
		$penduduk_tetap = $this->db->like('created_at', $i)->get('datapenduduktetap');
			$penduduk_meninggal = $this->db->like('created_at', $i)->get('datapendudukmeninggal');
			$penduduk_pindah = $this->db->like('created_at', $i)->get('datapendudukpindah');
			$penduduk_lahir = $this->db->like('created_at', $i)->get('datapenduduklahir');
			$penduduk_datang = $this->db->like('created_at', $i)->get('datapendudukdatang');

			$data['tahuns'][] = $i;
			$data['informasi_penduduk'][$index]['penduduk_total'] = number_format($penduduk->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_tetap'] = number_format($penduduk_tetap->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_meninggal'] = number_format($penduduk_meninggal->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_pindah'] = number_format($penduduk_pindah->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_datang'] = number_format($penduduk_datang->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_lahir'] = number_format($penduduk_lahir->num_rows(), 0, '', '.');

			$index++;
		}

		$session = $this->session->userdata('status');
		
		$this->load->view('galeri', $data);
	}

	public function berita($cek = null)
	{
		$this->load->model('DataBerita_model');
		$data['DataBerita'] = $this->DataBerita_model->get_all_DataBerita();

		// jika ingin melihat detail berita
		if($cek) {
			$data['DataBerita'] = $this->db->where('id', $cek)->get('databerita')->row();

			if(!$data['DataBerita']) {
				die("Berita tidak dapat dimuat");
			}

			$this->load->view('berita_detail', $data);

		} else {
			$this->load->view('berita', $data);
		}
	}
	
	public function login_admin()
	{
		

		$this->load->model('Dataagama_model');
		$this->load->model('DataPanduanLayanan_model');
		$this->load->model('DataGaleri_model');
		$this->load->model('DataProfileDesa_model');
		$data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();
		$data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();
		$data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();
		
		$tahun = ((int) date('Y')) - 4;
		
		$index = 1;
		for ($i = $tahun; $i <= $tahun + 4; $i++) {
			$penduduk = $this->db->like('created_at', $i)->get('datapenduduk');
		$penduduk_tetap = $this->db->like('created_at', $i)->get('datapenduduktetap');
			$penduduk_meninggal = $this->db->like('created_at', $i)->get('datapendudukmeninggal');
			$penduduk_pindah = $this->db->like('created_at', $i)->get('datapendudukpindah');
			$penduduk_lahir = $this->db->like('created_at', $i)->get('datapenduduklahir');
			$penduduk_datang = $this->db->like('created_at', $i)->get('datapendudukdatang');

			$data['tahuns'][] = $i;
			$data['informasi_penduduk'][$index]['penduduk_total'] = number_format($penduduk->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_tetap'] = number_format($penduduk_tetap->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_meninggal'] = number_format($penduduk_meninggal->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_pindah'] = number_format($penduduk_pindah->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_datang'] = number_format($penduduk_datang->num_rows(), 0, '', '.');
			$data['informasi_penduduk'][$index]['penduduk_lahir'] = number_format($penduduk_lahir->num_rows(), 0, '', '.');

			$index++;
		}

		$this->load->view('login', $data);
	}

	public function login()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($this->form_validation->run())
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$data = $this->Auth_model->login($username, $password);
			if($data == false)
			{
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Gagal!</strong> Username atau Password salah.
					</div>'
				);
				redirect('Auth');
			}
			else
			{
				$session = ['username'=>"$username" , 'status' => 'Loged in' , 'role' => $data[0]['role']];
				$this->session->set_userdata($session);
				redirect('Home');
			}
	    }
	    else
	    {
				$this->session->set_flashdata('msg',
					'
					<div class="alert alert-warning alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Gagal!</strong> Username & Password wajib diisi.
					</div>'
				);
	    	redirect('Auth');
	    }
	}

	public function logout()
	{
		$this->session->sess_destroy();
		
		redirect('Auth');
	}
}
