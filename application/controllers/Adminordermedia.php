<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminordermedia extends CI_Controller {

	public function __construct() {
        parent::__construct();
        if(empty($this->session->userdata('userId'))) {
			redirect(base_url());
        }
        $this->load->model('Model_pengguna');
	}
	
	public function index()
	{
    $this->load->helper('data');
    $this->db->select('order_media.*,proposals.id as id_proposal,proposals.nama_media');
    $this->db->from('order_media');
    $this->db->join('proposals','proposals.id=order_media.id_media');
    $pengajuan = $this->db->get()->result();

    $tipemedia = $this->db->get("tipe_media")->result();
    $ukw = $this->db->get_where("kriteria_penilaian_details",array("kriteria_penilaian_id"=>15))->result();
    $media = $this->db->get_where("proposals",array("status"=>'diterima'))->result();
    $data = array(
        'script'    => 'script/js_pengajuan',
        'page'      => 'admin/ordermedia',
        'link'      => 'adminordermedia',
        'proposal' => $pengajuan,
        'tipemedia'      => $tipemedia,
        'ukw' => $ukw,
        'media'      => $media
    );
    $this->load->view('layout/template',$data);
  }

  public function form() {
    $this->load->helper('data');

    $media = $this->db->query("SELECT proposals.*,kriteria_penilaian_details.nama_penilaian,tipe_media.nama as tipe_media FROM `proposals` 
    LEFT JOIN `kriteria_pilihs` ON `proposals`.`id`=`kriteria_pilihs`.`proposal_id` AND kriteria_pilihs.kriteria_id = 15
    LEFT JOIN `kriteria_penilaian_details` ON `kriteria_pilihs`.`kriteriadetail_id`=`kriteria_penilaian_details`.`id`
    JOIN `tipe_media` ON `tipe_media`.`id`=`proposals`.`tipemedia_id`
    WHERE `status` = 'diterima'")->result();


      $data = array(
          'script'    => 'script/js_ordermedia',
          'page'      => 'admin/createorder',
          'link'      => 'adminordermedia',
          'media'      => $media,
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

    $config['upload_path']          = './berkas/sk/';
    $config['allowed_types']        = 'jpg|png|jpeg|pdf|PDF';
    $config['max_size']             = 2048; // 1MB
    $config['encrypt_name']         = true;
    
    $this->load->library('upload',$config);

    if ($this->upload->do_upload('surat_order')) {
        $surat_order = $this->upload->data("file_name");
        $data = array(
          "id_media"              => $this->input->post('id_media'),
          "keterangan_order"              => $this->input->post('keterangan_order'),
          "status_order" => "0",
          "surat_order" => $surat_order,
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
    } else {
      $errfile = $this->upload->display_errors();
      $this->session->set_flashdata('status','<div class="alert alert-danger alert-dismissible">
          <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
          <strong>Fail!</strong> Gagal simpan data. Periksa File Surat Order.'. $errfile.'
      </div>');
    }

    
    redirect(base_url()."adminordermedia");
}

public function buktitayang() {
  $idorder = $this->uri->segment(3);
  $this->db->select("bukti_tayangs.*,formulir_bukti_tayangs.kolom,formulir_bukti_tayangs.tipe");
  $this->db->join("formulir_bukti_tayangs","formulir_bukti_tayangs.id=bukti_tayangs.formula_id");
  $list = $this->db->get_where("bukti_tayangs",array("order_id"=>$idorder))->result();
  $data = array(
      'script'    => 'script/js_pengajuan',
      'page'      => 'admin/buktitayang',
      'link'      => 'adminordermedia',
      'list'      => $list,
  );
  $this->load->view('layout/template',$data);
}
  

  public function approve() {
    $this->db->where('id',$this->uri->segment(3));
    $this->db->update('order_media',array('status_order'=>'1'));

    $order = $this->db->get_where('order_media',array('id'=>$this->uri->segment(3)))->row();
    
    //get email
    $this->db->select("proposals.email_redaksi");
    $this->db->from("proposals");
    // $this->db->join("users","users.id=proposals.user_id");
    $this->db->where(array("proposals.id"=>$order->id_media));
    $email = $this->db->get()->row()->email_redaksi;

    $this->db->db_debug = false;
		// Konfigurasi email
        $config = [
          'mailtype'  => 'html',
          'charset'   => 'utf-8',
          'protocol'  => 'smtp',
          'smtp_host' => 'mail.lampungutarakab.go.id',
          'smtp_user' => 'sikeplu@lampungutarakab.go.id',  // Email gmail
          'smtp_pass'   => 'sikeplu2022',  // Password gmail
          'smtp_crypto' => 'tls',
          'smtp_port'   => 587,
          'newline' => "\r\n"
      ];

        // Load library email dan konfigurasinya
        $this->load->library('email', $config);

        // Email dan nama pengirim
        $this->email->from('sikeplu@lampungutarakab.go.id', 'Sikeplu');

        // Email penerima
        $this->email->to($email); // Ganti dengan email tujuan

        // Lampiran email, isi dengan url/path file
        // $this->email->attach(base_url()."assets/front/images/logo.png");

        // Subject email
        $this->email->subject('Informasi Order Media SIKEPLU');

        $id = $this->uri->segment(3);

        // Isi email
        $this->email->message("Ada Order Media yang masuk <br>Silahkan Klik Link dibawah ini untuk melakukan aktivasi Akun.<br><br> Klik <strong><a href='".base_url()."file/download/".md5($id)."' target='_blank' rel='noopener'>disini</a></strong> Untuk Download Surat Order atau Silahkan Login di Akun Anda kemudian pilih Menu Order Media.");

        $this->email->send();

    // $this->session->set_flashdata('status','<div class="alert alert-success alert-dismissible">
    //     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    //     <strong>Success!</strong> Berhasil update data.
    //   </div>');
    //   redirect(base_url()."adminordermedia");
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
