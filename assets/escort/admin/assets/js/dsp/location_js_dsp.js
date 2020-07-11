$(document).ready(function(){



$(".state_operation_applay").click(function(){
 var status=$("#get_action_state").val();
  console.log(status);
 if(!status)
 { 
 	alert("Plese select operation to applay.")
 }
 else
 {
 	var ids = new Array();
  $(".checkitem:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select state or territory!");
 }
 else
 {
   if(confirm("Are you sure you want to "+status+" of selected state or territory?"))
   {
       $.ajax({
       	method:"POST",
       	url:"location/set_option_state",
       	data:{"status":status,"id":ids},
       	dataType:"html",
       	success:function(data){
       		// console.log(data);
       		window.location.href="location/";
       	}
       });
   }
   else
   {
   	return false;
   }
 } 
}
 
});




$(".edit_states").click(function(){

		var id=$(this).data("id");
		$.ajax({
			method:"POST",
			url:"location/get_one_state",
			data:{"id":id},
			dataType:"html",
			success:function(data){
				$("#myModalAdd_state_edit .modal-body").empty();
				$("#myModalAdd_state_edit .modal-body").html(data);
				$("#myModalAdd_state_edit").modal();
			}
		});
	});


});