<?php 
$active =$this->uri->segment(2);
$active_2 = @$this->uri->segment(3);
 ?>
<div class="side-menu">
	<div class="sidebar-inner slimscrollleft">
		<div id="sidebar-menu">
			<ul>
				<li>
					<a href="<?php echo base_url().'admin'; ?>" class="<?php echo (empty ($active))? 'active':''; ?>"><i class="mdi mdi-view-dashboard"></i> <span>Dashboard</span></a>
				</li>

				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-book-multiple"></i> <span>Blog</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'footer_menu'|| $module == 'footer_submenu' ){?> style="display:block" <?php } ?>>                                    
						<li><a href="<?php echo base_url().'admin/blog/category'; ?>" class="<?php echo  ($active_2 =='category')? 'active':''; ?>">Category </a></li>
						<li><a href="<?php echo base_url().'admin/blog/our_blog';?>" class="<?php echo ($active_2 =='our_blog')? 'active':''; ?>">Our Blog</a></li>   
					</ul>
				</li>
	<!-- 			<li>
					<a href="<?php echo base_url().'admin/category'; ?>" class="<?php echo ($active == 'category')? 'active':''; ?>" ><i class="mdi mdi-buffer"></i> <span>Packages Category</span> </a>
				</li> -->
				<li>
					<a href="<?php echo base_url().'admin/category'; ?>" class="<?php echo ($active == 'category')? 'active':''; ?>" ><i class="mdi mdi-buffer"></i> <span>Packages Category</span> </a>
				</li>
				<!-- <li>
					<a href="<?php echo base_url().'admin/packages'; ?>" class="<?php echo ($active == 'gigs')? 'active':''; ?>"><i class="mdi mdi-cart"></i> <span>Packages</span> </a>
				</li> -->
				<li>
					<a href="<?php echo base_url().'admin/Membership'; ?>" class="<?php echo ($active == 'gigs')? 'active':''; ?>"><i class="mdi mdi-cart"></i> <span>Membership</span> </a>
				</li>
				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-cash"></i> <span>Withdrawal</span> <span class="menu-arrow"></span></a>
					<ul class="list-unstyled" <?php if($module == 'release_payments' || $module == 'completed_payments'){?> style="display:block" <?php } ?>> 
						<li><a href="<?php echo base_url().'admin/release_payments/'; ?>" class="<?php echo ($active =='release_payments')? 'active':''; ?>"> Incoming withdrawal</a></li>
						<li><a href="<?php echo base_url().'admin/completed_payments'; ?>" class="<?php echo ($active =='completed_payments')? 'active':''; ?>">Paid withdrawal</a></li>
					</ul>
				</li>
				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-cart"></i> <span>Orders</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'orders' || $module =='completed_orders' || $module =='pending_orders' || $module =='cancel_orders' || $module =='decline_orders'){?> style="display:block" <?php } ?>> 
						<li><a href="<?php echo base_url().'admin/orders'; ?>" class="<?php echo  ($active =='orders')? 'active':''; ?>" > Total Orders </a></li>
						 <li><a href="<?php echo base_url().'admin/completed_orders'; ?>" class="<?php echo  ($active =='completed_orders')? 'active':''; ?>">Completed Orders</a></li>
						 <li><a href="<?php echo base_url().'admin/pending_orders'; ?>"  class="<?php echo  ($active =='pending_orders')? 'active':''; ?>">Pending Orders</a></li>                                     
						 <li><a href="<?php echo base_url().'admin/cancel_orders'; ?>" class="<?php echo  ($active =='cancel_orders')? 'active':''; ?>">Cancelled Orders</a></li>                                     
						 <li><a href="<?php echo base_url().'admin/decline_orders'; ?>" class="<?php echo ($active =='decline_orders')? 'active':''; ?>">Declined Orders</a></li>    
						 <li><a href="<?php echo base_url().'admin/rejected_orders'; ?>" class="<?php echo ($active =='rejected_orders')? 'active':''; ?>">Rejected Orders</a></li>                                    
					</ul>
				</li>

				<?php $active_1 = $this->uri->segment(3);	 ?>
				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-settings"></i> <span>Settings</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'settings' || $module == 'seo_settings' ||  $module == 'policy_settings' || $module == 'profession'){?> style="display:block" <?php } ?>> 
						<li><a href="<?php echo base_url().'admin/settings'; ?>" class="<?php echo  ($active =='settings' && $active_1 !='smtp_config')? 'active':''; ?>"> General Settings </a></li>
						<li><a href="<?php echo base_url().'admin/emailsettings';?>" class="<?php echo ($active =='emailsettings')? 'active':''; ?>"> Email Settings </a></li> 
						<li><a href="<?php echo base_url().'admin/settings/smtp_config';?>" class="<?php echo ($active_1 =='smtp_config')? 'active':''; ?>"> Smtp Config </a></li>
						<li><a href="<?php echo base_url().'admin/policy_settings'; ?>" class="<?php echo  ($active =='policy_settings')? 'active':''; ?>"> Policy Settings </a></li>
						<li><a href="<?php echo base_url().'admin/profession'; ?>" class="<?php echo ($active =='profession')? 'active':''; ?>"> Profession </a></li>
						<?php if($this->session->userdata('id')!=2){ ?>
						<li><a href="<?php echo base_url().'admin/new_updates';?>" class="<?php echo ($active =='new_updates')? 'active':''; ?>"> Updates </a></li> 
						<?php } ?>

					</ul>
				</li>
				
				<li>
					<a href="<?php echo base_url().'admin/dashboard/terms'; ?>" class="<?php echo ($this->uri->segment(3)=='terms')? 'active':''; ?>"><i class="mdi mdi-view-dashboard"></i> <span>Terms</span></a>
				</li>
				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-cash-multiple"></i> <span>Payment Settings</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'paypal_settings'){?> style="display:block" <?php } ?>> 
						<li><a href="<?php echo base_url().'admin/paypal_settings'; ?>" class="<?php echo  ($active =='paypal_settings')? 'active':''; ?>"> Paypal </a></li>
						<li><a href="<?php echo base_url().'admin/payment_gateway'; ?>" class="<?php echo  ($active =='payment_gateway')? 'active':''; ?>"> Stripe Gateway </a></li>
					</ul>
				</li>
				<li>
					<a href="<?php echo base_url().'admin/emailtemplate'; ?>" class="<?php echo ($active == 'emailtemplate')? 'active':''; ?>" ><i class="mdi mdi-email"></i> <span>Email Template</span> </a>
				</li>




<?php $active_2 = $this->uri->segment(3);	 ?>
<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-account-multiple"></i><span>Users</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'paypal_settings'){?> style="display:block" <?php } ?>> 
						<li><a href="<?php echo base_url().'admin/user/index'; ?>" class="<?php echo ($active_2 =='user')? 'active':''; ?>"><i class="mdi mdi-account-multiple"></i> <span>Users</span> </a></li>

                        <li><a href="<?php echo base_url().'admin/user/business'; ?>" class="<?php echo ($active_2 =='business')? 'active':''; ?>"><i class="mdi mdi-account-multiple"></i> <span>Business</span> </a></li>

                       <li><a href="<?php echo base_url().'admin/user/influencer'; ?>" class="<?php echo ($active_2 =='influencer')? 'active':''; ?>"><i class="mdi mdi-account-multiple"></i> <span>Influencer</span> </a></li>


					</ul>
				</li>



				



				<li><a href="<?php echo base_url().'admin/review'; ?>" class="<?php echo ($active == 'review')? 'active':''; ?>"><i class="mdi mdi-star"></i> <span>Reviews</span> </a> </li>
				<li><a href="<?php echo base_url().'admin/client'; ?>" class="<?php echo ($active =='client')? 'active':''; ?>"><i class="mdi mdi-account"></i> <span>Our Clients</span> </a></li>
				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-book-multiple"></i> <span>Footer</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'footer_menu'|| $module == 'footer_submenu' ){?> style="display:block" <?php } ?>>                                    
						<li><a href="<?php echo base_url().'admin/footer_menu'; ?>" class="<?php echo  ($active =='footer_menu')? 'active':''; ?>"> Footer Widget </a></li>
						<li><a href="<?php echo base_url().'admin/footer_submenu';?>" class="<?php echo ($active =='footer_submenu')? 'active':''; ?>"> Footer Menu </a></li>   
					</ul>
				</li>
                <li>

					<a href="<?php echo base_url().'admin/enquiry'; ?>" class="<?php echo ($active == 'enquiry')? 'active':''; ?>"><i class="mdi mdi-cart"></i> <span>Enquiry &nbsp;&nbsp;<font id="show_new_enquerys"></font></span> </a>
				</li>

				<li class="has_sub">
					<a href="#" class=""><i class="mdi mdi-book-multiple"></i> <span>Help Center</span> <span class="menu-arrow"></span></a>
					<ul class="sub-menu" <?php if($module == 'footer_menu'|| $module == 'footer_submenu' ){?> style="display:block" <?php } ?>>                                    
						<li><a href="<?php echo base_url().'admin/help_center/category'; ?>" class="<?php echo  ($active_2 =='category')? 'active':''; ?>">Category </a></li>
						<li><a href="<?php echo base_url().'admin/help_center/content';?>" class="<?php echo ($active_2 =='content')? 'active':''; ?>">Content</a></li>   
					</ul>
				</li>
			</ul>
		</div>
	</div>
</div>