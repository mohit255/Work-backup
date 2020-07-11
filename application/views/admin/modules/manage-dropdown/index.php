
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Drop Down Value</h4>
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
              
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <h4>
                              <select class="form-control get_action" id="get_action">
                                 <option value="">Select Operation</option>
                                 
                                 <option value="Activate">Activate</option>
                                 <option value="Deactivate">Deactivate</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning" id="applydrop">Apply</button>
                           <!-- <button type="button" data-toggle="modal" data-target="#myModalDefault" class="btn btn-warning pull-right">Add New City</button> -->

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                       <th>Title</th>
                                       <th>Name</th>
                                       <th>Value</th>
                                       <th>Lase Update</th>
                                       <th>Status</th>
                                       <th>Edit</th>
                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                         <th>Title</th>
                                         <th>Name</th>
                                       <th>Value</th>
                                       <th>Lase Update</th>
                                       <th>Status</th>
                                       <th>Edit</th>
                                    </tr>
                                 </tfoot>
                                 <tbody>
                                   <?php foreach($list as $row) { 
                                            
                                       ?>

                                    <tr>
                                       <td><input type="checkbox" value="<?php echo @$row['id']; ?>" name="" class="checkitem"></td>
                                       <td><?php echo @$row['title']; ?></td>
                                       <td><?php echo @$row['name']; ?></td>
                                       <td><?php echo count(explode("*#*", @$row['value'])); ?></td>
                                       <td><?php echo @$row['last_upadte']; ?></td>
                                       
                                       <td>
 <?php if($row['status']=="0") { ?>
 <span class="badge green-bg">Activate</span>
<?php  } else  { ?>
 <span class="badge red-bg">Inactivate</span>
<?php } ?>
                                       </td>
                                       <td>
                                    <button type="button" data-id="<?php echo @$row["id"]; ?>" class="btn btn-warning pull-right get_id_for_drop_down" >Edit</button>      
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
    <div id="mydropdown" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Drop down</h4>
      </div>
      <div class="modal-body">
      
      
                  
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>