<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendudukPindah extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapendudukpindah_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data Penduduk Pindah";
        $data['DataPendudukPindah'] = $this->Datapendudukpindah_model->get_all_DataPendudukPindah();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapendudukpindah/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data penduduk tetap";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('alasan_pindah', 'alasan_pindah', 'required');
        $this->form_validation->set_rules('alamat_tujuan_pindah', 'Alamat Tujuan Pindah', 'required');
        $this->form_validation->set_rules('rt_tujuan_pindah', 'Rt Tujuan Pindah', 'required');
        $this->form_validation->set_rules('rw_tujuan_pindah', 'Rw Tujuan Pindah', 'required');
        $this->form_validation->set_rules('desa_tujuan_pindah', 'Desa Tujuan Pindah', 'required');
        $this->form_validation->set_rules('kode_pos_tujuan_pindah', 'Kode Pos Tujuan Pindah', 'required');
        $this->form_validation->set_rules('no_telepon_tujuan_pindah', 'No Telepon Tujuan Pindah', 'required');
        $this->form_validation->set_rules('kecamatan_tujuan_pindah', 'Kecamatan Tujuan Pindah', 'required');
        $this->form_validation->set_rules('kabupaten_tujuan_pindah', 'Kabupaten Tujuan Pindah', 'required');
        $this->form_validation->set_rules('provinsi_tujuan_pindah', 'Provinsi Tujuan Pindah', 'required');

        if ($this->form_validation->run()) {

            $cek_DataPendudukPindah = $this->db->get_where('datapendudukpindah', array('nik' => $this->input->post('nik')));
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

                redirect('DataPendudukPindah/add');
            }

            if ($cek_DataPendudukPindah->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Data penduduk tetap sudah ada.
							</div>'
                );
                redirect('DataPendudukPindah/add');
            }

            $params = array(
                'nik' => $this->input->post('nik'),
                'alasan_pindah' => $this->input->post('alasan_pindah'),
                'alamat_tujuan_pindah'               => $this->input->post('alamat_tujuan_pindah'),
                    'rt_tujuan_pindah'               => $this->input->post('rt_tujuan_pindah'),
                    'rw_tujuan_pindah'               => $this->input->post('rw_tujuan_pindah'),
                    'desa_tujuan_pindah'               => $this->input->post('desa_tujuan_pindah'),
                    'kode_pos_tujuan_pindah'               => $this->input->post('kode_pos_tujuan_pindah'),
                    'no_telepon_tujuan_pindah'               => $this->input->post('no_telepon_tujuan_pindah'),
                    'kecamatan_tujuan_pindah'               => $this->input->post('kecamatan_tujuan_pindah'),
                    'kabupaten_tujuan_pindah'               => $this->input->post('kabupaten_tujuan_pindah'),
                    'provinsi_tujuan_pindah'               => $this->input->post('provinsi_tujuan_pindah'),
            );

            $DataPendudukPindah_id = $this->Datapendudukpindah_model->add_DataPendudukPindah($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukPindah/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapendudukpindah/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukPindah exists before trying to edit it
        $data['DataPendudukPindah'] = $this->Datapendudukpindah_model->get_DataPendudukPindah($id);

        if (isset($data['DataPendudukPindah']['nik'])) {
            $data['title'] = "Data penduduk tetap";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
            $this->form_validation->set_rules('alasan_pindah', 'Alasan Pindah', 'required');
            $this->form_validation->set_rules('alamat_tujuan_pindah', 'Alamat Tujuan Pindah', 'required');
            $this->form_validation->set_rules('rt_tujuan_pindah', 'Rt Tujuan Pindah', 'required');
            $this->form_validation->set_rules('rw_tujuan_pindah', 'Rw Tujuan Pindah', 'required');
            $this->form_validation->set_rules('desa_tujuan_pindah', 'Desa Tujuan Pindah', 'required');
            $this->form_validation->set_rules('kode_pos_tujuan_pindah', 'Kode Pos Tujuan Pindah', 'required');
            $this->form_validation->set_rules('no_telepon_tujuan_pindah', 'No Telepon Tujuan Pindah', 'required');
            $this->form_validation->set_rules('kecamatan_tujuan_pindah', 'Kecamatan Tujuan Pindah', 'required');
            $this->form_validation->set_rules('kabupaten_tujuan_pindah', 'Kabupaten Tujuan Pindah', 'required');
            $this->form_validation->set_rules('provinsi_tujuan_pindah', 'Provinsi Tujuan Pindah', 'required');
            
            if ($this->form_validation->run()) {
                $cek_DataPendudukPindah = $this->db->get_where('datapendudukpindah', array('id' => $this->input->post('id'), 'id!=' => $id));
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

                    redirect("DataPendudukPindah/edit/$id");
                }

                if ($cek_DataPendudukPindah->num_rows() > 0 && $cek_DataPendudukPindah[0]['nik'] != $this->input->post('nik')) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nik sudah ada.
						</div>'
                    );
                    redirect('DataPendudukPindah/edit/' . $id);
                }

                $params = array(
                    'nik'               => $this->input->post('nik'),
                    'alasan_pindah'               => $this->input->post('alasan_pindah'),
                    'alamat_tujuan_pindah'               => $this->input->post('alamat_tujuan_pindah'),
                    'rt_tujuan_pindah'               => $this->input->post('rt_tujuan_pindah'),
                    'rw_tujuan_pindah'               => $this->input->post('rw_tujuan_pindah'),
                    'desa_tujuan_pindah'               => $this->input->post('desa_tujuan_pindah'),
                    'kode_pos_tujuan_pindah'               => $this->input->post('kode_pos_tujuan_pindah'),
                    'no_telepon_tujuan_pindah'               => $this->input->post('no_telepon_tujuan_pindah'),
                    'kecamatan_tujuan_pindah'               => $this->input->post('kecamatan_tujuan_pindah'),
                    'kabupaten_tujuan_pindah'               => $this->input->post('kabupaten_tujuan_pindah'),
                    'provinsi_tujuan_pindah'               => $this->input->post('provinsi_tujuan_pindah'),
                );

                $this->Datapendudukpindah_model->update_DataPendudukPindah($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukPindah/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapendudukpindah/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukPindah you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukPindah = $this->Datapendudukpindah_model->get_DataPendudukPindah($id);

        // check if the DataPendudukPindah exists before trying to delete it
        if (isset($DataPendudukPindah['nik'])) {

            $this->Datapendudukpindah_model->delete_DataPendudukPindah($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukPindah/index');
        } else {
            show_error('The DataPendudukPindah you are trying to delete does not exist.');
        }

    }
}
