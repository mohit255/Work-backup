$(document).ready(function(){
  

$(".get_full_review").click(function(){
	// alert($(this).data("id"));
  var id=$(this).data("id");
    $.ajax({
       method:"POST",
       url:base_url+"gigs/get_review_message",
       data:{"id":id},
       datType:"html",
       success:function(data)
       {
       	  // alert(data);
        $("#myModal_sho_review_message_data .modal-body").empty();
        $("#myModal_sho_review_message_data .modal-body").html(data);
        $("#myModal_sho_review_message_data").modal('show');
         // console.log();
       }
    });
});


   setInterval(function(){
   var user_id=$("#get_user_escort_id_dsp").val();
  var cooki_id=getCookie("add_review_for_escort");
	var cook_id="";
	if(cooki_id)
	{ 
		 cook_id=cooki_id;
	}
	else
	{
		var d = new Date();
	 	var val=Date.parse(d);
	 	setCookie("add_review_for_escort", val, 1);
	 	cook_id=getCookie("add_review_for_escort");
	}
    
 var url  =  base_url+'gigs/check_likes_for_escort_for_current_user';
     $.ajax({
     	url:url,
     	method:"post",
     	data:{"user_id":user_id,"cook_id":cook_id},
     	dataType:"html",
     	success:function(data)
     	{
     		
     		if(data=="1")
     		{
     			$("#show_check_icon_data").html('<i class="fa fa-check" aria-hidden="true"></i>');
     		}
     		else
     		{
               $("#show_check_icon_data").html('');
     		}

   

     	}
     });


  
   },1000);

});

function setCookie(cname, cvalue, exdays) {
    var d = new Date();
    d.setTime(d.getTime() + (exdays*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    var name = cname + "=";
    var decodedCookie = decodeURIComponent(document.cookie);
    var ca = decodedCookie.split(';');
    for(var i = 0; i <ca.length; i++) {
        var c = ca[i];
        while (c.charAt(0) == ' ') {
            c = c.substring(1);
        }
        if (c.indexOf(name) == 0) {
            return c.substring(name.length, c.length);
        }
    }
    return "";
}

function do_like_dsp(user_id)
{  
   var cooki_id=getCookie("add_review_for_escort");
	var cook_id="";
	if(cooki_id)
	{ 
		 cook_id=cooki_id;
	}
	else
	{
		var d = new Date();
	 	var val=Date.parse(d);
	 	setCookie("add_review_for_escort", val, 1);
	 	cook_id=getCookie("add_review_for_escort");
	}
   var url  =  base_url+'gigs/add_like_for_escort_dsp';
     $.ajax({
     	url:url,
     	method:"post",
     	data:{"user_id":user_id,"cook_id":cook_id},
     	dataType:"html",
     	success:function(data)
     	{
     		
     		if(data=="1")
     		{
     			alert("You have already Liked.")
     		}
     		else
     		{
               location.reload(true);
     		}

   

     	}
     });

}

function add_comment_for_escort(user_id)
{

	var cooki_id=getCookie("add_review_for_escort");
	var cook_id="";
	if(cooki_id)
	{ 
		 cook_id=cooki_id;
	}
	else
	{
		var d = new Date();
	 	var val=Date.parse(d);
	 	setCookie("add_review_for_escort", val, 1);
	 	cook_id=getCookie("add_review_for_escort");
	}

   var url  =  base_url+'gigs/get_user_comment_for_escort';
     $.ajax({
     	url:url,
     	method:"post",
     	data:{"user_id":user_id,"cook_id":cook_id},
     	dataType:"json",
     	success:function(data)
     	{
     		var from_user="";
     		var comment="";
     		var name_ste="Deepak Patel";
     		console.log(data.blog);
     		if(data.blog["from_user"].length>0)
     		{

     			from_user=data.blog["from_user"];

     		      		}
     		if(data.blog["comment"].length>0)
     		{
     			comment=data.blog["comment"];
     		}	

     		// console.log(data.data["comment"]);
     		 $("#parent_user_details").html('<h3>'+name_ste+'</h3>');
     		 $("#parent_user_details").html(data.html_set);
     		 $("#rating_by").val(cook_id);
     		 $("#rating_for").val(user_id);
     		 $("#user_name").val(from_user);
     		 $("textarea#blog_comment").val(comment);
             // $('#reset_user_image').html(res.s_image);
              var ret=data.blog['rating'];
             if(data.blog['rating']==0)
             {
               ret="";
             }

             $('#rating_input').val(ret);
             // $('#stars-existing').data('rating',3);
              $('#feedback-popup').modal('toggle');
     		 $('#reating-for-blog-popup').modal('show');

   

     	}
     });
}

function add_feedback(fuser,tuser,gid,orderid){


	 var url  =  base_url+'user/purchases/get_user_feedback';

	 var dataString="f_id="+fuser+"&t_id="+tuser+"&g_id="+gid+"&order_id="+orderid; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $("#parent_user_detailsone").html(res.user_content);

					   $("#feedback_user_area").html(res.user_feed);

					   $('#rating_frmuser').val(res.f_id);

					   $('#see-feedback').modal('toggle');

				   }else{

					   $("#parent_user_details").html(res.user_content);

					   $('#rating_frmuser').val(res.f_id);

					   $('#rating_touser').val(res.t_id);

					   $('#rating_gig').val(res.g_id);

					   $('#rating_orderid').val(res.order_id);

					   $('#reset_user_image').html(res.s_image);

					   $('#feedback-popup').modal('toggle');

				   }

			   }

	  });

}


function submit_comment_on_blog()
{
	
	var reating_for      = $('#rating_for').val(); 

	var rating_input =$('#rating_input').val();

	var escort_id =$('#rating_by').val();

   	var chat_content = $('textarea#blog_comment').val();

   	var user_name = $('#user_name').val();
   	console.log(reating_for);
   	console.log(rating_input);
   	console.log(escort_id);
   	console.log(chat_content);
   	console.log(user_name);
   	if(user_name.length > 0)
   	{
       if(chat_content.length > 0 ){ 

   		if(rating_input.length > 0 ){
              
              var form=$("#form_blog_comment");

               var url  =  base_url+'gigs/save_comment_for_blog';
               $.ajax({
               	url:url,
               	method:"post",
               	 data: form.serialize(),
               	 dataType:"html",
               	 success:function(res)
               	 {
                   // console.log(res);
                    location.reload(true);
               	 }
               });

   		}
   		else
   		{
   			$("#_error_msg").html('<div class="account-error">Please add rating</div>');
   		}
   	}
   	else{
   		$("#_error_msg").html('<div class="account-error">Please Enter Some Content</div>');
   	}
   	}
   	else
   	{
   		$("#_error_msg").html('<div class="account-error">Please Enter Your Name</div>');
   	}	
   	

}

function submit_comment()

{ 

 	var g_id      = $('#rating_gig').val(); 

	var rating_input =$('#rating_input').val();

   	var chat_content = $('textarea#comment').val();

		if(g_id){ 

		 var form=$("#feedback_rating_form");

			if(chat_content.length > 0 ){ 

				if(rating_input.length > 0 ){ 

			 var url  =  base_url+'user/purchases/save_feedback';

				 //var dataString="chat_id="+chat_id+"&chat_content="+chat_content+"&chat_type="+chat_type+"&chat_image="+chat_image;

				 $.ajax({

						  url:url,

						  type:"POST",

						  data: form.serialize(),

						  success: function(res){

							   if(res == 1) {

								 //$('#feedback-popup').modal('toggle'); 

								 location.reload(true);

							   }

							   else

							   {

								// $('#feedback-popup').modal('toggle');

								 location.reload(true);

							   }

						  }

				 });

				}else{ 

				$("#_error_msg").html('<div class="account-error">Please add rating</div>');

			}

			}else{ 

				$("#_error_msg").html('<div class="account-error">Please Enter Some Content</div>');

			}

		 

			return false;

	

		}else{

			 $("#_error_msg").html('<div class="account-error">Please select Users</div>');

			 return false;	

		} 



}

function submit_commentsales()

{ 

 	var g_id      = $('#rating_gig').val();  

   	var chat_content = $('textarea#comment').val();

		if(g_id){ 

		 var form=$("#feedback_rating_form");

			if(chat_content.length > 0 ){ 

			 var url  =  base_url+'user/sales/save_feedback';

				 //var dataString="chat_id="+chat_id+"&chat_content="+chat_content+"&chat_type="+chat_type+"&chat_image="+chat_image;

				 $.ajax({

						  url:url,

						  type:"POST",

						  data: form.serialize(),

						  success: function(res){

							   if(res == 1) {

								 //$('#feedback-popup').modal('toggle'); 

								 location.reload(true);

							   }

							   else

							   {

								// $('#feedback-popup').modal('toggle');

								 location.reload(true);

							   }

						  }

				 });

			}else{

				$("#_error_msg").html('<div class="account-error">Please Enter Some content</div>');

			}

		 

			return false;

	

		}else{

			 $("#_error_msg").html('<div class="account-error">Please select Users</div>');

			 return false;	

		} 



}

function message_contact(){

	 var url   =  base_url+'user/purchases/get_user_content';

	 var fuser =  $("#rating_frmuser").val();

	 var dataString="f_id="+fuser; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $("#msg-user-details").html(res.user_content);

					   $("#sell_gigs_userid").val(fuser);

					   $('#message-popup').modal('toggle');

				   }else{

					   $("#msg-user-details").html(res.user_content);

					   $("#sell_gigs_userid").val(fuser);

					   $('#message-popup').modal('toggle');

				   }

			   }

	  });

}

function message_contact_user(){

	 var url   =  base_url+'user/purchases/get_user_content';

	 var fuser =  $("#sb_user_id").val();

	 var dataString="f_id="+fuser; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $("#msg-user-details").html(res.user_content);

					   $("#sell_gigs_userid").val(fuser);

					   $('#message-popup').modal('toggle');

				   }else{

					   $("#msg-user-details").html(res.user_content);

					   $("#sell_gigs_userid").val(fuser);

					   $('#message-popup').modal('toggle');

				   }

			   }

	  });

}

function change_gig_status(id,val)

{

	 $("#sell_gigs_statusid").val(id);

	 //$("#seller_status").val(val);
    var message ='<div class="col-md-12 alert-danger"><h3>Message</h3><p>'+$("#get_message_"+id).val()+'</p></div>';
	 var sel1='';

	 var sel2='';

	 var sel3='';

	 var sel5='';

	 var sel6='';

	 var a1='<select class="custom-select form-control" id="seller_status" name="seller_status">';

	 if(val==1)

	 {

		  a1 +='<option value="1" selected >New</option>';

		  a1 +='<option value="2"  >Pending</option>';

		  a1 +='<option value="3"  >Processing</option>';

		  a1 +='<option value="6"  >Completed</option>';

		  a1 +=' <option value="5" >Declined </option> ';

	 }

	 else if(val==2)

	 {

		  a1 +='<option value="2"  selected>Pending</option>';

		  a1 +='<option value="3"  >Processing</option>';

		  a1 +='<option value="6"  >Completed</option>';

		  a1 +=' <option value="5" >Declined </option> ';

	 }

	 else if(val==3)

	 {

		  a1 +='<option value="3"  selected>Processing</option>';

		  a1 +='<option value="6"  >Completed</option>';

		  a1 +=' <option value="5" >Declined </option> ';

		 

	 }

	 else if(val==5)

	 {

		  a1 +='<option value="6"  >Completed</option>';

		  a1 +=' <option value="5" selected>Declined </option> ';

	 }

	 else if(val==6)

	 {

		 a1 +='<option value="6"  selected>Completed</option>';

		  a1 +=' <option value="5" >Declined </option> ';

	 }
    else if(val==7)

	 {

		 a1 +='<option value="6"  selected></option>';

		  a1 +='<option value="3"  >Processing</option>';

	 }

	 a1 +=' </select>';

	 

	// jQuery("#seller_status option:selected").removeAttr("selected");

    // jQuery("#seller_status option[value='"+val +"']").attr('selected', 'selected'); 

	 $("#status-popup #seller_select_list").html(a1);
	 console.log(val=="7");
	 if(val=="7")
	 {
	 	$("#status-popup #show_message").html(message);
	 }
	 

	 $('#status-popup').modal('toggle');

	 

}

function change_product_status()

{

	 var url   =  base_url+'user/sales/change_gigs_status';

	 var p_id =  $("#sell_gigs_statusid").val();

	  var sts =  $("#seller_status").val();

	 var dataString="p_id="+p_id+"&sts="+sts+"&val=1"; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  success: function(res){ 

				   if(res==1)

				   {

					  $('#status-popup').modal('toggle');

					  location.reload(true);

				   }else{

					  $('#status-popup').modal('toggle');

					  location.reload(true);

				   }

			   }

	  });



}

function change_product_status_update(sts,p_id)

{
 

 var url   =  base_url+'user/sales/change_gigs_status';

	 var dataString="p_id="+p_id+"&sts="+sts+"&val=2"; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  success: function(res){ 



 location.reload();
 // location.reload();
				   // if(res==1)

				   // {

					  // $('#status-popup').modal('toggle');

					  // location.reload(true);

				   // }else{

					  // $('#status-popup').modal('toggle');

					  // location.reload(true);

				   // }

			   }
			   

	  });
	 



}

function purchase_view(id)

{

	 var url   =  base_url+'user/purchases/get_purchase_details';

	 var dataString="id="+id; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $('#purchases_model_deatils').html(res.content);

					   $('#purchase-popup').modal('toggle');

				   }

			   }

	  });	

	 

}

function sales_view(id)

{

	 var url   =  base_url+'user/sales/get_sales_details';

	 var dataString="id="+id; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $('#purchases_model_deatils').html(res.content);

					   $('#purchase-popup').modal('toggle');

				   }

			   }

	  });	

	 

}

function add_seller_feedback(fuser,tuser,gid,orderid){

	 var url  =  base_url+'user/sales/get_user_feedback';

	 var dataString="f_id="+fuser+"&t_id="+tuser+"&g_id="+gid+"&order_id="+orderid; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $("#parent_user_detailsone").html(res.user_content);

					   $("#feedback_user_area").html(res.user_feed);

					   $('#rating_frmuser').val(res.f_id);

					   $('#rating_touser').val(res.t_id);

					   $('#rating_gig').val(res.g_id);

					   $('#rating_orderid').val(res.order_id);

					   $('#see-feedback').modal('toggle');

				   }else{

					   $("#parent_user_details").html(res.user_content);

					   $('#rating_frmuser').val(res.f_id);

					   $('#rating_touser').val(res.t_id);

					   $('#rating_gig').val(res.g_id);

					   $('#rating_orderid').val(res.order_id);

					   $('#feedback-popup').modal('toggle');

				   }

			   }

	  });

}

function wallets_view(id)

{

	 var url   =  base_url+'user/payments/get_sales_details';

	 var dataString="id="+id; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

				   if(res.status==1)

				   {

					   $('#purchases_model_deatils').html(res.content);

					   $('#purchase-popup').modal('toggle');

				   }

			   }

	  });	

	 

}

function withdram_model(id,source,seller_id)

{ 

	

	var check_account_url = base_url+'user/payments/check_user_account';

	

	$.ajax(

	{

	type:'POST',

	url:check_account_url,

	data:{id:id,source:source,seller_id:seller_id},

	success:function(data)

	{

	if(data>0)

	{

	 var url   =  base_url+'user/payments/withdram_details';

	 var dataString="id="+id; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  dataType: 'json',

			  success: function(res){ 

			  	if(source == 'paypal'){

			  		$('.remove_paypal').show();

			  		$('.remove_stripe').hide();	

			  		$('input[value="Direct"]').attr('checked','checked');

			  	}else if(source == 'stripe'){

			  		$('.remove_stripe').show();	

			  		$('.remove_paypal').hide();

			  		$('input[value="stripe"]').attr('checked','checked');

			  	}

				

				

				 if(res.status==1)

				   {

					   $('#wallets_gigs_details').html(res.content);

					   $('#wallets_request_amount').html(res.amount);

					   $('#request_payment_id').val(res.id);

					   $('#withdraw-popup').modal('toggle');

				   }

			   }

	  });

	

		}else{

			if(source == 'stripe'){

				$('.paypal_input').attr('disabled','disabled');

				$('.stripe_input').removeAttr('disabled');

				$('.paypal_input_content').hide();

				$('.stripe_input_content').show();

				$('#payment_btn').attr('onclick', "user_paypal_submit('stripe')");



			}

			if(source == 'paypal'){

				$('.paypal_input').removeAttr('disabled');

				$('.stripe_input').attr('disabled','disabled');

				$('.paypal_input_content').show();

				$('.stripe_input_content').hide();

				$('#payment_btn').attr('onclick', "user_paypal_submit('paypal')");

			}

		   $('#withdraw-redirect-popup').modal('toggle');		

	  }

	}

	});

	

		

		 

	 

}

function withdraw_all(e,val)

{

	var check_account_url = base_url+'user/payments/check_user_account';
	var source = $(e).attr('data-sources');
    var dataString ="source="+source; 
	$.ajax(

	{

	type:'POST',
	data:dataString,
	url:check_account_url,
	success:function(data){

	if(data == val)
	{
		$('#withdraw-all').modal('toggle');
	}else{

		$('#withdraw-redirect-popup').modal('toggle');		

	}

	}

	});

}

function checkandfillaccount() {
	var check_account_url = base_url+'user/payments/checkandfillaccount';
	var withdraw_all  = $('.withdraw_all_sources').attr('data-sources');
	$.ajax(

	{

	type:'POST',
	url:check_account_url,
	success:function(data){

		data = JSON.parse(data);
		data1 = data.stripe_details;
		$('#user_paypal_id').val(data.paypal_details);
		$('#account_holder_name').val(data1.account_holder_name);
		$('#account_number').val(data1.account_number);
		$('#account_iban').val(data1.account_iban);
		$('#bank_name').val(data1.bank_name);
		$('#bank_address').val(data1.bank_address);
		$('#sort_code').val(data1.sort_code);
		$('#routing_number').val(data1.routing_number);
		$('#account_ifsc').val(data1.account_ifsc);
		$('#payment_btn').attr('onclick', "user_paypal_submit('"+withdraw_all+"')");
	}

	});
}

function payment_request()

{ 

	 var url   = base_url+'user/payments/payment_request';

	 var id    = $('#request_payment_id').val();

	 var payment   = $('input[name="group2"]:checked').val();

	 var dataString ="id="+id+"&payment="+payment; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  success: function(res){ 

  console.log(res);
   $('#withdraw-popup').modal('toggle');

					   location.reload(true);
				  /* if(res==1)

				   {

					   $('#withdraw-popup').modal('toggle');

					   location.reload(true);

				   }*/

			   }

	  });	

}

function overall_payment_request()

{ 

     var sts= 1;

	 var url   = base_url+'user/payments/overall_payment_request';

	 var dataString ="sts="+sts; 

 	  $.ajax({

			  url:url,

			  data:dataString,

			  type:"POST",

			  success: function(res){ 

				   if(res==1)

				   {

					   $('#withdraw-all').modal('toggle');

					   location.reload(true);

				   }

			   }

	  });	

	 

}



$(document).ready(function() {



  

    $('#add_payment_details').bootstrapValidator({ 

        // To use feedback icons, ensure that you use Bootstrap v3.1.0 or later       

        fields: {        

        	applicant_name: {

                validators: {

                    notEmpty: {

                        message: 'Please enter a name '

                    }

                }

            } ,

            account_number: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter a account number '

                    }

                }

            } ,

            bank_name: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter a bank name '

                    }

                }

            } ,   

            ifsc_code: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter IFSC code '

                    }

                }

            } ,  

            bank_addr: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter bank address '

                    }

                }

            }   ,   

            pan_no: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter Pancard no '

                    }

                }

            }    ,   

            paypal_id: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter paypal account no'

                    }

                }

            }   ,  

            paypal_email_id: {

                validators: {                    

                    notEmpty: {

                        message: 'Please enter paypal email id'

                    }

                }

            }    

            

            

		}

            });

    

});

function buyer_cancel(id,type)

{

	 $("#sell_gigs_statusid").val(id);
	 $("#payment_soruce").val(type);

	  if(type == 'stripe'){
	  	$('#cancel_fields').hide();
	  	$('.stripe_input_content').show();
	  	$('#paypal_email').attr('disabled','disabled');
	  	$('.stripe_input').removeAttr('disabled','disabled');
	  }

	  if(type == 'paypal'){
		$('#cancel_fields').show();
		$('.stripe_input_content').hide();
		$('#paypal_email').removeAttr('disabled','disabled');
		$('.stripe_input').attr('disabled','disabled');
	  }
	 $('#status-popup-buyer').modal('toggle');

	 

}

function change_productorder_status()

{

	 var url            =  base_url+'user/purchases/change_gigs_status';
	 var p_id           =  $("#sell_gigs_statusid").val();
	 var reason         =  $("#reason_txt").val();
	 var payment_soruce =  $("#payment_soruce").val();
	 var paypal_email   =  $("#paypal_email").val(); 	 

	 
	 var account_holder_name   =  $("#account_holder_name").val(); 	 
	 var account_number   =  $("#account_number").val(); 	 
	 var bank_name   =  $("#bank_name").val(); 	 
	 var bank_address   =  $("#bank_address").val(); 	 
	 var sort_code   =  $("#sort_code").val(); 	 
	 var routing_number   =  $("#routing_number").val(); 	 
	 var account_ifsc   =  $("#account_ifsc").val(); 	 
	  
	 $("#reason_errormsg").html('');


 

	 if( (reason.length >0) &&((paypal_email.length >0) || (account_holder_name.length >0 && account_number.length >0 && bank_name.length >0 && bank_address.length >0) &&(sort_code.length >0 || routing_number.length >0 || account_ifsc.length >0)) )
	 {
		  var dataString="p_id="+p_id+"&sts="+reason+"&pemail="+paypal_email+"&account_holder_name="+account_holder_name+"&account_number="+account_number+"&bank_name="+bank_name+"&bank_address="+bank_address+"&sort_code="+sort_code+"&routing_number="+routing_number+"&account_ifsc="+account_ifsc+"&payment_soruce="+payment_soruce; 
		  $.ajax({
				  url:url,
				  data:dataString,
				  type:"POST",
				  success: function(res){ 
					   if(res==1)
					   {
						  $('#status-popup-buyer').modal('toggle');
						  location.reload(true);
					   }else{
						  $('#status-popup-buyer').modal('toggle');
						  location.reload(true);
					   }
				   }
		  });
	}else{
		if(payment_soruce == 'paypal'){
			if(reason.length <= 0 && paypal_email.length <=0 ){
			$("#reason_errormsg").html('Please enter cancellation reason and paypal ID');	
			}else if(reason.length <= 0){
				$("#reason_errormsg").html('Please enter cancellation reason');	
			}else if(paypal_email.length <=0 ){
					$("#reason_errormsg").html('Please enter the paypal ID');	
			}	
		}else if(payment_soruce == 'stripe'){

			if($('#reason_txt').val()==""){
				$('#reason_txt').css({"border": "red 2px solid"});
			}else{
				$('#reason_txt').removeAttr('border');
			}
			if($('#account_holder_name').val()==""){
				$('#account_holder_name').css({"border": "red 2px solid"});
			}else{
				$('#account_holder_name').removeAttr('border');
			}
			if($('#account_number').val()==""){
				$('#account_number').css({"border": "red 2px solid"});
			}else{
				$('#account_number').removeAttr('border');
			}
			if($('#bank_name').val()==""){
				$('#bank_name').css({"border": "red 2px solid"});
			}else{
				$('#bank_name').removeAttr('border');
			}
			if($('#bank_address').val()==""){
				$('#bank_address').css({"border": "red 2px solid"});
			}else{
				$('#bank_address').removeAttr('border');
			}
			if(($('#sort_code').val()=="") && ($('#routing_number').val()=="") && ($('#account_ifsc').val()=="")){
				$('#sort_code').css({"border": "red 2px solid"});
				$('#routing_number').css({"border": "red 2px solid"});
				$('#account_ifsc').css({"border": "red 2px solid"});

			}else{
				$('#sort_code ,#routing_number, #account_ifsc').removeAttr('border');
			}	

		}
		
		
	}
}

function show_cancelreason(ele,sts,id)

{

	$('#reason_txt_message').html(ele);

	if(sts==0)

	{

		var st=' <div class="col-lg-12"><button class="btn btn-primary btn-border pull-right" onclick="change_accept_status('+id+');" type="button">Accept</button></div>';

	}

	else

	{

		var st=' ';

	}

	$('#accept_div_row').html(st);

	$('#reason_model').modal('toggle');

}

function change_accept_status(id)

{

	var url    =  base_url+'user/sales/accept_buyer_request';

	 var dataString="p_id="+id; 

		  $.ajax({

				  url:url,

				  data:dataString,

				  type:"POST",

				  success: function(res){ 

					   if(res==1)

					   {

						  $('#reason_model').modal('toggle');

						  location.reload(true);

					   }else{

						  $('#reason_model').modal('toggle');

						  location.reload(true);

					   }

				   }

		  });

}

function user_paypal_submit(val)

{

	 var url    =  base_url+'user/payments/add_paypal_details';
	 var error = 0;

	 if(val == 'paypal'){



	 	$("#paypal_errormsg").html('');

	 	var p_id   =  $("#user_paypal_id").val();

	    if(p_id.length >0){

	      var dataString = "p_id="+p_id;

		  

		 }else{

		 	error = 1;

		$("#paypal_errormsg").html('Please enter id');

		}

	 }else if(val == 'stripe'){



		var account_holder_name = $('#account_holder_name'); 

		var account_number = $('#account_number'); 

		var bank_name = $('#bank_name'); 

		var bank_address = $('#bank_address'); 

		var sort_code = $('#sort_code'); 

		var routing_number = $('#routing_number'); 

		var account_ifsc = $('#account_ifsc'); 



		if(account_holder_name.val()==""){

			account_holder_name.css({"border": "red 2px solid"});

			error = 1;

		}else{

			account_holder_name.removeAttr('style');

		}

		if(account_number.val()==""){

			account_number.css({"border": "red 2px solid"});

			error = 1;

		}else{

			account_number.removeAttr('style');

		}

		if(bank_name.val()==""){

			bank_name.css({"border": "red 2px solid"});

			error = 1;

		}else{

			bank_name.removeAttr('style');

		}

		if(bank_address.val()==""){

			bank_address.css({"border": "red 2px solid"});

			error = 1;

		}else{

			bank_address.removeAttr('style');

		}

		if(sort_code.val()=="" && routing_number.val()=="" && account_ifsc.val()==""){

			$('.error_note').text('Please provide your bank sort code or routing number or IFSC code...');

			sort_code.css({"border": "red 2px solid"});

			routing_number.css({"border": "red 2px solid"});

			account_ifsc.css({"border": "red 2px solid"});

			error = 1;

		}else{

			$('.error_note').text('');

			sort_code.removeAttr('style');

			routing_number.removeAttr('style');

			account_ifsc.removeAttr('style');

		}

		var dataString = $('#bank_details_form').serialize();



	 }else if(val == 'stripe-paypal' || val == 'paypal-stripe'){

	 	var account_holder_name = $('#account_holder_name'); 

		var account_number = $('#account_number'); 

		var bank_name = $('#bank_name'); 

		var bank_address = $('#bank_address'); 

		var sort_code = $('#sort_code'); 

		var routing_number = $('#routing_number'); 

		var account_ifsc = $('#account_ifsc'); 





	 	$("#paypal_errormsg").html('');

	 	var p_id   =  $("#user_paypal_id").val();

	    if(p_id.length >0){

	      var dataString = "p_id="+p_id;

		 }else{

		 	error = 1;

		$("#paypal_errormsg").html('Please enter id');

		}

	 

		if(account_holder_name.val()==""){

			account_holder_name.css({"border": "red 2px solid"});

			error = 1;

		}else{

			account_holder_name.removeAttr('style');

		}

		if(account_number.val()==""){

			account_number.css({"border": "red 2px solid"});

			error = 1;

		}else{

			account_number.removeAttr('style');

		}

		if(bank_name.val()==""){

			bank_name.css({"border": "red 2px solid"});

			error = 1;

		}else{

			bank_name.removeAttr('style');

		}

		if(bank_address.val()==""){

			bank_address.css({"border": "red 2px solid"});

			error = 1;

		}else{

			bank_address.removeAttr('style');

		}

		if(sort_code.val()=="" && routing_number.val()=="" && account_ifsc.val()==""){

			$('.error_note').text('Please provide your bank sort code or routing number or IFSC code...');

			sort_code.css({"border": "red 2px solid"});

			routing_number.css({"border": "red 2px solid"});

			account_ifsc.css({"border": "red 2px solid"});

			error = 1;

		}else{

			$('.error_note').text('');

			sort_code.removeAttr('style');

			routing_number.removeAttr('style');

			account_ifsc.removeAttr('style');

		}
	 	var dataString = $('#bank_details_form').serialize();
	 }

	 dataString = dataString + "&source=" + val;

	 if(error ==0){



	 	$.ajax({

				  url:url,

				  data:dataString,

				  type:"POST",

				  success: function(res){ 

					   if(res==1)

					   {

						  $('#paypal-popup').modal('toggle');

						    location.reload(true);

					   }else{

						  $('#paypal-popup').modal('toggle');

						  location.reload(true);

					   }

				   }

		  });

	 }

	 return false;

}

function buyer_accept_seller_request(id,type)

{	

	 if(type == 'stripe'){

	 	$(".payment_type_block").hide();	

	 }else{

	 	$(".payment_type_block").show();	

	 }

	 $("#buyer_accept_rowid").val(id);

	 $('#buyer_accept_model').modal('toggle');

	 

}

function buyer_accept_order_request()

{

	 var id= $("#buyer_accept_rowid").val();

	 var url    =  base_url+'user/purchases/accept_seller_request';

	var paypal_email =  $("#paypal_emailid").val(); 	 

	 $("#reason_errormsgone").html('');

	 if(paypal_email.length >0)

	 {

	 var dataString="p_id="+id+"&pemail="+paypal_email; 

		  $.ajax({

				  url:url,

				  data:dataString,

				  type:"POST",

				  success: function(res){ 

					   if(res==1)

					   {

						  $('#buyer_accept_model').modal('toggle');

						  location.reload(true);

					   }else{

						  $('#buyer_accept_model').modal('toggle');

						  location.reload(true);

					   }

				   }

		  });

	 }else{

		 $("#reason_errormsgone").html('Please Enter Paypal email');

	 }

				 

}