<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Laporan_model');
        $this->load->model('Datapenduduk_model');
        $this->load->model('Domisili_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }
    }

    public function index()
    {
        $data['title'] = "Laporan";
        if ($this->session->userdata('role') == 'Kepala Desa') {
            $this->db->where('status', 'ACC');
        }

        $data['laporan'] = $this->Laporan_model->get_all_laporan();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
        $data['title'] = "Laporan";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('data_penduduk', 'Data Penduduk');
        $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

        if ($this->form_validation->run()) {
            $config['upload_path']   = './assets/uploads';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['max_size']      = 10000;
            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('data_penduduk')) {
                echo "upload gagal" . $this->upload->display_errors();
                exit();
            } else {
                $upload_data = $this->upload->data();
                $file_name   = $upload_data['file_name'];
            }
            $params = array(
                'data_penduduk' => $file_name,
                'keterangan'    => $this->input->post('keterangan'),
                'tgl_laporan'   => date('Y-m-d H:i:s'),
            );
            $laporan_id = $this->Laporan_model->add_laporan($params);

            // $params2 = array(
            //  'pesan' => $this->input->post('keterangan'),
            //  'event' => 'Laporan',
            //  'tgl_notifikasi'=> date('Y-m-d H:i:s')
            // );
            // $this->db->insert('notifikasi', $params2);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );
            redirect('laporan/index');
        } else {
            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('laporan/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
        // check if the laporan exists before trying to edit it
        $data['laporan'] = $this->Laporan_model->get_laporan($id);

        if (isset($data['laporan']['id_laporan'])) {
            $data['title'] = "Laporan";
            $this->load->library('form_validation');
            // $this->form_validation->set_rules('data_penduduk','Data Penduduk','required');
            $this->form_validation->set_rules('keterangan', 'Keterangan', 'required');

            if ($this->form_validation->run()) {
                $params = array(
                    // 'data_penduduk' => $this->input->post('data_penduduk'),
                    'keterangan' => $this->input->post('keterangan'),
                );

                $this->Laporan_model->update_laporan($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('laporan/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('laporan/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The laporan you are trying to edit does not exist.');
        }

    }

    public function remove($id)
    {
        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
        $laporan = $this->Laporan_model->get_laporan($id);

        // check if the laporan exists before trying to delete it
        if (isset($laporan['id_laporan'])) {
            if ($laporan['data_penduduk'] != '') {
                unlink('assets/uploads/' . $laporan['data_penduduk']);
            }
            $this->Laporan_model->delete_laporan($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('laporan/index');
        } else {
            show_error('The laporan you are trying to delete does not exist.');
        }

    }

    public function cek($id = '')
    {
        date_default_timezone_set('Asia/Jakarta');
        if ($this->session->userdata('role') != 'sekdes' or $id == '') {
            show_404();
        }
        $laporan = $this->Laporan_model->get_laporan($id);
        if ($laporan['status'] == 'ACC') {
            $status = null;
            $pesan  = 'Batalkan';
        } else {
            $status = 'ACC';
            $pesan  = 'ACC';

            $params2 = array(
                'pesan'          => $laporan['keterangan'],
                'event'          => 'Laporan',
                'tgl_notifikasi' => date('Y-m-d H:i:s'),
            );
            $this->db->insert('notifikasi', $params2);
        }
        $params = array(
            'status' => $status,
        );
        $this->Laporan_model->update_laporan($id, $params);
        $this->session->set_flashdata('msg',
            '
					<div class="alert alert-success alert-dismissible" role="alert">
						 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
						 </button>
						 <strong>Sukses!</strong> Berhasil di ' . $pesan . '.
					</div>'
        );
        redirect('laporan/index');
    }

    public function cetak($aksi = '')
    {
        $this->load->model('DataPenduduk_model');
        $this->load->model('Datapenduduktetap_model');
        $this->load->model('Datapendudukpindah_model');
        $this->load->model('Datapendudukdatang_model');
        $this->load->model('Datapendudukmeninggal_model');
        $this->load->model('datapenduduklahir_model');
        $this->load->model('DataKK_model');

        if ($this->session->userdata('role') == '') {
            show_404();
        }

        $data['title'] = "Cetak Dokumen " . ucwords($aksi);
        if ($aksi == 'penduduk_tetap') {
            $data['DataPendudukTetap'] = $this->Datapenduduktetap_model->get_all_DataPendudukTetap();

            $query = $this->query($this->input->post(), 'datapenduduk');

            $data['DataPenduduk'] = $this->db->query($query)->result_array();

            // if($this->input->get(''))

            $nikpenduduktetap = $this->db->select('nik')->get('datapenduduktetap')->result_array();
// print_r($nikpenduduktetap); die();
            $datanikpenduduktetap = [];
            foreach ($nikpenduduktetap as $item) {
                $datanikpenduduktetap[] = $item['nik'];
            }

            foreach ($data['DataPenduduk'] as $key => $datapenduduk) {
                if (!in_array($data['DataPenduduk'][$key]['nik'], $datanikpenduduktetap)) {
                    unset($data['DataPenduduk'][$key]);
                }
            }

            $data['DataPendudukTetap'] = $data['DataPenduduk'];

            if (!count($data['DataPendudukTetap'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'penduduk_pindah') {
            $data['DataPendudukPindah'] = $this->Datapendudukpindah_model->get_all_DataPendudukPindah();

            $query = $this->query($this->input->post(), 'datapendudukpindah', 'JOIN datapenduduk ON datapendudukpindah.nik = datapenduduk.nik');

            $data['DataPendudukPindah'] = $this->db->query($query)->result_array();

            if (!count($data['DataPendudukPindah'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'penduduk_meninggal') {
            $data['DataPendudukMeninggal'] = $this->Datapendudukmeninggal_model->get_all_DataPendudukMeninggal();

            $query = $this->query($this->input->post(), 'datapendudukmeninggal', 'JOIN datapenduduk ON datapendudukmeninggal.nik = datapenduduk.nik');

            $data['DataPendudukMeninggal'] = $this->db->query($query)->result_array();

            if (!count($data['DataPendudukMeninggal'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'penduduk_datang') {
            $data['DataPendudukDatang'] = $this->Datapendudukdatang_model->get_all_DataPendudukDatang();

            $query = $this->query($this->input->post(), 'datapendudukdatang', 'JOIN datapenduduk ON datapendudukdatang.nik = datapenduduk.nik');

            $data['DataPendudukDatang'] = $this->db->query($query)->result_array();

            if (!count($data['DataPendudukDatang'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'penduduk_lahir') {
            $data['DataPendudukLahir'] = $this->datapenduduklahir_model->get_all_DataPendudukLahir();

            $query = $this->query($this->input->post(), 'datapenduduklahir');

            $data['DataPendudukLahir'] = $this->db->query($query)->result_array();

            if (!count($data['DataPendudukLahir'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'kk') {
            $data['DataKK'] = $this->DataKK_model->get_all_DataKK();

            if (!count($data['DataKK'])) {
                die("Tidak ada data!");
            }
        } elseif ($aksi == 'penduduk') {
            $data['DataPenduduk'] = $this->DataPenduduk_model->get_all_DataPenduduk();

            $query = $this->query($this->input->post(), 'datapenduduk');

            $data['DataPenduduk'] = $this->db->query($query)->result_array();

            if (!count($data['DataPenduduk'])) {
                die("Tidak ada data!");
            }

        } elseif ($aksi == 'datakk') {
            $data['DataKK'] = $this->DataKK_model->get_all_DataKK();

            $query = $this->query($this->input->post(), 'datakk');

            $data['DataKK'] = $this->db->query($query)->result_array();

            if (!count($data['DataKK'])) {
                die("Tidak ada data!");
            }

        } elseif ($aksi == 'perkembanganpenduduk') {
            $data['dusuns'] = $this->db->distinct()->select('dusun')->like('dusun', $this->input->post('dusun'))->get('datapenduduk')->result_array();

            $dataperkembanganpenduduk = [];

            // variable yang akan di oper ke view
            $data['total_penduduk_awal_lk'] = 0;
            $data['total_penduduk_awal_pr'] = 0;
            $data['total_penduduk_awal'] = 0;
            $data['total_penduduk_lahir_lk'] = 0;
            $data['total_penduduk_lahir_pr'] = 0;
            $data['total_penduduk_lahir'] = 0;
            $data['total_penduduk_meninggal_lk'] = 0;
            $data['total_penduduk_meninggal_pr'] = 0;
            $data['total_penduduk_meninggal'] = 0;
            $data['total_penduduk_datang_lk'] = 0;
            $data['total_penduduk_datang_pr'] = 0;
            $data['total_penduduk_datang'] = 0;
            $data['total_penduduk_pindah_lk'] = 0;
            $data['total_penduduk_pindah_pr'] = 0;
            $data['total_penduduk_pindah'] = 0;
            $data['total_penduduk_akhir_lk'] = 0;
            $data['total_penduduk_akhir_pr'] = 0;
            $data['total_penduduk_akhir'] = 0;
            $total_penduduk_lk = 0;
            $total_penduduk_pr = 0;

            foreach ($data['dusuns'] as $indexDesa => $dusun) {
                // Inputkan semua data dusun
                $dataperkembanganpenduduk[$indexDesa]['dusun'] = $dusun['dusun'];

                // inputkan semua data rt yang ada didusun tersebut
                $rts                                        = $this->db->distinct()->select('rt')->like('dusun', $dusun['dusun'])->order_by('rt')->get('datapenduduk')->result_array();
                $dataperkembanganpenduduk[$indexDesa]['rt'] = $rts;

                // total penduduk awal
                $total_penduduk_awal_lk = 0;
                $total_penduduk_awal_pr = 0;
                $total_penduduk_awal = 0;

                // total penduduk lahir
                $total_penduduk_lahir_lk = 0;
                $total_penduduk_lahir_pr = 0;
                $total_penduduk_lahir = 0;

                // total penduduk meninggal
                $total_penduduk_meninggal_lk = 0;
                $total_penduduk_meninggal_pr = 0;
                $total_penduduk_meninggal = 0;

                // total penduduk datang
                $total_penduduk_datang_lk = 0;
                $total_penduduk_datang_pr = 0;
                $total_penduduk_datang = 0;

                // total penduduk pindah
                $total_penduduk_pindah_lk = 0;
                $total_penduduk_pindah_pr = 0;
                $total_penduduk_pindah = 0;

                // total penduduk akhir
                $total_penduduk_akhir_lk = 0;
                $total_penduduk_akhir_pr = 0;
                $total_penduduk_akhir = 0;

                // $data['total_penduduk_lk'] = 0;
                // $data['total_penduduk_pr'] = 0;
                // $data['total_penduduk'] = 0;

                // jumlah penduduk semua agama horizontal
                $agama_all = $this->db->select('keterangan')->get('dataagama')->result();
						
                $agamas = [];
                foreach($agama_all as $agama) {

                    $agamas[] = $agama->keterangan;
                }
                
                $data["total_penduduk_lk"] = [];
                $data["total_penduduk_pr"] = [];
                $data["total_penduduk"] = [];
                foreach($agamas as $agama)
                {
                    $data["total_penduduk"][$agama]['Lk'] = [];
                    $data["total_penduduk"][$agama]['Pr'] = [];
                    $data["total_penduduk"][$agama]['Jumlah'] = [];
                }

                foreach ($rts as $indexRt => $rt) {
                    $periode = $this->input->post('tahun') . '-' . $this->input->post('bulan') . '-01 00:00:00';

                    if(((int) $this->input->post('bulan')) < 10) {
                        
                        $bulan = ((int) $this->input->post('bulan')) + 1;
                        $periode_next = $this->input->post('tahun') . '-0' . $bulan . '-01 00:00:00';
                        
                    } else {
                        $bulan = ((int) $this->input->post('bulan')) + 1;
                        $periode_next = $this->input->post('tahun') . '-' . $bulan . '-01 00:00:00';
                    }

					// print_r($this->input->post());die();
                    // Jika klik print Versi 1
					if($this->input->post('print_1')) {
						// penduduk awal
						$jumlah_penduduk_awal_lk                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where('created_at <', $periode)->get('datapenduduk')->num_rows();
						$jumlah_penduduk_awal_pr                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where('created_at <', $periode)->get('datapenduduk')->num_rows();
                        $jumlah_penduduk_awal                                                  = $jumlah_penduduk_awal_lk + $jumlah_penduduk_awal_pr;
                        
                        $total_penduduk_awal_lk += $jumlah_penduduk_awal_lk;
                        $total_penduduk_awal_pr += $jumlah_penduduk_awal_pr;
                        $total_penduduk_awal += $jumlah_penduduk_awal;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_awal'] = [
							'Lk'     => $jumlah_penduduk_awal_lk,
							'Pr'     => $jumlah_penduduk_awal_pr,
							'Jumlah' => $jumlah_penduduk_awal,
						];

						// penduduk lahir
						$jumlah_penduduk_lahir_lk                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapenduduklahir')->num_rows();
						$jumlah_penduduk_lahir_pr                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapenduduklahir')->num_rows();
                        $jumlah_penduduk_lahir                                                  = $jumlah_penduduk_lahir_lk + $jumlah_penduduk_lahir_pr;
                        
                        $total_penduduk_lahir_lk += $jumlah_penduduk_lahir_lk;
                        $total_penduduk_lahir_pr += $jumlah_penduduk_lahir_pr;
                        $total_penduduk_lahir += $jumlah_penduduk_lahir;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_lahir'] = [
							'Lk'     => $jumlah_penduduk_lahir_lk,
							'Pr'     => $jumlah_penduduk_lahir_pr,
							'Jumlah' => $jumlah_penduduk_lahir,
						];

						// penduduk meninggal
                        $penduduk_meninggal_niks                                                    = $this->db->distinct()->select('nik')->get('datapendudukmeninggal')->result_array();
                        // echo "<pre>";
                        // print_r(); die();
						$penduduk_meninggal_niks                                                    = $this->array_flatten($penduduk_meninggal_niks);
						$jumlah_penduduk_meninggal_lk                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where_in('nik', $penduduk_meninggal_niks)->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapenduduk')->num_rows();
						$jumlah_penduduk_meninggal_pr                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where_in('nik', $penduduk_meninggal_niks)->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapenduduk')->num_rows();
                        $jumlah_penduduk_meninggal                                                  = $jumlah_penduduk_meninggal_lk + $jumlah_penduduk_meninggal_pr;
                        
                        $total_penduduk_meninggal_lk += $jumlah_penduduk_meninggal_lk;
                        $total_penduduk_meninggal_pr += $jumlah_penduduk_meninggal_pr;
                        $total_penduduk_meninggal += $jumlah_penduduk_meninggal;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_meninggal'] = [
							'Lk'     => $jumlah_penduduk_meninggal_lk,
							'Pr'     => $jumlah_penduduk_meninggal_pr,
							'Jumlah' => $jumlah_penduduk_meninggal,
						];

						// penduduk datang
						$jumlah_penduduk_datang_lk                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapendudukdatang')->num_rows();
						$jumlah_penduduk_datang_pr                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where('created_at >=', $periode)->where('created_at <', $periode_next)->get('datapendudukdatang')->num_rows();
                        $jumlah_penduduk_datang                                                  = $jumlah_penduduk_datang_lk + $jumlah_penduduk_datang_pr;
                        
                        $total_penduduk_datang_lk = $jumlah_penduduk_datang_lk;
                        $total_penduduk_datang_pr = $jumlah_penduduk_datang_pr;
                        $total_penduduk_datang = $jumlah_penduduk_datang;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_datang'] = [
							'Lk'     => $jumlah_penduduk_datang_lk,
							'Pr'     => $jumlah_penduduk_datang_pr,
							'Jumlah' => $jumlah_penduduk_datang,
						];

						// penduduk pindah
						$penduduk_pindah_niks                                                    = $this->db->distinct()->select('nik')->get('datapendudukpindah')->result_array();
						$penduduk_pindah_niks                                                    = $this->array_flatten($penduduk_pindah_niks);
						$jumlah_penduduk_pindah_lk                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where_in('nik', $penduduk_pindah_niks)->where('created_at <', $periode_next)->where('created_at >=', $periode)->get('datapenduduk')->num_rows();
						$jumlah_penduduk_pindah_pr                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where_in('nik', $penduduk_pindah_niks)->where('created_at <', $periode_next)->where('created_at >=', $periode)->get('datapenduduk')->num_rows();
                        $jumlah_penduduk_pindah                                                  = $jumlah_penduduk_pindah_lk + $jumlah_penduduk_pindah_pr;
                        
                        $total_penduduk_pindah_lk += $jumlah_penduduk_pindah_lk;
                        $total_penduduk_pindah_pr += $jumlah_penduduk_pindah_pr;
                        $total_penduduk_pindah += $jumlah_penduduk_pindah;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_pindah'] = [
							'Lk'     => $jumlah_penduduk_pindah_lk,
							'Pr'     => $jumlah_penduduk_pindah_pr,
							'Jumlah' => $jumlah_penduduk_pindah,
						];

                        // penduduk akhir
                        $total_penduduk_akhir_lk += $jumlah_penduduk_awal_lk + $jumlah_penduduk_lahir_lk + $jumlah_penduduk_datang_lk - $jumlah_penduduk_meninggal_lk - $jumlah_penduduk_pindah_lk;
                        $total_penduduk_akhir_pr += $jumlah_penduduk_awal_pr + $jumlah_penduduk_lahir_pr + $jumlah_penduduk_datang_pr - $jumlah_penduduk_meninggal_pr - $jumlah_penduduk_pindah_pr;
                        $total_penduduk_akhir += $jumlah_penduduk_awal + $jumlah_penduduk_lahir + $jumlah_penduduk_datang - $jumlah_penduduk_meninggal - $jumlah_penduduk_pindah;
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['penduduk_akhir'] = [
							'Lk'     => $jumlah_penduduk_awal_lk + $jumlah_penduduk_lahir_lk + $jumlah_penduduk_datang_lk - $jumlah_penduduk_meninggal_lk - $jumlah_penduduk_pindah_lk,
							'Pr'     => $jumlah_penduduk_awal_pr + $jumlah_penduduk_lahir_pr + $jumlah_penduduk_datang_pr - $jumlah_penduduk_meninggal_pr - $jumlah_penduduk_pindah_pr,
							'Jumlah' => $jumlah_penduduk_awal + $jumlah_penduduk_lahir + $jumlah_penduduk_datang - $jumlah_penduduk_meninggal - $jumlah_penduduk_pindah,
                        ];

					} else {
						// Jika klik print Versi 2 (Berdasarkan agama)
						$agama_all = $this->db->select('keterangan')->get('dataagama')->result();
						
						$agamas = [];
						foreach($agama_all as $agama) {
                            $agamas[] = $agama->keterangan;
						}

						$data['agamas'] = $agamas;
						// print_r(); die();
                        
                        $jumlah_penduduk_lk = 0;
                        $jumlah_penduduk_pr = 0;
                        $jumlah_penduduk = 0;
						foreach($agamas as $index => $agama) {
							// penduduk
							$jumlah_penduduk_lk_{$agama}                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Laki - Laki')->where('created_at <', $periode)->where('created_at <', $periode_next)->where('agama', $agama)->get('datapenduduk')->num_rows();
							$jumlah_penduduk_pr_{$agama}                                               = $this->db->where('dusun', $dusun['dusun'])->where('rt', $rt['rt'])->where('jenis_kelamin', 'Perempuan')->where('created_at <', $periode)->where('created_at <', $periode_next)->where('agama', $agama)->get('datapenduduk')->num_rows();
							$jumlah_penduduk_{$agama}                                                  = $jumlah_penduduk_lk_{$agama} + $jumlah_penduduk_pr_{$agama};
							$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt][$agama] = [
								'Lk'     => $jumlah_penduduk_lk_{$agama},
								'Pr'     => $jumlah_penduduk_pr_{$agama},
								'Jumlah' => $jumlah_penduduk_{$agama},
                            ];

                            $jumlah_penduduk_lk +=   $jumlah_penduduk_lk_{$agama};
                            $jumlah_penduduk_pr +=   $jumlah_penduduk_pr_{$agama};
                            $jumlah_penduduk +=   $jumlah_penduduk_{$agama};
                        }
                                                
                        // jumlah penduduk per agama per baris
						$dataperkembanganpenduduk[$indexDesa]['rt'][$indexRt]['Jumlah'] = [
							'Lk'     => $jumlah_penduduk_lk,
							'Pr'     => $jumlah_penduduk_pr,
							'Jumlah' => $jumlah_penduduk,
                        ];
    
                    }
                }
                
                // echo "<pre>";
                // print_r(json_encode($data["total_penduduk"]));DIE();
                
                if($this->input->post('print_1')) {
                    // simpan variable data yang akan dioper ke view
                    $data['total_penduduk_awal_lk'] += $total_penduduk_awal_lk;
                    $data['total_penduduk_awal_pr'] += $total_penduduk_awal_pr;
                    $data['total_penduduk_awal'] += $total_penduduk_awal;
                    
                    $data['total_penduduk_lahir_lk'] += $total_penduduk_lahir_lk;
                    $data['total_penduduk_lahir_pr'] += $total_penduduk_lahir_pr;
                    $data['total_penduduk_lahir'] += $total_penduduk_lahir;
                    
                    $data['total_penduduk_meninggal_lk'] += $total_penduduk_meninggal_lk;
                    $data['total_penduduk_meninggal_pr'] += $total_penduduk_meninggal_pr;
                    $data['total_penduduk_meninggal'] += $total_penduduk_meninggal;
                    
                    $data['total_penduduk_datang_lk'] += $total_penduduk_datang_lk;
                    $data['total_penduduk_datang_pr'] += $total_penduduk_datang_pr;
                    $data['total_penduduk_datang'] += $total_penduduk_datang;
                    
                    $data['total_penduduk_pindah_lk'] += $total_penduduk_pindah_lk;
                    $data['total_penduduk_pindah_pr'] += $total_penduduk_pindah_pr;
                    $data['total_penduduk_pindah'] += $total_penduduk_pindah;
                    
                    $data['total_penduduk_akhir_lk'] += $total_penduduk_akhir_lk;
                    $data['total_penduduk_akhir_pr'] += $total_penduduk_akhir_pr;
                    $data['total_penduduk_akhir'] += $total_penduduk_akhir;
                }
				
				$data['DataPerkembanganPenduduk'] = $dataperkembanganpenduduk;
				$data['bulan'] = $this->getBulan($this->input->post('bulan'));
				$data['tahun'] = $this->input->post('tahun');
            }

            // echo "<pre>";
            // print_r($dataperkembanganpenduduk);die();
        } else {
            show_404();
        }

		if($this->input->post('print_1')) {
			$this->load->view('laporan/cetak_' . $aksi, $data);
			return;
		} elseif($this->input->post('print_2')) {
			$this->load->view('laporan/cetak_perkembanganpendudukv2', $data);
			return;
		}

		$this->load->view('laporan/cetak_' . $aksi, $data);
    }

    public function filter($aksi = '')
    {

        $this->load->model('DataPenduduk_model');
        $this->load->model('Datapenduduktetap_model');
        $this->load->model('Datapendudukpindah_model');
        $this->load->model('Datapendudukdatang_model');
        $this->load->model('Datapendudukmeninggal_model');
        $this->load->model('datapenduduklahir_model');
        $this->load->model('DataKK_model');

        // data untuk filter
        if ($aksi == "penduduk") {
            $data['title'] = "Filter Laporan Penduduk";
            $data['rt']    = $this->db->distinct('rt')->select('rt')->get('data' . $aksi)->result();
            $data['agama'] = $this->db->get('dataagama')->result();
        } elseif ($aksi == "pendudukdatang") {
            $data['title']          = "Filter Laporan Penduduk Datang";
            $data['desa_asal']      = $this->db->distinct('desa_asal')->select('desa_asal')->get('data' . $aksi)->result();
            $data['kecamatan_asal'] = $this->db->distinct('kecamatan_asal')->select('kecamatan_asal')->get('data' . $aksi)->result();
            $data['rt_asal']        = $this->db->distinct('rt_asal')->select('rt_asal')->get('data' . $aksi)->result();
            $data['kabupaten_asal'] = $this->db->distinct('kabupaten_asal')->select('kabupaten_asal')->get('data' . $aksi)->result();
            $data['provinsi_asal']  = $this->db->distinct('provinsi_asal')->select('provinsi_asal')->get('data' . $aksi)->result();
        } elseif ($aksi == "penduduklahir") {
            $data['title']            = "Filter Laporan Penduduk Lahir";
            $data['tempat_kelahiran'] = $this->db->distinct('tempat_kelahiran')->select('tempat_kelahiran')->get('data' . $aksi)->result();
            $data['hari_kelahiran']   = $this->db->distinct('hari_kelahiran')->select('hari_kelahiran')->get('data' . $aksi)->result();
            $data['jenis_kelahiran']  = $this->db->distinct('jenis_kelahiran')->select('jenis_kelahiran')->get('data' . $aksi)->result();
        } elseif ($aksi == "pendudukmeninggal") {
            $data['title']                = "Filter Laporan Penduduk Meninggal";
            $data['penyebab_meninggal']   = $this->db->distinct('penyebab_meninggal')->select('penyebab_meninggal')->get('data' . $aksi)->result();
        } elseif ($aksi == "pendudukpindah") {
            $data['title']                   = "Filter Laporan Penduduk Pindah";
            $data['rt_tujuan_pindah']        = $this->db->distinct('rt_tujuan_pindah')->select('rt_tujuan_pindah')->get('data' . $aksi)->result();
            $data['desa_tujuan_pindah']      = $this->db->distinct('desa_tujuan_pindah')->select('desa_tujuan_pindah')->get('data' . $aksi)->result();
            $data['kecamatan_tujuan_pindah'] = $this->db->distinct('kecamatan_tujuan_pindah')->select('kecamatan_tujuan_pindah')->get('data' . $aksi)->result();
            $data['kabupaten_tujuan_pindah'] = $this->db->distinct('kabupaten_tujuan_pindah')->select('kabupaten_tujuan_pindah')->get('data' . $aksi)->result();
            $data['provinsi_tujuan_pindah']  = $this->db->distinct('provinsi_tujuan_pindah')->select('provinsi_tujuan_pindah')->get('data' . $aksi)->result();
        } elseif ($aksi == "penduduktetap") {
            $data['title'] = "Filter Laporan Penduduk Tetap";
            $data['rt']    = $this->db->distinct('rt')->select('rt')->get('datapenduduk')->result();
            $data['agama'] = $this->db->get('dataagama')->result();
        } elseif ($aksi == "kk") {
            $data['title']             = "Filter Laporan KK";
            $data['hubungan_keluarga'] = $this->db->distinct('hubungan_keluarga')->select('hubungan_keluarga')->get('data' . $aksi)->result();
        } elseif ('perkembanganpenduduk' == $aksi) {
            $data['title'] = 'Filter Laporan Perkembangan Penduduk';
            $data['dusun'] = $this->db->distinct('dusun')->select('dusun')->get('datapenduduk')->result();
        }

        // print_r($data); die();

        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('laporan/cari_' . 'data' . $aksi, $data);
        $this->load->view('layout/footer');
    }

    public function query($array, $table, $joinTable = "")
    {
        // print_r($this->array->post()); die();

        $query = "SELECT * FROM $table $joinTable where ";

        $like = '';
        foreach ($array as $key => $filter_data) {
            $like .= "$key LIKE '%$filter_data%'";

            // pastikan ada or
            if ($key < count($array)) {
                $like .= " AND ";
            }
        }

        $like .= "1=1";
        $query .= $like;

        return $query;
    }

    public function array_flatten($array)
    {
        $a  = $array;
        $it = new RecursiveIteratorIterator(new RecursiveArrayIterator($a));

        $arrays = [];
        foreach ($it as $v) {
            $arrays[] = $v;
        }

        return $arrays;
	}
	
	public function getBulan($bulan)
	{
		$bulanReturn = "";
		switch ($bulan) {
			case '01':
				$bulanReturn = "January";
				break;
			case '02':
				$bulanReturn = "February";
				break;
			case '03':
				$bulanReturn = "Maret";
				break;
			case '04':
				$bulanReturn = "April";
				break;
			case '05':
				$bulanReturn = "Mei";
				break;
			case '06':
				$bulanReturn = "Juni";
				break;
			case '07':
				$bulanReturn = "Juli";
				break;
			case '08':
				$bulanReturn = "Agustus";
				break;
			case '09':
				$bulanReturn = "September";
				break;
			case '10':
				$bulanReturn = "Oktober";
				break;
			case '11':
				$bulanReturn = "November";
				break;
			case '12':
				$bulanReturn = "Desember";
				break;
			
			default:
				# code...
				break;
		}

		return $bulanReturn;
	}
}
