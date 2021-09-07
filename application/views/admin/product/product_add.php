
<?php
//print_r($categorylist);
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

              			<form id='frmprd_add' name='frmprd_add' method='post' enctype="multipart/form-data" autocomplete="off">
			                <div class="card-body">
			                	
			                	
			                	<div class="form-row">
			                  <div class="form-group col-md-6">
			                    <label for="exampleInputEmail1">Product Category</label>
			                    <select class="form-control" id="category_id" name='category_id'>
				                    
				                    <option value='0'>Select</option>
				                    <?php foreach($categorylist as $catg) {?>
				                    	<option value='<?php echo $catg['id'] ?>'><?php echo $catg['category_name'] ?></option>
				                    <?php } ?>
                  				</select>
			                  </div>

			                  <div class="form-group col-md-6">
			                    <label for="exampleInputEmail1">Product</label>
			                    <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name">	
			                  </div>

			                  <div class="form-group col-md-6">
			                    <label for="exampleInputEmail1">Product Listing Image</label>
			                    <div class="input-group">
			                      <div class="custom-file">
			                        <input type="file" class="custom-file-input" name="listing_image" id="listing_image">
			                        <label class="custom-file-label" >Choose file</label>
			                      </div>
			                     
			                    </div>	
			                  </div>

			                  

			                  <div class="form-group col-md-6">
			                    <label for="exampleInputEmail1">Product Cost</label>
			                    <input type="text" class="form-control" name="product_cost" id="product_cost" placeholder="Product Cost">	
			                  </div>

			                  

			                  <div class="form-row">
			              	<div class="form-group col-md-12">
			                    <label for="exampleInputPassword1">Description</label>
			                    <textarea class="form-control" rows="15" name="product_description" id="summernote" placeholder="Enter ..."></textarea>
			                  </div>
			              </div>


			                  
			              </div>

			              <div class="form-row">
			              	<div class="form-group col-md-6">
			              		<label for="exampleInputPassword1">Gallery Images</label>
			              		<?php for($a=0;$a<5;$a++) {?>
				              		<div class="custom-file mt-2">
				                        <input type="file" class="custom-file-input" name="banner_image[]" id="banner_image1">
				                        <label class="custom-file-label" >Choose file</label>
				                      </div>
			                    <?php } ?>
			                      
			              	</div>

			              	
			              	
			              </div>

			              <div class="form-row">
			              	<div class="form-group col-md-12">
			                    <label for="exampleInputPassword1">Meta Information</label>
			                    <div class="row mt-2">
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Title</label>
			              				<textarea class="form-control" rows="4" name="meta_title" id="meta_title" placeholder="Meta Title"></textarea>
			              			</div>
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Description</label>
			              				<textarea class="form-control" rows="4" name="meta_description" id="meta_description" placeholder="Meta Description"></textarea>
			              			</div>
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Keywords</label>
			              				<textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords" placeholder="Meta keywords"></textarea>
			              			</div>
			              		</div>
			                  </div>
			              </div>
			              
			              



			              
			              		<div class="form-check">
		                          <input class="form-check-input" type="checkbox" id="in_stock" name="in_stock" >
		                          <label class="form-check-label">In Stock</label>
                        	</div>
			              

			              
			                  <div class="form-check">
		                          <input class="form-check-input" type="checkbox" id="is_active" name="is_active" checked>
		                          <label class="form-check-label">Activate</label>
                        	</div>
			                </div>
			                <!-- /.card-body -->

			                <div class="card-footer">
			                	<div class="container">
			                		<div class="row">
			                  <div class="col-md-2"><input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary"></div>
			                  <!--<div class="col-md-10">
			                  	<p class="badge badge-success p-2 mt-2">Data added Successfully</p>
			                  	<div class="alert alert-success alert-dismissible" >
                  				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <p class="mb-0"><i class="icon fas fa-ban"></i></p>
                   
                				</div>
			                  </div>-->
			              </div>
			              </div>
			                </div>
			                <div class="lds-facebook" style="display:none;"><div></div><div></div><div></div></div>
              			</form>	




					</div>


				</div>


				<div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Products </h3>

                
              </div>
              <!-- /.card-header -->
              <div class="card-body p-0" id="shwdatatable">
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            
            <!-- /.card -->
          </div>


			</div>
		</div>
	</section>


</div>


<script src="<?php echo base_url() ?><?php echo adm_assets ?>/modules/<?php echo $jsfile ?>.js"></script>