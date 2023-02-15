<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

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
			'judul' => 'Users',
			'users' => $this->dataUsers()
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('users/users',$data);
		$this->load->view('element/footeradmin');
	}

	public function userTambah()
	{
		$data = array(
			'judul' => 'Tambah User',
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('users/users_tambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function userUbah($id)
	{
		$data = array(
			'judul' => 'Ubah User',
			'user' => $this->dataUserId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('users/users_ubah',$data);
		$this->load->view('element/footeradmin');
	}

	

	// ---------------------------- Model Data ------------------------
	// ban
	public function dataUsers() {
		return $this->db->get('users');
	}

	public function dataUserId($id) {
		$this->db->where('id',$id);
		return $this->db->get('users')->row();	
	}

	public function simpanUser() {

		$data = array(
			'nama' => $this->input->post('nama'),
			'notelp' => $this->input->post('notelp'),
			'alamat' => $this->input->post('alamat'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => $this->input->post('status'),
			'tgl_daftar' => date('Y-m-d H:i:s')
		);

		$hasil = $this->db->insert('users',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 User</strong>");
			redirect('users');
		} 

		redirect('users/userTambah');
	}

	public function editUser($id) {

		if($this->input->post('password') != '') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'notelp' => $this->input->post('notelp'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status' => $this->input->post('status'),
				'tgl_daftar' => date('Y-m-d H:i:s')
			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'notelp' => $this->input->post('notelp'),
				'alamat' => $this->input->post('alamat'),
				'username' => $this->input->post('username'),
				'status' => $this->input->post('status'),
				'tgl_daftar' => date('Y-m-d H:i:s')
			);
		}

		$this->db->where('id',$id);
		$hasil = $this->db->update('users',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 User</strong>");
			redirect('users');
		} 

		redirect('users/usersUbah/'.$id);
	}

	public function hapusUser($id) {

		$this->db->where('id',$id);
		$hasil = $this->db->delete('users');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 User</strong>");
			redirect('users');
		} 

		redirect('users');
	}

	
}
