//alert('hello');

							

						$("#fmrhampercat_add").validate({
			                rules: {
			                    category_name: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    

			                    image: {
			                         required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                    
			                    
			                },
			            
			                messages: {
			                    category_name: {
			                        required: "Specify hamper category",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },
			                    
			                    

			                     image: {
			                        required: "File format not supported",
			                    },
			            
			                    
			                },
			            
			            });	

			            $("#fmrhampercat_edit").validate({
			                rules: {
			                    category_name: {
			                        required: true,
			                        minlength: 3,
			                        maxlength: 75,
			                        alpha:true
			                    },
			                    
			                    image: {
			                         //required: true,
						             //accept:"image/jpeg,image/jpg,image/png",
						             extension: "jpg,jpeg,png",
                    				 //filesize: 200000   //max size 200 kb
			                         //cemail:true
			                    },
			                    
			                    
			                },
			            
			                messages: {
			                    category_name: {
			                        required: "Specify hamper category",
			                        minlength: jQuery.validator.format("At least {0} characters required!"),
			                        maxlength: jQuery.validator.format("A maximum of 75 characters allowed.")
			                    },
			                    
			                    

			                     image: {
			                        required: "File format not supported",
			                    },
			            
			                    
			                },
			            
			            });	





							$("#shwdatatable").load(base_url+'manage-hamper-category/list');	


								$(document).on('click', '.m', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "met_hamper_category";
                                      
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
		                                         
		                                         url: base_url+'api/categories/category/remove',
		                                         type: 'POST',
		                                         data: { id:deleteid },
		                                         success: function(response){
		                                            // Remove row 
		                                       alert('Record deleted');
		                                       $("#shwdatatable").load(base_url+'manage-hamper-category/list');
		                                        }
		                                       });  

					                    } else {
					                      alert("You've chosen NOT to delete the record!")
					                    }
  

                                   });







					


			$("#fmrhampercat_add").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#fmrhampercat_add").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'add-hamper-category',
			                data:new FormData(this),
			                beforeSend: function ( xhr ) {
			                    //Add your image loader here
			                     jQuery(".lds-facebook").show();
			                },
			                success:function(data){
			                //alert(data);
			                    	jQuery(".lds-facebook").hide();
								    //$("#shwdatatable").load(base_url+'fetch-brands');
								    if(data=='Hamper Category information added.'){
										//jQuery("#subjresponse").html(data);
										//$("#subjresponse").fadeOut(5000);
										$("#shwdatatable").load(base_url+'manage-hamper-category/list');
										$(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'success',
										        title: ' Hamper Category information added.'
	      									})
	      								});

										$('#fmrhampercat_add')[0].reset();
										$(window).off("beforeunload");
										
									}else if(data=='Hamper Category already present!'){
									    //jQuery("#subjresponse").html(data);
									    $('html, body').animate({scrollTop: '0px'}, 300);
									    $("#category_name").css("background-color", "#FA8072");
									    $(function() {	

									    	  var Toast = Swal.mixin({
										      toast: true,
										      position: 'top-end',
										      showConfirmButton: false,
										      timer: 7000
										    });

										    Toast.fire({
										        icon: 'error',
										        title: ' Hamper Category already present!'
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

			$("#fmrhampercat_edit").on('submit',(function(e) {
				//alert('hello');
			        e.preventDefault();
			        if($("#fmrhampercat_edit").valid()){
			            $.ajax({
			                type:'POST',
			                cache: false,
			                contentType: false,
			                processData: false,
			                url:base_url+'update-hamper-category',
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
										        title: ' Hamper Category information updated.'
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

			

			$("#category_name").change(function(){
                $(window).bind('beforeunload',function() {
                    return "'Are you sure you want to leave the page. All data will be lost!";
                });
            });