<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_pengguna extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Model_aktiviti');
    }
    
    function get() {
        $this->db->select("users.*,divisi.divisiNama");
        $this->db->from("users");
        $this->db->join('divisi','divisi.divisiId=users.userDivisi');
        return $this->db->get()->result();
    }

    function getById($id) {
        return $this->db->get_where('users',array('userId'=>$id))->row();
    }

    function getByUser($id) {
        return $this->db->get_where('users',array('userName'=>$id))->row();
    }

    function store($data){
        $cek = $this->getByUser($data['userName']);
        if(!empty($cek)) {
            return false;
        }else {
            $ins = $this->db->insert('users',$data);
            $this->db->insert('aktiviti',array('aktivitiNama'=>$this->db->last_query(),'aktivitiCreatedBy'=>$this->session->userdata('userId')));
            return $ins;
        }
    }

    function update($id,$data,$olduser) {
        if($data['userName']==$olduser) {
            $this->db->where('userId',$id);
            $up = $this->db->update('users',$data);
            $this->db->insert('aktiviti',array('aktivitiNama'=>$this->db->last_query(),'aktivitiCreatedBy'=>$this->session->userdata('userId')));
            return $up;
        }else {
            $cek = $this->getByUser($olduser);
            if(!empty($cek)) {
                return false;
            }else {
                $this->db->where('userId',$id);
                $up = $this->db->update('users',$data);
                $this->db->insert('aktiviti',array('aktivitiNama'=>$this->db->last_query(),'aktivitiCreatedBy'=>$this->session->userdata('userId')));
                return $up;
            }
        }
        
    }

    function remove($id) {
        $this->db->where('userId',$id);
        $del = $this->db->delete('users');
        $this->db->insert('aktiviti',array('aktivitiNama'=>$this->db->last_query(),'aktivitiCreatedBy'=>$this->session->userdata('userId')));
        return $del;
    }

    function changePassword($old,$new) {
        $id = $this->session->userdata("userId");
        $cekuser = $this->db->get_where('users',array('id'=>$id))->row();
        if(!empty($cekuser)) {
            if(password_verify($old,$cekuser->userPassword)) {
                $update = array(
                    "password"        => password_hash($new,PASSWORD_DEFAULT)
                );
                $this->db->where('email',$id);
                $this->db->update('users',$update);
                return true;
            }else {
                return false;
            }
        }else {
            return false;
        }
    }

    function resetpass($id) {
        $this->db->where('userId',$id);
        return $this->db->update('users',array('userPassword'=>password_hash('123456',PASSWORD_DEFAULT)));
    }
     
}