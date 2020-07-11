		<div class="content">			
			<div class="milestone-area">	
				<div class="container">
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="http://digimonk.net/rodolfo//">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active"></li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">

							<h3 class="page-title">Help center</h3>

						</div>

					</div>		
				</div>
			</div>
			<section style="background: #F0F0F0; padding: 24px 0;">
				<div class="container">
					<?php if(@$this->session->flashdata("notic")) { ?>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="alert alert-success alert-dismissible">
						  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
						  <strong></strong> <?php echo @$this->session->flashdata("notic"); ?>
						</div>
					</div>
				</div>	
				<?php } ?>
					<div class="row search">
				        <div class="col-md-6 col-md-offset-3">
				          <div class="row text-center">
				             <p style="text-align: center; line-height: 91px;font-size: 47px; font-weight: lighter; font-family: 'Roboto', sans-serif;color: rgb(55, 70, 90);">How can we help you?</p>
				             <!-- <p style="text-align: center; line-height: 30px; font-size: 18px;">Save time and get a higher return on your investment by easily <br> finding the right influencer for your business. </p> -->
				          </div>
				           <div class="row">
				         <div class="col-md-12">
				            <form action="<?php echo base_url(); ?>gigs/form_submit" method="post">
				            <div class="input-group" id="adv-search" style="width: 95%; margin-left: 2%;">
				                <input type="text" class="form-control search-box mp_input" required="" name="quick_search_2" placeholder="How can i help you." aria-autocomplete="list" aria-owns="mp_quick_search_list" autocomplete="off" role="combobox" aria-required="false"><ol class="mp_list" aria-atomic="true" aria-busy="false" aria-live="polite" id="mp_quick_search_list" role="listbox" style="display: none;"></ol>
				                <div class="input-group-btn">
				                    <div class="btn-group" role="group">
				                        <div class="dropdown dropdown-lg">
				                            
				                        </div>
				                        <button type="submit" class="btn btn-primary search-btn"><span class="" aria-hidden="true">SEARCH</span></button>
				                    </div>
				                </div>
				            </div>
              </form>
				            <p style="text-align: center; line-height: 32px; font-size: 20px;"><i>Try it, it's 100% free. No demo require</i></p>
				          </div>
				      </div>
				        </div>
				     </div>
				     <div class="row">
				     	<div class="container help_center_wrapper">
							<div class="container help_center_wrapper"> 
							  <p class="not_found">Not able to find your Answer  ?  click <a href="#" data-toggle="modal" data-target="#help_center">Here</a> for support</p>
							</div>
<?php if(@$category) { foreach ($category as $cat) { ?>
	<div class="col-md-4 help_center_inner text-center">
						      	 <a href="<?php echo  base_url(); ?>help-center/category/<?php echo @$cat["id"]; ?>/<?php echo implode("-",explode(" ", @$cat["name"])); ?>"><h2>
						      	 	<img src="<?php echo  base_url(); ?>assets/cat_image/<?php echo @$cat["category_image"]; ?>" style="width: 30px; height:30px;">
						      	 </h2>
						       <h3><?php echo @$cat["name"]; ?></h3></a>
						      </div>
<?php } } ?>
						      

                        </div>

				     </div>
				</div>
			</section>
</div>



<div id="help_center" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">For enquery</h4>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url() ?>gigs/add_enquery" method="post">
        	<input type="hidden" name="url" value="gigs/help_center">
        	<div class="row">
        		<div class="col-md-12">
        			<label>Name</label>
        			<input type="text" placeholder="Name" name="name" class="form-control" required="">
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<label>E-mail</label>
        			<input type="email" placeholder="E-mail" name="email" class="form-control" required="">
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<label>Contact Number</label>
        			<input type="text" placeholder="Number" name="number" class="form-control set_number_only" required="">
        		</div>
        	</div>
        	<div class="row">
        		<div class="col-md-12">
        			<label>Message</label>
        			<textarea class="form-control" placeholder="Message.." name="message" rows="5" required=""></textarea>
        		</div>
        	</div>
        	<br>
        	<br>
        	<div class="row">
        		<div class="col-md-12">
        			<button type="submit" class="btn btn-primary btn-block">Send</button>
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