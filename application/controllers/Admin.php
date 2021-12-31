<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function index()
    {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Dashboard';
            
            $this->load->view('template/Header',$data);
            $this->load->view('Admin/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }
}

/* End of file Admin.php */

?>