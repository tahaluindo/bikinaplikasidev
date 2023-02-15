<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendudukMeninggal extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('datapendudukmeninggal_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Penduduk Meninggal";
        $data['DataPendudukMeninggal'] = $this->datapendudukmeninggal_model->get_all_DataPendudukMeninggal();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapendudukmeninggal/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data Penduduk Meninggal";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('tanggal_meninggal', 'tanggal_meninggal', 'required');
        $this->form_validation->set_rules('tempat_meninggal', 'tempat_meninggal', 'required');
        $this->form_validation->set_rules('penyebab_meninggal', 'penyebab_meninggal', 'required');
        // $this->form_validation->set_rules('hari_meninggal_dunia', 'hari_meninggal_dunia', 'required');
        $this->form_validation->set_rules('jam_meninggal_dunia', 'jam_meninggal_dunia', 'required');

        if ($this->form_validation->run()) {

            $cek_DataPendudukMeninggal = $this->db->get_where('datapendudukmeninggal', array('nik' => $this->input->post('nik')));
            $cek_DataPenduduk = $this->db->get_where('datapenduduk', array('nik' => $this->input->post('nik')));
            
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

                redirect('DataPendudukMeninggal/add');
            }

            if ($cek_DataPendudukMeninggal->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Data Penduduk Meninggal sudah ada.
							</div>'
                );
                redirect('DataPendudukMeninggal/add');
            }

            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('surat_keterangan_meninggal')) {
                $params = array(
                    'nik' => $this->input->post('nik'),
                    'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
                    'tempat_meninggal' => $this->input->post('tempat_meninggal'),
                    'penyebab_meninggal' => $this->input->post('penyebab_meninggal'),
                    // 'surat_keterangan_meninggal' => $this->input->post('hari_meninggal_dunia'),
                    'jam_meninggal_dunia' => $this->input->post('jam_meninggal_dunia'),
                );
            } else {
                $upload_data = $this->upload->data();
                $surat_keterangan_meninggal        = $upload_data['file_name'];

                $params = array(
                    'nik' => $this->input->post('nik'),
                    'tanggal_meninggal' => $this->input->post('tanggal_meninggal'),
                    'tempat_meninggal' => $this->input->post('tempat_meninggal'),
                    'penyebab_meninggal' => $this->input->post('penyebab_meninggal'),
                    'surat_keterangan_meninggal' => $surat_keterangan_meninggal,
                    'jam_meninggal_dunia' => $this->input->post('jam_meninggal_dunia'),
                );
            }

            $DataPendudukMeninggal_id = $this->datapendudukmeninggal_model->add_DataPendudukMeninggal($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukMeninggal/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapendudukmeninggal/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukMeninggal exists before trying to edit it
        $data['DataPendudukMeninggal'] = $this->datapendudukmeninggal_model->get_DataPendudukMeninggal($id);

        if (isset($data['DataPendudukMeninggal']['nik'])) {
            $data['title'] = "Data Penduduk Meninggal";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
            $this->form_validation->set_rules('tanggal_meninggal', 'tanggal_meninggal', 'required');
            $this->form_validation->set_rules('tempat_meninggal', 'tempat_meninggal', 'required');
            $this->form_validation->set_rules('penyebab_meninggal', 'penyebab_meninggal', 'required');
            // $this->form_validation->set_rules('hari_meninggal_dunia', 'hari_meninggal_dunia', 'required');
            $this->form_validation->set_rules('jam_meninggal_dunia', 'jam_meninggal_dunia', 'required');
    

            if ($this->form_validation->run()) {
                $cek_DataPendudukMeninggal = $this->db->get_where('datapendudukmeninggal', array('nik' => $this->input->post('nik'), 'nik!=' => $id));
                $cek_DataPenduduk = $this->db->get_where('datapenduduk', array('nik' => $this->input->post('nik')));
            
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

                    redirect("DataPendudukMeninggal/edit/$id");
                }

                if ($cek_DataPendudukMeninggal->num_rows() > 0 && $cek_DataPendudukMeninggal[0]['nik'] != $this->input->post('nik')) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nik sudah ada.
						</div>'
                    );
                    redirect('DataPendudukMeninggal/edit/' . $id);
                }

                $params = array(
                    'nik'               => $this->input->post('nik'),
                    'tanggal_meninggal'               => $this->input->post('tanggal_meninggal'),
                    'tempat_meninggal'               => $this->input->post('tempat_meninggal'),
                    'penyebab_meninggal'               => $this->input->post('penyebab_meninggal'),
                    // 'hari_meninggal_dunia' => $this->input->post('hari_meninggal_dunia'),
                'jam_meninggal_dunia' => $this->input->post('jam_meninggal_dunia'),
                );

                $this->datapendudukmeninggal_model->update_DataPendudukMeninggal($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukMeninggal/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapendudukmeninggal/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukMeninggal you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukMeninggal = $this->datapendudukmeninggal_model->get_DataPendudukMeninggal($id);

        // check if the DataPendudukMeninggal exists before trying to delete it
        if (isset($DataPendudukMeninggal['id'])) {

            $this->datapendudukmeninggal_model->delete_DataPendudukMeninggal($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukMeninggal/index');
        } else {
            show_error('The DataPendudukMeninggal you are trying to delete does not exist.');
        }

    }
}
