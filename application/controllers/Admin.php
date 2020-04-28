<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

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
	
		$this->load->view('layout/head', $data); 
		$this->load->view("layout/sidebar", $data);
		$this->load->view("layout/navbar", $data);
		$this->load->view("index", $data);       
	    $this->load->view("layout/footer", $data);
	  	$this->load->view("layout/scrolltop", $data);
	  	$this->load->view("layout/modal", $data);
	  	$this->load->view('guru/modal_guru', $data);
	  	$this->load->view("layout/js", $data);
	
	}

	

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */