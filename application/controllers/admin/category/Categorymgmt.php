<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Categorymgmt extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	$this->module='Category';
    	$this->load->model('api/'.strtolower($this->module).'/Category_model');
    	$this->load->model('Common_model');
    	
    	
    }

    public function index(){

    	if(!$this->session->userdata('artist_admin_login')){
			header("Location: ".base_url()."admin-login");
		}

    	$data=array("main_title"=>'Manage Product '.$this->module.'','sub_title'=>'Add Product '.$this->module.'','jsfile'=>strtolower($this->module));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_add',$data);
		$this->load->view('admin/footer');
	}

	public function edit(){
        if(!$this->session->userdata('artist_admin_login')){
			header("Location: ".base_url()."admin-login");
		}

        
		$locId=base64_decode($this->uri->segment(3));
        $pdata=$this->Category_model->getData($locId,'');
    	$data=array("main_title"=>'Manage Product '.$this->module.'','sub_title'=>'Edit Product '.$this->module.'','results'=>$pdata, 'jsfile'=>strtolower($this->module));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function list(){
		if(!$this->session->userdata('artist_admin_login')){
			header("Location: ".base_url()."admin-login");
		}
		$data['results']=$this->Category_model->getdata('',0);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_data_table',$data);
	}
	
	
	
    
    
    
    
    
    
    
        

}