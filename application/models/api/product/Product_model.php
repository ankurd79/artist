<?php


class Product_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->model('Common_model');
           
  }
 
 public function insertData($data,$user){
        $srvAddr=$_SERVER['SERVER_ADDR'];
        $chkVal=$this->Common_model->chkDuplicateDataOccurence(products,$data['product_name'],'product_name');
        if($chkVal==1){
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }

            if( empty($data["in_stock"]) ) {
                  $instock=0;
            }else{
                  $instock=1;
            }
            

            if($_FILES["listing_image"]['name']<>''){
                $fileforupload=$_FILES["listing_image"]['name'];
                $uploadedfile=uploadcustomImg($fileforupload,folder_product,"listing_image");          
            }else{
                $uploadedfile='';
            }

            
            

            $finalArray=array('product_name'=>$data['product_name'],'product_description'=>htmlentities($data['product_description']),'in_stock'=>$instock,
              'product_cost'=>$data['product_cost'],'category_id'=>$data['category_id'],
              'meta_title'=>htmlentities($data['meta_title']),
              'meta_description'=>htmlentities($data['meta_description']),
              'meta_keywords'=>htmlentities($data['meta_keywords']),
              'listing_image'=>$uploadedfile,
              'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>$pshow);


            $this->db->insert(products,$finalArray);
            $lastinsertedId = $this->db->insert_id();

            $bannerimage= $_FILES['banner_image']['name'];
          
          foreach($bannerimage as $key=>$value){
              if(strlen($bannerimage[$key])>0){
                                $uploadedfile=time()."_".$value;
                                if($srvAddr=='::1'){
                                  $path=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/products/gallery/'.$uploadedfile;
                                }else{
                                  //$path=$_SERVER['DOCUMENT_ROOT'] . '/images/brands/banners/'.$uploadedfile;
                                  $path=upath.'/images/products/gallery/'.$uploadedfile;
                                }
                                move_uploaded_file($_FILES["banner_image"]['tmp_name'][$key],$path);
                                
                                 $finalArray=array('banner_image'=>$uploadedfile,'product_id'=>$lastinsertedId,'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>1);
                                 

                                

                                $this->db->insert(prod_images,$finalArray);  
                          }

          }



        $msg=1;
        }else{
            $msg=0;
        }
    return $msg;
}

public function updateData($data,$user){
            $srvAddr=$_SERVER['SERVER_ADDR'];
            $updateid=base64_decode($data['prod_id']);
            if( empty($data["is_active"]) ) {
                  $pshow=0;
            }else{
                  $pshow=1;
            }

            if( empty($data["in_stock"]) ) {
                  $instock=0;
            }else{
                  $instock=1;
            }
            //uploadcustomImg($check,"brands");
            $finalArray=array('product_name'=>$data['product_name'],'product_description'=>htmlentities($data['product_description']),'in_stock'=>$instock,
              'product_cost'=>$data['product_cost'],'category_id'=>$data['category_id'],
              'meta_title'=>htmlentities($data['meta_title']),
              'meta_description'=>htmlentities($data['meta_description']),
              'meta_keywords'=>htmlentities($data['meta_keywords']),
              'updated_on'=> date_stamp(),'updated_by' => $user,'is_active'=>$pshow);

            if($_FILES["listing_image"]['name']<>''){

                $fileforupload=$_FILES["listing_image"]['name'];
                $uploadedfile=uploadcustomImg($fileforupload,folder_product,"listing_image");
                $imgArr=array('listing_image'=>$uploadedfile);
                $finalArray=array_merge($finalArray,$imgArr);
               
            }

           

        $this->db->where('id',$updateid);     
        $this->db->update(products,$finalArray);
        
        $bannerimage= $_FILES['banner_image']['name'];
        

                        foreach($bannerimage as $key=>$value){
              
                                $uploadedfile=time()."_".$value;
                                if($srvAddr=='::1'){
                                  $path=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/products/gallery/'.$uploadedfile;
                                }else{
                                  //$path=$_SERVER['DOCUMENT_ROOT'] . '/images/brands/banners/'.$uploadedfile;
                                  $path=upath.'/images/products/gallery/'.$uploadedfile;
                                }
                                
                                move_uploaded_file($_FILES["banner_image"]['tmp_name'][$key],$path);
                                
                                if(isset($data['banner_id'][$key])){

                                  //$upArray=array('updated_on'=> date_stamp(),'updated_by' => $user,'is_active'=>1);
                                  $upArray=array('updated_on'=> date_stamp(),'updated_by' => $user);

                                  if(strlen($bannerimage[$key])>0){   
                                      $imgArr=array('banner_image'=>$uploadedfile);
                                      $upArray=array_merge($upArray,$imgArr);
                                   }

                                      

                                       $this->db->where('id',$data['banner_id'][$key]); 
                                       $this->db->update(prod_images,$upArray);
                                    
                                }else{
                                      
                                      if(strlen($bannerimage[$key])>0){
                                        $finalArray=array('banner_image'=>$uploadedfile,'product_id'=>$updateid,'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>1);

                                        $this->db->insert(prod_images,$finalArray);
                                        $lastinsertedId = $this->db->insert_id();
                                      }

                                 
                                }
                         // }

          }


        



        $msg=1;
        
    return $msg;
}


 
 public function getData($id){
        
        $this->db->select('*');
        $this->db->where('category_id',$id);
        $this->db->order_by('product_name','ASC');
        $this->db->from(products);
        //echo $this->db->last_query();

        /*
        if($id>0){
          $this->db->where('id', $id); 
        }
        if($site=='1'){
            $this->db->where('is_active',1);
            $this->db->order_by('product_name','ASC');
        }
        
        $this->db->from(products);
        */
        
      
      if($query=$this->db->get()){
        //echo $this->db->last_query();
          //return $query->row_array();
          return $query->result_array();
      }else{
        return false;
      } 

    }
 
    public function getDatas($id){
        
        

        
        $this->db->where('id', $id); 
        $this->db->from(products);
        
        
        
        
      
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
                $this->db->delete(products);

                $this->db->where('product_id', $data['id']);
                $this->db->delete(prod_images);
                
                $msg=1;
                return $msg;
    }

    
      
    public function getbanners($id,$site=''){
        $this->db->select('*');
        $this->db->where('product_id', $id); 

        if($site=='1'){
            $this->db->where('is_active',1); 
        }

        $this->db->order_by('id','ASC');
        $this->db->from(prod_images);
        
      
      if($query=$this->db->get()){
        $this->db->last_query();
          //return $query->row_array();
          return $query->result_array();
      }else{
        return false;
      } 
    }



}











