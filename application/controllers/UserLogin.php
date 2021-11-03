<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        // $this->load->model('MasterUnitKerja_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'User Login';
        // $data['unitkerja'] = $this->MasterUnitKerja_model->getUnitKerja();

        $this->load->view('template/Header',$data);
        $this->load->view('UserLogin/index',$data);
        $this->load->view('template/Footer',$data);
    }

}

/* End of file UserLogin.php */

?>