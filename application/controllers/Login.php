<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('login_model');
	}

	public function index()
	{
		
		$this->form_validation->set_rules('username', 'Username', 'trim|required',

									array('required' => 'Username belum diisi.')

											);

		$this->form_validation->set_rules('password', 'Password', 'trim|required'

		  							, array('required' => 'Password belum diisi.')

											);
		if ($this->form_validation->run()==false) {
			$this->load->view('login_view');
		}else{
			$this->auth();
		}
		
	}

	private function auth()
	{

		$username=htmlspecialchars($this->input->post('username',TRUE),ENT_QUOTES);
        $password=htmlspecialchars($this->input->post('password',TRUE),ENT_QUOTES);

        $cek_guru=$this->login_model->aut_guru($username,$password);

        if($cek_guru->num_rows() > 0){ //jika login sebagai guru
				$data=$cek_guru->row_array();
        		$this->session->set_userdata('masuk',TRUE);
		         if($data['level']=='1'){ //Akses admin
		            $this->session->set_userdata('akses','1');
		            $this->session->set_userdata('ses_id',$data['nik']);
		            $this->session->set_userdata('ses_nm',$data['nm_guru']);
		            // $this->session->set_userdata('ses_tlg',$data['tmpt_lhr_guru']);
		            redirect('page');

		         }else{ //akses guru
		            $this->session->set_userdata('akses','2');
					$this->session->set_userdata('ses_id',$data['nik']);
		            // $this->session->set_userdata('ses_tlg',$data['tmpt_lhr_guru']);
		            $this->session->set_userdata('ses_nm',$data['nm_guru']);
		            // echo $this->session->set_flashdata('msg','Username Atau Password Salah');
		            redirect('page');
		         }

        }else{ //jika login sebagai siswa
					$cek_siswa=$this->login_model->aut_siswa($username,$password);
					if($cek_siswa->num_rows() > 0){
							$data=$cek_siswa->row_array();
        					$this->session->set_userdata('masuk',TRUE);
							$this->session->set_userdata('akses','3');
							$this->session->set_userdata('ses_id',$data['nis']);
							$this->session->set_userdata('ses_nm',$data['nm_siswa']);
							redirect('page');
					}else{  // jika username dan password tidak ditemukan atau salah
							$url=base_url();
							echo $this->session->set_flashdata('msg','<div class="alert alert-danger">Username atau password tidak ditemukan!
							</div>');
							redirect($url);
					}
        }
	}

	public function logout(){
        $this->session->sess_destroy();
        $url=base_url('');
        redirect($url);
    }

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */