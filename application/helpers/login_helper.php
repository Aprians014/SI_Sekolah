<?php

function is_logged_in()
{
	$CI = get_instance();
	if (!$CI->session->userdata('masuk')) {
		redirect('login','refresh');
	}else{
		// $akses   = $CI->session->userdata('level');
		// $menu    = $CI->uri->segment(1);

		 // $queryMenu = $CI->db->get_where('tb_guru', ['level' => $menu])->row_array();
		// $menu_id = $queryMenu['level'];

		//  $userAccess = $CI->db->get_where('tb_guru',[

		//  		'level' => $menu_id

		//  	]);

		if ($queryMenu->num_rows() < 1 ) {
			redirect('blocked','refresh');
		}
	}
}
