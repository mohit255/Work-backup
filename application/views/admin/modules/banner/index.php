
         <div class="top-bar clearfix">
            <div class="row">
               <div class="col-md-2">
                   <h4 style="margin-top: 25px;">Manage Banners</h4>
               </div>
               <div class="col-md-10">
                
                  <input type="text" placeholder="Search Escort" style="margin-top: 15px;" name="search" id="search_user" class="form-control">
                  <ul class="list" id="result"  style="position: absolute; z-index: 1; width: 96%;">
            
                 
                   </ul>
               </div>
              
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
                                      
                                       <th>Banner Image</th>
                                       <th>Name</th>
                                       
                                       <th>Date</th>
                                       <th>Remove</th>
                                       
                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                      
                                       <th>Banner Image</th>
                                       <th>Name</th>
                                       
                                       <th>Date</th>
                                       <th>Remove</th>
                                    </tr>
                                 </tfoot>
                                 <tbody>

                                
                                    
                                    <?php if($list) {  foreach($list as $row) { 
                                    
                                    $image_set="assets/uploads/1545040228.png";

            if($row["cover_image"]!="")
            {
               $image_set="assets/uploads/".$row["cover_image"];
            }         
                                       ?>

                                    <tr>
                                       
                                        <td>
                                         <img src="<?php echo $image_set; ?>" style="width:92px; height :44px; border: 2px solid #10100f;     padding: 1px;"  >

                                        </td>
                                       <td><?php echo $row['fullname']; ?></td>
                                      
                                       <td><?php echo $row['add_date']; ?></td>
                                       
                             
                                       <td>
                                    <button type="button" data-id="<?php echo @$row["id"]; ?>" class="btn btn-warning pull-right remove_user_for_banner">Remove</button>      
                                       </td>
                                    </tr>
                                    <?php } } ?>
                                    
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
                                                <!--    <form>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">City Name</label><input type="text" class="form-control" id="simpleInput" required="" name="city" value="Sydney" placeholder="Enter City Name"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Zip Code</label><input type="text" class="form-control" id="simpleInput" required="" value="474001" name="zip" placeholder="Enter City Zip Code"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Submit</button>
                                                         </div>
                                                      </div>
                                                   </form> -->

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
                                                   <form>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">City Name</label><input type="text" class="form-control" id="simpleInput" required=""  name="city" placeholder="Enter City Name"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Zip Code</label><input type="text" class="form-control" id="simpleInput" required="" name="zip" placeholder="Enter City Zip Code"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Update</button>
                                                         </div>
                                                      </div>
                                                   </form>

                                                </div>
                                                <div class="modal-footer"><button type="button" class="btn btn-light-grey" data-dismiss="modal">Close</button> </div>
                                             </div>
                                          </div>
                                       </div>                                 