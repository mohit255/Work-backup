<div class="content-page">

   <div class="content">
   


   <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Membership</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
              <?php if(@$this->session->flashdata('message')) { ?>
   <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <?php echo @$this->session->flashdata('message'); ?>
</div>
           <?php } ?>
           <?php if(@$this->session->flashdata('alert')) { ?>
   <div class="alert alert-danger alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
   <?php echo @$this->session->flashdata('alert'); ?>
</div>
           <?php } ?>
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-red">
   <div class="panel-heading">
      <h4>Membership</h4>
   </div>
   <div class="panel-body">
      <div class="tabbable">
        <!--  <ul class="nav nav-tabs">
            <li class="active"><a href="#one" data-toggle="tab">Independent</a></li>
            <li><a href="#two" data-toggle="tab">Agency</a></li>
            <li><a href="#three" data-toggle="tab">Establishment</a></li>
         </ul> -->
         <div class="tab-content no-margin">
            <div class="tab-pane active" id="one">

<div class="panel panel-grey">
                        <div class="panel-heading">
                           <h4>
                              <input type="hidden" id="table_name" value="membership">
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                 <option value="Enable">Enable</option>
                                 <option value="Disable">Disable</option>
                                 
                              </select>

                           </h4>
                           <button type="button" id="delete_users" class="btn btn-warning">Apply</button>
                           <!-- <a href="<?php echo base_url().'admin/manage-membership/add-membership/'; ?>"><button type="button"  class="btn btn-warning">Create New Membership</button></a> -->
                           &nbsp;
                           <!-- <button type="button" data-toggle="modal" data-target="#add_new_addon"  class="btn btn-warning ">Create New Addon</button> -->

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="" class="table table-striped table-condensed table-bordered no-margin basicExample2">
                                 <thead>
                                    <tr>
                                        <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                       
                                       <th>Membership Name</th>
                                       <th>Types</th>
                                       <th>Membership For</th>
                                       <th>Prict</th>
                                       <th>Duration</th>
                                       <!-- <th>Benefits Of Membership</th> -->
                                       <th>Create Date</th>
                                       <th>Status</th>
                                       <th></th>
                                       
                                    </tr>
                                 </thead>
                                 <tfoot>
<tr>
 <th>#</th>
                                     <th>Membership Name</th>
                                     <th>Types</th>
                                     <th>Membership For</th>
                                       <th>Prict</th>
                                       <th>Duration</th>
                                       <!-- <th>Benefits Of Membership</th> -->
                                       <th>Create Date</th>
                                       <th>Status</th>
                                       <th></th>
                                       
                                    </tr>
                                 </tfoot>
                                 <tbody>
                                    <?php foreach($list as $row) { 
                                     
               // if($row['types']=="Addon") 
               //  {
               //        $duration_type='WEEK';
               //  }
               //  else
               //  {
               //    $duration_type='MONTH';
               //  }

                                       ?>
                                                                        <tr>
                                       <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="" class="checkitem"></td>
                                       
                                       <td>
  <?php if($row['types']=="Addon") { ?>
  
<a href="javascript:;" class="edit_addon" data-id="<?php echo $row['id']; ?>" style="color:#6e91cb;"><u><?php echo $row['name']; ?>
  <?php } else { ?>

  	<a href="<?php echo base_url().'admin/manage-membership/edit-membership/'.$row['id']; ?>" style="color:#6e91cb;"><u><?php echo $row['name']; ?>
  <?php } ?>
                                     

                                       </td>
                                       <td><?php echo $row['types']; ?></td>
                                       <td><?php echo $row['package_for']; ?></u><a></td>
                                       <td><?php echo "$".$row['price']; ?></td>
                                       <td><?php echo $row['duration']." ".$row['duration_type']; ?></td>
                                       <!-- <td>
                                          <button type="button" data-id="<?php echo @$row["id"]; ?>" class="btn btn-sm btn-warning get_id_for_service" data-toggle="modal" data-target="#myservicesModal">Service</button>
                                       </td> -->
                                       <td><?php echo $row['create_date']; ?></td>
                                       
                               <td><?php 
  if($row['status']=="0")
  {
      ?>
<span class="badge green-bg">Enable</span>
      <?php
  }
  else {
    ?>
<span class="badge red-bg">Disable</span>
    <?php
  } ?>

                                </td>
                               <td>
                                <?php if($row['types']=="Addon") { ?>
                        <button class="btn btn-warning edit_addon" data-id="<?php echo $row['id']; ?>">Edit</button>
                                <?php } else { ?>
 <a href="<?php echo base_url().'admin/manage-membership/edit-membership/'.$row['id']; ?>"><button class="btn btn-warning">Edit</button></a>
                                <?php } ?>
                                
                               </td>
                                      
                                    </tr>
                                    <?php } ?>
                                 </tbody>
                              </table>
                           </div>   
                        </div>
                     </div>

                                 
            </div>
         
            </div>
         </div>
      </div>
   </div>
</div>
                  </div>
                
               </div>
              
            </div>
         </div>



   

   </div>


   <!-- Modal -->
<div id="add_new_addon" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Addon</h4>
      </div>
      <div class="modal-body">
        <form action="admin/membership/add_addon" method="post" class="">
          <div class="row">

                              <div class="col-md-4">
                                 <div class="form-group"><label for="simpleInput">Addon Name</label><input type="text" name="addon" class="form-control" id="simpleInput" placeholder="Enter name" required=""></div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group"><label for="simpleInput">Adon Price ($)</label><input type="text" name="price" class="form-control set_number_only" id="simpleInput " placeholder="Enter Price" required=""></div>
                              </div>
                              <div class="col-md-4">
                                 <div class="form-group"><label for="simpleInput">Duration(WEEK)</label><input type="text" name="duration" class="form-control set_number_only" id="simpleInput" placeholder="Enter Duration" required=""></div>
                              </div>
                             
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                                <div class="form-group"><label for="simpleInput">Ad positioning</label>
<select name="add_positioning" class="form-control" required="">
   <option value="">Select Positioning</option>
   <option value="Image on Home page">Image on Home page</option>
   <option value="Profile on large home page ad banner">Profile on large home page ad banner</option>
   <option value="Profile on ad banner at top of capital city search results">Profile on ad banner at top of capital city search results</option>
  </select>
                                </div>
                              </div>
                               <div class="col-md-6">
                                <div class="form-group"><label for="simpleInput">Ad positioning <span style="font-size: 10px;">(Image on Home page  limited to N Profiles per week (Waiting List))</span></label><input type="text" name="No_of_profiles" class="form-control set_number_only" id="simpleInput" placeholder="Limited to N Profiles" required=""></div>
                              </div>
                           </div>
                       <div class="row">
                               <div class="col-md-12">
                                <button type="Submit" class="btn btn-primary btn-block">Submit</button>
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



  <!-- Modal -->
<div id="edit_addon" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Addon</h4>
      </div>
      <div class="modal-body">
     
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>