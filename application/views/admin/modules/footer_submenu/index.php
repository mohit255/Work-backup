
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Footer Menu</h4>
            </div>
           
         </div>
         <div class="main-container">
            <div class="container-fluid">
              <?php if($this->session->userdata('message')) {  ?>

         <?php echo $this->session->userdata('message');?>

         <?php } ?> 
        
               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                           <input type="hidden" id="table_name" value="footer_submenu">
                           <h4>
                              <select class="form-control" id="set_users">
                                 <option value="">Select Operation</option>
                                 <option value="Delete">Delete</option>
                                 <option value="Activate">Activate</option>
                                 <option value="Inactivate">Inactivate</option>
                              </select>

                           </h4>
                           <button type="button" class="btn btn-warning" id="delete_users">Apply</button>
                           <a href="admin/footer_submenu/create"><button type="button"  class="btn btn-warning pull-right" id="delete_city">Add New Page</button></a>

                        </div>
                        <div class="panel-body">
                           <div class="table-responsive">
                              <table id="basicExample" class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th><input type="checkbox" value="" name="" id="checkall"> </th>
                                                                                         

                             <!-- <th>Widget</th> -->

                                    <th>Menu Title</th>

                                    <th>Page Description</th>

                                    <th>Create Date</th>                                    

                                    <th>Status</th>

                                    <th class="text-right">Action</th>

                         

                                    </tr>
                                 </thead>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                                                                      

                               <!-- <th>Widget</th> -->

                                    <th>Menu Title</th>

                                    <th>Page Description</th>

                                    <th>Create Date</th>                                    

                                    <th>Status</th>

                                    <th class="text-right">Action</th>


                                    </tr>
                                 </tfoot>
                                 <tbody>

                              <?php 

                                

                                if (!empty($lists)) {

                                    $sno = 1;

                                    foreach ($lists as $row) {

                                        

                                        $_id = isset($row['id']) ? $row['id'] : '';

                                         if (!empty($_id)) {

                                            $main_menu = $row['title'] ;

                                            $sub_menu = implode(" ",explode("_", $row['footer_submenu'])) ;                              

                                            $seo_title = $row['seo_title'];

                                            $seo_desc = $row['seo_desc'];

                                            $seo_keyword = $row['seo_keyword'];

                                            $page_title = isset($row['page_title']) ? $row['page_title'] : '';

                                            $user_status = 'Inactive';

                                            if (isset($row['status']) && $row['status'] == 1) {

                                                $user_status = 'Active';

                                            }

                                  $created_on = '-';

                                            if (isset($row['created_date'])) {

                                                if (!empty($row['created_date']) && $row['created_date'] != "0000-00-00 00:00:00") {

                                                    $created_on = '<span >' . date('d M Y', strtotime($row['created_date'])) . '</span>';

                                                }

                                            }

                                        

                                            if(isset($row['page_desc']))

                                            {

                                               $page_content = $row['page_desc'] ;

                                            }                                                

                                            ?>

                                            <tr>

                                                <td>
<input type="checkbox" value="<?php echo $row["id"]; ?>" name="" class="checkitem">
                              </td>     

                                                <!-- <td> <?php echo str_replace('_',' ',$main_menu);?></td> -->

                                                <td> <?php echo $sub_menu?></td>

                                                <td> <?php echo substr(strip_tags($page_content), 0,20);?><?php if(strlen($page_content)>20){?> ...<?php } ?> </td>

                                                <td> <?php echo $created_on?></td>                                                

                                                <td> <?php echo $user_status; ?></td>

                                                <td class="text-right">

                                                    <a href="<?php echo base_url('admin/footer_submenu/edit/' . $_id); ?>" class="on-default view-row table-action-btn" title="Edit"><i class="fa fa-edit"></i></a>&nbsp;

                                                    <!-- <a href="javascript:void(0)" class="on-default remove-row table-action-btn" title="Delete" id="Onremove_<?php echo $_id; ?>" onclick="delete_footer_submenu(<?php echo $_id; ?>);"><i class="mdi mdi-window-close text-danger"></i></a> -->

                                                </td>

                                            </tr>

                                            <?php

                                        }

                                   $sno = $sno +1;

                                        }

                                } else {

                                    ?>

                                    <tr>

                                        <td colspan="11"><p class="text-danger text-center m-b-0">No Records Found</p></td>

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
        

                               