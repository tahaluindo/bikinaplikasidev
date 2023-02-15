<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataUser extends CI_Controller
{

    public function __construct()
    { 
        parent::__construct();
        $this->load->model('datauser_model');
        if ($this->session->userdata('status') == '') {
            redirect('Auth');
        }

        if ($this->session->userdata('role') != 'Bagian Pelayanan' and $this->session->userdata('role') != 'Admin') {
            show_404();
        }
    }

    public function index()
    { 
        $data['title']          = "Data User";
        $data['DataUser'] = $this->datauser_model->get_all_DataUser();
        $this->load->view('layout/head', $data);
        $this->load->view('layout/sidebar');
        $this->load->view('datauser/index', $data);
        $this->load->view('layout/footer');
    }

    public function add()
    {
        $data['title'] = "Data user";
        $this->load->library('form_validation');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('password', 'password', 'required');

        if ($this->form_validation->run()) {

            $cek_DataUser = $this->db->get_where('user', array('username' => $this->input->post('username')));
            if ($cek_DataUser->num_rows() > 0) {
                $this->session->set_flashdata('msg',
                    '
                    <div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
                            </button>
                            <strong>Gagal!</strong> Password sudah ada.
                    </div>'
                );

                redirect('DataUser/indexadd');
            }

            $params = array(
                'username' => $this->input->post('username'),
                'password' => md5($this->input->post('password')),
                'role' => 'Admin',
            );

            $DataUser_id = $this->datauser_model->add_user($params);

            $this->session->set_flashdata('msg',
                '
								<div class="alert alert-success alert-dismissible" role="alert">
									 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
									 </button>
									 <strong>Sukses!</strong> Berhasil disimpan.
								</div>'
            );

            redirect('DataUser/index');
        } else {

            $this->load->view('layout/head', $data);
            $this->load->view('layout/sidebar');
            $this->load->view('datauser/add');
            $this->load->view('layout/footer');
        }

    }

    public function edit($id)
    {
        // check if the DataUser exists before trying to edit it
        $data['DataUser'] = $this->datauser_model->get_DataUser($id);

        if (isset($data['DataUser']['username'])) {
            $data['title'] = "Data user";
            $this->load->library('form_validation');
            $this->form_validation->set_rules('password', 'Password', 'required');
            
            if ($this->form_validation->run()) {
                $cek_DataUser = $this->db->get_where('user', array('username' => $this->input->post('username')));

                if ($cek_DataUser->num_rows() > 1) {
                    $this->session->set_flashdata('msg',
                        '
						<div class="alert alert-warning alert-dismissible" role="alert">
							 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
							 </button>
							 <strong>Gagal!</strong> User sudah ada.
						</div>'
                    ); 

                    redirect('DataUser/indexedit/' . $id);
                }

                $params = array(
                    'password' => md5($this->input->post('password'))
                );

                $this->datauser_model->update_DataUser($id, $params);
                $this->session->set_flashdata('msg',
                    '
									<div class="alert alert-success alert-dismissible" role="alert">
										 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
										 </button>
										 <strong>Sukses!</strong> Berhasil disimpan.
									</div>'
                );
                redirect('DataUser/index');
            } else {
                $this->load->view('layout/head', $data);
                $this->load->view('layout/sidebar');
                $this->load->view('datauser/edit', $data);
                $this->load->view('layout/footer');
            }
        } else {
            show_error('The DataUser you are trying to edit does not exist.');
        }
    }

    public function remove($id)
    {
        $DataUser = $this->datauser_model->get_DataUser($id);

        // check if the DataUser exists before trying to delete it
        if (isset($DataUser['username'])) {

            $this->datauser_model->delete_user($id);
            $this->session->set_flashdata('msg',
                '
							<div class="alert alert-success alert-dismissible" role="alert">
								 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									 <span aria-hidden="true">&times;&nbsp; &nbsp;</span>
								 </button>
								 <strong>Sukses!</strong> Berhasil dihapus.
							</div>'
            );
            redirect('DataUser/index');
        } else {
            show_error('The DataUser you are trying to delete does not exist.');
        }

    }
}
