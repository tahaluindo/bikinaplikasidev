<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {

	function __construct()
    {
        parent::__construct();
                
        if($this->session->userdata('id')==NULL){
            redirect('auth');
        }
    }

	public function barang()
	{
		$data = array(
			'judul' => 'Data Barang',
			'barang' => $this->dataBarang()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('laporan/barang',$data);
		$this->load->view('element/footeradmin');
	}

	public function barangCetak()
	{
		$data = array(
			'judul' => 'Data Barang',
			'barang' => $this->dataBarang()
		);
		
		$this->load->view('laporan/barang_cetak',$data);
	}

	public function transaksiCetak($idpesan)
	{
		$data = array(
			'judul' => 'Data Transaksi',
			'info' => $this->getInfoTransaksi($idpesan),
			'transaksi' => $this->getTransaksi($idpesan)
		);
		
		$this->load->view('laporan/harian_pertransaksi_cetak',$data);
	}

	public function harian()
	{
		$data = array(
			'judul' => 'Data Transaksi Harian'
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('laporan/harian',$data);
		$this->load->view('element/footeradmin');
	}

	public function bulanan()
	{
		$data = array(
			'judul' => 'Data Transaksi Bulanan',
			'bulan' => $this->databulan()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('laporan/bulanan',$data);
		$this->load->view('element/footeradmin');
	}

	public function tahunan()
	{
		$data = array(
			'judul' => 'Data Transaksi Tahunan'
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('laporan/tahunan',$data);
		$this->load->view('element/footeradmin');
	}

	// ============================ Load Data =========================
	public function harian_tampil()
	{
		$tgl = $this->input->post('tanggal');

		$data['tanggal'] = $tgl;
		$data['harian'] = $this->getLapHarian($tgl);

		$this->load->view('laporan/harian_tampil',$data);
	}

	public function databulan()
	{
		$data = array(
			'1' => 'Januari',
			'2' => 'Februari',
			'3' => 'Maret',
			'4' => 'April',
			'5' => 'Mei',
			'6' => 'Juni',
			'7' => 'Juli',
			'8' => 'Agustus',
			'9' => 'September',
			'10' => 'Oktober',
			'11' => 'November',
			'12' => 'Desember',
		);
		return $data;
	}

	public function bulan_tampil()
	{
		$bulan = $this->input->post('bulan');
		$tahun = $this->input->post('tahun');

		$data = array(
			'bt_bulan' => $bulan,
			'bt_tahun' => $tahun
		);

		$this->session->set_userdata($data);

		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		$data['bulandata'] = $this->getLapBulanan($bulan,$tahun);

		$this->load->view('laporan/bulanan_tampil',$data);
	}

	public function tahun_tampil()
	{
		$tahun = $this->input->post('tahun');

		$data['tahun'] = $tahun;

		$data['tahundata'] = $this->getLapTahunan($tahun);

		$this->load->view('laporan/tahunan_tampil',$data);
	}

	public function harian_cetak($tgl)
	{
		$data['judul'] = 'Cetak Tanggal : '.$tgl;
		$data['tanggal'] = $tgl;
		$data['harian'] = $this->getLapHarian($tgl);
		
		$this->load->view('laporan/harian_cetak',$data);
	}

	public function bulanan_cetak($bulan,$tahun)
	{
		$data['judul'] = 'Cetak Bulan : '.$bulan.' - '.$tahun;

		$data['bulan'] = $bulan;
		$data['tahun'] = $tahun;

		$data['bulandata'] = $this->getLapBulanan($bulan,$tahun);
		
		$this->load->view('laporan/bulanan_cetak',$data);
	}

	public function tahunan_cetak($tahun)
	{
		$data['judul'] = 'Cetak Tahun : '.$tahun;

		$data['tahun'] = $tahun;

		$data['tahundata'] = $this->getLapTahunan($tahun);
		
		$this->load->view('laporan/tahunan_cetak',$data);
	}

	// ---------------------------- Model Data ------------------------
	// barang
	public function dataBarang() {
		$sql = "select barang.*,kategori.nmkategori from barang inner join kategori on barang.id_kategori = kategori.id";
		return $this->db->query($sql);
	}

	
	// transaksi 
	public function getInfoTransaksi($idpesan)
	{
		$sql = "SELECT pemesanan.*,users.nama FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE pemesanan.id_pesan = '$idpesan'  AND konfirmasi = 'Sudah'";
		return $this->db->query($sql)->row();
	}

	public function getTransaksi($idpesan) {
		$sql = "SELECT * FROM detail_pemesanan INNER JOIN barang ON detail_pemesanan.id_barang = barang.id INNER JOIN pemesanan ON detail_pemesanan.id_pesan = pemesanan.id_pesan WHERE pemesanan.id_pesan = '$idpesan'";
		return $this->db->query($sql);
	}

	public function getLapHarian($tgl) {
		$sql = "SELECT pemesanan.*,users.nama FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE DATE(tgl_pesan) = '$tgl'  AND konfirmasi = 'Sudah'";
		return $this->db->query($sql);
	}

	public function getLapBulanan($bulan,$tahun) {
		$sql = "SELECT DATE(tgl_pesan) AS tgl,SUM(total) AS total FROM pemesanan WHERE MONTH(tgl_pesan) = '$bulan' AND YEAR(tgl_pesan) = '$tahun'  AND konfirmasi = 'Sudah' GROUP BY DATE(tgl_pesan)";
		return $this->db->query($sql);
	}

	public function getLapTahunan($tahun) {
		$sql = "SELECT MONTH(tgl_pesan) AS bulan,SUM(total) AS total FROM pemesanan WHERE YEAR(tgl_pesan) = '$tahun'  AND konfirmasi = 'Sudah' GROUP BY MONTH(tgl_pesan)";
		return $this->db->query($sql);
	}
}
