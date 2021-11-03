<?php

    defined('BASEPATH') OR exit('No direct script access allowed');

    class login_model extends CI_Model {

        function login($username, $password) {
            $this->db->select('id, username, password, level');
            $this->db->from('user');
            $this->db->where('username', $username);
            $this->db->where('password', $password);
            $this->db->where('status', 2);
            $this->db->limit(1);

            $query = $this->db->get();
            if($query->num_rows()==1) {
                return $query->result();
            }
            else {
                return false;
            }
        }

        public function register() {
            $data = [
                "nama" => $this->input->post('nama','true'),
                "jk" => $this->input->post('jk','true'),
                "email" => $this->input->post('email','true'),
                "telp" => $this->input->post('telp','true'),
                "username" => $this->input->post('uname1','true'),
                "password" => $this->input->post('pwd1','true')
            ];
            $this->db->insert('user',$data);
        }
    }

?>