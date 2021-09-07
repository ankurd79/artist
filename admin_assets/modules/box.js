//alert('hello');

							

						$("#frmbox_add").validate({
			                rules: {
			                    box_title: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    box_dimension_width: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                        
			                    },

			                    box_dimension_height: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    box_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    box_weight: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    width_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    weight_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    height_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    listing_image: {
			                         required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                    
			                    detail_image: {
			                         required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                },
			            
			                messages: {
			                    box_title: {
			                        required: "Specify box title",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    box_dimension_width: {
			                        required: "Specify box width",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_dimension_height: {
			                        required: "Specify box height",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_cost: {
			                        required: "Specify box cost",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_weight: {
			                        required: "Specify box weight",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },
			                    
			                    

			                     listing_image: {
			                        required: "File format not supported",
			                    },

			                    detail_image: {
			                        required: "File format not supported",
			                    },

			                    
			            
			                    
			                },
			            
			            });	

			            $("#frmbox_edit").validate({
			                rules: {
			                    box_title: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    box_dimension_width: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                        
			                    },

			                    box_dimension_height: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    box_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    box_weight: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    width_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    weight_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    height_unit: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    listing_image: {
			                         //required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                    
			                    detail_image: {
			                         //required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                },
			            
			                messages: {
			                    box_title: {
			                        required: "Specify box title",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    box_dimension_width: {
			                        required: "Specify box width",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_dimension_height: {
			                        required: "Specify box height",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_cost: {
			                        required: "Specify box cost",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },

			                    box_weight: {
			                        required: "Specify box weight",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },
			                    
			                    

			                     listing_image: {
			                        required: "File format not supported",
			                    },

			                    detail_image: {
			                        required: "File format not supported",
			                    },

			                    
			            
			                    
			                },
			            
			            });	





							$("#shwdatatable").load(base_url+'manage-box/list');	


								$(document).on('click', '.m', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "met_custom_box";
                                      
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
		                                         
		                                         url: base_url+'api/boxes/box/remove',
		                                         type: 'POST',
		                                         data: { id:deleteid },
		                                         success: function(response){
		                                            // Remove row 
		                                       alert('Record deleted');
		                                       $("#shwdatatable").load(base_url+'manage-box/list');
		                                        }
		                                       });  

					                    } else {
					                      alert("You've chosen NOT to delete the record!")
					                    }
  

                                   });







					


			$("#frmbox_add").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmbox_add").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-box',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='Box information added.'){
										//jQuery("#subjresponse").html(data);
										//$("#subjresponse").fadeOut(5000);
										$("#shwdatatable").load(base_url+'manage-box/list');
										$(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Box information added.'
	      									})
	      								});

										$('#frmbox_add')[0].reset();
										$(window).off("beforeunload");
										
									}else if(data=='Box already present!'){
									    //jQuery("#subjresponse").html(data);
									    $('html, body').animate({scrollTop: '0px'}, 300);
									    $("#product_name").css("background-color", "#FA8072");
									    $(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'error',
										        title: ' Box already present!'
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

			$("#frmbox_edit").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmbox_edit").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-box',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    jQuery(".lds-facebook").show();
			                    
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
			                    	//jQuery("#subjresponse").html(data);
                                    //$("#subjresponse").fadeOut(12000);
                                    $(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Box information updated.'
	      									})
	      								});
                                    $(window).off("beforeunload");
								    
			                    
			                },
			            error : function(XMLHttpRequest, textStatus, errorThrown) {
			                alert(textStatus);
			            }
			        });
			    }
			}));

			

			$("#box_title,#box_cost").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });