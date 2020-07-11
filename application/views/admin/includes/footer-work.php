                <footer class="footer text-right">
                  &copy; <?php echo date('Y'); ?> <div class="version">Version <?php echo $this->session->userdata('version');?></div>
                </footer>

            </div>
        </div>
    	<script>var resizefunc = []; </script>
		<script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/detect.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/fastclick.js"></script> 
        <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/js/bootstrap-switch.js"></script> 
		<script>
            var BASE_URL = "<?php echo base_url(); ?>";     
			$("[name='my-checkbox']").bootstrapSwitch();      
        </script>
        <script>setTimeout(function(){ $('#flash_succ_message, #flash_error_message').hide(); }, 5000);</script>
        
        <script src="<?php echo base_url(); ?>assets/js/bootstrapValidator.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/admin_validation.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/admin.js"></script>
		<!-- REQUIRED FOR FETCHING USER TIME ZONE -->
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jstz-1.0.4.min.js"></script> 
    
      <script type="text/javascript">
var BASE_URL = "<?php echo base_url(); ?>";


$(document).on("click","#get_list_of_user_of_this_email",function(){
   $("#viewblogemailMessage #show_list_of_users_sub").empty();
   $("#viewblogemailMessage #show_list_of_users_sub").html('<div class="col-md-12"><table class="table table-bordered no-margin"><thead><tr><th>#</th><th>E-mail</th><th>User Name</th></tr></thead><tbody><tr><td>1</td><td>user@gmail.com</td><td>Honey</td></tr><tr><td>2</td><td>user@gmail.com</td><td>Honey</td></tr><tr><td>3</td><td>user@gmail.com</td><td>Honey</td></tr><tr><td>4</td><td>user@gmail.com</td><td>Honey</td></tr><tr><td>1</td><td>user@gmail.com</td><td>Honey</td></tr><tr><td>5</td><td>user@gmail.com</td><td>Honey</td></tr></tbody></table></div>');
   $("#viewblogemailMessage").modal();
});        
$(document).on("click",".send-email-form",function(){
  $("#show-email-form").empty();
  $("#show-email-form").html('<div class="panel panel-blue"><div class="panel-heading"><h4>Send To : escort_email@gmail.com</h4></div><div class="panel-body"><form action="#" method="post"><div class="row"><div class="col-md-12"><div class="form-group"><!-- <label for="simpleInput">Subject</label> --><input type="text" class="form-control" id="simpleInput" placeholder="Enter Subject"></div></div></div><div class="row"><div class="col-md-12"><div class="form-group"><!-- <label for="simpleInput">Message</label> --><textarea class="form-control" rows="3" placeholder="Enter Message..."></textarea></div></div></div><div class="row"><div class="col-md-12"><button type="submit" class="btn btn-warning btn-block">Send </button></div></div></form></div></div>');
});

        $("#checkall").change(function(){
    $(".checkitem").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall").prop("checked",false);
    }
    if($(".checkitem:checked").length==$(".checkitem").length)
    {
      $("#checkall").prop("checked",true);
    }
  });
     

     $("#checkall_2").change(function(){
    $(".checkitem_2").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem_2").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall_2").prop("checked",false);
    }
    if($(".checkitem_2:checked").length==$(".checkitem").length)
    {
      $("#checkall_2").prop("checked",true);
    }
  });   



$("#checkall_3").change(function(){
    $(".checkitem_3").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem_3").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall_3").prop("checked",false);
    }
    if($(".checkitem_3:checked").length==$(".checkitem").length)
    {
      $("#checkall_3").prop("checked",true);
    }
  }); 

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
  

  $(document).on("click","#add_data",function(){

    $("#show-my-services").append('<div class="remove_div"><div class="col-md-12"><button type="button" class="btn btn-danger remove_services_btn">Remove</button></div><div class="col-md-4"><div class="form-group"><label for="simpleInput">Services Name</label><select class="form-control" name="serveces_name[]"><option value="Services 1">Services 1</option><option value="Services 2">Services 2</option><option value="Services 3">Services 3</option><option value="Services n">Services n</option></select></div></div><div class="col-md-4"><div class="form-group"><label for="simpleInput">Value</label><input type="text" name="services_val[]" class="form-control" id="simpleInput " placeholder="Enter Value" required=""></div></div><div class="col-md-4"><div class="form-group"><label for="simpleInput">Text (Sub Heading)</label><input type="text" name="services_text[]" class="form-control" id="simpleInput " placeholder="Enter Value" required=""></div></div></div>');
  });

  $(document).on("click",".remove_services_btn", function(e){ 
        $(this).closest(".remove_div").remove(); 
      });

      </script> 
      <script type="text/javascript">
      $(function () {
        $("#txtEditor").summernote();
      });



      $(document).on("click","#add_data_for_dropdown",function(){

    $("#myModalDefault_edit_dropdown #show_data_for_drop_down_value").append('<div class="remove_box_for_drop_down"><div class="col-md-8"><input type="text" class="form-control" name="dropdown_value[]" value="value 1"></div><div class="col-md-2 pull-right"><button type="button" class="pull-right btn btn-danger remove_services_btn_for_drop_down">Remove</button></div><div class="row"><div class="col-md-12">&nbsp;</div></div></div>');
    $("#myModalDefault_edit_dropdown").modal();
  });

  $(document).on("click",".remove_services_btn_for_drop_down", function(e){ 
        $(this).closest(".remove_box_for_drop_down").remove(); 
        $("#myModalDefault_edit_dropdown").modal();
      });

      </script> 
      <script type="text/javascript">
      $(function () {
        $("#txtEditor").summernote();
      });
    </script>




    <script type="text/javascript">

 $(document).on("click","#add_data_for_dropdown",function(){

    $("#mydropdown #show_data_for_drop_down_value").append('<div class="remove_box_for_drop_down"><div class="col-md-8"><input type="text" class="form-control" name="dropdown_value[]" value="value 1"></div><div class="col-md-2 pull-right"><button type="button" class="pull-right btn btn-danger remove_services_btn_for_drop_down">Remove</button></div><div class="row"><div class="col-md-12">&nbsp;</div></div></div>');
    $("#myModalDefault_edit_dropdown").modal();
  });

      $(document).ready(function(){

setInterval(function(){ 
  $(".alert").fadeOut();
 }, 3000);

        $('.get_id_for_drop_down').click(function(){

          var id=$(this).data('id');
            $.ajax({

              method:"POST",
              url:BASE_URL+"admin/dropdown/get_one_drop",
              data:{"id":id},
              dataType:"html",
              success:function(data)
              {
                $('#mydropdown .modal-body').empty();
                $('#mydropdown .modal-body').html(data);
                $('#mydropdown').modal();
              }
            });

        });
        $('.get_id_for_city').click(function(){

          var id=$(this).data('id');
            $.ajax({

              method:"POST",
              url:BASE_URL+"admin/city/get_one_city",
              data:{"id":id},
              dataType:"html",
              success:function(data)
              {
                $('#myModalDefault_edit .modal-body').empty();
                $('#myModalDefault_edit .modal-body').html(data);
                $('#myModalDefault_edit').modal();
              }
            });

        });


        $('#applydrop').click(function(){

           var selectedDrop = $('select.get_action').children("option:selected").val();
          
          // alert(selectedDrop);
          
         // });
        });
        /* if the page has been fully loaded we add two click handlers to the button */
$(document).ready(function () {
  /* Get the checkboxes values based on the class attached to each check box */
  $("#delete_city").click(function() {
      getValueUsingClass();
  });
  
  /* Get the checkboxes values based on the parent div id */
  $("#buttonParent").click(function() {
      getValueUsingParentTag();
  });
});

function getValueUsingClass(){
  /* declare an checkbox array */
  var chkArray = [];
  
  /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
  $(".checkitem:checked").each(function() {
    chkArray.push($(this).val());
  });
  
  /* we join the array separated by the comma */
  var selected;
  selected = chkArray.join(',') ;
  
  /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
  if(selected.length > 0){
    var operation_set=$("#get_action").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
       if(confirm("Are you sure you want to "+operation_set+" of selected account?"))
   { 
             
           $.ajax({
             method:"POST",
              url:BASE_URL+"admin/city/user_set_operation",
              data:{"id":selected,"operation":operation_set},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Acount is "+operation_set);
                 location.reload();
          
                }
            });

           
   }
   else
   {
     return false;
   }
    }
  }else{
    alert("Please at least check one of the checkbox"); 
  }
}


       
      });
      $(document).ready(function () {
          /* Get the checkboxes values based on the class attached to each check box */
          $("#applydrop").click(function() {
              getValueUsingClass();
          });
          function getValueUsingClass(){
  /* declare an checkbox array */
  var chkArray = [];
  
  /* look for all checkboes that have a class 'chk' attached to it and check if it was checked */
  $(".checkitem:checked").each(function() {
    chkArray.push($(this).val());
  });
  
  /* we join the array separated by the comma */
  var selected;
  selected = chkArray.join(',') ;
  
  /* check if there is selected checkboxes, by default the length is 1 as it contains one single comma */
  if(selected.length > 0){
    var operation_set=$("#get_action").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
       if(confirm("Are you sure you want to "+operation_set+" of selected account?"))
   { 
             
           $.ajax({
             method:"POST",
              url:BASE_URL+"admin/dropdown/user_set_operation",
              data:{"id":selected,"operation":operation_set},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Acount is "+operation_set);
                 location.reload();
          
                }
            });

           
   }
   else
   {
     return false;
   }
    }
  }else{
    alert("Please at least check one of the checkbox"); 
  }
}
          
 
      });
       $('.get_id_for_service').click(function(){

          var id=$(this).data('id');
            $.ajax({

              method:"POST",
              url:BASE_URL+"admin/membership/get_one_service",
              data:{"id":id},
              dataType:"html",
              success:function(data)
              {
                $('#myservicesModal .modal-body').empty();
                $('#myservicesModal .modal-body').html(data);
                $('#myservicesModal').modal();
              }
            });

        });



    </script>  
		<script type="text/javascript">

      $(document).on('change', '#blogfetured', function(){
  var name = document.getElementById("blogfetured").files[0].name;
  //console.log(document.getElementById("coverPicherImage").files[0]);
  var reader = new FileReader();
    reader.onload = function (e) {
                        $('#blogimg2')
                          .attr('src', e.target.result)
                          .height(300).css("margin-left"," 0%").css("border","3px solid #4ac102").css("width","100%");
                          $('#blogimg3').css("display","none");
                      };
             document.getElementById("setTextDsp").innerHTML="Change";         
            console.log(reader.readAsDataURL(document.getElementById("blogfetured").files[0]));
  
 });

$(document).ready(function(){


setInterval(function(){ 

  $.ajax({
             method:"POST",
              url:BASE_URL+"admin/review/get_new_enquerys",
              dataType:"html",
              success:function(data){
                console.log(data);
                 // alert("Enquerys is deleted.");
                 // location.reload();
              $("#show_new_enquerys").html(data);
                }
            });


}, 1000);


 $("#delete_enquerys").click(function(){

 
var ids = new Array();
  $(".checkitem_orders:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select atleast one enquery!");
   // alert(BASE_URL+"admin/user");
 }
 else
 {
    
       if(confirm("Are you sure you want to delete of selected equerys.?"))
        {
          $.ajax({
             method:"POST",
              url:BASE_URL+"admin/review/delete_enquerys",
              data:{"id":ids},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Enquerys is deleted.");
                 location.reload();
          
                }
            });
        }
        else
        {
          return false;
        }
 }




 }); 

 $(".show_message").click(function(){
   
     var id=$(this).data("id");
    
     $.ajax({
      method:"POST",
      url:BASE_URL+"admin/get_one_data",
      data:{"id":id},
      dataType:"html",
      success:function(data){
       // console.log(data);
        $("#myModal_enquerys .modal-body").empty();
        $("#myModal_enquerys .modal-body").html(data);
        $("#myModal_enquerys").modal();

      }
     });
 });
});


function delete_contect_of_blog(id)
{
  if(confirm("Do you want to delete this blog."))
  {
      $.ajax({
        method:"POST",
        url:BASE_URL+"admin/blog/delete_blog",
        data:{"id":id},
        dataType:"html",
        success:function(){
          alert("Blog is deleted.");
          location.reload();
        } 
      });
  }
}


function delete_contect_of_help_center(id)
{
  if(confirm("Do you want to delete this content."))
  {
      $.ajax({
        method:"POST",
        url:BASE_URL+"admin/help_center/delete_help_content",
        data:{"id":id},
        dataType:"html",
        success:function(){
          alert("content is deleted.");
          location.reload();
        } 
      });
  }
}


function delete_category_blog(id){
  if(confirm("Do you want to delete this category."))
  {
      $.ajax({
        method:"POST",
        url:BASE_URL+"admin/blog/delete_cat",
        data:{"id":id},
        dataType:"html",
        success:function(){
          alert("Category is deleted.");
          location.reload();
        } 
      });
  }
}

function delete_category_faq(id){
  if(confirm("Do you want to delete this category."))
  {
      $.ajax({
        method:"POST",
        url:BASE_URL+"admin/help_center/delete_cat",
        data:{"id":id},
        dataType:"html",
        success:function(){
          alert("Category is deleted.");
          location.reload();
        } 
      });
  }
}

			$(document).ready(function() {

$("#setreview_set").click(function(){

var ids = new Array();
  $(".checkitem_orders:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select atleast one reviews!");
   // alert(BASE_URL+"admin/user");
 }
 else
 {
     var operation_set=$("#get_opertation_for_reviews").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
        if(confirm("Are you sure you want to "+operation_set+" of selected review?"))
        {
          $.ajax({
             method:"POST",
              url:BASE_URL+"admin/review/set_review_option",
              data:{"id":ids,"operation":operation_set},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Review is "+operation_set);
                 location.reload();
          
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

$("#delete_users").click(function(){

var ids = new Array();
  $(".checkitem:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select atleast one user!");
   // alert(BASE_URL+"admin/user");
 }
 else
 {
   var operation_set=$("#set_users").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
       if(confirm("Are you sure you want to "+operation_set+" of selected account?"))
   { 

           $.ajax({
             method:"POST",
              url:BASE_URL+"admin/user/user_set_operation",
              data:{"id":ids,"operation":operation_set},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Acount is "+operation_set);
                 location.reload();
          
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




// delete or manage status of orders code start

$(document).on("click","#apply_for_orders",function(){
 
 var ids = new Array();
  $(".checkitem_orders:checked").each(function(){
           
          ids.push(this.value); 
      });

if(ids=="")
{
  alert("Please select atleast one order!");
}
else
{
   var operation_get=$("#operation").val();
   if(operation_get=="")
   {
     alert("Please select operation!");   
   }
   else
   {
     if(operation_get=="Seller" ||  operation_get=="Buyer")
     {
      var status_get=$("#status").val();
 
       if(status_get=="")
       {
         alert("Please select status type!"); 
         return false;
       } 
       else
       {
         var set_status=status_get;
       }
           
     }
    else
    {

     var set_status="no_status"
    }

  $.ajax({
     method:"POST",
     url:BASE_URL+"admin/user/order_delete",
     data:{"ids":ids,"operation_get":operation_get,"set_status":set_status,},
     dataType:'html',
     success:function(data)
     {
       // console.log(data);
       if(operation_get=="Seller" ||  operation_get=="Buyer")
       {
        alert(operation_get+" Order status changed successfully.");
       }
       else
       {
        alert("Order deleted successfully.");
       }
        
                 location.reload();

     }
  });




   }
}


});



$(document).on("change","#operation",function(){

   if($(this).val()=="Seller" ||  $(this).val()=="Buyer")
   {
     $("#set_css_order_status").removeClass("set_css_oredr_dsp");

   }
   else
   {
     $("#set_css_order_status").addClass("set_css_oredr_dsp");    
   }
})



  $("#checkall_orders").change(function(){
    $(".checkitem_orders").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem_orders").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall_orders").prop("checked",false);
    }
    if($(".checkitem_orders:checked").length==$(".checkitem_orders").length)
    {
      $("#checkall_orders").prop("checked",true);
    }
  });


// delete or manage status of orders code end





// user delete code start

  $("#checkall").change(function(){
    $(".checkitem").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall").prop("checked",false);
    }
    if($(".checkitem:checked").length==$(".checkitem").length)
    {
      $("#checkall").prop("checked",true);
    }
  });


// user delete code end


				var tz = jstz.determine();
				var timezone = tz.name();
				$.post('<?php echo base_url(); ?>ajax',{timezone:timezone},function(res){
				// console.log(res);
				})      
			});
		</script>
		<script>
 function subitmorefield()
 {
	var labe=$("#field-1").val();
	var fname= $("#field-2").val();
    var html=''; 
	var html = '<div class="form-group">';
      html = html+' <label class="col-sm-3 control-label">'+labe+'</label>';
	  html = html+' <div class="col-sm-9">'; 
	  html = html+'<input type="text" class="form-control"  name="'+fname+'" placeholder="Type here.." value=""'; 
	  html = html+'</div>';
	  html = html+'</div>';
    $('.hrs_detail_addmore').append(html);
  	$('#con-close-modal').modal('hide');
 }
 </script>
<script>
function fnc(value, min, max) 
{
    if(parseInt(value) < 0 || isNaN(value)) 
        return 0; 
    else if(parseInt(value) > 50) 
        return 1; 
    else return value;
}
</script>
 <script>
    // jQuery ".Class" SELECTOR.
    $(document).ready(function() {
		
        $('.numberonly').keypress(function (event) {
            return isNumber(event, this)
        });

        $('#policy_description').keyup(function()
                {
                       var yourInput = $(this).val();
                       re = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
                    var isSplChar = re.test(yourInput);
                       if(isSplChar)
                       {
                           var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
                           $(this).val(no_spl_char);
                    }
                 });
    });
    // THE SCRIPT THAT CHECKS IF THE KEY PRESSED IS A NUMERIC OR DECIMAL VALUE.
    function isNumber(evt, element) {

        var charCode = (evt.which) ? evt.which : event.keyCode

        if (
            (charCode != 45 || $(element).val().indexOf('-') != -1) &&      // “-” CHECK MINUS, AND ONLY ONE.
            (charCode != 46 || $(element).val().indexOf('.') != -1) &&      // “.” CHECK DOT, AND ONLY ONE.
            (charCode < 48 || charCode > 57))
            return false;

        return true;
    }    


</script>
</body>
</html>