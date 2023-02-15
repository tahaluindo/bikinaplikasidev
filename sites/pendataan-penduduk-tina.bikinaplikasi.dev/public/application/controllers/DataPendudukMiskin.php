<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendudukMiskin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('datapendudukmiskin_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Penduduk Miskin";
        $data['DataPendudukMiskin'] = $this->datapendudukmiskin_model->get_all_DataPendudukMiskin();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapendudukmiskin/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Penduduk Miskin";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if ($this->form_validation->run()) {

            $cek_DataPendudukMiskin = $this->db->get_where('pendudukmiskin', array('nik' => $this->input->post('nik')));
            $cek_DataPenduduk = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')));
            
            if($cek_DataPenduduk->num_rows() == 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Nik Tidak Ditemukan.
							</div>'
                );

                redirect('DataPendudukMiskin/add');
            }

            if ($cek_DataPendudukMiskin->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Data Penduduk Miskin sudah ada.
							</div>'
                );
                redirect('DataPendudukMiskin/add');
            }

            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('sktm')) {
                $params = array(
                    'nik' => $this->input->post('nik'),
                );
            } else {
                $upload_data = $this->upload->data();
                $sktm        = $upload_data['file_name'];

                $params = array(
                    'nik' => $this->input->post('nik'),
                    'sktm' => $sktm,
                );
            }

            $DataPendudukMiskin_id = $this->datapendudukmiskin_model->add_DataPendudukMiskin($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukMiskin/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapendudukmiskin/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukMiskin exists before trying to edit it
        $data['DataPendudukMiskin'] = $this->datapendudukmiskin_model->get_DataPendudukMiskin($id);
        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if (isset($data['DataPendudukMiskin']['nik'])) {
            $data['title'] = "Data Penduduk Miskin";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
    

            if ($this->form_validation->run()) {
                $cek_DataPendudukMiskin = $this->db->get_where('pendudukmiskin', array('nik' => $this->input->post('nik'), 'nik!=' => $id));
                $cek_DataPenduduk = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')));
            
                if($cek_DataPenduduk->num_rows() == 0) {
                    $this->session->set_flashdata('msg',
                        '
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Gagal!</strong> Nik Tidak Ditemukan.
                            </div>'
                    );

                    redirect("DataPendudukMiskin/edit/$id");
                }

                if ($cek_DataPendudukMiskin->num_rows() > 0 && $cek_DataPendudukMiskin[0]['nik'] != $this->input->post('nik')) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nik sudah ada.
						</div>'
                    );
                    redirect('DataPendudukMiskin/edit/' . $id);
                }


            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

                if (!$this->upload->do_upload('sktm')) {
                    $params = array(
                        'nik' => $this->input->post('nik'),
                    );
                } else {
                    $upload_data = $this->upload->data();
                    $sktm        = $upload_data['file_name'];

                    $params = array(
                        'nik' => $this->input->post('nik'),
                        'sktm' => $sktm,
                    );
                }

                $this->datapendudukmiskin_model->update_DataPendudukMiskin($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukMiskin/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapendudukmiskin/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukMiskin you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukMiskin = $this->datapendudukmiskin_model->get_DataPendudukMiskin($id);

        // check if the DataPendudukMiskin exists before trying to delete it
        if (isset($DataPendudukMiskin['id'])) {

            $this->datapendudukmiskin_model->delete_DataPendudukMiskin($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukMiskin/index');
        } else {
            show_error('The DataPendudukMiskin you are trying to delete does not exist.');
        }

    }
}
