<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkoskirim extends CI_Controller {

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
			'judul' => 'Data Ongkos Kirim',
			'ongkir' => $this->dataOngkir()
		);

		$this->load->view('element/headeradmin',$data);
		$this->load->view('ongkir/ongkir',$data);
		$this->load->view('element/footeradmin');
	}

	public function tambah()
	{
		$data = array(
			'judul' => 'Tambah Data Ongkos Kirim'
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('ongkir/tambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function ubah($id)
	{
		$data = array(
			'judul' => 'Ubah Data Ongkos Kirim',
			'ongkir' => $this->dataOngkosKirimId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('ongkir/ubah',$data);
		$this->load->view('element/footeradmin');
	}

	// ---------------------------- Model Data ------------------------
	public function dataOngkir() {
		return $this->db->get('ongkos_kirim');
	}

	public function dataOngkosKirimId($id) {
		$this->db->where('id',$id);
		return $this->db->get('ongkos_kirim')->row();
	}

	public function simpan() {

		$data = array(
			'kode' => $this->input->post('kode'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'biaya' => $this->input->post('biaya'),
		);

		$hasil = $this->db->insert('ongkos_kirim',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 Data Ongkos Kirim</strong>");
			redirect('ongkoskirim');
		} 

		redirect('ongkoskirim');
	}

	public function edit($id) {

		$data = array(
			'kode' => $this->input->post('kode'),
			'provinsi' => $this->input->post('provinsi'),
			'kabupaten' => $this->input->post('kabupaten'),
			'biaya' => $this->input->post('biaya'),
		);

		$this->db->where('id',$id);
		$hasil = $this->db->update('ongkos_kirim',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 Data Ongkos Kirim</strong>");
			redirect('ongkoskirim');
		} 

		redirect('ongkoskirim');
	}

	
	public function hapus($id) {

		$this->db->where('id',$id);
		$hasil = $this->db->delete('ongkos_kirim');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 Data Ongkos Kirim</strong>");
			redirect('ongkoskirim');
		} 

		redirect('ongkoskirim');
	}
	
}
