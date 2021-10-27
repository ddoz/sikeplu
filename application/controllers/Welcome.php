<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('Model_login');
	}
	
	public function index()
	{
		if(!empty($this->session->userdata('userId'))) {
			redirect(base_url()."home");
		}
		$this->load->view('login');
	}

	public function register()
	{
		if(!empty($this->session->userdata('userId'))) {
			redirect(base_url()."home");
		}
		$this->load->view('register');
	}

	public function signup() {
		$data = [
			"name" => $this->input->post("nama_lengkap"),
			"email" => $this->input->post("username"),
			"password" => password_hash($this->input->post("password"),PASSWORD_BCRYPT),
			"user_level" => "0"
		];
		$this->db->db_debug = false;
		if($this->db->insert('users',$data)) {
			$this->session->set_flashdata('status','Signup sukses. Silahkan Login');
		}else {
			$this->session->set_flashdata('status','Signup gagal. Silahkan coba dengan username lainnya.');
		}


		redirect(base_url()."welcome/register");
	}

	public function auth() {
		$user = $this->input->post('username');
		$password = $this->input->post('password');

		$login = $this->Model_login->auth($user,$password);
		if($login) {
			$this->session->set_flashdata('status','Login sukses.');
		}else {
			$this->session->set_flashdata('status','Login gagal. Silahkan periksa kembali Username dan Password.');
		}
		redirect(base_url()."welcome");

	}

	public function signout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
