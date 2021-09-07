<?php

//use PHPMailer\PHPMailer\PHPMailer;
//use PHPMailer\PHPMailer\SMTP;
//use PHPMailer\PHPMailer\Exception;
class Common_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           //$this->load->database();
		   //$this->load->library('image_lib');
		   //$this->load->library("phpmailer_library");
           
  }
 
 


 
 
 
 
    public function chkDuplicateDataOccurence($table,$chkData,$field){
    	$this->db->where($field, $chkData);
    	$query = $this->db->get($table);
    	$num = $query->num_rows();
    	
    	if($num >0){
    		$rtVal=0;
    	}else{
    		$rtVal=1;
    	}
    	
    	return $rtVal;
    }
 
 
public function getHash($data){
  
    $table=admin;   
      
     $query = $this->db->query("select password from ".$table." where email='".$data."'");
     $row = $query->row();
     if (isset($row)){
         
         return $row->password;
     }
 }

 public function getHashcustomer($data){
  
    //$table=admin;   
      
     $query = $this->db->query("select password from ".users." where email='".$data."'");
     $row = $query->row();
     if (isset($row)){
         
         return $row->password;
     }
 }
 
public function login_admin($email,$pass){
    $this->db->select('*');
    $this->db->from(admin);
    $this->db->where('email',$email);
    $this->db->where('password',$pass);
    $this->db->where('is_active',1);
   
    if($query=$this->db->get())
    {
      return $query->row_array();
    }
    else{
    return false;
    }
  
}
    
      
public function updatestatus($data,$user){
  if($data['value']==0){
    $val=1;
  }else{
    $val=0;
  }
  $arr=array('is_active' => $val,'updated_on'=>date_stamp(),'updated_by' => $user);
  $this->db->where('id', $data['id']);
  $this->db->update($data['table'], $arr);
      
}


public function getstate(){
        $this->db->select('*');
        $this->db->order_by('name','ASC');
        $this->db->from(state);
        
      
      if($query=$this->db->get()){
        //echo $this->db->last_query();
          //return $query->row_array();
          return $query->result_array();
      }else{
        return false;
      } 
      
}

public function getcity($stateid=''){
  
        $this->db->select('*');
        
        if($stateid>0){
          $this->db->where('state_id', $stateid); 
        }
        $this->db->order_by('city','ASC');
        $this->db->from(city);
        
      
      if($query=$this->db->get()){
        //echo $this->db->last_query();
          //return $query->row_array();
          return $query->result_array();
      }else{
        return false;
      } 
      
}


public function getCustomerDetails($customerId){
        $this->db->select('*');
    $this->db->from('tbl_customers');
    $this->db->where('id',$customerId);
    $this->query=$this->db->get();
    return $this->query->result_array();
    }
 
    public function login_customer($email,$pass){
    $this->db->select('*');
    $this->db->from(users);
    $this->db->where('email',$email);
    $this->db->where('password',$pass);
    //$this->db->where('is_activated',1);
   
    if($query=$this->db->get())
    {
      return $query->row_array();
    }
    else{
    return false;
    }
  
    }
 
    public function checkusernameandgeneratemail($data){
    $this->db->select('*');
    $this->db->from('tbl_customers');
    $this->db->where('email',$data['uemail']);
    $this->db->where('is_activated',1);
   
    if($query=$this->db->get())
    {
      return $query->row_array();
    }
    else{
    return false;
    }
  
    }
 
 
 
    public function sendpasswordresetmail($response){
            $mdata['to']=$response['email'];
        $mdata['subject']='Password Reset Mail - Cleanos';
        //$mdata['body']=$this->load->view('mailers/registration',$mailerdata);
        $resetUrl="".base_url()."index.php/site/resetpassword/".base64_encode($response['id'])."";
        $mailtxt="Dear ".ucfirst($response['first_name'])." ".ucfirst($response['last_name'])." ,";
        $mailtxt.="<br>you have requested for password resetting of your account.";
        $mailtxt.="<br> Please click on the below link to reset your password :" ;
        $mailtxt.="<br> <a href='".$resetUrl."'>Click here to reset your password!</a>" ;
        $mailtxt.="<br> Team Cleanos" ;
        $mdata['body']=$mailtxt;
        
        //$p=$this->Common_model->SendMail($mdata);
    }
 
    public function updatepassword($response){
        $hashedpass=$this->Common_model->encrypt($response['upass']);
        $custid=base64_decode($response['getid']);
        $finalArr = array('password' => $hashedpass,'updated_date'=> $this->Common_model->date_stamp());
    $this->db->where('id', $custid);
    $this->db->update('tbl_customers',$finalArr);
    $errmsg=$this->db->error();
    if($errmsg['code']==0){
        $msg=1;
    }else{
        
        $msg=0;
    }
    
    return $msg;  
    }







}











