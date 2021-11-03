<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct()
        {
            parent::__construct();
            $this->load->helper('url');
            $this->load->helper('form');
            $this->load->model('login_model');
        }

        public function index() {
            $data['title'] = 'Login Aplikasi Simpan Berkas';
            $this->load->view('Login',$data);
        }

    }
?>