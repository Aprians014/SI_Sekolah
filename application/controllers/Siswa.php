<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('masuk') != TRUE) {
			$url = base_url();
			redirect($url);
		}
	}

	public function index()
	{
	$this->load->view('layout/head'); 
	$this->load->view("layout/sidebar");
	$this->load->view("layout/navbar");
	$this->load->view("index");       
    $this->load->view("layout/footer");
  	$this->load->view("layout/scrolltop");
  	$this->load->view("layout/modal");
  	$this->load->view('guru/modal_guru');
  	$this->load->view("layout/js");
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */