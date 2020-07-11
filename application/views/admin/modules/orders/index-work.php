<div class="content-page">

	<div class="content">

		<div class="container">

			<div class="row">

				<div class="col-sm-12">

					<h4 class="page-title m-b-20 m-t-0">Payment</h4>

				</div>

			</div>
      
			<div class="row">

				<div class="col-lg-12">

<div class="row">
      	<div class="col-md-2">
      		<select class="form-control" id="operation">
      			<option value="">select Operation</option>
      			<option value="delete">Delete</option>
      			<option value="Seller">Change Seller Status</option>
      			<option value="Buyer">Change Buyer Status</option>
      		</select>
      	</div>
      	<div class="col-md-2 set_css_oredr_dsp" id="set_css_order_status">
      		<select class="form-control" id="status">
      			<option value="">select Status</option>
      			<option value="0">Failed</option>
      			<option value="1">New</option>
      			<option value="2">Pending</option>
      			<option value="3">Process</option>
      			<option value="4">Refunded</option>
      			<option value="6">Completed</option>
      		</select>
      	</div>
      	<div id="set_status_drop_down"></div>
      	<div class="col-md-4">
      		<button class="btn btn-primary" id="apply_for_orders">Apply</button>
      	</div>
      </div>
					<div class="card-box m-b-0">

						<div class="table-responsive">

							<table class="table table-striped table-actions-bar datatable ">

								<thead>

									<tr>                                  

										<th>
<input type="checkbox" value="" name=""id="checkall_orders">
										</th>
										<th>Payment Id</th>

										<th>Payment Date</th>

										<th>Transaction Id</th>

										<th>Buyer Name</th>

										<th>Amount</th>

										

										<th>Status</th>

									</tr>

								</thead>

								<tbody>

									<?php

									 if(!empty($list)) 

									{										 

									foreach($list as $item) {



											$case = $item['currency_type'];

										 switch ($case) {

								 			case 'USD':

								 			$rate_symbol = "$";	

								 			break;

								 		case 'EUR':

								 			$rate_symbol = "€";	

								 			break;

								 		case 'GBP':

								 			$rate_symbol = "£";	

								 			break;

								 		

								 		default:

								 			$rate_symbol = "$";	

								 			break;

								 	}

										

										$status = 'Active'; if($item['status']==1){$status = 'Inactive';} 

										$parent_category = 'None' ;

										$status = $item['seller_status']; 

										$class='';

										$sts='';

										if($status == 0)

										{

											$sts='Failed';

											$class='label-danger';

										}

										elseif($status ==1) {

											$sts='New';

											$class='label-success';

											if($item['buyer_status'] ==1) {

											if($item['cancel_accept'] ==1){

												$sts='Cancelled';

												$class='label-danger';

											}else if($item['cancel_accept'] ==0){

												$sts='Cancel Request';

												$class='label-danger';

											}

											}

											

										}elseif($status ==2){

											$sts='Pending';

											$class='label-warning';

											if($item['buyer_status'] ==1) {

											if($item['cancel_accept'] ==1){

												$sts='Cancelled';

												$class='label-danger';

											}else if($item['cancel_accept'] ==0){

												$sts='Cancel Request';

												$class='label-danger';

											}

											}

										}elseif($status ==3){

											$sts='Process';

											$class='label-primary';

										}elseif($status ==4){

											$sts='Refunded';

											$class='label-danger';

										}elseif($status ==5){

											if($item['decline_accept'] ==0)

											{

												$sts='Decline Request';

											}

											else{

												$sts='Declined';

											}

											$class='label-danger';

										}elseif($status ==6){

											$sts='Completed';

											$class='label-success';

										}elseif($status ==7){

$data=$this->db->query("select * from buyer_rejected_list where order_id='".@$item['newid']."'");
if($data->row_array())
{
		$sts='Reject Complet Request';

		$class='label-warning';
}
else
{
		$sts='Complet Request send';

											$class='label-success';
}

										
                                          } 
										 $created_on = '-';

										if (isset($item['created_at'])) {

											if (!empty($item['created_at']) && $item['created_at'] != "0000-00-00 00:00:00") {

												$created_on = '<span>' . date('d M Y', strtotime($item['created_at'])) . '</span>';

											}

										}	

										$payment_status = $item['payment_status']; 

										if($payment_status ==1) {

											$pay_status='Request';

											$class_1='label-primary';

										}elseif($payment_status ==2){

											$pay_status='Paid';

											$class_1='label-info';

										}

										else

										{

											$pay_status='New';

											$class_1='label-success';

										}

										?>

									<tr>
										<td><input type="checkbox" value="<?php echo @$item['newid']; ?>" name="" class="checkitem_orders"></td>

										<td><?php echo $item['newid']; ?></td>

										<td><?php echo $created_on; ?></td>

										<td><?php echo $item['paypal_uid']; ?></td>

										<td><?php echo $item['seller_name']; ?></td>  

										<td><?php echo $item['paypal_email_id']; ?></td>    

										<td><?php echo $item['buyer_name']; ?></td>

										<td><?php echo $rate_symbol.$item['item_amount']; ?></td>

										<td><span class="label <?php echo $class;?>"><?php echo $sts;?></span></td>

										<?php if($item['buyer_status'] ==1  && $item['cancel_accept'] ==1) {?>

										<td><span class="label label-primary">Payment request from buyer</span></td>

										<?php  }else if($item['buyer_status'] ==1  && $item['cancel_accept'] ==0) {?>

										<td><span class="label label-primary">Waiting for seller approval</span></td>

										<?php  }else  {?>

										<td>-</td>

										<?php }?>

									</tr>

									<?php } } else { ?>

									<tr>

										<td colspan="10"><p class="text-danger text-center m-b-0">No Records Found</p></td>

									</tr>

									<?php } ?>

								</tbody>

							</table>

						<!-- 	 <?php echo $links; ?> -->

						</div>

					</div>

				</div>

			</div>

		</div>

	</div>

</div>

 <script>

 function change_payments_status(id,ele)

 {

	 bootbox.confirm("Are you sure want to UPDATE ? ", function(result) {

     //alert(result)

     if(result ==true)                {

	 var url        = BASE_URL+'admin/request/update_payment_status';

              $.ajax({

			  url:url,

			  data:{id:id}, 

			  type:"POST",

			  success:function(res){ 

		        if(res==1)

                        {

                            $("#"+ele).html('<span class="label label-info">Paid</span>');

                        }

			  }

		});  

		}

     });            

        

 }

</script>