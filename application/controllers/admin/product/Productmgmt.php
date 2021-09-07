<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Productmgmt extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	$this->module='Product';
    	$this->load->model('api/'.strtolower($this->module).'/Product_model');
    	$this->load->model('api/Category/Category_model');
    	//$this->load->model('api/Category/Category_model');
    	$this->load->model('Common_model');
    	
    	
    }

    public function index(){

    	if(!$this->session->userdata('artist_admin_login')){
			header("Location: ".base_url()."admin-login");
		}

    	$data=array("main_title"=>'Manage '.$this->module.'','sub_title'=>'Add '.$this->module.'','jsfile'=>strtolower($this->module),'categorylist'=>$this->Category_model->getData());
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
        $pdata=$this->Product_model->getData($locId,'');
    	$data=array("main_title"=>'Manage '.$this->module.'','sub_title'=>'Edit '.$this->module.'','results'=>$pdata, 'jsfile'=>strtolower($this->module),'categorylist'=>$this->Category_model->getData(),'gallerylist'=>$this->Product_model->getbanners($locId,''));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function list($oid=''){
		if(!$this->session->userdata('artist_admin_login')){
			header("Location: ".base_url()."admin-login");
		}

		if ($this->input->server('REQUEST_METHOD') === 'GET') {
			$pid=$this->uri->segment(5);
		} elseif ($this->input->server('REQUEST_METHOD') === 'POST') {
		   //its a post
			$pdata = $this->input->post();
			$pid=$pdata['product_id'];
		}

		$data['results']=$this->Product_model->getdata($pid);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_data_table',$data);
	}
	
	
	
    
    
    
    
    
    
    
        

}