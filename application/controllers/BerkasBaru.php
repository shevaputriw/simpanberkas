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
        // $data['get_berkas'] = $this->BerkasBaru_model->getBerkas();

        $a = $this->BerkasBaru_model->getOvidbuid();
        // var_dump($a);
        
        // foreach($a as $x) :
        //     echo $x["OVIDBUID"];
        //     $data['get_berkas'] = $this->BerkasBaru_model->getBerkas($x);
        // endforeach;
        // $ov = $a->OVIDBUID;
        // echo $ov;
        // die();

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

        $tanggal = date('d-m-Y');
        $pecah_tgl = explode("-", $tanggal);

        $tanggal = $pecah_tgl[0];
        $bulan = $pecah_tgl[1];
        $tahun = $pecah_tgl[2];

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
            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $x = $ovdocno + 1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1);
                $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            else{
                $x = $ovdocno + 1;
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas($x, $buid1);
                $this->BerkasBaru_model->Tambah_4111($x, $m, $y, $buid1);
                $this->BerkasBaru_model->Tambah_41021($buid1);
            }
            // echo $m;
            // echo $y;
            // die();
            // $nnyr = substr($ovdocno, 1, 4);
            // $nnmo = substr($ovdocno, 5, 2);
            
            // $this->BerkasBaru_model->Update_ovdocno($ovdocno);
            redirect('BerkasBaru/index','refresh');
        }  
    }

    // public function Simpan_Tambah() {
    //     $data['title'] = 'Tambah Berkas';

    //     // $data['opd'] = $this->BerkasBaru_model->getOpd();
    //     $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
    //     $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
    //     $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
    //     $data['kodekab'] = $this->BerkasBaru_model->getKode();

    //     $this->form_validation->set_rules('OVDESB1', 'Nama Barang', 'required');

    //     $tanggal = date('d-m-Y');
    //     $pecah_tgl = explode("-", $tanggal);

    //     $tanggal = $pecah_tgl[0];
    //     $bulan = $pecah_tgl[1];
    //     $tahun = $pecah_tgl[2];

    //     if($this->form_validation->run() == FALSE) {
    //         $cek = $this->BerkasBaru_model->Cek($tahun, $bulan);

    //         if($cek->num_rows() == 0) {
    //             $tambah_tahun = $this->BerkasBaru_model->Tambah_t0002($tahun, $bulan);
    //             $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

    //             $this->load->view('template/Header',$data);
    //             $this->load->view('BerkasBaru/Tambah_Berkas',$data);
    //             $this->load->view('template/Footer',$data);
    //         }
    //         else{
    //             $data['tampil'] = $this->BerkasBaru_model->Get($tahun, $bulan);

    //             $this->load->view('template/Header',$data);
    //             $this->load->view('BerkasBaru/Tambah_Berkas',$data);
    //             $this->load->view('template/Footer',$data);
    //         }
    //     }
    //     else {
    //         $update_nnseq = $this->BerkasBaru_model->Update($tahun, $bulan);
    //         $ovdocno = $this->input->post('OVDOCNO');
    //         $ovidbuid = $this->input->post('OVIDBUID');
    //         $x = $ovdocno + 1;
    //         $this->BerkasBaru_model->Tambah_Berkas($x);

    //         redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
    //     }  
    // }

    public function Tambah_Baru($x, $ovidbuid) {
        $data['title'] = 'Tambah Berkas Baru 2';
        // echo $ovdocsq->OVDOCSQ;
        // echo $ovdocno;
        // echo $ovidbuid;
        // die();
        $data['getAll'] = $this->BerkasBaru_model->getAllBerkas();
        $data['get_data'] = $this->BerkasBaru_model->GetData($x, $ovidbuid);
        $data['opd'] = $this->BerkasBaru_model->GetOpdById($x, $ovidbuid);
        $data['jenis_berkas'] = $this->BerkasBaru_model->getJenisBerkas();
        $data['getKabKota'] = $this->BerkasBaru_model->getKabKota();
        $data['kode_barang'] = $this->BerkasBaru_model->getKodeBarang();
        $data['kodekab'] = $this->BerkasBaru_model->getKode();

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
            if($ovbuid1->BNBUID1 == 0) {
                $buid1 = 0;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid);
                $this->BerkasBaru_model->Tambah2_41021($ovidbuid, $buid1);
            }
            else{
                $buid1 = $ovbuid1->BNBUID1;
                $this->BerkasBaru_model->Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1);
                $this->BerkasBaru_model->Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovdocsq, $ovidbuid);
                $this->BerkasBaru_model->Tambah2_41021($ovidbuid, $buid1);
            }
            redirect('BerkasBaru/Tambah_Baru/'.$x.'/'.$ovidbuid,'refresh');
        }
    }

    // public function Hapus($ovidbuid, $ovdocno) {
    //     $this->BerkasBaru_model->Hapus($ovidbuid, $ovdocno);
    //     redirect('BerkasBaru/index','refresh');
    // }

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
            // die();
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
        // die();
        $this->load->library('pdf');
		$this->pdf->setPaper('A4', 'potrait');
		$this->pdf->filename = "laporan-data-siswa.pdf";
		$this->pdf->load_view('BerkasBaru/Cetak', $data);
        // $this->load->view('template/Header',$data);
        // $this->load->view('BerkasBaru/Cetak',$data);
        // $this->load->view('template/Footer',$data);
    }

}

/* End of file BerkasBaru.php */

?>