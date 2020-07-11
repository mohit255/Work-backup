<footer>Copyright  Admin <span>2018</span>.</footer>
   <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Gallery</h4>
      </div>
      <div class="modal-body">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    <li data-target="#myCarousel" data-slide-to="1"></li>
    <li data-target="#myCarousel" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
    <div class="item active">
      <img src="assets/img/images/slider3.jpg" alt="Los Angeles">
    </div>

    <div class="item">
      <img src="assets/img/images/slider4.jpg" alt="Chicago">
    </div>

    <div class="item">
      <img src="assets/img/images/slider6.jpg" alt="New York">
    </div>
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
      </div>


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
           
            <button type="button" class="btn btn-primary" id="crop">Crop</button>
            <!-- <button type="button" class="btn btn-primary" id="crop_cover" style="display: none;">Crop</button> -->
          </div>
        </div>
      </div>
    </div>



<!--Modal for crop cover image  start-->
<div class="modal fade" id="modal_cover" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the image Cover</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="img-container">
              <img id="image_cover" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
           <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
            <button type="button" class="btn btn-primary" id="crop_cover">Crop</button>
          </div>
        </div>
      </div>
    </div>



    <!--Modal for crop cover image  for gahllery start sjdcndj -->
<div class="modal fade" id="modal_cover_gallery" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalLabel">Crop the Gallery</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <input type="hidden" id="image_cover_gallert_count" value="">
            <div class="img-container">
              
              <img id="image_cover_gallert" src="https://avatars0.githubusercontent.com/u/3456749">
            </div>
          </div>
          <div class="modal-footer">
           <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
            <button type="button" class="btn btn-primary" id="crop_cover_gallery">Crop</button>
          </div>
        </div>
      </div>
    </div>
  
      
      <script src="assets/escort/admin/assets/js/jquery.js"></script>
      <script src="assets/escort/admin/assets/js/bootstrap.min.js"></script>
      <script src="assets/escort/admin/assets/js/jquery-ui.js"></script>
      <script src="assets/escort/admin/assets/js/sparkline.js"></script>
      <script src="assets/escort/admin/assets/js/scrollup/jquery.scrollUp.js"></script>
      <script src="assets/escort/admin/assets/js/circliful/circliful.min.js"></script>
      <script src="assets/escort/admin/assets/js/circliful/circliful.custom.js"></script>
      <!-- <script src="assets/js/jvectormap/jquery-jvectormap-2.0.3.min.js"> -->
      <!-- </script><script src="assets/js/jvectormap/world-mill-en.js"></script> -->
      <script src="assets/escort/admin/assets/js/jvectormap/gdp-data.js"></script>
      <!-- <script src="assets/js/jvectormap/custom/world-map-markers.js"></script> -->
      <script src="assets/escort/admin/assets/js/custom.js"></script>
      <script src="assets/escort/admin/assets/js/custom-overview.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/dataTables.min.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/dataTables.bootstrap.min.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/autoFill.min.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/autoFill.bootstrap.min.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/fixedHeader.min.js"></script>
       <script src="assets/escort/admin/assets/js/datatables/custom-datatables.js"></script>
       <!-- <script src="assets/js/wysiwyg-editor/editor.js"></script> -->
       <script src="assets/escort/admin/assets/js/dsp/custom_js_dsp.js"></script>
       <script src="assets/escort/admin/assets/js/dsp/city_js_dsp.js"></script>
       <script src="assets/escort/admin/assets/js/dsp/dropdown_js_dsp.js"></script>
       <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>



    <script src="assets/escort/admin/assets/js/scrollbox/jquery.scrollbox.min.js"></script>
    <script src="assets/escort/admin/assets/js/scrollup/jquery.scrollUp.js"></script>
<script> var BASE_URL = "<?php echo base_url(); ?>";  </script>
<script> var base_url = "<?php echo base_url(); ?>";  </script>

<script type="text/javascript" src="assets/escort/assets/crop/croppie.js"></script>
  <script type="text/javascript" src="assets/escort/assets/crop/croppie_user_image.js"></script>
    <script src="assets/escort/crop/crop/cropper.js"></script>
    <script src="assets/escort/crop/crop/custom.js"></script>
  <script src="assets/js/bootstrapValidator.min.js"></script>
        <script src="assets/js/admin_validation.js"></script>
        <script src="assets/js/admin.js"></script>
<script type="text/javascript" src="assets/js/purchases.js"></script>
<script type="text/javascript" src="assets/js/star_rating.js"></script>
      <script type="text/javascript">

$(document).on("click",".edit_addon",function(){
   
   var id=$(this).data("id");
   $.ajax({
        method:"POST",
        url:base_url+"admin/membership/get_one_addone",
        data:{"id":id},
        dataType:"html",
        success:function(data)
        {
          $("#edit_addon .modal-body").html();
          $("#edit_addon .modal-title").text("Edit Addon");
          $("#edit_addon .modal-body").html(data);
          $("#edit_addon").modal();
        }
      });
   
});

$(document).on("click",".show_messae",function(){
   
   var id=$(this).data("id");
   $.ajax({
        method:"POST",
        url:base_url+"admin/review/get_one_review",
        data:{"id":id},
        dataType:"html",
        success:function(data)
        {
          $("#myModal_show_message .modal-body").html();
          $("#myModal_show_message .modal-body").html(data);
          $("#myModal_show_message").modal();
        }
      });
   
});

$(document).on("click",".add_as_baner_image",function(){

 var user_id=$(this).data("id");
   $.ajax({
        method:"POST",
        url:"admin/banner/set_as_banner_image",
        data:{"user_id":user_id},
        dataType:"html",
        success:function(data)
        {

          if(data=="1")
          {
            alert("User is already add in banners.");
          }
          else
          {
             alert("Image add in banner.");
          }
            location.reload();
        }
      });

});




$(document).on("click",".get_id_for_city_dsp",function(){

//alert("deepak");
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
$(document).on("click",".order_edit",function(){

          var id=$(this).data('id');
          // alert(id);
            $.ajax({

              method:"POST",
              url:BASE_URL+"admin/Orders/get_one_order",
              data:{"id":id},
              dataType:"html",
              success:function(data)
              {
                $('#myModalDefault_edit_order .modal-body').empty();
                $('#myModalDefault_edit_order .modal-body').html(data);
                $('#myModalDefault_edit_order').modal();
              }
            });

       

});


$(document).ready(function(){

 $(".remove_user_for_banner").click(function(){
   var id=$(this).data("id");
    if(confirm("Are you sure you want to remove this image from banners."))
     {
        
          $.ajax({
        method:"POST",
        url:"admin/banner/remove_user_for_banner",
        data:{"id":id},
        dataType:"html",
        success:function(data)
        {

          alert("Image remove in banner.");
            location.reload();
        }
      });
     }
     else
     {
       return false;
     }
 }); 

$("#search_user").keyup(function() {
     
     var search_filed=$(this).val();
     $.ajax({
        method:"POST",
        url:"admin/banner/search_user",
        data:{"search":search_filed},
        dataType:"json",
        success:function(data)
        {
          var res_data="";
          var image_set="";
          for(var i=0; i<data.count_res; i++)
          {           
  
  image_set="assets/uploads/1545040228.png";

            if(data.result[i]["cover_image"]!="")
            {
               image_set="assets/uploads/"+data.result[i]["cover_image"];
            }
        
            res_data +='<li class="list-group-item"><img src="'+image_set+'" style="width:92px; height :44px; border: 2px solid #10100f;     padding: 1px;"  > || '+data.result[i]["fullname"]+' || '+data.result[i]["types"]+' || <a href="javascript:;" data-id="'+data.result[i]["USERID"]+'" class="add_as_baner_image" ><u>Add As Banner</u></a></li>';
            
          }
          
        $("#result").html(res_data);
        
        }
      });
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






 $(document).on("click","#add_data_for_dropdown",function(){
    $("#mydropdown #show_data_for_drop_down_value").append('<div class="remove_box_for_drop_down"><div class="col-md-8"><input type="text" class="form-control" name="dropdown_value[]" value="value 1"></div><div class="col-md-2 pull-right"><button type="button" class="pull-right btn btn-danger remove_services_btn_for_drop_down">Remove</button></div><div class="row"><div class="col-md-12">&nbsp;</div></div></div>');
    $("#mydropdown").modal();
  });

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


$('.date_picker').datepicker({
  showAnim:"drop",
  dateFormat:"d-M-yy",
 minDate: new Date(),
 onClose:function(selectedDate){
  $(".return_date").datepicker("option","minDate",selectedDate);
 }
})
.on('changeDate', function(ev){                 
    $('.date_picker').datepicker('hide');
});


$('.return_date').datepicker({
  showAnim:"drop",
  dateFormat:"d-M-yy",
 minDate: new Date()
})
.on('changeDate', function(ev){                 
    $('.return_date').datepicker('hide');
});


});

$("#delete_users").click(function(){

var ids = new Array();
  $(".checkitem:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select atleast one checkbok!");
   // alert(BASE_URL+"admin/user");
 }
 else
 {
   var operation_set=$("#set_users").val();
   var table_name=$("#table_name").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
       if(confirm("Are you sure you want to "+operation_set+" of selected checkbox?"))
   { 

  var url= BASE_URL+"admin/user/user_set_operation";
  if(table_name=="membership")
  {
    var url=BASE_URL+"admin/membership/user_set_operation";
  }
  if(table_name=="location")
  {
    var url=BASE_URL+"admin/city/city_set_operation";
  }
  if(table_name=="faqs_categories")
  {
    var url=BASE_URL+"admin/help_center/faq_set_operation";
  }
if(table_name=="feedback")
  {
    var url=BASE_URL+"admin/review/review_set_operation";
  }

  if(table_name=="footer_submenu")
  {
    var url=BASE_URL+"admin/footer_submenu/footer_set_operation";
  }
if(table_name=="admin_report")
  {
    var url=BASE_URL+"admin/review/remove_report_data";
  }

           $.ajax({
             method:"POST",
              url:url,
              data:{"id":ids,"operation":operation_set},
              dataType:"html",
              success:function(data){
                // console.log(ids+operation_set);
                 alert("Account is "+operation_set);
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



$("#applydrop").click(function(){

var ids = new Array();
  $(".checkitem:checked").each(function(){
           
          ids.push(this.value); 
      });
 if(ids=="")
 {
   alert("Please select atleast one value!");
   // alert(BASE_URL+"admin/user");
 }
 else
 {
  var operation_set=$("#get_action").val();
    if(operation_set=="")
    {
       alert("Please select operation!");
    }
    else
    {
       if(confirm("Are you sure you want to "+operation_set+" of selected value?"))
   { 

           $.ajax({
             method:"POST",
              url:BASE_URL+"admin/dropdown/user_set_operation",
              data:{"id":ids,"operation":operation_set},
              dataType:"html",
              success:function(data){
                console.log(data);
                 alert("Account is "+operation_set);
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

       $(document).ready(function(){
      setTimeout(function() {
       $('.alert').fadeOut('slow');}, 5000
         );
       }); 
      $(function () {
        $("#txtEditor").summernote();
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
   </body>