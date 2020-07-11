		<div class="content">			
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

							<h3 class="page-title">Contact Us</h3>

						</div>

					</div>		
				</div>
			</div>
			<section class="" style="background: #F0F0F0; padding: 24px 0;">
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
					<div class="row">
						<div class="col-md-6 col-md-offset-3">
							<h2 style=" text-align: center;color: #4d4d4d;font-size: 36px;">Have a Query?</h2>
							<p style=" text-align: center; line-height: 1.6; color: #4d4d4d; font-size: 20px;">Fill in this form and tell us a little about you.<br>
							        You will hear from our team sooner than you think. </p>
							        <br>
							<section class="Card PageDashboard-card recent-projects-section">
			<form action="<?php echo base_url() ?>gigs/add_enquery" method="post">
        	<input type="hidden" name="url" value="gigs/contact_us">
								 <div class="input-group">
			                               <input  type="text" class="form-control" name="name" required="" placeholder="Name*">
			                                
			                     </div>
			                     <br>
			                     <div class="input-group">
			                               <input  type="email" class="form-control" name="email" required="" placeholder="Email*">
			                                
			                     </div>
			                     <br>
			                     <div class="input-group">
			                               <input type="text" class="form-control set_number_only" name="number" required="" placeholder="Phone*">
			                                
			                     </div>
			                     <br>
			                     <div class="input-group">
			                              <textarea  rows="6" name="message" required="" style="width: 100%;" placeholder="Message...."></textarea>
			                                
			                     </div>
			                     <br>
			                     <input type="submit" value="Get in Touch" name="submit" id="formSubmit" class="btn btn-primary">
</form>
							</section>

						</div>
					</div>

				</div>
							<div class="company-addresses">
    <div class="address">
      <h3>Head Office</h3>
       <p>35-A, lorel ispun, Opp. loren ispun  , employé dans la ,composition 474001</p>
      <!--  <h3>Australia</h3>
       <p>9 / 2A Federal Rd,<br> 
          Seven HillsNSW - 2147,<br>
                Australia</p> -->
    </div>
    <div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3579.4693211506756!2d78.16823131461896!3d26.213935983433526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3976b771a042c3ab%3A0xef13ad0f47394b38!2sDigiMonk+-+Digital+Marketing+Institute+%26+Agency!5e0!3m2!1sen!2sin!4v1533295250964" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe></div>
    <div class="address">
      <h3>Talk to an Expert</h3>
      <ul>
         <li><i class="fa fa-phone"></i> &nbsp;<a href="tel:+18325485757">+91 996320200</a></li>
        <li><i class="fa fa-phone"></i> &nbsp;<a href="tel:+14698443346">+91 996320263</a></li>			
        
       
		
      <li><i class="fa fa-envelope"></i> &nbsp;<a href="info@influencer.in">info@inluencer.in</a> </li>
      </ul>
      <!-- <h3>Career</h3>
      <ul>
        <li><i class="phone"></i> <span> <a href="">+91 7722845500</a></span></li>
        <li><i class="email"></i> <span> <a href="info@digimonk.in">info@digimonk.in </a></span></li>
      </ul> -->
      
    </div>
  </div>
			</section>
