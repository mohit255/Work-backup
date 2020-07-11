<?php 
class Search_model extends CI_Model{


public function get_ecort_by_city($location_get,$dates,$valuse)
{

   $count=$this->db->query("select count(a.USERID) as USERID from user_login as a where a.status='0' and a.verified='0' and a.package_status=1 and ( (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$dates." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!='')")->row_array();
     if($count["USERID"]<$valuse)
    {
       $data=$this->db->query("select a.USERID,b.escort_id,b.main_location,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$dates." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41) as user_addon_id,(select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID) as total_reating from user_login as a,escort_info as b where b.escort_id=a.USERID and b.main_location='".$location_get."' and a.status='0' and a.verified='0' and a.package_status=1 and ((select sum(feedback.rating) from feedback where feedback.to_user_id=a.USERID)!='' or (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$dates." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!='') ")->result_array();
    }
    else
    {
         $data=$this->db->query("select a.USERID,b.escort_id,b.main_location ,(select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$dates." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41) as user_addon_id from user_login as a ,escort_info as b where b.escort_id=a.USERID and b.main_location='".$location_get."' and a.status='0' and a.verified='0' and a.package_status=1 and (select user_addon.user_id from user_addon where user_addon.start_date_in_string<=".$dates." and user_addon.status='Running' and user_addon.user_id=a.USERID and user_addon.package_id=41)!=''")->result_array();
    }
    // var_dump($this->db->last_query());
  return $data;
}

public function get_all_user_list_with_all_filters_apply($page_no,$location_get,$name_get,$types_get,$call_type_get,$orienatation_get,$ethnicity_get,$body_type_get,$bust_size_get,$hayer_get,$escort_for_get,$rate_get,$age_get,$verified_get,$gender_get,$available_get,$start,$end,$corrent_date_in_string)
{
    if($location_get=="all" || $location_get=="")
    {
    	   $location_filter="";
         $location_type_filter_collan="";
         $location_type_filter_table="";
         $location_type_group_by="";
    }
    else
    {
         
       $location_type_filter_collan=",s.*";
         $location_type_filter_table=",suburbs as s";
         $location_type_group_by=" GROUP BY a.USERID ";
          

    	$location_filter="and (s.user_id=a.USERID or b.escort_id=a.USERID) and (b.state LIKE '%".$location_get."%' or b.main_location LIKE '%".$location_get."%' or b.sub_location LIKE '%".$location_get."%' or s.suburbs LIKE '%".$location_get."%')";
    }
    if($name_get=="all" || $name_get=="")
    {
    	$name_filter="";
    }
    else
    {
    	$name_filter=" and a.fullname LIKE '%".$name_get."%'";
    }
    
   if($types_get=="all" || $types_get=="Any" || $types_get=="")
    {
    	$type_filter="";
    }
    else
    {
    	$type_filter=" and a.types = '".$types_get."'";
    }


    if($call_type_get!="" || in_array("all", $call_type_get))
    {  
        $call_type_filter_collan="";
         $call_type_filter_table="";
         $call_type_filter_where="";

			 if($rate_get=="all" || $rate_get=="")
			{
				 $call_type_filter_collan="";
                 $call_type_filter_table="";
                 $call_type_filter_where="";
			}
			else
			{
				 $rate_data=explode("-",$rate_get);
		         $call_type_filter_collan=",c.price";
		         $call_type_filter_table=",escort_rate as c";
               $set_second="";
                 if(@$rate_data["1"])
                 {
                    $set_second="and price<=".$rate_data["1"]."";
                 }

		         $call_type_filter_where=" and c.escort_id=a.USERID and c.price>=".$rate_data["0"]." ".$set_second;
			}
    }	
    else
    {

             $set_array_data=[];
         for($i=0; $i<count($call_type_get); $i++)
         {
          array_push($set_array_data, "'".$call_type_get[$i]."'");
         }

    	 $set_data=implode(",",$set_array_data);
         $call_type_filter_collan=",c.call_type";
         $call_type_filter_table=",escort_rate as c";
         $call_type_filter_where=" and c.escort_id=a.USERID and c.call_type IN (".$set_data.")";

         if($rate_get!="all")
			{  
				$rate_data=explode("-",$rate_get);
				 $call_type_filter_collan=",c.call_type,c.price";
                 $call_type_filter_table=",escort_rate as c";
                 $set_second="";
                 if(@$rate_data["1"])
                 {
                    $set_second="and price<=".$rate_data["1"]."";
                 }
                 $call_type_filter_where=" and c.escort_id=a.USERID and c.call_type IN (".$set_data.") and c.price>=".$rate_data["0"]." ".$set_second;
			}
			

    	
        
    }	

    if($orienatation_get=="" || $orienatation_get=="All" || $orienatation_get=="all")
     {
     	$set_orienatation_get_filter="";
     } 
     else
     {
     	$set_orienatation_get_filter=" and b.orientation='".$orienatation_get."'";
     }
     // var_dump($ethnicity_get);
    if(@$ethnicity_get!="" || in_array("all", $ethnicity_get))
     {
          $ethnicity_filter="";
     }
     else
     {
        
        $set_array_data=[];
         for($i=0; $i<count($ethnicity_get); $i++)
         {
          array_push($set_array_data, "'".$ethnicity_get[$i]."'");
         }
        $ethnicity_filter=" and b.ethnicity IN (".implode(",",$set_array_data).")";

     }
      
      if(@$body_type_get!="" || in_array("all",$body_type_get))
     {
          $body_type_filter="";
     }
     else
     {
        
        $set_array_data=[];
         for($i=0; $i<count($body_type_get); $i++)
         {
          array_push($set_array_data, "'".$body_type_get[$i]."'");
         }
        $body_type_filter=" and b.body_type IN (".implode(",",$set_array_data).")";

     }     
    
     if(@$bust_size_get!="" || in_array("all",$bust_size_get))
     {
          $bust_size_filter="";
     }
     else
     {
        
        $set_array_data=[];
         for($i=0; $i<count($bust_size_get); $i++)
         {
          array_push($set_array_data, "'".$bust_size_get[$i]."'");
         }
        $bust_size_filter=" and b.bust_size IN (".implode(",",$set_array_data).")";

     }  

       if(@$hayer_get!="" || in_array("all",$hayer_get))
     {
          $hayer_filter="";
     }
     else
     {
        
        $set_array_data=[];
         for($i=0; $i<count($hayer_get); $i++)
         {
          array_push($set_array_data, "'".$hayer_get[$i]."'");
         }
        $hayer_filter=" and b.hair_style IN (".implode(",",$set_array_data).")";

     }  
  

if(@$escort_for_get=="" || in_array("all",$escort_for_get))
     {
          $escort_for_filter="";
     }
     else
     {
        // var_dump($escort_for_get);
        
         $set_array_data=[];
        $set_serch_for_escort_for="";
         
         for($i=0; $i<count($escort_for_get); $i++)
         {
          $set_serch_for_escort_for .=" (b.escort_for LIKE '%".@$escort_for_get[$i]."%') or";
         
         }
         $set_serch_for_escort_for .=" b.escort_for!=''";
        $escort_for_filter =" and ( ".$set_serch_for_escort_for.")";
        // var_dump("set query_part ".$escort_for_filter);

     }  

if($age_get=="all" || $age_get=="")
{
	$age_filter="";
}
else
{
	$get_age=explode("-", $age_get);
	$age_filter="and b.age>='".$get_age["0"]."' and b.age<='".$get_age["1"]."'";
}

if($gender_get=="All Genders" || $gender_get=="all" || $gender_get=="")
{
	$gender_filter="";
}
else
{
	$gender_filter=" and a.gender='".$gender_get."'";
}

if($verified_get=="all" || $verified_get=="")
{
	$verifid_filter='';
}
else
{
	$verifid_filter=" and b.photo_status='verified'";
}

if($available_get=='all' || $available_get=='')
{
	$available_filter="";
}
else
{
	$available_filter=" and a.login_status='Login'";
}


     $data=$this->db->query("select a.*,b.* ".$call_type_filter_collan." ".$location_type_filter_collan." from user_login as a,escort_info as b ".$call_type_filter_table." ".$location_type_filter_table." where b.escort_id=a.USERID and a.verified='0' and a.status='0' and a.package_status='1' ".$location_filter." ".$name_filter." ".$type_filter." ".$call_type_filter_where." ".$set_orienatation_get_filter." ".$ethnicity_filter." ".$body_type_filter." ".$bust_size_filter." ".$hayer_filter." ".$escort_for_filter." ".$age_filter." ".$gender_filter." ".$verifid_filter." ".$available_filter." ".$location_type_group_by." ORDER BY a.package_id DESC  LIMIT $start , $end");

// var_dump($this->db->last_query());
     $data=$data->result_array();
     $count=$this->db->query("select count(DISTINCT a.USERID) as USERID  from user_login as a ,escort_info as b ".$call_type_filter_table." ".$location_type_filter_table." where  b.escort_id=a.USERID and a.verified='0' and a.status='0' and a.package_status='1' ".$location_filter." ".$name_filter." ".$type_filter." ".$call_type_filter_where." ".$set_orienatation_get_filter." ".$ethnicity_filter." ".$body_type_filter." ".$bust_size_filter." ".$hayer_filter." ".$escort_for_filter." ".$age_filter." ".$gender_filter." ".$verifid_filter." ".$available_filter."".$location_type_group_by)->row_array();
     // var_dump($this->db->last_query());
    




             $res_set["data"]=$data;
            $res_set["count"]=$count;


    return $res_set;
}

public function get_user_list_with_all_filters($page_no,$type,$name,$state,$zip,$start,$end)
{

     if($zip!="no-zip-code")
       {
       	 $set_zip='and zipcode='.$zip.'';
       }
       else
       {
       	 $set_zip='';
       }
      
      if($state!="all-state")
       {

       	$get_state=$this->db->query("select state_id from states where state_name='".implode(" ", explode("-", $state))."'")->row_array();
       	 $set_state='and state='.$get_state["state_id"].'';
       }
       else
       {
       	 $set_state='';
       }

	if($type=="user")
	{
          if($name!="all-influencer")
          {
          	 $data=$this->db->query("SELECT * FROM `members` WHERE `fullname` LIKE '%".implode(" ", explode("-", $name))."%' and status=0 ".@$set_zip." ".$set_state." ORDER BY members.USERID DESC LIMIT $start , $end ")->result_array();
          	 $count=$this->db->query("SELECT count(USERID) FROM `members` WHERE `fullname` LIKE '%".implode(" ", explode("-", $name))."%' and status=0 ".@$set_zip." ".$set_state)->row_array();
          	 $res_set["data"]=$data;
          	 $res_set["count"]=$count;

       return $res_set;
          }
        else
        {
        	 $data=$this->db->query("SELECT * FROM `members` WHERE  status=0 ".@$set_zip." ".$set_state." ORDER BY members.USERID DESC LIMIT $start , $end ")->result_array();
        	  $count=$this->db->query("SELECT count(USERID) FROM `members` WHERE  status=0 ".@$set_zip." ".$set_state)->row_array();
         $res_set["data"]=$data;
          	 $res_set["count"]=$count;
         return $res_set;
        }
      
	}
	else{
		if($type=="categories")
		 {
		 	 $cat_ids=$this->db->query("SELECT CATID FROM `categories` WHERE `name` LIKE '%".implode(" ", explode("-", $name))."%' AND `status` = 0")->result_array();
		 	 // var_dump($this->db->last_query());
		 	 $ids=[];
		 	 foreach($cat_ids as $ids_c)
		 	 {
		 	 	array_push($ids, $ids_c["CATID"]);
		 	 }
		 	 $get_user_id=$this->db->query("SELECT user_id FROM `sell_gigs` WHERE `category_id` IN ('".implode(",", $ids)."') and status=0")->result_array();
             // var_dump($this->db->last_query());
             $count_user_id=[];
              foreach($get_user_id as $ids_user)
		 	 {
		 	 	array_push($count_user_id, $ids_user["user_id"]);
		 	 }

		 	  $data=$this->db->query("SELECT * FROM `members` WHERE `USERID` IN ('".implode(",", $count_user_id)."') and status=0 ".@$set_zip." ".$set_state." ORDER BY members.USERID DESC LIMIT $start , $end ");
		 	  // var_dump($this->db->last_query());
		 	  $data2=$data->result_array();


  $count=$this->db->query("SELECT count(USERID) FROM `members` WHERE `USERID` IN ('".implode(",", $count_user_id)."') and status=0 ".@$set_zip." ".$set_state);
		 	  // var_dump($this->db->last_query());
		 	  $count2=$count->row_array();

   $res_set["data"]=$data2;
          	 $res_set["count"]=$count2;
         return $res_set;


		 }	
	}	
}


public function get_data_for_search_by_button_search($data)
{
	$data=$this->db->query("SELECT * FROM crasol WHERE status=0 and item_name LIKE '%".$data."%' limit 1");
	// var_dump($this->db->last_query());
	return $data->row_array();
}	

// public function get_user_all_dsp()
// {
// 	$data=$this->db->query("SELECT * FROM members WHERE are_you='Short' and status='0'");
//    // var_dump($this->db->last_query());
//    return $data->result_array();
// }

public function get_all_states_dsp($counrty_id)
{
	 return $this->db->query("select * from states where country_id='".$counrty_id."'")->result_array();
}

public function get_all_categorys_dsp()
{
	$data=$this->db->query("SELECT a.CATID , a.name,(select count(sell_gigs.id) from sell_gigs where sell_gigs.status='0' and sell_gigs.category_id=a.CATID) as packages FROM categories as a WHERE a.status='0' ORDER BY a.name ASC");
	// var_dump($this->db->last_query());
	$data1=$data->result_array();
	return $data1;
}

// public function get_user_by_name($name,$state_id,$zipcode)
// {
// 	$state_id_set="";
// if($state_id!=0)
// {
// 	$state_id_set="and state='".$state_id."'";
// }	
//  	$zipcode_set="";
// if($zipcode!=0)
// {
// 	$zipcode_set="and zipcode='".$zipcode."'";
// }

//   $package_id=$this->db->query("select * from members where (fullname LIKE '%".implode(" ",explode("-", $name))."%' or username LIKE '%".implode(" ",explode("-", $name))."%') and are_you='Short'".$state_id_set." ".$zipcode_set);
// 	return $ids=$package_id->result_array();
// }

// public function get_user_by_package_dsp($name,$state_id,$zipcode)
// {
// 	$state_id_set="";
// if($state_id!=0)
// {
// 	$state_id_set="and state='".$state_id."'";
// }	
// $zipcode_set="";
// if($zipcode!=0)
// {
// 	$zipcode_set="and zipcode='".$zipcode."'";
// }
// 	$package_id=$this->db->query("select user_id from sell_gigs where title LIKE '%".$name."%' and status='0'");
	
// 	$ids=$package_id->result_array();
//   $ids_get=[];
//   foreach ($ids as $key ) {
// array_push($ids_get,$key["user_id"]);
//   }
//    $user_ids=implode(",", $ids_get);
//    $data=$this->db->query("SELECT * FROM `members` WHERE `USERID` IN ('".$user_ids."') ".$state_id_set." ".$zipcode_set);
  
//    return $data->result_array();
//  }

// public function get_user_by_cat_id_dsp($cat_id,$state_id,$zipcode)
// {
// 		$state_id_set="";
// if($state_id!=0)
// {
// 	$state_id_set="and state='".$state_id."'";
// }	
// $zipcode_set="";
// if($zipcode!=0)
// {
// 	$zipcode_set="and zipcode='".$zipcode."'";
// }
// 	$package_id=$this->db->query("select user_id from sell_gigs where category_id='".$cat_id."' and status='0'");
// 	// var_dump($this->db->last_query());
// 	$ids=$package_id->result_array();
//   $ids_get=[];
//   foreach ($ids as $key ) {
// array_push($ids_get,$key["user_id"]);
//   }
//    $user_ids=implode(",", $ids_get);
//    if($user_ids)
//    {
//     $data_set= $this->db->query("SELECT * FROM `members` WHERE `USERID` IN ('".$user_ids."') ".$state_id_set." ".$zipcode_set);
//    // var_dump($this->db->last_query());
//    return $data_set->result_array();
//    }
//    else
//    {
//     return false;
//    }
   
// }	
public function category_wise_search($id)
{
	 $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs`
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					AND sell_gigs.category_id = $id
                    ORDER BY sell_gigs.id DESC ");
	$result = $query->result_array();
	return $result ;			
}


public function get_subcategory_list($id)
{
	$query = $this->db->query("SELECT GROUP_CONCAT(`CATID`) AS category_id FROM `categories` WHERE `parent` = $id AND status = 0");
	$result = $query->row_array();
	return $result;
}

public function get_category_name($id)
{
	$query = $this->db->query("SELECT name FROM `categories` WHERE `CATID` =  $id ");
	$result = $query->row_array();
	return $result;
}

public function get_category_id($name)
{
	$query = $this->db->query("SELECT `CATID` FROM `categories` WHERE name = '$name' ");
	$result = $query->row_array();
	return $result;
}

public function get_parent_details($id)
{
	$query = $this->db->query(" SELECT `parent` FROM `categories` WHERE `CATID` =  $id ");
	$result = $query->row_array();
	return $result;	
}

public function search_subcategory_total($id)
{ 
	$query = $this->db->query("SELECT GROUP_CONCAT(`CATID`) AS category_id FROM `categories` WHERE `parent` = $id AND status = 0");
	$result = $query->row_array();
	$subcategory_total_rows  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `status` = 0 AND `category_id` = $id ");
	if($result['category_id']!='')
	{
	$subcategory_total_rows  = $this->db->query("SELECT * FROM `sell_gigs` WHERE `status` = 0 AND `category_id` IN (".$result['category_id']." , ".$id.")");  	
	}	 
	$total_rows = $subcategory_total_rows->num_rows();
	return $total_rows;
}

public function search_subcategory_details($id,$start,$end)
{
	
	$query = $this->db->query("SELECT GROUP_CONCAT(`CATID`) AS category_id FROM `categories` WHERE `parent` = $id AND status = 0");
	$result = $query->row_array();	 
	$append_sql = " = $id ";
	if($result['category_id']!='')
	{
		$append_sql = "IN (".$result['category_id'].",".$id.")";
	}
	$subcategory_list  = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs`
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					AND sell_gigs.category_id  ".$append_sql."
                    ORDER BY sell_gigs.id DESC LIMIT $start , $end ");  	
	$total_rows = $subcategory_list->result_array();
	return $total_rows;
}


public function search_subcategory_details_list($value,$id,$start,$end)
{
	$append_sql = '';
	if(!empty($value))
	{
		$append_sql = "AND sell_gigs.title LIKE '%".str_replace("-"," ",$value)."%' ";
	}
	
	$query = $this->db->query("SELECT GROUP_CONCAT(`CATID`) AS category_id FROM `categories` WHERE `parent` = $id AND status = 0");
	$result = $query->row_array();
	$subcategory_list  = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`image_path` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs`
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					".$append_sql."
					AND sell_gigs.category_id IN (".$result['category_id']." , ".$id.")
                    ORDER BY sell_gigs.id DESC LIMIT $start , $end ");  	
	$total_rows = $subcategory_list->result_array();
	return $total_rows;
}


public function category_search($value,$start,$end)
{
	$append_sql = '';
	if(!empty($value))
	{
		$append_sql = "AND sell_gigs.category_id = $value ";
	}
	 
	
	
		 $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs`
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					".$append_sql." 
                    ORDER BY sell_gigs.id DESC LIMIT $start , $end ");
	$result = $query->result_array();
	return $result ;			
	
}



public function tags_search($value,$start,$end)
{
	$append_sql = '';
	if(!empty($value))
	{
		$append_sql = "AND sell_gigs.gig_tags LIKE '%".$value."%' ";
	}
	 
	
	
		 $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs`
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					".$append_sql." 
                    ORDER BY sell_gigs.id DESC LIMIT $start , $end ");
	$result = $query->result_array();
	return $result ;			
	
}








public function search($value,$category_id,$start,$end,$country_id,$state_id)
{
	$append_sql = '';
	if(!empty($value))
	{
		$append_sql = "AND sell_gigs.title LIKE '%".str_replace(" ","-",$value)."%' ";		
	}
	if($category_id!=0)
	{
		$append_sql .= " AND sell_gigs.category_id =". $category_id ;
	}
	if($country_id!=0)
	{
		$append_sql .= " AND members.country =". $country_id ;
	}
	if($state_id!=0)
	{
		$append_sql .= " AND members.state =". $state_id ;
	}
	
	
		 $query = $this->db->query("  SELECT sell_gigs.*,members.`fullname`,members.`username`,`members`.`user_thumb_image`,`members`.`user_profile_image` , `states`.`state_name` , categories.name as category_name , ( SELECT gigs_image.`gig_image_medium` FROM `gigs_image` 
                    WHERE gigs_image.gig_id = sell_gigs.id
                    LIMIT 0 , 1  ) AS gig_image , country.country , members.`state`,
					(SELECT count(id) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_usercount,
					(SELECT AVG(rating) FROM `feedback` WHERE `gig_id` = sell_gigs.id and to_user_id = sell_gigs.user_id) AS gig_rating FROM `sell_gigs` 
                    LEFT JOIN members ON members.`USERID` = sell_gigs.user_id
                    LEFT JOIN country ON members.`country` = country.id
					LEFT JOIN categories ON categories.`CATID` = sell_gigs.category_id
                    LEFT JOIN states ON `states`.`state_id` = `members`.`state`
					WHERE sell_gigs.status = 0 AND members.status = 0 
					".$append_sql." 
                    ORDER BY sell_gigs.id DESC LIMIT $start , $end ");
	$result = $query->result_array();
	return $result ;			
	
}

 public function location_base_gigs($full_country_name,$start,$end)
    {        
         $full_country_name = str_replace("_"," ",$full_country_name);
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
                    WHERE sell_gigs.country_name = '$full_country_name'
					AND sell_gigs.status = 0 AND members.status = 0 
                    ORDER BY sell_gigs.id ASC" .$append_sql. " ;");
        
        $result = $query->result_array();
		return $result;
                                
    }
	
	 public function recent_gigs($start,$end)
    {
        $append_sql = '';
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
					WHERE sell_gigs.status = 0                
                    ORDER BY sell_gigs.id DESC ".$append_sql."" );

        $result = $query->result_array();
        
        return $result;
        
    }
	
	

} 
?>