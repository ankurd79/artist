//alert('hello');

							

						$("#frmhamper_add").validate({
			                rules: {
			                    hamper_title: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75
			                        //alpha:true
			                    },
			                    
			                    

			                    hamper_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    category_id: {
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
			                    hamper_title: {
			                        required: "Specify hamper title",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    

			                    hamper_cost: {
			                        required: "Specify hamper cost",
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

			            $("#frmhamper_edit").validate({
			                rules: {
			                    hamper_title: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75
			                        //alpha:true
			                    },
			                    
			                    

			                    hamper_cost: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 4,
			                        numeric:true
			                    },

			                    category_id: {
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
			                    hamper_title: {
			                        required: "Specify hamper title",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },

			                    

			                    hamper_cost: {
			                        required: "Specify hamper cost",
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





							$("#shwdatatable").load(base_url+'manage-hamper/list');	


								$(document).on('click', '.m', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "met_hampers";
                                      
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
		                                         
		                                         url: base_url+'api/hampers/hamper/removehamper',
		                                         type: 'POST',
		                                         data: { id:deleteid },
		                                         success: function(response){
		                                            // Remove row 
		                                       alert('Record deleted');
		                                       $("#shwdatatable").load(base_url+'manage-hamper/list');
		                                        }
		                                       });  

					                    } else {
					                      alert("You've chosen NOT to delete the record!")
					                    }
  

                                   });







					


			$("#frmhamper_add").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmhamper_add").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-hamper',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='Hamper information added.'){
										//jQuery("#subjresponse").html(data);
										//$("#subjresponse").fadeOut(5000);
										$("#shwdatatable").load(base_url+'manage-hamper/list');
										$(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Hamper information added.'
	      									})
	      								});

										$('#frmhamper_add')[0].reset();
										$(window).off("beforeunload");
										
									}else if(data=='Hamper already present!'){
									    //jQuery("#subjresponse").html(data);
									    $('html, body').animate({scrollTop: '0px'}, 300);
									    $("hamper_title").css("background-color", "#FA8072");
									    $(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'error',
										        title: ' Hamper already present!'
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

			$("#frmhamper_edit").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#frmhamper_edit").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-hamper',
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
										        title: ' Hamper information updated.'
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

			

			$("#hamper_title,#hamper_cost").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });