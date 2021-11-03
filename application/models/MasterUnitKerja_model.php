<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterUnitKerja_model extends CI_Model {

    public function getUnitKerja() {
        $this->db->select('*');
        $this->db->from('t0020');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function Tambah_unit() {
        date_default_timezone_set('Asia/Jakarta');

        $data = [
            "CNCOID" => $this->input->post('CNCOID', true),
            "CNCFY" => $this->input->post('CNCFY', true),
            "CNDESB1" => $this->input->post('CNDESB1', true),
            "CNCAP" => $this->input->post('CNCAP', true),
            "CNDTIN" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0020', $data);
    }

    public function getUnitbyId($cncoid) {
        $query=$this->db->get_where('t0020',array('CNCOID'=>$cncoid));

        return $query->row_array();
    }

    public function Edit_unit($cncoid){
        date_default_timezone_set('Asia/Jakarta');
        $post=$this->input->post();

        $this->CNCOID = $post["CNCOID"];
        $this->CNCFY = $post["CNCFY"];
        $this->CNCAP = $post["CNCAP"];
        $this->CNDTLU = date('Y-m-d H:i:s', time());
        
        $this->db->update('t0020',$this, array('CNCOID' => $post['CNCOID']));
    }

    public function Hapus_unit($cncoid){
        return $this->db->delete('t0020',array("CNCOID"=>$cncoid));
    }

    public function getKode() {
        $query = $this->db->query("SELECT * FROM t0020 WHERE CNCOID='16'");
        return $query->row();
    }

    public function getOpd() {
        $query = $this->db->query("SELECT t21.BNIDBUID, t21.BNBUID, t21.BNBUID1, ta.BNDESB1 AS relasi_opd, t09.DTDESC1 AS tipe, t21.`BNDESB1`, t21.`BNCC01`, 
        t0.`ADNM` AS pimpinan, t21.`BNCC02`, t9.`DTDESC1` 
        AS jabatan, t21.`BNCC03`, t01.`ADNM` AS pengurus_barang, t21.`BNBUTY`, t09.`DTDESC1`, t09.`DTDC`
        FROM t0021 AS t21 
        LEFT OUTER JOIN t0101 AS t0 ON t0.`ADIDANUM` = t21.`BNCC01` AND t0.`ADST` = 'E'
        LEFT OUTER JOIN t0101 AS t01 ON t01.`ADIDANUM` = t21.`BNCC03` 
        LEFT OUTER JOIN t0009 AS t9 ON t9.`DTIDDC` = t21.`BNCC02`
        LEFT OUTER JOIN t0009 AS t09 ON t09.`DTDC` = t21.`BNBUTY` AND t09.`DTPC` = '00' AND t09.`DTSC` = 'BT'
        LEFT OUTER JOIN t0021 AS ta ON t21.BNBUID1 = ta.`BNIDBUID`");
        // return $query->result_array();

        // $query = $this->db->query("SELECT t21.BNIDBUID, t21.BNBUID, t21.BNBUID1, ta.BNDESB1 AS relasi_opd, t09.DTDESC1 AS tipe, t21.`BNDESB1`, t21.`BNCC01`, t0.`ADNM` AS pimpinan, t21.`BNCC02`, t9.`DTDESC1` 
        // AS jabatan, t21.`BNCC03`, t01.`ADNM` AS pengurus_barang, t21.`BNBUTY`, t09.`DTDESC1`, t09.`DTDC`
        // FROM t0021 AS t21 LEFT OUTER JOIN t0101 AS t0 ON t0.`ADIDANUM` = t21.`BNCC01` LEFT OUTER JOIN t0101 AS t01 ON t01.`ADIDANUM` = t21.`BNCC03` 
        // LEFT OUTER JOIN t0009 AS t9 ON t9.`DTIDDC` = t21.`BNCC02` LEFT OUTER JOIN t0009 AS t09 ON t09.`DTDC` = t21.`BNBUTY`
        // LEFT OUTER JOIN t0021 AS ta ON t21.BNBUID1 = ta.`BNIDBUID`
        // WHERE t09.`DTPC` = '00' AND t09.`DTSC` = 'BT' AND t0.`ADST` = 'E'");

        return $query->result_array();
    }

    public function TipeUnitKerja() {
        $query = $this->db->query("SELECT DTDC, DTDESC1 FROM t0009 WHERE DTPC='00' AND DTSC='BT'");
        return $query->result_array();
    }

    public function GetRelasi() {
        $query = $this->db->query("SELECT BNIDBUID, BNDESB1 FROM t0021 WHERE BNFMOD = 'C'");
        return $query->result_array();
    }

    public function GetPimpinan() {
        $query = $this->db->query("SELECT ADIDANUM, ADNM FROM T0101 WHERE ADST = 'E'");
        return $query->result_array();
    }

    public function getJabatan() {
        $query = $this->db->query("SELECT DTIDDC, DTDC, DTDESC1 from t0009 where DTPC='15' and DTSC='JP'");
        return $query->result_array();
    }

    public function getPengurusBarang() {
        $query = $this->db->query("SELECT ADIDANUM, ADNM FROM T0101 WHERE ADST = 'E'");
        return $query->result_array();
    }

    public function Tambah_opd($bnidbuid) {
        $bnuid = "admin1";
        $bnuidm = "admin1";
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "BNIDBUID" => $bnidbuid,
            "BNBUID" => $this->input->post('BNBUID', true),
            "BNDESB1" => $this->input->post('BNDESB1', true),
            "BNBUTY" => $this->input->post('BNBUTY', true),
            "BNCOID" => 16,
            "BNBUID1" => $this->input->post('BNBUID1', true),
            "BNCC01" => $this->input->post('BNCC01', true),
            "BNCC02" => $this->input->post('BNCC02', true),
            "BNCC03" => $this->input->post('BNCC03', true),
            "BNUID" => $bnuid,
            "BNUIDM" => $bnuidm,
            "BNIPUID" => $ip,
            "BNIPUIDM" => $ip,
            "BNDTIN" => date('Y-m-d H:i:s', time()),
            "BNDTLU" => date('Y-m-d H:i:s', time()),
            "BNEDTF" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0021', $data);
    }

    public function GetOpdById($bnidbuid) {
        $query=$this->db->get_where('t0021',array('BNIDBUID' => $bnidbuid));

        return $query->row_array();
    }

    public function Edit_OPD($bnidbuid) {
        date_default_timezone_set('Asia/Jakarta');
        $bnuid = "admin1";
        $bnuidm = "admin1";
        $ip = $_SERVER['REMOTE_ADDR'];
        $post=$this->input->post();

        $this->BNBUID = $post["BNBUID"];
        $this->BNDESB1 = $post["BNDESB1"];
        $this->BNBUTY = $post["BNBUTY"];
        $this->BNBUID1 = $post["BNBUID1"];
        $this->BNCC01 = $post["BNCC01"];
        $this->BNCC02 = $post["BNCC02"];
        $this->BNCC03 = $post["BNCC03"];
        $this->BNIPUIDM = $ip;
        $this->BNDTLU = date('Y-m-d H:i:s', time());
        
        $this->db->update('t0021',$this, array('BNIDBUID' => $bnidbuid));
    }

    public function Hapus_OPD($bnidbuid){
        return $this->db->delete('t0021',array("BNIDBUID" => $bnidbuid));
    }

    public function Detail_OPD() {
        $query = $this->db->query("SELECT t21.BNIDBUID, t21.BNBUID, t21.BNBUID1, ta.BNDESB1 AS relasi_opd, t09.DTDESC1 AS tipe, t21.`BNDESB1`, t21.`BNCC01`, 
        t0.`ADNM` AS pimpinan, t21.`BNCC02`, t9.`DTDESC1` 
        AS jabatan, t21.`BNCC03`, t01.`ADNM` AS pengurus_barang, t21.`BNBUTY`, t09.`DTDESC1`, t09.`DTDC`
        FROM t0021 AS t21 
        LEFT OUTER JOIN t0101 AS t0 ON t0.`ADIDANUM` = t21.`BNCC01` AND t0.`ADST` = 'E'
        LEFT OUTER JOIN t0101 AS t01 ON t01.`ADIDANUM` = t21.`BNCC03` 
        LEFT OUTER JOIN t0009 AS t9 ON t9.`DTIDDC` = t21.`BNCC02`
        LEFT OUTER JOIN t0009 AS t09 ON t09.`DTDC` = t21.`BNBUTY` AND t09.`DTPC` = '00' AND t09.`DTSC` = 'BT'
        LEFT OUTER JOIN t0021 AS ta ON t21.BNBUID1 = ta.`BNIDBUID`");
        return $query->result_array();
    }

}

/* End of file MasterUnitKerja_model.php */

?>