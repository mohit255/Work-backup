<div class="content-page">

	<div class="content">

		<div class="container">
<?php if($this->session->flashdata("alert")) { ?>
<div class="row">
	<div class="col-md-12">
		<div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo @$this->session->flashdata("alert"); ?></strong>
  </div>
	</div>
</div>
	<?php } ?>

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title m-b-20 m-t-0">Add New Content</h4>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-12">

					<div class="card-box">

						<form id="admin_add_cat" action="<?php echo base_url().'admin/blog/edit_content/'.$list['id']; ; ?>" method="post"  enctype="multipart/form-data"  >
<input type="hidden" name="blogfetured_old" value="<?php echo @$list["image"];?>">
						<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Blog Title</label>

								<input type="text" name="name" value="<?php echo @$list["title"]; ?>" placeholder="Enter Title " class="form-control" id="category_name" required>

							</div>	

							<div class="form-group">

								<label class="control-label">Status</label>

								<div>

									<div class="radio radio-primary radio-inline">

										<input type="radio" id="blog_status1" value="0" name="status" <?php

										if ($list['status'] == 0) {

											echo 'checked=""';

										}

										?>>

										<label for="blog_status1">Active</label>

									</div>

									<div class="radio radio-danger radio-inline">

										<input type="radio" id="blog_status2" value="1" name="status" <?php

										if ($list['status'] == 1) {

											echo 'checked=""';

										}

										?>>

										<label for="blog_status2">Inactive</label>

									</div>

								</div>

							</div>

<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Category Name</label>

<div class="row">
	<hr>
	<?php 
 $user_cat=explode("*#*", @$list["categorys"]);
	if(@$category) { foreach(@$category as $cat ) { 


  if(in_array(@$cat["id"], @$user_cat))
   {
   	 $set_test='checked=""';
   }
   else
   {
   	 $set_test='';
   }

		?> 
       <div class="col-md-4">
       	<label for="select_category_<?php @$cat["id"]; ?>">
		<input type="checkbox" value="<?php echo @$cat["id"]; ?>" <?php echo  $set_test; ?> name="categorys[]" id="select_category__<?php @$cat["id"]; ?>"> <?php echo $cat["name"]; ?>
		</label>
	</div>                      
     
									<?php } } ?>

	
</div>

							<!-- 	<select name="Category" class="form-control" required="">
									<option value="">Select Category</option>
									
								</select> -->

							</div>
<hr>
			

<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Image<span></span></label>
				

				<img id="blogimg2" src="<?php echo base_url(); ?>assets/cat_image/<?php echo @$list["image"];?>"  style="width:100%; height: 300px;" alt="" />
								 <label title="Upload image file" for="profile_cover_imaege" style="margin-top: 3%;" class="btn btn-primary btn-block">
								 	    <?php
             if(@$list["image"])
             {
                $set_level="Change";
             }
             else
             {
              $set_level="Select Fetured Image";
             }

?>
<input type="file" name="blogfetured" id="blogfetured" data-preview-file-type="text" placeholder="Enter Title " class="form-control" id="category_name" style="position: absolute; opacity: 0; margin-left: -47%; width: 95%;height: 42px; margin-top: -6px;">
								<h4 id="setTextDsp" style="margin-bottom: 0px; color: #ffffff;"><?php echo $set_level; ?></h4>
								 </label>

							</div>
							

<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Content</label>

								<textarea class="form-control" required="" name="page_desc" id="ck_editor_textarea_id">
									<?php echo @$list["content"]; ?>
								</textarea>
<?php echo display_ckeditor($ckeditor_editor1);  ?>
							</div>
							

							<div class="form-group m-b-0 m-t-30">

								<button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>

							</div>

                        </form>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>