<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Magang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('magang_model');   
		$this->load->model('auth_model');
	}

	public function index()
	{
		$this->auth_model->getsqurity() ;
		$isi['content'] = 'Magang/Magang';
		$isi['ajax'] 	= 'Magang/Ajax';
        $isi['css'] 	= 'Magang/Css';
		$this->load->view('Template', $isi);
	}

    public function date_lengkap($date)
    {
        $tgl = date_create($date);
        return date_format($tgl, "d-M-Y");
    }

	public function data_list()
	{
		$this->load->helper('url');
		$list = $this->magang_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
            $row[] = htmlentities($datanya->penempatan_magang);
			$row[] = $this->date_lengkap($datanya->tgl_mulai);
			$row[] = htmlentities($datanya->no_surat_yayasan);
			$row[] = $this->date_lengkap($datanya->tgl_pengesahan);
			$row[] = htmlentities($datanya->yang_mengesahkan);
			//add html for action
			$row[] = '<a type="button" class="icon-pencil-alt" href="#" 
			title="Track" onclick="edit_magang('."'".$datanya->id_magang."'".')"></a>
			<a type="button" class="icon-trash text-danger" href="Magang/hapus/'.$datanya->id_magang.'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
            'id_magang' 	    => '',
            'nik' 	    => $this->input->post('nik'),
            'no_sk_magang' 	    => $this->input->post('no_sk_magang'),
            'penempatan_magang' => $this->input->post('penempatan_magang'),
			'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
			'no_surat_yayasan' 	=> $this->input->post('no_surat_yayasan'),
			'tgl_pengesahan' 	=> $this->input->post('tgl_pengesahan'),
			'yang_mengesahkan' 	=> $this->input->post('yang_mengesahkan'),
        );
		$simpan = $this->magang_model->create('magang',$data);
		$this->session->set_flashdata('message', 'Data berhasil ditambah');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
        // $this->_validate();
       $data = array(
		    'nik' 	    => $this->input->post('nik'),
            'no_sk_magang' 	    => $this->input->post('no_sk_magang'),
            'penempatan_magang' => $this->input->post('penempatan_magang'),
			'tgl_mulai' 		=> $this->input->post('tgl_mulai'),
			'no_surat_yayasan' 	=> $this->input->post('no_surat_yayasan'),
			'tgl_pengesahan' 	=> $this->input->post('tgl_pengesahan'),
			'yang_mengesahkan' 	=> $this->input->post('yang_mengesahkan'),
        );
        
		$this->magang_model->update(array('id_magang' => $this->input->post('id_magang')), $data);
		$this->session->set_flashdata('success', 'Data berhasil diubah.');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_edit($id)
	{
		$data = $this->magang_model->get_by_id($id);
		echo json_encode($data);
	}

	public function hapus($item_id) {
        $result = $this->magang_model->delete($item_id);

        if ($result) {
            // Jika penghapusan berhasil, tampilkan notifikasi toast berhasil
            $this->session->set_flashdata('success', 'Item berhasil dihapus.');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi toast gagal
            $this->session->set_flashdata('error', 'Gagal menghapus item.');
        }

        // Alihkan kembali ke halaman sebelumnya atau halaman yang sesuai
        redirect('magang');
    }
}
