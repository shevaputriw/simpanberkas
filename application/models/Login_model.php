<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getLevel() {
        $query = $this->db->query("SELECT DTDESC1 FROM t0009 WHERE DTPC = '00' AND DTSC = 'UG'");

        return $query->result_array();
    }

    public function cek_login($level, $username, $password) {
        $query = $this->db->query("SELECT * FROM t9801 WHERE SCUSI = '$username' AND SCUSC = '$password' AND SCUSG = '$level' AND SCDVS IS NULL");

        return $query;
    }

}

/* End of file Login_model.php */

?>