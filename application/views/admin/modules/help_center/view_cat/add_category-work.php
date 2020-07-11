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

					<h4 class="page-title m-b-20 m-t-0">Add Category</h4>

				</div>

			</div>

			<div class="row">

				<div class="col-lg-12">

					<div class="card-box">

						<form id="admin_add_cat" action="<?php echo base_url().'admin/help_center/add_category'; ?>" method="post"  enctype="multipart/form-data"  >

							

							<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Category Name</label>

								<input type="text" name="category_name"  placeholder="Enter Category Name " class="form-control" id="category_name" required>

							</div>

							<div class="form-group">

								<div class="text-center text-error" id="error-exist"></div>

								<label for="category_name">Category Icon Image</label>

								<input type="file" required=""  accept=".png,.jpg,.gif,.jpeg" name="image"  placeholder="Enter Category Name " class="form-control" id="category_name" required>

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