<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    private $id; 
	function __construct()
    {
        parent::__construct();
                
        if($this->session->userdata('id')==NULL){
            redirect('auth');
        }

        $this->id = $this->session->userdata('id');
    }

	public function index()
	{
        $data = array(
            'orders' => $this->getneworder(),
            'users' => $this->getuser(),
            'gagal' => $this->getgagal(),
            'bestseller' => $this->getbestseller()
        );
		$this->load->view('element/headeradmin',$data);
		$this->load->view('dashboard/dashboard',$data);
		$this->load->view('element/footeradmin');
	}

    public function getneworder()
    {
        $q = "SELECT * FROM pemesanan WHERE konfirmasi = 'Belum' AND bataskonfirmasi >= NOW()";
        return $this->db->query($q);
    }

    public function getuser()
    {
        $this->db->where('status','Aktif');
        return $this->db->get('users');
    }

    public function getgagal()
    {
        $q = "SELECT * FROM pemesanan INNER JOIN users ON pemesanan.id_user = users.id WHERE (konfirmasi = 'Belum'  OR konfirmasi = 'Gagal' ) AND bataskonfirmasi <= NOW() ORDER BY konfirmasi";
        return $this->db->query($q);
    }

    public function getbestseller()
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

    public function kembalikanstok($idpesan)
    {
        $data = array(
            'konfirmasi' => 'Gagal'
        );
        $this->db->where('id_pesan',$idpesan);
        $this->db->update('pemesanan',$data);


        $q = "select * from detail_pemesanan where id_pesan = '$idpesan'";

        $result = $this->db->query($q);

        foreach ($result->result() as $rs) {
            $qstok = "update barang set stok = stok + '".$rs->jumlah_detail."' where id = '".$rs->id_barang."'";
            $this->db->query($qstok);
        }
        //berhasil
        $this->session->set_flashdata('berhasil',"<strong>Berhasil Kembalikan Stok Barang</strong>");
        redirect('dashboard');

    }

	public function logout()
    {    
        $data = array('id','nama');
        
        $this->session->unset_userdata($data);
       
        redirect('auth');
    }

    public function settings() {

        $data = array(
            'judul' => 'Settings Admin',
            'user' => $this->dataUserId($this->id)
        );
        
        $this->load->view('element/headeradmin',$data);
        $this->load->view('dashboard/admin_settings',$data);
        $this->load->view('element/footeradmin');
    }

    public function dataUserId($id) {
        $this->db->where('id',$id);
        return $this->db->get('users')->row();  
    }

    public function editAdmin($id) {

        if($this->input->post('password') != '') {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
            );
        } else {
            $data = array(
                'nama' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
            );
        }

        $this->db->where('id',$id);
        $hasil = $this->db->update('users',$data);

        if($hasil) {
            $this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 User</strong>");
            redirect('dashboard');
        } 

        redirect('dashboard');
    }
}
