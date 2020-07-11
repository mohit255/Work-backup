<!-- <?php //include('include/header.php')?> -->
<?php
$this->load->view($theme . '/includes/header');
?>
<section class="explore">
	<div class="container">
    <div class="row">
      <div class="col-md-12" id="register_success">
      
<?php if(@$this->session->flashdata("fail")){ ?>
        <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> <?php echo @$this->session->flashdata("fail"); ?>
</div>
<?php } ?>
<!-- <?php if(@$this->session->flashdata("pass")){ ?>
        <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>!</strong> <?php echo @$this->session->flashdata("pass"); ?>
</div>
<?php } ?> -->
      </div>
    </div>
		<div class="row">
			<div class="col-md-6 col-md-offset-3" style="border:1px solid #666">
                 <div class="">
                 	<div class="col-md-10 col-md-offset-1">
                    <br>
                 		<div class="row">
							<p style="text-align: center; line-height: 42px; font-size: 30px;"><font color="#37465a">Create An Account</font></p>
							<p style="text-align: center; line-height: 25px; font-size: 18px;"><font color="#37465a">Try it, its 100% free. No demo required.</font></p>
						</div>
            
						<form action="<?php echo base_url(); ?>signup/" id="users_register" class="form-horizontal" method="post">
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="input-group">
                                   <input type="text" class="form-control" id="name" name='name' aria-label="Amount (rounded to the nearest dollar)" placeholder="First Name" required>
                                           
                                  </div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="input-group">
                                   <input type="text" class="form-control" id="lname" name='lname' aria-label="Amount (rounded to the nearest dollar)" placeholder="Last Name" required>
                                           
                                  </div>
                        	</div>
                        </div>
                        <br>
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="input-group">
                                   <input type="email" id="email"  name='email' class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Email" required>
                                           
                                  </div>
                        	</div>
                          </div>
                          <br>
                      <div class="row">
                        	<div class="col-md-12">
                        		<div class="input-group">
                                   <input type="text" class="form-control set_number_only" id="phone" name='phone' maxlength="12" aria-label="Amount (rounded to the nearest dollar)" placeholder="Phone" required>
                                           
                                  </div>
                        	</div>
                        </div>
                        
                         <div class="row">
                          <div class="col-md-12">
                            <div class="input-group" style="width: 100%;">
                                   <input type="hidden" value="user_<?php echo strtotime("now"); ?>" class="form-control" name="username"  minlength=5  id="username"  aria-label="Amount (rounded to the nearest dollar)" placeholder="Username" required>
                                           
                                  </div>
                          </div>
                        </div> 
                        <br>
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="input-group" style="width: 100%;">
                                   <input type="password" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Password" id="reg_password" name="Password" required>
                                           
                                  </div>
                        	</div>
                        </div>
                        <br>
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="input-group" style="width: 100%;">
                                   <input type="password" class="form-control" aria-label="Amount (rounded to the nearest dollar)" placeholder="Confirm Password" id="repeatpassword" name="RepeatPassword" required>
                                           
                                  </div>
                        	</div>
                        </div>
                        <br>
                        <div class="row">
                        	<div class="col-md-12">
                        		<div class="input-group" style="width: 100%;">
                                  <select name="are_you" id="are_you" class="form-control" required>
                                      <option value="" selected="selected" disabled="true">- Are you business or influencer -</option>
                                      <option value="Long">Business</option>
                                      <option value="Short">Influencer</option>
                                      

                                      </select>
                                  </div>
                        	</div>
                        </div>
                        <br>
                        <div class="row">
                        	<div class="col-md-6">
                        		<div class="input-group" style="width: 100%;">
                                 <select name="country_id" id="country_id" class="form-control" required > 
                                  <option value="">Select Country</option>
                                  <option value="231">United States</option>

                                 <!--  <?php if(!empty($country_list)) { ?>
                                  <?php foreach($country_list as $countries) { ?>
                                  <option value="<?php echo $countries['id']; ?>" ><?php echo $countries['country']; ?></option>
                                  <?php } ?>
                                  <?php } ?> -->
                                </select>
                                  </div>
                        	</div>
                        	<div class="col-md-6">
                        		<div class="input-group" id="state_id_dsp" style="width: 100%;">
                                  <select name="state_id" class="form-control" required>
                                    <option value="">Select State</option> 
                                    <?php if(!empty($state_list)) { 
                                      foreach($state_list as $state) { ?>
                                    <option value="<?php echo $state['state_id']; ?>" ><?php echo $state['state_name']; ?></option>
                                  <?php }
                                   } ?>
                              </select>
                                  </div>
                        	</div>
                        </div>
                        <br>
                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                <div class="col-lg-12">
                  <div class="terms-text text-center">
                    By signing up, I agree to <?php echo  $this->site_name; ?>  <a href="<?php echo base_url().'terms';?>" target="_blank" style="color:#1874c6; font-weight: bold;"> Terms of conditions</a>.               
                  </div>    
                </div>                    
              </div>
                          </div>
                        </div>
                        <div class="row">
                        	<div class="col-md-6 col-md-offset-3">
                        		<button class="dynamic-button" type="submit"  id="registers" style="width: 100%;border-color:#4ac102"> Sign Up</button>
                        		<p style="text-align: center; line-height: 25px; font-size: 15px;"><font color="#37465a">Already a member? <a href="" data-toggle="modal" data-target="#login-popup" style="color:#1874c6; font-weight: bold;">Login</a></p>
                        	</div>
                        </div>
                        <br>
                   </form>
                 	</div>
			</div>
		</div>
	</div>
</section>


<div id="myModalSuccessRegistration" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p style="    text-align: center; font-weight: bold; margin-top: 50px; font-size: 16px;"><?php echo @$this->session->flashdata("pass"); ?>   </p>
      </div>
      <div class="modal-footer" style="border:none;">
        <!-- <a href="javascript:;" data-toggle="modal" data-target="#login-popup" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button></a> -->
        <a href="<?php echo base_url(); ?>" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" >Ok</button></a>
        
      </div>
    </div>

  </div>
</div>



<div id="myModalSuccessRegistration2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p style="    text-align: center; font-weight: bold; margin-top: 50px; font-size: 16px;">Account is activated successfully. kindly <a href="javascript:;" data-toggle="modal" data-target="#login-popup" style="margin-top: 5px; color:#4ac102;"><u>login </u></a>  </p>
      </div>
      <div class="modal-footer" style="border:none;">
        <a href="javascript:;" data-toggle="modal" data-target="#login-popup" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button></a>
        <!-- <a href="<?php echo base_url(); ?>" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" >Ok</button></a> -->
        
      </div>
    </div>

  </div>
</div>


<?php $this->load->view($theme . '/includes/footer'); ?>
