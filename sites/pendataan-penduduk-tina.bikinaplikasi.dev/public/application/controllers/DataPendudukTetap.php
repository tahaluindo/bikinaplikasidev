<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendudukTetap extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapenduduktetap_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Penduduk Tetap";
        $data['DataPendudukTetap'] = $this->Datapenduduktetap_model->get_all_DataPendudukTetap();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapenduduktetap/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data penduduk tetap";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if ($this->form_validation->run()) {

            $cek_DataPendudukTetap = $this->db->get_where('penduduktetap', array('nik' => $this->input->post('nik')));
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

                redirect('DataPendudukTetap/add');
            }

            if ($cek_DataPendudukTetap->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Data penduduk tetap sudah ada.
							</div>'
                );
                redirect('DataPendudukTetap/add');
            }

            $params = array(
                'nik' => $this->input->post('nik'),
            );

            $DataPendudukTetap_id = $this->Datapenduduktetap_model->add_DataPendudukTetap($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukTetap/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapenduduktetap/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukTetap exists before trying to edit it
        $data['DataPendudukTetap'] = $this->Datapenduduktetap_model->get_DataPendudukTetap($id);
        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if (isset($data['DataPendudukTetap']['nik'])) {
            $data['title'] = "Data penduduk tetap";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'Nik', 'required');

            if ($this->form_validation->run()) {
                $cek_DataPendudukTetap = $this->db->get_where('penduduktetap', array('id' => $this->input->post('id'), 'id!=' => $id));
                $cek_DataPenduduk = $this->db->get_where('pekerjaan', array('nik' => $this->input->post('nik')));
            
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

                    redirect("DataPendudukTetap/edit/$id");
                }

                if ($cek_DataPendudukTetap->num_rows() > 0 && $cek_DataPendudukTetap[0]['nik'] != $this->input->post('nik')) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nik sudah ada.
						</div>'
                    );
                    redirect('DataPendudukTetap/edit/' . $id);
                }

                $params = array(
                    'nik'               => $this->input->post('nik')
                );

                $this->Datapenduduktetap_model->update_DataPendudukTetap($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukTetap/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapenduduktetap/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukTetap you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukTetap = $this->Datapenduduktetap_model->get_DataPendudukTetap($id);

        // check if the DataPendudukTetap exists before trying to delete it
        if (isset($DataPendudukTetap['id'])) {

            $this->Datapenduduktetap_model->delete_DataPendudukTetap($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukTetap/index');
        } else {
            show_error('The DataPendudukTetap you are trying to delete does not exist.');
        }

    }
}
