<?php 

class admin_panel_model extends CI_Model
{


public function update_addon($data)
{
   $inser_data["name"]=$data["addon"];
   $inser_data["price"]=$data["price"];
   $inser_data["duration"]=$data["duration"];
   $inser_data["duration_type"]=$data["duration_type"];
   $inser_data["benifits"]=$data["add_positioning"];
   $inser_data["values"]=$data["No_of_profiles"];
   $inser_data["info"]=$data["addon_info"];
  
   $this->db->where(array("id"=>$data["id"]));
   $this->db->update("membership",$inser_data);
}

public function insert_addon($data)
{
   $inser_data["name"]=$data["addon"];
   $inser_data["price"]=$data["price"];
   $inser_data["types"]="Addon";
   $inser_data["duration"]=$data["duration"];
   $inser_data["benifits"]=$data["add_positioning"];
   $inser_data["values"]=$data["No_of_profiles"];
   $inser_data["create_date"]=date("d-M-Y");
   $inser_data["status"]=0;
   $inser_data["package_for"]="Every One";
   $this->db->insert("membership",$inser_data);
}

public function get_report()
{
  $data=$this->db->query("select a.*,b.fullname,b.user_thumb_image from admin_report as a, user_login as b where b.USERID=a.escort_id ORDER BY a.id DESC");
  return $data->result_array();
}

public function check_category_name_for_update_dsp($name,$table,$id)
{
  $data=$this->db->query("select * from ".$table." where name='".$name."' and status='0' and id!='".$id."'")->row_array();
// var_dump($this->db->last_query());
  if($data)
  {
    return false;
  }
  else
  {
    return true;
  }
}


public function check_category_name_dsp($name,$table)
{
  $data=$this->db->query("select * from ".$table." where name='".$name."' and status='0'")->result_array();
// var_dump($this->db->last_query());
  if($data)
  {
    return false;
  }
  else
  {
    return true;
  }
}

public function get_banner_image()
{
    $data=$this->db->query("select a.*,b.cover_image,b.types,b.fullname from baners as a,user_login as b where b.USERID=a.user_id and a.status='0' ORDER BY a.id DESC")->result_array();
    return $data;
}

public function check_baners_info($user_id)
{
    $res=$this->db->query("select user_id from baners where user_id='".$user_id."' and status='0'")->result_array();
    if($res)
    {
        return false;
    }
    else
    {
        return true;
    }
}    

public function search_user($data)
{
    $res=$this->db->query("select USERID,fullname,cover_image,types from user_login where fullname LIKE '%".$data."%' and status='0' and verified='0'")->result_array();
  return $res;
}


public function help_center_status_update($id,$operation)
{
   if($operation=="Delete")
   {
      for($i=0; $i<count($id); $i++)
    {
        
           $this->db->query("DELETE from faqs_categories where id ='".$id[$i]."'");
     
    }
   }
   else
   {
      if($operation=="Activate")
            {
                $set=0;
            }
            else
            {
                $set=1;
            }
          for($i=0; $i<count($id); $i++)
    {
         
           $this->db->query("UPDATE faqs_categories SET status='".$set."' WHERE id='".$id[$i]."'");

   }
}
}

public function city_status_update($id,$operation)
{
     for($i=0; $i<count($id); $i++)
    {
         if($operation=="Activate")
            {
                $set = 0;
                 $this->db->query("UPDATE location SET status='".$set."' WHERE id='".$id[$i]."'");
            }
            elseif ($operation=="Deactivate") {
                $set = 1;
               $this->db->query("UPDATE location SET status='".$set."' WHERE id='".$id[$i]."'");
            }
            else
            {
               $this->db->query("DELETE FROM location WHERE id='".$id[$i]."'");
            }

          
       // var_dump($this->db->last_query());
    }
}
 // .......................pawan function start.................


public function check_state_city($data){
    $data=$this->db->query("select * from location where city='".$data["city"]."' and state='".$data["state"]."' and id !='".$data["id"]."'")->row_array();
    var_dump($this->db->last_query());
    if($data)
    {
        return false;
    }
    else
    {
        return true;
    }
}


  public function update_city_value($data){
     


     $id=$data["id"];
     $set_value["city"]=$data["city"];
     $set_value["popular_city"]=$data["popular_city"];
     $set_value["state"]=$data["state"];
          $this->db->where('id', $id);
      $result = $this->db->update('location', $set_value);
    var_dump($this->db->last_query());
      // return $result;
    }

    public function Location()
    {
        $query = $this->db->query(" SELECT * from location");
        $result = $query->result_array();
        return $result;        
    }

     public function city_value($id)
    {
        $query = $this->db->query(" SELECT * from location WHERE id='".$id."'");
        $result = $query->row_array();
        return $result;        
    }

    public function one_order($id)
    {
        // $query = $this->db->query("SELECT * from user_addon_requests WHERE id='".$id."'");
        $query = $this->db->query("SELECT a.id,a.order_no,a.membership_id,a.user_id,a.status AS addon_status,b.name from user_addon_requests AS a,membership AS b WHERE a.id='".$id."' AND a.membership_id = b.id");
        $result = $query->row_array();
        return $result;        
    }
// .......................pawan function end.................
public function dropdown_value($id)
    {
        $query = $this->db->query(" SELECT * from dropdown WHERE id='".$id."'");
        $result = $query->row_array();
        return $result;        
    }

public function dropdown()
    {
        $query = $this->db->query(" SELECT * from dropdown");
        $result = $query->result_array();
        return $result;        
    }

      public function update_drop_value($data){


 $id=$data["id"];
 $set_value["title"]=$data["dropdown"];
 $set_value["value"]=implode('*#*',$data["dropdown_value"]);
 $set_value["last_upadte"]=date("d-M-Y");
 $set_value["status"]=0;
          $this->db->where('id', $id);
      $result = $this->db->update('dropdown', $set_value);
    }

public function all_enquirys(){

    $data=$this->db->query("SELECT * FROM `enquerys` ORDER BY `enquerys`.`id` DESC");

    $data2=$data->result_array();

    return $data2;

}



// for FAQ panel start



public function edit_content_faqs_cat($id)

{

    $data= $this->db->query("select * from help_center_content where id='".$id."'");

   

   $data2=$data->row_array();

    return $data2;

}    

public function get_content_for_help_center(){

    $data=$this->db->query("SELECT * FROM `help_center_content` ORDER BY `help_center_content`.`id` DESC");

    $data=$data->result_array();

    return $data;

}





public function get_cat_for_content()

{

     $data=$this->db->query("SELECT * FROM `faqs_categories` where status='0' ORDER BY `faqs_categories`.`name` ASC");

    $data=$data->result_array();

    return $data;

}



public function edit_category_faqs_cat($category_id)

{

    $data= $this->db->query("select * from faqs_categories where id='".$category_id."'");

   

   $data2=$data->row_array();

    return $data2;

}



public function get_faqs_category()

{

    $data=$this->db->query("SELECT * FROM `faqs_categories` ORDER BY `faqs_categories`.`id` DESC");

    $data=$data->result_array();

    return $data;

}





// for FAQ panel end





public function set_operation_for_review($id,$operation)

{

    for($i=0; $i<count($id); $i++)

    {



         if(@$operation=="delete")

        {



          $this->db->query("delete from  feedback where id='".$id[$i]."'");

        }

        else

        {

            if($operation=="Activate")

            {

                $set=0;

            }

            else

            {

                $set=1;

            }



           $this->db->query("UPDATE feedback SET status='".$set."' WHERE id='".$id[$i]."'");

         

        } 

// var_dump($this->db->last_query());
    }



    



}

public function set_operation_for_footer_sub_menu($id,$operation)

{
for($i=0; $i<count($id); $i++)

    {



         if(@$operation=="Delete")

        {



          $this->db->query("delete from  footer_submenu where id='".$id[$i]."'");

        }

        else

        {

            if($operation=="Activate")

            {

                $set=1;

            }

            else

            {

                $set=0;

            }



           $this->db->query("UPDATE footer_submenu SET status='".$set."' WHERE id='".$id[$i]."'");

         

        } 
var_dump($this->db->last_query());


}

}


public function set_status_user($ids,$oper)

{

      if($oper=='Active')

      {

        $status='0';

        

      }

      else

       {

        $status='1';

       } 

  for($i=0; $i<count($ids); $i++)

       {

        $this->db->query("UPDATE user_login SET status='".$status."' where USERID='".$ids[$i]."'");

        // var_dump($this->db->last_query());

       }  



}





public function set_status_of_orders($ids,$set_call,$status)

{

   for($i=0; $i<count($ids); $i++)

       {

        $this->db->query("UPDATE payments SET ".$set_call."='".$status."' where id='".$ids[$i]."'");

       }    

}





    public function delete_rder_by_id_dsp($id)

{



       for($i=0; $i<count($id); $i++)

       {

        $this->db->where(array("id"=>$id[$i]));

     $this->db->delete('payments');

       }

      



}





    public function delete_gigs_by_id($id)

{

      $this->db->where(array("id"=>$id));

     $this->db->delete('sell_gigs');



}



  Public function get_updates()

    {



       $ch = curl_init();

        $options = array(

            CURLOPT_URL => 'https://www.dreamguys.co.in/gigs_updates/',

            CURLOPT_RETURNTRANSFER => true

            );



       if (!ini_get('safe_mode') && !ini_get('open_basedir')) {

            $options[CURLOPT_FOLLOWLOCATION] = true;

        }

        curl_setopt_array($ch, $options);            

       $output = curl_exec($ch);

        curl_close($ch);



       $updates = json_decode($output, TRUE);          

        

       $where = array('build' => $updates['build'] );

        $check_updates =  $this->db->get_where('version_updates',$where)->num_rows();

        if($check_updates!=0){

           $this->session->set_userdata(array('updates'=>1));

        }





   }

  public function edit_profession($id)

  {

    $query = $this->db->query(" SELECT * FROM `profession` WHERE `id` = $id ");

    $result = $query->row_array();

    return $result;

  }

    public function terms()

  {

    $query = $this->db->query(" SELECT * FROM `terms` WHERE `status` = 1");

    $result = $query->row_array();

    return $result;

  }

      public function get_terms()

  {

    $query = $this->db->query("SELECT * FROM `term` WHERE 1");

    $result = $query->result_array(); 

        return $result;   

  }

  public function footercount()

  {

    $query = $this->db->query("SELECT id

FROM  `footer_menu` 

WHERE STATUS =1");

    $result = $query->num_rows();

    return $result;

  }

         public function catagorycheck($category_name,$catagory_id)

    {

    $join='';

    if($catagory_id!=''){

      $join="AND CATID != '".$catagory_id."'";

    }

        $query = $this->db->query("SELECT * FROM `categories` WHERE `name` ='".$category_name."' ".$join);

    

        $result = $query->num_rows();

        return $result;                      

    }

    public function admin_commision()

  {

    $query = $this->db->query(" SELECT `value` FROM `system_settings` WHERE `key` = 'admin_commision' ");

    $result = $query->row_array();

    return $result;

  }

    public function delete_seo_setting($seo_id)

  {

    $query = $this->db->query("DELETE FROM seo_details WHERE id ='".$seo_id."'");

    $result = 1;

    return $result;   

  }

  public function gig_price()

  {

    $query = $this->db->query("SELECT `value` FROM `system_settings` WHERE `key` = 'gig_price' ");

    $result = $query->row_array();

    return $result;   

  }

  

  public function get_rupee_dollar_rate()

  {

    $query = $this->db->query(" SELECT * FROM `currency` ORDER BY `created_date` DESC LIMIT 0 , 1  ;");

        $result = $query->row_array();

        return $result;     

  }

  

  public function all_profession($start,$end)

  {

        // $query = $this->db->query(" SELECT * FROM  `profession` LIMIT $start , $end ");

    $query = $this->db->query(" SELECT * FROM  `profession`");

    $result = $query->result_array();

    return $result;   

  }

  

   public function all_gigs($return_type,$start,$end)

    {

        $append_sql = "";

         if($start>0||$end>0)

         {

       //$append_sql = " LIMIT $start , $end"; 

        }

        $query= $this->db->query("SELECT sell_gigs.id as gig_id , ( SELECT gigs_image.`gig_image_thumb` FROM `gigs_image`   

     WHERE gigs_image.gig_id = sell_gigs.id   LIMIT 0 , 1  ) AS gig_image ,  sell_gigs.`title`,  sell_gigs.`currency_type` , members.fullname , members.username , categories.name as         category_name , sell_gigs.`gig_price` , sell_gigs.`status`, sell_gigs.`created_date`  FROM `sell_gigs` 

      INNER JOIN members ON members.USERID = sell_gigs.user_id 

    INNER JOIN categories ON categories.CATID = sell_gigs.category_id ORDER BY sell_gigs.`created_date` DESC ".$append_sql." ");        

        if($return_type==0)

        { $result = $query->num_rows(); }

        else { $result = $query->result_array(); 

     

    

    }        

        return $result;

        

    }

  

  public function release_payments($return_type,$start,$end)

  {

        $append_sql = "";

  if($return_type==1)

        { 

         if($start>0||$end>0)

         { 

           // $append_sql = " LIMIT $start , $end"; 

           }

    }

    $query =$this->db->query("SELECT a.*, s.fullname as buyer_name,va.paypal_email_id as buyer_paybalemail,s.email as buyer_email,sg.title,sm.email as selleremail, sm.fullname as seller_name ,ba.paypal_email_id FROM  `payments`as a

                            LEFT JOIN bank_account as ba ON ba.user_id = a.USERID

                            LEFT JOIN sell_gigs as sg ON sg.id = a.gigs_id

                            LEFT JOIN members as s ON s.USERID = a.USERID   

                            LEFT JOIN members as sm ON sm.USERID = a.seller_id 

               LEFT JOIN bank_account as va ON va.user_id = a.seller_id

              WHERE  (a.payment_status = 1 OR a.cancel_accept = 1 OR a.decline_accept = 1) AND a.payment_status != 2 ".$append_sql."");

  /*   $query = $this->db->query(" SELECT a . * , s.fullname AS buyer_name,ba.paypal_email_id, sm.fullname AS seller_name, s.email AS buyeremil

                    FROM  `payments` AS a

                    LEFT JOIN members AS s ON s.USERID = a.USERID

                    LEFT JOIN members AS sm ON sm.USERID = a.seller_id

                    LEFT JOIN bank_account AS ba ON ba.user_id = a.seller_id

                    WHERE a.payment_status = 1 ORDER BY a.`created_at` DESC ".$append_sql." "); 

    */

     if($return_type==0)

        {       

    $result = $query->num_rows(); }

        else {  

    $result = $query->result_array();

    }        

    return $result;

  }

    public function Completed_payments($return_type,$start,$end)

  {

        $append_sql = "";

    if($return_type==1)

        {         

      if($start>0||$end>0)

       {

             // $append_sql = " LIMIT $start , $end"; 

             }

    }

     $query = $this->db->query(" SELECT a . * , s.fullname AS buyer_name, sm.fullname AS seller_name, s.email AS buyeremil

                    FROM  `payments` AS a

                    LEFT JOIN members AS s ON s.USERID = a.USERID

                    LEFT JOIN members AS sm ON sm.USERID = a.seller_id

                    WHERE a.payment_status = 2 ORDER BY a.`created_at` DESC ".$append_sql." ");

                    

     if($return_type==0)

        {      

    $result = $query->num_rows(); }

        else {  

    $result = $query->result_array(); }        

        return $result;

  }

  public function copy_right_year()

  {       

    $query = $this->db->query("SELECT `value` FROM `system_settings` WHERE `key` = 'copy_rit_year';");

    $result = $query->row_array();    

    return $result;

    

  }

  

  public function dashboard_details($set_times)

  { 

      // $query = $this->db->query("select count(USERID) as total_user,(select count(user_login.USERID) from user_login where user_login.created_date_in_string=".strtotime(date("Y-m-d"))." ) as today_user,(select count(user_login.USERID) from user_login where user_login.types='Escort' ) as total_escort,(select count(payments.id) from payments ) as total_payment from user_login ");

      // $query = $this->db->query("select count(USERID) as total_user,(select count(user_login.USERID) from user_login where user_login.created_date_in_string=".strtotime(date("Y-m-d"))." ) as today_user,(select count(user_login.USERID) from user_login where user_login.types='Escort' ) as total_escort,(select count(payments.id) from payments ) as total_payment,(select count(user_addon_requests.id) from user_addon_requests) as total_orders, from user_login ");
      $query = $this->db->query("select count(USERID) as total_user,(select count(user_login.USERID) from user_login where user_login.created_date_in_string=".$set_times." ) as today_user,(select count(user_login.USERID) from user_login where user_login.types='Escort' ) as total_escort,(select count(payments.id) from payments ) as total_payment,(select count(user_addon_requests.id) from user_addon_requests) as total_orders,(select count(user_addon_requests.id) from user_addon_requests where user_addon_requests.request_date_in_string=".$set_times." ) as today_orders from user_login ");
      // var_dump($this->db->last_query());



        // // $query=$this->db->query("select * from payment");

        $result = $query->row_array();

        // $result = null;

        return $result;                       

  }

  public function today_orders($set_times)
  {
    $query = $this->db->query("select ua.*,ul.* from user_addon_requests AS ua,user_login AS ul where ua.user_id = ul.USERID  AND ua.request_date_in_string='".$set_times."' ORDER BY ua.id DESC");
    $result = $query->result_array();

    return $result;
  }

  public function dashboard_new_escort($set_times)

  {

        $query = $this->db->query("select * from user_login where created_date_in_string='".$set_times."' ORDER BY `user_login`.`USERID` DESC");


        $result = $query->result_array();
        // var_dump($this->db->last_query());


        return $result;                   

  }

  

  public function dashboard_popular_gigs()

  {

        $query = $this->db->query(" SELECT sell_gigs.`title`,sell_gigs.`gig_price`,sell_gigs.currency_type,sell_gigs.`created_date`,sell_gigs.`total_views`,(SELECT gig_image_thumb FROM `gigs_image` WHERE `gig_id` = sell_gigs.id LIMIT 0 , 1 ) AS gig_image FROM `sell_gigs` ORDER BY `total_views` DESC  LIMIT 0 , 6  ");

        $result = $query->result_array();

        return $result;                   

  }

  

  

    public function get_policy_settings($start,$end)

    {

        $query = $this->db->query("SELECT * FROM  `policy_settings` LIMIT $start , $end  ");

        $result = $query->result_array();

        return $result;                

    }

    

    public function get_seo_settings($start,$end)

    {

        $query = $this->db->query("SELECT * FROM `seo_details` LIMIT $start , $end  ");

        $result = $query->result_array();

        return $result;                

    }

    

    public function edit_seo_settings($id)

    {

        $query = $this->db->query("SELECT * FROM `seo_details` WHERE id = $id");

        $result = $query->row_array();

        return $result;                

    }

      public function edit_paypal_settings($id)

    {

        $query = $this->db->query("SELECT * FROM `paypal_details` WHERE id = $id");

        $result = $query->row_array();

        return $result;                

    }

    

    

    

    public function edit_policy_settings($id)

    {

        $query = $this->db->query("SELECT * FROM  `policy_settings` WHERE `id` = $id ");

        $result = $query->row_array();

        return $result;                

    }

    

    public function edit_client_list($client_id)

    {

        $query = $this->db->query("SELECT * FROM `client` WHERE `id` = '".$client_id."' ; ");

        $result = $query->row_array();

        return $result;

    }

    public function all_category()

    {

        $query = $this->db->query("SELECT c.*,(c2.`CATID`) as parent_id,(c2.name) as parent_name FROM categories c  

LEFT join `categories` as c2 ON c2.CATID = c.parent where c.delete_sts =0 ");

        $result = $query->result_array();

        return $result;        

    }

    public function categories()

    {

        $query = $this->db->query(" SELECT * FROM `categories` WHERE `status` = 0 ");

        $result = $query->result_array();

        return $result;        

    }

    public function edit_category($category_id)

    {

        $query = $this->db->query("SELECT * FROM `categories` WHERE `CATID` = '".$category_id."' ; ");

        $result = $query->row_array();

        return $result;

    }

    public function parent_category()

    {

        $query = $this->db->query("SELECT * FROM `categories` WHERE `parent` = 0 AND `status` = 0 ");

        $result = $query->result_array();

        return $result;

    }

    public function default_extra_gigs()

    {        

        $query = $this->db->query("SELECT * FROM `default_extra_gigs` ");

        $result = $query->result_array();

        return $result;        

    }

    public function all_sub_category()

    {        

        $query = $this->db->query("SELECT * FROM `categories` WHERE `status` = 0");

        $result = $query->result_array();

        return $result;        

    }

    public function edit_gigs($gig_id)

    {

        $query = $this->db->query("SELECT * FROM `default_extra_gigs` WHERE `default_gig_id` = '".$gig_id."' ");

        $result = $query->row_array();

        return $result;

    }

    public function get_meta_settings()

    {

        $query = $this->db->query("SELECT * FROM `meta_settings`");

        $result = $query->row_array();

        return $result;        

    }

    public function get_setting_list() {

        $data = array();

        $stmt = "SELECT a.*"

                . " FROM system_settings AS a"

                . " ORDER BY a.`id` ASC";

        $query = $this->db->query($stmt);

        if ($query->num_rows()) {

            $data = $query->result_array();

        }

        return $data;

    }

    public function get_static_page($end,$start)

    {        

        $query = $this->db->query("SELECT * FROM  `page` LIMIT $start , $end");

        $result = $query->result_array();

        return $result;           

    }

    public function edit_static_page($id)

    {

        $query = $this->db->query("SELECT * FROM  `page` WHERE page_id = $id ");

        $result = $query->result_array();

        return $result;                   

    }

    public function site_name()

    {

        $query = $this->db->query("SELECT `value` FROM `system_settings` WHERE `key` = 'website_name';");

        $result = $query->row_array();

        return $result;              

    }

    public function get_ban_ip()

    {

        $query = $this->db->query("SELECT * FROM `bans_ips`;");

        $result = $query->result_array();

        return $result;                      

    } 

    public function check_ip($ip_address)

    {

        $query = $this->db->query("SELECT * FROM `bans_ips` WHERE `ip_addr` = '$ip_address';");

        $result = $query->num_rows();

        return $result;                      

    }    

     public function is_valid_menu_name($menu_name)

    {

        $query = $this->db->query("SELECT * FROM `footer_menu` WHERE `title` =  '$menu_name';");

        $result = $query->num_rows();

        return $result;                      

    }

       public function check_profession($Profession)

    {

        $query = $this->db->query("SELECT * FROM `profession` WHERE `profession_name` =  '$Profession';");

        $result = $query->num_rows();

        return $result;                      

    }

    public function is_valid_submenu($menu_name)

    {

        $query = $this->db->query("SELECT * FROM `footer_submenu` WHERE `title` =  '$menu_name';");

        $result = $query->num_rows();

        return $result;                      

    }      

    public function edit_footer_menu($id)

    {

        $query = $this->db->query("SELECT * FROM `footer_menu` WHERE `id` =  $id;");

        $result = $query->result_array();

        return $result;                      

    }

    public function edit_ip($ip_address)

    {

        $query = $this->db->query("SELECT * FROM `bans_ips` WHERE `id` = '$ip_address';");

        $result = $query->row_array();

        return $result;                      

    }

    public function get_all_request()

    {

        $query = $this->db->query("

            SELECT req.*,members.fullname,(categories.name) AS main_category,sub_cat.name as sub_category FROM `request` as req

      LEFT JOIN members ON members.USERID = req.posted_by   

            LEFT JOIN categories ON categories.CATID = req.`main_cat`

            LEFT JOIN categories as sub_cat ON sub_cat.CATID = req.`sub_cat`;");

        $result = $query->result_array();

        return $result;   

    }

    public function edit_request($id)

    {

        $query = $this->db->query("SELECT * FROM `request` WHERE `id` = $id ;");

        $result = $query->row_array();

        return $result;          

    }   

    public function get_user()

    {        

        $query = $this->db->query("SELECT a.*,(select escort_info.main_location from escort_info where escort_info.escort_id=a.USERID) as main_location,(select membership.name from membership where membership.id=a.package_id) as packge_name FROM user_login as a  ORDER BY a.USERID ASC");

        $result = $query->result_array();

        return $result;                  

    }



  public function get_user_escort()

  {

    $query = $this->db->query("SELECT a.*,b.main_location,(select membership.name from membership where membership.id=a.package_id) as packge_name FROM user_login as a,escort_info as b where b.escort_id=a.USERID and a.types='Escort'");

        $result = $query->result_array();

        return $result;  

  }



  public function get_user_agency()

  {

    $query = $this->db->query("SELECT a.*,b.main_location,(select membership.name from membership where membership.id=a.package_id) as packge_name FROM user_login as a,escort_info as b where b.escort_id=a.USERID and a.types='Agency'");

        $result = $query->result_array();

        return $result;  

  }



public function get_user_establishment()

  {

    $query = $this->db->query("SELECT a.*,b.main_location,(select membership.name from membership where membership.id=a.package_id) as packge_name FROM user_login as a,escort_info as b where b.escort_id=a.USERID and a.types='Establishment'");

        $result = $query->result_array();

        return $result;  

  }



    public function edit_user($id)

    {

        $query = $this->db->query("SELECT * FROM `user_login`  WHERE `USERID` = $id ;");

        $result = $query->row_array(); 

        return $result;           

    }

    public function get_ads($start,$end)

    {

        if(empty($start)&&empty($end))

        {

        $query = $this->db->query("SELECT * FROM `ads` ;");

        $result = $query->result_array(); 

        return $result;         

        }

        else 

        {

        $query = $this->db->query("SELECT * FROM `ads` LIMIT $start , $end ;");

        $result = $query->result_array(); 

        return $result;    

        }

    } 

    public function edit_ads($id)

    {

        $query = $this->db->query("SELECT * FROM `ads` WHERE `ads_id` = $id ");

        $result = $query->row_array(); 

        return $result;            

    }

    public function get_review()
    {


        /*$query = $this->db->query("SELECT gigs_reviews.review_id,gigs_reviews.`review`,members.fullname,gigs.gig_title,gigs_reviews.`created_date`,gigs_reviews.`status` FROM `gigs_reviews`

                                    INNER JOIN members ON members.USERID = gigs_reviews.`user_id`

                                    INNER JOIN gigs ON gigs.id = gigs_reviews.`gig_id`");*/

    $query = $this->db->query("SELECT a.*,b.fullname FROM feedback as a,user_login as b where b.USERID=a.to_user_id");

        $result = $query->result_array(); 

        return $result;                    

    }

    public function edit_review($id)

    {


        $query=$this->db->query("SELECT a.*,b.fullname FROM feedback as a,user_login as b where b.USERID=a.to_user_id and a.id='".$id."'");
// var_dump($this->db->last_query());
        $result = $query->row_array(); 

        return $result;                    

    }

    public function get_admin_profile($id)

    {

        $query = $this->db->query("SELECT * FROM `administrators` WHERE `ADMINID` = $id");

        $result = $query->row_array(); 

        return $result;                            

    }

    public function get_client_list()

    {

        $query = $this->db->query("SELECT * FROM  `client` ");

        $result = $query->result_array(); 

        return $result;          

    }

    public function get_footer_menu($end , $start)

    {        

        $query = $this->db->query("SELECT * FROM  `footer_menu` LIMIT $start , $end ");

        $result = $query->result_array(); 

        return $result;                  

    }

    public function get_footer_submenu($end , $start)

    {        

        $query = $this->db->query("SELECT footer_submenu.*,footer_menu.title FROM `footer_submenu`

                                    INNER JOIN footer_menu ON footer_menu.id = footer_submenu.`footer_menu`

                                    LIMIT $start , $end ");

        $result = $query->result_array(); 

        return $result;                  

    }

     public function get_all_footer_menu()

    {        

        $query = $this->db->query("SELECT * FROM  `footer_menu` ");

        $result = $query->result_array(); 

        return $result;                  

    }

    public function get_all_footer_submenu()

    {        

        $query = $this->db->query("SELECT footer_submenu.*,footer_menu.title FROM `footer_submenu`

                                    INNER JOIN footer_menu ON footer_menu.id = footer_submenu.`footer_menu` ");

        $result = $query->num_rows(); 

        return $result;                  

    }

      public function edit_terms($id)

    {

        $query = $this->db->query("SELECT *

                                    FROM  term

                                    WHERE id= $id ");

            $result = $query->result_array(); 

        return $result;                          

    }

    public function edit_submenu($id)

    {

        $query = $this->db->query("SELECT footer_submenu . * , footer_menu.title

                                    FROM  `footer_submenu` 

                                    INNER JOIN footer_menu ON footer_menu.id = footer_submenu.`footer_menu` 

                                    WHERE footer_submenu.id = $id ");

            $result = $query->result_array(); 

        return $result;                          

    }

   

   public function new_notification()

  {

    $query = $this->db->query("SELECT * FROM 

      (SELECT payments.id, `members`.`fullname` AS buyer_name, payments.created_at AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'buyed' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id =  payments.gigs_id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `payments` 

      INNER JOIN members ON payments.`USERID` =  `members`.`USERID` 

      INNER JOIN sell_gigs ON payments.`gigs_id` = sell_gigs.id

      WHERE payments.seller_status = 1

      AND payments.admin_notification_status =1

      UNION

      SELECT payments.id, `members`.`fullname` AS buyer_name, payments.created_at AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'completed' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id =  payments.gigs_id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `payments` 

      INNER JOIN members ON payments.`seller_id` =  `members`.`USERID` 

      INNER JOIN sell_gigs ON payments.`gigs_id` = sell_gigs.id

      WHERE payments.seller_status = 6

      AND payments.admin_notification_status =1

      UNION

      SELECT sell_gigs.id, `members`.`fullname` AS buyer_name, sell_gigs.created_date AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'new_gig' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id = sell_gigs.id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `sell_gigs` 

      INNER JOIN members ON sell_gigs.`user_id` =  `members`.`USERID` 

      WHERE sell_gigs.notification_status =1

      UNION

      SELECT payments.id, `members`.`fullname` AS buyer_name, payments.created_at AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'payment_request' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id =  payments.gigs_id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `payments` 

      INNER JOIN members ON payments.`seller_id` =  `members`.`USERID` 

      INNER JOIN sell_gigs ON payments.`gigs_id` = sell_gigs.id

      WHERE payments.seller_status = 6

      AND payments.payment_status =1

      UNION

      SELECT payments.id, `members`.`fullname` AS buyer_name, payments.created_at AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'payment_decline' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id =  payments.gigs_id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `payments` 

      INNER JOIN members ON payments.`seller_id` =  `members`.`USERID` 

      INNER JOIN sell_gigs ON payments.`gigs_id` = sell_gigs.id

      WHERE payments.seller_status = 5 AND payments.decline_accept =1 AND payment_status!=2

      UNION

      SELECT payments.id, `members`.`fullname` AS buyer_name, payments.created_at AS created_date , `members`.`username` AS buyer_username, sell_gigs.title , 'payment_cancel' as status

      , (SELECT gigs_image.`gig_image_thumb` FROM `gigs_image` WHERE gigs_image.gig_id =  payments.gigs_id LIMIT 0 , 1 ) AS gig_image_thumb

      FROM  `payments` 

      INNER JOIN members ON payments.`seller_id` =  `members`.`USERID` 

      INNER JOIN sell_gigs ON payments.`gigs_id` = sell_gigs.id

      WHERE payments.cancel_accept =1 AND payment_status!=2

      

      ) a ORDER BY a.created_date DESC ");    

    $result = $query->result_array();

    return $result; 

        

        

  }

   public function get_allpayment_list()

    {

  

        $query = $this->db->query("select a.*,b.fullname,c.name from payments as a, user_login as b ,membership as c where b.USERID=a.USERID and c.id=a.package_id ORDER BY a.id DESC");
// var_dump($this->db->last_query());
            $result = $query->result_array(); 

        return $result;                          

    }

    public function get_orders_list()

    {
        $query = $this->db->query("select a.*,b.fullname,b.email,c.name from user_addon_requests as a, user_login as b ,membership as c where b.USERID=a.user_id and c.id=a.membership_id ORDER BY a.id DESC");
            $result = $query->result_array(); 

        return $result;                          

    }

  public function get_completepayment_list($type, $start, $end)

    {

    $last_append = '';

        if($type==1)

        {

        //$last_append = "LIMIT $start , $end";   

        }

        $query = $this->db->query("SELECT a.*, s.fullname as buyer_name, sm.fullname as seller_name ,ba.paypal_email_id

                                    FROM  `payments`as a

                                    LEFT JOIN bank_account as ba ON ba.user_id = a.seller_id

                                    LEFT JOIN members as s ON s.USERID = a.USERID   

                                    LEFT JOIN members as sm ON sm.USERID = a.seller_id 

                                    WHERE a.seller_status = 6 ".$last_append."" );

                   



              // SELECT a.*, s.fullname as buyer_name, sm.fullname as seller_name ,ba.paypal_email_id

              //                       FROM  `payments`as a

              //                       LEFT JOIN bank_account as ba ON ba.user_id = a.seller_id

              //                       LEFT JOIN members as s ON s.USERID = a.USERID   

              //                       LEFT JOIN members as sm ON sm.USERID = a.seller_id 

              //                       WHERE a.seller_status=6 ".$last_append."

                  

            if($type==0){

       $result = $query->num_rows(); 

      }else { 

        

        $result = $query->result_array(); 

      }

       

       

        return $result;                          

    }  

  public function get_declinepayment_list($type, $start, $end)

    {

    $last_append = '';

        if($type==1)

        {

        //$last_append = " LIMIT $start , $end";   

        }

        $query = $this->db->query("SELECT a.*, s.fullname as buyer_name, sm.fullname as seller_name ,ba.paypal_email_id

                                    FROM  `payments`as a

                                    LEFT JOIN bank_account as ba ON ba.user_id = a.USERID

                  LEFT JOIN members as s ON s.USERID = a.USERID 

                  LEFT JOIN members as sm ON sm.USERID = a.seller_id 

                  WHERE a.seller_status=5 ".$last_append." ");

                  

            if($type==0){

       $result = $query->num_rows(); 

      }else { 

        $result = $query->result_array(); 

      }

        return $result;                          

    }  

  public function get_Pendingpayment_list($type, $start, $end)

    {

    $last_append = '';

        if($type==1)

        {

        //$last_append = " LIMIT $start , $end";   

        }

        $query = $this->db->query("SELECT a.*, s.fullname as buyer_name, sm.fullname as seller_name ,ba.paypal_email_id

                                    FROM  `payments`as a

                                    LEFT JOIN bank_account as ba ON ba.user_id = a.seller_id

                  LEFT JOIN members as s ON s.USERID = a.USERID 

                  LEFT JOIN members as sm ON sm.USERID = a.seller_id 

                  WHERE (a.seller_status=2 OR a.seller_status=3) ".$last_append." ");

      

      if($type==0){

       $result = $query->num_rows(); 

      }else { 

        $result = $query->result_array(); 

      }

        return $result;                          

    } 





    public function get_rejected_list()



    {



        /*$query = $this->db->query("SELECT br.*,m.username as seller_name,m1.username as buyer_name,p.seller_status,p.payment_status,sg.title FROM buyer_rejected_list br LEFT JOIN members m on m.USERID = br.seller_id LEFT JOIN members m1 on m1.USERID = br.buyer_id LEFT JOIN payments p on p.seller_status = m.USERID LEFT JOIN sell_gigs sg on sg.user_id = br.seller_id");*/





        $query = $this->db->query("SELECT BRL.*,M.fullname as buyername ,M1.fullname as sellername,SG.title as gig_name,p.id as                        seller_order FROM buyer_rejected_list BRL 

                                    LEFT JOIN sell_gigs SG ON SG.id= BRL.gig_id 

                                    LEFT JOIN members M ON M.USERID= BRL.buyer_id 

                                    LEFT JOIN payments p on p.id = BRL.order_id

                                    LEFT JOIN members M1 ON M1.USERID= BRL.seller_id ORDER by id desc");

        //echo$this->db->last_query();exit;



        $result = $query->result_array(); 



        return $result;   



    }



    public function reject_accept($change_reject_status,$id,$order_id)

    {

        $query = $this->db->query("UPDATE buyer_rejected_list SET status = '".$change_reject_status."',rejected_request = 1 WHERE id = '".$id."'");



        $query = $this->db->query("UPDATE payments SET seller_status = 3 WHERE id = '".$order_id."'");



      //echo$this->db->last_query();exit;

        

        return $query;

    }





    public function cancel_request($list_id)

    {



        //$id = $this->session->userdata('SESSION_USER_ID');



            $request = $this->db->query("SELECT b.*,m.username as seller_name,m.email as seller_email, a.name as admin_name,a.email as                                  admin_email,m1.username as buyer_name,s.title from buyer_rejected_list b

                                LEFT JOIN members m on m.USERID = b.seller_id

                                LEFT JOIN members m1 on m1.USERID = b.buyer_id

                                LEFT JOIN sell_gigs s on s.user_id = b.seller_id

                                LEFT JOIN administrators a on a.ADMINID = 2

                                WHERE b.id = $list_id");



       //echo $this->db->last_query();exit;







        $result = $request->row_array();





        return $result;

    }





  public function get_cancelpayment_list($type, $start, $end)

    {

    $last_append = '';

        if($type==1)

        {

        //$last_append = " LIMIT $start , $end";   

        }

        $query = $this->db->query("SELECT a.*,s.email as buyer_email, s.fullname as buyer_name, sm.fullname as seller_name ,ba.paypal_email_id

                                    FROM  `payments`as a

                                    LEFT JOIN bank_account as ba ON ba.user_id = a.USERID

                  LEFT JOIN members as s ON s.USERID = a.USERID 

                  LEFT JOIN members as sm ON sm.USERID = a.seller_id 

                  WHERE a.buyer_status=1 ".$last_append." ");

                  

    if($type==0){

       $result = $query->num_rows(); 

    }else { 

      $result = $query->result_array(); 

    } 

        return $result;                          

    }  

      // All Payment Details (Incoming withdrawl , cancel , decline )

     public function get_all_list($type, $start, $end)

    {

        $last_append = '';

        if($type==1)

        {

       // $last_append = " LIMIT $start , $end";   

        }

        $query_string ="SELECT a.*, s.fullname as buyer_name,va.paypal_email_id as buyer_paybalemail,s.email as buyer_email,sg.title,sm.email as selleremail, sm.fullname as seller_name ,ba.paypal_email_id FROM  `payments`as a

                            LEFT JOIN bank_account as ba ON ba.user_id = a.USERID

                            LEFT JOIN sell_gigs as sg ON sg.id = a.gigs_id

                            LEFT JOIN members as s ON s.USERID = a.USERID   

                            LEFT JOIN members as sm ON sm.USERID = a.seller_id 

               LEFT JOIN bank_account as va ON va.user_id = a.seller_id

              WHERE  (a.payment_status = 1 OR a.cancel_accept = 1 OR a.decline_accept = 1) AND a.payment_status != 2 ".$last_append."";

      $query = $this->db->query($query_string);     

      // Where condition apply need request payment and cancel or decline   

        //WHERE  (a.buyer_status=1 OR a.seller_status=5) AND a.payment_status != 2          

        //WHERE  a.payment_status = 2 OR a.buyer_status=1 OR a.seller_status=5          

        //WHERE (a.payment_status != 2 AND a.buyer_status=1) OR (a.payment_status != 2 AND a.seller_status=5) ".$last_append."  

        //WHERE (a.payment_status != 2 AND a.buyer_status=1) OR (a.payment_status != 2 AND (a.seller_status=5 OR a.seller_status=6)) 

                  

        if($type==0){

             $result = $query->num_rows(); 

        }else { 

            $result = $query->result_array(); 

        } 

    

        return $result;                          

    }    

   /*   public function get_all_list($type, $start, $end)

    {

        $last_append = '';

        if($type==1)

        {

       // $last_append = " LIMIT $start , $end";   

        }

        $query_string ="SELECT a.*, s.fullname as buyer_name,s.email as buyer_email,sg.title,sm.email as selleremail, sm.fullname as seller_name,va.paypal_email_id as buyer_paybalemail,ba.paypal_email_id FROM  `payments`as a

                            LEFT JOIN bank_account as ba ON ba.user_id = a.USERID

                           

                            LEFT JOIN sell_gigs as sg ON sg.id = a.gigs_id

                            LEFT JOIN members as s ON s.USERID = a.USERID   

                LEFT JOIN bank_account as va ON ba.user_id = s.USERID

                            LEFT JOIN members as sm ON sm.USERID = a.seller_id 

              WHERE  (a.payment_status = 1 OR a.cancel_accept = 1 OR a.decline_accept = 1) AND a.payment_status != 2 ".$last_append."";

      $query = $this->db->query($query_string);       

      // Where condition apply need request payment and cancel or decline   

        //WHERE  (a.buyer_status=1 OR a.seller_status=5) AND a.payment_status != 2          

        //WHERE  a.payment_status = 2 OR a.buyer_status=1 OR a.seller_status=5          

        //WHERE (a.payment_status != 2 AND a.buyer_status=1) OR (a.payment_status != 2 AND a.seller_status=5) ".$last_append."  

        //WHERE (a.payment_status != 2 AND a.buyer_status=1) OR (a.payment_status != 2 AND (a.seller_status=5 OR a.seller_status=6)) 

                  

        if($type==0){

             $result = $query->num_rows(); 

        }else { 

            $result = $query->result_array(); 

        } 

    

        return $result;                          

    }           */



     public function edit_payment_gateway($id)

    {

        $query = $this->db->query(" SELECT * FROM `payment_gateways` WHERE `id` = $id ");

        $result = $query->row_array();

        return $result;

    }



     public function all_payment_gateway()

    {

      $this->db->select('*');

        $this->db->from('payment_gateways');

        //$this->db->where('Id',$id);

        $query = $this->db->get();

        return $query->result_array();         

    } 



    public function gig_preview($id){



        $query = $this->db->query("SELECT * FROM  sell_gigs WHERE  md5(id) = '".$id."'");

        

        if($query->num_rows() > 0){

            $data = $query->row_array();

            $gig_id = $data['id'];

            $data['extra_gigs'] = array();

            $data['gig_images'] = array();



            $query1 = $this->db->query("SELECT * FROM  extra_gigs WHERE   gigs_id = $gig_id");

            if($query1->num_rows() > 0){

               $extra_gig = $query1->result_array(); 

               $data['extra_gigs'] = $extra_gig;

            }

            $query2 = $this->db->query("SELECT * FROM gigs_image WHERE   gig_id = $gig_id");

            if($query2->num_rows() > 0){

               $gig_images = $query2->result_array(); 

               $data['gig_images'] = $gig_images;

            }

            return $data;

        }else{

            return FALSE;

        }



    }

    public function smtp_setting() {

       $data = array();

       $stmt = "SELECT * FROM system_settings ORDER BY id ASC";

       $query = $this->db->query($stmt);

       if ($query->num_rows()) {

           $data = $query->result_array();

       }

       return $data;

   }





   public function delete_users($ids)

   {

      for($i=0; $i<count($ids); $i++)

      {

        $this->db->query("DELETE FROM `user_login` WHERE USERID='".$ids[$i]."'");

      }

   }

    

  public function delete_users_post_dsp($ids)

   {

      for($i=0; $i<count($ids); $i++)

      {

        $data=$this->db->query("select * from sell_gigs where user_id='".$ids[$i]."'");



       $res=$data->result_array(); 

         for($j=0; $j<count($res); $j++)

         {



            $this->db->query("DELETE FROM `sell_gigs` WHERE id='".$res[$j]["id"]."'");

            $this->db->query("DELETE FROM `extra_gigs` WHERE gigs_id='".$res[$j]["id"]."'");

            $this->db->query("DELETE FROM `gigs_image` WHERE gig_id='".$res[$j]["id"]."'");

            $this->db->query("DELETE FROM `gigs_video` WHERE gig_id='".$res[$j]["id"]."'");

            $this->db->query("DELETE FROM `location` WHERE id='".$res[$j]["id"]."'");

         }

      }

   }

    public function membership()

    {

        $query = $this->db->query("SELECT * FROM `membership` WHERE `types` = 'Addon'");

        $result = $query->result_array();

        return $result;        

    }

    public function edit_membership($id){





        $query = $this->db->query(" SELECT * from membership WHERE id='".$id."'");

        $result = $query->row_array();

        return $result;        

    }



    Public function insert_membership($data)

    {

     // var_dump($data);
$benifits=[];
$values=[];
$sub_heading=[];
// var_dump($data["benifits"]);
for($i=0; $i<count($data["benifits"]); $i++)
{
     var_dump($data["benifits"][$i]);
     if($data["benifits"][$i]!="" || $data["benifits"][$i]=="0")
     {
        $beli_val=$data["benifits"][$i];
     }
     else
     {
      $beli_val="--";  
     }
     if($data["services_val_".$i]!="" || $data["benifits"][$i]=="0")
     {
        $ser_val=$data["services_val_".$i];
     }
     else
     {
       $ser_val="--";  
     }
     if($data["services_text_".$i]!="" || $data["benifits"][$i]=="0")
     {
        $text_val=$data["services_text_".$i];
     }
     else
     {
       $text_val="--";  
     }
     array_push($benifits, $beli_val);
     array_push($values, $ser_val);
     array_push($sub_heading, $text_val);
}

 $set_value["name"]=$data["name"];

 $set_value["price"]=$data["price"];
  $set_value["duration"]=$data["duration"];
  $set_value["package_for"]=$data["package_for"];

 $set_value["benifits"]=implode("*#*",$benifits);

  $set_value["values"]=implode("*#*",$values);

  $set_value["sub_heading"]=implode("*#*",$sub_heading);

 $set_value["create_date"]=date("d-M-Y");

 $set_value["status"]=0;
 $set_value["types"]='Membership';

      $result = $this->db->insert('membership', $set_value);


     // $this->db->insert('membership',$insert_data);

  // var_dump($this->db->last_query());

  

    }

     public function member_service($id)

    {

        $query = $this->db->query(" SELECT * from membership WHERE id='".$id."'");

        $result = $query->row_array();

        return $result;        

    }

     public function update_membership($data){


$benifits=[];
$values=[];
$sub_heading=[];
// var_dump($data["benifits"]);
for($i=0; $i<count($data["benifits"]); $i++)
{
     // var_dump($data["benifits"][$i]);
     if($data["benifits"][$i]!="" || $data["benifits"][$i]!="0")
     {
        $beli_val=$data["benifits"][$i];
     }
     else
     {
      $beli_val="--";  
     }
     if($data["services_val_".$i]!="" || $data["benifits"][$i]!="0")
     {
        $ser_val=$data["services_val_".$i];
     }
     else
     {
       $ser_val="--";  
     }
     if($data["services_text_".$i]!="" || $data["benifits"][$i]!="0")
     {
        $text_val=$data["services_text_".$i];
     }
     else
     {
       $text_val="--";  
     }
     array_push($benifits, $beli_val);
     array_push($values, $ser_val);
     array_push($sub_heading, $text_val);
}

$id=$data["id"];

 $set_value["name"]=$data["name"];

 $set_value["price"]=$data["price"];
  $set_value["duration"]=$data["duration"];
  $set_value["duration_type"]=$data["duration_type"];

 $set_value["benifits"]=implode("*#*",$benifits);

  $set_value["values"]=implode("*#*",$values);

  $set_value["sub_heading"]=implode("*#*",$sub_heading);
$set_value["package_for"]=$data["package_for"];
 $set_value["create_date"]=date("d-M-Y");

 $set_value["status"]=0;

          $this->db->where('id', $id);

      $result = $this->db->update('membership', $set_value);

    }

    

    public function check_membership($data)

    {

       $res= $this->db->query("select * from membership where name='".$data['name']."'");

        if($res->row_array())

        {

            return true;

        }

        else

        {

           return false;   

        }

    }

public function check_membership_edit($data)

    {

       $res= $this->db->query("select * from membership where name='".$data['name']."' and id!='".$data['id']."'");

        if($res->row_array())

        {

            return true;

        }

        else

        {

           return false;   

        }

    }



  public function get_service_name(){

              $query = $this->db->query(" SELECT * from service_dropdown");

        $result = $query->result_array();

        return $result; 

  } 

public function set_status_package($ids,$poperation)
{
    if(@$poperation=="Delete")
   {
      for($i=0; $i<count($ids); $i++)
      {
         
          $this->db->where(array("id"=>$ids[$i]));
     $this->db->delete('membership');
       
        var_dump($this->db->last_query());
      }
   }
   else
   {
    if(@$poperation=="Enable")
       {
         $sta=0;
       }
       else
       {
        $sta=1;
       }
      for($i=0; $i<count($ids); $i++)
      {

        $this->db->query("UPDATE membership SET status='".$sta."' WHERE id='".$ids[$i]."'");
        // var_dump($this->db->last_query());
      }
   }
    
}

 public function set_status_dropdown($ids,$poperation)
   {
       if($poperation=="Activate")
       {
         $sta=0;
       }
       else
       {
        $sta=1;
       }
      for($i=0; $i<count($ids); $i++)
      {

        $this->db->query("UPDATE dropdown SET status='".$sta."' WHERE id='".$ids[$i]."'");
        var_dump($this->db->last_query());
      }
   }
   public function insert_city($data)
{
   $data['country']="Australia";
   /*$inser_data["name"]=$data["addon"];
   $inser_data["price"]=$data["price"];
   $inser_data["types"]="Addon";
   $inser_data["duration"]=$data["duration"];
   $inser_data["benifits"]=$data["add_positioning"];
   $inser_data["values"]=$data["No_of_profiles"];
   $inser_data["create_date"]=date("d-M-Y");
   $inser_data["status"]=0;
   $inser_data["package_for"]="Every One";*/
   $query = $this->db->insert("location",$data);
   return $query;

   
}

}

?>