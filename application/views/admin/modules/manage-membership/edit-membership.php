<div class="content-page">

   <div class="content">


         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Edit Membership </h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
              <?php 

                  $services_name=explode("*#*",$list['benifits']);
                  $values=explode("*#*",$list['values']);
                  $sub_heading=explode("*#*",$list['sub_heading']);

              ?>
<div class="row gutter">
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
   <div class="panel panel-grey">
      <div class="panel-heading">
         <h4>New Membership Info</h4>
         
      </div>
      <div class="panel-body">
         <form action="admin/membership/update_membership" method="post">
         <div class="row">
            <input type="hidden" name="id" value="<?php echo $list['id'];  ?>">
            <input type="hidden" name="no_of_services" value="<?php echo count($services_name);  ?>">
            <div class="col-md-2">
               <div class="form-group">
                <label for="simpleInput">Membership Name</label>
                <input type="text" name="name" class="form-control" id="simpleInput" placeholder="Enter name" required="" readonly value="<?php echo $list['name'];  ?>" >
               </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label for="simpleInput">Membership Price ($)</label>
                <input type="text" name="price" class="form-control set_number_only" id="simpleInput " placeholder="Enter Price" required="" value="<?php echo $list['price'];  ?>">
              </div>
            </div>
            <div class="col-md-2">
               <div class="form-group">
                <label for="simpleInput">Duration</label>
                <input type="text" name="duration" class="form-control set_number_only" id="simpleInput " placeholder="Enter Duration" required="" value="<?php echo $list['duration'];  ?>">
              </div>
            </div>

        <div class="col-md-2">
          <?php $duration_type_array= ['DAY','WEEK','MONTH','YEAR'];  ?>     
           <div class="form-group"><label for="simpleInput">Duration Type</label>
              <select class="form-control" name="duration_type" required="">
                <option value="">Selet Type</option>
                <?php for($i=0; $i<count($duration_type_array); $i++) {
                  
                 $status='';
                  if(@$duration_type_array[$i]==$list['duration_type'])
                  {
                    $status='selected';
                  }

                 ?>
                 <option value="<?php echo @$duration_type_array[$i]; ?>" <?php echo @$status ?>><?php echo @$duration_type_array[$i]; ?></option>
                <?php } ?>
              </select>

            <!-- <input type="text" name="duration" class="form-control set_number_only" id="simpleInput " placeholder="Enter Duration" required="" value="<?php echo $list['duration'];  ?>"> -->
          </div>
        </div>

     <div class="col-md-4">
       <div class="form-group"><label for="simpleInput">Package For</label>
        <?php $package_for=['Escort','Agency','Establishment']; ?>
        <select name="package_for" required=""  class="form-control">
           <option value="">Select Type</option>
           <?php for($i=0; $i<count($package_for); $i++) { ?>
           <option value="<?php echo @$package_for[$i]; ?>" <?php if(@$package_for[$i]==@$list['package_for']) { echo 'selected=""'; } ?>><?php echo @$package_for[$i]; ?></option>
           <?php } ?>
           
        </select>
         </div>
      </div>
   </div> 


       <div class="row">
          <div class="col-md-12">
             <h3>Services</h3>
             <!-- <button type="button" class="btn btn-primary" id="add_data">Add Services</button> -->
             <hr>
          </div>
       </div>
       <?php 

           $i=0; foreach($service_name as $drop) { 

            
            $set_label_text="";
                     
            $get_value_index=array_search($drop["name"],  $services_name);
            $get_services_value=$values[$get_value_index];
            $get_services_sub_heading=$sub_heading[$get_value_index];

           switch ($drop["name"]) {
              case 'Ad Profile':
                 $banner_adds=$this->db->query("select * from add_pogition")->result_array();
                 // $option ='<option value="">Select Value</option>';
                 $option="";
                 foreach ($banner_adds as $key) {
                   if($key['pogition']==$get_services_value)
                   {
                    $set_status='selected=""';
                   }
                   else
                   {
                     $set_status='';
                   }

                   $option .='<option value="'.$key['pogition'].'" '.$set_status.'>'.$key['pogition'].'</option>';
                 }
                      $services_input_type='<select class="form-control" name="services_val_'.@$i.'"">'.$option.'</select>';
                 break;
              
                  case 'Auto boosting':
                  case 'Manual boosting':
                  case 'Carousel ad':
                  case 'Touring locations':
                  case 'Available Now':
                  case 'Photo verfication':

               if($get_services_value=="No")
                 {
                     $set_options='<option value="No">No</option><option value="Yes">Yes</option>';
                 }
                  else
                  {
                     $set_options='<option value="Yes">Yes</option><option value="No">No</option>';
                  }
                
                $services_input_type='<select class="form-control" name="services_val_'.@$i.'"">'. $set_options.'</select>';

                 break;

                case 'Base locations':

                    $set_label_text='1 Base Location';
                    $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Enter No. of Surrounding Suburbs" value="'.$get_services_value.'">';
                 break;

                 case 'Photo gallery':
                
                    $set_label_text='1 Main Image';
                    $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Extra Image" value="'.@$get_services_value.'">';
                 break;
                    
                    case 'Photo upload limit':
                
                    $set_label_text='';
                    $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Photo upload limit" value="'.@$get_services_value.'">';
                 break;

              
           }

     ?>
                             
 <div class="row" id="show-my-services">
    <div class="col-md-4">
          <div class="form-group">
            <label for="simpleInput">Services Name <?php if(@$drop["test"]) { echo "(".@$drop["test"].")"; } ?></label>
           <input type="text" name="benifits[]" class="form-control" value="<?php echo @$drop["name"]; ?>"  readonly="">
          </div>
       </div>
     <div class="col-md-2">
        <div class="form-group">
          <label for="simpleInput">Value <?php echo @$set_label_text; ?></label>
         <?php echo @$services_input_type; ?>
         </div>
        </div>
        <div class="col-md-4">
         <div class="form-group">
          <label for="simpleInput">Text (Sub Heading)</label>
           <input type="text" name="services_text_<?php echo @$i; ?>" class="form-control" id="simpleInput " placeholder="Enter Value"  value="<?php echo @$get_services_sub_heading; ?>" required="">
         </div>
        </div>

        <div class="col-md-2">
         <div class="form-group">
          <label for="simpleInput">Number Of Profile</label>
           <input type="text" name="" class="form-control" id="no_of_profile" placeholder="Enter number of profile"  value="" required="">
         </div>
        </div>


    </div>

       <?php $i=$i+1; } ?>

       <div class="row">
          <div class="col-md-2">
             <button type="submit" class="btn btn-warning btn-block" >Submit</button>
          </div>
       </div>  

 </form>
                           

                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>
</div>