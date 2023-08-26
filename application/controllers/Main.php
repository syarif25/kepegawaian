<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	public function index()
	{
		$isi['content'] = 'Dashboard';
		$isi['ajax'] 	= 'Ajax';
		$isi['css'] 	= 'Css';
		$this->load->view('template', $isi);
	}

	
}
