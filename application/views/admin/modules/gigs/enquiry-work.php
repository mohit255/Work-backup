<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">
							<?php  if($this->session->flashdata('message')){ ?>
						<p class="bg-success"><?php echo $this->session->flashdata('message'); ?></p>
						<?php } ?>
					<h4 class="page-title m-b-20 m-t-0">Manage Enquerys</h4><button class="btn btn-primary" id="delete_enquerys">Delete</button>

				</div>

			</div>

             <div class="row">

				<div class="col-lg-12">

					<div class="card-box">

						<div class="table-responsive">

							<table class="table table-actions-bar datatable table-striped"> 

								<thead>

									<tr>

										<th>
											
										<input type="checkbox" value="" name="" id="checkall_orders">
										</th>                                                  

										<th>Name</th>

										<th>Email</th> 			                                        

										<th>Contact</th>

										<th>Meassage</th>                                                 

										

									</tr>

								</thead>

								<tbody>

									<?php 

									 if(!empty($list)) 

									{
									

									foreach($list as $item) { ?>
										
									<tr>
                                    <td>
                                   <input type="checkbox" value="<?php echo @$item["id"]; ?>" name="" class="checkitem_orders"> 	

                                    </td>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo $item["email"]; ?></td>
                                    <td><?php echo $item["contact"]; ?></td>
                                    <td>
                                    	
                                    	<button type="button" data-id="<?php echo @$item["id"]; ?>" class="btn btn-info btn-sm show_message">Message</button>
                                    </td>
										
									</tr>

									<?php } } else { ?>

									<tr>

										<td colspan="10"><p class="text-danger text-center m-b-0">No Records Found</p></td>

									</tr>

									<?php } ?>

								</tbody>

							</table>

							<!-- <?php echo $links; ?> -->

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>



<div id="myModal_enquerys" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script type="text/javascript">
		var BASE_URL = "<?php echo base_url(); ?>";
		function admin_delete_gigs(id) {
			if(confirm("Are you sure you want ot delete this Packages?")){
				$.post(BASE_URL+'admin/admin_delete_gigs',{id:id},function(result){
					// if(result){
					// 	 location.reload();
					// }
					location.reload();
				});
			
			}	
		}

</script>