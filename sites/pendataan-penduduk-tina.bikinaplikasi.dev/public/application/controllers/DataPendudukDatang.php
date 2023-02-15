<?php
defined('BASEPATH') or exit('No direct script access allowed');

class datapendudukdatang extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datapendudukdatang_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']              = "Data Penduduk Datang";
        $data['DataPendudukDatang'] = $this->Datapendudukdatang_model->get_all_DataPendudukDatang();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapendudukdatang/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data penduduk datang";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'nik', 'required');
        $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
        $this->form_validation->set_rules('desa_asal', 'desa_asal', 'required');
        $this->form_validation->set_rules('kecamatan_asal', 'kecamatan_asal', 'required');
        $this->form_validation->set_rules('alamat_asal', 'alamat_asal', 'required');
        $this->form_validation->set_rules('alasan', 'alasan', 'required');
        $this->form_validation->set_rules('rt_asal', 'rt_asal', 'required');
        $this->form_validation->set_rules('rw_asal', 'rw_asal', 'required');
        $this->form_validation->set_rules('kode_pos_asal', 'kode_pos_asal', 'required');
        $this->form_validation->set_rules('no_telepon_asal', 'no telepon asal', 'required');
        $this->form_validation->set_rules('kabupaten_asal', 'kabupaten_asal', 'required');
        $this->form_validation->set_rules('provinsi_asal', 'provinsi_asal', 'required');
        $this->form_validation->set_rules('dusun', 'dusun', 'required');
        $this->form_validation->set_rules('rt', 'rt', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');

        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if ($this->form_validation->run()) {
            $cek_DataPendudukDatang = $this->db->get_where('pendudukdatang', array('nik' => $this->input->post('nik')));
            $cek_DataPenduduk       = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')));

            if ($cek_DataPenduduk->num_rows() == 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Nik Tidak Ditemukan.
							</div>'
                );

                redirect('DataPendudukDatang/add');
            }

            if ($cek_DataPendudukDatang->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> Data penduduk datang sudah ada.
							</div>'
                );
                redirect('DataPendudukDatang/add');
            }

            $params = array(
                'nik'             => $this->input->post('nik'),
                'tanggal'         => $this->input->post('tanggal'),
                'desa_asal'       => $this->input->post('desa_asal'),
                'kecamatan_asal'  => $this->input->post('kecamatan_asal'),
                'alamat_asal'     => $this->input->post('alamat_asal'),
                'alasan'          => $this->input->post('alasan'),
                'rt_asal'         => $this->input->post('rt_asal'),
                'rw_asal'         => $this->input->post('rw_asal'),
                'kode_pos_asal'   => $this->input->post('kode_pos_asal'),
                'no_telepon_asal' => $this->input->post('no_telepon_asal'),
                'kecamatan_asal'  => $this->input->post('kecamatan_asal'),
                'kabupaten_asal'  => $this->input->post('kabupaten_asal'),
                'provinsi_asal'   => $this->input->post('provinsi_asal'),
                'dusun'           => $this->input->post('dusun'),
                'rt'              => $this->input->post('rt'),
                'jenis_kelamin'   => $this->input->post('jenis_kelamin'),
            );

            $DataPendudukDatang_id = $this->Datapendudukdatang_model->add_DataPendudukDatang($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukDatang/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapendudukdatang/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukDatang exists before trying to edit it
        $data['DataPendudukDatang'] = $this->Datapendudukdatang_model->get_DataPendudukDatang($id);

        $data['data_penduduk'] = $this->db->get('penduduk')->result();

        if (isset($data['DataPendudukDatang']['nik'])) {
            $data['title'] = "Data penduduk datang";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nik', 'Nik', 'required');
            $this->form_validation->set_rules('tanggal', 'tanggal', 'required');
            $this->form_validation->set_rules('desa_asal', 'desa_asal', 'required');
            $this->form_validation->set_rules('kecamatan_asal', 'kecamatan_asal', 'required');
            $this->form_validation->set_rules('alamat_asal', 'alamat_asal', 'required');
            $this->form_validation->set_rules('alasan', 'alasan', 'required');
            $this->form_validation->set_rules('rt_asal', 'rt_asal', 'required');
            $this->form_validation->set_rules('rw_asal', 'rw_asal', 'required');
            $this->form_validation->set_rules('kode_pos_asal', 'kode_pos_asal', 'required');
            $this->form_validation->set_rules('no_telepon_asal', 'kode_pos_asal', 'required');
            $this->form_validation->set_rules('kecamatan_asal', 'kecamatan_asal', 'required');
            $this->form_validation->set_rules('kabupaten_asal', 'kabupaten_asal', 'required');
            $this->form_validation->set_rules('provinsi_asal', 'provinsi_asal', 'required');
            $this->form_validation->set_rules('dusun', 'dusun', 'required');
            $this->form_validation->set_rules('rt', 'rt', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'jenis_kelamin', 'required');

            if ($this->form_validation->run()) {
                $cek_DataPendudukDatang = $this->db->get_where('pendudukdatang', array('nik' => $this->input->post('nik')));
                $cek_DataPenduduk       = $this->db->get_where('penduduk', array('nik' => $this->input->post('nik')));

                if ($cek_DataPenduduk->num_rows() == 0) {
                    $this->session->set_flashdata('msg',
                        '
                            <div class="alert alert-warning alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Gagal!</strong> Nik Tidak Ditemukan.
                            </div>'
                    );

                    redirect("DataPendudukDatang/edit/$id");
                }

                if ($cek_DataPendudukDatang->num_rows() > 1 && $cek_DataPendudukDatang->result_array()[0]->nik != $this->input->post('nik')) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> Nik sudah ada.
						</div>'
                    );
                    redirect('DataPendudukDatang/edit/' . $id);
                }

                $params = array(
                    'nik'             => $this->input->post('nik'),
                    'tanggal'         => $this->input->post('tanggal'),
                    'desa_asal'       => $this->input->post('desa_asal'),
                    'kecamatan_asal'  => $this->input->post('kecamatan_asal'),
                    'alamat_asal'     => $this->input->post('alamat_asal'),
                    'alasan'          => $this->input->post('alasan'),
                    'rt_asal'         => $this->input->post('rt_asal'),
                    'rw_asal'         => $this->input->post('rw_asal'),
                    'kode_pos_asal'   => $this->input->post('kode_pos_asal'),
                    'no_telepon_asal' => $this->input->post('no_telepon_asal'),
                    'kecamatan_asal'  => $this->input->post('kecamatan_asal'),
                    'kabupaten_asal'  => $this->input->post('kabupaten_asal'),
                    'provinsi_asal'   => $this->input->post('provinsi_asal'),
                    'dusun'           => $this->input->post('dusun'),
                    'rt'              => $this->input->post('rt'),
                    'jenis_kelamin'   => $this->input->post('jenis_kelamin'),
                );

                $this->Datapendudukdatang_model->update_DataPendudukDatang($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukDatang/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapendudukdatang/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukDatang you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukDatang = $this->Datapendudukdatang_model->get_DataPendudukDatang($id);

        // check if the DataPendudukDatang exists before trying to delete it
        if (isset($DataPendudukDatang['nik'])) {

            $this->Datapendudukdatang_model->delete_DataPendudukDatang($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukDatang/index');
        } else {
            show_error('The DataPendudukDatang you are trying to delete does not exist.');
        }

    }
}
