<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Globalmgmt extends CI_Controller {

    function __construct() {
    	parent::__construct();
    	$this->module='Global';
    	//$this->load->model('api/'.strtolower($this->module).'/Global_model');
    	$this->load->model('Common_model');
    	
    	
    }

    public function index(){

    	if(!$this->session->userdata('uid')){
			header("Location: ".base_url()."artist_admin-login");
		}

    	$data=array("main_title"=>'Manage Home Page Banners','sub_title'=>'Add Home Page Banners','homebannerlist'=>gethomepagebanners());
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_banner_add',$data);
		$this->load->view('admin/footer');
	}

	public function edit(){

		if(!$this->session->userdata('uid')){
			header("Location: ".base_url()."admin-login");
		}
        
		$locId=base64_decode($this->uri->segment(3));
        $pdata=$this->Unit_model->getData($locId,'');
    	$data=array("main_title"=>'Manage Unit','sub_title'=>'Edit Unit','results'=>$pdata, 'jsfile'=>strtolower($this->module).'','brands'=>$this->Brand_model->getbranddata(),'states'=>$this->Common_model->getstate(),'socialchannels'=>getsocial(),'getparentfacility'=>getparentfacility(),'getparentfacility'=>getparentfacility(),'socialmedia'=>$this->Unit_model->getunitsocialMedia($locId),'nearbydata'=>$this->Unit_model->getunitnearby($locId),'phones'=>$this->Unit_model->getunitPhones($locId),'emails'=>$this->Unit_model->getunitEmails($locId),'othpolicy'=>$this->Unit_model->getunitotherPolicies($locId),'facilities'=>$this->Unit_model->getunitFacilities($locId),'hoteltype'=>$this->Hotelcat_model->getdata('',0));
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_edit',$data);
		$this->load->view('admin/footer');
	}
	
	public function list(){
		if(!$this->session->userdata('uid')){
			header("Location: ".base_url()."admin-login");
		}
		$data['results']=$this->Unit_model->getdata('',0);
		$this->load->view('admin/header',$data);
		$this->load->view('admin/sidebar',$data);
		$this->load->view('admin/'.strtolower($this->module).'/'.strtolower($this->module).'_data_table',$data);
		$this->load->view('admin/footer');
	}
	
	
}