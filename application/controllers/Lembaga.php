<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('lembaga_model');   
	}

	public function index()
	{
		$isi['content'] = 'Lembaga/Lembaga';
		$isi['ajax'] 	= 'Lembaga/Ajax';
        $isi['css'] 	= 'Lembaga/Css';
		$this->load->view('Template', $isi);
	}

	public function data_list()
	{
		$this->load->helper('url');
		$list = $this->lembaga_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_lembaga);
            $row[] = htmlentities($datanya->dekan);
			$row[] = htmlentities($datanya->wadek1);
			$row[] = htmlentities($datanya->wadek2);
			$row[] = htmlentities($datanya->wadek3);
			$row[] = htmlentities($datanya->ktu);
			//add html for action
			$row[] = '<a type="button" class="icon-pencil-alt" href="#" 
			title="Track" onclick="edit_lembaga('."'".$datanya->id_lembaga."'".')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		// $this->_validate();
		// Mendapatkan ID terakhir dari tabel atau file terpisah
        $last_id = $this->lembaga_model->get_last_id(); // Ganti dengan metode yang sesuai

        // Menghasilkan kode baru
        $next_id = $last_id + 1;
        $formatted_id = 'LMB' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
		$data = array(
            'id_lembaga' 	=> $formatted_id,
            'nama_lembaga' 	=> $this->input->post('nama_lembaga'),
            'dekan' 		=> $this->input->post('dekan'),
			'wadek1' 		=> $this->input->post('wadek1'),
			'wadek2' 		=> $this->input->post('wadek2'),
			'wadek3' 		=> $this->input->post('wadek3'),
			'ktu' 			=> $this->input->post('ktu'),
        );
		$simpan = $this->lembaga_model->create('tb_lembaga',$data);
		$this->session->set_flashdata('message', 'Data berhasil ditambah');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
        // $this->_validate();
       $data = array(
		'nama_lembaga' 	=> $this->input->post('nama_lembaga'),
		'dekan' 		=> $this->input->post('dekan'),
		'wadek1' 		=> $this->input->post('wadek1'),
		'wadek2' 		=> $this->input->post('wadek2'),
		'wadek3' 		=> $this->input->post('wadek3'),
		'ktu' 			=> $this->input->post('ktu'),
        );
        
		$this->lembaga_model->update(array('id_lembaga' => $this->input->post('id_lembaga')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('message', 'Data berhasil diubah');
	}

	public function ajax_edit($id)
	{
		$data = $this->lembaga_model->get_by_id($id);
		echo json_encode($data);
	}
}
