<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ongkir extends CI_Controller {

	var $judul = "Set Ongkir Utility";

	function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

	public function index()
	{
		$data = array(
			'ongkir' => $this->getOngkir()
		);
		
		$this->load->view('setongkir/ongkir',$data);
	}

	public function editOngkir($namaprov)
	{
		$prov = str_replace("_", ' ', $namaprov);
		$data = array(
			'ongkir' => $this->getOngkirProv($prov)

		);

		$this->load->view('setongkir/ongkirubah',$data);
	}

	public function getOngkir()
	{
		$q = "SELECT DISTINCT(provinsi),biaya FROM ongkos_kirim";
		return $this->db->query($q);
	}

	public function getOngkirProv($prov)
	{
		$this->db->where('provinsi',$prov);
		return $this->db->get('ongkos_kirim')->row();
	}

	public function save()
	{
		$prov = $this->input->post('prov');
		$biaya = $this->input->post('biaya');
		$q = "update ongkos_kirim set biaya = '".$biaya."' where provinsi = '$prov'";
		$this->db->query($q);
		

		redirect('ongkir');
	}


}
