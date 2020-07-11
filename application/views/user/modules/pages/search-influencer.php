
			
			<div class="milestone-area">	
				<div class="container">
				<br>	
				<div class="row">	

						<div class="col-md-12">

							<ol class="breadcrumb menu-breadcrumb">

								<li><a href="http://digimonk.net/rodolfo//">Home</a> <i class="fa fa fa-chevron-right"></i></li>

								<li class="active">My Profile</li>        

							</ol>

						</div>

					</div>	
					<div class="row">	

						<div class="col-md-12">

							<h3 class="page-title">Search</h3>

						</div>

					</div>		
				</div>
			</div>
			<section class="" style="background:url(http://digimonk.net/rodolfo/assets/images/main-bg.jpg); background-size: cover; padding: 100px 0;">
				<div class="container search-form">

						<ul class="nav nav-pills nav-fill menu-tab navtop ">
					        <li class="nav-item active">
					            <a class="nav-link active" href="#menu1" data-toggle="tab">Search</a>
					        </li>
					        <li class="nav-item">
					            <a class="nav-link" href="#menu2" data-toggle="tab">Advance Search</a>
					        </li>
					       <!--  <li class="nav-item">
					            <a class="nav-link" href="#menu3" data-toggle="tab"></a>
					        </li> -->
					    </ul>
					    <div class="tab-content"style="background: none;">
					        <div class="tab-pane active" role="tabpanel" id="menu1">
					        	<div class="col-md-10 col-md-offset-1">
                                        <form method="post" action="<?php echo base_url(); ?>user/search/data_set_searck_button"> 
                                        <div class="input-group" id="adv-search" style="width: 95%; margin-left: 2%;">
                                        <input type="hidden" name="types" value="user" id="get_types">  
                                            <input type="text" class="form-control search-box mp_input" required="" name="quick_search_3" placeholder="Type a niche or keyword..." aria-autocomplete="list" aria-owns="mp_quick_search_list" autocomplete="off" role="combobox" aria-required="false"><ol class="mp_list" aria-atomic="true" aria-busy="false" aria-live="polite" id="mp_quick_search_list" role="listbox" style="display: none;"></ol>
                                            <div class="input-group-btn">
                                                <div class="btn-group" role="group">
                                                    <div class="dropdown dropdown-lg">
                                                        
                                                    </div>
                                                    <button type="submit" class="btn btn-primary search-btn"><span class="" aria-hidden="true">SEARCH</span></button>
                                                </div>
                                            </div>
                                         </div>
                                       </form>
                                    </div>
					        </div>
					        <div class="tab-pane" role="tabpanel" id="menu2">
                            <form action="<?php echo base_url(); ?>gigs/search_influencer_from_search_influecner/" method="post">    
					        	<div class="row">
					        		<div class="col-md-4">
                                        <div class="input-group" id="adv-search" style="width: 95%; margin-left: 2%;">
                                        <input type="hidden" name="types" value="user" id="get_types">  
                                          
 <select name="influencer"  class="form-control states_of_select_2">
                                                 <option value="">Select Influencer </option>
                                             <?php if(@$user_list) { foreach(@$user_list as $sta) { ?>                                      
                                             <option value="<?php echo @$sta["fullname"]; ?>"><?php echo @$sta["fullname"] ?></option>
                                                 <?php } } ?>                                                      
                                             
                                                                                                      
                                               
                                              </select>
                                          <!--   <input type="text" class="form-control search-box mp_input" required="" name="quick_search_3" placeholder="Search by Name" aria-autocomplete="list" aria-owns="mp_quick_search_list" autocomplete="off" role="combobox" aria-required="false"><ol class="mp_list" aria-atomic="true" aria-busy="false" aria-live="polite" id="mp_quick_search_list" role="listbox" style="display: none;">
                                                
                                            </ol> -->
                                           
                                         </div>
					        		</div>
                                 <div class="col-md-4">
                                     <div class="input-group" id="" style="width: 100%;">
  
                                              <select name="state_id_dsp_get_state"  class="form-control states_of_select_2" >
                                                 <option value="">Select State </option>
                                             <?php if(@$states) { foreach(@$states as $sta) { ?>                                      
                                             <option value="<?php echo @$sta["state_name"]; ?>"><?php echo @$sta["state_name"] ?></option>
                                                 <?php } } ?>                                                      
                                             
                                                                                                      
                                               
                                              </select>
                                       </div>
                                 </div>
                                 <div class="col-md-4">
                                     <div class="input-group">
                                           <input id="zipcode" type="text" class="form-control search-box mp_input" name="zipcode" placeholder="Zipcode">
                                            
                                       </div>
                                 </div>

					        		
					        	</div>
					        	<br>
					        	<div class="col-md-4 col-md-offset-4">
					        		<button class="btn-primary dynamic-button influ-btn" type="submit" style="color: #fff !important; ">SEARCH INFLUENCERS</button>
					        	</div>

</form>

					        </div>
					        <!-- <div class="tab-pane" role="tabpanel" id="menu3">Created By Cytus ۳</div> -->
					    </div>
				

				</div>
		    </section>
