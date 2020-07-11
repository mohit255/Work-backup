<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">

				<div class="col-sm-8">

					<h4 class="page-title m-b-20 m-t-0">Our Blog</h4>

				</div>

				<div class="col-sm-4 text-right m-b-20">

					<a href="<?php echo base_url().'admin/blog/add_new_blog'; ?>" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add New</a>

				</div>

			</div>

			<?php if($this->session->flashdata('message')) { ?>

				<?php echo $this->session->userdata('message');?>

			<?php }

			?>    

			<div class="row">

				<div class="col-lg-12">

					<div class="card-box m-b-0">

						<div class="table-responsive">

							<table class="table table-actions-bar datatable">

								<thead>

									<tr>

										<th>#</th>
										<th>Image</th>
										<th>TItle</th>
										<th>Categorys</th>
										<th>Date</th>
										<th>Status</th>

										<th class="text-right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php 

									 if(!empty(@$list)) 

									{
										$i=0;

									foreach(@$list as $item) { 

										$status = 'Active'; if($item['status']==1){$status = 'Inactive';} 

										$parent_category = 'None' ;
                      $i=$i+1;
									

										?>

									<tr>
										<td><?php echo @$i;  ?> </td>

										<td>
<?php  if(@$item['image']){ 

   $imgs_set=base_url().'assets/cat_image/'.$item['image'];
}
 else
 {
    $imgs_set=base_url().'assets/cat_image/1539777409_rodolfo_logo.png';
 }

 ?>

<img alt="dfv-weafbf-dbsfbghts" src="<?php echo @$imgs_set; ?>" style="width:70px; height:40px; border-radius: 6px;">
							

						</td>


										<td><?php echo $item['title']; ?></td>

									<td>
										
						<?php 

$get_cat=$this->db->query("SELECT name FROM blog_categories WHERE id IN (".implode(",",explode("*#*",$item["categorys"])).") ORDER BY id DESC")->result_array();
// var_dump($get_cat);
$cat_name=[];
foreach ($get_cat as $key) {
	array_push($cat_name, $key["name"]);
}
// var_dump($cat_name);

echo implode(",", $cat_name);


						 ?>
									</td>

										<td><?php echo  $item['date']; ?></td>
										<td><?php echo $status; ?></td>

										<td class="text-right">

											<a href="<?php echo base_url()."admin/blog/edit_content/".$item['id']; ?>" class="table-action-btn" title="Edit"><i class="mdi mdi-pencil text-success"></i></a>

											<a href="javascript:;" onclick="delete_contect_of_blog(<?php echo $item['id'] ?>)" class="table-action-btn" title="Delete"><i class="mdi mdi-window-close text-danger"></i></a>

										</td>

									</tr>

									<?php } } else { ?>

									<tr>

										<td colspan="4"><p class="text-danger text-center m-b-0">No Records Found</p></td>

									</tr>

									<?php } ?>

								</tbody>

							</table>

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>