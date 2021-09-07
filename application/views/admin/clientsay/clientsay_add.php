
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

              			<form id='frmcs_add' name='frmcs_add' method='post' enctype="multipart/form-data" autocomplete="off">
			                <div class="card-body">
			                	
			                	
			              <div class="form-row">
			                  <div class="form-group col-md-9">
			                    <label for="exampleInputEmail1">Name of client</label>
			                    <input type="text" class="form-control" name="client_name" id="client_name" placeholder="Name of client">	
			                  </div>
			                  
			              </div>
			              

			              <div class="form-row">
			                  <div class="form-group col-md-9">
			                    <label for="exampleInputEmail1">Testimonial Text</label>
			                    <textarea class="form-control" rows="4" name="text" id="text" placeholder="Testimonial Text"></textarea>
			                  </div>
			                  
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
			                  <div class="col-md-12 text-center"><input type="submit" id="submit" name="submit" value="Submit" class="btn btn-primary"></div>
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
                <h3 class="card-title">Testimonials</h3>

                
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