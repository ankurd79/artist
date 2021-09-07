<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cart extends CI_Controller {

    	function __construct() {
    	parent::__construct();
    	
    	$this->load->model('api/product/Product_model');
    	$this->load->model('api/category/Category_model');
    	$this->load->model('Common_model');
    	$this->load->library('session');	
    }

    public function mycart(){
    	$metatitle='My cart';
		$metadescription='My cart';
		$metakeywords='My cart';
		//exit;
    	$data=array('title'=>$metatitle,'description'=>$metadescription,'keywords'=>$metakeywords,'catlist'=>$this->Category_model->getData('',1));
		$this->load->view('site/header',$data);
		$this->load->view('site/my-cart',$data);
		$this->load->view('site/footer');
    }


    public function addtocart(){
    	
    	//unset($_SESSION["shopping_cart"]);
    	//exit;
    		print_r($this->input->post());
    		
			if(isset($_POST["action"]))
			{
			 if($_POST["action"] == "add")
			 {
			  if(isset($_SESSION["shopping_cart"]))
			  {
			   $is_available = 0;
			   foreach($_SESSION["shopping_cart"] as $keys => $values)
			   {
			    if($_SESSION["shopping_cart"][$keys]['product_id'] == $_POST["codeval"])
			    {
			     $is_available++;
			     $_SESSION["shopping_cart"][$keys]['product_quantity'] = $_SESSION["shopping_cart"][$keys]['product_quantity'] + $_POST["qtyval"];
			    }
			   }
			   if($is_available == 0)
			   {
			    $item_array = array(
			     'product_id'               =>     $_POST["codeval"],  
			     //'product_name'             =>     $_POST["product"],  
			     'product_price'            =>     $_POST["costval"],  
			     'product_quantity'         =>     $_POST["qtyval"],
			     //'product_image'         =>        $_POST["image"],
			     //'product_type'         =>         $_POST["ptype"]
			    );
			    $_SESSION["shopping_cart"][] = $item_array;
			   }
			  }
			  else
			  {
			   $item_array = array(
			    'product_id'               =>     $_POST["codeval"],  
			    //'product_name'             =>     $_POST["product"],  
			    'product_price'            =>     $_POST["costval"],  
			    'product_quantity'         =>     $_POST["qtyval"],
			    //'product_image'         =>        $_POST["image"],
			     //'product_type'         =>         $_POST["ptype"]
			   );
			   $_SESSION["shopping_cart"][] = $item_array;
			  }
			 }
			}


    		

    
	}

	public function loadcartdata(){
		$total_price = 0;
		$total_item = 0;
		$output='';

		  if(!empty($_SESSION["shopping_cart"])){
			foreach($_SESSION["shopping_cart"] as $keys => $values){
				//print_r($values['product_id']);
				//$pid=explode("_",$values['product_id']);
				//if($values['product_type']==1){
					$folder='products';
//echo $values['product_id'];
					$prodarr=$this->Product_model->getDatas($values['product_id']);
					//print_r($prodarr);
					$productimage=$prodarr[0]['listing_image'];
					$productname=$prodarr[0]['product_name'];
					$productprice=$prodarr[0]['product_cost'];
					$instock=$prodarr[0]['in_stock'];
					//print_r($prodarr);
				//}
				
				if($instock==1){
					$output.='<div class="single-product-item d-flex">
			                <figure class="product-thumb">
			                    <a href="javascript:void(0)"><img src="'.base_url().'images/'.$folder.'/'.$productimage.'" alt='.$productname.'></a>
			                </figure>
			                <div class="product-details">
			                    <h2 class="product-title"><a href="javascript:void(0)"><strong>'.$productname.'</strong></a></h2>
			                    <div class="prod-cal d-flex align-items-center">
			                        <span class="quantity">'.$values["product_quantity"].'</span>
			                        <span class="multiplication">&#215;</span>
			                        <span class="price">&#8377; '.$productprice.' </span>

			                        
			                    </div>
			                    <div class="prod-cal d-flex align-items-center">
			                    	<span class="price">&#8377; '.(int)$values["product_quantity"] * (int)$productprice.'.00 </span>
			                    </div>
			                </div>
			                <a href="javascript:void(0)" class="remove-icon" id='.$values["product_id"].'>&#215;</a>
			            </div>';
		           }else{
		           		$output.='<div class="single-product-item d-flex">
			                <figure class="product-thumb">
			                    <a href="javascript:void(0)"><img src="'.base_url().'images/'.$folder.'/'.$productimage.'" alt='.$productname.' style="filter: grayscale(100%);"></a>
			                </figure>
			                <div class="product-details">
			                    <h2 class="product-title"><a href="javascript:void(0)">'.$productname.'</a></h2>
			                    <div class="prod-cal d-flex align-items-center">
			                        <span class="quantity"><strong>Out of stock!</strong></span>
			                        
			                    </div>
			                </div>
			                <a href="javascript:void(0)" class="remove-icon" id='.$values["product_id"].'>&#215;</a>
			            </div>';

		           }
		            


		            if($values["product_quantity"]){
		            	if($instock==1){
		            		$productprice=$productprice;
		            	}else{
		            		$productprice=0;
		            	}
		            	$total_price = $total_price + ((int)$values["product_quantity"] * (int)$productprice);
  						$total_item = $total_item + 1;
  					}

		        }
	      }else{

	      		$output .= '<tr><td colspan="5" align="center">Your Cart is Empty!</td></tr>';
	      }

	      $data = array('cart_details'  => $output,'total_price'  => 'Rs.' . number_format($total_price, 2),'total_item'  => $total_item); 
	      echo json_encode($data);

	}


	public function removefromcart(){
		if(isset($_POST["action"]))
		{

		 if($_POST["action"] == 'remove')
		 {
		  foreach($_SESSION["shopping_cart"] as $keys => $values)
		  {
		   if($values["product_id"] == $_POST["product_id"])
		   {
		    unset($_SESSION["shopping_cart"][$keys]);
		   }
		  }
		 }
		 if($_POST["action"] == 'empty')
		 {
		  unset($_SESSION["shopping_cart"]);
		 }
		}

	}
}