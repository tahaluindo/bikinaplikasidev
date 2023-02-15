<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kategori extends CI_Controller {

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
			'judul' => 'Data Kategori',
			'kategori' => $this->dataKategori()
		);

		$this->load->view('element/headeradmin',$data);
		$this->load->view('kategori/kategori',$data);
		$this->load->view('element/footeradmin');
	}

	public function tambah()
	{
		$data = array(
			'judul' => 'Tambah Data Kategori'
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('kategori/tambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function ubah($id)
	{
		$data = array(
			'judul' => 'Ubah Data Kategori',
			'kategori' => $this->dataKategoriId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('kategori/ubah',$data);
		$this->load->view('element/footeradmin');
	}

	// ---------------------------- Model Data ------------------------
	public function dataKategori() {
		return $this->db->get('kategori');
	}

	public function dataKategoriId($id) {
		$this->db->where('id',$id);
		return $this->db->get('kategori')->row();
	}

	public function simpan() {

		$data = array(
			'nmkategori' => $this->input->post('nmkategori'),
			'keterangan' => $this->input->post('keterangan')
		);

		$hasil = $this->db->insert('kategori',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 Data Kategori</strong>");
			redirect('kategori');
		} 

		redirect('kategori');
	}

	public function edit($id) {

		$data = array(
			'nmkategori' => $this->input->post('nmkategori'),
			'keterangan' => $this->input->post('keterangan')
		);

		$this->db->where('id',$id);
		$hasil = $this->db->update('kategori',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 Data Kategori</strong>");
			redirect('kategori');
		} 

		redirect('kategori/tipeUbah/'.$id);
	}

	
	public function hapus($id) {

		$this->db->where('id',$id);
		$hasil = $this->db->delete('kategori');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 Data Kategori</strong>");
			redirect('kategori');
		} 

		redirect('kategori');
	}
	
}
