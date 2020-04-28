<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_guru extends CI_Model {
	private $tbl = 'tb_guru';
	public $nik;
	public $nm_guru;
	public $tmpt_lhr_guru;
	public $tgl_lhr_guru;
	public $pass_guru;
	public $agm_guru;
	public $jk_guru;
	public $tlp_guru;
	public $email_guru;
	public $almt_guru;
	public $pend_guru;
	public $status_kawin;
	public $jab;
	public $level;

function show()
{
	return $this->db->get($this->tbl)->result();
}

// Ambil detail Data siswa
	public function detail($nik)
	{
		$this->db->select('*');
		$this->db->from('tb_guru');
		$this->db->where('nik', $nik);
		$this->db->order_by('nik', 'desc');
		$query = $this->db->get();
		return $query->row();
	}


function save()
	{
		$post = $this->input->post();
		$this->nik = $post['nik'];
		$this->nm_guru = $post['nm_guru'];
		$this->gelar_depan = $post['gelar_depan'];
		$this->gelar_belakang = $post['gelar_belakang'];
		$this->tmpt_lhr_guru = $post['tmpt_lhr_guru'];
		$this->tgl_lhr_guru = $post['tgl_lhr_guru'];
		$this->pass_guru = MD5($post['pass_guru']);
		$this->agm_guru = $post['agm_guru'];
		$this->jk_guru = $post['jk_guru'];
		$this->tlp_guru = $post['tlp_guru'];
		$this->email_guru = $post['email_guru'];
		$this->almt_guru = $post['almt_guru'];
		$this->pend_guru = $post['pend_guru'];
		$this->status_kawin = $post['status_kawin'];
		$this->jab = $post['jab'];
		$this->level = $post['level'];
		return $this->db->insert($this->tbl, $this);
	}

	public function edit_guru()
	{
		$post = $this->input->post();
		$this->nik = $post['nik'];
		$this->nm_guru = $post['nm_guru'];
		$this->gelar_depan = $post['gelar_depan'];
		$this->gelar_belakang = $post['gelar_belakang'];
		$this->tmpt_lhr_guru = $post['tmpt_lhr_guru'];
		$this->tgl_lhr_guru = $post['tgl_lhr_guru'];
		$this->pass_guru = $post['pass_guru'];
		$this->agm_guru = $post['agm_guru'];
		$this->jk_guru = $post['jk_guru'];
		$this->tlp_guru = $post['tlp_guru'];
		$this->email_guru = $post['email_guru'];
		$this->almt_guru = $post['almt_guru'];
		$this->pend_guru = $post['pend_guru'];
		$this->status_kawin = $post['status_kawin'];
		$this->jab = $post['jab'];
		$this->level = $post['level'];
		return $this->db->update($this->tbl, $this, array( 'nik' => $post['nik']));

	}	

	public function getbyNip($nip)
	{
		return $this->db->get_where($this->tbl, ["nip" => $nip])->row();
	}

	public function hapus_guru($nip)
	{
		$this->db->delete($this->tbl, array("nip" => $nip));
	}

}

/* End of file M_guru.php */
/* Location: ./application/models/data_guru/M_guru.php */