  <form action="admin/membership/update_addon" method="post" class="">
  <input type="hidden" name="id" value="<?php echo @$data["id"]; ?>">
          <div class="row">

                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Addon Name</label><input type="text" name="addon" class="form-control" id="simpleInput" value="<?php echo @$data["name"]; ?>" placeholder="Enter name" required=""></div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Adon Price ($)</label><input type="text" name="price" class="form-control set_number_only" id="simpleInput" value="<?php echo @$data["price"]; ?>" placeholder="Enter Price" required=""></div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Duration</label><input type="text" name="duration" class="form-control set_number_only" value="<?php echo @$data["duration"]; ?>" id="simpleInput" placeholder="Enter Duration" required=""></div>
                              </div>
                              <div class="col-md-3">
                                <?php $duration_type_array= ['DAY','WEEK','MONTH','YEAR'];  ?>  
                                 <div class="form-group"><label for="simpleInput">Duration Type</label>
                                    <select class="form-control" name="duration_type" disabled="true" required="">
  <option value="">Selet Type</option>
  <?php for($i=0; $i<count($duration_type_array); $i++) {
    
   $status='';
    if(@$duration_type_array[$i]==$data['duration_type'])
    {
      $status='selected';
    }

   ?>
   <option value="<?php echo @$duration_type_array[$i]; ?>" <?php echo @$status ?>><?php echo @$duration_type_array[$i]; ?></option>
  <?php } ?>
</select>
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                               <div class="col-md-6">
                            <?php $value_array=['Image on Home page','Profile on large home page ad banner','Profile on ad banner at top of capital city search results']; ?>    
                                <div class="form-group"><label for="simpleInput">Ad positioning</label>
<select name="add_positioning" class="form-control" required="">
   <option value="">Select Positioning</option>
   <?php for($j=0; $j<count($value_array); $j++) {
      $set_status='';
      if($value_array[$j]==$data["benifits"])
      {
        $set_status='selected=""';
      }
     
    ?>
   <option <?php echo $set_status; ?> value="<?php echo $value_array[$j]; ?>"><?php echo $value_array[$j]; ?></option>
   <?php } ?>
   
  </select>
                                </div>
                              </div>
                               <div class="col-md-6">
                                <div class="form-group"><label for="simpleInput">Ad positioning <span style="font-size: 10px;">(Image on Home page  limited to N Profiles per week (Waiting List))</span></label><input type="text" name="No_of_profiles" class="form-control set_number_only" value="<?php echo $data["values"]; ?>" id="simpleInput" placeholder="Limited to N Profiles" required=""></div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group"><label for="simpleInput">Addon Info<span style="font-size: 10px;">(This is the conditions of this Adddon)</span></label>
                                  <textarea name="addon_info" id="addon_info" class="form-control" rows="5"><?php echo @$data["info"]; ?></textarea>
                                </div>
                              </div>
                           </div>
                       <div class="row">
                               <div class="col-md-12">
                                <button type="Submit" class="btn btn-primary btn-block">Submit</button>
                              </div>
                           </div>    
        </form>