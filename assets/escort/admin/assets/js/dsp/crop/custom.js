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
          // aspectRatio: 1,
          // viewMode: 3,
        });
      }).on('hidden.bs.modal', function () {
        cropper.destroy();
        cropper = null;
      });

      document.getElementById('crop').addEventListener('click', function () {
        var initialAvatarURL;
        var canvas;

        $modal.modal('hide');
console.log(cropper);
        if (cropper) {
          canvas = cropper.getCroppedCanvas({
            width: 160,
            height: 160,
          });
          initialAvatarURL = avatar.src;
          avatar.src = canvas.toDataURL();
          $progress.show();
          $alert.removeClass('alert-success alert-warning');
          canvas.toBlob(function (blob) {
            var formData = new FormData();

            formData.append('avatar', blob);
            $.ajax('escorts/add_image/', {
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
            width: 160,
            height: 160,
          });
          // initialAvatarURL_cover = avatar_cover.src;
          // avatar_cover.src = canvas_cover.toDataURL();
          // avatar_cover.css("dispaly","block");

          $("#avatar_cover").html('<div style="background: url('+canvas_cover.toDataURL()+') bottom center; height: 350px; background-repeat:no-repeat; background-size: cover; background-attachment:fixed; position: relative; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px"></div>');
          $progress_cover.show();
          $alert_cover.removeClass('alert-success alert-warning');
          canvas_cover.toBlob(function(blob) {
            var formData = new FormData();

            formData.append('avatar_cover', blob);
            
                 $.ajax({
                     method:"POST",
                     url:"escorts/add_image/",
                     data:{"blob":canvas_cover.toDataURL()},
                     dataType:"html",
                     success:function(data)
                     {
                      console.log(data);
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