<?php


class User_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->model('Common_model');
           
  }
 
 public function insertData($data,$user){
        $chkVal=$this->Common_model->chkDuplicateDataOccurence(users,$data['email'],'email');
        if($chkVal==1){
            
            
            $finalArray=array('first_name'=>trim($data['first_name']),'last_name'=>trim($data['last_name']),'email'=>trim($data['email']),'password'=>encrypt(trim($data['password'])),'registered_on'=> date_stamp());


            $this->db->insert(users,$finalArray);
            $lastinsertedId = $this->db->insert_id();

            



        $msg=1;
        }else{
            $msg=0;
        }
    return $msg;
}

public function updateData($data,$user){
            //$updateid=base64_decode($data['box_id']);
      $finalArray=array('first_name'=>$data['first_name'],
        'last_name'=>trim($data['last_name']),'mobile'=>trim($data['mobile']),
      'updated_on'=> date_stamp());

            
      $this->db->where('id',$user);     
      $this->db->update(users,$finalArray);
            


        $msg=1;
        
    return $msg;
}

public function updatepassword($data,$user){
            //$updateid=base64_decode($data['box_id']);
      $finalArray=array('password'=>encrypt($data['password']),
      'updated_on'=> date_stamp());

            
      $this->db->where('id',$user);     
      $this->db->update(users,$finalArray);
            


        $msg=1;
        
    return $msg;
}


 
 public function getData($id='',$site=''){
        $this->db->select('*');
        
        if($id>0){
          $this->db->where('id', $id); 
        }
        if($site=='1'){
            $this->db->where('is_active',1);
            $this->db->order_by('box_title','ASC');
        }
        
        $this->db->from(boxes);
        
      
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
                $this->db->delete(users);

                
                
                
                $msg=1;
                return $msg;
    }

    
     public function mailchecksendmail($data){
        $chkVal=$this->Common_model->chkDuplicateDataOccurence(users,$data['email'],'email');
        if($chkVal==1){
          $msg=1;
        }else{
            $msg=0;
        }
        return $msg;
      } 
    
      public function resetpassword($data){

        $chkVal=$this->Common_model->chkDuplicateDataOccurence(users,base64_decode($data['email']),'email');
        if($chkVal==1){
          $msg=1;
        }else{
            
            $this->db->select('*');
            $this->db->where('email', base64_decode($data['email'])); 
            $this->db->from(users);
            
            if($query=$this->db->get()){
              //echo $this->db->last_query();
                //return $query->row_array();
                $arr=$query->result_array();
            }else{
              //return false;
            }

            //print_r($arr[0]['id']);
            


            $this->updatepassword($data,$arr[0]['id']);
            $msg=0;
        }
        return $msg;

      }


}











