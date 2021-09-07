<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Site extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	
    	
    	$this->load->model('Common_model');
    	$this->load->model('api/category/Category_model');
    	$this->load->model('api/clientsay/Clientsay_model');
    	$this->load->model('api/product/Product_model');
    	$this->load->library('session');

    	
    	
    }

    public function notfound(){
    	$data=array("main_title"=>'Manage','title'=>'Privacy Policy','description'=>'Privacy Policy','keywords'=>'Privacy Policy');
		$this->load->view('site/404',$data);
		
	}

    public function index(){
    	$data=array("main_title"=>'Manage','title'=>'Home','description'=>'Home','keywords'=>'Home','catlist'=>$this->Category_model->getData('',1),'homepagebanners'=>gethomepagebanners(1),'testimonials'=>$this->Clientsay_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/index',$data);
		$this->load->view('site/footer');
	}


	public function about(){
    	$data=array("main_title"=>'Manage','title'=>'About Peeu','description'=>'bout Peeu','keywords'=>'About Peeu','catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/about',$data);
		$this->load->view('site/footer');
	}

	public function terms(){
    	$data=array("main_title"=>'Manage','title'=>'Terms & Conditions','description'=>'Terms & Conditions','keywords'=>'Terms & Conditions','catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/terms',$data);
		$this->load->view('site/footer');
	}

	public function privacy(){
    	$data=array("main_title"=>'Manage','title'=>'Privacy Policy','description'=>'Privacy Policy','keywords'=>'Privacy Policy','catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/privacy-policy',$data);
		$this->load->view('site/footer');
	}

	public function contact(){
    	$data=array("main_title"=>'Manage','title'=>'Contact ','description'=>'Contact ','keywords'=>'Contact ','catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/contact',$data);
		$this->load->view('site/footer');
	}

	public function register(){
		if($this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}
		$metatitle='Registration';
		$metadescription='Registration';
		$metakeywords='Registration';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/register',$data);
		$this->load->view('site/footer');
	}

	public function login(){
		if($this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}
		$metatitle='Login';
		$metadescription='Login';
		$metakeywords='Login';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/login',$data);
		$this->load->view('site/footer');
	}

	public function myaccount(){
		if(!$this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}
		$metatitle='My account';
		$metadescription='My account';
		$metakeywords='My account';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/my-account',$data);
		$this->load->view('site/footer');
	}

	public function editmypassword(){
		if(!$this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}
		$metatitle='My account - edit password';
		$metadescription='My account - edit password';
		$metakeywords='My account - edit password';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/edit-password',$data);
		$this->load->view('site/footer');
	}

	public function forgotpass(){
		if($this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}
		$metatitle='Forgot Password';
		$metadescription='Forgot Password';
		$metakeywords='Forgot Password';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/forgot_password',$data);
		$this->load->view('site/footer');
	}

	public function resetpassword(){

		if($this->session->userdata('artist_site_user')) {
			header("Location:".base_url()."home");	
		}

		$metatitle='Reset Password';
		$metadescription='Reset Password';
		$metakeywords='Reset Password';
		$mailinfo=$this->uri->segment(2);
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'email'=>$mailinfo,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/reset_password',$data);
		$this->load->view('site/footer');

	}	
	
	public function artcategorydetails(){
		$catId=base64_decode($this->uri->segment(4));
    	
        if(!(is_numeric($catId))){
        	header("Location:".base_url()."");
        }
		
        $detailsArr=$this->Category_model->getData($catId,'');
        //print_r($detailsArr);

        //exit;
		if($catId<>$detailsArr['0']['id']){
        	header("Location:".base_url()."");
        }
		$canonicalurl=urlgenerator('art-category',$detailsArr['0']['category_name'],$detailsArr['0']['id']);

		if(strcmp($canonicalurl,getAddress())!=0){
			exit;

		}
		$metatitle=$detailsArr['0']['meta_title'];
		$metadescription=$detailsArr['0']['meta_description'];
		$metakeywords=$detailsArr['0']['meta_keywords'];
		
		


    	$data=array("title"=>$metatitle,'keywords'=>$metakeywords,'description'=>$metadescription,'details'=>$detailsArr,'catlist'=>$this->Category_model->getData('',1),'artlist'=>getartbycategory($catId,0));
		$this->load->view('site/header',$data);
		$this->load->view('site/artcat_details',$data);
		$this->load->view('site/footer');
	}

	public function artdetails(){
		$artId=base64_decode($this->uri->segment(5));
        if(!(is_numeric($artId))){
        	header("Location:".base_url()."home");
        }
		$details=$this->Product_model->getDatas($artId,'');

		if($artId<>$details[0]['id']){
        	header("Location:".base_url()."home");
        	//echo 'poop';
        }
		//$canonicalurl=urlgenerator('art-category',$detailsArr['0']['category_name'],$detailsArr['0']['id']);
        /*
		if(strcmp($canonicalurl,getAddress())!=0){
			exit;

		}
		*/
		$metatitle=$details[0]['meta_title'];
		$metadescription=$details[0]['meta_description'];
		$metakeywords=$details[0]['meta_keywords'];
		$pagecategory=$this->Category_model->getData($details[0]['category_id'],'');



    	$data=array("main_title"=>'Manage','artdetails'=>$details,'title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1),'gallerylist'=>$this->Product_model->getbanners($artId,''),'pagecategory'=>$pagecategory);
		$this->load->view('site/header',$data);
		$this->load->view('site/art_details',$data);
		$this->load->view('site/footer');
	}

	
	public function processLogin(){
    		$data = $this->input->post();
    		$getHash=$this->Common_model->getHashcustomer($this->input->post('email'));
    		if(password_verify($this->input->post('password'), $getHash)) {
    			$user_login=array('uemail'=>$this->input->post('email'),'upass'=>$this->input->post('password'));
    			$pdata=$this->Common_model->login_customer($user_login['uemail'],$getHash);
    	    	$this->session->set_userdata('uid',$pdata['id']);
    			$this->session->set_userdata('uname',$pdata['email']);
    			$this->session->set_userdata('fname',$pdata['first_name']);
    			$this->session->set_userdata('lname',$pdata['last_name']);
    			$this->session->set_userdata('mobile',$pdata['mobile']);
    			$this->session->set_userdata('artist_site_user',$pdata['id']);
    			header("Location:".base_url()."home");
    			exit;
    		
    			
            }else{
                echo $msg=0;
            }
            
            //echo $msg;
	}

	public function logout(){
    	//session_destroy();
    	$this->session->unset_userdata('artist_site_user');

    	header("Location:".base_url()."home");
    }
}