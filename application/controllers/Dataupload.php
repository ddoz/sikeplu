<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dataupload extends CI_Controller {

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

        //get proposal
        $id = $this->session->userdata('userId');
        $query = $this->db->get_where("proposals",array("user_id" => $id));
        $formula = [];
        $proposal_id = 0;
        if($query->num_rows() > 0) {
            $tipemedia = $query->row();
            $proposal_id = $tipemedia->id;
            $formula = $this->db->get_where("formulir_bukti_tayangs",array("tipemedia_id"=>$tipemedia->tipemedia_id))->result();
        }

        $data = array(
            'script'    => 'script/js_dataupload',
            'page'      => 'dataupload/index',
            'link'      => 'dataupload',
            'link_t'    => 'data',
            'formula'     => $formula,
            'proposal_id'      => $proposal_id
        );
		$this->load->view('layout/template',$data);
    }

    /**
	 * JSON 
	 * For Datatables process
	 */
	public function json_datauplaod(){
        $id = $this->session->userdata('userId');
        $this->load->library('datatables');
        $this->datatables->select('bukti_tayangs.*,formulir_bukti_tayangs.kolom,formulir_bukti_tayangs.tipe');
        $this->datatables->from('bukti_tayangs');
        $this->datatables->join('formulir_bukti_tayangs','formulir_bukti_tayangs.id=bukti_tayangs.formula_id');
        $this->datatables->where(array('bukti_tayangs.user_id'=>$id));
        $this->datatables->add_column('created_at',function($row){
            return date('Y-m-d H:i:s',strtotime($row['created_at']));
        });
        $this->datatables->add_column('value',function($row){
            if($row['tipe']=='file') {
                $val = $row['value'];
                return "<a target='_blank' href='".base_url()."berkas/buktitayang/".$val."'>Lihat Dokumen</a>";
            }else {
                return $row['value'];
            }
        });
        $this->datatables->add_column('action',function($row){
            $button = "<div class='btn-group'>";
            $button .= '<a onclick="return confirm(\'Hapus Data?\')" href="'.base_url()."dataupload/hapus/".$row['id'].'" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a>';
            $button .= "</div>";
            return $button;
        });
        echo $this->datatables->generate();
    }

    public function detail() {
        $id = $this->uri->segment(3);
        if(is_numeric($id)) {
            $detail = $this->Model_upload->getById($id);
            $revisiikhtisar = $this->Model_revisi->getIkhtisarByMasterId($id);
            $revisidetail = $this->Model_revisi->getDetailByMasterId($id);
            if($detail['status']) {
                $data = array(
                    'script'    => 'script/js_dataupload',
                    'page'      => 'dataupload/detail',
                    'link'      => 'dataupload',
                    'link_t'    => 'data',
                    'table'     => $detail['output'],
                    'revisiikhtisar'     => $revisiikhtisar,
                    'revisidetail'     => $revisidetail,
                );
                $this->load->view('layout/template',$data);
            }else {
                $this->session->set_flashdata('status','<div class="alert alert-warning alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Empty!</strong> Data Tidak Ditemukan.
                </div>.');
                redirect(base_url().'dataupload');
            }
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-warning alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Empty!</strong> Data Tidak Ditemukan.
            </div>.');
            redirect(base_url().'dataupload');
        }
    }

    function checkEmpty($field) {
        if($field=="") {
            return true;
        }
    }

    public function save() {
        $this->db->trans_begin();
        foreach ($this->input->post('formula_id') as $key => $val) {
            $insert = array(
                'proposal_id' => $this->input->post('proposal_id'),
                'user_id' => $this->session->userdata('userId'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'formula_id' => $val
            );
            if($this->checkiffile($val)->tipe == 'file') {
                $config['upload_path']          = './berkas/buktitayang/';
                $config['allowed_types']        = 'jpg|png|jpeg|pdf|PDF';
                $config['max_size']             = 2048; // 1MB
                $config['encrypt_name']         = true;
                $this->load->library('upload',$config);
                $files = $_FILES;
                $cpt = count($_FILES['value']['name']);
                for($i=0; $i<$cpt; $i++)
                {           
                    $_FILES['value']['name']= $files['value']['name'][$i];
                    $_FILES['value']['type']= $files['value']['type'][$i];
                    $_FILES['value']['tmp_name']= $files['value']['tmp_name'][$i];
                    $_FILES['value']['error']= $files['value']['error'][$i];
                    $_FILES['value']['size']= $files['value']['size'][$i];    

                    $this->upload->initialize($config);
                    if($this->upload->do_upload('value')) {
                        $insert['value'] = $this->upload->data()['file_name'];
                    }else {
                        echo $this->upload->display_errors();die();
                        $insert['value'] = 'noimage';
                    }
                }
                
            }else {
                $key = $key -1;
                $insert['value'] = $this->input->post('value')[$key];
            }
            $this->db->insert('bukti_tayangs', $insert);
        }

        if($this->trans_status === FALSE) {
            $this->db->trans_rollback();
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Data gagal disimpan.
          </div>');
        }else {
            $this->db->trans_commit();
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Data berhasil disimpan.
          </div>');
        }
        redirect(base_url().'dataupload');
    }

    public function checkiffile($id) {
        return $this->db->get_where('formulir_bukti_tayangs',array('id' => $id))->row();
    }

    public function hapus() {
        $this->db->where('id',$this->uri->segment(3));
        if($this->db->delete('bukti_tayangs')) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Data berhasil disimpan.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Data gagal disimpan.
          </div>');
        }
        redirect(base_url().'dataupload');
    }

}
