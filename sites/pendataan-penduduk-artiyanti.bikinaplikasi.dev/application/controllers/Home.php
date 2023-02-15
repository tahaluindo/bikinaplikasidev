<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
	}
	
	public function index()
	{
		$data['penduduks'] = $this->db->get('datapenduduk');
		$data['penduduk_tetaps'] = $this->db->get('datapenduduktetap');
		$data['penduduk_meninggals'] = $this->db->get('datapendudukmeninggal');
		$data['penduduk_pindahs'] = $this->db->get('datapendudukpindah');
		$data['penduduk_lahirs'] = $this->db->get('datapenduduklahir');
		$data['penduduk_datangs'] = $this->db->get('datapendudukdatang');
		
		$data ['title'] = "Dashboard";
		$this->db->order_by('id_notif','DESC');
		// $data ['query'] = $this->db->get('notifikasi');
		$this->load->view('layout/head', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('layout/content', $data);
		$this->load->view('layout/footer');
	}

	public function profile()
	{
		$ceks = $this->session->userdata('username');
		$data ['title'] = "Profile";
		if (isset($_POST['btnsimpan'])) {
			$this->load->library('form_validation');
			$this->form_validation->set_rules('username','Username','required');
			$this->form_validation->set_rules('password','Password','required');
			$this->form_validation->set_rules('password2','Repeat Password','required');

			if($this->form_validation->run())
		  {
				$username  = htmlentities(strip_tags($this->input->post('username')));
				$password  = htmlentities(strip_tags($this->input->post('password')));
				$password2 = htmlentities(strip_tags($this->input->post('password2')));

				if ($password != $password2) {
					$this->session->set_flashdata('msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Password tidak cocok.
						</div>'
					);
					redirect('home/profile');
				}

					$pesan = '';
					if ($ceks == $username) {
						$update = 'yes';
					}else{
						$cek_un = $this->db->get_where('user', "username='$username'")->num_rows();
						if ($cek_un == 0) {
								$update = 'yes';
						}else{
								$update = 'no';
								$pesan  = 'Username "<b>'.$username.'</b>" sudah ada';
						}
					}

					if ($update == 'yes') {
								$data = array(
									'username'	=> $username,
									'password'	=> md5($password)
								);
								$this->db->update('user', $data, array('username' => $ceks));

								$this->session->has_userdata('username');
								$this->session->set_userdata('username', "$username");

								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Profile berhasil disimpan.
									</div>'
								);
								redirect('home/profile');
					}else {
						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> '.$pesan.'.
							</div>'
						);
						redirect('home/profile');
					}
			}else {
				$this->load->view('layout/head', $data);
				$this->load->view('layout/sidebar');
				$this->load->view('layout/content_profile');
				$this->load->view('layout/footer');
			}

		}else{
			$this->load->view('layout/head', $data);
			$this->load->view('layout/sidebar');
			$this->load->view('layout/content_profile');
			$this->load->view('layout/footer');
		}
	}

	public function h_notif($id='')
	{
		if ($this->session->userdata('role')!='Kepala Desa') {
			show_404();
		}
		$notif = $this->db->get_where('notifikasi',array('id_notif'=>$id))->row_array();

			// check if the laporan exists before trying to delete it
			if(isset($notif['id_notif']))
			{
					$this->db->delete('notifikasi',array('id_notif'=>$id));
					$this->session->set_flashdata('msg',
						'
						<div class="alert alert-success alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Sukses!</strong> Berhasil dihapus.
						</div>'
					);
					redirect('Home');
			}
			else
					show_error('The notikasi you are trying to delete does not exist.');
	}

}
