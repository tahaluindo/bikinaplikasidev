<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataBerita extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('DataBerita_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']      = "Data Berita";
        $data['DataBerita'] = $this->DataBerita_model->get_all_DataBerita();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('databerita/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Berita";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

        if ($this->form_validation->run()) {

            $cek_DataBerita = $this->db->get_where('berita', array('judul' => $this->input->post('judul')));

            if ($cek_DataBerita->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Judul sudah ada.
							</div>'
                );
                redirect('DataBerita/add');
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
                'judul' => $this->input->post('judul'),
                'keterangan' => $this->input->post('keterangan'),
            );

            $DataBerita_id = $this->DataBerita_model->add_DataBerita($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataBerita/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('databerita/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataBerita exists before trying to edit it
        $data['DataBerita'] = $this->DataBerita_model->get_DataBerita($id);

        if (isset($data['DataBerita']['id'])) {
            $data['title'] = "Data Berita";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('judul', 'judul', 'required');
            $this->form_validation->set_rules('keterangan', 'keterangan', 'required');

            if ($this->form_validation->run()) {
                $cek_DataBerita = $this->db->get_where('berita', array('id' => $this->input->post('id'), 'id!=' => $id));

                if ($cek_DataBerita->num_rows() != 0) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Judul sudah ada.
						</div>'
                    );
                    redirect('DataBerita/edit/' . $id);
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
                    'judul' => $this->input->post('judul'),
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->DataBerita_model->update_DataBerita($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataBerita/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('databerita/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataBerita you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataBerita = $this->DataBerita_model->get_DataBerita($id);

        // check if the DataBerita exists before trying to delete it
        if (isset($DataBerita['id'])) {

            $this->DataBerita_model->delete_DataBerita($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataBerita/index');
        } else {
            show_error('The DataBerita you are trying to delete does not exist.');
        }

    }
}
