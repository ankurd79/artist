//alert('hello');

							

						$("#forgotpwd").validate({
			                rules: {
			                    

			                    email: {
			                        required: true,
			                        maxlength: 70,
			                        cemail:true
			                    },

			                    

			                    
			                },
			            
			                messages: {

			                    email: {
			                        required: "Specify email.",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    
			                },
			            
			            });	

			            
			$("#forgotpwd").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#forgotpwd").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'mail-check-send-mail',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='0'){
										$('#forgotpwd')[0].reset();
										$(window).off("beforeunload");
										jQuery("#msgdiv").show();
										jQuery("#errordiv").hide();
										$("#email").css("background-color", "#FFFFFF");
										
									}else if(data=='1'){
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

			

			

			$("#email").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });