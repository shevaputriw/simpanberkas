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
                'ITPOST' => $b['ITPOST'],
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
                'ITPOST' => $b2['ITPOST'],
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
        // dd($update_from);
        $ilidbuid = $update_from->ITIDBUID;
        $ilidinum = $update_from->ITIDINUM;
        $ilinum = $update_from->ITINUM;
        $illocid = $update_from->ITLOCID;

        $this->PinjamBerkas_model->UpdateFrom_t41021($ilidbuid, $ilidinum, $ilinum, $illocid);

        // //idbuid = bpkad
        $update_to = $this->PinjamBerkas_model->getBerkasTo($itdocno, $itdocsq);
        $ilidbuid2 = $update_to->ITIDBUID;
        $ilidinum2 = $update_to->ITIDINUM;
        $ilinum2 = $update_to->ITINUM;
        $illocid2 = $update_to->ITLOCID;

        $this->PinjamBerkas_model->UpdateTo_t41021($ilidbuid2, $ilidinum2, $ilinum2, $illocid2);

        redirect('PinjamBerkas/index','refresh');
    }

}

/* End of file PinjamBerkas.php */

?>