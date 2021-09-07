//alert('hello');

							

						$("#frmregister").validate({
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

			                    email: {
			                        required: true,
			                        maxlength: 70,
			                        cemail:true
			                    },

			                    password: {
			                        required: true,
			                        minlength: 8,
			                        maxlength: 50
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

			                    email: {
			                        required: "Specify email. Your email will be the username",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    password: {
			                        required: "Specify password",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    

			                    
			            
			                    
			                },
			            
			            });	

			            
			$("#frmregister").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmregister").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-users',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='User added.'){
										

										$('#frmregister')[0].reset();
										$(window).off("beforeunload");
										jQuery("#msgdiv").show();
										jQuery("#errordiv").hide();
										
									}else if(data=='User already present!'){
									    //jQuery("#subjresponse").html(data);
									    $('html, body').animate({scrollTop: '0px'}, 300);
									    $("#email").css("background-color", "#FA8072");
									    jQuery("#msgdiv").hide();
										jQuery("#errordiv").show();

									}
			                    
			                },
			            error : function(XMLHttpRequest, textStatus, errorThrown) {
			                alert(textStatus);
			            }
			        });
			    }
			}));

			

			

			$("#first_name,#last_name,#email").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });