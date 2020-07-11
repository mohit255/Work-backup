
<input type="hidden" id="url_page_no" value="<?php echo @$page_no; ?>">
<input type="hidden" id="url_type" value="<?php echo @$type; ?>">
<input type="hidden" id="url_name" value="<?php echo @$name; ?>">
<input type="hidden" id="url_state" value="<?php echo @$state; ?>">
<input type="hidden" id="url_zip" value="<?php echo @$zip; ?>">
<section class="profile-section">
   <div class="container">
      <div class="row">
         <div class="col-md-4">
            <ol class="breadcrumb menu-breadcrumb">
               <li><a href="#">Home</a> <i class="fa fa fa-chevron-right"></i></li>
               <li class="active">My Search Result</li>
            </ol>
         </div>
      </div>
      <div class="row">
         <div class="col-md-12">
            <h3 class="page-title">My Search Result</h3>
         </div>
      </div>
   </div>
</section>
<section style="background-color: #eee;">
   <div class="container">
      <div class="row">
         <div class="col-md-3">
            <h2>Refine Results</h2>
         </div>
         <div class="col-md-9">
             <div class="row" style=" position: relative; top: 25px;">
               <div class="col-md-6">

                  <p class="text-left"><strong>Search Result :</strong> <?php if(@$count_user) { echo @$count_user; } else { echo 0; }; ?> result found</p>
               </div>
              <!--  <div class="col-md-9">
                 <form method="post" action="<?php echo  base_url(); ?>user/search/data_set_searck_button"> 
            <div class="input-group" id="adv-search" style="width: 100%;">
                <input type="text" class="form-control search-box mp_input" name="quick_search" placeholder="Type a niche or keyword..." aria-autocomplete="list" aria-owns="mp_quick_search_list" required autocomplete="off" role="combobox" aria-required="false" style="height: 38px !important; border-top-left-radius: 15px;border-bottom-left-radius: 15px;"><ol class="mp_list" aria-atomic="true" aria-busy="false" aria-live="polite" id="mp_quick_search_list" role="listbox" style="display: none;"></ol>
                <div class="input-group-btn">
                    <div class="btn-group" role="group">
                        <div class="dropdown dropdown-lg">
                            
                        </div>
                        <button type="submit" class="btn btn-primary search-btn" style="height: 38px !important; border-top-right-radius: 15px;border-bottom-right-radius: 15px;"><span class="" aria-hidden="true">SEARCH</span></button>
                    </div>
                </div>
            </div>
            </form>
               </div> -->
               <div class="col-md-6">
                  <p class="text-right">Search For :<strong> <?php echo implode(" ",explode("-",  @$name)); ?></strong></p>
               </div>
               </div>
               
         </div>
      </div>
      <div class="row" style="padding: 20px 0">
         <div class="col-md-3">

            <!-- <h2>Refine results</h2> -->
           <div class="searche">
         <div class="row">
            <div class="col-md-12">
                  <h4>All categories</h4>
            <div class="input-group">
              <!--  <input type="text" class="form-control" id="name" name="name" aria-label="Amount (rounded to the nearest dollar)" placeholder="All categories" required=""> -->
            </div>
            <br>
              <div class="scrollbar scrollbar-success scrollbar-lady-lips">
  <div class="force-overflow">
            <ul class="category">
               <?php if(@$category) { foreach ($category as $cat) {
              if(@$cat["packages"]!="0")
               { ?>
  <li><a href="javascript:;" class="search_package_by_category_dsp" data-id="<?php echo @$cat["name"]; ?>" style="margin-left: 10px;"><?php echo @$cat["name"]; ?><span style="border-radius: 50%;    float: right;margin-top: 2%;    margin-right: 2%;" class="label label-success"><?php echo @$cat["packages"]; ?></span></a></li>
  <li class="divider"></li>
             <?php  }
                ?>
             
               <?php  } } ?>

            </ul>

</div>
         </div>

            </div>
         </div>



           
<br>
            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" style="margin-left: -5px;">
               <form>
                  <!-- <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingOne">
                         <h4 class="panel-title">
                             <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                 <i class="more-less glyphicon glyphicon-plus"></i>
                                 Categories
                             </a>
                         </h4>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                         <div class="panel-body">
                              <ul>
                              	<li><input id="check1" type="checkbox" name="" value="13">&nbsp;&nbsp;<label for="check1">Art & Entertainment</label></li>
                              	<li><input id="check2" type="checkbox" name="" value="13">&nbsp;&nbsp;<label for="check2">Art & Entertainment</label></li>
                              	<li><input id="check3" type="checkbox" name="" value="13">&nbsp;&nbsp;<label for="check3">Art & Entertainment</label></li>
                              	<li><input id="check4" type="checkbox" name="" value="13">&nbsp;&nbsp;<label for="check4">Art & Entertainment</label></li>
                              </ul>
                         </div>
                     </div>
                     </div> -->
                  <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingTwo">
                        <h4 class="panel-title">
                           <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           <i class="more-less glyphicon glyphicon-plus"></i>
                           Location
                           </a>
                        </h4>
                     </div>
                     <div id="collapseTwo" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingTwo">
                        <div class="panel-body">
                           <div class="input-group" style="width: 100%;">
                              <select name="country_id" id="country_id" class="form-control" required="">
                                 <!-- <option value="">Select Country</option> -->
                                 <option value="231">United States</option>
                                
                              </select>
                           </div>
                           <br>
                           <div class="input-group" id="" style="width: 100%;">

                              <select name="state_id_dsp_get_state" id="state_id_dsp_get_state" class="form-control" required="">
                                 <option value="all state">Select State</option>
                                 <?php 

                                 if(@$states) { foreach ($states as $sta) {
                                    ?>
                              <?php if($state_name_get==@$sta["state_name"]){
                                 $set_data="selected=''";

                              } else { 

                              $set_data='';
                              } ?>    
         <option value="<?php echo @$sta["state_name"]; ?>" <?php echo  @$set_data; ?>><?php echo @$sta["state_name"]; ?></option>
                                 <?php  } } ?>
                                 
                               
                              </select>
                           </div>
                           <br>
                           <!-- <div class="input-group">
                              <input type="text" class="form-control" id="name" name="name" aria-label="Amount (rounded to the nearest dollar)" placeholder="Zipcode" required="">
                           </div> -->
                           <div class="input-group">
                            <?php 
if(@$zip!="no-zip-code")
{
  $set_zip=$zip; 
}
else
{
  $set_zip='';
}
                             ?>
                               <input id="zipcode" type="text" class="form-control" name="zipcode" value="<?php echo @$set_zip; ?>" placeholder="Zipcode">
                                <a href="javascript:;" id="search_zipcode_dsp"><span class="input-group-addon btn btn-sh btn-primary "><i class="glyphicon glyphicon-search"></i></span></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- <div class="panel panel-default">
                     <div class="panel-heading" role="tab" id="headingThree">
                        <h4 class="panel-title">
                           <a  role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                           <i class="more-less glyphicon glyphicon-plus"></i>
                           Zipcode
                           </a>
                        </h4>
                     </div>
                     <div id="collapseThree" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingThree">
                        <div class="panel-body">
                           <div class="input-group">
                              <input type="text" class="form-control" id="name" name="name" aria-label="Amount (rounded to the nearest dollar)" placeholder="Zipcode" required="">
                           </div>
                        </div>
                     </div>
                  </div> -->
                  <div class="row text-center">
                     <br>
                     <!-- <a href="" class="dynamic-button" style="padding: 10px;">Search</a> -->
                  </div>
               </form>
            </div>
         </div>
         </div>
         <div class="col-md-9">
           <div class="search-result">
            <!-- <div class="row">
               <div class="col-md-8">
               	<p class="text-left"><strong>Search Result :</strong> 12 result found</p>
               </div>
               <div class="col-md-4">
               	<p class="text-right">Search by :<strong> Relevancy</strong></p>
               </div>
               </div> -->
             <div class="row">
               <?php 
               if(@$list)
               {   
              foreach($list as $user)
              { ?>
              
 <div class="col-md-4">
                  <div class="card card-inverse card-info">
                     <?php $image =  base_url().'assets/images/avatar-lg.jpg' ;
    if(!empty($user['user_profile_image']))
    {
      $image = base_url().$user['user_profile_image'];
    }
     ?>
                      <a href="<?php echo base_url() ?>user-profile/<?php echo @$user["username"]; ?>"><img class="card-img-top" src="<?php echo @$image; ?>">
                        <div class="change-img-text-new" style="width: 252px !important; height: 250px; padding-top: 108px;">
                        <button class="btn btn-outline" style="background: transparent;border: 2px solid #fff; color: #ffffff !important;">View this profile</button>
                      </div>
                      </a>
                     <div class="card-block">
                       <a href="<?php echo base_url() ?>user-profile/<?php echo @$user["username"]; ?>"> <h4 class="card-title"><?php echo @$user["fullname"]; ?></h4></a>
                        <hr>
                        <div class="card-text card-social" style="">
                           <div class="contents" style="height: 43px;">
                              <ul class="list-inline social-list1" style="position: relative; top: 14px;">
                                 <li class=""> <span id="">
                                   <?php 

$social_link1=$this->db->query("select * from social_profile where user_id='".@$user["USERID"]."'");
// var_dump($this->db->last_query());
$social_link=$social_link1->row_array();
                                    $cpunt=0;
                                    ?>
                                    <?php if($social_link["facebook"]) { 
$cpunt=$cpunt+1;
                                       ?> 
                                    <a href="<?php echo $social_link["facebook"]; ?>"> <span class="fa fa-facebook set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span></a>
                                    <?php } ?>

                                    <?php if($social_link["instagram"]) { 
$cpunt=$cpunt+1;
                                       ?> 
                                    <a href="<?php echo $social_link["instagram"]; ?>"> <span class="fa fa-instagram set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span></a>
                                    <?php } ?>
                                    
                                    <?php if($social_link["linkedin"]) {
$cpunt=$cpunt+1;
                                     ?> 
                                    <a href="<?php echo $social_link["linkedin"]; ?>"> <span class="fa fa-linkedin set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span></a>
                                    <?php } ?>
                                    <?php if($social_link["twitter"]) { 
$cpunt=$cpunt+1;
                                       ?> 
                                    <a href="<?php echo $social_link["twitter"]; ?>"> <span class="fa fa-twitter set_class_for_bd_dsp" style="padding: 9px 11px 9px 11px;"></span></a>
                                    <?php } ?>

                                    <?php  if($cpunt==0) 
                                            { ?>
                                    <!-- <center><h4>No Social Link</h4></center>       -->
                                           <?php  }
                                    ?>
                                    
                                    </span>
                                 </li>
                              </ul>
                           </div>
                        </div>
     

                     </div>
   <?php
     $categorys=$this->db->query("SELECT a.category_id,b.CATID as cat_id ,b.name as cat_name FROM sell_gigs as a,categories as b WHERE b.CATID=a.category_id and a.status='0' and a.user_id='".@$user["USERID"]."'");
     $cat=$categorys->result_array();
$cat_name=[];
foreach($cat as $re)
  {
    $data=explode(" ",$re["cat_name"]);
        array_push($cat_name,$data["0"]);
  }

      ?>               
                     <div class="card-text" style="">

                      <div class="">
                        <p style="text-align: center;color: #00b8ff;"><strong>Niche:</strong>

                         <?php echo implode(",",@$cat_name); ?></p>
                      </div>
                     </div>
          <?php 

$data=$this->db->query("select id from sell_gigs where user_id='".@$user["USERID"]."'");
$res=$data->result_array();
if($res)
{   
  $ids=[];
  foreach($res as $re)
  {
      array_push($ids,$re["id"]);
  }
  $reats_get=$this->db->query("SELECT * FROM `feedback` WHERE `gig_id` IN (".implode(",", $ids).")");
  $reats_get=$reats_get->result_array();
  $count=0;
  $res_set=0;
  foreach($reats_get as $res) {
    $res_set=$res_set+$res["rating"];
    $count=$count+1;
  }
    if($count==0)
    {

      $set_rating_per=0;
    }
    else
    {
      $set_rating_per=@$res_set/@$count;
    }
}
// var_dump($count);
if(@$count>0)
{
  $sei_color='color:#ffbf00';
}
else
{
  $sei_color='color:#999999';
}


 ?>           
                     <!-- <div class="card-text">
                        <span class="follow" style="">25k Followers</span>
                        <span class="roi" style="">300% ROI</span>
                        </div> -->
                     <div class="card-footer">
                        <span class="follow" style=" left:0; "><i class="fa fa-star" style="font-size: 19px; <?php echo $sei_color; ?>"></i> <?php echo number_format(@$set_rating_per, 1); ?>(<?php echo @$count; ?>)</span>
                        <span class="roi" style="left: 75px;"><a href="<?php echo base_url() ?>user-profile/<?php echo @$user["username"]; ?>">VIEW PROFILE &nbsp;</a></span>
                     </div>
                  </div>
               </div>
     
             <?php  }
            }
            else
            { ?>
 <div class="col-md-12">
    <h2>No Result Found</h2>
 </div>
            <?php  }
            ?>
            </div>
<div class="row">
  <div class="col-md-4 col-md-offset-4">
    <?php echo @$links; ?>
  </div>
</div>

         </div>
       </div>
      </div>
   </div>
</section>