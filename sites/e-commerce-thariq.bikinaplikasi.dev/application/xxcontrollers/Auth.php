<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
                
        if($this->session->userdata('id')){
            redirect('dashboard');
        }
    }

	public function index()
	{
		$this->load->view('auth/login');
	}

	public function login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        
        // echo $username;
        // echo $password;

        $cek = $this->cekLogin($username,$password);
        
        if(count($cek)) {
            $data = array(
                        'id' => $cek->id,
                        'nama' => $cek->nama,
                    ); 
            // echo 'ada';
            $this->session->set_userdata($data);
            $this->session->set_flashdata('berhasil',"<strong>Selamat Datang Admin</strong>"); 
           	redirect('dashboard');
            
        } else {
            $this->session->set_flashdata('gagal',"<strong>Gagal Login</strong>");
            redirect('auth');
            // echo 'tidak ada';
        }
    }  
   
    public function cekLogin($username,$password)
    {
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        return $this->db->get('admin')->row();
    }
}
