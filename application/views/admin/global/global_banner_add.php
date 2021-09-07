<?php
//print_r($homebannerlist);
$totalbanners=count($homebannerlist);
$loopbanners=5-$totalbanners;
?>


<div class="content-wrapper">
	<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $main_title ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?php echo base_url() ?>dashboard">Home</a></li>
              <li class="breadcrumb-item active"><?php echo $sub_title ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
	
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card card-primary">
						<div class="card-header">
                			<h3 class="card-title"><?php echo $sub_title ?></h3>
              			</div>

              			<form id='frm' name='frm' method='post' enctype="multipart/form-data" autocomplete="off">
			                <div class="card-body">
			               
			             <?php if (count($homebannerlist)>0) {?>   		
			              <table class="table">
	                  		<thead>
	                    		<tr>
	                      				<th style="width: 10px">#</th>
	                      				<th style="width: 10%">Web Banner</th>
	                     				 <th style="width: 30%">&nbsp;</th>
	                      				<th style="width: 10%">Mobile Banner</th>
	                      				<th style="width: 30%">&nbsp;</th>
	                      				<th style="width: 20%">Position</th>
	                      				<th style="width: 10px">Action</th>
	                    		</tr>
	                  		</thead>

                  
	                  			<?php 
	                  				$i=1;
	                  			foreach($homebannerlist as $lst) {?>
	                  				<tr>
	                  						<td><?php echo $i++ ?></td>
	                  						<td>
	                  							<img src="<?php echo base_url() ?>images/global/banners/<?php echo $lst['banner_image'] ?>" style="width:100%; height:auto;">
	                  						</td>
	                  						<td >
	                  							<input type="file"  name="banner_image[]" id="banner_image1">
	                  						</td>
	                  						<td>
	                  							<?php if($lst['mobile_banner_image']) {?>
	                  							<img src="<?php echo base_url() ?>images/global/banners/<?php echo $lst['mobile_banner_image'] ?>" style="width:100%; height:auto;">
	                  						<?php } ?>

	                  						</td>
	                  						<td>
	                  							<input type="file"  name="mobile_banner_image[]" id="banner_image1">
	                  						</td>
	                  						<td>
	                  							<input type="text" class="form-control" id="postion[]" name="position[]" placeholder="0" value='<?php echo $lst['position'] ?>'>
	                  						</td>
	                  						<td>
	                  							<label class="switch">
                            						<input type="checkbox" class="m" name="chk_active" id="p_<?php echo $lst['id'] ?>_<?php echo $lst['is_active'] ?>" value="1" <?php if($lst['is_active']==1) {?>checked="checked"<?php } ?>>
                            						<span class="slider round"></span>
                          						</label>
	                  						</td>
	                  						<input type='hidden' name='banner_id[]' value='<?php echo $lst['id'] ?>'>
	                  				</tr>
                  				<?php } ?>
                  

              				</table>
          				<?php } ?>




          				<?php if($loopbanners==5) {?>	
			              <div class="form-row">
			              	
			              	<div class="form-group col-md-5">
			              		
			              		<?php for($a=0;$a<5;$a++) {?>
				              		<div class="custom-file mt-2">
				                        <input type="file" class="custom-file-input" name="banner_image[]" id="banner_image1">
				                        <label class="custom-file-label" >Choose file</label>
				                      </div>
			                    <?php } ?>
			                      
			              	</div>

			              	<div class="form-group col-md-5">
			              		
			              		<?php for($a=0;$a<5;$a++) {?>
				              		<div class="custom-file mt-2">
				                        <input type="file" class="custom-file-input" name="mobile_banner_image[]" id="mobile_banner_image">
				                        <label class="custom-file-label" >Choose file</label>
				                      </div>
			                    <?php } ?>
			                      
			              	</div>

			              	<div class="form-group col-md-1">
			              		
			              		<?php for($a=0;$a<5;$a++) {?>
				              		<div class="custom-file mt-2">
			                    <input type="text" class="form-control" id="postion[]" name="position[]" placeholder="0">
				                      </div>
			                    <?php } ?>
			                      
			              	</div>
			              	
			              </div>
			              <?php } else { ?>
			              		<div class="form-row">
			              		<div class="form-group col-md-5">
			              		
				              		<?php for($a=0;$a<$loopbanners;$a++) {?>
					              		<div class="custom-file mt-2">
					                        <input type="file" class="custom-file-input" name="banner_image[]" id="banner_image1">
					                        <label class="custom-file-label" >Choose file</label>
					                      </div>
				                    <?php } ?>
			                      
			              	   </div>

			              	   <div class="form-group col-md-5">
			              		
			              		<?php for($b=0;$b<$loopbanners;$b++) {?>
				              		<div class="custom-file mt-2">
				                        <input type="file" class="custom-file-input" name="mobile_banner_image[]" id="mobile_banner_image">
				                        <label class="custom-file-label" >Choose file</label>
				                      </div>
			                    <?php } ?>
			                      
			              	</div>

			              	<div class="form-group col-md-1">
			              		
			              		<?php for($c=0;$c<$loopbanners;$c++) {?>
				              		<div class="custom-file mt-2">
			                    <input type="text" class="form-control" id="postion[]" name="position[]" placeholder="0">
				                      </div>
			                    <?php } ?>
			                      
			              	</div>
			              	</div>			


			             <?php } ?> 	

			             
			                  
			                  
			                </div>
			                <!-- /.card-body -->

			                <div class="card-footer">
			                	<div class="container">
			                		<div class="row">
			                  <div class="col-md-12 text-center"><input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary swalDefaultSuccess"></div>
			                 
			              </div>
			              </div>
			                </div>
			                <div class="lds-facebook" style="display:none;"><div></div><div></div><div></div></div>
              			</form>	




					</div>


				</div>


				


			</div>
		</div>
	</section>


</div>

<script>

$("#frm").on('submit',(function(e) {
        //alert('hello');
              e.preventDefault();
              //if($("#frmgalleryedit").valid()){
                  $.ajax({
                      type:'POST',
                      cache: false,
                      contentType: false,
                      processData: false,
                      url:base_url+'add-home-banners',
                      data:new FormData(this),
                      beforeSend: function ( xhr ) {
                          //Add your image loader here
                           jQuery(".lds-facebook").show();
                      },
                      success:function(data){
                      //alert(data);
                            jQuery(".lds-facebook").hide();
                    //$("#shwdatatable").load(base_url+'fetch-brands');
                    if(data=='Banner added.'){
                    
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
                            title: ' Banner added.'
                          })
                        });
                      location.reload();
                      /*
                      var delay = 3000;
                      var url = base_url+'manage-unit-meta-information/list/'+unit_id;
                      var timeoutID = setTimeout(function() {window.location.href = url;}, delay); 
                      */
                       
                    
                    
                  }
                          
                      },
                  error : function(XMLHttpRequest, textStatus, errorThrown) {
                      alert(textStatus);
                  }
              });
          //}
      }));
		

		$(document).on('click', '.m', function(){
                                       var el = this;
                                       var id = this.id;
                                       var splitid = id.split("_");
                                    
                                       // Delete id
                                       var recordid = splitid[1];
                                       var value = splitid[2];
                                       
                                       var table = "home_banners";
                                      
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

</script>