<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cms extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId')) || $this->session->userdata('userLevel')!='1') {
			redirect(base_url());
		}
	}
	
	public function index()
	{
        $data = array(
            'script'    => 'script/js_cms',
            'page'      => 'cms/index',
            'link'      => 'cms',
            'link_t'    => 'master',
            'cms'     => $this->db->get('cms')->row()
        );
		$this->load->view('layout/template',$data);
    }
    
    public function save() {
        $data = array(
            "id"              =>1,
            "tentang"              => $this->input->post('tentang'),
            "faq"       => $this->input->post('faq'),
            "bantuan"       => $this->input->post('bantuan'),
            "survey"       => $this->input->post('survey'),
        );

        if($this->db->replace('cms',$data)) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil simpan data.
          </div>');
            redirect(base_url()."cms");
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data.
          </div>');
            redirect(base_url()."cms");
        }
    }


}
