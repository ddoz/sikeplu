<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna extends CI_Controller {

	public function __construct() {
    parent::__construct();
    if(empty($this->session->userdata('userId')) || $this->session->userdata('userDivisiId')!='1') {
			redirect(base_url());
		}
    $this->load->model(array('Model_pengguna','Model_divisi','Model_notifikasi'));
	}
	
	public function index()
	{
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'pengguna/index',
            'link'      => 'pengguna',
            'link_t'    => 'master',
            'table'     => $this->Model_pengguna->get()
        );
		$this->load->view('layout/template',$data);
    }
    
    public function form() {
        $data = array(
            'script'    => 'script/js_pengguna',
            'page'      => 'pengguna/form',
            'link'      => 'pengguna',
            'link_t'    => 'master',
            'divisi'    => $this->Model_divisi->get()
        );
        if(!empty($this->uri->segment(3))) {
            $data['mode'] = 'edit';
            $data['form'] = $this->Model_pengguna->getById($this->uri->segment(3));
        }else {
            $data['mode'] = 'save';
        }
		$this->load->view('layout/template',$data);
    }

    public function save() {
        $data = array(
            "userName"              => $this->input->post('userName'),
            "userPassword"          => password_hash($this->input->post('userPassword'),PASSWORD_DEFAULT),
            "userNamaLengkap"       => $this->input->post('userNamaLengkap'),
            "userDivisi"            => $this->input->post('userDivisi'),
            "userCreatedAt"     => date('Y-m-d H:i:s')
        );

        if($this->Model_pengguna->store($data)) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil simpan data.
          </div>');
            redirect(base_url()."pengguna");
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal simpan data.
          </div>');
            redirect(base_url()."pengguna");
        }
    }

    public function edit() {
        $id = $this->input->post('userId',true);
        $kat = array("userName"=>$this->input->post('userName',true),"userNamaLengkap"=>$this->input->post('userNamaLengkap',true),"userDivisi"=>$this->input->post('userDivisi',true));
        if($this->Model_pengguna->update($id,$kat,$this->input->post('userNameOld'))) {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil ubah data.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal ubah data.
          </div>');
        }
        redirect(base_url()."pengguna");
    }

    public function delete() {
        $id = $this->uri->segment(3);
        if($this->Model_pengguna->remove($id)) {
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
        redirect(base_url()."pengguna");
    }

    public function resetpassword() {
        $id = $this->uri->segment(3);
        if($this->Model_pengguna->resetpass($id)) {
            $this->session->set_flashdata('status','<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil reset password.
          </div>');
        }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal reset password.
          </div>');
        }
        redirect(base_url().'pengguna');
    }

    public function kirimNotif() {
      $id = $this->uri->segment(3);
      $notif = $this->db->get_where('akunnotifikasi',array('userId'=>$id))->row_array();
      $nama = $this->session->userdata('userNamaLengkap');
      if(!empty($notif)) {
          $a = $this->Model_notifikasi->sendMessage("Pemberitahuan. Terima kasih telah menggunakan Paperless System.",array($notif['notifId']),$id,$this->session->userdata('userId'));
          if($a) {
            $this->session->set_flashdata('status','<div class="alert alert-info alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> Berhasil kirim notifikasi.
          </div>');
          }else {
            $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Gagal kirim notifikasi.
          </div>');
          }
      }else {
        $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Fail!</strong> Akun belum terdaftar.
          </div>');
      }
      redirect(base_url().'pengguna');
    }

}
