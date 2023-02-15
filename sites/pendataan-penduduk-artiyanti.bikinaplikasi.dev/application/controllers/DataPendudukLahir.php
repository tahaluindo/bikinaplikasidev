<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataPendudukLahir extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('datapenduduklahir_model');
        $this->load->model('Datapenduduk_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    {
        $data['title']             = "Data Penduduk Lahir";
        $data['DataPendudukLahir'] = $this->datapenduduklahir_model->get_all_DataPendudukLahir();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datapenduduklahir/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data penduduk tetap";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('nama_saksi', 'Nama Saksi', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('hari_kelahiran', 'Hari Kelahiran', 'required');
        $this->form_validation->set_rules('tanggal_kelahiran', 'Tanggal Kelahiran', 'required');
        $this->form_validation->set_rules('jam_kelahiran', 'Jam Kelahiran', 'required');
        $this->form_validation->set_rules('jenis_kelahiran', 'Jenis Kelahiran', 'required');
        $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required');
        $this->form_validation->set_rules('berat_bayi', 'Berat Bayi', 'required');
        $this->form_validation->set_rules('panjang_bayi', 'Panjang Bayi', 'required');
        $this->form_validation->set_rules('tempat_kelahiran', 'Tempat Kelahiran', 'required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');
        $this->form_validation->set_rules('rt', 'Rt', 'required');

        if ($this->form_validation->run()) {

            $cek_no_kk = $this->db->where('no_kk', $this->input->post('no_kk'))->get('datapenduduk')->row()->no_kk;

            if (!$cek_no_kk) {
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-danger alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Gagal!</strong> No KK Tidak Ditemukan.
                        </div>'
                );

                redirect('DataPendudukLahir/add');
            }

            // $cek_DataPendudukLahir = $this->db->get_where('DataPendudukLahir', array('nik' => $this->input->post('nik')));
            // $cek_DataPenduduk      = $this->db->get_where('DataPenduduk', array('nik' => $this->input->post('nik')));

            // if ($cek_DataPenduduk->num_rows() == 0) {
            //     $this->session->set_flashdata('msg',
            //         '
            //                 <div class="alert alert-warning alert-dismissible" role="alert">
            //                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                          <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            //                      </button>
            //                      <strong>Gagal!</strong> Nik Tidak Ditemukan.
            //                 </div>'
            //     );

            //     redirect('DataPendudukLahir/add');
            // }

            // if ($cek_DataPendudukLahir->num_rows() > 0) {
            //     $this->session->set_flashdata('msg',
            //         '
            //                 <div class="alert alert-warning alert-dismissible" role="alert">
            //                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //                          <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
            //                      </button>
            //                      <strong>Gagal!</strong> Data penduduk tetap sudah ada.
            //                 </div>'
            //     );
            //     redirect('DataPendudukLahir/add');
            // }

            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'doc|docx|pdf';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);
            $this->upload->do_upload('surat_keterangan_lahir');

            $params = array(
                'no_kk'                  => $this->input->post('no_kk'),
                'nama_lengkap'           => $this->input->post('nama_lengkap'),
                'nama_ibu'               => $this->input->post('nama_ibu'),
                'nama_ayah'              => $this->input->post('nama_ayah'),
                'nama_saksi'             => $this->input->post('nama_saksi'),
                'jenis_kelamin'          => $this->input->post('jenis_kelamin'),
                'hari_kelahiran'         => $this->input->post('hari_kelahiran'),
                'tanggal_kelahiran'      => $this->input->post('tanggal_kelahiran'),
                'jam_kelahiran'          => $this->input->post('jam_kelahiran'),
                'jenis_kelahiran'        => $this->input->post('jenis_kelahiran'),
                'anak_ke'                => $this->input->post('anak_ke'),
                'berat_bayi'             => $this->input->post('berat_bayi'),
                'panjang_bayi'           => $this->input->post('panjang_bayi'),
                'tempat_kelahiran'       => $this->input->post('tempat_kelahiran'),
                'dusun'                  => $this->input->post('dusun'),
                'rt'                     => $this->input->post('rt'),
                'surat_keterangan_lahir' => $this->upload->data()['file_name'],
            );

            $DataPendudukLahir_id = $this->datapenduduklahir_model->add_DataPendudukLahir($params);

            $this->session->set_flashdata('msg',
                '
                    <div class="alert alert-success alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Sukses!</strong> Berhasil disimpan.
                    </div>'
            );

            redirect('DataPendudukLahir/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapenduduklahir/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataPendudukLahir exists before trying to edit it
        $data['DataPendudukLahir'] = $this->datapenduduklahir_model->get_DataPendudukLahir($id);

        if (isset($data['DataPendudukLahir']['id'])) {
            $data['title'] = "Data penduduk tetap";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
            $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
            $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
            $this->form_validation->set_rules('nama_saksi', 'Nama Saksi', 'required');
            $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
            $this->form_validation->set_rules('hari_kelahiran', 'Hari Kelahiran', 'required');
            $this->form_validation->set_rules('tanggal_kelahiran', 'Tanggal Kelahiran', 'required');
            $this->form_validation->set_rules('jam_kelahiran', 'Jam Kelahiran', 'required');
            $this->form_validation->set_rules('jenis_kelahiran', 'Jenis Kelahiran', 'required');
            $this->form_validation->set_rules('anak_ke', 'Anak ke', 'required');
            $this->form_validation->set_rules('berat_bayi', 'Berat Bayi', 'required');
            $this->form_validation->set_rules('panjang_bayi', 'Panjang Bayi', 'required');
            $this->form_validation->set_rules('tempat_kelahiran', 'Tempat Kelahiran', 'required');
            $this->form_validation->set_rules('dusun', 'Dusun', 'required');
            $this->form_validation->set_rules('rt', 'Rt', 'required');

            if ($this->form_validation->run()) {
                $cek_no_kk = $this->db->where('no_kk', $this->input->post('no_kk'))->get('datapenduduk')->row()->no_kk;

                if (!$cek_no_kk) {
                    $this->session->set_flashdata('msg',
                        '
                            <div class="alert alert-danger alert-dismissible" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                    </button>
                                    <strong>Gagal!</strong> No KK Tidak Ditemukan.
                            </div>'
                    );

                    redirect('DataPendudukLahir/add');
                }

                $config['upload_path']   = './assets/uploads';
                $config['allowed_types'] = 'doc|docx|pdf';
                $config['max_size']      = 10000;

                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('surat_keterangan_lahir')) {
                    $params = array(
                        'no_kk'             => $this->input->post('no_kk'),
                        'nama_lengkap'      => $this->input->post('nama_lengkap'),
                        'nama_ibu'          => $this->input->post('nama_ibu'),
                        'nama_ayah'         => $this->input->post('nama_ayah'),
                        'nama_saksi'        => $this->input->post('nama_saksi'),
                        'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                        'hari_kelahiran'    => $this->input->post('hari_kelahiran'),
                        'tanggal_kelahiran' => $this->input->post('tanggal_kelahiran'),
                        'jam_kelahiran'     => $this->input->post('jam_kelahiran'),
                        'jenis_kelahiran'   => $this->input->post('jenis_kelahiran'),
                        'anak_ke'           => $this->input->post('anak_ke'),
                        'berat_bayi'        => $this->input->post('berat_bayi'),
                        'panjang_bayi'      => $this->input->post('panjang_bayi'),
                        'tempat_kelahiran'  => $this->input->post('tempat_kelahiran'),
                        'dusun'             => $this->input->post('dusun'),
                        'rt'                => $this->input->post('rt'),
                    );
                } else {
                    // die($this->upload->data()['file_name']);
                    $params = array(
                        'no_kk'                  => $this->input->post('no_kk'),
                        'nama_lengkap'           => $this->input->post('nama_lengkap'),
                        'nama_ibu'               => $this->input->post('nama_ibu'),
                        'nama_ayah'              => $this->input->post('nama_ayah'),
                        'nama_saksi'             => $this->input->post('nama_saksi'),
                        'jenis_kelamin'          => $this->input->post('jenis_kelamin'),
                        'hari_kelahiran'         => $this->input->post('hari_kelahiran'),
                        'tanggal_kelahiran'      => $this->input->post('tanggal_kelahiran'),
                        'jam_kelahiran'          => $this->input->post('jam_kelahiran'),
                        'jenis_kelahiran'        => $this->input->post('jenis_kelahiran'),
                        'anak_ke'                => $this->input->post('anak_ke'),
                        'berat_bayi'             => $this->input->post('berat_bayi'),
                        'panjang_bayi'           => $this->input->post('panjang_bayi'),
                        'tempat_kelahiran'       => $this->input->post('tempat_kelahiran'),
                        'dusun'                  => $this->input->post('dusun'),
                        'rt'                     => $this->input->post('rt'),
                        'surat_keterangan_lahir' => $this->upload->data()['file_name'],
                    );
                }

                // $cek_DataPendudukLahir = $this->db->get_where('DataPendudukLahir', array('id' => $this->input->post('id'), 'id!=' => $id));
                // $cek_DataPenduduk      = $this->db->get_where('DataPenduduk', array('nik' => $this->input->post('nik')));

                // if ($cek_DataPenduduk->num_rows() == 0) {
                //     $this->session->set_flashdata('msg',
                //         '
                //             <div class="alert alert-warning alert-dismissible" role="alert">
                //                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //                     <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                //                 </button>
                //                 <strong>Gagal!</strong> Nik Tidak Ditemukan.
                //             </div>'
                //     );

                //     redirect("DataPendudukLahir/edit/$id");
                // }

                // if ($cek_DataPendudukLahir->num_rows() > 1 && $cek_DataPendudukLahir[0]['nik'] != $this->input->post('nik')) {

                //     $this->session->set_flashdata('msg',
                //         '
                //         <div class="alert alert-warning alert-dismissible" role="alert">
                //              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                //                  <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                //              </button>
                //              <strong>Gagal!</strong> Nik sudah ada.
                //         </div>'
                //     );
                //     redirect('DataPendudukLahir/edit/' . $id);
                // }

                $this->datapenduduklahir_model->update_DataPendudukLahir($id, $params);
                $this->session->set_flashdata('msg',
                    '
                        <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                                </button>
                                <strong>Sukses!</strong> Berhasil disimpan.
                        </div>'
                );

                redirect('DataPendudukLahir/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datapenduduklahir/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataPendudukLahir you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataPendudukLahir = $this->datapenduduklahir_model->get_DataPendudukLahir($id);

        // check if the DataPendudukLahir exists before trying to delete it
        if (isset($DataPendudukLahir['id'])) {

            $this->datapenduduklahir_model->delete_DataPendudukLahir($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataPendudukLahir/index');
        } else {
            show_error('The DataPendudukLahir you are trying to delete does not exist.');
        }
    }

    public function tambahkan($id = "")
    {

        // print_r($this->input->post());die();
        $this->load->model('Dataagama_model');
        $this->load->model('Datapendidikan_model');
        $this->load->model('Datapekerjaan_model');
        $this->load->model('Datalurah_model');
        $this->load->model('Datart_model');
        $data['rt']         = $this->Datart_model->get_all_DataRt();
        $data['agama']      = $this->Dataagama_model->get_all_DataAgama();
        $data['pendidikan'] = $this->Datapendidikan_model->get_all_DataPendidikan();
        $data['pekerjaan']  = $this->Datapekerjaan_model->get_all_DataPekerjaan();
        $data['lurah']      = $this->Datalurah_model->get_all_DataLurah();

        $data['title'] = "Data Penduduk";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric');
        $this->form_validation->set_rules('no_kk', 'No KK', 'required|numeric');
        $this->form_validation->set_rules('nama_lengkap', 'Nama Lengkap', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('rt', 'RT', 'required');
        $this->form_validation->set_rules('rw', 'RW', 'required|numeric');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('no_telp', 'No Telp', 'required|numeric');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required');
        $this->form_validation->set_rules('pekerjaan', 'Pekerjaan', 'required');
        $this->form_validation->set_rules('status', 'Status Kawin', 'required');
        $this->form_validation->set_rules('hubungan_keluarga', 'Hubungan Keluarga', 'required');
        // $this->form_validation->set_rules('ket', 'Keterangan');
        $this->form_validation->set_rules('golongan_darah', 'Golongan Darah', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');

        // datapenduduk
        $data['DataPendudukLahir'] = $this->db->where('id', $id)->get('datapenduduklahir')->row_array();

        $pekerjaan = $this->input->post('pekerjaan');
        if ($this->input->post('pekerjaan') == "lain-lain") {
            $this->form_validation->set_rules('pekerjaan_lain_lain', 'Pekerjaan Lain Lain', 'required');

            $pekerjaan = $this->input->post('pekerjaan_lain_lain');
        }

        // die($pekerjaan);

        if ($this->form_validation->run()) {
            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'pdf|doc|docx|jpg|png';
            $config['max_size']      = 10000;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('scan')) {
                $file_name = '';
            } else {
                $upload_data = $this->upload->data();
                $file_name   = $upload_data['file_name'];
            }

            $cek_DataPenduduk = $this->db->get_where('datapenduduk', array('nik' => $this->input->post('nik')));
            if ($cek_DataPenduduk->num_rows() != 0) {
                $this->session->set_flashdata('msg',
                    '
							<div class="alert alert-warning alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Gagal!</strong> NIK sudah ada.
							</div>'
                );
                redirect('DataPenduduk/tambahkan');
            }

            $params = array(
                'nik'               => $this->input->post('nik'),
                'no_kk'             => $this->input->post('no_kk'),
                'nama_lengkap'      => $this->input->post('nama_lengkap'),
                'alamat'            => $this->input->post('alamat'),
                'rt'                => $this->input->post('rt'),
                'rw'                => $this->input->post('rw'),
                'jenis_kelamin'     => $this->input->post('jenis_kelamin'),
                'tempat_lahir'      => $this->input->post('tempat_lahir'),
                'tanggal_lahir'     => $this->input->post('tanggal_lahir'),
                'no_telp'           => $this->input->post('no_telp'),
                'agama'             => $this->input->post('agama'),
                'pendidikan'        => $this->input->post('pendidikan'),
                'pekerjaan'         => $pekerjaan,
                'status'            => $this->input->post('status'),
                'hubungan_keluarga' => $this->input->post('hubungan_keluarga'),
                // 'scan'              => $file_name,
                // 'ket'               => $this->input->post('ket'),
                'dusun'             => $this->input->post('dusun'),
                'lurah'             => $this->input->post('lurah'),
                'kecamatan'         => $this->input->post('kecamatan'),
                'kabupaten'         => $this->input->post('kabupaten'),
                'provinsi'          => $this->input->post('provinsi'),
                'negara'            => $this->input->post('negara'),
                'golongan_darah'    => $this->input->post('golongan_darah'),
                'desa'              => $this->input->post('desa'),

            );

            // echo "<pre>";
            // print_r($params); die();

            $DataPenduduk_id = $this->Datapenduduk_model->add_DataPenduduk($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );
            redirect('DataPenduduk/index');
        } else {
            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datapenduduklahir/tambahkan');
            $this->load->view('layout/footer');
        }
    }
}
