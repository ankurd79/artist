<?php

class Clientsay_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->model('Common_model');
           

  }
 
 public function insertData($data,$user){
        //print_r($data);
        //exit;
        
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }
            



            $finalArray=array('client_name'=>$data['client_name'],'text'=>htmlentities($data['text']),'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>$pshow);

            $this->db->insert(csay,$finalArray);
            $lastinsertedId = $this->db->insert_id();


        $msg=1;
        
        return $msg;
}


public function updateData($data,$user){
            $updateid=base64_decode($data['csay_id']);
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }
           
           
               $finalArray=array('client_name'=>$data['client_name'],'text'=>htmlentities($data['text']),
              'updated_on'=> date_stamp(),'updated_by' => $user,'is_active'=>$pshow);

            
              $this->db->where('id',$updateid);     
              $this->db->update(csay,$finalArray);
              //echo $this->db->last_query();
              //exit;
        

        $msg=1;
        
    return $msg;
}


    public function getdata($id='',$site=''){
        $this->db->select('*');
        
        if($id>0){
          $this->db->where('id', $id); 
        }
        if($site=='1'){
            $this->db->where('is_active',1);
            $this->db->order_by('id','DESC');
        }
        
        $this->db->from(csay);
        
      
      if($query=$this->db->get()){
        //echo $this->db->last_query();
          //return $query->row_array();
          return $query->result_array();
      }else{
        return false;
      } 

    }

    public function deleteData($data){

                $this->db->where('id', $data['id']);
                $this->db->delete(csay);
                
                $msg=1;
                return $msg;
    }

    
      
    

    









}











