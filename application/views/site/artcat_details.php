<?php
//print_r($details['0']);
$details=$details['0'];
?>
<!-- Start Must Have Products Area -->
<section id="mustHave-products-area">
    <div class="container-fluid mt-40">
        <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2><?php echo $details['category_name'] ?></h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>

        <div class="row"> 
                        
                        <!-- Start Single Product -->
                        <?php

                                foreach($artlist as $res){
                        ?>
                        <div class="col-md-4">                        
                        <div class="single-product-wrap single-special-banner">                            
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail banner-thumbnail">
                                <a href="<?php echo urlgenerator('art',$details['category_name']."/".$res['product_name'],$res['id']); ?>" class="d-block">
                                    <img class="banner-thumb" src="<?php echo base_url() ?>images/products/<?php echo $res['listing_image'] ?>" alt="<?php echo $res['product_name'] ?>"/>
                                </a>
                                <figcaption class="product-hvr-content">
                                    <!-- <a href="javascript:void(0)" class="btn btn-black btn-addToCart">Add To Cart</a> -->
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>                                        
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="<?php echo urlgenerator('art',$details['category_name']."/".$res['product_name'],$res['id']); ?>"><?php echo $res['product_name'] ?></a></h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; <?php echo $res['product_cost'] ?>.00</span>
                                </div>
                            </div>
                        </div>                        
                        </div>
                    <?php } ?>
                        <!-- End Single Product -->


              
                        
                        
                        
                                 
        </div>
        <!--<div class="row mt-30 mb-30">
            <div class="col-md-12">
                <nav>
                    <ul class="pagination justify-content-center pt-2">
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#" aria-label="Next"><i class="fa fa-angle-right"></i></a></li>
                    </ul>
                </nav>
            </div>
        </div> -->      
          
    </div>
</section>