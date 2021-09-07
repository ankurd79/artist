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

              			<form id='frmcs_edit' name='frmcs_edit' method='post' enctype="multipart/form-data" autocomplete="off">
			                <div class="card-body">
			                	
			                	
			              <div class="form-row">
			                  <div class="form-group col-md-9">
			                    <label for="exampleInputEmail1">Name of client</label>
			                    <input type="text" class="form-control" value='<?php echo $results[0]['client_name'] ?>' name="client_name" id="client_name" placeholder="Name of client">	
			                  </div>
			                  
			              </div>
			              

			              <div class="form-row">
			                  <div class="form-group col-md-9">
			                    <label for="exampleInputEmail1">Testimonial Text</label>
			                    <textarea class="form-control" rows="4" name="text" id="text" placeholder="Testimonial Text"><?php echo $results[0]['text'] ?></textarea>
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
			                  <div class="col-md-12 text-center"><input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary"></div>
			                  <input type='hidden' name='csay_id' id='csay_id' value='<?php echo base64_encode($results[0]['id']) ?>'?>
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


<script src="<?php echo base_url() ?><?php echo adm_assets ?>/modules/<?php echo $jsfile ?>.js"></script>