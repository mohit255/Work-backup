<div class="content-page">

   <div class="content">

         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Create New Membership </h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
              
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <h4>New Membership Info</h4>
                           
                        </div>
                        <div class="panel-body">
                           <form action="<?php echo 'admin/membership/add_membership'; ?>" method="post">
                          <input type="hidden" name="no_of_services" value="<?php echo count($service_name);  ?>">
                           <div class="row">

                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Membership Name</label><input type="text" name="name" class="form-control" id="simpleInput" placeholder="Enter name" required=""></div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Membership Price ($)</label><input type="text" name="price" class="form-control set_number_only" id="simpleInput " placeholder="Enter Price" required=""></div>
                              </div>
                              <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Duration(MONTH)</label><input type="text" name="duration" class="form-control set_number_only" id="simpleInput " placeholder="Enter Duration" required=""></div>
                              </div>
                               <div class="col-md-3">
                                 <div class="form-group"><label for="simpleInput">Package For</label>
<select name="package_for" required="" class="form-control">
   <option value="">Select Type</option>
   <option value="Escort">Escort</option>
   <option value="Agency">Agency</option>
   <option value="Establishment">Establishment</option>
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
                           <?php $i=0; foreach($service_name as $drop) { 

                                   $set_label_text="";
                     
                       switch ($drop["name"]) {
                          case 'Ad Profile':
                             $banner_adds=$this->db->query("select * from add_pogition")->result_array();
                             // $option ='<option value="">Select Value</option>';
                             $option="";
                             foreach ($banner_adds as $key) {

                               $option .='<option value="'.$key['pogition'].'">'.$key['pogition'].'</option>';
                             }
                                  $services_input_type='<select class="form-control" name="services_val_'.@$i.'"">'.$option.'</select>';
                             break;
                          
                          case 'Carousel ad':
                          case 'Touring locations':
                          case 'Available Now':
                          case 'Photo verfication':
                                  $services_input_type='<select class="form-control" name="services_val_'.@$i.'""><option value="No">No</option><option value="Yes">Yes</option></select>';
                             break;

                            case 'Base locations':

                                $set_label_text='1 Base Location';
                                  $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Enter No. of Surrounding Suburbs" value="0">';
                             break;

                             case 'Photo gallery':
                            
                                $set_label_text='1 Main Image';
                                  $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Extra Image" value="0">';
                             break;
                                
                                case 'Photo upload limit':
                            
                                $set_label_text='';
                                  $services_input_type='<input type="text" name="services_val_'.@$i.'" class="form-control set_number_only" id="simpleInput " placeholder="Photo upload limit" value="0">';
                             break;

                          
                       }


                             ?>
                             
                           <div class="row" id="show-my-services">
                            
                                     <div class="col-md-4">
                                    <div class="form-group"><label for="simpleInput">Services Name <?php if(@$drop["test"]) { echo "(".@$drop["test"].")"; } ?></label>
                                     <input type="text" name="benifits[]" class="form-control" value="<?php echo @$drop["name"]; ?>"  readonly="">
                                    </div>
                                 </div>
                                 <div class="col-md-4">
                                    <div class="form-group"><label for="simpleInput">Value <?php echo @$set_label_text; ?></label>
                                     <?php echo @$services_input_type; ?>
                                     </div>
                                    </div>
                                    <div class="col-md-4">
                                    <div class="form-group"><label for="simpleInput">Text (Sub Heading)</label>
                                       <input type="text" name="services_text_<?php echo @$i; ?>" class="form-control" id="simpleInput " placeholder="Enter Value"  value="--" required="">
                                     </div>
                                    </div>
                                 
                              </div>
                           <?php $i=$i+1; } ?>
                           <div class="row">
                              <div class="col-md-2">
                                 <button type="submit" class="btn btn-warning btn-block" name="form_submit">Submit</button>
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