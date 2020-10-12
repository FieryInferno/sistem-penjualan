<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth_c extends CI_Controller {

	
	public function login()
	{
		$this->load->view('auth/login');
	}

	public function register()
	{
		$this->load->view('auth/register');
	}

	public function lupa_password()
	{
		$this->load->view('auth/lupa_password');
	}

	public function act_register()
	{
		$nama 		= $this->input->post('nama');
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$level 		= $this->input->post('level');
		$email 		= $this->input->post('email');
		$md5pass 	= md5($password);
		$sha1pass 	= sha1($md5pass);

		$dataInsert = array(
			'nama_user' => $nama,
			'username' => $username,
			'level' => $level,
			'email' => $email,
			'password' => $sha1pass
		);
		$cek = $this->db->get_where('user', array('username' => $username))->num_rows();
		if($cek < 1) {
			$this->db->insert('user',$dataInsert); 
			echo json_encode('success');
		}
		else {
			echo json_encode('error');
		}
	}

	public function act_login()
	{
		$username 	= $this->input->post('username');
		$password 	= $this->input->post('password');
		$md5pass 	= md5($password);
		$sha1pass 	= sha1($md5pass);

		$cek = $this->db->get_where('user', array('username' => $username, 'password' => $sha1pass));
		if($cek->num_rows() > 0) {
			echo json_encode('success');
			$id_user = "";
			foreach ($cek->result() as $dUser) {
				$id_user = $dUser->id;
			}
			$array = array(
				'id_user' => $id_user
			);
			
			$this->session->set_userdata($array);
			redirect(base_url('Dashboard_c/'),'refresh');
		}
		else {
			echo json_encode('error');
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url('Auth_c/login'),'refresh');
	} 

	public function kirim_kode()
	{
		$from_email = "sistem.penjualan2020@gmail.com"; 
		$to_email = $this->input->post('email');  
		$kode_random = null;
        for ($i=0; $i < 5 ; $i++) { 
			$kode_random = $kode_random.mt_rand(0, 9);
		} 

		$config = array();
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.googlemail.com';
		$config['smtp_port'] = 465;
		// $config['smtp_user'] = 'syogaadi75@gmail.com';
		// $config['smtp_pass'] = 'Yogaadisaputra123..';
		$config['smtp_user'] = 'sistem.penjualan2020@gmail.com';
		$config['smtp_pass'] = 'NaonWeAh00';
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
        $this->load->library('email');
		$this->email->initialize($config);
		$this->email->set_newline("\r\n"); 
        $this->email->from($from_email);
        $this->email->to($to_email);
        $this->email->subject('Verifikasi Kebenaran Email');
        $this->email->message('Masukkan Kode Konfirmasi Ini : <b>'.$kode_random.'</b>');
        //Send mail 
        $this->email->send();
        $dataInsert = array('kode' => $kode_random, 'email' => $to_email);
	    $this->db->insert('verifikasi_lupa_pass',$dataInsert);
        echo $this->email->print_debugger();
	}

	public function cek_kode()
	{
		$email = $this->input->post('email');
		$kode = $this->input->post('kode');
		$cek = $this->db->get_where('verifikasi_lupa_pass',array('email' => $email, 'kode' => $kode))->num_rows();
		if($cek > 0) {
			echo json_encode("success");
		} else {
			echo json_encode("error");
		}
	}

	public function ganti_password()
	{
		$email = $this->input->post('email_last');
		$password = $this->input->post('password');
		$md5pass = md5($password);
		$sha1pass = sha1($md5pass);

		$this->db->where('email', $email);
		$act = $this->db->update('user',array('password' => $sha1pass));
		if($act) {
			echo json_encode("success");
		}
		else {
			echo json_encode("error");
		}
	}
}
