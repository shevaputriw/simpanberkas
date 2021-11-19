<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function getLevel() {
        $query = $this->db->query("SELECT level FROM USER");

        return $query->result_array();
    }

    public function cek_login($level, $username, $password) {
        $query = $this->db->query("SELECT * FROM USER WHERE username = '$username' AND password = '$password' AND level = '$level'");

        return $query;
    }

    public function Update_last_login($level, $username, $password)
	{
        date_default_timezone_set('Asia/Jakarta');

		$data = [
			'last_login' => date("Y-m-d H:i:s"),
		];

		$this->db->update('user', $data, ['level' => $level, 'username' => $username, 'password' => $password]);
	}

}

/* End of file Login_model.php */

?>