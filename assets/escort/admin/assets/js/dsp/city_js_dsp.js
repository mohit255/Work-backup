$(document).ready(function(){

$(".applay").click(function(){
 var status=$(".get_action").val();
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
   alert("Please select Citys!");
 }
 else
 {
   if(confirm("Are you sure you want to "+status+" of selected Citys?"))
   {
       $.ajax({
       	method:"POST",
       	url:"city/set_option",
       	data:{"status":status,"id":ids},
       	dataType:"html",
       	success:function(data){
       		// console.log(data);
       		window.location.href="city/";
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



});
$(document).ready(function(){
	$(".edit_citys").click(function(){

		var id=$(this).data("id");
		$.ajax({
			method:"POST",
			url:"city/get_one_city",
			data:{"id":id},
			dataType:"html",
			success:function(data){
				$("#myModalDefault_edit .modal-body").empty();
				$("#myModalDefault_edit .modal-body").html(data);
				$("#myModalDefault_edit").modal();
			}
		});
	});
});