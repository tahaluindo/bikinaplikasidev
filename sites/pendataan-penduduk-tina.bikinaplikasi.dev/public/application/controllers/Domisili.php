<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Domisili extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Domisili_model');
				if($this->session->userdata('status')=='')
        {
        	redirect('Auth');
        }
				if ($this->session->userdata('role') != 'Bagian Pelayanan' AND $this->session->userdata('role') != 'Admin')
        {
        	//redirect('Error/404');
        	show_404();
        }
    }

	public function index()
	{
		$data ['title'] = "Surat Domisili";
		$data['domisili'] = $this->Domisili_model->get_all_domisili();
		$this->load->view('layout/head', $data);
		$this->load->view('layout/sidebar');
		$this->load->view('domisili/index', $data);
		$this->load->view('layout/footer');
	}

	public function add()
	{
		$data ['title'] = "Surat Domisili";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_penduduk','Nama Lengkap','required');
		$this->form_validation->set_rules('nik','NIK','required|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('kependuduknegaraan','Kependuduknegaraan','required');
		$this->form_validation->set_rules('status','Status Kawin','required');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('pendidikan','Pendidikan','required');
		$this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
		$this->form_validation->set_rules('pindah_ke','Pindah Ke-','required');
		$this->form_validation->set_rules('alasan_pindah','Alasan Pindah','required');
		$this->form_validation->set_rules('pengikut','Pengikut','required');
		$this->form_validation->set_rules('tgl_surat_dibuat','Tanggal Surat Dibuat','required');
		$this->form_validation->set_rules('tgl_surat_masuk','Tanggal Surat Masuk','required');
		$this->form_validation->set_rules('ket','Keterangan');
		// $this->form_validation->set_rules('scan','Scan', 'required');

		  if($this->form_validation->run())
		    {
		    	$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'pdf|doc|docx|jpg';
				$config['max_size'] = 10000;
				$this->load->library('upload' , $config);
				if(!$this->upload->do_upload('scan'))
				{
					$file_name = '';
				}
				else
				{
					$upload_data  = $this->upload->data();
		      		$file_name  =   $upload_data['file_name'];
				}

				$cek_domisili = $this->db->get_where('domisili', array('nik' => $this->input->post('nik')));
				if ($cek_domisili->num_rows() != 0 ) {
					$this->session->set_flashdata('msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> NIK sudah ada.
						</div>'
					);
					redirect('domisili/add');
				}

			     $params = array(
			     	'nama_penduduk' => $this->input->post('nama_penduduk'),
				    'nik' => $this->input->post('nik'),
				    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
				    'tempat_lahir' => $this->input->post('tempat_lahir'),
				    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
				    'agama' => $this->input->post('agama'),
				    'kependuduknegaraan' => $this->input->post('kependuduknegaraan'),
				    'status' => $this->input->post('status'),
				    'pekerjaan' => $this->input->post('pekerjaan'),
				    'pendidikan' => $this->input->post('pendidikan'),
				    'alamat_asal' => $this->input->post('alamat_asal'),
				    'pindah_ke' => $this->input->post('pindah_ke'),
				    'alasan_pindah' => $this->input->post('alasan_pindah'),
				    'pengikut' => $this->input->post('pengikut'),
				    'tgl_surat_dibuat' => $this->input->post('tgl_surat_dibuat'),
				    'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
				    'keterangan' => $this->input->post('ket'),
				    'scan' => $file_name
				    );

	            $domisili_id = $this->Domisili_model->add_domisili($params);
							$this->session->set_flashdata('msg',
								'
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
							);
	            redirect('domisili/index');
	        }
	        else
	        {
	           $this->load->view('layout/head' , $data);
						$this->load->view('layout/sidebar');
						$this->load->view('domisili/add');
						$this->load->view('layout/footer');
	        }

	}

		public function edit($id)
		{
			// check if the domisili exists before trying to edit it
        $data['domisili'] = $this->Domisili_model->get_domisili($id);

        if(isset($data['domisili']['nik']))
        {
          $data ['title'] = "Surat Domisili";
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nama_penduduk','Nama Lengkap','required');
		$this->form_validation->set_rules('nik','NIK','required|numeric');
		$this->form_validation->set_rules('jenis_kelamin','Jenis Kelamin','required');
		$this->form_validation->set_rules('tempat_lahir','Tempat Lahir','required');
		$this->form_validation->set_rules('tanggal_lahir','Tanggal Lahir','required');
		$this->form_validation->set_rules('agama','Agama','required');
		$this->form_validation->set_rules('kependuduknegaraan','Kependuduknegaraan','required');
		$this->form_validation->set_rules('status','Status Kawin','required');
		$this->form_validation->set_rules('pekerjaan','Pekerjaan','required');
		$this->form_validation->set_rules('pendidikan','Pendidikan','required');
		$this->form_validation->set_rules('alamat_asal','Alamat Asal','required');
		$this->form_validation->set_rules('pindah_ke','Pindah Ke-','required');
		$this->form_validation->set_rules('alasan_pindah','Alasan Pindah','required');
		$this->form_validation->set_rules('pengikut','Pengikut','required');
		$this->form_validation->set_rules('tgl_surat_dibuat','Tanggal Surat Dibuat','required');
		$this->form_validation->set_rules('tgl_surat_masuk','Tanggal Surat Masuk','required');
		$this->form_validation->set_rules('ket','Keterangan');
		// $this->form_validation->set_rules('scan','Scan', 'required');

   if($this->form_validation->run())
            {
		    	$config['upload_path'] = './assets/uploads';
				$config['allowed_types'] = 'pdf|doc|docx|jpg';
				$config['max_size'] = 10000;
				$this->load->library('upload' , $config);
				if(!$this->upload->do_upload('scan'))
				{
					$params = array(
						'nama_penduduk' => $this->input->post('nama_penduduk'),
					   'nik' => $this->input->post('nik'),
					   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					   'tempat_lahir' => $this->input->post('tempat_lahir'),
					   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					   'agama' => $this->input->post('agama'),
					   'kependuduknegaraan' => $this->input->post('kependuduknegaraan'),
					   'status' => $this->input->post('status'),
					   'pekerjaan' => $this->input->post('pekerjaan'),
					   'pendidikan' => $this->input->post('pendidikan'),
					   'alamat_asal' => $this->input->post('alamat_asal'),
					   'pindah_ke' => $this->input->post('pindah_ke'),
					   'alasan_pindah' => $this->input->post('alasan_pindah'),
					   'pengikut' => $this->input->post('pengikut'),
					   'tgl_surat_dibuat' => $this->input->post('tgl_surat_dibuat'),
					   'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
					   'keterangan' => $this->input->post('ket'),
				   );
				}
				else
				{
					$upload_data  = $this->upload->data();
					$file_name  =   $upload_data['file_name'];
					  
					$params = array(
						'nama_penduduk' => $this->input->post('nama_penduduk'),
					   'nik' => $this->input->post('nik'),
					   'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					   'tempat_lahir' => $this->input->post('tempat_lahir'),
					   'tanggal_lahir' => $this->input->post('tanggal_lahir'),
					   'agama' => $this->input->post('agama'),
					   'kependuduknegaraan' => $this->input->post('kependuduknegaraan'),
					   'status' => $this->input->post('status'),
					   'pekerjaan' => $this->input->post('pekerjaan'),
					   'pendidikan' => $this->input->post('pendidikan'),
					   'alamat_asal' => $this->input->post('alamat_asal'),
					   'pindah_ke' => $this->input->post('pindah_ke'),
					   'alasan_pindah' => $this->input->post('alasan_pindah'),
					   'pengikut' => $this->input->post('pengikut'),
					   'tgl_surat_dibuat' => $this->input->post('tgl_surat_dibuat'),
					   'tgl_surat_masuk' => $this->input->post('tgl_surat_masuk'),
					   'keterangan' => $this->input->post('ket'),
					   'scan' => $file_name
				   );
				}

				$cek_domisili = $this->db->get_where('domisili', array('nik' => $this->input->post('nik'), 'nik!='=>$id));
				if ($cek_domisili->num_rows() != 0 ) {
					$this->session->set_flashdata('msg',
						'
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> NIK sudah ada.
						</div>'
					);
					redirect('domisili/edit/'.$id);
				}

                

                $this->Domisili_model->update_domisili($id,$params);
								$this->session->set_flashdata('msg',
									'
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
								);
                redirect('domisili/index');
            }
            else
            {
                $this->load->view('layout/head' , $data);
				$this->load->view('layout/sidebar');
				$this->load->view('domisili/edit' , $data);
				$this->load->view('layout/footer');
            }
        }
        else
            show_error('The domisili you are trying to edit does not exist.');


		}

		public function remove($id)
		{
			$domisili = $this->Domisili_model->get_domisili($id);

        // check if the domisili exists before trying to delete it
        if(isset($domisili['nik']))
        {
					if ($DataPenduduk['scan']!='') {
						unlink('assets/uploads/'.$DataPenduduk['scan']);
					}
            $this->Domisili_model->delete_domisili($id);
						$this->session->set_flashdata('msg',
							'
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
						);
            redirect('domisili/index');
        }
        else
            show_error('The domisili you are trying to delete does not exist.');
		}
}
