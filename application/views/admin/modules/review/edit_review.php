
         <div class="top-bar clearfix">
            <div class="page-title">
               <h4>Manage Reviews</h4>
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
                          <form  action="<?php echo 'admin/review/edit/'.$list['id']; ?>" method="post" >
                              
                            
<div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Escort Name</label>

                <input type="text" name="gigs_title"  class="form-control" id="gigs_title" value="<?php  echo $list['fullname'] ?>" readonly>

              </div>
                             <div class="form-group">

                        <div class="text-center text-error" id="error-exist"></div>

                        <label for="category_name">Posted by</label>

<input type="text" name="posted_by"  class="form-control" id="posted_by" value="<?php echo $list['from_user']; ?>" readonly="">

                     </div>

                     <div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Review</label>

                <textarea class="form-control" required="" rows="5" name="review" ><?php if(!empty($list['comment'])){ echo $list['comment']; } ?></textarea>

              </div>
  <div class="form-group">

                <div class="text-center text-error" id="error-exist"></div>

                <label for="category_name">Status</label>

                <div class="row">
                	 <div class="col-sm-9">

									<div class="radio radio-info radio-inline">

										<input type="radio" id="blog_status1" value="1" name="status" <?php

										if ($list['status'] == 1) {

											echo 'checked=""';

										}

										?>>

										<label for="blog_status1">Active</label>

									</div>

									<div class="radio radio-inline">

										<input type="radio" id="blog_status2" value="0" name="status" <?php

										if ($list['status'] == 0) {

											echo 'checked=""';

										}

										?>>

										<label for="blog_status2">Inactive</label>

									</div>

								</div>
                </div>

              </div>


                       <button class="btn btn-primary" name="form_submit" value="submit" type="submit">Submit</button>

								<button type="reset" class="btn btn-default m-l-5">Cancel</button>
                              </form>
                          
                        </div>
                     </div>
                  </div>
                
               </div>
              
            </div>
         </div>         