<?php
$this->load->view($theme . '/includes/header');
?>
<div class="page--login">
  <div class="container">
    <div class="panel panel-simple panel-dropshadow">

  <div class="panel-body">
  <?php if(@$this->session->flashdata('message')) { ?>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <?php echo @$this->session->flashdata('message'); ?>
</div>
  </div>
</div>
<?php } ?>


    <h1>Login</h1>
<div class="col-md-8 col-md-offset-2 text-center">
    <div id="register_errtext"></div>
<p>Log in to your Escortoz account.</p>
<div id="" class="logon-page-background">
<form id="users_login" novalidate="novalidate">
    <div class="form form-logon">
                        <div id="" class="logon-panel" onkeypress="">                   
                    <div class="form-horizontal" role="form">
                            <div class="form-group">
                                <div class="editing-form-label-cell">
                                    <label for="" id="" class="control-label">Email:</label>
                                </div>
                                <div class="editing-form-value-cell">
                                    <input name="user_name" type="text" maxlength="100" id="user_name"  class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="editing-form-label-cell">
                                    <label for="" id="" class="control-label">Password:</label>
                                </div>
                                <div class="editing-form-value-cell">
                                    <input name="password" data-bv-field="password" type="password" maxlength="110" id="password" class="form-control">
                                </div>
                            </div>
                    </div>
                 <div class="col-md-7 col-md-offset-3">
                    <!-- <span class="" style="float: left;"><input id="Remember" type="checkbox" name="" style="width: auto;"><label for="Remember">Remember me</label></span>
                    
                    <span class="" style="float: right"><input id="password" type="checkbox" name="password" style="width: auto;"><label for="show">Show Password</label></span> -->
                    
                      
                      <button type="submit" class="btn btn-primary logon-btn" style="margin: 0 15px;">Sign in</button>
                    <!-- <input type="submit" name="" value="Sign in" onclick="" id="" class="btn btn-primary"> -->
                </div>
    </div>
            

    
    <div id="" class="forgotten-password-link">
        
            <div class="form-group">
                <a id="" class="logon-password-retrieval-link" href="javascript:;" data-toggle="modal" data-target="#myModal_forgate_Password" >Forgot password</a>
            </div>
        
    </div>
    
    </div>
</form>   

    <div class="form form-logon-password-retrieval">
        <div id="">
    </div>
    </div>

</div>
  </div>
</div>
</div>
  </div>
</div>

<div id="myModal_forgate_Password" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Forgot Password</h4>
      </div>
      <div class="modal-body">
       <div class="container">
            <span id="forgot_password_msg"></span>
       <form id="forget_form" method="post" class="form-horizontal bv-form" novalidate="novalidate"><button type="submit" class="bv-hidden-submit" style="display: none; width: 0px; height: 0px;"></button>
                            <div class="form-group">
                                <label class="col-lg-12" style="color: #fff;">Email</label>
                                <div class="col-lg-12">
                                <input type="email" placeholder="Email" id="forget_email" name="forget_email" class="form-control" data-bv-field="forget_email">
                                <!-- <small class="help-block" data-bv-validator="remote" data-bv-for="forget_email" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter a valid Email address </small><small class="help-block" data-bv-validator="notEmpty" data-bv-for="forget_email" data-bv-result="NOT_VALIDATED" style="display: none;">Please enter Email address</small><small class="help-block" data-bv-validator="emailAddress" data-bv-for="forget_email" data-bv-result="NOT_VALIDATED" style="display: none;"></small> --></div>
                            </div>
                            <div class="form-group">
                                
                                <div class="col-lg-12"><button type="submit" class="btn btn-primary logon-btn pull-right">Submit</button></div>
                            </div>
                        </form>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<?php $this->load->view($theme . '/includes/footer'); ?>