//alert('hello');

							

						$("#myacct").validate({
			                rules: {
			                    first_name: {
			                        required: true,
			                        minlength: 2,
			                        maxlength: 100,
			                        alpha:true
			                    },
			                    
			                    last_name: {
			                        required: true,
			                        minlength: 2,
			                        maxlength: 100,
			                        alpha:true
			                        
			                    },

			                    mobile: {
			                        required: true,
			                        minlength: 10,
			                        maxlength: 10,
			                        numeric:true
			                        
			                    },

			                    

			                    
			                },
			            
			                messages: {
			                    first_name: {
			                        required: "Specify your name",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    last_name: {
			                        required: "Specify your last name",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    mobile: {
			                        required: "Specify your mobile",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 10 characters allowed.")
			                    },

			                    

			                    

			                    
			            
			                    
			                },
			            
			            });	

			            
			$("#myacct").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#myacct").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-users',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                	if(data='User information updated.'){
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

			

			

			$("#first_name,#last_name,#mobile").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });