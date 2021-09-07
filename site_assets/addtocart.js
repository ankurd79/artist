$(document).ready(function(){
                                        load_cart_data();
                                        function load_cart_data()
                                        {
                                          
                                          $.ajax({
                                           url:base_url+'site/cart/loadcartdata',
                                           method:"POST",
                                           dataType:"json",
                                           success:function(data)
                                           {
                                            $('#cart_details').html(data.cart_details);
                                            $('.cal-amount').text(data.total_price);
                                            $('.cart-count').text(data.total_item);

                                            if($('.cart-count').text()>0){
                                                $(".viewcartblock").show();
                                                $(".checkoutblock").show();
                                            }else{
                                                $(".viewcartblock").hide();
                                                $(".checkoutblock").hide();
                                            }





                                           }
                                          });
                                        }

                                    






                        $(document).on('click', '#ad2cart', function(){
                                       
                                    
                                       // Delete id
                                       var codeval = $('#code').val();
                                       var costval = $('#cost').val();
                                       var qtyval = $('#quantity').val();
                                       var action = "add";
                                       
                                      
                                        if(qtyval > 0)
                                          {
                                           $.ajax({
                                            url:base_url+'site/cart/addtocart',
                                            method:"POST",
                                            data:{codeval:codeval,costval:costval,qtyval:qtyval,action:action},
                                            success:function(data)
                                            {
                                                load_cart_data();
                                                alert("Item has been Added into Cart");
                                                $(".viewcartblock").show();
                                                $(".checkoutblock").show();
                                                //$('#miniCart-popup').show();
                                            }
                                           });
                                          }
                                          else
                                          {
                                           alert("Quantiy should be more than 0");
                                          }

                                       
                                    
                                     });



                                    //remove

                                    $(document).on('click', '.remove-icon', function(){
                                      var product_id = $(this).attr("id");
                                      //alert($('.cart-count').text());
                                      var action = 'remove';
                                      if(confirm("Do you want to remove this product?"))
                                      {
                                       $.ajax({
                                        url:base_url+'site/cart/removefromcart',
                                        method:"POST",
                                        data:{product_id:product_id, action:action},
                                        success:function()
                                        {
                                            load_cart_data();
                                            alert("Item has been removed from Cart");
                                            if($('.cart-count').text()==0){
                                                $(".viewcartblock").hide();
                                                $(".checkoutblock").hide();
                                            }
                                        }
                                       })
                                      }
                                      else
                                      {
                                       return false;
                                      }
                                    });

                        });