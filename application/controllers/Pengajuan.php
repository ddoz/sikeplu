<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengajuan extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
		}
        $this->load->model('Model_upload');
	}
	
	public function index()
	{
        $pengajuan = $this->db->get_where('proposals', array('user_id' => $this->session->userdata('userId')))->row();

        $ceklis = [];

        if(!empty($pengajuan)) {
            $qPersyaratan = $this->db->get_where('tipemedia_kriterias', array('tipemedia_id'=>$pengajuan->tipemedia_id))->result();
            foreach($qPersyaratan as $qp) {
                $qkriteria = $this->db->get_where('kriteria_penilaians', array('id'=>$qp->kriteria_id))->result();
                $qpilih = $this->db->get_where('kriteria_pilihs', array('proposal_id'=>$pengajuan->id,'user_id'=>$this->session->userdata('userId'),'kriteria_id'=>$qp->kriteria_id))->row();
                foreach($qkriteria as $qk) {
                    $ins['id_kriteria'] = $qk->id;
                    $ins['nama_kriteria'] = $qk->nama_kriteria;
                    $ins['pilih'] = @$qpilih->kriteriadetail_id;
                    $ins['file'] = @$qpilih->file;
                    $ins['detail'] = [];
                    $qdetail = $this->db->get_where('kriteria_penilaian_details',array('kriteria_penilaian_id'=>$qk->id))->result();
                    foreach($qdetail as $qd) {
                        array_push($ins['detail'],array("id"=>$qd->id,"nama_nilai"=>$qd->nama_penilaian,"nilai"=>$qd->nilai));
                    }
                    $ceklis[] = $ins;
                }
            }
        }

        $data = array(
            'script'    => 'script/js_pengajuan',
            'page'      => 'pengajuan/index',
            'link'      => 'pengajuan',
            'tipemedia'      => $this->db->get('tipe_media')->result(),
            'proposal' => $pengajuan,
            'jabatan' => $this->db->get('jabatan')->result(),
            'ceklis' => $ceklis,
        );
		$this->load->view('layout/template',$data);
    }

    public function save() {

        //cek apakah sudah ada insert data
        $ceking = $this->db->get_where('proposals',array("user_id"=>$this->session->userdata('userId')));
        if($ceking->num_rows()>0) {
            $update = $this->Model_upload->update($ceking->row());
            if($update['status']) {
                $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> '.$update['message'].'.
              </div>');
            }else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> '.$update['message'].'
              </div>');
            }

        }else {
            $store =  $this->Model_upload->store();
            if($store['status']) {
                $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> '.$store['message'].'.
              </div>');
            }else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> '.$store['message'].'
              </div>');
            }
        }

        redirect(base_url()."pengajuan");
    }

    public function ceklis() {

        $insert = array(
            "proposal_id" => $this->input->post("proposal_id"),
            "user_id" => $this->session->userdata("userId")
        );
        $config['upload_path']          = './berkas/proposal/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|PDF';
        $config['max_size']             = 2048; // 1MB
        $config['encrypt_name']         = true;

        $this->load->library('upload',$config);

        $this->db->trans_begin();

        foreach($this->input->post('kriteria_id') as $key => $krt){

            $cekDb = $this->db->get_where('kriteria_pilihs',array('proposal_id'=>$insert['proposal_id'], "user_id"=>$insert['user_id'], "kriteria_id"=>$krt));
            if($cekDb->num_rows()>0) {
                //update
                $update = array(
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                if($this->input->post("kriteriadetail_id")[$key]!="") {
                    $update['kriteriadetail_id'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[0];
                    $update['nilai'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[1];
                }

                if(!empty($_FILES['bukti']['name'][$key])) {
                    $_FILES['file']['name'] = $_FILES['bukti']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['bukti']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['bukti']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['bukti']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['bukti']['size'][$key];
                    if ($this->upload->do_upload('file')) {
                        $update['file'] = $this->upload->data("file_name");
                    } 
                }
                $this->db->where(array('proposal_id'=>$insert['proposal_id'], "user_id"=>$insert['user_id'], "kriteria_id"=>$krt));
                $this->db->update('kriteria_pilihs',$update);
            }else {
                //insert
                $insert = array(
                    "proposal_id" => $this->input->post("proposal_id"),
                    "user_id" => $this->session->userdata("userId"),
                    "kriteria_id" => $krt,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                );
                if(!empty($_FILES['bukti']['name'][$key])) {
                    $_FILES['file']['name'] = $_FILES['bukti']['name'][$key];
                    $_FILES['file']['type'] = $_FILES['bukti']['type'][$key];
                    $_FILES['file']['tmp_name'] = $_FILES['bukti']['tmp_name'][$key];
                    $_FILES['file']['error'] = $_FILES['bukti']['error'][$key];
                    $_FILES['file']['size'] = $_FILES['bukti']['size'][$key];
                    if ($this->upload->do_upload('file')) {
                        $insert['file'] = $this->upload->data("file_name");
                    }
                }
                if($this->input->post("kriteriadetail_id")[$key]!="") {
                    $insert['kriteriadetail_id'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[0];
                    $insert['nilai'] = explode("_",$this->input->post("kriteriadetail_id")[$key])[1];
                }
                $this->db->insert('kriteria_pilihs',$insert);
            }

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
        redirect(base_url()."pengajuan");
    }

}
