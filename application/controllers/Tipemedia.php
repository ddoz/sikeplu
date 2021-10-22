<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tipemedia extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId')) || $this->session->userdata('userLevel')!='1') {
			redirect(base_url());
		}
    $this->load->model(array('Model_pengguna','Model_divisi','Model_notifikasi'));
	}
	
	public function index()
	{
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'tipemedia/index',
            'link'      => 'tipemedia',
            'link_t'    => 'master',
            'table'     => $this->db->get('tipe_media')->result()
        );
		$this->load->view('layout/template',$data);
    }
    
    public function form() {
        $id = $this->uri->segment(3);
        if(!is_numeric($id)) {
            redirect(base_url());
        }
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'tipemedia/form',
            'link'      => 'tipemedia',
            'link_t'    => 'master',
            'form'    => $this->db->get_where('formulir_bukti_tayangs',array('tipemedia_id'=>$id))->result(), 
            'id' => $id,
        );
		$this->load->view('layout/template',$data);
    }

    public function saveformulir() {
        $data = array(
            "kolom"              => $this->input->post('kolom'),
            "tipe"       => $this->input->post('tipe'),
            "tipemedia_id"       => $this->input->post('tipemedia_id'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        if($this->db->insert('formulir_bukti_tayangs',$data)) {
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
        redirect(base_url()."tipemedia");
    }


    public function hapusform() {
        $id = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);
        $cek = $this->db->get_where('bukti_tayangs', array('formula_id' => $id));
        if($cek->num_rows()>0) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> Gagal hapus data. Data sudah ada di Transaksi.
              </div>');
        }else {
            $this->db->where('id', $id);
            if($this->db->delete('formulir_bukti_tayangs',)) {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Berhasil hapus data.
              </div>');
            }else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> Gagal hapus data.
              </div>');
            }
        }

        redirect(base_url()."tipemedia/form/".$tipe);
    }

}
