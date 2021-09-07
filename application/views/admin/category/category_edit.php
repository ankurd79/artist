<?php
//print_r($results);

?>
<style>
/*.error{display:block; font-size:12px; font-weight:400!important; color:red;}*/
.custom-file:nth-child(odd) {padding-right:15px;}
.custom-file:nth-child(even) {padding-left:15px;}
</style>
</style>

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

              			<form id='frmcat_edit' name='frmcat_edit' method='post' enctype="multipart/form-data" autocomplete="off">
			                <div class="card-body">
			                	
			                	
			                	<div class="form-row">
			                  <div class="form-group col-md-6">
			                    <label for="exampleInputEmail1">Product Category</label>
			                    <input type="text" class="form-control" value='<?php echo $results[0]['category_name'] ?>' name="category_name" id="category_name" placeholder="Product category">	
			                  </div>

			                  

			                  <div class="form-row">
			              	<div class="form-group col-md-12">
			                    <label for="exampleInputPassword1">Description</label>
			                    <textarea class="form-control" rows="15" name="description" id="summernote" placeholder="Enter ..."><?php echo html_entity_decode($results[0]['category_description']) ?></textarea>
			                  </div>
			              </div>


			                  
			              </div>

			              <div class="form-row">
			              	<div class="form-group col-md-12">
			                    <label for="exampleInputPassword1">Meta Information</label>
			                    <div class="row mt-2">
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Title</label>
			              				<textarea class="form-control" rows="4" name="meta_title" id="meta_title" placeholder="Meta Title"><?php echo html_entity_decode($results[0]['meta_title']) ?></textarea>
			              			</div>
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Description</label>
			              				<textarea class="form-control" rows="4" name="meta_description" id="meta_description" placeholder="Meta Description"><?php echo html_entity_decode($results[0]['meta_description']) ?></textarea>
			              			</div>
			              			<div class="col-md-4">
			              				<label for="exampleInputPassword1">Keywords</label>
			              				<textarea class="form-control" rows="4" name="meta_keywords" id="meta_keywords" placeholder="Meta keywords"><?php echo html_entity_decode($results[0]['meta_keywords']) ?></textarea>
			              			</div>
			              		</div>
			                  </div>
			              </div>
			              
			              



			              

			              

			              
			                  <div class="form-check">
		                          <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php if($results[0]['is_active']==1) {?>checked <?php } ?>>
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
			                <input type='hidden' id='category_id' name='category_id' value='<?php echo base64_encode($results[0]['id']) ?>'>
              			</form>	




					</div>


				</div>


				


			</div>
		</div>
	</section>


</div>


<script src="<?php echo base_url() ?><?php echo adm_assets ?>/modules/<?php echo $jsfile ?>.js"></script>