<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamBerkas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('PinjamBerkas_model');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Pinjam Berkas';
            $data['getAllBerkas'] = $this->PinjamBerkas_model->getAllBerkas();
            $data['getAllBerkas_opd'] = $this->PinjamBerkas_model->getAllBerkas_opd();
            $data['jenis_berkas'] = $this->PinjamBerkas_model->getJenisBerkas();
            $data['berkas_bpkad'] = $this->PinjamBerkas_model->getBerkasBPKAD();
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function History_Pinjam_Berkas() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = ' History Pinjam Berkas';
            $data['getAllBerkas'] = $this->PinjamBerkas_model->getAllBerkas_history_pinjam();
            $data['getAllBerkas_opd'] = $this->PinjamBerkas_model->getAllBerkas_history_pinjam_opd();
            $data['jenis_berkas'] = $this->PinjamBerkas_model->getJenisBerkas();
            $data['berkas_bpkad'] = $this->PinjamBerkas_model->getBerkasBPKAD();
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/History_pinjam_berkas',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function get_Kendaraan()
    {
        $data = $this->BerkasBaru_model->getKendaraan();
        echo json_encode($data);
    }

    public function get_Kecamatan($dtdc)
    {
        $data = $this->PinjamBerkas_model->getKecamatan($dtdc);
        echo json_encode($data);
    }

    public function get_Desa($dtdc1)
    {
        $data = $this->PinjamBerkas_model->getDesa($dtdc1);
        echo json_encode($data);
    }

    public function get_Lokasi($idbuid)
    {
        $data = $this->PinjamBerkas_model->getLokasi($idbuid);
        echo json_encode($data);
    }

    public function get_Sertifikat()
    {
        $data = $this->PinjamBerkas_model->getSertifikat();
        echo json_encode($data);
    }

    public function pengajuan_pinjam_berkas() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Pengajuan Pinjam Berkas';
            $data['get_berkas_t1201'] = $this->PinjamBerkas_model->get_berkas_t1201();
    
            $this->form_validation->set_rules('ITDESB2', 'Keterangan', 'required');
    
            $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
            $tahun = $getTahunBulan->CNCFY;
            $bulan = $getTahunBulan->CNCAP;
            $uid = $this->session->userdata('SCUSI');
            $scidbuid = $this->session->userdata('SCIDBUID');
    
            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/Header',$data);
                $this->load->view('PinjamBerkas/Pengajuan_pinjam_berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                //PROSEDUR PENOMORAN IT PINJAM BERKAS
                $this->PinjamBerkas_model->Update_IT($tahun, $bulan);
                $getIT = $this->PinjamBerkas_model->getIT($tahun, $bulan);
    
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
    
                $iticut = "I";
                $icu = $this->input->post('ITICU');
                //GET LINETYPE
                $ovlnty = $this->PinjamBerkas_model->getLineType();
                $linetype = $ovlnty->DTDC;
    
                //GET STATUS DRAFT
                $post = $this->PinjamBerkas_model->getStatusDraft();
                $status = $post->DTDC;
    
                //get msty, linetype, buid1, glcls
                $get_data_t4312 = $this->PinjamBerkas_model->get_data_t4312($icu);
                $itmsty = $get_data_t4312->OVMSTY;
                $itglcls = $get_data_t4312->OVGLCLS;
                $itbuid1 = $get_data_t4312->OVBUID1; 
                $itidinum = $get_data_t4312->OVIDINUM; 
                $ituom1 = $get_data_t4312->OVUOM1; 
    
                //GET IDBUID DAN LOCID BPKAD
                $idbuid = $this->PinjamBerkas_model->getBnidbuid();
                $itidbuid = $idbuid->BNIDBUID;
                $locid = $this->PinjamBerkas_model->getLocid();
                $itlocid = $locid->LMLOCID;
    
                //get data t1201 untuk di-insert ke t4111
                $get_data_t1201 = $this->PinjamBerkas_model->get_data_t1201($icu);
    
                //GET LOKASI OPD
                $get_locid_opd = $this->PinjamBerkas_model->get_locid_opd_t41021($icu);
                $locid_opd_to = $get_locid_opd->ILLOCID;
    
                $docty = "IT";
                $itft_from = "F";
                $itft_to = "T";
                $result = array();
                date_default_timezone_set('Asia/Jakarta');
                $ip = $_SERVER['REMOTE_ADDR'];
                $itqty_from = "-1";
                $itqty_to = "1";
                $sq = 10;
    
                //FROM
                foreach($get_data_t1201 as $fa) :
                    $data_array = array(
                        'ITCOID' => $fa["FACOID"],
                        // 'ITIDBUID' => $itidbuid,
                        'ITIDBUID' => $fa["FAIDBUID"],
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_from,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $fa["FAALOC"],
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_from,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result, $data_array);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result);
    
                //TO
                $result2 = array();
                $get_idbuid_locid_opd_to = $this->PinjamBerkas_model->get_idbuid_locid_opd_to($icu);
                // $idbuid_opd = $get_idbuid_locid_opd_to->ILIDBUID;
                $locid_opd = $get_idbuid_locid_opd_to->ILLOCID;
    
                foreach($get_data_t1201 as $fa2) :
                    $data_array2 = array(
                        'ITCOID' => $fa2["FACOID"],
                        // 'ITIDBUID' => $idbuid_opd,
                        'ITIDBUID' => $scidbuid,
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_to,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $locid_opd,
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_to,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result2, $data_array2);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result2);
    
                //SET STATUS DI t1201 = DRAFT
                $this->PinjamBerkas_model->UbahKeDraft($icu, $status);
    
                redirect('PinjamBerkas/index','refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function simpan_tambah() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Pengajuan Pinjam Berkas';
            $data['get_berkas_t1201'] = $this->PinjamBerkas_model->get_berkas_t1201();
    
            $this->form_validation->set_rules('ITDESB2', 'Keterangan', 'required');
    
            $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
            $tahun = $getTahunBulan->CNCFY;
            $bulan = $getTahunBulan->CNCAP;
            $scidbuid = $this->session->userdata('SCIDBUID');
            $uid = $this->session->userdata('SCUSI');
    
            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/Header',$data);
                $this->load->view('PinjamBerkas/Pengajuan_pinjam_berkas',$data);
                $this->load->view('template/Footer',$data);
            }
            else {
                //PROSEDUR PENOMORAN IT PINJAM BERKAS
                $this->PinjamBerkas_model->Update_IT($tahun, $bulan);
                $getIT = $this->PinjamBerkas_model->getIT($tahun, $bulan);
    
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
    
                $iticut = "I";
                $icu = $this->input->post('ITICU');
                //GET LINETYPE
                $ovlnty = $this->PinjamBerkas_model->getLineType();
                $linetype = $ovlnty->DTDC;
    
                //GET STATUS DRAFT
                $post = $this->PinjamBerkas_model->getStatusDraft();
                $status = $post->DTDC;
    
                //GET LOKASI OPD
                $get_locid_opd = $this->PinjamBerkas_model->get_locid_opd_t41021($icu);
                $locid_opd_to = $get_locid_opd->ILLOCID;
    
                //get msty, linetype, buid1, glcls
                $get_data_t4312 = $this->PinjamBerkas_model->get_data_t4312($icu);
                $itmsty = $get_data_t4312->OVMSTY;
                $itglcls = $get_data_t4312->OVGLCLS;
                $itbuid1 = $get_data_t4312->OVBUID1; 
                $itidinum = $get_data_t4312->OVIDINUM; 
                $ituom1 = $get_data_t4312->OVUOM1; 
    
                //GET IDBUID DAN LOCID BPKAD
                $idbuid = $this->PinjamBerkas_model->getBnidbuid();
                $itidbuid = $idbuid->BNIDBUID;
                $locid = $this->PinjamBerkas_model->getLocid();
                $itlocid = $locid->LMLOCID;
    
                //get data t1201 untuk di-insert ke t4111
                $get_data_t1201 = $this->PinjamBerkas_model->get_data_t1201($icu);
    
                $docty = "IT";
                $itft_from = "F";
                $itft_to = "T";
                $result = array();
                date_default_timezone_set('Asia/Jakarta');
                $ip = $_SERVER['REMOTE_ADDR'];
                // $ituid = "admin1";
                $itqty_from = "-1";
                $itqty_to = "1";
                $sq = 10;
    
                //FROM
                foreach($get_data_t1201 as $fa) :
                    $data_array = array(
                        'ITCOID' => $fa["FACOID"],
                        'ITIDBUID' => $fa["FAIDBUID"],
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_from,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $fa["FAALOC"],
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_from,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result, $data_array);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result);
    
                //TO
                $get_idbuid_locid_opd_to = $this->PinjamBerkas_model->get_idbuid_locid_opd_to($icu);
                // $idbuid_opd = $get_idbuid_locid_opd_to->ILIDBUID;
                $locid_opd = $get_idbuid_locid_opd_to->ILLOCID;
    
                $result2 = array();
                foreach($get_data_t1201 as $fa2) :
                    $data_array2 = array(
                        'ITCOID' => $fa2["FACOID"],
                        'ITIDBUID' => $scidbuid,
                        'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_to,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $locid_opd,
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_to,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result2, $data_array2);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result2);
                $it_docno_peminjaman = $docno["a"].$docno["b"].$docno["c"];
    
                //SET STATUS DI t1201 = DRAFT
                $this->PinjamBerkas_model->UbahKeDraft($icu, $status);
    
                redirect('PinjamBerkas/tambah_baru/'.$it_docno_peminjaman,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function tambah_baru($it_docno_peminjaman) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Pengajuan Peminjaman Berkas 2';

            $data['get_berkas2_t1201'] = $this->PinjamBerkas_model->get_berkas2_t1201($it_docno_peminjaman);
            $data['get_data_peminjaman'] = $this->PinjamBerkas_model->get_data_peminjaman($it_docno_peminjaman);
            $data['data_peminjaman'] = $this->PinjamBerkas_model->data_peminjaman($it_docno_peminjaman);
            
            $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
            $tahun = $getTahunBulan->CNCFY;
            $bulan = $getTahunBulan->CNCAP;
            $uid = $this->session->userdata('SCUSI');
            $scidbuid = $this->session->userdata('SCIDBUID');
    
            $this->form_validation->set_rules('ITDESB2', 'Keterangan', 'required');
    
            if($this->form_validation->run() == FALSE) {
                $this->load->view('template/Header',$data);
                $this->load->view('PinjamBerkas/Pengajuan_pinjam_berkas2',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $getIT = $this->PinjamBerkas_model->getIT($tahun, $bulan);
    
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
    
                $cek_docsq = $this->PinjamBerkas_model->Cek_sq($it_docno_peminjaman);
                $sq = $cek_docsq->ITDOCSQ + 10;
    
                $iticut = "I";
                $icu = $this->input->post('ITICU');
                //GET LINETYPE
                $ovlnty = $this->PinjamBerkas_model->getLineType();
                $linetype = $ovlnty->DTDC;
    
                //GET STATUS DRAFT
                $post = $this->PinjamBerkas_model->getStatusDraft();
                $status = $post->DTDC;
    
                //get msty, linetype, buid1, glcls
                $get_data_t4312 = $this->PinjamBerkas_model->get_data_t4312($icu);
                $itmsty = $get_data_t4312->OVMSTY;
                $itglcls = $get_data_t4312->OVGLCLS;
                $itbuid1 = $get_data_t4312->OVBUID1; 
                $itidinum = $get_data_t4312->OVIDINUM; 
                $ituom1 = $get_data_t4312->OVUOM1; 
    
                //GET IDBUID DAN LOCID BPKAD
                $idbuid = $this->PinjamBerkas_model->getBnidbuid();
                $itidbuid = $idbuid->BNIDBUID;
                $locid = $this->PinjamBerkas_model->getLocid();
                $itlocid = $locid->LMLOCID;
    
                //get data t1201 untuk di-insert ke t4111
                $get_data_t1201 = $this->PinjamBerkas_model->get_data_t1201($icu);
    
                $docty = "IT";
                $itft_from = "F";
                $itft_to = "T";
                $result = array();
                date_default_timezone_set('Asia/Jakarta');
                $ip = $_SERVER['REMOTE_ADDR'];
                // $ituid = "admin1";
                $itqty_from = "-1";
                $itqty_to = "1";
    
                //FROM
                foreach($get_data_t1201 as $fa) :
                    $data_array = array(
                        'ITCOID' => $fa["FACOID"],
                        'ITIDBUID' => $fa["FAIDBUID"],
                        'ITDOCNO' => $it_docno_peminjaman,
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_from,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $fa["FAALOC"],
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_from,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result, $data_array);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result);
    
                //TO
                $get_idbuid_locid_opd_to = $this->PinjamBerkas_model->get_idbuid_locid_opd_to($icu);
                // $idbuid_opd = $get_idbuid_locid_opd_to->ILIDBUID;
                $locid_opd = $get_idbuid_locid_opd_to->ILLOCID;
    
                $result2 = array();
                foreach($get_data_t1201 as $fa2) :
                    $data_array2 = array(
                        'ITCOID' => $fa2["FACOID"],
                        'ITIDBUID' => $scidbuid,
                        'ITDOCNO' => $it_docno_peminjaman,
                        'ITDOCTY' => $docty,
                        'ITDOCSQ' => $sq,
                        'ITDOCDT' => date('Y-m-d H:i:s', time()),
                        'ITBUID1' => $itbuid1,
                        'ITLNTY' => $linetype,
                        'ITICU' => $icu,
                        'ITICUT' => $iticut,
                        'ITDOCMO' => $docno["b"],
                        'ITDOCYR' => $nnyr,
                        'ITDOCTM' => date('Y-m-d H:i:s', time()),
                        'ITMSTY' => $itmsty,
                        'ITFT' => $itft_to,
                        'ITIDINUM' => $itidinum,
                        'ITGLCLS' => $itglcls,
                        'ITUOM1' => $ituom1,
                        'ITINUM' => $fa["FAAOBJ"],
                        'ITLOCID' => $locid_opd,
                        'ITDESB1' => $fa["FADESB1"],
                        'ITPOST' => $status,
                        'ITBRAND' => $fa["FABRAND"],
                        'ITCOLOR' => $fa['FACOLOR'],
                        'ITLENGTH' => $fa['FALENGTH'],
                        'ITWIDTH' => $fa['FAWIDTH'],
                        'ITWIDE' => $fa['FAWIDE'],
                        'ITCILCAP' => $fa['FACILCAP'],
                        'ITMFN' => $fa['FAMFN'],
                        'ITMACHNID' => $fa['FAMACHNID'],
                        'ITVHRN' => $fa['FAVHRN'],
                        'ITVHTAXDT' => $fa['FAVHTAXDT'],
                        'ITVHRNTAXDT' => $fa['FAVHRNTAXDT'],
                        'ITLNDOWNST' => $fa['FALNDOWNST'],
                        'ITCRTFID' => $fa['FACRTFID'],
                        'ITCRTFDT' => $fa['FACRTFDT'],
                        'ITASADDR' => $fa['FAASADDR'],
                        'ITCITY' => $fa['FACITY'],
                        'ITDIST' => $fa['FADIST'],
                        'ITSUBDIST' => $fa['FASUBDIST'],
                        'ITMANAGE' => $fa['FAMANAGE'],
                        'ITUID' => $uid,
                        'ITUIDM' => $uid,
                        'ITDTIN' => date('Y-m-d H:i:s', time()),
                        'ITDTLU' => date('Y-m-d H:i:s', time()),
                        'ITIPUID' => $ip,
                        'ITIPUIDM' => $ip,
                        'ITCOMV' => $fa['FACOMV'],
                        'ITQTY' => $itqty_to,
                        'ITDOCONO' => $fa["FARLDOCNO"],
                        'ITDOCOTY' => $fa["FARLDOCTY"],
                        'ITDOCOSQ' => $fa["FARLDOCSQ"],
                        'ITDESB2' => $this->input->post('ITDESB2')
                    );
                    array_push($result2, $data_array2);
                    $sq += 10 ;
                endforeach;
                $this->db->insert_batch('t4111', $result2);
    
                //SET STATUS DI t1201 = DRAFT
                $this->PinjamBerkas_model->UbahKeDraft($icu, $status);
    
                redirect('PinjamBerkas/Tambah_Baru/'.$it_docno_peminjaman,'refresh');
            }
        }
        else {
            redirect('Login/logout');
        }
    }

    public function hapus_berkas_pinjam($itdocno, $iticu) {
        if (isset($_SESSION['SCUSG'])) {
            $this->PinjamBerkas_model->Hapus_berkas_peminjaman($itdocno, $iticu);
            redirect('PinjamBerkas/tambah_baru/'.$itdocno, 'refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_pinjam_berkas($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Detail Pinjam Berkas';
            $data['get_berkas'] = $this->PinjamBerkas_model->getBerkas($itdocno);
            $data['get_berkas2'] = $this->PinjamBerkas_model->getBerkas2($itdocno);

            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/Detail_pinjam_berkas',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Detail_pinjam_berkas_bpkad($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Detail Pinjam Berkas';
            $data['get_berkas'] = $this->PinjamBerkas_model->getBerkas($itdocno);
            $data['get_berkas2'] = $this->PinjamBerkas_model->getBerkas2($itdocno);
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/Detail_pinjam_berkas_bpkad',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function hapus_pengajuan_pinjam($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $get_icu = $this->PinjamBerkas_model->getIcu($itdocno);
            foreach($get_icu as $gi) :
                $this->PinjamBerkas_model->Ubah_status($gi["ITICU"]);
            endforeach;
            
            $this->PinjamBerkas_model->hapus_pengajuan_pinjam($itdocno);
            redirect('PinjamBerkas/index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Konfirmasi($itdocno, $itidbuid) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Konfirmasi Data';

            $data['getData'] = $this->PinjamBerkas_model->dataKonfirmasi($itdocno, $itidbuid);
            $data['get_berkas2'] = $this->PinjamBerkas_model->getBerkas2($itdocno);
            $data['pimpinan'] = $this->PinjamBerkas_model->getPimpinan();
            $data['jabatan'] = $this->PinjamBerkas_model->getJabatan();
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/Konfirmasi_cetak',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Print($itidbuid, $itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Cetak Berita Acara Peminjaman';

            $data['getData'] = $this->PinjamBerkas_model->dataKonfirmasi($itdocno, $itidbuid);
            $data['get_data_peminjaman'] = $this->PinjamBerkas_model->get_data_peminjaman($itdocno);
    
            $p = $this->input->post('BNCC01');
            $data['pimpinan'] = $this->PinjamBerkas_model->getAdnm($p);
            $j = $this->input->post('BNCC02');
            $data['jabatan'] = $this->PinjamBerkas_model->getDtdesc1($j);
            $data['nip'] = $this->input->post('nip');
    
            $this->load->library('pdf');
            $this->pdf->setPaper('A4', 'potrait');
            $this->pdf->set_option('isRemoteEnabled', true); 
            $this->pdf->filename = "Berita-acara-peminjaman.pdf";
            $this->pdf->load_view('PinjamBerkas/Cetak', $data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Approval($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $getStatus = $this->PinjamBerkas_model->getStatusApprov();
            $status = $getStatus->DTDC;
    
            //SET STATUS DI T4111 DAN T1201 JADI DIUSULKAN OPD
            $this->PinjamBerkas_model->UbahKeApprov_t4111($itdocno, $status);
    
            // GET ICU DARI ITDOCNO DI T4111 UNTUK MENGUBAH STATUS DI T1201
            $get_icu = $this->PinjamBerkas_model->getIcu($itdocno);
            foreach($get_icu as $gi) :
                $this->PinjamBerkas_model->UbahKeApprov_t1201($gi["ITICU"], $status);
            endforeach;
    
            redirect('PinjamBerkas/index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function PinjamBerkas_BPKAD_index() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = "Pengajuan Peminjaman Berkas";
            $data['getAllBerkas'] = $this->PinjamBerkas_model->getAllberkas();
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/PinjamBerkas_bpkad_index',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function verifikasi_peminjaman($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $getStatus = $this->PinjamBerkas_model->getStatusVerifikasi();
            $status = $getStatus->DTDC;
    
            //SET STATUS DI T4111 DAN T1201 JADI VERIFIKASI PEMINJAMAN
            $this->PinjamBerkas_model->UbahKeVerifikasi_t4111($itdocno, $status);
    
            $get_icu = $this->PinjamBerkas_model->getIcu($itdocno);
            foreach($get_icu as $gi) :
                $this->PinjamBerkas_model->UbahKeVerifikasi_t1201($gi["ITICU"], $status);
            endforeach;
    
            redirect('PinjamBerkas/PinjamBerkas_BPKAD_index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function revisi_peminjaman($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $getStatus = $this->PinjamBerkas_model->getStatusDraft();
            $status = $getStatus->DTDC;
    
            //SET STATUS DI T4111 DAN T1201 JADI VERIFIKASI PEMINJAMAN
            $this->PinjamBerkas_model->UbahKeDraft_t4111($itdocno, $status);
    
            $get_icu = $this->PinjamBerkas_model->getIcu($itdocno);
            foreach($get_icu as $gi) :
                $this->PinjamBerkas_model->UbahKeDraft_t1201($gi["ITICU"], $status);
            endforeach;
    
            redirect('PinjamBerkas/PinjamBerkas_BPKAD_index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Acc($itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            // $getStatus = $this->PinjamBerkas_model->getStatusFinish();
            $getStatus = $this->PinjamBerkas_model->getStatusBerkasKeluar();
            $status = $getStatus->DTDC;

            //SET STATUS DI T4111 DAN T1201 JADI FINISH
            $this->PinjamBerkas_model->UbahKeBerkasKeluar_t4111($itdocno, $status);

            $get_icu = $this->PinjamBerkas_model->getIcu($itdocno);
            foreach($get_icu as $gi) :
                $get_lokasi_opd = $this->PinjamBerkas_model->get_lokasi_opd($itdocno, $gi["ITICU"]);
                $lokasi_opd = $get_lokasi_opd->ITLOCID;
                $idbuid_opd = $get_lokasi_opd->ITIDBUID;

                // dd($get_lokasi_opd);
                $this->PinjamBerkas_model->Berkas_keluar_t1201($gi["ITICU"], $status, $lokasi_opd, $idbuid_opd);
            endforeach;

            date_default_timezone_set('Asia/Jakarta');

            $from_t41021 = array();
            $pqoh_from = "0";
            //UPDATE QTY DI t41021
            foreach($get_icu as $gif):
                //PERULANGAN FROM
                $from = $this->PinjamBerkas_model->get_t41021_from($gif["ITICU"]);
                foreach ($from as $f) :
                    $from_t41021 = [
                        'ILPQOH' => $pqoh_from,
                        'ILDTLU' => date('Y-m-d H:i:s', time())
                    ];
                    $this->db->update('t41021', $from_t41021, array('ILICU' => $gif["ITICU"], 'ILIDBUID' => '16445'));
                endforeach;
            endforeach;

            $to_t41021 = array();
            foreach($get_icu as $gif2):
                //PERULANGAN TO
                $to = $this->PinjamBerkas_model->get_t41021_to($gif2["ITICU"]);
                foreach ($to as $t) :
                    $to_t41021 = [
                        'ILPQOH' => 1,
                        'ILDTLU' => date('Y-m-d H:i:s', time())
                    ];
                    $this->db->update('t41021', $to_t41021, array('ILICU' => $gif2["ITICU"], 'ILIDBUID !=' => '16445'));
                endforeach;
            endforeach;

            redirect('PinjamBerkas/PinjamBerkas_BPKAD_index','refresh');
        }
        else {
            redirect('Login/logout');
        }
    }

    public function Berkas_keluar() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = "Berkas Keluar";
            $data['berkas_dipinjam'] = $this->PinjamBerkas_model->get_berkas_dipinjam();
            
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/Pengembalian',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function History() {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = "History Berkas Keluar";
            $data['berkas_dipinjam'] = $this->PinjamBerkas_model->get_berkas_dipinjam_history();
            
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/History',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }

    public function form_perubahan_data($icu, $itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Perubahan Data Pengembalian';
            $data['perubahan'] = $this->PinjamBerkas_model->data_perubahan_pengembalian($icu);
    
            $this->load->view('template/Header',$data);
            $this->load->view('PinjamBerkas/Perubahan_data',$data);
            $this->load->view('template/Footer',$data);
        }
        else {
            redirect('Login/logout');
        }
    }
    
    public function Perubahan($icu, $itdocno) {
        if (isset($_SESSION['SCUSG'])) {
            $data['title'] = 'Perubahan Data Pengembalian';
        $data['perubahan'] = $this->PinjamBerkas_model->data_perubahan_pengembalian($icu);

        // $this->form_validation->set_rules('ITCOMV', 'Nomor BPKB', 'required');

        // if($this->form_validation->run() == FALSE) {
        //     $this->load->view('template/Header',$data);
        //     $this->load->view('PinjamBerkas/Perubahan_data',$data);
        //     $this->load->view('template/Footer',$data);
        // }
        // else{
            $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
            $tahun = $getTahunBulan->CNCFY;
            $bulan = $getTahunBulan->CNCAP;
            $uid = $this->session->userdata('SCUSI');
            $scidbuid = $this->session->userdata('SCIDBUID');

            //Update nomor dokumen IT
            $this->PinjamBerkas_model->Update_IT($tahun, $bulan);
            $getIT = $this->PinjamBerkas_model->getIT($tahun, $bulan);

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

            // GET STATUS FINISH
            $finish = $this->PinjamBerkas_model->getStatusFinish();
            $status = $finish->DTDC;
            $this->PinjamBerkas_model->update_doc_peminjaman_finish($itdocno, $icu, $status);

            //GET DATA FROM PEMINJAMAN DARI t4111
            $t4111 = $this->PinjamBerkas_model->data_t4111($itdocno, $icu); //IDBUID = OPD
            // INSERT PENGEMBALIAN DATA DI T4111 FROM OPD TO BPKAD
            $pengembalian_from = array();
            $pengembalian_to = array();
            $sq = 10;
            date_default_timezone_set('Asia/Jakarta');
            $ip = $_SERVER['REMOTE_ADDR'];
            $itft_from = "F";
            $itft_to = "T";
            $itqty_from = "-1";
            $itqty_to = "1";
            // $ituid = "admin1";
            // FROM
            foreach($t4111 as $b) :
                $data_array = array(
                    'ITCOID' => $b['ITCOID'],
                    'ITIDBUID' => $b['ITIDBUID'],
                    'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                    'ITDOCTY' => $b['ITDOCTY'],
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $b['ITBUID1'],
                    'ITLNTY' => $b['ITLNTY'],
                    'ITICU' => $icu,
                    'ITICUT' => $b['ITICUT'],
                    'ITDOCMO' => $docno["b"],
                    'ITDOCYR' => $nnyr,
                    'ITDOCTM' => date('Y-m-d H:i:s', time()),
                    'ITMSTY' => $b['ITMSTY'],
                    'ITFT' => $itft_from,
                    'ITIDINUM' => $b['ITIDINUM'],
                    'ITGLCLS' => $b['ITGLCLS'],
                    'ITUOM1' => $b['ITUOM1'],
                    'ITINUM' => $b['ITINUM'],
                    'ITLOCID' => $b['ITLOCID'],
                    'ITDESB1' => $b['ITDESB1'],
                    'ITDESB2' => $b['ITDESB2'],
                    'ITPOST' => $status,
                    'ITBRAND' => $b['ITBRAND'],
                    'ITCOLOR' => $b['ITCOLOR'],
                    'ITLENGTH' => $b['ITLENGTH'],
                    'ITWIDTH' => $b['ITWIDTH'],
                    'ITWIDE' => $b['ITWIDE'],
                    'ITCILCAP' => $b['ITCILCAP'],
                    'ITMFN' => $b['ITMFN'],
                    'ITMACHNID' => $b['ITMACHNID'],
                    'ITVHRN' => $b['ITVHRN'],
                    'ITVHTAXDT' => $b['ITVHTAXDT'],
                    'ITVHRNTAXDT' => $b['ITVHRNTAXDT'],
                    'ITLNDOWNST' => $b['ITLNDOWNST'],
                    'ITCRTFID' => $b['ITCRTFID'],
                    'ITCRTFDT' => $b['ITCRTFDT'],
                    'ITASADDR' => $b['ITASADDR'],
                    'ITCITY' => $b['ITCITY'],
                    'ITDIST' => $b['ITDIST'],
                    'ITSUBDIST' => $b['ITSUBDIST'],
                    'ITMANAGE' => $b['ITMANAGE'],
                    'ITUID' => $uid,
                    'ITUIDM' => $uid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip,
                    'ITCOMV' => $b['ITCOMV'],
                    'ITQTY' => $itqty_from,
                    'ITDOCONO' => $itdocno,
                    'ITDOCOTY' => $b["ITDOCTY"],
                    'ITDOCOSQ' => $b["ITDOCSQ"]
                );
                array_push($pengembalian_from, $data_array);
                $sq += 10;
            endforeach;
            $this->db->insert_batch('t4111', $pengembalian_from);

            // TO
            $bpkad = $this->PinjamBerkas_model->getBnidbuid(); //GET IDBUID BPKAD
            $itidbuid = $bpkad->BNIDBUID;
            $loc_bpkad = $this->PinjamBerkas_model->getLocid(); // GET LOCID BPKAD
            $itlocid = $loc_bpkad->LMLOCID;

            foreach($t4111 as $b2) :
                $data_array2 = array(
                    'ITCOID' => $b2['ITCOID'],
                    'ITIDBUID' => $itidbuid,
                    'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                    'ITDOCTY' => $b2['ITDOCTY'],
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $b2['ITBUID1'],
                    'ITLNTY' => $b2['ITLNTY'],
                    'ITICU' => $icu,
                    'ITICUT' => $b2['ITICUT'],
                    'ITDOCMO' => $docno["b"],
                    'ITDOCYR' => $nnyr,
                    'ITDOCTM' => date('Y-m-d H:i:s', time()),
                    'ITMSTY' => $b2['ITMSTY'],
                    'ITFT' => $itft_to,
                    'ITIDINUM' => $b2['ITIDINUM'],
                    'ITGLCLS' => $b2['ITGLCLS'],
                    'ITUOM1' => $b2['ITUOM1'],
                    'ITINUM' => $b2['ITINUM'],
                    'ITLOCID' => $itlocid,
                    'ITDESB1' => $b2['ITDESB1'],
                    'ITDESB2' => $b2['ITDESB2'],
                    'ITPOST' => $status,
                    'ITBRAND' => $b2['ITBRAND'],
                    'ITCOLOR' => $b2['ITCOLOR'],
                    'ITLENGTH' => $b2['ITLENGTH'],
                    'ITWIDTH' => $b2['ITWIDTH'],
                    'ITWIDE' => $b2['ITWIDE'],
                    'ITCILCAP' => $b2['ITCILCAP'],
                    'ITMFN' => $b2['ITMFN'],
                    'ITMACHNID' => $b2['ITMACHNID'],
                    'ITVHRN' => $b2['ITVHRN'],
                    'ITVHTAXDT' => $b2['ITVHTAXDT'],
                    'ITVHRNTAXDT' => $b2['ITVHRNTAXDT'],
                    'ITLNDOWNST' => $b2['ITLNDOWNST'],
                    'ITCRTFID' => $b2['ITCRTFID'],
                    'ITCRTFDT' => $b2['ITCRTFDT'],
                    'ITASADDR' => $b2['ITASADDR'],
                    'ITCITY' => $b2['ITCITY'],
                    'ITDIST' => $b2['ITDIST'],
                    'ITSUBDIST' => $b2['ITSUBDIST'],
                    'ITMANAGE' => $b2['ITMANAGE'],
                    'ITUID' => $uid,
                    'ITUIDM' => $uid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip,
                    'ITCOMV' => $b2['ITCOMV'],
                    'ITQTY' => $itqty_to,
                    'ITDOCONO' => $itdocno,
                    'ITDOCOTY' => $b2["ITDOCTY"],
                    'ITDOCOSQ' => $b2["ITDOCSQ"]
                );
                array_push($pengembalian_to, $data_array2);
                $sq += 10;
            endforeach;
            $this->db->insert_batch('t4111', $pengembalian_to);

            //GET IDBUID DAN LOCID BPKAD
            $idbuid = $this->PinjamBerkas_model->getBnidbuid();
            $idbuid_bpkad = $idbuid->BNIDBUID;
            $locid = $this->PinjamBerkas_model->getLocid();
            $locid_bpkad = $locid->LMLOCID;

            // UPDATE STATUS = FINISH DAN UPDATE DI T1201 DAN T41021
            $this->PinjamBerkas_model->update_pengembalian_t1201($icu, $status, $idbuid_bpkad, $locid_bpkad);
            $this->PinjamBerkas_model->update_pengembalian_t41021($icu);

            //CEK ADA PERUBAHAN DATA ATAU TIDAK
            $post = $this->input->post();
            $cek = $this->PinjamBerkas_model->cek_perubahan_data($icu);

            if($cek->OVMSTY == "1") {
                $vhtaxdt = date('Y-m-d', strtotime($cek->FAVHTAXDT));
                $vhrntaxdt = date('Y-m-d', strtotime($cek->FAVHRNTAXDT));
                if($post["ITVHRN"] != $cek->FAVHRN || $post["ITVHTAXDT"] != $vhtaxdt || $post["ITVHRNTAXDT"] != $vhrntaxdt || $post["ITCOMV"] != $cek->FACOMV) {
                    // INSERT PERUBAHAN DI T4111 FROM BPKAD TO BPKAD
                    // PROSEDUR PENOMORAN TIPE DOKUMEN IR
                    $cek_ir = $this->PinjamBerkas_model->Cek_ir($tahun, $bulan);
                    if($cek_ir->num_rows() == 0) {
                        $this->PinjamBerkas_model->Insert_ir_t0002($tahun, $bulan);
                        $this->PinjamBerkas_model->Update_ir($tahun, $bulan);
                    }
                    else{
                        $this->PinjamBerkas_model->Update_ir($tahun, $bulan);
                    }
    
                    $getIR = $this->PinjamBerkas_model->getIR($tahun, $bulan);
                    $nnseq_ir= $getIR->NNSEQ;
                    $fzeropadded_ir = sprintf("%05d", $nnseq_ir);
    
                    $nnyr_ir = $getIR->NNYR;
                    $x = substr($nnyr_ir, 2);
    
                    $nnmo_ir = $getIR->NNMO;
                    $fzeropadded2_ir = sprintf("%02d", $nnmo_ir);
                    
                    $docno_ir = [
                        'a' => $x,
                        'b' => $fzeropadded2_ir,
                        'c' => $fzeropadded_ir
                    ];
    
                    //get data yang tidak ada pada field t1201
                    $data_not_in_t1201 = $this->PinjamBerkas_model->get_data_not_in_t1201($icu);
                    $itmsty = $data_not_in_t1201->OVMSTY;
                    $itglcls = $data_not_in_t1201->OVGLCLS;
                    $itlnty = $data_not_in_t1201->OVLNTY;
                    $itidinum = $data_not_in_t1201->OVIDINUM;
                    $itbuid1 = $data_not_in_t1201->OVBUID1;
                    $ituom1 = $data_not_in_t1201->OVUOM1;
    
                    //from dari data lama t1201 dan data baru dari inputan
                    $iticut = "I";
                    $itdocty = "IR";
                    $sq_ir = 10;
                    $perubahan_from = array();
                    $perubahan_to = array();
                    $data_perubahan = $this->PinjamBerkas_model->data_perubahan_from($icu);
                    foreach($data_perubahan as $dpf) :
                        $perubahan = array(
                            'ITCOID' => $dpf["FACOID"],
                            'ITIDBUID' => $dpf["FAIDBUID"],
                            'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                            'ITDOCTY' => $itdocty,
                            'ITDOCSQ' => $sq_ir,
                            'ITDOCDT' => date('Y-m-d H:i:s', time()),
                            'ITBUID1' => $itbuid1,
                            'ITLNTY' => $itlnty,
                            'ITICU' => $icu,
                            'ITMSTY' => $itmsty,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $nnmo_ir,
                            'ITDOCYR' => $nnyr_ir,
                            'ITDOCTM' => date('Y-m-d H:i:s', time()),
                            'ITFT' => $itft_from,
                            'ITIDINUM' => $itidinum,
                            'ITUOM1' => $ituom1,
                            'ITGLCLS' => $itglcls,
                            'ITINUM' => $dpf["FAAOBJ"],
                            'ITLOCID' => $dpf["FAALOC"],
                            'ITDESB1' => $dpf["FADESB1"],
                            'ITPOST' => $dpf["FAPOST"],
                            'ITBRAND' => $dpf['FABRAND'],
                            'ITCOLOR' => $dpf['FACOLOR'],
                            'ITLENGTH' => $dpf['FALENGTH'],
                            'ITWIDTH' => $dpf['FAWIDTH'],
                            'ITWIDE' => $dpf['FAWIDE'],
                            'ITCILCAP' => $dpf['FACILCAP'],
                            'ITMFN' => $dpf['FAMFN'],
                            'ITMACHNID' => $dpf['FAMACHNID'],
                            'ITVHRN' => $dpf['FAVHRN'],
                            'ITVHTAXDT' => $dpf['FAVHTAXDT'],
                            'ITVHRNTAXDT' => $dpf['FAVHRNTAXDT'],
                            'ITLNDOWNST' => $dpf['FALNDOWNST'],
                            'ITCRTFID' => $dpf['FACRTFID'],
                            'ITCRTFDT' => $dpf['FACRTFDT'],
                            'ITASADDR' => $dpf['FAASADDR'],
                            'ITCITY' => $dpf['FACITY'],
                            'ITDIST' => $dpf['FADIST'],
                            'ITSUBDIST' => $dpf['FASUBDIST'],
                            'ITMANAGE' => $dpf['FAMANAGE'],
                            'ITUID' => $uid,
                            'ITUIDM' => $uid,
                            'ITDTIN' => date('Y-m-d H:i:s', time()),
                            'ITDTLU' => date('Y-m-d H:i:s', time()),
                            'ITIPUID' => $ip,
                            'ITIPUIDM' => $ip,
                            'ITCOMV' => $dpf['FACOMV'],
                            'ITQTY' => $itqty_from,
                        );
                        array_push($perubahan_from, $perubahan);
                        $sq_ir += 10;
                    endforeach;
                    $this->db->insert_batch('t4111', $perubahan_from);
    
                    // TO
                    foreach($data_perubahan as $dpf2) :
                        $perubahan2 = array(
                            'ITCOID' => $dpf2["FACOID"],
                            'ITIDBUID' => $dpf2["FAIDBUID"],
                            'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                            'ITDOCTY' => $itdocty,
                            'ITDOCSQ' => $sq_ir,
                            'ITDOCDT' => date('Y-m-d H:i:s', time()),
                            'ITBUID1' => $itbuid1,
                            'ITLNTY' => $itlnty,
                            'ITICU' => $icu,
                            'ITMSTY' => $itmsty,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $nnmo_ir,
                            'ITDOCYR' => $nnyr_ir,
                            'ITDOCTM' => date('Y-m-d H:i:s', time()),
                            'ITFT' => $itft_to,
                            'ITIDINUM' => $itidinum,
                            'ITUOM1' => $ituom1,
                            'ITGLCLS' => $itglcls,
                            'ITINUM' => $dpf2["FAAOBJ"],
                            'ITLOCID' => $dpf2["FAALOC"],
                            'ITDESB1' => $dpf2["FADESB1"],
                            'ITPOST' => $dpf2["FAPOST"],
                            'ITBRAND' => $dpf2["FABRAND"],
                            'ITCOLOR' => $dpf2['FACOLOR'],
                            'ITLENGTH' => $dpf2['FALENGTH'],
                            'ITWIDTH' => $dpf2['FAWIDTH'],
                            'ITWIDE' => $dpf2['FAWIDE'],
                            'ITCILCAP' => $dpf2['FACILCAP'],
                            'ITMFN' => $dpf2['FAMFN'],
                            'ITMACHNID' => $dpf2['FAMACHNID'],
                            'ITVHRN' => $this->input->post('ITVHRN', true),
                            'ITVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                            'ITVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                            'ITLNDOWNST' => $this->input->post('ITLNDOWNST', true),
                            'ITCRTFID' => $this->input->post('ITCRTFID', true),
                            'ITCRTFDT' => $this->input->post('ITCRTFDT', true),
                            'ITASADDR' => $dpf2['FAASADDR'],
                            'ITCITY' => $dpf2['FACITY'],
                            'ITDIST' => $dpf2['FADIST'],
                            'ITSUBDIST' => $dpf2['FASUBDIST'],
                            'ITMANAGE' => $dpf2['FAMANAGE'],
                            'ITUID' => $uid,
                            'ITUIDM' => $uid,
                            'ITDTIN' => date('Y-m-d H:i:s', time()),
                            'ITDTLU' => date('Y-m-d H:i:s', time()),
                            'ITIPUID' => $ip,
                            'ITIPUIDM' => $ip,
                            'ITCOMV' => $this->input->post('ITCOMV', true),
                            'ITQTY' => $itqty_to,
                        );
                        array_push($perubahan_to, $perubahan2);
                        $sq_ir += 10;
                    endforeach;
                    $this->db->insert_batch('t4111', $perubahan_to);
    
                    //UPDATE PERUBAHAN DATA KE t1201 dan T41021
                    $data_perubahan_terbaru = [
                        'FAVHRN' => $this->input->post('ITVHRN', true),
                        'FAVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                        'FAVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                        'FALNDOWNST' => $this->input->post('ITLNDOWNST', true),
                        'FACRTFID' => $this->input->post('ITCRTFID', true),
                        'FACRTFDT' => $this->input->post('ITCRTFDT', true),
                        'FACOMV' => $this->input->post('ITCOMV', true),
                        'FAUIDM' => $uid,
                        'FADTLU' => date('Y-m-d H:i:s', time()),
                    ];
                    $this->db->update('t1201', $data_perubahan_terbaru, array('FAICU' => $icu));
    
                    $data_perubahan_terbaru2 = [
                        'ILVHRN' => $this->input->post('ITVHRN', true),
                        'ILVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                        'ILVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                        // 'ILLNDOWNST' => $this->input->post('ITLNDOWNST', true),
                        'ILCRTFID' => $this->input->post('ITCRTFID', true),
                        'ILCRTFDT' => $this->input->post('ITCRTFDT', true),
                        'ILCOMV' => $this->input->post('ITCOMV', true),
                        'ILUIDM' => $uid,
                        'ILDTLU' => date('Y-m-d H:i:s', time()),
                    ];
                    $this->db->update('t41021', $data_perubahan_terbaru2, array('ILICU' => $icu));
    
                }
                else {
                    redirect('PinjamBerkas/Berkas_keluar','refresh');
                }
            }
            else if($cek->OVMSTY == "2"){
                $tgl_sertifikat = date('Y-m-d', strtotime($cek->FACRTFDT));
                if($post["ITLNDOWNST"] != $cek->FALNDOWNST || $post["ITCRTFID"] != $cek->FACRTFID || $post["ITCRTFDT"] != $tgl_sertifikat) {
                    // INSERT PERUBAHAN DI T4111 FROM BPKAD TO BPKAD
                    // PROSEDUR PENOMORAN TIPE DOKUMEN IR
                    $cek_ir = $this->PinjamBerkas_model->Cek_ir($tahun, $bulan);
                    if($cek_ir->num_rows() == 0) {
                        $this->PinjamBerkas_model->Insert_ir_t0002($tahun, $bulan);
                        $this->PinjamBerkas_model->Update_ir($tahun, $bulan);
                    }
                    else{
                        $this->PinjamBerkas_model->Update_ir($tahun, $bulan);
                    }
    
                    $getIR = $this->PinjamBerkas_model->getIR($tahun, $bulan);
                    $nnseq_ir= $getIR->NNSEQ;
                    $fzeropadded_ir = sprintf("%05d", $nnseq_ir);
    
                    $nnyr_ir = $getIR->NNYR;
                    $x = substr($nnyr_ir, 2);
    
                    $nnmo_ir = $getIR->NNMO;
                    $fzeropadded2_ir = sprintf("%02d", $nnmo_ir);
                    
                    $docno_ir = [
                        'a' => $x,
                        'b' => $fzeropadded2_ir,
                        'c' => $fzeropadded_ir
                    ];
    
                    //get data yang tidak ada pada field t1201
                    $data_not_in_t1201 = $this->PinjamBerkas_model->get_data_not_in_t1201($icu);
                    $itmsty = $data_not_in_t1201->OVMSTY;
                    $itglcls = $data_not_in_t1201->OVGLCLS;
                    $itlnty = $data_not_in_t1201->OVLNTY;
                    $itidinum = $data_not_in_t1201->OVIDINUM;
                    $itbuid1 = $data_not_in_t1201->OVBUID1;
                    $ituom1 = $data_not_in_t1201->OVUOM1;
    
                    //from dari data lama t1201 dan data baru dari inputan
                    $iticut = "I";
                    $itdocty = "IR";
                    $sq_ir = 10;
                    $perubahan_from = array();
                    $perubahan_to = array();
                    $data_perubahan = $this->PinjamBerkas_model->data_perubahan_from($icu);
                    foreach($data_perubahan as $dpf) :
                        $perubahan = array(
                            'ITCOID' => $dpf["FACOID"],
                            'ITIDBUID' => $dpf["FAIDBUID"],
                            'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                            'ITDOCTY' => $itdocty,
                            'ITDOCSQ' => $sq_ir,
                            'ITDOCDT' => date('Y-m-d H:i:s', time()),
                            'ITBUID1' => $itbuid1,
                            'ITLNTY' => $itlnty,
                            'ITICU' => $icu,
                            'ITMSTY' => $itmsty,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $nnmo_ir,
                            'ITDOCYR' => $nnyr_ir,
                            'ITDOCTM' => date('Y-m-d H:i:s', time()),
                            'ITFT' => $itft_from,
                            'ITIDINUM' => $itidinum,
                            'ITUOM1' => $ituom1,
                            'ITGLCLS' => $itglcls,
                            'ITINUM' => $dpf["FAAOBJ"],
                            'ITLOCID' => $dpf["FAALOC"],
                            'ITDESB1' => $dpf["FADESB1"],
                            'ITPOST' => $dpf["FAPOST"],
                            'ITBRAND' => $dpf['FABRAND'],
                            'ITCOLOR' => $dpf['FACOLOR'],
                            'ITLENGTH' => $dpf['FALENGTH'],
                            'ITWIDTH' => $dpf['FAWIDTH'],
                            'ITWIDE' => $dpf['FAWIDE'],
                            'ITCILCAP' => $dpf['FACILCAP'],
                            'ITMFN' => $dpf['FAMFN'],
                            'ITMACHNID' => $dpf['FAMACHNID'],
                            'ITVHRN' => $dpf['FAVHRN'],
                            'ITVHTAXDT' => $dpf['FAVHTAXDT'],
                            'ITVHRNTAXDT' => $dpf['FAVHRNTAXDT'],
                            'ITLNDOWNST' => $dpf['FALNDOWNST'],
                            'ITCRTFID' => $dpf['FACRTFID'],
                            'ITCRTFDT' => $dpf['FACRTFDT'],
                            'ITASADDR' => $dpf['FAASADDR'],
                            'ITCITY' => $dpf['FACITY'],
                            'ITDIST' => $dpf['FADIST'],
                            'ITSUBDIST' => $dpf['FASUBDIST'],
                            'ITMANAGE' => $dpf['FAMANAGE'],
                            'ITUID' => $uid,
                            'ITUIDM' => $uid,
                            'ITDTIN' => date('Y-m-d H:i:s', time()),
                            'ITDTLU' => date('Y-m-d H:i:s', time()),
                            'ITIPUID' => $ip,
                            'ITIPUIDM' => $ip,
                            'ITCOMV' => $dpf['FACOMV'],
                            'ITQTY' => $itqty_from,
                        );
                        array_push($perubahan_from, $perubahan);
                        $sq_ir += 10;
                    endforeach;
                    $this->db->insert_batch('t4111', $perubahan_from);
    
                    // TO
                    foreach($data_perubahan as $dpf2) :
                        $perubahan2 = array(
                            'ITCOID' => $dpf2["FACOID"],
                            'ITIDBUID' => $dpf2["FAIDBUID"],
                            'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                            'ITDOCTY' => $itdocty,
                            'ITDOCSQ' => $sq_ir,
                            'ITDOCDT' => date('Y-m-d H:i:s', time()),
                            'ITBUID1' => $itbuid1,
                            'ITLNTY' => $itlnty,
                            'ITICU' => $icu,
                            'ITMSTY' => $itmsty,
                            'ITICUT' => $iticut,
                            'ITDOCMO' => $nnmo_ir,
                            'ITDOCYR' => $nnyr_ir,
                            'ITDOCTM' => date('Y-m-d H:i:s', time()),
                            'ITFT' => $itft_to,
                            'ITIDINUM' => $itidinum,
                            'ITUOM1' => $ituom1,
                            'ITGLCLS' => $itglcls,
                            'ITINUM' => $dpf2["FAAOBJ"],
                            'ITLOCID' => $dpf2["FAALOC"],
                            'ITDESB1' => $dpf2["FADESB1"],
                            'ITPOST' => $dpf2["FAPOST"],
                            'ITBRAND' => $dpf2["FABRAND"],
                            'ITCOLOR' => $dpf2['FACOLOR'],
                            'ITLENGTH' => $dpf2['FALENGTH'],
                            'ITWIDTH' => $dpf2['FAWIDTH'],
                            'ITWIDE' => $dpf2['FAWIDE'],
                            'ITCILCAP' => $dpf2['FACILCAP'],
                            'ITMFN' => $dpf2['FAMFN'],
                            'ITMACHNID' => $dpf2['FAMACHNID'],
                            'ITVHRN' => $this->input->post('ITVHRN', true),
                            'ITVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                            'ITVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                            'ITLNDOWNST' => $this->input->post('ITLNDOWNST', true),
                            'ITCRTFID' => $this->input->post('ITCRTFID', true),
                            'ITCRTFDT' => $this->input->post('ITCRTFDT', true),
                            'ITASADDR' => $dpf2['FAASADDR'],
                            'ITCITY' => $dpf2['FACITY'],
                            'ITDIST' => $dpf2['FADIST'],
                            'ITSUBDIST' => $dpf2['FASUBDIST'],
                            'ITMANAGE' => $dpf2['FAMANAGE'],
                            'ITUID' => $uid,
                            'ITUIDM' => $uid,
                            'ITDTIN' => date('Y-m-d H:i:s', time()),
                            'ITDTLU' => date('Y-m-d H:i:s', time()),
                            'ITIPUID' => $ip,
                            'ITIPUIDM' => $ip,
                            'ITCOMV' => $this->input->post('ITCOMV', true),
                            'ITQTY' => $itqty_to,
                        );
                        array_push($perubahan_to, $perubahan2);
                        $sq_ir += 10;
                    endforeach;
                    $this->db->insert_batch('t4111', $perubahan_to);
    
                    //UPDATE PERUBAHAN DATA KE t1201 dan T41021
                    $data_perubahan_terbaru = [
                        'FAVHRN' => $this->input->post('ITVHRN', true),
                        'FAVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                        'FAVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                        'FALNDOWNST' => $this->input->post('ITLNDOWNST', true),
                        'FACRTFID' => $this->input->post('ITCRTFID', true),
                        'FACRTFDT' => $this->input->post('ITCRTFDT', true),
                        'FACOMV' => $this->input->post('ITCOMV', true),
                        'FAUIDM' => $uid,
                        'FADTLU' => date('Y-m-d H:i:s', time()),
                    ];
                    $this->db->update('t1201', $data_perubahan_terbaru, array('FAICU' => $icu));
    
                    $data_perubahan_terbaru2 = [
                        'ILVHRN' => $this->input->post('ITVHRN', true),
                        'ILVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                        'ILVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                        // 'ILLNDOWNST' => $this->input->post('ITLNDOWNST', true),
                        'ILCRTFID' => $this->input->post('ITCRTFID', true),
                        'ILCRTFDT' => $this->input->post('ITCRTFDT', true),
                        'ILCOMV' => $this->input->post('ITCOMV', true),
                        'ILUIDM' => $uid,
                        'ILDTLU' => date('Y-m-d H:i:s', time()),
                    ];
                    $this->db->update('t41021', $data_perubahan_terbaru2, array('ILICU' => $icu));
    
                }
                else {
                    redirect('PinjamBerkas/Pengembalian','refresh');
                }
            }
            redirect('PinjamBerkas/Pengembalian','refresh');
        // }
        }
        else {
            redirect('Login/logout');
        }
    }
}

/* End of file PinjamBerkas.php */

?>