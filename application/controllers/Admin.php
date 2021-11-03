<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        $data['title'] = 'Dashboard';
        $this->load->view('template/Header',$data);
        $this->load->view('Admin/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Berkas_baru() {
        $data['title'] = 'Berkas Baru';
        $this->load->view('template/Header',$data);
        $this->load->view('Admin/Berkas_baru',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_data() {
        $data['title'] = 'Tambah Berkas Baru';
        $this->load->view('template/Header',$data);
        $this->load->view('Admin/Tambah_data',$data);
        $this->load->view('template/Footer',$data);
    }

}

/* End of file Admin.php */

?>