<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class MasterLokasi_model extends CI_Model {

    public function getOpd() {
        $this->db->select('*');
        $this->db->from('t0021');

        $query = $this->db->get();
        return $query->result_array();
    }

    public function getKode() {
        $query = $this->db->query("SELECT * FROM t0020 WHERE CNCOID='16'");
        return $query->row();
    }

    public function getBuid($idbuid) {
        $query = $this->db->query("SELECT BNBUID FROM t0021 WHERE BNIDBUID = '$idbuid'");
        return $query->row();
    }

    public function getDesb1($idbuid) {
        $query = $this->db->query("SELECT BNDESB1 FROM t0021 WHERE BNIDBUID = '$idbuid'");
        return $query->row();
    }

    public function getAllData() {
        $query = $this->db->query("SELECT t2.`BNDESB1`, t4.`LMIDBUID`, t4.`LMWHC`, t4.`LMAISLE`, t4.`LMROW`, t4.`LMCOL`, t4.`LMLOCID`, t4.`LMDESA2`, t4.`LMCOID`
        FROM t4100 AS t4
        JOIN t0021 AS t2 ON t4.`LMIDBUID` = t2.`BNIDBUID`");
        
        return $query->result_array();
    }

    // public function getLokasiById($lmidbuid, $lmlocid) {
    //     $query = $this->db->query("SELECT t2.`BNDESB1`, t4.`LMIDBUID`, t4.`LMWHC`, t4.`LMAISLE`, t4.`LMROW`, t4.`LMCOL`, t4.`LMLOCID`
    //     FROM t4100 AS t4
    //     JOIN t0021 AS t2 ON t4.`LMIDBUID` = t2.`BNIDBUID`
    //     WHERE t4.`LMIDBUID` = '$lmidbuid' AND t4.`LMLOCID` = '$lmlocid'");

    //     return $query->result_array();
    // }

    public function Tambah_Lokasi($lmbuid, $lmdesa1) {
        date_default_timezone_set('Asia/Jakarta');
        $lmstatus = "P";
        $ip = $_SERVER['REMOTE_ADDR'];

        $data = [
            "LMCOID" => $this->input->post('LMCOID', true),
            "LMIDBUID" => $this->input->post('LMIDBUID', true),
            "LMBUID" => $lmbuid,
            "LMWHC" => $this->input->post('LMWHC', true),
            "LMLOCID" => $this->input->post('LMWHC', true),
            "LMAISLE" => $this->input->post('LMAISLE', true),
            "LMROW" => $this->input->post('LMROW', true),
            "LMCOL" => $this->input->post('LMCOL', true),
            "LMDESA1" => $lmdesa1,
            "LMDESA2" => $this->input->post('LMDESA2', true),
            "LMSTATUS" => $lmstatus,
            "LMDTIN" => date('Y-m-d H:i:s', time()),
            "LMDTLU" => date('Y-m-d H:i:s', time()),
            "LIPUID" => $ip,
            "LIPUIDM" => $ip,
        ];

        $this->db->insert('t4100', $data);
    }

    public function Hapus_Lokasi($lmidbuid, $lmlocid){
        return $this->db->delete('t4100',array("LMIDBUID" => $lmidbuid, "LMLOCID" => $lmlocid));
    }

    public function Edit_Lokasi($lmidbuid, $lmbuid, $lmdesa1, $lmlocid) {
        date_default_timezone_set('Asia/Jakarta');
        $lmstatus = "P";
        $ip = $_SERVER['REMOTE_ADDR'];
        $post=$this->input->post();

        $data = [
            "LMCOID" => $this->input->post('LMCOID', true),
            "LMIDBUID" => $lmidbuid,
            "LMBUID" => $lmbuid,
            "LMWHC" => $this->input->post('LMWHC', true),
            "LMLOCID" => $this->input->post('LMWHC', true),
            "LMAISLE" => $this->input->post('LMAISLE', true),
            "LMROW" => $this->input->post('LMROW', true),
            "LMCOL" => $this->input->post('LMCOL', true),
            "LMDESA1" => $lmdesa1,
            "LMDESA2" => $this->input->post('LMDESA2', true),
            "LMSTATUS" => $lmstatus,
            "LMDTLU" => date('Y-m-d H:i:s', time()),
            "LIPUIDM" => $ip,
        ];

        $this->db->update('t4100', $data, array('LMIDBUID' => $lmidbuid,'LMLOCID' => $lmlocid));
    }

}

/* End of file MasterLokasi_model.php */

?>