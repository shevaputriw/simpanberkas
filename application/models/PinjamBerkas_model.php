<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamBerkas_model extends CI_Model {

    public function getAllBerkas() {
        $query = $this->db->query("SELECT t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`, 
        t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        JOIN t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'OV' AND t4.`ITPOST` = 'D'");

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

}

/* End of file PinjamBerkas_model.php */

?>