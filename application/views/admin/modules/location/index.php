
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
                           <h4>
                              <select class="form-control" id="get_action">
                                 <option value="Select Operation">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                 <option value="Activate">Activate</option>
                                 <option value="Deactivate">Deactivate</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning">Apply</button>
                           <button type="button" data-toggle="modal" data-target="#myModalDefault" class="btn btn-warning pull-right">Add New City</button>

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                       <th>Name</th>
                                       <th>Zip Code</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       <th>Edit</th>
                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                         <th>Name</th>
                                       <th>Zip Code</th>
                                       <th>Date</th>
                                       <th>Status</th>
                                       <th>Edit</th>
                                    </tr>
                                 </tfoot>
                                 <tbody>
                                    <?php for($i=0; $i<50; $i++) { ?>
                                    <tr>
                                       <td><input type="checkbox" value="<?php echo @$i; ?>" name="" class="checkitem"></td>
                                       <td>Sydney</td>
                                       <td>474001</td>
                                       <td>2011/07/25</td>
                                       
                                       <td><span class="badge green-bg">Activate</span></td>
                                       <td>
                                    <button type="button" data-toggle="modal" data-target="#myModalDefault_edit" class="btn btn-warning pull-right">Edit City</button>      
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
    <div class="modal fade" id="myModalDefault_edit" tabindex="-1" role="dialog" aria-labelledby="myModalDefault_edit">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title">Edit City</h4>
                                                </div>
                                                <div class="modal-body">
                                                   <form>
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
