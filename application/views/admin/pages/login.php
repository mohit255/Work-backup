<?php

  $query = $this->db->query("select * from system_settings WHERE status = 1");

  $result = $query->result_array();

  $this->website_name = '';

   $fav=base_url().'assets/images/favicon.png';

  if(!empty($result))

  {

  foreach($result as $data){

  if($data['key'] == 'website_name'){

  $this->website_name = $data['value'];

  }

    if($data['key'] == 'favicon'){

       $favicon = $data['value'];

  }

  }

  }

  if(!empty($favicon))

  {

  $fav = base_url().'uploads/logo/'.$favicon;

  }

?>
<!DOCTYPE html>
<html lang="en">

   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Sunrise Admin Panel">
      <meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Themeforest, Bootstrap">
      <meta name="author" content="Bootstrap Gallery">
      <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.ico">
      <title><?php echo $this->website_name.' Admin Panel'; ?></title>
      <link href="<?php echo base_url(); ?>assets/escort/admin/assets/css/login.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url(); ?>assets/escort/admin/assets/css/animate.css" rel="stylesheet" media="screen">
      <link href="<?php echo base_url(); ?>assets/escort/admin/assets/fonts/icomoon/icomoon.css" rel="stylesheet">
      <style type="text/css">
        span#login_error_msg {
    text-align: center;
    display: block;
    color: #ff0000;
}

.set_css_for_alert{
      text-align: center;
    border-radius: 8px;
    border-color: red;
    background-color: #c35b5b;
    height: 33px;
}
      </style>
   </head>
   <body>

         <div id="box" class="animated bounceIn">
                        <div id="top_header">
                          <?php if($this->session->userdata('message')) {  ?>
                          <div class="row">
                            <div class="col-md-12 set_css_for_alert">
                              <h4 style="padding-top: 5px;"><?php echo @$this->session->userdata('message'); ?></h4>
                            </div>
                          </div>
                        <?php } ?>
               <h3>EscortOZ</h3>
               <h5>Sign in to continue to your<br>Admin Account.</h5>
              
            </div>
            <div id="inputs">
              
               <div class="form-control"> <input type="text" placeholder="username" class="form-control" name="username" required="" id="username"> <i class="icon-email"></i></div>
               <div class="form-control"><input type="password" id="password" placeholder="Password" required=""> <i class="icon-lock2"></i></div>
               
              <input type="submit" class="btn btn-primary" id="get_admin_data" value="Sign In">
            </div>
             <div class="row">
               <div class="col-md-12">
                 <span id="login_error_msg" class="alert-danger"></span>
               </div>
             </div>

            
            <div id="bottom">
               <!-- <div class="squared-check">
                  <input type="checkbox" value="None" id="remember" name="check" checked=""><label for="remember"></label>
                  <div class="cb-label">Remember</div>
               </div> -->
               <!-- <a class="right_a" href="forgot-pwd.html">Forgot password?</a> -->
            </div>
         </div>

        <script src="<?php echo base_url(); ?>assets/escort/admin/assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/escort/admin/assets/js/bootstrap.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/escort/admin/assets/js/bootstrapValidator.min.js"></script>
        <script>
   var BASE_URL = "<?php echo base_url(); ?>";


         $(document).ready(function(){


$("body").keyup(function(event){

 if(event.keyCode === 13)
 {
      var username=$("#username").val();
            var password=$("#password").val();
           console.log(username);
           console.log(password);
              if(username=='' || password=='')
              {
                 $("#login_error_msg").html('enter fields.');
              }
              else
              {
                $("#login_error_msg").html('');
                 $.ajax({
                    method:"POST",
                    url:BASE_URL+'admin/dashboard/is_valid_login',
                    data:{"username":username,"password":password},
                    dataType:"html",
                    success:function(response)
                    {
                  console.log(response);
                       if(response==1)
                         {
                             window.location = BASE_URL+'admin';
                         }
                         else if (response==2)
                         {
                                

                                location.reload();
                         }
                    }
                 });
              }
 }

});

          $("#get_admin_data").click(function(){
            var username=$("#username").val();
            var password=$("#password").val();
           console.log(username);
           console.log(password);
              if(username=='' || password=='')
              {
                 $("#login_error_msg").html('enter fields.');
              }
              else
              {
                $("#login_error_msg").html('');
                 $.ajax({
                    method:"POST",
                    url:BASE_URL+'admin/dashboard/is_valid_login',
                    data:{"username":username,"password":password},
                    dataType:"html",
                    success:function(response)
                    {
                  console.log(response);
                       if(response==1)
                         {
                             window.location = BASE_URL+'admin';
                         }
                         else if (response==2)
                         {
                                

                                location.reload();
                         }
                    }
                 });
              }

          });
         
         });

        </script>
	</body>
</html>