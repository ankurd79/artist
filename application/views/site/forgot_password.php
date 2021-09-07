<section id="mustHave-products-area" class="login-bg">
    <div class="container-fluid">        
           <div class="d-flex justify-content-center">
            <div class="col-md-8 login-container p-0">
                <div class="row">
               <div class="col-md-6"><img src="assets/img/forgot-pwd-img.jpg"></div>
               <div class="col-md-6 login-form-container">
                   <!-- Start Login Area Wrapper -->
                <div class="my-account-item-wrapper">
                    <h3>Forgot Your Password?</h3>
                    <p>We will send you an email to reset your password.</p>

                        <div class="alert alert-success text-center alert-dismissible" id="msgdiv" style="display:none;font-size: 11px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>We have sent a password reset link on your registered email!</strong>
                        </div>

                        <div class="alert alert-danger text-center alert-dismissible" id="errordiv" style="display:none;font-size: 11px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Username/email doesn't exists!</strong>
                        </div>

                    <div class="my-account-form-wrap">
                        <form id='forgotpwd' name='forgotpwd' action="#" method="post">
                            <div class="single-form-input">
                                <label for="login_username">Email <sup>*</sup></label>
                                <input type="text" id="email" name='email' required/>
                            </div>
                            <div class="single-form-input d-flex align-items-center mb-14">
                                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-black">                               
                            </div>
                            <div class="lost-pswd">
                                <a href="<?php echo base_url() ?>login">Login</a>
                            </div>
                            <div class="lost-pswd">
                                <a href="<?php echo base_url() ?>register">Create Account</a>
                            </div>
                            

                        </form>
                    </div>
                </div>
                <!-- End Login Area Wrapper -->
               </div> 
           </div>
               </div>          
        </div>

       

    </div>
</section>
<!-- End Must Have Products Area -->
<script src="<?php echo base_url() ?><?php echo site_assets ?>/forgot-password.js"></script>