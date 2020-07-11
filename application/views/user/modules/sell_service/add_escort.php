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
</style>
<div class="main-container">
<?php
$check_total_escort = $this->db->query("SELECT * FROM escort_info WHERE agency_id = '".$login_user['USERID']."'")->result_array(); 
if(count($check_total_escort) > 8){
   redirect(base_url()."agency-profile/".$login_user['USERID']."/".$login_user['fullname']);
}
?>


  <form action="user/sell_service/add_escort/" method="post">
   <input type="hidden" name="userid" value=""> 
<?php 

if(@$login_user["types"]=="agency") {
   
     $agencyid_set=@$login_user["USERID"];

}
else
{
  $agencyid_set="";
}

 ?>

   <input type="hidden" name="agencyid" value="<?php echo @$login_user["USERID"]; ?>"> 
   <input type="hidden" name="user_lofin[username]" value=""> 
   <input type="hidden" name="user_lofin[types]" value="Escort"> 
            <div class="container-fluid">
             <div class="row gutter">

   <div class="col-md-12">
      <div class="user-account">
        <div id="set_cover_image">
          <input type="hidden" name="user_lofin[cover_image]" value="">
      <?php  
$default_profile_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'profile_image'")->row_array();
$default_cover_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'cover_image'")->row_array();

      $image_cover='assets/uploads/default/'.@$user_login["cover_image"];
      ?>

        </div>
      	<div id="avatar_cover" style="background: url(<?php echo @$image_cover; ?>); height: 350px; background-repeat:no-repeat; background-size:100% 100%; background-attachment:fixed; position: relative; -webkit-border-radius: 4px; -moz-border-radius: 4px; border-radius: 4px"></div>
        
         <div class="user-pic">

<label class="label" data-toggle="tooltip" title="" data-original-title="Change your profile image">
    

   
    <div id="set_profile_image">
      <input type="hidden" name="user_lofin[profile_image]" value="">
      <?php $image='assets/uploads/default/'.$default_profile_image["name"];
      ?>
   
    </div>

      <img src="<?php echo @$image; ?>" id="avatar" style="height: 211px;" alt="Sunrise Admin">
       <a><div class="overdiv" style="background: rgba(0,0,0,.5); height:211px;"><p style="  font-size: 16px; color: #fff; position: relative; top: 50%;">Change Image</p></div></a>
      <input type="file" class="sr-only" id="input" name="image" accept="image/*">
    </label>
         	</div>
    
         <div class="user-details">
            <h4 class="user-name"><i></i></h4>
            <!-- <h5 class="description">Hi, I'm a UX Designer from Chicago. I like to design web and mobile products that look good and work well.</h5> -->
         </div>
         <div class="social-list">
            <div class="row gutter">
               <div class="col-md-6 col-md-offset-3">
                  <div class="row">
                     
                     <!-- <div class="col-md-3 col-sm-3 col-xs-3 col-md-offset-3 center-text">
                        <h3>178</h3>
                        <small>Likes</small>
                     </div>
                     
                     <div class="col-md-3 col-sm-3 col-xs-3 center-text">
                        <h3>57</h3>
                        <small>Review</small>
                     </div> -->

                  </div>
               </div>
               <div class="col-md-3">
               	<div class="col-md-1 col-md-offset-8">
                <div style="margin-top: 55%;">
                 <label class="label" data-toggle="tooltip_2" title="" data-original-title="Change your cover image">
                  <img src="http://escort.digimonk.net/assets/images/models/nslider4.jpg" style="display: none;" alt="Sunrise Admin">
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
      <div class="panel panel-red"><div class="panel-heading"><h4>
    <?php
// if($get_escort_profile)
          echo $login_user["types"]." Info";

// }
?>    </h4>
        <h4 class="pull-right"><button type="submit" class="btn btn-sm btn-primary btn-add">Create</button></h4></div><div class="panel-body"><div class="tabbable">
         <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab" aria-expanded="true">Profile</a></li>
            <li class=""><a href="#two" data-toggle="tab" aria-expanded="false">About</a></li>
          <!--   <li class=""><a href="#my_escort_show" data-toggle="tab" aria-expanded="false">My Escort</a></li>
            <li class=""><a href="#three" data-toggle="tab" aria-expanded="false">Things I Prefer In Private</a></li>
            <li class=""><a href="#fourth" data-toggle="tab" aria-expanded="false">Membership</a></li>
            <li class=""><a href="#fifth" data-toggle="tab" aria-expanded="false">Availability</a></li>
            <li class=""><a href="#tour" data-toggle="tab" aria-expanded="false">My Tour</a></li> -->
           
            <!-- <li class=""><a href="#account" data-toggle="tab" aria-expanded="false">Account</a></li> -->
          <!--   <li class=""><a href="#rates" data-toggle="tab" aria-expanded="false">Rates</a></li>
            <li class=""><a href="#reviews" data-toggle="tab" aria-expanded="false">Reviews</a></li> -->
              
         </ul>

         <div class="tab-content no-margin">
            


 <div class="tab-pane" id="my_escort_show">
<div class="row">
  <div class="col-md-6">
    <a href="escort-profile/"><button type="button" class="btn btn-primary">Add New Escort</button></a>
  </div>
</div>
<br><hr><br>
   <div class="row">
              <div class="col-md-4 col-sm-6 col-xs-12">
                   <div class="swiper-slide swipe-img">
                        
                        <div class="embed-container ratio-3-4">
                          <img src="http://escort.digimonk.net/assets/images/popular/popular1.jpg" alt="Image of Coco" class="img-responsive">
                        </div>
                        
                        <div class="carousel-item__item-details">
                      
                          <div class="featured-sash"></div>
                          
                          <span class="verified-label">Escort Name</span>
                        </div>
                    </div>
            </div>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="swiper-slide swipe-img">
                        
                        <div class="embed-container ratio-3-4">
                          <img src="http://escort.digimonk.net/assets/images/popular/popular2.jpg" alt="Image of Coco" class="img-responsive">
                        </div>
                        
                        <div class="carousel-item__item-details">
                      
                          <div class="featured-sash"></div>
                          
                          <span class="verified-label">Photos Verified</span>
                        </div>
                    </div>
            </div>
            <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="swiper-slide swipe-img">
                        
                        <div class="embed-container ratio-3-4">
                          <img src="http://escort.digimonk.net/assets/images/popular/popular3.jpg" alt="Image of Coco" class="img-responsive">
                        </div>
                        
                        <div class="carousel-item__item-details">
                      
                          <div class="featured-sash"></div>
                          
                          <span class="verified-label">Photos Verified</span>
                        </div>
                    </div>
            </div>
           </div>




 </div>











            <div class="tab-pane" id="reviews">
              
              <div class="row">
                 <div class="col-md-12">
                  <h5><u>Reviews </u></h5>
                    <div class="table-responsive">
                              <table id="" class="table table-striped table-condensed table-bordered no-margin basicExample2">
                                 <thead>
                                    <tr>
                                        
                                       
                                       <th>Name</th>
                                       <th>E-mail</th>
                                       
                                       <th>Review Date</th>
                                       
                                       <th>Review</th>
                                       <th>Status</th>
                                                                            
                                    </tr>
                                 </thead>
                                 <tfoot>
<tr>

                                    <th>Name</th>
                                       <th>E-mail</th>
                                       
                                       <th>Review Date</th>
                                       
                                       <th>Review</th>
                                       <th>Status</th>
                                       
                                    </tr>
                                 </tfoot>
                                 <tbody>
                                                                                                            <tr>
                                       
                                       
                                       <td>User Name</td>
                                       <td>user_email@gmail.com</td>
                                       <td>11-9-2018</td>
                                       
                                      
                                       <td>
                                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.......<br><br>
                                  <a href="javascript:;" data-toggle="modal" data-target="#viewReviews"><span class="badge grey-bg">Read More</span></a>
                                       </td>
                                        <td><span class="badge green-bg">Confirm</span></td>
                                       
                               
                                      
                                    </tr>
                                                                                                            <tr>
                                       
                                       
                                       <td>User Name</td>
                                       <td>user_email@gmail.com</td>
                                       <td>11-9-2018</td>
                                       
                                      
                                       <td>
                                          Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.......<br><br>
                                  <a href="javascript:;" data-toggle="modal" data-target="#viewReviews"><span class="badge grey-bg">Read More</span></a>
                                       </td>
                                        <td><span class="badge green-bg">Confirm</span></td>
                                       
                               
                                      
                                    </tr>
                                                                                 
                                                                     </tbody>
                              </table>
                           </div>
                    
                 </div>
              </div>

            </div>
            <div class="tab-pane" id="fifth">
               <div class="row">
                   <div class="col-md-12 main-content">
        <!--<div class="sidebar-shadow"></div>-->
        
                        <h1>My Availability</h1>

                        <p>First, select a schedule cycle. Then, uncheck the days you do&nbsp;not work.<br>
                        On&nbsp;the days you work,&nbsp;enter the relevant times for that day!<br>
                        <br>
                        7 day schedule will repeat&nbsp;the same&nbsp;weeks&nbsp;roster.<br>
                        14 day schedule will repeat a fortnights set roster.<br>
                        28 day schedule to&nbsp;show random availability.<br>
                        You can change your availability at any&nbsp;time.&nbsp;</p>
                    <div class="my-account-section--availability js-update-panel">
                        <div id="AvailabilityCalendar_updUpdate">

                

                <!-- <div class="section-legend">
                    <h4>Legend</h4>
                    <span class="section-legend__item--today">Indicates Today</span>
                </div> -->

                
                        <div class="availability-table-container">
                            <h4>Week 1</h4>
                            
                                <div class="availability-table">
                                
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="monday" type="checkbox" name="" checked="checked">
                                                    <label for="monday">Monday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">1/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                        
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="txtEnd" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till1" type="checkbox" name=""><label for="till1">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day1" type="checkbox" name=""><label for="day1">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo1" type="checkbox" name=""><label for="appo1">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="tuesday" type="checkbox" name="" checked="checked">
                                                    <label for="tuesday">Tuesday</label>
                                                </div>
                                                <span id="" class="availability-table__entry__name__date">2/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" id="" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                        
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" id="" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till2" type="checkbox" name=""><label for="till2">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day2" type="checkbox" name=""><label for="day2">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo2" type="checkbox" name=""><label for="appo2">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry availability-table__entry--today">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="wednesday" type="checkbox" name="" checked="checked">
                                                    <label for="wednesday">Wednesday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">3/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                        
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till3" type="checkbox" name=""><label for="till3">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day3" type="checkbox" name=""><label for="day3">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo3" type="checkbox" name=""><label for="appo3">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="thursday" type="checkbox" name="" checked="checked">
                                                    <label for="thursday" id="">Thursday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">4/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                        
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till4" type="checkbox" name=""><label for="till4">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day4" type="checkbox" name=""><label for="day4">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo4" type="checkbox" name=""><label for="appo4">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="friday" type="checkbox" name="" checked="checked">
                                                    <label for="friday">Friday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">5/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                        
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till5" type="checkbox" name=""><label for="till5">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day5" type="checkbox" name=""><label for="day5">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo5" type="checkbox" name=""><label for="appo5">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="saturday" type="checkbox" name="" checked="checked">
                                                    <label for="saturday">Saturday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">6/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                       
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till6" type="checkbox" name=""><label for="till6">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day6" type="checkbox" name=""><label for="day6">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo6" type="checkbox" name=""><label for="appo6">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                    <div class="availability-table__entry ">
                                        <div class="availability-table__entry__name">
                                            <div class="checkbox">
                                                <div class="availability-table__entry__name__day">
                                                    <input id="sunday" type="checkbox" name="" checked="checked">
                                                    <label for="sunday">Sunday</label>
                                                </div>
                                                <span class="availability-table__entry__name__date">7/10/2018</span>
                                            </div>
                                        </div>
                                        
                                        
                                        
                                                <div class="availability-table__entry__times-range">
                                                    <span class="times-range-from">
                                                        <input name="" type="text" value="10:00 AM" class="form-control js-timepick">&nbsp;&nbsp;till&nbsp;
                                                       
                                                    </span>
                                                    <span class="times-range-to">
                                                        <input name="" type="text" value="8:00 PM" class="form-control js-timepick">
                                                    </span>
                                                </div>
                                            
                                            <div class="availability-table__entry__times-set">
                                                <div class="checkbox">
                                                    <span class="times-set-till-late">
                                                        <input id="till7" type="checkbox" name=""><label for="till7">Till late</label>
                                                    </span>
                                                    <span class="times-set-all-day">
                                                        <input id="day7" type="checkbox" name=""><label for="day7">All day</label></span>
                                                    <span class="times-set-by-appointment">
                                                        <input id="appo7" type="checkbox" name=""><label for="appo7">By appointment</label></span>
                                                </div>
                                            </div>
                                        
                                    </div>
                                    
                                </div>
                                
                        </div>
                    

                <input type="submit" name="" value="Save Availability Schedule" class="btn-primary">
               

        </div>
</div>
      </div>
               </div>
            </div>
              <div class="tab-pane" id="tour">
               <div class="row">
                   <div class="col-md-12 main-content">
        <!--<div class="sidebar-shadow"></div>-->
        
                        <h1>My Touring</h1>

                       
                    <div class="my-account-section--availability js-update-panel">
                        <div id="AvailabilityCalendar_updUpdate">
                         <div class="row">
                        <h3>Rates</h3>
                        <div class="col-md-4">
                            <div class="form-group">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">Place</label>
                                          </div>
                                         <div class="">
                                            
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Place">
                                            
                                           </div>
                                          
                               </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">To:</label>
                                           </div>
                                          <div class="">
                                            
                                             <input type="Date" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                           
                                        
                                     </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">From:</label>
                                           </div>
                                          <div class="">
                                             <input type="date" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                           
                                        
                                     </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Remove:</label>
                                           </div>
                                          <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>

                                           </div>
                                           
                                        
                                     </div>
                        </div>
                    </div>

                       <input type="submit" name="" value="Save Touring Schedule" class="btn-primary">
               

        </div>
</div>
      </div>
               </div>
            </div>
            

            <div class="tab-pane" id="rates">
               <div class="row">
                 <div class="col-md-12">
                    <div class="row">
                        <h3>Rates</h3>
                        <div class="col-md-4">
                            <div class="form-group">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">In-call Rate table</label>
                                          </div>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                                          <br>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                                          <br>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                               </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Price:</label>
                                           </div>
                                          <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                           <br>
                                           <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                           <br>
                                           <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                        
                                     </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Additional Information:</label>
                                           </div>
                                          <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                           <br>
                                           <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                           <br>
                                           <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                        
                                     </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Remove:</label>
                                           </div>
                                          <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>

                                           </div>
                                           <br>
                                           <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>
                                             
                                           </div>
                                           <br>
                                           <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>
                                             
                                           </div>
                                        
                                     </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn-primary" style="width: auto"><i class=" fa fa-plus"></i> add in-call rates</button>
                     </div>
                     <br>
                     <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                          <div class="editing-form-label-cell">
                                             <label for="" class="control-label editing-form-label">out-call Rate table</label>
                                          </div>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                                          <br>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                                          <br>
                                          <div class="editing-form-value-cell">
                                              <select name="" id="" class="form-control">
                                              <option value="" selected="selected">- Duration -</option>
                                              <option value="Long">45min</option>
                                              <option value="Short">1 hour</option>
                                              <option value="Shaved">2 hour</option>
                                              <option value="Straight">6 hour</option>
                                              <option value="Curly">Overnight</option>

                                              </select>
                                          </div>
                               </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Price:</label>
                                           </div>
                                          <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                           <br>
                                           <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                           <br>
                                           <div class="input-group">
                                            <span class="input-group-addon">$</span>
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Price">
                                            
                                           </div>
                                        
                                     </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Additional Information:</label>
                                           </div>
                                          <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                           <br>
                                           <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                           <br>
                                           <div class="">
                                             <input type="text" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="additional information">
                                            <!-- <span class="input-group-addon"> <i class="fa fa-snapchat"></i></span> -->
                                           </div>
                                        
                                     </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                        
                                          <div class="editing-form-label-cell">
                                            <label for="" class="control-label editing-form-label">Remove:</label>
                                           </div>
                                          <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>

                                           </div>
                                           <br>
                                           <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>
                                             
                                           </div>
                                           <br>
                                           <div class="input-group">
                                             <button class="btn-danger Remove"><i class="fa fa-minus"></i></button>
                                             
                                           </div>
                                        
                                     </div>
                        </div>
                    </div>
                    <div class="row">
                        <button class="btn-primary" style="width: auto"><i class=" fa fa-plus"></i> add out-call rates</button>
                     </div>
                 </div>
               </div>
            </div>

            <div class="tab-pane active" id="one">

        <div class="row">
              <div class="col-md-4">
               <h4>Name</h4><p>
                 <input type="text" name="user_lofin[name]" class="form-control" value="" placeholder="Display Name" required="">
                  
               </p>
            </div>
                <div class="col-md-4">
               <h4>Email</h4><p>
<?php $set_attr=''; ?>

                 <input type="text"  name="user_lofin[email]" <?php echo @$set_attr; ?> class="form-control" placeholder="Email" value="" required="">
               </p>
            </div>
            <div class="col-md-4">
               <h4>Contact</h4><p>
                  <input type="text" name="user_lofin[contact]" maxlength="11" placeholder="Contact" class="form-control set_number_only" maxlength="11" value=""  required="">
               </p>
            </div>
           </div>


           <div class="row">
              <div class="col-md-4">
               <h4>STATE OR TERRITORY</h4><p>
                 <select class="form-control" name="escort_info[state]" id="state_get" required="">
                  
                <option value="">STATE OR TERRITORY</option>
                 
                  <?php if($state) {foreach ($state as $sta) {
   $set_sta="";
                  
                    #?>

<option value="<?php echo $sta['state']; ?>" <?php echo @$set_sta; ?>><?php echo $sta['state']; ?></option>
                    <?php
                  } } ?>
                   
                   
                  
                 </select>
                  
               </p>
            </div>
               <div class="col-md-4">
               <h4> MAIN LOCATION</h4><p>
                <select class="form-control" name="escort_info[main_location]" id="main_location_set">
                   <option value="">Select City</option>
          <option value="<?php echo $escort_info['main_location']; ?>"><?php echo $escort_info['main_location']; ?></option>
 
                 </select>
                  
               </p>
            </div>
                <div class="col-md-4">
               <h4> SUB LOCATION</h4>
               <p>
                <input type="text" name="escort_info[sub_location]" placeholder="Sub Location" class="form-control"  value="" >
               </p>
            </div>
           </div>


           <div class="row">
              


<div class="col-md-4">
 <?php $title=$drop_down["2"]["title"];
   $val=explode("*#*", $drop_down["2"]["value"]);
  ?> 
               <h4><?php echo $title; ?></h4><p>
                 <select class="form-control" name="escort_info[eyes]" required="">
                  <option value="">Select <?php echo $title; ?></option>
              <?php
          if($val)
          {
             for($i=0; $i<count($val); $i++)
             { 
$set_sta="";

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
               <h4><?php echo $title; ?></h4><p>
                <select class="form-control" name="escort_info[hair]" required="">
                 <option value="">Select <?php echo $title; ?></option>
              <?php
          if($val)
          {
             for($i=0; $i<count($val); $i++)
             { 

 $set_sta="";

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
               <h4><?php echo $title; ?></h4><p>
                 <select class="form-control" name="escort_info[body_type]" required="">
<option value="">Select <?php echo $title; ?></option>
              <?php
          if($val)
          {
             for($i=0; $i<count($val); $i++)
             { 

$set_sta="";


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
              


<div class="col-md-3">
 <?php $title=$drop_down["3"]["title"];
   $val=explode("*#*", $drop_down["3"]["value"]);
  ?> 
               <h4><?php echo $title; ?></h4><p>
                 <select class="form-control" name="escort_info[orientation]" required="">
                   <?php if(!@$escort_info["orientation"]) { ?>
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
                <div class="col-md-3">
                   <?php $title=$drop_down["4"]["title"];
   $val=explode("*#*", $drop_down["4"]["value"]);
  ?> 
               <h4><?php echo $title; ?></h4><p>
                <select class="form-control" name="escort_info[ethnicity]" required="">
                  <?php if(!@$escort_info["Ethnicity"]) { ?>
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
            <div class="col-md-3 col-sm-6 col-xs-12">

               <?php $title=$drop_down["5"]["title"];
   $val=explode("*#*", $drop_down["5"]["value"]);
  ?> 
               <h4><?php echo $title; ?></h4><p>
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





<div class="col-md-3 col-sm-6 col-xs-12">

               <?php $title=$drop_down["6"]["title"];
   $val=explode("*#*", $drop_down["6"]["value"]);
  ?> 
               <h4><?php echo $title; ?></h4><p>
                 <select class="form-control" name="escort_info[escort_for]" required="">
                  
<?php if(!@$escort_info["escort_for"]) { ?>
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
              <div class="col-md-4">
               <h4>AGE</h4><p>
<input type="text" name="escort_info[age]" maxlength="2" value="" placeholder="Age" class="form-control set_number_only">
               </p>
            </div>
                <div class="col-md-4">
               <h4>DRESS SIZE</h4><p>
<input type="text" name="escort_info[dress_size]" value="" placeholder="DRESS SIZE" class="form-control">
               </p>
            </div>
            <div class="col-md-4">
               <h4>PLACE OF SERVICE</h4><p>
                <input type="text" name="escort_info[service_place]" placeholder="Place Of Services" class="form-control" value=""></p>
            </div>
           </div>


<div class="row">
              
                <div class="col-md-4 col-sm-6 col-xs-12">
               <h4>PHONE FOR SMS ONLY</h4><p>
<input type="text" required name="escort_info[sms_phone_no]" value="" maxlength="11" placeholder="PHONE FOR SMS ONLY" class="form-control set_number_only">
               </p>
            </div>
            <div class="col-md-4">
               <h4>HEIGHT</h4><p>
                 <input type="text" name="escort_info[height]" placeholder="HEIGHT" class="form-control" value="" required="">
               </p>
            </div>

            <div class="col-md-4 col-sm-6 col-xs-12">

                
               <h4>Gender</h4><p>
                 <select class="form-control" name="user_lofin[gender]">
                  <?php $types=['Select Gender','Male','Female','Trans']; ?>

                                    <?php for($i=0; $i<count($types); $i++) {

if($types[$i]=="Select Gender")
{
  $val="";
}
else
{
  $val=$types[$i];
}
                                      ?>
<option value="<?php echo @$val; ?>" ><?php echo @$types[$i]; ?></option>
                                      <?php
                                    } ?>
                
                 </select>
               </p>
            </div>
            
           </div>

           <div class="row">
              <div class="col-md-4">
               <h4>PHOTOS</h4><p>
                <input type="text" name="escort_info[photo_status]" class="form-control" value="" readonly="true"></p>
               <p></p>
            </div>


            <div class="col-md-4 col-sm-6 col-xs-12">
               <h4>Status</h4><p>
                <?php

                $val='Inactive';
                 ?>
                  <input type="text" name="escort_info[status]" value="<?php echo $val; ?>" class="form-control" readonly="true" disabled="true">
               </p>
            </div>


            <div class="col-md-4">
                <h4>SWA NUMBER</h4><p>
<?php $set_status='disabled="true"';
 ?>

                  <input type="text" name="escort_info[swa_number]"  value="<?php echo @$escort_info["swa_number"]; ?>" id="set_class_for_victoria" class="form-control"  placeholder="For victorian girls" <?php echo @$set_status; ?> >
               </p>
               
            </div>
           </div>



            </div>

            <div class="tab-pane" id="two">
               <div class="row">
                  <div class="col-md-12">
                     <h3><u>About Me</u></h3>
                     <hr>
                  </div>
               </div>
               <div class="row">
                 <div class="col-md-12">
                   <textarea id="ck_editor_textarea_id" class="form-control summernote" name="escort_info[about_me]"> 
                                           
                   </textarea>


                   <script type="text/javascript" src="http://work.digimonk.net/assets/js/ckeditor/ckeditor.js"></script><script type="text/javascript">CKEDITOR_BASEPATH = 'http://work.digimonk.net/assets/js/ckeditor/';</script><script type="text/javascript">
      CKEDITOR.replace('ck_editor_textarea_id', {toolbar : 'Full',filebrowserBrowseUrl : 'http://work.digimonk.net/assets/js/ckfinder/ckfinder.html',filebrowserImageBrowseUrl : 'http://work.digimonk.net/assets/js/ckfinder/ckfinder.html?Type=Images',filebrowserFlashBrowseUrl : 'http://work.digimonk.net/assets/js/ckfinder/ckfinder.html?Type=Flash',filebrowserUploadUrl : 'http://work.digimonk.net/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',filebrowserImageUploadUrl : 'http://work.digimonk.net/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',filebrowserFlashUploadUrl : 'http://work.digimonk.net/assets/js/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'});</script>
                 </div>
               </div>
       
            </div>
            <div class="tab-pane" id="three">
              <div class="row">
                 <div class="col-md-6">
  <h3><u>Things I Prefer In Private <span class="badge yellow-bg">23</span></u></h3>
  
                    <hr>
                 </div>
                 <div class="col-md-6 pull-right">
  <!-- <h3 class="pull-right"><button type="button" class="btn btn-warning btn-add">Add New</button></h3> -->
  
                    <hr>
                 </div>
              </div>
              <div class="row">
                 <div class="editing-form-value-cell checkbox checkbox-list">
                            <ul>
                              <li><input id="check1" type="checkbox" name="" value="13"><label for="check1">Affectionate cuddling</label></li>
                              <li><input id="check2" type="checkbox" name="" value="14"><label for="check2">Affectionate kissing</label></li>
                             
                              <li><input id="check125" type="checkbox" name="" value="142"><label for="check125">FFM</label></li>

                            </ul>
                        </div>
              </div>
            </div>
         <div class="tab-pane" id="fourth">
              <div class="row">
                 <div class="col-md-12">
                    <h3><u>Membership</u></h3>
                  </div>
                  </div>
              <div class="row">
                 <div class="col-md-6">
                  <h4>Current Membership</h4>
                  <br>
                    <table class="table table-bordered no-margin">
                        <thead>
                           <tr>
                              <th>Membership Type</th>
                              <th>Gold</th>
                           </tr>
                           <tr>
                              <th>Membership Payment</th>
                              <th>$500</th>
                           </tr>
                           <tr>
                              <th>Buy Date</th>
                              <th>11-9-2018</th>
                           </tr>
                           <tr>
                              <th>End Date</th>
                              <th>11-09-2019</th>
                           </tr>
                          
                              </thead>
                     </table>
                     <h4 class="pull-right">
                  <button type="submit" class="btn btn-sm btn-warning btn-add">Upgrade Membership</button>
                </h4>
                 </div>
                 <div class="col-md-6" id="show-email-form">
      
                 </div>
              </div>
              <hr>
              <div class="row">
                 <div class="col-md-12">
                  <h4>Membersip Log</h4>
                    <table class="table table-bordered no-margin">
   <thead>
      <tr>
         <th>#</th>
         <th>Membership Type</th>
         <th>Membership Payment </th>
         <th>Buy Date</th>
         <th>End Date </th>
      </tr>
   </thead>
   <tbody>
            <tr>
         <td>1</td>
         <td>Gold</td>
         <td>$500</td>
         <td>11-9-2018</td>
         <td>11-9-2019</td>
         
      </tr>
            <tr>
         <td>2</td>
         <td>Gold</td>
         <td>$500</td>
         <td>11-9-2018</td>
         <td>11-9-2019</td>
         
      </tr>
           
            
   </tbody>
</table>
                 </div>
              </div>
            </div>

    
         </div>





      </div>
     </div>
   </div>
  </div>

   <div class="col-lg-3 col-md-4 col-sm-12 col-sx-12">
      <div class="row gutter">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-blue lg-btm-margin">
                <div class="panel-heading">
              <div class="row">
                  <div class="col-md-6">
                  <?php if(@$login_user["types"]=="Agency" || @$login_user["types"]=="Establishment") { 
                  $title="Rooms";
                 } else {  $title="Gallery"; } ?>
                 <h4><?php echo @$title; ?> <label class="badge" id="set_counting" style="margin: 0px;"></label></h4>
                  </div>
                  <div class="col-md-5 col-md-offset-1">
                  <a><label class="label label-primary label-sm btn" data-toggle="tooltip_2" title="" data-original-title="add Your <?php echo $title; ?>">
                  <img id="avatar_cover_gallery" src="http://escort.digimonk.net/assets/images/models/nslider4.jpg" style="display: none;" alt="Sunrise Admin">
        Add Image
      <input type="file" class="sr-only" id="input_galary_image" name="input_galary_image" accept="image/*">
    </label></a>
                   

                  </div>
                </div>


                
               </div>
               <div class="panel-body">
                 
               </div>
                
            </div>
         </div>
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-pink lg-btm-margin">
               <div class="panel-heading">
                  <div class="row">
                  <div class="col-md-6"><h4>SEE ME HERE</h4></div>
                  <div class="col-md-5 col-md-offset-1">

                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal_add_social_link">Social Link</button>

                  </div>
                </div>

               </div>
               <div class="panel-body">
                  <div class="demo-btn-group clearfix">
                     <ul>
                       <li><a href="" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="" title="Instagram"><i class="fa fa-instagram"></i></a></li>
                          <li><a href="" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="" title="Skype"><i class="fa fa-skype"></i></a></li>
                            <li><a href="" title="Direct link"><i class="fa fa-link"></i></a></li>
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
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Sunday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span>Monday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Tuesday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Wednesday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Thursdar</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Friday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Saturday</li>
                  <li class="list-group-item"><span class="badge ">Unavailable</span> Sunday</li>
               </ul>
               </div>
            </div>
         </div>

         
      </div>
   </div>
</u></div><u>

            </u></div><u>
         </u></div>

       </form>