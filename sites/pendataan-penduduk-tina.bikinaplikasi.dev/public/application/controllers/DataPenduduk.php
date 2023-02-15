<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPenduduk extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapenduduk_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }
        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            //redirect('Error/404');
            
            show_404();
        }
    }
    
    public function index()
    {
        $data['title']     = "Data Penduduk";
        $data['DataPenduduk'] = $this->Datapenduduk_model->get_all_DataPenduduk();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapenduduk/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        // print_r($this->input->post());die();
        $this->load->model('Dataagama_model');
        $this->load->model('Datapendidikan_model');
        $this->load->model('Datapekerjaan_model');
        $this->load->model('Datalurah_model');
        $this->load->model('Datart_model');
        $data['rt']      = $this->Datart_model->get_all_DataRt();
        $data['agama']      = $this->Dataagama_model->get_all_DataAgama();
        $data['pendidikan'] = $this->Datapendidikan_model->get_all_DataPendidikan();
        $data['pekerjaan']  = $this->Datapekerjaan_model->get_all_DataPekerjaan();
        $data['lurah']      = $this->Datalurah_model->get_all_DataLurah();

        $data['title'] = "Data Penduduk";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|numeric');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status', 'Status Kawin', 'required');
        $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
        // $this->form_validation->set_rules('ket', 'Keterangan');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('dusun','Dusun', 'required');

        $pekerjaan = $this->input->post('pekerjaan');
        if($this->input->post('pekerjaan') == "lain-lain") {
            $this->form_validation->set_rules('pekerjaan_lain_lain','Pekerjaan Lain Lain', 'required');

            $pekerjaan = $this->input->post('pekerjaan_lain_lain');
        }

        // die($pekerjaan);

        if ($this->form_validation->run()) {
            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
			$config['max_size']      = 10000;
			
			$this->load->library('upload', $config);
			
            if (!$this->upload->do_upload('scan')) {
                $file_name = '';
            } else {
                $upload_data = $this->upload->data();
                $file_name   = $upload_data['file_name'];
            }

            $cek_DataPenduduk = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')));
            if ($cek_DataPenduduk->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> NIK sudah ada.
							</div>'
                );
                redirect('DataPenduduk/add');
            }

            $params = array(
                'nik'               => $this->input->post('nik'),
                'no_kk'             => $this->input->post('no_kk'),
                'nama_lengkap'      => $this->input->post('nama_lengkap'),
                'alamat'            => $this->input->post('alamat'),
                'rt'                => $this->input->post('rt'),
                'rw'                => $this->input->post('rw'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'no_telp'           => $this->input->post('no_telp'),
                'agama'             => $this->input->post('agama'),
                'pendidikan'        => $this->input->post('pendidikan'),
                'pekerjaan'         => $pekerjaan,
                'status'            => $this->input->post('status'),
                'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                // 'scan'              => $file_name,
                // 'ket'               => $this->input->post('ket'),
                'dusun'               => $this->input->post('dusun'),
                'lurah'             => $this->input->post('lurah'),
                'kecamatan'         => $this->input->post('kecamatan'),
                'kabupaten'         => $this->input->post('kabupaten'),
                'provinsi'          => $this->input->post('provinsi'),
                'negara'            => $this->input->post('negara'),
                'golongan_darah'            => $this->input->post('golongan_darah'),
                'desa'            => $this->input->post('desa'),
                
            );

            // echo "<pre>";
            // print_r($params); die();

        


            $DataPenduduk_id = $this->Datapenduduk_model->add_DataPenduduk($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );
            redirect('DataPenduduk/index');
        } else {
            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapenduduk/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        $this->load->model('Dataagama_model');
        $this->load->model('Datapendidikan_model');
        $this->load->model('Datapekerjaan_model');
        $this->load->model('Datalurah_model');
        $this->load->model('Datart_model');
        $data['rt']      = $this->Datart_model->get_all_DataRt();
        $data['agama']      = $this->Dataagama_model->get_all_DataAgama();
        $data['pendidikan'] = $this->Datapendidikan_model->get_all_DataPendidikan();
        $data['pekerjaan']  = $this->Datapekerjaan_model->get_all_DataPekerjaan();
        $data['lurah']      = $this->Datalurah_model->get_all_DataLurah();

        $data['DataPenduduk'] = $this->Datapenduduk_model->get_DataPenduduk($id);

        // untuk cek pekerjaan lain lain
        $penduduk = $this->db->where('nik', $id)->get('penduduk')->row();
        $cekPekerjaanPenduduk = $this->db->where('keterangan', $penduduk->pekerjaan)->get('pekerjaan')->row();
        $cekPekerjaanLainLain = $this->db->where('pekerjaan', $cekPekerjaanPenduduk->keterangan ?? "zzz")->get('penduduk')->num_rows(); #zzz gak ada

        $data['cekPekerjaanLainLain'] = false;
        if(!$cekPekerjaanLainLain) {
            $data['cekPekerjaanLainLain'] = true;
        }

        if (isset($data['DataPenduduk']['nik'])) {
            $data['title'] = "Data Penduduk";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
            $this->form_validation->set_rules('no_kk', 'No KK', 'required|numeric');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('alamat', 'Alamat', 'required');
            $this->form_validation->set_rules('rt', 'RT', 'required');
            $this->form_validation->set_rules('rw', 'RW', 'required|numeric');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
            $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
            $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
            $this->form_validation->set_rules('agama', 'Agama', 'required');
            $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
            $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
            $this->form_validation->set_rules('status', 'Status Kawin', 'required');
            $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
            // $this->form_validation->set_rules('ket', 'Keterangan');
            $this->form_validation->set_rules('lurah', 'Lurah', 'required');
            $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
            $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
            $this->form_validation->set_rules('provinsi', 'Provinsi', 'required');
            $this->form_validation->set_rules('negara', 'Negara', 'required');
            $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
            $this->form_validation->set_rules('desa', 'Desa', 'required');
            $this->form_validation->set_rules('dusun','Dusun','required');

            $pekerjaan = $this->input->post('pekerjaan');
        if($this->input->post('pekerjaan') == "lain-lain") {
            $this->form_validation->set_rules('pekerjaan_lain_lain','Pekerjaan Lain Lain', 'required');

            $pekerjaan = $this->input->post('pekerjaan_lain_lain');
        }

        // die($pekerjaan);

            if ($this->form_validation->run()) {
                $config['upload_path']   = './assets/uploads';
                $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
                $config['max_size']      = 10000;
                $this->load->library('upload', $config);

                $cek_DataPenduduk = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik'), 'nik!=' => $id));
                // print_r($this->input->post('scan'));die();
                if (!$this->upload->do_upload('scan')) {

                    $params = array(
                        'nik'               => $this->input->post('nik'),
                        'no_kk'             => $this->input->post('no_kk'),
                        'nama_lengkap'      => $this->input->post('nama_lengkap'),
                        'alamat'            => $this->input->post('alamat'),
                        'rt'                => $this->input->post('rt'),
                        'rw'                => $this->input->post('rw'),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                        'tempat_lahir'      => $this->input->post('tempat_lahir'),
                        'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                        'no_telp'           => $this->input->post('no_telp'),
                        'agama'             => $this->input->post('agama'),
                        'pendidikan'        => $this->input->post('pendidikan'),
                        'pekerjaan'         => $pekerjaan,
                        'status'            => $this->input->post('status'),
                        'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                        // 'ket'               => $this->input->post('ket'),
                        'dusun'             => $this->input->post('dusun'),
                        'lurah'             => $this->input->post('lurah'),
                        'kecamatan'         => $this->input->post('kecamatan'),
                        'kabupaten'         => $this->input->post('kabupaten'),
                        'provinsi'          => $this->input->post('provinsi'),
                        'negara'            => $this->input->post('negara'),
                        'golongan_darah'            => $this->input->post('golongan_darah'),
                        'desa'            => $this->input->post('desa'),
                    );
                } else {
					$this->upload->do_upload('scan');
                    $upload_data = $this->upload->data();
                    $file_name   = $upload_data['file_name'];
// die("sss");
                    $params = array(
                        'nik'               => $this->input->post('nik'),
                        'no_kk'             => $this->input->post('no_kk'),
                        'nama_lengkap'      => $this->input->post('nama_lengkap'),
                        'alamat'            => $this->input->post('alamat'),
                        'rt'                => $this->input->post('rt'),
                        'rw'                => $this->input->post('rw'),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                        'tempat_lahir'      => $this->input->post('tempat_lahir'),
                        'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                        'no_telp'           => $this->input->post('no_telp'),
                        'agama'             => $this->input->post('agama'),
                        'pendidikan'        => $this->input->post('pendidikan'),
                        'pekerjaan'         => $this->input->post('pekerjaan'),
                        'status'            => $this->input->post('status'),
                        'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                        // 'scan'              => $file_name,
                        // 'ket'               => $this->input->post('ket'),
                        'dusun'             => $this->input->post('dusun'),
                        'lurah'             => $this->input->post('lurah'),
                        'kecamatan'         => $this->input->post('kecamatan'),
                        'kabupaten'         => $this->input->post('kabupaten'),
                        'provinsi'          => $this->input->post('provinsi'),
                        'negara'            => $this->input->post('negara'),
                        'golongan_darah'            => $this->input->post('golongan_darah'),
                        'desa'            => $this->input->post('desa'),
                    );
                }

                if ($cek_DataPenduduk->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> NIK sudah ada.
						</div>'
                    );
                    redirect('DataPenduduk/edit/' . $id);
                }

                // $params = array(
                //     'nik'               => $this->input->post('nik'),
                //     'no_kk'             => $this->input->post('no_kk'),
                //     'nama_lengkap'      => $this->input->post('nama_lengkap'),
                //     'alamat'            => $this->input->post('alamat'),
                //     'rt'                => $this->input->post('rt'),
                //     'rw'                => $this->input->post('rw'),
                //     'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                //     'tempat_lahir'      => $this->input->post('tempat_lahir'),
                //     'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                //     'no_telp'           => $this->input->post('no_telp'),
                //     'agama'             => $this->input->post('agama'),
                //     'pendidikan'        => $this->input->post('pendidikan'),
                //     'pekerjaan'         => $this->input->post('pekerjaan'),
                //     'status'            => $this->input->post('status'),
                //     'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                //     'scan'              => $file_name,
                //     'ket'               => $this->input->post('ket'),
                //     'lurah'             => $this->input->post('lurah'),
                //     'kecamatan'         => $this->input->post('kecamatan'),
                //     'kabupaten'         => $this->input->post('kabupaten'),
                //     'provinsi'          => $this->input->post('provinsi'),
                //     'negara'            => $this->input->post('negara'),
                //     'golongan_darah'            => $this->input->post('golongan_darah'),
                // );

                $this->Datapenduduk_model->update_DataPenduduk($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataPenduduk/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapenduduk/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPenduduk you are trying to edit does not exist.');
        }

    }

    public function remove($id)
    {
        $DataPenduduk = $this->Datapenduduk_model->get_DataPenduduk($id);

        // check if the DataPenduduk exists before trying to delete it
        if (isset($DataPenduduk['nik'])) {
            if ($DataPenduduk['scan'] != '') {
                unlink('assets/uploads/' . $DataPenduduk['scan']);
            }
            $this->Datapenduduk_model->delete_DataPenduduk($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPenduduk/index');
        } else {
            show_error('The DataPenduduk you are trying to delete does not exist.');
        }

    }
}
