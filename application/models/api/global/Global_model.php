<?php
class Global_model extends CI_model{
 
  public function __construct() {
           parent::__construct(); 
           $this->load->model('Common_model');
           
  }
 
 public function insertData($data,$user){
        
          $srvAddr=$_SERVER['SERVER_ADDR'];
          $bannerimage= $_FILES['banner_image']['name'];
          $mobile_banner_image= $_FILES['mobile_banner_image']['name'];

          foreach($bannerimage as $key=>$value){
              
                                $uploadedfile=time()."_".$value;
                                if($srvAddr=='::1'){
                                  $path=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/'.folder_global.'/banners/'.$uploadedfile;
                                }else{
                                  //$path=$_SERVER['DOCUMENT_ROOT'] . '/newsite/images/'.folder_global.'/banners/'.$uploadedfile;
                                  $path=upath.'/images/'.folder_global.'/banners/'.$uploadedfile;
                                }
                                move_uploaded_file($_FILES["banner_image"]['tmp_name'][$key],$path);
                                
                                if(isset($data['banner_id'][$key])){

                                  $upArray=array('position'=>$data['position'][$key],'updated_on'=> date_stamp(),'updated_by' => $user,'is_active'=>1);

                                  if(strlen($bannerimage[$key])>0){   
                                      $imgArr=array('banner_image'=>$uploadedfile);
                                      $upArray=array_merge($upArray,$imgArr);
                                   }

                                      if(strlen($mobile_banner_image[$key])>0){  
                                            $mobilefile=time()."_".$mobile_banner_image[$key];
                                            
                                            if($srvAddr=='::1'){
                                              $mobpath=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/'.folder_global.'/banners/'.$mobilefile;
                                            }else{
                                              //$mobpath=$_SERVER['DOCUMENT_ROOT'] . '/newsite/images/'.folder_global.'/banners/'.$mobilefile;
                                              $mobpath=upath.'/images/'.folder_global.'/banners/'.$mobilefile;
                                            }
                                            move_uploaded_file($_FILES["mobile_banner_image"]['tmp_name'][$key],$mobpath); 
                                            $mobileimgArr=array('mobile_banner_image'=>$mobilefile);
                                            $upArray=array_merge($upArray,$mobileimgArr);
                                            #echo 'yelp';
                                      }

                                       $this->db->where('id',$data['banner_id'][$key]); 
                                       $this->db->update(home_banners,$upArray);
                                    
                                }else{
                                      
                                      if(strlen($bannerimage[$key])>0){
                                        $finalArray=array('banner_image'=>$uploadedfile,'position'=>$data['position'][$key],'added_on'=> date_stamp(),'added_by' => $user,'is_active'=>1);

                                        $this->db->insert(home_banners,$finalArray);
                                        $lastinsertedId = $this->db->insert_id();
                                      }

                                      if(strlen($mobile_banner_image[$key])>0){  
                                            $mobilefile=time()."_".$mobile_banner_image[$key];
                                            if($srvAddr=='::1'){
                                              $mobpath=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/'.folder_global.'/banners/'.$mobilefile;
                                            }else{
                                              //$mobpath=$_SERVER['DOCUMENT_ROOT'] . '/images/'.folder_global.'/banners/'.$mobilefile;
                                              $mobpath=upath.'/images/'.folder_global.'/banners/'.$mobilefile;
                                            }
                                            move_uploaded_file($_FILES["mobile_banner_image"]['tmp_name'][$key],$mobpath); 
                                            $mobileimgArr=array('mobile_banner_image'=>$mobilefile);
                                            $finalArray=array_merge($finalArray,$mobileimgArr);
                                            $this->db->where('id',$lastinsertedId);
                                            $this->db->update(home_banners,$finalArray);
                                      } 
                                      
                                      
                                  
                                }
                         // }

          }



        /********send data to banner table*******/

       



     $msg=1;   
    return $msg;
}












}











