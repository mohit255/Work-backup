<style type="text/css">
   th.sorting {
   text-align: center;
   }
   .overlay{
   left: 5px;
   background: rgba(0,0,0,.5);
   position: absolute;
   z-index: 10000;
   width: 30.33%;
   height: 92px;
   top: 20px;
   display: none;
   }
   .overdiv{
   position: absolute;
   width: 100%;
   top: 20px;
   opacity: 0;
   border-radius: 30% 30% 30% 0;
   border: 3px solid rgba(79, 147, 186, .4);
   }
   input.form-control.js-timepick {
   font-weight: normal;
   }
   /*.img-thumb{
   width: 30.33%;
   height: 92px;
   }*/
   /*img.img-responsive.img-thumb:hover > .overlay{
   display: block;
   }*/
   .example-image-link:hover + .overlay {
   display: block;
   }
   .overdiv:hover {
   opacity: 1;
   }
   .over-img{
   position:relative;
   }
   .over-img1{
   position:absolute;
   top:36px;
   right:50px;
   display:none;
   }
   .over-img:hover .over-img1{
   display: block;
   color: #fff;
   position: absolute;
   right: 50px;
   }
   .over-img2{
   position:absolute;
   top:36px;
   right:28px;
   display:none;
   }
   .over-img:hover .over-img2{
   display: block;
   color: #fff;
   position: absolute;
   right: 28px;
   }
   span.toggle-handle.btn.btn-light {
    background: bottom;
}
.toggle-on.btn {
    padding-right: 11.5rem !important;
}
.toggle-off.btn {
    padding-left: 1.5rem;
    /*left: 21%;*/
}
label.btn.btn-primary.toggle-off {
    width: auto;
}
</style>
<div class="main-container">
   <?php 
      $default_profile_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'profile_image'")->row_array();
      $default_cover_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'cover_image'")->row_array();
      
      $user_package_info=$this->db->query("select * from membership where id='".$login_user["package_id"]."'")->row_array();
      
      // var_dump($login_user["package_id"]);
      $package_benifits=explode("*#*", $user_package_info["benifits"]);
      $package_values=explode("*#*", $user_package_info["values"]);
      // var_dump($package_values[array_search("Base locations", $package_benifits)]);
      
         $escort_review=$this->db->query("select * from feedback where to_user_id='".$login_user["USERID"]."'")->result_array();
        
         $escort_likes=$this->db->query("select count(id) as likes from escort_likes where escort_id='".$login_user["USERID"]."'")->row_array();
      
         if($login_user["package_id"])
         {
           $set_package_id=$login_user["package_id"];
           $set_package_end_time=$login_user["end_date_in_string"];
         }
         else
         {
           if(@$escort_info["agency_id"])
           {
             $get_package_id=$this->db->query("select package_id,end_date_in_string from user_login where USERID='".@$escort_info["agency_id"]."'")->row_array();
             
             $set_package_id=$get_package_id["package_id"];
              $set_package_end_time=$get_package_id["end_date_in_string"];
           }
           else
           {
             $set_package_id="";
               $set_package_end_time="";
           }
         }
      if($set_package_end_time>strtotime(date("d-M-Y")))
      {
        $get_package_data=$this->db->query("select * from membership where id='".$set_package_id."'")->row_array();
              // var_dump($get_package_data);
              $set_benifits=explode("*#*", $get_package_data["benifits"]);
              $set_value=explode("*#*",$get_package_data["values"]);
        
      }
      else
      {
         $set_benifits=[];
              $set_value=[];
      }
        // var_dump($set_benifits);
        // var_dump($set_value);
        $key_set_for_services=[];
        $lavel_set_for_services=[];
        foreach ($services_name_for_package as $data) {
          array_push($key_set_for_services, $data["keys_set"]);
          array_push($lavel_set_for_services, $data["name"]);
        }
        // var_dump($key_set_for_services);
        // var_dump($lavel_set_for_services);
      
      
      //get data for tour start
      
       $index_tour=array_search("touring_locations", $key_set_for_services);
       $lvel_tour=$lavel_set_for_services[$index_tour];
       $index_of_benifit_tour=array_search($lvel_tour, $set_benifits);
       if($index_of_benifit_tour)
       {
        $value_of_tour=$set_value[$index_of_benifit_tour];
       }
       else
       {
        $value_of_tour="";
       }
       
      // var_dump($value_of_tour);
      //get data for tour end
      
      
      
      ?>
   <form action="<?php echo base_url();?>user/sell_service/add_escort/" method="post" novalidate>
      <input type="hidden" name="userid" id="get_user_id" value="<?php echo @$login_user["USERID"]; ?>"> 
      <input type="hidden" name="set_package_tour_limit" id="get_user_id" value="<?php echo @$value_of_tour; ?>"> 
      <input type="hidden" name="gender_set_default" id="get_gender_set_default" value="<?php echo @$login_user["gender"]; ?>"> 
      <?php 
         if(@$login_user["types"]=="Agency" || @$login_user["types"]=="Establishment") {
            
              $agencyid_set=@$login_user["USERID"];
            
         }
         else
         {
         
           $agencyid_set=$login_user["agency_id"];
         }
         
         
         
          ?>
      <input type="hidden" name="agencyid" value="<?php echo @$agencyid_set; ?>"> 
      <input type="hidden" name="user_lofin[username]" value="<?php echo @$login_user["username"]; ?>"> 
      <input type="hidden" name="user_lofin[types]" value="<?php echo @$login_user["types"]; ?>"> 
      <div class="container-fluid">
         <div class="row gutter">
            <div class="col-md-12">
               <div class="user-account">
                  <div id="set_cover_image">
                     <input type="hidden" name="user_lofin[cover_image]" value="<?php echo @$login_user["cover_image"]; ?>">
                     <?php if(@$login_user["cover_image"]) {
                        $image_cover="assets/uploads/".@$login_user["cover_image"];
                        } 
                        else{
                        $image_cover='assets/uploads/default/'.$default_cover_image["name"];
                        }
                        ?>
                  </div>
                  <div id="avatar_cover" style="background: url(<?php echo @$image_cover; ?>) 100%; height: 420px; background-repeat:no-repeat; background-size: 100% 100%; position: relative; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px"></div>
                  <?php if(@$login_user["types"]=="Escort") { ?>
                  <div class="user-pic">
                     <label class="label" data-toggle="tooltip" title="" data-original-title="Change your profile image">
                        <div id="set_profile_image">
                           <input type="hidden" name="user_lofin[profile_image]" value="<?php echo @$login_user["user_thumb_image"]; ?>">
                           <?php if(@$login_user["user_thumb_image"]) {
                              $image="assets/uploads/".@$login_user["user_thumb_image"];
                              } 
                              else{
                              $image='assets/uploads/default/'.$default_profile_image["name"];
                              }
                              ?>
                        </div>
                        <img src="<?php echo @$image; ?>" id="avatar" style="height: 211px;" alt="Sunrise Admin">
                        <a>
                           <div class="overdiv" style="background: rgba(0,0,0,.5); height:211px;">
                              <p style="  font-size: 16px; color: #fff; position: relative; top: 50%;">Change Image</p>
                           </div>
                        </a>
                        <input type="file" class="sr-only" id="input" name="image" accept="image/*">
                     </label>
                  </div>
                  <?php } ?>
                  <div class="user-details">
                     <?php if(@$login_user["types"]=="Escort") { ?>
                     <h4 class="user-name"><i style="background-color: rgba(0,0,0,.5);"><?php echo @$login_user["fullname"]; ?></i></h4>
                     <?php } ?>
                     <!-- <h5 class="description">Hi, I'm a UX Designer from Chicago. I like to design web and mobile products that look good and work well.</h5> -->
                  </div>
                  <div class="social-list">
                     <div class="row gutter">
                        <div class="col-md-6 col-md-offset-3">
                           <div class="row">
                              <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 center-text">
                                 <h3><?php echo @$escort_likes["likes"]; ?></h3>
                                 <small>Likes</small>
                              </div>
                              <div class="col-md-3 col-sm-3 col-xs-3 center-text">
                                 <h3><?php echo count($escort_review); ?></h3>
                                 <small>Review</small>
                              </div>
                           </div>
                        </div>
                        <div class="col-md-3">
                           <div class="col-md-1 col-md-offset-8">
                              <div style="margin-top: 55%;">
                                 <label class="label" data-toggle="tooltip_2" title="" data-original-title="Change your cover image">
                                 <img src="assets/images/582x350.jpg" style="display: none;" alt="Sunrise Admin">
                                 <a style="color: #fff;"><i class="fa fa-camera-retro" style="font-size: 26px;"></i></a>
                                 <input type="file" class="sr-only" id="input_cover" name="image_cover" accept="image/*">
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <?php  
            if(@$this->session->flashdata('message'))
            { ?>
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-success alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo @$this->session->flashdata('message'); ?>
               </div>
            </div>
         </div>
         <?php }
            ?>   
         <?php  
            if(@$this->session->flashdata('fail'))
            { ?>
         <div class="row">
            <div class="col-md-12">
               <div class="alert alert-danger alert-dismissible">
                  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                  <?php echo @$this->session->flashdata('fail'); ?>
               </div>
            </div>
         </div>
         <?php }
            ?>   
         <div class="row gutter">
            <div class="col-lg-9">
               <div class="panel panel-red">
                  <div class="panel-heading">
                     <h4><font style="font-size: 13px;"><a title="Profile Preview" target="_blank" href="<?php echo  base_url()."".strtolower(@$login_user["types"])."/".@$login_user["USERID"]."/".@$login_user["fullname"];?>"><button type="button" class="btn btn-primary">
                        <?php
                           // if($get_escort_profile)
                                     echo $login_user["types"]." Info";
                           
                           // }
                           ?>
                        </button></a></font>
                     </h4>
                     <?php 
                     $ltype = $this->db->query("SELECT * FROM `user_login` WHERE `USERID` = '".$this->session->userdata('SESSION_USER_ID')."'")->row_array();
                     // var_dump($ltype['types']);
                     if($ltype['types'] != 'Establishment' && $ltype['types'] !=  'Agency')
                     {
                     if(@$login_user["types"] == "Escort"){ ?>
                       <div class="pull-right">
                        <input type="checkbox" class="change_online_status" <?php if(@$login_user["available_till"] > date('Y-m-d H:i:s')){ echo "checked disabled"; }else{ echo 'id="status_1"';}?>   name="status_1" data-toggle="toggle" data-on="Online" data-off="Offline" data-onstyle="success" data-offstyle="primary">
                        <!-- <input class="change_status" type="checkbox" name="staus_change" id="staus_change"><label class="searchtype2label"></label></input> -->
                     </div>
                     <?php
                     }
                   }
                     ?> 
                    

                  </div>
                  <div class="panel-body">
                     <div class="tabbable">
                        <ul class="nav nav-tabs">
                           <li class="active"><a href="#one" data-toggle="tab" aria-expanded="true"><?php //echo date('Y-m-d H:i:s'); ?>Profile</a></li>
                           <li class=""><a href="#two" data-toggle="tab" aria-expanded="false"><?php //echo @$login_user["available_till"]; ?>About</a></li>
                           <li class=""><a href="#fifth" data-toggle="tab" aria-expanded="false">Availability</a></li>
                           <li class=""><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews</a></li>
                           <?php if(@$login_user["types"]!="Escort") { ?>
                           <li class=""><a href="#my_escort_show" data-toggle="tab" aria-expanded="false">My Escort</a></li>
                           <?php } ?>
                           <?php  if(@$login_user["types"]=="Escort") { ?>
                           <li class=""><a href="#three" data-toggle="tab" aria-expanded="false">My Services</a></li>
                           <li class=""><a href="#tour" data-toggle="tab" aria-expanded="false">My Tour</a></li>
                           <li class=""><a href="#rates" data-toggle="tab" aria-expanded="false">Rates</a></li>
                           <?php } ?> 
                           <?php if(!@$escort_info["agency_id"]) { ?>
                           <li class=""><a href="#fourth" data-toggle="tab" aria-expanded="false">Orders</a></li>
                           <li class=""><a href="#five_dsp" data-toggle="tab" aria-expanded="false">Suburbs</a></li>
                           <?php } else
                              {
                                  if(@$login_user["types"]!="Escort")
                                  { ?>
                           <li class=""><a href="#fourth" data-toggle="tab" aria-expanded="false">Orders</a></li>
                           <li class=""><a href="#five_dsp" data-toggle="tab" aria-expanded="false">Suburbs</a></li>
                           <?php  }
                              } 
                              
                              ?>
                        </ul>
                        <div class="tab-content no-margin">
                           <div class="tab-pane" id="my_escort_show">
                              <div class="row">
                                 <div class="col-md-6"> 
                                    <?php
                                       if(count($my_escort) >= 7)
                                       {
                                        ?>
                                    <a>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#escort_limit_alert_message">Add New Escort</button>
                                    </a>
                                    <?php
                                       }
                                       else
                                       {?>
                                    <a href="escort-profile/" target="_blank">
                                    <button type="button" class="btn btn-primary">Add New Escort</button>
                                    </a>
                                    <?php 
                                       } 
                                       ?>
                                 </div>
                              </div>
                              <br>
                              <hr>
                              <br>
                              <div class="row">
                                 <?php
                                    if(@$my_escort) { foreach ($my_escort as $escort_get) { 
                                       $get_escort_profile=$this->db->query("select * from user_login where USERID='".$escort_get["escort_id"]."'")->row_array();
                                    
                                      $user_thumb_image="assets/images/".$default_profile_image["name"];
                                      if(@$get_escort_profile['user_thumb_image'])
                                      {
                                         $user_thumb_image="assets/uploads/".$get_escort_profile['user_thumb_image'];
                                      }
                                    
                                    ?>
                                 <div class="col-md-4">
                                    <div class="profile-image-cities escort">
                                       <a href="javascript:;" class="click_to_delete_escort" data-id="<?php echo @$get_escort_profile["USERID"]; ?>">
                                          <div class="profile-name badge" style="height: 35px; padding: 13px;">Delete</div>
                                       </a>
                                       <a target="_blan" href="escort-profile<?php echo "/".@$get_escort_profile["USERID"]."/".implode("-",explode(" ", @$get_escort_profile["fullname"])); ?>">
                                          <div class="profile-quickstats">
                                             <div class="profile-quickstats--heading">Based in 
                                                <span><?php echo @$escort_get["main_location"]; ?></span>
                                             </div>
                                             <div class="profile-quickstats--details">
                                                <div><span style="float:left;">Age:</span>
                                                   <span style="float:right;"><?php echo @$escort_get["age"]; ?>'s</span>
                                                </div>
                                                <div style="clear: both;">
                                                   <span style="float:left;">Dress Size:</span>
                                                   <span style="float:right;"><?php echo @$escort_get["dress_size"]; ?></span>
                                                </div>
                                                <div style="clear: both;">
                                                   <span style="float:left;">Place of Service:</span>
                                                   <span style="float:right;"><?php echo @$escort_get["place_of_services"]; ?></span>
                                                </div>
                                                <!-- <div style="clear: both; opacity: 0"><span class="profile-quick-description">Penthouse Magazine Model Currently AWAY till 15th of SEPTEMBER</span></div> -->
                                             </div>
                                          </div>
                                          <img width="100%" src="<?php echo $user_thumb_image ?>" alt="<?php echo @$get_escort_profile['fullname']; ?>" class="homepage-thumbnail img-responsive">
                                       </a>
                                       <div class="profile-quickstats--heading1" style="text-align: center;"><?php echo @$get_escort_profile['fullname']; ?>
                                       </div>
                                    </div>
                                 </div>
                                 <?php  } } ?>
                              </div>
                           </div>
                           <div class="tab-pane" id="reviews">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h5><u>Reviews </u></h5>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <div class="table-responsive">
                                             <table id="" class="table table-striped table-condensed table-bordered no-margin  myTable">
                                                <thead>
                                                   <tr>
                                                      <th>#</th>
                                                      <th>User Name</th>
                                                      <th>Date</th>
                                                      <th>Reating</th>
                                                      <th style="width: 200px;">Message</th>
                                                      <th>Status</th>
                                                   </tr>
                                                </thead>
                                                <!--  <tfoot>
                                                   <tr>
                                                     <th>#</th>
                                                     <th>Place</th>
                                                     <th>From Date</th>
                                                     <th>To Date</th>
                                                     <th>Status</th>
                                                     <th></th>
                                                   </tr>
                                                   </tfoot> -->
                                                <tbody>
                                                   <?php if(@$escort_review) {  $i=0; foreach($escort_review as $review) { ?>
                                                   <tr>
                                                      <th><?php echo @$i+1; ?></th>
                                                      <th><?php echo @$review["from_user"]; ?></th>
                                                      <th><?php echo @$review["created_date"]; ?></th>
                                                      <th>
                                                         <div style="width: 120px; height: 29px;position: absolute;"></div>
                                                         <span class="starrr"  data-rating="<?php echo @$review["rating"]; ?>"></span>
                                                      </th>
                                                      <th>
                                                         <?php if(strlen(@$review["comment"])>50) {
                                                            echo substr(@$review["comment"],0,50)."...";
                                                             echo '<br><a href="javascript:;" class="get_full_review" data-id="'.@$review["id"].'"><u>Read More</u></a>';
                                                                } 
                                                                else
                                                                {
                                                                  echo @$review["comment"];
                                                                } 
                                                                ?>
                                                      </th>
                                                      <th>
                                                         <?php
                                                            $status = 'Inactive'; if($review['status']==0){$status = 'Active';}
                                                                   echo @$status; ?>
                                                      </th>
                                                   </tr>
                                                   <?php } } ?>                                        
                                                </tbody>
                                             </table>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="fifth">
                              <div class="row">
                                 <div class="col-md-12 main-content">
                                    <!--<div class="sidebar-shadow"></div>-->
                                    <!--   <?php var_dump(strtotime('23-Dec-2018')); ?> -->
                                    <div class="section-legend">
                                       <h4>Legend</h4>
                                       <button type="submit" class="btn btn-sm btn-primary btn-add">Update</button>
                                       <hr>
                                       <span class="section-legend__item--today">Indicates Today</span>
                                       <?php if(!@$escort_availability["dates"]) { ?>
                                       <button type="button" class="btn btn-primary get_days_click_do_code_in_custom_js" value="7">7 Days</button>
                                       <button type="button" class="btn btn-primary get_days_click_do_code_in_custom_js" value="14">14 Days</button>
                                       <button type="button" class="btn btn-primary get_days_click_do_code_in_custom_js" value="28">28 Days</button>
                                       <?php   } else { ?>
                                       <?php   } ?>
                                    </div>
                                    <h1>My Availability</h1>
                                    <p>First, select a schedule cycle. Then, uncheck the days you do&nbsp;not work.<br>
                                       On&nbsp;the days you work,&nbsp;enter the relevant times for that day!<br>
                                       <br>
                                       7 day schedule will repeat&nbsp;the same&nbsp;weeks&nbsp;roster.<br>
                                       14 day schedule will repeat a fortnights set roster.<br>
                                       28 day schedule to&nbsp;show random availability.<br>
                                       You can change your availability at any&nbsp;time.&nbsp;
                                    </p>
                                    <div class="my-account-section--availability js-update-panel">
                                       <div id="AvailabilityCalendar_updUpdate">
                                          <div class="availability-table-container" id="show_week_data_form">
                                             <input type="hidden" name="duration_play" value="<?php echo  @$escort_availability["plan"]; ?>">
                                             <input type="hidden" name="packeg_start_date" value="<?php echo @$escort_availability["packeg_start_date"]; ?>">
                                             <?php 
                                                // var_dump($escort_availability["packeg_finish_date"]);
                                                       if(@$escort_availability["dates"])
                                                          {
                                                                   $days=explode("*#*", @$escort_availability["days"]);
                                                                   $dates=explode("*#*", @$escort_availability["dates"]);
                                                                   // var_dump($dates);
                                                                   $time=explode("*#*", @$escort_availability["time"]);
                                                                   $duration=explode("*#*", @$escort_availability["duration"]);
                                                                  // var_dump(count(@$dates));
                                                                   $k=0;
                                                                  // var_dump();@$escort_availability["packeg_start_date"];
                                                                  // var_dump(date("d-M-Y", strtotime()));
                                                
                                                                   for($i=0; $i<@$escort_availability["plan"]; $i++)
                                                                   {
                                                                      
                                                
                                                                      
                                                
                                                                       if($i%7==0)
                                                                       {
                                                                         $k=$k+1;
                                                                         echo '<h4>Week '.$k.'</h4>';
                                                                       }
                                                     $date = date('d-M-Y', strtotime('+'.$i.' days', strtotime(@$escort_availability["packeg_start_date"])));
                                                     $dayname = date('D', strtotime('+'.$i.' days', strtotime(@$escort_availability["packeg_start_date"])));
                                                     // var_dump($date);
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
                                                
                                                   if($date==date("d-M-Y"))
                                                    {
                                                       $set_class_data_for_today="availability-table__entry--today";
                                                    }
                                                    else
                                                    { 
                                                      $set_class_data_for_today="";
                                                    }
                                                          $set_date=$date;
                                                              $set_days=$day_name;
                                                          if(in_array($date, $dates))
                                                          {
                                                           
                                                            $set_status_for_check_box='checked=""';
                                                
                                                           $set_time=explode("==",$time[$i]);
                                                           
                                                           $from_time=@$set_time["0"];
                                                           $to_time=$set_time["1"];
                                                            $set_duration=$duration[$i];
                                                            $for_all_day="";
                                                            $for_till_late="";
                                                            $for_appointment="";
                                                            $for_times="";
                                                            if($set_duration=="All day")
                                                            {
                                                             $for_all_day='checked="true"';
                                                            }
                                                            if($set_duration=="Till late")
                                                            {
                                                             $for_till_late='checked="true"';
                                                            }
                                                            if($set_duration=="By appointment")
                                                            {
                                                             $for_appointment='checked="true"';
                                                            }
                                                
                                                            if($set_duration=="times")
                                                            {
                                                             $for_times='checked="true"';
                                                            }
                                                          }
                                                            else
                                                            {
                                                              $set_status_for_check_box="";
                                                             
                                                              $from_time="NULL";
                                                              $to_time="NULL";
                                                              $for_all_day="";
                                                              $for_till_late="";
                                                              $for_appointment="";
                                                            }
                                                                  // var_dump($set_duration);
                                                                  // var_dump($for_till_late);
                                                                      ?>
                                             <div class="availability-table__entry <?php echo @$set_class_data_for_today; ?>">
                                                <div class="availability-table__entry__name">
                                                   <div class="checkbox">
                                                      <div class="availability-table__entry__name__day"> <input id="day_set_<?php echo $set_date; ?>" type="checkbox" <?php echo $set_status_for_check_box; ?> name="days_and_date[]" value="<?php echo $set_days."_".$set_date; ?>"> <label for="day_set_<?php echo $set_date; ?>"><?php echo @$set_days; ?></label> </div>
                                                      <span class="availability-table__entry__name__date"><?php echo @$set_date; ?></span> 
                                                   </div>
                                                </div>
                                                <div class="availability-table__entry__times-range"> <span class="times-range-from"> <input name="from_time_<?php echo @$set_date; ?>[]" type="text" value="<?php echo @$from_time; ?>" class="form-control js-timepick">&nbsp;&nbsp;<input id="times_<?php echo $set_date; ?>" type="radio" name="duration[duration_<?php echo $set_date; ?>]" value="times" <?php echo @$for_times; ?>> </span> <span class="times-range-to"><input name="to_time_<?php echo $set_date; ?>[]" type="text" value="<?php echo $to_time; ?>" class="form-control js-timepick" style="font-weight: normal;"> </span> </div>
                                                <div class="availability-table__entry__times-set">
                                                   <div class="checkbox"> <span class="times-set-till-late"> <input id="till_<?php echo $set_date; ?>" type="radio" name="duration[duration_<?php echo $set_date; ?>]" value="Till late" <?php echo @$for_till_late; ?>><label for="till_<?php echo $set_date; ?>">Till late</label> </span> <span class="times-set-all-day"> <input id="day_<?php echo $set_date; ?>" type="radio" name="duration[duration_<?php echo $set_date; ?>]" <?php echo @$for_all_day; ?> value="All day"><label for="day_<?php echo $set_date; ?>">All day</label></span> <span class="times-set-by-appointment"> <input id="appo_<?php echo $set_date; ?>" type="radio" name="duration[duration_<?php echo $set_date; ?>]" value="By appointment" <?php echo  $for_appointment; ?>><label for="appo_<?php echo $set_date; ?>">By appointment</label></span> </div>
                                                </div>
                                             </div>
                                             <?php
                                                }
                                                
                                                }
                                                ?>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="tour">
                              <div class="row">
                                 <div class="col-md-12 main-content">
                                    <!--<div class="sidebar-shadow"></div>-->
                                    <h1 style="color:#000;">My Touring</h1>
                                    <div class="my-account-section--availability js-update-panel">
                                       <div id="">
                                          <?php 
                                             if(@$set_package_id) { 
                                              if($set_package_end_time>strtotime(date("d-M-Y")))
                                                       { 
                                               if(@$package_values[array_search("Touring locations", $package_benifits)]=="Yes")
                                                { 
                                             
                                             ?>
                                          <div class="row">
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <div class="editing-form-label-cell">
                                                      <label for="" class="control-label editing-form-label">Place</label>
                                                   </div>
                                                   <div class="">
                                                      <!--   <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Place"> -->
                                                      <select name="tour[place]" class="form-control states_of_select_2">
                                                         <?php if(!@$citys["city"]) { ?>
                                                         <option value="">select place</option>
                                                         <?php } ?> 
                                                         <?php if($citys) { foreach ($citys as $place) {  ?>
                                                         <option value="<?php echo $place["city"] ;?>"><?php echo $place["city"] ;?></option>
                                                         <?php  }  }  ?>
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <div class="editing-form-label-cell">
                                                      <label for="" class="control-label editing-form-label">From:</label>
                                                   </div>
                                                   <div class="">
                                                      <input type="text" class="form-control date_picker" aria-label="Amount (rounded to the nearest dollar)" placeholder="Date" name="tour[start_tour]">
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-md-4">
                                                <div class="form-group">
                                                   <div class="editing-form-label-cell">
                                                      <label for="" class="control-label editing-form-label">To:</label>
                                                   </div>
                                                   <div class="">
                                                      <input type="text" class="form-control return_date" aria-label="Amount (rounded to the nearest dollar)" placeholder="Date" name="tour[end_tour]">
                                                      <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <?php  } 
                                             else
                                             { 
                                                
                                                 ?>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="alert alert-warning">
                                                   <strong>Warning!</strong> According to your package your tour limit is finish.
                                                </div>
                                             </div>
                                          </div>
                                          <?php
                                             }
                                             ?>
                                          <?php  }
                                             else
                                                 { ?>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="alert alert-warning">
                                                   <strong>Warning!</strong> Your Package time duration is finish.<a href="price-table-for/<?php echo @$login_user["types"]; ?>"><button type="button" class="btn btn-primary">Buy Package</button></a> other byes your all tour is cancel.
                                                </div>
                                             </div>
                                          </div>
                                          <?php  } ?>
                                          <?php } else {?>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <div class="alert alert-warning">
                                                   <strong>Warning!</strong> First buy a package for create tour.<a href="price-table-for/<?php echo @$login_user["types"]; ?>"><button type="button" class="btn btn-primary">Buy Package</button></a>
                                                </div>
                                             </div>
                                          </div>
                                          <?php } ?>
                                          <div class="row">
                                             <div class="col-md-12">
                                                <table id="" class="table table-striped table-condensed table-bordered no-margin  myTable">
                                                   <thead>
                                                      <tr>
                                                         <th>#</th>
                                                         <th>Place</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                         <th>Status</th>
                                                         <th></th>
                                                      </tr>
                                                   </thead>
                                                   <!--  <tfoot>
                                                      <tr>
                                                         <th>#</th>
                                                         <th>Place</th>
                                                         <th>From Date</th>
                                                         <th>To Date</th>
                                                          <th>Status</th>
                                                          <th></th>
                                                              
                                                           </tr>
                                                        </tfoot> -->
                                                   <tbody>
                                                      <?php if(@$escort_tour) {
                                                         $l=0;
                                                                foreach($escort_tour as $tour)
                                                                 {
                                                         $l=$l+1;
                                                                  ?>
                                                      <tr id="Edit_tour_<?php echo @$tour["id"]; ?>">
                                                         <td><?php echo $l; ?></td>
                                                         <td><?php echo @$tour["place"];  ?></td>
                                                         <td><?php echo @$tour["from_date"];  ?></td>
                                                         <td>
                                                            <?php echo @$tour["to_date"];  ?>
                                                         </td>
                                                         <td>
                                                            <?php if(@$tour["ture_status"]=="Pending") {
                                                               $set_class="warning";
                                                               } 
                                                               if(@$tour["ture_status"]=="Running") {
                                                               $set_class="success";
                                                               }
                                                               if(@$tour["ture_status"]=="Done") {
                                                               $set_class="info";
                                                               }
                                                               ?>
                                                            <span class="label label-<?php echo  @$set_class; ?>"><?php echo @$tour["ture_status"];  ?></span>
                                                         </td>
                                                         <td>
                                                            <?php if(@$tour["ture_status"]!="Done") { ?>
                                                            <a href="javascript:;" class="delete_tour_rate" data-id="escort_tour-<?php echo @$tour["id"]; ?>"> <i class="fa fa-trash" style="font-size: 26px;"></i></a>
                                                            <?php  } ?>
                                                         </td>
                                                      </tr>
                                                      <?php }
                                                         } ?>
                                                   </tbody>
                                                </table>
                                             </div>
                                          </div>
                                          <!-- <input type="submit" name="" value="Save Touring Schedule" class="btn-primary"> -->
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="rates">
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="col-md-12">
                                       <div class="row">
                                          <div class="col-md-2">
                                             <h3>Rates</h3>
                                          </div>
                                          <!-- <div class="col-md-2">
                                             <button type="submit" class="btn btn-sm btn-primary btn-add">Update</button>
                                             </div> -->
                                       </div>
                                       <!-- <div class="col-md-3">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">Type</label>
                                          </div>
                                          <div class="editing-form-value-cell">
                                              <select name="escort_rate[type]" id="" class="form-control">
                                                <option value="" selected="selected" disabled>Type</option>
                                                <option value="In-Call">In-Call</option>
                                                <option value="Out-Call">Out-Call</option>
                                               </select>
                                          
                                          </div>
                                          </div> -->
                                       <div class="col-md-3">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">Call Duration</label>
                                          </div>
                                          <div class="editing-form-value-cell">
                                             <select name="escort_rate[duration]" id="" class="form-control" required="">
                                                <option value="" selected="selected">- Duration -</option>
                                                <option value="45min">45min</option>
                                                <option value="1 hour">1 hour</option>
                                                <option value="2 hour">2 hour</option>
                                                <option value="6 hour">6 hour</option>
                                                <option value="Overnight">Overnight</option>
                                             </select>
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">In-Call</label>
                                          </div>
                                          <div class="input-group">
                                             <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control set_number_only" name="escort_rate[in_price]" aria-label="Amount (rounded to the nearest dollar)" placeholder="In-Call" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-3">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">Out-Call</label>
                                          </div>
                                          <div class="input-group">
                                             <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control set_number_only" name="escort_rate[out_price]" aria-label="Amount (rounded to the nearest dollar)" placeholder="Out-Call" required="">
                                          </div>
                                       </div>
                                       <div class="col-md-3" style="margin-top: 23px;">
                                          <button type="submit" class="btn btn-primary btn-add">
                                          <i class="fa fa-plus"></i> Add more</button>
                                       </div>
                                       <!--  <div class="col-md-12"><br>
                                          <div id="show-my-services"></div> 
                                          </div> -->
                                       <!-- <div class="col-md-3">
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Additional Information</label>
                                          </div>
                                          <div class="input-group">
                                            <input type="text" class="form-control" name="escort_rate[information]" aria-label="Amount (rounded to the nearest dollar)" placeholder="Additional Information">
                                          </div>
                                          </div> -->
                                    </div>
                                    <div class="row">
                                       <div class="col-md-12">
                                          <br>
                                          <table id="" class="table table-striped table-condensed table-bordered no-margin  myTable">
                                             <thead>
                                                <tr>
                                                   <th>#</th>
                                                   <!--  <th>Type</th> -->
                                                   <th>Duration</th>
                                                   <th>In-Call</th>
                                                   <th>Out-Call</th>
                                                   <th></th>
                                                </tr>
                                             </thead>
                                             <!--  <tfoot>
                                                <tr>
                                                
                                                                 
                                                                                       <th>#</th>
                                                                                       <th>Type</th>
                                                                                       
                                                                                       <th>Duration</th>
                                                                                       
                                                                                       <th>Price</th>
                                                                                       <th>Additional Information</th>
                                                                                       <th></th>
                                                                                       
                                                                                    </tr>
                                                                                 </tfoot> -->
                                             <tbody>
                                                <?php 
                                                   if(@$escort_rates) {
                                                    $l=0;
                                                    foreach($escort_rates as $tour)
                                                         {
                                                    $l=$l+1;
                                                          ?>
                                                <tr id="Edit_tour_<?php echo @$tour["id"]; ?>">
                                                   <td><?php echo $l; ?></td>
                                                   <!--  <td><?php echo @$tour["call_type"];  ?></td -->
                                                   <td><?php echo @$tour["duration"];  ?></td>
                                                   <td> <?php echo "$".@$tour["in_price"];  ?> </td>
                                                   <td> <?php echo @$tour["out_price"];  ?> </td>
                                                   <td>
                                                      <a href="javascript:;" class="delete_tour_rate" data-id="<?php echo "escort_rate-".@$tour["id"]; ?>"> <i class="fa fa-trash" style="font-size: 26px;"></i></a>
                                                   </td>
                                                </tr>
                                                <?php }
                                                   } ?>
                                             </tbody>
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane active" id="one">
                              <div class="row">
                                 <div class="col-md-4">
                                    <h4>Name</h4>
                                    <p>
                                       <input type="text" name="user_lofin[name]" class="form-control" value="<?php echo @$login_user["fullname"]; ?>" placeholder="Display Name" required="">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>Email</h4>
                                    <p>
                                       <?php if(@$login_user["email"])
                                          {
                                             $set_attr='readonly=""';
                                          }
                                          else
                                          {    
                                             $set_attr='';
                                          }
                                          ?>
                                       <input type="text"  name="user_lofin[email]" <?php echo @$set_attr ?> class="form-control" placeholder="Email" value="<?php echo @$login_user["email"]; ?>" required="">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>Contact</h4>
                                    <p>
                                       <input type="text" name="user_lofin[contact]" maxlength="11" class="form-control set_number_only" value="<?php echo @$login_user["contact"]; ?>"  required="">
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <h4>STATE OR TERRITORY</h4>
                                    <p>
                                       <select class="form-control" name="escort_info[state]" id="state_get" required="">
                                          <?php if(!@$escort_info["state"]) { ?>
                                          <option value="">STATE OR TERRITORY</option>
                                          <?php } ?> 
                                          <?php if($state) {foreach ($state as $sta) {
                                             if($sta['state']==@$escort_info["state"])
                                             {
                                               $set_sta='selected=""';
                                             }
                                             else
                                             {
                                               $set_sta="";
                                             }
                                                             
                                                               #?>
                                          <option value="<?php echo $sta['state']; ?>" <?php echo @$set_sta; ?>><?php echo $sta['state']; ?></option>
                                          <?php
                                             } } ?>
                                       </select>
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4> MAIN LOCATION</h4>
                                    <p>
                                       <select class="form-control" name="escort_info[main_location]" id="main_location_set">
                                          <?php if(!@$escort_info["main_location"]) { ?>
                                          <option value="">Select City</option>
                                          <?php } ?>
                                          <?php  $citys=$this->db->query("SELECT * FROM `location` WHERE `state`= '".@$escort_info["state"]."' ORDER BY `city` ASC")->result_array();
                                             ?>
                                          <?php if($citys) {foreach ($citys as $sta) {
                                             if($sta['city']==@$escort_info["main_location"])
                                             {
                                               $set_sta='selected=""';
                                             }
                                             else
                                             {
                                               $set_sta="";
                                             }
                                                             
                                                               #?>
                                          <option value="<?php echo $sta['city']; ?>" <?php echo @$set_sta; ?>><?php echo $sta['city']; ?></option>
                                          <?php
                                             } } ?>
                                          <!--  <option value="<?php echo $escort_info['main_location']; ?>"><?php echo $escort_info['main_location']; ?></option> -->
                                       </select>
                                    </p>
                                 </div>
                                 <!-- <div class="col-md-4">
                                    <h4> SUB LOCATION</h4>
                                    <p>
                                     <input type="text" name="escort_info[sub_location]" class="form-control"  value="<?php echo $escort_info['sub_location']; ?>" >
                                    </p>
                                    </div> -->
                                 <div class="col-md-4">
                                    <?php
                                       $val=explode("*#*", $escort_info['sub_location']);
                                       ?> 
                                    <h4>SUB LOCATION</h4>
                                    <p>
                                       <select class="form-control locationMultiple"  multiple="multiple" 
                                          name="sub_location[]" required="">
                                          <?php
                                             if($val)
                                             {
                                             
                                             $for_escort_ml_in_array=explode("*#*",@$escort_info['sub_location']);  
                                               ?>
                                          <option value="">Select Location </option>
                                          <?php
                                             for($i=0; $i<count($val); $i++)
                                             { 
                                             
                                             if(in_array($val[$i], $for_escort_ml_in_array))
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                             if($val[$i]=="")
                                             {
                                             $set_sta="";
                                             }  
                                             
                                              ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                                 <?php               //var_dump(count($val));
                                    //             var_dump($val);
                                    // var_dump($for_escort_ml_in_array);
                                                // var_dump($set_sta);
                                                // var_dump($val);
                                     ?>
                                 <!--  -->
                              </div>
                              <?php if(@$login_user["types"]=="Escort") { ?>
                              <div class="row">
                                 <div class="col-md-4">
                                    <?php $title=$drop_down["2"]["title"];
                                       $val=explode("*#*", $drop_down["2"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[eyes]" required="">
                                          <?php if(!@$escort_info["eye_color"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             if($val[$i]==@$escort_info["eye_color"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <?php $title=$drop_down["1"]["title"];
                                       $val=explode("*#*", $drop_down["1"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[hair]" required="">
                                          <?php if(!@$escort_info["hair_style"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             
                                             if($val[$i]==@$escort_info["hair_style"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?> ><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                                 <div class="col-md-4 col-sm-6 col-xs-12">
                                    <?php $title=$drop_down["0"]["title"];
                                       $val=explode("*#*", $drop_down["0"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[body_type]" required="">
                                          <?php if(!@$escort_info["body_type"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             
                                             if($val[$i]==@$escort_info["body_type"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6">
                                    <?php $title=$drop_down["3"]["title"];
                                       $val=explode("*#*", $drop_down["3"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[orientation]" required="">
                                          <?php if(!@$escort_info["orientation"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             if($val[$i]==@$escort_info["orientation"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                                 <div class="col-md-6">
                                    <?php $title=$drop_down["4"]["title"];
                                       $val=explode("*#*", $drop_down["4"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[ethnicity]" required="">
                                          <?php if(!@$escort_info["ethnicity"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             
                                             if($val[$i]==@$escort_info["ethnicity"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?> ><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $title=$drop_down["5"]["title"];
                                       $val=explode("*#*", $drop_down["5"]["value"]);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control" name="escort_info[bust_size]" >
                                          <?php if(!@$escort_info["bust_size"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             
                                             if($val[$i]==@$escort_info["body_type"])
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                                 <div class="col-md-6 col-sm-6 col-xs-12">
                                    <?php $title=$drop_down["6"]["title"];
                                       $val=explode("*#*", $drop_down["6"]["value"]);
                                       // var_dump($val);
                                       ?> 
                                    <h4><?php echo $title; ?></h4>
                                    <p>
                                       <select class="form-control locationMultiple"  multiple="multiple" 
                                          name="set_data_escort_for[]" required="">
                                          <?php if(!@$escort_info["escort_for"]) { ?>
                                          <option value="">Select <?php echo $title; ?></option>
                                          <?php } ?>
                                          <?php
                                             if($val)
                                             {
                                             
                                             $for_escort_for_in_array=explode("*#*",@$escort_info["escort_for"]); 	
                                                for($i=0; $i<count($val); $i++)
                                                { 
                                             
                                             if(in_array($val[$i], $for_escort_for_in_array))
                                             {
                                             $set_sta='selected=""';
                                             }
                                             else
                                             {
                                             $set_sta="";
                                             }
                                             
                                             
                                                 ?>
                                          <option value="<?php echo @$val[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$val[$i]; ?></option>
                                          <?php }
                                             }
                                                  ?>    
                                       </select>
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <h4>AGE</h4>
                                    <p>
                                       <input type="text" name="escort_info[age]" maxlength="2" value="<?php echo @$escort_info["age"]; ?>" class="form-control set_number_only">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>DRESS SIZE</h4>
                                    <p>
                                       <input type="text" name="escort_info[dress_size]" value="<?php echo @$escort_info["dress_size"]; ?>" class="form-control">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>PLACE OF SERVICE</h4>
                                    <p>
                                       <input type="text" name="escort_info[service_place]" class="form-control" value="<?php echo @$escort_info["place_of_services"]; ?>">
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4 col-sm-6 col-xs-12">
                                    <h4>PHONE FOR SMS ONLY</h4>
                                    <p>
                                       <input type="text" required name="escort_info[sms_phone_no]" maxlength="11" value="<?php echo @$escort_info["sms_number"]; ?>" class="form-control set_number_only">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>HEIGHT</h4>
                                    <p>
                                       <input type="text" name="escort_info[height]" class="form-control" value="<?php echo @$escort_info["height"]; ?>" required="">
                                    </p>
                                 </div>
                                 <div class="col-md-4 col-sm-6 col-xs-12">
                                    <h4>Gender</h4>
                                    <p>
                                       <select class="form-control" name="user_lofin[gender]">
                                          <?php $types=['Select Gender','Male','Female','Trans']; ?>
                                          <?php 
                                             for($i=0; $i<count($types); $i++) {
                                             
                                             if(@$login_user["gender"]==$types[$i])
                                             {
                                             $set_select='selected=""';
                                             }
                                             else
                                             {
                                             $set_select='';
                                             }
                                             
                                             if($types[$i]=="Select Gender")
                                             {
                                             $val="";
                                             }
                                             else
                                             {
                                             $val=$types[$i];
                                             }
                                               ?>
                                          <option value="<?php echo @$val; ?>" <?php echo $set_select; ?>><?php echo @$types[$i]; ?></option>
                                          <?php
                                             } ?>
                                       </select>
                                    </p>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-4">
                                    <h4>PHOTOS</h4>
                                    <p>
                                       <?php if($package_values[array_search("Photo verfication", $package_benifits)]=="Yes")
                                          {
                                              $photo_varify='Verified';
                                          }
                                          else
                                          {
                                            $photo_varify='Unverified';
                                          }
                                          ?>
                                       <input type="text" name="escort_info[photo_status]" class="form-control" value="<?php echo @$photo_varify; ?>" readonly="true">
                                    </p>
                                    <p></p>
                                 </div>
                                 <div class="col-md-4 col-sm-6 col-xs-12">
                                    <h4>Status</h4>
                                    <p>
                                       <?php if(@$login_user["status"]==0)
                                          {
                                            $val='Active';
                                          }
                                          else
                                          {
                                            $val='Inactive';
                                          }
                                          ?>
                                       <input type="text" name="escort_info[status]" value="<?php echo $val; ?>" class="form-control" readonly="true" disabled="true">
                                    </p>
                                 </div>
                                 <div class="col-md-4">
                                    <h4>SWA NUMBER</h4>
                                    <p>
                                       <?php if(@$escort_info["state"]=="Victoria") {
                                          $set_status='';
                                          
                                          } else
                                          {
                                          $set_status='disabled="true"';
                                          }
                                          ?>
                                       <input type="text" name="escort_info[swa_number]"  value="<?php echo @$escort_info["swa_number"]; ?>" id="set_class_for_victoria" class="form-control set_number_only"  placeholder="For victorian girls" <?php echo @$set_status; ?> >
                                    </p>
                                 </div>
                                 <div class="col-md-12">
                                    <center> <button type="submit" class="btn btn-primary btn-add">Update</button></center>
                                 </div>
                              </div>
                              <?php } ?>
                           </div>
                           <div class="tab-pane" id="two">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3><u>About Me</u></h3>
                                    <button type="submit" class="btn btn-sm btn-primary btn-add">Update</button>
                                    <hr>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <textarea id="ck_editor_textarea_id" class="form-control summernote" name="escort_info[about_me]"> 
                   <?php echo @$escort_info["about"]; ?>                          
                   </textarea>
                                    <script type="text/javascript" src="assets/js/ckeditor/ckeditor.js"></script><script type="text/javascript">CKEDITOR_BASEPATH = '/assets/ckeditor/';</script><script type="text/javascript">
                                       CKEDITOR.replace('ck_editor_textarea_id', {toolbar : 'Full',filebrowserBrowseUrl : 'assets/js/ckfinder/ckfinder.html',filebrowserImageBrowseUrl : 'assets/js/ckfinder/ckfinder.html?Type=Images',filebrowserFlashBrowseUrl : 'assets/js/ckfinder/ckfinder.html?Type=Flash',filebrowserUploadUrl : 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',filebrowserImageUploadUrl : 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',filebrowserFlashUploadUrl : 'assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'});
                                    </script>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="three">
                              <div class="row">
                                 <div class="col-md-6">
                                    <h3><u>My Services</u></h3>
                                    <button type="submit" class="btn btn-sm btn-primary btn-add">Update</button>
                                 </div>
                                 <div class="col-md-2 col-md-offset-4">
                                    <!-- <h3 class="pull-right"><button type="button" class="btn btn-warning btn-add">Add New</button></h3> -->
                                    <input type="checkbox" value="" name="" id="checkall_services"><label for="checkall_services">Select All</label>
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="editing-form-value-cell checkbox checkbox-list">
                                    <ul>
                                       <?php
                                          $escort_services_array=explode("*#*", @$escort_services_prefer["services"]);
                                          // var_dump(@$escort_services_array);
                                                                         if(@$escort_services) { foreach ($escort_services as $services) { 
                                          
                                                                  
                                                                  
                                                                  if(in_array(@$services["name"], $escort_services_array))
                                                                  {
                                                                    $set_states_of_chechbox='checked="true"';
                                                                  }
                                                                  else
                                                                  {
                                                                    $set_states_of_chechbox='';
                                                                  }
                                                                          ?>
                                       <li><input id="<?php echo @$services["name"]; ?>" type="checkbox"   name="escort_services[]" <?php echo @$set_states_of_chechbox; ?> class="checkitem_services"  value="<?php echo @$services["name"]; ?>"><label for="<?php echo @$services["name"]; ?>"><?php echo @$services["name"]; ?></label></li>
                                       <?php } } ?>
                                    </ul>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="fourth">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3><u>Orders</u></h3>
                                 </div>
                              </div>
                              <div class="row">
                                 <!-- <div class="col-md-6">
                                    <h4>Current Membership</h4>
                                    <br>
                                    
                                      <table class="table table-bordered no-margin">
                                          <thead>
                                             <tr>
                                                <th>Membership Type</th>
                                                <th><?php echo @$get_my_members["name"]; ?></th>
                                             </tr>
                                             <tr>
                                                <th>Membership Payment</th>
                                                <th>$<?php echo @$get_my_members["item_amount"]; ?></th>
                                             </tr>
                                             <tr>
                                                <th>Buy Date</th>
                                                <th><?php echo @$get_my_members["created_at"]; ?></th>
                                             </tr>
                                             <tr>
                                                <th>End Date</th>
                                                <th><?php echo @$get_my_members["end_date"]; ?></th>
                                             </tr>
                                            
                                                </thead>
                                       </table>
                                       <h4 class="pull-right">
                                    <a href="price-table-for/<?php echo $login_user["types"]; ?>"><button type="button" class="btn btn-sm btn-warning btn-add">Membership</button></a>
                                    </h4>
                                    </div> -->
                                 <div class="col-md-6" id="show-email-form">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-md-12">
                                    <h4>Orders Log</h4>
                                    <table class="table table-bordered no-margin myTable">
                                       <thead>
                                          <tr>
                                             <th>#</th>
                                             <th>Order No.</th>
                                             <th>Addon</th>
                                             <th>Request Date</th>
                                             <th>Status </th>
                                             <th>Edit </th>
                                          </tr>
                                       </thead>
                                       <tbody>
                                          <?php if(@$get_my_orders_log) { $i=0; foreach(@$get_my_orders_log as $order) { $i=$i+1; //var_dump($get_my_orders_log); ?>
                                          <tr>
                                             <td><?php echo @$i; ?></td>
                                             <td><?php echo @$order["order_no"]; ?></td>
                                             <td><?php echo @$order["name"]; ?></td>
                                             <td><?php echo date('d-M-Y',strtotime($order["requested_time"])); ?></td>
                                             <td>
                                                <?php
                                                   if(@$order["order_staus"] == 0){ echo "<label class='label label-warning'>Payment Pending</label>"; }elseif(@$order["order_staus"] == 1){echo "<label class='label label-success'>Completed</label>";}else{echo "<label class='label label-danger'>Canceled</label>";}
                                                     
                                                   ?>
                                             </td>
                                             <td><?php if(@$order["order_staus"] == 0){ echo "<button type='button' class='btn btn-primary btn-sm' onclick='calcel_order(".@$order['order_id'].",".@$order['user_id'].")'>Cancel</button>"; }else{ echo "<button type='button' class='btn btn-primary btn-sm disabled'>Cancel</button>";} ?>
                                          </tr>
                                          <?php } } ?>
                                       </tbody>
                                    </table>
                                 </div>
                              </div>
                           </div>
                           <div class="tab-pane" id="five_dsp">
                              <div class="row">
                                 <div class="col-md-12">
                                    <h3><u>My Suburbs</u> <button type="button" class="btn btn-primary btn-sm" id="submit_data_of_suburbs">Submit</button></h3>
                                 </div>
                              </div>
                              <div class="row">
                                 <?php 
                                    $user_suburds=$this->db->query("select * from suburbs where user_id='".$login_user["USERID"]."'")->row_array();
                                    // var_dump($user_suburds);
                                    $user_suburds_res=explode("*#*", $user_suburds["suburbs"]);
                                      for($i=0; $i<$package_values[array_search("Base locations", $package_benifits)]; $i++)
                                      { 
                                    
                                        ?>
                                 <div class="col-md-4" >
                                    <input type="text" placeholder="Enter Suburbs" value="<?php echo @$user_suburds_res[$i]; ?>" name="suburs" class="suburs form-control">
                                 </div>
                                 <?php   }
                                    ?>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 col-sx-12">
               <div class="row gutter">
                  <!-- ---------------- -->
                  <?php
                     // echo "<br>agency_id ".$escort_info["agency_id"]; 
                     // echo "<br>types ".$login_user["types"]; 
                     
                     if($login_user["types"] == "Agency" || $login_user["types"] == "Establishment")
                     {
                       // echo "Show1";
                      ?>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-blue lg-btm-margin">
                        <div class="panel-heading">
                           <div class="row">
                              <div id="myModal_alert_message_for_gallery_limit" class="modal fade" role="dialog">
                                 <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="color:#fff;">Notice</h4>
                                       </div>
                                       <div class="modal-body" style="color:#fff;">
                                          <p>
                                             You have reached maximum number of image upload limit <!-- <?php echo @$package_values[array_search("Photo upload limit", $package_benifits)]; ?> -->
                                          </p>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <input type="hidden" id="upload_gallery_images_number" value="<?php echo @$package_values[array_search("Photo upload limit", $package_benifits)]; ?>">      
                                 <!-- Modal -->
                                 <?php 
                                    $set_btn_staus='';
                                    if(@$package_values[array_search("Photo upload limit", $package_benifits)]<=count($gallery_image))
                                    {
                                      $set_btn_staus='<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_alert_message_for_gallery_limit">Add Image</button>';
                                    }
                                    else
                                    {
                                      $set_btn_staus='<a><label class="label label-primary label-sm btn" data-toggle="tooltip_2" title="" data-original-title="add Your <?php echo $title; ?>"><img id="avatar_cover_gallery" src="assets/images/nslider4.jpg" style="display: none;" alt="Sunrise Admin">Add Image <input type="file"  class="sr-only" id="input_galary_image" name="input_galary_image" accept="image/*"></label></a>';
                                 }
                                 if(@$login_user["types"]=="Agency" || @$login_user["types"]=="Establishment") { 
                                 $title="Rooms";
                                 } else {  $title="Gallery"; } ?>
                                 <h4><?php echo @$title; ?> <label class="badge" id="set_counting" style="margin: 0px;"><?php echo count($gallery_image); ?></label></h4>
                              </div>
                              <div class="col-md-4" id="set_notic_button">
                                 <?php echo $set_btn_staus; ?>   
                              </div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="info-block__content" aria-expanded="false">
                              <div class="advertiser-gallery xxvisible-desktop" id="set_gallery_image">
                                 <?php if(@$gallery_image) {
                                    $l=0;
                                    
                                    foreach ($gallery_image as $gallery) { 
                                     $l=$l+1;
                                    
                                     $images_data_get=$this->db->query("select * from gallery_image where id='".$gallery["priborty"]."'")->row_array();
                                    
                                    
                                           if(@$images_data_get["image"])
                                           {
                                              $set_image=@$images_data_get["image"];
                                              // $id=@$images_data_get["id"];
                                           }
                                           else
                                           {
                                             $set_image=@$gallery["image"];
                                              // $id=@$gallery["id"];
                                           }
                                     ?>
                                 <dlv class="example-image-link advertiser-gallery-thumb over-img">
                                    <img src="assets/uploads/<?php echo  @$set_image; ?>" alt="Isabella - Image 1" class="img-responsive img-thumb">
                                    <a href="javascript:;" class="remove_gallery_image_dsp_remove" data-id="<?php echo @$gallery["id"] ?>"><i class="fa fa-remove over-img1" style="font-size:16px"></i></a>
                                    <a href="assets/uploads/<?php echo @$set_image;; ?>" data-fancybox="images" ><i class="fa fa-search over-img2" style="font-size:14px"></i></a>
                                 </dlv>
                                 <!--  <div class="overlay" style="background: rgba(0,0,0,.5);"><a href="" style="text-align: center; color: #fff;"><i class="fa fa-close"></i></a> </div> -->
                                 <?php 
                                    if($l==9)
                                    {
                                      break;
                                    }
                                    } 
                                    
                                    
                                    } else { ?>
                                 <!-- <div id="remove_this_data"><center ><h3>Add Galery Image</h3></center></div> -->
                                 <?php } ?>
                                 <input type="hidden" id="get_last_image_id_for_remove" value="<?php echo @$l; ?>">                      
                              </div>
                           </div>
                        </div>
                        <div class="panel-heading">
                           <div class="row">
                              <?php if(count($gallery_image)>0) { ?>
                              <div class="col-md-12">
                                 <button type="button" class="btn btn-primary btn-block" id="get_all_gallery_image" data-id="<?php echo $login_user["USERID"]; ?>">View All Image</button>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     else
                     {
                      if($login_user["types"] == "Escort" && $escort_info["agency_id"] == "" )
                      {
                        // echo "Show2";
                        ?>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-blue lg-btm-margin">
                        <div class="panel-heading">
                           <div class="row">
                              <div id="myModal_alert_message_for_gallery_limit" class="modal fade" role="dialog">
                                 <div class="modal-dialog">
                                    <!-- Modal content-->
                                    <div class="modal-content">
                                       <div class="modal-header">
                                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                                          <h4 class="modal-title" style="color:#fff;">Notice</h4>
                                       </div>
                                       <div class="modal-body" style="color:#fff;">
                                          <p>
                                             You have reached maximum number of image upload limit <!-- <?php echo @$package_values[array_search("Photo upload limit", $package_benifits)]; ?> -->
                                          </p>
                                       </div>
                                       <div class="modal-footer">
                                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <input type="hidden" id="upload_gallery_images_number" value="<?php echo @$package_values[array_search("Photo upload limit", $package_benifits)]; ?>">      
                                 <!-- Modal -->
                                 <?php 
                                    $set_btn_staus='';
                                    if(@$package_values[array_search("Photo upload limit", $package_benifits)]<=count($gallery_image))
                                    {
                                      $set_btn_staus='<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_alert_message_for_gallery_limit">Add Image</button>';
                                    }
                                    else
                                    {
                                      $set_btn_staus='<a><label class="label label-primary label-sm btn" data-toggle="tooltip_2" title="" data-original-title="add Your <?php echo $title; ?>"><img id="avatar_cover_gallery" src="assets/images/nslider4.jpg" style="display: none;" alt="Sunrise Admin">Add Image <input type="file"  class="sr-only" id="input_galary_image" name="input_galary_image" accept="image/*"></label></a>';
                                 }
                                 if(@$login_user["types"]=="Agency" || @$login_user["types"]=="Establishment") { 
                                 $title="Rooms";
                                 } else {  $title="Gallery"; } ?>
                                 <h4><?php echo @$title; ?> <label class="badge" id="set_counting" style="margin: 0px;"><?php echo count($gallery_image); ?></label></h4>
                              </div>
                              <div class="col-md-4" id="set_notic_button">
                                 <?php echo $set_btn_staus; ?>   
                              </div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="info-block__content" aria-expanded="false">
                              <div class="advertiser-gallery xxvisible-desktop" id="set_gallery_image">
                                 <?php if(@$gallery_image) {
                                    $l=0;
                                    
                                    foreach ($gallery_image as $gallery) { 
                                     $l=$l+1;
                                    
                                     $images_data_get=$this->db->query("select * from gallery_image where id='".$gallery["priborty"]."'")->row_array();
                                    
                                    
                                           if(@$images_data_get["image"])
                                           {
                                              $set_image=@$images_data_get["image"];
                                              // $id=@$images_data_get["id"];
                                           }
                                           else
                                           {
                                             $set_image=@$gallery["image"];
                                              // $id=@$gallery["id"];
                                           }
                                     ?>
                                 <dlv class="example-image-link advertiser-gallery-thumb over-img">
                                    <img src="assets/uploads/<?php echo  @$set_image; ?>" alt="Isabella - Image 1" class="img-responsive img-thumb">
                                    <a href="javascript:;" class="remove_gallery_image_dsp_remove" data-id="<?php echo @$gallery["id"] ?>"><i class="fa fa-remove over-img1" style="font-size:16px"></i></a>
                                    <a href="assets/uploads/<?php echo @$set_image;; ?>" data-fancybox="images" ><i class="fa fa-search over-img2" style="font-size:14px"></i></a>
                                 </dlv>
                                 <!--  <div class="overlay" style="background: rgba(0,0,0,.5);"><a href="" style="text-align: center; color: #fff;"><i class="fa fa-close"></i></a> </div> -->
                                 <?php 
                                    if($l==9)
                                    {
                                      break;
                                    }
                                    } 
                                    
                                    
                                    } else { ?>
                                 <!-- <div id="remove_this_data"><center ><h3>Add Galery Image</h3></center></div> -->
                                 <?php } ?>
                                 <input type="hidden" id="get_last_image_id_for_remove" value="<?php echo @$l; ?>">                      
                              </div>
                           </div>
                        </div>
                        <div class="panel-heading">
                           <div class="row">
                              <?php if(count($gallery_image)>0) { ?>
                              <div class="col-md-12">
                                 <button type="button" class="btn btn-primary btn-block" id="get_all_gallery_image" data-id="<?php echo $login_user["USERID"]; ?>">View All Image</button>
                              </div>
                              <?php } ?>
                           </div>
                        </div>
                     </div>
                  </div>
                  <?php
                     }
                     else
                     {
                       // echo "Hide";
                     }
                     }
                     ?>
                  <!-- ----------------------- -->
                  <div id="show_all_image_of_gallerys" class="modal fade" role="dialog">
                     <div class="modal-dialog modal-lg">
                        <!-- Modal content-->
                        <div class="modal-content">
                           <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" style="color:#fff;">Gallery Images <button type="button" id="set_gallery_image_order" class="btn btn-primary btn-sm" data-id="<?php echo $login_user["USERID"]; ?>">Update Order</button></h4>
                           </div>
                           <div class="modal-body" style="color:#fff;">
                              <p>Your Package image upload limit is <?php echo @$package_values[array_search("Photo upload limit", $package_benifits)]; ?></p>
                           </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-pink lg-btm-margin">
                        <div class="panel-heading">
                           <div class="row">
                              <div class="col-md-6">
                                 <h4>SEE ME HERE</h4>
                              </div>
                              <div class="col-md-5 col-md-offset-1">
                                 <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_add_social_link">Social Link</button>
                              </div>
                           </div>
                        </div>
                        <div class="panel-body">
                           <div class="demo-btn-group clearfix">
                              <ul>
                                 <?php if(@$social_link["facebook"]) 
                                    {
                                      $set_class='';
                                      $link=@$social_link["facebook"];
                                    }
                                    else
                                    {
                                       $set_class='set_css_for_social_icon';
                                      $link='javascript:;';
                                    }
                                    ?>
                                 <li><a href="<?php echo @$link; ?>" class="<?php echo @$set_class; ?>" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                 <?php if(@$social_link["instagram"]) 
                                    {
                                      $set_class='';
                                      $link=@$social_link["instagram"];
                                    }
                                    else
                                    {
                                       $set_class='set_css_for_social_icon';
                                      $link='javascript:;';
                                    }
                                    ?>
                                 <li><a href="<?php echo @$link; ?>" class="<?php echo @$set_class; ?>" title="instagram"><i class="fa fa-instagram"></i></a></li>
                                 <?php if(@$social_link["twitter"]) 
                                    {
                                      $set_class='';
                                      $link=@$social_link["twitter"];
                                    }
                                    else
                                    {
                                       $set_class='set_css_for_social_icon';
                                      $link='javascript:;';
                                    }
                                    ?>
                                 <li><a href="<?php echo @$link; ?>" class="<?php echo @$set_class; ?>" title="twitter"><i class="fa fa-twitter"></i></a></li>
                                 <?php if(@$social_link["skype"]) 
                                    {
                                      $set_class='';
                                      $link=@$social_link["skype"];
                                    }
                                    else
                                    {
                                       $set_class='set_css_for_social_icon';
                                      $link='javascript:;';
                                    }
                                    ?>
                                 <li><a href="<?php echo @$link; ?>" class="<?php echo @$set_class; ?>" title="skype"><i class="fa fa-skype"></i></a></li>
                                 <?php if(@$social_link["direct_link"]) 
                                    {
                                      $set_class='';
                                      $link=@$social_link["direct_link"];
                                    }
                                    else
                                    {
                                       $set_class='set_css_for_social_icon';
                                      $link='javascript:;';
                                    }
                                    ?>
                                 <li><a href="<?php echo @$link; ?>" class="<?php echo @$set_class; ?>" title="Direct lin"><i class="fa fa-link"></i></a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!--  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-pink lg-btm-margin">
                        <div class="panel-heading">
                           <h4>Based in 
                             Sydney</h4>
                        </div>
                        <ul class="list-group no-margin">
                           <li class="list-group-item"><span class="badge ">23's</span> Age</li>
                           <li class="list-group-item"><span class="badge ">8 with GG Bust</span> Dress Size</li>
                           <li class="list-group-item"><span class="badge ">From $11/1h</span> Price</li>
                           <li class="list-group-item"><span class="badge ">India , outcall</span> Place of Services</li>
                           <li class="list-group-item"><span class="badge ">32</span> Vestibulum eros</li>
                        </ul>
                     </div>
                     </div> -->
                  <div class="col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-green lg-btm-margin">
                        <div class="panel-heading">
                           <h4>Availability(This week)</h4>
                        </div>
                        <div class="panel-body">
                           <ul class="list-group no-margin">
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
                                     $day_name="Today";
                                    }
                                 
                                 ?>
                              <li class="list-group-item"><span class="badge "><?php echo @$set_time; ?></span> <?php echo @$day_name; ?></li>
                              <?php
                                 } ?>
                           </ul>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            </u>
         </div>
         <u>
         </u>
      </div>
      <u>
      </u>
</div>
</form>
<!-- Modal -->
<div id="myModal_add_social_link" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Social Link</h4>
         </div>
         <div class="modal-body">
            <form action="user/sell_service/add_social_link" method="post">
               <input type="hidden" name="page_name" value="<?php echo $this->uri->segment(1); ?>">
               <input type="hidden" name="user_id" value="<?php echo $this->uri->segment(2); ?>">
               <input type="hidden" name="user_name" value="<?php echo $this->uri->segment(3); ?>">
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-facebook"></i></span>
                        <input type="text" class="form-control" name="facebook" aria-label="Amount (rounded to the nearest dollar)" placeholder="Facebook" value="<?php echo @$social_link["facebook"]; ?>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-instagram"></i></span>
                        <input type="text" class="form-control" name="instagram" aria-label="Amount (rounded to the nearest dollar)" placeholder="Instagram" value="<?php echo @$social_link["instagram"]; ?>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-twitter"></i></span>
                        <input type="text" class="form-control"  name="twitter" aria-label="Amount (rounded to the nearest dollar)" placeholder="Twitter" value="<?php echo @$social_link["twitter"]; ?>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-skype"></i></span>
                        <input type="text" class="form-control" name="skype" aria-label="Amount (rounded to the nearest dollar)" placeholder="Skype" value="<?php echo @$social_link["skype"]; ?>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <div class="input-group">
                        <span class="input-group-addon"> <i class="fa fa-link"></i></span>
                        <input type="text" class="form-control" name="direct_link" aria-label="Amount (rounded to the nearest dollar)" placeholder="Direct Link" value="<?php echo @$social_link["direct_link"]; ?>">
                     </div>
                  </div>
               </div>
               <br>
               <div class="row">
                  <div class="col-md-12">
                     <button type="submit" class="btn btn-primary btn-block">Update</button>
                  </div>
               </div>
            </form>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div id="myModal_sho_review_message_data" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Review Message</h4>
         </div>
         <div class="modal-body" style="color: #fff;">
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>
<!-- Modal -->
<div id="escort_limit_alert_message" class="modal fade" role="dialog">
   <div class="modal-dialog">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Notice</h4>
         </div>
         <div class="modal-body" style="color: #fff;">
            <p>You have reached maximum number of Escort Add limit, Delete to add New Escort !</p>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>