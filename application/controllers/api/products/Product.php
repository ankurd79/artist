<?php
   
require APPPATH . 'libraries/REST_Controller.php';
use Restserver\Libraries\REST_Controller;

     
class Product extends REST_Controller {
    
	  /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       //$this->load->database();
       $this->load->model('api/product/Product_model');

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
        $data=$this->Product_model->insertData($input,$user);
        if($data==1)
            $this->response('Product information added.', REST_Controller::HTTP_CREATED);
        else
            $this->response('Product already present!', REST_Controller::HTTP_OK);
    } 

    public function update_post()
    {
        $input = $this->input->post();
        $user=$this->session->userdata('uid');
        $data=$this->Product_model->updateData($input,$user);
        $this->response('Product information updated.', REST_Controller::HTTP_OK);
       
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
        $data=$this->Product_model->deleteData($input);
        $this->response(['Item deleted successfully.'], REST_Controller::HTTP_OK);
    }
    	
}
?>