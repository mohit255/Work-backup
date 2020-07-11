  <form method="POST" action="admin/city/update_city/">
    <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
                                                      
 <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">State</label><input type="text" class="form-control" id="simpleInput" required="" value="<?php echo @$data["state"]; ?>" name="state" placeholder="Enter State Name"></div>
                                                         </div>
                                                      </div>
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <div class="form-group"><label for="simpleInput">City Name</label><input type="text" class="form-control" id="simpleInput" required="" name="city" value="<?php echo @$data["city"]; ?>" placeholder="Enter City Name"></div>
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
                                                     
                                                      <div class="row">
                                                         <div class="col-md-12">
                                                            <button type="Submit" class="btn btn-warning btn-block">Submit</button>
                                                         </div>
                                                      </div>
                                                   </form>