 <form method="POST" action="admin/dropdown/update_drop_down/">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
         <div class="row">
           <div class="col-md-12">
              <div class="form-group"><label for="simpleInput">Title</label>
                <input type="text" name="dropdown" class="form-control" value="<?php echo @$data["title"]; ?>">
              </div>
           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
             <button type="button" class="btn btn-primary" id="add_data_for_dropdown">Add New Value</button>
           </div>
         </div>
 <div class="row">
           <div class="col-md-12">
             <hr>
             &nbsp;
           </div>
         </div>
         <div class="row" id="show_data_for_drop_down_value">
        <?php $get_value=explode("*#*",@$data["value"]); ?>
  <?php if($get_value) { for($i=0; $i<count($get_value); $i++ ) { ?>
     <div class="remove_box_for_drop_down">
             <div class="col-md-8">
                 <input type="text" class="form-control" name="dropdown_value[]" value="<?php echo @$get_value[$i] ?>">
               </div>
               <div class="col-md-2 pull-right">
                 <button type="button" class="pull-right btn btn-danger remove_services_btn_for_drop_down">Remove</button>
               </div>
               <div class="row">
                 <div class="col-md-12">
                   &nbsp;
                 </div>
               </div>
           </div>
 <?php   } } ?>
         



          
         </div>
         <div class="row">
           <div class="col-md-12">
             &nbsp;
           </div>
         </div>
         <div class="row">
           <div class="col-md-12">
             <button type="submit" class="btn btn-warning btn-block">Update</button>
           </div>
         </div>
       </form>