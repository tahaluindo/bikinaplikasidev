<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataProfileDesa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataProfileDesa_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']           = "Data Profile Desa";
        $data['DataProfileDesa'] = $this->DataProfileDesa_model->get_all_DataProfileDesa();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('dataprofiledesa/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Profile Desa";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataProfileDesa = $this->db->get_where('dataprofiledesa', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataProfileDesa->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataProfileDesa/add');
            }

            $params = array(
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataProfileDesa_id = $this->DataProfileDesa_model->add_DataProfileDesa($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataProfileDesa/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('dataprofiledesa/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataProfileDesa exists before trying to edit it
        $data['DataProfileDesa'] = $this->DataProfileDesa_model->get_DataProfileDesa($id);

        if (isset($data['DataProfileDesa']['id'])) {
            $data['title'] = "Data Profile Desa";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('sejarah', 'Keterangan', 'required');
            $this->form_validation->set_rules('visi', 'Visi', 'required');
            $this->form_validation->set_rules('misi', 'Misi', 'required');
            $this->form_validation->set_rules('struktur_desa', 'Struktur Desa', '');

            if ($this->form_validation->run()) {
                $cek_DataProfileDesa = $this->db->get_where('dataprofiledesa', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataProfileDesa->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Agama sudah ada.
						</div>'
                    );
                    redirect('DataProfileDesa/edit/' . $id);
                }

                $config['upload_path']   = './assets/uploads';
                $config['allowed_types'] = 'jpg|png|jpeg';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('struktur_desa')) {
                    $struktur_desa = '';
                } else {
                    $upload_data = $this->upload->data();
                    // print_r($upload_data); die();
                    $struktur_desa = $upload_data['file_name'];
                }

                $params = array(
                    'sejarah'       => $this->input->post('sejarah'),
                    'visi'          => $this->input->post('visi'),
                    'misi'          => $this->input->post('misi'),
                    'struktur_desa' => $struktur_desa,
                );

                $this->DataProfileDesa_model->update_DataProfileDesa($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );

                redirect('DataProfileDesa/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('dataprofiledesa/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataProfileDesa you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataProfileDesa = $this->DataProfileDesa_model->get_DataProfileDesa($id);

        // check if the DataProfileDesa exists before trying to delete it
        if (isset($DataProfileDesa['id'])) {

            $this->DataProfileDesa_model->delete_DataProfileDesa($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataProfileDesa/index');
        } else {
            show_error('The DataProfileDesa you are trying to delete does not exist.');
        }

    }
}
