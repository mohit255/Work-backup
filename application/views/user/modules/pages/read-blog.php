		<div class="content">			
			<div class="milestone-area">	
				<div class="container">
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active">My Profile</li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">

							<h3 class="page-title">Our Blog</h3>

						</div>

					</div>		
				</div>
			</div>
			<section class="" style="background: #F0F0F0; padding: 24px 0;">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
                            <div class="row">
                            	
                         
                     
                            	<div class="col-md-12">

                            		<div class="Card PageDashboard-card WidgetUserDetails">
                            			<a href="<?php echo base_url(); ?>read-blog/<?php echo @$blog["id"]; ?>/<?php echo implode("-",explode(" ",@$blog["title"])); ?>" style="font-size: 20px; color: #000;"> <h1><?php echo @$blog["title"]; ?></h1></a>	
                            			<?php  if(@$blog['image']){ 

   $imgs_set=base_url().'assets/cat_image/'.$blog['image'];
}
 else
 {
    $imgs_set=base_url().'assets/cat_image/1539777409_rodolfo_logo.png';
 }

 ?>			
                            			<div class="blog_page_img" style="background:url(<?php echo @$imgs_set; ?>); ">
		                                 </div>
		                                 <div class="blog_page_content" style="word-break: break-all;">
											<div class="date_block"><p><i class="fa fa-calendar"></i> Date: <?php echo @$blog["date"]; ?><span class="blog_cat_block"></span></p></div>
<i class="fa fa-user"></i> Admin
											<p >
												<?php 

												echo @$blog["content"];

												?>

											</p>
											<!-- <p><a href="" class="blog_btn">Read More</a>
														</span></p> -->


														<div class="clearfix"></div>
										 </div>
                            		</div>
                            	</div>


                            </div>


<div class="row">
	<div class="col-md-12">
		<?php if(@$this->session->userdata('SESSION_USER_ID')) {
			 $set_function_for_work="add_comment_for_blocg('".@$this->session->userdata('SESSION_USER_ID')."','".@$blog["id"]."')";
			 // $set_function_for_work="add_feedback(142 ,165, 71, 70);";
		}
         else
         {
         	$set_function_for_work="selected_menu('read-blog/".@$blog["id"]."/".implode("-",explode(" ", @$blog["title"]))."')";
         }
		 ?>

		<h2>Comment</h2><button type="button" class="btn btn-primary" onclick="<?php echo @$set_function_for_work; ?>">Add Comment</button>
		<div class="Card PageDashboard-card WidgetUserDetails">
                  


	<?php if(@$comment) {  ?>

<div class="feedback-section">

									

									<ul class="feedback-list">

                                                                            

					<?php foreach($comment as  $key=>$feedback) { 
                     
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
                  //count time defrence end================================================================
                        


                        $u_images=base_url().'assets/images/avatar2.jpg';

														if($feedback['user_thumb_image']!='')

														{

															$u_images=base_url().$feedback['user_thumb_image'];

														}
														// var_dump($feedback['reating']);
														$rat_ing = $feedback['reating']; 

						?>								    

                                    <li class="media">

                                        
                                             <a href="<?php echo base_url().'user-profile/'.$feedback['username'];?>" class="pull-left"><img width="26" height="26" alt="" src="<?php echo $u_images;?>"></a>

                                            <div class="media-body">

                                                    <div class="feedback-info">

                                                            <div class="feedback-author">

                                                                    <a href="<?php echo base_url().'user-profile/'.$feedback['username'];?>"><?php echo $feedback['fullname']; ?></a>

                                                            </div>

                                                            <span class="feedback-time"><?php echo $time_difference; ?></span>

                                                    </div>

                                                   <div class="feedback-area"><p><?php echo $feedback['comment']; ?>
                                                    <div style="width: 120px; height: 29px;position: absolute;"></div>
                                                   <span class="starrr" data-rating="<?php echo $rat_ing;?>"></span>
                                                   
                                               </p></div>
                                               </p>

                                        
                                        </div>

										</li>

                                          <?php 

  // if($key ==1){

		// 									 break;

		// 								}


                                           } ?>  


                                            

                                    

                                        
                                        

									</ul>

                                    
							<!-- 		<div class="more-feedback">

                                    <input name="load_more_feedid" id="load_more_feedid" type="hidden" value="2">

                                    <input name="load_more_gigid" id="load_more_gigid" type="hidden" value="71">

                                    <input name="load_more_gig_userid" id="load_more_gig_userid" type="hidden" value="<?php echo @$user_id; ?>">

										<a onclick="load_more_feedbacks();" href="javascript:;">More feedbacks</a>

									</div>
 -->
                                    
								</div>

<?php } ?>


                              </div>
	</div>
</div>



						</div>
						<div class="col-md-4">
							<div class="seach_box_blog">
								<!--<input type="text" name="" placeholder="Search here"><button><i class="fa fa-search"></i></button>-->
								<form action="" method="GET"><input type="text" name="search" placeholder="Search here"><button type="submit"><i class="fa fa-search"></i></button></form>
							</div>

<div id="user-details"><div class="Card PageDashboard-card WidgetUserDetails">
							    <div class="WidgetUserDetails-info">
				                    <div class="blog_category">
<h2>Categories</h2>
										<div class="recent_blogs category_blog_nr">

											<ul>
												<?php if(@$categorys) {  foreach(@$categorys as $cat_data) { ?>
                                                      <li><a href="">
													<span class="right_recent">
														<h4><?php echo  @$cat_data["name"]; ?>
															<!-- <span>05</span> -->
														</h4>
													</span>
												</a></li>	


												<?php } } ?>
												
																	
														
																
											</ul>
										</div>
										</div>
							    </div>
							</div>
						</div>



							<h3> Recent Blogs</h3>
                           <div id="user-details">
                           	<?php if(@$today) { foreach(@$today as $list_data) { ?>
                           	  <div class="Card PageDashboard-card WidgetUserDetails">
                           	     <div class="row">
		                             <div class="col-sm-4">
		                             	<?php  if(@$list_data['image']){ 

   $imgs_set=base_url().'assets/cat_image/'.$list_data['image'];
}
 else
 {
    $imgs_set=base_url().'assets/cat_image/1539777409_rodolfo_logo.png';
 }

 ?>			
		                              <a class="blog-sidebar-link" target="_blank" href="view_blog.php?blog_id=1">
		                               <a href="<?php echo base_url(); ?>read-blog/<?php echo @$list_data["id"]; ?>/<?php echo implode("-",explode(" ",@$list_data["title"])); ?>"> <img class="img-responsive food_blog" src="<?php echo @$imgs_set; ?>"></a>
		                              </a>
		                             </div>
		                             <div class="col-sm-8">
		                            <div class="wt-blog__post-summary  wt-blog__post-summary--no-img  wt-blog__post-summary--text  wt-blog__post-summary--has-topic ">
		                              <div class="wt-blog__post-summary__content">
		                                 <h3><a class="blog-sidebar-link" href="<?php echo base_url(); ?>read-blog/<?php echo @$list_data["id"]; ?>/<?php echo implode("-",explode(" ",@$list_data["title"])); ?>"> <?php echo @$list_data["title"] ?></a></h3>
		                                 <br>
		                                 <div class="wt-blog__post-summary__meta">
		                                   <a class="blog-sidebar-link" href="<?php echo base_url(); ?>read-blog/<?php echo @$list_data["id"]; ?>/<?php echo implode("-",explode(" ",@$list_data["title"])); ?>"> <p class="blog-sidebar-link" href=""><i class=" fa fa-calendar"></i> <?php echo @$list_data["date"]; ?></p></a>
		                                 </div>
		                              </div>
		                            </div>
		                            </div>
		                         </div>
                              </div>

<?php } } ?>
                            
                        
							</div>
							
					</div>
				</div>
			</section>
</div>