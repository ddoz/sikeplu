<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminordermedia extends CI_Controller {

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
        'page'      => 'admin/ordermedia',
        'link'      => 'adminordermedia',
        'proposal' => $pengajuan,
    );
    $this->load->view('layout/template',$data);
  }

  public function form() {
      
      $data = array(
          'script'    => 'script/js_pengajuan',
          'page'      => 'admin/createorder',
          'link'      => 'adminordermedia',
          'media'      => $this->db->get_where('proposals',array('status' =>'diterima'))->result(),
      );
      $this->load->view('layout/template',$data);
  }

  public function save() {

    $cek = $this->db->get_where('order_media', array('id_media'=>$this->input->post('id_media'),'status_order'=>'0'));
    if($cek->num_rows()>0) {
      $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Gagal simpan data. Data sudah ada.
      </div>');
      redirect(base_url()."adminordermedia");
    }

    $data = array(
        "id_media"              => $this->input->post('id_media'),
        "keterangan_order"              => $this->input->post('keterangan_order'),
        "status_order" => "0",
        "created_at" => date('Y-m-d H:i:s'),
        "updated_at" => date('Y-m-d H:i:s'),
    );

    if($this->db->insert('order_media',$data)) {
        $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil simpan data.
      </div>');
    }else {
        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Gagal simpan data.
      </div>');
    }
    redirect(base_url()."adminordermedia");
}

  

  public function approve() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->update('order_media',array('status_order'=>'1'));
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminordermedia");
  }

  public function decline() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->update('order_media',array('status_order'=>'9'));
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminordermedia");
  }

  public function delete() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->delete('order_media');
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil hapus data.
      </div>');
      redirect(base_url()."adminordermedia");
  }

}
