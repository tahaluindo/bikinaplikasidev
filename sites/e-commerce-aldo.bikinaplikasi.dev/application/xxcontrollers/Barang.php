<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Barang extends CI_Controller {

	private $gbarang;

	function __construct()
    {
        parent::__construct();
        
        $this->gbarang = realpath(APPPATH.'../images/barang/');

        if($this->session->userdata('id')==NULL){
            redirect('auth');
        }
    }

	public function index()
	{
		$data = array(
			'judul' => 'Data Barang',
			'barang' => $this->dataBarang()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('barang/barang',$data);
		$this->load->view('element/footeradmin');
	}

	public function barangTambah()
	{
		$data = array(
			'judul' => 'Tambah Data Barang',
			'kategori' => $this->dataKategori()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('barang/barang_tambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function barangUbah($id)
	{
		$data = array(
			'judul' => 'Ubah Data Barang',
			'kategori' => $this->dataKategori(),
			'barang' => $this->dataBarangId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('barang/barang_ubah',$data);
		$this->load->view('element/footeradmin');
	}

	public function barangDetail($id)
	{
		$data = array(
			'judul' => 'Detail Data Barang',
			'barang' => $this->dataBarangId($id),

		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('barang/barang_detail',$data);
		$this->load->view('element/footeradmin');
	}

	public function barangDetailTstok($id,$ukuran)
	{
		$data = array(
			'judul' => 'Detail Data Barang',
			'barang' => $this->dataBarangId($id),
			'idbarang' => $id,
			'ukuran' => $ukuran,
			'stoklama' => $this->cekstoklama($id,$ukuran)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('barang/barang_detail_tstok',$data);
		$this->load->view('element/footeradmin');
	}


	// model
	public function dataBarang() {
		$sql = "select barang.*,kategori.nmkategori from barang inner join kategori on barang.id_kategori = kategori.id order by barang.id desc";
		return $this->db->query($sql);
	}

	public function dataBarangId($id) {
		
		// $sql = "select barang.*,tipe.nmtipe from ban inner join tipe on ban.id_tipe = tipe.id where ban.id = '$id'";
		$sql = "select barang.*,kategori.nmkategori from barang inner join kategori on barang.id_kategori = kategori.id where barang.id = '$id'";
		return $this->db->query($sql)->row();		
	}

	public function dataKategori() {
		return $this->db->get('kategori');
	}

	public function simpanBarang() {

		$s = $this->input->post('ukurans');
		$m = $this->input->post('ukuranm');
		$l = $this->input->post('ukuranl');
		$xl = $this->input->post('ukuranxl');

		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'harga' => $this->input->post('harga'),
			'ukurans' => $s,
			'ukuranm' => $m,
			'ukuranl' => $l,
			'ukuranxl' => $xl,
			'bahan' => $this->input->post('bahan'),
			'berat' => $this->input->post('berat'),
			'keterangan' => $this->input->post('keterangan'),
			'id_kategori' => $this->input->post('id_kategori')
		);

		$hasil = $this->db->insert('barang',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 Data Barang</strong>");
			redirect('barang');
		} 

		redirect('barang/barangTambah');
	}

	public function editBarang($id) {
		$s = $this->input->post('ukurans');
		$m = $this->input->post('ukuranm');
		$l = $this->input->post('ukuranl');
		$xl = $this->input->post('ukuranxl');
		$stok = $s + $m + $l + $xl;

		$data = array(
			'nama_barang' => $this->input->post('nama_barang'),
			'harga' => $this->input->post('harga'),
			'ukurans' => $s,
			'ukuranm' => $m,
			'ukuranl' => $l,
			'ukuranxl' => $xl,
			'bahan' => $this->input->post('bahan'),
			'berat' => $this->input->post('berat'),
			'keterangan' => $this->input->post('keterangan'),
			'id_kategori' => $this->input->post('id_kategori'),
			'promo' => $this->input->post('promo'),
			'hargapromo' => $this->input->post('hargapromo'),
		);

		$this->db->where('id',$id);
		$hasil = $this->db->update('barang',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 Data Barang</strong>");
			redirect('barang');
		} 

		redirect('barang/barangUbah/'.$id);
	}

	public function barangTambahStok() {
		$id = $this->input->post('id');
		$ukuran = $this->input->post('ukuran');
		$field = 'ukuran'.$ukuran;
		$jumlah = $this->input->post('stokbaru');

		$q = "update barang set ".$field." = ".$field ." + $jumlah  where id = '$id'";
        $hasil = $this->db->query($q);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah Stok Barang Ukuran ".strtoupper($ukuran)."</strong>");
			redirect('barang/barangDetail/'.$id);
		} 
	}

	public function hapusBarang($id) {

		$this->db->where('id',$id);
		$hasil = $this->db->delete('barang');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 Data Barang</strong>");
			redirect('barang');
		} 

		redirect('barang');
	}

	public function uploadGambarBarang($id) 
	{
		
		$this->load->library('image_lib');

        $nmfile = "ban_".time();
        $config = array(
                    'upload_path' => $this->gbarang,
                    'allowed_types' => 'jpg|jpeg|gif|png',
                    'max_size' => 5120,
                    'max_width' => 4200,
                    'max_height' => 3000,
                    'file_name' => $nmfile
                );
        
        $this->load->library('upload',$config);
        if($this->upload->do_upload()) {
           
            /**** hapus gambar lama */

            $urlgambar = $this->dataBarangId($id);
            if(count($urlgambar)) {
            	unlink($this->gbarang.'/'.$urlgambar->urlgambar);
        	}
            /************************/
                        
            $files = $this->upload->data();

            $data = array(
                        'urlgambar' => $files['file_name']
                    );
            $this->db->where('id',$id);
            $this->db->update('barang',$data);
            
            //echo $resizethumb['new_image'];
            redirect('barang/barangDetail/'.$id);
        } else {
        	redirect('barang/barangDetail/'.$id);
        }
	}

	public function uploadGambarBarangTambahan($id) 
	{
		
		$this->load->library('image_lib');

        $nmfile = "ban_tambah_".$id."_".time();
        $config = array(
                    'upload_path' => $this->gbarang,
                    'allowed_types' => 'jpg|jpeg|gif|png',
                    'max_size' => 5120,
                    'max_width' => 4200,
                    'max_height' => 3000,
                    'file_name' => $nmfile
                );
        
        $this->load->library('upload',$config);
        if($this->upload->do_upload()) {
                                   
            $files = $this->upload->data();

            $data = array(
            			'id_barang' => $id,
                        'urlgambar' => $files['file_name'],
                        'warna' => $this->input->post('warna')
                    );
            $this->db->insert('gambarbarang',$data);
           
            redirect('barang/barangDetail/'.$id);
        } else {
        	redirect('barang/barangDetail/'.$id);
        }
	}

	// STOK BARANG
	// public function barangStokCari() {
	// 	$data = array(
	// 		'judul' => 'Cari Data Barang'
	// 	);
		
	// 	$this->load->view('element/headeradmin',$data);
	// 	$this->load->view('barang/barang_stok_cari',$data);
	// 	$this->load->view('element/footeradmin');
	// }

	// public function barangStokCariHasil() {
	// 	$cari = $this->input->post('cari');
	// 	$data['barang'] = $this->dataBarangStokCari($cari);
	// 	$this->load->view('barang/barang_stok_cari_hasil',$data);
	// }

	// public function dataBarangStokCari($cari) {
	// 	$sql = "SELECT * FROM barang WHERE (nama_barang LIKE '%$cari%' OR ukuran LIKE '%$cari%' OR keterangan LIKE '%$cari%')";

	// 	$query = $this->db->query($sql);

	// 	return $query;
	// }

	// public function barangSimpanTambahStok($id) {
	// 	$stok = $this->input->post('stokbaru');
	// 	$sql = "UPDATE barang SET stok = stok + $stok WHERE id = $id";
	// 	$hasil = $this->db->query($sql);

	// 	if($hasil) {
	// 		$databarang = $this->dataBarangId($id);

	// 		$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah Stok : ".$databarang->nama_barang."</strong>");
	// 		redirect('barang/barangStokCari');
	// 	}

	// 	redirect('barang/barangStokCari');

	// }

	public function hapusGambarTambahan($idbrg,$idbrgtambahan)
	{
		$urlgambar = $this->getBarangTambahan($idbrg,$idbrgtambahan);
        if(count($urlgambar)) {
        	unlink($this->gbarang.'/'.$urlgambar->urlgambar);
    	}

    	$this->db->where('id',$idbrgtambahan);
    	$this->db->delete('gambarbarang');
    	
    	redirect('barang/barangDetail/'.$idbrg);

	}

	public function getBarangTambahan($idbrg,$idbrgtambahan)
	{
		$this->db->where('id_barang',$idbrg);
		$this->db->where('id',$idbrgtambahan);
		return $this->db->get('gambarbarang')->row();
	}

	// public function updatestok($idbarang,$jumlah,$ukuran)
 //    {
 //        $field = '';
 //        if($ukuran == 'S') {
 //            $field = 'ukurans';
 //        }
 //        if($ukuran == 'M') {
 //            $field = 'ukuranm';
 //        }
 //        if($ukuran == 'L') {
 //            $field = 'ukuranl';
 //        }
 //        if($ukuran == 'XL') {
 //            $field = 'ukuranxl';
 //        }

 //        $q = "update barang set ".$field." = ".$field ." - $jumlah, stok = stok - $jumlah where id = '$idbarang'";
 //        $this->db->query($q);
 //    }

    public function cekstoklama($idbarang,$ukuran)
    {
        $field = '';
        if($ukuran == 's') {
            $field = 'ukurans';
        }
        if($ukuran == 'm') {
            $field = 'ukuranm';
        }
        if($ukuran == 'l') {
            $field = 'ukuranl';
        }
        if($ukuran == 'xl') {
            $field = 'ukuranxl';
        }

        $q = "select ".$field." from barang where id = '$idbarang'";
        $hasil = $this->db->query($q)->row();
        return $hasil->$field;
    }
	
}
