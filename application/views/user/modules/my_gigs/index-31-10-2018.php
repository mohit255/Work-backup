<section class="profile-img">
<div class="container">
	<div class="col-md-12">
<div class="row">
	<div class="col-md-8">
		<div class="">
			<div class="row">
				<ul class="nav navbar-nav profile-nav"> 
			          <li>
			            <a href="<?php echo base_url().'user-profile/'.$user_name_set; ?>">Overview</a>
			          </li>
			          <li>
			            <a href="<?php echo base_url().'user-about/'.$user_name_set; ?>">About</a>
			          </li>
			          <li>
			            <a href="#">Review</a>
			          </li>
			          <li class="promoted" style="background-color: #b6b6b6;">
			            <a href="<?php echo base_url().'my-packages'; ?>">Packages</a>
			          </li> 
			         <?php 

	if($this->session->userdata('SESSION_USER_ID')) { if($user_id != $this->session->userdata('SESSION_USER_ID')) { ?>
					<li class="promoted">
			            <a href="javascript:;" data-toggle="modal" data-target="#message-popup">Message Me</a>
			          </li>

								    <?php }  }?> 
			          
		        </ul>
			</div>
			<?php $image = base_url()."assets/images/avatar-lg.jpg"; if(!empty($profile['user_profile_image'])){ $image = base_url().$profile['user_profile_image'];} 

					$name = $profile['username'];

							$username = $profile['username'];

							if(!empty($profile['fullname']))

							{

								$name = $profile['fullname'];

							}

					

					?>
		
			<div class="row">
				<div class="col-md-6">
				<h1><?php echo $name; ?></h1>
				<?php if(!empty($country_name)) { ?>
                    <p>FROM <?php echo $country_name; ?> <span class="ppcn country <?php echo $country_shortname; ?>"></span></p>
							 <?php } ?>
				<ul class="list-inline">


				  <li class="user-rating feedback-area"> <span id="stars-existing" class="starrr" data-rating="0"><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span><span class="fa fa-star-o"></span></span><span id="stars-existing" class="starrr" data-rating="<?php echo $user_feedback;?>"></span><span class="rating-count">(<?php echo $user_feedbackcount;?>)</span></li>
													
				</ul>
				</div>
				<div class="col-md-6">
					

					<a href="<?php echo base_url().'sell-service'; ?>"><button type="button" class="btn btn-primary btn-block" style=" margin-top: 20px; width: 80%;">Add New Package</button></a>
				</div>
			</div>
			<div class="row">
				<?php if(!empty($profile['lang_speaks'])) { ?>

						<div class="user-language" style="color:#000; padding-bottom: 10px;">

							<span><img src="<?php echo base_url(); ?>assets/images/li-world.png" alt="" width="20" height="20"></span>

							Speaks: <span><?php echo ucfirst($profile['lang_speaks']); ?></span><span>

							<input type="hidden" value="" id="lang_speaks"> 

							</span>

						</div>

						<?php } ?>

				<ul class="list-inline social-list1">

				  <li class="user-rating feedback-area">
				  	<?php if(@$social_link["facebook"]) { ?>
                   <a href="<?php echo @$social_link["facebook"]; ?>"><span class="fa fa-facebook set_class_for_bd_dsp" style="padding:9px 11px 9px 11px;"></span></a>
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
				  	<!-- <span class="fa fa-instagram"></span>
				  	<span class="fa fa-skype"></span>
				  	<span class="fa fa-twitter"></span> -->
				  </li>
													
				</ul>
			</div>
			
			<div class="row">	

						<div class="col-md-12">

                        <?php 

						$display_result = "Sorry! No Packages Found ";

						if($total_results!=0 && $total_results>1 ) { $display_result = $total_results . " Gigs found "; } 

						else if($total_results!=0 && $total_results==1) { $display_result = $total_results . " Gig found "; }  ?>

                            <h3 class="header-title"> <?php echo "My Packages"; //ucfirst($search_value); ?> <span>  <?php echo  "My Packages"; //$display_result; ?> </span>

                            </h3>

						</div>
<div class="col-md-12">
					<br>
				</div>
					</div>
			<div class="row">

                                    <?php 

                                    if(!empty($list)) {

										$country_name = $this->session->userdata('country_name');										 

										$rupee_rate   = $this->session->userdata('rupee_rate');

 										$dollar_rate   = $this->session->userdata('dollar_rate');								  

$i=1;

                                    foreach($list as $gigs ) 

                                    {

										   $gig_price = $gigs['gig_price'];



                                        

										 

										$currency_option = $gigs['currency_type'];

										$rate_symbol = '$';
 
										if(!empty($currency_option)=='USD' ){ $rate_symbol = '$'; }

										if(!empty($currency_option)=='EUR'){ $rate_symbol = '$'; }

										if(!empty($currency_option)=='GBP'){ $rate_symbol = '$'; }

											//$rate = $gigs_price['value']; // Fixed Price 

											$rate = $gig_price; // Dynamic Price 

											

											//$rate = number_format((float)$rate, 2, '.', '');

										 

										   

											$username = $gigs['username'];

											$name = '';

											if(!empty($gigs['fullname']))

											{

												$name = $gigs['fullname'];

											}

											$image = "assets/images/2.jpg";

											if(!empty($gigs['gig_image'])) {

											$image = base_url().$gigs['gig_image']; }  

											

											$user_img = base_url()."assets/images/avatar2.jpg";

											if(!empty($gigs['user_thumb_image']))

											{

											$user_img = base_url().$gigs['user_thumb_image'];    

											}

                                                                    

                                        	$gig_rating=0;

											$gig_rating1=0;

											if(!empty($gigs['gig_rating']))

											{

											$gig_rating1 = round($gigs['gig_rating']);  

											$gig_rating  = $gig_rating1 *2;  

											} 

											$gig_usercount=0;

											if(!empty($gigs['gig_usercount']))

											{

												$gig_usercount  = $gigs['gig_usercount'];  

											}    

                                        

                                        ?>

                                    <div class="col-md-4 col-sm-6 product-cols">                                        

										<div class="product">  

											<div class="product-img">

												<a href="<?php echo base_url().'package-preview/'.$gigs['title']; ?>"><img width="240" height="250" alt="<?php echo $gigs['title']; ?>" src="<?php echo $image; ?>"></a>

												<div id="edit_gig"><a href="<?php echo base_url()."edit-package/".$gigs['title']; ?>" class="edit_gig" title="Edit Gig"><i class="fa fa-pencil"></i></a></div>

                                            </div>

											<div class="product-detail">

												<div class="product-name"><a href="<?php echo base_url().'gig-package/'.$gigs['title']; ?>"><?php echo ucfirst(str_replace("-"," ",$gigs['title'])); ?></a></div>

												<div class="author">

													<span class="author-img">

														<a href="<?php echo base_url().'user-profile/'.$username; ?>"><img src="<?php echo $user_img;?>" title="<?php echo $gigs['fullname']; ?>" alt="" width="50" height="40"></a>

														<a class="author-name" href="<?php echo base_url().'user-profile/'.$username; ?>"><?php echo ucfirst($name); ?></a>

													</span>

													<div class="ratings">

														<span class="stars-block star-<?php echo $gig_rating;?>"></span><span class="ratings-count">(<?php echo $gig_usercount;?>)</span>

													</div>

												</div>

												<div class="price-box2">

													<div class="price-inner">

														<div class="rectangle">

															<h2><?php echo $rate_symbol.$rate; ?></h2>

														</div>

														<div class="triangle"></div>

													</div>

												</div>

												<div class="product-det">

													<div class="user-country text-ellipsis"><?php echo ucfirst($gigs['state_name']);?><?php if($gigs['state_name']!=''){ echo ', ';}?><?php echo ucfirst($gigs['country']); ?></div>	

													<div class="product-currency"></div>	

												</div>

											</div>

										</div>	

                                    </div>

                                    <?php if($i==3){ break; }  $i=$i+1; } } else { ?>      

                                    <div class="col-md-12"><p> Sorry ! No Packages Found  </p></div>

                                    <?php } ?>

                                </div>

		</div>
	</div>
	<div class="col-md-4">
		<div class="row">
			<div class="img-prfl">
			<?php
			
			$image = base_url()."assets/images/avatar-lg.jpg"; if(!empty($profile['user_profile_image'])){ $image = base_url().$profile['user_profile_image'];} 
			 ?>	
				<img class="card-img-top" src="<?php echo $image; ?>" alt="<?php echo $name; ?>" title="<?php echo ucfirst($name); ?>" style="padding:10px;">
			</div>
		</div>
		<?php 

						$login_user_id = $this->session->userdata('SESSION_USER_ID');

						if($profile['USERID'] == $login_user_id){ ?>
                       
						<div class="edit-profile">

							<a href="<?php echo base_url().'profile' ?>" title="Edit Profile" class="btn btn-primary btn-block"><i class="fa fa-pencil"></i> Edit Profile</a> 

						</div>

						<?php } ?>
		<br>
		<?php if(count(@$list)) { ?>
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
                            <h3><?php echo "$ ".@$lis["gig_price"]; ?></h3>
                            	<p><?php echo @$lis["gig_details"]; ?></p>
                            	<a href="<?php echo base_url().'gig-preview/'.$lis['title']; ?>"> <button class="btn-primary"> continue</button></a>
                        </div>

                       <?php if($j==3) { break; } $j=$j+1; } ?>
                        
                    </div>
                </div>
            </div>
		</div>
<?php } ?>

		<div class="row">
					         <?php 

	if($this->session->userdata('SESSION_USER_ID')) { if($user_id != $this->session->userdata('SESSION_USER_ID')) { ?>
					
					<div class="massage-me btn-massage set_class_for_bd_dsp">
						  <a href="javascript:;" data-toggle="modal" data-target="#message-popup">Message Me <i class="fa fa-comment" style="text-align: right;"></i></a>
				
			</div>

					<li class="promoted">
			          
			          </li>

								    <?php }  }?> 
			
		</div>
	</div>
</div>
</div>
</div>
 </section>