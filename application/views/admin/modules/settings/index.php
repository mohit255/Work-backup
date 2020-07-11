
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Settingst</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
        <?php if($this->session->flashdata('message')) { ?>

            <?php echo $this->session->userdata('message');?>

         <?php }

         ?>    

               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="faqs_categories">
                           <h4>
                              Admin Settings

                           </h4>
                       <!--     <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="<?php echo 'FAQ/add-new-content'; ?>"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New</button></a> -->

                        </div>
                        <div class="panel-body">
                          <div class="tabbable">
   <ul class="nav nav-tabs">
      <li class="active"><a href="#General" data-toggle="tab" aria-expanded="true">General</a></li>
      <li class=""><a href="#SEO" data-toggle="tab" aria-expanded="false">SEO</a></li>
      <li class=""><a href="#social_links" data-toggle="tab" aria-expanded="false">Social Links</a></li>
      <li class="hidden"><a href="#push_notification" data-toggle="tab" aria-expanded="false">Push Notification</a></li>
      <li class=""><a href="#Payments" data-toggle="tab" aria-expanded="false">Payments</a></li>
      <!-- <li class=""><a href="#social_links" data-toggle="tab" aria-expanded="false">Social Links</a></li> -->
   </ul>
   <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
   <div class="tab-content no-margin">
      <div class="tab-pane active" id="General">


    <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Website Name</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="website_name" name="website_name" placeholder="Dreamguy's Technologies" value="<?php if (isset($website_name)) echo $website_name;?>">

    	</div></div>
 <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Base domain</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="base_domain" readonly="" name="base_domain" placeholder="https://www.dreamguys.co.in/" value="<?php if (isset($base_domain)) echo $base_domain;?>">

    	</div></div>
 <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Website Slogan</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="website_slogan" name="website_slogan" placeholder="Service Marketplace" value="<?php if (isset($website_slogan)) echo $website_slogan;?>">

    	</div></div>

 <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Currency</label><div class="col-sm-10">

    			<?php 
									$sell_gigs_total = $this->db->count_all_results('sell_gigs');
									$payments_total  = $this->db->count_all_results('payments');
									$currency_option = (!empty($currency_option))?$currency_option:'USD';
									if($sell_gigs_total == 0 && $payments_total == 0 ){		
							 ?>

									      <select class="form-control" name="currency_option" id="currency_option" required>

                                            <option value="USD" <?php echo ($currency_option=='USD')?'selected':''; ?>>USD</option>

                                            <option value="EUR" <?php echo ($currency_option=='EUR')?'selected':''; ?>>EUR</option>

                                            <option value="GBP" <?php echo ($currency_option=='GBP')?'selected':''; ?>>GBP</option>

                                          </select>
                                           <?php }else{ ?>
                                          	<p><strong><?php echo $currency_option; ?></strong></p>
                                          <?php }  ?>

    	</div></div>


<?php 

										$currency_sign = '$';

										if(!empty($currency_option)=='USD'){

											$currency_sign = '$';

										}

										if(!empty($currency_option)=='EUR'){

											$currency_sign = '€';

										}

										if(!empty($currency_option)=='GBP'){

											$currency_sign = '£';

										}





									if(!isset($price_option)){

										$price_option = 'fixed';

									} ?>	

 <div class="form-group hidden">
    	<label for="inputPassword3" class="col-sm-2">Price Option</label><div class="col-sm-10">

    		<select class="form-control" name="price_option" onchange="priceoption(this)">

														<option value="fixed" <?php echo ($price_option=='fixed')?'selected':''; ?>>Fixed</option>

														<option value="dynamic" <?php echo ($price_option=='dynamic')?'selected':''; ?> >Dynamic</option>

													</select>
<span class="help-block small">Seller can add dynamic price, choose dynamic price option</span>
    	</div></div>


    	 <div class="form-group" <?php echo ($price_option=='dynamic')?'style="display:none"':''; ?>>
    	<label for="inputPassword3" class="col-sm-2">Base Extra Gig Price</label><div class="col-sm-10">

    		<span class="input-group-addon"><?php echo $currency_sign; ?></span>

													<input type="text" class="form-control numberonly" id="base_extra_gig_price" maxlength="5" <?php echo ($price_option=='fixed')?'required':''; ?>  name="extra_gig_price"  value="<?php if (isset($extra_gig_price)) echo $extra_gig_price;?>">


    	</div></div>


 <div class="form-group hidden">
    	<label for="inputPassword3" class="col-sm-2">Admin's Commision %</label><div class="col-sm-10">

    		
<div class="input-group"><span class="input-group-addon">%</span><input type="text" class="form-control numberonly" onkeyup="this.value = fnc(this.value, 0, 50)" required id="admin_commision" name="admin_commision" value="<?php if (isset($admin_commision)) echo $admin_commision;?>"></div>


													


    	</div></div>
 <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Website Logo</label>
    	<div class="col-sm-10">

    		<div class="media">

													<div class="media-left">

														<?php if (!empty($logo_front)){ ?><img style="width: 100px; height: 70px;" src="<?php echo base_url().$logo_front?>" class="site-logo" /><?php } ?>

													</div>

													<div class="media-body">

														<div class="uploader"><input type="file" id="site_logo" multiple="true"  class="form-control" name="site_logo" placeholder="Select file"></div>

														<span class="help-block small">Recommended image size is <b>150px x 150px</b></span>
<div id="img_upload_error" class="text-danger"  style="display:none">Please upload valid image file.</b></div>
													</div>

												</div>
											</div>


    	</div>

<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Favicon</label><div class="col-sm-10">

    		<div class="media">

													<div class="media-left">

														<?php if (!empty($favicon)){ ?><img style="width:30px; height:30px;" src="<?php echo base_url().'uploads/logo/'.$favicon?>" class="fav-icon" /><?php } ?>

													</div>

													<div class="media-body">

														<div class="uploader"><input type="file"  multiple="true"  class="form-control" id="favicon" name="favicon" placeholder="Select file"></div>

														<span class="help-block small">Recommended image size is <b>16px x 16px</b> or <b>32px x 32px</b></span>
<span class="help-block small">Accepted formats: only png and icon</span>
<span class="help-block small" style="display:none" id="img_upload_errors">Please upload valid image file.</span>
													</div>

												</div>


    	</div></div>
	


<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Google analytics code</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="google_analytics_code" name="google_analytics_code" value="<?php if (isset($google_analytics_code)) echo $google_analytics_code;?>">



    	</div></div>



  </div>
      <div class="tab-pane" id="SEO">
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Meta title</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="mete_title" name="meta_title" value="<?php if (isset($meta_title)) echo $meta_title;?>">



    	</div></div>
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Meta keywords</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="meta_keywords" name="meta_keywords" value="<?php if (isset($meta_keywords)) echo $meta_keywords;?>">



    	</div></div>

<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Meta description</label><div class="col-sm-10">

    		<textarea class="form-control" rows="6" id="meta_description" name="meta_description"><?php if (isset($meta_description)) echo $meta_description;?></textarea>




    	</div></div>

      </div>
      <div class="tab-pane" id="social_links">
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">FaceBook</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="facebook" name="facebook" placeholder="https://www.facebook.com" value="<?php if (isset($facebook)) echo $facebook;?>">




    	</div></div>
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Twitter</label><div class="col-sm-10">

    		<input type="text" class="form-control" id="Twitter" name="twitter" placeholder="https://www.twitter.com" value="<?php if (isset($twitter)) echo $twitter;?>">




    	</div></div>

<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Instagram</label><div class="col-sm-10">

    	<input type="text" class="form-control" id="googleplus" name="google_plus" placeholder="https://instagram.com" value="<?php if (isset($google_plus)) echo $google_plus;?>">




    	</div></div>
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">Pinterest</label><div class="col-sm-10">

    	<input type="text" class="form-control" id="LinkedIn" name="linkedIn" placeholder="www.pinterest.com" value="<?php if (isset($linkedIn)) echo $linkedIn;?>">




    	</div></div>


      </div>
      <div class="tab-pane" id="push_notification">
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">One Signal Subdomain</label><div class="col-sm-10">

    	<input type="text" class="form-control" id="one_signal_subdomain" name="one_signal_subdomain"   value="<?php if (isset($one_signal_subdomain)) echo $one_signal_subdomain;?>">




    	</div></div>
<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">One Signal AppId</label><div class="col-sm-10">

    	<input type="text" class="form-control" id="one_signal_app_id" name="one_signal_app_id"  value="<?php if (isset($one_signal_app_id)) echo $one_signal_app_id;?>">



    	</div></div>

    	<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">One Signal Reset Key</label><div class="col-sm-10">

    	<input type="text" class="form-control" id="one_signal_reset_key" name="one_signal_reset_key" value="<?php if (isset($one_signal_reset_key)) echo $one_signal_reset_key;?>">



    	</div></div>

  </div>
       <div class="tab-pane" id="Payments">
        <div class="panel panel-red"><div class="panel-heading"><h3 class="text-primary">PayPal</h3></div>
        <div class="panel-body">
        	<div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">PayPal</label><div class="col-sm-10">

    	<?php 

												 $ckd1 = 'checked="checked"';

												 $ckd2 = '';

												if (isset($paypal_option)){

													if($paypal_option==1){

														$ckd1 = 'checked="checked"';

												 		$ckd2 = '';

													}

													if($paypal_option==2){

														$ckd1 = '';

												 		$ckd2 = 'checked="checked"';

													}

												} ?>
												<label class="radio-inline">

														<input type="radio" <?php echo $ckd1; ?> name="paypal_option" value="1"> SandBox

												</label>

												<label class="radio-inline">

														<input type="radio" <?php echo $ckd2; ?> name="paypal_option" value="2"> Live

												</label>


    	</div></div>
       <div class="form-group">
    	<label for="inputPassword3" class="col-sm-2">PayPal Payment</label><div class="col-sm-10">

    	<?php 

												 $ckd1 = 'checked="checked"';

												 $ckd2 = '';

												if (isset($paypal_allow)){

													if($paypal_allow==1){

														$ckd1 = 'checked="checked"';

												 		$ckd2 = '';

													}

													if($paypal_allow==2){

														$ckd1 = '';

												 		$ckd2 = 'checked="checked"';

													}

												} ?>

												<label class="radio-inline">

														<input type="radio" <?php echo $ckd1; ?> name="paypal_allow" value="1"> Active

												</label>

												<label class="radio-inline">

														<input type="radio" <?php echo $ckd2; ?> name="paypal_allow" value="2"> Inactive

												</label>

    	</div></div>

        </div>
    </div>


       </div>
   </div>
   <div class="row">
	<div class="col-md-12">
		&nbsp;
	</div>
</div>
<div class="row">
	<div class="col-md-3 col-md-offset-3">
		<button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>
	</div>
</div>

</form>
</div>
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>
   
                                      