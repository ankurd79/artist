//alert('hello');

							

						
			            
			$(function () {
                                $("#frmlogin").validate({
                                    rules: {           
                                        
                                        email: {
                                            required: true,
                                            cemail:true
                                            
                                        },
                                        
                                        
                                        password: {
                                            required: true,
                                            
                                        }
                                    },
                                    
                                    messages: {
                                        
                                            email: {
                                              required: "Please Enter your email address."
                                            },
                                            
                                            password: {
                                              required: "Please Enter your password."
                                            },
                                    },
                                    
                                    
                                    submitHandler: function (form) {
                                        jQuery(".lds-facebook").show();
                                        $.post(base_url+'site/site/processLogin', 
                                        
                                        $("#frmlogin").serialize(), function (data) {
                                            jQuery(".lds-facebook").hide();
                                            
                                            if(data==0){
                                                $("#errordiv").show();
                                            }else{
                                                $("#errordiv").hide();
                                                $(window).off("beforeunload");
                                                window.location = base_url+'home';

                                                
                                            }
                                        });
                                        return false; // <- last item inside submitHandler function
                                    }
                                });
                            });

			

			

			$("#email").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });