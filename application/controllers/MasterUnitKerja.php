<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterUnitKerja extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('MasterUnitKerja_model');
        $this->load->library('form_validation');
    }

    // DATA UNIT CONTROLLER START
    public function index()
    {
        $data['title'] = 'Master Unit Kerja';

        $data['unitkerja'] = $this->MasterUnitKerja_model->getUnitKerja();

        $this->load->view('template/Header',$data);
        $this->load->view('MasterUnitKerja/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_unit() {
        $data['title'] = 'Tambah Unit Kerja';

        $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();

        $this->form_validation->set_rules('CNCOID', 'Kode', 'required');
        $this->form_validation->set_rules('CNCFY', 'Tahun Fiksal', 'required');
        $this->form_validation->set_rules('CNDESB1', 'Kabupaten/Kota', 'required');
        $this->form_validation->set_rules('CNCAP', 'Bulan', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/TambahUnitKerja',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $this->MasterUnitKerja_model->Tambah_unit();
            redirect('MasterUnitKerja/Tambah_unit','refresh');
        }   
    }

    public function Edit_unit($cncoid) {
        $data['title'] = 'Update Unit Kerja';

        $data['unitkerjabyid'] = $this->MasterUnitKerja_model->getUnitbyId($cncoid);

        $this->form_validation->set_rules('CNCFY', 'Tahun Fiksal', 'required');
        $this->form_validation->set_rules('CNCAP', 'Bulan', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/Edit',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $this->MasterUnitKerja_model->Edit_unit($cncoid);
            redirect('MasterUnitKerja/index','refresh');
        }
    }

    public function Hapus_unit($cncoid) {
        $this->MasterUnitKerja_model->Hapus_unit($cncoid);
        redirect('MasterUnitKerja/index','refresh');
    }
    // DATA UNIT CONTROLLER END

    // DATA OPD CONTROLLER START
    public function OPD() {
        $data['title'] = 'Data OPD';

        $data['getAll'] = $this->MasterUnitKerja_model->Detail_OPD();
        $data['kodekab'] = $this->MasterUnitKerja_model->getKode();
        $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
        $data['tipe'] = $this->MasterUnitKerja_model->TipeUnitKerja();
        $data['relasi'] = $this->MasterUnitKerja_model->GetRelasi();
        $data['pimpinan'] = $this->MasterUnitKerja_model->GetPimpinan();
        $data['jabatan'] = $this->MasterUnitKerja_model->GetJabatan();
        $data['pengurus_barang'] = $this->MasterUnitKerja_model->GetPengurusBarang();

        $this->load->view('template/Header',$data);
        $this->load->view('MasterUnitKerja/Opd',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_OPD() {
        $data['title'] = 'Tambah Unit Kerja';
        $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();

        $this->form_validation->set_rules('BNBUID', 'Kode', 'required');
        $this->form_validation->set_rules('BNDESB1', 'Nama Unit Kerja', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/OPD',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $bnidbuid = $this->input->post('BNBUID');
            
            $string = preg_replace("/[^0-9]/","",$bnidbuid);

            $this->MasterUnitKerja_model->Tambah_opd($string);
            redirect('MasterUnitKerja/OPD','refresh');
        }   
    }

    public function Edit_OPD($bnidbuid) {
        $data['title'] = 'Edit Unit Kerja';

        $data['kodekab'] = $this->MasterUnitKerja_model->getKode();
        $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
        $data['tipe'] = $this->MasterUnitKerja_model->TipeUnitKerja();
        $data['relasi'] = $this->MasterUnitKerja_model->GetRelasi();
        $data['pimpinan'] = $this->MasterUnitKerja_model->GetPimpinan();
        $data['jabatan'] = $this->MasterUnitKerja_model->GetJabatan();
        $data['pengurus_barang'] = $this->MasterUnitKerja_model->GetPengurusBarang();

        $this->form_validation->set_rules('BNBUID', 'Kode', 'required');
        $this->form_validation->set_rules('BNDESB1', 'Nama Unit Kerja', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/Opd',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            $this->MasterUnitKerja_model->Edit_OPD($bnidbuid);
            redirect('MasterUnitKerja/OPD','refresh');
        } 
    }

    public function Hapus_OPD($bnidbuid) {
        $this->MasterUnitKerja_model->Hapus_OPD($bnidbuid);
        redirect('MasterUnitKerja/OPD','refresh');
    }
    // DATA OPD CONTROLLER END
}

/* End of file MasterUnitKerja.php */

?>