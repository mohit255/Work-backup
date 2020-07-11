// function max_lenght(e){
//     if($(e).val()==""){
//         $('#super_fast_delivery_date').val(1);
//     }else{
//       // 
//     if( parseInt($(e).val())< 1 || parseInt($(e).val())>=30){
//          $('.delivery_days_error').show();
//          $('.validdays').attr('disabled','disabled');

//          $(e).val('');
//         }else{
//             $('.delivery_days_error').hide();
//             $('.validdays').removeAttr('disabled');
            
//        }    
//     }
    
// }


function gig_title_check(e){
    
    var gig_title = $(e).val();
    $.post(base_url + 'user/dashboard/check_gig_title',{gig_title:gig_title},function(message){
            var data = JSON.parse(message);
           
            if(data.valid == false){
                $('.gig_title_valid').val(1); // Invalid 
                $("#gig_title").css("border","red 2px solid");
                $('.gig_title_already_error').show();
            }else{
                $('.gig_title_valid').val(0); // Valid 
                $('.gig_title_already_error').hide();
                $("#gig_title").css("border","");
            }
        }); 
}

function sell_services_add(){

    var error =0;
    var gig_title = $('#gig_title').val().trim();
    
    if(gig_title==""){
        $('.gig_title_error').show();
        $("#gig_title").css("border","red 2px solid");
         window.scrollTo(0, 0);
        error =1; 
    }else{
        $('.gig_title_error').hide();
        $("#gig_title").css("border","");
    }

      if($('.gig_title_valid').val()==1){
             error = 1;
              window.scrollTo(0, 0);
            $('.gig_title_already_error').show();
            $(".gig_title_valid").css("border","red 2px solid");
        }else{
                $('.gig_title_already_error').hide();
                $(".gig_title_valid").css("border","");
        }
  

     

    if($('#gig_price').val()==""){
        error = 1;
        $('.gig_price_error').show();
        $("#gig_price").css("border","red 2px solid");
        window.scrollTo(0, 0);
    }else{
        $('.gig_price_error').hide();
        $("#gig_price").css("border","");
    }
    console.log($('#delivering_time').val());
    if($('#delivering_time').val()==""){
        error = 1;
        window.scrollTo(0, 0);
        $('.main_delivery_days_error').show();
         $("#delivering_time").css("border","red 2px solid");
 
    }else{
        $('.main_delivery_days_error').hide();
        $("#delivering_time").css("border","");

    }
    // if($('#delivering_time').val()!=""){
    //     window.scrollTo(0, 0);
    //     if(parseInt($('#delivering_time').val())){
    //       error = 1;
    //      $('.delivery_days_error').show();
    //      $("#delivering_time").css("border","red 2px solid");
    //     }else{
    //         $('.delivery_days_error').hide();
    //         $("#delivering_time").css("border","");
    //    }
    // }

    if($('#gig_category_id').val()==""){
        error = 1;
        window.scrollTo(0, 0);
        $('.gig_category_id_error').show();
        $(".category-select").addClass('set_border_color');
    }else{
        $('.gig_category_id_error').hide();
        $(".category-select").removeClass('set_border_color');
    }
    
    var s_file = $("#image_array").val();// Add 
    var image_length = s_file.length;

    if (image_length == 0) {
        error = 1;
        $('.image_error_error').show();
        $("#upload_image_btn").css("border","red 2px solid");
        window.scrollTo(0, 200);
    }else{
        $('.image_error_error').hide();
        $("#upload_image_btn").css("border","");

    }
    var ckValue = CKEDITOR.instances['gig_details'].getData();
        if ($.trim(ckValue).length === 0) {
         error = 1;
        $('.gig_details_error').show();
          $("#cke_1_contents").css("border","red 2px solid");
           window.scrollTo(0, 200);

    }else{
        $('.gig_details_error').hide();
        $("#cke_1_contents").css("border","");
    }       

      $('.extra_money_price').each(function(){

            var no = $(this).attr('date-no');

            if(no!='#' && typeof no !== "undefined"){
                if($('#label_name_'+no).val() !="" || $('#label_val_'+no).val() !="" )  {
                   if($('#label_name_'+no).val() ==""){$('.extra_gigs_gig_name').show(); error = 1 ; $(this).css("border","red 2px solid");   window.scrollTo(0, 200); return false; }else{$('.extra_gigs_gig_name').hide(); $(this).css("border",""); } 
                   if($('#label_val_'+no).val() ==""){ $('.extra_gigs_validate').show(); error = 1 ; $(this).css("border","red 2px solid");    window.scrollTo(0, 200); return false; }else{ $('.extra_gigs_validate').hide(); $(this).css("border","");} 
                } 
            }
        });

      if($('input[name="work_option"]').is(':checked')==false){
        error = 1;
        $('.work_option_error').show();
        $('input[name="work_option"]').css("border","red 2px solid");
         window.scrollTo(0, 200);

      }else{
        $('.work_option_error').hide();
        $('input[name="work_option"]').css("border","");

      }

      if($('#super_fast_delivery').is(':checked')==true){
            if($('#super_fast_delivery_desc').val()==''){
                error = 1;
                $('.super_fast_error').show();
                $('#super_fast_delivery_desc').css("border","red 2px solid");
                 window.scrollTo(0, 200);
            }else{
                $('.super_fast_error').hide();
                 $('#super_fast_delivery_desc').css("border","");
            }

            if($('#super_fast_charges').val()==''){
                error = 1;
                $('.super_fast_priece_error').show();
                $('#super_fast_charges').css("border","red 2px solid");
                 window.scrollTo(0, 200);
            }else{
                $('.super_fast_priece_error').hide();
                 $('#super_fast_charges').css("border","");
            }

            // if($('#super_fast_delivery_date').val()>$('#main_delivery_days').val()){
            //     error = 1;
            //     $('.less_then_priece_error').show();
            // }else{
            //     $('.less_then_priece_error').hide();
            // }
      }
      
      if($('#terms_conditions').is(':checked')==false){
            error = 1;
            $('.terms_conditions_error').show();

             $('.set_class_dsp').addClass('set_border_color');
              window.scrollTo(0, 200);
      }else{
             $('.terms_conditions_error').hide();
              $('.set_class_dsp').removeClass('set_border_color');
      }
    if (error==0) {

         $('#sell_service').submit();

    } else {
        return false;
    }


}

function checkinput(e){
    
    var days = $(e).val();
    days = days.replace(/[^0-9]/g, '');
    $(e).val(days);    
}
