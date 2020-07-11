
<?php if(@$escrrt_of_city) { ?>
<section class="banner">
  <div class="swiper-container">
    <div class="swiper-wrapper">
      
       <?php if(@$escrrt_of_city) { 

        
$user_order_banner_1=[];
$user_order_banner_2=[];
$reat_set_banner=[];

foreach ($escrrt_of_city as $get_user) {
    if($get_user["user_addon_id"])
    {
      array_push($user_order_banner_1, $get_user);
    }
    else
    {

      // array_push($reat_set, $get_user["total_reating"]);
      array_push($user_order_banner_2, $get_user);
    }
}
// rsort($user_order_banner_2);
// var_dump($reat_set);
// arsort($user_order_2);
if($user_order_banner_1)
{
  $get_data_for_banners=$this->db->query("SELECT user_id as USERID FROM `user_addon` WHERE `user_id` IN (".implode(",",$user_order_banner_1).") ORDER BY `user_addon`.`id` ASC")->result_array();
}
else
{
  $get_data_for_banners=[];
}

// var_dump($this->db->last_query());

$user_order_banner=array_merge($get_data_for_banners,$user_order_banner_2);

          for($k=0; $k<count($user_order_banner); $k++) {


               $data=$this->db->query("select * from user_login where USERID='".$user_order_banner[$k]["USERID"]."'")->row_array();
            
             $cover_image='assets/uploads/default/banner2.jpg';
             if(@$data["cover_image"])
             {
                $cover_image="assets/uploads/".@$data["cover_image"];
             }
             ?>
      <div class="swiper-slide">
        <div class="HomeBlock-image">
        <a href="<?php echo strtolower(@$data["types"]); ?>/<?php echo @$data["USERID"]; ?>/<?php echo implode("-", explode(" ", @$data["fullname"])); ?>"><img src="<?php echo @$cover_image; ?>" class="img-responsive" style="width: 100%;"></a>
  </div>
  </div>
     
   <?php  }
            } ?>

      

    </div>
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-pagination"></div>
  </div>
</section>
<?php  } ?>
<div class="s-featured-navbar">
  <div class="container">
   <div class="quick-locations-menu" style="text-transform: uppercase; text-align: center;">
  <ul>
<?php if(@$get_all_popular_city) { foreach ($get_all_popular_city as $city) { ?>
     <li>
  <a href="<?php echo "search/index/0/".implode("__", explode("/",implode("_", explode(" ", @$city["city"]))))."/".$name_get_incript."/".$types_get_incript."/".$call_type_get_incript."/".$orienatation_get_incript."/".$ethnicity_get_incript."/".$body_type_get_incript."/".$bust_size_get_incript."/".$hayer_get_incript."/".$escort_for_get_incript."/".$rate_get_incript."/".$age_get_incript."/".$verified_get_incript."/".$gender_get_incript."/".$available_get_incript ?>"><?php echo @$city["city"]; ?></a>
</li> 
   <?php } } ?>
  </ul>
</div>
  </div>
</div>

<div class="s-listing-search s-listing-search--top">
  <div class="container">
    



<form action="user/search/add_filter" method="post">
<div class="s-listing-search s-listing-search--top">
   <div class="container">
      <div class="directory-search-module">
         <div id="advertiser-location-search-module" data-location-id="" data-postcode-id="">
            <div class="advertiser-search advertiser-search--basic saale-tum-pe-ek-js-nhi-lg-hri-he">
               <div class="form saale-tum-pe-ek-js-nhi-lg-hri-he" id="search-by-location" style="display: block;">
                  <div class="search-filters saale-tum-pe-ek-js-nhi-lg-hri-he">
                     <div style="position: relative">
                        <div class="row saale-tum-pe-ek-js-nhi-lg-hri-he">
                           <div class="col-md-5 saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="advertiser-search__col-location form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Location</label>
        <input name="loation" type="text" id="" class="form-control saale-tum-pe-ek-js-nhi-lg-hri-he" value="<?php if($location_get!='all') { echo @$location_get; }  ?>" placeholder="Search by location">
                                 <input type="hidden" name="" id="">
                              </div>
                           </div>
                           <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="advertiser-search__col-submit advertiser-search__col-submit--top saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="control-label label-placeholder saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                                 <input type="submit" name="" value="Search" id="" class="btn btn-primary directory-search-submit saale-tum-pe-ek-js-nhi-lg-hri-he">
                              </div>
                           </div>
                           <!-- <div class="col-md-2 saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="advertiser-search__col-toggle saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="control-label label-placeholder saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                                 <a href="javascript:void(0)" class="btn btn-default btn-block saale-tum-pe-ek-js-nhi-lg-hri-he" id="switch-search-to-username">Search by Name</a>
                              </div>
                           </div> -->
                           <div class="col-md-2 saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <a href="#demo" class="cd-filter-trigger saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" id="my_new_id_set" data-toggle="collapse" aria-expanded="false"><img src="assets/escort/dist/css/filter.svg" class="saale-tum-pe-ek-js-nhi-lg-hri-he"> &nbsp;&nbsp;Advanced Search Option</a>
                           </div>
                        </div>
                        <div class="row saale-tum-pe-ek-js-nhi-lg-hri-he collapse" id="demo" aria-expanded="false" style="height: 0px;">
                           <div class="row js--filters saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="advertiser-search__col-location form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Location</label>
                                    <span class="twitter-typeahead saale-tum-pe-ek-js-nhi-lg-hri-he" style="position: relative; display: inline-block; direction: ltr;">


        <input name="name" type="text" value="<?php if($name_get!='all') { echo @$name_get; } ?>" id="" class="form-control tt-input saale-tum-pe-ek-js-nhi-lg-hri-he" placeholder="Search By Name" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                                       <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                                       <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                                          <div class="tt-dataset-Name saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                                       </span>
                                    </span>
                                    <input type="hidden" name="" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he" value="7000">
                                 </div>
                              </div>
                              <div class="col-md-6 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="radio saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <ul id="" class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <li><input id="all" type="radio" name="type" value="Any" class="saale-tum-pe-ek-js-nhi-lg-hri-he" <?php if($types_get=="Any"){ echo 'checked="checked"'; } ?>><label for="all" class="saale-tum-pe-ek-js-nhi-lg-hri-he">All</label></li>
                                       <li><input id="Indian" type="radio" name="type" class="saale-tum-pe-ek-js-nhi-lg-hri-he" <?php if($types_get=="Escort"){ echo 'checked="checked"'; } ?> value="Escort"><label for="Indian" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Independent</label></li>
                                       <li><input id="esta" class="saale-tum-pe-ek-js-nhi-lg-hri-he" type="radio" name="type" <?php if($types_get=="Establishment"){ echo 'checked="checked"'; } ?> value="Establishment"><label for="esta" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Establishment</label></li>
                                       <li><input id="agen" class="saale-tum-pe-ek-js-nhi-lg-hri-he" type="radio" name="type" <?php if($types_get=="Agency"){ echo 'checked="checked"'; } ?> value="Agency"><label for="agen" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Agency</label></li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="advertiser-search__col-inout-calls form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <ul class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <li class="checkbox saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <input id="incall" type="checkbox" name="call_type[]" <?php if($call_type_get!='all' || in_array("In-Call",$call_type_get)) { echo 'checked="checked"'; } ?> value="In-Call" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <label for="incall" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">In-Calls</label>
                                       </li>
                                       <li class="checkbox saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <input id="outcall" type="checkbox" name="call_type[]" <?php if(in_array("Out-Call",$call_type_get)) { echo 'checked="checked"'; } ?> value="Out-Call" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <label for="outcall" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Out-Calls</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <button type="button" class="btn btn-link btn-clear-adv-filters js--clear-all-filters hide saale-tum-pe-ek-js-nhi-lg-hri-he">Clear selected filters</button>
                           </div>
                           <div class="row saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="col-md-6 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="advertiser-search__col-services form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <span class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Services</span>
                                    <div class="radio saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <ul id="" class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
 



 
                                        <?php 
                                        
                                        // var_dump($orienatation_get);
                                        
                                        if(@$orienatation["value"]) {
$set_orienatation=explode("*#*", @$orienatation["value"]);
                                         for($i=0; $i<count($set_orienatation); $i++) { 
                                         
                                         $set_status='';
                                          if($set_orienatation[$i]==$orienatation_get){ $set_status='checked="checked"'; } 
                                         ?>
                    <li><input id="<?php echo $set_orienatation[$i]; ?>" <?php echo $set_status; ?> type="radio" name="orienatation" value="<?php echo $set_orienatation[$i]; ?>" class="saale-tum-pe-ek-js-nhi-lg-hri-he" ><label for="<?php echo $set_orienatation[$i]; ?>" class="saale-tum-pe-ek-js-nhi-lg-hri-he"><?php echo $set_orienatation[$i]; ?></label></li>
<?php } } ?>

                                       
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-md-6 col-xs-12 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="col-md-6 col-xs-12 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapseOne" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Ethnicity</a>
                                                   </h4>
                                               </div>
                                               <div id="collapseOne" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse" aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">

    <?php if(@$ethnicity["value"]) {
$set_ethnicity=explode("*#*", @$ethnicity["value"]);
                                         for($i=0; $i<count($set_ethnicity); $i++) { 
                                           $set_status="";
                                           if(in_array($set_ethnicity[$i],$ethnicity_get))
                                           {
                                               $set_status='checked="checked"';
                                           }
                                         ?>

                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                       <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" <?php echo $set_status; ?> name="ethnicity[]" value="<?php echo $set_ethnicity[$i]; ?>" id="<?php echo $set_ethnicity[$i]; ?>">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_ethnicity[$i]; ?>"><?php echo $set_ethnicity[$i]; ?></label>
                                                      </li>
<?php } } ?>


                                                      
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>

                                 </div>
                                 <div class="col-md-6 col-xs-12 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                      <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapsetwo" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Body Type</a>
                                                   </h4>
                                               </div>
                                               <div id="collapsetwo" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse" aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">

                                                        <?php if(@$body_type["value"]) {
$set_body_type=explode("*#*", @$body_type["value"]);
                                         for($i=0; $i<count($set_body_type); $i++) {
                                         
                                         $set_status="";
                                           if(in_array($set_body_type[$i],$body_type_get))
                                           {
                                               $set_status='checked="checked"';
                                           }
                                         ?>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
  <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php echo $set_status; ?> type="checkbox" name="body_type[]" id="<?php echo $set_body_type[$i]; ?>" value="<?php echo $set_body_type[$i]; ?>">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_body_type[$i]; ?>"><?php echo $set_body_type[$i]; ?></label>
                                                      </li>
                                                      <?php } } ?>

                                                      
                                               </div>
                                           </div>                
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-md-12 saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                  <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapsethree" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Bust Size</a>
                                                   </h4>
                                               </div>
                                               <div id="collapsethree" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse" aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                      
 <?php if(@$bust_size["value"]) {
$set_bust_size=explode("*#*", @$bust_size["value"]);
                                         for($i=0; $i<count($set_bust_size); $i++) { 
                                         
                                          $set_status="";
                                           if(in_array($set_bust_size[$i],$bust_size_get))
                                           {
                                               $set_status='checked="checked"';
                                           }
                                         
                                         ?>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
<input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php echo @$set_status; ?> type="checkbox" name="bust_size[]" value="<?php echo $set_bust_size[$i]; ?>" id="<?php echo $set_bust_size[$i]; ?>">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_bust_size[$i]; ?>"><?php echo $set_bust_size[$i]; ?></label>
                                                      </li>
                                    <?php } } ?>                  
                                                    
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>
                              </div>
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapsefour" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Hair Style</a>
                                                   </h4>
                                               </div>
                                               <div id="collapsefour" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse " aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he ">
                                                     
 <?php if(@$hayer["value"]) {
$set_hayer=explode("*#*", @$hayer["value"]);
                                         for($i=0; $i<count($set_hayer); $i++) {
                                         
                                          $set_status="";
                                           if(in_array($set_hayer[$i],$hayer_get))
                                           {
                                               $set_status='checked="checked"';
                                           }
                                         
                                         ?>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
<input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php echo @$set_status; ?> type="checkbox" name="hayer[]" value="<?php echo $set_hayer[$i]; ?>" id="<?php echo $set_hayer[$i]; ?>">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_hayer[$i]; ?>"><?php echo $set_hayer[$i]; ?></label>
                                                      </li>
<?php } } ?> 

                                                     
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>
                              </div>
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapsefive" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Escort For</a>
                                                   </h4>
                                               </div>
                                               <div id="collapsefive" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse" aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                    

 <?php if(@$escort_for["value"]) {
$set_escort_for=explode("*#*", @$escort_for["value"]);
                                         for($i=0; $i<count($set_escort_for); $i++) { 
                                         $set_status="";
                                           if(in_array($set_escort_for[$i],$escort_for_get))
                                           {
                                               $set_status='checked="checked"';
                                           }
                                         
                                         ?>
                                                     <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
<input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php echo @$set_status; ?> type="checkbox" name="escort_for[]" value="<?php echo $set_escort_for[$i]; ?>" id="<?php echo $set_escort_for[$i]; ?>">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_escort_for[$i]; ?>"><?php echo $set_escort_for[$i]; ?></label>
          <?php } } ?>                                             </li>


                                                    
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>
                              </div>
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                   <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" href="#collapsesix" aria-expanded="false"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span> Rates From</a>
                                                   </h4>
                                               </div>
                                               <div id="collapsesix" class="panel-collapse saale-tum-pe-ek-js-nhi-lg-hri-he collapse" aria-expanded="false" style="height: 0px;">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($rate_get=="all"){ echo 'checked="checked"'; } ?> type="radio" name="rates" value="all" id="asian_all">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_all">All</label>
                                                      </li>

                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($rate_get=="10-50"){ echo 'checked="checked"'; } ?> type="radio" name="rates" value="10-50" id="asian">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian">$10-$50</label>
                                                      </li>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($rate_get=="50-70"){ echo 'checked="checked"'; } ?> type="radio" name="rates" value="50-70" id="asian_2">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_2">$50-$70</label>
                                                      </li>
                                                        <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($rate_get=="70-100"){ echo 'checked="checked"'; } ?> type="radio" name="rates" value="70-100" id="asian_3">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_3">$70-$100</label>
                                                      </li>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($rate_get=="100-"){ echo 'checked="checked"'; } ?> type="radio" name="rates" value="100-" id="asian_4">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_4">$100-</label>
                                                      </li>
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>
                              </div>
                           </div>
                           <div class="col-md-12 age saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="panel-group" id="accordion">
                                           <div class="panel panel-default saale-tum-pe-ek-js-nhi-lg-hri-he">
                                              
<?php 

   $age_filter=$this->db->query("select * from dropdown where name='dropdown8'")->row_array();
                                        ?>    
                                               <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he" href="#collapseseven"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                       </span><?php echo @$age_filter["title"]; ?></a>
                                                   </h4>
                                               </div>
                                               <div id="collapseseven" class="panel-collapse collapse saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                   <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                  <?php 
$age_filter_array=explode("*#*", @$age_filter["value"]);
?> 
<?php for($i=0; $i<count($age_filter_array); $i++) { 

  $set_status="";
if(@$age_filter_array[$i]==$age_get)
{

$set_status='checked="checked"';  

}

  $set_icon_value_for_last_value=$age_filter_array[$i];
if(($i+1)==count($age_filter_array))
{

  $set_icon_value_for_last_value_demo=explode("-",$age_filter_array[$i]);
  $set_icon_value_for_last_value=$set_icon_value_for_last_value_demo["0"]."+";
}
?>
<li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
<input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php echo $set_status; ?> type="radio" name="<?php echo strtolower(@$age_filter["title"]);  ?>" value="<?php echo strtolower(@$age_filter_array[$i]);  ?>" id="asian_age_<?php echo @$i; ?>">
<label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_age_<?php echo @$i; ?>"><?php echo @$set_icon_value_for_last_value;  ?></label>
                                                      </li>
<?php } ?>                                                      
                                                     <!-- <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($age_get=="10-12"){ echo 'checked="checked"'; } ?> type="radio" name="age" value="10-12" id="asian_age_2">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_age_2">10-12</label>
                                                      </li>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($age_get=="12-20"){ echo 'checked="checked"'; } ?> type="radio" name="age" value="12-20" id="asian_2_age">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_2_age">12-20</label>
                                                      </li>
                                                        <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($age_get=="20-25"){ echo 'checked="checked"'; } ?> type="radio" name="age" value="20-25" id="asian_3_age">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_3_age">20-25</label>
                                                      </li>
                                                      <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($age_get=="25-30"){ echo 'checked="checked"'; } ?> type="radio" name="age" value="25-30" id="asian_4_age">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_4_age">25-30</label>
                                                      </li>
                                                       <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                         <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" <?php if($age_get=="30-"){ echo 'checked="checked"'; } ?> type="radio" name="age" value="30-" id="asian_5_age">
                                                         <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_5_age">30-</label>
                                                      </li> -->
                                                   </ul>
                                               </div>
                                           </div>                
                                    </div>
                              </div>
                              <div class="col-md-3">
                                 <div class="advertiser-search__col-verified form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <label for="exampleInputEmail1" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Filters</label>
                                    <ul class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <li class="checkbox saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <input id="photo" type="checkbox" name="verified" <?php if($verified_get=="Verified"){ echo 'checked="checked"'; } ?> value="Verified" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <label for="photo" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Photos Verified Only</label>
                                       </li>
                                    </ul>
                                 </div>
                              </div>
                              <div class="col-md-2">
                                 <div class="advertiser-search__col-gender form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Gender</label>
                        <?php $gender_array=['All Genders','Female','Male','Transexual/Transgender']; ?>            
                                    <select name="gender" id="" class="form-control saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <?php for($i=0; $i<count(@$gender_array); $i++) { 
                                       $set_sta='';
                                       if(@$gender_array[$i]==@$gender_get)
                                       {
                                         $set_sta='selected=""';    
                                       }
                                    ?>
                                       <option value="<?php echo @$gender_array[$i]; ?>" <?php echo @$set_sta; ?>><?php echo @$gender_array[$i]; ?></option>
                                       <?php } ?>
                                       
                                    </select>
                                 </div>
                              </div>
                              <div class="col-md-3 col-md-offset-1 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 

                                 <div class="advertiser-search__col-submit advertiser-search__col-submit--top saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <label class="label label-primary" for="available_data"> <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="available"<?php if($available_get=="Available"){ echo 'checked="checked"'; } ?> value="Available" id="available_data"> Available Now</label>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="advertiser-username-search saale-tum-pe-ek-js-nhi-lg-hri-he">
                  <div id="searchByUsername" class="form saale-tum-pe-ek-js-nhi-lg-hri-he" onkeypress="javascript:return WebForm_FireDefaultButton(event, 'p_lt_ctl09_pageplaceholder_p_lt_ctl01_HomepageLocationSearch_SearchByUsernameControl_btnFindByName')" style="display: none">
                     <div class="search-filters saale-tum-pe-ek-js-nhi-lg-hri-he">
                        <div class="row saale-tum-pe-ek-js-nhi-lg-hri-he">
                           <div class="advertiser-search__col-username form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Username</label>
                              <input name="" type="text" id="" class="form-control saale-tum-pe-ek-js-nhi-lg-hri-he" placeholder="Enter username">
                           </div>
                           <div class="advertiser-search__col-submit advertiser-search__col-submit--top saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="control-label label-placeholder saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                              <input type="submit" name="" value="Find Escort" id="" class="btn btn-primary directory-search-submit saale-tum-pe-ek-js-nhi-lg-hri-he">
                           </div>
                           <div class="advertiser-search__col-toggle saale-tum-pe-ek-js-nhi-lg-hri-he">
                              <div class="control-label label-placeholder saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                              <div id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <a href="javascript:void(0)" class="btn btn-default btn-block saale-tum-pe-ek-js-nhi-lg-hri-he" id="switch-search-to-location">Search by Suburb</a>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <input type="hidden" name="" id="" value="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                  <input type="hidden" name="" id="" value="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
  </form>



<section class="letest_escorts">
<div class="s-results-header">
  <div class="container">
    <div class="results-title">
<?php if(@$active_users) {  ?>
  <h1 class="results-title__title" style="font-weight: normal;">Escorts Available Now</h1>
<?php } ?>

</div>
 <div class="swiper-slider swiper-container-horizontal">
    <div class="swiper-wrapper" style="transform: translate3d(-1872px, 0px, 0px); transition-duration: 0ms;">
       

   


<?php if(@$active_users) { foreach($active_users as $escort) {

 $package_name=$this->db->query("select name from  membership where id='".$escort["package_id"]."'")->row_array();
  if($package_name["name"]=='Silver')
  {
   continue;
  }

 $user_profile="assets/uploads/default/avatar-2.jpg";
   if(@$escort["user_thumb_image"])
   {
     $user_profile="assets/uploads/".@$escort["user_thumb_image"];
   }


$user_package_info=$this->db->query("select * from membership where id='".$escort["package_id"]."'")->row_array();
$package_benifits=explode("*#*", $user_package_info["benifits"]);
$package_values=explode("*#*", $user_package_info["values"]);

if($package_values[array_search("Photo verfication", $package_benifits)]=="Yes")
{
   $photo_varified_status="Verified";
}
else
{
    $photo_varified_status="Unverified";
}

if($package_values[array_search("Available Now", $package_benifits)]=="Yes")
{
   $set_avelavel="Available Now";
}
else
{
    $set_avelavel="";
}
   
 ?>
      <div class="swiper-slide swipe-img" data-swiper-slide-index="9" style="width: 204px; margin-right: 30px;">
        
 <?php if(@$set_avelavel) { ?>
<div class="label label-available-now">Available Now</div>
                  <?php } else { ?>
    <div class="label label-not-available-now">Not Available</div>
  <?php } ?>
    <div class="embed-container ratio-3-4">
     <a href="<?php echo strtolower(@$escort["types"]); ?>/<?php echo @$escort["USERID"]; ?>/<?php echo implode("-", explode(" ", @$escort["fullname"])); ?>"> <img src="<?php echo $user_profile; ?>" alt="<?php echo @$escort["fullname"]; ?>" class="img-responsive"></a>
    </div>
    
    <div class="carousel-item__item-details">
      
      <!-- <div class="featured-sash"></div> -->
      
      <span class="verified-label">Photos <?php echo @$photo_varified_status; ?></span>
    </div>
</div>
<?php } } ?>
</div>
    <!-- Add Pagination -->
<!--   <div class="swiper-pagination"></div> -->
  <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>

  </div>
</div>
</section>

<section class="search" style="background-color: #000;">
 <div class="container">
    <div class="results-title">
        <h1 class="results-title__title" style="font-weight: lighter;"><?php if($location_get!='all') { echo @$location_get." Escort"; } else { echo 'Female Escorts and Adult Services'; }  ?></h1> 
        <p> <?php  if(@$total_row) { echo @$total_row." result found"; } ?> </p><!-- <?php var_dump(@$total_row); ?> --> 
     </div>
      <div class="row">
  

<?php if(@$list) {  foreach ($list as $user) {
   

   $user_profile="assets/uploads/default/avatar-2.jpg";
   if(@$user["user_thumb_image"])
   {
     $user_profile="assets/uploads/".@$user["user_thumb_image"];
   }
$escort_info=$this->db->query("select * from escort_info where escort_id='".@$user["USERID"]."'")->row_array();
 ?>
  <div class="col-md-3" style="">
     <div class="profile-image-cities escort">
        <a class="favgirl do" data-escortid="8647" href="#"><i class="heart-empty-icon"></i></a>
        <a href="<?php echo strtolower(@$user["types"]); ?>/<?php echo @$user["USERID"]; ?>/<?php echo implode("-", explode(" ", @$user["fullname"])); ?>">
        <div class="profile-name"><?php echo $user["fullname"]; ?> </div>
        <div class="profile-quickstats">
                            <div class="profile-quickstats--heading">Based in 
                    <span><?php if($escort_info["main_location"]) echo @$escort_info["main_location"]; else { echo "Sydney"; } ?></span>
                </div>
              <div class="profile-quickstats--details">
                <div class="profile-quickstats--heading"><?php echo @$user["types"]; ?>
                </div>
                <div><span style="float:left;">Age:</span><span style="float:right;"><?php echo @$user["age"]; ?>'s</span></div>
                <div style="clear: both;"><span style="float:left;">Dress Size:</span><span style="float:right;"><?php echo @$escort_info["dress_size"]; ?></span></div>
                <div style="clear: both;"><span style="float:left;">Price:</span><span style="float:right;">From <?php echo "$".@$user["price"]; ?> / 1h</span></div>
                <div style="clear: both;"><span style="float:left;">Place of Service:</span><span style="float:right;"><?php echo @$escort_info["place_of_services"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Bust:</span><span style="float:right;"<?php echo @$escort_info["bust_size"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Height:</span><span style="float:right;"><?php echo @$escort_info["height"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Eye colour:</span><span style="float:right;"><?php echo @$escort_info["eye_color"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Hair colour:</span><span style="float:right;"><?php echo @$escort_info["hair_style"]; ?></span>
                </div>
                <div style="clear: both;"><span style="float:left;">Body type:</span><span style="float:right;"><?php echo @$escort_info["body_type"]; ?></span>
                </div>
                                    <div style="clear: both; opacity: 0;"><span class="profile-quick-description">Penthouse Magazine Model Currently AWAY till 15th of SEPTEMBER</span></div>
                                            <div style="clear: both;">
                            
                     </div>
                                              
                </div>
        </div>

                    <img width="100%" alt="Sydney independent private escort - Tori Cummings" src="<?php echo @$user_profile; ?>" class="homepage-thumbnail img-responsive">
            </a>
</div> 
  </div>
<?php } } else { ?>

<div class="col-md-12">
  <h1>No Result Found.</h1>
</div>

<?php } ?>
  
  </div>
  <div class="row">
    <div class="col-md-6 col-md-offset-3 text-center">
 <?php echo @$links; ?>
     </div>
  </div>
 </div>
</section>