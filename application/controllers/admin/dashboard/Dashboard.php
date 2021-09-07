<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	//$this->load->helper('form');
    	//$this->load->helper('url');
    	//$this->load->helper('site_helper');
    }
    
    public function index(){
    	if(!$this->session->userdata('artist_admin_login')){
			header("Location: admin-login");
		}
		$data='';
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/dashboard/index',$data);
		$this->load->view('admin/footer');
	}
	
	
	
	
    
    
    
    
    
    
    
        

}