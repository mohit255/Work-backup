<div class="content" style="min-height: 249px;">			
			<div class="milestone-area">	
				<div class="container">
					<?php if($this->session->userdata('message')) {  ?>

               <div class="alert alert-success text-center fade in" id="flash_succ_message"><?php echo $this->session->userdata('message');?></div>

    <?php   $this->session->unset_userdata('message'); } ?>
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="<?php echo base_url(); ?>">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="<?php echo base_url().'user-profile/'.$user_name_set; ?>">About</li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">

							<h3 class="page-title">About</h3>

						</div>

					</div>		
					<div class="row milestone-section1">
						<div class="col-sm-2 text-center">
                           <a href="<?php echo base_url().'user-profile/'.$user_name_set; ?>">
							<span class="circle-bg orange-bg" ><img src="<?php echo base_url(); ?>assets/images/circle-map.png"></span>
							<p class="miles-title">Overview</p>
                            </a>
						</div>
						<div class="col-sm-2 text-center">
                           <a href="<?php echo base_url().'user-about/'.$user_name_set; ?>">
							<span class="circle-bg orange-bg" style="border: 10px solid #4ac102;"><img src="<?php echo base_url(); ?>assets/images/man-user.png"></span>
							<p class="miles-title">About</p>
						</a>
						</div>
						<?php if(@$profile["are_you"]=="Short") { ?> 
						<div class="col-sm-2 text-center">
							<a href="<?php echo base_url().'user-review/'.$user_name_set; ?>">
							<span class="circle-bg orange-bg"><img src="<?php echo base_url(); ?>assets/images/review.png"></span>
							<p class="miles-title">Review</p>
						</a>
						</div>
						<?php  if(@$this->session->userdata('SESSION_USER_ID')!="" && $user_id == $this->session->userdata('SESSION_USER_ID'))
{
	 $set_url_for_package="my-packages";
} 
 else
 {
    $set_url_for_package="user-packages/".$user_name_set;
 }
?>	
						<div class="col-sm-2 text-center">
							<a href="<?php echo base_url().''.$set_url_for_package; ?>">
							<span class="circle-bg green-bg"><img src="<?php echo base_url(); ?>assets/images/box.png"></span>
							<p class="miles-title">Packages</p>
						</a>
						</div>
						<?php } ?>
						<?php 

	if($this->session->userdata('SESSION_USER_ID')) { if($user_id != $this->session->userdata('SESSION_USER_ID')) { ?>
				
<div class="col-sm-2 text-center">
							<a  href="javascript:;" data-toggle="modal" data-target="#message-popup">
							<span class="circle-bg green-bg"><img src="<?php echo base_url(); ?>assets/images/get-paid-icon.png"></span>
							<p class="miles-title">Message</p>
						</a>
						</div>
				<!-- 	<li class="promoted">
			            <a href="javascript:;" data-toggle="modal" data-target="#message-popup">Message Me</a>
			          </li> -->

								    <?php }  }?> 
						<!-- <div class="col-sm-2 text-center">
							<a href="">
							<span class="circle-bg green-bg"><img src="http://work.digimonk.net/assets/images/get-paid-icon.png"></span>
							<p class="miles-title">Message</p>
						</a>
						</div> -->						
						<div class="col-sm-12">
						</div>
					</div>
				</div>
			</div>
	<?php $image = base_url()."assets/images/avatar-lg.jpg"; if(!empty($profile['user_profile_image'])){ $image = base_url().$profile['user_profile_image'];} 

					$name = $profile['username'];

							$username = $profile['username'];

							if(!empty($profile['fullname']))

							{

								$name = $profile['fullname'];

							}

					

					?>		
			<section id="post_gig_area" class="post-gig-area">	
				<div class="container">		
					<div class="row">
						<div class="col-md-8 col-sm-12">                                                   
                           <div class="main-div">
			
			<div class="row">
				<h1><?php echo $name; ?></h1>
				
				                <?php if(!empty($country_name)) { ?>
                    <p>FROM <?php echo $country_name; ?> <span class="ppcn country <?php echo $country_shortname; ?>"></span></p>
							 <?php } ?>
							 
							 				<ul class="list-inline">
                				 
				  <li class="user-rating feedback-area"> <span id="stars-existing" class="starrr" data-rating="<?php echo $user_feedback;?>"></span><span class="rating-count">(<?php echo $user_feedbackcount;?>)</span></li>
													
				</ul>
										<br>
										<?php if(!empty($profile['lang_speaks'])) { ?>

						<div class="user-language" style="color:#000; padding-bottom: 10px;">

							<span><img src="<?php echo base_url(); ?>assets/images/li-world.png" alt="" width="20" height="20"></span>

							Speaks: <span><?php echo ucfirst($profile['lang_speaks']); ?></span><span>

							<input type="hidden" value="" id="lang_speaks"> 

							</span>

						</div>

						<?php } ?>
										<br>
				<ul class="list-inline social-list1" style="margin-left: -12px;">
<?php if(@$profile["are_you"]=="Short") { ?>
				   <li class="user-rating feedback-area">
				  	<?php if(@$social_link["facebook"]) { ?>
                   <a href="<?php echo @$social_link["facebook"]; ?>"><span class="fa fa-facebook set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span></a>
				  	<?php } ?>
				  	<?php if(@$social_link["instagram"]) { ?>
                   <a href="<?php echo @$social_link["instagram"]; ?>"><span class="fa fa-instagram set_class_for_bd_dsp"></span></a>
				  	<?php } ?>


				  	<?php if(@$social_link["twitter"]) { ?>
                   <a href="<?php echo @$social_link["twitter"]; ?>"><span class="fa fa-twitter set_class_for_bd_dsp"></span></a>
				  	<?php } ?>


				  	<?php if(@$social_link["pinterest"]) { ?>
                   <a href="<?php echo @$social_link["pinterest"]; ?>"><span class="fa fa-pinterest set_class_for_bd_dsp"></span></a>
				  	<?php } ?>


				  	<?php if(@$social_link["youtube"]) { ?>
                   <a href="<?php echo @$social_link["youtube"]; ?>"><span class="fa fa-youtube set_class_for_bd_dsp"></span></a>
				  	<?php } ?>

				  	<?php if(@$social_link["linkedin"]) { ?>
                   <a href="<?php echo @$social_link["linkedin"]; ?>"><span class="fa fa-linkedin set_class_for_bd_dsp"></span></a>
				  	<?php } ?>


				  	<?php if(@$social_link["snapchat"]) { ?>
                   <a href="<?php echo @$social_link["snapchat"]; ?>"><span class="fa fa-snapchat set_class_for_bd_dsp"></span></a>
				  	<?php } ?>

				  	<?php if(@$social_link["blog"]) { ?>
                   <a href="<?php echo @$social_link["blog"]; ?>"><span class="fa fa-link set_class_for_bd_dsp"></span></a>
				  	<?php } ?>

				  	<?php if(@$social_link["podcast"]) { ?>
                   <a href="<?php echo @$social_link["podcast"]; ?>"><span class="fa fa-podcast set_class_for_bd_dsp"></span></a>
				  	<?php } ?>
						</li>
						<?php } ?>							
				</ul>
				
			</div>
			<!-- <div class="row">
				<div class="video">
					<video width="90%" controls="" autoplay="true">
					  <source src="http://2020.digimonk.net/wp-content/themes/20-20-engineering/assets/images/1.mp4" type="video/mp4">
					  <source src="http://2020.digimonk.net/wp-content/themes/20-20-engineering/assets/images/1.mp4" type="video/ogg">
					  Your browser does not support HTML5 video.
					</video>
				</div>
			</div> -->
			<br>
			<div class="row">
				<div class="row">	

						<div class="col-md-12">

                        
                            <h3 class="header-title" style="margin-left: 0px;"> About Me

                            </h3>

						</div>
<div class="col-md-12">
					<br>
				</div>
					</div>
					<?php if(@$profile['description']) { ?>
				<p class="user-desc" style="
    /* padding: 2px 0px 0 0; */
					    width: 90%;
					    text-align: justify;
					"><?php echo ucfirst($profile['description']); ?></p>
					<?php } ?>
		     </div>

		</div>

						</div>

						<div class="col-md-4">

							<div class="left-sidebar">	

								

								<div class="daily-figures">	

									<div class="row">
										<div class="img-prfl">
											<img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" title="<?php echo ucfirst($name); ?>" style="padding:10px;">
										</div>
									</div>
									<div class="edit-profile">
<?php 

						$login_user_id = $this->session->userdata('SESSION_USER_ID');

						if($profile['USERID'] == $login_user_id){ ?>
                       
						<div class="edit-profile">

							<a href="<?php echo base_url().'profile' ?>" title="Edit Profile" class="btn btn-primary btn-block"><i class="fa fa-pencil" style="font-size: 14px; color: #fff;"></i> Edit Profile</a> 

						</div>

						<?php } ?>


										<!--  <a href="" title="Edit Profile" class="btn btn-primary btn-block"><i class="fa fa-pencil" style="font-size: 14px; color: #fff;"></i> Edit Profile</a> 
 -->
									</div>
									<br>
									
			<?php  if(count(@$list)>0) { ?>					
		<div class="row">
			<div class="panel with-nav-tabs panel-primary">
                <div class="panel-heading">
                        <ul class="nav nav-tabs">
               <?php $i=1; foreach ($list as $lis) { 

              if($i==1)
              {
              	$set_class="active";
              }
              else
              {
              	$set_class="";
              }
              $data_in_array=explode("-",$lis["title"]);
                ?>
               	        	
    <li class="<?php echo $set_class; ?>"><a href="#tab<?php echo $i; ?>primary" data-toggle="tab"><?php echo $data_in_array["0"].".."; ?></a></li>
    
    <?php if($i==3) { break; } $i=$i+1; } ?>                        
                        </ul>
                </div>
                <div class="panel-body">
                    <div class="tab-content">

                    	 <?php $j=1; foreach ($list as $lis) { 

              if($j==1)
              {
              	$set_class="active";
              }
              else
              {
              	$set_class="";
              } ?>

                        <div class="tab-pane fade in <?php echo $set_class; ?>" id="tab<?php echo $j; ?>primary">

                            <!-- <h3><?php echo @$lis["gig_price"]." ".@$lis["currency_type"]; ?></h3> -->
                            <h3><?php echo "$".@$lis["gig_price"]; ?></h3>
                            	<p><?php echo ucfirst(str_replace("-"," ",$lis['title'])); ?></p>
                            	<a href="<?php echo base_url().'package-preview/'.$lis['title']."/".$lis['id']; ?>"> <button class="btn-primary"> continue</button></a>
                        </div>

                       <?php if($j==3) { break; } $j=$j+1; } ?>     
                        
                        
                    </div>
                </div>
            </div>
		</div>


			<?php }  ?>			
					</div>

							</div>

						</div>

					</div>	

				</div>	

			</section>

