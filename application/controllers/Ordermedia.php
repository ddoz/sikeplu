<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ordermedia extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
        }
        $this->load->model('Model_pengguna');
	}
	
	public function index()
	{
        $this->db->select('order_media.*,proposals.nama_media');
        $this->db->from('order_media');
        $this->db->join('proposals','proposals.id=order_media.id_media');
        $pengajuan = $this->db->get()->result();
        $data = array(
            'script'    => 'script/js_pengajuan',
            'page'      => 'ordermedia/index',
            'link'      => 'ordermedia',
            'proposal' => $pengajuan,
        );
        $this->load->view('layout/template',$data);
    }


}
