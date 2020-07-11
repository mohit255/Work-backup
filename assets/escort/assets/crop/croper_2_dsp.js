
$(document).ready(function(){


  $image_demo_edit_more = $('#image_demo_edit_more').croppie({

    enableExif: true,

    viewport: {

      width:490,

      height:532,

      type:'square' //circle

    },

    boundary:{

      width:600,

      height:600

    }

  });


  $('#upload_file_image_thum_edit_morethen_one').on('change', function(){

 reader = new FileReader();
 
    reader.onload = function (event) {
 
      $image_demo_edit_more.croppie('bind', {

        url: event.target.result

      }).then(function(){

        console.log('jQuery bind complete');

      });

    }

   reader.readAsDataURL(this.files[0]);

    $('#uploadimageModal_edit_more').modal('show');
 

   

  });



  $('.crop_image_edit_more').click(function(event){

$('.crop_image_edit_more').html('Image Uploading');
    $image_demo_edit_more.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function(response){

      $.ajax({

        url:"image_upload_more.php",

        type: "POST",

        data:{"image": response},

        success:function(data)

        {
$('.crop_image_edit_more').html('Crop Image');
          $('#uploadimageModal_edit_more').modal('hide');

          $('#image_preview1').append(data);

          console.log(data);

        }

      });

    })

  });



});