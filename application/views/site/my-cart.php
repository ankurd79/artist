<?php
if (isset($_POST['action']) && $_POST['action']=="change"){
  foreach($_SESSION["shopping_cart"] as &$value){
    //print_r($value['product_id']);

    if($value['product_id'] === $_POST["code"]){
        //echo 'ram ram';


        $value['product_quantity'] = $_POST["pquantity"];
        break; // Stop the loop after we've found the product
    }
}
    
}
?>
<!-- Start Must Have Products Area -->
<section id="mustHave-products-area">
    <div class="container-fluid">        
           <!--== Start Wishlist Page Wrapper ==-->
<div id="wishlist-page-wrapper" class="">
    <div class="container">
        <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2>My Cart</h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>

        <div class="row">

            <div class="col-lg-12">
                
                <div class="shopping-cart-list-area">
                    <div class="shopping-cart-table table-responsive">
                        <?php if(isset(($_SESSION["shopping_cart"]))) {?>
                        <table class="table table-bordered text-center">
                            <thead>
                            <tr>
                                <th class="text-left">Products</th>
                                <th>Quantity</th>
                                <th>Price</th> 
                                <th>Total</th> 
                                <th>Remove</th>                                
                            </tr>
                            </thead>
                            
                            <tbody>
                            <?php 
                            $total_price=0;
                            if(!empty($_SESSION["shopping_cart"])){
                                foreach($_SESSION["shopping_cart"] as $keys => $values){
                                    //$pid=explode("_",$values['product_id']);

                                    //if($values['product_type']==1){
                                        $folder='products';
                                        $prodarr=$this->Product_model->getDatas($values['product_id']);
                                        $productimage=$prodarr[0]['listing_image'];
                                        $productname=$prodarr[0]['product_name'];
                                        $productprice=$prodarr[0]['product_cost'];
                                        $instock=$prodarr[0]['in_stock'];
                                    //}
                                    

                                    if($instock==1){
                            ?>    
                                <form method='post'>

                                <tr>
                                    <td class="product-list">
                                        <div class="cart-product-item d-flex align-items-center">                                        
                                            <a href="javascript:void(0)" class="product-thumb">
                                                <img src="<?php echo base_url() ?>images/<?php echo $folder ?>/<?php echo $productimage ?>" alt="<?php echo $productname ?>"/>
                                            </a>
                                            <a href="javascript:void(0)" class="product-name"><?php echo $productname ?></a>
                                        </div>
                                    </td>
                                    <td>
                                        
                                        <input type='hidden' name='code' value="<?php echo $values["product_id"]; ?>" />
                                        <input type='hidden' name='action' value="change" />
                                        <select class="form-control" name='pquantity' onChange="this.form.submit()">
                                            <?php for($y=1;$y<=20;$y++) {?>
                                                <option value="<?php echo $y ?>" <?php if($y==$values["product_quantity"]) {?>selected='selected'<?php } ?>><?php echo $y ?></option>
                                            <?php } ?>
                                            
                                            
                                        </select>


                                </td>
                                    <td>
                                        <span class="price">&#8377; <?php echo $productprice ?>.00</span>
                                    </td>
                                    <td>
                                        <span class="price">&#8377; <?php echo ((int)$values["product_quantity"] * (int)$productprice) ?>.00</span>
                                    </td>    
                                    <td><i class="fa fa-trash remove" id='<?php echo $values['product_id'] ?>' aria-hidden="true"></i></td>                             
                                </tr>
                                </form>
                            <?php 
                                }

                                if($instock==1){
                                    $productprice=$productprice;
                                }else{
                                    $productprice=0;
                                }
                                
                                $total_price = $total_price + ((int)$values["product_quantity"] * (int)$productprice);

                                }} 

                            ?>    
                        
                           
                           
                                                  

                            <tr>
                                <td class="product-list">
                                    &nbsp;
                                </td>
                                <td class="product-list">
                                    &nbsp;
                                </td>


                                <td><strong>Total</strong></td>
                                <td>
                                    <span class="price"><strong>&#8377; <?php echo $total_price?>.00</strong></span>
                                </td>   

                            </tr>

                          

                            
                            </tbody>
                        </table>

                        <div class="list-btn-group text-center">
                                <!--<a href="javascript:void(0)" class="btn btn-black">Update Cart</a>-->
                                <a href="javascript:void(0)" class="btn btn-black">Checkout</a>
                                
                            </div>
                        <?php } else  {?>

                                The cart is  empty!
                        <?php } ?>    
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--== End Wishlist Page Wrapper ==-->

       

    </div>
</section>
<script>

$(document).on('click', '.remove', function(){
                                      var product_id = $(this).attr("id");
                                      //alert(product_id);
                                      //alert($('.cart-count').text());
                                      var action = 'remove';
                                      if(confirm("Do you want to remove this product?"))
                                      {
                                       $.ajax({
                                        url:base_url+'site/cart/removefromcart',
                                        method:"POST",
                                        data:{product_id:product_id, action:action},
                                        success:function()
                                        {
                                            //load_cart_data();
                                            alert("Item has been removed from Cart");
                                            location.reload();
                                            
                                        }
                                       })
                                      }
                                      else
                                      {
                                       return false;
                                      }
                                    });



</script>
<!-- End Must Have Products Area -->
