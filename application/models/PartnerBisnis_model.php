<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PartnerBisnis_model extends CI_Model {

    public function getTipe() {
        $query = $this->db->query("SELECT DTDC, DTDESC1 FROM t0009 WHERE DTPC='01' AND DTSC='ST'");
        return $query->result_array();
    }

    public function getPimpinan() {
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

    public function Cek_tahun($tahun) {
        $query=$this->db->query("SELECT * FROM t0002 WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD' LIMIT 1");
        return $query;  

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function Get($tahun) {
        $query=$this->db->query("SELECT NNYR, NNSEQ FROM t0002 WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD' ORDER BY NNDTIN DESC LIMIT 1");
        return $query->result_array();
    }

    public function Get_tahun($tahun) {
        $query=$this->db->query("SELECT NNYR FROM t0002 WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD' ORDER BY NNDTIN DESC LIMIT 1");
        return $query->row();
    }

    public function getTahunBulan() {
        $query=$this->db->query("SELECT CNCFY, CNCAP FROM t0020 WHERE CNCOID = '16'");

        return $query->row();
    }

    public function Update($tahun) {
        $ip = $_SERVER['REMOTE_ADDR'];
        date_default_timezone_set('Asia/Jakarta');
        $nndtlu = date('Y-m-d H:i:s', time());

        $this->db->query("UPDATE t0002 SET NNSEQ = NNSEQ + 1 WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD'");
        $this->db->query("UPDATE t0002 SET NNIPUIDM = '$ip' WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD'");
        $this->db->query("UPDATE t0002 SET NNDTLU = '$nndtlu' WHERE NNYR = '$tahun' AND NNDOCBTY = 'AD'");
    }

    public function Tambah_t0002($tahun) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "NNCOID" => 16,
            "NNBUID" => 0,
            "NNDOCBTY" => "AD",
            "NNYR" => $tahun,
            "NNRSAT" => 1,
            "NNSEQ" => 0,
            "NNRSMT" => "CY",
            "NNINYR" => "Y",
            "NNIPUID" => $ip,
            "NNIPUIDM" => $ip,
            "NNDTIN" => date('Y-m-d H:i:s', time()),
            "NNDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0002', $data);
    }

    public function Tambah_PartnerBisnis($x) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "ADCOID" => 16,
            "ADIDANUM" => $x,
            "ADANUM" => $this->input->post('ADANUM', true),
            "ADNM" => $this->input->post('ADNM', true),
            "ADST" => $this->input->post('ADST', true),
            "ADPAN" => $this->input->post('ADPAN', true),
            "ADADDR" => $this->input->post('ADADDR', true),
            "ADEMAIL" => $this->input->post('ADEMAIL', true),
            "ADPHNO1" => $this->input->post('ADPHNO1', true),
            "ADTAXID" => $this->input->post('ADTAXID', true),
            "ADAP" => $this->input->post('ADAP', true),
            "ADAR" => $this->input->post('ADAR', true),
            "ADEMPL" => $this->input->post('ADEMPL', true),
            "ADCC01" => $this->input->post('ADCC01', true),
            "ADCC02" => $this->input->post('ADCC02', true),
            "ADCC03" => $this->input->post('ADCC03', true),
            "ADIPUID" => $ip,
            "ADIPUIDM" => $ip,
            "ADDTIN" => date('Y-m-d H:i:s', time()),
            "ADDTLU" => date('Y-m-d H:i:s', time())
        ];

        $this->db->insert('t0101', $data);
    }

    public function Update_adidanum($adidanum) {
        $this->db->query("UPDATE t0101 SET ADIDANUM = ADIDANUM + 1 WHERE ADIDANUM = '$adidanum'");
    }

    public function Get_t0101() {
        $query = $this->db->query("SELECT t1.ADIDANUM, t1.ADANUM, t1.ADNM, t9.DTDC, t9.DTDESC1 AS tipe, t1.ADPAN, t1.`ADADDR`, t1.`ADEMAIL`, t1.`ADPHNO1`, t1.`ADTAXID`, 
        t1.ADCC01, t1.ADCC02, t1.ADCC03, t1.`ADAP`, t1.`ADAR`, t1.`ADEMPL`, t1a.ADNM AS pimpinan, t09.`DTDESC1` AS jabatan, t3a.ADNM AS pengurus_barang
        FROM t0101 AS t1 
        LEFT OUTER JOIN t0009 AS t9 ON t9.`DTDC` = t1.`ADST`
        LEFT OUTER JOIN t0101 t1a ON t1.ADCC01 = t1a.ADIDANUM 
        LEFT OUTER JOIN t0101 t3a ON t1.ADCC03 = t3a.ADIDANUM 
        LEFT OUTER JOIN t0009 t09 ON t1.`ADCC02` = t09.`DTIDDC` AND t09.DTPC='15' AND t09.DTSC='JP'
        WHERE t9.`DTPC` = '01' AND t9.`DTSC` = 'ST'");
        // $query = $this->db->query("SELECT t1.ADIDANUM, t1.ADANUM, t1.ADNM, t9.DTDC, t9.DTDESC1 AS tipe, t1.ADPAN, t1.`ADADDR`, t1.`ADEMAIL`, t1.`ADPHNO1`, t1.`ADTAXID`, t1.ADCC01, t1.ADCC02, t1.ADCC03, 
        // t1.`ADAP`, t1.`ADAR`, t1.`ADEMPL`, t1a.ADNM AS pimpinan, t09.`DTDESC1` AS jabatan, t3a.ADNM AS pengurus_barang
        // FROM t0101 AS t1 JOIN t0009 AS t9 ON t9.`DTDC` = t1.`ADST` 
        // JOIN t0101 t1a ON t1.ADCC01 = t1a.ADIDANUM JOIN t0101 t3a ON t1.ADCC03 = t3a.ADIDANUM 
        // JOIN t0009 t09 ON t1.`ADCC02` = t09.`DTIDDC`
        // WHERE t9.`DTPC` = '01' AND t9.`DTSC` = 'ST' AND t09.DTPC='15' AND t09.DTSC='JP'");

        return $query->result_array();
    }

    public function GetPartnerById($adidanum) {
        // $query=$this->db->get_where('t0101',array('ADIDANUM'=>$adidanum));
        // return $query->row_array();

        // $query = $this->db->query("SELECT * FROM t0101 AS t1 JOIN t0009 AS t9 ON t9.`DTDC` = t1.`ADST` WHERE t9.`DTPC` = '01' AND t9.`DTSC` = 'ST' AND t1.`ADIDANUM` = $adidanum");

        $query = $this->db->query("SELECT t1.ADIDANUM, t1.ADANUM, t1.ADNM, t9.DTDC, t9.DTDESC1 AS tipe, t1.ADPAN, t1.`ADADDR`, t1.`ADEMAIL`, t1.`ADPHNO1`, t1.`ADTAXID`, t1.ADCC01, t1.ADCC02, t1.ADCC03, 
        t1.`ADAP`, t1.`ADAR`, t1.`ADEMPL`, t1a.ADNM AS pimpinan, t09.`DTDESC1` AS jabatan, t3a.ADNM AS pengurus_barang
        FROM t0101 AS t1 
        LEFT OUTER JOIN t0009 AS t9 ON t9.`DTDC` = t1.`ADST`
        LEFT OUTER JOIN t0101 t1a ON t1.ADCC01 = t1a.ADIDANUM 
        LEFT OUTER JOIN t0101 t3a ON t1.ADCC03 = t3a.ADIDANUM 
        LEFT OUTER JOIN t0009 t09 ON t1.`ADCC02` = t09.`DTIDDC` AND t09.DTPC='15' AND t09.DTSC='JP'
        WHERE t9.`DTPC` = '01' AND t9.`DTSC` = 'ST' AND t1.`ADIDANUM` = $adidanum");
        return $query->row_array();
    }

    public function Edit_PartnerBisnis($adidanum) {
        date_default_timezone_set('Asia/Jakarta');
        $ip = $_SERVER['REMOTE_ADDR'];
        $post=$this->input->post();

        $this->ADANUM = $post["ADANUM"];
        $this->ADNM = $post["ADNM"];
        $this->ADST = $post["ADST"];
        $this->ADPAN = $post["ADPAN"];
        $this->ADADDR = $post["ADADDR"];
        $this->ADEMAIL = $post["ADEMAIL"];
        $this->ADPHNO1 = $post["ADPHNO1"];
        $this->ADTAXID = $post["ADTAXID"];
        $this->ADCC01 = $post["ADCC01"];
        $this->ADCC02 = $post["ADCC02"];
        $this->ADCC03 = $post["ADCC03"];
        $this->ADAP = $post["ADAP"];
        $this->ADAR = $post["ADAR"];
        $this->ADEMPL = $post["ADEMPL"];
        $this->ADIPUIDM = $ip;
        $this->ADDTLU = date('Y-m-d H:i:s', time());
        
        $this->db->update('t0101',$this, array('ADIDANUM' => $post['ADIDANUM']));
    }

    public function Hapus_PartnerBisnis($adidanum){
        return $this->db->delete('t0101',array("ADIDANUM" => $adidanum));
    }

}

/* End of file PartnerBisnis_model.php */

?>