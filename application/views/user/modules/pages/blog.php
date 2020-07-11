		<div class="content">			
			<div class="milestone-area">	
				<div class="container">
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active">My Profile <i class="fa fa fa-chevron-right"></i></li>        
								<li class="active">Result <?php echo @$result; ?></li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">
<input type="hidden" value="<?php echo @$cate_name;  ?>" id="get_categoryes">
							<h3 class="page-title"><a href="<?php echo base_url(); ?>our-blog/all/all"> Our Blog</a> <?php if(@$cate_name!="all") { echo " - ".implode(" ",explode("-", @$cate_name)); } ?>



							<?php if(@$blog_name!='all'){
							 echo "<br>".implode(" ",explode("-", @$blog_name));
							  } ?> </h3>

						</div>

					</div>		
				</div>
			</div>
			<section class="" style="background: #F0F0F0; padding: 24px 0;">
				<div class="container">
					<div class="row">
						<div class="col-md-8">
                            <div class="row">
                            	
                            <?php if(@$list) { foreach($list as $item) { ?>
                     
                            	<div class="col-md-6">
                            		<div class="Card PageDashboard-card WidgetUserDetails">
                            			<?php  if(@$item['image']){ 

   $imgs_set=base_url().'assets/cat_image/'.$item['image'];
}
 else
 {
    $imgs_set=base_url().'assets/cat_image/1539777409_rodolfo_logo.png';
 }

 ?>			
                            			<a href="<?php echo base_url(); ?>read-blog/<?php echo @$item["id"]; ?>/<?php echo implode("-",explode(" ",@$item["title"])); ?>"><div class="blog_page_img" style="background:url(<?php echo @$imgs_set; ?>); ">
		                                 </div></a>
		                                 <div class="blog_page_content" style="word-break: break-all;">
											<div class="date_block"><p><i class="fa fa-calendar"></i> Date: <?php echo @$item["date"]; ?><span class="blog_cat_block"></span></p></div>
<a href="<?php echo base_url(); ?>read-blog/<?php echo @$item["id"]; ?>/<?php echo implode("-",explode(" ",@$item["title"])); ?>" style="font-size: 20px; color: #000;">
<?php 

												if(strlen(@$item["title"])>30){

													echo substr(@$item["title"],0,30)."...";
												}
												else
												{
                                                    echo @$item["title"];
												} 

												?>
											<p >
												<?php 

												if(strlen(@$item["content"])>100){
// var_dump();
													// echo substr(@$item["content"],0,100)."...";
												}
												else
												{
                                                    // echo @$item["content"];
												} 

												?>

											</p>
											<p><a href="<?php echo base_url(); ?>read-blog/<?php echo @$item["id"]; ?>/<?php echo implode("-",explode(" ",@$item["title"])); ?>" class="blog_btn">Read More</a>
														</span></p><div class="clearfix"></div>
										 </div>
                            		</div>
                            	</div>
<?php  } } ?>

                            </div>
<div class="row">
 <div class="col-md-4 col-md-offset-4">
 	<?php echo @$links; ?>
 </div>
</div>

						</div>
						<div class="col-md-4">
							<div class="seach_box_blog">
								<!--<input type="text" name="" placeholder="Search here"><button><i class="fa fa-search"></i></button>-->
								<form action="" method="GET">

<select class="form-class states_of_select_2" id="search_blog_for_data">
	<option value="">Search Blog</option>
	<?php if(@$select_all_blog) { foreach($select_all_blog as $blog) { 

   if(implode(" ",explode("-", @$blog_name))==@$blog["title"])
   {
   	$set_sta='selected=""';
   }
   else
   {
   	 $set_sta='';
   }

		?>

<option value="<?php echo @$blog["title"]; ?>" <?php echo $set_sta; ?>><?php echo @$blog["title"]; ?></option>
	<?php } } ?>
</select> 

									
							</div>

<div id="user-details"><div class="Card PageDashboard-card WidgetUserDetails">
							    <div class="WidgetUserDetails-info">
				                    <div class="blog_category">
<h2>Categories</h2>
										<div class="recent_blogs category_blog_nr">

											<ul>
												<?php if(@$categorys) {  foreach(@$categorys as $cat_data) { ?>
   <li><a href="<?php echo base_url()."our-blog/".implode("-",explode(" ", @$cat_data["name"]))."/".@$blog_name; ?>">
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


<?php if(@$today) {  ?>
							<h3> Recent Blogs</h3>
                           <div id="user-details">
                           	<?php foreach(@$today as $list_data) { ?>
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

<?php }  ?>
                            
                        
							</div>
<?php } ?>
							
					</div>
				</div>
			</section>
</div>