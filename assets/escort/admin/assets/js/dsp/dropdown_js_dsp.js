$(document).on("click",".edit-drop-down",function(){
var id=$(this).data("id");
		$.ajax({
			method:"POST",
			url:"dropdown/get_one_dropdown",
			data:{"id":id},
			dataType:"html",
			success:function(data){
				$("#myModalDefault_edit_dropdown .modal-body").empty();
				$("#myModalDefault_edit_dropdown .modal-body").html(data);
				$("#myModalDefault_edit_dropdown").modal();
			}
		});
});

  $(document).on("click","#add_data_for_dropdown",function(){

    $("#myModalDefault_edit_dropdown #show_data_for_drop_down_value").append('<div class="remove_box_for_drop_down"><div class="col-md-8"><input type="text" class="form-control" required="" name="dropdown_value[]" value=""></div><div class="col-md-2 pull-right"><button type="button" class="pull-right btn btn-danger remove_services_btn_for_drop_down">Remove</button></div><div class="row"><div class="col-md-12">&nbsp;</div></div></div>');
    $("#myModalDefault_edit_dropdown").modal();
  });

  $(document).on("click",".remove_services_btn_for_drop_down", function(e){ 
        $(this).closest(".remove_box_for_drop_down").remove(); 
        $("#myModalDefault_edit_dropdown").modal();
      });
