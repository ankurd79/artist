//alert('hello');

							

						$("#frmprd_add").validate({
			                rules: {
			                    product_name: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    category_id: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    product_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
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
			                    product_name: {
			                        required: "Specify product name",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },
			                    
			                    

			                     listing_image: {
			                        required: "File format not supported",
			                    },

			                    detail_image: {
			                        required: "File format not supported",
			                    },

			                    product_cost: {
			                        required: "Specify cost",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },
			            
			                    
			                },
			            
			            });	

			            $("#frmprd_edit").validate({
			                rules: {
			                    product_name: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    category_id: {
			                        required: true,
			                        selectcheck: true
			                        
			                    },

			                    product_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
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
			                    product_name: {
			                        required: "Specify product name",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },
			                    
			                    

			                     listing_image: {
			                        required: "File format not supported",
			                    },

			                    detail_image: {
			                        required: "File format not supported",
			                    },

			                    product_cost: {
			                        required: "Specify cost",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 4 characters allowed.")
			                    },
			            
			                    
			                },
			            
			            });	





							//$("#shwdatatable").load(base_url+'manage-product/list');	


								$(document).on('click', '.m', function(){

                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "products";
                                      
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
                                       var p=$('#category_id').val();
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
		                                         
		                                         url: base_url+'api/products/product/remove',
		                                         type: 'POST',
		                                         data: { id:deleteid },
		                                         success: function(response){
		                                            // Remove row 
		                                       alert('Record deleted');
		                                       //$("#shwdatatable").load(base_url+'manage-product/list/'+p);
		                                       
		                                       $("#shwdatatable").load(base_url+'admin/product/productmgmt/list/'+p);


		                                        }
		                                       });  

					                    } else {
					                      alert("You've chosen NOT to delete the record!")
					                    }
  

                                   });







					


			$("#frmprd_add").on('submit',(function(e) {
				//alert('hello');
					var p=$('#category_id').val();
			        e.preventDefault();
			        if($("#frmprd_add").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-product',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='Product information added.'){
										//jQuery("#subjresponse").html(data);
										//$("#subjresponse").fadeOut(5000);
										//$("#shwdatatable").load(base_url+'manage-product/list');
										$("#shwdatatable").load(base_url+'admin/product/productmgmt/list/'+p);
										$(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Product information added.'
	      									})
	      								});

										$('#frmprd_add')[0].reset();
										$(window).off("beforeunload");
										
									}else if(data=='Product already present!'){
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
										        title: ' Product already present!'
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

			$("#frmprd_edit").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmprd_edit").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-product',
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
										        title: ' Product information updated.'
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

			

			$("#product_name,#category_id").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });


            $(document).on('click', '.bnchk', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "product_images";
                                      
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



            						$("#category_id").change(function(){
                						//alert($('#category_id').val());
                						//jQuery(".lds-facebook").show();
					                var product_id=$('#category_id').val();
					                if(product_id>0){
					                	$("#sbmtblock").show();
					                }else{
					                	$("#sbmtblock").hide();
					                }
					                $.ajax({
							            url: base_url+'admin/product/productmgmt/list',
							            type: 'POST',
							            data: { product_id:product_id },
							               beforeSend: function ( xhr ) {
											  //Add your image loader here
											  jQuery(".lds-facebook").show();
										    },
							               success: function(html){
							               	   jQuery(".lds-facebook").hide();
							                   $("#shwdatatable").html(html);

							                }
							         });
            					});

