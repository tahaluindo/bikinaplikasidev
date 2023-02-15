<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->helpers('date');
        if($this->session->userdata('id')==NULL){
            redirect('auth');
        }
    }

	public function belumkonfirmasi()
	{
		$data = array(
			'judul' => namaApp(),
			'orderbelum' => $this->getBelum()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/belumkonfirmasi',$data);
		$this->load->view('element/footeradmin');
	}

	public function sudahkonfirmasi()
	{
		$data = array(
			'judul' => 'Pemesanan Sudah Konfirmasi',
			'ordersudah' => $this->getSudah()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/sudahkonfirmasi',$data);
		$this->load->view('element/footeradmin');
	}

	public function sudahdikirim()
	{
		$data = array(
			'judul' => 'Pemesanan Sudah Konfirmasi',
			'orderkirim' => $this->getSudahKirim()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/sudahdikirim',$data);
		$this->load->view('element/footeradmin');
	}

	public function detailpesan($id,$jenis)
	{
		
		$data = array(
			'judul' => 'Detail Pemesanan',
			'orderdetail' => $this->getOrderDetail($id),
			'jenis' => $jenis,
			'order' => $this->getOrderId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/detailpesan',$data);
		$this->load->view('element/footeradmin');
	}

	public function prosesKirim()
    {
    	$idpesan = $this->input->post('id_pesan');
    	$data = array(
    		'status_kirim' => 'Sudah',
    		'noresi' => $this->input->post('noresi')
    	);
    	$this->db->where('id_pesan',$idpesan);
    	$this->db->update('pemesanan',$data);

    	$this->session->set_flashdata('berhasil',"<strong>Berhasil melakukan proses pengiriman</strong>");

    	redirect('pemesanan/sudahdikirim');
    }

		
	// ---------------------------- Model Data ------------------------

	public function getBelum() {
		$sql = "SELECT * FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE pemesanan.konfirmasi = 'Belum' AND pemesanan.bataskonfirmasi >= NOW()";
		return $this->db->query($sql);
	}

	public function getSudah() {
		$sql = "SELECT * FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE pemesanan.konfirmasi = 'Sudah' AND pemesanan.status_kirim = 'Belum'";
		return $this->db->query($sql);
	}

	public function getSudahKirim() {
		$sql = "SELECT * FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE pemesanan.konfirmasi = 'Sudah' AND pemesanan.status_kirim = 'Sudah'";
		return $this->db->query($sql);
	}

	public function getOrderId($idpesan) {
    	$this->db->where('id_pesan',$idpesan);
    	return $this->db->get('pemesanan')->row();
    }

    public function getOrderDetail($idpesan) {
    	$sql = "SELECT * FROM detail_pemesanan INNER JOIN barang ON detail_pemesanan.id_barang = barang.id INNER JOIN pemesanan ON detail_pemesanan.id_pesan = pemesanan.id_pesan WHERE pemesanan.id_pesan = '$idpesan'";
    	return $this->db->query($sql);
    }


    // tracking
    public function tracking($idpesan)
	{
		$data = array(
			'order' => $this->getOrderId($idpesan),
			'trak' => $this->getTracking($idpesan)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/tracking',$data);
		$this->load->view('element/footeradmin');
	}


	public function trackingtambah($idpesan)
	{
		$data = array(
			'order' => $this->getOrderId($idpesan),
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/trackingtambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function trackingubah($idtracking,$idpesan)
	{
		$data = array(
			'order' => $this->getOrderId($idpesan),
			'trak' => $this->getTrackingById($idtracking)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('pemesanan/trackingubah',$data);
		$this->load->view('element/footeradmin');
	}

	public function getTracking($idpesan)
	{
		$this->db->where('idpesanan',$idpesan);
		return $this->db->get('trackingpesanan');
	}

	public function getTrackingById($idtrak)
	{
		$this->db->where('idtrack',$idtrak);
		return $this->db->get('trackingpesanan')->row();
	}


	public function trackingsimpan($idpesan) {

		$data = array(
			'idpesanan' => $idpesan,
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
			'tanggal' => date('Y-m-d H:i:s')
		);

		$hasil = $this->db->insert('trackingpesanan',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 Data Tracking</strong>");
			redirect('pemesanan/tracking/'.$idpesan);
		} 

		redirect('pemesanan/tracking/'.$idpesan);
	}

	public function trackingedit($idtracking,$idpesan) {

		$data = array(
			'status' => $this->input->post('status'),
			'keterangan' => $this->input->post('keterangan'),
		);

		$this->db->where('idtrack',$idtracking);
		$hasil = $this->db->update('trackingpesanan',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 Data Tracking</strong>");
			redirect('pemesanan/tracking/'.$idpesan);
		} 

		redirect('pemesanan/tracking/'.$idpesan);
	}

	public function trackinghapus($idtracking,$idpesan) {

		$this->db->where('idtrack',$idtracking);
		$hasil = $this->db->delete('trackingpesanan');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 Data Tracking</strong>");
			redirect('pemesanan/tracking/'.$idpesan);
		} 

		redirect('pemesanan/tracking/'.$idpesan);
	}
}
