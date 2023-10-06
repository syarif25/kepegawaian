<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontrak_kerja extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Kontrak_model');   
		$this->load->model('auth_model');
	}

    public function index()
	{
		$this->auth_model->getsqurity() ;
		$isi['content'] = 'Kontrak/Kontrak';
		$isi['ajax'] 	= 'Kontrak/Ajax';
        $isi['css'] 	= 'Kontrak/Css';
		$this->load->view('Template', $isi);
	}

    public function date_lengkap($date)
    {
        $tgl = date_create($date);
        return date_format($tgl, "d-M-y");
    }

	function rupiah($angka){
		$hasil_rupiah = number_format($angka,0,',','.');
		return $hasil_rupiah;
	}

	public function data_list()
	{
		$this->load->helper('url');
		$list = $this->Kontrak_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			$rawDate = $datanya->tgl_mulai_tugas;
			$tahun = date("Y", strtotime($rawDate));

			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
            $row[] = htmlentities($datanya->penempatan);
            $row[] = htmlentities($datanya->no_sk_kerja);
            $row[] = htmlentities($tahun);
            $row[] = htmlentities($datanya->no_surat_yayasan);
            $row[] = $this->date_lengkap($datanya->tgl_pengesahan);
            $row[] = htmlentities($datanya->yang_mengesahkan);
            $row[] = htmlentities($datanya->status);
            $row[] = htmlentities($datanya->jabatan);
            $row[] = htmlentities($datanya->nidn);
            $row[] = htmlentities($datanya->jabatan_struktural);
            $row[] = htmlentities($datanya->jabatan_akademik);
            $row[] = htmlentities($datanya->tgl_awal_mengabdi);
            $row[] = $this->rupiah($datanya->gaji);
			$row[] = $this->date_lengkap($datanya->awal_kontrak).' <b> <br> s/d <br> </b> '.$this->date_lengkap($datanya->akhir_kontrak);
			//add html for action
			$row[] = '<a type="button" class="icon-pencil-alt" href="#" 
			title="Track" onclick="edit_kontrak('."'".$datanya->id_kontrak."'".')"></a>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$data = array(
            'id_kontrak' 	    => '',
            'nik' 	            => $this->input->post('nik'),
            'no_sk_kerja' 	    => $this->input->post('no_sk_kerja'),
            'penempatan'        => $this->input->post('penempatan'),
			'tgl_mulai_tugas' 	=> $this->input->post('tgl_mulai_tugas'),
			'no_surat_yayasan'  => $this->input->post('no_surat_yayasan'),
			'tgl_pengesahan' 	=> $this->input->post('tgl_pengesahan'),
			'yang_mengesahkan' 	=> $this->input->post('yang_mengesahkan'),
            'status' 	        => $this->input->post('status'),
            'jabatan' 	        => $this->input->post('jabatan'),
            'nidn' 	            => $this->input->post('nidn'),
            'jabatan_struktural' => $this->input->post('jabatan_struktural'),
            'jabatan_akademik' 	 => $this->input->post('jabatan_akademik'),
            'tgl_awal_mengabdi'  => $this->input->post('tgl_awal_mengabdi'),
            'gaji' 	             => $this->input->post('gaji'),
            'awal_kontrak' 	     => $this->input->post('awal_kontrak'),
            'akhir_kontrak' 	  => $this->input->post('akhir_kontrak'),
        );
		$simpan = $this->Kontrak_model->create('kontrak_kerja',$data);
		$this->session->set_flashdata('message', 'Data berhasil ditambah');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
        // $this->_validate();
       $data = array(
			'nik' 	            => $this->input->post('nik'),
			'no_sk_kerja' 	    => $this->input->post('no_sk_kerja'),
			'penempatan'        => $this->input->post('penempatan'),
			'tgl_mulai_tugas' 	=> $this->input->post('tgl_mulai_tugas'),
			'no_surat_yayasan'  => $this->input->post('no_surat_yayasan'),
			'tgl_pengesahan' 	=> $this->input->post('tgl_pengesahan'),
			'yang_mengesahkan' 	=> $this->input->post('yang_mengesahkan'),
			'status' 	        => $this->input->post('status'),
			'jabatan' 	        => $this->input->post('jabatan'),
			'nidn' 	            => $this->input->post('nidn'),
			'jabatan_struktural' => $this->input->post('jabatan_struktural'),
			'jabatan_akademik' 	 => $this->input->post('jabatan_akademik'),
			'tgl_awal_mengabdi'  => $this->input->post('tgl_awal_mengabdi'),
			'gaji' 	             => $this->input->post('gaji'),
			'awal_kontrak' 	     => $this->input->post('awal_kontrak'),
			'akhir_kontrak' 	  => $this->input->post('akhir_kontrak'),
        );
        
		$this->Kontrak_model->update(array('id_kontrak' => $this->input->post('id_kontrak')), $data);
		echo json_encode(array("status" => TRUE));
		$this->session->set_flashdata('message', 'Data berhasil diubah');
	}

	public function ajax_edit($id)
	{
		$data = $this->Kontrak_model->get_by_id($id);
		echo json_encode($data);
	}
}
