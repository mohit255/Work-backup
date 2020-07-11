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
$admin_data= $this->db->query("SELECT * FROM `administrators` WHERE `ADMINID` = '".$this->session->userdata['id']."'")->row_array();
// var_dump($admin_data);
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <base href="<?php echo base_url(); ?>">
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width,initial-scale=1">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="description" content="Sunrise Admin Panel">
      <meta name="keywords" content="Admin, Dashboard, Bootstrap3, Sass, transform, CSS3, HTML5, Web design, UI Design, Responsive Dashboard, Responsive Admin, Admin Theme, Best Admin UI, Bootstrap Theme, Themeforest, Bootstrap">
      <meta name="author" content="Bootstrap Gallery">
      <link rel="shortcut icon" href="<?php echo $fav ;?>">
      <title><?php echo $this->website_name.' Admin Panel'; ?></title>
      <link href="assets/escort/admin/assets/css/bootstrap.min.css" rel="stylesheet" media="screen">
      <link href="assets/escort/admin/assets/css/animate.css" rel="stylesheet" media="screen">
      <link href="assets/escort/admin/assets/css/main.css" rel="stylesheet" media="screen">
      <link href="assets/escort/admin/assets/fonts/icomoon/icomoon.css" rel="stylesheet">
      <link rel="stylesheet" href="assets/escort/admin/assets/css/circliful/circliful.css">
      <link rel="stylesheet" href="assets/escort/admin/assets/css/flags/flag-icon-custom.css">

      <link href="assets/escort/admin/assets/fonts/font-awesome.min.css" rel="stylesheet">
      
      <link rel="stylesheet" href="assets/escort/admin/assets/css/datatables/dataTables.bs.min.css">
      <link rel="stylesheet" href="assets/escort/admin/assets/escort/admin/assets/css/datatables/autoFill.bs.min.css">
      <link rel="stylesheet" href="assets/escort/admin/assets/css/datatables/fixedHeader.bs.css">
      <!-- <link href="assets/css/wysiwyg-editor/editor.css" rel="stylesheet" /> -->
      <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet" />
      <link href="assets/escort/admin/assets/css/dsp/cropper.css" rel="stylesheet" />
      <link href="assets/escort/admin/assets/css/dsp/custom.css" rel="stylesheet" />
      
   </head>
   <body class="purple">
      <div class="sunrise-loading"></div>
<!-- sidebar start   -->

<div class="vertical-nav">
         <button class="collapse-menu"><i class="icon-dehaze"></i></button>
         <div class="logo"><a href="index.php"><!-- <img src="assets/img/logo.png" alt="Sunrise"> --><h3 style="color:#fff;">Escortoz</h3></a></div>
         <div class="user-info">
            <div class="user-img">

                <img src="<?php

                      if (!empty($admin_data['profile_thumb'])) {

                        echo base_url($admin_data['profile_thumb']);

                      } else {

                        echo base_url('assets/uploads/default/avatar-2.jpg');

                      }

                      ?>" width="100" height="100" class="profile-img" /><!--  <span class="likes-info">26</span> --></div>
            <h5 class="user-name-o">
                <?php if(@$admin_data["name"]) { echo @$admin_data["name"];  } else { echo "Admin"; } ?>

            </h5>
           <!--  <p class="profile-complete">Profile Complete - 78%</p> -->
         </div>
         <ul class="menu clearfix">
            <!-- <li class="dsp_set_class active selected">
               <a href="index.php"><i class="icon-graphic_eq"></i> <span class="menu-item">Dashboards</span></a>
            </li> -->
<?php 
$active =$this->uri->segment(2);
$active_2 = @$this->uri->segment(3);
 ?>            
            <li class="dsp_set_class <?php echo (empty ($active))? 'active selectede':''; ?>">
               <a href="admin"><i class="icon-graphic_eq"></i> <span class="menu-item">Dashboards</span></a>
            </li>
            <li class="<?php echo ($active_2 =='user')? 'active selectede':''; ?>"><a href="#"><i class="fa fa-female" <?php if($module == 'Footer'){?> style="display:block" <?php } ?>></i> <span class="menu-item">Footer</span> <span class="down-arrow"></span></a>


   <ul class="collapse <?php echo ($active_2 =='Footer')? 'in':''; ?>" aria-expanded="false" >
   <li><a href="<?php echo 'admin/footer_submenu'; ?>" class="<?php echo ($active_2 =='footer_submenu' && $active_3 =='index')? 'current':''; ?>">Footer Menu</a></li>
</ul>
</li>
            <!-- <li><a href="customers.php" class="dsp_set_class"><i class="fa fa-group"></i> <span class="menu-item">Manage Customers</span></a></li> -->
            <li><a href="admin/membership" class="dsp_set_class"><i class="fa fa-money"></i> <span class="menu-item">Membership</span></a></li>
<li><a href="admin/manage-banner" class="dsp_set_class"><i class="fa fa-caret-square-o-left"></i> <span class="menu-item">Manage Banners</span></a></li> 
<li><a href="admin/manage-city" class="dsp_set_class"><i class="fa fa-caret-square-o-left"></i> <span class="menu-item">Manage Cities</span></a></li>  

<li><a href="admin/enquiry" class="dsp_set_class"><i class="fa fa-caret-square-o-left"></i> <span class="menu-item">Manage Enquiry</span></a></li>  
 
            <?php $active_2 = $this->uri->segment(3);  ?>

<li class="<?php echo ($active_2 =='user')? 'active selectede':''; ?>"><a href="#"><i class="fa fa-female" <?php if($module == 'paypal_settings'){?> style="display:block" <?php } ?>></i> <span class="menu-item">Manage Escorts</span> <span class="down-arrow"></span></a><ul class="collapse <?php echo ($active_2 =='user')? 'in':''; ?>" aria-expanded="false" >
   <li><a href="admin/user/index" class="<?php echo ($active_2 =='user' && $active_3 =='index')? 'current':''; ?>">All User</a></li>
   <li><a href="<?php echo 'admin/user/Escort'; ?>" class="<?php echo ($active_2 =='user' && $active_3 =='Escort')? 'current':''; ?>">Escort</a></li>
   <li><a h href="<?php echo 'admin/user/Agency'; ?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Agency</a></li>
   <li><a h href="<?php echo 'admin/user/Establishment'; ?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Establishment')? 'current':''; ?>"">Establishment</a></li>

</ul>
</li>
<li><a href="admin/review" class="dsp_set_class"><i class="fa fa-caret-square-o-left"></i> <span class="menu-item">Manage Reviews</span></a></li>
            <!-- <li><a href="admin/orders" class="dsp_set_class"><i class="fa fa-money"></i> <span class="menu-item">Payment</span></a></li> -->

            <li><a href="admin/orders" class="dsp_set_class"><i class="fa fa-money"></i> <span class="menu-item">Orders</span></a></li>

<li><a href="admin/reports" class="dsp_set_class"><i class="fa fa-caret-square-o-left"></i> <span class="menu-item">Report</span></a></li>  
<!--       
            <li><a href="escorts/" class="dsp_set_class"><i class="fa fa-female"></i> <span class="menu-item">Manage Escorts</span></a></li> -->

<!-- 
<li class="<?php echo ($active_2 =='user')? 'active selectede':''; ?>"><a href="#"><i class="fa fa-female" <?php if($module == 'paypal_settings'){?> style="display:block" <?php } ?>></i> <span class="menu-item">FAQ's</span> <span class="down-arrow"></span></a>


   <ul class="collapse <?php echo ($active_2 =='user')? 'in':''; ?>" aria-expanded="false" >
   <li><a href="<?php echo 'FAQ/category'; ?>" class="<?php echo ($active_2 =='user' && $active_3 =='index')? 'current':''; ?>">Category</a></li>
 
   <li><a h href="<?php echo 'FAQ/content';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Content</a></li>
  

</ul>
</li> -->
<?php $active_1 = $this->uri->segment(3);  ?>

<li class="<?php echo ($active_2 =='user')? 'active selectede':''; ?>"><a href="#"><i class="fa fa-female" <?php if($module == 'paypal_settings'){?> style="display:block" <?php } ?>></i> <span class="menu-item">Settings</span> <span class="down-arrow"></span></a>


   <ul class="collapse <?php echo ($active_2 =='user')? 'in':''; ?>" aria-expanded="false" >
   <li><a href="<?php echo 'admin/settings'; ?>" class="<?php echo ($active_2 =='user' && $active_3 =='index')? 'current':''; ?>">General Settings</a></li>
 
   <li><a h href="<?php echo 'admin/emailsettings';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Email Settings</a></li>
  
<!-- 
     <li><a h href="<?php echo 'admin/settings/smtp_config';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Smtp Config</a></li> -->

     <!--  <li><a h href="<?php echo 'admin/policy_settings';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Policy Settings</a></li>

    <li><a h href="<?php echo 'admin/profession';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Profession</a></li>
 -->
    <!-- <li><a h href="<?php echo 'admin/new_updates';?>" class="class="<?php echo ($active_2 =='user' && $active_3 =='Agency')? 'current':''; ?>"">Updates</a></li> -->
</ul>
</li>







  
   




         </ul>
      </div>
<!-- sidebar end   -->
     