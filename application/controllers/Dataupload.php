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

    public function index() {
        redirect(base_url());
    }
	
	public function list()
	{
        $id_proposal = $this->uri->segment(3);
        $id_order = $this->uri->segment(4);
        
        //get proposal
        $id = $this->session->userdata('userId');

        $query = $this->db->get_where("proposals",array("id" => $id_proposal));

        $formula = [];

        $this->db->select("bukti_tayangs.*,formulir_bukti_tayangs.kolom,formulir_bukti_tayangs.tipe");
        $this->db->join("formulir_bukti_tayangs","formulir_bukti_tayangs.id=bukti_tayangs.formula_id");
        $list = $this->db->get_where("bukti_tayangs",array("order_id"=>$id_order))->result();
       
        if($query->num_rows() > 0) {
            $tipemedia = $query->row();
            $formula = $this->db->get_where("formulir_bukti_tayangs",array("tipemedia_id"=>$tipemedia->tipemedia_id))->result();
        }

        $data = array(
            'script'    => 'script/js_dataupload',
            'page'      => 'dataupload/index',
            'link'      => 'ordermedia',
            'formula'     => $formula,
            'proposal_id'      => $id_proposal,
            'id_order'      => $id_order,
            'list' => $list,
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
        $this->load->model('Model_upload');
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
        $id_proposal = $this->input->post('proposal_id');
        $id_order = $this->input->post('id_order');
        $this->db->trans_begin();

        // print_r($this->input->post());
        // print_r($_FILES);
        // die();

        foreach ($this->input->post('formula_id') as $key => $val) {
            $insert = array(
                'proposal_id' => $this->input->post('proposal_id'),
                'order_id' => $id_order,
                'user_id' => $this->session->userdata('userId'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
                'formula_id' => $val
            );


            if($this->checkiffile($val)->tipe == 'file') {
                $config['upload_path']          = './berkas/buktitayang/';
                $config['allowed_types']        = 'pdf|PDF';
                $config['max_size']             = 5048; // 1MB
                $config['encrypt_name']         = true;
                $this->load->library('upload',$config);
                // $cpt = count($_FILES['value']['name']);
            

                    $this->upload->initialize($config);
                    if($this->upload->do_upload('value'.$val)) {
                        $insert['value'] = $this->upload->data('file_name');
                    }else {
                        $err = $this->upload->display_errors();
                        $this->db->trans_rollback();
                        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Fail!</strong> Data gagal disimpan. '.$this->upload->display_errors().'
                        </div>');
                        // $insert['value'] = 'noimage';
                        redirect(base_url().'dataupload/list/'.$id_proposal.'/'.$id_order);
                        exit();
                    }
                // }
                
            }else {
                $insert['value'] = $this->input->post('value'.$val);
            }

            // print($insert);
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
        redirect(base_url().'dataupload/list/'.$id_proposal.'/'.$id_order);
    }

    public function checkiffile($id) {
        return $this->db->get_where('formulir_bukti_tayangs',array('id' => $id))->row();
    }

    public function hapus() {

        $id_proposal = $this->uri->segment(4);
        $id_order = $this->uri->segment(5);

        $this->db->where('id',$this->uri->segment(3));
        if($this->db->delete('bukti_tayangs')) {
            $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Data berhasil dihapus.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Data gagal dihapus.
          </div>');
        }
        redirect(base_url().'dataupload/list/'.$id_proposal.'/'.$id_order);
    }

}
