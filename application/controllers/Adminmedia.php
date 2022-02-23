<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminmedia extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
        }
        $this->load->model('Model_pengguna');
	}
	
	public function index()
	{
    $this->db->select('proposals.*,tipe_media.nama');
    $this->db->from('proposals');
    $this->db->join('tipe_media','tipe_media.id=proposals.tipemedia_id');
    $this->db->where('proposals.status',"diterima");
    $pengajuan = $this->db->get()->result();
    $data = array(
        'script'    => 'script/js_media',
        'page'      => 'admin/media',
        'link'      => 'adminmedia',
        'proposal' => $pengajuan,
    );
    $this->load->view('layout/template',$data);
  }

  public function form() {
    $pengajuan = $this->db->get_where('proposals', array('id' => $this->uri->segment(3)))->row();

    $ceklis = [];
    $bukti = [];

    if(!empty($pengajuan)) {
        $qPersyaratan = $this->db->get_where('tipemedia_kriterias', array('tipemedia_id'=>$pengajuan->tipemedia_id))->result();
        foreach($qPersyaratan as $qp) {
            $qkriteria = $this->db->get_where('kriteria_penilaians', array('id'=>$qp->kriteria_id))->result();
            $qpilih = $this->db->get_where('kriteria_pilihs', array('proposal_id'=>$pengajuan->id,'user_id'=>$pengajuan->user_id,'kriteria_id'=>$qp->kriteria_id))->row();
            foreach($qkriteria as $qk) {
                $ins['id_kriteria'] = $qk->id;
                $ins['nama_kriteria'] = $qk->nama_kriteria;
                $ins['pilih'] = @$qpilih->kriteriadetail_id;
                $ins['nilai'] = @$qpilih->nilai;
                $ins['file'] = @$qpilih->file;
                $ins['detail'] = [];
                $qdetail = $this->db->get_where('kriteria_penilaian_details',array('kriteria_penilaian_id'=>$qk->id))->result();
                foreach($qdetail as $qd) {
                    array_push($ins['detail'],array("id"=>$qd->id,"nama_nilai"=>$qd->nama_penilaian,"nilai"=>$qd->nilai));
                }
                $ceklis[] = $ins;
            }
        }
        $this->db->select('bukti_tayangs.*,formulir_bukti_tayangs.kolom,formulir_bukti_tayangs.tipe');
        $this->db->from('bukti_tayangs');
        $this->db->join('formulir_bukti_tayangs','formulir_bukti_tayangs.id=bukti_tayangs.formula_id');
        $this->db->where(array('bukti_tayangs.proposal_id'=>$pengajuan->id));
        $bukti = $this->db->get()->result();
    }

    $data = array(
        'script'    => 'script/js_pengajuan',
        'page'      => 'admin/detailmedia',
        'link'      => 'adminpengajuan',
        'tipemedia'      => $this->db->get('tipe_media')->result(),
        'proposal' => $pengajuan,
        'ceklis' => $ceklis,
        'bukti' => $bukti,
        'jabatan'=>$this->db->get('jabatan')->result(),
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
