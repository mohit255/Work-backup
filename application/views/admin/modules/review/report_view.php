
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Report</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
        
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="admin_report">
                           <h4>
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                
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
                                                                                         

                              <th>Escort</th>                                                     
                              <th>Escort Name</th>                                                     

                              <th>User</th>

                              <th>E-mail</th>

                              <th>Message</th>

                              <th>Date</th> 
                               

                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                                                                      

                              <th>Escort</th>                                                     
                              <th>Escort Name</th>                                                     

                              <th>User</th>

                              <th>E-mail</th>

                              <th>Message</th>

                              <th>Date</th>
                              

                                    </tr>
                                 </tfoot>
                                 <tbody>

                                <?php 

                            if(!empty($list)) 

                           {

                           $i=1;

                           foreach($list as $item) { 

                             $profile="assets/uploads/default/avatar-2.jpg";

                       if(@$item["user_thumb_image"])

                       {

                         $profile="assets/uploads/".@$item["user_thumb_image"];

                       }

                              ?>

                           <tr>                                                    

                              <td>
<input type="checkbox" value="<?php echo $item["id"]; ?>" name="" class="checkitem">
                              </td>                                                    
                                                                              

                              <td>
<img src="<?php echo $profile; ?>" style="width:50px; height:40px;" alt="<?php echo @$item["fullname"]; ?>">
                              </td>
                              <td><?php echo $item['fullname']; ?></td>

                              <td><?php echo $item['user_name']; ?></td>
                              <td><?php echo $item['email']; ?></td>

                              <td><?php if(strlen($item['message'])>150) { echo substr($item['message'],0,150)."...<br>"; ?>
<a href="javascript:;" class="show_messae" data-id="<?php echo $item["id"]; ?>"> <label class="label label-primary">Read More</label></a>
                                <?php } else { echo @$item['message']; }  ?></td>
                              <td><?php echo $item['date_set']; ?></td>

                           

                             
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
        

  
  <!-- Modal -->
<div id="myModal_show_message" class="modal fade" role="dialog">
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