<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('auth_model'); // Gantikan dengan nama model Anda
    }

    public function index() {
        $this->load->view('login');
    }

    function aksi_login(){
        $username 	= $this->input->post('username');
            $password 	= $this->input->post('password');
            
            $user = $this->db->get_where('pengguna', ['username' => $username])->row_array();
            
            if ($user) {
                // jika password yg diinput sesuai dgn didatabase
                if (password_verify($password, $user['password'])) {
                    
                    $data['username']       = $user['username'];
                    // $data['id_pengguna']    = $user['id_pengguna'];
                    // $data['jabatan']  		= $user['jabatan'];
                    // $data['lembaga']     = $user['lembaga'];
                    $this->session->set_userdata($data);
                    redirect('main');  
                } else {
                    // jika password yg diinput tidak sesuai dengan didatabase
                    $this->session->set_flashdata('login-failed-1', 'Gagal');
                    redirect('auth');
                }
            } 
    
            // jika username dan passsword salah
            $this->session->set_flashdata('login-failed-2', 'Gagal');
            redirect('Auth');
        
        }
    
        function logout(){
          // hapus session
            $this->session->unset_userdata('username');
    
            // tampilkan flash message
            $this->session->set_flashdata('logout-success', 'Berhasil');
            redirect('Auth');
        }
}
