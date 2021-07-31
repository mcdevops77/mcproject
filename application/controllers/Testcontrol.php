<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testcontrol extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library(array('form_validation', 'session', 'upload'));
        $this->load->database();
        // if($this->uri->segment(1) != "" && $this->uri->segment(2) != "loginchk" )
        //   {
        //       if(empty($this->session->userdata['sessiondata'])) {
        //           redirect(base_url());
        //       }
        //   }

    }
    
    public function index()	{
    // if(isset($this->session->userdata['sessiondata'])){
    //     $this->dashboard();
    // }else{
		$this->load->view('login');
        
	}   
    // }
    public function loginchk() {
        // print_r($_REQUEST);exit;
        $usrid = $this->input->post('emplcode');
        $usrpwd = $this->input->post('passwd');

        $this->load->model('Testmdl');
        $res = $this->Testmdl->usrlogin($usrid, $usrpwd);
        
        if($res){
            // echo('hi');
            $this->session->set_userdata('usern', $usrid);
            echo '100';
            // echo base_url()."dashboard/";
        } else {

            echo "not valid";
        }
    }
    public function logout(){
        
        $this->session->sess_destroy();
        header('location:'.base_url()."index.php/login");
        

    }
    public function dashboard(){
        if(isset($this->session->userdata['sessiondata'])){
            $this->load->view('dashboard');
        } else{
            $this->load->view('login');
        }
  }
}
?>