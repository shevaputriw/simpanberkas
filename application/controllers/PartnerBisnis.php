<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerBisnis extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('PartnerBisnis_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Partner Bisnis';
        $data['get_t0101'] = $this->PartnerBisnis_model->Get_t0101();

        $this->load->view('template/Header',$data);
        $this->load->view('PartnerBisnis/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_PartnerBisnis() {
        $data['title'] = 'Tambah Partner Bisnis';
        $data['tipe'] = $this->PartnerBisnis_model->getTipe();
        $data['hutang'] = ['Ya', 'Tidak'];
        $data['piutang'] = ['Ya', 'Tidak'];
        $data['karyawan'] = ['Ya', 'Tidak'];
        $data['pimpinan'] = $this->PartnerBisnis_model->getPimpinan();
        $data['jabatan'] = $this->PartnerBisnis_model->getJabatan();
        $data['pengurus_barang'] = $this->PartnerBisnis_model->getPengurusBarang();

        $this->form_validation->set_rules('ADANUM', 'No Identitas', 'required');   
        $this->form_validation->set_rules('ADNM', 'Nama', 'required'); 
        $this->form_validation->set_rules('ADPAN', 'Parent ID', 'required');

        $tanggal = date('d-m-Y');
        $pecah_tgl = explode("-", $tanggal);

        $tanggal = $pecah_tgl[0];
        $bulan = $pecah_tgl[1];
        $tahun = $pecah_tgl[2];

        if($this->form_validation->run() == FALSE) {
            $cek_tahun = $this->PartnerBisnis_model->Cek_tahun($tahun);

            if($cek_tahun->num_rows() == 0) {
                $tambah_tahun = $this->PartnerBisnis_model->Tambah_t0002($tahun); 
                $data['tampil'] = $this->PartnerBisnis_model->Get($tahun);

                $this->load->view('template/Header',$data);
                $this->load->view('PartnerBisnis/Tambah_PartnerBisnis',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $data['tampil'] = $this->PartnerBisnis_model->Get($tahun);

                $this->load->view('template/Header',$data);
                $this->load->view('PartnerBisnis/Tambah_PartnerBisnis',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else{
            $adidanum = $this->input->post('ADIDANUM');
            $x = $adidanum + 1;
            
            $update_nnseq = $this->PartnerBisnis_model->Update($tahun);
            
            $this->PartnerBisnis_model->Tambah_PartnerBisnis($x);
            // $this->PartnerBisnis_model->Update_adidanum($adidanum);

            redirect('PartnerBisnis/index','refresh');
        }
    }

    public function EditPartner($adidanum) {
        $data['title'] = 'Edit Partner Bisnis';

        $data['pb'] = $this->PartnerBisnis_model->GetPartnerById($adidanum);
        $data['tipe'] = $this->PartnerBisnis_model->getTipe();
        $data['hutang'] = ['Ya', 'Tidak'];
        $data['piutang'] = ['Ya', 'Tidak'];
        $data['karyawan'] = ['Ya', 'Tidak'];
        $data['pimpinan'] = $this->PartnerBisnis_model->getPimpinan();
        $data['jabatan'] = $this->PartnerBisnis_model->getJabatan();
        $data['pengurus_barang'] = $this->PartnerBisnis_model->getPengurusBarang();

        $this->form_validation->set_rules('ADANUM', 'Kode', 'required');   
        $this->form_validation->set_rules('ADNM', 'Nama', 'required'); 
        $this->form_validation->set_rules('ADPAN', 'Parent ID', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('PartnerBisnis/Edit_PartnerBisnis',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            $this->PartnerBisnis_model->Edit_PartnerBisnis($adidanum);
            redirect('PartnerBisnis/index','refresh');
        }
    }

    public function HapusPartner($adidanum) {
        $this->PartnerBisnis_model->Hapus_PartnerBisnis($adidanum);
        redirect('PartnerBisnis/index','refresh');
    }
}

/* End of file PartnerBisnis.php */

?>