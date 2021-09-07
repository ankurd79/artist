<?php
$arr=siteConfig();
?>
<!DOCTYPE html>
<html class="no-js" lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $description ?>">
    <title>Artist Peeu Roy - <?php echo $title ?></title>

    <!--=== Favicon ===-->
    <link rel="shortcut icon" href="<?php echo base_url() ?>assets/img/favicon.png" type="image/x-icon"/>

    <!--== Google Fonts ==-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,300i,400,400i,500,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display" rel="stylesheet">


    <!--=== Revolution Slider CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/revslider/settings.css" rel="stylesheet">

    <!--=== Bootstrap CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/vendor/bootstrap.min.css" rel="stylesheet">
    <!--=== Font-Awesome CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/vendor/font-awesome.css" rel="stylesheet">
    <!--=== Dl Icon CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/vendor/dl-icon.css" rel="stylesheet">
    <!--=== Plugins CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/plugins.css" rel="stylesheet">
    <!--=== Helper CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/helper.min.css" rel="stylesheet">
    <!--=== Main Style CSS ===-->
    <link href="<?php echo base_url() ?>assets/css/style.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>css/custom.css" rel="stylesheet">

    <!-- Modernizer JS -->
    <script src="<?php echo base_url() ?>assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="<?php echo base_url() ?>assets/js/vendor/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
    <script src="<?php echo base_url() ?>js/common_validate.js"></script>

    <!--[if lt IE 9]>
    <script src="//oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>

var base_url='<?php echo base_url()?>';
//alert (base_url);
</script>
<script>
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}    
</script>

</head>

<body class="preloader-active">


<!-- Start Header Sale Discount Bar -->
<div class="header-discount-bar alert fade show">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-right">
                <div class="discount-bar-content">
                    <p>
                        <!--<i class="fa fa-phone"></i> <?php echo $arr['mobile1'] ?> | 
                        <i class="fa fa-envelope-o"></i> <?php echo $arr['email'] ?>-->
                        <?php if(!$this->session->userdata('artist_site_user')) {?>
                            <a href="<?php echo base_url() ?>login">Login</a> | <a href="<?php echo base_url() ?>registration">Register</a>
                        <?php } else { ?>
                            Welcome, <?php echo $this->session->userdata['fname'] ?> | <a href="<?php echo base_url() ?>signout">Logout</a>
                        <?php } ?>
                    </p>
                </div>

                
            </div>
        </div>
    </div>
</div>
<!-- End Header Sale Discount Bar -->

<!--== Start Header Area Two ===-->
<header id="header-area" class="header-two">
    
    <!-- Header Bottom Area Start -->
    <div class="header-bottom-area sticky-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="header-content-wrapper d-flex align-items-center">
                        <div class="header-left-area d-flex align-items-center">
                            <!-- Start Logo Area -->
                            <div class="logo-area">
                                <a href="<?php echo base_url() ?>"><img src="<?php echo base_url() ?>assets/img/website-logo.png" alt="Logo" style="width:80px; height:76px;"/></a>
                            </div>
                            <!-- End Logo Area -->
                        </div>

                        <div class="header-mainmenu-area d-none d-lg-block">
                            <!-- Start Main Menu -->
                            <nav id="mainmenu-wrap">
                                <ul class="nav mainmenu justify-content-center">
                                    <li><a href="<?php echo base_url() ?>">Home</a></li>
                                    <li class="dropdown-show"><a href="javascript:void(0)">Shop</a>
                                    <ul class="dropdown-nav">
                                        <?php foreach($catlist as $c){?>
                                            <li><a href="<?php echo urlgenerator('art-category',$c['category_name'],$c['id']) ?>"><?php echo $c['category_name'] ?></a></li>
                                        <?php } ?>
                                        
                                    </ul>
                                </li>
                                    
                                    <li><a href="<?php echo base_url() ?>about-me">About Me</a></li>
                                    <li><a href="<?php echo base_url() ?>contact">Contact Me</a></li>
                                </ul>
                            </nav>
                            <!-- End Main Menu -->
                        </div>

                        <div class="header-right-area d-flex justify-content-end align-items-center">
                            <button class="search-icon animate-modal-popup" data-mfp-src="#search-box-popup"><i
                                    class="dl-icon-search1"></i></button>
                            <?php if($this->session->userdata('artist_site_user')) {?>
                            <ul class="user-area">
                                <li class="dropdown-show">
                                    <button><i class="fa fa-user"></i></button>
                                    <ul class="dropdown-nav">
                                        <li><a href="<?php echo base_url() ?>my-account">My Account</a></li>
                                        <li><a href="<?php echo base_url() ?>my-cart">My Cart</a></li>  
                                        <li><a href="purchase-history.html">Order History</a></li>                                       
                                        <li><a href="<?php echo base_url() ?>my-account/edit-password">Edit Password</a></li>
                                        <li><a href="<?php echo base_url() ?>signout">Logout</a></li>
                                    </ul>
                                </li>
                            </ul>
                        <?php } ?>
                            <button class="mini-cart-icon modalActive" data-mfp-src="#miniCart-popup">
                                <i class="dl-icon-cart1"></i>
                                <span class="cart-count">2</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header Bottom Area End -->
</header>
<!--== End Header Area Two ===-->
