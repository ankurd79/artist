<?php
   
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

     
class Globals extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
       $this->load->model('api/global/Global_model');

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
        $data=$this->Global_model->insertData($input,$user);
        if($data==1)
            $this->response('Banner added.', REST_Controller::HTTP_CREATED);
        
    } 

    public function update_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->Global_model->updateData($input,$user);
        $this->response('Banner updated.', REST_Controller::HTTP_OK);
       
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
    

    public function remove_post()
    {
        $input = $this->input->post();
        $data=$this->Global_model->deleteData($input);
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}
?>