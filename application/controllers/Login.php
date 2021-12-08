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
            $data['level'] = $this->Login_model->getLevel();

            $this->load->view('Login/index', $data);
        }

        public function proses_login() {
            $username = htmlspecialchars($this->input->post('username'));
            $password = htmlspecialchars($this->input->post('password'));
            $level = $this->input->post('level');

            $login = $this->Login_model->cek_login($level, $username, $password);

            if($login->num_rows() > 0) {
                if($level == 'bpkad') {
                    $data_session = $login->row_array();

                    $this->session->set_userdata('id',$data_session['id']);
                    $this->session->set_userdata('name',$data_session['name']);
                    $this->session->set_userdata('username',$data_session['username']);
                    $this->session->set_userdata('level',$data_session['level']);

                    $this->Login_model->Update_last_login($level, $username, $password);
                    redirect('Admin/index');
                }
                else{
                    $data_session = $login->row_array();

                    $this->session->set_userdata('id',$data_session['id']);
                    $this->session->set_userdata('name',$data_session['name']);
                    $this->session->set_userdata('username',$data_session['username']);
                    $this->session->set_userdata('level',$data_session['level']);

                    $this->Login_model->Update_last_login($level, $username, $password);
                    redirect('Admin/index');
                }
            }
            else {
                $data['title'] = 'Login';
                $data['pesan'] = 'Username atau Password Salah';

                $this->load->view('Login/index', $data);
            }
        }

        public function logout()
        {
            $this->session->sess_destroy();
            redirect('Login/index','refresh');
        }
    }
?>