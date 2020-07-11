<?php
$this->load->view($theme . '/includes/header');
?>
<style type="text/css">
  button.btn.btn-primary.next-step1 {
    height: 40px;
    /* box-shadow: 0 0 11px 0; */
    border: 3px solid;
    /* border-image: linear-gradient(to right,#bf41a3,#61307a,#4f93ba) !important; */
    border-image-slice: 1;
    border-image-outset: 4;
}
</style>
<div class="s-page">
  <div class="container">
  	 <div class="row">
      <div class="col-md-12" id="register_success">
      
<?php if(@$this->session->flashdata("fail")){ ?>
        <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Warning!</strong> <?php echo @$this->session->flashdata("fail"); ?>
</div>
<?php } ?>
<?php if(@$this->session->flashdata("pass")){ ?>
        <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>!</strong> <?php echo @$this->session->flashdata("pass"); ?>
</div>
<?php } ?>
      </div>
    </div>
    <!-- <div class="row text-center">
    	<h2>Advertising Package</h2>
      <div class="col-md-4">
         <a href="price-table-for/Escort"><button type="button" class="btn btn-primary next-step1">Escorts</button></a>
      </div>
      <div class="col-md-4">
          <a href="price-table-for/Agency"><button type="button" class="btn btn-primary next-step1">Agency</button></a>
      </div>
      <div class="col-md-4">
           <a href="price-table-for/Establishment"><button type="button" class="btn btn-primary next-step1">Establishment</button></a>
      </div>
        
    </div> -->
    <br>
<div class="form">
  
  <div class="row text-center">
  	<div class="col-md-8 col-md-offset-2">
       <h2 style="text-transform: uppercase; color: transparent;  background: linear-gradient(to right,#bf41a3,#61307a,#4f93ba); -webkit-background-clip: text;">Registration Here</h2>
    </div>
  </div>

<form action="<?php echo base_url(); ?>signup/" id="users_register" class="" method="post">
<!-- -------------------------------------------------- form ------------------------------------------ -->

<div class="row signup">
	<div class="col-md-8 col-md-offset-2">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<p class="form-row form-row-wide">
                    <!-- <label class="inputforie" for="reg_username">working name</label> -->
                    <input required="required" type="text" class="input-text form-control" placeholder="Working Name" name="displayname" value="">
                </p>
            </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<p class="form-row form-row-wide">
                   <!--  <label class="inputforie" for="reg_username">working name</label> -->
                    <input required="required" type="email" class="input-text form-control" placeholder="Email" name="email" value="">
                </p>
            </div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-6">
				<div class="form-group">
				<p class="form-row form-row-wide">
                   <!--  <label class="inputforie" for="reg_username">working name</label> -->
                    <input required="required" type="password" class="input-text form-control" placeholder="Password" id="get_password" name="password" value="">
                </p>
            </div>
			</div>
			<div class="col-md-6">
				<div class="form-group">
				<p class="form-row form-row-wide">
                    <!-- <label class="inputforie" for="reg_username">working name</label> -->
                    <input required="required" type="password" class="input-text form-control" id="get_pre_password" placeholder=" Repeat Password" name="rep_password" value="" id="reg_username">
                </p>
            </div>
			</div>
		</div>
		<div class="row ">

			<!-- <div class="col-md-6">
				<div class="form-group">
				<p class="form-row form-row-wide">
                                <select id="gender" class="input-checkbox form-control" required="required" name="gender">
                                    <option value="" >
                                        please select gender
                                    </option>
                                    <option value="female">
                                        Female
                                    </option>
                                    <option value="male">
                                        Male
                                    </option>
                                    <option value="trans">
                                        Trans
                                    </option>
                                </select>
                </p>
               </div>
			</div> -->
			<div class="col-md-12">
				<div class="form-group">
				<p class="form-row form-row-wide">
                                <select id="gender" class="input-checkbox form-control" required="required" name="types">
                                  <option value="" selected disabled>
                                        Select Type
                                    </option>
                                    <option value="Escort">
                                        Escort
                                    </option>
                                    <option value="Agency">
                                      Agency
                                    </option>
                                    <option value="Establishment">
                                     Establishment
                                    </option>
                                    <!-- <option value="male">
                                        Male
                                    </option>
                                    <option value="trans">
                                        Trans
                                    </option> -->
                                </select>
                </p>
               </div>
			</div>
		</div>
		<div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <p class="form-row">
                                        <input type="hidden" name="type" value="escort">
                                    </p><div class="checkbox">
                                        <label>
                                            <input type="checkbox" required name="termsandconditions" style="width: auto;">&nbsp;&nbsp;I have read and agree to
                                            the <a target="_blank" href="http://work.digimonk.net/pages/Terms_of_services">Terms
                                                and Conditions</a>
                                        </label>
                                    </div>
                                   
                                </div>
                                <div class="col-lg-6 col-md-6" id="show_error_message">
                                   
                                </div>

                            </div>
<div class="row">
                                <div class="col-lg-12 col-md-12">
                                	  <input type="submit" class="btn btn-lg btn-primary btn-default" id="submit_code_set" style="   width: 98.5%; margin-top: 11px;" name="register" value="CREATE YOUR PROFILE">
                                    <p></p>
                                </div>
                            </div>
                           
	</div>
</div>

<!-- -------------------------------------------------end form--------------------------------------------- -->
</form>
</div>
</div>
</div>

<div id="myModalSuccessRegistration2" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p style=" text-align: center; font-weight: bold; color:#fff;  margin-top: 50px; font-size: 16px;">Account is activated successfully. kindly <a href="<?php echo base_url(); ?>login"  style="margin-top: 5px; color:#4ac102;"><u>login </u></a>  </p>
      </div>
      <div class="modal-footer" style="border:none;">
        <a href="<?php echo base_url(); ?>login"  style="margin-top: 5px;"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button></a>
        <!-- <a href="<?php echo base_url(); ?>" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" >Ok</button></a> -->
        
      </div>
    </div>

  </div>
</div>

<div id="myModalAlreadyVerified" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">

    <!-- Modal content-->
    <div class="modal-content">
      
      <div class="modal-body">
        <p style=" text-align: center; font-weight: bold; color:#fff;  margin-top: 50px; font-size: 16px;">Account is Already Verified. kindly <a href="<?php echo base_url(); ?>login"  style="margin-top: 5px; color:#4ac102;"><u>login </u></a>  </p>
      </div>
      <div class="modal-footer" style="border:none;">
        <a href="<?php echo base_url(); ?>login"  style="margin-top: 5px;"> <button type="button" class="btn btn-primary" data-dismiss="modal">Ok</button></a>
        <!-- <a href="<?php echo base_url(); ?>" style="margin-top: 5px;"> <button type="button" class="btn btn-primary" >Ok</button></a> -->
        
      </div>
    </div>

  </div>
</div>


<?php $this->load->view($theme . '/includes/footer'); ?>