<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('data_guru/m_guru');
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

	public function data()
	{
	
	$d['data'] = $this->m_guru->show();
	
	$this->load->view('layout/head', $d); 
	$this->load->view("layout/sidebar", $d);
	$this->load->view("layout/navbar", $d);
	$this->load->view("guru/list", $d);       
    $this->load->view("layout/footer");
  	$this->load->view("layout/scrolltop");
  	$this->load->view("layout/modal", $d);
  	$this->load->view('guru/modal_guru', $d);
  	$this->load->view("layout/js", $d);
	
	}

	public function add()
	{
		$this->m_guru->save();
		redirect('data_guru/guru','refresh');
	}

	public function edit($nip = null)
	{
		$this->m_guru->edit_guru();
		//$data["tb_guru"] = $this->tbl->getbyNip($nip);
		//if(!$data["tb_guru"]) show_404();
		redirect('data_guru/guru','refresh');
	}

	public function hapus()
	{
		$nip = $this->input->post('nip');
		$this->m_guru->hapus_guru($nip);
		if (!isset($nip)) show_404();
		redirect('data_guru/guru','refresh');

	}

}

/* End of file Guru.php */
/* Location: ./application/controllers/data_guru/Guru.php */