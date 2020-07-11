
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Add New Content</h4>
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
                          
                              <form action="<?php echo 'admin/help_center/add_new_content'; ?>" method="post"  enctype="multipart/form-data"  >
                            
<div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Question/Title</label>

                <input type="text" name="name"  placeholder="Enter Title " class="form-control" id="category_name" required>

              </div>
                             <div class="form-group">

                        <div class="text-center text-error" id="error-exist"></div>

                        <label for="category_name">Category Name</label>

                      <div class="row">
  <hr>
  <?php if(@$category) { foreach(@$category as $cat ) { ?> 
       <div class="col-md-4">
        <label for="select_category_<?php @$cat["id"]; ?>">
    <input type="checkbox" value="<?php echo @$cat["id"]; ?>" name="categorys[]" id="select_category__<?php @$cat["id"]; ?>"> <?php echo $cat["name"]; ?>
    </label>
  </div>                      
     
                  <?php } } ?>

    <hr>
</div>

                     </div>

                     <div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Content</label>

                <textarea class="form-control" required="" name="page_desc" id="ck_editor_textarea_id"></textarea>
<?php echo display_ckeditor($ckeditor_editor1);  ?>
              </div>
                        <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>
                              </form>
                          
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>


                                