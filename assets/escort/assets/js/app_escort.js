$(document).ready(function()  {

  setInterval(function(){ 

      var password=$("#get_password").val();
      var password_rep=$("#get_pre_password").val();
    if(password=="" && password_rep=="")
    {
       $("#show_error_message").html('');
       $("#submit_code_set").attr("disabled", false);
    }  
    else
    {
    	if(password!=password_rep)
    	{
    		// $("#submit_code_set").disabled = true;
    		$("#submit_code_set").attr("disabled", true);
    		$("#show_error_message").html('<p style="color:red;">Password does not match.</p>');
    	}
    	else
    	{
    		$("#submit_code_set").attr("disabled", false);
            $("#show_error_message").html('');
    	} 
    }


   }, 1000);

});