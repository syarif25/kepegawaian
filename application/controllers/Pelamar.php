<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelamar extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pelamar_model'); 
        $this->load->model('auth_model');
	}

	public function index()
	{
        $this->auth_model->getsqurity() ;
		$isi['content'] = 'Pelamar/Pelamar';
		$isi['ajax'] 	= 'Pelamar/Ajax';
        $isi['css'] 	= 'Pelamar/Css';
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
		$list = $this->Pelamar_model->get_datatables();
		$no =1;
		$data = array();
		foreach ($list as $datanya) {
			
			$row = array();
			$row[] = $no++;
			$row[] = htmlentities($datanya->nik);
            $row[] = htmlentities($datanya->nama_pelamar);
			$row[] = htmlentities($datanya->tempat_lahir.', '.$this->date_lengkap($datanya->tanggal_lahir));
			$row[] = htmlentities($datanya->alamat);
			$row[] = htmlentities($datanya->rencana_jabatan);
			$row[] = $this->date_lengkap($datanya->tanggal_lamaran);

            // if ($datanya->penilaian_berkas == ''){
            //     $row[] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            // } else {
            // $row[] = htmlentities($datanya->penilaian_berkas);
            // }

            // if ($datanya->tanggal_psikotes == ''){
            //     $row[] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            // } else {
            // $row[] = htmlentities($datanya->tanggal_psikotes);
            // }
            
            // if ($datanya->tanggal_wawancara == '') {
            //     $row[] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            // } else {
            // $row[] = htmlentities($datanya->tanggal_wawancara);
            // }

            // if ($datanya->tanggal_wawancara2 == '') {
            //     $row[] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            // } else {
            // $row[] = htmlentities($datanya->tanggal_wawancara2);
            // }

            // if ($datanya->tanggal_seleksi_pengasuh == '') {
            //     $row[] = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg>';
            // } else {
            // $row[] = htmlentities($datanya->tanggal_seleksi_pengasuh);
            // }
			//add html for action
			$row[] = '
            
            
            <div class="btn-group btn-group-pill" role="group" aria-label="Basic example">
                          <button class="btn btn-info" type="button" onclick="edit_pelamar('."'".$datanya->id_pelamar."'".')">Edit</button>
                          <button class="btn btn-primary" type="button">Detail</button>
                          <a type="button" class="btn btn-info" href="Pelamar/hapus_lembaga/'.$datanya->id_pelamar.'" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')"> Hapus</a>
                        </div>';
		    $data[] = $row;
		}
		$output = array("data" => $data);
		echo json_encode($output);
	}

	public function ajax_add()
	{
		// $this->_validate();
		// Mendapatkan ID terakhir dari tabel atau file terpisah
        // $last_id = $this->Pelamar_model->get_last_id(); // Ganti dengan metode yang sesuai

        // // Menghasilkan kode baru
        // $next_id = $last_id + 1;
        // $formatted_id = 'PDF' . str_pad($next_id, 3, '0', STR_PAD_LEFT);
		$data = array(
            'id_pelamar' 	    => '',
            'nama_pelamar' 	    => $this->input->post('nama_pelamar'),
            'nik' 		        => $this->input->post('nik'),
			'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
			'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
			'rencana_jabatan' 	=> $this->input->post('rencana_jabatan'),
			'alamat' 			=> $this->input->post('alamat'),
            'no_hp' 			=> $this->input->post('no_hp'),
            'email' 			=> $this->input->post('email'),
            'tanggal_lamaran' 	=> $this->input->post('tanggal_lamaran'),
        );
		$simpan = $this->Pelamar_model->create('pelamar',$data);
        $this->session->set_flashdata('success', 'Data berhasil dihapus.');
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_update(){
        // $this->_validate();
       $data = array(
        'nama_pelamar' 	    => $this->input->post('nama_pelamar'),
        'nik' 		        => $this->input->post('nik'),
        'tempat_lahir' 		=> $this->input->post('tempat_lahir'),
        'tanggal_lahir' 	=> $this->input->post('tanggal_lahir'),
        'rencana_jabatan' 	=> $this->input->post('rencana_jabatan'),
        'alamat' 			=> $this->input->post('alamat'),
        'no_hp' 			=> $this->input->post('no_hp'),
        'email' 			=> $this->input->post('email'),
        'tanggal_lamaran' 	=> $this->input->post('tanggal_lamaran'),
        );
        
		$this->Pelamar_model->update(array('id_pelamar' => $this->input->post('id_pelamar')), $data);
        $this->session->set_flashdata('success', 'Data berhasil diubah.');
		echo json_encode(array("status" => TRUE));
        
	}

	public function ajax_edit($id)
	{
		$data = $this->Pelamar_model->get_by_id($id);
		echo json_encode($data);
	}

    public function hapus_lembaga($item_id) {
        $result = $this->Pelamar_model->delete($item_id);

        if ($result) {
            // Jika penghapusan berhasil, tampilkan notifikasi toast berhasil
            $this->session->set_flashdata('success', 'Item berhasil dihapus.');
        } else {
            // Jika penghapusan gagal, tampilkan notifikasi toast gagal
            $this->session->set_flashdata('error', 'Gagal menghapus item.');
        }

        // Alihkan kembali ke halaman sebelumnya atau halaman yang sesuai
        redirect('pelamar');
    }

    
}
