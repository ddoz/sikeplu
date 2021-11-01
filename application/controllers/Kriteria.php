<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kriteria extends CI_Controller {

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
            'script'    => 'script/js_kriteria',
            'page'      => 'kriteria/index',
            'link'      => 'kriteria',
            'link_t'    => 'master',
            'table'     => $this->db->get('kriteria_penilaians')->result()
        );
		$this->load->view('layout/template',$data);
    }
    
    public function form() {
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'kriteria/form',
            'link'      => 'kriteria',
            'link_t'    => 'master',
        );
		$this->load->view('layout/template',$data);
    }

    public function formdetail() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'kriteria/formdetail',
            'link'      => 'kriteria',
            'link_t'    => 'master',
        );
		$this->load->view('layout/template',$data);
    }

    public function kriteria() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        if(!is_numeric($id)) {
            redirect(base_url());
        }
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'tipemedia/kriteria',
            'link'      => 'kriteria',
            'link_t'    => 'master',
            'form'    => $this->db->get_where('formula_penilaian_media',array('tipemedia_id'=>$id))->result(), 
            'simbol' => $this->field_enums('formula_penilaian_media','simbol'),
            'id' => $id,
        );
		$this->load->view('layout/template',$data);
    }

    public function detail() {
        $this->load->helper('form');
        $id = $this->uri->segment(3);
        if(!is_numeric($id)) {
            redirect(base_url());
        }
        $data = array(
            'script'    => 'script/js_kriteria',
            'page'      => 'kriteria/detail',
            'link'      => 'kriteria',
            'kriteria'      => $this->db->get_where('kriteria_penilaians',array('id'=>$id))->row(),
            'link_t'    => 'master',
            'table'    => $this->db->get_where('kriteria_penilaian_details',array('kriteria_penilaian_id'=>$id))->result()
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

    public function save() {
        $data = array(
            "nama_kriteria"              => $this->input->post('nama_kriteria'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        if($this->db->insert('kriteria_penilaians',$data)) {
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
        redirect(base_url()."kriteria");
    }

    public function savedetail() {
        $data = array(
            "kriteria_penilaian_id"              => $this->input->post('kriteria_penilaian_id'),
            "nama_penilaian"              => $this->input->post('nama_penilaian'),
            "nilai"              => $this->input->post('nilai'),
            "created_at" => date('Y-m-d H:i:s'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        if($this->db->insert('kriteria_penilaian_details',$data)) {
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
        redirect(base_url()."kriteria/detail/".$this->input->post("kriteria_penilaian_id"));
    }

    public function update() {
        $data = array(
            "nama_kriteria"              => $this->input->post('nama_kriteria'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('kriteria_penilaians',$data)) {
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
        redirect(base_url()."kriteria");
    }

    public function updatedetail() {
        $data = array(
            "nama_penilaian"              => $this->input->post('nama_penilaian'),
            "nilai"              => $this->input->post('nilai'),
            "updated_at" => date('Y-m-d H:i:s'),
        );

        $this->db->where('id', $this->input->post('id'));
        if($this->db->update('kriteria_penilaian_details',$data)) {
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
        redirect(base_url()."kriteria/detail/".$this->input->post("kriteria_penilaian_id"));
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


    public function hapus() {
        $id = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);
        $cek = $this->db->get_where('kriteria_penilaian_details', array('kriteria_penilaian_id' => $id));
        if($cek->num_rows()>0) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Fail!</strong> Gagal hapus data. Data sudah ada di Transaksi.
              </div>');
        }else {
            $this->db->where('id', $id);
            if($this->db->delete('kriteria_penilaians',)) {
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

        redirect(base_url()."kriteria");
    }

    public function hapusdetail() {
        $id = $this->uri->segment(3);
        $tipe = $this->uri->segment(4);

        $ceking = $this->db->get_where('kriteria_pilihs', array('kriteriadetail_id'=>$id));
        if($ceking->num_rows()>0) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal hapus data. Sudah ada dalam transaksi.
            </div>');
            redirect(base_url()."kriteria/detail/".$tipe);
        }

        $this->db->where('id', $id);
        if($this->db->delete('kriteria_penilaian_details')) {
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

        redirect(base_url()."kriteria/detail/".$tipe);
    }

}
