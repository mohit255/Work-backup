</div>
 

<div id="reating-for-blog-popup" class="modal fade custom-popup order-popup" role="dialog">

				<div class="modal-dialog">

					<div class="modal-content">

						<button type="button" class="close" data-dismiss="modal">&times;</button>

						<div class="modal-header text-center">

							<h5>Leave Comment</h5>

						</div>

						<div class="modal-body">

							<div id="parent_user_details"></div>

							<div class="feedback-area">

									<ul class="feedback-list">

										<li class="media">

											<!-- <a href="#" class="pull-left"><img class="img-circle" width="60" height="60" alt="" src="assets/images/user.jpg"></a> -->

											<div class="media-body">

                                           <form id="form_blog_comment" method="post" enctype="multipart/form-data" >

                           <input type="hidden" id="rating_by" value="" name="rating_frmuser" />

                                                <input type="hidden" id="rating_for" value="" name="rating_touser" />						

								<div class="form-group">

									<label class="form-label">Your Message</label><label id="_error_msg"></label>

									<textarea name="chat_message_content" placeholder="Message" required="" rows="5" id="blog_comment" class="form-control"></textarea>

								</div>						
                                <div class="row">

                                                    <div class="col-md-6">

                                                        <span id="stars-existing" class="starrr" data-rating=""></span> 

                                                        <input type="hidden" id="rating_input" value="" name="rating_input" />

                                                    </div>

                                                    <div class="col-md-6 text-right">

                                                        <input type="button" value="Save" onclick="submit_comment_on_blog();" class="btn btn-primary btn-border" data-loading-text="Loading...">

                                                    </div>

                                                </div>
							</form>

											</div>

										</li>

									</ul>

								</div>

						</div>

					</div>

				</div>

			</div>




	<footer>
	<div class="container">
		<br>
		<br>
		<div class="row">
			<div class="container">
				 <div class="col-md-2 col-md-offset-1">
					<ul >

				  <li class=""><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262"><a href="<?php echo base_url().'help_center'; ?>">Help Center</a></font></p></li>
				  <br>
				   <li class=""><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262"><a href="<?php echo base_url().'aboutus'; ?>">About Us</a></font></p></li>
				   <br>
				    <li class=""><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262"><a href="<?php echo base_url().'contact_us'; ?>">Contact Us</a></font></p></li>
				    <br>
				     <li class=""><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262"><a href="<?php echo base_url().'our-blog/all/all'; ?>">Our Blog</a></font></p></li><br>
													
				</ul>
				</div>

				<?php  $i=0; foreach($footer_main_menu as $main_menu){
                   $i=$i+1;
						?>
				<div class="col-md-2">
					<ul>
						<?php foreach($footer_sub_menu as $sub_menu) { 

										if($main_menu['id']==$sub_menu['footer_menu'])

										{

										?>
<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262"><a href="<?php echo base_url().'pages/'.$sub_menu['footer_submenu']; ?>"><?php echo str_replace('_',' ',$sub_menu['footer_submenu']); ?></a></font></p></li><br>
											

									<?php } 
								}?>

						<!-- <li><a href=""><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Support</font></p></a></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Terms of Services</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Privacy Policy</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Sitemap</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Cookie Policy</font></p></li> -->
					</ul>
				</div>
              <?php 
              if($i==3)
              {
              	break;
              }
          } 
            

              ?>
              <div class="col-md-2">
					<ul class="list-inline social-list1">

				  <li class=""> <span id=""><span class="fa fa-facebook set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span><span class="fa fa-instagram set_class_for_bd_dsp"></span><span class="fa fa-skype set_class_for_bd_dsp"></span><span class="fa fa-twitter set_class_for_bd_dsp"></span></li>
													
				</ul>
				</div>
				<!-- <div class="col-md-2">
					<ul>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">About us</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Contact us</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Blog</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">FAQ</font></p></li>
						
					</ul>
				</div>
				<div class="col-md-2">
					<ul>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">For businesses</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">For Influencers </font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Careers</font>
						
					</ul>
				</div>
				<div class="col-md-2">
					<ul>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Create an Account</font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">Login </font></p></li>
						<li><p style="text-align: left; line-height: 26px; font-size: 16px;"><font color="#626262">University</font>
						
					</ul>
				</div>
				<div class="col-md-2">
					<ul class="list-inline social-list1">

				  <li class=""> <span id=""><span class="fa fa-facebook"></span><span class="fa fa-instagram"></span><span class="fa fa-skype"></span><span class="fa fa-twitter"></span></li>
													
				</ul>
				</div> -->

			</div>
		</div>
	</div>
</footer>

	<div class="to-top" id="to-top" style="bottom: 15px;"><i class="fa fa-angle-up"></i></div>

</div>

	<script type="text/javascript"> var base_url = '<?php echo base_url(); ?>';</script>

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/modernizr.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/owl.carousel.min.js"></script> 

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/select2.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/theia-sticky-sidebar.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-tokenfield.js" charset="UTF-8"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-ui.js"></script>

	<?php if($module=="profile") { ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cropper.min.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cropper_main.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/tokens.js"></script>	

	<?php } ?>

	<?php if($this->session->userdata('SESSION_USER_ID')) { ?>



	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/notification.js"></script>

	 <?php if($module=="message") { ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/message.js"></script>

	 <?php }?> 

	<?php if($module=="purchases" || $module=="payments" || $module=="sales" || $module=="purchase_success" || $module=="pages") { ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/purchases.js"></script> 

	<?php }?>     

	<?php }?>

	<?php if($module=="purchases" || $module=="my_gigs" || $module=="pages") { ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/star_rating.js"></script>

	<?php }

	if($module=="gig_preview"||$module=="user_profile"||$module=="profile"||$module=="password"||$module=="payment_settings")

	 {?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/rating.js"></script>  

	<?php }?>

	<?php if($module=="sell_service" || $module=="edit_gig") { ?>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootstrap-tagsinput.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.cropit.js"></script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/cropper_main_gig.js"></script>
     
      <script type="text/javascript">
  	 function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
  </script>
	<script>

	$( document ).ready(function() {



$(".loder").fadeOut("slow");

	  $("#upload_image_btn").click(function(){ 

			$("#avatar-gig-modal").css('display','block');

			$("#avatar-gig-modal").modal('show');

			

		});	

	});

	</script>

	<?php }?>

	<script>




$( document ).ready(function() {

		

	  $('#stars').on('starrr:change', function(e, value){

		$('#count').html(value);

	  });

	  

	  $('#stars-existing').on('starrr:change', function(e, value){

		$('#count-existing').html(value);

		$('#rating_input').val(value);

	  });

	});
	function show_usermessage(id,frmuser)

{

    window.location = base_url+'message/'+frmuser;

    

}

	$( document ).ready(function() {

		

	  $('#stars').on('starrr:change', function(e, value){

		$('#count').html(value);

	  });

	  

	  $('#stars-existing').on('starrr:change', function(e, value){

		$('#count-existing').html(value);

		$('#rating_input').val(value);

	  });

	});

	</script>

		<script>

	function add_seller_feedbacks()

	{

			$('#feedbackmodel').modal('show');

	}

	</script>

 <!-- REQUIRED FOR FETCHING USER TIME ZONE -->

    <script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jstz-1.0.4.min.js"></script>  
    <script language="JavaScript" src="http://www.geoplugin.net/javascript.gp" type="text/javascript"></script>  

    <script type="text/javascript">

      $(document).ready(function() {

        var tz = jstz.determine();

        var timezone = tz.name();
        var ip_city = '';
    	// var ip_city = geoplugin_city();        

        $.post('<?php echo base_url(); ?>ajax',{timezone:timezone,ip_city:ip_city},function(res){

           // console.log(res);

        })      

    

      });

    </script>

	<script>setTimeout(function(){ $('.alert-dismissable').hide(); }, 2000);</script>

	<script>

	$(document).on("keydown",".numberonly",function (e) {

		// Allow: backspace, delete, tab, escape, enter and . 		 // Allow: Ctrl+A, Command+A                                            // Allow: home, end, left, right, down, up

		if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 || (e.keyCode === 65 && (e.ctrlKey === true || e.metaKey === true)) || 	(e.keyCode >= 35 && e.keyCode <= 40)) {

				 // let it happen, don't do anything

				 return;

		}

		// Ensure that it is a number and stop the keypress

		if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {

			e.preventDefault();

		}

	});

	</script>

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/app.js"></script>
	<?php if($module!="profile") { ?>
	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sell_services_update.js"></script>
	<script type="text/javascript" src="http://jstayton.github.io/jquery-marcopolo/js/jquery.ui.widget.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.marcopolo.js"></script>
<!-- <script src="<?php echo base_url(); ?>assets/js/select2.min.js"></script> -->
	<?php } ?>

<script type="text/javascript">
$(document).ready(function(){

	$('.states_of_select_2').select2({ width: '100%' });

   $(".set_number_only").keydown(function (e) {
        // Allow: backspace, delete, tab, escape, enter and .
        if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
             // Allow: Ctrl/cmd+A
            (e.keyCode == 65 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+C
            (e.keyCode == 67 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: Ctrl/cmd+X
            (e.keyCode == 88 && (e.ctrlKey === true || e.metaKey === true)) ||
             // Allow: home, end, left, right
            (e.keyCode >= 35 && e.keyCode <= 39)) {
                 // let it happen, don't do anything
                 return;
        }
        // Ensure that it is a number and stop the keypress
        if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
            e.preventDefault();
        }
    });
 



var page_no=$("#url_page_no").val();
var type=$("#url_type").val();
 var url_name=$("#url_name").val();
 var url_state=$("#url_state").val();
 var url_zip=$("#url_zip").val();


$("#search_blog_for_data").change(function(){
	var name=$(this).val();
	var set_name=name.split(" ").join("-");
	var cat_name=$("#get_categoryes").val();
	window.location.href=base_url+'our-blog/'+cat_name+"/"+set_name;
});

$("#search_zipcode_dsp").click(function(){
 var zip_code=$("#zipcode").val();
 if(zip_code)
 {
 	zip_code=zip_code;
 }
 else
 {
 	zip_code='no-zip-code';
 }
 window.location.href=base_url+'search/index/0/'+type+'/'+url_name+'/'+url_state+'/'+zip_code;

});

$("#state_id_dsp_get_state").change(function(){
 var data=$(this).val();

 var state_name=data.split(" ").join("-");
 
window.location.href=base_url+'search/index/0/'+type+'/'+url_name+'/'+state_name+'/'+url_zip;
  
});

$('.search_package_by_category_dsp').click(function(){

	var data=$(this).data("id");
   var name=data.split(" ").join("-");

   
	window.location.href=base_url+'search/index/0/categories/'+name+'/'+url_state+'/'+url_zip;
   // console.log(base_url+'search/index/'+type+'/'+id+'/'+name);
});


$("input[name='quick_search_2']").marcoPolo({

url:base_url+'Gigs/item_search_2',
formatItem: function(data,$item){
return data.name;

},
onSelect: function (data, $item) {

//url: 'Search/set_date/'+data.sno,
// console.log(data);
window.location = base_url+"help-center/search-for/"+data.name.split(" ").join("-");


}


});


$("input[name='quick_search_3']").marcoPolo({

url:base_url+'Gigs/item_search_3',
formatItem: function(data,$item){
return data.item_name;

},
onSelect: function (data, $item) {

//url: 'Search/set_date/'+data.sno,
// console.log(data);
window.location = base_url+"Gigs/set_search_data/"+data.id;


}


});


$("input[name='quick_search_4']").marcoPolo({

url:base_url+'Gigs/item_search_4',
formatItem: function(data,$item){
return data.item_name;

},
onSelect: function (data, $item) {

//url: 'Search/set_date/'+data.sno,
// console.log(data);
window.location = base_url+"Gigs/set_search_data/"+data.id;


}


});

$("input[name='quick_search']").marcoPolo({

url:base_url+'Gigs/item_search',
formatItem: function(data,$item){
return data.item_name;

},
onSelect: function (data, $item) {

//url: 'Search/set_date/'+data.sno,

window.location = base_url+"Gigs/set_search_data/"+data.id;


}


});

});

$(document).on("click",".dsp_class_set",function(){
    if($(this).closest(".dropdown").hasClass('open'))
    {
     $(this).closest(".dropdown").removeClass('open');	
    } 
    else
    {
     $(this).closest(".dropdown").addClass('open');		
    }
});

$(document).on("click",".Header-navClose",function(){
	alert("dkjfnvgfjb");
     location.reload();
});

	$(document).on("click",".delete_gigs_dsp",function(){
     var id=$(this).data("id");
      if(confirm("Are you sure you want to delete of selected package?"))
      {
             $.ajax({
             method:"POST",
              url:"<?php echo base_url(); ?>gigs/delete_gigs_dsp",
              data:{"id":id,"status":"remove"},
              dataType:"html",
              success:function(data){
                // console.log(data);
                 alert("Package is deleted.");
                 location.reload();
          
                }
            });
      }
      else
      {
      	return false;
      }

	});

</script>
		

	<?php 

	$uri =  $this->uri->segment(1);	

		if($uri=='sell-service'){ ?>

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sell_services.js"></script>

	<?php }	

		if($uri=='edit-gig'){ ?>

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sell_services_update.js"></script>

	<?php }	



		if($uri=='sales' || $uri=='files'){ ?>

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>

			<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/file_upload.js"></script>

	<?php }	 ?>



<?php if($module=="gig_preview"){ ?>



	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/sweetalert2.css">

	<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/sweetalert2.js"></script>

	<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

	

 <!-- Stripe Payment Start  -->



 <script type="text/javascript">

	$('#payment_formid').submit(function(){



		var option = $('input[name=group2]:checked').val(); 

		var gigs_rate = $('#gigs_rate').val();

		var converted_india_gigs_rate = $('#converted_india_gigs_rate').val();

		var gigs_actual_rate = $('#gigs_actual_rate').val();

		var gigs_id = $('#gigs_id').val();

		var gig_user_id = $('#gig_user_id').val();

		var extra_gig_row_id = $('#extra_gig_row_id').val();

		var currency_type = $('#currency_type').val();

		var hidden_super_fast_delivery = $('#hidden_super_fast_delivery').val();

		var total_delivery_days = $('#total_delivery_days').val();

		var hidden_super_fast_delivery_charges = $('#hidden_super_fast_delivery_charges').val();

		 

		if(option == 'stripe'){



			$('#gigs_rates').val(gigs_rate);

			$('#converted_india_gigs_rates').val(converted_india_gigs_rate);

			$('#gigs_actual_rates').val(gigs_actual_rate);

			$('#gigs_ids').val(gigs_id);

			$('#gig_user_ids').val(gig_user_id);

			$('#extra_gig_row_ids').val(extra_gig_row_id);

			$('#currency_types').val(currency_type);

			$('#hidden_super_fast_deliverys').val(hidden_super_fast_delivery);

			$('#total_delivery_dayss').val(total_delivery_days);

			$('#hidden_super_fast_delivery_chargess').val(hidden_super_fast_delivery_charges);

			$('#stripe_amount').val(gigs_rate);

			//$("#stripe_popup").modal('show'); // Stripe Payment Gateway					

			$("#checkout-popup").modal('hide');

			$("#my_stripe_payyment").click();	

			return false;

		}

		 

	});

	</script>



	<script type="text/javascript">

		

		$(document).on('click','#cancelInlineBtn',function(){

			$("#checkout-popup").modal('show');

		});



		$(document).on('click','#stripe_payment',function(){

			$('#locloader').show();

			setTimeout(function(){

				$('#locloader').hide();

			},1000);

		});







		Stripe.setPublishableKey(publishable_key);

		$(function() {		

			var $form = $('#payment-form');

			$form.submit(function(event) {

		// Disable the submit button to prevent repeated clicks:

		$form.find('.submit').prop('disabled', true);

		$form.find('.submit').val('Please wait...');



		// Request a token from Stripe:

		Stripe.card.createToken($form, stripeResponseHandler);

		// Prevent the form from being submitted:



		return false;

	});



		});



		function stripeResponseHandler(status, response) {

			if (response.error) {			

				swal("Warning!", response.error.message, "error");

				$('.submit').prop('disabled', false);			

			} else {					

				$('#access_token').val(response.id);



				$.ajax({

					url: '<?php echo base_url('user/buy_service/stripe_payment');?>',

					data: $('#payment-form').serialize(),			

					type: 'POST',

					dataType: 'JSON',

					success: function(response){									



						if(response.status == 200){

							swal({ 



								title: "Success!",      

								type: "success" ,

								icon: 'success',							

								text:'Please wait a moment this page will redirect you  !',							

							});

							setTimeout(function() {

								window.location.href = '<?php echo base_url();?>user/stripe_payment/send_stripe_mail/'+response.id;

							}, 1000);



							$('.submit').prop('disabled', false);

							$('.submit').val('Pay');



						}else{

							swal("Warning!", response.error, "error");

							$('.submit').prop('disabled', false);

							$('.submit').val('Pay');

						}



					},

					error: function(error){

						swal("Warning!", error, "error");

						$('.submit').prop('disabled', false);

						$('.submit').val('Pay');

					}

				});



			}

		}



		function paycancel(){

			$("#checkout-popup").modal('show');

		}



/* Stripe Payment End   */

// Returns a random integer between min and max



function getRandomInt(min, max) {

	return Math.floor(Math.random() * (max - min + 1)) + min;

}



</script>



<!-- Stripe Payment Gateway Start  -->



<script src="https://checkout.stripe.com/checkout.js"></script>

<button id="my_stripe_payyment" style="display: none;">Purchase</button>

<script>

var handler = StripeCheckout.configure({

  key: '<?php echo $publishable_key;?>',

  image: '<?php	if(!empty($logo['value'])) { echo base_url().$logo['value']; }else { echo base_url()."assets/images/logo.png";   }?>',

  locale: 'auto',

  token: function(token,args) {

    // You can access the token ID with `token.id`.

    $('#access_token').val(token.id);

    $.ajax({

		

			url: base_url+'user/stripe_payment/',

			data: $('#payment-form').serialize(),			

			type: 'POST',

			dataType: 'JSON',

			success: function(response){

				window.location.href = base_url+'user/buy_service/send_stripe_mail/'+response.payment_id;

			},

			error: function(error){

				console.log(error);

			}

		});

  }

});

$('#my_stripe_payyment').click(function(e) {

	final_gig_amount = (final_gig_amount * 100); //  dollar to cent 

	var cur = $('#currency_type').val();

	striep_currency = 'USD';

	if(cur =='$'){ striep_currency ='USD';}

	if(cur =='€'){ striep_currency ='EUR';}

	if(cur =='£'){ striep_currency ='GBP';}

  // Open Checkout with further options:

  handler.open({

    name: base_url,

    description: 'My Packages Purchase',

    amount: final_gig_amount,

    currency:striep_currency

  });

  final_gig_amount = (final_gig_amount / 100); // cent to dollar 


  e.preventDefault();



});



// Close Checkout on page navigation:

window.addEventListener('popstate', function() {

  // handler.close();

});

</script>


<!-- Stripe Payment Gateway End   -->



<?php }	 ?>


</body>

</html>