<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Page extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//validasi jika user belum login
		$this->load->library('form_validation');
		$this->load->model('data_guru/m_guru');
		$this->load->model('data_siswa/m_siswa');
		$this->load->model('data_pelajaran/m_pelajaran');
		$this->load->model('data_jadwal/m_jadwal');
		$this->load->model('data_kelas/m_kelas');
		$this->load->model('data_guru/m_nilai');
	    if($this->session->userdata('masuk') != TRUE){
				redirect('login','refresh');
			}
	}

	public function index()

	{
		$data = array(	'title' 	=> 'Home',
						'content'	=> 'index'
		 );
		$data['data'] = $this->m_guru->show();
		$data['data'] = $this->m_siswa->show();
		$this->load->view('layout/wrapper', $data, FALSE);
	}

	public function dataGuru()
	{
		if ($this->session->userdata('akses')=='1') {
			$data = array(	'title' 	=> 'Data Guru',
							'content'	=>	'guru/list'
			 );
			$data['data'] = $this->m_guru->show();
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function dataKelas()
	{
		if ($this->session->userdata('akses')=='1') {
			$data = array(	'title' 	=> 	'Data Kelas',
							'content'	=>	'admin/dataKelas'
			 );
			$data['data'] = $this->m_kelas->show();
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function dataPelajaran()
	{
		if ($this->session->userdata('akses')=='1') {
			$data = array(	'title' 	=> 'Data Pelajaran',
							'content'	=>	'admin/dataPelajaran'
			 );
			$data['data'] = $this->m_pelajaran->show();
			$data['title'] = 'Data Palajaran';
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function addPelajaran()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		$this->m_pelajaran->save();
		redirect('page/dataPelajaran','refresh');
	}

	public function addKelas()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		$this->m_kelas->save();
		redirect('page/dataKelas','refresh');
	}

	public function editKelas($kd_kelas = null)
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di edit</div>');
		$kd_kelas = $this->input->post('kd_kelas');
		$this->m_kelas->edit($kd_kelas);
		if(!isset($kd_kelas)) show_404();
		redirect('page/dataKelas','refresh');
	}

	public function editPelajaran($kd_pel = null)
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di edit</div>');
		$kd_pel = $this->input->post('kd_pel');
		$this->m_pelajaran->edit($kd_pel);
		if($kd_pel=null) show_404();
		redirect('page/dataPelajaran','refresh');
	}

	public function hapusPelajaran()
	{	
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di hapus!</div>');
		$kd_pel = $this->input->post('kd_pel');
		$this->m_pelajaran->hapus($kd_pel);
		if (!isset($kd_pel)) show_404();
		redirect('page/dataPelajaran','refresh');

	}

	public function hapusKelas()
	{	
		$this->session->set_flashdata('msg', '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di hapus!</div>');
		$kd_kelas = $this->input->post('kd_kelas');
		$this->m_kelas->hapus($kd_kelas);
		if (!isset($kd_kelas)) show_404();
		redirect('page/dataKelas','refresh');

	}

	public function dataJadwal()
	{
		if ($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='3') {
			$data = array(	'data' 		=> 	$this->m_jadwal->show(),
							'title'		=> 	'Data Jadwal',
							'content'	=>	'admin/dataJadwalPelajaran',
							'kd_pel'	=>	$this->db->get('tb_pelajaran')->result(),
							'kd_kelas'	=>	$this->db->get('tb_kelas')->result(),
							'nik'		=>	$this->db->get('tb_guru')->result()
			 );

			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}

	}

	public function get_kd_kelas(){
		$kd_kelas=$this->input->post('kd_kelas');
		$data=$this->m_jadwal->get_kd_kelas_bykode($kd_kelas);
		echo json_encode($data);
	}

	public function jadwalMengajar()
	{
		 if ($this->session->userdata('akses')=='2') {
		 	$data = array(	'data' 		=>	$this->m_jadwal->show(),
		 					'data'		=>	$this->db->get_where('jadwal', ['nik' => $this->session->userdata('ses_id')])->result(),
		 					'title'		=>	'Jadwal',
		 					'content'	=>	'guru/jadwalMengajar',
		 					'kd_pel'	=>	$this->db->get('tb_pelajaran')->result(),
		 					'kd_kelas'	=>	$this->db->get('tb_kelas')->result(),
		 					'nik'		=>	$this->db->get('tb_guru')->result()
		 	 );
			$this->load->view('layout/wrapper', $data, FALSE);
		 }else{
		 	show_404();
		 }
		
	}


	public function addJadwalPelajaran()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		$id_jadwal = $this->input->post('id_jadwal');
		$this->m_jadwal->save($id_jadwal);
		if ($id_jadwal==null) show_404();
		redirect('page/dataJadwal','refresh');
	}

	public function dataPribadiGuru()
	{
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'data' 		=> $this->m_guru->show(),
							'tb_guru'	=> $this->db->get_where('tb_guru', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Data Pribadi',
							'content'	=>	'guru/data_pribadi',	
			 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function detailSiswa($nis)
	{
		if ($this->session->userdata('akses')=='1') {
			$siswa = $this->m_siswa->detail($nis);
			$data = array(	'title'		=> 'Detail Siswa',
							'tb_siswa'		=> $siswa,
							'content'	=> 'siswa/data_pribadi_admin'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function detailJadwalPelajaran($id_jadwal)
	{
		if ($this->session->userdata('akses')=='1') {
			$jadwal = $this->m_jadwal->detail($id_jadwal);
			$data = array(	'title'		=> 'Detail Jadwal',
							'jadwal'	=> $jadwal,
							'content'	=> 'admin/detailJadwalPelajaran'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function detailGuru($nik)
	{
		if ($this->session->userdata('akses')=='1') {
			$guru = $this->m_guru->detail($nik);
			$data = array(	'title'		=> 'Detail Guru',
							'tb_guru'		=> $guru,
							'content'	=> 'guru/data_pribadi_admin'
						);
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function editDataPribadiGuru($nik = null)
	{
		$nik = $this->input->post();
		$this->m_guru->edit_guru($nik);
		if($nik==null) show_404();
		redirect('page/dataPribadiGuru','refresh');
	}

	public function editJadwalPelajaran($id = null)
	{
		$id = $this->input->post('id_jadwal');
		$this->m_jadwal->edit($id);
		if($id==null) show_404();
		redirect('page/dataJadwal','refresh');
	}

	public function addGuru()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		$this->m_guru->save();
		redirect('page/dataGuru','refresh');
	}

	public function addDataNilai()
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		$this->m_nilai->save();
		redirect('page/dataNilai','refresh');
	}

	public function editGuru($nik = null)
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di edit</div>');
		$nik = $this->input->post('nik');
		$this->m_guru->edit_guru($nik);
		if(!isset($nik)) show_404();
		redirect('page/dataGuru','refresh');
	}

	public function editDataNilai($kd_kelas = null)
	{
		$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di edit</div>');
		$this->m_nilai->edit();
		// $data["kd_kelas"] = $this->tbl->getbyKdKelas($kd_kelas);
		// if(!$data["kd_kelas"]) show_404();
		redirect('page/dataNilai','refresh');
	}

	public function hapusGuru()
	{
		$nip = $this->input->post('nip');
		$this->m_guru->hapus_guru($nip);
		if (!isset($nip)) show_404();
		redirect('page/dataGuru','refresh');

	}

	public function hapusJadwal()
	{
		$id_jadwal = $this->input->post('id_jadwal');
		$this->m_jadwal->hapus($id_jadwal);
		if (!isset($id_jadwal)) show_404();
		redirect('page/dataJadwal','refresh');

	}

	public function hapusNilai()
	{
		$kd_kelas = $this->input->post('kd_kelas');
		$this->m_nilai->delete($kd_kelas);
		if (!isset($kd_kelas)) show_404();
		redirect('page/dataNilai','refresh');

	}


	public function dataSiswa()
	{
		if ($this->session->userdata('akses')=='1') {
			$data = array(	'data' 		=> $this->m_siswa->show(),
							'title'		=> 'Data Siswa',
							'content'	=>	'siswa/list'
			 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function dataNilai()
	{
		if ($this->session->userdata('akses')=='1') {
			$data = array(	'data' 		=> $this->m_nilai->show(),
							'title'		=> 'Data Nilai Siswa',
							'content'	=>	'admin/dataNilai'
			 );
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
	}

	public function nilaiUTS()
	{
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'data' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->result(),
							'uts' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Nilai UTS',
							'content'	=> 'guru/nilaiUTS'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function masterSiswa()
	{
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'nilai' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'data' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->result(),
							'title'		=> 'Daftar Siswa',
							'content'	=> 'guru/masterSiswa'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function nilaiPresensi()
	{
		
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'data' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->result(),
							'presensi' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Nilai Presensi',
							'content'	=> 'guru/nilaiPresensi'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function nilaiTGS()
	{
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'data' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->result(),
							'tgs' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Nilai Tugas ',
							'content'	=> 'guru/nilaiTGS'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function nilaiUAS()
	{
		if ($this->session->userdata('akses')=='2') {
			$data = array(	'data' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->result(),
							'uas' 		=> $this->db->get_where('nilai', ['nik' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Nilai UAS',
							'content'	=> 'guru/nilaiUAS'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

	public function dataPribadiSiswa()
	{
		if ($this->session->userdata('akses')=='3') {
			$data = array(	'data' 		=> $this->m_siswa->show(),
							'tb_siswa'	=> $this->db->get_where('tb_siswa', ['nis' => $this->session->userdata('ses_id')])->row_array(),
							'title'		=> 'Data Pribadi',
							'content'	=> 'siswa/data_pribadi'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}	

	public function editDataPribadiSiswa($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_siswa->edit_siswa($nis);
		//$data["tb_guru"] = $this->tbl->getbyNip($nip);
		if(!$nis) show_404();
		redirect('page/dataPribadiSiswa','refresh');
	}

	public function editDataPribadiSiswaAdmin($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_siswa->edit_siswa($nis);
		//$data["tb_guru"] = $this->tbl->getbyNip($nip);
		if(!$nis) show_404();
		redirect('page/dataSiswa','refresh');
	}

	public function editDataPribadiGuruAdmin($nik = null)
	{
		$nik = $this->input->post('nik');
		$i 	 = $this->m_guru->edit_guru($nik);
		//$data["tb_guru"] = $this->tbl->getbyNip($nip);
		if(!$nik) show_404();
		redirect('page/dataGuru','refresh');
	}

	public function editNilai($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_nilai->edit($nis);
		if(!$nis) show_404();
		redirect('page/nilaiUTS','refresh');
	}

	public function editNilaiPresensi($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_nilai->edit($nis);
		if(!$nis) show_404();
		redirect('page/nilaiPresensi','refresh');
	}

	public function editNilaiTGS($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_nilai->edit($nis);
		if(!$nis) show_404();
		redirect('page/nilaiTGS','refresh');
	}

	public function editNilaiUAS($nis = null)
	{
		$nis = $this->input->post('nis');
		$this->m_nilai->edit($nis);
		if(!$nis) show_404();
		redirect('page/nilaiUAS','refresh');
	}

	public function addSiswa()
	{
		$this->form_validation->set_rules('pass_siswa', 'Password', 'trim|required|min_length[6]',

									['required' => 'Password belum diisi.',
											'min_length' => 'Password minimal 6 karakter.'
											]);
		
		if ($this->form_validation->run() == false) {
			$this->m_siswa->save();
			redirect('page/dataSiswa','refresh');
			$this->session->set_flashdata('msg', '<div class="alert alert-success"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a> Data berhasil di simpan</div>');
		}else{
			echo "aaaaas";
		}
		
	}

	public function editSiswa($nis=null)
	{
		$nis = $this->input->post('nis');
		$this->m_siswa->edit_siswa($nis);
		//$data["tb_guru"] = $this->tbl->getbyNip($nip);
		if(!isset($nis)) show_404();
		redirect('page/dataSiswa','refresh');
	}

	public function hapusSiswa()
	{
		$nis = $this->input->post('nis');
		$this->m_siswa->hapus_siswa($nis);
		if (!isset($nis)) show_404();
		redirect('page/dataSiswa','refresh');

	}

	public function nilaiSiswa()
	{
		if ($this->session->userdata('akses')=='3') {
			$data = array(	'data' 		=> $this->db->get_where('nilai', ['nis' => $this->session->userdata('ses_id')])->result(),
							'title'		=> 'Nilai : '.$this->session->userdata('ses_nm'),
							'content'	=> 'siswa/nilaiSiswa'
			 );
			
			$this->load->view('layout/wrapper', $data, FALSE);
		}else{
			show_404();
		}
		
	}

}

/* End of file Page.php */
/* Location: ./application/controllers/Page.php */