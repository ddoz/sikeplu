<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminpengajuan extends CI_Controller {

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
    $pengajuan = $this->db->get()->result();
    $data = array(
        'script'    => 'script/js_pengajuan',
        'page'      => 'admin/pengajuan',
        'link'      => 'adminpengajuan',
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
          $this->db->select('bukti_tayangs.*,formulir_bukti_tayangs.kolom,formulir_bukti_tayangs.tipe,');
          $this->db->from('bukti_tayangs');
          $this->db->join('formulir_bukti_tayangs','formulir_bukti_tayangs.id=bukti_tayangs.formula_id');
          $this->db->where(array('bukti_tayangs.proposal_id'=>$pengajuan->id));
          $bukti = $this->db->get()->result();
      }

      $data = array(
          'script'    => 'script/js_pengajuan',
          'page'      => 'admin/detail',
          'link'      => 'adminpengajuan',
          'tipemedia'      => $this->db->get('tipe_media')->result(),
          'proposal' => $pengajuan,
          'ceklis' => $ceklis,
          'bukti' => $bukti,
          'jabatan'=>$this->db->get('jabatan')->result(),
      );
      $this->load->view('layout/template',$data);
  }

  public function validasi() {
    $cek = explode("-",$this->input->post('check'));
    $update = array(
      $cek[1]."_ket" => $this->input->post($cek[1]."_ket"),
      $cek[1]."_status" => $cek[0],
    );
    $this->db->where('id',$this->input->post('proposal_id'));
    if($this->db->update('proposals',$update)) {
        $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Data berhasil diubah.
      </div>');
      redirect(base_url().'adminpengajuan/form/'.$this->input->post('proposal_id'));
    }else {
        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Data gagal diubah.
      </div>');
        redirect(base_url().'adminpengajuan/form/'.$this->input->post('proposal_id'));
    }
  }

  public function ceklis() {

    $insert = $this->db->get_where('proposals', array('id' => $this->input->post('proposal_id')))->row();
    // $insert = array(
    //     "proposal_id" => $this->input->post("proposal_id"),
    //     "user_id" => $this->session->userdata("userId")
    // );
    $this->db->trans_begin();
    foreach($this->input->post('kriteria_id') as $key => $krt){

            //update
            $update = array(
                'updated_at' => date('Y-m-d H:i:s'),
            );
            if($this->input->post("kriteriadetail_id")[$key]!="") {
                $update['kriteriadetail_id'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[0];
                $update['nilai'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[1];
            }
            $this->db->where(array('proposal_id'=>$insert->id, "user_id"=>$insert->user_id, "kriteria_id"=>$krt));
            $this->db->update('kriteria_pilihs',$update);
        

    }
    if($this->db->trans_status() !== FALSE) {
        $this->db->trans_commit();
        $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil simpan data.
      </div>');
    }else {
        $this->db->trans_rollback();
        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Fail!</strong> Gagal simpan data.
      </div>');
    }
    redirect(base_url()."adminpengajuan/form/".$this->input->post("proposal_id"));
  }

  public function approve() {

    $id = $this->input->post('id_proposal');
    $status = ($this->input->post('submit')=="terima") ? "diterima" : "ditolak";
    $keterangan = $this->input->post('keterangan_proposal');
    
    if($status=='diterima') {
      //cek kelengkapan berkas
      $cek_berkas = $this->db->get_where('proposals',array("id"=>$id))->result();
      $status_berkas = array();
      foreach ($cek_berkas as $index => $val) {
        $status_berkas[0]=(int)$val->akta_perusahaan_status;
        $status_berkas[1]=(int)$val->kartu_identitas_pic_status;
        $status_berkas[2]=(int)$val->sk_pic_status;
        $status_berkas[3]=(int)$val->surat_permohonan_kerjasama_status;
        $status_berkas[4]=(int)$val->proposal_penawaran_status;
        $status_berkas[5]=(int)$val->siup_situ_status;
        $status_berkas[6]=(int)$val->npwp_status;
        $status_berkas[7]=(int)$val->sertifikat_kemenkumham_status;
        $status_berkas[8]=(int)$val->spt_tahun_terakhir_status;
        $status_berkas[9]=(int)$val->sertifikat_dewan_pers_status;
      }
      if(in_array("0",$status_berkas)) {
        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Success!</strong> Gagal update data. Kelengkapan berkas harus di terima semua terlebih dahulu.
        </div>');
        redirect(base_url()."adminpengajuan/form/".$id);
      }
    }


    $this->db->where('id',$id);
    $this->db->update('proposals',array('status'=>$status,'keterangan'=>$keterangan));
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminpengajuan/form/".$id);
  }

  public function approveidentitas() {

    $id = $this->input->post('id_proposal');
    $status = ($this->input->post('submit')=="terima") ? "diterima" : "ditolak";

    $this->db->where('id',$id);
    $this->db->update('proposals',array('status_identitas'=>$status,'keterangan_identitas'=>$this->input->post('keterangan_identitas')));
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminpengajuan/form/".$id);
  }

  public function decline() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->update('proposals',array('status'=>'ditolak'));
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminpengajuan/form/".$this->uri->segment(3));
  }

  public function delete() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->delete('proposals');
    $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <strong>Success!</strong> Berhasil update data.
      </div>');
      redirect(base_url()."adminpengajuan");
  }

}
