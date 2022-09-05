<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

	public function __construct() {
		parent::__construct();
	}
	
	public function index()
	{
		$data = array(
			"page" =>"front/home",
			'jadwal' => $this->db->get_where('jadwal_pengajuan_proposals', array('status_jadwal'=>'1'))->row(),
			'media'      => 368,//$this->db->get('proposals')->num_rows(),
			'bukti'      => $this->db->get('bukti_tayangs')->num_rows(),
			'kerjasama'      => $this->db->get_where('proposals', array('status' => 'diterima'))->num_rows(),

		);
		$this->load->view('front/wrapper',$data);
	}

	public function tentang()
	{
		$data = array(
			"page" =>"front/tentang",
			'cms'      => $this->db->get('cms')->row(),
		);
		$this->load->view('front/wrapper',$data);
	}

	public function daftar_media()
	{

		$this->db->from('proposals');
		$this->db->join('tipe_media', 'tipe_media.id=proposals.tipemedia_id');
		$this->db->where('proposals.status','diterima');
		$d = $this->db->get()->result();

		$data = array(
			"page" =>"front/daftar_media",
			'media' => $d
		);
		$this->load->view('front/wrapper',$data);
	}

	public function faq()
	{
		$data = array(
			"page" =>"front/faq",
			'cms'      => $this->db->get('cms')->row(),
		);
		$this->load->view('front/wrapper',$data);
	}

	public function bantuan()
	{
		$data = array(
			"page" =>"front/bantuan",
			'cms'      => $this->db->get('cms')->row(),
		);
		$this->load->view('front/wrapper',$data);
	}

	public function survey()
	{
		$data = array(
			"page" =>"front/survey",
			'cms'      => $this->db->get('cms')->row(),
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
