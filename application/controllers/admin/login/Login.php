<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	//$this->load->helper('form');
    	//$this->load->helper('url');
    	//$this->load->helper('site_helper');
    	$this->load->model('Common_model');
    }
    
    public function index()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
		$data = array('title' => 'Login');
		
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		$this->load->view('admin/login/login', $data);

		if($this->input->post())
		{
			$getHash=$this->Common_model->getHash($this->input->post('uname'));

			if(password_verify($this->input->post('upass'), $getHash)) {
    			$user_login=array('uname'=>$this->input->post('uname'),'upass'=>$this->input->post('upass'));
    			$data=$this->Common_model->login_admin($user_login['uname'],$getHash);

    		
    			if($data){
    			    //$this->session->set_userdata('logged_in_admin',$sess_array);
    				$this->session->set_userdata('uid',$data['id']);
    				$this->session->set_userdata('uname',$data['email']);
    				$this->session->set_userdata('logged_in_admin',$data['id']);
    				$this->session->set_userdata('artist_admin_login','1');
    				header("Location: dashboard");
    			}else{
    				echo '<script>alert("Invalid login attempt!")</script>';
    	 
    			}	
			}else{
			    
			    echo '<script>alert("Invalid login attempt!")</script>';
			}
			
			$this->session->set_flashdata('msg', 'Error occured,Try again.');
		}

		
	
	}
	
	
	
	
    
    
    
    
    
    
    
        

}