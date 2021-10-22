<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_upload extends CI_Model {


    function __construct() {
        parent::__construct();
        $this->load->model('Model_aktiviti');
        $this->load->model('Model_notifikasi');
    }
    
    function store() {
        
        $config['upload_path']          = './berkas/proposal/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|PDF';
        $config['max_size']             = 2048; // 1MB
        $config['encrypt_name']         = true;
        
        $this->load->library('upload',$config);

        $insert = [
            'tipemedia_id'=>$this->input->post('tipemedia_id'),
            'nama_media'=>$this->input->post('nama_media'),
            'nama_pic'=>$this->input->post('nama_pic'),
            'jabatan_pic'=>$this->input->post('jabatan_pic'),
            'alamat_redaksi_1'=>$this->input->post('alamat_redaksi_1'),
            'alamat_redaksi_2'=>$this->input->post('alamat_redaksi_2'),
            'provinsi'=>$this->input->post('provinsi'),
            'kota'=>$this->input->post('kota'),
            'kode_pos'=>$this->input->post('kode_pos'),
            'email_redaksi'=>$this->input->post('email_redaksi'),
            'kontak_redaksi'=>$this->input->post('kontak_redaksi'),
            'website'=>$this->input->post('website'),
            'status'=> 'draft',
            'user_id'=>$this->session->userdata('userId'),
            'created_at'=>date('Y-m-d H:i:s')
        ];
        if ($this->upload->do_upload('kartu_identitas_pic')) {
            $insert['kartu_identitas_pic'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('sk_pic')) {
            $insert['sk_pic'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('surat_permohonan_kerjasama')) {
            $insert['surat_permohonan_kerjasama'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('proposal_penawaran')) {
            $insert['proposal_penawaran'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('siup_situ')) {
            $insert['siup_situ'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('npwp')) {
            $insert['npwp'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('sertifikat_kemenkumham')) {
            $insert['sertifikat_kemenkumham'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        if ($this->upload->do_upload('sertifikat_dewan_pers')) {
            $insert['sertifikat_dewan_pers'] = $this->upload->data("file_name");
        } else {
            return false;
        }
        
        if($this->db->insert('proposals',$insert)) {
            return true;
        }
        return false;

    }

    function update($row) {
        
        $config['upload_path']          = './berkas/proposal/';
        $config['allowed_types']        = 'jpg|png|jpeg|pdf|PDF';
        $config['max_size']             = 2048; // 1MB
        $config['encrypt_name']         = true;
        
        $this->load->library('upload',$config);

        $insert = [
            'tipemedia_id'=>$this->input->post('tipemedia_id'),
            'nama_media'=>$this->input->post('nama_media'),
            'nama_pic'=>$this->input->post('nama_pic'),
            'jabatan_pic'=>$this->input->post('jabatan_pic'),
            'alamat_redaksi_1'=>$this->input->post('alamat_redaksi_1'),
            'alamat_redaksi_2'=>$this->input->post('alamat_redaksi_2'),
            'kode_pos'=>$this->input->post('kode_pos'),
            'email_redaksi'=>$this->input->post('email_redaksi'),
            'kontak_redaksi'=>$this->input->post('kontak_redaksi'),
            'website'=>$this->input->post('website'),
        ];

        if($row->provinsi!=$this->input->post('provinsi') && $this->input->post('provinsi')!="") {
            $insert['provinsi'] = $this->input->post('provinsi');
        }
        if($row->kota!=$this->input->post('kota')  && $this->input->post('kota')!="") {
            $insert['kota'] = $this->input->post('kota');
        }


        if(!empty($_FILES['kartu_identitas_pic']['name'])) {
            if ($this->upload->do_upload('kartu_identitas_pic')) {
                $insert['kartu_identitas_pic'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['sk_pic']['name'])) {
            if ($this->upload->do_upload('sk_pic')) {
                $insert['sk_pic'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['surat_permohonan_kerjasama']['name'])) {
            if ($this->upload->do_upload('surat_permohonan_kerjasama')) {
                $insert['surat_permohonan_kerjasama'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['proposal_penawaran']['name'])) {
            if ($this->upload->do_upload('proposal_penawaran')) {
                $insert['proposal_penawaran'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['siup_situ']['name'])) {
            if ($this->upload->do_upload('siup_situ')) {
                $insert['siup_situ'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['npwp']['name'])) {
            if ($this->upload->do_upload('npwp')) {
                $insert['npwp'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['sertifikat_kemenkumham']['name'])) {
            if ($this->upload->do_upload('sertifikat_kemenkumham')) {
                $insert['sertifikat_kemenkumham'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }
        if(!empty($_FILES['sertifikat_dewan_pers']['name'])) {
            if ($this->upload->do_upload('sertifikat_dewan_pers')) {
                $insert['sertifikat_dewan_pers'] = $this->upload->data("file_name");
            } else {
                return false;
            }
        }

        $this->db->where('id',$row->id);
        if($this->db->update('proposals',$insert)) {
            return true;
        }
        return false;

    }

}