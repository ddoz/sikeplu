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

    public function kriteria() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        if(!is_numeric($id)) {
            redirect(base_url());
        }

        $this->db->select('tipemedia_kriterias.*,kriteria_penilaians.nama_kriteria');
        $this->db->from('tipemedia_kriterias');
        $this->db->join('kriteria_penilaians','kriteria_penilaians.id=tipemedia_kriterias.kriteria_id');
        $this->db->where('tipemedia_id',$id);
        $table = $this->db->get()->result();
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'tipemedia/kriteria',
            'link'      => 'tipemedia',
            'link_t'    => 'master',
            'table' => $table,
            'tipemedia'      => $this->db->get_where('tipe_media',array('id' => $id))->row(),
            'kriteria'      => $this->db->get('kriteria_penilaians')->result(),
            'id' => $id,
        );
		$this->load->view('layout/template',$data);
    }

    public function penilaian() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        if(!is_numeric($id)) {
            redirect(base_url());
        }
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'tipemedia/penilaian',
            'link'      => 'tipemedia',
            'link_t'    => 'master',
            'form'    => $this->db->get_where('formula_penilaian_media',array('tipemedia_id'=>$id))->result(), 
            'simbol' => $this->field_enums('formula_penilaian_media','simbol'),
            'id' => $id,
        );
		$this->load->view('layout/template',$data);
    }

    function field_enums($table = '', $field = '')
    {
        $enums = array();
        if ($table == '' || $field == '') return $enums;
        $CI =& get_instance();
        preg_match_all("/'(.*?)'/", $CI->db->query("SHOW COLUMNS FROM {$table} LIKE '{$field}'")->row()->Type, $matches);
        foreach ($matches[1] as $key => $value) {
            $enums[$value] = $value; 
        }
        return $enums;
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
        redirect(base_url()."tipemedia/form/".$this->input->post('tipemedia_id'));
    }

    public function savepenilaian() {
        $data = array(
            "simbol"              => $this->input->post('simbol'),
            "nilai"       => $this->input->post('nilai'),
            "hasil"       => $this->input->post('hasil'),
            "tipemedia_id"       => $this->input->post('tipemedia_id'),
        );

        if($this->db->insert('formula_penilaian_media',$data)) {
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
        redirect(base_url()."tipemedia/penilaian/".$this->input->post('tipemedia_id'));
    }

    public function savedetail() {
        $data = array(
            "tipemedia_id"              => $this->input->post('tipemedia_id'),
            "kriteria_id"       => $this->input->post('kriteria_id')
        );

        $ceking = $this->db->get_where('tipemedia_kriterias', array(
            "tipemedia_id"              => $this->input->post('tipemedia_id'),
            "kriteria_id"       => $this->input->post('kriteria_id')
        ));
        if($ceking->num_rows()>0) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data. Data Sudah Ada.
          </div>');
            redirect(base_url()."tipemedia/kriteria/".$this->input->post('tipemedia_id'));
        }

        if($this->db->insert('tipemedia_kriterias',$data)) {
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
        redirect(base_url()."tipemedia/kriteria/".$this->input->post('tipemedia_id'));
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
            if($this->db->delete('formulir_bukti_tayangs')) {
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

    public function hapusdetail() {
        $id = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);
    
        $this->db->where('id', $id);
        if($this->db->delete('tipemedia_kriterias')) {
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
    

        redirect(base_url()."tipemedia/kriteria/".$tipe);
    }

    public function hapuspenilaian() {
        $id = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);
        $this->db->where('id', $id);
        if($this->db->delete('formula_penilaian_media')) {
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

        redirect(base_url()."tipemedia/penilaian/".$tipe);
    }

}
