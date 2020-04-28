<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_jadwal extends CI_Model {
	public $id_jadwal;
	public $kd_kelas;
	public $kd_pel;
	public $nik;
	public $jam_masuk;
	public $hari_masuk;

	public function show()
	{
		$query = "SELECT * FROM jadwal
		 ";
		return $this->db->query($query)->result();
	}

	function get_kd_kelas_bykode($kd_kelas){
		$hsl=$this->db->query("SELECT * FROM tb_kelas WHERE kd_kelas='$kd_kelas'");
		if($hsl->num_rows()>0){
			foreach ($hsl->result() as $data) {
				$hasil=array(
					'kd_kelas' => $data->kd_kelas,
					'kelas' => $data->kelas,
					);
			}
		}
		return $hasil;
	}

	// Ambil detail Data User
		public function detail($id_jadwal)
		{
			$this->db->select('*');
			$this->db->from('jadwal');
			$this->db->where('id_jadwal', $id_jadwal);
			$this->db->order_by('id_jadwal', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

	public function save()
	{
		$post = $this->input->post();
		$this->kd_kelas = $post['kd_kelas'];
		$this->kd_pel = $post['kd_pel'];
		$this->nik = $post['nik'];
		$this->jam_masuk = $post['jam_masuk'];
		$this->hari_masuk = $post['hari_masuk'];
		return $this->db->insert('tb_jadwal_siswa', $this);
		
	}

	public function edit()
	{
		$post = $this->input->post();
		$this->id_jadwal = $post['id_jadwal'];
		$this->kd_kelas = $post['kd_kelas'];
		$this->kd_pel = $post['kd_pel'];
		$this->nik = $post['nik'];
		$this->jam_masuk = $post['jam_masuk'];
		$this->hari_masuk = $post['hari_masuk'];
		return $this->db->update('tb_jadwal_siswa', $this, array('id_jadwal' => $post['id_jadwal']));
	}
	
	public function hapus($id_jadwal)
	{
		$this->db->delete('tb_jadwal_siswa', array("id_jadwal" => $id_jadwal));
	}	

}

/* End of file M_jadwal.php */
/* Location: ./application/models/data_jadwal/M_jadwal.php */