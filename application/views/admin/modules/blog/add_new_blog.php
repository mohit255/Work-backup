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

						<form id="admin_add_cat" action="<?php echo base_url().'admin/blog/add_new_blog'; ?>" method="post"  enctype="multipart/form-data"  >

						<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Blog Title</label>

								<input type="text" name="name"  placeholder="Enter Title " class="form-control" id="category_name" required>

							</div>	
<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Category Name</label>

<div class="row">
	<hr>
	<?php if(@$category) { foreach(@$category as $cat ) { ?> 
       <div class="col-md-4">
       	<label for="select_category_<?php @$cat["id"]; ?>">
		<input type="checkbox" value="<?php echo @$cat["id"]; ?>" name="categorys[]" id="select_category__<?php @$cat["id"]; ?>"> <?php echo $cat["name"]; ?>
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
								 <img id="blogimg2" src="blog_img/<?php echo @$edit2['img'];?>"  alt="" />
								 <label title="Upload image file" for="profile_cover_imaege" style="margin-top: 3%;" class="btn btn-primary btn-block">
								 	    <?php
             if(@$info->my_profilee)
             {
                $set_level="Change";
             }
             else
             {
              $set_level="Select Fetured Image";
             }

?>
<input type="file" name="blogfetured" id="blogfetured" data-preview-file-type="text" placeholder="Enter Title " class="form-control" id="category_name" required style="position: absolute; opacity: 0; margin-left: -47%; width: 95%;height: 42px; margin-top: -6px;">
								<h4 id="setTextDsp" style="margin-bottom: 0px; color: #ffffff;"><?php echo $set_level; ?></h4>
								 </label>

							</div>
							

<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Content</label>

								<textarea class="form-control" required="" name="page_desc" id="ck_editor_textarea_id"></textarea>
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