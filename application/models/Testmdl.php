<?php

defined("BASEPATH") or exit("No direct script access allowed");



class Testmdl extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // public function usrlogin($usrid, $usrpwd) {
    //    $this->db->select('*');
    //    $this->db->from('tb_tst_user');
    //    $this->db->where('tb_tst_employcode', $usrid);
    //    $this->db->where('tb_tst_passwd', md5($usrpwd));
       
    //    $query = $this->db->get();
       
    //     if($query->num_rows() != 0){
    //     //   echo "hi Welcome";
    //       $session_data = $query->row_array();
    //       $this->session->set_userdata('sessiondata', $session_data);
    //       $this->session->set_userdata('user', $usrid);
    //       return true;
    //     } else{
    //         return false;
    //     }
        
    // }

    public function usrlogin($usrid, $usrpwd){
        $this->db->select('*');
        $this->db->from('advt_sec_users');
        $this->db->where('sec004_userid', $usrid);
        $this->db->where('sec004_password', md5($usrpwd));

        $query = $this->db->get();

        if($query->num_rows() !=0){
            $session_data = $query->row_array();
          $this->session->set_userdata('sessiondata', $session_data);
          $this->session->set_userdata('user', $usrid);
          return true;
        } else{
            return false;
        }

    }
}
?>