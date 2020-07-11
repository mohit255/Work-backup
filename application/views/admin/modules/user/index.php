<?php $active_2 =$this->uri->segment(3);

$default_profile_image=$this->db->query("SELECT * FROM `default_image` WHERE `key` = 'profile_image'")->row_array();
 ?>

 <div class="top-bar clearfix">

            <div class="page-title">

               <h4>Manage <?php if($active_2=="index") { } else {  echo $active_2; } ?></h4>

            </div>

           

         </div>

         <div class="main-container">

            <div class="container-fluid">

              

              

         <?php if($this->session->userdata('message')) {  ?>



               <?php echo $this->session->userdata('message');?>



         <?php } ?>

               <div class="row gutter">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                     <div class="panel panel-grey">

                        <div class="panel-heading">

                           <h4>

                              <select class="form-control" id="set_users">

                        <option value="">Selete option</option>

                        <option value="delete">Delete</option>

                        <option value="Active">Active</option>

                        <option value="Inactive">Inactive</option>

                        

                        

                     </select>



                           </h4>

                           <button type="button" class="btn btn-primary" id="delete_users">Apply</button>

                          <a href="admin/user/add_new_users_for"> <button type="button"  class="btn btn-warning pull-right">Add New User</button></a>



                        </div>

                        <div class="panel-body">

                           <div class="table-responsive">

                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">

                                 <thead>

                                    <tr>

                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>

                                       <th>Image</th>

                                       <th>Name</th>

                                       <th>Types</th>

                                       <th>City</th>

                                       <th>E-mail</th>

                                       

                                       <th>Contact</th>

                                       <th>Register Date</th>

                                       

                                       <th>Verified</th>

                                       <th>Status</th>

                                       

                                    </tr>

                                 </thead>

                                 <tfoot>

                                    <tr>

                                       <th>#</th>

                                         <th>Image</th>

                                       <th>Name</th>

                                       <th>Types</th>

                                       <th>City</th>

                                       <th>E-mail</th>

                                       <th>Contact</th>

                                       <th>Register Date</th>

                                       

                                       <th>Verified</th>

                                       <th>Status</th>

                                       

                                    </tr>

                                 </tfoot>

                                 <tbody>

                                    <?php 



                            if(!empty($list)) 



                           {



                           $i=1;



                           foreach($list as $item) {



                              $status = 'Active'; if($item['status']==1){$status = 'Inactive';} 



                              $verified = 'Yes' ; if($item['verified']==1){$verified = 'No';} 

                               

                               $status_class = 'green-bg'; if($item['status']==1){$status_class = 'red-bg';} 



                              $verified_class = 'green-bg' ; if($item['verified']==1){$verified_class = 'red-bg';} 

                              // if(!empty($item['parent_name'])){ $parent_category = $item['parent_name'];}



        $profile="assets/uploads/default/".$default_profile_image["name"];

                       if(@$item["user_thumb_image"])

                       {

                         $profile="assets/uploads/".@$item["user_thumb_image"];

                       }



                              ?>

                                    <tr>

                                       <td><input type="checkbox" value="<?php echo @$item['USERID']; ?>" name="" class="checkitem"></td>

                                       <td ><img src="<?php echo $profile; ?>" style="width:50px; height:40px;" alt="<?php echo @$item["fullname"]; ?>"></td>

                <td><a href="<?php echo "admin/user/edit_user/".$item['USERID']."/".implode("-", explode(" ", @$item["fullname"])); ?>" style="color:#6e91cb;"><u><?php echo @$item["fullname"]; ?></u><a></td>

                                       <td><?php echo @$item["types"]; ?></td>

                                       <td><?php echo @$item["main_location"]; ?></td>

                                       <td><a href="mailto:<?php echo @$item["email"]; ?>"><?php echo @$item["email"]; ?></a></td>

                                       <td><?php echo @$item["contact"]; ?></td>

                                       <td><?php echo @$item["created_date"]; ?></td>

                                       

                                       <td><span class="badge <?php echo $verified_class ?>"><?php echo $verified; ?></span></td>

                                       <td><span class="badge <?php echo $status_class ?>"><?php echo $status; ?></span></td>

                                      

                                    </tr>

                                   <?php $i = $i+1; } } ?>

                                    

                                 </tbody>

                              </table>

                           </div>   

                        </div>

                     </div>

                  </div>

                

               </div>

              

            </div>

         </div>