//alert('hello');
						$("#shwdatatable").load(base_url+'manage-client-say/list');
							
						var res='bed type';
						$("#frmcs_add,#frmcs_edit").validate({
			                rules: {
			                    client_name: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 50,
			                        alpha:true
			                    },

			                    text: {
			                        required: true,
			                        minlength: 20,
			                        maxlength: 350
			                        //alpha:true
			                    },
			                    
			                
			                },
			            
			                messages: {
			                    client_name: {
			                        required: "Specify name",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 50 characters allowed.")
			                    },

			                    text: {
			                        required: "Specify text",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 350 characters allowed.")
			                    },
			                    
	   
			                },
			            
			            });	

			            

			            

			            


			$("#frmcs_add").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmcs_add").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-client-say',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='Testimonial added.'){
										//jQuery("#redalert").hide();
										//$("#subjresponse").fadeOut(5000);
										$("#shwdatatable").load(base_url+'manage-client-say/list');
										$('#frmcs_add')[0].reset();
										$(window).off("beforeunload");
										$(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Testimonial added.'
	      									})
	      								});
										
									}
			                    
			                },
			            error : function(XMLHttpRequest, textStatus, errorThrown) {
			                alert(textStatus);
			            }
			        });
			    }
			}));

			$("#frmcs_edit").on('submit',(function(e) {
										//alert('hello');
									        e.preventDefault();
									        if($("#frmcs_edit").valid()){
									            $.ajax({
									                type:'POST',
									                cache: false,
									                contentType: false,
									                processData: false,
									                url:base_url+'update-client-say',
									                data:new FormData(this),
									                beforeSend: function ( xhr ) {
									                    //Add your image loader here
									                     jQuery(".lds-facebook").show();
									                },
									                success:function(data){
									                //alert(data);
														    jQuery(".lds-facebook").hide();
									                    	//jQuery("#subjresponse").html(data);
						                                    //$("#subjresponse").fadeOut(12000);
						                                    $(window).off("beforeunload");
						                                    $(function() {	

													    	  var Toast = Swal.mixin({
														      toast: true,
														      position: 'top-end',
														      showConfirmButton: false,
														      timer: 7000
														    });

														    Toast.fire({
														        icon: 'success',
														        title: ' Testimonial information updated.'
					      									})
	      											});
									                    
									                },
									            error : function(XMLHttpRequest, textStatus, errorThrown) {
									                alert(textStatus);
									            }
									        });
									    }
									}));
			

			
			

			




			$("#client_name").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });

            

            $(document).on('click', '.delete', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var deleteid = splitid[1];
                                     
                                        var txt;
                    					var r = confirm("Are you sure of DELETING the record?");
                    					if (r == true) {
                      // AJAX Request
		                                       $.ajax({
		                                         
		                                         url: base_url+'api/clientsay/clientsay/remove',
		                                         type: 'POST',
		                                         data: { id:deleteid },
		                                         success: function(response){
		                                            // Remove row 
		                                       alert('Record deleted');
		                                       $("#shwdatatable").load(base_url+'manage-client-say/list');
		                                       //location.reload();
		                                        }
		                                       });  

					                    } else {
					                      alert("You've chosen NOT to delete the record!")
					                    }
  

                                   });	

            						$(document).on('click', '.m', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "client_say";
                                      
                                       //alert(value);
                                         // AJAX Request
                                       $.ajax({
                                         url: base_url+'admin/admin/updatestatus',
                                         type: 'POST',
                                         data: { id:recordid, value:value, table:table },
                                         success: function(response){
                                            // Remove row 
                                       alert('Status Updated');
                                       
                                       
                                        }
                                       });
                                       
                                    
                                     });