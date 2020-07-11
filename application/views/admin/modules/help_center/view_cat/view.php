
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Category</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
         <?php if($this->session->flashdata('message')) { ?>

            <?php echo $this->session->userdata('message');?>

         <?php }

         ?>    

               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="faqs_categories">
                           <h4>
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                 <option value="Activate">Activate</option>
                                 <option value="Deactivate">Deactivate</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="<?php echo 'FAQ/add_category'; ?>"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New Category</button></a>

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>

                              <th>
                                 <input type="checkbox" value="" name="" id="checkall">
                              </th>
                              <th>Icon</th>
                              <th>Category Name</th>

                              <th>Status</th>

                             

                           </tr>

                                 </thead>
                                 <tfoot>
                                    <tr>

                              <th>#</th>
                              <th>Icon</th>
                              <th>Category Name</th>

                              <th>Status</th>

                            

                           </tr>

                                 </tfoot>
                                 <tbody>

                                
                                    
                                 <?php 

                            if(!empty(@$list)) 

                           {
                              $i=0;

                           foreach(@$list as $item) { 

                              $status = 'Active'; if($item['status']==1){$status = 'Inactive';} 

                              $parent_category = 'None' ;
                      $i=$i+1;
                           

                              ?>

                           <tr>
                              <td><input type="checkbox" value="<?php echo @$item["id"]; ?>" name="" class="checkitem"> </td>
<td>
   <?php if(@$item["category_image"])
          {
            $image=base_url()."assets/cat_image/".@$item["category_image"];
          }
          else
          {
            $image=base_url()."assets/cat_image/film.png";
          }
         
     ?>
     <img src="<?php echo @$image; ?>" style="width: 30px; height:30px;">
</td>
                              <td>
  <a href="<?php echo "FAQ/edit-category/".$item['id']; ?>" class="table-action-btn" title="Edit">
                                 <?php echo $item['name']; ?>
                                <i class="fa fa-edit"></i></a>

                              </td>

                           

                              <td><?php echo $status; ?></td>

                             

                           </tr>

                           <?php } } else { ?>

                           <tr>

                              <td colspan="4"><p class="text-danger text-center m-b-0">No Records Found</p></td>

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