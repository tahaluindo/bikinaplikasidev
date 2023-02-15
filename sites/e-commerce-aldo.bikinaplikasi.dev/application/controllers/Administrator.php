<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
		$this->load->view('admin/users',$data);
		$this->load->view('element/footeradmin');
	}

	public function userTambah()
	{
		$data = array(
			'judul' => 'Tambah User',
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('admin/users_tambah',$data);
		$this->load->view('element/footeradmin');
	}

	public function userUbah($id)
	{
		$data = array(
			'judul' => 'Ubah User',
			'user' => $this->dataUserId($id)
		);
		
		$this->load->view('element/headeradmin',$data);
		$this->load->view('admin/users_ubah',$data);
		$this->load->view('element/footeradmin');
	}

	

	// ---------------------------- Model Data ------------------------
	// ban
	public function dataUsers() {
		return $this->db->get('admin');
	}

	public function dataUserId($id) {
		$this->db->where('id',$id);
		return $this->db->get('admin')->row();	
	}

	public function simpanUser() {

		$data = array(
			'nama' => $this->input->post('nama'),
			'username' => $this->input->post('username'),
			'password' => md5($this->input->post('password')),
			'status' => $this->input->post('status'),
			'level' => $this->input->post('level'),
		);

		$hasil = $this->db->insert('admin',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Tambah 1 User</strong>");
			redirect('administrator');
		} 

		redirect('administrator/userTambah');
	}

	public function editUser($id) {

		if($this->input->post('password') != '') {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'password' => md5($this->input->post('password')),
				'status' => $this->input->post('status'),
				'level' => $this->input->post('level'),

			);
		} else {
			$data = array(
				'nama' => $this->input->post('nama'),
				'username' => $this->input->post('username'),
				'status' => $this->input->post('status'),
				'level' => $this->input->post('level'),
			);
		}

		$this->db->where('id',$id);
		$hasil = $this->db->update('admin',$data);

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Ubah 1 User</strong>");
			redirect('administrator');
		} 

		redirect('administrator/usersUbah/'.$id);
	}

	public function hapusUser($id) {

		$this->db->where('id',$id);
		$hasil = $this->db->delete('admin');

		if($hasil) {
			$this->session->set_flashdata('berhasil',"<strong>Berhasil Hapus 1 User</strong>");
			redirect('administrator');
		} 

		redirect('administrator');
	}

	
}
