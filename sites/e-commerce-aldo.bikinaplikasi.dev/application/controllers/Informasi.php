<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        
        if($this->session->userdata('id')==NULL){
            redirect('auth');
        }
    }

	public function index()
	{
		$data = array(
			'informasi' => $this->dataInformasi()
		);

		$this->load->view('element/headeradmin',$data);
		$this->load->view('informasi/informasi',$data);
		$this->load->view('element/footeradmin');
	}

	public function ubah($id)
	{
		$data = array(
			'informasi' => $this->dataInformasiId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('informasi/ubah',$data);
		$this->load->view('element/footeradmin');
	}

	// ---------------------------- Model Data ------------------------
	public function dataInformasi() {
		return $this->db->get('informasi');
	}

	public function dataInformasiId($id) {
		$this->db->where('idinfo',$id);
		return $this->db->get('informasi')->row();
	}

	public function edit($id) {

		$data = array(
			'judul' => $this->input->post('judul'),
			'deskripsi' => $this->input->post('deskripsi')
		);

		$this->db->where('idinfo',$id);
		$hasil = $this->db->update('informasi',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah Data Informasi</strong>");
			redirect('informasi');
		} 
	}
	
}
