$(document).on("click","#newsletter_data",function(){
	var status=$("#get_newsletter_data").val();
	if(status=="Select Operation")
	{
		alert("Please Select Option");
	}
	else
	{
		if(status=="Send News")
		{
			window.location.href="send-email.php?id=1,2,3,4,5";
		}
	}
});

$(document).on("click",".goto_email_modal",function(){
	$("#viewenNewsletterForUser").modal('hide');
	// $("#viewblogemailMessage #show_list_of_users_sub").empty();
	$("#viewblogemailMessage").modal();
});