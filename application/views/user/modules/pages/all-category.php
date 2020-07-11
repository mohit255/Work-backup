<div class="">			
			<div class="milestone-area">	
				<div class="container">
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="http://digimonk.net/rodolfo//">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active">My Profile</li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">

							<h3 class="page-title">Catagories</h3>

						</div>

					</div>		
				</div>
			</div>
			<section class="" style="background:url(<?php echo base_url(); ?>assets/images/cat_page_image/banner.jpg); background-size: cover; padding: 50px 0;">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<form method="post" action="<?php echo base_url(); ?>user/search/data_set_searck_button"> 
            <div class="input-group" id="adv-search" style="width: 95%; margin-left: 2%;">
              <input type="hidden" name="types" value="categories">
                <input type="text" class="form-control search-box mp_input" required="" name="quick_search_4" placeholder="Search more Catagories..." aria-autocomplete="list" aria-owns="mp_quick_search_list" autocomplete="off" role="combobox" aria-required="false"><ol class="mp_list" aria-atomic="true" aria-busy="false" aria-live="polite" id="mp_quick_search_list" role="listbox" style="display: none;"></ol>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            
                        </div>
                        <button type="submit" class="btn btn-primary search-btn"><span class="" aria-hidden="true">SEARCH</span></button>
                    </div>
                </div>
            </div>
            </form>
						</div>
						</div>
					</div>
				</div>
			</section>
			<section class="" style="background: #F0F0F0; padding: 24px 0;">
                 <div class="container">
                 	<div class="megalist-menu__columns">
         
<div class="row">
    
<?php if(@$categorys) {  foreach(@$categorys as $cat) { ?>


   <?php 

// var_dump($cat);
   if(@$cat["category_image"])
          {
            $image=base_url()."assets/cat_image/".@$cat["category_image"];
          }
          else
          {
            $image=base_url()."assets/cat_image/film.png";
          }
         
    ?>
<div class="col-md-3">
 <a href="<?php echo base_url(); ?>search/index/0/categories/<?php echo @implode("-",explode(" ",@$cat["name"]))."/all-state/no-zip-code/"; ?>"><img src="<?php echo $image; ?>" style="width: 30px; height:30px;">
  <?php echo @$cat["name"]; ?></a>
  <br>
</div>
<!-- <li>
  <a href="<?php echo base_url(); ?>search/index/categories/<?php echo $cat["CATID"]."/".implode("-",explode(" ",@$cat["name"])); ?>"><img src="<?php echo $image; ?>" style="width: 30px; height:30px;"><?php echo @$cat["name"]; ?></a>
</li> -->

<?php } }  ?>
</div>









         <!--  <div class="megalist-menu__columns__col">
            <div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Digital Marketing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/social-media.png" style="width: 30px; height:30px;"> Social Media Marketing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/seo.png" style="width: 30px; height:30px;"> SEO</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/content.png" style="width: 30px; height:30px;"> Content Marketing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/content.png" style="width: 30px; height:30px;"> PPC</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/EMAILMARKETING.png" style="width: 30px; height:30px;"> Email Marketing </a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/wordpress-logo.png" style="width: 30px; height:30px;"> WordPress</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/cms.png" style="width: 30px; height:30px;"> Website Builders & CMS</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/cms.png" style="width: 30px; height:30px;"> ORM</a>
</li>

  </ul>
</div></div> -->
        <!--   <div class="megalist-menu__columns__col">
            <div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Programming Tech.</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/cms.png" style="width: 30px; height:30px;"> Web designing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/app.png" style="width: 30px; height:30px;"> Mobile app designing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/ECOMMERCE.png" style="width: 30px; height:30px;"> Ecommerce</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/cms.png" style="width: 30px; height:30px;"> CMS</a>
</li>

  </ul>
</div></div> -->
<!-- <div class="megalist-menu__columns__col">
<div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Fun & lifestyle </a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/art.png" style="width: 30px; height:30px;"> Art & Craft</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/relation.png" style="width: 30px; height:30px;"> Relationship Advice</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/health.png" style="width: 30px; height:30px;"> Health, Nutrition & Fitness</a>
</li>


  </ul>
</div></div> -->


        <!--   <div class="megalist-menu__columns__col">
            <div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Writting</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/website_content.png" style="width: 30px; height:30px;"> Website Content</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/tech_wri.png" style="width: 30px; height:30px;"> Technical Writing</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/product_description.png" style="width: 30px; height:30px;"> Product Descriptions</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/blog.png" style="width: 30px; height:30px;"> Blogger</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/blog.png" style="width: 30px; height:30px;"> Resumes & Cover Letters</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/blogging_(1).png" style="width: 30px; height:30px;"> Articles & Blog Posts</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/blog.png" style="width: 30px; height:30px;"> Books</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/blog.png" style="width: 30px; height:30px;"> Novel</a>
</li>
  </ul>
</div></div> -->

        <!--   <div class="megalist-menu__columns__col">
            <div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Video & Animation</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/white.png" style="width: 30px; height:30px;"> Animated Explainers</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/intros.png" style="width: 30px; height:30px;"> Intros & Outros</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/ANIMATION.png" style="width: 30px; height:30px;"> Logo Animation</a>
</li>
<li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/slideshow.png" style="width: 30px; height:30px;"> Slideshows & Promo Videos</a>
</li>

  </ul>
</div><div class="basic-list-menu--inverted">

</div><div class="basic-list-menu--inverted">
  <ul>
    
<li class="featured-item">
  <a href="">Music</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/voice-recognition.png" style="width: 30px; height:30px;"> Voice Over</a>
</li><li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/mix.png" style="width: 30px; height:30px;"> Mixing & Mastering</a>
</li>
<li>
  <a href=""><img src="http://work.digimonk.net/assets/cat_image/producer.png" style="width: 30px; height:30px;"> Producers & Composers</a>
</li>

  </ul>
</div></div> -->


        </div>
                 </div>

			</section>
    </div>