<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BerkasBaru extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('BerkasBaru_model');
        $this->load->library('form_validation');
    }
    
    public function index()
    {
        $data['title'] = 'Berkas Baru';
        // menampilkan seluruh berkas baru yang ditambahkan di status draft, pengajuan berkas baru, dan verifikasi berkas baru (opd)
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();

        //load header, halaman index berkas baru, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Berkas_baru_bpkad_pengajuan() {
        $data['title'] = 'Berkas Baru';
        // menampilkan seluruh berkas baru yang ditambahkan di status draft, pengajuan berkas baru, dan verifikasi berkas baru (bpkad)
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas_bpkad();
        // $data['getAllBerkas'] = $this->BerkasBaru_model->Berkas_bpkad();
 
        //load header, halaman berkas baru bpkad, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/Berkas_baru_bpkad',$data);
        $this->load->view('template/Footer',$data);
    }

    public function daftar_berkas() {
        $data['title'] = 'Berkas Baru';
        // meampilkan daftar semua berkas yang diserahkan oleh opd ke bpkad
        $data['getAllBerkas'] = $this->BerkasBaru_model->daftar_berkas();
 
        //load header, halaman daftar berkas baru bpkad, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/Daftar_berkas',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Detail($ovdocno) {
        $data['title'] = 'Detail Berkas';
        // menampilkan detail berkas pada nomor dokumen tertentu untuk menampilkan berkas apa saja yang diserahkan
        $data['get_berkas'] = $this->BerkasBaru_model->getBerkas($ovdocno);
        // menampilkan informasi detail dari berkas yang dipinjam 
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);

        //load header, halaman detail berkas baru bpkad, dan footer
        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/Detail_Berkas',$data);
        $this->load->view('template/Footer',$data);
    }

    public function get_Kecamatan($dtdc)
    {
        // menampilkan daftar nama kecamatan sesuai dengan kode kabubapten/kota yang dipilih user ($dtdc)
        $data = $this->BerkasBaru_model->getKecamatan($dtdc);
        echo json_encode($data);
    }

    public function get_Desa($dtdc1)
    {
        // menampilkan daftar nama desa sesuai dengan kode kecamatan yang dipilih user ($dtdc1)
        $data = $this->BerkasBaru_model->getDesa($dtdc1);
        echo json_encode($data);
    }

    public function get_Lokasi($idbuid)
    {
        // menampilkan daftar lokasi sesuai dengan opd yang dipilih oleh user
        $data = $this->BerkasBaru_model->getLokasi($idbuid);
        echo json_encode($data);
    }

    // public function get_Sertifikat()
    // {
    //     $data = $this->BerkasBaru_model->getSertifikat();
    //     echo json_encode($data);
    // }

    // public function get_Kendaraan()
    // {
    //     $data = $this->BerkasBaru_model->getKendaraan();
    //     echo json_encode($data);
    // }

    public function Halaman_Tambah() 
    {
        $data['title'] = 'Tambah Berkas Baru';

        // menampilkan daftar nama opd
        $data['opd'] = $this->BerkasBaru_model->getOpd();
        // menampilkan jenis berkas yang akan di-input (bpkb/sertifikat tanah)
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        // menampilkan nama kabupaten/kota (mojokerto)
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        // menampilkan kode barang
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        // get data CNCOID = 16 (kode kab. mojokerto)
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        // validation form start
        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        // get data tahun dan bulan fiksal
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        // menyimpan data tahun
        $tahun = $getTahunBulan->CNCFY;
        // menyimpan data bulan
        $bulan = $getTahunBulan->CNCAP;

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah berkas baru
        if($this->form_validation->run() == FALSE) {
            // lihat prosedur penomoran OV pada tabel t0002. NNRSMT nya adalah CM, maka reset NNSEQnya adalah per bulan.
            // variabel cek adalah untuk memeriksa apakah data tahun dan bulan yang diambil sudah ada atau belum di tabel t0002
            $cek = $this->BerkasBaru_model->Cek($tahun, $bulan);

            // jika data tidak ditemukan
            if($cek->num_rows() == 0) {
                // melakukan insert ke tabel t0002 dengan NNSEQ = 0
                $tambah_tahun = $this->BerkasBaru_model->Tambah_t0002($tahun, $bulan);
                // get nomor dokumen sesuai dengan NNSEQ yang akan ditampilkan pada form dengan type hidden
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                //load header, halaman tambah berkas baru, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                // get nomor dokumen sesuai dengan NNSEQ yang akan ditampilkan pada form dengan type hidden
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                //load header, halaman tambah berkas baru, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else {
            // update NNSEQ ketika semua data berhasil di-input
            $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);

            // ambil inputan user nomor dokumen, tgl dokumen, id opd, dan kode barang
            $ovdocno = $this->input->post('OVDOCNO');
            $ovdocdt = $this->input->post('OVDOCDT');
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovidinum = $this->input->post('OVINUM');

            //split tanggal dokumen dan dimasukkan ke dalam array
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];

            // get data ovbuid1 di t0021 sesuai id dari opd yang dipilih untuk diisikan ke tabel t4312 (berkas baru)
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            // get data line type = B
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            // get status = 0/draft
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;
            //get id kode barang dan amglcls = aset untuk diasukkan ke dalam tabel t4312
            $id = $this->BerkasBaru_model->getIdinum($ovidinum);
            $idinum = $id->AMOAN;
            $glcls = $id->AMGLCLS;

            //DIGUNAKAN JIKA DATA ICU PADA T0002 DALAM KEADAAN KOSONG. KARENA SUDAH ADA DAN NNRSMT NYA ADA NO RESET MAKA AKAN TERUS TER-UPDATE
            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // if($cekICU->num_rows() == 0) {
            //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
            // }
            // else{
                //NNSEQ + 1 (ICU)
                // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
            // $this->BerkasBaru_model->Update_ICU($tahun);
            // }

            // update NNSEQ icu di t0002 (setiap transaksi barang memiliki ICU yang berbeda)
            $this->BerkasBaru_model->Update_ICU($tahun);

            // get NNSEQ ICU di tabel t0002
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            // prosedur penomoran dokumen ICU adalah 9 digit diikuti dengan NNSEQnya *misal = 000000140
            $no = sprintf("%09d", $nnseqICU);

            // jika opd tidak memiliki ovbuid1 (ovbuid1 = 0)
            if($ovbuid1->BNBUID1 == 0) {
                // set 0 untuk buid1
                $buid1 = 0;
                // update nomor dokumen dengan + 1
                $x = $ovdocno + 1;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no, $idinum, $glcls);
            }
            else{
                // update nomor dokumen dengan + 1
                $x = $ovdocno + 1;
                // set buid1 dengan id opd yang telah disimpan dalan variabel $ovidbuid1
                $buid1 = $ovbuid1->BNBUID1;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no, $idinum, $glcls);
            }
            // me-refresh ke halaman index berkas baru 
            redirect('BerkasBaru/index','refresh');
        }  
    }

    public function Simpan_Tambah() {
        $data['title'] = 'Tambah Berkas';

        // menampilkan jenis berkas yang akan di-input (bpkb/sertifikat tanah)
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        // menampilkan nama kabupaten/kota (mojokerto)
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        // menampilkan kode barang
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        // get data CNCOID = 16 (kode kab. mojokerto)
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        // validation form start
        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        // get data tahun dan bulan fiksal
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        // menyimpan data tahun
        $tahun = $getTahunBulan->CNCFY;
        // menyimpan data bulan
        $bulan = $getTahunBulan->CNCAP;

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah berkas baru
        if($this->form_validation->run() == FALSE) {
            // lihat prosedur penomoran OV pada tabel t0002. NNRSMT nya adalah CM, maka reset NNSEQnya adalah per bulan.
            // variabel cek adalah untuk memeriksa apakah data tahun dan bulan yang diambil sudah ada atau belum di tabel t0002
            $cek = $this->BerkasBaru_model->Cek($tahun, $bulan);

            // jika data tidak ditemukan
            if($cek->num_rows() == 0) {
                // melakukan insert ke tabel t0002 dengan NNSEQ = 0
                $tambah_tahun = $this->BerkasBaru_model->Tambah_t0002($tahun, $bulan);
                // get nomor dokumen sesuai dengan NNSEQ yang akan ditampilkan pada form dengan type hidden
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                //load header, halaman tambah berkas baru, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                // get nomor dokumen sesuai dengan NNSEQ yang akan ditampilkan pada form dengan type hidden
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                //load header, halaman tambah berkas baru, dan footer
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else {
            // update NNSEQ sesuai dengan tahun dan bulan yang diambil
            $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);

            // ambil inputan user nomor dokumen, tgl dokumen, id opd, dan kode barang
            $ovdocno = $this->input->post('OVDOCNO');
            $ovdocdt = $this->input->post('OVDOCDT');
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovidinum = $this->input->post('OVINUM');

            //split tanggal dokumen dan dimasukkan ke dalam array
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];
            
            // get data ovbuid1 di t0021 sesuai id dari opd yang dipilih untuk diisikan ke tabel t4312 (berkas baru)
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            // get data line type = B
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            // get status = 0/draft
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            //get id kode barang dan amglcls = aset untuk diasukkan ke dalam tabel t4312
            $id = $this->BerkasBaru_model->getIdinum($ovidinum);
            $idinum = $id->AMOAN;
            $glcls = $id->AMGLCLS;

            //DIGUNAKAN JIKA DATA ICU PADA T0002 DALAM KEADAAN KOSONG. KARENA SUDAH ADA DAN NNRSMT NYA ADA NO RESET MAKA AKAN TERUS TER-UPDATE
            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // if($cekICU->num_rows() == 0) {
            //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
            // }
            // else{
                //NNSEQ + 1 (ICU)
                // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
            // $this->BerkasBaru_model->Update_ICU($tahun);
            // }

            // update NNSEQ icu di t0002 (setiap transaksi barang memiliki ICU yang berbeda)
            $this->BerkasBaru_model->Update_ICU($tahun);

            // get NNSEQ ICU di tabel t0002
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            // prosedur penomoran dokumen ICU adalah 9 digit diikuti dengan NNSEQnya *misal = 000000140
            $no = sprintf("%09d", $nnseqICU);

            // jika opd tidak memiliki ovbuid1 (ovbuid1 = 0)
            if($ovbuid1->BNBUID1 == 0) {
                // set 0 untuk buid1
                $buid1 = 0;
                // update nomor dokumen dengan + 1
                $x = $ovdocno + 1;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no, $idinum, $glcls);
            }
            else{
                // update nomor dokumen dengan + 1
                $x = $ovdocno + 1;
                // set buid1 dengan id opd yang telah disimpan dalan variabel $ovidbuid1
                $buid1 = $ovbuid1->BNBUID1;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no, $idinum, $glcls);
            }
            // me-refresh ke halaman tambah baru sesuai nomor dokumen yang ter-insert
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }  
    }

    // $x = ovdocno;
    // NOTED! 1 dokumen bisa memuat lebih dari 1 berkas; Halaman ini akan menampilkan semua berkas yang terkandung dalam nomor dokumen $x
    public function Tambah_Baru($x, $ovidbuid) {
        $data['title'] = 'Tambah Berkas Baru 2';

        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();
        $data['get_data'] = $this->BerkasBaru_model->GetData($x, $ovidbuid);
        // $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($x);
        $data['opd'] = $this->BerkasBaru_model->GetOpdById($x, $ovidbuid);
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        // get data tahun dan bulan fiksal
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        // get data tahun fiksal
        $tahun = $getTahunBulan->CNCFY;
        // get data bulan fiksal
        $bulan = $getTahunBulan->CNCAP;

        // validation form start
        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah berkas baru
        if($this->form_validation->run() == FALSE) {
            // load view header, halaman tambah berkas, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Tambah_Berkas2',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            // get data tanggal dokumen, id opd, dan kode barang
            $ovdocdt = $this->input->post('OVDOCDT');
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovidinum = $this->input->post('OVINUM');

            // pisah tanggal by "-" kemudian dimasukkan ke dalam array
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];

            // mengambil ovdocsq (sequence dari nomor dokumen $x) terakhir
            $cek_ovdocsq = $this->BerkasBaru_model->Cek_ovdocsq($x);
            // ovdocsq+10 => karena urutan menggunakan format 10,20,30,...
            $ovdocsq = $cek_ovdocsq->OVDOCSQ + 10;

            // get data ovbuid1 di t0021 sesuai id dari opd yang dipilih untuk diisikan ke tabel t4312 (berkas baru)
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            // get data line type = B
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            // get status = 0/draft
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            //get id kode barang dan amglcls = aset untuk diasukkan ke dalam tabel t4312
            $id = $this->BerkasBaru_model->getIdinum($ovidinum);
            $idinum = $id->AMOAN;
            $glcls = $id->AMGLCLS;

            // update ICU + 1
            $this->BerkasBaru_model->Update_ICU($tahun);
            // get ICU barang terakhir yang paling ter-update
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            // prosedur penomoran dokumen ICU adalah 9 digit diikuti dengan NNSEQnya *misal = 000000140
            $no = sprintf("%09d", $nnseqICU);

            // jika opd tidak memiliki ovbuid1 (ovbuid1 = 0)
            if($ovbuid1->BNBUID1 == 0) {
                // set 0 untuk buid1
                $buid1 = 0;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no, $idinum, $glcls);
            }
            else{
                // set buid1 dengan id opd yang telah disimpan dalan variabel $ovidbuid1
                $buid1 = $ovbuid1->BNBUID1;
                // insert semua data ke tabel t4312 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // insert semua data ke tabel t4111 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no, $idinum, $glcls);
            }
            // me-refresh ke halaman tambah baru sesuai nomor dokumen yang ter-insert
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }
    }

    public function Edit_Berkas2($x, $ovidbuid) {
        $data['title'] = 'Tambah Berkas Baru 2';

        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();
        $data['get_data'] = $this->BerkasBaru_model->GetData($x, $ovidbuid);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($x);
        $data['opd'] = $this->BerkasBaru_model->GetOpdById($x, $ovidbuid);
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        // get status = 0/draft
        $ovpost = $this->BerkasBaru_model->getStatusDraft();
        $status = $ovpost->DTDC;
        // ubah status jadi approval->draft di t4312 dan t4111 OV IT
        $this->BerkasBaru_model->UbahKeDraft($x, $ovidbuid, $status);

        // validation form start
        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        // jika validation form berjalan false, maka yang ditampilkan adalah form tambah berkas baru
        if($this->form_validation->run() == FALSE) {
            // load view header, halaman edit berkas, dan footer
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Tambah_Berkas2',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            // get data tanggal dokumen, id opd, dan kode barang
            $ovdocdt = $this->input->post('OVDOCDT');
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovidinum = $this->input->post('OVINUM');

            // pisah tanggal by "-" kemudian dimasukkan ke dalam array
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];

            // mengambil ovdocsq (sequence dari nomor dokumen $x) terakhir
            $cek_ovdocsq = $this->BerkasBaru_model->Cek_ovdocsq($x);
            // ovdocsq+10 => karena urutan menggunakan format 10,20,30,...
            $ovdocsq = $cek_ovdocsq->OVDOCSQ + 10;

            // get data ovbuid1 di t0021 sesuai id dari opd yang dipilih untuk diisikan ke tabel t4312 (berkas baru)
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            // get data line type = B
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            // get status = 0/draft
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            //get id kode barang dan amglcls = aset untuk diasukkan ke dalam tabel t4312
            $id = $this->BerkasBaru_model->getIdinum($ovidinum);
            $idinum = $id->AMOAN;
            $glcls = $id->AMGLCLS;

            // get ICU barang terakhir yang paling ter-update
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            // prosedur penomoran dokumen ICU adalah 9 digit diikuti dengan NNSEQnya *misal = 000000140
            $no = sprintf("%09d", $nnseqICU);

            // jika opd tidak memiliki ovbuid1 (ovbuid1 = 0)
            if($ovbuid1->BNBUID1 == 0) {
                // set 0 untuk buid1
                $buid1 = 0;
                // edit semua data ke tabel t4312 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // edit semua data ke tabel t4111 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no, $idinum, $glcls);
            }
            else{
                // set buid1 dengan id opd yang telah disimpan dalan variabel $ovidbuid1
                $buid1 = $ovbuid1->BNBUID1;
                // edit semua data ke tabel t4312 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no, $idinum, $glcls);
                // edit semua data ke tabel t4111 dengan tipe dokumen OV dengan nomor dokumen yang sama ($x)
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no, $idinum, $glcls);
            }
            // me-refresh ke halaman tambah baru sesuai nomor dokumen yang ter-insert
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }
    }

    // perubahan status dokumen dari "draft" menjadi "approval/diusulkan oleh opd/berkas baru"
    public function Approval($ovidbuid, $ovdocno, $ovdocty) {
        $data['title'] = 'Berkas Baru';
        // menampilkan semua dokumen berkas baru
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();

        //cek dokumen berkas baru dengan tipe dokumen IT pada nomor dokumen $x di tabel t4111 apakah ada atau tidak
        $cekIT = $this->BerkasBaru_model->cekIT($ovdocno);

        //Get tahun dan bulan fiksa di tabel t0020
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        // get data tahun fiksal
        $tahun = $getTahunBulan->CNCFY;
        // get data bulan fiksal
        $bulan = $getTahunBulan->CNCAP;

        // jika pemeriksaan pada variabel $cekIT tidak ditemukannya data
        if($cekIT->num_rows() == 0) {
            // get status "1/berkas baru"
            $getStatus = $this->BerkasBaru_model->getStatusApprov();
            $status = $getStatus->DTDC;

            // edit status => 1 di t4312 dan t4111 dengan nomor dokumen $ovdocno
            $this->BerkasBaru_model->Edit_Status($ovdocno, $status);

            //Periksa tahun dan bulan sudah ada di t0002 atau belum
            $cek = $this->BerkasBaru_model->Cek_IT($tahun, $bulan);

            // jika pada variabel $cek tidak ditemukan data
            if($cek->num_rows() == 0) {
                // insert data ke tabel t0002 dengan tipe dokumen IT
                $this->BerkasBaru_model->Tambah_t0002_IT($tahun, $bulan);
            }
            // jika pada variabel $cek ditemukan data
            else {
                // update NNSEQ terakhir (NNSEQ + 1) pada tabel t0002 dengan tipe dokumen IT
                $this->BerkasBaru_model->Update_IT($tahun, $bulan);

                // Mengambil data NNSEQ terakhir di t0002 dengan tipe dokumen IT
                $getIT = $this->BerkasBaru_model->getIT($tahun, $bulan);
                // mengatur 5 digit terakhir pada nomor dokumen yang diikuti dengan NNSEQ
                $nnseq= $getIT->NNSEQ;
                $fzeropadded = sprintf("%05d", $nnseq);
                // mengambil 2 digit terakhir tahun fiksa
                $nnyr = $getIT->NNYR;
                $x = substr($nnyr, 2);
                // menampilkan 2 digit dari tahun fiksal
                $nnmo = $getIT->NNMO;
                $fzeropadded2 = sprintf("%02d", $nnmo);
                // array $docno untuk menyimpan nilai dari variabel $fzeropadded, $x, dan #fzeropadded2
                $docno = [
                    'a' => $x,
                    'b' => $fzeropadded2,
                    'c' => $fzeropadded
                ];

                // mengambil NNSEQ ICU terakhir
                $getICU = $this->BerkasBaru_model->getICU($tahun);
                $nnseqICU= $getICU->NNSEQ;
                // prosedur penomoran dokumen ICU adalah 9 digit diikuti dengan NNSEQnya *misal = 000000140
                $no = sprintf("%09d", $nnseqICU);

                // get status => 2/approval/diusulkan opd/berkasbaru
                $getStatus = $this->BerkasBaru_model->getStatusApprov();
                $status = $getStatus->DTDC;     
                
                //Mendapatkan berkas yang akan diusulkan OPD di t4111
                $getDataApprov = $this->BerkasBaru_model->getDataApprov($ovidbuid, $ovdocno, $ovdocty);
                // deklarasi array pada variabel $result untuk penyimpanan data sementara sebelum di-insert
                $result = array();
                // set timezone Indonesia
                date_default_timezone_set('Asia/Jakarta');
                // mengambil ip pengakses
                $ip = $_SERVER['REMOTE_ADDR'];
                // deklarasi variabel untuk insert ke t4111
                $ituid = "admin1";
                $docty = "IT";
                $iticut = "I";
                $itft = "F";
                $itft2 = "T";
                $itqtyf = "-1";
                $itqtyt = "1";
                $sq = 10;
                // get id bpkad
                $idbuid = $this->BerkasBaru_model->getBnidbuid();
                $itidbuid = $idbuid->BNIDBUID;
                // get locid (kode lokasi penyimpanan) milik bpkad
                $locid = $this->BerkasBaru_model->getLocid();
                $itlocid = $locid->LMLOCID;

                // FROM OPD (RECORD 1; tipe dokumen => IT (berkas baru))
                foreach($getDataApprov as $gda) :
                    $data_array = array(             
                        'ITCOID' => $gda['ITCOID'],
                        'ITIDBUID' => $gda['ITIDBUID'],
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $gda['ITBUID1'],
                        'ITLNTY' => $gda['ITLNTY'],
                        'ITICU' => $gda['ITICU'],
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => $gda['ITDOCTM'],
                        'ITMSTY' => $gda['ITMSTY'],
                        'ITFT' => $itft,
                        'ITIDINUM' => $gda['ITIDINUM'],
                        'ITGLCLS' => $gda['ITGLCLS'],
                        'ITUOM1' => $gda['ITUOM1'],
                        'ITINUM' => $gda['ITINUM'],
                        'ITLOCID' => $gda['ITLOCID'],
                        'ITDESB1' => $gda['ITDESB1'],
                        'ITPOST' => $status,
                        'ITBRAND' => $gda['ITBRAND'],
                        'ITCOLOR' => $gda['ITCOLOR'],
                        'ITLENGTH' => $gda['ITLENGTH'],
                        'ITWIDTH' => $gda['ITWIDTH'],
                        'ITWIDE' => $gda['ITWIDE'],
                        'ITCILCAP' => $gda['ITCILCAP'],
                        'ITMFN' => $gda['ITMFN'],
                        'ITMACHNID' => $gda['ITMACHNID'],
                        'ITVHRN' => $gda['ITVHRN'],
                        'ITVHTAXDT' => $gda['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $gda['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $gda['ITLNDOWNST'],
                        'ITCRTFID' => $gda['ITCRTFID'],
                        'ITCRTFDT' => $gda['ITCRTFDT'],
                        'ITASADDR' => $gda['ITASADDR'],
                        'ITCITY' => $gda['ITCITY'],
                        'ITDIST' => $gda['ITDIST'],
                        'ITSUBDIST' => $gda['ITSUBDIST'],
                        'ITMANAGE' => $gda['ITMANAGE'],
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $gda['ITCOMV'],
                        'ITQTY' => $itqtyf,
                        'ITDOCONO' => $gda["ITDOCNO"],
                        'ITDOCOTY' => $gda["ITDOCTY"],
                        'ITDOCOSQ' => $gda["ITDOCSQ"]
                    );
                    array_push($result, $data_array);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result);

                // //Mendapatkan berkas yang akan diusulkan OPD di t4111 (berkas yang baru di-insert pada kode di atas)
                $getDataApprov2 = $this->BerkasBaru_model->getDataApprov2($ovdocno, $itft);
                // deklarasi array pada variabel $result untuk penyimpanan data sementara sebelum di-insert
                $result2 = array();
                // TO BPKAD (RECORD 2; tipe dokumen => IT (berkas baru))
                foreach($getDataApprov2 as $gda2) :
                    $data_array2 = array(             
                        'ITCOID' => $gda2['ITCOID'],
                        'ITIDBUID' => $itidbuid,
                        'ITDOCNO' => $gda2['ITDOCNO'],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $gda2['ITBUID1'],
                        'ITLNTY' => $gda2['ITLNTY'],
                        'ITICU' => $gda2['ITICU'],
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $gda2['ITDOCMO'],
                        'ITDOCYR' => $gda2['ITDOCYR'],
                        'ITDOCTM' => $gda2['ITDOCTM'],
                        'ITMSTY' => $gda2['ITMSTY'],
                        'ITFT' => $itft2,
                        'ITIDINUM' => $gda2['ITIDINUM'],
                        'ITGLCLS' => $gda2['ITGLCLS'],
                        'ITUOM1' => $gda2['ITUOM1'],
                        'ITINUM' => $gda2['ITINUM'],
                        'ITLOCID' => $itlocid,
                        'ITDESB1' => $gda2['ITDESB1'],
                        'ITPOST' => $status,
                        'ITBRAND' => $gda2['ITBRAND'],
                        'ITCOLOR' => $gda2['ITCOLOR'],
                        'ITLENGTH' => $gda2['ITLENGTH'],
                        'ITWIDTH' => $gda2['ITWIDTH'],
                        'ITWIDE' => $gda2['ITWIDE'],
                        'ITCILCAP' => $gda2['ITCILCAP'],
                        'ITMFN' => $gda2['ITMFN'],
                        'ITMACHNID' => $gda2['ITMACHNID'],
                        'ITVHRN' => $gda2['ITVHRN'],
                        'ITVHTAXDT' => $gda2['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $gda2['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $gda2['ITLNDOWNST'],
                        'ITCRTFID' => $gda2['ITCRTFID'],
                        'ITCRTFDT' => $gda2['ITCRTFDT'],
                        'ITASADDR' => $gda2['ITASADDR'],
                        'ITCITY' => $gda2['ITCITY'],
                        'ITDIST' => $gda2['ITDIST'],
                        'ITSUBDIST' => $gda2['ITSUBDIST'],
                        'ITMANAGE' => $gda2['ITMANAGE'],
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $gda2['ITCOMV'],
                        'ITQTY' => $itqtyt,
                        'ITDOCONO' => $gda2["ITDOCONO"],
                        'ITDOCOTY' => $gda2["ITDOCOTY"],
                        'ITDOCOSQ' => $gda2["ITDOCSQ"]
                    );
                    array_push($result2, $data_array2);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result2);
            }
        }
        else {
            // get status => 2/approval/diusulkan opd/berkas baru
            $getStatus = $this->BerkasBaru_model->getStatusApprov();
            $status = $getStatus->DTDC; 
            // ketika terjadi penambahan
            $check = $this->BerkasBaru_model->Check_It();
            if($check->num_rows() > 0) {
                //Prosedur Penomoran Tipe Dokumen IT
                $getIT = $this->BerkasBaru_model->getIT($tahun, $bulan);

                $nnseq= $getIT->NNSEQ;
                $fzeropadded = sprintf("%05d", $nnseq);

                $nnyr = $getIT->NNYR;
                $x = substr($nnyr, 2);

                $nnmo = $getIT->NNMO;
                $fzeropadded2 = sprintf("%02d", $nnmo);
                
                $docno = [
                    'a' => $x,
                    'b' => $fzeropadded2,
                    'c' => $fzeropadded
                ];
                $getICU = $this->BerkasBaru_model->getICU($tahun);
                $nnseqICU= $getICU->NNSEQ;
                $n = $this->BerkasBaru_model->getItdocsqIt($ovdocno);
                $x = $n->ITDOCSQ + 10;
                $sq = $x;

                $itfrom = $this->BerkasBaru_model->It();
                $result3 = array();
                date_default_timezone_set('Asia/Jakarta');
                $ip = $_SERVER['REMOTE_ADDR'];
                $ituid = "admin1";
                $docty = "IT";
                $iticut = "I";
                $itft = "F";
                $itft2 = "T";
                $itqtyf = "-1";
                $itqtyt = "1";
                $idbuid = $this->BerkasBaru_model->getBnidbuid();
                $itidbuid = $idbuid->BNIDBUID;
                $locid = $this->BerkasBaru_model->getLocid();
                $itlocid = $locid->LMLOCID;

                // FROM (RECORD 1)
                foreach($itfrom as $itf) :
                    $data_array3 = array(             
                        'ITCOID' => $itf['ITCOID'],
                        'ITIDBUID' => $itf['ITIDBUID'],
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itf['ITBUID1'],
                        'ITLNTY' => $itf['ITLNTY'],
                        'ITICU' => $itf['ITICU'],
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => $itf['ITDOCTM'],
                        'ITMSTY' => $itf['ITMSTY'],
                        'ITFT' => $itft,
                        'ITIDINUM' => $itf['ITIDINUM'],
                        'ITGLCLS' => $itf['ITGLCLS'],
                        'ITUOM1' => $itf['ITUOM1'],
                        'ITINUM' => $itf['ITINUM'],
                        'ITLOCID' => $itf['ITLOCID'],
                        'ITDESB1' => $itf['ITDESB1'],
                        'ITPOST' => $status,
                        'ITBRAND' => $itf['ITBRAND'],
                        'ITCOLOR' => $itf['ITCOLOR'],
                        'ITLENGTH' => $itf['ITLENGTH'],
                        'ITWIDTH' => $itf['ITWIDTH'],
                        'ITWIDE' => $itf['ITWIDE'],
                        'ITCILCAP' => $itf['ITCILCAP'],
                        'ITMFN' => $itf['ITMFN'],
                        'ITMACHNID' => $itf['ITMACHNID'],
                        'ITVHRN' => $itf['ITVHRN'],
                        'ITVHTAXDT' => $itf['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $itf['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $itf['ITLNDOWNST'],
                        'ITCRTFID' => $itf['ITCRTFID'],
                        'ITCRTFDT' => $itf['ITCRTFDT'],
                        'ITASADDR' => $itf['ITASADDR'],
                        'ITCITY' => $itf['ITCITY'],
                        'ITDIST' => $itf['ITDIST'],
                        'ITSUBDIST' => $itf['ITSUBDIST'],
                        'ITMANAGE' => $itf['ITMANAGE'],
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $itf['ITCOMV'],
                        'ITQTY' => $itqtyf,
                        'ITDOCONO' => $itf["ITDOCNO"],
                        'ITDOCOTY' => $itf["ITDOCTY"],
                        'ITDOCOSQ' => $itf["ITDOCSQ"]
                    );
                    array_push($result3, $data_array3);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result3);

                // TO (RECORD 2)
                $result4 = array();
                foreach($itfrom as $itf) :
                    $data_array4 = array(             
                        'ITCOID' => $itf['ITCOID'],
                        'ITIDBUID' => $itidbuid,
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itf['ITBUID1'],
                        'ITLNTY' => $itf['ITLNTY'],
                        'ITICU' => $itf['ITICU'],
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => $itf['ITDOCTM'],
                        'ITMSTY' => $itf['ITMSTY'],
                        'ITFT' => $itft2,
                        'ITIDINUM' => $itf['ITIDINUM'],
                        'ITGLCLS' => $itf['ITGLCLS'],
                        'ITUOM1' => $itf['ITUOM1'],
                        'ITINUM' => $itf['ITINUM'],
                        'ITLOCID' => $itlocid,
                        'ITDESB1' => $itf['ITDESB1'],
                        'ITPOST' => $status,
                        'ITBRAND' => $itf['ITBRAND'],
                        'ITCOLOR' => $itf['ITCOLOR'],
                        'ITLENGTH' => $itf['ITLENGTH'],
                        'ITWIDTH' => $itf['ITWIDTH'],
                        'ITWIDE' => $itf['ITWIDE'],
                        'ITCILCAP' => $itf['ITCILCAP'],
                        'ITMFN' => $itf['ITMFN'],
                        'ITMACHNID' => $itf['ITMACHNID'],
                        'ITVHRN' => $itf['ITVHRN'],
                        'ITVHTAXDT' => $itf['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $itf['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $itf['ITLNDOWNST'],
                        'ITCRTFID' => $itf['ITCRTFID'],
                        'ITCRTFDT' => $itf['ITCRTFDT'],
                        'ITASADDR' => $itf['ITASADDR'],
                        'ITCITY' => $itf['ITCITY'],
                        'ITDIST' => $itf['ITDIST'],
                        'ITSUBDIST' => $itf['ITSUBDIST'],
                        'ITMANAGE' => $itf['ITMANAGE'],
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $itf['ITCOMV'],
                        'ITQTY' => $itqtyt,
                        'ITDOCONO' => $itf["ITDOCNO"],
                        'ITDOCOTY' => $itf["ITDOCTY"],
                        'ITDOCOSQ' => $itf["ITDOCSQ"],
                    );
                    array_push($result4, $data_array4);
                endforeach;
                $this->db->insert_batch('t4111', $result4);
            }
            $getStatus = $this->BerkasBaru_model->getStatusApprov();
            $status = $getStatus->DTDC;
            // ubah status jadi approval->draft di t4312 dan t4111 OV IT
            $this->BerkasBaru_model->UbahKeDraft($ovdocno, $ovidbuid, $status);
        }
        redirect('BerkasBaru/index','refresh');
    }

    public function Verifikasi_pengajuan($ovdocno) {
        $getStatus = $this->BerkasBaru_model->getStatusVerifikasiPengajuan();
        $status = $getStatus->DTDC;

        // edit status di t4312 dan t4111 tipe dokumen OV dan IT = Done
        $this->BerkasBaru_model->Verifikasi_pengajuan($ovdocno, $status);
        redirect('BerkasBaru/Berkas_baru_bpkad_pengajuan','refresh');
    }

    public function revisi_pengajuan($ovdocno) {
        $ovpost = $this->BerkasBaru_model->getStatusDraft();
        $status = $ovpost->DTDC;

        $this->BerkasBaru_model->revisi_pengajuan($ovdocno, $status);
        redirect('BerkasBaru/Berkas_baru_bpkad_pengajuan','refresh');
    }

    public function Acc($ovidbuid, $ovdocno, $ovdocty) {
        $data['title'] = 'Berkas Baru';
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();

        //Get tahun dan bulan sesuai data t0020
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

        //GET STATUS DONE
        // $getStatus = $this->BerkasBaru_model->getStatusDone();
        // $status = $getStatus->DTDC;

        // edit status di t4312 dan t4111 tipe dokumen OV dan IT = Done
        // $this->BerkasBaru_model->Done($ovdocno, $status);

        //GET STATUS FINISH
        $getStatus = $this->BerkasBaru_model->getStatusFinish();
        $status = $getStatus->DTDC;
        $this->BerkasBaru_model->Finish($ovdocno, $status);

        //insert t41021
        $getDataIT = $this->BerkasBaru_model->getDataIT($ovdocno);
        $hasil = array();
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $iluid = "admin1";
        $ilsqoh = "0";

        foreach($getDataIT as $gdit) :
            if($gdit["ITQTY"] == "1.00000") {
                $data_array = array(
                    'ILCOID' => $gdit["ITCOID"],
                    'ILIDBUID' => $gdit["ITIDBUID"],
                    'ILIDINUM' => $gdit["ITIDINUM"],
                    'ILINUM' => $gdit["ITINUM"],
                    'ILLOCID' => $gdit["ITLOCID"],
                    'ILICU' => $gdit["ITICU"],
                    'ILBUID1' => $gdit["ITBUID1"],
                    'ILGLCLS' => $gdit["ITGLCLS"],
                    'ILPQOH' => 1,
                    'ILSQOH' => $ilsqoh,
                    'ILMANAGE' => $gdit["ITMANAGE"],
                    'ILVHRN' => $gdit["ITVHRN"],
                    'ILVHTAXDT' => $gdit["ITVHTAXDT"],
                    'ILVHRNTAXDT' => $gdit["ITVHRNTAXDT"],
                    'ILMACHNID' => $gdit["ITMACHNID"],
                    'ILMFN' => $gdit["ITMFN"],
                    'ILUOM1' => $gdit["ITUOM1"],
                    'ILCILCAP' => $gdit["ITCILCAP"],
                    'ILCRTFID' => $gdit["ITCRTFID"],
                    'ILCRTFDT' => $gdit["ITCRTFDT"],
                    // 'ILULTZ' => $gdit["ITULTZ"],
                    'ILASADDR' => $gdit["ITASADDR"],
                    'ILCITY' => $gdit["ITCITY"],
                    'ILDIST' => $gdit["ITDIST"],
                    'ILSUBDIST' => $gdit["ITSUBDIST"],
                    'ILUID' => $gdit["ITUID"],
                    'ILUIDM' => $gdit["ITUIDM"],
                    'ILDTIN' => date('Y-m-d H:i:s', time()),
                    'ILDTLU' => date('Y-m-d H:i:s', time()),
                    'ILIPUID' => $ip,
                    'ILIPUIDM' => $ip,
                );
            }
            else if($gdit["ITQTY"] == "-1.00000") {
                $data_array = array(
                    'ILCOID' => $gdit["ITCOID"],
                    'ILIDBUID' => $gdit["ITIDBUID"],
                    'ILIDINUM' => $gdit["ITIDINUM"],
                    'ILINUM' => $gdit["ITINUM"],
                    'ILLOCID' => $gdit["ITLOCID"],
                    'ILICU' => $gdit["ITICU"],
                    'ILBUID1' => $gdit["ITBUID1"],
                    'ILGLCLS' => $gdit["ITGLCLS"],
                    'ILPQOH' => 0,
                    'ILSQOH' => $ilsqoh,
                    'ILMANAGE' => $gdit["ITMANAGE"],
                    'ILVHRN' => $gdit["ITVHRN"],
                    'ILVHTAXDT' => $gdit["ITVHTAXDT"],
                    'ILVHRNTAXDT' => $gdit["ITVHRNTAXDT"],
                    'ILMACHNID' => $gdit["ITMACHNID"],
                    'ILMFN' => $gdit["ITMFN"],
                    'ILUOM1' => $gdit["ITUOM1"],
                    'ILCILCAP' => $gdit["ITCILCAP"],
                    'ILCRTFID' => $gdit["ITCRTFID"],
                    'ILCRTFDT' => $gdit["ITCRTFDT"],
                    // 'ILULTZ' => $gdit["ITULTZ"],
                    'ILASADDR' => $gdit["ITASADDR"],
                    'ILCITY' => $gdit["ITCITY"],
                    'ILDIST' => $gdit["ITDIST"],
                    'ILSUBDIST' => $gdit["ITSUBDIST"],
                    'ILUID' => $gdit["ITUID"],
                    'ILUIDM' => $gdit["ITUIDM"],
                    'ILDTIN' => date('Y-m-d H:i:s', time()),
                    'ILDTLU' => date('Y-m-d H:i:s', time()),
                    'ILIPUID' => $ip,
                    'ILIPUIDM' => $ip,
                );
            }
            array_push($hasil, $data_array);
        endforeach;
        $this->db->insert_batch('t41021', $hasil);

        //INSERT t1201
        //ambil perulangan data berkas baru dari t4312 where ovdocno =  $ovdocno
        $getData_t4312 = $this->BerkasBaru_model->getData_t4312($ovdocno);
        $hasil2 = array();

        $idbuid = $this->BerkasBaru_model->getBnidbuid();
        $itidbuid = $idbuid->BNIDBUID;
        $locid = $this->BerkasBaru_model->getLocid(); 
        $itlocid = $locid->LMLOCID;
        //masukkan ke dalam array lalu insert batch ke t1201
        foreach($getData_t4312 as $ov) :
            $data_array2 = array(
                'FACOID' => $ov["OVCOID"],
                'FAIDBUID' => $itidbuid,
                'FAALOC' => $itlocid,
                'FARECID' => 0,
                'FAICU' =>$ov["OVICU"],
                'FADESB1' => $ov["OVDESB1"],
                'FAQTYCU' => $ov["OVQTY"],
                'FADTAQU' => $ov["OVDOCDT"],
                'FAESVA' => 0,
                'FAAOBJ' => $ov["OVINUM"],
                'FARLDOCNO' => $ov["OVDOCNO"],
                'FARLDOCTY' => $ov["OVDOCTY"],
                'FARLDOCSQ' => $ov["OVDOCSQ"],
                'FABRAND' => $ov["OVBRAND"],
                'FACOLOR' => $ov["OVCOLOR"],
                'FAMTRL' => $ov["OVMTRL"],
                'FATYPE' => $ov["OVTYPE"],
                'FASIZE' => $ov["OVISIZE"],
                'FACOMV' => $ov["OVCOMV"],
                'FALNDOWNST' => $ov["OVLNDOWNST"],
                'FALENGTH' => $ov["OVLENGTH"],
                'FAWIDTH' => $ov["OVWIDTH"],
                'FAWIDE' => $ov["OVWIDE"],
                'FACILCAP' => $ov["OVCILCAP"],
                'FAMFN' => $ov["OVMFN"],
                'FAMACHNID' => $ov["OVMACHNID"],
                'FAVHRN' => $ov["OVVHRN"],
                'FAVHTAXDT' => $ov["OVVHTAXDT"],
                'FAVHRNTAXDT' => $ov["OVVHRNTAXDT"],
                'FACRTFID' => $ov["OVCRTFID"],
                'FACRTFDT' => $ov["OVCRTFDT"],
                'FAUTLZ' => $ov["OVUTLZ"],
                'FAASADDR' => $ov["OVASADDR"],
                'FACITY' => $ov["OVCITY"],
                'FADIST' => $ov["OVDIST"],
                'FASUBDIST' => $ov["OVSUBDIST"],
                'FAMANAGE' => $ov["OVMANAGE"],
                'FAPOST' => $ov["OVPOST"],
                'FAUID' =>$ov["OVUID"],
                'FAUIDM' =>$ov["OVUIDM"],
                'FADTIN' =>$ov["OVDTIN"],
                'FADTLU' =>$ov["OVDTLU"],
                'FAIPUID' =>$ov["OVIPUID"],
                'FAIPUIDM' =>$ov["OVIPUIDM"],
                'FAHISCOL' =>$ov["OVHISCOL"]
            );
            array_push($hasil2, $data_array2);
        endforeach;
        $this->db->insert_batch('t1201', $hasil2);

        redirect('BerkasBaru/Berkas_baru_bpkad_pengajuan','refresh');
    }

    public function Hapus_berkas($ovdocno, $ovdocsq, $ovidbuid) {
        //update OVLST 480 dan OVNST 499
        $this->BerkasBaru_model->Hapus_update($ovdocno, $ovdocsq);
        redirect('BerkasBaru/Tambah_Baru/'.$ovdocno.'/'.$ovidbuid,'refresh');
    }

    public function Hapus_BerkasUpdate($ovidbuid, $ovdocno) {
        //update OVLST 480 dan OVNST 499
        $this->BerkasBaru_model->Hapus_berkasupdate($ovidbuid, $ovdocno);
        redirect('BerkasBaru/index','refresh');
    }

    public function Edit_Berkas($ovdocno, $ovdocsq, $ovidbuid, $ovdocty) {
        $data['title'] = 'Edit Berkas';

        $data['berkas'] = $this->BerkasBaru_model->GetBerkasById($ovdocno, $ovdocsq, $ovidbuid);
        $data['opd'] = $this->BerkasBaru_model->getOpd();
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['KabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $ovpost = $this->BerkasBaru_model->getStatusDraft();
        $status = $ovpost->DTDC;

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            // $getITF = $this->BerkasBaru_model->getITfrom($ovdocno, $ovdocsq);
            // dd($getITF);
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Edit_Berkas',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            $this->BerkasBaru_model->Edit_Berkas($ovdocno, $ovdocsq, $ovidbuid);
            $this->BerkasBaru_model->Edit_Berkas_T4111($ovdocno, $ovdocsq, $ovidbuid);

            $getITF = $this->BerkasBaru_model->getITfrom($ovdocno, $ovdocsq);

            $ip = $_SERVER['REMOTE_ADDR'];
            $post = $this->input->post();
            $itft = "F";
            $docty = "IT";

            // FROM (RECORD 1)
            foreach($getITF as $gda) :
                $result = [            
                    'ITCOID' => $gda['ITCOID'],
                    'ITIDBUID' => $gda['ITIDBUID'],
                    'ITDOCNO' => $gda['ITDOCNO'],
                    'ITDOCTY' => $gda['ITDOCTY'],
                    'ITDOCSQ' => $gda['ITDOCSQ'],
                    'ITDOCDT' => $gda['ITDOCDT'],
                    'ITBUID1' => $gda['ITBUID1'],
                    'ITLNTY' => $gda['ITLNTY'],
                    'ITICU' => $gda['ITICU'],
                    'ITICUT' => $gda['ITICUT'],
                    'ITDOCMO' => $gda['ITDOCMO'],
                    'ITDOCYR' => $gda['ITDOCYR'],
                    'ITDOCTM' => $gda['ITDOCTM'],
                    'ITMSTY' => $gda['ITMSTY'],
                    'ITFT' => $gda['ITFT'],
                    'ITIDINUM' => $gda['ITIDINUM'],
                    'ITGLCLS' => $gda['ITGLCLS'],
                    'ITUOM1' => $gda['ITUOM1'],
                    'ITINUM' => $gda['ITINUM'],
                    'ITLOCID' => $gda['ITLOCID'],
                    'ITDESB1' => $this->input->post('OVDESB1', true),
                    'ITPOST' => $gda['ITPOST'],
                    'ITBRAND' => $this->input->post('OVBRAND', true),
                    'ITCOLOR' => $this->input->post('OVCOLOR', true),
                    'ITLENGTH' => $this->input->post('OVLENGTH', true),
                    'ITWIDTH' => $this->input->post('OVWIDTH', true),
                    'ITWIDE' => $this->input->post('OVWIDE', true),
                    'ITCILCAP' => $this->input->post('OVCILCAP', true),
                    'ITMFN' => $this->input->post('OVMFN', true),
                    'ITMACHNID' => $this->input->post('OVMACHNID', true),
                    'ITVHRN' => $this->input->post('OVVHRN', true),
                    'ITVHTAXDT' => $this->input->post('OVVHTAXDT', true),
                    'ITVHRNTAXDT' => $this->input->post('OVVHTAXRNDT', true),
                    'ITLNDOWNST' => $this->input->post('OVLNDOWNST', true),
                    'ITCRTFID' => $this->input->post('OVCRTFID', true),
                    'ITCRTFDT' => $this->input->post('OVCRTFDT', true),
                    'ITASADDR' => $this->input->post('OVASADDR', true),
                    'ITCITY' => $this->input->post('OVCITY', true),
                    'ITDIST' => $this->input->post('OVDIST', true),
                    'ITSUBDIST' => $this->input->post('OVSUBDIST', true),
                    'ITMANAGE' => $gda['ITMANAGE'],
                    'ITUID' => $gda['ITUID'],
                    'ITUIDM' => $gda['ITUIDM'],
                    'ITDTIN' => $gda['ITDTIN'],
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $gda['ITIPUID'],
                    'ITIPUIDM' => $ip,
                    'ITCOMV' => $this->input->post('OVCOMV', true),
                    'ITQTY' => $gda['ITQTY'],
                    'ITDOCONO' => $ovdocno,
                    'ITDOCOTY' => $ovdocty,
                    'ITDOCOSQ' => $ovdocsq,
                ];
                $this->db->update('t4111', $result, array('ITDOCONO' => $ovdocno,'ITDOCOSQ' => $ovdocsq, 'ITFT' => $itft, 'ITDOCTY' => $docty));
            endforeach;

            // TO (RECORD 2)
            $getITT = $this->BerkasBaru_model->getITto($ovdocno, $ovdocsq);
            $itft2 = "T";
            
            foreach($getITT as $gda2) :
                    $result2 = [         
                        'ITCOID' => $gda2['ITCOID'],
                        'ITIDBUID' => $gda2['ITIDBUID'],
                        'ITDOCNO' => $gda2['ITDOCNO'],
                        'ITDOCTY' => $gda2['ITDOCTY'],
                        'ITDOCSQ' => $gda2['ITDOCSQ'],
                        'ITDOCDT' => $gda2['ITDOCDT'],
                        'ITBUID1' => $gda2['ITBUID1'],
                        'ITLNTY' => $gda2['ITLNTY'],
                        'ITICU' => $gda2['ITICU'],
                        'ITICUT' => $gda2['ITICUT'],
                        'ITDOCMO' => $gda2['ITDOCMO'],
                        'ITDOCYR' => $gda2['ITDOCYR'],
                        'ITDOCTM' => $gda2['ITDOCTM'],
                        'ITMSTY' => $gda2['ITMSTY'],
                        'ITFT' => $gda2['ITFT'],
                        'ITIDINUM' => $gda2['ITIDINUM'],
                        'ITGLCLS' => $gda2['ITGLCLS'],
                        'ITUOM1' => $gda2['ITUOM1'],
                        'ITINUM' => $gda2['ITINUM'],
                        'ITLOCID' => $gda2['ITLOCID'],
                        'ITDESB1' => $this->input->post('OVDESB1', true),
                        'ITPOST' => $gda2['ITPOST'],
                        'ITBRAND' => $this->input->post('OVBRAND', true),
                        'ITCOLOR' => $this->input->post('OVCOLOR', true),
                        'ITLENGTH' => $this->input->post('OVLENGTH', true),
                        'ITWIDTH' => $this->input->post('OVWIDTH', true),
                        'ITWIDE' => $this->input->post('OVWIDE', true),
                        'ITCILCAP' => $this->input->post('OVCILCAP', true),
                        'ITMFN' => $this->input->post('OVMFN', true),
                        'ITMACHNID' => $this->input->post('OVMACHNID', true),
                        'ITVHRN' => $this->input->post('OVVHRN', true),
                        'ITVHTAXDT' => $this->input->post('OVVHTAXDT', true),
                        'ITVHRNTAXDT' => $this->input->post('OVVHTAXRNDT', true),
                        'ITLNDOWNST' => $this->input->post('OVLNDOWNST', true),
                        'ITCRTFID' => $this->input->post('OVCRTFID', true),
                        'ITCRTFDT' => $this->input->post('OVCRTFDT', true),
                        'ITASADDR' => $this->input->post('OVASADDR', true),
                        'ITCITY' => $this->input->post('OVCITY', true),
                        'ITDIST' => $this->input->post('OVDIST', true),
                        'ITSUBDIST' => $this->input->post('OVSUBDIST', true),
                        'ITMANAGE' => $gda2['ITMANAGE'],
                        'ITUID' => $gda2['ITUID'],
                        'ITUIDM' => $gda2['ITUIDM'],
                        'ITDTIN' => $gda2['ITDTIN'],
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $gda2['ITIPUID'],
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $this->input->post('OVCOMV', true),
                        'ITQTY' => $gda2['ITQTY'],
                        'ITDOCONO' => $ovdocno,
                        'ITDOCOTY' => $ovdocty,
                        'ITDOCOSQ' => $ovdocsq,
                    ];
                    $this->db->update('t4111', $result2, array('ITDOCONO' => $ovdocno,'ITDOCOSQ' => $ovdocsq, 'ITFT' => $itft2, 'ITDOCTY' => $docty));
            endforeach;
            

            redirect('BerkasBaru/Tambah_Baru/'.$ovdocno.'/'.$ovidbuid,'refresh');
        }
    }

    public function Konfirmasi($ovidbuid, $ovdocno) {
        $data['title'] = 'Konfirmasi Data';

        $data['getData'] = $this->BerkasBaru_model->dataKonfirmasi($ovidbuid, $ovdocno);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);
        $data['pimpinan'] = $this->BerkasBaru_model->getPimpinan();
        $data['jabatan'] = $this->BerkasBaru_model->getJabatan();

        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/Konfirmasi_Cetak',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Update_t0002($ovidbuid, $ovdocno) {
        $data['title'] = 'Konfirmasi Data';

        $data['getData'] = $this->BerkasBaru_model->dataKonfirmasi($ovidbuid, $ovdocno);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);
        $data['pimpinan'] = $this->BerkasBaru_model->getPimpinan();
        $data['jabatan'] = $this->BerkasBaru_model->getJabatan();

        $nip = $this->input->post('nip');

        $this->BerkasBaru_model->Update_t0002($ovidbuid);
        redirect('BerkasBaru/Print/'.$ovidbuid.'/'.$ovdocno.'/'.$nip,'refresh');
    }

    public function Print($ovidbuid, $ovdocno, $nip) {
        $data['title'] = 'Cetak Berita Acara';

        $data['getData'] = $this->BerkasBaru_model->dataKonfirmasi($ovidbuid, $ovdocno);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);
        $data['pimpinan'] = $this->BerkasBaru_model->getPimpinan();
        $data['jabatan'] = $this->BerkasBaru_model->getJabatan();
        $data['nip'] = $nip;

        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true); 
		$this->pdf->filename = "Berita-acara.pdf";
		$this->pdf->load_view('BerkasBaru/Cetak', $data);
    }

    public function Upload_BA() {
        $data['title'] = 'Upload Berita Acara';

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Upload_BA',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            //function upload dokumen
        }
    }

    public function Mutasi($faicu) {
        $data['title'] = 'Mutasi Berkas';
        $data['data_opd'] = $this->BerkasBaru_model->getOpd();
        $data['berkas_mutasi'] = $this->BerkasBaru_model->daftar_berkas_by_icu($faicu);

        //get bulan dan tahun dari t0020
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;
        
        $this->form_validation->set_rules('FAMANAGE', 'Pengelola Barang', 'required');
        $this->form_validation->set_rules('FAALOC', 'Lokasi Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            $cek_ir = $this->BerkasBaru_model->Cek_ir($tahun, $bulan);

            if($cek_ir->num_rows() == 0) {
                $insert_ir_t0002 = $this->BerkasBaru_model->Insert_ir_t0002($tahun, $bulan);
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Mutasi', $data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Mutasi', $data);
                $this->load->view('template/Footer',$data);
            }
        }
        else{
            $manage = $this->input->post('FAMANAGE');
            $loc = $this->input->post('FAALOC');

            // UPDATE NNSEQ + 1 TIPE DOKUMEN IR
            $update_nnseq = $this->BerkasBaru_model->Update_ir($tahun, $bulan);
            // PROSEDUR PENOMORAN TIPE DOKUMEN IR
            $getIR = $this->BerkasBaru_model->getIR($tahun, $bulan);
            $nnseq= $getIR->NNSEQ;
            $fzeropadded = sprintf("%05d", $nnseq);

            $nnyr = $getIR->NNYR;
            $x = substr($nnyr, 2);

            $nnmo = $getIR->NNMO;
            $fzeropadded2 = sprintf("%02d", $nnmo);
            
            $docno_ir = [
                'a' => $x,
                'b' => $fzeropadded2,
                'c' => $fzeropadded
            ];

            //INSERT DOKUMEN IR MUTASI DI t4111
            //get data from t1201 untuk di insert ke t4111
            $result = array();
            $result2 = array();
            date_default_timezone_set('Asia/Jakarta');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ituid = "admin1";
            $docty = "IR";
            $iticut = "I";
            $itft_from = "F";
            $itft_to = "T";
            $itqty_from = "-1";
            $itqty_to = "1";
            $sq = 10;
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            $buid1_to = $this->BerkasBaru_model->getBuid1($manage);
            $itbuid1_to = $buid1_to->BNBUID1; 

            // FROM
            $mutasi = $this->BerkasBaru_model->mutasi($faicu);
            foreach($mutasi as $m) :
                $buid1_from = $this->BerkasBaru_model->getBuid1($m['FAMANAGE']);
                $itbuid1_from = $buid1_from->BNBUID1;

                $data_array_from = array(
                    'ITCOID' => $m['FACOID'],
                    'ITIDBUID' => $m['FAIDBUID'],
                    'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                    'ITDOCTY' => $docty,
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $itbuid1_from,
                    'ITLNTY' => $linetype,
                    'ITICU' => $faicu,
                    'ITMSTY' => $m["OVMSTY"],
                    'ITICUT' => $iticut,
                    'ITDOCMO' => $bulan,
                    'ITDOCYR' => $tahun,
                    'ITDOCYR' => date('Y-m-d H:i:s', time()),
                    'ITFT' => $itft_from,
                    'ITIDINUM' => $m["OVIDINUM"],
                    'ITINUM' => $m["FAAOBJ"],
                    'ITLOCID' => $m["FAALOC"],
                    'ITDESB1' => $m["FADESB1"],
                    'ITQTY' => $itqty_from,
                    'ITUOM1' => $m["OVUOM1"],
                    'ITGLCLS' => $m["OVGLCLS"],
                    // 'ITDOCONO' => ,
                    // 'ITDOCOTY' => ,
                    // 'ITDOCOSQ' => ,
                    'ITCOMV' => $m["FACOMV"],
                    'ITBRAND' => $m["FABRAND"],
                    'ITCOLOR' => $m["FACOLOR"],
                    'ITLENGTH' => $m["FALENGTH"],
                    'ITWIDTH' => $m["FAWIDTH"],
                    'ITWIDE' => $m["FAWIDE"],
                    'ITCILCAP' => $m["FACILCAP"],
                    'ITMFN' => $m["FAMFN"],
                    'ITMACHNID' => $m["FAMACHNID"],
                    'ITVHRN' => $m["FAVHRN"],
                    'ITVHTAXDT' => $m["FAVHTAXDT"],
                    'ITVHRNTAXDT' => $m["FAVHRNTAXDT"],
                    'ITLNDOWNST' => $m["FALNDOWNST"],
                    'ITCRTFID' => $m["FACRTFID"],
                    'ITCRTFDT' => $m["FACRTFDT"],
                    'ITASADDR' => $m["FAASADDR"],
                    'ITCITY' => $m["FACITY"],
                    'ITDIST' => $m["FADIST"],
                    'ITSUBDIST' => $m["FASUBDIST"],
                    'ITMANAGE' => $m["FAMANAGE"],
                    'ITUID' => $ituid,
                    'ITUIDM' => $ituid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip
                );
                array_push($result, $data_array_from);
                $sq += 10 ;
            endforeach;
            $this->db->insert_batch('t4111', $result);

            //UPDATE FAMANAGE DI t1201
            $this->BerkasBaru_model->mutasi_t1201($faicu, $manage, $loc);
            //UPDATE ILIDBUID DAN ILMANAGE DI t41021
            $this->BerkasBaru_model->mutasi_t41021($faicu, $manage, $loc);

            // TO
            $mutasi2 = $this->BerkasBaru_model->mutasi($faicu);
            foreach($mutasi2 as $m2) :
                $data_array_to = array(
                    'ITCOID' => $m2['FACOID'],
                    'ITIDBUID' => $m2['FAIDBUID'],
                    'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                    'ITDOCTY' => $docty,
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $itbuid1_to,
                    'ITLNTY' => $linetype,
                    'ITICU' => $faicu,
                    'ITMSTY' => $m2["OVMSTY"],
                    'ITICUT' => $iticut,
                    'ITDOCMO' => $bulan,
                    'ITDOCYR' => $tahun,
                    'ITDOCYR' => date('Y-m-d H:i:s', time()),
                    'ITFT' => $itft_to,
                    'ITIDINUM' => $m2["OVIDINUM"],
                    'ITINUM' => $m2["FAAOBJ"],
                    'ITLOCID' => $m2["FAALOC"],
                    'ITDESB1' => $m2["FADESB1"],
                    'ITQTY' => $itqty_to,
                    'ITUOM1' => $m2["OVUOM1"],
                    'ITGLCLS' => $m2["OVGLCLS"],
                    // 'ITDOCONO' => ,
                    // 'ITDOCOTY' => ,
                    // 'ITDOCOSQ' => ,
                    'ITCOMV' => $m2["FACOMV"],
                    'ITBRAND' => $m2["FABRAND"],
                    'ITCOLOR' => $m2["FACOLOR"],
                    'ITLENGTH' => $m2["FALENGTH"],
                    'ITWIDTH' => $m2["FAWIDTH"],
                    'ITWIDE' => $m2["FAWIDE"],
                    'ITCILCAP' => $m2["FACILCAP"],
                    'ITMFN' => $m2["FAMFN"],
                    'ITMACHNID' => $m2["FAMACHNID"],
                    'ITVHRN' => $m2["FAVHRN"],
                    'ITVHTAXDT' => $m2["FAVHTAXDT"],
                    'ITVHRNTAXDT' => $m2["FAVHRNTAXDT"],
                    'ITLNDOWNST' => $m2["FALNDOWNST"],
                    'ITCRTFID' => $m2["FACRTFID"],
                    'ITCRTFDT' => $m2["FACRTFDT"],
                    'ITASADDR' => $m2["FAASADDR"],
                    'ITCITY' => $m2["FACITY"],
                    'ITDIST' => $m2["FADIST"],
                    'ITSUBDIST' => $m2["FASUBDIST"],
                    'ITMANAGE' => $manage,
                    'ITUID' => $ituid,
                    'ITUIDM' => $ituid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip
                );
                array_push($result2, $data_array_to);
                $sq += 10 ;
            endforeach;
            $this->db->insert_batch('t4111', $result2);

            redirect('BerkasBaru/daftar_berkas', 'refresh');
        }
    }

    public function Mutasi2($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $data['title'] = 'Mutasi';
        $data['data_mutasi'] = $this->BerkasBaru_model->Data_mutasi($ilidbuid, $ilidinum, $ilinum, $illocid);
        $data['opd'] = $this->BerkasBaru_model->getOpd();

        //get bulan dan tahun dari t0020
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;
        
        $this->form_validation->set_rules('ILMANAGE', 'Manage', 'required');

        if ($this->form_validation->run() == FALSE) {
            $cek_ir = $this->BerkasBaru_model->Cek_ir($tahun, $bulan);
            if($cek_ir->num_rows() == 0) {
                $insert_ir_t0002 = $this->BerkasBaru_model->Insert_ir_t0002($tahun, $bulan);
                $data['tampil'] = $this->BerkasBaru_model->get_ir($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Mutasi', $data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $data['tampil'] = $this->BerkasBaru_model->get_ir($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Mutasi',$data);
                $this->load->view('template/Footer',$data);
            }
        } 
        else {
            $ilmanage = $this->input->post('ILMANAGE');

            // UPDATE NNSEQ + 1 TIPE DOKUMEN IR
            $update_nnseq = $this->BerkasBaru_model->Update_ir($tahun, $bulan);

            //UPDATE T41021
            $this->BerkasBaru_model->Update_t41021_mutasi($ilidbuid, $ilidinum, $ilinum, $illocid, $ilmanage);
            
            // PROSEDUR PENOMORAN TIPE DOKUMEN IR
            $getIR = $this->BerkasBaru_model->getIR($tahun, $bulan);
            $nnseq= $getIR->NNSEQ;
            $fzeropadded = sprintf("%05d", $nnseq);

            $nnyr = $getIR->NNYR;
            $x = substr($nnyr, 2);

            $nnmo = $getIR->NNMO;
            $fzeropadded2 = sprintf("%02d", $nnmo);
            
            $docno_ir = [
                'a' => $x,
                'b' => $fzeropadded2,
                'c' => $fzeropadded
            ];

            //GET PLAT NOMOR DAN SERTIFIKAT
            $get_data_plat_nosertif = $this->BerkasBaru_model->get_data_plat_nosertif($ilidbuid, $ilidinum, $ilinum, $illocid);
            // dd($get_data_plat_nosertif);
            $plat_nomor = $get_data_plat_nosertif->ITVHRN;
            $no_sertif = $get_data_plat_nosertif->ITCRTFID;

            //GET ITMSTY = 1 *BPKB; 2 = *SERTIFIKAT;
            $itmsty = $this->BerkasBaru_model->get_itmsty($ilidinum);
            $msty = $itmsty->ITMSTY;

            //VARIABEL PELENGKAP
            date_default_timezone_set('Asia/Jakarta');
            $ip = $_SERVER['REMOTE_ADDR'];
            $ituid = "admin1";
            $iticut = "I";
            $itft_from = "F";
            $itft_to = "T";
            $itqty_from = "-1";
            $itqty_to = "1";
            $docty = "IR";
            $sq = 10;

            // IF ELSE JENIS BERKAS
            if($msty == "1") {
                // FROM
                $get_data_1 = $this->BerkasBaru_model->get_last_data_1($plat_nomor);
                $result = array();
                foreach($get_data_1 as $gd1) :
                    $data_array = array(             
                        'ITCOID' => $gd1['ITCOID'],
                        'ITIDBUID' => $ilidbuid,
                        'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $gd1['ITBUID1'],
                        'ITLNTY' => $gd1['ITLNTY'],
                        'ITICU' => $gd1['ITICU'],
                        'ITICUT' => $gd1['ITICUT'],
                        'ITDOCMO' => $bulan,
                        'ITDOCYR' => $tahun,
                        'ITDOCTM' => $gd1['ITDOCTM'],
                        'ITMSTY' => $gd1['ITMSTY'],
                        'ITFT' => $itft_from,
                        'ITIDINUM' => $ilidinum,
                        'ITGLCLS' => $gd1['ITGLCLS'],
                        'ITUOM1' => $gd1['ITUOM1'],
                        'ITINUM' => $ilinum,
                        'ITLOCID' => $illocid,
                        'ITDESB1' => $gd1['ITDESB1'],
                        'ITPOST' => $gd1['ITPOST'],
                        'ITBRAND' => $gd1['ITBRAND'],
                        'ITCOLOR' => $gd1['ITCOLOR'],
                        'ITLENGTH' => $gd1['ITLENGTH'],
                        'ITWIDTH' => $gd1['ITWIDTH'],
                        'ITWIDE' => $gd1['ITWIDE'],
                        'ITCILCAP' => $gd1['ITCILCAP'],
                        'ITMFN' => $gd1['ITMFN'],
                        'ITMACHNID' => $gd1['ITMACHNID'],
                        'ITVHRN' => $gd1['ITVHRN'],
                        'ITVHTAXDT' => $gd1['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $gd1['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $gd1['ITLNDOWNST'],
                        'ITCRTFID' => $gd1['ITCRTFID'],
                        'ITCRTFDT' => $gd1['ITCRTFDT'],
                        'ITASADDR' => $gd1['ITASADDR'],
                        'ITCITY' => $gd1['ITCITY'],
                        'ITDIST' => $gd1['ITDIST'],
                        'ITSUBDIST' => $gd1['ITSUBDIST'],
                        'ITMANAGE' => $gd1['ITMANAGE'],
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $gd1['ITCOMV'],
                        'ITQTY' => $itqty_from,
                        'ITDOCONO' => $gd1["ITDOCONO"],
                        'ITDOCOTY' => $gd1["ITDOCOTY"],
                        'ITDOCOSQ' => $gd1["ITDOCOSQ"]
                    );
                    array_push($result, $data_array);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result);

                //TO
                $result2 = array();
                foreach($get_data_1 as $gd1_to) :
                    $data_array2 = array(             
                        'ITCOID' => $gd1_to['ITCOID'],
                        'ITIDBUID' => $ilidbuid,
                        'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $gd1_to['ITBUID1'],
                        'ITLNTY' => $gd1_to['ITLNTY'],
                        'ITICU' => $gd1_to['ITICU'],
                        'ITICUT' => $gd1_to['ITICUT'],
                        'ITDOCMO' => $bulan,
                        'ITDOCYR' => $tahun,
                        'ITDOCTM' => $gd1['ITDOCTM'],
                        'ITMSTY' => $gd1_to['ITMSTY'],
                        'ITFT' => $itft_to,
                        'ITIDINUM' => $ilidinum,
                        'ITGLCLS' => $gd1_to['ITGLCLS'],
                        'ITUOM1' => $gd1_to['ITUOM1'],
                        'ITINUM' => $ilinum,
                        'ITLOCID' => $illocid,
                        'ITDESB1' => $gd1_to['ITDESB1'],
                        'ITPOST' => $gd1_to['ITPOST'],
                        'ITBRAND' => $gd1_to['ITBRAND'],
                        'ITCOLOR' => $gd1_to['ITCOLOR'],
                        'ITLENGTH' => $gd1_to['ITLENGTH'],
                        'ITWIDTH' => $gd1_to['ITWIDTH'],
                        'ITWIDE' => $gd1_to['ITWIDE'],
                        'ITCILCAP' => $gd1_to['ITCILCAP'],
                        'ITMFN' => $gd1_to['ITMFN'],
                        'ITMACHNID' => $gd1_to['ITMACHNID'],
                        'ITVHRN' => $gd1_to['ITVHRN'],
                        'ITVHTAXDT' => $gd1_to['ITVHTAXDT'],
                        'ITVHRNTAXDT' => $gd1_to['ITVHRNTAXDT'],
                        'ITLNDOWNST' => $gd1_to['ITLNDOWNST'],
                        'ITCRTFID' => $gd1_to['ITCRTFID'],
                        'ITCRTFDT' => $gd1_to['ITCRTFDT'],
                        'ITASADDR' => $gd1_to['ITASADDR'],
                        'ITCITY' => $gd1_to['ITCITY'],
                        'ITDIST' => $gd1_to['ITDIST'],
                        'ITSUBDIST' => $gd1_to['ITSUBDIST'],
                        'ITMANAGE' => $ilmanage,
                        'ITUID' => $ituid,
                        'ITUIDM' => $ituid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $gd1_to['ITCOMV'],
                        'ITQTY' => $itqty_to,
                        'ITDOCONO' => $gd1_to["ITDOCONO"],
                        'ITDOCOTY' => $gd1_to["ITDOCOTY"],
                        'ITDOCOSQ' => $gd1_to["ITDOCOSQ"],
                    );
                    array_push($result2, $data_array2);
                endforeach;
                $this->db->insert_batch('t4111', $result2);
            }
            else{
                $get_data_2 = $this->BerkasBaru_model->get_last_data_2($no_sertif);
            }
            redirect('BerkasBaru/Berkas_baru_bpkad_pengajuan', 'refresh');
        }
    }
}

/* End of file BerkasBaru.php */

?>