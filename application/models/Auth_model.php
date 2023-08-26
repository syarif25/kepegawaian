<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_model extends CI_Model {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Memuat pustaka database
    }

    public function get_user($username) {
        // Query untuk mendapatkan data user berdasarkan username
        $query = $this->db->get_where('pengguna', array('username' => $username));
        return $query->row_array();
    }
}
