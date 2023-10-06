<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lembaga extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('lembaga_model');   
		$this->load->library('form_validation');
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->auth_model->getsqurity() ;
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
			title="Track" onclick="edit_lembaga('."'".$datanya->id_lembaga."'".')"></a>
			<a type="button" class="icon-trash text-danger" href="Lembaga/hapus_lembaga/'.$datanya->id_lembaga.'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		// Mendapatkan ID terakhir dari tabel atau file terpisah
        $last_id = $this->lembaga_model->get_last_id(); // Ganti dengan metode yang sesuai

		$this->form_validation->set_rules('nama', 'Nama', 'required|min_length[3]');
    	$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

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
		$data = array(
			'nama_lembaga' => $this->input->post('nama_lembaga'),
			'dekan' => $this->input->post('dekan'),
			'wadek1' => $this->input->post('wadek1'),
			'wadek2' => $this->input->post('wadek2'),
			'wadek3' => $this->input->post('wadek3'),
			'ktu' => $this->input->post('ktu'),
		);
	
		$this->lembaga_model->update(array('id_lembaga' => $this->input->post('id_lembaga')), $data);
		$this->session->set_flashdata('success', 'Item berhasil dirubah.'); // Menyimpan pesan dalam session
		echo json_encode(array("status" => TRUE));
	}
	

	public function ajax_edit($id)
	{
		$data = $this->lembaga_model->get_by_id($id);
		echo json_encode($data);
	}

	public function hapus_lembaga($item_id) {
        $result = $this->lembaga_model->delete($item_id);

        if ($result) {
            // Jika penghapusan berhasil, tampilkan notifikasi toast berhasil
            $this->session->set_flashdata('success', 'Item berhasil dihapus.');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi toast gagal
            $this->session->set_flashdata('error', 'Gagal menghapus item.');
        }

        // Alihkan kembali ke halaman sebelumnya atau halaman yang sesuai
        redirect('lembaga');
    }
}
