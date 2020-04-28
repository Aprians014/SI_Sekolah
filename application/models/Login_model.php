<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model 
{
	// cek nip dan password guru
	public function aut_guru($username,$password)
	{
		$query=$this->db->query("select * from tb_guru where nik='$username' and pass_guru=MD5('$password') LIMIT 1");
		return $query;
	}

	// cek nis dan password siswa
	public function aut_siswa($username,$password)
	{
		$query=$this->db->query("select * from tb_siswa where nis='$username' and pass_siswa=MD5('$password') LIMIT 1");
		return $query;
	}

	

}

/* End of file Login_model.php */
/* Location: ./application/models/Login_model.php */