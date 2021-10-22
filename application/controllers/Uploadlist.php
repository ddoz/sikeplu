<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadlist extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
        }
        $this->load->model('Model_upload');
        $this->load->model('Model_subkategori');
        $this->load->model('Model_revisi');
	}
	
	public function index()
	{
        $data = array(
            'script'    => 'script/js_uploadlist',
            'page'      => 'uploadlist/index',
            'link'      => 'uploadlist',
            'link_t'    => 'master',
            'table'     => $this->Model_upload->getAll()
        );
		$this->load->view('layout/template',$data);
    }

    public function detail() {
        $id = $this->uri->segment(3);
        if(is_numeric($id)) {
            $detail = $this->Model_upload->getById($id);
            if($detail['status']) {
                $data = array(
                    'script'    => 'script/js_uploadlist',
                    'page'      => 'uploadlist/detail',
                    'link'      => 'uploadlist',
                    'link_t'    => 'master',
                    'table'     => $detail['output']
                );
                $this->load->view('layout/template',$data);
            }else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info</strong> Data tidak ditemukan.
              </div>');
                redirect(base_url().'uploadlist');
            }
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info</strong> Data tidak ditemukan.
          </div>');
            redirect(base_url().'uploadlist');
        }
    }

    function checkEmpty($field) {
        if($field=="") {
            return true;
        }
    }

    public function filter() {
        $dariTanggal = $this->input->get('dariTanggal');
        $sampaiTanggal = $this->input->get('sampaiTanggal');
        $subKategori = $this->input->get('subKategori');
        $tujuan = $this->input->get('tujuan');
        
        if($this->checkEmpty($dariTanggal)&&$this->checkEmpty($sampaiTanggal)&&$this->checkEmpty($subKategori)&&$this->checkEmpty($tujuan)) {
            redirect(base_url().'uploadlist');
        }

        $data = array(
            'script'    => 'script/js_uploadlist',
            'page'      => 'uploadlist/index',
            'link'      => 'uploadlist',
            'link_t'    => 'data',
            'table'     => $this->Model_upload->getAll($dariTanggal,$sampaiTanggal,$subKategori,$tujuan),
            'kategori'  => $this->Model_subkategori->get()
        );
		$this->load->view('layout/template',$data);
    }

    public function revisiikhtisar() {
        $idmaster = $this->input->post('masterIdIkhtisar');

        if($_FILES['fileIkhtisar']['name']) {
            $cekrevisi = $this->Model_revisi->getIkhtisarByMasterId($idmaster);
            $masterid = $this->db->get_where('paperlessmaster',array('plmasterId'=>$idmaster))->row();
            $i = count($cekrevisi) + 1;
            $fileikhtisar = 'PLIKHTISAR_'.$idmaster.'_REVISI_'.$i;
            $config['upload_path']          = './berkas/ikhtisar/';
            $config['allowed_types']        = 'xls|xlsx|doc|docx';
            $config['file_name']            = $fileikhtisar;
            $config['max_size']             = 0; // 1MB
            $this->db->trans_begin();
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('fileIkhtisar')) {
                $insert['revisiikhtisarFile'] = $this->upload->data("file_name");
                $insert['revisiikhtisarMasterId'] = $idmaster;
                $insert['revisiikhtisarCreatedAt'] = date('Y-m-d H:i:s');
                if($this->Model_revisi->storeikhtisar($insert)){
                    $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Berhasil Upload Revisi Ikhtisar.
                  </div>');
                }else {
                    @unlink($fileikhtisar);
                    $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Gagal Upload Revisi Ikhtisar.
                  </div>');
                }
            } else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Info</strong> Gagal Upload Revisi Ikhtisar.
              </div>');
            }
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Info</strong> Gagal Upload Revisi Ikhtisar.
          </div>');
        }
        redirect(base_url().'uploadlist/detail/'.$idmaster);
    }

    public function revisidetail() {
        $idmaster = $this->input->post('masterIdDetail');

        if($_FILES['fileDetail']['name']) {
            $cekrevisi = $this->Model_revisi->getDetailByMasterId($idmaster);
            $masterid = $this->db->get_where('paperlessmaster',array('plmasterId'=>$idmaster))->row();
            $i = count($cekrevisi) + 1;
            $filedetail = 'PLDETAIL_'.$idmaster.'_REVISI_'.$i;
            $config['upload_path']          = './berkas/lampiran/';
            $config['allowed_types']        = 'xls|xlsx|doc|docx';
            $config['file_name']            = $filedetail;
            $config['max_size']             = 0; // 1MB
            $this->db->trans_begin();
            $this->load->library('upload',$config);
            if ($this->upload->do_upload('fileDetail')) {
                $insert['revisidetailFile'] = $this->upload->data("file_name");
                $insert['revisidetailMasterId'] = $idmaster;
                $insert['revisidetailCreatedAt'] = date('Y-m-d H:i:s');
                if($this->Model_revisi->storedetail($insert)){
                    $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Berhasil Upload Revisi.
                  </div>');
                }else {
                    @unlink($filedetail);
                    $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Gagal Upload Revisi.
                  </div>');
                }
            } else {
                $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Gagal Upload Revisi.
                  </div>');
            }
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Gagal Upload Revisi.
                  </div>');
        }
        redirect(base_url().'uploadlist/detail/'.$idmaster);
    }

    public function delete() {
        $id = $this->uri->segment(3);
        $delete = $this->Model_upload->deletePermanent($id);
        if($delete) {
            $this->session->set_flashdata('status','<div class="alert alert-info alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Berhasil Hapus Data.
                  </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>Info</strong> Gagal Upload Revisi.
                  </div>');
        }
        redirect(base_url().'uploadlist');
    }

}
