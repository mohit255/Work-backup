
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Email Settings</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
       <?php if($this->session->flashdata('message')) { ?>

          <?php echo $this->session->userdata('message'); ?>

          <?php } ?>  

               <div class="row gutter">
                  <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 col-md-offset-3">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           
                           <h4>
                              Email

                           </h4>
                       <!--     <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="<?php echo 'FAQ/add-new-content'; ?>"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New</button></a> -->

                        </div>
                        <div class="panel-body">
                   <form class="form-horizontal" id="form_emailsetting" action="" method="POST" enctype="multipart/form-data">
                    <div class="form-group">

                  <label class="col-sm-3">Email From Address</label>

                  <div class="col-sm-9">

                    <input  type="text" id="website_name" name="email_address" value="<?php if (isset($email_address)) echo $email_address;?>" class="form-control" >

                  </div>

                </div>
                <div class="form-group">

                  <label class="col-sm-3">Emails From Name</label>

                  <div class="col-sm-9">

                    <input type="text" id="email_tittle" name="email_tittle" value="<?php if (isset($email_tittle)) echo $email_tittle;?>" class="form-control" >

                  </div>

                </div>
                <div class="m-t-30 text-center">

                <button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>

              </div>

                      </form>
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>
   
                                      