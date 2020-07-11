<!DOCTYPE html>
<html  >

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head id="head">

<?php 
  

  $base_url = base_url();

   $fav = base_url().'assets/images/favicon.png';
  $query=$this->db->query("select * from system_settings WHERE status = 1");
  $result=$query->result_array();
   $meta_title = $meta_keywords = $meta_description = '';
   $website_email ='admin@dreamguys.co.in';
     $this->site_name='';
  if(!empty($result))
  {
    $sitename=$meta_keywords=$meta_description='';
  foreach($result as $data){
    if($data['key'] == 'meta_title'){
         $meta_title = $data['value'];
  }
      if($data['key'] == 'meta_keywords'){
       $meta_keywords = $data['value'];
    
  }
    if($data['key'] == 'site_name' ||  $data['key'] == 'website_name'){
        $this->site_name = $data['value'];
        }
      if($data['key'] == 'meta_description'){
       $meta_description = $data['value'];
  }
  if($data['key'] == 'favicon'){
       $favicon = $data['value'];
  }
  if($data['key'] == 'website_email'){
    $website_email = $data['value'];
  }
  }
  }
  if(!empty($favicon))
  {
    $fav = base_url().'uploads/logo/'.$favicon;
  }
  ?>

  <base href="<?php echo base_url(); ?>">
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no">
    <meta name="theme-color" contant="#4f93ba" />
    <meta name="theme-color" content="#4f93ba">
     <meta name="description" content="<?php echo $meta_description;?>">
  <meta name="keywords" content="<?php echo $meta_keywords ;?>">
  <link rel="shortcut icon" href="<?php echo $fav;  ?>">
<!-- Windows Phone -->
<title><?php echo  $page_title; ?></title>
<meta name="msapplication-navbutton-color" content="#4f93ba">

<meta name="apple-mobile-web-app-status-bar-style" content="#4f93ba">
<link rel="stylesheet" href="assets/escort/dist/css/maina049.css?v=1522125076">
<!-- <link rel="stylesheet" href="dist/css/scarletblue.css"> -->
<link rel="stylesheet" href="assets/escort/dist/main.css">
 <link rel="stylesheet" href="assets/escort/assets/css/swiper.min.css">
 <link rel="stylesheet" href="assets/escort/assets/css/style.css">
  <link href="assets/escort/fncy/jquery.fancybox.min.css" rel="stylesheet">
 <!-- <link rel="stylesheet" href="assets/escort/assets/css/lightbox.min.css"> -->
 <link rel="stylesheet" href="assets/css/font-awesome.min.css">

   <link rel="stylesheet" href="assets/escort/assets/css/bootstrap.min.css">
   <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

   <link href="https://fonts.googleapis.com/css?family=Cinzel+Decorative" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="assets/css/jquery-ui.css">
   <link href="assets/css/select2.min.css" media="screen" rel="stylesheet" type="text/css" />
   <link href="assets/css/jquery.dataTables.min.css" media="screen" rel="stylesheet" type="text/css" />
   <link rel="stylesheet" type="text/css" href="assets/css/select2-bootstrap.css">
   <link href="assets/css/bootstrap4-toggle.min.css" rel="stylesheet">
   
   <?php 
// var_dump(@$module);
   if($module=="sell_service") { ?>
<link href="assets/escort/crop/cropper.css" rel="stylesheet">
   <?php } else { ?>
<link href="assets/escort/assets/crop/croppie.css" rel="stylesheet">
   <?php  } ?>
   
<!--  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> -->
<style>
  body{
    overflow-x: hidden;
  }

.set_css_for_social_icon{
  color:#aea4a4;
}
 .select2-offscreen {position: fixed !important;}
  .selection{width:100% !important;}
  .select2-selection--single{width:100% !important;}

.modal-header h4, .modal-header  label, .modal-header  p{
  color:#fff;
}

.page--login a {
    color: #fff;
    font-weight: bold;
    text-decoration: none;
     position: relative; 
    /* left:0px !important; */
}

.account-error{
  background-color: #ffd8d9;
    color: #f91a24;
    padding: 5px 15px;
    text-align: center;
    border-radius: 4px;
    margin-bottom: 15px;
}
.show_filder_row{
  display: block;
}
.hide_filder_row_dsp{
  display: none !important;
}
    .navbar{
    position: relative;
    min-height: 50px;
     margin-bottom: 0px; 
    border: 1px solid transparent;
    border-radius: 0;
}
.btn-default{
    background-color:#666;
}
.directory-search-submit{
   background:linear-gradient(to right,#bf41a3,#4f93ba) !important;
   border: 1px solid;
  border-image: linear-gradient(to right,#bf41a3,#4f93ba);
}
}
 .loder {
   width: 100%;
    z-index: 9999;
    position: fixed;
    left: 0px;
    height: 100%;
    top: 0px;
    background: url(https://media.giphy.com/media/LukAHGCMfxMbK/giphy.gif) 50% 50% no-repeat rgb(249,249,249);
		   }
       .category-group-container {
    -webkit-column-count: 5 !important;
     column-count: 5 !important; 
}
.category-group-container {
    -webkit-column-count: 10;
    -webkit-column-width: 200px;
    columns: 200px 10;
}
.category-group-container {
    -webkit-column-count: 10;
    -webkit-column-width: 130px;
    columns: 130px 10;
    width: auto!important;
    max-width: none!important;
    float: none;
        list-style: none;
}
.category-group h3 {
    font-size: 22px;
}
.category-group-container h3 {
    border-bottom: 1px solid #fbe4b6;
}
.category-group-container h3 {
    border-bottom: 1px solid;
    border-color: #907120;
    margin-bottom: 5px;
    padding-bottom: 5px;
    color: #fff;
}
.category-list .category-group-container .category-group li {
    position: relative;
}
.category {
    font-size: 16px;
    line-height: 200%;
    color: #fff;
    position: relative;
   /* padding: 8px 0px;*/
    display: inline-block;
    width: 80%;
}
.dataTables_length select {
    color: #000;
}
#DataTables_Table_0_wrapper label {
    color: #fff;
}
#DataTables_Table_0_paginate a.paginate_button.current {
    color: #000 !important;
}
div#DataTables_Table_0_info {
    color: #fff;
}
#DataTables_Table_0_paginate a {
    color: #fff !important;
}
.category-group-container li {
    list-style-type: none;
}
<style type="text/css">
div {
  position: relative;
  overflow: hidden;
}
.inputnew {
  position: absolute;
    font-size: 50px;
    opacity: 0;
    right: 0;
    font-size: 0 !important;
    z-index: 9;
    top: 0;
    padding: 47px 0px 0px 0px !important;
    cursor: pointer;
}

</style>
</style>
</head>
<body class="LTR Mozilla ENAU ContentBody site-home-page DefaultDevice">
<div class="loder"></div>
  <div id="locloader" class="loader-wrap" style="display: none;">

            <div class="loader">

                Loading...

            </div>

        </div>
  <?php  
  $page_name=@$this->uri->segment(2);
  ?>
  <input type="hidden" id="selected_menu" name="selected_menu" value="<?php echo @$page_name; ?>">
  <?php
  // var_dump($this->session->userdata('SESSION_USER_ID'));
    if($this->session->userdata('SESSION_USER_ID'))
    { 
      $user_id = $this->session->userdata('SESSION_USER_ID');              
    $query = $this->db->query("SELECT `username` , user_thumb_image , fullname, types FROM `user_login` WHERE `USERID` = $user_id ");
    $result = $query->row_array();
    $header_username = $result['username'];                        
    $header_user_image = base_url()."assets/images/avatar2.jpg";   
    if($result['user_thumb_image']!='')
    {
      $header_user_image = base_url().$result['user_thumb_image'];   
    }
    $header_user_fullname = $result['fullname'];                        
    ?>
    <input type="hidden" name="session_user_id" id="session_user_id" value="<?php echo $user_id; ?>" >
    <?php 
    }


    // var_dump($result["are_you"]);
    ?>
  
<!-- <div class="main-site-menu visible-desktop">
  <ul> 
    <li>
      <a href="index.html"><i class="icon-home"></i></a>
    </li>
    <li>
      <a href="Blog/index.html">Blog</a>
    </li>
    <li>
      <a href="Login/index.html">Login</a>
    </li>
    <li class="promoted">
      <a href="Advertise/index.html">Advertise on EB</a>
    </li>
    <li class="link-browse">
      <a href="#browse" data-toggle="button collapse" data-target="browse-locations-menu">Popular Locations</a>
    </li>  
  </ul>  
</div> -->
<nav class="navbar navbar-inverse">
  <div class="">
  <div class="container-fluid">
    <div class="col-md-3">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
     <a class="navbar-brand" href="<?php echo base_url(); ?>"><img src="<?php 

                     if(!empty($logo['value']))  echo base_url().$logo['value']; else { echo base_url()."assets/images/logo.png";   }?>" style=""></a>
    </div>
   </div>
   <div class="col-md-4 header-text">
    <h1>Australia's Leading Escort Directory</h1>
   </div>
   <div class="col-md-5 mymenu">
    <div class="collapse navbar-collapse" id="myNavbar">
      <!-- <ul class="nav navbar-nav"> -->
        <div class="main-site-menu visible-desktop">
  <ul class="nav navbar-nav pc-menu"> 
 <?php if(($this->session->userdata('SESSION_USER_ID')))
        { ?>
<li>
      <a href="<?php echo base_url(); ?>logout">Logout</a>
    </li>
    <li class="promoted">
      <a href="<?php echo base_url(); ?>user-profile/<?php echo $result['username']; ?>"><?php if(strlen($result['fullname'])>8)
                        {
                          echo substr($result['fullname'], 0,8)."...";
                        }
                        else
                        {
                           echo $result['fullname'];
                        }
      ; ?></a>
    </li>
    <!-- <li class="promoted">
      <a href="<?php echo base_url(); ?>user-profile/<?php echo $result['username']; ?>"><?php echo $result['types'] ; ?></a>
    </li> -->
        <?php } else { ?>

<li>
      <a href="<?php echo base_url(); ?>login">Login</a>
    </li>
    <li class="promoted">
      <a href="<?php echo base_url(); ?>signup">Create Escort Profile</a>
    </li>

        <?php }  ?>

    
    <li class="link-browse">
      <a href="" data-toggle="modal" data-target="#myModal">Locations</a>
    </li>  
  </ul>
</div>
    </div>

  </div>
  </div>
  <div class="row text-right" style="width: 100%">
    <div class="col-md-6 col-md-offset-6 text-right">
  <ul class="social-header">
<?php 
 $admin_social_icon_facebook=$this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'facebook'")->row_array();
 $admin_social_icon_twitterk=$this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'twitter'")->row_array();
 $admin_social_icon_google_plus=$this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'google_plus'")->row_array();
 $admin_social_icon_linkedIn=$this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'linkedIn'")->row_array();
if($admin_social_icon_facebook["value"])
{

  
  $set_color_facebook='';
  $link_facebook=$admin_social_icon_facebook["value"];
}
else
{
   $link_facebook='#';
  $set_color_facebook='color:#726e6e';
}


if($admin_social_icon_linkedIn["value"])
{

  
  $set_colo_linkedInr='';
  $link_linkedIn=$admin_social_icon_linkedIn["value"];
}
else
{
   $link_linkedIn='#';
  $set_colo_linkedInr='color:#726e6e';
}


if($admin_social_icon_google_plus["value"])
{

  
  $set_colo_google_plus='';
  $link_google_plus=$admin_social_icon_google_plus["value"];
}
else
{
   $link_google_plus='#';
  $set_colo_google_plus='color:#726e6e';
}


if($admin_social_icon_twitterk["value"])
{

  
  $set_colo_twitterk='';
  $link_twitterk=$admin_social_icon_twitterk["value"];
}
else
{
   $link_twitterk='#';
  $set_colo_twitterk='color:#726e6e';
}

?>

     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_facebook; ?>" style="<?php echo @$set_color_facebook; ?>"><i class="fa fa-facebook"></i></a></li>
     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_twitterk; ?>" style="<?php echo @$set_colo_twitterk; ?>"> <i class="fa fa-twitter"></i></a></li>
      <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_google_plus; ?>" style="<?php echo @$set_colo_google_plus; ?>"><i class="fa fa-instagram"></i></a></li>
    <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_linkedIn; ?>" style="<?php echo @$set_colo_linkedInr; ?>"> <i class="fa fa-pinterest"></i></a></li>
   </ul>  
 </div>
</div>
</div>
</nav>    
  