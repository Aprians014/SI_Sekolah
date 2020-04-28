<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pelajaran extends CI_Model {

	public function show()
	{
		return $this->db->get('tb_pelajaran')->result();
	}
	
	public function save()
	{
		$post = $this->input->post();
		$this->kd_pel = $post['kd_pel'];
		$this->nm_pel = $post['nm_pel'];
		$this->kkm = $post['kkm'];
		
		return $this->db->insert('tb_pelajaran', $this);

	}

	public function edit()
	{
		$post = $this->input->post();
		$this->kd_pel = $post['kd_pel'];
		$this->nm_pel = $post['nm_pel'];
		$this->kkm = $post['kkm'];
		
		return $this->db->update('tb_pelajaran', $this, array ('kd_pel' => $post['kd_pel']));

	}

	public function hapus($kd_pel)
	{
		$this->db->delete('tb_pelajaran', array("kd_pel" => $kd_pel));
	}

}

/* End of file M_pelajaran.php */
/* Location: ./application/models/data_pelajaran/M_pelajaran.php */