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
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Master Unit Kerja';
            //menampilkan semua data unit kerja
            $data['unitkerja'] = $this->MasterUnitKerja_model->getUnitKerja();
    
            //load view header, index masterunitkerja, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_unit() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Tambah Unit Kerja';

            //menampilkan semua data opd
            $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
    
            //validation form
            $this->form_validation->set_rules('CNCOID', 'Kode', 'required');
            $this->form_validation->set_rules('CNCFY', 'Tahun Fiksal', 'required');
            $this->form_validation->set_rules('CNDESB1', 'Kabupaten/Kota', 'required');
            $this->form_validation->set_rules('CNCAP', 'Bulan', 'required');
    
            // jika validation form berjalan false, maka yang ditampilkan adalah form tambah unit
            if($this->form_validation->run() == FALSE) {
                //load view header, index tambah masterunitkerja, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('MasterUnitKerja/TambahUnitKerja',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                //proses insert di MasterUnitKerja_model
                $this->MasterUnitKerja_model->Tambah_unit();
                //halaman akan me-refresh ke halaman tambah unit
                redirect('MasterUnitKerja/Tambah_unit','refresh');
            } 
        }
        else {
            redirect('Login/logout');
        }  
    }

    public function Edit_unit($cncoid) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Update Unit Kerja';

            //menampilkan data unit by id, id nya dari cncoid di parameter
            $data['unitkerjabyid'] = $this->MasterUnitKerja_model->getUnitbyId($cncoid);

            // validation form start
            $this->form_validation->set_rules('CNCFY', 'Tahun Fiksal', 'required');
            $this->form_validation->set_rules('CNCAP', 'Bulan', 'required');

            // jika validation form berjalan false, maka yang ditampilkan adalah form tambah unit
            if($this->form_validation->run() == FALSE) {
                //load view header, index edit masterunitkerja, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('MasterUnitKerja/Edit',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                //proses edit di MasterUnitKerja_model
                $this->MasterUnitKerja_model->Edit_unit($cncoid);
                //halaman akan me-refresh ke halaman edit unit
                redirect('MasterUnitKerja/index','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Hapus_unit($cncoid) {
        if (isset($_SESSION['SCUSG'])) {
            //proses hapus di MasterUnitKerja_model
            $this->MasterUnitKerja_model->Hapus_unit($cncoid);
            // halaman akan me-refresh ke halaman index MasterUnitKerja
            redirect('MasterUnitKerja/index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }
    // DATA UNIT CONTROLLER END

    // DATA OPD CONTROLLER START
    public function OPD() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Data OPD';

            //menampilkan semua data opd
            $data['getAll'] = $this->MasterUnitKerja_model->Detail_OPD();
            //menampilkan kode kabupaten mojokerti dari tabel t0020
            $data['kodekab'] = $this->MasterUnitKerja_model->getKode();
            // menampilkan daftar opd pada tabel t0021
            $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
            //menampilkan tipe unit kerja
            $data['tipe'] = $this->MasterUnitKerja_model->TipeUnitKerja();
            //menampilkan relasi unit kerja
            $data['relasi'] = $this->MasterUnitKerja_model->GetRelasi();
            //menampilkan nama pimpinan dari tabel t0101
            $data['pimpinan'] = $this->MasterUnitKerja_model->GetPimpinan();
            //menampilkan daftar jabatan dari tabel t0009
            $data['jabatan'] = $this->MasterUnitKerja_model->GetJabatan();
            //menampilkan nama pengurus barang dari t0101
            $data['pengurus_barang'] = $this->MasterUnitKerja_model->GetPengurusBarang();

            //load view header, halaman daftar opd, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('MasterUnitKerja/Opd',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Tambah_OPD() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Tambah Unit Kerja';
            // menampilkan daftar opd yang ada di tabel t0021
            $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
    
            //form validation start
            $this->form_validation->set_rules('BNBUID', 'Kode', 'required');
            $this->form_validation->set_rules('BNDESB1', 'Nama Unit Kerja', 'required');
    
            // jika validation form berjalan false, maka yang ditampilkan adalah form tambah opd
            if($this->form_validation->run() == FALSE) {
                //load view header, halaman daftar opd, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('MasterUnitKerja/OPD',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                //mengampil BNIDBUID dari input user
                $bnidbuid = $this->input->post('BNBUID');
                
                // mengubah inputan di variabel $bnidbuid menjadi number
                $string = preg_replace("/[^0-9]/","",$bnidbuid);
    
                // insert data opd di MasterUnitKerja_model
                $this->MasterUnitKerja_model->Tambah_opd($string);
                // halaman akan me-refresh ke halaman daftar opd
                redirect('MasterUnitKerja/OPD','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }   
    }

    public function Edit_OPD($bnidbuid) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Edit Unit Kerja';

            //menampilkan kode kabupaten mojokerti dari tabel t0020
            $data['kodekab'] = $this->MasterUnitKerja_model->getKode();
            // menampilkan daftar opd pada tabel t0021
            $data['unitkerja'] = $this->MasterUnitKerja_model->getOpd();
            //menampilkan tipe unit kerja
            $data['tipe'] = $this->MasterUnitKerja_model->TipeUnitKerja();
            //menampilkan relasi unit kerja
            $data['relasi'] = $this->MasterUnitKerja_model->GetRelasi();
            //menampilkan nama pimpinan dari tabel t0101
            $data['pimpinan'] = $this->MasterUnitKerja_model->GetPimpinan();
            //menampilkan daftar jabatan dari tabel t0009
            $data['jabatan'] = $this->MasterUnitKerja_model->GetJabatan();
            //menampilkan nama pengurus barang dari t0101
            $data['pengurus_barang'] = $this->MasterUnitKerja_model->GetPengurusBarang();
    
            // validation form start
            $this->form_validation->set_rules('BNBUID', 'Kode', 'required');
            $this->form_validation->set_rules('BNDESB1', 'Nama Unit Kerja', 'required');
    
            // jika validation form berjalan false, maka yang ditampilkan adalah form edit opd
            if($this->form_validation->run() == FALSE) {
                //load view header, halaman daftar opd, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('MasterUnitKerja/Opd',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                // edit data opd di MasterUnitKerja_model sesuai dengan bnidbuid
                $this->MasterUnitKerja_model->Edit_OPD($bnidbuid);
                // halaman akan me-refresh ke halaman daftar opd
                redirect('MasterUnitKerja/OPD','refresh');
            }
        }
        else {
            redirect('Login/logout');
        } 
    }

    public function Hapus_OPD($bnidbuid) {
        if (isset($_SESSION['SCUSG'])) {
            // hapus data opd di MasterUnitKerja_model sesuai dengan bnidbuid
            $this->MasterUnitKerja_model->Hapus_OPD($bnidbuid);
            // halaman akan me-refresh ke halaman daftar opd
            redirect('MasterUnitKerja/OPD','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }
    // DATA OPD CONTROLLER END
}

/* End of file MasterUnitKerja.php */

?>