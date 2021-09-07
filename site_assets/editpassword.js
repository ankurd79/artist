//alert('hello');

							

						$("#mypass").validate({
			                rules: {
			                    password: { 
                						required: true, minlength: 8
          						}, 
	          					cpassword: { 
	                				required: true, equalTo: "#password", minlength: 8
	         					}, 

			                    

			                    
			                },
			            
			                messages: {
			                    password: {
			                        required: "Specify a new password",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        //maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    cpassword: {
			                        required: "Confirm the new password",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        //maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    

			                    

			                    

			                    
			            
			                    
			                },
			            
			            });	

			            
			$("#mypass").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#mypass").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-password',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                	if(data='Password updated.'){
			                    	jQuery(".lds-facebook").hide();
								    jQuery("#msgdiv").show();
								    $(window).off("beforeunload");
								}
								    
			                    
			                },
			            error : function(XMLHttpRequest, textStatus, errorThrown) {
			                alert(textStatus);
			            }
			        });
			    }
			}));

			

			

			$("#password,#cpassword").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });