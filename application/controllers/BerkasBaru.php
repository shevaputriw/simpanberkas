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
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();

        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Detail($ovdocno) {
        $data['title'] = 'Detail Berkas';
        $data['get_berkas'] = $this->BerkasBaru_model->getBerkas($ovdocno);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);

        $this->load->view('template/Header',$data);
        $this->load->view('BerkasBaru/Detail_Berkas',$data);
        $this->load->view('template/Footer',$data);
    }

    public function get_Kecamatan($dtdc)
    {
        $data = $this->BerkasBaru_model->getKecamatan($dtdc);
        echo json_encode($data);
    }

    public function get_Desa($dtdc1)
    {
        $data = $this->BerkasBaru_model->getDesa($dtdc1);
        echo json_encode($data);
    }

    public function get_Lokasi($idbuid)
    {
        $data = $this->BerkasBaru_model->getLokasi($idbuid);
        echo json_encode($data);
    }

    public function get_Sertifikat()
    {
        $data = $this->BerkasBaru_model->getSertifikat();
        echo json_encode($data);
    }

    public function get_Kendaraan()
    {
        $data = $this->BerkasBaru_model->getKendaraan();
        echo json_encode($data);
    }

    public function Halaman_Tambah() 
    {
        $data['title'] = 'Tambah Berkas Baru';

        $data['opd'] = $this->BerkasBaru_model->getOpd();
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        // $tanggal = date('d-m-Y');
        // $pecah_tgl = explode("-", $tanggal);

        // $tanggal = $pecah_tgl[0];
        // $bulan = $pecah_tgl[1];
        // $tahun = $pecah_tgl[2];
        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

        if($this->form_validation->run() == FALSE) {
            $cek = $this->BerkasBaru_model->Cek($tahun, $bulan);

            if($cek->num_rows() == 0) {
                $tambah_tahun = $this->BerkasBaru_model->Tambah_t0002($tahun, $bulan);
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else {
            $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);
            $ovdocno = $this->input->post('OVDOCNO');
            $ovdocdt = $this->input->post('OVDOCDT');
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // if($cekICU->num_rows() == 0) {
            //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
            // }
            // else{
                //NNSEQ + 1 (ICU)
                // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
                $this->BerkasBaru_model->Update_ICU($tahun);
            // }

            // Prosedur penomoran tipe dokumen ICU
            // $getICU = $this->BerkasBaru_model->getICU($tahun, $bulan);
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            $no = sprintf("%09d", $nnseqICU);

            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $x = $ovdocno + 1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            else{
                $x = $ovdocno + 1;
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            redirect('BerkasBaru/index','refresh');
        }  
    }

    public function Simpan_Tambah() {
        $data['title'] = 'Tambah Berkas';

        // $data['opd'] = $this->BerkasBaru_model->getOpd();
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

        if($this->form_validation->run() == FALSE) {
            $cek = $this->BerkasBaru_model->Cek($tahun, $bulan);

            if($cek->num_rows() == 0) {
                $tambah_tahun = $this->BerkasBaru_model->Tambah_t0002($tahun, $bulan);
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('BerkasBaru/Tambah_Berkas',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else {
            // $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);
            // $ovdocno = $this->input->post('OVDOCNO');
            // $ovidbuid = $this->input->post('OVIDBUID');
            // $x = $ovdocno + 1;
            // $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status);
            // $this->BerkasBaru_model->Tambah_4111($x);
            $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);
            $ovdocno = $this->input->post('OVDOCNO');
            $ovdocdt = $this->input->post('OVDOCDT');
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];
            $ovidbuid = $this->input->post('OVIDBUID');
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // if($cekICU->num_rows() == 0) {
            //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
            // }
            // else{
                //NNSEQ + 1 (ICU)
                // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
                $this->BerkasBaru_model->Update_ICU($tahun);
            // }

            // Prosedur penomoran tipe dokumen ICU
            // $getICU = $this->BerkasBaru_model->getICU($tahun, $bulan);
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            $no = sprintf("%09d", $nnseqICU);

            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $x = $ovdocno + 1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            else{
                $x = $ovdocno + 1;
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }  
    }

    // $x = ovdocno;
    public function Tambah_Baru($x, $ovidbuid) {
        $data['title'] = 'Tambah Berkas Baru 2';

        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();
        $data['get_data'] = $this->BerkasBaru_model->GetData($x, $ovidbuid);
        $data['opd'] = $this->BerkasBaru_model->GetOpdById($x, $ovidbuid);
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Tambah_Berkas2',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            // update ovdocsq +10
            //get data ovdocsq dari ovdocno lalu di + 10
            $ovdocdt = $this->input->post('OVDOCDT');
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];
            $cek_ovdocsq = $this->BerkasBaru_model->Cek_ovdocsq($x);
            $ovdocsq = $cek_ovdocsq->OVDOCSQ + 10;

            $ovidbuid = $this->input->post('OVIDBUID');
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);
            // if($cekICU->num_rows() == 0) {
            //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
            // }
            // else{
                //NNSEQ + 1 (ICU)
                // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
                $this->BerkasBaru_model->Update_ICU($tahun);
            // }

            // Prosedur penomoran tipe dokumen ICU
            // $getICU = $this->BerkasBaru_model->getICU($tahun, $bulan);
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            $no = sprintf("%09d", $nnseqICU);

            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah2_41021($ovidbuid, $buid1);
            }
            else{
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no);
                // $this->BerkasBaru_model->Tambah2_41021($ovidbuid, $buid1);
            }
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }
    }

    public function Edit_Berkas2($x, $ovidbuid) {
        $data['title'] = 'Tambah Berkas Baru 2';

        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();
        $data['get_data'] = $this->BerkasBaru_model->GetData($x, $ovidbuid);
        $data['opd'] = $this->BerkasBaru_model->GetOpdById($x, $ovidbuid);
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $ovpost = $this->BerkasBaru_model->getStatusDraft();
        $status = $ovpost->DTDC;
        // ubah status jadi approval->draft di t4312 dan t4111 OV IT
        $this->BerkasBaru_model->UbahKeDraft($x, $ovidbuid, $status);

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Tambah_Berkas2',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            // update ovdocsq +10
            //get data ovdocsq dari ovdocno lalu di + 10
            $ovdocdt = $this->input->post('OVDOCDT');
            $split = explode("-", $ovdocdt);
            $d = $split[0];
            $m = $split[1];
            $y = $split[2];
            $cek_ovdocsq = $this->BerkasBaru_model->Cek_ovdocsq($x);
            $ovdocsq = $cek_ovdocsq->OVDOCSQ + 10;

            $ovidbuid = $this->input->post('OVIDBUID');
            $ovbuid1 = $this->BerkasBaru_model->getOvbuid1($ovidbuid);
            $ovlnty = $this->BerkasBaru_model->getLineType();
            $linetype = $ovlnty->DTDC;
            $ovpost = $this->BerkasBaru_model->getStatusDraft();
            $status = $ovpost->DTDC;

            $this->BerkasBaru_model->Update_ICU($tahun);

            // Prosedur penomoran tipe dokumen ICU
            $getICU = $this->BerkasBaru_model->getICU($tahun);
            $nnseqICU= $getICU->NNSEQ;
            $no = sprintf("%09d", $nnseqICU);

            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no);
            }
            else{
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no);
            }
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }
    }

    public function Approval($ovidbuid, $ovdocno, $ovdocty) {
        $data['title'] = 'Berkas Baru';
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();

        $cekIT = $this->BerkasBaru_model->cekIT($ovdocno);

        if($cekIT->num_rows() == 0) {
            $getStatus = $this->BerkasBaru_model->getStatusApprov();
            $status = $getStatus->DTDC;

            // edit status di t4312 tipe dokumen OV = Approv
            $this->BerkasBaru_model->Edit_Status($ovdocno, $status);

            //Get tahun dan bulan sesuai data t0020
            $getTahunBulan = $this->BerkasBaru_model->getTahunBulan();
            $tahun = $getTahunBulan->CNCFY;
            $bulan = $getTahunBulan->CNCAP;

            //Periksa tahun dan bulan sudah ada di t0002 atau belum
            $cek = $this->BerkasBaru_model->Cek_IT($tahun, $bulan);
            // $cekICU = $this->BerkasBaru_model->Cek_ICU($tahun, $bulan);

            if($cek->num_rows() == 0) {
                $this->BerkasBaru_model->Tambah_t0002_IT($tahun, $bulan);
            }
            else {
                //NNSEQ + 1 (IT)
                $this->BerkasBaru_model->Update_IT($tahun, $bulan);

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
                // end

                // if($cekICU->num_rows() == 0) {
                //     $this->BerkasBaru_model->Tambah_t0002_ICU($tahun, $bulan);
                // }
                // else{
                    //NNSEQ + 1 (ICU)
                    // $this->BerkasBaru_model->Update_ICU($tahun, $bulan);
                    $this->BerkasBaru_model->Update_ICU($tahun);
                // }

                // Prosedur penomoran tipe dokumen ICU
                // $getICU = $this->BerkasBaru_model->getICU($tahun, $bulan);
                $getICU = $this->BerkasBaru_model->getICU($tahun);
                $nnseqICU= $getICU->NNSEQ;
                $no = sprintf("%09d", $nnseqICU);
                // echo $no;
                // die();
                // end

                //Mendapatkan berkas yang akan diusulkan OPD
                $getDataApprov = $this->BerkasBaru_model->getDataApprov($ovidbuid, $ovdocno, $ovdocty);
                $result = array();
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
                $sq = 10;

                // FROM (RECORD 1)
                foreach($getDataApprov as $gda) :
                    if($gda["ITMSTY"] == "1") {
                        $data_array = array(             
                            'ITCOID' => $gda['ITCOID'],
                            'ITIDBUID' => $gda['ITIDBUID'],
                            'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                            'ITDOCTY' => $docty,
                            'ITDOCSQ' => $sq,
                            'ITDOCDT' => $gda['ITDOCDT'],
                            'ITBUID1' => $gda['ITBUID1'],
                            'ITLNTY' => $gda['ITLNTY'],
                            'ITICU' => $no,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $docno["b"],
                            'ITDOCYR' => $nnyr,
                            'ITDOCTM' => $gda['ITDOCTM'],
                            'ITMSTY' => $gda['ITMSTY'],
                            'ITFT' => $itft,
                            'ITIDINUM' => $gda['ITIDINUM'],
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
                            'ITDOCOSQ' => $gda["ITDOCSQ"],
                        );
                        array_push($result, $data_array);
                        $sq += 10 ;
                        }
                    else{
                        $data_array = array(             
                            'ITCOID' => $gda['ITCOID'],
                            'ITIDBUID' => $gda['ITIDBUID'],
                            'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                            'ITDOCTY' => $docty,
                            'ITDOCSQ' => $sq,
                            'ITDOCDT' => $gda['ITDOCDT'],
                            'ITBUID1' => $gda['ITBUID1'],
                            'ITLNTY' => $gda['ITLNTY'],
                            'ITICU' => $no,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $docno["b"],
                            'ITDOCYR' => $nnyr,
                            'ITDOCTM' => $gda['ITDOCTM'],
                            'ITMSTY' => $gda['ITMSTY'],
                            'ITFT' => $itft,
                            'ITIDINUM' => $gda['ITIDINUM'],
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
                            'ITDOCOSQ' => $gda["ITDOCSQ"],
                        );
                        array_push($result, $data_array);
                        $sq += 10;
                    }
                endforeach;
                $this->db->insert_batch('t4111', $result);

                // TO (RECORD 2)
                $getDataApprov2 = $this->BerkasBaru_model->getDataApprov2($no, $itft);
                $result2 = array();
                
                foreach($getDataApprov2 as $gda2) :
                    if($gda2["ITMSTY"] == "1") {
                        $data_array2 = array(             
                            'ITCOID' => $gda2['ITCOID'],
                            'ITIDBUID' => $itidbuid,
                            'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                            'ITDOCTY' => $docty,
                            'ITDOCSQ' => $sq,
                            'ITDOCDT' => $gda2['ITDOCDT'],
                            'ITBUID1' => $gda2['ITBUID1'],
                            'ITLNTY' => $gda2['ITLNTY'],
                            'ITICU' => $no,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $docno["b"],
                            'ITDOCYR' => $nnyr,
                            'ITDOCTM' => $gda2['ITDOCTM'],
                            'ITMSTY' => $gda2['ITMSTY'],
                            'ITFT' => $itft2,
                            'ITIDINUM' => $gda['ITIDINUM'],
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
                            'ITDOCONO' => $gda["ITDOCNO"],
                            'ITDOCOTY' => $gda["ITDOCTY"],
                            'ITDOCOSQ' => $gda["ITDOCSQ"],
                        );
                        array_push($result2, $data_array2);
                        $sq += 10 ;
                    }
                    else{
                        $data_array2 = array(             
                            'ITCOID' => $gda2['ITCOID'],
                            'ITIDBUID' => $itidbuid,
                            'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                            'ITDOCTY' => $docty,
                            'ITDOCSQ' => $sq,
                            'ITDOCDT' => $gda2['ITDOCDT'],
                            'ITBUID1' => $gda2['ITBUID1'],
                            'ITLNTY' => $gda2['ITLNTY'],
                            'ITICU' => $no,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $docno["b"],
                            'ITDOCYR' => $nnyr,
                            'ITDOCTM' => $gda2['ITDOCTM'],
                            'ITMSTY' => $gda2['ITMSTY'],
                            'ITFT' => $itft2,
                            'ITIDINUM' => $gda['ITIDINUM'],
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
                            'ITDOCONO' => $gda["ITDOCNO"],
                            'ITDOCOTY' => $gda["ITDOCTY"],
                            'ITDOCOSQ' => $gda["ITDOCSQ"],
                        );
                        array_push($result2, $data_array2);
                        $sq += 10 ;
                    }
                endforeach;
            }
            $this->db->insert_batch('t4111',$result2);
        }
        else {
            $getStatus = $this->BerkasBaru_model->getStatusApprov();
            $status = $getStatus->DTDC;
            // ubah status jadi approval->draft di t4312 dan t4111 OV IT
            $this->BerkasBaru_model->UbahKeDraft($ovdocno, $ovidbuid, $status);
        }
        redirect('BerkasBaru/index','refresh');
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

    public function Edit_Berkas($ovdocno, $ovdocsq, $ovidbuid) {
        $data['title'] = 'Edit Berkas';

        $data['berkas'] = $this->BerkasBaru_model->GetBerkasById($ovdocno, $ovdocsq, $ovidbuid);
        $data['opd'] = $this->BerkasBaru_model->getOpd();
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['KabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

        $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            $this->load->view('template/Header',$data);
            $this->load->view('BerkasBaru/Edit_Berkas',$data);
            $this->load->view('template/Footer',$data);
        }
        else{
            $this->BerkasBaru_model->Edit_Berkas($ovdocno, $ovdocsq, $ovidbuid);
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

        $this->BerkasBaru_model->Update_t0002($ovidbuid);
        redirect('BerkasBaru/Print/'.$ovidbuid.'/'.$ovdocno,'refresh');
    }

    public function Print($ovidbuid, $ovdocno) {
        $data['title'] = 'Cetak Berita Acara';

        $data['getData'] = $this->BerkasBaru_model->dataKonfirmasi($ovidbuid, $ovdocno);
        $data['get_berkas2'] = $this->BerkasBaru_model->getBerkas2($ovdocno);
        $data['pimpinan'] = $this->BerkasBaru_model->getPimpinan();
        $data['jabatan'] = $this->BerkasBaru_model->getJabatan();

        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
        $this->pdf->set_option('isRemoteEnabled', true); 
		$this->pdf->filename = "Berita-acara.pdf";
		$this->pdf->load_view('BerkasBaru/Cetak', $data);
    }
}

/* End of file BerkasBaru.php */

?>