
<div class="s-account-setup">
   <div class="container">
      <div class="row">
         <div class="s-account-setup-section s-account-setup-section--stats">
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
            <div class="row">
               <div class="col-md-6">
                  <h2 class="s-account-setup-section__title">Profile Info</h2>
                  These are required for your profile to display.
               </div>
               <div class="col-md-6">
                  <div class="row">
                     <div class="col-md-4">
                        <?php
                           // var_dump(@$profile["types"]);
                                               if(@$profile["types"]=="Escort") 
                                                     {
                                                       $set_link='escort-profile';
                                                     }
                                                    if(@$profile["types"]=="Agency") 
                                                     {
                                                       $set_link='agency-profile';
                                                     }
                                                     if(@$profile["types"]=="Establishment") 
                                                     {
                                                       $set_link='establishment-profile';
                                                     }
                                                     
                                               ?>    
                        <a href="<?php echo @$set_link."/".@$profile["USERID"]."/".implode("-",explode(" ", @$profile["fullname"])); ?>"><button type="button" class="btn btn-primary"><?php echo @$profile["types"]; ?> Profile</button></a>
                     </div>
                     <?php 
                        //set package name
                          if($profile["end_date_in_string"]>strtotime(date("d-M-Y")))
                          {

                            if(strlen($profile["package_name"])<10)
                            {
                              $package_name_set=$profile["package_name"];
                            }
                            else
                            {
                              $package_name_set=substr($profile["package_name"],0,10)."..";
                            }
                            $set_current_package_name="Current package is ".$package_name_set;
                          } 
                          else
                          {
                            $set_current_package_name='Buy Package';
                          }
                        ?>
                    <!--  <div class="col-md-5">
                        <?php if(@$profile["types"]=="Agency" || @$profile["types"]=="Establishment") 
                           {  ?>
                        <a href="price-table-for/<?php echo @$profile["types"]; ?>"><button type="button" class="btn btn-primary" style="width: auto;"><?php echo @$set_current_package_name; ?></button></a>
                        <?php }
                           else
                           { 
                              $get_agency_id=$this->db->query("select agency_id from escort_info where escort_id='".@$profile["USERID"]."'")->row_array();
                               if(!@$get_agency_id["agency_id"])
                               { ?>
                        <a href="price-table-for/<?php echo @$profile["types"]; ?>"><button type="button" class="btn btn-primary" style="width: auto;"><?php echo @$set_current_package_name; ?></button></a>

                        

                        <?php  }
                           }
                           ?>  
                          
                                        
                     </div> -->
                      <?php //if($set_current_package_name!='Buy Package') { ?>
                     <div class="col-md-3">
                      

  <button type="button" data-toggle="modal" data-target="#myModal_addon_show" class="btn btn-primary">Addon</button>



<div id="myModal_addon_show" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><a href="addon" style="color:#fff;"><button class="btn btn-primary btn-sm">Buy Addon</button></a></h4>
      </div>
      <div class="modal-body">
  
                         <table id="" class="table table-striped table-condensed table-bordered no-margin  myTable" style="color: #fff">
                                 <thead>
                                    <tr>
                                        
                                       
                                       <th>#</th>
                                       <th>Addon</th>
                                       
                                       <th>Buy Date</th>
                                       
                                       <th>Start Date</th>
                                       <th>End Date</th>
                                       
                                       <th>Status</th>
                                                                            
                                    </tr>
                                 </thead>
                                <!--  <tfoot>
<tr>

                                    <th>#</th>
                                       <th>Place</th>
                                       
                                       <th>From Date</th>
                                       
                                       <th>To Date</th>
                                       <th>Status</th>
                                       <th></th>
                                       
                                    </tr>
                                 </tfoot> -->
                                 <tbody>
<?php $user_addon=$this->db->query("select a.*,b.name from user_addon as a,membership as b where b.id=a.package_id and user_id='".$profile["USERID"]."' ORDER BY `a`.`id` DESC")->result_array();
  $i=0;
           foreach ($user_addon as $dat) {
 $i=$i+1;
            ?>
           <tr>
             <td><?php echo @$i; ?></td>
             <td><?php echo @$dat["name"]; ?></td>
             <td><?php echo @$dat["buy_date"]; ?></td>
             <td><?php echo @$dat["start_date"]; ?></td>
             <td><?php echo @$dat["end_date"]; ?></td>
             <td>
             
             <?php  
              if(@$dat["status"]=="Pending")
              {
                $set_class="danger";
              }
              else
              {
                 if(@$dat["status"]=="Running")
                 {
                   $set_class="warning";
                 }
                 else
                 {
                  $set_class="success";
                 }
              }
             ?>
<label class="label label-<?php echo $set_class; ?>"><?php echo @$dat["status"]; ?></label>
              
                
              </td>
             
           </tr>

            <?php } ?> 


                                    </tbody>
                              </table>
                       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal" style="opacity: 1;">Close</button>
      </div>
    </div>

  </div>
</div>


                        
                     </div>
                       <?php //} ?>
                  </div>
               </div>
            </div>
            <hr>
            <form action="user/dashboard/update_user_profile" method="post">
               <input type="hidden" name="id" value="<?php echo $profile['USERID']; ?>">
               <input type="hidden" name="username" value="<?php echo $profile['username']; ?>">
               <div class="row">
                  <div class="col-md-5 col-md-offset-1">
                     <div class="row">
                        <div class="col-md-5">
                           <p class="form-row form-row-wide">
                              <label class="inputforie" for="reg_username">Your Name</label>
                              <input required="required" type="text" class="input-text form-control" placeholder="Your name" name="displayname" value="<?php echo @$profile['fullname']; ?>" id="reg_username">
                           </p>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                           <p class="form-row form-row-wide">
                              <label class="inputforie" for="reg_username">Your Email</label>
                              <input disabled="" required="required" type="text" class="input-text form-control" placeholder="Your name" name="email" value="<?php echo @$profile['email']; ?>" id="reg_username">
                           </p>
                        </div>
                     </div>
                     <?php if(@$profile['types']=="Escort") { ?>
                     <div class="row">
                        <div class="col-md-5">
                           <p class="form-row form-row-wide"></p>
                           <div class="editing-form-label-cell">
                              <label for="" class="control-label editing-form-label">Type</label>
                           </div>
                           <select id="types"  disabled="" class="input-checkbox form-control" required="required" name="types">
                              <?php $types=['Escort','Agency','Establishment']; ?>
                              <?php for($i=0; $i<count($types); $i++) {
                                 if(@$profile['types']==$types[$i])
                                 {
                                  $set_select='selected=""';
                                 }
                                 else
                                 {
                                  $set_select='';
                                 }
                                                                      ?>
                              <option value="<?php echo @$types[$i]; ?>" <?php echo $set_select; ?>><?php echo @$types[$i]; ?></option>
                              <?php
                                 } ?>
                           </select>
                           <p> </p>
                        </div>
                        <div class="col-md-6 col-md-offset-1">
                           <p class="form-row form-row-wide"></p>
                           <div class="editing-form-label-cell">
                              <label for="" class="control-label editing-form-label">Gender</label>
                           </div>
                           <select id="gender" required="" class="input-checkbox form-control" required="required" name="gender">
                              <?php $types=['Select Gender','Male','Female','Trans']; ?>
                              <?php for($i=0; $i<count($types); $i++) {
                                 if(@$profile['gender']==$types[$i])
                                 {
                                  $set_select='selected=""';
                                 }
                                 else
                                 {
                                  $set_select='';
                                 }
                                 
                                 if($types[$i]=="Select Gender")
                                 {
                                   $val="";
                                 }
                                 else
                                 {
                                   $val=$types[$i];
                                 }
                                                                      ?>
                              <option value="<?php echo @$val; ?>" <?php echo $set_select; ?>><?php echo @$types[$i]; ?></option>
                              <?php
                                 } ?>
                           </select>
                           <p> </p>
                        </div>
                     </div>
                     <?php } ?>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="editing-form-label-cell">
                              <label for="" class="control-label editing-form-label">Password</label>
                              <button data-toggle="modal" data-target="#myModal_password"  type="button" class="btn btn-primary next-step">Set New Password</button>          
                           </div>
                        </div>
                     </div>
                     <br>
                     <hr>
                     <div class="row">
                        <div class="col-md-12">
                           <div class="editing-form-label-cell">
                              <button type="submit" class="btn btn-primary next-step">Update</button>          
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-md-5 col-md-offset-1">
                     <div class="row">
                        <div class="col-md-6 col-md-offset-1" id="image_preview">

                           <?php

$default_profile_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'profile_image'")->row_array();
                            $user_thumb_image="assets/uploads/default/".$default_profile_image["name"];
                            

                              if(@$profile['user_thumb_image'])
                              {
                                 $user_thumb_image="assets/uploads/".$profile['user_thumb_image'];
                              }
                              
                              ?>
                           <input type="hidden" name="product_image_one" value="<?php echo @$profile['user_thumb_image'] ; ?>">
                           <img src="<?php echo $user_thumb_image ; ?>" style="width: 100% !important;">
                        </div>
                     </div>
                     <div class="row">
                        <div class="col-md-6 col-md-offset-1">
                          <!-- <button title="Upload image file" for="profile_cover_imaege" style="margin-top: 3%; width: 100%;" class="btn btn-primary btn-block">
                              <input type="file" name="blogfetured" id="upload_file_image_thum" data-preview-file-type="text" placeholder="Enter Title " class="form-control" data-bv-field="blogfetured">
                              <h4 id="setTextDsp" style="margin-bottom: 0px; color: #ffffff;">Select Image</h4>
                           </button> -->
						   
						  <div class="file btn btn-lg btn-primary">
              Select Image
              <input type="file" id="upload_file_image_thum" data-preview-file-type="text" placeholder="Enter Title" class="form-control inputnew" data-bv-field="blogfetured" name="blogfetured">
            </div>
                           <!-- <button type="button" class="btn btn-block btn-primary">Add Image</button> -->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<div id="myModal_password" class="modal fade" role="dialog">
   <div class="modal-dialog modal-sm">
      <!-- Modal content-->
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Set New Password</h4>
         </div>
         <div class="modal-body">
            <div class="container">
               <form action="change_password/<?php echo @$profile['username']; ?>" method="post">
                  <input type="hidden" name="user_name" value="<?php echo @$profile['username']; ?>">
                  <div class="row">
                     <div class="col-md-12">
                        <p class="form-row form-row-wide">
                           <label class="inputforie" for="reg_username" style="color: #fff;">New Password</label>
                           <input required="required" type="password" class="input-text form-control" placeholder="New-password" name="new_password"  id="reg_username">
                        </p>
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Change Password</button>
                     </div>
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
<div id="uploadimageModal_edit" class="modal" role="dialog">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Upload & Crop Image</h4>
         </div>
         <div class="modal-body">
            <div class="row">
               <div class="col-md-8 text-center">
                  <div id="image_demo_edit" style="width:350px; margin-top:30px"></div>
               </div>
               <div class="col-md-4" style="padding-top:30px;">
                  <br />
                  <br />
                  <br/>
                  <div class="row">
                     <div class="col-md-12 set_loader"></div>
                  </div>
                  <button class="btn btn-success crop_image_edit">Crop Image</button>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         </div>
      </div>
   </div>
</div>