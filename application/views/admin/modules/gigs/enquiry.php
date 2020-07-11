
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Enquery</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
        
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                          <?php  if($this->session->flashdata('message')){ ?>
                  <p class="bg-success"><?php echo $this->session->flashdata('message'); ?></p>
                  <?php } ?>
               <button class="btn btn-primary" id="delete_enquerys">Delete</button>
                          <!--  <button type="button" data-toggle="modal" data-target="#myModalDefault" class="btn btn-warning pull-right" id="delete_city">Add New City</button> -->

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                       <th>Name</th>

                              <th>Email</th>                                                  

                              <th>Contact</th>

                              <th>Meassage</th>                                                 

                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                      <th>Name</th>

                              <th>Email</th>                                                  

                              <th>Contact</th>

                              <th>Meassage</th>                                                 

                                    </tr>
                                 </tfoot>
                                 <tbody>

                                
                                    
                                   <?php 

                            if(!empty($list)) 

                           {
                           

                           foreach($list as $item) { ?>
                              
                           <tr>
                                    <td>
                                 <input type="checkbox" value="<?php echo $item['id']; ?>" name="" class="checkitem">  

                                    </td>
                                    <td><?php echo $item["name"]; ?></td>
                                    <td><?php echo $item["email"]; ?></td>
                                    <td><?php echo $item["contact"]; ?></td>
                                    <td>
                                       
                                       <button type="button" data-id="<?php echo @$item["id"]; ?>" class="btn btn-info btn-sm show_message">Message</button>
                                    </td>
                              
                           </tr>

                           <?php } } else { ?>

                           <tr>

                              <td colspan="10"><p class="text-danger text-center m-b-0">No Records Found</p></td>

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
<div id="myModal_enquerys" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Message</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>