<?php 
class Gigs_model extends CI_Model{
	
public function get_all_active_users()
{
   // return $this->db->query("select * from user_login where status='0' and verified='0' and types='Escort' and login_status='Login' and package_id!=''")->result_array();
   return $this->db->query("select * from user_login where status='0' and verified='0' and types='Escort' and login_status='Login' and package_id!='' ORDER BY available_till DESC")->result_array();
}    

public function get_banner_image($timeto_string,$addon_value)
{
// var_dump($addon_value);
  
  $count=$this->db->query("select count(a.USERID) as USERID from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ( (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$timeto_string." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!='')")->row_array();
  // var_dump($this->db->last_query());
  // var_dump($addon_value);
     if($count["USERID"]<$addon_value)
    {
       $data=$this->db->query("select a.USERID,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$timeto_string." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41 ORDER BY user_addon.id DESC) as user_addon_id,(select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID ORDER BY sum(feedback.rating) ASC) as total_reating from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ((select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID)!='' or (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$timeto_string." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!='') ")->result_array();

   // var_dump($this->db->last_query());
    }
    else
    {
         $data=$this->db->query("select a.USERID ,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$timeto_string." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41) as user_addon_id from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$timeto_string." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!=''")->result_array();
    }
      // var_dump($this->db->last_query());

  return $data;
}

public function get_all_dropdown()
{
  return $this->db->query("select * from dropdown")->result_array();
}

public function get_all_popular_city()
{
  $data=$this->db->query("select * from location where popular_city='0'");
  if($data)
  {
    return $data->result_array();
  }
  else
  {
    return false;
  }
}

public function get_all_users($start,$end,$check_limit,$time_to_string2)
{
    $str_to_time=strtotime(date("d-m-Y"));

  $count=$this->db->query("select count(a.USERID) as USERID from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ( (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32)!='')")->row_array();

    if($count["USERID"]<$check_limit)
    {
         $count=$this->db->query("select count(a.USERID) as USERID from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ((select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID)!='' or (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32)!='')")->row_array();
   
  $data=$this->db->query("select a.USERID,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32) as user_addon_id,(select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID ORDER BY sum(feedback.rating) DESC) as total_reating from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ((select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID)!='' or (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32)!='') LIMIT $start , $end")->result_array();
    }
    else
    {
        $count["USERID"]=$check_limit;
        $data=$this->db->query("select a.USERID ,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32) as user_addon_id from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$time_to_string2." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=32)!='' LIMIT $start , $end")->result_array();
        // var_dump($this->db->last_query());
    }


  
  // var_dump($this->db->last_query());
  $res_set["data"]=$data;
          $res_set["count"]=$count;
          return $res_set;
}


public function get_agency_id($id)
{
   return $this->db->query("select agency_id from escort_info where escort_id='".$id."'")->row_array();
}

public function get_user_info($id)
{
  return $this->db->query("select * from user_login where USERID='".$id."'")->row_array();
}

public function get_all_services_of_price_table($type)
{
  $data=$this->db->query("SELECT * FROM service_dropdown WHERE types LIKE '%".$type."%' or types='*'")->result_array();
  return $data;
}



public function get_all_addon()
{
  $data=$this->db->query("SELECT * FROM `membership` WHERE   `status` = '0' AND types='Addon'")->result_array();
  return $data;
}


public function get_all_mambership($type)
{
  $data=$this->db->query("SELECT * FROM `membership` WHERE types='Membership' and  `package_for` = '".$type."' AND `status` = '0'")->result_array();
  return $data;
}


public function find_data_item_by_help($data)
{
     $res1=$this->db->query("select * from help_center_content where status='0' and name LIKE '%".$data."%' and status='0' ");
   // var_dump($this->db->last_query());
  $res=$res1->result();
             return $res;
}

 public function my_revidws($user_id)
 {
     // $data=$this->db->query("SELECT  feedback.*,members.fullname,members.user_thumb_image,members.username,sell_gigs.title FROM `feedback`
     //                                INNER JOIN members ON members.USERID = feedback.`from_user_id`
     //                                INNER JOIN sell_gigs ON sell_gigs.id = feedback.`gig_id` where feedback.to_user_id='".$user_id."'
     //                                ORDER BY feedback.id DESC"); 
    $data=$this->db->query("select a.*,(select members.fullname from members where members.USERID=a.from_user_id) as fullname,(select members.user_thumb_image from members where members.USERID=a.from_user_id) as user_thumb_image,(select members.username from members where members.USERID=a.from_user_id) as username,(select sell_gigs.title from sell_gigs where sell_gigs.id=a.gig_id) as title from feedback as a where a.to_user_id='".@$user_id."'ORDER BY a.id DESC");
    // var_dump($this->db->last_query());
    $data2=$data->result_array();
    return $data2; 
 }   

public function get_reviews(){
    // $data=$this->db->query("SELECT  feedback.*,members.fullname,sell_gigs.title FROM `feedback`
    //                                 INNER JOIN members ON members.USERID = feedback.`from_user_id`
    //                                 INNER JOIN sell_gigs ON sell_gigs.id = feedback.`gig_id`
    //                                 ORDER BY feedback.id DESC limit 3");
    // $data2=$data->result_array();
    return false;
}    
public function get_usernameby_id_for_search_dsp($id)
{
    return $this->db->query("select username from members where USERID='".$id."'")->row_array();
}    
public function get_data_search_dsp($id)
{
    return $this->db->query("select * from  crasol where id='".$id."'")->row_array();
}
public function find_data_item_by_keywords($data)
{
   $res1=$this->db->query("select * from crasol where type !='user' and type!='package' and item_name LIKE '%".$data."%' and status='0' ");
   // var_dump($this->db->last_query());
  $res=$res1->result();
             return $res;
}


public function find_data_item_by_keywords_influencer($data)
{
   $res1=$this->db->query("select * from crasol where type ='user' and item_name LIKE '%".$data."%' and status='0' ");
   // var_dump($this->db->last_query());
  $res=$res1->result();
             return $res;
}


public function find_data_item_by_keywords_category_only($data)
{
    $res1=$this->db->query("select * from crasol where type ='categories' and item_name LIKE '%".$data."%' and status='0' ");
   // var_dump($this->db->last_query());
  $res=$res1->result();
             return $res;
}

public function get_category()
{

     $data=$this->db->query("SELECT CATID,name,category_image FROM `categories` WHERE `status` = 0 ORDER BY `categories`.`name` ASC");
     $result = $data->result_array();
        return $result; 
}

public function get_feature_influencer()
{
     $data=$this->db->query("SELECT a.USERID,a.username,a.user_thumb_image,a.user_profile_image,a.fullname,a.rating,a.ratingcount,a.profileviews,a.profilepicture FROM members as a WHERE a.feature_user='Yes'");
     $result = $data->result_array();
        return $result; 
}


public function get_admin_commision()
{
    $data=$this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'admin_commision'");
     $result = $data->row_array();
     // var_dump($result);
        return $result;
}


public function my_gigs_all($user_id)
{
    $count=$this->db->query("select count(id) as count_id from sell_gigs where user_id='".$user_id."'");
     $result = $count->row_array();
        return $result; 
}
public function get_user_id($username)
{
    $data=$this->db->query("select USERID from members where username='".$username."'");
    $result = $data->row_array();
        return $result; 
}

	public function all_profession()
	{
		$query = $this->db->query(" SELECT * FROM  `profession` WHERE status = 0 ");
		$result = $query->result_array();
		return $result;		
	}
	
   
	public function purchase_completed($id)
	{
	$query = $this->db->query("SELECT a.*,a.id as payment_id_set,a.package_id as package_id_set,b.*,c.* from payments as a,user_login as b,membership as c where c.id=a.package_id and b.USERID=a.USERID and a.id='".$id."'");
		$result = $query->row_array();
		return $result;		
	}
	
	public function package_purchase_requirements($id)
	{
		$query = $this->db->query("SELECT members.email , (members.fullname) as seller_name , (members.username) as seller_username , sell_gigs.`title`, payments.extra_gig_ref, payments.payment_super_fast_delivery, sell_gigs.super_fast_delivery_desc,
								   (SELECT (members.fullname)  
									FROM members WHERE USERID =  payments.`USERID` ) as buyer_name,(SELECT (members.username)  
									FROM members WHERE USERID =  payments.`USERID` ) as buyer_username  FROM `payments` 
									INNER JOIN sell_gigs ON sell_gigs.id = payments.`gigs_id`
									INNER JOIN members ON members.USERID = payments.`seller_id` 
									WHERE payments.`id` = $id ");
		$result = $query->row_array();								
		return $result ;
	}
    
	public function latest_gigs()
    {    
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0
                    ORDER BY sell_gigs.id DESC LIMIT 0 , 10 ");
        $result = $query->result_array();        
        return $result;
    }
	
    public function recent_gigs($param='')
    {       
         	
     //    $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
     //                WHERE gigs_image.gig_id = sell_gigs.id
     //                LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					// (SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					// (SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
     //                LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
     //                LEFT JOIN country ON members.`country` = country.id
     //                LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					// WHERE sell_gigs.status = 0 AND members.status = 0 GROUP BY id
     //                ORDER BY sell_gigs.id DESC LIMIT 0, 10");
 // $query="";
		
        // if($param==1)
        // {
        // $result = $query->result_array();
        // }
        // else {
        // $result = $query->num_rows();    
        // } 
        return false;
    }
    
	public function super_fast_delivery($gig_id,$user_id)
	{
		$query = $this->db->query("SELECT * FROM `super_fast_delivery_option` WHERE `gig_id` = $gig_id AND `user_id` = $user_id ");
		$result = $query->row_array();
		return $result ;
	}
	
	public function popular_gigs($param='')
    {       
         
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0
                    ORDER BY sell_gigs.total_views DESC LIMIT 0 , 10  ");
        if($param==1)
        {
        $result = $query->result_array();
        }
        else {
        $result = $query->num_rows();    
        } 
       
        return $result;
    }
	
	public function extra_package_calculations($id)
	{
		$query = $this->db->query("select * from membership where id='".$id."'");
		$result = $query->row_array();
		return $result;														
		
	}
	
    public function get_setting_price_option(){
     
     $query = $this->db->query("SELECT value FROM `system_settings` WHERE `key` = 'price_option' ");
     $result = $query->row_array();
     return $result;   
    }

    public function gig_price()
    {
        $query = $this->db->query("SELECT value FROM `system_settings` WHERE `key` = 'gig_price' ");
        $result = $query->row_array();
        return $result;
    }


    public function rejected_request($input)
    {
        $result = $this->db->insert('buyer_rejected_list',$input);


        //$insert_id = $this->db->insert_id(); //print_r($insert_id);exit;

        //echo$this->db->last_query();exit;
        return $result;
    }

    public function request_rejected($list_id,$gig_id)
    {

       $request = $this->db->query("SELECT b.*,m1.username as buyer_name,m1.email as buyer_email, a.name as admin_name,a.email as admin_email,m.username as seller_name from buyer_rejected_list b
                                LEFT JOIN members m on m.USERID = b.seller_id 
                                LEFT JOIN members m1 on m1.USERID = b.buyer_id 
                                LEFT JOIN sell_gigs s on s.id = b.order_id 
                                LEFT JOIN administrators a on a.ADMINID = 1
                                WHERE b.id = $list_id");
        $result = $request->row_array();
        return $result;
    }
    
    public function extra_gig_price()
    {
        $query = $this->db->query("SELECT value FROM `system_settings` WHERE `key` = 'extra_gig_price' ");
        $result = $query->row_array();
        return $result;
    }
    
    
    
    public function get_user_visited_gigs($user_id)
    {
        $query = $this->db->query("SELECT `gig_id` FROM `last_visited` WHERE `user_id` =  $user_id ");
        $result = $query->result_array();
        return $result;
    }
    
    public function last_visited($user_id,$return_type,$start,$end)
    {
        $append_sql = "";
         if($start>0||$end>0)
         { $append_sql = " LIMIT $start , $end"; }
        $query= $this->db->query(" SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.status = 0  AND members.status = 0 AND sell_gigs.id IN ( SELECT `gig_id` FROM `last_visited` WHERE `user_id` = $user_id ORDER BY  `last_visited`.`created_date` DESC  )".$append_sql." ");        
        if($return_type==0)
        { $result = $query->num_rows(); }
        else { $result = $query->result_array(); }        
        return $result;
        
    }
    
    public function reminder($user_id,$return_type,$start,$end)
    {
         $append_sql = "";
         if($start>0||$end>0)
         { $append_sql = " LIMIT $start , $end"; }
        $query= $this->db->query("SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.status = 0  AND members.status = 0 AND sell_gigs.id IN ( SELECT `gig_id` FROM `favourites` WHERE `user_id` = $user_id )".$append_sql." ");
        
        if($return_type==0)
        { $result = $query->num_rows(); }
        else { $result = $query->result_array(); }        
        return $result;
    }
    
     public function location_base_gigs($full_country_name,$param,$start,$end)
    {        
         $full_country_name = str_replace("_"," ",$full_country_name);
         $append_sql = "";
         if($start>0||$end>0)
         { $append_sql = " LIMIT $start , $end"; }
        $query = $this->db->query("SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.country_name = '$full_country_name'
					AND sell_gigs.status = 0
                    ORDER BY sell_gigs.id ASC" .$append_sql. " ;");
        if($param==1)
        {
        $result = $query->result_array();
        }
        else {
        $result = $query->num_rows();    
        }     
        return $result;                          
    }
public function get_user_name($user_id)
{
    $data=$this->db->query("select username from members where USERID='".$user_id."'")->row_array();
   return $data["username"];
}    
    
public function get_social_link($username)
{
    $data=$this->db->query("select USERID from members where username='".$username."'");
    
    $data2=$data->row_array();

    $social_links=$this->db->query("select * from social_profile where user_id='".$data2["USERID"]."'");
    if($social_links->row_array())
    {
        return $social_links->row_array();
    }
    else
    {
        return false;
    }
}

    public function username_base_gigs($username,$param,$start,$end)
    {             
         $append_sql = "";
         if($start>0||$end>0)
         { $append_sql = " LIMIT $start , $end"; }
        $query = $this->db->query("SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE members.`username` = '$username'
					AND sell_gigs.status = 0
                    ORDER BY sell_gigs.id ASC" .$append_sql. " ;");
		 //echo 	$this->db->last_query().'<br>';
			 
        if($param==1)
        {
        $result = $query->result_array();
        }
        else {
        $result = $query->num_rows();    
        }     
        return $result;                          
    }
    
    public function profile($username)
    {
        $query = $this->db->query("SELECT *,(select membership.name from membership where membership.id=user_login.package_id) as package_name FROM `user_login` WHERE `username` = '".$username."' AND `verified` = 0 AND `status` = 0 ;");
        // var_dump($this->db->last_query());
        $result = $query->row_array();
        return $result;          
    }
    
    
    
    public function add_favourites()
    {
        $user_id = $this->session->userdata('SESSION_USER_ID');
		$result='';
		if(!empty($user_id))
		{
        $query = $this->db->query("SELECT * FROM `favourites` WHERE `user_id` = $user_id LIMIT 0, 10");
        $result = $query->result_array();
		}
        return $result;
    }
    
    public function buy_service($param,$start,$end,$userid)
    {
        $append_sql = '';
		$new='';
		
		if($userid !='')
		{
			$new ="and user_id!=$userid";  	
		}
        if($start||$end != 0)
        {
        $append_sql = " LIMIT $start , $end ";    
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`    
					WHERE sell_gigs.status = 0 ".$new."   AND sell_gigs.user_id not in (select USERID from members where  status=1)            
                    ORDER BY sell_gigs.id DESC ".$append_sql."" );
	 
        if($param==1)
        {
        $result = $query->result_array();
		 
        }
        else {
        $result = $query->num_rows(); 
		 
        } 
		
        return $result;
        
    }
    
     public function category_base_gigs($category_name,$param,$start,$end)
    {        
         $category_name = str_replace("_"," ",$category_name);
         $append_sql = "";
         if($start>0||$end>0)
         { $append_sql = " LIMIT $start , $end"; }
            $query = $this->db->query("SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                        WHERE gigs_image.gig_id = sell_gigs.id
                        LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
						(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
						(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                        LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                        LEFT JOIN country ON members.`country` = country.id
                        LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                        WHERE sell_gigs.status = 0 AND 
						sell_gigs.category_id = (SELECT `CATID` FROM `categories` WHERE `name` = '$category_name' AND `status` = 0) AND sell_gigs.user_id not in (select USERID from members where  status=1)  
                        ORDER BY sell_gigs.id DESC" .$append_sql. " ;");
        if($param==1)
        {
        $result = $query->result_array();
        }
        else {
        $result = $query->num_rows();    
        }     
        return $result;                          
    }
     public function get_gig_details($title)
    {
        $title = str_replace(" ","_",$title);
        $query = $this->db->query("SELECT  sell_gigs.*,members.`fullname`, members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , country.country ,   `states`.`state_name` , members.`state`,
                    categories.name,categories.parent , GROUP_CONCAT(gigs_image.image_path SEPARATOR '#') as image_path ,
                    GROUP_CONCAT(gigs_video.video_path SEPARATOR '#') as video_path 
                    FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN categories ON categories.CATID = sell_gigs.category_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    LEFT JOIN gigs_image ON gigs_image.gig_id = sell_gigs.id
                    LEFT JOIN gigs_video ON gigs_video.gig_id = sell_gigs.id
					WHERE sell_gigs.status = 0 AND sell_gigs.user_id not in (select USERID from members where  status=1)  
                    AND sell_gigs.title =  '$title';");
        $result = $query->row_array(); 
        return $result;       
    }
    
 public function get_gig_details_id($id)
    {
        // $title = str_replace(" ","_",$title);
        $query = $this->db->query("SELECT  sell_gigs.*,members.`fullname`, members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , country.country ,   `states`.`state_name` , members.`state`,
                    categories.name,categories.parent , GROUP_CONCAT(gigs_image.image_path SEPARATOR '#') as image_path ,
                    GROUP_CONCAT(gigs_video.video_path SEPARATOR '#') as video_path 
                    FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN categories ON categories.CATID = sell_gigs.category_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    LEFT JOIN gigs_image ON gigs_image.gig_id = sell_gigs.id
                    LEFT JOIN gigs_video ON gigs_video.gig_id = sell_gigs.id
                    WHERE sell_gigs.status = 0 AND sell_gigs.user_id not in (select USERID from members where  status=1)  
                    AND sell_gigs.id =  '$id';");
        $result = $query->row_array(); 
        return $result;       
    }

    public function search_gig_details($title)
    {
        //$title = str_replace(" ","_",$title);
        $query = $this->db->query("SELECT  sell_gigs.*,members.`fullname`, `members`.`user_thumb_image`,`members`.`user_profile_image` , country.country ,   `states`.`state_name` , members.`state`,
                    categories.name,categories.parent , GROUP_CONCAT(gigs_image.image_path SEPARATOR '#') as image_path 
                    FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN categories ON categories.CATID = sell_gigs.category_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    LEFT JOIN gigs_image ON gigs_image.gig_id = sell_gigs.id
					WHERE sell_gigs.status = 0 AND sell_gigs.user_id not in (select USERID from members where  status=1)  
                    AND sell_gigs.title LIKE '%$title%';");
        $result = $query->row_array();
        return $result;       
    }
    
    public function user_all_gigs($gig_id,$user_id)
    {
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`, `members`.username, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` ,( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , ( SELECT gigs_image.`gig_image_tile` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_tile , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.user_id = $user_id AND sell_gigs.id != $gig_id AND sell_gigs.user_id not in (select USERID from members where  status=1)  
					AND sell_gigs.status = 0
                    ORDER BY sell_gigs.id DESC ");
        $result =  $query->result_array();    
        return $result;
    }
    
    public function category_based_gigs($cat_id,$title='')
    {
        $append_sql = "";
        if(!empty($title))
        {
        $append_sql = " AND `title` != '$title'";    
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , ( SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_thumb , ( SELECT gigs_image.`gig_image_tile` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_tile , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.category_id = $cat_id AND sell_gigs.status = 0 " .$append_sql. "
					
                    ORDER BY sell_gigs.id DESC ");
        $result =  $query->result_array();
        return $result;
    }
	
	
	
	public function similar_gigs($cat_id,$title='')
    {
        $append_sql = "";
        if(!empty($title))
        {
        $append_sql = " AND `title` != '$title'";    
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , ( SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_thumb , ( SELECT gigs_image.`gig_image_tile` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image_tile , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.category_id = $cat_id AND sell_gigs.status = 0 " .$append_sql. "					
                    ORDER BY sell_gigs.id DESC LIMIT 0 , 3 ");
        $result =  $query->result_array();
        return $result;
    }
	
	public function gig_basic_details($title)
	{
		$query  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `title` = '$title' ");
		$result = $query->row_array();
		return $result;
	}

    public function gig_basic_details_id($id)
    {
        $query  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `id` = '$id' ");
        $result = $query->row_array();
        return $result;
    }

     public function gig_rejected($gig_id)

    {

        $query  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `id` = '".$gig_id."' ");

        $result = $query->row_array();

        return $result;

    }

    public function gig_rejected_details($order_id)

    {

        $query  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `id` = '".$order_id."' ");

        $result = $query->row_array();

        return $result;

    }
	
	public function extra_gig_details($id)
	{
		$user_id = $this->session->userdata('SESSION_USER_ID');
		$query  = $this->db->query(" SELECT * FROM `extra_gigs`  WHERE  `gigs_id` = $id ");
		$result = $query->result_array();
		return $result;		
	}
	
	public function gig_image_details($id)
	{
            
		$user_id = $this->session->userdata('SESSION_USER_ID');
		$query  = $this->db->query("SELECT * FROM `gigs_image` WHERE `gig_id` = $id ");
		$result = $query->result_array();
		return $result;		
	}
	
	public function gig_video_details($id)
	{
		$query  = $this->db->query("SELECT * FROM `gigs_video` WHERE `gig_id`  = $id ");
		$result = $query->result_array();
		return $result;		
	}
	
    
    public function common_search($cat_id,$title,$start,$end,$return_type)
    {
        $append_sql = '';
        if($cat_id!='')
        {
        $append_sql = " AND sell_gigs.category_id = $cat_id ";
        }
        $last_append = '';
        if($start||$end!=0)
        {
        $last_append = " LIMIT $start , $end";   
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.`title` LIKE '%$title%' AND sell_gigs.status = 0 ".$append_sql."
                    ORDER BY sell_gigs.id DESC ".$last_append." ");
        if($return_type==0)
        {
        $result =  $query->num_rows();    
        } else {
        $result =  $query->result_array();
        }
        return $result;       
    }
    
    public function common_search_category($cat_id,$start,$end,$return_type)
    {        
        $last_append = '';
        if($start||$end!=0)
        {
        $last_append = " LIMIT $start , $end";   
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE sell_gigs.category_id = $cat_id
					AND sell_gigs.status = 0
                    ORDER BY sell_gigs.id DESC ".$last_append." ");
        if($return_type==0)
        {
        $result =  $query->num_rows();    
        } else {
        $result =  $query->result_array();
        }
        return $result;       
    }
    
    
    public function my_gigs($return_type,$user_id,$start,$end)
    {        
        $last_append = '';
        if($start||$end!=0)
        {
        $last_append = " LIMIT $start , $end";   
        }
        $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`, `members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
                    WHERE members.USERID =  $user_id
					AND sell_gigs.status = 0
                    ORDER BY sell_gigs.id DESC ".$last_append." ");
        if($return_type==0)
        {
        $result =  $query->num_rows();    
        } else {
        $result =  $query->result_array();
        }
        return $result;       
    }
    
    public function gigs_feedbacks($gig_id,$user_id)
    {
        $query = $this->db->query("SELECT feedback.*,members.fullname,members.username,members.USERID,members.user_thumb_image,members.user_profile_image  FROM feedback
                    left join members on members.USERID = feedback.`from_user_id`
                    WHERE feedback.`gig_id` = $gig_id AND from_user_id != $user_id AND feedback.`status` = 1 ");
        $result =  $query->result_array();
        return $result;         
    }
	public function more_gigs_feedbacks($gig_id,$user_id,$start,$limit)
    {
		$limit_cond = " LIMIT " . (int) $start . ", " . (int) $limit;
        $query = $this->db->query("SELECT feedback.*,members.fullname,members.username,members.USERID,`members`.`user_thumb_image`,`members`.`user_profile_image`  FROM `feedback`
                    left join members on members.USERID = feedback.`from_user_id`
                    WHERE feedback.`gig_id` = $gig_id AND from_user_id != $user_id AND feedback.`status` = 1 ".$limit_cond);
        $result =  $query->result_array();
        return $result;         
    }
    
	public function getRows($id = ''){
        $this->db->select('*');
        $this->db->from('payments');
        if($id){
            $this->db->where('id',$id);
            $query = $this->db->get();
            $result = $query->row_array();
        }else{
            $this->db->order_by('name','asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result)?$result:false;
    }
    public function gigs_country(){
        $query = $this->db->query("SELECT id,country FROM country WHERE id in (SELECT DISTINCT(country) as country_id  FROM members)");
        return $query->result_array();
    }
    public function gigs_state($country_id){
        if(!empty($country_id) && ($country_id!=0)){
            $query = $this->db->query("SELECT state_id as id ,state_name as state FROM states WHERE country_id = $country_id");
            $records =  $query->result_array();    
            return $records;
        }else{
            return array();
        }
    }

      public function settings(){
       
        $this->db->select('key, value');
        $this->db->from('system_settings');
        $records = $this->db->get()->result_array();
        $array = array();
         foreach ($records as $value) {
            if($value['key']=='one_signal_subdomain'){
                $array['one_signal_subdomain'] = $value['value'];
            }
            if($value['key']=='one_signal_app_id'){
                $array['one_signal_app_id']  = $value['value'];
            }
            if($value['key']=='one_signal_reset_key'){
              $array['one_signal_reset_key'] = $value['value'];
            }
          }
        return $array;  
    }

    public function save_device_id($data){
      
    $user_id = $data['user_id'];
     $device_id = $data['device_id'];
    $this->db->select('id');
    $this->db->from('one_signal_device_ids');
    $this->db->where('user_id',$user_id);
     $this->db->or_where('device_id',$device_id);
    $records = $this->db->count_all_results();
    if($records == 0){
      $result = $this->db->insert('one_signal_device_ids', $data);
      if($result){
        return 1;
      }
    }else{
        $this->db->where('user_id', $user_id);
      $result = $this->db->update('one_signal_device_ids', $data);
      if($result){
        return 1;
      }
    }
    return 0;
   }
    
}   
?>