<?php

defined('BASEPATH') or exit('No direct script access allowed');

class DataAgama extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Dataagama_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']     = "Data Agama";
        $data['DataAgama'] = $this->Dataagama_model->get_all_DataAgama();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dataagama/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data agama";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataAgama = $this->db->get_where('agama', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataAgama->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataAgama/add');
            }

            $params = array(
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataAgama_id = $this->Dataagama_model->add_DataAgama($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataAgama/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('dataagama/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataAgama exists before trying to edit it
        $data['DataAgama'] = $this->Dataagama_model->get_DataAgama($id);

        if (isset($data['DataAgama']['id'])) {
            $data['title'] = "Data agama";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataAgama = $this->db->get_where('agama', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataAgama->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Agama sudah ada.
						</div>'
                    );
                    redirect('DataAgama/edit/' . $id);
                }

                $params = array(
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->Dataagama_model->update_DataAgama($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataAgama/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('dataagama/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataAgama you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataAgama = $this->Dataagama_model->get_DataAgama($id);

        // check if the DataAgama exists before trying to delete it
        if (isset($DataAgama['id'])) {

            $this->Dataagama_model->delete_DataAgama($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataAgama/index');
        } else {
            show_error('The DataAgama you are trying to delete does not exist.');
        }

    }
}
