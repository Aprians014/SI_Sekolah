<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_siswa extends CI_Model {
	public $nis;
    public $nm_siswa; 
    public $tmpt_lhr_siswa; 
    public $tgl_lhr_siswa;
    public $agm_siswa;
    public $jk_siswa;
    public $almt_siswa;
    public $pass_siswa;
    public $tlp_siswa;
    public $asal_sekolah;
    public $nm_wali;
    public $level;

function show()
{
	return $this->db->get('tb_siswa')->result();
}

// Ambil detail Data siswa
	public function detail($nis)
	{
		$this->db->select('*');
		$this->db->from('tb_siswa');
		$this->db->where('nis', $nis);
		$this->db->order_by('nis', 'desc');
		$query = $this->db->get();
		return $query->row();
	}

public function save()
	{
		$post = $this->input->post();
		$this->nis = $post['nis'];
		$this->nm_siswa = $post['nm_siswa'];
		$this->tmpt_lhr_siswa = $post['tmpt_lhr_siswa'];
		$this->tgl_lhr_siswa = $post['tgl_lhr_siswa'];
		$this->agm_siswa = $post['agm_siswa'];
		$this->jk_siswa = $post['jk_siswa'];
		$this->almt_siswa = $post['almt_siswa'];
		$this->pass_siswa = MD5($post['pass_siswa']);
		$this->tlp_siswa = $post['tlp_siswa'];
		$this->asal_sekolah = $post['asal_sekolah'];
		$this->nm_wali = $post['nm_wali'];
		$this->level = $post['level'];
		return $this->db->insert('tb_siswa', $this);

	}

public function edit_siswa()
	{
		$post = $this->input->post();
		$this->nis = $post['nis'];
		$this->nm_siswa = $post['nm_siswa'];
		$this->tmpt_lhr_siswa = $post['tmpt_lhr_siswa'];
		$this->tgl_lhr_siswa = $post['tgl_lhr_siswa'];
		$this->agm_siswa = $post['agm_siswa'];
		$this->jk_siswa = $post['jk_siswa'];
		$this->almt_siswa = $post['almt_siswa'];
		$this->pass_siswa = $post['pass_siswa'];
		$this->tlp_siswa = $post['tlp_siswa'];
		$this->asal_sekolah = $post['asal_sekolah'];
		$this->nm_wali = $post['nm_wali'];
		$this->level = $post['level'];
		return $this->db->update('tb_siswa', $this, array( 'nis' => $post['nis']));
		
	}

public function hapus_siswa($nis)
{
	$this->db->delete('tb_siswa', array("nis" => $nis));
}	

}

/* End of file M_siswa.php */
/* Location: ./application/models/data_siswa/M_siswa.php */