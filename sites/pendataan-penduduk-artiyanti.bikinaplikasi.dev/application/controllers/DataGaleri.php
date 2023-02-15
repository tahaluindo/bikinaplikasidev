<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataGaleri extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataGaleri_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']      = "Data Galeri";
        $data['DataGaleri'] = $this->DataGaleri_model->get_all_DataGaleri();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datagaleri/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Galeri";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataGaleri = $this->db->get_where('datagaleri', array('keterangan' => $this->input->post('keterangan')));
            if ($cek_DataGaleri->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Keterangan sudah ada.
							</div>'
                );
                redirect('DataGaleri/add');
            }

            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'jpg|png|jpeg';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $foto = '';
            } else {
                $upload_data = $this->upload->data();
                // print_r($upload_data); die();
                $foto        = $upload_data['file_name'];
            }

            $params = array(
                'foto'       => $foto,
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataGaleri_id = $this->DataGaleri_model->add_DataGaleri($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataGaleri/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datagaleri/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataGaleri exists before trying to edit it
        $data['DataGaleri'] = $this->DataGaleri_model->get_DataGaleri($id);

        if (isset($data['DataGaleri']['id'])) {
            $data['title'] = "Data Galeri";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataGaleri = $this->db->get_where('datagaleri', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataGaleri->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Agama sudah ada.
						</div>'
                    );
                    redirect('DataGaleri/edit/' . $id);
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
                    'foto'       => $foto,
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->DataGaleri_model->update_DataGaleri($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataGaleri/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datagaleri/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataGaleri you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataGaleri = $this->DataGaleri_model->get_DataGaleri($id);

        // check if the DataGaleri exists before trying to delete it
        if (isset($DataGaleri['id'])) {

            $this->DataGaleri_model->delete_DataGaleri($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataGaleri/index');
        } else {
            show_error('The DataGaleri you are trying to delete does not exist.');
        }

    }
}
