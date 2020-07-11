<?php $active_2 =$this->uri->segment(3); ?>
<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">

				<div class="col-sm-2">

					<h4 class="page-title m-b-20 m-t-0">Users <?php if($active_2=="index") { } else {  echo $active_2; } ?></h4>
					

				</div>
                  
			</div>
			<div class="row">
				<div class="col-sm-2">
                  	<select class="form-control" id="set_users">
                  		<option value="">Selete option</option>
                  		<option value="delete">Delete</option>
                  	<?php if($active_2=="influencer") { ?>
                  		<option value="add feature user">Add feature user</option>
                  		<option value="remove feature user">Remove feature user</option>
                  		<?php } ?>
                  	</select>
                  </div>
                  <div class="col-sm-2">
                  	<button type="button" class="btn btn-primary" id="delete_users">Apply</button>
                  </div>
			</div>

			<?php if($this->session->userdata('message')) {  ?>

		         <?php echo $this->session->userdata('message');?>

			<?php } ?>

			<div class="row">

				<div class="col-lg-12">

					<div class="card-box m-b-0">

						<div class="table-responsive">

							<table class="table table-actions-bar table-striped releasetable m-b-0">

								<thead>

									<tr>                                                    

										<th>
											<input type="checkbox" value="" name=""id="checkall">
										</th>
										<th>#</th>

										<th>Name</th>

										<th>E-mail</th>

										<th>User Type</th>

										<th>verified</th>

										<th>Status</th>
										<?php if($active_2=="influencer") { ?>
											<th>Feature User</th>
                                        <?php } ?>
										<th class="text-right">Action</th>

									</tr>

								</thead>

								<tbody>

									<?php 

									 if(!empty($list)) 

									{

									$i=1;

									foreach($list as $item) {

										$status = 'Active'; if($item['status']==1){$status = 'Inactive';} 

										$verified = 'Yes' ; if($item['verified']==1){$verified = 'No';} 

										if(!empty($item['parent_name'])){ $parent_category = $item['parent_name'];}

										?>

									<tr>                                                    

										<td><input type="checkbox" value="<?php echo @$item['USERID']; ?>" name="" class="checkitem"></td>
										<td><?php echo $i; ?></td>

										<td><?php echo $item['fullname']; ?></td>

										<td><?php echo $item['email']; ?></td>

										<td><?php if(@$item['are_you']=="Short") 
                                                   {
                                                          echo "Influnecer";
                                                   } 
                                                   else
                                                   {
                                                         echo "Business";
                                                   }

										?></td>

										<td><?php echo $verified; ?></td>                                                       

										<td><?php echo $status; ?></td>

										<?php if($active_2=="influencer") { ?>
											<td>
                                      <?php if($item['feature_user']=="No") {  ?>

<span class="label label-danger"><?php echo $item['feature_user']; ?></span>
                                     <?php   } else { ?>
<span class="label label-success"><?php echo $item['feature_user']; ?></span>

                                      <?php  } ?>

											</td>
                                        <?php } ?>

										<td class="text-right">

											<a href="<?php echo base_url()."admin/user/edit_user/".$item['USERID']; ?>" class="table-action-btn" title="Edit"><i class="mdi mdi-pencil text-success"></i></a>

											<!-- <a href="#" onclick="delete_user(<?php echo $item['USERID'] ?>)" class="table-action-btn" title="Delete"><i class="mdi mdi-window-close text-danger"></i></a> -->

										</td>

									</tr>

									<?php $i = $i+1; } } else { ?>

									<tr>

										<td colspan="7"><p class="text-danger text-center m-b-0">No Records Found</p></td>

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

</div>