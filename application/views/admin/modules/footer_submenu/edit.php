
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Edit Footer Menu</h4>
            </div>
           
         </div>

  <div class="main-container">
            <div class="container-fluid">
              
     

               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
                        	<h4>Edit Review</h4>
                             <?php if($this->session->flashdata("alert")) { ?>
<div class="row">
  <div class="col-md-12">
    <div class="alert alert-danger alert-dismissible fade in">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong><?php echo @$this->session->flashdata("alert"); ?></strong>
  </div>
  </div>
</div>
  <?php } ?>

                        </div>
                        <div class="panel-body">
                          
 <?php 

                        foreach($datalist as $value)

                        {

                        ?>
                          <form  action="<?php echo 'admin/footer_submenu/edit/'.$value['id']; ?>" method="post" >
                              
                            
<div class="form-group hidden">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Widget</label>


                 <select class="form-control" name="main_menu" id="main_menu" required >

                    <?php 

                    foreach($main_menu as $main)

                    { ?>

                    <option value="<?php echo $main['id']; ?>" <?php if($main['id']==$value['footer_menu']) { echo 'Selected';} ?> ><?php echo str_replace('_',' ',$main['title']); ?></option>

                 <?php  }

                    ?>    

                  </select>

                <!-- <input type="text" name="gigs_title"  class="form-control" id="gigs_title" value="<?php  echo $list['fullname'] ?>" readonly> -->

              </div>
                             <div class="form-group">

                        <div class="text-center text-error" id="error-exist"></div>

                        <label for="category_name">Menu Title</label>


                  <input type="text" class="form-control"  name="sub_menu" id="sub_menu" value="<?php if($value['footer_submenu'])echo implode(" ",explode("_", $value['footer_submenu'])); ?>">

                     </div>

                     <div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Page Content</label>

              <?php

                  if (!empty($value['page_desc'])) {

                    echo  "<textarea class='form-control' id='ck_editor_textarea_id' rows='6' name='page_desc'>" . $value['page_desc'] ."</textarea>";

                    echo display_ckeditor($ckeditor_editor1);

                  }

                  else {

                    echo "<textarea class='form-control' id='ck_editor_textarea_id' rows='6' name='page_desc'> </textarea>";

                    echo display_ckeditor($ckeditor_editor1);

                  }

                  ?>

              </div>
  <div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Page Status</label>

                <div class="row">
                	 <div class="col-sm-9">

									<div class="radio radio-info radio-inline">

								<input type="radio" id="academy_status1" value="1" name="status" <?php

                    if ($value['status'] == 1) {

                      echo 'checked=""';

                    }

                    ?>>

                    <label for="academy_status1">Active</label>

									</div>

									<div class="radio radio-inline">

										<input type="radio" id="academy_status2" value="0" name="status" <?php

                          if ($value['status'] == 0) {

                            echo 'checked=""';

                          }

                          ?>>

                    <label for="academy_status2">Inactive</label>

									</div>

								</div>
                </div>

              </div>


                      <button name="form_submit" type="submit" class="btn btn-primary center-block" value="true">Save Changes</button>
                              </form>
                          <?php } ?>
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>         