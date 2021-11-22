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
        $data['title'] = 'Pinjam Berkas';
        $data['getAllBerkas'] = $this->PinjamBerkas_model->getAllBerkas();

        $this->load->view('template/Header',$data);
        $this->load->view('PinjamBerkas/index',$data);
        $this->load->view('template/Footer',$data);
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

    public function get_Kendaraan()
    {
        $data = $this->PinjamBerkas_model->getKendaraan();
        echo json_encode($data);
    }

    public function Ubah_status_pengajuan_pinjam($itidbuid, $itdocno, $itdocsq) {
        //get status = '2' => pengajuan peminjaman berkas
        $ovpost = $this->PinjamBerkas_model->getStatusPengajuanPinjam();
        $status = $ovpost->DTDC;

        //UPDATE STATUS "DONE" => "PENGAJUAN PEMINJAMAN BERKAS"
        $this->PinjamBerkas_model->UbahKePengajuan($itdocno, $itidbuid, $status, $itdocsq);

        redirect('PinjamBerkas/index','refresh');
    }

    public function Pinjam($itidbuid, $itdocno, $itdocty, $itdocsq) {
        $data['title'] = 'Pinjam Berkas';
        $data['getAllBerkas'] = $this->PinjamBerkas_model->getAllBerkas();

        //Get tahun dan bulan sesuai data t0020
        $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

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

        //get status = '3' => Verifikasi Peminjaman
        $ovpost = $this->PinjamBerkas_model->getStatusVerifikasiPinjam();
        $status = $ovpost->DTDC;

        //UPDATE STATUS "PENGAJUAN" => "VERIFIKASI PEMINJAMAN BERKAS"
        $this->PinjamBerkas_model->UbahKeVerifikasiPinjam($itdocno, $itidbuid, $status, $itdocsq);

        //get data by id berkas yg dipinjam
        $berkas = $this->PinjamBerkas_model->getBerkasFrom_peminjaman($itdocno, $itdocsq);
        // dd($berkas);
        $result = array();
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ituid = "admin1";
        $itft = "F";
        $itft2 = "T";
        $itqtyf = "-1";
        $itqtyt = "1";
        $sq = 10;

        foreach($berkas as $b) :
            $data_array = array(
                'ITCOID' => $b['ITCOID'],
                'ITIDBUID' => $b['ITIDBUID'],
                'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                'ITDOCTY' => $b['ITDOCTY'],
                'ITDOCSQ' => $sq,
                'ITDOCDT' => $b['ITDOCDT'],
                'ITBUID1' => $b['ITBUID1'],
                'ITLNTY' => $b['ITLNTY'],
                'ITICU' => $b['ITICU'],
                'ITICUT' => $b['ITICUT'],
                'ITDOCMO' => $docno["b"],
                'ITDOCYR' => $nnyr,
                'ITDOCTM' => $b['ITDOCTM'],
                'ITMSTY' => $b['ITMSTY'],
                'ITFT' => $itft,
                'ITIDINUM' => $b['ITIDINUM'],
                'ITGLCLS' => $b['ITGLCLS'],
                'ITUOM1' => $b['ITUOM1'],
                'ITINUM' => $b['ITINUM'],
                'ITLOCID' => $b['ITLOCID'],
                'ITDESB1' => $b['ITDESB1'],
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
                'ITUID' => $ituid,
                'ITUIDM' => $ituid,
                'ITDTIN' => date('Y-m-d H:i:s', time()),
                'ITDTLU' => date('Y-m-d H:i:s', time()),
                'ITIPUID' => $ip,
                'ITIPUIDM' => $ip,
                'ITCOMV' => $b['ITCOMV'],
                'ITQTY' => $itqtyf,
                'ITDOCONO' => $b["ITDOCONO"],
                'ITDOCOTY' => $b["ITDOCOTY"],
                'ITDOCOSQ' => $b["ITDOCOSQ"]
            );
            array_push($result, $data_array);
            $sq += 10;
        endforeach;        
        $this->db->insert_batch('t4111', $result);

        //to
        $berkas2 = $this->PinjamBerkas_model->getBerkasTo_peminjaman($itidbuid, $itdocno, $itdocsq);
        $result2 = array();
        foreach($berkas2 as $b2) :
            $data_array2 = array(
                'ITCOID' => $b2['ITCOID'],
                'ITIDBUID' => $b2['ITIDBUID'],
                'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                'ITDOCTY' => $b2['ITDOCTY'],
                'ITDOCSQ' => $sq,
                'ITDOCDT' => $b2['ITDOCDT'],
                'ITBUID1' => $b2['ITBUID1'],
                'ITLNTY' => $b2['ITLNTY'],
                'ITICU' => $b2['ITICU'],
                'ITICUT' => $b2['ITICUT'],
                'ITDOCMO' => $docno["b"],
                'ITDOCYR' => $nnyr,
                'ITDOCTM' => $b2['ITDOCTM'],
                'ITMSTY' => $b2['ITMSTY'],
                'ITFT' => $itft2,
                'ITIDINUM' => $b2['ITIDINUM'],
                'ITGLCLS' => $b2['ITGLCLS'],
                'ITUOM1' => $b2['ITUOM1'],
                'ITINUM' => $b2['ITINUM'],
                'ITLOCID' => $b2['ITLOCID'],
                'ITDESB1' => $b2['ITDESB1'],
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
                'ITUID' => $ituid,
                'ITUIDM' => $ituid,
                'ITDTIN' => date('Y-m-d H:i:s', time()),
                'ITDTLU' => date('Y-m-d H:i:s', time()),
                'ITIPUID' => $ip,
                'ITIPUIDM' => $ip,
                'ITCOMV' => $b2['ITCOMV'],
                'ITQTY' => $itqtyt,
                'ITDOCONO' => $b2["ITDOCONO"],
                'ITDOCOTY' => $b2["ITDOCOTY"],
                'ITDOCOSQ' => $b2["ITDOCOSQ"]
            );
            array_push($result2, $data_array2);
            $sq += 10;
        endforeach;
        $this->db->insert_batch('t4111', $result2);

        //update t41021 from
        //idbuid = opd
        $update_from = $this->PinjamBerkas_model->getBerkasFrom($itidbuid, $itdocno, $itdocsq);
        // // dd($update_from);
        $ilidbuid = $update_from->ITIDBUID;
        $ilidinum = $update_from->ITIDINUM;
        $ilinum = $update_from->ITINUM;
        $illocid = $update_from->ITLOCID;

        $this->PinjamBerkas_model->UpdateFrom_t41021($ilidbuid, $ilidinum, $ilinum, $illocid);

        //idbuid = bpkad
        $update_to = $this->PinjamBerkas_model->getBerkasTo($itdocno, $itdocsq);
        $ilidbuid2 = $update_to->ITIDBUID;
        $ilidinum2 = $update_to->ITIDINUM;
        $ilinum2 = $update_to->ITINUM;
        $illocid2 = $update_to->ITLOCID;

        $this->PinjamBerkas_model->UpdateTo_t41021($ilidbuid2, $ilidinum2, $ilinum2, $illocid2);

        redirect('PinjamBerkas/index','refresh');
    }

    public function PinjamBerkas_BPKAD_index() {
        $data['title'] = "Pengajuan Peminjaman Berkas";
        $data['berkas'] = $this->PinjamBerkas_model->getBerkasPengajuan();

        $this->load->view('template/Header',$data);
        $this->load->view('PinjamBerkas/PinjamBerkas_bpkad_index',$data);
        $this->load->view('template/Footer',$data);
    }

    public function Pengembalian() {
        $data['title'] = "Berkas";
        $data['berkas_keluar'] = $this->PinjamBerkas_model->getBerkasKeluar();

        $this->load->view('template/Header',$data);
        $this->load->view('PinjamBerkas/Pengembalian',$data);
        $this->load->view('template/Footer',$data);
    }

    //OPD, Nomor Dokumen OV, Tipe Dokumen OV, OV Sequence, Nomor Dokumen IT, IT Sequence
    public function Kembali($itidbuid, $itdocono, $itdocoty, $itdocosq, $itdocno, $itdocsq) {
        $data['title'] = 'Pengembalian Berkas';
        
        //Get tahun dan bulan sesuai data t0020
        $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

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

        //get status = '8' => Pengembalian Berkas
        $ovpost = $this->PinjamBerkas_model->getStatusPengembalianBerkas();
        $status = $ovpost->DTDC;

        //UPDATE STATUS "VERIFIKASI PEMINJAMAN" => "PENGEMBALIAN BERKAS"
        $this->PinjamBerkas_model->UbahKePengembalianBerkas($itdocono, $itidbuid, $status, $itdocosq, $itdocsq, $itdocno, $itdocsq);

        //BERKAS FROM = BERKAS TO DARI PEMINJAMAN; IDBUID = OPD
        $berkas_from_pengembalian = $this->PinjamBerkas_model->getBerkasFrom_pengembalian($itdocno, $itdocsq);
        $result = array();
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ituid = "admin1";
        $itft_from = "F";
        $itft_to = "T";
        $itqty_1 = "-1";
        $itqty_minus1 = "1";
        $sq = 10;

        // from OPD
        foreach($berkas_from_pengembalian as $bpf) :
            $data_array = array(
                'ITCOID' => $bpf['ITCOID'],
                'ITIDBUID' => $bpf['ITIDBUID'],
                'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                'ITDOCTY' => $bpf['ITDOCTY'],
                'ITDOCSQ' => $sq,
                'ITDOCDT' => $bpf['ITDOCDT'],
                'ITBUID1' => $bpf['ITBUID1'],
                'ITLNTY' => $bpf['ITLNTY'],
                'ITICU' => $bpf['ITICU'],
                'ITICUT' => $bpf['ITICUT'],
                'ITDOCMO' => $docno["b"],
                'ITDOCYR' => $nnyr,
                'ITDOCTM' => $bpf['ITDOCTM'],
                'ITMSTY' => $bpf['ITMSTY'],
                'ITFT' => $itft_from,
                'ITIDINUM' => $bpf['ITIDINUM'],
                'ITGLCLS' => $bpf['ITGLCLS'],
                'ITUOM1' => $bpf['ITUOM1'],
                'ITINUM' => $bpf['ITINUM'],
                'ITLOCID' => $bpf['ITLOCID'],
                'ITDESB1' => $bpf['ITDESB1'],
                'ITPOST' => $status,
                'ITBRAND' => $bpf['ITBRAND'],
                'ITCOLOR' => $bpf['ITCOLOR'],
                'ITLENGTH' => $bpf['ITLENGTH'],
                'ITWIDTH' => $bpf['ITWIDTH'],
                'ITWIDE' => $bpf['ITWIDE'],
                'ITCILCAP' => $bpf['ITCILCAP'],
                'ITMFN' => $bpf['ITMFN'],
                'ITMACHNID' => $bpf['ITMACHNID'],
                'ITVHRN' => $bpf['ITVHRN'],
                'ITVHTAXDT' => $bpf['ITVHTAXDT'],
                'ITVHRNTAXDT' => $bpf['ITVHRNTAXDT'],
                'ITLNDOWNST' => $bpf['ITLNDOWNST'],
                'ITCRTFID' => $bpf['ITCRTFID'],
                'ITCRTFDT' => $bpf['ITCRTFDT'],
                'ITASADDR' => $bpf['ITASADDR'],
                'ITCITY' => $bpf['ITCITY'],
                'ITDIST' => $bpf['ITDIST'],
                'ITSUBDIST' => $bpf['ITSUBDIST'],
                'ITMANAGE' => $bpf['ITMANAGE'],
                'ITUID' => $ituid,
                'ITUIDM' => $ituid,
                'ITDTIN' => date('Y-m-d H:i:s', time()),
                'ITDTLU' => date('Y-m-d H:i:s', time()),
                'ITIPUID' => $ip,
                'ITIPUIDM' => $ip,
                'ITCOMV' => $bpf['ITCOMV'],
                'ITQTY' => $itqty_1,
                'ITDOCONO' => $bpf["ITDOCONO"],
                'ITDOCOTY' => $bpf["ITDOCOTY"],
                'ITDOCOSQ' => $bpf["ITDOCOSQ"]
            );
            array_push($result, $data_array);
            $sq += 10;
        endforeach;        
        $this->db->insert_batch('t4111', $result);      
        
        // to BPKAD
        $berkas_to_pengembalian = $this->PinjamBerkas_model->getBerkasTo_pengembalian($itdocno);
        $result2 = array();
        foreach($berkas_to_pengembalian as $bpt) :
            $data_array2 = array(
                'ITCOID' => $bpt['ITCOID'],
                'ITIDBUID' => $bpt['ITIDBUID'],
                'ITDOCNO' => $docno["a"].$docno["b"].$docno["c"],
                'ITDOCTY' => $bpt['ITDOCTY'],
                'ITDOCSQ' => $sq,
                'ITDOCDT' => $bpt['ITDOCDT'],
                'ITBUID1' => $bpt['ITBUID1'],
                'ITLNTY' => $bpt['ITLNTY'],
                'ITICU' => $bpt['ITICU'],
                'ITICUT' => $bpt['ITICUT'],
                'ITDOCMO' => $docno["b"],
                'ITDOCYR' => $nnyr,
                'ITDOCTM' => $bpt['ITDOCTM'],
                'ITMSTY' => $bpt['ITMSTY'],
                'ITFT' => $itft_to,
                'ITIDINUM' => $bpt['ITIDINUM'],
                'ITGLCLS' => $bpt['ITGLCLS'],
                'ITUOM1' => $bpt['ITUOM1'],
                'ITINUM' => $bpt['ITINUM'],
                'ITLOCID' => $bpt['ITLOCID'],
                'ITDESB1' => $bpt['ITDESB1'],
                'ITPOST' => $status,
                'ITBRAND' => $bpt['ITBRAND'],
                'ITCOLOR' => $bpt['ITCOLOR'],
                'ITLENGTH' => $bpt['ITLENGTH'],
                'ITWIDTH' => $bpt['ITWIDTH'],
                'ITWIDE' => $bpt['ITWIDE'],
                'ITCILCAP' => $bpt['ITCILCAP'],
                'ITMFN' => $bpt['ITMFN'],
                'ITMACHNID' => $bpt['ITMACHNID'],
                'ITVHRN' => $bpt['ITVHRN'],
                'ITVHTAXDT' => $bpt['ITVHTAXDT'],
                'ITVHRNTAXDT' => $bpt['ITVHRNTAXDT'],
                'ITLNDOWNST' => $bpt['ITLNDOWNST'],
                'ITCRTFID' => $bpt['ITCRTFID'],
                'ITCRTFDT' => $bpt['ITCRTFDT'],
                'ITASADDR' => $bpt['ITASADDR'],
                'ITCITY' => $bpt['ITCITY'],
                'ITDIST' => $bpt['ITDIST'],
                'ITSUBDIST' => $bpt['ITSUBDIST'],
                'ITMANAGE' => $bpt['ITMANAGE'],
                'ITUID' => $ituid,
                'ITUIDM' => $ituid,
                'ITDTIN' => date('Y-m-d H:i:s', time()),
                'ITDTLU' => date('Y-m-d H:i:s', time()),
                'ITIPUID' => $ip,
                'ITIPUIDM' => $ip,
                'ITCOMV' => $bpt['ITCOMV'],
                'ITQTY' => $itqty_minus1,
                'ITDOCONO' => $bpt["ITDOCONO"],
                'ITDOCOTY' => $bpt["ITDOCOTY"],
                'ITDOCOSQ' => $bpt["ITDOCOSQ"]
            );
            array_push($result2, $data_array2);
            $sq += 10;
        endforeach;        
        $this->db->insert_batch('t4111', $result2); 

        //update t41021 from
        //idbuid = opd; itdocno = nomor dokumen IT; docsq = IT sequence
        $update_from_pengembalian = $this->PinjamBerkas_model->getBerkas_from($itdocno, $itdocsq);
        $ilidbuid = $update_from_pengembalian->ITIDBUID;
        $ilidinum = $update_from_pengembalian->ITIDINUM;
        $ilinum = $update_from_pengembalian->ITINUM;
        $illocid = $update_from_pengembalian->ITLOCID;

        $this->PinjamBerkas_model->UpdateFrom_t41021_pengembalian($ilidbuid, $ilidinum, $ilinum, $illocid);

        //idbuid = bpkad
        $update_to_pengembalian = $this->PinjamBerkas_model->getBerkas_to($itdocno);
        $ilidbuid2 = $update_to_pengembalian->ITIDBUID;
        $ilidinum2 = $update_to_pengembalian->ITIDINUM;
        $ilinum2 = $update_to_pengembalian->ITINUM;
        $illocid2 = $update_to_pengembalian->ITLOCID;

        $this->PinjamBerkas_model->UpdateTo_t41021_pengembalian($ilidbuid2, $ilidinum2, $ilinum2, $illocid2);

        redirect('PinjamBerkas/Perubahan_data/'.$itidbuid.'/'.$itdocno.'/'.$itdocsq,'refresh');
    }

    public function Perubahan_data($itidbuid, $itdocno, $itdocsq) {
        $data['title'] = 'Perubahan Data';
        // get data from t4111 where docty = OV
        $data['perubahan'] = $this->PinjamBerkas_model->getData($itidbuid, $itdocno, $itdocsq);
        // $data['jenis_berkas'] = $this->PinjamBerkas_model->getJenisBerkas();
        $data['KabKota'] = $this->PinjamBerkas_model->getKabKota();
        // $data['kode_barang'] = $this->PinjamBerkas_model->getKodeBarang();
        // $data['kodekab'] = $this->PinjamBerkas_model->getKode();

        //Get tahun dan bulan sesuai data t0020
        $getTahunBulan = $this->PinjamBerkas_model->getTahunBulan();
        $tahun = $getTahunBulan->CNCFY;
        $bulan = $getTahunBulan->CNCAP;

        $this->form_validation->set_rules('ITDESB1', 'Nama Barang', 'required');

        if($this->form_validation->run() == FALSE) {
            $cek_ir = $this->PinjamBerkas_model->Cek_ir($tahun, $bulan);
            if($cek_ir->num_rows() == 0) {
                $insert_ir_t0002 = $this->PinjamBerkas_model->Insert_ir_t0002($tahun, $bulan);
                $data['tampil'] = $this->PinjamBerkas_model->get_ir($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('PinjamBerkas/Perubahan_data',$data);
                $this->load->view('template/Footer',$data);
            }
            else{
                $data['tampil'] = $this->PinjamBerkas_model->get_ir($tahun, $bulan);

                $this->load->view('template/Header',$data);
                $this->load->view('PinjamBerkas/Perubahan_data',$data);
                $this->load->view('template/Footer',$data);
            }
        }
        else{
            // UPDATE NNSEQ + 1 TIPE DOKUMEN IR
            $update_nnseq = $this->PinjamBerkas_model->Update_ir($tahun, $bulan);

            // PROSEDUR PENOMORAN TIPE DOKUMEN IR
            $getIR = $this->PinjamBerkas_model->getIR($tahun, $bulan);
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

            // GET DATA PEMINJAMAN
            $data_peminjaman = $this->PinjamBerkas_model->getDataPeminjaman($itdocno);
            $hasil = array();
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

            //BERKAS SEBELUM PERUBAHAN
            foreach($data_peminjaman as $dp) :
                $data_array = array(
                    'ITCOID' => $dp['ITCOID'],
                    'ITIDBUID' => $dp['ITIDBUID'],
                    'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                    'ITDOCTY' => $docty,
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $dp['ITBUID1'],
                    'ITLNTY' => $dp['ITLNTY'],
                    'ITICU' => $dp['ITICU'],
                    'ITICUT' => $iticut,
                    'ITDOCMO' => $docno_ir["b"],
                    'ITDOCYR' => $nnyr,
                    'ITDOCTM' => $dp['ITDOCTM'],
                    'ITMSTY' => $dp['ITMSTY'],
                    'ITFT' => $dp['ITFT'],
                    'ITIDINUM' => $dp['ITIDINUM'],
                    'ITGLCLS' => $dp['ITGLCLS'],
                    'ITUOM1' => $dp['ITUOM1'],
                    'ITINUM' => $dp['ITINUM'],
                    'ITLOCID' => $dp['ITLOCID'],
                    'ITDESB1' => $dp['ITDESB1'],
                    'ITPOST' => $dp['ITPOST'],
                    'ITBRAND' => $dp['ITBRAND'],
                    'ITCOLOR' => $dp['ITCOLOR'],
                    'ITLENGTH' => $dp['ITLENGTH'],
                    'ITWIDTH' => $dp['ITWIDTH'],
                    'ITWIDE' => $dp['ITWIDE'],
                    'ITCILCAP' => $dp['ITCILCAP'],
                    'ITMFN' => $dp['ITMFN'],
                    'ITMACHNID' => $dp['ITMACHNID'],
                    'ITVHRN' => $dp['ITVHRN'],
                    'ITVHTAXDT' => $dp['ITVHTAXDT'],
                    'ITVHRNTAXDT' => $dp['ITVHRNTAXDT'],
                    'ITLNDOWNST' => $dp['ITLNDOWNST'],
                    'ITCRTFID' => $dp['ITCRTFID'],
                    'ITCRTFDT' => $dp['ITCRTFDT'],
                    'ITASADDR' => $dp['ITASADDR'],
                    'ITCITY' => $dp['ITCITY'],
                    'ITDIST' => $dp['ITDIST'],
                    'ITSUBDIST' => $dp['ITSUBDIST'],
                    'ITMANAGE' => $dp['ITMANAGE'],
                    'ITUID' => $ituid,
                    'ITUIDM' => $ituid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip,
                    'ITCOMV' => $dp['ITCOMV'],
                    'ITQTY' => $itqty_from,
                    'ITDOCONO' => $dp['ITDOCONO'],
                    'ITDOCOTY' => $dp['ITDOCOTY'],
                    'ITDOCOSQ' => $dp['ITDOCOSQ'],
                    'ITRLDOCNO' => $dp['ITDOCNO'],
                    'ITRLDOCTY' => $dp['ITDOCTY'],
                    'ITRLDOCSQ' => $dp['ITDOCSQ']
                );
                array_push($hasil, $data_array);
                $sq += 10;
            endforeach;
            $this->db->insert_batch('t4111', $hasil);

            //BERKAS SETELAH PERUBAHAN = UPDATE DARI INPUT
            $hasil2 = array();
            foreach($data_peminjaman as $dp2) :
                $data_array2 = array(
                    'ITCOID' => $dp2['ITCOID'],
                    'ITIDBUID' => $dp2['ITIDBUID'],
                    'ITDOCNO' => $docno_ir["a"].$docno_ir["b"].$docno_ir["c"],
                    'ITDOCTY' => $docty,
                    'ITDOCSQ' => $sq,
                    'ITDOCDT' => date('Y-m-d H:i:s', time()),
                    'ITBUID1' => $dp2['ITBUID1'],
                    'ITLNTY' => $dp2['ITLNTY'],
                    'ITICU' => $dp2['ITICU'],
                    'ITICUT' => $iticut,
                    'ITDOCMO' => $docno_ir["b"],
                    'ITDOCYR' => $nnyr,
                    'ITDOCTM' => $dp2['ITDOCTM'],
                    'ITMSTY' => $dp2['ITMSTY'],
                    'ITFT' => $itft_to,
                    'ITIDINUM' => $dp2['ITIDINUM'],
                    'ITGLCLS' => $dp2['ITGLCLS'],
                    'ITUOM1' => $dp2['ITUOM1'],
                    'ITINUM' => $dp2['ITINUM'],
                    'ITLOCID' => $dp2['ITLOCID'],
                    'ITDESB1' => $this->input->post('ITDESB1', true),
                    'ITPOST' => $dp2['ITPOST'],
                    'ITBRAND' => $this->input->post('ITBRAND', true),
                    'ITCOLOR' => $this->input->post('ITCOLOR', true),
                    'ITLENGTH' => $this->input->post('ITLENGTH', true),
                    'ITWIDTH' => $this->input->post('ITWIDTH', true),
                    'ITWIDE' => $this->input->post('ITWIDE', true),
                    'ITCILCAP' => $this->input->post('ITCILCAP', true),
                    'ITMFN' => $this->input->post('ITMFN', true),
                    'ITMACHNID' => $this->input->post('ITMACHNID', true),
                    'ITVHRN' => $this->input->post('ITVHRN', true),
                    'ITVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                    'ITVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                    'ITLNDOWNST' => $this->input->post('ITLNDOWNST', true),
                    'ITCRTFID' => $this->input->post('ITCRTFID', true),
                    'ITCRTFDT' => $this->input->post('ITCRTFDT', true),
                    'ITASADDR' => $this->input->post('ITASADDR', true),
                    'ITCITY' => $this->input->post('ITCITY', true),
                    'ITDIST' => $this->input->post('ITDIST', true),
                    'ITSUBDIST' => $this->input->post('ITSUBDIST', true),
                    'ITMANAGE' => $dp2['ITMANAGE'],
                    'ITUID' => $ituid,
                    'ITUIDM' => $ituid,
                    'ITDTIN' => date('Y-m-d H:i:s', time()),
                    'ITDTLU' => date('Y-m-d H:i:s', time()),
                    'ITIPUID' => $ip,
                    'ITIPUIDM' => $ip,
                    'ITCOMV' => $this->input->post('ITCOMV', true),
                    'ITQTY' => $itqty_to,
                    'ITDOCONO' => $dp2['ITDOCONO'],
                    'ITDOCOTY' => $dp2['ITDOCOTY'],
                    'ITDOCOSQ' => $dp2['ITDOCOSQ'],
                    'ITRLDOCNO' => $dp2['ITDOCNO'],
                    'ITRLDOCTY' => $dp2['ITDOCTY'],
                    'ITRLDOCSQ' => $dp2['ITDOCSQ']
                );
                array_push($hasil2, $data_array2);
                $sq += 10;
            endforeach;
            $this->db->insert_batch('t4111', $hasil2);

            //UPDATE t41021
            $ilsqoh = "0";
            foreach($data_peminjaman as $u) :
                $hasil3 = [
                    'ILCOID' => $u['ITCOID'],
                    'ILIDBUID' => $u['ITIDBUID'],
                    'ILIDINUM' => $u['ITIDINUM'],
                    'ILINUM' => $u['ITINUM'],
                    'ILLOCID' => $u['ITLOCID'],
                    'ILBUID1' => $u['ITBUID1'],
                    'ILGLCLS' => $u['ITGLCLS'],
                    // 'ILPQOH' => 1,
                    'ILSQOH' => $ilsqoh,
                    'ILMANAGE' => $u['ITMANAGE'],
                    'ILVHRN' => $this->input->post('ITVHRN', true),
                    'ILVHTAXDT' => $this->input->post('ITVHTAXDT', true),
                    'ILVHRNTAXDT' => $this->input->post('ITVHRNTAXDT', true),
                    'ILMACHNID' => $this->input->post('ITMACHNID', true),
                    'ILMFN' => $this->input->post('ITMFN', true),
                    'ILUOM1' => $u['ITUOM1'],
                    'ILCILCAP' => $this->input->post('ITCILCAP', true),
                    'ILCRTFID' => $this->input->post('ITCRTFID', true),
                    'ILCRTFDT' => $this->input->post('ITCRTFDT', true),
                    'ILASADDR' => $this->input->post('ITASADDR', true),
                    'ILCITY' => $this->input->post('ITCITY', true),
                    'ILDIST' => $this->input->post('ITDIST', true),
                    'ILSUBDIST' => $this->input->post('ITSUBDIST', true),
                    'ILUIDM' => $u['ITUIDM'],
                    'ILDTIN' => date('Y-m-d H:i:s', time()),
                    'ILIPUIDM' => $ip,
                ];
                $this->db->update('t41021', $hasil3, array('ILIDBUID' => $u['ITIDBUID'], 'ILINUM' => $u['ITINUM'], 'ILLOCID' => $u['ITLOCID']));
            endforeach;

            redirect('PinjamBerkas/Pengembalian', 'refresh');
        }
    }

}

/* End of file PinjamBerkas.php */

?>