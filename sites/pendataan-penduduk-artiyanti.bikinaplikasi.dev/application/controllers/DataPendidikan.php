<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendidikan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapendidikan_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Pendidikan";
        $data['DataPendidikan'] = $this->Datapendidikan_model->get_all_DataPendidikan();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapendidikan/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data pendidikan";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataPendidikan = $this->db->get_where('datapendidikan', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataPendidikan->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataPendidikan/add');
            }

            $params = array(
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataPendidikan_id = $this->Datapendidikan_model->add_DataPendidikan($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataPendidikan/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapendidikan/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendidikan exists before trying to edit it
        $data['DataPendidikan'] = $this->Datapendidikan_model->get_DataPendidikan($id);

        if (isset($data['DataPendidikan']['id'])) {
            $data['title'] = "Data pendidikan";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataPendidikan = $this->db->get_where('datapendidikan', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataPendidikan->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Pendidikan sudah ada.
						</div>'
                    );
                    redirect('DataPendidikan/edit/' . $id);
                }

                $params = array(
                    'keterangan'               => $this->input->post('keterangan')
                );

                $this->Datapendidikan_model->update_DataPendidikan($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataPendidikan/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapendidikan/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendidikan you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendidikan = $this->Datapendidikan_model->get_DataPendidikan($id);

        // check if the DataPendidikan exists before trying to delete it
        if (isset($DataPendidikan['id'])) {

            $this->Datapendidikan_model->delete_DataPendidikan($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendidikan/index');
        } else {
            show_error('The DataPendidikan you are trying to delete does not exist.');
        }

    }
}
