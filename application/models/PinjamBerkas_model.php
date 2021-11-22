<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamBerkas_model extends CI_Model {

    public function getAllBerkas() {
        // $query = $this->db->query("SELECT t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`, t4.`ITPOST`,
        // t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        // t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        // t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        // t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        // t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        // FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        // JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        // JOIN t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        // LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        // LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        // LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        // LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        // WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'OV'");
        $query = $this->db->query("SELECT t4.`ITPOST`,t9.`DTDESC1` AS a, c.`DTDESC1` AS b, t.`DTDESC1`AS c, t009.`DTDESC1` AS d, v.`DTDESC1` AS e, k.`DTDESC1` AS f, t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`,
        t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        JOIN t0009 AS t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
        LEFT OUTER JOIN t0009 AS k ON t4.`ITPOST` = k.`DTDC` AND k.`DTPC`='00' AND k.`DTIDDC`= '130480'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC`='00' AND c.`DTIDDC` = '3200'
        LEFT OUTER JOIN t0009 AS t ON t4.`ITPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS v ON t4.`ITPOST` = v.`DTDC` AND v.`DTPC`='00' AND v.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS t009 ON t4.`ITPOST` = t009.`DTDC` AND t009.`DTPC`='00' AND t009.`DTIDDC` = '3210'
        LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'OV' AND t4.`ITPOST` IN ('D','2','3','8')");

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

    //get berkas IT yang ITFT = T untuk diisikan ke t4111 Peminjaman yang from
    public function getBerkasFrom_peminjaman($itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$itdocno' AND ITDOCTY = 'IT' AND ITDOCOSQ = '$itdocsq' AND ITFT = 'T'");

        return $query->result_array();
    }

    public function getBerkasTo($itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$itdocno' AND ITDOCTY = 'IT' AND ITDOCOSQ = '$itdocsq' AND ITFT = 'T'");

        return $query->row();
    }

    //get berkas IT yang ITFT = F untuk diisikan ke t4111 Peminjaman yang to
    public function getBerkasTo_peminjaman($itidbuid, $itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$itdocno' AND ITDOCTY = 'IT' AND ITDOCOSQ = '$itdocsq' AND ITIDBUID = '$itidbuid' AND ITFT = 'F'");

        return $query->result_array();
    }

    public function getBerkasFrom($itidbuid, $itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCONO = '$itdocno' AND ITDOCTY = 'IT' AND ITDOCOSQ = '$itdocsq' AND ITIDBUID = '$itidbuid' AND ITFT = 'F'");

        return $query->row();
    }

    public function getIT($tahun, $bulan) {
        $query=$this->db->query("SELECT NNYR, NNSEQ, NNMO FROM t0002 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IT' ORDER BY NNDTIN DESC LIMIT 1");

        return $query->row();
    }

    public function getTahunBulan() {
        $query=$this->db->query("SELECT CNCFY, CNCAP FROM t0020 WHERE CNCOID = '16'");

        return $query->row();
    }

    public function Update_IT($tahun, $bulan) {
        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNMO = '$bulan' AND NNDOCBTY = 'IT'");
    }

    //opd
    public function UpdateFrom_t41021($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $pqoh = "1";
        $this->db->query("UPDATE t41021 SET ILPQOH = '$pqoh' WHERE ILIDBUID = '$ilidbuid' AND ILIDINUM = '$ilidinum' AND ILINUM = '$ilinum' AND ILLOCID = '$illocid'");
    }

    //bpkad
    public function UpdateTo_t41021($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $pqoh = "0";
        $this->db->query("UPDATE t41021 SET ILPQOH = '$pqoh' WHERE ILIDBUID = '$ilidbuid' AND ILIDINUM = '$ilidinum' AND ILINUM = '$ilinum' AND ILLOCID = '$illocid'");
    }

    public function getStatusPengajuanPinjam() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC = 'SP' AND DTDC = '2'");

        return $query->row();
    }

    public function getStatusVerifikasiPinjam() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC = 'SP' AND DTDC = '3'");

        return $query->row();
    }

    public function UbahKePengajuan($itdocno, $itidbuid, $status, $itdocsq) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$itdocno' AND OVDOCSQ = '$itdocsq'");
        // $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$itdocno' AND ITDOCOSQ = '$itdocsq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno' AND ITDOCSQ = '$itdocsq'");
    }

    public function UbahKeVerifikasiPinjam($itdocno, $itidbuid, $status, $itdocsq) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$itdocno' AND OVDOCSQ = '$itdocsq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$itdocno' AND ITDOCOSQ = '$itdocsq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno' AND ITDOCSQ = '$itdocsq'");
    }

    public function getBerkasPengajuan() {
        $query = $this->db->query("SELECT t4.`ITPOST`,t.`DTDESC1` AS d, t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`,
        t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        JOIN t0009 AS t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        -- LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
                -- LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC`='00' AND c.`DTIDDC` = '3200'
                LEFT OUTER JOIN t0009 AS t ON t4.`ITPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
                -- LEFT OUTER JOIN t0009 AS t009 ON t4.`ITPOST` = t009.`DTDC` AND t009.`DTPC`='00' AND t009.`DTIDDC` = '3210'
        LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'OV' AND t4.`ITPOST` = '2'");

        return $query->result_array();
    }

    public function getBerkasKeluar() {
        $query = $this->db->query("SELECT t4.`ITPOST`,t.`DTDESC1` AS d, t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`, v.`DTDESC1` AS e, t4.`ITDOCONO`, t4.`ITDOCOTY`, t4.`ITDOCOSQ`,
        t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        JOIN t0009 AS t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        LEFT OUTER JOIN t0009 AS t ON t4.`ITPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS v ON t4.`ITPOST` = v.`DTDC` AND v.`DTPC`='00' AND v.`DTIDDC` = '130430'
        LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'IT' AND ITPOST = '3' AND ITFT = 'T' AND ITIDBUID NOT IN('16445')");

        return $query->result_array();
    }

    public function getStatusPengembalianBerkas() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC = 'SP' AND DTDC = '8'");

        return $query->row();
    }

    public function UbahKePengembalianBerkas($itdocono, $itidbuid, $status, $itdocosq, $itdocno, $itdocsq) {
        $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$itdocono' AND OVDOCSQ = '$itdocosq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocono' AND ITDOCSQ = '$itdocosq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCONO = '$itdocono' AND ITDOCOSQ = '$itdocosq'");
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno'");
    }

    public function getBerkasFrom_pengembalian($itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITDOCSQ = '$itdocsq'");

        return $query->result_array();
    }

    public function getBerkas_from($itdocno, $itdocsq) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITDOCSQ = '$itdocsq'");

        return $query->row();
    }

    public function getBerkasTo_pengembalian($itdocno) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITIDBUID = '16445'");

        return $query->result_array();
    }

    public function getBerkas_to($itdocno) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITIDBUID = '16445'");

        return $query->row();
    }

    //opd
    public function UpdateFrom_t41021_pengembalian($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $pqoh = "0";
        $this->db->query("UPDATE t41021 SET ILPQOH = '$pqoh' WHERE ILIDBUID = '$ilidbuid' AND ILIDINUM = '$ilidinum' AND ILINUM = '$ilinum' AND ILLOCID = '$illocid'");
    }

    //bpkad
    public function UpdateTo_t41021_pengembalian($ilidbuid, $ilidinum, $ilinum, $illocid) {
        $pqoh = "1";
        $this->db->query("UPDATE t41021 SET ILPQOH = '$pqoh' WHERE ILIDBUID = '$ilidbuid' AND ILIDINUM = '$ilidinum' AND ILINUM = '$ilinum' AND ILLOCID = '$illocid'");
    }

    public function getData($itidbuid, $itdocno, $itdocsq) {
        $query = $this->db->query("SELECT t4.`ITPOST`,t9.`DTDESC1` AS a, c.`DTDESC1` AS b, t.`DTDESC1`AS c, t009.`DTDESC1` AS d, v.`DTDESC1` AS e, t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`, t4.`ITLNTY`, t4.`ITUOM1`, t4.`ITICU`, t4.`ITGLCLS`,
        t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`, t41.`LMDESA2`,
        t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.`ITCRTFDT`,
        t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        JOIN t0009 AS t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC`='00' AND c.`DTIDDC` = '3200'
        LEFT OUTER JOIN t0009 AS t ON t4.`ITPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS v ON t4.`ITPOST` = v.`DTDC` AND v.`DTPC`='00' AND v.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS t009 ON t4.`ITPOST` = t009.`DTDC` AND t009.`DTPC`='00' AND t009.`DTIDDC` = '3210'
        LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCNO` = '$itdocno' AND t4.`ITDOCSQ` = '$itdocsq' AND t4.`ITIDBUID` = '$itidbuid'");

        return $query->row_array();
    }

    public function getDataPeminjaman($itdocno) {
        // $query = $this->db->query("SELECT * FROM t4111 WHERE ITIDBUID = '$itidbuid' AND ITDOCNO = '$itdocno' AND ITDOCSQ = '$itdocsq'");
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITIDBUID = '16445' AND ITDOCNO = '$itdocno' AND ITFT = 'F'");

        return $query->result_array();
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

    public function getKabKota() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='CY' AND DTDC IN ('35.76','35.16')");
        return $query->result_array();
    }

}

/* End of file PinjamBerkas_model.php */

?>