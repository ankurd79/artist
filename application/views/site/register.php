<section id="mustHave-products-area" class="login-bg pt-5 pb-5">
    <div class="container-fluid">        
           <div class="d-flex justify-content-center">
            <div class="col-md-8 login-container p-0">
                <div class="row">
               <div class="col-md-6"><img src="assets/img/register-img.jpg"></div>
               <div class="col-md-6 login-form-container">
                   <!-- Start Login Area Wrapper -->
                <div class="my-account-item-wrapper">
                    <h3>Register</h3>

                    <div class="alert alert-success text-center alert-dismissible" id="msgdiv" style="display:none;font-size: 11px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>You have successfully registered!</strong>
                        </div>

                        <div class="alert alert-danger text-center alert-dismissible" id="errordiv" style="display:none;font-size: 11px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Username already exists!</strong>
                        </div>

                    <div class="my-account-form-wrap">
                        <form id='frmregister' name='frmregister' method="post" autocomplete="off">
                            <div class="single-form-input">
                                <label for="login_username">First Name <sup>*</sup></label>
                                <input type="text" name='first_name' id="first_name" required/>
                            </div>
                            <div class="single-form-input">
                                <label for="login_username">Last Name <sup>*</sup></label>
                                <input type="text" name='last_name' id="last_name" required/>
                            </div>
                            <div class="single-form-input">
                                <label for="login_username">Email <sup>*</sup></label>
                                <input type="email" name='email' id="email" required/>
                            </div>

                            <div class="single-form-input">
                                <label for="login_pwsd">Password <sup>*</sup></label>
                                <input type="password" name='password' id="password" required/>
                            </div>

                            <div class="single-form-input d-flex align-items-center mb-14">
                                <!--<button class="btn btn-black" type="button">Register</button>--> 
                                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-black">                               
                            </div>
                            <div class="lost-pswd">
                                <a href="<?php echo base_url() ?>login">Login</a>
                            </div>
                            <div class="lost-pswd">
                                <a href="<?php echo base_url() ?>reset-password">Lost your Password?</a>
                            </div>
                            
                                <div class="lds-facebook" style="display:none;"><div></div><div></div><div></div></div>
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
<script src="<?php echo base_url() ?><?php echo site_assets ?>/register.js"></script>