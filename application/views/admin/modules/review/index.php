
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Reviews</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
        
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="feedback">
                           <h4>
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                 <option value="Activate">Activate</option>
                                 <option value="Inactivate">Inactivate</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                          <!--  <button type="button" data-toggle="modal" data-target="#myModalDefault" class="btn btn-warning pull-right" id="delete_city">Add New City</button> -->

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                                                                         

                              <th>Escort Name</th>                                                     

                              <th>User</th>

                              <th>Review</th>

                              <th>Status</th>

                              <th>Created Date</th> 
                              <th></th> 

                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                                                                      

                              <th>Escort Name</th>                                                     

                              <th>User</th>

                              <th>Review</th>

                              <th>Status</th>

                              <th>Created Date</th> 
                              <th></th> 

                                    </tr>
                                 </tfoot>
                                 <tbody>

                                <?php 

                            if(!empty($list)) 

                           {

                           $i=1;

                           foreach($list as $item) { 

                              $status = 'Inactive'; if($item['status']==0){$status = 'Active';}

                              ?>

                           <tr>                                                    

                              <td>
<input type="checkbox" value="<?php echo $item["id"]; ?>" name="" class="checkitem">
                              </td>                                                    
                                                                              

                              <td><?php echo $item['fullname']; ?></td>

                              <td><?php echo $item['from_user']; ?></td>

                              <td><?php echo $item['comment']; ?></td>

                              <td><?php echo $status; ?></td>

                              <td><?php echo date('d M Y', strtotime(str_replace('-','/', $item['created_date']))); ?></td>
<td class="text-right">

                                 <a href="<?php echo base_url(); ?>admin/review/edit/<?php echo $item["id"]; ?>" class="table-action-btn" title="Edit"><i class="fa fa-edit"></i></a>

                              </td>
                           </tr>

                           <?php $i = $i+1; } } else { ?>

                           <tr>

                              <td colspan="7"><p class="text-danger text-center m-b-0">No Records Found</p></td>

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
        

                               