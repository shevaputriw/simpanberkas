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
        //menampilkan data opd
        $data['opd'] = $this->MasterLokasi_model->getOpd();
        //menampilkan daftar kabputane/kota
        $data['kodekab'] = $this->MasterLokasi_model->getKode();
        //menampilkan semua data lokasi yang telah ditambahkan
        $data['getAll'] = $this->MasterLokasi_model->getAllData();

        //load view header, index masterlokasi, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('MasterLokasi/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_Lokasi() {
        $data['title'] = 'Master Lokasi';

        // validation rules
        $this->form_validation->set_rules('LMWHC', 'Kode Gudang', 'required');
        $this->form_validation->set_rules('LMAISLE', 'Nomor Rak', 'required');
        $this->form_validation->set_rules('LMROW', 'Nomor Baris', 'required');
        $this->form_validation->set_rules('LMCOL', 'Nomor Kolom', 'required');
        $this->form_validation->set_rules('LMDESA2', 'Keterangan', 'required');

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah lokasi
        if($this->form_validation->run() == FALSE) {
            //load view header, index masterlokasi, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('MasterLokasi/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            //get id dari opd dari input user
            $idbuid = $this->input->post('LMIDBUID');
            //get BNIDBUID dari variabel $idbuid
            $x = $this->MasterLokasi_model->getBuid($idbuid);
            // get BNDESB1 dari variabel $idbuid
            $y = $this->MasterLokasi_model->getDesb1($idbuid);

            $lmbuid = $x->BNBUID;
            $lmdesa1 = $y->BNDESB1;

            //proses insert di MasterLokasi_model
            $this->MasterLokasi_model->Tambah_Lokasi($lmbuid, $lmdesa1);
            //halaman akan me-refresh ke halaman index master lokasi
            redirect('MasterLokasi/index','refresh');
        }   
    }

    public function Hapus_Lokasi($lmidbuid, $lmlocid) {
        //proses hapus di MasterLokasi_model
        $this->MasterLokasi_model->Hapus_Lokasi($lmidbuid, $lmlocid);
        //halaman akan me-refresh ke halaman index master lokasi
        redirect('MasterLokasi/index','refresh');
    }

    public function Edit_Lokasi($lmidbuid, $lmlocid) {
        $data['title'] = 'Master Lokasi';

        // validation rules
        $this->form_validation->set_rules('LMWHC', 'Kode Gudang', 'required');
        $this->form_validation->set_rules('LMAISLE', 'Nomor Rak', 'required');
        $this->form_validation->set_rules('LMROW', 'Nomor Baris', 'required');
        $this->form_validation->set_rules('LMCOL', 'Nomor Kolom', 'required');
        $this->form_validation->set_rules('LMDESA2', 'Keterangan', 'required');

        // jika validation form berjalan false, maka yang ditampilkan adalah form edit lokasi
        if($this->form_validation->run() == FALSE) {
            //load view header, index masterlokasi, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('MasterLokasi/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            //get id dari opd dari input user
            $idbuid = $this->input->post('LMIDBUID');
            //get BNIDBUID dari variabel $idbuid
            $x = $this->MasterLokasi_model->getBuid($idbuid);
            // get BNDESB1 dari variabel $idbuid
            $y = $this->MasterLokasi_model->getDesb1($idbuid);

            $lmbuid = $x->BNBUID;
            $lmdesa1 = $y->BNDESB1;

            //proses edit di MasterLokasi_model
            $this->MasterLokasi_model->Edit_Lokasi($lmidbuid, $lmbuid, $lmdesa1, $lmlocid);
            //halaman akan me-refresh ke halaman index master lokasi
            redirect('MasterLokasi/index','refresh');
        }   
    }
}

/* End of file MasterLokasi.php */

?>