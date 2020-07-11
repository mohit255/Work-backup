<section class="banner">
  <?php 
$default_profile_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'profile_image'")->row_array();
$default_cover_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'cover_image'")->row_array();

  $user_package_info=$this->db->query("select * from membership where id='".$user_login["package_id"]."'")->row_array();
  $package_benifits=explode("*#*", $user_package_info["benifits"]);
$package_values=explode("*#*", $user_package_info["values"]);
  $set_cover_image="assets/uploads/default/".$default_cover_image["name"];
  if(@$user_login["cover_image"])
   {
     $set_cover_image="assets/uploads/".@$user_login["cover_image"];
   }

   $set_profile_image="assets/uploads/default/".$default_profile_image["name"];
  if(@$user_login["user_thumb_image"])
   {
     $set_profile_image="assets/uploads/".@$user_login["user_thumb_image"];
   }

   $set_profile_image_fotter=$set_profile_image;
   ?>
    <div class="HomeBlock-image" style="background-image: url(<?php echo @$set_cover_image; ?>); background-size: cover;">
  </div>    
<input type="hidden" id="get_user_escort_id_dsp" value="<?php echo @$user_login["USERID"]; ?>">
<section class="s-advertiser-profile">
  <div class="container">
    <div class="row">
      <div class="col-md-5">
         <span class="profile-navigation__btn">
          <a id="" class="btn btn-default btn-lg  back-btn" href="" style="width: auto;background: linear-gradient(to right,#bf41a3,#4f93ba); border: none;">Back</a>
          <!-- <a id="" class="btn btn-default btn-lg " href="" style="width: auto;">Tell issabella if u found her on escortoz</a> -->
        </span>
      </div>
      <div class="col-md-2">
         <div class="container">
               <div class="magnific-gallery-group">
            <!-- <a id="p_lt_ctl10_pageplaceholder_p_lt_ctl01_pageplaceholder_p_lt_ctl02_ProfileImage_lnkViewImage" class="advertiser-profile-image" href="assets/images/models/profile.jpg"> -->
                    <div class="embed-container ratio-3-4 hidden-sm hidden-xs">
                      <a class="example-image-link" href="<?php echo @$set_profile_image; ?>" data-fancybox="images" data-title="Click the right half of the image to move forward.">
                        <img class="img-responsive" src="<?php echo @$set_profile_image; ?>" alt="<?php echo @$user_login["fullname"]; ?>"></a>
                        
                    </div>
                    <div class="results-title">
                      <h5 class="results-title__title"><?php echo @$user_login["fullname"]; ?></h5d>
                    </div>
           <!--  </a> -->
                 </div>
        </div>
      </div>
      <div class="col-md-5">
          <span class="profile-navigation__btn profile-navigation__btn--right">
            <a id="" class="btn btn-default btn-lg btn-icon-search" href="search/index/0/all/all/all/all/all/all/all/all/all/all/all/all/all/all/all" style="width: auto; background: linear-gradient(to right,#bf41a3,#4f93ba);border:none;">Next</a>
        </span>
      </div>
    </div>
  </div>
</section>

<section class="s-advertiser-profile">
   <div class="container">
    <?php if(@$this->session->flashdata("alert")) 
 { ?>

<div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong> <?php echo @$this->session->flashdata("alert"); ?>
</div>
<?php  }
 
 ?>
    <div class="row">
      <div class="col-md-9">
        <div class="container">
         <div class="row">
            <div class="profile-dtl">  
                <div class="advertiser-meta-notice">
                  <span class="advertiser-names--username"> <?php if(@$escort_info["swa_number"]) {  echo "SWA".@$escort_info["swa_number"]; } ?></span>

               <?php $likes_data=$this->db->query("select * from escort_likes where escort_id='".$user_login["USERID"]."'")->result_array(); ?>   
                    <button type="button" class="btn btn-primary" onclick="do_like_dsp(<?php echo @$user_login["USERID"]; ?>);"><?php echo count($likes_data); ?><span id="show_check_icon_data"> <i class="fa fa-heart"></i></span> Like</button>
                     <!-- <a id="" class="advertiser-add-to-fav" href=""><i class="fa fa-heart"></i> Like</a>
                      <input type="button"  id="" style="display:none;">-->
                      <div id="" style="display: none"> 

                      </div>
                </div>    
                <div class="advertiser-names container">
                 <!--  <h1 class="advertiser-names--display-name">Isabella</h1> -->
                  <!-- <span class="advertiser-names--username">#IsabellaW</span> -->

                </div>
                <div class="advertiser-locations container">
                  <div id="" class="advertiser-current-location">
                    <a id="" href=""><?php echo @$escort_info["main_location"].",".@$escort_info["state"];  ?></a>
                  </div>
                </div>
                 <div class="container">
                        <div class="info-block">
                      <div class="row profile-info">
                        <div class="col-xs-6 col-sm-3 col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Location</h4>

                                        <p class="list-group-item-text"><?php echo implode(",",explode("*#*", @$escort_info["sub_location"]))  ; ?><?php // echo @$escort_info["sub_location"]; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-group">

                                        <h4 class="list-group-item-heading">Age</h4>

                                        <p class="list-group-item-text"><?php echo @$escort_info["age"]; ?></p>
                                    </div>
                                </li>
                               
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Height</h4>

                                        <p class="list-group-item-text height"><?php echo @$escort_info["height"]; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-group">
                                                                <h4 class="list-group-item-heading">Dress size</h4>

                                            <p class="list-group-item-text"><?php echo @$escort_info["dress_size"]; ?></p>
                                                        </div>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Eyes</h4>

                                        <p class="list-group-item-text"><?php echo @$escort_info["eye_color"]; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Place of Service</h4>

                                        <p class="list-group-item-text"><?php echo @$escort_info["place_of_services"]; ?></p>
                                    </div>
                                </li>
                                
                            </ul>
                        </div>
                        <div class="col-xs-6 col-sm-3 col-lg-3">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Hair</h4>

                                        <p class="list-group-item-text"><?php echo @$escort_info["hair_style"]; ?></p>
                                    </div>
                                </li>
                                <li class="list-group-item">
                                    <div class="list-group">
                                        <h4 class="list-group-item-heading">Body Type</h4>

                                        <p class="list-group-item-text"><?php echo @$escort_info["body_type"]; ?></p>
                                    </div>
                                </li>
                                        </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
            <div class="row">
              <div class="container">
              <div class="about_section">
                    <div class="info-block container advertiser-profile-text">
                       <!--  <span class="label">About</span> -->
                      <?php echo @$escort_info["about"]; ?>
                    </div>
<?php $get_suburbs = $this->db->query("select * from suburbs where user_id='".$user_login["USERID"]."'")->row_array(); 

 ?>
                  <?php if(@$get_suburbs["suburbs"]){ ?>
      <div class="info-block container advertiser-profile-text">
                       <!--  <span class="label">About</span> -->
                      <h3 class="info-block__heading">
                        My Suburbs
                      </h3>

                      <h5> <?php echo implode(",", explode("*#*", @$get_suburbs["suburbs"])); ?> </h5>
                    </div>
                  <?php } else { ?>

                  <?php } ?>
                     
                    <div class="info-block container">
                 <!--    <span class="label">Service</span> -->
                      <h3 class="info-block__heading">
                        My Services
                      </h3>
                      <div class="info-block__content">
                        
                       <div class="advertiser-preferred-list">
                        
                            <ul style="padding-left: 0 !important;">
                              <?php 
                          if(@$escort_think_prefer["services"])
                          {

                              $services=explode("*#*",$escort_think_prefer["services"]);
                              for($i=0; $i<count($services); $i++)
                              { ?>
                             <li><?php echo @$services[$i]; ?></li>
                              <?php }
                          }
                          else
                          { ?>
                              <li>No Services</li>
                          <?php } ?>
                            
                        
                            </ul>
                        
                    
                    <!-- I dont think we need this, we are collapsing for mobile, let it run loose for desktop
                    <a href="#all" class="view-all">View Full List</a>  -->
                      </div>

                        </div>
                      </div>
              </div>
              </div>
            </div>
             <div class="row">
               <div class="container">
                
                      <div class="advertiser-tour-schedule info-block">
                        <h3 class="info-block__heading">
                        My Tour
                      </h3>
                            <div class="advertiser-tour-schedule__header">
                                <div class="tour-location">My Touring Schedule</div>
                                <div class="tour-date-from">From</div>
                                <div class="tour-date-to">To</div>
                            </div>
                

                <?php if(@$escort_tour && $package_values[array_search("Touring locations", $package_benifits)]=="Yes") { 
                   foreach ($escort_tour as $tour) { ?>
                   <div class="advertiser-tour-schedule__entry ">
                              <div class="tour-location"><?php echo @$tour["place"]; ?></div>
                              
                              
                                  <div class="tour-date-from"><?php echo @$tour["from_date"]; ?></div>
                                  <div class="tour-date-to"><?php echo @$tour["to_date"]; ?></div>
                              
                          </div>
                  <?php }
                    
                 } else { ?>
 <div class="advertiser-tour-schedule__entry ">
                            <h6>No Any Touring</h6>
                              
                          </div>
                <?php } ?>
                         
              
                          
                     </div>
                   </div>
             </div>
            <div class="row">
              <div class="container">
                <div class="info-block container advertiser-profile-text">
               <!--  <span class="label">About</span> -->
                      <h3 class="info-block__heading">
                         Review <button type="button" onclick="add_comment_for_escort(<?php echo $user_login["USERID"]; ?>);" class="btn btn-primary" style="width: auto;"  tabindex="0">Add Review</button>
                      </h3>
                     
                      <?php if(@$get_feedback) { foreach ($get_feedback as $feedback) { 

  $time_zone='Asia/Calcutta';
                  //count time defrence start==============================================================
                                                                    if($time_zone!=$feedback['time_zone'])

                            { 

                              //                echo "Not same";

                                                        $date = new DateTime($feedback['created_date'], new DateTimeZone($feedback['time_zone']));

                                                        $date->setTimezone(new DateTimeZone($time_zone));                                                        

                                                        $time = $date->format('Y-m-d H:i:s');                                                        

                                                     //   echo "posted time :" .$time ;

                                                        

                                                         date_default_timezone_set($time_zone);

                                                         $date1= date('Y-m-d H:i:s') ;

                                                    //     echo " Current_time ".$date1;

                                                        

                                                         

                                                            $now = new DateTime($date1);

                                                            $ref = new DateTime($time);

                                                            $diff = $now->diff($ref);

                                                            }

                                                            else 

                                                            {                                                            
                                                            $gig_time_zone = !empty($gig_time_zone)?$gig_time_zone:'Asia/Kolkata';  
                                                            date_default_timezone_set($gig_time_zone);

                                                            $now = new DateTime(date('Y-m-d H:i:s'));                                                

                                                            //$now = new DateTime($feedback['created_date']);

                                                            $ref = new DateTime($feedback['created_date']);                                                              

                                                            $diff = $now->diff($ref);                                                                

                                                            }

                                                            $total_seconds = 0 ;       

                                                            $days = $diff->days;

                                                            $hours = $diff->h;

                                                            $mins = $diff->i;                                                            

                                                            if(!empty($days)&&($days>0)) 

                                                            {

                                                             $days_to_seconds = $diff->days*24*60*60;

                                                             $total_seconds = $total_seconds+$days_to_seconds;                                                   

                                                            }

                                                            if(!empty($hours)&&($hours>0)) 

                                                            {

                                                             $hours_to_seconds = $diff->h*60*60;

                                                             $total_seconds = $total_seconds+$hours_to_seconds;

                                                            }

                                                            if(!empty($mins)&&($mins>0)) 

                                                            {

                                                             $min_to_seconds = $mins*60;

                                                             $total_seconds = $total_seconds+$min_to_seconds;

                                                            }

                                                            $intervals      = array (

                              'year' => 31556926, 'month' => 2629744, 'week' => 604800, 'day' => 86400, 'hour' => 3600, 'minute'=> 60

                            );

                            $time_difference = '';

                            //now we just find the difference

                            if ($total_seconds == 0)

                            {

                              $time_difference = 'just now';

                            }   

                          

                            if ($total_seconds < 60)

                            {

                              $time_difference = $total_seconds == 1 ? $total_seconds . ' second ago' : $total_seconds . ' seconds ago';

                            }       

                          

                            if ($total_seconds >= 60 && $total_seconds < $intervals['hour'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['minute']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' minute ago' : $total_seconds . ' minutes ago';

                            }       

                          

                            if ($total_seconds >= $intervals['hour'] && $total_seconds < $intervals['day'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['hour']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' hour ago' : $total_seconds . ' hours ago';

                            }   

                          

                            if ($total_seconds >= $intervals['day'] && $total_seconds < $intervals['week'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['day']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' day ago' : $total_seconds . ' days ago';

                            }   

                          

                            if ($total_seconds >= $intervals['week'] && $total_seconds < $intervals['month'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['week']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' week ago' : $total_seconds . ' weeks ago';

                            }   

                          

                            if ($total_seconds >= $intervals['month'] && $total_seconds < $intervals['year'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['month']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' month ago' : $total_seconds . ' months ago';

                            }  
            if ($total_seconds >= $intervals['year'])

                            {

                              $total_seconds = floor($total_seconds/$intervals['year']);

                               $time_difference =  $total_seconds == 1 ? $total_seconds . ' year ago' : $total_seconds . ' years ago';

                            }  

                        ?>
                         <hr>
                       <div class="info-block__content">
                      <p><strong style="text-decoration: underline;line-height: 25px;font-size: 16px;"><?php echo @$feedback["from_user"]; ?></strong> &nbsp;&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time_difference; ?><div style="width: 120px; height: 29px;position: absolute;"></div><span class="starrr" data-rating="<?php echo $feedback['rating'];?>"></span></p>
                      <p><?php echo $feedback['comment'];?></p>
                  <!--<p><strong>Please Note:</strong> Safe Health practices at all times. Sorry but private numbers will not be answered. </p>-->
                     </div>
                  <?php     } } ?>
                     
                     <br>
                     
                









                     <hr style="border:3px solid #fff;">
                     <a href="javascript:;" data-toggle="modal" data-target="#myModal_report_for_admin" style="color: #fff;"><h5>Report this account to site ADMIN.</h5></a>
                </div>
              </div>
            </div>
         </div>
       </div>
      </div>
      <div class="col-md-3">
          <div class="container">
            <div class="info-block advertiser-cta container" style="border:none">
              <a style="color:#ddd">
              <h3 class="info-block__heading" style="font-family:Helvetica !important;">
                Gallery
               </h3>
              </a>
              <div class="info-block__content" aria-expanded="false">
                <div class="advertiser-gallery xxvisible-desktop">
                      <div class="">
                          <?php if(@$get_gallery_image) {
                            $i=0;
                     foreach($get_gallery_image as $image_get)
                     { 

$images_data_get=$this->db->query("select * from gallery_image where id='".$image_get["priborty"]."'")->row_array();

 if(@$images_data_get["image"])
        {
           $set_image=@$images_data_get["image"];
        }
        else
        {
          $set_image=@$image_get["image"];
        }

                      $i=$i+1; ?>
<a class="example-image-link advertiser-gallery-thumb" href="assets/uploads/<?php echo @$set_image; ?>" data-fancybox="images" data-title="Or press the right arrow on your keyboard.">
                                      
                                          <img src="assets/uploads/<?php echo @$set_image; ?>" alt="Isabella - Image 1" class="img-responsive">
                                      
                                  </a>
                     <?php
                         if($i==$package_values[array_search("Photo gallery", $package_benifits)])
                         {
                          break;
                         }
                      }

                          } else { ?>
          <h3>No Any Images</h3>
                         <?php  }  ?>
                                  
                              
                                
                              
                      </div>

                      <div class="advertiser-gallery__note">
                          
                          
                          <div id="" class="advertiser-gallery__note__avatar-images">
                    
                              <i class="icon-pin"></i> Photos verified by editor.
                          
                      </div>
                          
                      </div>
                  </div>
              </div>
           </div>
          <div class="info-block container ">
          <a style="color:#ddd"><h3 class="info-block__heading">
          Availability
          </h3>
          </a>
          <div class="info-block__content ">
               <div class="availability-table">
               <div class="advertiser-availability__row">
               <span class="day-header">&nbsp;</span>
               <span class="time-from-header">From</span>
               <span class="time-to-header">To</span>
           </div>
        <?php 
        $dates=explode("*#*", @$escort_availability["dates"]);
         $days=explode("*#*", @$escort_availability["days"]);
         $time=explode("*#*", @$escort_availability["time"]);
         $duration=explode("*#*", @$escort_availability["duration"]);

        ?>
<?php for($i=0; $i<7; $i++) { 
  $get_new_date=date('d-M-Y', strtotime('+'.$i.' days', strtotime(date("d-M-Y"))));
                                 $dayname = date('D', strtotime('+'.$i.' days', strtotime(date("d-M-Y"))));
 $get_index=array_search($get_new_date,$dates);
 // $get_index=array_search("25-Jan-2019",$dates);
           
                   
                            if(gettype($get_index)!='boolean')
                            {
                                $get_duration=$duration[$get_index];
                            }
                            else
                            {
                                      $get_duration="";
                            }
                                
                                  
                                  if($get_duration)
                                  {
                                       if(@$get_duration=="All day" || @$get_duration=="By appointment")
                                       {
                                          $set_time=@$get_duration;
                                          
                                       }
                                       else
                                       {
                                          $get_tine_new=explode("==", $time[$get_index]);
                                          if(@$get_duration=="times")
                                          {
                                            $set_time=$get_tine_new["0"]."--".$get_tine_new["1"];
                                          }
                                          else
                                          {
                                             $set_time=$get_tine_new["0"]."--".@$get_duration;
                                          }
                                         
                                       }
                                  }
                                  else
                                  {

                                    $set_time="NULL--NULL";
                                    
                                  }
                                  //var_dump($set_time);
                                  if($set_time=="NULL--NULL")
                                  {
                                   
                                    $set_time="unavailable";
                                  }

switch($dayname){
             case 'Sun':
                  $day_name='Sunday';       
                 break;
                 case 'Mon':
                  $day_name='Monday';       
                 break;
                 case 'Tue':
                  $day_name='Tuesday';       
                 break;
                  case 'Wed':
                  $day_name='Wednesday';       
                 break;
                 case 'Thu':
                  $day_name='Thursday';       
                 break;
                 case 'Fri':
                  $day_name='Friday';       
                 break;
                 case 'Sat':
                  $day_name='Saturday';       
                 break;
            
     }
     if($get_new_date==date("d-M-Y"))
     {
      $dayname="Today";
     }

 ?>
               <div class="advertiser-availability__row"><span class="day"><span class="day__today"><?php echo @$dayname; ?></span></span> 
              
                <span class="time-from unavailable"><?php echo @$set_time; ?><em>–</em></span><span class="time-to"></span>
              </div>

        <?php } ?>
               

        
               </div>
               </div>
          </div>
          <div class="info-block advertiser-cta container">
              <a style="color:#ddd">
              <h3 class="info-block__heading" style="font-family:Helvetica !important;">
                Contact
               </h3>
              </a>
              <div class="info-block__content" aria-expanded="false">
        
                 <div class="advertiser-cta__item-wrapper">
                   <?php if(@$escort_info["sms_number"] )  { ?>
      <a href="" id="" class="btn btn-primary btn-call js-toggle-visibility" data-toggle="modal" data-target="#animate_for_number"><span id="">Call or SMS</span></a>
                   <?php } ?>
                   <div class="modal animate report-modal" id="animate_for_number" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <!-- <h5 class="modal-title" id="exampleModalLabel">Call or sms</h5> -->
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true" style="color: #fff;">×</span>
                            </button>
                          </div>
                          <div class="modal-body text-center p-lg">
                             <p class="text-underlined text-large">No Private/Blocked Numbers will be answered.</p>
                              <ul class="accepted-contact-methods">
                                <li><span class="accept-phone">I Accept Phone Calls</span></li>
                                <li><span class="accept-sms">I Accept SMS Messages</span></li>
                              </ul>
                                
                                  <div class="contact-number-box">
                                      <span class="contact-number-box__label">Mobile</span>
                                      <span id="p_lt_ctl10_pageplaceholder_p_lt_ctl01_pageplaceholder_p_lt_ctl12_wzBookings_wzBookings_zone_CallMeNow_lblContactNumber"><a href="tel:<?php echo @$escort_info["sms_number"]; ?>" class="contact-number"><?php echo @$escort_info["sms_number"]; ?></a></span>

                                       <img src="<?php 

                     if(!empty($logo['value']))  echo base_url().$logo['value']; else { echo base_url()."assets/images/logo.png";   }?>" style=" ">
                                  </div>
                              
                              
                              <p class="color-highlighted">Be sure to tell escort name you that found her on Escortoz</p>

                          </div>
                          
                        </div>
                      </div>
                  </div>
                  <div class="advertiser-cta__item-wrapper">
      

                  <!--  <a href="mainto:<?php echo @$user_login["email"]; ?>" class="btn btn-primary btn-email" data-toggle="modal" data-target="#contactForm">Send Me An Email</a> -->
                   <a href="mailto:<?php echo @$user_login["email"]; ?>" class="btn btn-primary btn-email" >Send Me An Email</a>
                 </div>
              </div>
          </div>
        </div>
        <div class="">
          <div class="info-block container">
           <h3 class="info-block__heading" style="font-family:Helvetica !important;">
                Rates From
               </h3>
           <div class="info-block__content ">
               <div class="availability-table">
               <div class="advertiser-availability__row">
               <span class="day-header">TIME</span>
               <span class="time-from-header">IN</span>
               <span class="time-to-header">OUT</span>
               </div>

        <?php if(@$escort_rate) { foreach ($escort_rate as $rate) { ?>
          <div class="advertiser-availability__row">
            <span class="day"><span class=""><?php echo @$rate["duration"];?></span></span>
              <span class="time-from till-late"><?php echo "$".@$rate["in_price"];  ?><em></em></span>
              <span class="time-to"><?php echo "$".@$rate["out_price"]; ?></span>
             </div>
        <?php } } ?>
               

        
              

        
               <!-- <div class="advertiser-availability__row"><span class="day">All night</span> <span class="time-from unavailable"><em></em></span><span class="time-to"></span></div> -->

        
               </div>
          </div>
              </div>
               <div class="info-block ">
                <div class="info-block__content">
               <ul id="social_icon">

                <li>

                    <h3 class="info-block__heading" style="font-family:Helvetica !important;">
                Check Out 
               </h3>

                </li>

              <?php if(@$social_link["facebook"]) { ?>
<li id="menu-item-600" class="menu-item menu-item-type-taxonomy menu-item-object-cities"><a href="<?php echo @$social_link["facebook"]; ?>">
                    <i class="fa fa-facebook"></i> &nbsp;&nbsp; My Facebook</a></li>
                 <li class="social-menu-seperator">

                     <a href=""></a>

                 </li>

              <?php } ?>
                
 <?php if(@$social_link["twitter"]) { ?>
                <li id="menu-item-601" class="menu-item menu-item-type-taxonomy menu-item-object-cities"><a href="<?php echo @$social_link["twitter"]; ?>"><i class="fa fa-twitter"></i> &nbsp;&nbsp;My Twitter</a>

                </li>
                  <li class="social-menu-seperator">

                      <a href=""></a>

                </li>
              <?php } ?>
               <?php if(@$social_link["instagram"]) { ?>
                <li id="menu-item-602" class="menu-item menu-item-type-taxonomy menu-item-object-cities"><a href="<?php echo @$social_link["instagram"]; ?>"><i class="fa fa-instagram"></i> &nbsp;&nbsp;My Instagram</a>

                </li>
                  <li class="social-menu-seperator">

                         <a href=""></a>

                   </li>
                 <?php } ?>
 <?php if(@$social_link["skype"]) { ?>
                <li id="menu-item-603" class="menu-item menu-item-type-taxonomy menu-item-object-cities"><a href="<?php echo @$social_link["skype"]; ?>"><i class="fa fa-skype"></i> My Skype</a>

                </li>
                <li class="social-menu-seperator">

                         <a href=""></a>

                   </li>
<?php } ?>

                 <?php if(@$social_link["direct_link"]) { ?>
                <li id="menu-item-603" class="menu-item menu-item-type-taxonomy menu-item-object-cities"><a href="<?php echo @$social_link["direct_link"]; ?>"><i class="fa fa-link"></i> &nbsp;&nbsp;Direct Link</a>

                </li>

<?php } ?>
                        </ul>
              </div>
            </div>
        </div>
      </div>
    </div>
   </div>
</div></section>

  
  <div class="modal fade report-modal" id="contactForm" tabindex="-1" role="dialog" aria-labelledby="contactFormLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
  
        <div class="modal-content">
           
            <div class="modal-body" style="background-color: #474242">
    
            </div>
            
        </div><!-- /.modal-content -->

    </div><!-- /.modal-dialog -->
</div>
