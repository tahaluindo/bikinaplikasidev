<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataRt extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datart_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']  = "Data Rt";
        $data['DataRt'] = $this->Datart_model->get_all_DataRt();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datart/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Rt";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_rt', 'nama_rt', 'required');
        $this->form_validation->set_rules('dusun', 'dusun', 'required');

        if ($this->form_validation->run()) {

            $cek_DataRt = $this->db->get_where('rt', array('nama_rt' => $this->input->post('nama_rt')));

            if ($cek_DataRt->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Nama Rt sudah ada.
							</div>'
                );
                redirect('DataRt/add');
            }

            $params = array(
                'nama_rt' => $this->input->post('nama_rt'), 
                'ketua_rt' => $this->input->post('ketua_rt'),
                'dusun' => $this->input->post('dusun'),
            );

            $DataRt_id = $this->Datart_model->add_DataRt($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataRt/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datart/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataRt exists before trying to edit it
        $data['DataRt'] = $this->Datart_model->get_DataRt($id);

        if (isset($data['DataRt']['id'])) {
            $data['title'] = "Data Rt";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_rt', 'Nama Rt', 'required');
            $this->form_validation->set_rules('ketua_rt', 'Ketua Rt', 'required');
            $this->form_validation->set_rules('dusun', 'Dusun', 'required');

            if ($this->form_validation->run()) {
                $cek_DataRt = $this->db->get_where('rt', array('nama_rt' => $this->input->post('nama_rt'), 'nama_rt!=' => $id));

                if ($cek_DataRt->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nama Rt sudah ada.
						</div>'
                    );
                    redirect('DataRt/edit/' . $id);
                }

                $params = array(
                    'nama_rt' => $this->input->post('nama_rt'),
                    'ketua_rt' => $this->input->post('ketua_rt'),
                    'dusun' => $this->input->post('dusun'),
                );

                $this->Datart_model->update_DataRt($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataRt/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datart/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataRt you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataRt = $this->Datart_model->get_DataRt($id);

        // check if the DataRt exists before trying to delete it
        if (isset($DataRt['id'])) {

            $this->Datart_model->delete_DataRt($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataRt/index');
        } else {
            show_error('The DataRt you are trying to delete does not exist.');
        }

    }

    public function lihatkk()
    {
        $data['title']          = "Data KK";
        $penduduk = $this->db->select('nik')->where('rt', $this->input->get('nama_rt'))->get('penduduk')->result();
        $dataPenduduk = [];
        foreach($penduduk as $penduduk) {
            $dataPenduduk[] = $penduduk->nik;
        }
        
        if(!count($dataPenduduk)) {
            die('Tidak ada data kk!');
        }

        // print_r($dataPenduduk); die();
        
        $data['DataKK'] = $this->db->where_in('nik_kepala_keluarga', $dataPenduduk)->get('kk')->result_array();
        // print_r($data['DataKK']);die();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datakk/index', $data);
        $this->load->view('layout/footer');
    }
}
