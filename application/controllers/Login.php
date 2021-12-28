<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('Login_model');
            $this->load->library('form_validation');
        }

        public function index() {
            $data['title'] = 'Login';
            //menampilkan level user yang akan login
            $data['level'] = $this->Login_model->getLevel();

            //menampilkan view halaman login
            $this->load->view('Login/index', $data);
        }

        public function proses_login() {
            //menambil username, password, dan level yang di-input oleh user
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $level = $this->input->post('level');

            //function cek_login digunakan untuk memeriksa apakah level, username, dan password yang di-input ada di dalam tabel
            $login = $this->Login_model->cek_login($level, $username, $password);
 
            //jika hasil cek_login menemukan terdapatnya data dalam tabel
            if($login->num_rows() > 0) {
                //jika levelnya adalah bpkad
                if($level == 'BPKAD') {
                    //menyimpan data pada variabel $login untuk dijadikan session dalam array
                    $data_session = $login->row_array();

                    //penjabaran kolom mana saja yang dijadikan session
                    $this->session->set_userdata('SCIDBUID',$data_session['SCIDBUID']);
                    $this->session->set_userdata('SCUSI',$data_session['SCUSI']);
                    $this->session->set_userdata('SCUSC',$data_session['SCUSC']);
                    $this->session->set_userdata('SCUSG',$data_session['SCUSG']);

                    //halaman akan me-refresh ke halaman Admin
                    redirect('Admin/index');
                }
                //jika levelnya adalah opd
                else if ($level == 'OPD'){
                    //menyimpan data pada variabel $login untuk dijadikan session dalam array
                    $data_session = $login->row_array();

                    //penjabaran kolom mana saja yang dijadikan session
                    $this->session->set_userdata('SCIDBUID',$data_session['SCIDBUID']);
                    $this->session->set_userdata('SCUSI',$data_session['SCUSI']);
                    $this->session->set_userdata('SCUSC',$data_session['SCUSC']);
                    $this->session->set_userdata('SCUSG',$data_session['SCUSG']);
                    
                    //halaman akan me-refresh ke halaman Admin
                    redirect('Admin/index');
                }
                else if($level == 'Administrator') {
                    //menyimpan data pada variabel $login untuk dijadikan session dalam array
                    $data_session = $login->row_array();

                    //penjabaran kolom mana saja yang dijadikan session
                    $this->session->set_userdata('SCIDBUID',$data_session['SCIDBUID']);
                    $this->session->set_userdata('SCUSI',$data_session['SCUSI']);
                    $this->session->set_userdata('SCUSC',$data_session['SCUSC']);
                    $this->session->set_userdata('SCUSG',$data_session['SCUSG']);

                    //halaman akan me-refresh ke halaman Admin
                    redirect('Admin/index');
                }
            }
            //jika hasil cek_login tidak menemukan data dalam tabel
            else {
                $data['title'] = 'Login';

                // menampilkan window alert ketika login incorrect
                echo"<script>alert('Username atau Password Salah');</script>";
                //halaman akan me-refresh ke halaman login
                redirect('Login/index', 'refresh');
            }
        }

        public function logout()
        {
            //menghapus session
            $this->session->sess_destroy();
            //halaman akan me-refresh ke halaman login
            redirect('Login/index','refresh');
        }
    }
?>