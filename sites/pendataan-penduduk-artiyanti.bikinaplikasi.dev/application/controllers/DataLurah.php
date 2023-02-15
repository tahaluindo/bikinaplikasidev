<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataLurah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datalurah_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Lurah";
        $data['DataLurah'] = $this->Datalurah_model->get_all_DataLurah();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datalurah/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data lurah";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataLurah = $this->db->get_where('datalurah', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataLurah->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataLurah/add');
            }

            $params = array(
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataLurah_id = $this->Datalurah_model->add_DataLurah($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataLurah/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datalurah/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataLurah exists before trying to edit it
        $data['DataLurah'] = $this->Datalurah_model->get_DataLurah($id);

        if (isset($data['DataLurah']['id'])) {
            $data['title'] = "Data lurah";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataLurah = $this->db->get_where('datalurah', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataLurah->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Lurah sudah ada.
						</div>'
                    );
                    redirect('DataLurah/edit/' . $id);
                }

                $params = array(
                    'keterangan'               => $this->input->post('keterangan')
                );

                $this->Datalurah_model->update_DataLurah($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataLurah/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datalurah/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataLurah you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataLurah = $this->Datalurah_model->get_DataLurah($id);

        // check if the DataLurah exists before trying to delete it
        if (isset($DataLurah['id'])) {

            $this->Datalurah_model->delete_DataLurah($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataLurah/index');
        } else {
            show_error('The DataLurah you are trying to delete does not exist.');
        }

    }
}
