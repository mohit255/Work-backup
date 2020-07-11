  $(document).ready(function(){

//edit_toure start




//edit_toure start
$(".delete_tour_rate").click(function(){

var data=$(this).data("id");
var data_get=data.split("-");
var table_name=data_get[0];
var id=data_get[1];
var mess_set=table_name.split("_").join(" ");
 if(confirm("Do you want to remove this "+mess_set+"."))
  {
    $.ajax({
         method:"POST",
            url:base_url+'user/sell_service/delete_escort_info/',
            data:{"id":id,"table_name":table_name},
            dtaType:'html',
            success:function(data){
             alert(mess_set+" is deleted.");
             location.reload();

            } 
     });
  }
  else
  {
     return false;
  }

  
});



//edit_toure end
  
  $("#state_get").change(function(){
    
var state=$(this).val();
   if(state=="Victoria")
   {
     $("#set_class_for_victoria").attr("disabled",false);
   }
   else
   {
     $("#set_class_for_victoria").attr("disabled",true);
   }

    
     $.ajax({
            method:"POST",
            url:base_url+'user/sell_service/get_citys/',
            data:{"state":state},
            dtaType:'html',
            success:function(data){
              $("#main_location_set").html(data);
            } 
     });
  
  });

  
  


$("#checkall_services").change(function(){
    $(".checkitem_services").prop("checked",$(this).prop("checked"))
  });
  
  $(".checkitem_services").change(function(){
    if($(this).prop("checked")==false)
    {
      $("#checkall_services").prop("checked",false);
    }
    if($(".checkitem_services:checked").length==$(".checkitem_services").length)
    {
      $("#checkall_services").prop("checked",true);
    }
  });



$(".get_days_click_do_code_in_custom_js").click(function(){

    var no_of_week=parseInt($(this).val());
    
    var l=0;
     var data='';
     // alert(no_of_week);
  
var today = new Date();
var miniyater='*#*';
       for(var i=0; i<no_of_week; i++)
       {


var dateLimit = new Date(new Date().setDate(today.getDate() + i));
// var someFormattedDate = dd + '/'+ mm + '/'+ y; 
  var date_array=dateLimit.toString().split(" ");
var days
     switch(date_array[0]){
             case 'Sun':
                  days='Sunday';       
                 break;
                 case 'Mon':
                  days='Monday';       
                 break;
                 case 'Tue':
                  days='Tuesday';       
                 break;
                  case 'Wed':
                  days='Wednesday';       
                 break;
                 case 'Thu':
                  days='Thursday';       
                 break;
                 case 'Fri':
                  days='Friday';       
                 break;
                 case 'Sat':
                  days='Saturday';       
                 break;
            
     }
  
     data +='<input type="hidden" name="duration_play" value="'+no_of_week+'">';
  var get_date=date_array[2]+"-"+date_array[1]+"-"+date_array[3]
         if(i%7==0)
         {
          l=l+1;
           data +='<h4>Week '+l+'</h4>';
         }
         data +='<div class="availability-table__entry "> <div class="availability-table__entry__name"> <div class="checkbox"> <div class="availability-table__entry__name__day"> <input id="day_set_'+get_date+'" type="checkbox" name="days_and_date[]" value="'+days+'_'+get_date+'"> <label for="day_set_'+get_date+'">'+days+'</label> </div> <span class="availability-table__entry__name__date">'+get_date+'</span> </div> </div> <div class="availability-table__entry__times-range"> <span class="times-range-from"> <input name="from_time_'+get_date+'[]" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;<input id="times_'+get_date+'" checked="" type="radio" name="duration[duration_'+get_date+']" value="times"> </span> <label class="times-range-to" for="times_'+get_date+'"> <input name="to_time_'+get_date+'[]" type="text" value="8:00 PM" class="form-control js-timepick"> </label> </div> <div class="availability-table__entry__times-set"> <div class="checkbox"> <span class="times-set-till-late"> <input id="till_'+get_date+'" type="radio" name="duration[duration_'+get_date+']" value="Till late"><label for="till_'+get_date+'">Till late</label> </span> <span class="times-set-all-day"> <input id="day_'+get_date+'" type="radio" name="duration[duration_'+get_date+']" value="All day"><label for="day_'+get_date+'">All day</label></span> <span class="times-set-by-appointment"> <input id="appo_'+get_date+'" type="radio" name="duration[duration_'+get_date+']" value="By appointment"><label for="appo_'+get_date+'">By appointment</label></span> </div> </div> </div>';
       }
       $("#show_week_data_form").empty();
       $("#show_week_data_form").html(data);
});




    
  });



    window.addEventListener('DOMContentLoaded', function () {
      var avatar = document.getElementById('avatar');
      var image = document.getElementById('image');
      var input = document.getElementById('input');
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal');
      var cropper;

      $('[data-toggle="tooltip"]').tooltip();

      input.addEventListener('change', function (e) {
        var files = e.target.files;
        var done = function (url) {
          input.value = '';
          image.src = url;
          $alert.hide();
          $modal.modal('show');
        };
        var reader;
        var file;
        var url;

        if (files && files.length > 0) {
          file = files[0];

          if (URL) {
            done(URL.createObjectURL(file));
          } else if (FileReader) {
            reader = new FileReader();
            reader.onload = function (e) {
              done(reader.result);
            };
            reader.readAsDataURL(file);
          }
        }
      });

      $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          dragMode: 'move',
        aspectRatio: 2 / 3,
        autoCropArea: 0.90,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });

      document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');
        console.log();
        console.log(cropper.getContainerData().height);
        
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: parseInt(cropper.getContainerData().width),
            height: parseInt(cropper.getContainerData().height)
          });
          initialAvatarURL = avatar.src;
          avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar', blob);
            $.ajax(base_url+'user/sell_service/add_image/', {
              method: 'POST',
              data: {"blob":canvas.toDataURL()},
              // processData: false,
              // contentType: false,

              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function (data) {
                console.log(data);
                $("#set_profile_image").html(data);
                $alert.show().addClass('alert-success').text('Upload success');
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('Upload error');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });
    });





// cover crop


 window.addEventListener('DOMContentLoaded', function () {
      var avatar_cover = document.getElementById('avatar_cover');
      var image_cover = document.getElementById('image_cover');
      var input_cover = document.getElementById('input_cover');
      var $progress_cover = $('.progress_cover');
      var $progressBar_cover = $('.progress-bar_cover');
      var $alert_cover = $('.alert_cover');
      var $modal_cover = $('#modal_cover');
      var cropper_cover;

      $('[data-toggle="tooltip_2"]').tooltip();

      input_cover.addEventListener('change', function (e) {
        var files_cover = e.target.files;
        var done_cover = function (url_cover) {
          input_cover.value = '';
          image_cover.src = url_cover;
          $alert_cover.hide();
          $modal_cover.modal('show');
        };
        var reader_cover;
        var file_cover;
        var url_cover;

        if (files_cover && files_cover.length > 0) {
          file_cover = files_cover[0];

          if (URL) {
            done_cover(URL.createObjectURL(file_cover));
          } else if (FileReader) {
            reader_cover = new FileReader();
            reader.onload = function (e) {
              done_cover(reader_cover.result);
            };
            reader_cover.readAsDataURL(file_cover);
          }
        }
      });

      $modal_cover.on('shown.bs.modal', function () {
        cropper_cover = new Cropper(image_cover, {
           dragMode: 'move',
        aspectRatio: 1200 / 500,
        autoCropArea: 0.95,
        // restore: false,
        // guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false,
        // toggleDragModeOnDblclick: false
        });
      }).on('hidden.bs.modal', function () {
        cropper_cover.destroy();
        cropper_cover = null;
      });

      document.getElementById('crop_cover').addEventListener('click', function () {
        var initialAvatarURL_cover;
        var canvas_cover;

        $modal_cover.modal('hide');
        if (cropper_cover) {
          canvas_cover = cropper_cover.getCroppedCanvas({
             width: parseInt(cropper_cover.getContainerData().width),
            height: parseInt(cropper_cover.getContainerData().height)
          });
          // initialAvatarURL_cover = avatar_cover.src;
          // avatar_cover.src = canvas_cover.toDataURL();
          // avatar_cover.css("dispaly","block");

          $("#avatar_cover").html('<div style="background: url('+canvas_cover.toDataURL()+'); height: 420px; background-repeat:no-repeat; background-size: 100% 100%;  position: relative; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px"></div>');
          $progress_cover.show();
          $alert_cover.removeClass('alert-success alert-warning');
          canvas_cover.toBlob(function(blob) {
            var formData = new FormData();

            formData.append('avatar_cover', blob);
            
                 $.ajax({
                     method:"POST",
                     url:base_url+'user/sell_service/add_image_cover/',
                     data:{"blob":canvas_cover.toDataURL()},
                     dataType:"html",
                     success:function(data)
                     {
                      $("#set_cover_image").html(data);
             
                     }
                 });

            // $.ajax('escorts/add_image/', {
            //   method: 'POST',
            //   data: {"blob":canvas_cover.toDataURL()},
            //   xhr: function () {
            //     var xhr_cover = new XMLHttpRequest();

            //     xhr.upload.onprogress = function (e) {
            //       var percent_cover = '0';
            //       var percentage_cover = '0%';

            //       if (e.lengthComputable) {
            //         percent_cover = Math.round((e.loaded / e.total) * 100);
            //         percentage_cover = percent_cover + '%';
            //         $progressBar_cover.width(percentage_cover).attr('aria-valuenow', percent_cover).text(percentage_cover);
            //       }
            //     };

            //     return xhr;
            //   },

            //   success: function (data) {
            //     console.log(data);
            //     $alert_cover.show().addClass('alert-success').text('Upload success');
            //   },

            //   error: function (xhr, error) {
            //     console.debug(xhr); console.debug(error);
                
            //     $alert_cover.show().addClass('alert-warning').text('Upload error');
            //   },

            //   complete: function () {
            //     $progress_cover.hide();
            //   },
            // });
          });
        }
      });
    });    










  // cover gallery_image


    window.addEventListener('DOMContentLoaded', function () {
      var avatar_cover_gallery = document.getElementById('avatar_cover_gallery');
      var image = document.getElementById('image_cover_gallert');
      var image_count = document.getElementById('image_cover_gallert_count');
      var input_galary_image = document.getElementById('input_galary_image');
      var $progress = $('.progress');
      var $progressBar = $('.progress-bar');
      var $alert = $('.alert');
      var $modal = $('#modal_cover_gallery');
      var cropper;

      $('[data-toggle="tooltip"]').tooltip();

      input_galary_image.addEventListener('change', function (e) {
        var files = e.target.files;
        
var url_dsp = new Array();
        if (files && files.length > 0) {
        
         
        // console.log(done);
        
        var reader;
        var file;
        var url;
        var lenght_data=files.length;
        var image_array="";
        var j=0;
        var done = function(url_dsp,lenght_data,i) {
  
   console.log(j);
   console.log("dsp");
            //   const value = url_dsp.someProperty;
            // console.log(url_dsp.0);
            console.log(lenght_data);
          input_galary_image.value = '';
        //   image_count.value = lenght_data;
          $("#modal_cover_gallery #current_image_set").text('1');
          $("#modal_cover_gallery #all_image_set").text(lenght_data);
          $("#modal_cover_gallery #image_cover_gallert_count").val(lenght_data);
          $("#modal_cover_gallery #add_all_image").append('<input type="hidden" value="'+url_dsp+'" class="all_image_name">');
          if(j==0)
          {
           image.src = url_dsp;    
          }
          
          $alert.hide();
          $modal.modal('show');
          j=j+1;
        };
    
           for(var i=0; i<files.length; i++)
           {
               
               // console.log(files.length);
      
                // console.log(files[i]);
            file = files[i];
            //   console.log(file); 
           
          URL=""; 
        //   done(URL.createObjectURL(file));

          if (URL) {
              console.log("1");
          console.log(file);
          url_dsp.push(URL.createObjectURL(file));
            done(URL.createObjectURL(file),lenght_data);
          } else if (FileReader) {
              
             var num= "objeck_"+i.toString();
            //  console.log(num);
            num = new FileReader();
            num.onload = function (e) {
            //   console.log();
            //   console.log(e.currentTarget["result"]);
             done(e.currentTarget["result"],lenght_data);
              
            //   done(reader.result);
            };
            num.readAsDataURL(file);
          }
          
         
        //   reader="";
          
           }
        //   console.log(url_dsp);
           
        }
        
        
         
        
        
      });

      $modal.on('shown.bs.modal', function () {
        cropper = new Cropper(image, {
          dragMode: 'move',
        aspectRatio: 2 / 3,
        autoCropArea: 0.90,
        restore: false,
        guides: false,
        center: false,
        highlight: false,
        cropBoxMovable: false,
        cropBoxResizable: false,
        toggleDragModeOnDblclick: false,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });




document.getElementById('skip_this_image').addEventListener('click',function(){

$modal.modal('hide');
$(".modal-backdrop").removeClass("in");
var count_image=$("#image_cover_gallert_count").val();
            image_array="";
             image_array=[];
            $(".all_image_name").each(function(i){
                
                 image_array[i]=$(this).val();                
            });
            var courent_image=$("#current_image_set").text();
            
            if(parseInt(courent_image)!=parseInt(count_image))
               {
                  
                   console.log("check_current_image");
                   console.log(parseInt(courent_image));
                   $("#modal_cover_gallery #image_cover_gallert").attr('src',image_array[parseInt(courent_image)]);
                   $("#modal_cover_gallery #current_image_set").text(parseInt(courent_image)+1);
                   $("#modal_cover_gallery").modal('show');
               }
            if(parseInt(courent_image)==parseInt(count_image))
               {
                   $modal.modal('hide');
                   $(".modal-backdrop").removeClass("in");
               }
        

});


 document.getElementById('crope_this_image_agen').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');
        $(".modal-backdrop").removeClass("in");
        console.log();
        console.log(cropper.getContainerData().height);
        
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: parseInt(cropper.getContainerData().width),
            height: parseInt(cropper.getContainerData().height)
          });
          initialAvatarURL = avatar_cover_gallery.src;
          avatar_cover_gallery.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar_cover_gallery', blob);
            
            var count_image=$("#image_cover_gallert_count").val();
            image_array="";
             image_array=[];
            $(".all_image_name").each(function(i){
                
                 image_array[i]=$(this).val();                
            });
            var courent_image=$("#current_image_set").text();
            
             $("#modal_cover_gallery #image_cover_gallert").attr('src',canvas.toDataURL());
             $("#modal_cover_gallery #current_image_set").text(parseInt(courent_image));
              $("#modal_cover_gallery").modal('show');
        
            
            
          });
        }
      });






      document.getElementById('crop_cover_gallery').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');
        $(".modal-backdrop").removeClass("in");
        console.log();
        console.log(cropper.getContainerData().height);
        
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: parseInt(cropper.getContainerData().width),
            height: parseInt(cropper.getContainerData().height)
          });
          initialAvatarURL = avatar_cover_gallery.src;
          avatar_cover_gallery.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar_cover_gallery', blob);
            
            var count_image=$("#image_cover_gallert_count").val();
            image_array="";
             image_array=[];
            $(".all_image_name").each(function(i){
                
                 image_array[i]=$(this).val();                
            });
            var courent_image=$("#current_image_set").text();
            
            if(parseInt(courent_image)!=parseInt(count_image))
               {
                  
                   console.log("check_current_image");
                   console.log(parseInt(courent_image));
                   $("#modal_cover_gallery #image_cover_gallert").attr('src',image_array[parseInt(courent_image)]);
                   $("#modal_cover_gallery #current_image_set").text(parseInt(courent_image)+1);
                   $("#modal_cover_gallery").modal('show');
               }
            if(parseInt(courent_image)==parseInt(count_image))
               {
                   $modal.modal('hide');
                   $(".modal-backdrop").removeClass("in");
               }
        
            
            $.ajax(base_url+'user/sell_service/add_image_gallery/', {
              method: 'POST',
              data: {"blob":canvas.toDataURL(),"id":$("#get_user_id").val()},
              // processData: false,
              // contentType: false,

              xhr: function () {
                var xhr = new XMLHttpRequest();

                xhr.upload.onprogress = function (e) {
                  var percent = '0';
                  var percentage = '0%';

                  if (e.lengthComputable) {
                    percent = Math.round((e.loaded / e.total) * 100);
                    percentage = percent + '%';
                    $progressBar.width(percentage).attr('aria-valuenow', percent).text(percentage);
                  }
                };

                return xhr;
              },

              success: function (data) {
               console.log(image_array);
               console.log(count_image);
              
               
              
               
            //   console.log(files);
              $("#set_gallery_image").prepend(data);
                 $("#set_counting").html(parseInt($("#set_counting").text())+1);
                 if(parseInt($("#set_counting").text())==parseInt($("#upload_gallery_images_number").val()))
                 {
                  $("#set_notic_button").html('<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_alert_message_for_gallery_limit">Add Image</button>');
                 }
                 $("#get_last_image_id_for_remove").val(parseInt($("#set_counting").text())+1);
                 $("#remove_this_data").remove();
var ids= $("#get_last_image_id_for_remove").val();
   if(ids=="9")
   {
     $("#remove_id_"+ids).remove();
   }     

                 
                $alert.show().addClass('alert-success').text('Upload success');
              },

              error: function () {
                avatar.src = initialAvatarURL;
                $alert.show().addClass('alert-warning').text('Upload error');
              },

              complete: function () {
                $progress.hide();
              },
            });
          });
        }
      });


    });

