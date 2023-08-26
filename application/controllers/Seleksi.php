<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seleksi extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Seleksi_model');   
        $this->load->helper('string');
	}

	public function berkas()
	{
		$isi['content'] = 'Seleksi/Seleksi';
		$isi['ajax'] 	= 'Seleksi/Ajax';
        $isi['css'] 	= 'Seleksi/Css';
		$this->load->view('Template', $isi);
	}

    public function tulis()
	{
		$isi['content'] = 'Seleksi/Seleksi_tulis';
		$isi['ajax'] 	= 'Seleksi/Ajax';
        $isi['css'] 	= 'Seleksi/Css';
		$this->load->view('Template', $isi);
	}

    public function wawancara()
	{
		$isi['content'] = 'Seleksi/Wawancara';
		$isi['ajax'] 	= 'Seleksi/Ajax';
        $isi['css'] 	= 'Seleksi/Css';
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
		$list = $this->Seleksi_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
			$row[] = htmlentities($datanya->alamat);
			$row[] = htmlentities($datanya->rencana_jabatan);
            if ($datanya->penilaian_berkas == '') {
                $row[] = '-';
            } else {
            $row[] = htmlentities($datanya->penilaian_berkas);
            }
            if ($datanya->file_berkas == ''){
                $row[] = '-';
            } else {
            $row[] = '<a target="_blank" href="../Upload/'.$datanya->file_berkas.'" class="btn btn-warning"><i class="fa fa-paperclip"></i></a>';
            }
            if ($datanya->tanggal_test_berkas == '') {
                $row[] = '<span class="text-danger"> Belum Test </span>';
            } else {
            $row[] = $this->date_lengkap($datanya->tanggal_test_berkas);
            }
            
			//add html for action
			$row[] = ' <button class="btn btn-info" type="button" onclick="edit_seleksi_berkas('."'".$datanya->id_pelamar."'".')">Edit</button>   ';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

    public function data_list_tulis()
	{
		$this->load->helper('url');
		$list = $this->Seleksi_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
			$row[] = htmlentities($datanya->alamat);
			$row[] = htmlentities($datanya->rencana_jabatan);
            if ($datanya->tanggal_test_tulis == '') {
                $row[] = '<span class="text-danger"> Belum Test </span>';
            } else {
            $row[] = $this->date_lengkap($datanya->tanggal_test_tulis);
            }
            $row[] = htmlentities($datanya->nilai_test_tulis);
            //add html for action
			$row[] = ' <button class="btn btn-info" type="button" onclick="edit_seleksi_tulis('."'".$datanya->id_pelamar."'".')">Edit</button>   ';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

    public function data_list_wawancara()
	{
		$this->load->helper('url');
		$list = $this->Seleksi_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nama_pelamar);
			$row[] = htmlentities($datanya->alamat);
			$row[] = htmlentities($datanya->rencana_jabatan);
            if ($datanya->tanggal_wawancara == '') {
                $row[] = '<span class="text-danger"> Belum Test </span>';
            } else {
            $row[] = $this->date_lengkap($datanya->tanggal_wawancara);
            }
            $row[] = htmlentities($datanya->nilai_wawancara);
            //add html for action
			$row[] = ' <button class="btn btn-info" type="button" onclick="edit_wawancara('."'".$datanya->id_pelamar."'".')">Edit</button>   ';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function update_berkas(){
        // $this->_validate();
        $data = array(
            'penilaian_berkas' 	  => $this->input->post('nilai'),
            'tanggal_test_berkas' => $this->input->post('tanggal_test_berkas'),
            'file_berkas' 	      => '',
            );
            if(!empty($_FILES['file_berkas']['name']))
            {
                $upload = $this->_do_upload();
                $data['file_berkas'] = $upload;
            }
       

		$this->Seleksi_model->update(array('id_pelamar' => $this->input->post('id_pelamar')), $data);
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
		echo json_encode(array("status" => TRUE));
        
	}

    public function update_tulis(){
        // $this->_validate();
       $data = array(
        'tanggal_test_tulis' 	  => $this->input->post('tanggal_test_tulis'),
        'nilai_test_tulis' 	  => $this->input->post('nilai_test_tulis'),
        );
        
		$this->Seleksi_model->update(array('id_pelamar' => $this->input->post('id_pelamar')), $data);
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
		echo json_encode(array("status" => TRUE));
        
	}

    public function update_wawancara(){
        // $this->_validate();
       $data = array(
        'tanggal_wawancara' 	  => $this->input->post('tanggal_wawancara'),
        'nilai_wawancara' 	  => $this->input->post('nilai_wawancara'),
        );
        
		$this->Seleksi_model->update(array('id_pelamar' => $this->input->post('id_pelamar')), $data);
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
		echo json_encode(array("status" => TRUE));
        
	}

    public function _do_upload()
	{
		$date = new DateTime();
		$timezone = time() + (60 * 60 * 7);
		$config['upload_path']          = 'Upload/';
        $config['allowed_types']        = 'pdf';
        $config['max_size']             = 0; //set max size allowed in Kilobyte
        $config['file_name']            = random_string('alnum',50).$date->getTimestamp(); //just milisecond timestamp fot unique name

        $this->load->library('upload', $config);

        if(!$this->upload->do_upload('file_berkas')) //upload and validate
        {
            $data['inputerror'][] = 'file_berkas';
			$data['error_string'][] = 'Upload error: File harus PDF  '; //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	public function ajax_edit($id)
	{
		$data = $this->Seleksi_model->get_by_id($id);
		echo json_encode($data);
	}

    
}
