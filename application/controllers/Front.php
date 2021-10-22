<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
	}

	public function tentang()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
	}

	public function daftar_media()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
	}

	public function faq()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
	}

	public function bantuan()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
	}

	public function survey()
	{
		$data = array(
			"page" =>"front/home"
		);
		$this->load->view('front/wrapper',$data);
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
		redirect(base_url());

	}

	public function signout() {
		$this->session->sess_destroy();
		redirect(base_url());
	}
}
