<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PinjamBerkas_model extends CI_Model {

    public function getAllBerkas() {
        // $query = $this->db->query("SELECT t4.`ITPOST`,t9.`DTDESC1` AS a, c.`DTDESC1` AS b, t.`DTDESC1`AS c, t009.`DTDESC1` AS d, v.`DTDESC1` AS e, k.`DTDESC1` AS f, t4.`ITCOID`, t4.`ITIDBUID`, t4.`ITDOCNO`, t4.`ITINUM`, t41.`LMLOCID`, t41.`LMDESA2`,
        // t4.`ITDOCTY`, t4.ITMSTY, t4.ITCOMV, t4.ITBRAND, t4.ITCOLOR, t4.ITCILCAP, t4.`ITDOCSQ`,
        // t4.ITMFN, t4.ITVHRN, t4.ITVHTAXDT, t4.ITVHRNTAXDT, t4.ITCRTFID, t4.ITCRTFDT, 
        // t4.ITLNDOWNST, t4.ITLENGTH, t4.ITMACHNID, t4.ITWIDTH, t4.ITWIDE, t4.ITASADDR, t4.ITCITY, 
        // t4.ITDIST, t4.ITSUBDIST,  t09.`AMOBJ`, t0009.`DTDESC1`, t09.`AMDESB1`, t21.`BNDESB1`, 
        // t4.`ITDESB1`, t4.`ITDOCDT`, t9kab.`DTDESC1` AS 'kabkota', t9kec.`DTDESC1` AS 'kecamatan', t9des.`DTDESC1` AS 'desa', t4.`ITLOCID`
        // FROM t4111 AS t4 JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID` 
        // JOIN t0901 AS t09 ON t09.`AMOBJ` = t4.`ITINUM` 
        // JOIN t0009 AS t0009 ON t0009.`DTDC` = t4.`ITMSTY` 
        // LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
        // LEFT OUTER JOIN t0009 AS k ON t4.`ITPOST` = k.`DTDC` AND k.`DTPC`='00' AND k.`DTIDDC`= '130480'
        // LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC`='00' AND c.`DTIDDC` = '3200'
        // LEFT OUTER JOIN t0009 AS t ON t4.`ITPOST` = t.`DTDC` AND t.`DTPC`='00' AND t.`DTIDDC` = '130420'
        // LEFT OUTER JOIN t0009 AS v ON t4.`ITPOST` = v.`DTDC` AND v.`DTPC`='00' AND v.`DTIDDC` = '130430'
        // LEFT OUTER JOIN t0009 AS t009 ON t4.`ITPOST` = t009.`DTDC` AND t009.`DTPC`='00' AND t009.`DTIDDC` = '3210'
        // LEFT OUTER JOIN t4100 AS t41 ON t4.`ITLOCID` = t41.`LMLOCID`
        // LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = t4.`ITCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        // LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = t4.`ITDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        // LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = t4.`ITSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        // WHERE t0009.`DTPC` = '20' AND t0009.`DTSC` = 'JB' AND t4.`ITDOCTY` = 'OV' AND t4.`ITPOST` IN ('11')");

        // $query = $this->db->query("SELECT opd.`BNDESB1`, jenis_brg.`DTDESC1`, kd_barang.`AMOBJ`, history.`ITDESB1`, persediaan.`ILLOCID`, persediaan.`ILPQOH`, history.`ITCOMV`, history.`ITBRAND`, manage.`BNDESB1` AS ilmanage, persediaan.`ILMANAGE`, persediaan.`ILIDINUM`, persediaan.`ILIDBUID`, persediaan.`ILINUM`,
        // history.`ITCOLOR`, persediaan.`ILCILCAP`, persediaan.`ILMFN`, persediaan.`ILMACHNID`, persediaan.`ILVHRN`, persediaan.`ILVHTAXDT`, 
        // persediaan.`ILVHRNTAXDT`, persediaan.`ILCRTFID`, persediaan.`ILCRTFDT`, history.`ITLNDOWNST`, history.`ITLENGTH`, history.`ITWIDE`, 
        // history.`ITWIDTH`, persediaan.`ILASADDR`, persediaan.`ILCITY`, persediaan.`ILDIST`, persediaan.`ILSUBDIST`, t9kab.`DTDESC1` AS kabupaten, t9kec.`DTDESC1` AS kecamatan, t9des.`DTDESC1` AS desa, history.`ITPOST`, history.`ITDOCNO`, history.`ITDOCSQ`, history.`ITMSTY`, lokasi.`LMDESA2`, history.`ITDOCDT`, pengajuan.`DTDESC1` AS pengajuan_pinjam
        // FROM t41021 AS persediaan
        // JOIN t4111 AS history ON history.`ITIDBUID` = persediaan.`ILIDBUID` AND history.`ITIDINUM` = persediaan.`ILIDINUM`
        // JOIN t0021 AS manage ON persediaan.`ILMANAGE` = manage.`BNIDBUID`
        // JOIN t0021 AS opd ON persediaan.`ILIDBUID` = opd.`BNIDBUID`
        // JOIN t0901 AS kd_barang ON persediaan.`ILINUM` = kd_barang.`AMOBJ`
        // JOIN t0009 AS jenis_brg ON jenis_brg.`DTDC` = history.`ITMSTY`
        // LEFT OUTER JOIN t0009 AS pengajuan ON history.`ITPOST` = pengajuan.`DTDC` AND pengajuan.`DTPC`='00' AND pengajuan.`DTIDDC`= '130480'
        // LEFT OUTER JOIN t4100 AS lokasi ON persediaan.`ILLOCID` = lokasi.`LMLOCID`
        // LEFT OUTER JOIN t0009 AS t9kab ON t9kab.`DTDC` = persediaan.`ILCITY` AND t9kab.`DTPC`='01' AND t9kab.`DTSC`='CY' AND t9kab.`DTDC` IN ('35.76','35.16')
        // LEFT OUTER JOIN t0009 AS t9kec ON t9kec.`DTDC` = persediaan.`ILDIST` AND t9kec.`DTPC`='01' AND t9kec.`DTSC`='DT' AND SUBSTRING(t9kec.`DTDC`, 1, 5) = t9kab.`DTDC`
        // LEFT OUTER JOIN t0009 AS t9des ON t9des.`DTDC` = persediaan.`ILSUBDIST` AND t9des.`DTPC`='01' AND t9des.`DTSC`='SD' AND SUBSTRING(t9des.`DTDC`, 1, 8) = t9kec.`DTDC`
        // WHERE jenis_brg.`DTPC` = '20' AND jenis_brg.`DTSC` = 'JB' AND persediaan.`ILIDBUID` = '16445'");

        // $query = $this->db->query("SELECT *, COUNT(t4.`ITDOCSQ`) AS total_berkas, t9.`DTDESC1` AS draft
        // FROM t4111 AS t4
        // LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC`='00' AND t9.`DTIDDC`= '130400'
        // WHERE ITDOCTY = 'IT' AND ITPOST = '0' AND ITFT = 'T' GROUP BY ITDOCNO");
        // $query = $this->db->query("SELECT *, COUNT(t4.`ITDOCSQ`) AS total_berkas, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar
        // FROM t4111 AS t4
        // LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        // LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        // LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        // LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        // LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        // WHERE ITDOCTY = 'IT' AND ITFT = 'F' AND ITIDBUID = '16445' AND ITPOST IN(0,2,3,7,11) GROUP BY ITDOCNO");

        // $query = $this->db->query("SELECT *, COUNT(t4.`ITDOCSQ`) AS total_berkas, t4.`ITICU`, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar, e.`DTDESC1` AS finish
        // FROM t4111 AS t4
        // LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        // LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        // LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        // LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        // LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        // LEFT OUTER JOIN t0009 AS e ON t4.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130510'
        // WHERE ITDOCTY = 'IT' AND ITFT = 'T' AND ITIDBUID != '16445' AND ITPOST IN(0,2,3,7,11) GROUP BY ITDOCNO ORDER BY t4.`ITDOCNO` DESC");

        $query = $this->db->query("SELECT t4.`ITPOST`, t4.`ITDOCNO`, t4.`ITIDBUID`, t4.`ITDOCDT`, t4.`ITICU`, t4.`ITMSTY`, g.`BNDESB1`, i.`DTDESC1` AS jenis_berkas, t4.`ITINUM`,
        t4.`ITDESB1`, t4.`ITDESB2`, h.`LMDESA2`, t4.`ITCOMV`, f.`FACOMV`, t4.`ITBRAND`, t4.`ITCOLOR`, t4.`ITCILCAP`, t4.`ITMFN`, t4.`ITMACHNID`, t4.`ITVHRN`, f.`FAVHRN`, f.`FAVHTAXDT`, f.`FAVHRNTAXDT`, f.`FACRTFID`, f.`FACRTFDT`, f.`FALNDOWNST`,
        t4.`ITVHTAXDT`, t4.`ITVHRNTAXDT`, t4.`ITCRTFID`, t4.`ITCRTFDT`, t4.`ITLNDOWNST`, t4.`ITLENGTH`, t4.`ITWIDTH`, t4.`ITWIDE`, t4.`ITASADDR`,
        kab.`DTDESC1`AS kabupaten, kec.`DTDESC1` AS kecamatan, desa.`DTDESC1` AS desa1,
        COUNT(t4.`ITDOCSQ`) AS total_berkas, t4.`ITICU`, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, 
        c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar, e.`DTDESC1` AS finish
        FROM t4111 AS t4
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        LEFT OUTER JOIN t0009 AS e ON t4.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130510'
        JOIN t1201 AS f ON t4.`ITICU` = f.`FAICU`
        JOIN t0021 AS g ON t4.`ITIDBUID` = g.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS h ON t4.`ITLOCID` = h.`LMLOCID`
        JOIN t0009 AS i ON t4.`ITMSTY` = i.`DTDC` AND i.`DTPC` = '20' AND i.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON t4.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON t4.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON t4.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE ITDOCTY = 'IT' AND ITFT = 'T' AND ITIDBUID != '16445' AND ITPOST IN(0,2,3,7) GROUP BY ITDOCNO ORDER BY t4.`ITDOCNO` DESC");

        return $query->result_array();
    }

    public function getAllBerkas_history_pinjam() {
        $query = $this->db->query("SELECT t4.`ITPOST`, t4.`ITDOCNO`, t4.`ITIDBUID`, t4.`ITDOCDT`, t4.`ITICU`, t4.`ITMSTY`, g.`BNDESB1`, i.`DTDESC1` AS jenis_berkas, t4.`ITINUM`, f.`FADESB1`, f.`FABRAND`, f.`FACOLOR`, f.`FACILCAP`, f.`FAMFN`, f.`FAMACHNID`, f.`FALENGTH`, f.`FAWIDTH`, f.`FAWIDE`, f.`FAASADDR`,
        t4.`ITDESB1`, t4.`ITDESB2`, h.`LMDESA2`, t4.`ITCOMV`, f.`FACOMV`, t4.`ITBRAND`, t4.`ITCOLOR`, t4.`ITCILCAP`, t4.`ITMFN`, t4.`ITMACHNID`, t4.`ITVHRN`, f.`FAVHRN`, f.`FAVHTAXDT`, f.`FAVHRNTAXDT`, f.`FACRTFID`, f.`FACRTFDT`, f.`FALNDOWNST`,
        t4.`ITVHTAXDT`, t4.`ITVHRNTAXDT`, t4.`ITCRTFID`, t4.`ITCRTFDT`, t4.`ITLNDOWNST`, t4.`ITLENGTH`, t4.`ITWIDTH`, t4.`ITWIDE`, t4.`ITASADDR`,
        kab.`DTDESC1`AS kabupaten, kec.`DTDESC1` AS kecamatan, desa.`DTDESC1` AS desa1, t4.`ITICU`, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, 
        c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar, e.`DTDESC1` AS finish
        FROM t4111 AS t4
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        LEFT OUTER JOIN t0009 AS e ON t4.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130510'
        JOIN t1201 AS f ON t4.`ITICU` = f.`FAICU`
        JOIN t0021 AS g ON t4.`ITIDBUID` = g.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS h ON t4.`ITLOCID` = h.`LMLOCID`
        JOIN t0009 AS i ON t4.`ITMSTY` = i.`DTDC` AND i.`DTPC` = '20' AND i.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON t4.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON t4.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON t4.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE ITDOCTY = 'IT' AND ITFT = 'T' AND ITIDBUID != '16445' AND ITPOST IN(0,2,3,7,11) ORDER BY t4.`ITDOCNO` DESC");

        return $query->result_array();
    }

    public function get_berkas2_t1201($it_docno_peminjaman) {
        // $query = $this->db->query("SELECT * FROM t1201 WHERE FAPOST = '11'");
        // $query = $this->db->query("SELECT *
        // FROM t1201 AS a
        // JOIN t41021 AS b ON a.`FAICU` = b.`ILICU` AND b.`ILPQOH` = '1.00000' AND b.`ILIDBUID` = '16445'
        // WHERE a.FAICU NOT IN (SELECT ITICU FROM t4111 WHERE ITDOCNO = '$it_docno_peminjaman')");
        $query = $this->db->query("SELECT *
        FROM t1201 AS a
        JOIN t41021 AS b ON a.`FAICU` = b.`ILICU` AND b.`ILPQOH` = '1.00000' AND b.`ILIDBUID` = '16445'
        WHERE a.FAICU NOT IN (SELECT ITICU FROM t4111 WHERE ITDOCNO = '$it_docno_peminjaman')
        AND a.`FAICU` NOT IN(SELECT ITICU FROM t4111 AS c WHERE c.`ITDOCTY` = 'IT' AND c.`ITFT`='T' AND c.`ITIDBUID` != '16445' AND c.`ITDOCNO` = '$it_docno_peminjaman' AND c.`ITPOST` IN(0,2,3,7,11))");

        return $query->result_array();
    }

    public function get_berkas_t1201() {
        // $query = $this->db->query("SELECT * FROM t1201 WHERE FAPOST = '11'");
        $query = $this->db->query("SELECT *
        FROM t1201 AS a
        JOIN t41021 AS b ON a.`FAICU` = b.`ILICU` AND b.`ILPQOH` = '1.00000' AND b.`ILIDBUID` = '16445' WHERE a.`FAPOST` = '11'");

        return $query->result_array();
    }

    public function get_data_t4312($icu) {
        $query = $this->db->query("SELECT * FROM t4312 WHERE OVICU = '$icu'");

        return $query->row();
    }

    public function get_data_t1201($icu) {
        $query = $this->db->query("SELECT * FROM t1201 WHERE FAICU = '$icu'");

        return $query->result_array();
    }

    public function getStatusDraft() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130400'");

        return $query->row();
    }

    public function getLineType() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='41' AND DTSC='LN' AND DTIDDC = '123820'");

        return $query->row();
    }

    public function getLocid() {
        $query=$this->db->query("SELECT LMLOCID FROM t4100 WHERE LMLOCID = '445.00001.00001'");

        return $query->row();
    }

    public function get_lokasi_opd($itdocno, $iticu) {
        $query=$this->db->query("SELECT ITIDBUID, ITLOCID FROM t4111 WHERE ITICU = '$iticu' AND ITDOCNO = '$itdocno' AND ITIDBUID != '16445'");

        return $query->row();
    }

    public function get_locid_opd_t41021($icu) {
        $query=$this->db->query("SELECT ILLOCID FROM t41021 WHERE ILICU = '$icu' AND ILIDBUID != '16445'");

        return $query->row();
    }

    public function getBnidbuid() {
        $query=$this->db->query("SELECT BNIDBUID FROM t0021 WHERE BNIDBUID = '16445'");

        return $query->row();
    }

    public function Cek_sq($itdocno_peminjaman) {
        $query = $this->db->query("SELECT ITDOCSQ FROM t4111 AS t4 
        WHERE t4.`ITDOCNO`='$itdocno_peminjaman' ORDER BY ITDOCSQ DESC LIMIT 1");

        return $query->row();
    }

    public function getBerkas($itdocno) {
        $query = $this->db->query("SELECT t21.`BNDESB1`, t4.`ITDOCDT`, t4.`ITIDBUID`, t4.`ITDOCNO`
        FROM t4111 AS t4
        JOIN t0021 AS t21 ON t4.`ITIDBUID` = t21.`BNIDBUID`
        WHERE t4.`ITDOCNO` = '$itdocno' AND t4.`ITFT` = 'F'");

        return $query->row_array();
    }

    public function getBerkas2($itdocno) {
        // $query = $this->db->query("SELECT ITDESB1, ITDESB2, ITICU, ITDOCNO FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITFT = 'T'");
        $query = $this->db->query("SELECT f.`FADESB1`, t4.`ITDESB2`, t4.`ITICU`, t4.`ITDOCNO`,  g.`BNDESB1`, t4.`ITMSTY`, i.`DTDESC1` AS jenis_berkas, t4.`ITINUM`, f.`FADESB1`, h.`LMDESA2`, t4.`ITDOCDT`, f.`FACOMV`, f.`FABRAND`, f.`FACOLOR`, f.`FACILCAP`, f.`FAMFN`, f.`FAVHRN`, f.`FAVHTAXDT`, f.`FAVHRNTAXDT`, f.`FACRTFID`, f.`FACRTFDT`, f.`FALNDOWNST`, f.`FALENGTH`, f.`FAWIDTH`, f.`FAWIDE`, f.`FAASADDR`, kab.`DTDESC1` AS kabupaten, kec.`DTDESC1` AS kecamatan, desa.`DTDESC1` AS desa1, f.`FAMACHNID`
        FROM t4111 AS t4
        JOIN t1201 AS f ON t4.`ITICU` = f.`FAICU`
        JOIN t0021 AS g ON t4.`ITIDBUID` = g.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS h ON t4.`ITLOCID` = h.`LMLOCID`
        JOIN t0009 AS i ON t4.`ITMSTY` = i.`DTDC` AND i.`DTPC` = '20' AND i.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON t4.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON t4.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON t4.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE ITDOCNO = '$itdocno' AND ITFT = 'T'");

        return $query->result_array();
    }

    public function hapus_pengajuan_pinjam($itdocno){
        return $this->db->delete('t4111',array("ITDOCNO" => $itdocno));
    }

    public function Ubah_status($iticu) {
        $this->db->query("UPDATE t1201 SET FAPOST = '11' WHERE FAICU = '$iticu'");
    }

    public function getJabatan() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 from t0009 where DTPC='15' and DTSC='JP'");
        return $query->result_array();
    }

    public function getPimpinan() {
        $query = $this->db->query("SELECT ADIDANUM, ADNM FROM T0101 WHERE ADST = 'E'");
        return $query->result_array();
    }

    public function dataKonfirmasi($itdocno, $itidbuid) {
        $query = $this->db->query("SELECT t21.`BNDESB1`, t4.`ITIDBUID`, COUNT(t4.`ITDOCSQ`) AS total_berkas, 
        t4.`ITDOCNO`, t4.`ITDOCDT`, t1a.ADNM AS pimpinan, t09.`DTDESC1` AS jabatan, t21.`BNCC01`, t21.`BNCC02`
        FROM t0021 AS t21
        JOIN t4111 AS t4 ON t4.`ITIDBUID` = t21.`BNIDBUID`
        LEFT OUTER JOIN t0101 t1a ON t21.`BNCC01` = t1a.`ADIDANUM`
        LEFT OUTER JOIN t0009 t09 ON t21.`BNCC02` = t09.`DTIDDC` AND t09.DTPC='15' AND t09.DTSC='JP'
        WHERE t4.`ITIDBUID` = '$itidbuid' AND t4.`ITDOCNO` = '$itdocno' ORDER BY t4.`ITDOCNO`");

        return $query->result_array();
    }

    public function getAdnm($p) {
        $query = $this->db->query("SELECT ADNM FROM t0101 WHERE ADIDANUM = '$p'");

        return $query->row();
    }

    public function getDtdesc1($j) {
        $query = $this->db->query("SELECT DTDESC1 FROM t0009 WHERE DTIDDC = '$j'");

        return $query->row();
    }

    public function UbahKeDraft($icu, $status) {
        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function getStatusApprov() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130420'");

        return $query->row();
    }

    public function UbahKeApprov_t4111($itdocno, $status) {
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDTLU = CURRENT_TIMESTAMP WHERE ITDOCNO = '$itdocno'");
    }

    public function getIcu($itdocno) {
        $query = $this->db->query("SELECT ITICU FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITFT = 'T'");

        return $query->result_array();
    }

    public function UbahKeApprov_t1201($icu, $status) {
        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function getStatusVerifikasi() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130430'");

        return $query->row();
    }

    public function UbahKeVerifikasi_t4111($itdocno, $status) {
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDTLU = CURRENT_TIMESTAMP WHERE ITDOCNO = '$itdocno'");
    }

    public function UbahKeDraft_t4111($itdocno, $status) {
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDTLU = CURRENT_TIMESTAMP WHERE ITDOCNO = '$itdocno'");
    }

    public function UbahKeVerifikasi_t1201($icu, $status) {
        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function UbahKeDraft_t1201($icu, $status) {
        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function get_idbuid_locid_opd_to($icu) {
        $query = $this->db->query("SELECT ILIDBUID, ILLOCID FROM t41021 WHERE ILICU = '$icu' AND ILIDBUID != '16445'");

        return $query->row();
    }

    public function Berkas_keluar_t1201($icu, $status, $lokasi_bpkad, $idbuid_opd) {
        date_default_timezone_set('Asia/Jakarta');

        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FAALOC = '$lokasi_bpkad' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FAIDBUID = '$idbuid_opd' WHERE FAICU = '$icu'");
        $this->db->query("UPDATE t1201 SET FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function getStatusBerkasKeluar() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130470'");

        return $query->row();
    }

    public function UbahKeBerkasKeluar_t4111($itdocno, $status) {
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDTLU = CURRENT_TIMESTAMP WHERE ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDOCDT = CURRENT_TIMESTAMP WHERE ITDOCNO = '$itdocno' AND ITFT = 'T'");
    }

    public function UbahKeFinish_t1201($icu, $status) {
        $this->db->query("UPDATE t1201 SET FAPOST = '$status' WHERE FAICU = '$icu'");
    }

    public function get_t41021_from($icu) {
        $query = $this->db->query("SELECT * FROM t41021 WHERE ILICU = '$icu' AND ILIDBUID = '16445'");

        return $query->result_array();
    }

    public function get_t41021_to($icu) {
        $query = $this->db->query("SELECT * FROM t41021 WHERE ILICU = '$icu' AND ILIDBUID != '16445'");

        return $query->result_array();
    }

    public function Hapus_berkas_peminjaman($itdocno, $iticu){
        $this->db->delete('t4111', array("ITDOCNO" => $itdocno, "ITICU" => $iticu));
        $this->db->query("UPDATE t1201 SET FAPOST = '11' WHERE FAICU = '$iticu'");
    }

    public function get_data_peminjaman($itdocno_peminjaman) {
        // $query = $this->db->query("SELECT * FROM t4111 AS t4 WHERE t4.`ITDOCNO`='$itdocno_peminjaman' AND ITFT = 'T'");
        $query = $this->db->query("SELECT a.`ITCOID`, s.BNDESB1, a.`ITIDBUID`, a.`ITDOCNO`, a.`ITINUM`, e.`LMLOCID`, e.`LMDESA2`, 
        a.`ITDOCTY`, a.ITMSTY, a.ITCOMV, a.ITBRAND, a.ITCOLOR, a.ITCILCAP, a.`ITDOCSQ`, a.ITDESB2, a.ITICU,
        a.ITMFN, a.ITVHRN, a.ITVHTAXDT, a.ITVHRNTAXDT, a.ITCRTFID, a.ITCRTFDT, a.ITLNDOWNST, a.ITLENGTH, 
        a.ITMACHNID, a.ITWIDTH, a.ITWIDE, a.ITASADDR, a.ITCITY, a.ITDIST, a.ITSUBDIST,  c.`AMOBJ`, 
        d.`DTDESC1`, c.`AMDESB1`, a.`ITDESB1`, a.`ITDOCDT`, kab.`DTDESC1` AS 'kabkota', 
        kec.`DTDESC1` AS 'kecamatan', des.`DTDESC1` AS 'desa', a.`ITLOCID`
        FROM t4111 AS a
        JOIN t0021 AS s ON a.`ITIDBUID` = s.`BNIDBUID`
        JOIN t1201 AS b ON a.`ITICU` = b.`FAICU`
        JOIN t0901 AS c ON a.`ITINUM` = c.`AMOBJ`
        JOIN t0009 AS d ON a.`ITMSTY` = d.`DTDC`
        LEFT OUTER JOIN t4100 AS e ON a.`ITLOCID` = e.`LMLOCID`
        LEFT OUTER JOIN t0009 AS kab ON a.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON a.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS des ON a.`ITSUBDIST` = des.`DTDC` AND des.`DTPC` = '01' AND des.`DTSC` = 'SD' AND SUBSTRING(des.`DTDC`,1,8) = kec.`DTDC`
        WHERE d.`DTPC` = '20' AND d.`DTSC` = 'JB' AND a.`ITDOCNO` = '$itdocno_peminjaman' AND a.`ITIDBUID`='16445' ORDER BY a.ITDOCSQ DESC");

        return $query->result_array();
    }

    public function get_berkas_dipinjam() {
        // $query = $this->db->query("SELECT * 
        // FROM t4111 AS a
        // JOIN t1201 AS b ON a.`ITICU` = b.`FAICU`
        // WHERE a.`ITFT` = 'F' AND a.`ITIDBUID`= '16445' AND a.`ITPOST`= '7'");

        // $query = $this->db->query("SELECT *, c.`BNDESB1`, d.`DTDESC1` AS jenis_berkas, e.`DTDESC1` AS berkas_keluar, f.`DTDESC1` AS finish
        // FROM t4111 AS a
        // JOIN t1201 AS b ON a.`ITICU` = b.`FAICU`
        // JOIN t0021 AS c ON a.`ITIDBUID` = c.`BNIDBUID`
        // JOIN t0009 AS d ON a.`ITMSTY` = d.`DTDC` AND d.`DTPC` = '20' AND d.`DTSC` = 'JB'
        // LEFT OUTER JOIN t0009 AS e ON a.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130470'
        // LEFT OUTER JOIN t0009 as f ON a.`ITPOST` = f.`DTDC` AND f.`DTPC` = '00' AND f.`DTIDDC` = '130510'
        // WHERE a.`ITFT` = 'T' AND a.`ITIDBUID` != '16445' AND a.`ITPOST`= '7' ORDER BY a.`ITDTIN` DESC");

        $query = $this->db->query("SELECT t4.`ITPOST`, t4.`ITDOCNO`, t4.`ITIDBUID`, t4.`ITDOCDT`, t4.`ITICU`, i.`DTDESC1` AS jenis_berkas, t4.`ITINUM`, f.`FADTIN`, f.`FADTLU`,
        t4.`ITDESB1`, t4.`ITDESB2`, h.`LMDESA2`, f.`FACOMV`, t4.`ITBRAND`, t4.`ITCOLOR`, t4.`ITCILCAP`, t4.`ITMFN`, t4.`ITMACHNID`, f.`FAVHRN`,
        f.`FAVHTAXDT`, f.`FAVHRNTAXDT`, f.`FACRTFID`, f.`FACRTFDT`, f.`FALNDOWNST`, t4.`ITLENGTH`, t4.`ITWIDTH`, t4.`ITWIDE`, t4.`ITASADDR`,
        kab.`DTDESC1`AS kabupaten, kec.`DTDESC1` AS kecamatan, desa.`DTDESC1` AS desa1, f.`FADESB1`, f.`FAICU`, g.`BNDESB1`, t4.`ITMSTY`,
        t4.`ITICU`, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, 
        c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar, e.`DTDESC1` AS finish
        FROM t4111 AS t4
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        LEFT OUTER JOIN t0009 AS e ON t4.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130510'
        JOIN t1201 AS f ON t4.`ITICU` = f.`FAICU`
        JOIN t0021 AS g ON t4.`ITIDBUID` = g.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS h ON t4.`ITLOCID` = h.`LMLOCID`
        JOIN t0009 AS i ON t4.`ITMSTY` = i.`DTDC` AND i.`DTPC` = '20' AND i.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON t4.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON t4.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON t4.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE t4.`ITFT` = 'T' AND t4.`ITIDBUID` != '16445' AND t4.`ITPOST` = '7' ORDER BY t4.`ITDTIN` DESC");

        return $query->result_array();
    }

    public function get_berkas_dipinjam_history() {
        $query = $this->db->query("SELECT t4.`ITPOST`, t4.`ITDOCNO`, t4.`ITIDBUID`, t4.`ITDOCDT`, t4.`ITICU`, i.`DTDESC1` AS jenis_berkas, t4.`ITINUM`, f.`FADTIN`, f.`FADTLU`, t4.`ITDTLU`,
        t4.`ITDESB1`, t4.`ITDESB2`, h.`LMDESA2`, f.`FACOMV`, t4.`ITBRAND`, t4.`ITCOLOR`, t4.`ITCILCAP`, t4.`ITMFN`, t4.`ITMACHNID`, f.`FAVHRN`,
        f.`FAVHTAXDT`, f.`FAVHRNTAXDT`, f.`FACRTFID`, f.`FACRTFDT`, f.`FALNDOWNST`, t4.`ITLENGTH`, t4.`ITWIDTH`, t4.`ITWIDE`, t4.`ITASADDR`,
        kab.`DTDESC1`AS kabupaten, kec.`DTDESC1` AS kecamatan, desa.`DTDESC1` AS desa1, f.`FADESB1`, f.`FAICU`, g.`BNDESB1`, t4.`ITMSTY`,
        t4.`ITICU`, t9.`DTDESC1` AS draft, a.`DTDESC1` AS pengajuan, b.`DTDESC1` AS verifikasi, 
        c.`DTDESC1` AS finish, d.`DTDESC1` AS berkas_keluar, e.`DTDESC1` AS finish
        FROM t4111 AS t4
        LEFT OUTER JOIN t0009 AS t9 ON t4.`ITPOST` = t9.`DTDC` AND t9.`DTPC` = '00' AND t9.`DTIDDC` = '130400'
        LEFT OUTER JOIN t0009 AS a ON t4.`ITPOST` = a.`DTDC` AND a.`DTPC` = '00' AND a.`DTIDDC` = '130420'
        LEFT OUTER JOIN t0009 AS b ON t4.`ITPOST` = b.`DTDC` AND b.`DTPC` = '00' AND b.`DTIDDC` = '130430'
        LEFT OUTER JOIN t0009 AS c ON t4.`ITPOST` = c.`DTDC` AND c.`DTPC` = '00' AND c.`DTIDDC` = '130510'
        LEFT OUTER JOIN t0009 AS d ON t4.`ITPOST` = d.`DTDC` AND d.`DTPC` = '00' AND d.`DTIDDC` = '130470'
        LEFT OUTER JOIN t0009 AS e ON t4.`ITPOST` = e.`DTDC` AND e.`DTPC` = '00' AND e.`DTIDDC` = '130510'
        JOIN t1201 AS f ON t4.`ITICU` = f.`FAICU`
        JOIN t0021 AS g ON t4.`ITIDBUID` = g.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS h ON t4.`ITLOCID` = h.`LMLOCID`
        JOIN t0009 AS i ON t4.`ITMSTY` = i.`DTDC` AND i.`DTPC` = '20' AND i.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON t4.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON t4.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON t4.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE t4.`ITFT` = 'T' AND t4.`ITIDBUID` != '16445' AND t4.`ITPOST` IN(7,11) ORDER BY t4.`ITPOST` DESC");

        return $query->result_array();
    }

    public function data_perubahan_pengembalian($icu) {
        // $query = $this->db->query("SELECT *
        // FROM t4111 AS a
        // JOIN t1201 AS b ON a.`ITICU` = b.`FAICU`
        // JOIN t4312 AS c ON a.`ITICU` = c.`OVICU`
        // WHERE a.`ITFT` = 'F' AND a.`ITIDBUID`= '16445' AND a.`ITPOST`= '7' AND b.`FAICU`='$icu'");
        $query = $this->db->query("SELECT c.`OVMSTY`, b.`FAICU`, d.`BNDESB1`, a.`ITDOCNO`, b.`FACOID`, b.`FAIDBUID`, b.`FAAOBJ`, b.`FAALOC`, e.`LMDESA2`, c.`OVMSTY`, f.`DTDESC1` AS jenis_berkas, b.`FADESB1`, b.`FACOMV`, b.`FABRAND`, b.`FACOLOR`, b.`FACILCAP`, b.`FAMFN`, b.`FAMACHNID`, b.`FAVHRN`, b.`FAVHTAXDT`, b.`FAVHRNTAXDT`, b.`FACRTFID`, b.`FACRTFDT`, b.`FALNDOWNST`, b.`FALENGTH`, b.`FAWIDTH`, b.`FAWIDE`, b.`FAASADDR`, b.`FACITY`, kab.`DTDESC1` AS kabupaten, b.`FADIST`, kec.`DTDESC1` AS kecamatan, b.`FASUBDIST`, desa.`DTDESC1` AS desa1
        FROM t4111 AS a
        JOIN t1201 AS b ON a.`ITICU` = b.`FAICU`
        JOIN t4312 AS c ON a.`ITICU` = c.`OVICU`
        JOIN t0021 AS d ON a.`ITIDBUID` = d.`BNIDBUID`
        LEFT OUTER JOIN t4100 AS e ON a.`ITLOCID` = e.`LMLOCID`
        JOIN t0009 AS f ON a.`ITMSTY` = f.`DTDC` AND f.`DTPC` = '20' AND f.`DTSC` = 'JB'
        LEFT OUTER JOIN t0009 AS kab ON a.`ITCITY` = kab.`DTDC` AND kab.`DTPC` = '01' AND kab.`DTSC` = 'CY' AND kab.`DTDC` IN ('35.76','35.16')
        LEFT OUTER JOIN t0009 AS kec ON a.`ITDIST` = kec.`DTDC` AND kec.`DTPC` = '01' AND kec.`DTSC` = 'DT' AND SUBSTRING(kec.`DTDC`,1,5) = kab.`DTDC`
        LEFT OUTER JOIN t0009 AS desa ON a.`ITSUBDIST` = desa.`DTDC` AND desa.`DTPC` = '01' AND desa.`DTSC` = 'SD' AND SUBSTRING(desa.`DTDC`,1,8) = kec.`DTDC`
        WHERE a.`ITFT` = 'T' AND a.`ITIDBUID` != '16445' AND a.`ITPOST` = '7' AND b.`FAICU` = '$icu'");

        return $query->row_array();
    }

    public function data_t4111($itdocno, $icu) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITDOCNO = '$itdocno' AND ITFT = 'T' AND ITICU = '$icu'");

        return $query->result_array();
    }

    public function getStatusFinish() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTIDDC = '130510'");

        return $query->row();
    }

    public function update_doc_peminjaman_finish($itdocno, $icu, $status) {
        $this->db->query("UPDATE t4111 SET ITPOST = '$status' WHERE ITICU = '$icu' AND ITDOCNO = '$itdocno'");
        $this->db->query("UPDATE t4111 SET ITDTLU = CURRENT_TIMESTAMP WHERE ITICU = '$icu' AND ITDOCNO = '$itdocno'");
    }

    public function update_pengembalian_t1201($icu, $status, $idbuid_bpkad, $locid_bpkad) {
        $this->db->query("UPDATE t1201 SET FAIDBUID = '$idbuid_bpkad', FAALOC = '$locid_bpkad', FAPOST = '$status', FADTLU = CURRENT_TIMESTAMP WHERE FAICU = '$icu'");
    }

    public function update_pengembalian_t41021($icu) {
        $ilpqoh_opd = "0.00000";
        $ilpqoh_bpkad = "1.00000";
        $this->db->query("UPDATE t41021 SET ILPQOH = '$ilpqoh_opd', ILDTLU = CURRENT_TIMESTAMP WHERE ILICU = '$icu' AND ILIDBUID != '16445'");
        $this->db->query("UPDATE t41021 SET ILPQOH = '$ilpqoh_bpkad', ILDTLU = CURRENT_TIMESTAMP WHERE ILICU = '$icu' AND ILIDBUID = '16445'");
    }

    public function cek_perubahan_data($icu) {
        $query=$this->db->query("SELECT * FROM t1201 AS a JOIN t4312 AS b ON a.`FAICU` = b.`OVICU` WHERE FAICU = '$icu'");

        return $query->row();
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

    public function get_data_not_in_t1201($icu) {
        $query = $this->db->query("SELECT * FROM t4312 WHERE OVICU = '$icu'");

        return $query->row();
    }

    public function data_perubahan_from($icu) {
        $query = $this->db->query("SELECT * FROM t1201 WHERE FAICU = '$icu'");

        return $query->result_array();
    }
    













    

    

    public function data_peminjaman($itdocno_peminjaman) {
        $query = $this->db->query("SELECT * FROM t4111 AS t4 WHERE t4.`ITDOCNO`='$itdocno_peminjaman' AND ITFT = 'T'");

        return $query->row_array();
    }

    public function get_bpkb_from_t4111($ilidbuid, $ilmanage, $ilidinum, $ilinum, $ilvhrn) {
        $query = $this->db->query("SELECT * FROM t4111 WHERE ITIDBUID = '$ilidbuid' AND ITMANAGE = '$ilmanage' AND ITIDINUM = '$ilidinum' AND ITINUM = '$ilinum' AND ITVHRN = '$ilvhrn' ORDER BY ITDTIN DESC LIMIT 1");

        return $query->row();
    }

    public function get_bpkb_from_t41021($ilidbuid, $ilmanage, $ilidinum, $ilinum, $ilvhrn) {
        $query = $this->db->query("SELECT * FROM t41021 WHERE ILIDBUID = '$ilidbuid' AND ILMANAGE = '$ilmanage' AND ILIDINUM = '$ilidinum' AND ILINUM = '$ilinum' AND ILVHRN = '$ilvhrn' ORDER BY ILDTIN DESC LIMIT 1");

        return $query->result_array();
    }

    public function getBerkasBPKAD() {
        $query = $this->db->query("SELECT a.`ILINUM`, b.`ITDESB1`
        FROM t41021 AS a
        JOIN t4111 AS b ON a.`ILIDBUID` = b.`ITIDBUID`
        WHERE ILIDBUID = '16445' AND ILPQOH = '1.00000'");

        return $query->result_array();
    }

    public function getJenisBerkas() {
        $query = $this->db->query("SELECT DTDC, DTIDDC, DTDESC1 FROM t0009 WHERE DTPC='20' AND DTSC='JB'");
        return $query->result_array();
    }

    public function getKecamatan($dtdc) {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='DT' AND SUBSTRING(DTDC, 1, 5) = $dtdc");
        return $query->result_array();
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

    public function getDesa($dtdc1) {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='SD' AND SUBSTRING(DTDC, 1, 8) = '$dtdc1'");
        return $query->result_array();
    }

    public function getLokasi($idbuid) {
        $query = $this->db->query("SELECT LMIDBUID, LMLOCID, LMDESA1, LMDESA2
        FROM t4100
        WHERE LMIDBUID = '$idbuid'");

        return $query->result_array();
    }

    public function getDataBerkasBaru($ilmanage, $ilidinum) {
        $query = $this->db->query("SELECT * FROM t4312 WHERE OVMANAGE = '$ilmanage' AND OVIDINUM = '$ilidinum' LIMIT 1");

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
        // $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$itdocno' AND OVDOCSQ = '$itdocsq'");
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
        // $this->db->query("UPDATE t4312 SET OVPOST = '$status' WHERE OVDOCNO = '$itdocono' AND OVDOCSQ = '$itdocosq'");
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

    public function getKabKota() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='CY' AND DTDC IN ('35.76','35.16')");
        return $query->result_array();
    }

}

/* End of file PinjamBerkas_model.php */

?>