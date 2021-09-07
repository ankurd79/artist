<?php


class Hampercategory_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->model('Common_model');
           
  }
 
 public function insertData($data,$user){
        $chkVal=$this->Common_model->chkDuplicateDataOccurence(hamper_category,$data['category_name'],'category_name');
        if($chkVal==1){
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }
            

            if($_FILES["image"]['name']<>''){
                $fileforupload=$_FILES["image"]['name'];
                $uploadedfile=uploadcustomImg($fileforupload,folder_hamper,"image");          
            }else{
                $uploadedfile='';
            }
            
            

            $finalArray=array('category_name'=>$data['category_name'],'category_description'=>htmlentities($data['description']),
              'meta_title'=>htmlentities($data['meta_title']),
              'meta_description'=>htmlentities($data['meta_description']),
              'meta_keywords'=>htmlentities($data['meta_keywords']),
              'image'=>$uploadedfile,
              'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>$pshow);


            $this->db->insert(hamper_category,$finalArray);
            $lastinsertedId = $this->db->insert_id();

        
        



        $msg=1;
        }else{
            $msg=0;
        }
    return $msg;
}

public function updateData($data,$user){
            $updateid=base64_decode($data['category_id']);
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }
            //uploadcustomImg($check,"brands");
            $finalArray=array('category_name'=>$data['category_name'],
              'category_description'=>htmlentities($data['description']),
              'meta_title'=>htmlentities($data['meta_title']),
              'meta_description'=>htmlentities($data['meta_description']),
              'meta_keywords'=>htmlentities($data['meta_keywords']),
              'updated_on'=> date_stamp(),'updated_by' => $user,'is_active'=>$pshow);

            if($_FILES["image"]['name']<>''){

                $fileforupload=$_FILES["image"]['name'];
                $uploadedfile=uploadcustomImg($fileforupload,folder_hamper,"image");
                $imgArr=array('logo_image'=>$uploadedfile);
                $finalArray=array_merge($finalArray,$imgArr);
               
            }

            

            

        $this->db->where('id',$updateid);     
        $this->db->update(hamper_category,$finalArray);
        
        if($pshow==0){
          $upArr=array('is_active'=>'0');
          $this->db->where('category_id',$updateid);     
          $this->db->update(hampers,$upArr);
        }else{
          $upArr=array('is_active'=>'1');
          $this->db->where('category_id',$updateid);     
          $this->db->update(hampers,$upArr);
        }

        



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
            $this->db->order_by('category_name','ASC');
        }
        
        $this->db->from(hamper_category);
        
      
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
                $this->db->delete(hamper_category);

                $this->db->where('category_id', $data['id']);
                $this->db->delete(hampers);
                
                
                
                $msg=1;
                return $msg;
    }

    
      
    



}











