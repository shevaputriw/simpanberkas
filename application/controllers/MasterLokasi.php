<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterLokasi extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('MasterLokasi_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Master Lokasi';
        $data['opd'] = $this->MasterLokasi_model->getOpd();
        $data['kodekab'] = $this->MasterLokasi_model->getKode();
        $data['getAll'] = $this->MasterLokasi_model->getAllData();

        $this->load->view('template/Header',$data);
        $this->load->view('MasterLokasi/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_Lokasi() {
        $data['title'] = 'Master Lokasi';

        $this->form_validation->set_rules('LMWHC', 'Kode Gudang', 'required');
        $this->form_validation->set_rules('LMAISLE', 'Nomor Rak', 'required');
        $this->form_validation->set_rules('LMROW', 'Nomor Baris', 'required');
        $this->form_validation->set_rules('LMCOL', 'Nomor Kolom', 'required');
        $this->form_validation->set_rules('LMDESA2', 'Keterangan', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterLokasi/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $idbuid = $this->input->post('LMIDBUID');
            $x = $this->MasterLokasi_model->getBuid($idbuid);
            $y = $this->MasterLokasi_model->getDesb1($idbuid);

            $lmbuid = $x->BNBUID;
            $lmdesa1 = $y->BNDESB1;

            $this->MasterLokasi_model->Tambah_Lokasi($lmbuid, $lmdesa1);
            redirect('MasterLokasi/index','refresh');
        }   
    }

    public function Hapus_Lokasi($lmidbuid, $lmlocid) {
        $this->MasterLokasi_model->Hapus_Lokasi($lmidbuid, $lmlocid);
        redirect('MasterLokasi/index','refresh');
    }

    public function Edit_Lokasi($lmidbuid, $lmlocid) {
        $data['title'] = 'Master Lokasi';

        $this->form_validation->set_rules('LMWHC', 'Kode Gudang', 'required');
        $this->form_validation->set_rules('LMAISLE', 'Nomor Rak', 'required');
        $this->form_validation->set_rules('LMROW', 'Nomor Baris', 'required');
        $this->form_validation->set_rules('LMCOL', 'Nomor Kolom', 'required');
        $this->form_validation->set_rules('LMDESA2', 'Keterangan', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterLokasi/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $idbuid = $this->input->post('LMIDBUID');
            $x = $this->MasterLokasi_model->getBuid($idbuid);
            $y = $this->MasterLokasi_model->getDesb1($idbuid);

            $lmbuid = $x->BNBUID;
            $lmdesa1 = $y->BNDESB1;

            $this->MasterLokasi_model->Edit_Lokasi($lmidbuid, $lmbuid, $lmdesa1, $lmlocid);
            // die();
            redirect('MasterLokasi/index','refresh');
        }   
    }

}

/* End of file MasterLokasi.php */

?>