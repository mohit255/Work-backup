<div class="body-content">
<?php 

$default_cover_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'cover_image'")->row_array();

$set_cover_image="assets/uploads/default/".$default_cover_image["name"];
  if(@$user_login["cover_image"])
   {
     $set_cover_image="assets/uploads/".@$user_login["cover_image"];
   } ?>	
<section class="banner">
		<div class="HomeBlock-image" style="background-image: url(<?php echo @$set_cover_image;  ?>); background-size: cover;">
 <div class="playmate">
			<div class="col-md-6">
				<div class="container">
					<h2 style="color: #fff"><?php echo @$user_login["fullname"]; ?></h2>
				</div>
			</div>
			<div class="col-md-6 text-right">
				<div class="container">
					<span href="" class="btn verifyd">VERIFIED  <i class="fa fa-check" style="color: green;"></i></span>
				</div>
			</div>
		 </div>
	</div>		
</section>
<section>
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
				
			<div class="about_section">
			    <div class="info-block container advertiser-profile-text" style="border:none; background-color: #000">
			       <!--  <span class="label">About</span> -->
			  <h3 class="info-block__heading">
			   DESCRIPTION
			  </h3>
			  <hr style="border:2px solid #fff;">
			  <?php echo @$escort_info["about"]; ?>
			</div>
			  </div>
			  <div class="about_section">
				    <div class="info-block container advertiser-profile-text" style="border:none; background-color: #000;">
				       <!--  <span class="label">About</span> -->
				  <h3 class="info-block__heading">
				   LOCATION &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo @$escort_info["state"]."-".@$escort_info["main_location"]; ?>
				  </h3>
				  <div class="info-block__content">
				    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3154.6877704127587!2d-122.4454129852823!3d37.75046857976395!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x808f7e0bd7ea5f1d%3A0xd7e74097e3b18b7b!2s123+Market+St%2C+San+Francisco%2C+CA+94114%2C+USA!5e0!3m2!1sen!2sin!4v1538036393121" width="600" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
				  </div>
				</div>
				  </div>
			</div>
			<div class="col-md-3 col-content">
				<div class="container">
					<div class="info-block container " style="border:none;">
          <a style="color:#ddd"><h3 class="info-block__heading">
          OPERATING HOUR
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
          <h3 class="info-block__heading">
            Contact
           </h3>
          </a>
          <div class="info-block__content" aria-expanded="false">
    
             <div class="advertiser-cta__item-wrapper">
             <?php if(@$escort_info["sms_number"] )  { ?>
                   <a href="" id="" class="btn btn-primary btn-call js-toggle-visibility" data-toggle="modal" data-target=".animate"><span id="">Call or SMS</span></a>
                   <?php } ?>
              </div>

              <div class="modal animate report-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="true">
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
                                      <span id="p_lt_ctl10_pageplaceholder_p_lt_ctl01_pageplaceholder_p_lt_ctl12_wzBookings_wzBookings_zone_CallMeNow_lblContactNumber"><a href="tel:+61449814356" class="contact-number"><?php echo @$escort_info["sms_number"]; ?></a></span>

                                       <img src="<?php 

                     if(!empty($logo['value']))  echo base_url().$logo['value']; else { echo base_url()."assets/images/logo.png";   }?>" style=" ">
                                  </div>
                              
                              
                              <p class="color-highlighted">Be sure to tell escort name you that found her on Escortoz</p>

                          </div>
                          
                        </div>
                      </div>
                  </div>
              <div class="advertiser-cta__item-wrapper">
  

               <a href="mailto:<?php echo @$user_login["email"]; ?>" class="btn btn-primary btn-email">Send Me An Email</a>
             </div>
          </div>
       </div>
        <div class="info-block container">
         <h4>RATES FROM</h4>
          <div class="info-block__content ">
               <div class="availability-table">
               <div class="advertiser-availability__row">
               <span class="day-header">TIME</span>
               <span class="time-from-header">IN</span>
               <span class="time-to-header">OUT</span>
               </div>

             <?php if(@$escort_rate) { foreach ($escort_rate as $rate) { ?>
  <div class="advertiser-availability__row"><span class="day"><span class=""><?php echo @$rate["duration"];?></span></span> <span class="time-from till-late"><?php if(@$rate["call_type"]=="In-Call") { echo "$".@$rate["price"]; } else { echo "--"; }  ?><em></em></span><span class="time-to"><?php if(@$rate["call_type"]=="Out-Call") { echo "$".@$rate["price"]; } else { echo "--"; }  ?></span></div>
<?php } } ?>
        
               

        
               </div>
          </div>
       </div>
       <div class="info-block advertiser-cta container">
              <a style="color:#ddd">
              <h3 class="info-block__heading">
               Rooms/Venues
               </h3>
              </a>
              <div class="info-block__content" aria-expanded="false">
                <div class="advertiser-gallery xxvisible-desktop">
                      <div class="">
                          
                                  <?php if(@$get_gallery_image) {
                            $i=0;
                     foreach($get_gallery_image as $image_get)
                     { $i=$i+1; 

$images_data_get=$this->db->query("select * from gallery_image where id='".$image_get["priborty"]."'")->row_array();

 if(@$images_data_get["image"])
        {
           $set_image=@$images_data_get["image"];
        }
        else
        {
          $set_image=@$image_get["image"];
        }
                      ?>
<a class="example-image-link advertiser-gallery-thumb" href="assets/uploads/<?php echo @$set_image; ?>" data-fancybox="images" data-title="Or press the right arrow on your keyboard.">
                                      
                                          <img src="assets/uploads/<?php echo @$set_image; ?>" alt="Isabella - Image 1" class="img-responsive">
                                      
                                  </a>
                     <?php
                         if($i==9)
                         {
                          break;
                         }
                      }

                          } else { ?>
          <h3>No Any Images</h3>
                         <?php  }  ?>
                              
                      </div>

                      <div class="advertiser-gallery__note">
                          
                        
                          
                      </div>
                  </div>
              </div>
           </div>
      </div>
			</div>
		</div>
    <br>
    <br>
		<div class="row">
			<div class="col-md-12">
				<div class="info-block container advertiser-profile-text" style="border:none;">
				       <!--  <span class="label">About</span> -->
				    <h3 class="info-block__heading">
				       REVIEW <button type="button" onclick="add_comment_for_escort(<?php echo $user_login["USERID"]; ?>);" class="btn btn-primary" style="width: auto;"  tabindex="0">Add Review</button>
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
                      <p><strong style="text-decoration: underline;line-height: 25px;"><?php echo @$feedback["from_user"]; ?></strong> &nbsp;&nbsp; <i class="fa fa-clock-o" aria-hidden="true"></i> <?php echo $time_difference; ?><div style="width: 120px; height: 29px;position: absolute;"></div><span class="starrr" data-rating="<?php echo $feedback['rating'];?>"></span></p>
                      <p><?php echo $feedback['comment'];?></p>
                  <!--<p><strong>Please Note:</strong> Safe Health practices at all times. Sorry but private numbers will not be answered. </p>-->
                     </div>
                  <?php     } } ?>
                     
                     <br>
                     
				</div>
				
			</div>
			<br>
			
		</div>
	</div>
</section>

<section class="agency-img">
  <div class="container">
     <div class="results-title">
     <h1 class="results-title__title" style="font-weight: lighter;">Our Current Girls</h1> 
     </div>
     <div class="row">

 <?php 
 if(@$my_escort) {
 	$i=0;
  foreach ($my_escort as $data) { 
  	$i=$i+1;
 $profile_image='assets/uploads/default/avatar-2.jpg';
   if(@$data["user_thumb_image"])
   {
      $profile_image="assets/uploads/".@$data["user_thumb_image"];
   }
$escort_info=$this->db->query("select * from escort_info where escort_id='".@$data["USERID"]."'")->row_array();

  	?>


     <div class="col-md-3" style="">
     <div class="profile-image-cities escort">
        <a class="favgirl do" data-escortid="8647" href="#"><i class="heart-empty-icon"></i></a>
        <a href="<?php echo strtolower(@$data["types"]); ?>/<?php echo @$data["USERID"]; ?>/<?php echo implode("-", explode(" ", @$data["fullname"])); ?>">
        <div class="profile-name"><?php echo @$data["fullname"]; ?></div>
        <div class="profile-quickstats">
                            <div class="profile-quickstats--heading">Based in 
                    <span><?php if($escort_info["main_location"]) echo @$escort_info["main_location"]; else { echo "Sydney"; } ?></span>
                </div>
              <div class="profile-quickstats--details">
                <div class="profile-quickstats--heading">Independent
                </div>
                <div><span style="float:left;">Age:</span><span style="float:right;"><?php echo @$escort_info["age"]; ?>'s</span></div>
                <div style="clear: both;"><span style="float:left;">Dress Size:</span><span style="float:right;"><?php echo @$escort_info["dress_size"]; ?></span></div>
                <!-- <div style="clear: both;"><span style="float:left;">Price:</span><span style="float:right;">From $800 / 1h</span></div> -->
                <div style="clear: both;"><span style="float:left;">Place of Service:</span><span style="float:right;"><?php echo @$escort_info["place_of_services"]; ?></span>
                </div>
              <!--   <div style="clear: both;"><span style="float:left;">Bust:</span><span style="float:right;"><?php echo @$escort_info["place_of_services"]; ?></span>
                </div> -->
                <div style="clear: both;"><span style="float:left;">Height:</span><span style="float:right;"><?php echo @$escort_info["height"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Eye colour:</span><span style="float:right;"><?php echo @$escort_info["eye_color"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Hair colour:</span><span style="float:right;"><?php echo @$escort_info["hair_style"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Body type:</span><span style="float:right;"><?php echo @$escort_info["body_type"]; ?></span>
                </div>
                                    <div style="clear: both; opacity: 0;"><span class="profile-quick-description">Penthouse Magazine Model Currently AWAY till 15th of SEPTEMBER</span></div>
                                            <div style="clear: both;">
                            
                     </div>
                                              
                </div>
        </div>
<img width="100%" alt="Sydney independent private escort - Tori Cummings" src="<?php echo @$profile_image ?>" class="homepage-thumbnail img-responsive">
            </a>
      </div> 
      </div>
   <?php if($i==4) {
   	  break;
   } ?>

<?php } } ?>
     
  </div>
 </div>
 <div class="container">
   <?php if(count(@$my_escort)>4) { ?>
    <div class="row text-right">
            <a href="" class="btn-primary">View More</a>
          </div>
          <?php } ?>
    <div class="row">
  <hr style="border:3px solid #fff;">
    <a href="javascript:;" data-toggle="modal" data-target="#myModal_report_for_admin" style="color: #fff;"><h4>Report this account to site ADMIN.</h4></a>
  </div>
  </div>
</section>
</div>