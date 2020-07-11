
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Profile</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
       <?php if($this->session->flashdata('message')) { ?>

          <?php echo $this->session->userdata('message'); ?>

          <?php } ?>  

               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           
                           <h4>
                              Profile Details

                           </h4>
                       <!--     <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="<?php echo 'FAQ/add-new-content'; ?>"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New</button></a> -->

                        </div>
                        <div class="panel-body">
                   <form class="form-horizontal" id="form_emailsetting" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                  <label class="col-sm-3">Username</label>

                  <div class="col-sm-9">

                    <input type="text" class="form-control" disabled value="<?php echo $content['username']; ?>">

                  </div>

                </div>
                <div class="form-group">

                  <label class="col-sm-3">Name</label>

                  <div class="col-sm-9">

                    <input type="text" class="form-control" name="name" value="<?php echo $content['name']; ?>">

                  </div>

                </div>
                <div class="form-group">

                  <label class="col-sm-3">Email</label>

                  <div class="col-sm-9">

                    <input type="email" class="form-control" name="email" value="<?php echo $content['email']; ?>">

                  </div>

                </div>


<div class="form-group">

                  <label class="col-sm-3">Image</label>

                  <div class="col-sm-9">

                    <div class="row">
                      <div class="col-sm-7">

                        <div class="media">

                          <div class="media-left">

                            <img src="<?php

                      if (!empty($content['profile_thumb'])) {

                        echo base_url($content['profile_thumb']);

                      } else {

                        echo base_url('assets/images/avatar.jpg');

                      }

                      ?>" width="100" height="100" class="profile-img" /></div>

                          <div class="media-body">

                            <div class="uploader"><input type="file" class="form-control" name="admin_profile" id="imageonly"></div>

                            <span class="help-block">Recommended image size is 150px x 150px</span>

                          </div>

                        </div>

                    </div>
                    </div>

                  </div>

                </div>
                <div class="m-t-30 text-center">

               <button name="form_submit" type="submit" class="btn btn-primary" value="true">Save Changes</button>

              </div>

                      </form>
                        </div>
                     </div>
                  </div>
                
               </div>
              


<div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           
                           <h4>
                              Change Password

                           </h4>
                       <!--     <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="<?php echo 'FAQ/add-new-content'; ?>"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New</button></a> -->

                        </div>
                        <div class="panel-body">
                   <form id="pass-val" class="form-horizontal" action="<?php echo base_url($theme . '/profile/password'); ?>" method="post">
                    <div class="form-group">

                  <label class="col-sm-3">Old Password</label>

                  <div class="col-sm-9">

                    <input type="password" class="form-control" id="old_password" name="old_password" placeholder="Old Password">

                  </div>

                </div>
                <div class="form-group">

                  <label class="col-sm-3">New Password</label>

                  <div class="col-sm-9">

                    <input type="password" class="form-control" name="new_password" id="new_password" placeholder="New Password">

                  </div>

                </div>
                <div class="form-group">

                  <label class="col-sm-3">Confirm Password</label>

                  <div class="col-sm-9">

                    <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Passwor"/>

                  </div>

                </div>



                <div class="m-t-30 text-center">

               <button name="form_submits" type="submit" class="btn btn-primary" value="true">Save password</button>

              </div>

                      </form>
                        </div>
                     </div>
                  </div>
                
               </div>


            </div>
         </div>
   
                                      