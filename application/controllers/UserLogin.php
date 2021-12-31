<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('UserLogin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'User Login';
            $data['getAll'] = $this->UserLogin_model->getAll_user();
            $data['opd'] = $this->UserLogin_model->getOpd();
            $data['unit_kerja'] = $this->UserLogin_model->getOpd();
            $data['kode_kab'] = $this->UserLogin_model->getKode();
            $data['hak_akses'] = $this->UserLogin_model->getHakAkses();
            $data['akses'] = $this->UserLogin_model->getHakAkses();
    
            $this->load->view('template/Header',$data);
            $this->load->view('UserLogin/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_user() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'User Login';

            // validation rules
            $this->form_validation->set_rules('SCUSI', 'Username', 'required');
            $this->form_validation->set_rules('SCUSC', 'Password', 'required');
    
            // jika validation form berjalan false, maka yang ditampilkan adalah form tambah user
            if($this->form_validation->run() == FALSE) {
                //load view header, index user login, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('UserLogin/index',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $bndesb1 = $this->input->post('SCIDBUID');
                // deklarasi array pada variabel $result untuk penyimpanan data sementara sebelum di-insert
                $result = array();
                // set timezone Indonesia
                date_default_timezone_set('Asia/Jakarta');
                // mengambil ip pengakses
                $ip = $_SERVER['REMOTE_ADDR'];
                // deklarasi variabel untuk insert ke t4111
                $uid = "admin1";
                $sq = 10;
    
                // get nama op dari idbuid inputan user
                $buid = $this->UserLogin_model->get_nama_opd($bndesb1);
                $scbuid = $buid->BNDESB1;
    
                // periksa apakah di tabel user apakah opd sudah memiliki user atau belum
                $cek_user = $this->UserLogin_model->cek_user($bndesb1);
                // jika iya, maka update SCSEQ + 10
                if($cek_user->num_rows() == "0") {
                    $data_user = array(
                        'SCCOID' => $this->input->post('SCCOID', true),
                        'SCIDBUID' => $this->input->post('SCIDBUID', true),
                        'SCSEQ' => $sq,
                        'SCBUID' => $scbuid,
                        'SCUSI' => $this->input->post('SCUSI', true),
                        'SCUSC' => $this->input->post('SCUSC', true),
                        'SCUSG' => $this->input->post('SCUSG', true),
                        'SCUID' => $uid,
                        'SCUIDM' => $uid,
                        'SCDTIN' => date('Y-m-d H:i:s', time()),
                        'SCDTLU' => date('Y-m-d H:i:s', time()),
                        'SCIPUID' => $ip,
                        'SCIPUIDM' => $ip,
                    );
                    array_push($result, $data_user);
                    $this->db->insert_batch('t9801', $result);
    
                    //halaman akan me-refresh ke halaman index user login
                    redirect('UserLogin/index','refresh');
                }
                else {
                    // get scseq terakhir dari idbuid yang sudah ada
                    $seq = $this->UserLogin_model->get_sequence($bndesb1);
                    $scseq = $seq->SCSEQ;
    
                    // update SCSEQ + 10
                    $sequence = $scseq + 10;
    
                    $data_user = array(
                        'SCCOID' => $this->input->post('SCCOID', true),
                        'SCIDBUID' => $this->input->post('SCIDBUID', true),
                        'SCSEQ' => $sequence,
                        'SCBUID' => $scbuid,
                        'SCUSI' => $this->input->post('SCUSI', true),
                        'SCUSC' => $this->input->post('SCUSC', true),
                        'SCUSG' => $this->input->post('SCUSG', true),
                        'SCUID' => $uid,
                        'SCUIDM' => $uid,
                        'SCDTIN' => date('Y-m-d H:i:s', time()),
                        'SCDTLU' => date('Y-m-d H:i:s', time()),
                        'SCIPUID' => $ip,
                        'SCIPUIDM' => $ip,
                    );
                    array_push($result, $data_user);
                    $this->db->insert_batch('t9801', $result);
    
                    //halaman akan me-refresh ke halaman index user login
                    redirect('UserLogin/index','refresh');
                }
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_user($scidbuid, $scseq) {
        if (isset($_SESSION['SCUSG'])) {
            //proses hapus di UserLogin_model
            $this->UserLogin_model->Hapus_user($scidbuid, $scseq);
            //halaman akan me-refresh ke halaman index user login
            redirect('UserLogin/index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Edit_user($scidbuid, $scseq) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'User Login';

            // validation rules
            $this->form_validation->set_rules('SCUSI', 'Username', 'required');
            $this->form_validation->set_rules('SCUSC', 'Password', 'required');
    
            // jika validation form berjalan false, maka yang ditampilkan adalah form tambah user
            if($this->form_validation->run() == FALSE) {
                //load view header, index user login, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('UserLogin/index',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                // set timezone Indonesia
                date_default_timezone_set('Asia/Jakarta');
                // mengambil ip pengakses
                $ip = $_SERVER['REMOTE_ADDR'];
                // deklarasi variabel untuk insert ke t4111
                $uid = "admin1";
    
                $data_user = array(
                    'SCUSI' => $this->input->post('SCUSI', true),
                    'SCUSC' => $this->input->post('SCUSC', true),
                    'SCUSG' => $this->input->post('SCUSG', true),
                    'SCUIDM' => $uid,
                    'SCDTLU' => date('Y-m-d H:i:s', time()),
                    'SCIPUIDM' => $ip,
                );
                $this->db->update('t9801', $data_user, array('SCIDBUID' => $scidbuid, 'SCSEQ' => $scseq));
    
                //halaman akan me-refresh ke halaman index user login
                redirect('UserLogin/index','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

}

/* End of file UserLogin.php */

?>