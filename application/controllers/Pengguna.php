<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
        $this->load->model('auth_model');
		$this->load->model('pengguna_model');   
		$this->load->library('form_validation');
	}

	public function index()
	{
        $this->auth_model->getsqurity() ;
		$isi['content'] = 'Pengguna/Pengguna';
		$isi['ajax'] 	= 'Pengguna/Ajax';
        $isi['css'] 	= 'Pengguna/Css';
		$this->load->view('Template', $isi);
	}

	public function data_list()
	{
		$this->load->helper('url');
		$list = $this->pengguna_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->username);
            $row[] = htmlentities($datanya->level);
			//add html for action
			$row[] = '<a type="button" class="icon-pencil-alt" href="#" 
			title="Track" onclick="edit_pengguna('."'".$datanya->id_pengguna."'".')"></a>
			<a type="button" class="icon-trash text-danger" href="Pengguna/hapus_pengguna/'.$datanya->id_pengguna.'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
            'id_pengguna' 	=> '',
            'username' 	    => $this->input->post('username'),
            'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' 		=> $this->input->post('level'),
		);
		$simpan = $this->pengguna_model->create('pengguna',$data);
		$this->session->set_flashdata('message', 'Data berhasil ditambah');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
		$data = array(
			'username' 	    => $this->input->post('username'),
            'password' 		=> password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'level' 		=> $this->input->post('level'),
		);
	
		$this->pengguna_model->update(array('id_pengguna' => $this->input->post('id_pengguna')), $data);
		$this->session->set_flashdata('success', 'Item berhasil dirubah.'); // Menyimpan pesan dalam session
		echo json_encode(array("status" => TRUE));
	}
	

	public function ajax_edit($id)
	{
		$data = $this->pengguna_model->get_by_id($id);
		echo json_encode($data);
	}

	public function hapus_pengguna($item_id) {
        $result = $this->pengguna_model->delete($item_id);

        if ($result) {
            // Jika penghapusan berhasil, tampilkan notifikasi toast berhasil
            $this->session->set_flashdata('success', 'Item berhasil dihapus.');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi toast gagal
            $this->session->set_flashdata('error', 'Gagal menghapus item.');
        }

        // Alihkan kembali ke halaman sebelumnya atau halaman yang sesuai
        redirect('pengguna');
    }
}
