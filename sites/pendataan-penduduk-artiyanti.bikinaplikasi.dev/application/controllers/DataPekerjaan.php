<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPekerjaan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapekerjaan_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Pekerjaan";
        $data['DataPekerjaan'] = $this->Datapekerjaan_model->get_all_DataPekerjaan();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapekerjaan/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data pekerjaan";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataPekerjaan = $this->db->get_where('datapekerjaan', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataPekerjaan->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataPekerjaan/add');
            }

            $params = array(
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataPekerjaan_id = $this->Datapekerjaan_model->add_DataPekerjaan($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataPekerjaan/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapekerjaan/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPekerjaan exists before trying to edit it
        $data['DataPekerjaan'] = $this->Datapekerjaan_model->get_DataPekerjaan($id);

        if (isset($data['DataPekerjaan']['id'])) {
            $data['title'] = "Data pekerjaan";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataPekerjaan = $this->db->get_where('datapekerjaan', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataPekerjaan->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Pekerjaan sudah ada.
						</div>'
                    );
                    redirect('DataPekerjaan/edit/' . $id);
                }

                $params = array(
                    'keterangan'               => $this->input->post('keterangan')
                );

                $this->Datapekerjaan_model->update_DataPekerjaan($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataPekerjaan/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapekerjaan/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPekerjaan you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPekerjaan = $this->Datapekerjaan_model->get_DataPekerjaan($id);

        // check if the DataPekerjaan exists before trying to delete it
        if (isset($DataPekerjaan['id'])) {

            $this->Datapekerjaan_model->delete_DataPekerjaan($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPekerjaan/index');
        } else {
            show_error('The DataPekerjaan you are trying to delete does not exist.');
        }

    }
}
