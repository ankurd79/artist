<?php
$arr=siteConfig();
?>
<!-- Start Page Header Wrapper -->
<div class="page-header-wrapper layout-two">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="page-header-content">
                    <h2>Contact Us</h2>
                    <nav class="page-breadcrumb">
                        <ul class="d-flex justify-content-center">
                            <li><a href="<?php echo base_url() ?>">Home</a></li>
                            <li><a href="javascript:void(0);" class="active">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Page Header Wrapper -->
<!--== Start Contact Page Wrapper ==-->
<div id="contact-page-wrapper" class="pt-90 pt-md-60 pt-sm-50 pb-md-20 pb-sm-10">
    <div class="contact-page-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-6">
                    <div class="contact-page-form-wrap contact-method">
                        <h3>Get in touch</h3>

                        <div class="contact-form-wrap">
                            <form action="" method="post"
                                  id="contact-form">
                                <div class="single-input-item">
                                    <input type="text" name="first_name" placeholder="Your Name *" required/>
                                </div>

                                <div class="single-input-item">
                                    <input type="email" name="email_address" placeholder="Email address *" required/>
                                </div>

                                <div class="single-input-item">
                                    <input type="text" name="phone_no" placeholder="Your Phone *" required/>
                                </div>

                                <div class="single-input-item">
                                    <textarea name="con_message" id="con_message" cols="30" rows="7"
                                              placeholder="Message *" required></textarea>
                                </div>

                                <button class="btn btn-black">Send Message</button>

                                <div class="form-message"></div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6 mt-sm-50">
                    <div class="contact-info-wrapper contact-method">
                        <h3>Contact Info</h3>

                        <div class="contact-info-content">
                            <div class="single-contact-info">
                                <h4>Postal Address</h4>
                                <p><?php echo $arr['address'] ?>, 
                                <br><?php echo $arr['city'] ?>, <?php echo $arr['state'] ?>
                                <br>Pincode - <?php echo $arr['pincode'] ?>
                                </p>
                            </div>                          

                            <div class="single-contact-info">
                                        <h4>Business Phone</h4>
                                        <p><?php echo $arr['mobile1'] ?></p>
                                    </div>

                            <div class="single-contact-info mb-0">
                                        <h4>Say Hello</h4>
                                        <p><?php echo $arr['email'] ?></p>
                                    </div>        

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <div class="contact-page-map-area mt-90 mt-md-60 mt-sm-50">
        <div class="map-area-wrapper">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.636697061128!2d77.0525177143675!3d28.40003908251004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d23322b328e05%3A0xaa68189217b5a7b8!2sEmaar%20The%20Enclave!5e0!3m2!1sen!2sin!4v1619855895472!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>
    </div>
</div>
<!--== End Contact Page Wrapper ==-->