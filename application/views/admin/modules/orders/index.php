<?php $active_2 =$this->uri->segment(3); ?>

 <div class="top-bar clearfix">

            <div class="page-title">

               <h4>Manage Payment</h4>

            </div>

           

         </div>

         <div class="main-container">

            <div class="container-fluid">

              

              

        
               <div class="row gutter">

                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                     <div class="panel panel-grey">

                        <div class="panel-heading">

                          <!--  <h4>

                              <select class="form-control" id="set_users">

                        <option value="">Selete option</option>

                        <option value="delete">Delete</option>

                        <option value="Active">Active</option>

                        <option value="Inactive">Inactive</option>

                        

                        

                     </select>



                           </h4>

                           <button type="button" class="btn btn-primary" id="delete_users">Apply</button>

                          <a href="admin/user/add_new_users_for"> <button type="button"  class="btn btn-warning pull-right">Add New User</button></a> -->



                        </div>

                        <div class="panel-body">

                           <div class="table-responsive">

                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">

                                 <thead>

                                    <tr>

                                       <th>#</th>
                    <th>Order Id</th>

                    <th>Order Number</th>

                    <th>Addon Name</th>

                    <th>Buyer Name</th>

                    <th>Email</th>

                    <th>Date</th>

                    <th>Status</th>

                    <th>Edit</th>

                  </tr>

                                 </thead>

                                 <tfoot>

                                    <tr>
    <th>#</th>
                    <th>Order Id</th>

                    <th>Order Number</th>

                    <th>Addon Name</th>

                    <th>Buyer Name</th>

                    <th>Email</th>

                    <th>Date</th>

                    <th>Status</th>

                    <th>Edit</th>
                                       

                                    </tr>

                                 </tfoot>

                                 <tbody>

                                    <?php 



                            if(!empty($list)) 



                           {



                           $i=1;



                           foreach($list as $item) {

                              ?>

                                    <tr>
                    <th><?php echo @$i; ?></th>

                    <th><?php echo @$item["id"]; ?></th>

                    <th><?php echo @$item["order_no"]; ?></th>

                    <th><?php echo @$item["email"]; ?></th>

                    <th><?php echo @$item["name"]; ?></th>

                    <th><?php echo @$item["fullname"]; ?></th>

                    <th><?php echo @$item["requested_time"]; ?></th>

                    

                    <th>

                        <?php if(@$item["status"]=="1")
                        {
                          echo '<span class="badge green-bg">Done</span>';
                        }
                        elseif(@$item["status"]=="0")
                        {
                          echo '<span class="badge red-bg">Pending</span>';
                        }
                        else
                        {
                          echo '<span class="badge dark-red-bg">Canceled</span>';
                        }
                        ?>
                    
                  </th>
                  <th>
                    <button type="button" data-id="<?php echo @$item["id"]; ?>" class="btn btn-warning pull-right order_edit">Edit</button>
                  </th>

                                      

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


        <div class="modal fade" id="myModalDefault_edit_order" tabindex="-1" role="dialog" aria-labelledby="myModalDefault_edit_order">
                                          <div class="modal-dialog" role="document">
                                             <div class="modal-content">
                                                <div class="modal-header">
                                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                   <h4 class="modal-title">Edit Order</h4>
                                                </div>
                                                <div class="modal-body">
                                                    

                                                </div>
                                                <div class="modal-footer"><button type="button" class="btn btn-light-grey" data-dismiss="modal">Close</button> </div>
                                             </div>
                                          </div>
                                       </div>
