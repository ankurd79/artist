<?php //if (!defined('BASEPATH')) exit('No direct script access allowed');

if(!function_exists('date_stamp')){
	function date_stamp(){
	$t=date('Y-m-d H:i:s');
	return $t;
	}
}


if(!function_exists('current_time')){
	function current_time(){
    $t=date('H:i:s');
	return $t;
	}
}

if(!function_exists('currentDay')){
	function currentDay(){
	    $t=date('m/d/Y');
		return $t;
	}
}


if(!function_exists('userGreetings')){
	function userGreetings(){
	    $Hour = date('G');
	    if ( $Hour >= 5 && $Hour <= 11 ) {
	        $msg="Good Morning";
	    } else if ( $Hour >= 12 && $Hour <= 16 ) {
	        $msg="Good Afternoon";
	    } else if ( $Hour >= 17 || $Hour <= 4 ) {
	        $msg="Good Evening";
	    }
	    
	    return $msg;
	}
}

if(!function_exists('formatDateTime')){
	function formatDateTime($date,$od=''){
		if($od==1)
		    $formattedDate=date("d-M,Y", strtotime($date));
		 else
		    $formattedDate=date("d-M,Y h:i:s A", strtotime($date));
		   
		return $formattedDate;
	}
}

if(!function_exists('findTimeDiff')){
	function findTimeDiff($date1,$currDateTime){
	    $seconds = strtotime($currDateTime) - strtotime($date1);
	    $days    = floor($seconds / 86400);
	    return $hours   = floor(($seconds - ($days * 86400)) / 3600);
	}
}

if(!function_exists('formatText')){
	function formatText($data){
	    $data=strtolower($data);
	    $data=str_replace(" ","-",$data);
	    //$data=str_replace("/","-",$data);
	    $data=str_replace("*","-",$data);
	    $data=str_replace("#","-",$data);
	    $data=str_replace("!","-",$data);
	    $data=str_replace("~","-",$data);
	    $data=str_replace("'","-",$data);
	    $data=str_replace("&","-",$data);
	    $data=str_replace("(","-",$data);
	    $data=str_replace(")","-",$data);
	    $data=str_replace("%","-",$data);
	    return strtolower($data);
	}
}

if(!function_exists('generateRandomString')){
	function generateRandomString(){
		 $string = "";
		 $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
		 $len=8;
		 for($i=0;$i<$len;$i++)
		  $string.=substr($chars,rand(0,strlen($chars)),1);
		return $string;
	 }
}

if(!function_exists('generateOtp')){
	function generateOtp(){
	    return rand (1000 , 9999);
	}
}

if(!function_exists('encrypt')){
	function encrypt($data){
		 //$data=md5($data);
		 $data=password_hash($data, PASSWORD_DEFAULT);
		 return $data;
	 }
}
 
 if(!function_exists('siteConfig')){
	 function siteConfig(){
	     $siteArr=array("site_name"=>'Artist Peeu Roy',"phone"=>'',"email"=>'peeude2780@gmail.com', "url"=>'https://www.artistpeeuroy.com/',"address"=>'P-604, Emaar The Enclave, Sector-66',"city"=>'Gurugram','pincode'=>'122102', 'state'=>'Haryana','mobile1'=>'8454-963-000','mobile2'=>'');
	     return $siteArr; 
	 }
}

if(!function_exists('uploadcustomImg')){
	function uploadcustomImg($uploadedfile,$folder,$inputname){
	    $srvAddr=$_SERVER['SERVER_ADDR'];
	    $uploadedfile=time()."_".$uploadedfile;
	    if($srvAddr=='::1'){
	        $path=$_SERVER['DOCUMENT_ROOT'] . '/artiste/images/'.$folder.'/'.$uploadedfile;
	    }else{
	        $path=$_SERVER['DOCUMENT_ROOT'] . '/images/'.$folder.'/'.$uploadedfile;
	    }
	    move_uploaded_file($_FILES["$inputname"]['tmp_name'],$path);
	    return $uploadedfile;
	}
}

if(!function_exists('contentFormat')){
	function contentFormat($content){
        $content=str_replace(" ","-",$content);
        $content=str_replace("!","-",$content);
        $content=str_replace("@","-",$content);
        $content=str_replace("^","-",$content);
        $content=str_replace("(","-",$content);
        $content=str_replace(")","-",$content);
        $content=str_replace("%","-",$content);
        $content=str_replace("#","-",$content);
        $content=str_replace("*","-",$content);
        $content=strtolower($content);
        return $content;
    }
 }
 
 if(!function_exists('getAddress')){
	    function getAddress() {
	            $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' ? 'https' : 'http';
				$full_url = $protocol."://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				return $full_url;
	    }
 }  


 if(!function_exists('getSalutation')){
	    function getSalutation() {
	            $parray=array("Mr."=>'Mr.',"Mrs."=>'Mrs.',"Ms."=>'Ms.',"Dr."=>'Dr.');
	            return $parray;
	    }
 }

 

 if(!function_exists('sendmail')){
 	function sendmail($data,$template,$subject){
 		$ci = &get_instance();
 		$pdata=array("alldata"=>$data);
    	$message = $ci->load->view('mailer/'.$template.'', $pdata);
    	$mailArr = (array)$message->output;
    	$message=($mailArr['final_output']);
    	$to=$data['email'];
    	$from="admin@meethidelhi.com";
		$name="Meethi by WOK in the clouds";
		$headers = "From: \"" . $name . "\" <" . $from . ">\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=UTF-8\r\n"; //This line sets the email type to html

 		if(mail($to,$subject,$message,$headers)){
			//echo 'mail sent';

		}else{
			//echo 'mail couldn\'t be sent';	
		}
 	}
 }


 /***url generation***/

if(!function_exists('urlgenerator')){

		function urlgenerator($type,$name,$id){
				$name=formatText($name);
				return base_url().strtolower($type).'/details/'.$name.'/'.base64_encode($id);
		}

}

/***url generation***/

if(!function_exists('gethomepagebanners')){

 	function gethomepagebanners($type=''){
 		$CI =& get_instance();
		$CI->load->database();
		$CI->db->from(home_banners);
		if($type==1){
			$CI->db->where('is_active<>',0);
			$CI->db->where('position<>',0);
        	$CI->db->order_by('position','ASC');
		}
		$query = $CI->db->get();
		//echo $CI->db->last_query();
        return $query->result_array();
 	}

 }

 if(!function_exists('devicedetector')){

 	function devicedetector($useragent){
 		if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
 				$device='mobile';
 		}else{
 				$device='desktop';
 		}

 		return $device;
 	}

 }

 if(!function_exists('getartbycategory')){

 	function getartbycategory($parentid,$type=''){

 		$CI =& get_instance();
		$CI->load->database();
		$CI->db->from(products);
        $CI->db->where('category_id',$parentid);
        $CI->db->where('is_active','1');
        $CI->db->order_by('product_name','ASC');
        if($type==1){
        	$CI->db->limit(12);
        }
		$query = $CI->db->get();
        return $query->result_array();


 	}



 }

?>