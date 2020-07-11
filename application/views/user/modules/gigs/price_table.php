
<?php 
if($this->session->userdata('SESSION_USER_ID'))
    { 
      $user_id = $this->session->userdata('SESSION_USER_ID');              
    $query = $this->db->query("SELECT `username` , user_thumb_image , fullname, types,end_date_in_string,end_date FROM `user_login` WHERE `USERID` = $user_id ");
    $result = $query->row_array();
}

?>
<style type="text/css">
	.table-bordered th {
    text-align: center;
}
.table-bordered td {
   /* text-align: center;*/
   color: #fff;
}
.modal-content p {
    color: #fff;
}
</style>
 <div id="checkout-popup" class="modal fade custom-popup order-popup" role="dialog">

				<div class="modal-dialog">

					<div class="modal-content">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<div class="modal-header text-center">

							<h4 class="sign-title">Buy the Package</h4>

						</div>

						<div class="modal-body">

							<div class="row">

								<div class="col-md-6">

									<ul class="quantity-list">

										<li>

											<div class="form-group clearfix">

												<label class="label-title" style="color: #fff">Price</label>

<input type="text" class="form-control" readonly="" id="last_modifiy_inputid" value="00">

<input type="hidden" value="00" name="default_gigsamount" id="default_gigsamount" />

											</div>

										</li>

										<li><span class="multiple"><i aria-hidden="true" class="fa fa-times"></i></span></li>

										<li>

											<div class="form-group clearfix">

												<label class="label-title" style="color: #fff;">Quantity</label>

												<span class="quantity-select">1</span>

											</div>

										</li>

									</ul>

								</div>

								<div class="col-md-6">

									<div class="text-right summary">

										<span class="price-tag" style="color: #fff;"> $<span id="change_ratecount">00</span></span>

									</div>

								</div>

							</div>



                            <div id="extra_gig_calculation"></div>

							<form action="<?php echo base_url().'user/buy_service/payment';?>" method="post" id="payment_formid" name="payment_submit">

								<input type="hidden" name="package_rate_set" id="package_rate_set" value="" />

                                <input type="hidden" name="converted_india_gigs_rate_set" id="converted_india_gigs_rate_set" value="500" />

                                <input type="hidden" name="package_actual_rate_set" id="package_actual_rate_set" value="" />

                                <input type="hidden" name="package_id_set" id="package_id_set" value="" />

                                <input type="hidden" name="gig_user_id" id="gig_user_id" value="0" />

                                <!-- <input type="hidden" name="extra_gig_row_id" id="extra_gig_row_id" value="" /> -->

                                <input type="hidden" value="" name="currency_type_set" id="currency_type_set" />

                                <!-- <input type ="hidden" name="hidden_super_fast_delivery" value="" id="hidden_super_fast_delivery"  /> -->

                                <input type ="hidden" name="package_finesh_day_set" value="" id="package_finesh_day_set"  />

                                <!-- <input type="hidden" id="hidden_super_fast_delivery_charges" name="hidden_super_fast_delivery_charges" value="" /> -->

								<div id="payment-method">

									<h4 class="clearfix" style="color: #fff;">Select your payment method</h4>

									<div class="payment-method">

									 <?php if ($paypal_allow == 1) { ?>	

                              

                              <label class="radio-inline bold" style="color: #fff">

                              <input class="le-radio" type="radio" onchange="check_payment_type(this)" name="group2" value="Direct"  > <img src="<?php echo base_url();?>assets/images/paypal-icon.png" alt="Paypal" width="24" height="22"> Paypal</label>

                    <?php }  ?>                    

                    <!-- <?php if ($stripe_allow == 1) { ?>  

                            <?php if (!empty($publishable_key)) { ?>

                                <label class="radio-inline bold">

                                <input class="le-radio" type="radio" onchange="check_payment_type(this)" name="group2" value="stripe" >Stripe</label>

                            <?php } ?>

                     <?php } ?>     -->               



									</div>

								</div>

								<div>

									<button type="submit" id="payment_btn" style="display: none; color: #fff" class="btn btn-green buyitnow-btn" value="true" name="submit">Buy it now</button>

								</div>

							</form>

						</div>

						<div class="modal-footer text-left">

							<div class="media secure-money">

								<div class="media-left">

									<img width="46" height="40" src="<?php echo base_url();?>assets/images/secure-money.png" alt="">

								</div>

								<div class="media-body">

									<span style="color: #fff"></span>

								</div>

							</div>

						</div>

					</div> 

				</div>

			</div>

<div id="set_css_for_price_table">
<section style="padding: 20px 0;">
	<input type="hidden" name="rate_symbol" id="rate_symbol" value="$">

	<div class="container">
		<?php
           if(@$type=='Escort')
           {
           	$set_new_1='Agency';
           	$set_new_2='Establishment';
           }
           else
           {
           	 if(@$type=='Agency')
           		{
           			$set_new_1='Escort';
           	        $set_new_2='Establishment';
           		}
           		else
           		{
           		  $set_new_1='Agency';
           	      $set_new_2='Escort';	
           		}
           		
           }
             
           
		?>
  <h1 style="color:#000;">Pricing Table For <?php echo @$type; ?><a href="price-table-for/<?php echo @$set_new_1; ?>"><button type="button" class="btn btn-primary btn-sm"><?php echo @$set_new_1; ?></button></a>
<a href="price-table-for/<?php echo @$set_new_2; ?>"><button type="button" class="btn btn-primary btn-sm"><?php echo @$set_new_2; ?></button></a>
  </h1>
  <!-- <p>Curabitur blandit tempus porttitor. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p> -->
	<table>

		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>
		<colgroup></colgroup>

	    <thead>
	    	<tr>
	    		<th>&nbsp;</th>
	    		<?php if(@$mambership) {
     $set_plan_number=[];
     $l=0;
	    		 foreach ($mambership as $data) {
   $set_plan_number[$l]['benifits']=$data["benifits"];
   $set_plan_number[$l]['values']=$data["values"];
   $set_plan_number[$l]['sub_heading']=@$data["sub_heading"];

	   // if($data['types']=="Addon") 
    //             {
    //                   $duration_type='WEEK';
    //             }
    //             else
    //             {
    //               $duration_type='MONTH';
    //             }
            $duration_type= $data['duration_type'];   
      		  ?>
	    			<th>
<input type="hidden" name="packahe_rate_<?php echo @$data["id"]; ?>" id="packahe_rate_<?php echo @$data["id"]; ?>" value="<?php echo @$data["price"]; ?>" />
<input type="hidden" name="converted_india_package_rate_<?php echo @$data["id"]; ?>" id="converted_india_package_rate_<?php echo @$data["id"]; ?>" value="500" />
<input type="hidden" name="package_actual_rate_<?php echo @$data["id"]; ?>" id="package_actual_rate_<?php echo @$data["id"]; ?>" value="<?php echo @$data["price"]; ?>" />
<input type="hidden" name="package_id_<?php echo @$data["id"]; ?>" id="package_id_<?php echo @$data["id"]; ?>" value="<?php echo @$data["id"]; ?>" />
<!-- <input type="hidden" name="gig_user_id" id="gig_user_id" value="<?php  echo $gig_user_id;?>" /> -->
<!-- <input type="hidden" name="extra_gig_row_id" id="extra_gig_row_id" value="" /> -->
<input type="hidden" value="" name="currency_type_<?php echo @$data["id"]; ?>" id="currency_type_<?php echo @$data["id"]; ?>" />
<!-- <input type ="hidden" name="hidden_super_fast_delivery" value="" id="hidden_super_fast_delivery"  /> -->
<!-- <input type ="hidden" name="total_delivery_days" value="" id="total_delivery_days"  /> -->
<!-- <input type="hidden" id="hidden_super_fast_delivery_charges" name="hidden_super_fast_delivery_charges" value="" /> -->

	    			<h2><?php echo @$data["name"]; ?></h2>
	    			<p id="over_all_total#<?php echo @$data["id"]; ?>"><?php echo "$".@$data["price"]; ?></p>
	    			<label class="label-label-prilary"><?php echo @$data["duration"]." ".@$duration_type; ?></label>
	    		</th>
	    		<?php $l=$l+1;  }  }  ?>


	    		
	    	</tr>
	    </thead>

	    <tfoot>
	    	<tr>
	    		<th>&nbsp;</th>
	    		<?php foreach ($mambership as $data) { ?>
	    		<?php if(@$this->session->userdata('SESSION_USER_ID')) {
		 ?>

<?php 

if($data["package_for"]==@$result["types"])
{ 

if($result["end_date_in_string"]>strtotime(date("d-M-Y")))
  { ?>
<td><a href="javascript:;" data-toggle="modal" data-target="#myModal_notic_fot_current_package" >Buy</a></td>
  <?php  }
  else
  { ?>
<td><a href="javascript:;" onclick="check_extra_package(<?php echo @$data["id"]; ?>)" >Buy</a></td>
  <?php }

	?>
	 
<?php }
else
{ ?>
<td><a href="javascript:;" data-toggle="modal" data-target="#myModal_notic_fot_type" >Buy</a></td>
<?php }
	     ?>

 



	         <?php } else { 
$types = $this->uri->segment(2);
	         	?>
	         	
                <td><a href="javascript:;" onclick="selected_menu('price-table-for')" >Buy</a></td>
	    		<?php } ?>
	         <?php  } ?>
	    	 
	    	</tr>
	    </tfoot>

	    <tbody>
	   <?php if(@$services_name) { 

	    foreach($services_name as $services) { ?> 	
	    	<tr>
	    		<th><?php echo @$services["name"]; ?> <span><?php echo @$services["test"]; ?></span></th>
	    		<?php if(@$set_plan_number) { for($n=0; $n<count(@$set_plan_number); $n++) { ?>
<th><?php

   $benifits=explode("*#*", $set_plan_number[$n]["benifits"]);
   $values=explode("*#*", $set_plan_number[$n]["values"]);
   
    $index_key=array_search(@$services["name"],$benifits);
 
$set_other_value="";
$set_other_value_end="";
 if($services["name"]=="Base locations")
        {
          $set_other_value='1 Base Location +';
          $set_other_value_end='Surrounding suburbs';
        }
if($services["name"]=="Photo gallery")
        {
          $set_other_value='1 Main Image +';
          $set_other_value_end='Images';
        }

    echo @$set_other_value." ".@$values[$index_key]." ".@$set_other_value_end;
    if(@$set_plan_number[$n]["sub_heading"])
    {
    	$sub_heading=explode("*#*", $set_plan_number[$n]["sub_heading"]);
        // echo @$values[$index_key];
        if($sub_heading[$index_key]=='--')
        {
        	$set_val='';
        }
        else
        {
        	$set_val=$sub_heading[$index_key];
        }
        $set_other_valu="";
        // var_dump($services["name"]);
       
        echo '<span>'.$set_other_valu." ".@$set_val.'</span>';

    }
       
 ?></th>
	    		<?php  } } ?>
	    
	    	</tr>
	    	<?php  } } ?>
	    </tbody>

	</table>
</div>
</section>	

</div>




<!-- Modal -->
<div id="myModal_notic_fot_type" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <p>This Package is only for <?php echo @$type; ?></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<!-- Modal -->
<div id="myModal_notic_fot_current_package" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Alert</h4>
      </div>
      <div class="modal-body">
        <p>you are already using a package which end on <?php echo @$result["end_date"];  ?>.</p>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>



<script type="text/javascript">

    var publishable_key = "<?php echo $publishable_key; ?>";

    function check_payment_type(e){

        $('#payment_btn').show();

    }

</script>    