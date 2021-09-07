<?php
$arr=$artdetails[0];
//print_r($gallerylist);
//print_r($pagecategory);
?>
<section id="mustHave-products-area ">
    <div class="container-fluid mt-40 mb-40">
        <div class="row">
            <!-- Start Section title -->
            <div class="col-lg-8 m-auto text-center">
                <div class="section-title-wrap style-three">
                    <h2><?php echo $pagecategory[0]['category_name'] ?></h2>
                </div>
            </div>
            <!-- End Section title -->
        </div>

        <!--== Start Single Product Page Wrapper ==-->
<div id="single-product-page">
    <div class="container-fluid">
        <div class="row">
            <!-- Start Single Product Thumbnail -->
            <div class="col-xl-7 col-lg-6">
                <div class="single-product-thumb-wrap p-0 pb-sm-30 pb-md-30">
                    <!-- Product Thumbnail Large View -->
                    <div class="product-thumb-large-view">
                        <div class="product-thumb-carousel">
                            <?php foreach($gallerylist as $g) {?>
                                <figure class="product-thumb-item">
                                    <img src="<?php echo base_url() ?>images/products/gallery/<?php echo $g['banner_image'] ?>" alt="Single Product"/>
                                </figure>
                            <?php } ?>
                                                        
                        </div>

                        <!-- Product Thumb Button  -->
                        <div class="product-thumb-btns">
                            <button class="btn-zoom-popup"><i class="dl-icon-zoom-in"></i></button>
                            
                        </div>
                    </div>

                    <!-- Product Thumbnail Nav -->
                    <div class="product-thumbnail-nav">
                        <?php foreach($gallerylist as $k) {?>
                                <figure class="product-thumb-item">
                                    <img src="<?php echo base_url() ?>images/products/gallery/<?php echo $k['banner_image'] ?>" alt="Single Product"/>
                                </figure>
                            <?php } ?>
                        
                    </div>


                    
                </div>
            </div>
            <!-- End Single Product Thumbnail -->

            <!-- Start Single Product Content -->
            <div class="col-xl-5 col-lg-6">
                <div class="single-product-content-wrapper">
                    <div class="single-product-details">
                        <h2 class="product-name"><?php echo $arr['product_name'] ?></h2>
                        <div class="prices-stock-status d-flex align-items-center justify-content-between">
                            <div class="prices-group">                                
                                <span class="price">&#8377; <?php echo $arr['product_cost'] ?>.00</span>
                            </div>
                            <?php
                                if($arr['in_stock']==1){
                            ?>
                            <span class="stock-status"><i class="dl-icon-check-circle1"></i> Available</span>
                        <?php } ?>
                        </div>
                        <p class="product-desc"><?php echo (htmlspecialchars_decode($arr['product_description'])) ?></p>
                        <?php if($arr['in_stock']==1) {?>
                            <form id='frmprd'>
                            <div class="quantity-btn-group d-flex">
                                <div class="pro-qty">
                                    <input type="text" id="quantity" value="1" readonly='readonly' onkeypress="return isNumberKey(event)"/>
                                </div>
                                <div class="list-btn-group">
                                    <a href="javascript:void(0)" class="btn btn-black" id='ad2cart'>Add to Cart</a>
                                    
                                </div>
                            </div>
                            <input type='hidden' name='code' id='code' value='<?php echo $arr['id'] ?>'>
                            <input type='hidden' name='cost' id='cost' value='<?php echo $arr['product_cost'] ?>'>
                            
                        </form>
                        <?php } ?>
                        
                    </div>

                   
                   
                </div>
            </div>
            <!-- End Single Product Content -->
        </div>
    </div>
</div>
<!--== End Single Product Page Wrapper ==-->

    </div>
</section>
<!-- End Must Have Products Area -->