
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Edit Category</h4>
            </div>
    <?php echo @$this->session->flashdata("alert"); ?>      
         </div>
         <div class="main-container">
            <div class="container-fluid">
              
     

               <div class="row gutter">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                     <div class="panel panel-grey">
                        <div class="panel-heading">
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
                           <div class="table-responsive">
                              <form action="<?php echo 'admin/help_center/edit_category/'.$list['id']; ?>" method="post"  enctype="multipart/form-data"  >
                                <input type="hidden" name="old_image" value="<?php echo $list['category_image'];  ?>">
                             <div class="form-group">

                        <div class="text-center text-error" id="error-exist"></div>

                        <label for="category_name">Category Name</label>

                       <input type="text" name="category_name"  placeholder="Enter Category Name " value="<?php if(!empty($list['name'])){echo $list['name']; } ?>" class="form-control" id="category_name" required>

                     </div>

                      <div class="form-group">

                        <div class="text-center text-error" id="error-exist"></div>

                        <label for="category_name">Category Icon Image</label>

                      <input type="file" name="image"  accept=".png,.jpg,.gif,.jpeg"  placeholder="Enter Category Name " class="form-control" id="category_name" >

                     </div>
                     <div class="form-group">

                <label class="control-label">Status</label>

                <div>

                  <div class="radio radio-primary radio-inline">

                    <input type="radio" id="blog_status1" value="0" name="status" <?php

                    if ($list['status'] == 0) {

                      echo 'checked=""';

                    }

                    ?>>

                    <label for="blog_status1">Active</label>

                  </div>

                  <div class="radio radio-danger radio-inline">

                    <input type="radio" id="blog_status2" value="1" name="status" <?php

                    if ($list['status'] == 1) {

                      echo 'checked=""';

                    }

                    ?>>

                    <label for="blog_status2">Inactive</label>

                  </div>

                </div>

              </div>
                      <input type ="hidden" name="catagory_id" value="<?php if(!empty($list['id'])){echo $list['id']; } ?>" id="catagory_id">
                        <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>
                              </form>
                           </div>   
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>


                                