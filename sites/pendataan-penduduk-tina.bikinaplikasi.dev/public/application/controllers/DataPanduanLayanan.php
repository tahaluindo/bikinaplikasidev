<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPanduanLayanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataPanduanLayanan_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']      = "Data Panduan Layanan";
        $data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_all_DataPanduanLayanan();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapanduanlayanan/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Panduan Layanan";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataPanduanLayanan = $this->db->get_where('panduanlayanan', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataPanduanLayanan->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataPanduanLayanan/add');
            }

            $params = array(
                'judul'       => $this->input->post('judul'),
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataPanduanLayanan_id = $this->DataPanduanLayanan_model->add_DataPanduanLayanan($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataPanduanLayanan/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapanduanlayanan/add');
            $this->load->view('layout/footer');
        }
    }

    public function edit($id)
    {
        // check if the DataPanduanLayanan exists before trying to edit it
        $data['DataPanduanLayanan'] = $this->DataPanduanLayanan_model->get_DataPanduanLayanan($id);

        if (isset($data['DataPanduanLayanan']['id'])) {
            $data['title'] = "Data Panduan Layanan";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'judul', 'required');
            $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataPanduanLayanan = $this->db->get_where('panduanlayanan', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataPanduanLayanan->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Agama sudah ada.
						</div>'
                    );
                    redirect('DataPanduanLayanan/edit/' . $id);
                }

                $config['upload_path']   = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('foto')) {
                    
                } else {
                    $upload_data = $this->upload->data();
                    $foto        = $upload_data['file_name'];
                }

                $params = array(
                    'judul'       => $this->input->post('judul'),
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->DataPanduanLayanan_model->update_DataPanduanLayanan($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataPanduanLayanan/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapanduanlayanan/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPanduanLayanan you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPanduanLayanan = $this->DataPanduanLayanan_model->get_DataPanduanLayanan($id);

        // check if the DataPanduanLayanan exists before trying to delete it
        if (isset($DataPanduanLayanan['id'])) {

            $this->DataPanduanLayanan_model->delete_DataPanduanLayanan($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPanduanLayanan/index');
        } else {
            show_error('The DataPanduanLayanan you are trying to delete does not exist.');
        }

    }
}
