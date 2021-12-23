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
        // menampilkan daftar partner bisnis di tabel t0101
        $data['get_t0101'] = $this->PartnerBisnis_model->Get_t0101();

        //load view header, halaman index partner bisnis, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('PartnerBisnis/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Tambah_PartnerBisnis() {
        $data['title'] = 'Tambah Partner Bisnis';

        // menampilkan tipe partner bisnis
        $data['tipe'] = $this->PartnerBisnis_model->getTipe();
        // isi kolom hutang, piutang, dan karyawan adalah enum berisi 'ya' atau 'tidak'
        $data['hutang'] = ['Ya', 'Tidak'];
        $data['piutang'] = ['Ya', 'Tidak'];
        $data['karyawan'] = ['Ya', 'Tidak'];
        // menampilkan daftar nama pimpinan dari daftar karyawan di tabel t0101
        $data['pimpinan'] = $this->PartnerBisnis_model->getPimpinan();
        // menampilkan daftar jabatan
        $data['jabatan'] = $this->PartnerBisnis_model->getJabatan();
        // menampilkan daftar nama pengurus barang dari daftar karyawan di tabel t0101
        $data['pengurus_barang'] = $this->PartnerBisnis_model->getPengurusBarang();

        // validation form start
        $this->form_validation->set_rules('ADANUM', 'No Identitas', 'required');   
        $this->form_validation->set_rules('ADNM', 'Nama', 'required'); 
        $this->form_validation->set_rules('ADPAN', 'Parent ID', 'required');

        // mengambil data bulan dan tahun fiksal dari tabel t0020
        $getTahunBulan = $this->PartnerBisnis_model->getTahunBulan();
        // menyimpan tahun
        $tahun = $getTahunBulan->CNCFY;
        // menyimpan bulan
        $bulan = $getTahunBulan->CNCAP;

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah partner bisnis
        if($this->form_validation->run() == FALSE) {
            // lihat prosedur penomoran AD pada tabel t0002. NNRSMT nya adalah CY, maka reset NNSEQnya adalah per tahun.
            // variabel cek tahun adalah untuk memeriksa apakah data tahun yang diambil sudah ada atau belum di tabel t0002
            $cek_tahun = $this->PartnerBisnis_model->Cek_tahun($tahun);

            // jika hasil dari $cek_tahun masih kosong
            if($cek_tahun->num_rows() == 0) {
                //lakukan insert data ke tabel t0002 dengan NNSEQ = 0
                $tambah_tahun = $this->PartnerBisnis_model->Tambah_t0002($tahun); 
                // get NNSEQ dari tahun yang diambil (hidden)
                $data['tampil'] = $this->PartnerBisnis_model->Get($tahun);

                //load view header, halaman tambah partner bisnis, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('PartnerBisnis/Tambah_PartnerBisnis',$data);
                $this->load->view('template/Footer',$data);
            }
            // jika hasil dari $cek_hasil menunjukkan adanya data maka tidak ada action yang dijalankan, hanya menampilkan form tambah partner bisni
            else{
                // get NNSEQ dari tahun yang diambil (hidden)
                $data['tampil'] = $this->PartnerBisnis_model->Get($tahun);

                //load view header, halaman tambah partner bisnis, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('PartnerBisnis/Tambah_PartnerBisnis',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else{
            // get input nomor dokumen tipe AD (hidden)
            $adidanum = $this->input->post('ADIDANUM');
            // nomor dokumen + 1 karena akan menambah data baru
            $x = $adidanum + 1;
            // update NNSEQ sesuai tahun yang diambil dan tipe dkumen AD
            $update_nnseq = $this->PartnerBisnis_model->Update($tahun);
            
            // insert partner bisnis di PartnerBisnis_model
            $this->PartnerBisnis_model->Tambah_PartnerBisnis($x);
            // $this->PartnerBisnis_model->Update_adidanum($adidanum);

            // halaman akan me-refresh ke halaman index partner bisnis
            redirect('PartnerBisnis/index','refresh');
        }
    }

    public function EditPartner($adidanum) {
        $data['title'] = 'Edit Partner Bisnis';

        // menampilkan partner bisnis sesuai dengan adidanum
        $data['pb'] = $this->PartnerBisnis_model->GetPartnerById($adidanum);
        // menampilkan tipe partner bisnis
        $data['tipe'] = $this->PartnerBisnis_model->getTipe();
        // isi kolom hutang, piutang, dan karyawan adalah enum berisi 'ya' atau 'tidak'
        $data['hutang'] = ['Ya', 'Tidak'];
        $data['piutang'] = ['Ya', 'Tidak'];
        $data['karyawan'] = ['Ya', 'Tidak'];
        // menampilkan daftar nama pimpinan dari daftar karyawan di tabel t0101
        $data['pimpinan'] = $this->PartnerBisnis_model->getPimpinan();
        // menampilkan daftar jabatan
        $data['jabatan'] = $this->PartnerBisnis_model->getJabatan();
        // menampilkan daftar nama pengurus barang dari daftar karyawan di tabel t0101
        $data['pengurus_barang'] = $this->PartnerBisnis_model->getPengurusBarang();

        // validation form start
        $this->form_validation->set_rules('ADANUM', 'Kode', 'required');   
        $this->form_validation->set_rules('ADNM', 'Nama', 'required'); 
        $this->form_validation->set_rules('ADPAN', 'Parent ID', 'required');

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah partner bisnis
        if($this->form_validation->run() == FALSE) {
            //load view header, halaman edit partner bisnis, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('PartnerBisnis/Edit_PartnerBisnis',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            // edit partner bisnis di PartnerBisnis_model
            $this->PartnerBisnis_model->Edit_PartnerBisnis($adidanum);
            // halaman akan me-refresh ke halaman index partner bisnis
            redirect('PartnerBisnis/index','refresh');
        }
    }

    public function HapusPartner($adidanum) {
        // delete partner bisnis di PartnerBisnis_model
        $this->PartnerBisnis_model->Hapus_PartnerBisnis($adidanum);
        // halaman akan me-refresh ke halaman index partner bisnis
        redirect('PartnerBisnis/index','refresh');
    }
}

/* End of file PartnerBisnis.php */

?>