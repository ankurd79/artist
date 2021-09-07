<?php
   
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

     
class User extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
       $this->load->model('api/user/User_model');

    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */

    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function add_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->User_model->insertData($input,$user);
        if($data==1){
            //sendmail($input,'registration','Registration Confirmation');
            $this->response('User added.', REST_Controller::HTTP_CREATED);
            
        }else{
            $this->response('User already present!', REST_Controller::HTTP_OK);
        }
    } 

    public function update_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->User_model->updateData($input,$user);
        $this->response('User information updated.', REST_Controller::HTTP_OK);
       
    }

    public function updatepassword_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->User_model->updatepassword($input,$user);
        $this->response('Password updated.', REST_Controller::HTTP_OK);
       
    }

    public function resetpassword_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->User_model->resetpassword($input);
        if($data==1){
            //sendmail($input,'registration','Registration Confirmation');
            $this->response('1', REST_Controller::HTTP_CREATED);
            
        }else{
            $this->response('0', REST_Controller::HTTP_OK);
        }

    }

    public function mailchecksendmail_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->User_model->mailchecksendmail($input);
        if($data==0){
            //sendmail($input,'reset-password','Reset Password');
            $this->response('0', REST_Controller::HTTP_OK);
            
        }else{
            $this->response('1', REST_Controller::HTTP_OK);
        }
       
    }
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    
     
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    

    
    	
}
?>