<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_magang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penilaian_model');   
	}

    public function index()
	{
		$isi['content'] = 'Penilaian/Penilaian_magang';
		$isi['ajax'] 	= 'Penilaian/Ajax';
        $isi['css'] 	= 'Penilaian/Css';
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
		$list = $this->Penilaian_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
            $row[] = htmlentities($datanya->nilai_bulan1);
            $row[] = htmlentities($datanya->nilai_bulan2);
            $row[] = htmlentities($datanya->nilai_bulan3);
            $row[] = htmlentities($datanya->tes_mengajar);
            $row[] = htmlentities($datanya->total_nilai);
            $row[] = htmlentities($datanya->keputusan);
            $row[] = htmlentities($datanya->status_lanjut);
            $row[] = htmlentities($datanya->keterangan);
			$row[] = $this->date_lengkap($datanya->tgl_penilaian);
			$row[] = htmlentities($datanya->yang_menilai);
			//add html for action
			$row[] = '<a type="button" class="icon-pencil-alt" href="#" 
			title="Track" onclick="edit_penilaian_magang('."'".$datanya->id_penilaian."'".')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
            'id_penilaian' 	    => '',
            'id_magang' 	    => $this->input->post('id_magang'),
            'nilai_bulan1' 	    => $this->input->post('nilai_bulan1'),
            'nilai_bulan2'      => $this->input->post('nilai_bulan2'),
			'nilai_bulan3' 		=> $this->input->post('nilai_bulan3'),
			'tes_mengajar'  	=> $this->input->post('tes_mengajar'),
			'total_nilai' 	    => $this->input->post('total_nilai'),
			'status_lanjut' 	=> $this->input->post('status_lanjut'),
            'keterangan' 	    => $this->input->post('keterangan'),
            'keputusan' 	    => $this->input->post('keputusan'),
            'tgl_penilaian' 	=> $this->input->post('tgl_penilaian'),
            'yang_menilai' 	    => $this->input->post('yang_menilai'),
        );
		$simpan = $this->Penilaian_model->create('penilaian_magang',$data);
		$this->session->set_flashdata('message', 'Data berhasil ditambah');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
        // $this->_validate();
       $data = array(
            'id_magang' 	    => $this->input->post('id_magang'),
            'nilai_bulan1' 	    => $this->input->post('nilai_bulan1'),
            'nilai_bulan2'      => $this->input->post('nilai_bulan2'),
            'nilai_bulan3' 		=> $this->input->post('nilai_bulan3'),
            'tes_mengajar' 	    => $this->input->post('tes_mengajar'),
            'total_nilai' 	    => $this->input->post('total_nilai'),
            'status_lanjut' 	=> $this->input->post('status_lanjut'),
            'keterangan' 	    => $this->input->post('keterangan'),
            'keputusan' 	    => $this->input->post('keputusan'),
            'tgl_penilaian' 	=> $this->input->post('tgl_penilaian'),
            'yang_menilai' 	    => $this->input->post('yang_menilai'),
        );
        
		$this->Penilaian_model->update(array('id_penilaian' => $this->input->post('id_penilaian')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('message', 'Data berhasil diubah');
	}

	public function ajax_edit($id)
	{
		$data = $this->Penilaian_model->get_by_id($id);
		echo json_encode($data);
	}
}
