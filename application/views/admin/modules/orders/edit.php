  <form method="POST" action="admin/Orders/update_order/">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
    <input type="hidden" name="user_id" value="<?php echo $data['user_id']; ?>">
    <input type="hidden" name="membership_id" value="<?php echo $data['membership_id']; ?>">
                                                      
 <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Order Name</label><input type="text" class="form-control" id="simpleInput" required="" value="<?php echo @$data["name"]; ?>" placeholder="Enter Order Name" disabled ></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">Order Number</label><input type="text" class="form-control" id="simpleInput" required="" value="<?php echo @$data["order_no"]; ?>" placeholder="Enter Order Number" disabled ></div>
                                                         </div>
                                                      </div>

                                                      <div class="row">
                                                         <div class="col-md-12">
                    <div class="form-group"><label for="simpleInput">Action</label>
                                   <select class="form-control" name="status">
                                    
                                    <?php 


                                    if(@$data["addon_status"]=="0") { ?>
                                        <option value="0" selected="">Pending</option>
                                        <option value="1" >Done</option>   
                                        <option value="3" >Canceled</option>   
                                    <?php } elseif(@$data["addon_status"]=="1") { ?>
                                      <option value="1" selected="">Done</option>
                                      <option value="0" >Pending</option>
                                      <option value="3" >Canceled</option>
                                    <?php } else { ?>
                                      <option value="3" selected="">Canceled</option>
                                      <option value="0" >Pending</option>
                                      <option value="1" >Done</option>
                                    <?php } ?>
                                     
                                   </select>
                                                            </div>
                                                         </div>
                                                      </div>
                                                     
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Submit</button>
                                                         </div>
                                                      </div>
                                                   </form>