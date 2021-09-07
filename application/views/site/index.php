

<!--== Start Slider Area ==-->
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="2500">
  <div class="carousel-inner">
    <?php foreach($homepagebanners as $banner){
        $devicetye=devicedetector($_SERVER['HTTP_USER_AGENT']);
        if($devicetye=='mobile'){
          $image1=$banner['mobile_banner_image']; 
        }else{
          $image1=$banner['banner_image'];
        }  
      ?>

    <div class="carousel-item <?php if($banner['position']==1) {?>active<?php } ?>">
      <img class="d-block w-100" src="<?php echo base_url() ?>images/<?php echo folder_global ?>/banners/<?php echo $image1 ?>" alt="First slide">
    </div>

    <?php }  ?>
    
    
    
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>

    

</div>
<!--== End Slider Area ==-->


<!-- Start Popular Products Section -->
<section class="popular-products mt-40">
    <div class="container">
        <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2>Featured Categories</h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tab-wrap">
                    <ul class="nav nav-tabs tab-style-2 justify-content-center" role="tablist">
                      <?php
                      $j=0; 
                      foreach($catlist as $c){
                            $j++;
                        ?>
                          <li class="nav-item">
                            <a class="nav-link <?php if($j==1) {?>active<?php } ?>" id="paintings-tab" data-toggle="tab" href="#<?php echo formatText($c['category_name']) ?>" role="tab" aria-controls="paintings" aria-selected="true"><i class="icon icon-home"></i><?php echo $c['category_name'] ?></a>
                          </li>
                      <?php } ?>    

                      
                    </ul>
                </div>
            </div>
            <div class="col-md-12">
                <div class="tab-content products-style-4">
                    <?php
                      $y=0; 
                      foreach($catlist as $p){
                            $y++;
                        ?>
                    <div class="tab-pane fade <?php if($y==1) {?>show active<?php } ?>" id="<?php echo formatText($p['category_name']) ?>" role="tabpanel" aria-labelledby="<?php echo formatText($p['category_name']) ?>-tab">
                        <div class="row">
                            
                         <?php 

                            $arr=getartbycategory($p['id'],1);
                                foreach($arr as $res){
                         ?>   

                            <div class="col-md-3 col-6 mb-4 pb-2">
                                <!-- Start Single Product -->
                        <div class="single-product-wrap new-prod">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="<?php echo urlgenerator('art',$p['category_name']."/".$res['product_name'],$res['id']); ?>" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>images/products/<?php echo $res['listing_image'] ?>" alt="<?php echo $res['product_name'] ?>"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>images/products/<?php echo $res['listing_image'] ?>" alt="<?php echo $res['product_name'] ?>"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>                                        
                                    </div>
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="<?php echo urlgenerator('art',$p['category_name']."/".$res['product_name'],$res['id']); ?>"><?php echo $res['product_name'] ?></a>
                                </h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; <?php echo $res['product_cost'] ?>.00</span>
                                </div>
                            </div>
                        </div>


                        <!-- End Single Product -->
                            </div>                            
                        <?php } ?>

                            

                            
                            

                            

                            

                            
                        </div>
                    </div>
                  <?php } ?>   
                    
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Popular Products Section -->

<!--== Start Call to Action Area  ==-->
<div class="call-to-action-wrapper layout-two">
    <div class="container">
        <div class="call-action-content-wrapper">
            <div class="row">
                 <div class="col-md-4">
                <div class="facility_box bg_dark_-red">
                    <div class="fb-icon">
                        <i class="fa fa-truck"></i>
                    </div>
                    <div class="fb-text">
                        <h5>FREE DELIVERY</h5>
                        <span>Free Shipping all Order</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="facility_box bg_dark_-red">
                    <div class="fb-icon">
                        <i class="fa fa-headphones"></i>
                    </div>
                    <div class="fb-text">
                        <h5>24/ 7 SUPPORT</h5>
                        <span>Customer Support</span>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="facility_box bg_dark_-red">
                    <div class="fb-icon">
                        <i class="fa fa-cc-mastercard"></i>
                    </div>
                    <div class="fb-text">
                        <h5>Secure Payment</h5>
                        <span>100% Secure Payment</span>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<!--== End Call to Action Area  ==-->

<!-- Start Must Have Products Area -->
<section id="mustHave-products-area" class="pt-md-58 pt-sm-48" style='display:none;'>
    <div class="container-fluid">
        <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2>Top Interesting</h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="products-wrapper">
                    <div class="product-carousel-wrap">
                        
                        <!-- Start Single Product -->
                        <div class="single-product-wrap">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="single-product.html" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-1.jpg" alt="Product"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-1.jpg" alt="Product"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="single-product.html">Variable product 001</a></h2>
                                <div class="product-prices">                                   
                                    <span class="price">&#8377; 900.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->

                       <!-- Start Single Product -->
                        <div class="single-product-wrap">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="single-product.html" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-2.jpg" alt="Product"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-2.jpg" alt="Product"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="single-product.html">Variable product 002</a></h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; 1500.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->

                        <!-- Start Single Product -->
                        <div class="single-product-wrap">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="single-product.html" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-3.jpg" alt="Product"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-3.jpg" alt="Product"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="single-product.html">Variable product 003</a></h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; 1800.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        
                        <!-- Start Single Product -->
                        <div class="single-product-wrap">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="single-product.html" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-4.jpg" alt="Product"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-4.jpg" alt="Product"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="single-product.html">Variable product 004</a></h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; 1600.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->

                        <!-- Start Single Product -->
                        <div class="single-product-wrap">
                            <!-- Product Thumbnail -->
                            <figure class="product-thumbnail">
                                <a href="single-product.html" class="d-block">
                                    <img class="primary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-5.jpg" alt="Product"/>
                                    <img class="secondary-thumb" src="<?php echo base_url() ?>assets/img/saller-img-5.jpg" alt="Product"/>
                                </a>
                                <figcaption class="product-hvr-content">                                    
                                    <div class="prod-btn-group">
                                        <span data-toggle="tooltip" data-placement="top" title="Quick Shop"><button
                                                data-toggle="modal" data-target="#quickViewModal"><i
                                                class="dl-icon-view"></i></button></span>
                                    </div>
                                    
                                </figcaption>
                            </figure>

                            <!-- Product Details -->
                            <div class="product-details">
                                <h2 class="product-name"><a href="single-product.html">Variable product 005</a></h2>
                                <div class="product-prices">                                    
                                    <span class="price">&#8377; 1200.00</span>
                                </div>
                            </div>
                        </div>
                        <!-- End Single Product -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Must Have Products Area -->

<!--== Start Testimonial Area ==-->
<?php
if(count($testimonials)>0) 
{
?>
<div class="testimonial-area-wrapper mt-40 mt-md-60 mt-sm-50">
    <div class="container">
            <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2>Client's Say</h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>
        <div class="row">
            <div class="col-lg-11 col-xl-9 m-auto text-center">
                <div class="testimonial-content-wrapper">
                    <!-- Start Single Testimonial Item -->
                    <?php foreach($testimonials as $t) {?>
                        <div class="single-testimonial-wrap">
                            <p class="quote"><?php echo $t['text'] ?></p>
                            <h3 class="client-name"><?php echo $t['client_name'] ?></h3>
                        </div>
                     <?php } ?>
                    <!-- End Single Testimonial Item -->

                    
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!--== End Testimonial Area ==-->

<!--== Start Newsletter Area ==-->
<section id="newsletter-area-wrap" class=" mt-md-60 mt-sm-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 m-auto text-center">
                <!-- Start Newsletter Content Wrapper -->
                <div class="newsletter-content-wrap">
                    <h2>FOLLOW OUR UPDATES!</h2>
                    <p>If you want to get an email from us every time we have a new special offer, then sign up here!</p>
                    <div class="newsletter-area">
                        <form action=""
                              method="post" id="mc-form2" class="mc-form">
                            <!-- <input type="email" id="mc-email2" autocomplete="off"
                                   placeholder="Enter Email Address" required/>
                            <button class="btn" type="submit">subscribe</button> -->
                            <div class="row">
                                <div class="col-md-9 subscribe-input">
                                    <input type="email" id="mc-email2" autocomplete="off"
                                   placeholder="Enter Email Address" required/>
                                </div>
                                <div class="col-md-3 subscribe-btn"><button class="" type="submit">Subscribe</button></div>
                            </div>
                        </form>

                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div>
                        <!-- mailchimp-alerts end -->
                    </div>
                </div>
                <!-- End Newsletter Content Wrapper -->
            </div>
        </div>
    </div>
</section>
<!--== End Newsletter Area ==-->
