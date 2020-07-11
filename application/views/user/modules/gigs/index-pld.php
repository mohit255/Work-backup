<section class="banner">
   <div class="swiper-container">
      <div class="swiper-wrapper">
         <?php if(@$danners) { 
            foreach ($danners as $data) {
            
             $cover_image='assets/uploads/default/banner2.jpg';
             if(@$data["cover_image"])
             {
                $cover_image="assets/uploads/".@$data["cover_image"];
             }
             ?>
         <div class="swiper-slide">
            <div class="HomeBlock-image">
               <a href="<?php echo strtolower(@$data["types"]); ?>/<?php echo @$data["user_id"]; ?>/<?php echo implode("-", explode(" ", @$data["fullname"])); ?>"><img src="<?php echo @$cover_image; ?>" class="img-responsive" style="width: 100%;"></a>
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
<div class="s-featured-navbar">
   <div class="container">
      <div class="quick-locations-menu" style="text-transform: uppercase; text-align: center;">
         <ul>
            <?php if(@$get_all_popular_city) { foreach ($get_all_popular_city as $city) { ?>
            <li>
               <a href="search/index/0/<?php echo implode("__", explode("/",implode("_", explode(" ", @$city["city"])))) ; ?>/all/all/all/all/all/all/all/all/all/all/all/all/all/all"><?php echo @$city["city"]; ?></a>
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
                                    <input name="loation" type="text" id="" class="form-control saale-tum-pe-ek-js-nhi-lg-hri-he" placeholder="Search by location">
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
                                 <a href="#demo" class="cd-filter-trigger saale-tum-pe-ek-js-nhi-lg-hri-he collapsed" id="my_new_id_set" data-toggle="collapse" aria-expanded="false"><img src="assets/escort/dist/css/filter.svg" class="saale-tum-pe-ek-js-nhi-lg-hri-he"> &nbsp;&nbsp;More Search Option</a>
                              </div>
                           </div>
                           <div class="row saale-tum-pe-ek-js-nhi-lg-hri-he collapse" id="demo" aria-expanded="false" style="height: 0px;">
                              <div class="row js--filters saale-tum-pe-ek-js-nhi-lg-hri-he">
                                 <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <div class="advertiser-search__col-location form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Location</label>
                                       <span class="twitter-typeahead saale-tum-pe-ek-js-nhi-lg-hri-he" style="position: relative; display: inline-block; direction: ltr;">
                                          <input name="name" type="text" value="" id="" class="form-control tt-input saale-tum-pe-ek-js-nhi-lg-hri-he" placeholder="Search By Name" autocomplete="off" spellcheck="false" dir="auto" style="position: relative; vertical-align: top;">
                                          <pre aria-hidden="true" style="position: absolute; visibility: hidden; white-space: pre; font-family: Lato, Helvetica, Arial, sans-serif; font-size: 14px; font-style: normal; font-variant: normal; font-weight: 400; word-spacing: 0px; letter-spacing: 0px; text-indent: 0px; text-rendering: auto; text-transform: none;"></pre>
                                          <span class="tt-dropdown-menu" style="position: absolute; top: 100%; left: 0px; z-index: 100; display: none; right: auto;">
                                             <div class="tt-dataset-Name saale-tum-pe-ek-js-nhi-lg-hri-he"></div>
                                          </span>
                                       </span>
                                       <input type="hidden" name="" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he" value="7000">
                                    </div>
                                 </div>
                                 <div class="col-md-6 saale-tum-pe-ek-js-nhi-lg-hri-he hidden-xs hidden-sm">
                                    <div class="radio saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <ul id="" class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <li><input id="all" type="radio" name="type" value="Any" class="saale-tum-pe-ek-js-nhi-lg-hri-he" ><label for="all" class="saale-tum-pe-ek-js-nhi-lg-hri-he">All</label></li>
                                          <li><input id="Indian" type="radio" name="type" class="saale-tum-pe-ek-js-nhi-lg-hri-he"  value="Escort"><label for="Indian" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Independent</label></li>
                                          <li><input id="esta" class="saale-tum-pe-ek-js-nhi-lg-hri-he" type="radio" name="type"  value="Establishment"><label for="esta" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Establishment</label></li>
                                          <li><input id="agen" class="saale-tum-pe-ek-js-nhi-lg-hri-he" type="radio" name="type"  value="Agency"><label for="agen" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Agency</label></li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-3 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <div class="advertiser-search__col-inout-calls form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <ul class="listed-inputs-box saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <li class="checkbox saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <input id="incall" type="checkbox" name="call_type[]"  value="In-Call" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <label for="incall" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">In-Calls</label>
                                          </li>
                                          <li class="checkbox saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <input id="outcall" type="checkbox" name="call_type[]"  value="Out-Call" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
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
                                             <?php if(@$orienatation["value"]) {
                                                $set_orienatation=explode("*#*", @$orienatation["value"]);
                                                                                         for($i=0; $i<count($set_orienatation); $i++) {
                                                                $set_status="";
                                                                if($set_orienatation[$i]=="All")
                                                                {
                                                                   $set_status="checked=''";
                                                                }
                                                                                          ?>
                                             <li><input id="<?php echo $set_orienatation[$i]; ?>" <?php echo @$set_status; ?> type="radio" name="orienatation" value="<?php echo $set_orienatation[$i]; ?>" class="saale-tum-pe-ek-js-nhi-lg-hri-he" ><label for="<?php echo $set_orienatation[$i]; ?>" class="saale-tum-pe-ek-js-nhi-lg-hri-he"><?php echo $set_orienatation[$i]; ?></label></li>
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
                                                                                               for($i=0; $i<count($set_ethnicity); $i++) { ?>
                                                   <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                      <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="ethnicity[]" value="<?php echo $set_ethnicity[$i]; ?>" id="<?php echo $set_ethnicity[$i]; ?>">
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
                                                                                            for($i=0; $i<count($set_body_type); $i++) { ?>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="body_type[]" id="<?php echo $set_body_type[$i]; ?>" value="<?php echo $set_body_type[$i]; ?>">
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
                                                                                            for($i=0; $i<count($set_bust_size); $i++) { ?>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="bust_size[]" value="<?php echo $set_bust_size[$i]; ?>" id="<?php echo $set_bust_size[$i]; ?>">
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
                                                                                            for($i=0; $i<count($set_hayer); $i++) { ?>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="hayer[]" value="<?php echo $set_hayer[$i]; ?>" id="<?php echo $set_hayer[$i]; ?>">
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
                                                                                            for($i=0; $i<count($set_escort_for); $i++) { ?>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="escort_for[]" value="<?php echo $set_escort_for[$i]; ?>" id="<?php echo $set_escort_for[$i]; ?>">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="<?php echo $set_escort_for[$i]; ?>"><?php echo $set_escort_for[$i]; ?></label>
                                                   <?php } } ?>                                             
                                                </li>
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
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="rates" value="10-50" id="asian">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian">$10-$50</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="rates" value="50-70" id="asian_2">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_2">$50-$70</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="rates" value="70-100" id="asian_3">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_3">$70-$100</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="rates" value="100-" id="asian_4">
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
                                          <div class="panel-heading saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <h4 class="panel-title saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                <a data-toggle="collapse" data-parent="#accordion" class="saale-tum-pe-ek-js-nhi-lg-hri-he" href="#collapseseven"><span class="glyphicon glyphicon-folder-close saale-tum-pe-ek-js-nhi-lg-hri-he">
                                                </span> Age</a>
                                             </h4>
                                          </div>
                                          <div id="collapseseven" class="panel-collapse collapse saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <ul class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="age" value="10-12" id="asian_age">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_age">10-12</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="age" value="12-20" id="asian_2_age">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_2_age">12-20</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="age" value="20-25" id="asian_3_age">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_3_age">20-25</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="age" value="25-30" id="asian_4_age">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_4_age">25-30</label>
                                                </li>
                                                <li class="saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he">
                                                   <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="radio" name="age" value="30-" id="asian_5_age">
                                                   <label class="radio-label saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" for="asian_5_age">30-</label>
                                                </li>
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
                                             <input id="photo" type="checkbox" name="verified" value="Verified" class="saale-tum-pe-ek-js-nhi-lg-hri-he">
                                             <label for="photo" id="" class="saale-tum-pe-ek-js-nhi-lg-hri-he">Photos Verified Only</label>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                                 <div class="col-md-2">
                                    <div class="advertiser-search__col-gender form-group saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <label for="" class="control-label saale-tum-pe-ek-js-nhi-lg-hri-he">Gender</label>
                                       <select name="gender" id="" class="form-control saale-tum-pe-ek-js-nhi-lg-hri-he">
                                          <option value="All Genders">All Genders</option>
                                          <option value="Female">Female</option>
                                          <option value="Male">Male</option>
                                          <option value="Transexual/Transgender">Transexual/Transgender</option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-3 col-md-offset-1 saale-tum-pe-ek-js-nhi-lg-hri-he">
                                    <div class="advertiser-search__col-submit advertiser-search__col-submit--top saale-tum-pe-ek-js-nhi-lg-hri-he">
                                       <label class="label label-primary" for="available_data"> <input class="filter saale-tum-pe-ek-js-nhi-lg-hri-he ik-or-class-set-ki-he" data-filter="" type="checkbox" name="available" value="Available" id="available_data"> Available Now</label>
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
         <div class="swiper-slider">
            <div class="swiper-wrapper">
               <?php if(@$active_users) { 
                  foreach ($active_users as $data) {
             

$user_package_info=$this->db->query("select * from membership where id='".$data["package_id"]."'")->row_array();
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



                   $profile_image='assets/uploads/default/avatar-2.jpg';
                   if(@$data["user_thumb_image"])
                   {
                      $profile_image="assets/uploads/".@$data["user_thumb_image"];

                   }?>
               <div class="swiper-slide swipe-img">
                  <?php if(@$set_avelavel) { ?>
<div class="label label-available-now">Available Now</div>
                  <?php } ?>
                  
                  <div class="embed-container ratio-3-4">
                     <a href="<?php echo strtolower(@$data["types"]); ?>/<?php echo @$data["USERID"]; ?>/<?php echo implode("-", explode(" ", @$data["fullname"])); ?>"><img src='<?php echo @$profile_image; ?>' alt='<?php echo @@$data["fullname"]; ?>' class='img-responsive'></a>
                  </div>
                  <div class="carousel-item__item-details">
                     <div class='featured-sash'></div>
                     <span class='verified-label'>Photos <?php echo @$photo_varified_status; ?></span>
                   
                  </div>
               </div>
               <?php } } ?>
               <!-- <div class="swiper-slide">Slide 9</div>
                  <div class="swiper-slide">Slide 10</div> -->
            </div>
            <!-- Add Pagination -->
            <!--   <div class="swiper-pagination"></div> -->
         </div>
      </div>
   </div>
</section>
<section class="popular_escorts">
   <div class="s-popular-escorts">
      <div class="container">
         <div class="results-title">
            <h2 class="results-title__title">Our Golden Girls</h2>
         </div>
         <div class="row">
            <?php
            var_dump(count($list));
               if(@$list) { 
               foreach ($list as $data) {
               var_dump($data["types"]);
               $profile_image='assets/uploads/default/avatar-2.jpg';
               if(@$data["user_thumb_image"])
               {
                  $profile_image="assets/uploads/".@$data["user_thumb_image"];
               }?>
            <?php if(@$data["types"]=="Escort") { 
               $escort_info=$this->db->query("select * from escort_info where escort_id='".@$data["USERID"]."'")->row_array();
               
               $package_info_get="";
                 if($escort_info["agency_id"])
                   {
               
                      $package_info=$this->db->query('select end_date_in_string from user_login where USERID="'.$escort_info["agency_id"].'" and end_date_in_string>="'.$corrent_date_in_string.'"');
                      // var_dump($this->db->last_query());
                    
                      $package_info_get=$package_info->row_array();
                   }
                   else
                   {
                       $package_info=$this->db->query('select end_date_in_string from user_login where USERID="'.@$data["USERID"].'" and end_date_in_string>="'.$corrent_date_in_string.'"');
                       // var_dump($this->db->last_query());
                         $package_info_get=$package_info->row_array();
                   }
                   
                   if(!$package_info_get)
                   {
                     // var_dump($package_info_get);
                     // var_dump($data["fullname"]);
                     continue;
                   }
                 
               
                   ?>
            <div class="col-md-3" style="">
               <div class="profile-image-cities escort">
                  <a class="favgirl do" data-escortid="8647" href="#"><i class="fa fa-heart" style="color: #fff;"></i></a>
                  <a href="<?php echo strtolower(@$data["types"]); ?>/<?php echo @$data["USERID"]; ?>/<?php echo implode("-", explode(" ", @$data["fullname"])); ?>">
                     <div class="profile-name"><?php  echo @$data["fullname"]; ?> <?php  echo @$data["USERID"]; ?></div>
                     <div class="profile-quickstats">
                        <div class="profile-quickstats--heading">Based in 
                           <span><?php if($escort_info["main_location"]) echo @$escort_info["main_location"]; else { echo ""; } ?></span>
                        </div>
                        <div class="profile-quickstats--details">
                           <div><span style="float:left;">Age:</span><span style="float:right;"><?php echo @$escort_info["age"]; ?>'s</span></div>
                           <div style="clear: both;"><span style="float:left;">Dress Size:</span><span style="float:right;"><?php echo @$escort_info["dress_size"]; ?></span></div>
                           <!-- <div style="clear: both;"><span style="float:left;">Price:</span><span style="float:right;">From $800 / 1h</span></div> -->
                           <div style="clear: both;"><span style="float:left;">Place of Service:</span><span style="float:right;"><?php echo @$escort_info["place_of_services"]; ?></span>
                           </div>
                           <div style="clear: both; opacity: 0"><span class="profile-quick-description">Penthouse Magazine Model Currently AWAY till 15th of SEPTEMBER</span></div>
                           <div style="clear: both;">
                              <table style="width: 100%;">
                                 <tbody>
                                    <?php 
                                       $escort_avelavel=$this->db->query("select * from escort_availability where escort_id='".@$data["USERID"]."' and packeg_finish_date_string>'".strtotime(date("d-M-Y"))."'")->row_array();
                                        $dates=explode("*#*", @$escort_avelavel["dates"]);
                                        $days=explode("*#*", @$escort_avelavel["days"]);
                                        $time=explode("*#*", @$escort_avelavel["time"]);
                                        $duration=explode("*#*", @$escort_avelavel["duration"]);
                                       
                                       
                                                                       for($i=0; $i<7; $i++) { 
                                       
                                                                      $get_new_date=date('d-M-Y', strtotime('+'.$i.' days', strtotime(date("d-M-Y"))));
                                                                        $dayname = date('D', strtotime('+'.$i.' days', strtotime(date("d-M-Y"))));
                                       
                                       
                                                                         $get_index=array_search($get_new_date,$dates);
                                                                         if(gettype($get_index)!='boolean')
                                                                         {
                                                                           
                                                                           $get_duration=$duration[$get_index];
                                                                         }
                                                                         else
                                                                         {
                                                                              $get_duration="";
                                                                         }
                                                                        
                                                                         
                                                                         if($get_duration)
                                                                         {
                                                                              if(@$get_duration=="All day" || @$get_duration=="By appointment")
                                                                              {
                                                                                 $set_time=@$get_duration;      
                                                                              }
                                                                              else
                                                                              {
                                                                                 $get_tine_new=explode("==", $time[$get_index]);
                                                                                 $set_time=$get_tine_new["0"]."  ".@$get_duration;
                                                                              }
                                                                         }
                                                                         else
                                                                         {
                                                                           $set_time="NULL  NULL";
                                                                         }
                                                                        
                                                                         if($set_time=="NULL  NULL")
                                                                         {
                                                                           $set_time="unavailable";
                                                                         }
                                       switch($dayname){
                                                    case 'Sun':
                                                         $day_name='Sunday';       
                                                        break;
                                                        case 'Mon':
                                                         $day_name='Monday';       
                                                        break;
                                                        case 'Tue':
                                                         $day_name='Tuesday';       
                                                        break;
                                                         case 'Wed':
                                                         $day_name='Wednesday';       
                                                        break;
                                                        case 'Thu':
                                                         $day_name='Thursday';       
                                                        break;
                                                        case 'Fri':
                                                         $day_name='Friday';       
                                                        break;
                                                        case 'Sat':
                                                         $day_name='Saturday';       
                                                        break;
                                                   
                                            }
                                            if($get_new_date==date("d-M-Y"))
                                            {
                                             $day_name="Today";
                                            }
                                           
                                                                         ?>
                                    <tr class="today">
                                       <td><?php echo @$day_name; ?></td>
                                       <td><?php echo @$set_time; ?></td>
                                    </tr>
                                    <?php } ?>                              
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                     <img width="100%" alt="<?php echo @$data["fullname"]; ?>" src="<?php echo @$profile_image; ?>" class="homepage-thumbnail img-responsive">
                  </a>
                  <div class="profile-quickstats--heading1" style="text-align: center;">Based in 
                     <span><?php if($escort_info["main_location"]) echo @$escort_info["main_location"]; else { echo ""; } ?></span>
                  </div>
               </div>
            </div>
            <?php } ?>
            <?php } } ?>
         </div>
         <div class="row">
            <div class="col-xs-12 text-center">
               <?php echo @$links; ?>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="popular-cities">
   <div class="s-page s-page--home">
      <div class="container">
         <div class="content-block">
            <h1 style="font-weight: normal;">
               Welcome to EscortOZ
            </h1>
            <div class="row">
               <div class="container">
                  <div class="col-md-12">
                     <p>Australia’s newest escort directory, where you can discover who your heart desires.</p>
                     <p>Use our detailed search bar to locate Escorts in your preferred area, you can also refine your search further to include  AGE, BUST, ETHNICITY, RATES and many more….<br />
                        <br />Our goal is to become largest and most trusted Escort directory in Australia. Our advertisers are experts at giving you the most memorable experience, their PASSION, BEAUTY and PERFECTION is the reason so many clients return time and time again. Whether you are looking for a romantic encounter or a passionate evening, you will not be disappointed with the selection of EscortOZ has to offer.  <br />
                        <br />
                        Relax… Unwind and immerse yourself in PARADISE.
                     </p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>