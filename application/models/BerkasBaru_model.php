<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class BerkasBaru_model extends CI_Model {
    
    public function getAllBerkas() {
        // $query = $this->db->query("SELECT t4.`OVIDBUID`, t4.`OVDOCNO`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT` 
        // FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID` 
        // JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        // WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB'");

        // $query = $this->db->query("SELECT t4.`OVIDBUID`, t4.`OVDOCNO`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, 
        // t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, 
        // t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, 
        // t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa'
        // FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        // JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` 
        // JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        // JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`OVCITY`
        // JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`OVDIST`
        // JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`OVSUBDIST`
        // WHERE t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        // AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        // AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        // AND t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB'");

        // $query = $this->db->query("SELECT t21.`BNDESB1`, t4.`OVDOCDT`, COUNT(t4.`OVDOCSQ`) AS total_berkas, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVDESB1`, t4.`OVLST`, t4.`OVNST`, t4.`OVLST`, t4.`OVNST`, t4.`OVDOCNO`, t4.`OVLOCID`
        // FROM t4312 AS t4
        // JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        // WHERE t4.`OVLST` = '400' AND t4.`OVNST` = '440'
        // GROUP BY t4.`OVDOCNO`
        // ORDER BY t4.`OVDTIN` DESC");

        $query = $this->db->query("SELECT t21.`BNDESB1`, t9.`DTDC`, t9.`DTDESC1` AS draft, t09.`DTDESC1` AS approval, pengajuan.`DTDESC1` AS verifikasi_pengajuan, finish.`DTDESC1` AS finish, t4.`OVDOCDT`, COUNT(t4.`OVDOCSQ`) AS total_berkas, t4.`OVIDBUID`, t4.`OVDOCTY`, t.`DTDESC1` AS pengajuan_pinjam, 
        t4.`OVDOCNO`, t4.`OVDESB1`, t4.`OVLST`, t4.`OVNST`, t4.`OVLST`, t4.`OVNST`, t4.`OVDOCNO`, t4.`OVLOCID`, t4.`OVPOST`, t4.`OVDOCSQ`, t4.`OVIDINUM`, t4.`OVINUM`
        FROM t4312 AS t4
        JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        LEFT OUTER JOIN t0009 AS t9 ON t4.`OVPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
        -- LEFT OUTER JOIN t0009 AS t09 ON t4.`OVPOST` = t09.`DTDC` AND t09.`DTPC`='00' AND t09.`DTIDDC` = '3200'
        LEFT OUTER JOIN t0009 AS t09 ON t4.`OVPOST` = t09.`DTDC` AND t09.`DTPC`='00' AND t09.`DTIDDC` = '130410'
        LEFT OUTER JOIN t0009 AS pengajuan ON t4.`OVPOST` = pengajuan.`DTDC` AND pengajuan.`DTPC`='00' AND pengajuan.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS finish ON t4.`OVPOST` = finish.`DTDC` AND finish.`DTPC`='00' AND finish.`DTIDDC` = '130510'
        LEFT OUTER JOIN t0009 AS t ON t4.`OVPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
        -- LEFT OUTER JOIN t0009 AS t009 ON t4.`OVPOST` = t009.`DTDC` AND t009.`DTPC`='00' AND t009.`DTIDDC` = '3210'
        WHERE t4.`OVLST` = '400' AND t4.`OVNST` = '440'
        GROUP BY t4.`OVDOCNO`
        ORDER BY t4.`OVDTIN` DESC");

        return $query->result_array();
    }

    public function getOvidbuid() {
        $query = $this->db->query("SELECT OVIDBUID FROM t4312 GROUP BY OVIDBUID");
        return $query->result_array();
    }

    public function GetBerkasById($ovdocno, $ovdocsq, $ovidbuid) {
        $query = $this->db->query("SELECT t4.`OVCOID`, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVINUM`, t4.`OVDOCTY`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.`OVDOCSQ`, t4.`OVLST`, t4.`OVNST`, T4.`OVICU`, t4.`OVLNTY`, t4.`OVPOST`, t4.`OVUOM1`, t4.`OVGLCLS`, t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVMACHNID, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`OVLOCID`
        FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` 
        JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`OVCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`OVDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`OVSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`OVDOCNO` = '$ovdocno' AND t4.`OVDOCSQ` = '$ovdocsq' AND t4.`OVIDBUID` = '$ovidbuid' AND t4.`OVLST` = '400' AND t4.`OVNST` = '440'");
        
        return $query->row_array();
    }

    public function getBerkas2($ovdocno) {
        // $query = $this->db->query("SELECT t4.`OVDESB1`, t4.`OVCOID`, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVINUM`, t4.`OVDOCTY`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.`OVDOCSQ`, t4.`OVLST`, t4.`OVNST`,
        // t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVMACHNID, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST
        // FROM t4312 AS t4
        // JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        // WHERE t4.`OVDOCNO` = '$ovdocno'");

        $query = $this->db->query("SELECT t41.`LMDESA2`, t4.`OVCOID`, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVINUM`, t4.`OVDOCTY`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.`OVDOCSQ`, t4.`OVLST`, t4.`OVNST`,
        t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVMACHNID, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`OVLOCID`
        FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` 
        JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        LEFT OUTER JOIN t4100 AS t41 ON t4.`OVLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`OVCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`OVDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`OVSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`OVLST` = '400' AND t4.`OVNST` = '440' AND t4.`OVDOCNO` = '$ovdocno'");

        return $query->result_array();
    }

    public function getBerkas($ovdocno) {
        $query = $this->db->query("SELECT t21.`BNDESB1`, t4.`OVDOCDT`, t4.`OVIDBUID`, t4.`OVDOCNO`
        FROM t4312 AS t4
        JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        WHERE t4.`OVDOCNO` = '$ovdocno'");

        return $query->row_array();
    }
    
    public function getOpd() {
        $this->db->select('*');
        $this->db->from('t0021');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getJenisBerkas() {
        $query = $this->db->query("SELECT DTDC, DTIDDC, DTDESC1 FROM t0009 WHERE DTPC='20' AND DTSC='JB'");
        return $query->result_array();
    }

    public function getKodeBarang() {
        $query = $this->db->query("SELECT AMDESB2,AMOBJ , AMDESB1 , AMPEC , AMGLC08 KIB
        FROM t0901
        WHERE AMPEC='Y' AND
        amglc06 IN ('1.3.2.02.01.01','1.3.2.02.01.02','1.3.2.02.01.03','1.3.2.02.01.04','1.3.2.02.01.05','1.3.2.02.01.06',
        '1.3.1.01.01.01','1.3.1.01.01.02','1.3.1.01.01.03','1.3.1.01.01.04','1.3.1.01.01.05','1.3.1.01.01.06','1.3.1.01.01.07',
        '1.3.1.01.02.01','1.3.1.01.02.02','1.3.1.01.02.03','1.3.1.01.02.04','1.3.1.01.02.05','1.3.1.01.02.06','1.3.1.01.02.07',
        '1.3.1.01.02.08','1.3.1.01.02.09','1.3.1.01.03.01','1.3.1.01.03.02','1.3.1.01.03.03','1.3.1.01.03.04','1.3.1.01.03.05',
        '1.3.1.01.03.06','1.3.1.01.03.07','1.3.1.01.03.08','1.3.1.01.03.09','1.3.1.01.03.10','1.3.1.01.03.11','1.3.1.01.03.12',
        '1.3.1.01.03.13','1.3.1.01.03.14','1.3.1.01.03.15','1.3.1.01.03.16','1.3.1.01.03.17','1.3.1.01.03.18','1.3.1.01.03.19')");

        return $query->result_array();
    }

    public function getKabKota() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='CY' AND DTDC IN ('35.76','35.16')");
        return $query->result_array();
    }

    public function getKecamatan($dtdc) {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='DT' AND SUBSTRING(DTDC, 1, 5) = $dtdc");
        return $query->result_array();
    }

    public function getDesa($dtdc1) {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='SD' AND SUBSTRING(DTDC, 1, 8) = '$dtdc1'");
        return $query->result_array();
    }

    public function getKode() {
        $query = $this->db->query("SELECT * FROM t0020 WHERE CNCOID='16'");
        return $query->row();
    }

    public function getSertifikat() {
        $query = $this->db->query("SELECT AMDESB2, AMOBJ, AMDESB1, AMPEC , AMGLC08 KIB, AMOAN, AMGLC10
        FROM t0901
        WHERE AMPEC='Y' AND
        amglc10 ='SERTIFIKAT'");

        return $query->result_array();
    }

    public function getKendaraan() {
        $query = $this->db->query("SELECT AMDESB2,AMOBJ , AMDESB1 , AMPEC , AMGLC08 KIB, AMOAN, AMGLC10
        FROM t0901
        WHERE AMPEC='Y' AND
        amglc10 ='BPKB'");

        return $query->result_array();
    }

    public function getLokasi($idbuid) {
        $query = $this->db->query("SELECT LMIDBUID, LMLOCID, LMDESA1, LMDESA2
        FROM t4100
        WHERE LMIDBUID = '$idbuid'");

        return $query->result_array();
    }

    public function Cek($tahun, $bulan) {
        $query=$this->db->query("SELECT * FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'OV' LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Cek_IT($tahun, $bulan) {
        $query=$this->db->query("SELECT * FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IT' LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Cek_ICU($tahun, $bulan) {
        $query=$this->db->query("SELECT * FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'ICU' LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Tambah_t0002($tahun, $bulan) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "NNCOID" => 16,
            "NNBUID" => 0,
            "NNDOCBTY" => "OV",
            "NNYR" => $tahun,
            "NNMO" => $bulan,
            "NNRSAT" => 1,
            "NNSEQ" => 0,
            "NNRSMT" => "CM",
            "NNINYR" => "Y",
            "NNINMO" => "Y",
            "NNIPUID" => $ip,
            "NNIPUIDM" => $ip,
            "NNDTIN" => date('Y-m-d H:i:s', time()),
            "NNDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0002', $data);
    }

    public function Tambah_t0002_IT($tahun, $bulan) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "NNCOID" => 16,
            "NNBUID" => 0,
            "NNDOCBTY" => "IT",
            "NNYR" => $tahun,
            "NNMO" => $bulan,
            "NNRSAT" => 1,
            "NNSEQ" => 1,
            "NNRSMT" => "CM",
            "NNINYR" => "Y",
            "NNINMO" => "Y",
            "NNIPUID" => $ip,
            "NNIPUIDM" => $ip,
            "NNDTIN" => date('Y-m-d H:i:s', time()),
            "NNDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0002', $data);
    }

    public function Tambah_t0002_ICU($tahun, $bulan) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "NNCOID" => 16,
            "NNBUID" => 0,
            "NNDOCBTY" => "ICU",
            "NNYR" => $tahun,
            "NNMO" => $bulan,
            "NNRSAT" => 1,
            "NNSEQ" => 1,
            "NNRSMT" => "NR",
            "NNIPUID" => $ip,
            "NNIPUIDM" => $ip,
            "NNDTIN" => date('Y-m-d H:i:s', time()),
            "NNDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0002', $data);
    }

    public function Get($tahun, $bulan) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'OV' ORDER BY NNDTIN DESC LIMIT 1");
        return $query->result_array();
    }

    public function getIT($tahun, $bulan) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IT' ORDER BY NNDTIN DESC LIMIT 1");

        return $query->row();
    }

    public function getLocid() {
        $query=$this->db->query("SELECT LMLOCID FROM t4100 WHERE LMLOCID = '445.00001.00001'");

        return $query->row();
    }

    public function getBnidbuid() {
        $query=$this->db->query("SELECT BNIDBUID FROM t0021 WHERE BNIDBUID = '16445'");

        return $query->row();
    }

    // public function getICU($tahun, $bulan) {
    //     $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'ICU' ORDER BY NNDTIN DESC LIMIT 1");

    //     return $query->row();
    // }

    public function getICU($tahun) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNDOCBTY = 'ICU' ORDER BY NNDTIN DESC LIMIT 1");

        return $query->row();
    }

    public function getTahunBulan() {
        $query=$this->db->query("SELECT CNCFY, CNCAP FROM t0020 WHERE CNCOID = '16'");

        return $query->row();
    }

    public function Update($tahun, $bulan) {
        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'OV'");
    }

    public function Update_IT($tahun, $bulan) {
        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IT'");
    }

    // public function Update_ICU($tahun, $bulan) {
    //     $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'ICU'");
    // }

    public function Update_ICU($tahun) {
        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNDOCBTY = 'ICU'");
    }

    public function getOvbuid1($ovidbuid) {
        $query = $this->db->query("SELECT BNBUID1 FROM t0021 WHERE BNIDBUID = '$ovidbuid'");
        return $query->row();
    }

    public function getLineType() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='41' AND DTSC='LN' AND DTIDDC = '123820'");

        return $query->row();
    }

    public function getStatusDraft() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130400'");

        return $query->row();
    }

    public function Tambah_Berkas($x, $buid1, $linetype, $status, $no, $idinum, $glcls) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ovdocty = "OV";
        $uom1 = "UNT";
        $ovuid = "admin1";
        $ovuidm = "admin1";
        $ovicu = "1";
        $ovdocsq = "10";
        $ovqty = "1";

        $data = [
            "OVCOID" => $this->input->post('OVCOID', true),
            "OVIDBUID" => $this->input->post('OVIDBUID', true),
            "OVBUID1" => $buid1,
            "OVDOCNO" => $x,
            "OVDOCSQ" => $ovdocsq,
            "OVDOCDT" => $this->input->post('OVDOCDT', true),
            "OVIDINUM" => $idinum,
            "OVINUM" => $this->input->post('OVINUM', true),
            "OVDESB1" => $this->input->post('OVDESB1', true),
            "OVMSTY" => $this->input->post('OVMSTY', true),
            "OVDOCTY" => $ovdocty,
            "OVICU" => $no,
            "OVLNTY" => $linetype,
            "OVPOST" => $status,
            "OVUOM1" => $uom1,
            "OVGLCLS" => $glcls,
            "OVQTY" => $ovqty,
            "OVBRAND" => $this->input->post('OVBRAND', true),
            "OVCILCAP" => $this->input->post('OVCILCAP', true),
            "OVCOMV" => $this->input->post('OVCOMV', true),
            "OVMACHNID" => $this->input->post('OVMACHNID', true),
            "OVVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "OVCOLOR" => $this->input->post('OVCOLOR', true),
            "OVMFN" => $this->input->post('OVMFN', true),
            "OVVHRN" => $this->input->post('OVVHRN', true),
            "OVVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "OVCRTFID" => $this->input->post('OVCRTFID', true),
            "OVLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "OVLENGTH" => $this->input->post('OVLENGTH', true),
            "OVWIDTH" => $this->input->post('OVWIDTH', true),
            "OVWIDE" => $this->input->post('OVWIDE', true),
            "OVCRTFDT" => $this->input->post('OVCRTFDT', true),
            "OVASADDR" => $this->input->post('OVASADDR', true),
            "OVCITY" => $this->input->post('OVCITY', true),
            "OVDIST" => $this->input->post('OVDIST', true),
            "OVSUBDIST" => $this->input->post('OVSUBDIST', true),
            "OVLST" => $this->input->post('OVLST', true),
            "OVNST" => $this->input->post('OVNST', true),
            "OVMANAGE" => $this->input->post('OVIDBUID', true),
            "OVLOCID" => $this->input->post('OVLOCID', true),
            "OVUID" => $ovuid,
            "OVUIDM" => $ovuidm,
            "OVIPUID" => $ip,
            "OVIPUIDM" => $ip,
            "OVDTIN" => date('Y-m-d H:i:s', time()),
            "OVDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t4312', $data);
    }

    public function Tambah_4111($x, $m, $y, $buid1, $linetype, $status, $no, $idinum, $glcls) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $itdocty = "OV";
        $ituid = "admin1";
        $ituidm = "admin1";
        $ituom1 = "UNT";
        $itdocsq = "10";
        $itidinum = "0";

        $data = [
            "ITCOID" => $this->input->post('OVCOID', true),
            "ITIDBUID" => $this->input->post('OVIDBUID', true),
            "ITBUID1" => $buid1,
            "ITDOCNO" => $x,
            "ITDOCSQ" => $itdocsq,
            // "ITDOCONO" => $x,
            // "ITDOCOTY" => $itdocty,
            // "ITDOCOSQ" => $itdocsq,
            "ITDOCDT" => $this->input->post('OVDOCDT', true),
            "ITDOCTM" => date('Y-m-d H:i:s', time()),
            "ITINUM" => $this->input->post('OVINUM', true),
            "ITDESB1" => $this->input->post('OVDESB1', true),
            "ITMSTY" => $this->input->post('OVMSTY', true),
            "ITDOCTY" => $itdocty,
            "ITICU" => $no,
            "ITLNTY" => $linetype,
            "ITPOST" => $status,
            "ITIDINUM" => $idinum,
            "ITUOM1" => $ituom1,
            "ITGLCLS" => $glcls,
            "ITBRAND" => $this->input->post('OVBRAND', true),
            "ITCILCAP" => $this->input->post('OVCILCAP', true),
            "ITCOMV" => $this->input->post('OVCOMV', true),
            "ITMACHNID" => $this->input->post('OVMACHNID', true),
            "ITVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "ITCOLOR" => $this->input->post('OVCOLOR', true),
            "ITMFN" => $this->input->post('OVMFN', true),
            "ITVHRN" => $this->input->post('OVVHRN', true),
            "ITVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "ITCRTFID" => $this->input->post('OVCRTFID', true),
            "ITLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "ITLENGTH" => $this->input->post('OVLENGTH', true),
            "ITWIDTH" => $this->input->post('OVWIDTH', true),
            "ITWIDE" => $this->input->post('OVWIDE', true),
            "ITCRTFDT" => $this->input->post('OVCRTFDT', true),
            "ITASADDR" => $this->input->post('OVASADDR', true),
            "ITCITY" => $this->input->post('OVCITY', true),
            "ITDIST" => $this->input->post('OVDIST', true),
            "ITSUBDIST" => $this->input->post('OVSUBDIST', true),
            "ITMANAGE" => $this->input->post('OVIDBUID', true),
            "ITLOCID" => $this->input->post('OVLOCID', true),
            // iya/tidak
            // "ITDOCMO" => $m,
            // "ITDOCYR" => $y,

            "ITUID" => $ituid,
            "ITUIDM" => $ituidm,
            "ITIPUID" => $ip,
            "ITIPUIDM" => $ip,
            "ITDTIN" => date('Y-m-d H:i:s', time()),
            "ITDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t4111', $data);
    }

    public function getStatusApprov() {
        // $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC='PS'");
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130410'");

        return $query->row();
    }

    public function getStatusVerifikasiPengajuan() {
        // $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC='PS'");
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130430'");

        return $query->row();
    }

    public function getStatusDone() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC='PS' AND DTIDDC = '3210'");

        return $query->row();
    }

    public function getStatusFinish() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC='SP' AND DTIDDC = '130510'");

        return $query->row();
    }

    public function Edit_Status($ovdocno, $status) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$ovdocno'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$ovdocno'");
    }

    public function Verifikasi_pengajuan($ovdocno, $status) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$ovdocno'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$ovdocno'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$ovdocno'");
    }

    public function Finish($ovdocno, $status) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$ovdocno'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$ovdocno'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$ovdocno'");
    }

    public function getDataApprov($ovidbuid, $ovdocno, $ovdocty) {
        $query=$this->db->query("SELECT * FROM t4111 WHERE ITIDBUID = '$ovidbuid' AND ITDOCNO = '$ovdocno' AND ITDOCTY = '$ovdocty'");

        return $query->result_array();
    }

    public function getITfrom($ovdocno, $ovdocsq) {
        $query=$this->db->query("SELECT * FROM t4111 WHERE ITDOCOTY = 'OV' AND ITDOCONO = '$ovdocno' AND ITDOCOSQ = '$ovdocsq' AND ITDOCTY = 'IT' AND ITFT = 'F'");

        return $query->result_array();
    }

    public function getITfrom2($ovdocno) {
        $query=$this->db->query("SELECT * FROM t4111 WHERE ITDOCOTY = 'OV' AND ITDOCONO = '$ovdocno' AND ITDOCTY = 'IT' AND ITFT = 'F'");

        return $query->result_array();
    }

    public function getITto($ovdocno, $ovdocsq) {
        $query=$this->db->query("SELECT * FROM t4111 WHERE ITDOCOTY = 'OV' AND ITDOCONO = '$ovdocno' AND ITDOCOSQ = '$ovdocsq' AND ITDOCTY = 'IT' AND ITFT = 'T'");

        return $query->result_array();
    }

    public function getDataApprov2($ovdocno, $itft) {
        $query=$this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$ovdocno' AND ITFT = '$itft'");

        return $query->result_array();
    }

    public function Tambah_41021($buid1) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "ILCOID" => $this->input->post('OVCOID', true),
            "ILIDBUID" => $this->input->post('OVIDBUID', true),
            "ILLOCID" => $this->input->post('OVLOCID', true),
            "ILBUID1" => $buid1,
            "ILIPUID" => $ip,
            "ILIPUIDM" => $ip,
            "ILDTIN" => date('Y-m-d H:i:s', time()),
            "ILDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t41021', $data);
    }

    public function Tambah_Berkas2($x, $ovidbuid, $ovdocsq, $buid1, $linetype, $status, $no, $idinum, $glcls) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ovdocty = "OV";
        $ovuid = "admin1";
        $ovuidm = "admin1";
        $ovicu = "1";
        $uom1 = "UNT";
        $ovqty = "1";

        $data = [
            "OVCOID" => $this->input->post('OVCOID', true),
            "OVIDBUID" => $ovidbuid,
            "OVBUID1" => $buid1,
            "OVDOCNO" => $x,
            "OVDOCSQ" => $ovdocsq,
            "OVDOCDT" => $this->input->post('OVDOCDT', true),
            "OVINUM" => $this->input->post('OVINUM', true),
            "OVIDINUM" => $idinum,
            "OVDESB1" => $this->input->post('OVDESB1', true),
            "OVMSTY" => $this->input->post('OVMSTY', true),
            "OVDOCTY" => $ovdocty,
            "OVICU" => $no,
            "OVLNTY" => $linetype,
            "OVPOST" => $status,
            "OVUOM1" => $uom1,
            "OVGLCLS" => $glcls,
            "OVQTY" => $ovqty,
            "OVBRAND" => $this->input->post('OVBRAND', true),
            "OVCILCAP" => $this->input->post('OVCILCAP', true),
            "OVCOMV" => $this->input->post('OVCOMV', true),
            "OVMACHNID" => $this->input->post('OVMACHNID', true),
            "OVVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "OVCOLOR" => $this->input->post('OVCOLOR', true),
            "OVMFN" => $this->input->post('OVMFN', true),
            "OVVHRN" => $this->input->post('OVVHRN', true),
            "OVVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "OVCRTFID" => $this->input->post('OVCRTFID', true),
            "OVLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "OVLENGTH" => $this->input->post('OVLENGTH', true),
            "OVWIDTH" => $this->input->post('OVWIDTH', true),
            "OVWIDE" => $this->input->post('OVWIDE', true),
            "OVCRTFDT" => $this->input->post('OVCRTFDT', true),
            "OVASADDR" => $this->input->post('OVASADDR', true),
            "OVCITY" => $this->input->post('OVCITY', true),
            "OVDIST" => $this->input->post('OVDIST', true),
            "OVSUBDIST" => $this->input->post('OVSUBDIST', true),
            "OVMANAGE" => $this->input->post('OVIDBUID', true),
            "OVLST" => $this->input->post('OVLST', true),
            "OVNST" => $this->input->post('OVNST', true),
            "OVLOCID" => $this->input->post('OVLOCID', true),
            "OVUID" => $ovuid,
            "OVUIDM" => $ovuidm,
            "OVIPUID" => $ip,
            "OVIPUIDM" => $ip,
            "OVDTIN" => date('Y-m-d H:i:s', time()),
            "OVDTLU" => date('Y-m-d H:i:s', time())
            
        ];

        $this->db->insert('t4312', $data);
    }

    public function Tambah2_4111($x, $m, $y, $buid1, $ovdocsq, $ovidbuid, $linetype, $status, $no, $idinum, $glcls) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $itdocty = "OV";
        $ituid = "admin1";
        $ituidm = "admin1";
        $ituom1 = "UNT";
        // $itidinum = "0";

        $data = [
            "ITCOID" => $this->input->post('OVCOID', true),
            "ITIDBUID" => $ovidbuid,
            "ITBUID1" => $buid1,
            "ITDOCNO" => $x,
            "ITDOCSQ" => $ovdocsq,
            // "ITDOCONO" => $x,
            // "ITDOCOTY" => $itdocty,
            // "ITDOCOSQ" => $ovdocsq,
            "ITDOCDT" => $this->input->post('OVDOCDT', true),
            "ITINUM" => $this->input->post('OVINUM', true),
            "ITDESB1" => $this->input->post('OVDESB1', true),
            "ITMSTY" => $this->input->post('OVMSTY', true),
            "ITDOCTM" => date('Y-m-d H:i:s', time()),
            "ITDOCTY" => $itdocty,
            "ITICU" => $no,
            "ITLNTY" => $linetype,
            "ITPOST" => $status,
            "ITIDINUM" => $idinum,
            "ITUOM1" => $ituom1,
            "ITGLCLS" => $glcls,
            "ITBRAND" => $this->input->post('OVBRAND', true),
            "ITCILCAP" => $this->input->post('OVCILCAP', true),
            "ITCOMV" => $this->input->post('OVCOMV', true),
            "ITMACHNID" => $this->input->post('OVMACHNID', true),
            "ITVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "ITCOLOR" => $this->input->post('OVCOLOR', true),
            "ITMFN" => $this->input->post('OVMFN', true),
            "ITVHRN" => $this->input->post('OVVHRN', true),
            "ITVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "ITCRTFID" => $this->input->post('OVCRTFID', true),
            "ITLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "ITLENGTH" => $this->input->post('OVLENGTH', true),
            "ITWIDTH" => $this->input->post('OVWIDTH', true),
            "ITWIDE" => $this->input->post('OVWIDE', true),
            "ITCRTFDT" => $this->input->post('OVCRTFDT', true),
            "ITASADDR" => $this->input->post('OVASADDR', true),
            "ITCITY" => $this->input->post('OVCITY', true),
            "ITDIST" => $this->input->post('OVDIST', true),
            "ITSUBDIST" => $this->input->post('OVSUBDIST', true),
            "ITMANAGE" => $this->input->post('OVIDBUID', true),
            "ITLOCID" => $this->input->post('OVLOCID', true),
            // "ITDOCMO" => $m,
            // "ITDOCYR" => $y,
            "ITUID" => $ituid,
            "ITUIDM" => $ituidm,
            "ITIPUID" => $ip,
            "ITIPUIDM" => $ip,
            "ITDTIN" => date('Y-m-d H:i:s', time()),
            "ITDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t4111', $data);
    }

    public function Tambah2_41021($ovidbuid, $buid1) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "ILCOID" => $this->input->post('OVCOID', true),
            "ILIDBUID" => $ovidbuid,
            "ILLOCID" => $this->input->post('OVLOCID', true),
            "ILBUID1" => $buid1,
            "ILIPUID" => $ip,
            "ILIPUIDM" => $ip,
            "ILDTIN" => date('Y-m-d H:i:s', time()),
            "ILDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t41021', $data);
    }
    
    public function Update_ovdocno($ovdocno) {
        $this->db->query("UPDATE t4312 SET OVDOCNO = OVDOCNO + 1 WHERE OVDOCNO = '$ovdocno'");
    }

    public function GetOpdById($x, $ovidbuid) {
        $query = $this->db->query("SELECT t4.`OVIDBUID`, t4.`OVLOCID`, t21.`BNIDBUID`, t21.`BNDESB1`, t4.`OVDOCDT`, t4.`OVDOCNO` 
        FROM t4312 AS t4
        JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        WHERE t4.`OVIDBUID` = '$ovidbuid' AND t4.`OVDOCNO`='$x'");
        
        return $query->row_array();
    }

    public function GetData($x, $ovidbuid) {
        // $query = $this->db->query("SELECT * FROM t4312 AS t4
        // JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        // JOIN t0009 AS t9 ON t4.`OVMSTY` = t9.`DTDC`
        // WHERE t9.`DTPC` = '20' AND t9.`DTSC` = 'JB'
        // AND t4.`OVIDBUID` = '$ovidbuid' AND t4.`OVDOCNO`='$x'");

        // $query = $this->db->query("SELECT t4.`OVCOID`, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVINUM`, t4.`OVDOCTY`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.`OVDOCSQ`,
        // t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVMACHNID, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa'
        // FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID` 
        // JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` 
        // JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        // JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`OVCITY`
        // JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`OVDIST`
        // JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`OVSUBDIST`
        // WHERE t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        // AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        // AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        // AND t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`OVDOCNO` = '$x' AND t4.`OVIDBUID` = '$ovidbuid'");

        $query = $this->db->query("SELECT t4.`OVCOID`, t4.`OVIDBUID`, t4.`OVDOCNO`, t4.`OVINUM`, t41.`LMLOCID`, t41.`LMDESA2`, t4.`OVDOCTY`, t4.OVMSTY, t4.OVCOMV, t4.OVBRAND, t4.OVCOLOR, t4.OVCILCAP, t4.`OVDOCSQ`, t4.`OVLST`, t4.`OVNST`,
        t4.OVMFN, t4.OVVHRN, t4.OVVHTAXDT, t4.OVVHRNTAXDT, t4.OVCRTFID, t4.OVCRTFDT, t4.OVLNDOWNST, t4.OVLENGTH, t4.OVMACHNID, t4.OVWIDTH, t4.OVWIDE, t4.OVASADDR, t4.OVCITY, t4.OVDIST, t4.OVSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, t4.`OVDESB1`, t4.`OVDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`OVLOCID`
        FROM t4312 AS t4 JOIN t0021 AS t21 ON t4.`OVIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`OVINUM` 
        JOIN t0009 ON t0009.`DTDC` = t4.`OVMSTY` 
        LEFT OUTER JOIN t4100 AS t41 ON t4.`OVLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`OVCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`OVDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`OVSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`OVDOCNO` = '$x' AND t4.`OVIDBUID` = '$ovidbuid' AND t4.`OVLST` = '400' AND t4.`OVNST` = '440'");
        
        return $query->result_array();
    }

    public function Cek_ovmsty_1($x, $ovidbuid) {
        $query = $this->db->query("SELECT t4.`OVMSTY`, t4.`OVICU` FROM t4312 AS t4 WHERE OVDOCNO = '$x' AND OVIDBUID = '$ovidbuid' AND OVLST = '400' AND OVNST = '440' ORDER BY OVDOCSQ ASC LIMIT 1");
        
        return $query->row();
    }

    public function Cek_ovmsty_2($x, $ovidbuid, $ovmsty) {
        $query = $this->db->query("SELECT t4.`OVMSTY`, t4.`OVICU` FROM t4312 AS t4 WHERE OVDOCNO = '$x' AND OVIDBUID = '$ovidbuid' AND t4.`OVMSTY` = '$ovmsty' AND OVLST = '400' AND OVNST = '440' ORDER BY OVDOCSQ ASC LIMIT 1");
        return $query;

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Cek_ovdocsq($x) {
        $query = $this->db->query("SELECT OVDOCSQ FROM t4312 AS t4 
        WHERE t4.`OVDOCNO`='$x' ORDER BY OVDOCSQ DESC LIMIT 1");

        return $query->row();
    }

    public function getDocsq_IT($no, $itft) {
        $query = $this->db->query("SELECT ITDOCSQ, ITDOCNO FROM t4111 AS t4 
        WHERE t4.`ITICU`='$no' AND t4.`ITFT` = '$itft' ORDER BY ITDOCSQ DESC LIMIT 1");

        return $query->row();
    }

    public function getDocno($ovdocno) {
        $query = $this->db->query("SELECT ITDOCNO FROM t4111 AS t4 
        WHERE t4.`ITDOCNO`='$ovdocno' LIMIT 1");

        return $query->row();
    }

    public function Hapus_update($ovdocno, $ovdocsq) {
        $this->db->query("UPDATE t4312 SET OVLST = '480' WHERE OVDOCNO = '$ovdocno' AND OVDOCSQ = '$ovdocsq'");
        $this->db->query("UPDATE t4312 SET OVNST = '499' WHERE OVDOCNO = '$ovdocno' AND OVDOCSQ = '$ovdocsq'");
    }

    public function Hapus_berkasupdate($ovidbuid, $ovdocno) {
        $this->db->query("UPDATE t4312 SET OVLST = '480' WHERE OVDOCNO = '$ovdocno' AND OVIDBUID = '$ovidbuid'");
        $this->db->query("UPDATE t4312 SET OVNST = '499' WHERE OVDOCNO = '$ovdocno' AND OVIDBUID = '$ovidbuid'");
    }

    public function getIdinum($ovidinum) {
        $query = $this->db->query("SELECT AMOAN, AMGLCLS FROM t0901 WHERE AMOBJ = '$ovidinum'");

        return $query->row();
    }

    public function Edit_Berkas($ovdocno, $ovdocsq, $ovidbuid) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ovdocty = "OV";
        $ovuid = "admin1";
        $ovuidm = "admin1";
        $ovicu = "1";
        $post=$this->input->post();

        $data = [
            "OVCOID" => $this->input->post('OVCOID', true),
            "OVIDBUID" => $ovidbuid,
            "OVDOCNO" => $ovdocno,
            "OVDOCSQ" => $ovdocsq,
            "OVDOCDT" => $this->input->post('OVDOCDT', true),
            "OVINUM" => $this->input->post('OVINUM', true),
            "OVDESB1" => $this->input->post('OVDESB1', true),
            "OVMSTY" => $this->input->post('OVMSTY', true),
            "OVDOCTY" => $ovdocty,
            "OVICU" => $ovicu,
            "OVBRAND" => $this->input->post('OVBRAND', true),
            "OVCILCAP" => $this->input->post('OVCILCAP', true),
            "OVCOMV" => $this->input->post('OVCOMV', true),
            "OVMACHNID" => $this->input->post('OVMACHNID', true),
            "OVVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "OVCOLOR" => $this->input->post('OVCOLOR', true),
            "OVMFN" => $this->input->post('OVMFN', true),
            "OVVHRN" => $this->input->post('OVVHRN', true),
            "OVVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "OVCRTFID" => $this->input->post('OVCRTFID', true),
            "OVLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "OVLENGTH" => $this->input->post('OVLENGTH', true),
            "OVWIDTH" => $this->input->post('OVWIDTH', true),
            "OVWIDE" => $this->input->post('OVWIDE', true),
            "OVCRTFDT" => $this->input->post('OVCRTFDT', true),
            "OVASADDR" => $this->input->post('OVASADDR', true),
            "OVCITY" => $this->input->post('OVCITY', true),
            "OVDIST" => $this->input->post('OVDIST', true),
            "OVSUBDIST" => $this->input->post('OVSUBDIST', true),
            "OVLST" => $this->input->post('OVLST', true),
            "OVNST" => $this->input->post('OVNST', true),
            "OVLOCID" => $this->input->post('OVLOCID', true),
            "OVUIDM" => $ovuidm,
            "OVIPUIDM" => $ip,
            "OVDTLU" => date('Y-m-d H:i:s', time()),
            "OVPOST" => $this->input->post('OVPOST', true),
            "OVICU" => $this->input->post('OVICU', true),
            "OVLNTY" => $this->input->post('OVLNTY', true),
        ];
        
        $this->db->update('t4312', $data, array('OVDOCNO' => $post['OVDOCNO'],'OVDOCSQ' => $post['OVDOCSQ'], 'OVIDBUID' => $post['OVIDBUID']));
    }

    public function Edit_Berkas_T4111($ovdocno, $ovdocsq, $ovidbuid) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $ovdocty = "OV";
        $ovuid = "admin1";
        $ovuidm = "admin1";
        $ovicu = "1";
        $post=$this->input->post();

        $data = [
            "ITCOID" => $this->input->post('OVCOID', true),
            "ITIDBUID" => $ovidbuid,
            "ITDOCNO" => $ovdocno,
            "ITDOCSQ" => $ovdocsq,
            "ITDOCDT" => $this->input->post('OVDOCDT', true),
            "ITINUM" => $this->input->post('OVINUM', true),
            "ITDESB1" => $this->input->post('OVDESB1', true),
            "ITMSTY" => $this->input->post('OVMSTY', true),
            "ITDOCTY" => $ovdocty,
            "ITICU" => $ovicu,
            "ITBRAND" => $this->input->post('OVBRAND', true),
            "ITCILCAP" => $this->input->post('OVCILCAP', true),
            "ITCOMV" => $this->input->post('OVCOMV', true),
            "ITMACHNID" => $this->input->post('OVMACHNID', true),
            "ITVHTAXDT" => $this->input->post('OVVHTAXDT', true),
            "ITCOLOR" => $this->input->post('OVCOLOR', true),
            "ITMFN" => $this->input->post('OVMFN', true),
            "ITVHRN" => $this->input->post('OVVHRN', true),
            "ITVHRNTAXDT" => $this->input->post('OVVHRNTAXDT', true),
            "ITCRTFID" => $this->input->post('OVCRTFID', true),
            "ITLNDOWNST" => $this->input->post('OVLNDOWNST', true),
            "ITLENGTH" => $this->input->post('OVLENGTH', true),
            "ITWIDTH" => $this->input->post('OVWIDTH', true),
            "ITWIDE" => $this->input->post('OVWIDE', true),
            "ITCRTFDT" => $this->input->post('OVCRTFDT', true),
            "ITASADDR" => $this->input->post('OVASADDR', true),
            "ITCITY" => $this->input->post('OVCITY', true),
            "ITDIST" => $this->input->post('OVDIST', true),
            "ITSUBDIST" => $this->input->post('OVSUBDIST', true),
            // "ITLST" => $this->input->post('OVLST', true),
            // "ITNST" => $this->input->post('OVNST', true),
            "ITLOCID" => $this->input->post('OVLOCID', true),
            "ITUIDM" => $ovuidm,
            "ITIPUIDM" => $ip,
            "ITDTLU" => date('Y-m-d H:i:s', time()),
            "ITPOST" => $this->input->post('OVPOST', true),
            "ITICU" => $this->input->post('OVICU', true),
            "ITLNTY" => $this->input->post('OVLNTY', true),
        ];
        
        $this->db->update('t4111', $data, array('ITDOCNO' => $post['OVDOCNO'],'ITDOCSQ' => $post['OVDOCSQ'], 'ITIDBUID' => $post['OVIDBUID']));
    }

    public function dataKonfirmasi($ovidbuid, $ovdocno) {
        $query = $this->db->query("SELECT t21.`BNDESB1`, t4.`OVIDBUID`, COUNT(t4.`OVDOCSQ`) AS total_berkas, t4.`OVDOCNO`, t4.`OVDOCDT`, t1a.ADNM AS pimpinan, t09.`DTDESC1` AS jabatan, t21.`BNCC01`, t21.`BNCC02`
        FROM t0021 AS t21
        JOIN t4312 AS t4 ON t4.`OVIDBUID` = t21.`BNIDBUID`
        LEFT OUTER JOIN t0101 t1a ON t21.`BNCC01` = t1a.`ADIDANUM`
        LEFT OUTER JOIN t0009 t09 ON t21.`BNCC02` = t09.`DTIDDC` AND t09.DTPC='15' AND t09.DTSC='JP'
        WHERE t4.`OVIDBUID` = '$ovidbuid' AND t4.`OVDOCNO` = '$ovdocno' AND t4.`OVLST` = '400' AND t4.`OVNST` = '440'
        GROUP BY t4.`OVDOCNO`");

        return $query->result_array();
    }

    public function getJabatan() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 from t0009 where DTPC='15' and DTSC='JP'");
        return $query->result_array();
    }

    public function getPimpinan() {
        $query = $this->db->query("SELECT ADIDANUM, ADNM FROM T0101 WHERE ADST = 'E'");
        return $query->result_array();
    }

    public function Update_t0002($ovidbuid) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $post=$this->input->post();

        $this->BNCC01 = $post["BNCC01"];
        $this->BNCC02 = $post["BNCC02"];
        $this->BNIPUIDM = $ip;
        $this->BNDTLU = date('Y-m-d H:i:s', time());
        
        $this->db->update('t0021',$this, array('BNIDBUID' => $ovidbuid));
    }

    public function UbahKeDraft($ovdocno, $ovidbuid, $status) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$ovdocno' AND OVIDBUID = '$ovidbuid'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$ovdocno' AND ITIDBUID = '$ovidbuid' AND ITDOCTY = 'OV'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$ovdocno'");
    }

    public function CekIT($ovdocono) {
        $query=$this->db->query("SELECT *
        FROM t4111 AS t41
        JOIN t4312 AS t4 ON t4.`OVDOCNO` = t41.`ITDOCONO`
        WHERE t4.`OVDOCNO` = '$ovdocono' AND t41.`ITDOCONO` = '$ovdocono' AND t41.`ITDOCTY` ='IT'
        ORDER BY t41.`ITDOCONO` DESC LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Check($ovdocno, $ovdocty) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCOTY = '$ovdocty' AND ITDOCONO = '$ovdocno'");

        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function It() {
        $query = $this->db->query("SELECT * FROM t4111 AS a WHERE a.`ITDOCTY` = 'OV' AND NOT EXISTS (SELECT * FROM t4111 AS b WHERE b.`ITDOCOSQ` = a.`ITDOCSQ`)");
        return $query->result_array();
    }

    public function Check_It() {
        $query = $this->db->query("SELECT * FROM t4111 AS a WHERE a.`ITDOCTY` = 'OV' AND NOT EXISTS (SELECT * FROM t4111 AS b WHERE b.`ITDOCOSQ` = a.`ITDOCSQ`)");
        return $query;
        
    }

    public function getItdocsqIt($ovdocno) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$ovdocno' ORDER BY ITDOCSQ DESC LIMIT 1");
        return $query->row();
        
    }

    public function getDataIT($ovdocno) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$ovdocno'");
        return $query->result_array();
    }

    public function getData_t4312($ovdocno) {
        $query = $this->db->query("SELECT * FROM t4312 WHERE OVDOCNO = '$ovdocno'");
        return $query->result_array();
    }

    public function Data_mutasi($ovidbuid, $ovidinum, $ovinum, $ovlocid) {
        $query = $this->db->query("SELECT * FROM t41021 WHERE ILIDBUID = '16445' AND ILIDINUM = '$ovidinum' AND ILINUM = '$ovinum'");

        return $query->result_array();
    }

    public function Update_t41021_mutasi($ovidbuid, $ovidinum, $ovinum, $ovlocid, $ilmanage) {
        $this->db->query("UPDATE t41021 SET ILMANAGE = '$ilmanage' WHERE ILIDBUID = '16445' AND ILIDINUM = '$ovidinum' AND ILINUM = '$ovinum'");
    }

    public function Cek_ir($tahun, $bulan) {
        $query=$this->db->query("SELECT * FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IR' LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Insert_ir_t0002($tahun, $bulan) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "NNCOID" => 16,
            "NNBUID" => 0,
            "NNDOCBTY" => "IR",
            "NNYR" => $tahun,
            "NNMO" => $bulan,
            "NNRSAT" => 1,
            "NNSEQ" => 0,
            "NNRSMT" => "CM",
            "NNINYR" => "Y",
            "NNINMO" => "Y",
            "NNIPUID" => $ip,
            "NNIPUIDM" => $ip,
            "NNDTIN" => date('Y-m-d H:i:s', time()),
            "NNDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0002', $data);
    }

    public function get_ir($tahun, $bulan) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IR' ORDER BY NNDTIN DESC LIMIT 1");

        return $query->result_array();
    }

    public function Update_ir($tahun, $bulan) {
        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IR'");
    }

    public function getIR($tahun, $bulan) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IR' ORDER BY NNDTIN DESC LIMIT 1");

        return $query->row();
    }

    public function get_itmsty($ovidinum) {
        $query=$this->db->query("SELECT ITMSTY FROM t4111 WHERE ITIDINUM = '$ovidinum' LIMIT 1");

        return $query->row();
    }

    public function get_data_plat_nosertif($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $query = $this->db->query("SELECT ITVHRN, ITCRTFID FROM t4111 WHERE ITIDBUID = '$ilidbuid' AND ITIDINUM = '$ilidinum' AND ITINUM = '$ilinum' AND ITLOCID = '$illocid'");

        return $query->row();
    }

    public function get_last_data_1($plat_nomor) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITVHRN = '$plat_nomor' AND ITIDBUID = '16445' ORDER BY ITDTIN DESC LIMIT 1");

        return $query->result_array();
    }

    public function get_last_data_2($no_sertif) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITCRTFID = '$no_sertif' AND ITIDBUID = '16445' ORDER BY ITDTIN DESC LIMIT 1");

        return $query->result_array();
    }

    public function Berkas_bpkad() {
        $query = $this->db->query("SELECT opd.`BNDESB1`, jenis_brg.`DTDESC1`, kd_barang.`AMOBJ`, history.`ITDESB1`, persediaan.`ILLOCID`, persediaan.`ILPQOH`, history.`ITCOMV`, history.`ITBRAND`, manage.`BNDESB1` AS ilmanage, persediaan.`ILMANAGE`, persediaan.`ILIDINUM`, persediaan.`ILIDBUID`, persediaan.`ILINUM`,
        history.`ITCOLOR`, persediaan.`ILCILCAP`, persediaan.`ILMFN`, persediaan.`ILMACHNID`, persediaan.`ILVHRN`, persediaan.`ILVHTAXDT`, 
        persediaan.`ILVHRNTAXDT`, persediaan.`ILCRTFID`, persediaan.`ILCRTFDT`, history.`ITLNDOWNST`, history.`ITLENGTH`, history.`ITWIDE`, 
        history.`ITWIDTH`, persediaan.`ILASADDR`, persediaan.`ILCITY`, persediaan.`ILDIST`, persediaan.`ILSUBDIST`, t9kab.`DTDESC1` AS kabupaten, t9kec.`DTDESC1` AS kecamatan, t9des.`DTDESC1` AS desa, history.`ITPOST`, history.`ITDOCNO`, history.`ITDOCSQ`, history.`ITMSTY`, lokasi.`LMDESA2`, history.`ITDOCDT`, pengajuan.`DTDESC1` AS pengajuan_pinjam
        FROM t41021 AS persediaan
        JOIN t4111 AS history ON history.`ITIDBUID` = persediaan.`ILIDBUID` AND history.`ITIDINUM` = persediaan.`ILIDINUM`
        JOIN t0021 AS manage ON persediaan.`ILMANAGE` = manage.`BNIDBUID`
        JOIN t0021 AS opd ON persediaan.`ILIDBUID` = opd.`BNIDBUID`
        JOIN t0901 AS kd_barang ON persediaan.`ILINUM` = kd_barang.`AMOBJ`
        JOIN t0009 AS jenis_brg ON jenis_brg.`DTDC` = history.`ITMSTY`
        LEFT OUTER JOIN t0009 AS pengajuan ON history.`ITPOST` = pengajuan.`DTDC` AND pengajuan.`DTPC`='00' AND pengajuan.`DTIDDC`= '130480'
        LEFT OUTER JOIN t4100 AS lokasi ON persediaan.`ILLOCID` = lokasi.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = persediaan.`ILCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = persediaan.`ILDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = persediaan.`ILSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE jenis_brg.`DTPC` = '20' AND jenis_brg.`DTSC` = 'JB' AND persediaan.`ILIDBUID` = '16445'");

        return $query->result_array();
    }
}

/* End of file BerkasBaruModelName.php */

?>