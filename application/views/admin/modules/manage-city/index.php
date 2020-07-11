
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage City</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
        
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="location">
                           <h4>
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Activate">Activate</option>
                                 <option value="Deactivate">Deactivate</option>
                                 <option value="Delete">Delete</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <button type="button" data-toggle="modal" data-target="#myModalDefault" class="btn btn-warning pull-right" id="add_city" >Add New City</button>

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                       <th>State</th>
                                       <th>City</th>
                                       
                                       <th>Country</th>
                                       <th>Status</th>
                                       <th>In Popular List</th>
                                       <th>Edit</th>
                                       <!-- <th>Delete</th> -->
                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                       <th>State</th>
                                       <th>City</th>                                       
                                       <th>Country</th>
                                       <th>Status</th>
                                       <th>In Popular List</th>
                                       <th>Edit</th>
                                       <!-- <th>Delete</th> -->
                                    </tr>
                                 </tfoot>
                                 <tbody>

                                
                                    
                                    <?php $i=0; foreach($list as $row) { 
                                            $i=$i+1;
                                       ?>

                                    <tr>
                                       <td><input type="checkbox" value="<?php echo $row['id']; ?>" name="" class="checkitem"> <?php echo $i; ?></td>
                                        <td><?php echo $row['state']; ?></td>
                                       <td><?php echo $row['city']; ?></td>
                                      
                                       <td><?php echo $row['country']; ?></td>
                                       
                                       <td> <?php 
// var_dump($row['status']);
                                       if($row['status']=="0") { ?>
 <span class="badge green-bg">Activate</span>
<?php  } else { ?>
 <span class="badge red-bg">Deactivate</span>
<?php } ?></td>

                        <td> <?php 
// var_dump($row['status']);
                                       if($row['popular_city']=="0") { ?>
 <span class="badge green-bg">Yes</span>
<?php  } else  { ?>
 <span class="badge red-bg">No</span>
<?php } ?></td>
                                       <td>
                                    <button type="button" data-id="<?php echo @$row["id"]; ?>" class="btn btn-warning pull-right get_id_for_city_dsp">Edit City</button>                                        
                                       </td>
                                       <!-- <td>
                                          <button type="reset" class="btn btn-warning pull-right get_id_for_city_dsp">Delete City</button>
                                       </td> -->
                                       
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
    <div class="modal fade" id="myModalDefault_edit" tabindex="-1" role="dialog" aria-labelledby="myModalDefault_edit">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title">Edit City</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <form>
                                                     <!-- <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">City Name</label><input type="text" class="form-control" id="simpleInput" required="" name="city" value="Sydney" placeholder="Enter City Name"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Zip Code</label><input type="text" class="form-control" id="simpleInput" required="" value="474001" name="zip" placeholder="Enter City Zip Code"></div>
                                                         </div>
                                                      </div>-->
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Submit</button>
                                                         </div>
                                                      </div>
                                                   </form> 

                                                </div>
                                                <div class="modal-footer"><button type="button" class="btn btn-light-grey" data-dismiss="modal">Close</button> </div>
                                             </div>
                                          </div>
                                       </div>    

         <div class="modal fade" id="myModalDefault" tabindex="-1" role="dialog" aria-labelledby="myModalDefault">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title">Add New City</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form method="POST" action="admin/city/add_city">
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">City</label><input type="text" class="form-control" id="simpleInput" required=""  name="city" placeholder="Enter City Name"></div>
                                                         </div>
                                                      </div>
                                                      <!-- <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Country</label><input type="text" class="form-control" id="simpleInput" required=""  name="country" placeholder="Enter Country Name"></div>
                                                         </div>
                                                      </div> -->
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">State</label><input type="text" class="form-control" id="simpleInput" required=""  name="state" placeholder="Enter State Name"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                    <div class="form-group"><label for="simpleInput">In Popular List</label>
                                   <select class="form-control" name="popular_city">
                                    
                                    <?php 


                                    if(@$data["popular_city"]=="0") { ?>
                                         <option value="0" selected="">Yes</option>
                                        <option value="1" >No</option>   
                                    <?php } else { ?>
                                      <option value="1" selected="">No</option>
                                      <option value="0" >Yes</option>
                                    <?php } ?>
                                     
                                   </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                         <!-- <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Zip Code</label><input type="number" class="form-control" id="simpleInput" required="" name="zip" placeholder="Enter City Zip Code"></div>
                                                         </div>
                                                      </div> -->
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Save</button>
                                                         </div>
                                                      </div>
                                                   </form>

                                                </div>
                                                <div class="modal-footer"><button type="button" class="btn btn-light-grey" data-dismiss="modal">Close</button> </div>
                                             </div>
                                          </div>
                                       </div>                                 