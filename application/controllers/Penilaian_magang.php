<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penilaian_magang extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Penilaian_model');   
		$this->load->model('auth_model');
	}

    public function index()
	{
		$this->auth_model->getsqurity() ;
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
			$row[] = '<a type="button" class="btn btn-sm btn-info fas fa-pencil-alt" href="#" 
			title="Track" onclick="edit_penilaian_magang('."'".$datanya->id_penilaian."'".')"> Edit</a>
			<a type="button" class="btn btn-sm btn-danger fas fa-paper-plane" onclick="kirim_email('."'".$datanya->id_penilaian."'".')"> Email</a> ';
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
		// $this->session->set_flashdata('message', 'Data berhasil diubah');
	}

	public function ajax_edit($id)
	{
		$data = $this->Penilaian_model->get_by_id($id);
		echo json_encode($data);
	}

	function kirim_email(){
		// Konfigurasi email
        $config = [
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'protocol'  => 'smtp',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'syarifaminul@gmail.com',  // Email gmail
            'smtp_pass'   => 'syarif1995',  // Password gmail
            'smtp_crypto' => 'ssl',
            'smtp_port'   => 465,
            'crlf'    => "\r\n",
            'newline' => "\r\n"
        ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('syarifaminul@gmail.com', 'google.com');

        // Email penerima
        $this->email->to($this->input->post('email')); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach('https://images.pexels.com/photos/169573/pexels-photo-169573.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940');

        // Subject email
        $this->email->subject('Hasil Magang di Fakultas Ilmu Kesehatan');

        // Isi email
        $this->email->message("Ini adalah contoh email yang dikirim kepada pelamar di fakultas kesehatan");

        // Tampilkan pesan sukses atau error
        if ($this->email->send()) {
            echo 'Sukses! email berhasil dikirim.';
			echo json_encode(array("status" => TRUE));
        } else {
            echo 'Error! email tidak dapat dikirim.';
        }
		
	}

	public function cetak()
	{   
		$this->load->library('Pdf'); 
		$isi['data'] = $this->db->query("SELECT * FROM penilaian_magang, magang, pelamar where magang.id_magang = penilaian_magang.id_magang and
		magang.nik = pelamar.nik ")->result();
		$this->load->view('Penilaian/cetak',$isi);
	}
}
