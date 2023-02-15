<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Aplikasi extends CI_Controller {

	
	function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
    }

	public function index()
	{
		$data = array(
			'judul' => namaApp(),
			'barang' => $this->getBarangBaru(),
			'populer' => $this->getBarangBestSeller(),
			'kategori' => $this->getKategori(),
		);
		
		// echo "<pre>";
		// print_r($data['kategori']->result_array()); die();

		$kategori = $data['kategori']->result_array();
		$limit = 0;
		$data['produk_kategoris'] = [];
		if(count($kategori)) {
			foreach($kategori as $kategori) {
				if($limit == 10) break;
	
				$data['produk_kategoris'][$kategori['nmkategori']] = $this->db->query("SELECT * FROM barang where id_kategori = $kategori[id] limit 5")->result();
				foreach($data['produk_kategoris'][$kategori['nmkategori']] as $key => $produk) {
					// echo "<pre>";
					// print_r($data['produk_kategoris'][$kategori['nmkategori']][$key]->urlgambar); die();
					$data['produk_kategoris'][$kategori['nmkategori']][$key]->urlgambar = $this->db->where('id_barang', $produk->id)->get('gambarbarang')->result_array();
					
					
				}
				
				
				$limit++;
			}
			
		}
					// echo "<pre>";
					// print_r($data['produk_kategoris']); die();
					

		
		$this->load->view('element/headeruser',$data);
	$this->load->view('websitetamu/home',$data);
		$this->load->view('element/footeruser');
	}

	public function getBarangBaru()
	{
		$q = "select * from barang order by id desc limit 5";
		return $this->db->query($q);
	}

	public function getBarangBestSeller()
	{
		$q = "SELECT 
				barang.*,
				detail_pemesanan.jumlah_detail,
				pemesanan.tgl_pesan,
				SUM(detail_pemesanan.jumlah_detail) as jumlah
			FROM detail_pemesanan 
			INNER JOIN barang ON detail_pemesanan.id_barang = barang.id
			INNER JOIN pemesanan ON detail_pemesanan.id_pesan = pemesanan.id_pesan
			WHERE 
			DATE_FORMAT(tgl_pesan,'%Y-%m-%d') >= DATE_SUB(CURDATE(),INTERVAL 5 DAY) AND 
			DATE_FORMAT(tgl_pesan,'%Y-%m-%d') <= CURDATE()
			GROUP BY barang.id
			ORDER BY SUM(detail_pemesanan.jumlah_detail) DESC
			LIMIT 7";
		return $this->db->query($q);
	}

	public function search()
	{
		$cari = $this->input->get('q');
		$data = array(
			'judul' => namaApp(),
			'barang' => $this->databarangsearch($cari),
			'kategori' => $this->getKategori(),
			'cari' => $cari
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/barangsearch',$data);
		$this->load->view('element/footeruser');
	}

	public function getKategori()
	{
		return $this->db->get('kategori');
	}

	
	public function detailbarang($id)
	{
		$data = array(
			'judul' => namaApp(),
			'barang' => $this->databarangId($id)
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/detailbarang',$data);
		$this->load->view('element/footeruser');
	}

	public function detailbarangstok($id)
	{
		$data = array(
			'barang' => $this->databarangId($id)
		);
		
		$this->load->view('websitetamu/detailbarang_stok',$data);
	}

	public function detailartikel($id)
	{
		$data = array(
			'judul' => namaApp(),
			'artikel' => $this->dataartikelid($id)
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/detailartikel',$data);
		$this->load->view('element/footeruser');
	}

	public function daftar()
	{
		$data = array(
			'judul' => namaApp(),
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/daftar',$data);
		$this->load->view('element/footeruser');
	}

	public function simpandaftar()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$cekemail = $this->cekemail($email);

		if(count($cekemail)) {
			$this->session->set_flashdata('gagal','Maaf anda gagal mendaftar email : '.$email.' sudah digunakan');
            redirect('aplikasi/daftar');
		}

		$data = array(
			'nama' => $this->input->post('nama'),
			'notelp' => $this->input->post('notelp'),
			'username' => $this->input->post('email'),
			'password' => md5($this->input->post('password')),
			'status' => 'Aktif',
			'tgl_daftar' => date('Y-m-d H:i:s')
		);

		if($this->db->insert('users',$data)) {
			$this->logindaftar($email,$password);
		}
		// redirect('aplikasi/daftar');
	}

	

	public function statis($halaman)
	{
		$id = 0;
		if($halaman == 'sts_carabeli') {
			$id = 1;
		}

		if($halaman == 'sts_tentang') {
			$id = 2;
		}

		if($halaman == 'sts_faq') {
			$id = 3;
		}

		$data = array(
			'sts' => $this->getInformasiStatis($id)
		);
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/stsinformasi',$data);
		$this->load->view('element/footeruser');
	}

	public function getInformasiStatis($id) {
		$this->db->where('idinfo',$id);
		return $this->db->get('informasi')->row();
	}

	public function totalbarangkategori($idkategori)
	{
		$this->db->where('id_kategori',$idkategori);
		return $this->db->get('barang');
	}

	public function barang($idkategori) 
	{
		$totalbarang = $this->totalbarangkategori($idkategori);
		$config = array(
                        'base_url' => base_url().'index.php/aplikasi/barang/'.$idkategori.'/',
                        'total_rows' => $totalbarang->num_rows(),
                        'uri_segment' => 4,
                        'per_page' => 6,
                        'num_links' => 2
                    );
        
        $config['full_tag_open'] = '<div><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';

        $config['first_link'] = '&laquo; First';
        $config['first_tag_open'] = '<li class="prev page">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last &raquo;';
        $config['last_tag_open'] = '<li class="next page">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo;';
        $config['next_tag_open'] = '<li class="next page">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo;';
        $config['prev_tag_open'] = '<li class="prev page">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = '<li class="active"><a href="">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = '<li class="page">';
        $config['num_tag_close'] = '</li>';
        
        $this->load->library('pagination');
        $this->pagination->initialize($config);

        $data = array(
			'judul' => namaApp(),
			// 'barang' => $this->databarangkategori($idkategori),
			'kategori' => $this->dataDetailkategori($idkategori),
		);

        $this->db->where('id_kategori',$idkategori);
        // $this->db->order_by('nis','DESC');        
        $data['barang'] = $this->db->get('barang',$config['per_page'],$this->uri->segment(4));
        
            
       	$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/barangkategori',$data);
		$this->load->view('element/footeruser');
    }

	public function transaksi() 
	{
		$data = array(
			'judul' => namaApp(),
			'barang' => $this->databarang()
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/transaksi',$data);
		$this->load->view('element/footeruser');	
	}

	public function databarangId($id) 
	{
		$this->db->where('id',$id);
		return $this->db->get('barang')->row();
	}

	public function databarang()
	{
		$this->db->order_by('id','desc');
		return $this->db->get('barang');
	}

	public function databarangsearch($cari)
	{
		$q = "select * from barang where nama_barang like '%$cari%'";
		return $this->db->query($q);
	}

	public function databarangkategori($idkategori)
	{
		$this->db->where('id_kategori',$idkategori);
		$this->db->order_by('id','desc');
		return $this->db->get('barang');
	}

	public function dataDetailkategori($id) {
		$this->db->where('id',$id);
		return $this->db->get('kategori')->row();	
	}

	// cart

	public function tambahcart()
	{
		$id = $this->input->post('idbarang');
		$ukuran = $this->input->post('optradio');
		// $warna = $this->input->post('warna');

		// $ukr = 'ukuran'.strtolower($ukuran);

		$cek = $this->cekstokidbarang($id,$ukuran);
		
		if($cek) {
			$barang = $this->databarangId($id);
			$nm = $barang->nama_barang;

			$harga = $barang->harga;
			if($barang->promo == 'Y' && $this->session->userdata('iduser') != '') {
				$harga = $barang->hargapromo;
			}

			$data = array(
		        'id'      => $barang->id,
		        'qty'     => 1,
		        'price'   => $harga,
		        'name'    => $nm,
		        'options' => array(
		        	'Size' => $ukuran == 'X' ? $barang->ukuran : $ukuran, 
		        	'Berat' => $barang->berat,
		        	// 'Warna' => $warna
		        )
			);

			if($this->cart->insert($data)) {
				$this->session->set_flashdata('berhasil','Berhasil Menambah 1 barang ke Cart');
			}
		} else {
			$this->session->set_flashdata('gagal','Jumlah Stok tidak mencukupi');
		}
		
		// redirect('aplikasi/detailbarang/'.$id);
		redirect('aplikasi/transaksi');
	}


	public function cekstokidbarang($idbarang,$ukuran)
	{
		$this->db->where('id',$idbarang);
		$barang = $this->db->get('barang')->row_array();

		$cart = $this->cart->total_items();
		if($cart) {
			
			$cekcart = 'N';
			foreach ($this->cart->contents() as $items) {
	           	if($items['id'] == $idbarang && $items['options']['Size'] == $ukuran) {
	           		$cekcart = 'Y';
	           	}
	        }

	        if($cekcart == 'Y') { 
				foreach ($this->cart->contents() as $items) {
					
		           	if($items['id'] == $idbarang && $items['options']['Size'] == $ukuran) {
		            	if($items['qty'] < $barang['ukuran'.strtolower($ukuran)]) {
		            		return true;
		            	} else {
		            		return false;
		            	}
			        }
		        }
		    } else {
		    	return true;
		    }
    	} else {
    		return true;
    	}

	}

	public function kurangi($jumlah,$id)
    {
        $data = array(
                        'rowid' => $id,
                        'qty' => $jumlah - 1
                    );
        $this->cart->update($data);
        redirect('aplikasi/transaksi');
    }
    


    public function tambah($jumlah,$id,$idbarang,$ukuran)
    {
    	// $ukr = 'ukuran'.strtolower($ukuran);
    	$cek = $this->cekstokidbarang($idbarang,$ukuran);

		if($cek) {
	        $data = array(
                        'rowid' => $id,
                        'qty' => $jumlah + 1
	                );
	        $this->cart->update($data);
	        $this->session->set_flashdata('berhasil','Berhasil Menambah 1 barang ke Cart');
	    } else {
	    	$this->session->set_flashdata('gagal','Jumlah Stok tidak mencukupi');
	    }

        redirect('aplikasi/transaksi');
    }

	public function hapuscart($id) {
		
		$this->cart->remove($id);
		redirect('aplikasi/transaksi');
	}

	

	// LOGIN USER
	public function logindaftar($usernamedft,$passworddft)
	{
		$username = $usernamedft;
        $password = md5($passworddft);
        
        $cek = $this->cekLogin($username,$password);
        
        if(count($cek)) {
            $data = array(
                        'iduser' => $cek->id,
                        'namauser' => $cek->nama,
                    ); 
            
            $this->session->set_userdata($data);
            $this->session->set_flashdata('berhasil','Hi..('.strtoupper($cek->nama).') Anda Berhasil Login');
           	redirect('webuser');
            
        } else {
        	 $this->session->set_flashdata('gagal','Anda Gagal Login, Kombinasi Username dan Password tidak cocok');
            redirect('aplikasi/daftar');
        }
	}

	public function login()
    {
        $username = $this->input->post('email');
        $password = md5($this->input->post('password'));
        
        $cek = $this->cekLogin($username,$password);
        
        if(count($cek)) {
            $data = array(
                        'iduser' => $cek->id,
                        'namauser' => $cek->nama,
                    ); 
            
            $this->session->set_userdata($data);
            $this->session->set_flashdata('berhasil','Hi..('.strtoupper($cek->nama).') Anda Berhasil Login');
           	redirect('webuser');
            
        } else {
        	$this->session->set_flashdata('gagal','Anda Gagal Login, Kombinasi Username dan Password tidak cocok');
            redirect('aplikasi/daftar');
        }
    }

    public function cekemail($email)
	{
		$this->db->where('username',$email);
		return $this->db->get('users')->row();
	}

    public function cekLogin($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get('users')->row();
    } 

	// lacak pesanan
    public function lacakpesanan()
	{
		$data = array(
			
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websitetamu/lacakpesanan',$data);
		$this->load->view('element/footeruser');
	}

	public function cariresi()
	{
		$resi = $this->input->get('qresi');
		$q = "SELECT * FROM pemesanan INNER JOIN trackingpesanan ON pemesanan.id_pesan = trackingpesanan.idpesanan WHERE pemesanan.noresi = '$resi'";
		$hasil = $this->db->query($q);

		$data = array(
			'trak' => $hasil
		);
		
		$this->load->view('websitetamu/lacakpesanantabel',$data);
	}

}
