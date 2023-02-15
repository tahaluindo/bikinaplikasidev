<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Webuser extends CI_Controller {
	private $iduser;
    private $gbukti;
   
	function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->gbukti = realpath(APPPATH.'../images/buktitransfer/');

        if($this->session->userdata('iduser')==null){
            redirect('aplikasi/daftar');
        }

        $this->iduser = $this->session->userdata('iduser');
    }

	public function index()
	{
		$data = array(
			'judul' => namaApp(),
			'user' => $this->getDataUser(),
			'order' => $this->getOrder()
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websiteuser/order',$data);
		$this->load->view('element/footeruser');
	}


    public function akunuser()
    {
        $data = array(
            'judul' => namaApp(),
            'user' => $this->getDataUser()
        );
        
        $this->load->view('element/headeruser',$data);
        $this->load->view('websiteuser/akunuser',$data);
        $this->load->view('element/footeruser');
    }

	public function orderdetail($idpesan)
	{
		$data = array(
			'judul' => namaApp(),
			'user' => $this->getDataUser(),
			'orderdetail' => $this->getOrderDetail($idpesan),
			'order' => $this->getOrderId($idpesan)
			
		);
		
		$this->load->view('element/headeruser',$data);
		$this->load->view('websiteuser/orderdetail',$data);
		$this->load->view('element/footeruser');
	}

    // cart
    public function checkout()
    {
        $data = array(
            'judul' => namaApp(),
            'user' => $this->getDataUser(),
            'totalberat' => $this->getTotalBerat()
        );
        
        $this->load->view('element/headeruser',$data);
        $this->load->view('websiteuser/checkout',$data);
        $this->load->view('element/footeruser');
    }

    public function dataOngkir()
    {
        $data = array(
            'message' => '',
            'value' => $this->getDataOngkir()->result_array()
        );
        echo json_encode($data);
    }

    public function cetaktransaksi($idpesan)
    {
        $data = array(
            'judul' => namaApp(),
            'user' => $this->getDataUser(),
            'orderdetail' => $this->getOrderDetail($idpesan),
            'order' => $this->getOrderId($idpesan)
            
        );
        $this->load->view('websiteuser/cetak_transaksi',$data);
    }

    public function cekstok($idbarang)
    {
        $this->db->where('id',$idbarang);
        return $this->db->get('barang')->row();
    }

    public function updatestok($idbarang,$jumlah,$ukuran)
    {
        $field = '';
        if($ukuran == 'S') {
            $field = 'ukurans';
        }
        if($ukuran == 'M') {
            $field = 'ukuranm';
        }
        if($ukuran == 'L') {
            $field = 'ukuranl';
        }
        if($ukuran == 'XL') {
            $field = 'ukuranxl';
        }

        $q = "update barang set ".$field." = ".$field ." - $jumlah where id = '$idbarang'";
        $this->db->query($q);
    }

    public function prosescheckout() 
    {
        $idpesan;
        // $data = array(
        //     'id_user' => $this->iduser,
        //     'tgl_pesan' => date('Y-m-d H:i:s'),
        //     'total' => $this->cart->total()
        // );

        // $this->db->insert('pemesanan',$data);
        $iduser = $this->iduser;
        $total = $this->cart->total();
        $nama = $this->input->post('nama_penerima');
        $alamat = $this->input->post('alamat_penerima');
        $notelp = $this->input->post('notelp_penerima');
        $ongkir = $this->input->post('ongkos_kirim');
        $expedisi = $this->input->post('expedisi');
        $idongkir = $this->input->post('id_ongkir');

        $qpesan = "INSERT INTO pemesanan SET id_user = '$iduser', tgl_pesan = NOW(), total = '$total', bataskonfirmasi = DATE_ADD(NOW(), INTERVAL 1 DAY),nama_penerima = '$nama',alamat_penerima = '$alamat',notelp_penerima = '$notelp',ongkos_kirim = '$ongkir',id_ongkir = '$idongkir',expedisi = '$expedisi'";

        if($this->db->query($qpesan)) {
            $idpesan = $this->db->insert_id();
        }

        $teks = '';
        $totalcart = $this->cart->total_items();
        $berhasilcart = 0;
        $gagalcart = 0;
        foreach ($this->cart->contents() as $items) {

            // $cekstok = $this->cekstok($items['id']);

            // if($items['qty'] <= $cekstok->stok) {
                $data = array(
                    'id_pesan' => $idpesan,
                    'id_barang' => $items['id'],
                    'harga_detail' => $items['price'],
                    'jumlah_detail' => $items['qty'],
                    'ukuran' => $items['options']['Size'],
                    'warna' => $items['options']['Warna']
                );
                $this->db->insert('detail_pemesanan',$data);

                // $this->updatestok($items['id'],$items['qty']);
                $this->updatestok($items['id'],$items['qty'],$items['options']['Size']);
            //     $berhasilcart++;
            // } else {
            //     $teks .= "Barang ".$cekstok->nama_barang." jumlah stok tidak mencukupi dengan jumlah pembelian anda<br>";
            //     $gagalcart++;
            // }
            
        }

        $this->cart->destroy();

        $transaksi = $this->getTransaksiTerakhir($idpesan);
        $user = $this->getUsersId($transaksi->id_user);
        $teks .= "Transaksi anda<br>";

        if($gagalcart) {
            $teks .= "Gagal diproses<br>";
        } else {
            $teks .= "Berhasil diproses<br>";
            $teks .= "Lakukan pembayaran sebelum : ".mdate('%d-%m-%Y %H:%i',strtotime($transaksi->bataskonfirmasi))."<br>";
            $teks .= norekening().'<br>';
            $teks .= 'No Telp : '.$user->notelp.'<br>';
        }
        $teks .= "Terima Kasih";

        // $teks .= "Berhasil : ".$berhasilcart." Gagal : ".$gagalcart."<br>";

        // $teks .= "Berhasil : ".$berhasilcart." Gagal : ".$gagalcart."<br>";

        // $teks .= "Lakukan pembayaran sebelum : ".mdate('%d-%m-%Y %H:%i',strtotime($transaksi->bataskonfirmasi))."<br>";
        // $teks .= norekening();
        // $teks .= "Terima Kasih";

        $this->session->set_flashdata('transaksi',$teks);

        redirect('webuser');
    }

    public function datax()
    {
        $transaksi = $this->getTransaksiTerakhir(3);
        $user = $this->getUsersId($transaksi->id_user);
        echo $user->notelp;
    }

    public function getUsersId($iduser)
    {
        $this->db->where('id',$iduser);
        return $this->db->get('users')->row();
    }

    public function getTransaksiTerakhir($idpesan)
    {
        $this->db->where('id_pesan',$idpesan);
        return $this->db->get('pemesanan')->row();
    }

    public function getDataOngkir()
    {
        $q = "SELECT * FROM ongkos_kirim";
        return $this->db->query($q);
    }


    // ganti password
    public function gantipassword()
    {
        $iduser = $this->iduser;
        $passwordlama = md5($this->input->post('password_old'));
        $passwordbaru = md5($this->input->post('password_new'));

        $sqlcek = "select * from users where id = '$iduser' and password = '$passwordlama'";

        $qcek = $this->db->query($sqlcek);
        if($qcek->num_rows()) {

            $data = array(
                'password' => $passwordbaru
            );
            $this->db->where('id',$iduser);
            $this->db->update('users',$data);

            redirect('webuser/akunuser');
            
        } else {
            redirect('webuser/akunuser');
        }

    }

    // ganti profil
    public function gantiprofil()
    {
        $iduser = $this->iduser;

        $data = array(
            'nama' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'notelp' => $this->input->post('notelp'),
            //'username' => $this->input->post('username'),
        );
        $this->db->where('id',$iduser);
        $this->db->update('users',$data);

        redirect('webuser/akunuser');
    }

    // logout

    public function logoutconfirm()
    {
        $data = array(
            'judul' => namaApp(),
        );
        
        $this->load->view('element/headeruser',$data);
        $this->load->view('websiteuser/logout',$data);
        $this->load->view('element/footeruser');
    }

	public function logout()
    {    
        $data = array('iduser','namauser');
        
        $this->session->unset_userdata($data);
       
        redirect('aplikasi');
    }

    // model

    public function getDataUser()
    {
    	$this->db->where('id',$this->iduser);
    	$this->db->where('status','Aktif');
    	return $this->db->get('users')->row();
    }

    public function getOrder() {
    	$this->db->where('id_user',$this->iduser);
    	$this->db->order_by('id_pesan','DESC');
    	return $this->db->get('pemesanan');
    }

    public function getOrderId($idpesan) {
    	$this->db->where('id_user',$this->iduser);
    	$this->db->where('id_pesan',$idpesan);
    	return $this->db->get('pemesanan')->row();
    }

    public function getOrderDetail($idpesan) {
    	$iduser = $this->iduser;
    	$sql = "SELECT * FROM detail_pemesanan INNER JOIN barang ON detail_pemesanan.id_barang = barang.id INNER JOIN pemesanan ON detail_pemesanan.id_pesan = pemesanan.id_pesan WHERE pemesanan.id_pesan = '$idpesan' AND pemesanan.id_user = '$iduser'";
    	return $this->db->query($sql);
    }


    // upload bukti
    public function uploadBuktiTransfer($id) 
    {
        
        $this->load->library('image_lib');

        $nmfile = "bukti_".time();
        $config = array(
                    'upload_path' => $this->gbukti,
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
                        'konfirmasi' => 'Sudah',
                        'buktikonfirmasi' => $files['file_name'],
                        'tglkonfirmasi' => date('Y-m-d H:i:s'),
                        'banktransfer' => $this->input->post('bank'),
                        'jumlahtransfer' => $this->input->post('jumlahtransfer'),
                        'tgltransfer' => $this->input->post('tgltransfer'),
                        'norekening' => $this->input->post('norekening'),
                        
                    );
            $this->db->where('id_pesan',$id);
            $this->db->update('pemesanan',$data);
            
            //echo "BERHASIL";
            $this->session->set_flashdata('berhasil',"<strong>Selamat, Transaksi anda BERHASIL di proses</strong>");
            redirect('webuser/orderdetail/'.$id);
        } else {
            //echo "GAGAL";
             $this->session->set_flashdata('gagal',"<strong>Maaf, Transaksi anda GAGAL di proses</strong>");
            redirect('webuser/orderdetail/'.$id);
        }
    }

    public function hapusOrder($idpesan)
    {
        $this->db->where('id_pesan',$idpesan);
        $this->db->delete('pemesanan');

        $this->db->where('id_pesan',$idpesan);
        $this->db->delete('detail_pemesanan');

        $this->session->set_flashdata('berhasil',"<strong>Selamat, Data BERHASIL di hapus</strong>");
        redirect('webuser');
    }

    function getTotalBerat()
    {
        $totalberat = 0;
        foreach ($this->cart->contents() as $items) {        
            // $items['options']['Size']

            $brttemp = ($items['options']['Berat']/1000);

            $brttemphsl = $brttemp * $items['qty'];

            $totalberat += $brttemphsl = $brttemp * $items['qty'];
        }

        return $totalberat;
    }
}
