 $(document).ready(function(){


  $image_crop = $('#image_demo_edit').croppie({

    enableExif: true,

    viewport: {

      width:179,

      height:269,

      type:'square' 

    },

    boundary:{

      width:400,

      height:400

    }

  });


  $('#upload_file_image_thum').on('change', function(){

    var reader = new FileReader();

    reader.onload = function (event) {


      $image_crop.croppie('bind', {

        url: event.target.result

      }).then(function(){

        console.log('jQuery bind complete');

      });

    }



    reader.readAsDataURL(this.files[0]);

    $('#uploadimageModal_edit').modal('show');

  });



  $('.crop_image_edit').click(function(event){

$('.crop_image_edit').html('Image Uploading');
    $image_crop.croppie('result', {

      type: 'canvas',

      size: 'viewport'

    }).then(function(response){

      $.ajax({

        url:base_url+ "user/dashboard/image_upload",

        type: "POST",

        data:{"image": response},

        success:function(data)

        {
$('.crop_image_edit').html('Crop Image');
          $('#uploadimageModal_edit').modal('hide');

          $('#image_preview').empty();
          $('#image_preview').html(data);

          console.log(data);

        }

      });

    })

  });



});