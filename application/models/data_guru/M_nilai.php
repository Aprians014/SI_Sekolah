<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilai extends CI_Model {
	//public $tbl = 'tb_nilai';
	public $kd_kelas;
	public $nis;
	public $nik;
	public $kd_pel;
	public $nil_uts = null;
	public $nil_uas = null;
	public $nil_tgs = null;
	public $absen = null;
	
	public function show()
	{
		return $this->db->get('nilai')->result();
	}

	public function edit()
	{
		$post = $this->input->post();
		$this->kd_kelas = $post['kd_kelas'];
		$this->nis = $post['nis'];
		$this->nik = $post['nik'];
		$this->kd_pel = $post['kd_pel'];
		$this->nil_uts = $post['nil_uts'];
		$this->nil_uas = $post['nil_uas'];
		$this->nil_tgs = $post['nil_tgs'];
		$this->absen = $post['absen'];

		return $this->db->update('tb_nilai', $this, array( 'kd_kelas' => $post['kd_kelas']));
		
	}

	public function getbyKdKelas($kd_kelas)
	{
		return $this->db->get_where('tb_nilai', ["kd_kelas" => $kd_kelas])->row();
	}

	public function save()
	{
		$post = $this->input->post();
		$this->kd_kelas = $post['kd_kelas'];
		$this->nis = $post['nis'];
		$this->nik = $post['nik'];
		$this->kd_pel = $post['kd_pel'];
		// $this->nil_uts = $post['nil_uts'];
		// $this->nil_uas = $post['nil_uas'];
		// $this->nil_tgs = $post['nil_tgs'];
		// $this->absen = $post['absen'];

		return $this->db->insert('tb_nilai', $this);
		
	}

	public function delete($kd_kelas)
	{
		$this->db->delete('tb_nilai', array("kd_kelas"	=> $kd_kelas));
	}

}

/* End of file M_nilai.php */
/* Location: ./application/models/data_guru/M_nilai.php */