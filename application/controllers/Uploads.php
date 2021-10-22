<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploads extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
        $this->load->model('Model_pengguna');
        $this->load->model('Model_subkategori');
        $this->load->model('Model_upload');
        $this->load->model('Model_favorit');
        $this->load->model('Model_notifikasi');
	}
	
	public function index()
	{
        $data = array(
            'script'    => 'script/js_upload',
            'page'      => 'upload/index',
            'link'      => 'upload',
            'user'      => $this->Model_pengguna->get(),
            'subkategori'   => $this->Model_subkategori->get(),
            'favorit'   => $this->Model_favorit->get()['data']
        );
		$this->load->view('layout/template',$data);
    }

    public function save() {
        if($this->Model_upload->store()) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil simpan data.
          </div>');
            redirect(base_url()."uploads");
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data.
          </div>');
            redirect(base_url()."uploads");
        }
    }

}
