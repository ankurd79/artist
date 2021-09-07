<section id="mustHave-products-area" class="login-bg pt-5 pb-5">
    <div class="container-fluid">        
           <div class="d-flex justify-content-center">
            <div class="col-md-8 login-container p-0">
                <div class="row">
               <div class="col-md-6"><img src="<?php echo base_url() ?>assets/img/register-img.jpg"></div>
               <div class="col-md-6 login-form-container">
                   <!-- Start Login Area Wrapper -->
                <div class="my-account-item-wrapper">
                    <h3>Edit Password</h3>

                    <div class="alert alert-success text-center alert-dismissible" id="msgdiv" style="display:none;font-size: 11px;">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>You have successfully updated your password!</strong>
                        </div>

                        

                    <div class="my-account-form-wrap">
                        <form id='mypass' name='mypass' method="post">
                            

                            <div class="single-form-input">
                                <label for="login_username">New Password <sup>*</sup></label>
                                <input type="password" id="password" name='password' required/>
                            </div>
                            <div class="single-form-input">
                                <label for="login_username">Confirm Password <sup>*</sup></label>
                                <input type="password" id="cpassword" name='cpassword' required/>
                            </div>                           

                            <div class="single-form-input d-flex align-items-center mb-14">
                                <!--<button class="btn btn-black" type="button">Register</button>--> 
                                <input type="submit" id="submit" name="submit" value="Submit" class="btn btn-black">                               
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
<script src="<?php echo base_url() ?>site_assets/editpassword.js"></script>