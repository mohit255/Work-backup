<div class="modal fade" id="myModal" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" style="opacity: 1;" data-dismiss="modal">&times;</button>
            <div class="megalist-menu__header">
               <h2 class="megalist-title">
                  Popular Locations for Escorts
               </h2>
               <p>Click on a location to start browsing all Escorts in your area!</p>
            </div>
         </div>
         <div class="modal-body">
               <div class="category-group-list">
<ol class="category-group-container">
                   <?php 
                  $all_state=$this->db->query("SELECT state FROM `location` WHERE country='Australia' GROUP BY state ASC")->result_array(); ?>       
               
               <?php if($all_state) { foreach ($all_state as $states_set) { ?>
                  <li class="category-group">
                     <h3 id="category-page-page-digit" class="scrollspy">
                        <?php echo @$states_set["state"]; ?>
                        <span><a href="#category-list-page-header"></a></span>
                     </h3>
                     <ol>
   <?php

    date_default_timezone_set("Asia/Kolkata");

    $get_cityes=$this->db->query("select city from location where state='".@$states_set["state"]."' and status='0' ORDER BY city ASC")->result_array();
    
                  if($get_cityes)
                  {
                    foreach($get_cityes as $city)
                    { 
                  
                  $escort_in_city_1=$this->db->query("SELECT count(a.escort_id) as ecort_in_city FROM escort_info as a,user_login as b where b.USERID=a.escort_id and b.status='0' and b.package_status='1' and a.main_location='".$city["city"]."'")->row_array();
                     // var_dump($this->db->last_query());
                  $escort_in_city_2=$this->db->query("select count(a.id) as ecort_in_city from escort_tour as a,user_login as b where b.USERID=a.escort_id and b.status='0' and b.package_status='1' and  a.ture_status='Running' and a.place='".$city["city"]."' and a.from_date_in_string<=".strtotime(date("d-M-Y"))." and a.to_date_in_string>=".strtotime(date("d-M-Y"))."")->row_array();
                  
                  // var_dump($this->db->last_query());
                  $total_eacort=$escort_in_city_1["ecort_in_city"]+$escort_in_city_2["ecort_in_city"];
                     ?>                       
                        <li>
                           <a href="search/index/0/<?php echo implode("__", explode("/",implode("_", explode(" ", @$city["city"])))) ; ?>/all/all/all/all/all/all/all/all/all/all/all/all/all/all" class="category"><?php echo $city["city"]; ?></a>
                           <span style="color: #fff;">(<?php echo $total_eacort; ?>)</span>
                        </li>

                     <?php } } ?>   
                       
                       
                     </ol>
                  </li>
               <?php } } ?>

                  
               </ol>
            </div>
   </div>
   <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
</div>
</div>
</div>
<div class="modal fade report-modal" id="contactForm" tabindex="-1" role="dialog" aria-labelledby="contactFormLabel" aria-hidden="true" style="display: none;">
   <div class="modal-dialog modal-md">
      <form method="POST" action="" accept-charset="UTF-8">
         <div class="modal-content">
            <div class="modal-header">
               <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
               <h4 class="modal-title">Send Enquiry</h4>
            </div>
            <div class="modal-body">
               <!-- Name Form Input -->
               <div class="container">
                  <p>All fields marked with <span style="color:red;">*</span> are required</p>
                  <div class="row">
                     <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <label for="name">Your Name: <span style="color:red;">*</span></label>
                           <input class="form-control" name="name" type="text">
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <div class="row">
                           <div class="col-lg-12 col-md-12">
                              <!-- Email Form Input -->
                              <div class="form-group container">
                                 <label for="email">Your Email Address: <span style="color:red;">*</span></label>
                                 <input class="form-control" name="email" type="email">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12">
                              <div class="form-group container">
                                 <label for="email_confirmation">Confirm Your Email Address: <span style="color:red;">*</span></label>
                                 <input class="form-control" name="email_confirmation" type="email">
                              </div>
                           </div>
                           <div class="col-lg-12 col-md-12" style="margin-bottom: 10px;margin-top: -13px;">
                              (ensure email address is spelled correctly)
                           </div>
                        </div>
                     </div>
                     <div class="col-lg-12 col-md-12">
                        <div class="form-group">
                           <label for="phone">Your Phone Number:<span style="color:red;">*</span></label>
                           <input class="form-control" name="phone" type="email">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-6 col-md-6">
                        <div class="form-group">
                           <label for="location">Your location: <span style="color:red;">*</span></label>
                           <input class="form-control" name="location" type="text">
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <label for="contacttext">Your Message: <span style="color:red;">*</span></label>
                           <textarea class="form-control" name="message" id="contacttext" cols="30" rows="10"></textarea>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                        <div class="form-group">
                           <div class="checkbox">
                              <label>
                              <input name="remember_details" type="checkbox">
                              Remember name and email address for future enquiries?
                              </label>
                           </div>
                           <div class="checkbox">
                              <label>
                              <input name="send_copy" type="checkbox">
                              Do you wish to receive a copy of this email?
                              </label>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-lg-12">
                     </div>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <div class="col-md-6"><button type="button" class="btn btn-red" data-dismiss="modal" style="width: 50%">Cancel</button></div>
               <div class="col-md-6">  <button type="submit" class="btn btn-blue" style="width: 50%">Send Enquiry</button></div>
            </div>
         </div>
         <!-- /.modal-content -->
      </form>
   </div>
   <!-- /.modal-dialog -->
</div>
<footer>
   <div class="pitchblack">
      <div class="container">
         <div class="row">
            <div class="col-md-3  special-col">
               <div class="social-icons-footer">
                  <h4 class="text-center">FOLLOW ESCORTOZ<span class="blue-dot">.</span></h4>
                 
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
                  <ul>
                     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_facebook; ?>" style="<?php echo @$set_color_facebook; ?>"><i class="fa fa-facebook"></i></a></li>
                     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_twitterk; ?>" style="<?php echo @$set_colo_twitterk; ?>"> <i class="fa fa-twitter"></i></a></li>
                     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_google_plus; ?>" style="<?php echo @$set_colo_google_plus; ?>"><i class="fa fa-instagram"></i></a></li>
                     <li><a rel="noopener noreferrer" target="_blank" href="<?php echo  @$link_linkedIn; ?>" style="<?php echo @$set_colo_linkedInr; ?>"> <i class="fa fa-pinterest"></i></a></li>
                  </ul>
               </div>
            </div>
            <div class="col-md-9">
               <div class="policy">
                  <ul class="list-inline list-footer">
                     <?php foreach($footer_sub_menu as $sub_menu) {       ?>
                     <li><a href="<?php echo 'pages/'.$sub_menu['footer_submenu']; ?>"><?php echo str_replace('_',' ',$sub_menu['footer_submenu']); ?></a></li>
                     <?php } ?>                  
                     <!-- <li><a href="">Refund Policy</a></li> -->
                     <li><a href="<?php echo base_url().'aboutus'; ?>">About Us</a></li>
                     <li><a href="<?php echo 'contact_us'; ?>">Contact Us</a></li>
                     <!-- <li><a href="<?php echo base_url().'our-blog/all/all'; ?>">Our Blog</a></li> -->
                     <!--  <li><a href="price-table-for/Agency">Price Table</a></li> -->
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
   <div class="site-footer-inner col-lg-12" style="background-color: #000;">
      <div class="container">
         <div class="site-info " style="    color: transparent; background: linear-gradient(to right,#bf41a3,#61307a,#4f93ba); -webkit-background-clip: text;">
            COPYRIGHT © | EscortOz
         </div>
         <!-- close .site-info -->
         <div class="addition-info-scarletblue" style="text-transform: uppercase; color: transparent;  background: linear-gradient(to right,#bf41a3,#61307a,#4f93ba); -webkit-background-clip: text;">Beautiful independent
            companions and private escort girls of Australia.
         </div>
      </div>
   </div>
</footer>
<div id="uploadimageModal_edit" class="modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload & Crop Image</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-8 text-center">
                  <div id="image_demo_edit" style="width:350px; margin-top:30px"></div>
               </div>
               <div class="col-md-4" style="padding-top:30px;">
                  <br />
                  <br />
                  <br/>
                  <div class="row">
                     <div class="col-md-12 set_loader"></div>
                  </div>
                  <button class="btn btn-success crop_image_edit">Crop Image</button>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<script src="assets/jquery.min.js"></script>
<script type="text/javascript" src="assets/include_files/jquery-2.1.4.min.js"></script>
<script src="assets/bootstrap.min.js"></script>
<script src="assets/escort/assets/js/popper.min.js"></script>
<script src="assets/escort/assets/js/swiper.min.js"></script>
<script type="text/javascript"> var base_url = '<?php echo base_url(); ?>';</script>
<script type="text/javascript" src="assets/include_files/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="assets/escort/assets/crop/croppie.js"></script>
<script type="text/javascript" src="assets/escort/assets/crop/croppie_user_image.js"></script>
<?php
   if($this->uri->segment(1)=='login' || $this->uri->segment(1)=="price-table-for" || $this->uri->segment(1)=="read-blog" || $this->uri->segment(1)=="addon") { ?>
<script src="assets/js/app.js"></script>
<?php } ?>
<script src="assets/escort/search.js"></script>
<?php  if($module=="sell_service") { ?>
<script src="assets/escort/crop/crop/cropper.js"></script>
<script src="assets/escort/crop/crop/custom.js"></script>
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
               <img id="image" src="assets/images/3456749.jpg">
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
               <img id="image_cover" src="assets/images/3456749.jpg">
            </div>
         </div>
         <div class="modal-footer">
            <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
            <button type="button" class="btn btn-primary" id="crop_cover">Crop</button>
         </div>
      </div>
   </div>
</div>
<!--Modal for crop cover image  for gahllery start-->
<div class="modal fade" id="modal_cover_gallery" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" style="background-color:#fff;" id="modalLabel">Crop the Gallery <span id="current_image_set"></span>/<span id="all_image_set"></span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div id="add_all_image">
            </div>
            <div class="img-container">
               <input type="hidden" id="image_cover_gallert_count" value=""/>
               <img id="image_cover_gallert" style="width:500px; height:500px;" src="assets/images/3456749.jpg">
            </div>
         </div>
         <div class="modal-footer">
            <!--  <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button> -->
            <div class="row">
               <div class="col-md-4"><button type="button" class="btn btn-primary" id="crop_cover_gallery">Crop</button></div>
               <div class="col-md-4"><button type="button" class="btn btn-primary" id="skip_this_image">Skip</button></div>
               <div class="col-md-4"><button type="button" class="btn btn-primary" id="crope_this_image_agen">Crop Agen</button></div>
            </div>
         </div>
      </div>
   </div>
</div>
<?php } ?>
<?php
   if($module=="dashboard" || $module=="forget_password")
   { ?>
<script src="assets/escort/assets/js/app_escort.js"></script>
<script src="assets/escort/assets/js/app_escort_login.js"></script>
<?php if(@$this->session->flashdata("pass")){ ?>
<script type="text/javascript">
   $(window).on('load',function(){
   
     $('#myModalSuccessRegistration').modal({
   backdrop: 'static',
   keyboard: false
   })
       $('#myModalSuccessRegistration').modal('show');
       //$('#myModalSuccessRegistration').modal({backdrop: 'static', keyboard: false})  
   });
   
   
</script>
<?php } ?>
<?php if(@$this->session->flashdata("pass2")){ ?>
<script type="text/javascript">
   $(window).on('load',function(){
   
     $('#myModalSuccessRegistration2').modal({
   backdrop: 'static',
   keyboard: false
   })
       $('#myModalSuccessRegistration2').modal('show');
       //$('#myModalSuccessRegistration').modal({backdrop: 'static', keyboard: false})  
   });
   
   
</script>
<?php } 
if(@$this->session->flashdata("already_verified")){ ?>
<script type="text/javascript">
   $(window).on('load',function(){
   
     $('#myModalAlreadyVerified').modal({
   backdrop: 'static',
   keyboard: false
   })
       $('#myModalAlreadyVerified').modal('show');
       //$('#myModalSuccessRegistration').modal({backdrop: 'static', keyboard: false})  
   });
   
   
</script>
<?php } ?>
<?php }
   ?>


<!-- Modal -->
<div id="myModal_report_for_admin" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">
             <h5 style="color: #fff">Send Report For Admin</h5>
        </h4>
      </div>
      <div class="modal-body">
       
         <div class="media">

          <div class="media-left">
<?php 

 $set_profile_image="assets/uploads/default/avatar-2.jpg";
  if(@$user_login["user_thumb_image"])
   {
     $set_profile_image="assets/uploads/".@$user_login["user_thumb_image"];
   }
 ?>
            <img src="<?php echo @$set_profile_image; ?>" alt="<?php echo @$user_login["fullname"]; ?>" class="img-circle" width="50" height="50">

          </div>

          <div class="media-body">

            <div class="user-details">

            <div class="user-name-block">

              <a href="escort/<?php echo @$user_login["USERID"]."/".implode("-",explode(" ", @$user_login["fullname"])); ?>" class="user-name"><?php echo @$user_login["fullname"]; ?></a>

            </div>

            

          </div>

          </div>
         <form id="" action="gigs/add_report" method="post">
            <input type="hidden"  value="<?php echo @$user_login["USERID"]; ?>" name="escort_id" />           
            <input type="hidden"  value="<?php echo @$user_login["types"]; ?>" name="types" />           
            <input type="hidden"  value="<?php echo @$user_login["fullname"]; ?>" name="fullname" />           
                           <div class="form-group">
                              <label class="form-label" style="color: #fff">Your Name</label>
                              <input type="text" name="user_name"  required="" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="form-label" style="color: #fff">Your E-mail</label>
                              <input type="email" name="email"  required="" class="form-control">
                           </div>

                           <div class="form-group">
                              <label class="form-label" style="color: #fff">Your Message</label>
                              <textarea name="message" placeholder="Message" required="" rows="5"  class="form-control"></textarea>
                           </div>
     <div class="form-group">
                 <button type="submit" class="btn btn-primary btn-block">Send To Admin</button>            
                           </div>
         </form>
         

        </div>

      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>





<div id="reating-for-blog-popup" class="modal fade custom-popup order-popup" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <div class="modal-header text-center">
            <h5 style="color: #fff">Leave Comment</h5>
         </div>
         <div class="modal-body">
            <div id="parent_user_details"></div>
            <div class="feedback-area">
               <ul class="feedback-list">
                  <li class="media">
                     <!-- <a href="#" class="pull-left"><img class="img-circle" width="60" height="60" alt="" src="assets/images/user.jpg"></a> -->
                     <div class="media-body">
                        <form id="form_blog_comment" method="post" enctype="multipart/form-data" >
                           <input type="hidden" id="rating_by" value="" name="rating_frmuser" />
                           <input type="hidden" id="rating_for" value="" name="rating_touser" />           
                           <div class="form-group">
                              <label class="form-label" style="color: #fff">Your Name</label><label id="_error_msg"></label>
                              <input type="text" name="user_name" id="user_name" required="" class="form-control">
                           </div>
                           <div class="form-group">
                              <label class="form-label" style="color: #fff">Your Message</label>
                              <textarea name="chat_message_content" placeholder="Message" required="" rows="5" id="blog_comment" class="form-control"></textarea>
                           </div>
                           <div class="row">
                              <div class="col-md-6">
                                 <span id="stars-existing" class="starrr" data-rating="" style="color: #fff"></span> 
                                 <input type="hidden" id="rating_input" value="" name="rating_input" />
                              </div>
                              <div class="col-md-6 text-right">
                                 <input type="button" value="Save" onclick="submit_comment_on_blog();" class="btn btn-primary btn-border" data-loading-text="Loading...">
                              </div>
                           </div>
                        </form>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- <script src="assets/js/custom.js"></script> -->
<script type="text/javascript" src="assets/include_files/select2.min.js"></script>
<script type="text/javascript" src="assets/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="assets/js/star_rating.js"></script>
<!-- <script type="text/javascript" src="assets/js/rating.js"></script> -->
<script src="assets/escort/fncy/jquery.fancybox.min.js"></script>
<script src="assets/js/purchases.js"></script>
<script src="assets/bootstrap4-toggle.min.js"></script>

<script>
   $.fn.select2.defaults.set("theme", "bootstrap");
        $(".locationMultiple").select2({
            width: null,
            tags: true
        });
</script>
<script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>
<script>

function show_notice_of_get_addon(addon_id,user_id)
{

   $.ajax({
       method:"POST",
       url:base_url+"user/dashboard/show_notice_of_get_addon_dsp",
       data:{"addon_id":addon_id,"user_id":user_id},
       dataType:"html",
       success:function(data)
       {

         // console.log(data);
         // alert("Escort is deleted.");
           $("#myModal_notic_fot_current_package .modal-body").html(data);
           $("#myModal_notic_fot_current_package").modal('show');
         
       }
    });
}

function calcel_order(order_id,user_id)
{

   $.ajax({
       method:"POST",
       url:base_url+"user/dashboard/cancel_order",
       data:{"order_id":order_id,"user_id":user_id},
       dataType:"html",
       success:function(data)
       {
         location.reload();
       }
    });
}


function request_extra_package(addon_id,user_id)
{

   $.ajax({
       method:"POST",
       url:base_url+"user/dashboard/new_addon_request",
       data:{"addon_id":addon_id,"user_id":user_id},
       dataType:"html",
       success:function(data)
       {

         // console.log(data);
         // alert("Escort is deleted.");
           $("#myModal_notic_fot_current_package .modal-body").html(data);
           $("#myModal_notic_fot_current_package").modal('show');
         
       }
    });
}

$(document).on("click",".click_to_delete_escort",function(){

   var id=$(this).data("id");
   if(confirm("Are you sure you want to remove this Escort."))
   {
      
      $.ajax({
       method:"POST",
       url:base_url+"user/sell_service/remove_escort_from_agency",
       data:{"id":id},
       dataType:"html",
       success:function(data)
       {

         // console.log(data);
         alert("Escort is deleted.");
           // $("#show_all_image_of_gallerys").modal('hide');
         location.reload(true);
       }
    });
    
   }
   else
   {
      return false;
   }
});



$(document).on("click","#set_gallery_image_order",function(){
    var id=$(this).data("id");
  var order_ids=new Array();
   $(".get_image_sumber").each(function(){

    order_ids.push($(this).data("id"));
   });
  console.log(order_ids);
    $.ajax({
       method:"POST",
       url:base_url+"user/sell_service/set_order_of_gallery_images",
       data:{"id":id,"order_ids":order_ids},
       dataType:"html",
       success:function(data)
       {
         alert("Order Is Updated.")
           $("#show_all_image_of_gallerys").modal('hide');
         // location.reload(true);
       }
    });

});


$(document).on("click","#get_all_gallery_image",function(){

    var id=$(this).data("id");
    console.log(id);
    $.ajax({
       method:"POST",
       url:base_url+"user/sell_service/get_all_gallery_images",
       data:{"id":id},
       dataType:"html",
       success:function(data)
       {
         $("#show_all_image_of_gallerys .modal-body").empty();
         $("#show_all_image_of_gallerys .modal-body").html(data);
         $("#show_all_image_of_gallerys").modal();
         // console.log(data);
       }
    });
});


   $(document).ready(function(){


$(document).on("click","#submit_data_of_suburbs",function(){
   
   var ids = new Array();
     $(".suburs").each(function(){
        if($(this).val())
       {
          ids.push(this.value);  
       }
     });

     var user_id=$("#get_user_id").val();
    
   $.ajax({
     method:"POST",
     url:base_url+"user/sell_service/add_suburbs_set",
     data:{"ids":ids,"user_id":user_id},
     dataType:"html",
     success:function(data){
      // alert("Deepak");
      // console.log(data);
        // alert(data);
        location.reload(true);
     }
       });

});


$(document).on("click",".remove_gallery_image_dsp_remove",function(){

 if(confirm("Are you sure you want to remove this image."))
 {
   var id=$(this).data("id");
  $.ajax({
     method:"POST",
     url:base_url+"user/sell_service/remove_image",
     data:{"id":id},
     dataType:"html",
     success:function(data){
      // alert("Deepak");
      // console.log(data);
        alert("Image Removed.");
        location.reload(true);
     }
       });
 }
 else
 {
    return false;
 }
 

});


   setInterval(function(){ 

       $(".alert").fadeOut(5000);
           
       }, 8000);
   
   $('#stars').on('starrr:change', function(e, value){
   
   $('#count').html(value);
   
   });
   
   
   
   $('#stars-existing').on('starrr:change', function(e, value){
   
   $('#count-existing').html(value);
   
   $('#rating_input').val(value);
   
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
   
   
   
   $('.states_of_select_2').select2({ width: '100%' });
   $('.myTable').DataTable();
   
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
   
   });
   
   //   $( function() {
   //     $(".datepicker" ).datepicker({dateFormat: 'd-M-yy',minDate: '0'}).val();
   
   //   } );
   //   $(function(){
   //    $('.selectpicker').selectpicker();
   // });
   
   
   var swiper = new Swiper('.swiper-container', {
   
   loop: true,
   autoplay: {
   
         delay: 5500,
   
          disableOnInteraction: false,
   
                      },
   
   navigation: {
   
     nextEl: '.swiper-button-next',
   
     prevEl: '.swiper-button-prev',
   
   },
   
    pagination: {
   
     el: '.swiper-pagination',
   
     clickable: true,
   
   },
   
   });
   var swiper = new Swiper('.swiper-slider', {
   
                     paginationClickable: true,
   
                     slidesPerView: 5,
   
                     spaceBetween: 30,
   
                     loop: true,
   
                     autoplay: {
   
                        delay: 5500,
   
                         disableOnInteraction: false,
   
                      },
   
                    
                     breakpoints: {
   
                         1024: {
   
                             slidesPerView: 5,
   
                             spaceBetween: 35
   
                         },
   
                         767: {
   
                             slidesPerView: 3,
   
                             spaceBetween: 35
   
                         },
   
                         480: {
   
                             slidesPerView: 2,
   
                             spaceBetween: 35
   
                         }
   
                     }
   
                 });
</script>
<script >jQuery(document).ready(function(){
   //open/close lateral filter
   // $("#filter").addClass("hide_filder_row_dsp");
   $('body').on('click',function(event){
   // console.log($(event.target).is('.saale-tum-pe-ek-js-nhi-lg-hri-he'));
   // console.log($(event.target));
    if(!$(event.target).is('.saale-tum-pe-ek-js-nhi-lg-hri-he')){
      $("#demo").removeClass("in");
      $("#demo").attr("aria-expanded","false");
      $("#my_new_id_set").addClass("collapsed");
    }
   
   
   });
   
   $('body').on('click',function(event){
   // console.log($(event.target).is('.ik-or-class-set-ki-he'));
   
    if(!$(event.target).is('.ik-or-class-set-ki-he')){
      $(".set_class_dsp").addClass("closed");
      $(".list").css("display","none");
    }
   });
   
   
   
   $(".set_class_dsp").click(function(){
   
    var id=$(this).data("id");
    if($(".list_set_"+id).hasClass("hide_filder_row_dsp"))
      {
       $(".list_set_"+id).removeClass("hide_filder_row_dsp");
       $(this).removeClass("closed");
      }
   $(".set_class_dsp").each(function(){
      var get_id=$(this).data("id");
      
   if(id!=get_id)
   {
     if($(this).hasClass("closed"))
     {
   
     }
     else
     {
       $(this).addClass("closed");
      $(".list_set_"+get_id).addClass("hide_filder_row_dsp");
     }
       
   }
   });
   
   });
   
   
   $(document).on("click","#show_filter_dsp",function(){
   
   if($("#filter").hasClass("hide_filder_row_dsp"))
   {
    $("#filter").removeClass("hide_filder_row_dsp"); 
    $("#filter").addClass("show_filder_row"); 
   }
   else
   {
     $("#filter").removeClass("show_filder_row"); 
    $("#filter").addClass("hide_filder_row_dsp"); 
   }
   });
   
   
   // $('.cd-filter-trigger').on('click', function(){
   //   triggerFilter(true);
   // });
   // $('.cd-filter .cd-close').on('click', function(){
   //   triggerFilter(false);
   // });
   
   // function triggerFilter($bool) {
   //   var elementsToTrigger = $([$('.cd-filter-trigger'), $('.cd-filter'), $('.cd-tab-filter'), $('.cd-gallery')]);
   //   elementsToTrigger.each(function(){
   //     $(this).toggleClass('filter-is-visible', $bool);
   //   });
   // }
   
   //mobile version - detect click event on filters tab
   var filter_tab_placeholder = $('.cd-tab-filter .placeholder a'),
     filter_tab_placeholder_default_value = 'Select',
     filter_tab_placeholder_text = filter_tab_placeholder.text();
   
   $('.cd-tab-filter li').on('click', function(event){
     //detect which tab filter item was selected
     var selected_filter = $(event.target).data('type');
       
     //check if user has clicked the placeholder item
     if( $(event.target).is(filter_tab_placeholder) ) {
       (filter_tab_placeholder_default_value == filter_tab_placeholder.text()) ? filter_tab_placeholder.text(filter_tab_placeholder_text) : filter_tab_placeholder.text(filter_tab_placeholder_default_value) ;
       $('.cd-tab-filter').toggleClass('is-open');
   
     //check if user has clicked a filter already selected 
     } else if( filter_tab_placeholder.data('type') == selected_filter ) {
       filter_tab_placeholder.text($(event.target).text());
       $('.cd-tab-filter').removeClass('is-open'); 
   
     } else {
       //close the dropdown and change placeholder text/data-type value
       $('.cd-tab-filter').removeClass('is-open');
       filter_tab_placeholder.text($(event.target).text()).data('type', selected_filter);
       filter_tab_placeholder_text = $(event.target).text();
       
       //add class selected to the selected filter item
       $('.cd-tab-filter .selected').removeClass('selected');
       $(event.target).addClass('selected');
     }
   });
   
   //close filter dropdown inside lateral .cd-filter 
   $('.cd-filter-block h4').on('click', function(){
     $(this).toggleClass('closed').siblings('.cd-filter-content').slideToggle(300);
   })
   
   //fix lateral filter and gallery on scrolling
   $(window).on('scroll', function(){
     (!window.requestAnimationFrame) ? fixGallery() : window.requestAnimationFrame(fixGallery);
   });
   
   function fixGallery() {
     var offsetTop = $('.cd-main-content').offset().top,
       scrollTop = $(window).scrollTop();
     ( scrollTop >= offsetTop ) ? $('.cd-main-content').addClass('is-fixed') : $('.cd-main-content').removeClass('is-fixed');
   }
   
   /************************************
     MitItUp filter settings
     More details: 
     https://mixitup.kunkalabs.com/
     or:
     https://codepen.io/patrickkunka/
   *************************************/
   
   // buttonFilter.init();
   // $('.cd-gallery ul').mixItUp({
   //     controls: {
   //       enable: false
   //     },
   //     callbacks: {
   //       onMixStart: function(){
   //         $('.cd-fail-message').fadeOut(200);
   //       },
   //         onMixFail: function(){
   //           $('.cd-fail-message').fadeIn(200);
   //       }
   //     }
   // });
   
   //search filtering
   //credits https://codepen.io/edprats/pen/pzAdg
   var inputText;
   var $matching = $();
   
   var delay = (function(){
     var timer = 0;
     return function(callback, ms){
       clearTimeout (timer);
         timer = setTimeout(callback, ms);
     };
   })();
   
   $(".cd-filter-content input[type='search']").keyup(function(){
       // Delay function invoked to make sure user stopped typing
       delay(function(){
         inputText = $(".cd-filter-content input[type='search']").val().toLowerCase();
         // Check to see if input field is empty
         if ((inputText.length) > 0) {            
             $('.mix').each(function() {
               var $this = $(this);
             
               // add item to be filtered out if input text matches items inside the title   
               if($this.attr('class').toLowerCase().match(inputText)) {
                   $matching = $matching.add(this);
               } else {
                   // removes any previously matched item
                   $matching = $matching.not(this);
               }
             });
             $('.cd-gallery ul').mixItUp('filter', $matching);
         } else {
             // resets the filter to show all item if input is empty
             $('.cd-gallery ul').mixItUp('filter', 'all');
         }
       }, 200 );
   });
   });
   
   
</script>
<script>
   $(document).ready(function () {
       //Initialize tooltips
       $('.nav-tabs > li a[title]').tooltip();
       
       //Wizard
       $('a[data-toggle="tab"]').on('show.bs.tab', function (e) {
   
           var $target = $(e.target);
       
           if ($target.parent().hasClass('disabled')) {
               return false;
           }
       });
   
       $(".next-step").click(function (e) {
   
           var $active = $('.wizard .nav-tabs li.active');
           $active.next().removeClass('disabled');
           nextTab($active);
   
       });
       $(".prev-step").click(function (e) {
   
           var $active = $('.wizard .nav-tabs li.active');
           prevTab($active);
   
       });
   });
   
   function nextTab(elem) {
       $(elem).next().find('a[data-toggle="tab"]').click();
   }
   function prevTab(elem) {
       $(elem).prev().find('a[data-toggle="tab"]').click();
   }
     
   
     $(function(){
     $('[role=dialog]')
         .on('show.bs.modal', function(e) {
           $(this)
               .find('[role=document]')
                   .removeClass()
                   .addClass('modal-dialog ' + $(e.relatedTarget).data('ui-class'))
     })
   })
</script>

<script type="text/javascript">
  $(function() {
    $('.change_online_status').change(function(e) {
        e.preventDefault();
        // $("#status_1").attr('disabled', !$("#status_1").attr('disabled'));
        $('.change_online_status').attr("disabled","disabled");
        var checkbox = this;
        var id = checkbox.id;
        $.ajax({
            url: base_url+"user/Sell_service/update_escort_online_status?id="+id,
            type: 'get',
            success: function(result) {
                checkbox.checked = true;
            },
            error: function() {
               checkbox.checked = false;
                // $('#modalinfo div').html('<div class="modal-content"><div class="modal-header"><h2>Could not complete the request.</h2></div></div>');
                // $('#modalinfo').modal('show'); 
            }
        });
    });
});

   // $('.change_status').click(function() {
   //    alert('mohit');
   //  alert($(this).attr('id'));  //-->this will alert id of checked checkbox.
   //     if(this.checked){
   //          $.ajax({
   //              type: "POST",
   //              url: 'searchOnType.jsp',
   //              data: $(this).attr('id'), //--> send id of checked checkbox on other page
   //              success: function(data) {
   //                  alert('it worked');
   //                  alert(data);
   //                  $('#container').html(data);
   //              },
   //               error: function() {
   //                  alert('it broke');
   //              },
   //              complete: function() {
   //                  alert('it completed');
   //              }
   //          });

   //          }
   //    });
</script>

</body>
</html>