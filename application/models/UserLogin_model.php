<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserLogin_model extends CI_Model {

    public function getAll_user() {
        $query = $this->db->query("SELECT * FROM t9801 AS a JOIN t0021 AS b ON a.`SCIDBUID` = b.`BNIDBUID`
        WHERE a.`SCDVS` IS NULL ORDER BY SCDTIN DESC");

        return $query->result_array();
    }

    public function getKode() {
        $query = $this->db->query("SELECT * FROM t0020 WHERE CNCOID='16'");
        return $query->row();
    }

    public function getOpd() {
        $query = $this->db->query("SELECT * FROM t0021 WHERE BNDVS <> 'V' OR BNDVS IS NULL");

        return $query->result_array();
    }

    public function getHakAkses() {
        $query = $this->db->query("SELECT * FROM t0009 WHERE DTPC = '00' AND DTSC = 'UG'");

        return $query->result_array();
    }

    public function get_nama_opd($bndesb1) {
        $query = $this->db->query("SELECT BNIDBUID, BNDESB1 FROM t0021 WHERE BNIDBUID = '$bndesb1'");

        return $query->row();
    }

    public function cek_user($bndesb1) {
        $query = $this->db->query("SELECT SCIDBUID FROM t9801 WHERE SCIDBUID = '$bndesb1'");
        return $query;

        if($query->num_rows() > 0)
            return 1;
        else
            return 0;
    }

    public function get_sequence($bndesb1) {
        $query = $this->db->query("SELECT * FROM t9801 WHERE SCIDBUID = '$bndesb1' ORDER BY SCSEQ DESC LIMIT 1");

        return $query->row();
    }

    public function Hapus_user($scidbuid, $scseq){
        $uid = $this->session->userdata('SCUSI');

        $this->db->query("UPDATE t9801 SET SCDVS = 'V', SCUIDM = '$uid', SCDTLU = CURRENT_TIMESTAMP WHERE SCIDBUID = '$scidbuid' AND SCSEQ = '$scseq'");
    }

}

/* End of file UserLogin_model.php */

?>