	<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class M_kelas extends CI_Model {
		public $kd_kelas;
	    public $kelas; 
	    public $kapasitas; 

	function show()
	{
		$this->db->order_by('kd_kelas', 'desc');
		return $this->db->get('tb_kelas')->result();
	}

	// Ambil detail Data User
		public function detail($kd_kelas)
		{
			$this->db->select('*');
			$this->db->from('tb_kelas');
			$this->db->where('kd_kelas', $kd_kelas);
			$this->db->order_by('kd_kelas', 'desc');
			$query = $this->db->get();
			return $query->row();
		}

	public function save()
		{
			$post = $this->input->post();
			$this->kelas = $post['kelas'];
			$this->kapasitas = $post['kapasitas'];
			return $this->db->insert('tb_kelas', $this);

		}

	public function edit()
		{
			$post = $this->input->post();
			$this->kd_kelas = $post['kd_kelas'];
			$this->kelas = $post['kelas'];
			$this->kapasitas = $post['kapasitas'];
			return $this->db->update('tb_kelas', $this, array( 'kd_kelas' => $post['kd_kelas']));
			
		}

	public function hapus($kd_kelas)
	{
		$this->db->delete('tb_kelas', array("kd_kelas" => $kd_kelas));
	}	

	}

	/* End of file M_siswa.php */
	/* Location: ./application/models/data_siswa/M_siswa.php */