$(document).on("click", "#add_data", function () {

	$("#show-my-services").append('<div class="row remove_div"> <div class="col-md-3"><div class="editing-form-label-cell"><label for="" class="control-label editing-form-label">Call Duration</label> </div> <div class="editing-form-value-cell"><select name="escort_duraction[]" id="" class="form-control"> <option value="" selected="selected">- Duration -</option><option value="45min">45min</option> <option value="1 hour">1 hour</option> <option value="2 hour">2 hour</option> <option value="6 hour">6 hour</option><option value="Overnight">Overnight</option></select></div></div><div class="col-md-3"> <div class="editing-form-label-cell"> <label for="" class="control-label editing-form-label">In-Call</label></div>  <div class="input-group">  <span class="input-group-addon">$</span>  <input type="text" class="form-control set_number_only" name="escort_in_price[]" aria-label="Amount (rounded to the nearest dollar)" placeholder="In-Call"></div> </div>  <div class="col-md-3"> <div class="editing-form-label-cell"> <label for="" class="control-label editing-form-label">Out-Call</label> </div> <div class="input-group"> <span class="input-group-addon">$</span><input type="text" class="form-control set_number_only" name="escort_out_price[]" aria-label="Amount (rounded to the nearest dollar)" placeholder="Out-Call"></div>  </div> <div class="col-md-2"><button type="button" class="btn btn-primary remove_services_btn" style="margin-top:26px;"><i class="fa fa-trash"></i> Remove</button></div></div>');
});

$(document).on("click", ".remove_services_btn", function (e) {
	$(this).closest(".remove_div").remove();
});



