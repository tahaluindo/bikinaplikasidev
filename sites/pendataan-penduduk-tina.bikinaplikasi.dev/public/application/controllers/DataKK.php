<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataKK extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataKK_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data KK";
        $data['DataKK'] = $this->DataKK_model->get_all_DataKK();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datakk/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data KK";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik_kepala_keluarga', 'NIK Kepala Keluarga', 'required');
        $this->form_validation->set_rules('nik', 'NIK', 'required');
        $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');

        if ($this->form_validation->run()) {

            $cek_DataKK = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik_kepala_keluarga')));
            if ($cek_DataKK->num_rows() == 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> NIK kepala keluarga tidak ada didata penduduk.
							</div>'
                );
                redirect('DataKK/add');
            }

            $cek_DataKK = $this->db->get_where('kk', array('nik' => $this->input->post('nik')));
            if ($cek_DataKK->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Nik sudah ada.
							</div>'
                );
                redirect('DataKK/add');
            }

            $params = array(
                'nik_kepala_keluarga' => $this->input->post('nik_kepala_keluarga'),
                'nik' => $this->input->post('nik'),
                'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
            );

            $DataKK_id = $this->DataKK_model->add_DataKK($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataKK/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datakk/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataKK exists before trying to edit it
        $data['DataKK'] = $this->DataKK_model->get_DataKK($id);

        if (isset($data['DataKK']['id'])) {
            $data['title'] = "Data KK";
            $this->load->library('form_validation');
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik_kepala_keluarga', 'NIK Kepala Keluarga', 'required');
            $this->form_validation->set_rules('nik', 'NIK', 'required');
            $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');

            if ($this->form_validation->run()) {

                $cek_DataKK = $this->db->get_where('kk', array('nik' => $this->input->post('nik_kepala_keluarga')));

                if ($cek_DataKK->num_rows() == 0) {
                    $this->session->set_flashdata('msg',
                        '
                                <div class="alert alert-warning alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                    </button>
                                    <strong>Gagal!</strong> NIK kepala keluarga tidak ada didata penduduk.
                                </div>'
                    );
                    redirect('DataKK/add');
                }

                // $cek_DataKK = $this->db->get_where('kk', array('nik' => $this->input->post('nik'), 'nik!=' => $id));

                // if ($cek_DataKK->num_rows() != 0) {
                //     $this->session->set_flashdata('msg',
                //         '
				// 		<div class="alert alert-warning alert-dismissible" role="alert">
				// 			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
				// 				 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
				// 			 </button>
				// 			 <strong>Gagal!</strong> DATA KK sudah ada.
				// 		</div>'
                //     );
                //     redirect('DataKK/edit/' . $id);
                // }

                $params = array(
                    'nik_kepala_keluarga' => $this->input->post('nik_kepala_keluarga'),
                    'nik' => $this->input->post('nik'),
                    'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                );

                $this->DataKK_model->update_DataKK($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataKK/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datakk/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataKK you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataKK = $this->DataKK_model->get_DataKK($id);

        // check if the DataKK exists before trying to delete it
        if (isset($DataKK['id'])) {

            $this->DataKK_model->delete_DataKK($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataKK/index');
        } else {
            show_error('The DataKK you are trying to delete does not exist.');
        }

    }

    public function lihatpenduduk()
    {
        $data['title']     = "Data Penduduk";
        $nik = $this->db->where('nik', $this->input->get('nik_kepala_keluarga'))->get('kk')->row()->nik ?? 0;
        $data['DataPenduduk'] = $this->db->where('nik', $nik)->get('penduduk')->result_array();
        $dataPenduduks = $this->db->where('nik', $nik)->get('penduduk')->result_array();

        if($this->input->get('nik')) {
            $nik = $this->db->where('nik', $this->input->get('nik'))->get('kk')->row()->nik ?? 0;
            $data['DataPenduduk'] = $this->db->where('nik', $this->input->get('nik'))->get('penduduk')->result_array();
            $dataPenduduks = $this->db->where('nik', $nik)->get('penduduk')->result_array();
        }

        $dataPendudukNamas = [];
        foreach($dataPenduduks as $dataPenduduk)
        {
            $dataPendudukNamas[] = $dataPenduduk['nama_lengkap'];
        }
// print_r($dataPendudukNamas); die();
        $data['DataPendudukLahir'] = $this->db->where_not_in('nama_lengkap', $dataPendudukNamas)->where('nik', $nik)->get('penduduklahir')->result_array();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapenduduk/index', $data);
        $this->load->view('layout/footer');
    }
}
