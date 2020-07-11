<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title m-b-20 m-t-0">Edit Category</h4>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-12">

					<div class="card-box">

						<form id="admin_add_cat" action="<?php echo base_url().'admin/blog/edit_category/'.$list['id']; ?>" method="post"  enctype="multipart/form-data"  >
<input type="hidden" name="old_image" value="<?php echo $list['category_image'];  ?>">
							

							<div class="form-group">

								<label for="category_name">Category Name</label>

								<input type="text" name="category_name"  placeholder="Enter Category Name " value="<?php if(!empty($list['name'])){echo $list['name']; } ?>" class="form-control" id="category_name" required>

							</div>  
							<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Category Icon Image</label>

								<input type="file" name="image"  accept=".png,.jpg,.gif,.jpeg"  placeholder="Enter Category Name " class="form-control" id="category_name" >

							</div>                              

							<input type ="hidden" name="catagory_id" value="<?php if(!empty($list['id'])){echo $list['id']; } ?>" id="catagory_id">

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

							<div class="form-group m-b-0 m-t-30">

								<button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>

								<a href="<?php echo base_url().'admin/category'?>" class="btn btn-default m-l-5">Cancel</a>

							</div>

						</form>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>