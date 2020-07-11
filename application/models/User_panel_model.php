<?php 

class User_panel_model extends CI_Model{

public function escort_feedback_data_dsp($id)
{
    $data=$this->db->query("select * from feedback where to_user_id='".$id."' and status='0' ORDER BY `feedback`.`id` DESC");
    // var_dump($this->db->last_query());
    return $data->result_array();
}    

public function get_one_user($id)
{
    return $this->db->query("select * from user_login where USERID='".$id."'")->row_array();
}

public function get_one_escort_info($id)
{
    return $this->db->query("select * from escort_info where escort_id='".$id."'")->row_array();
}

public function get_one_escort_availability($id)
{
    $data= $this->db->query("select * from escort_availability where escort_id='".@$id."' and packeg_finish_date_string >'".strtotime(date("d-M-Y"))."'");
    // var_dump(strtotime("d-M-Y"));
    return $data->row_array();
}

public function get_one_escort_rate($id)
{
    return $this->db->query("select * from escort_rate where escort_id='".@$id."'")->result_array();
}

public function get_one_escort_think_prefer($id)
{
    return $this->db->query("select * from escort_think_prefer where escort_id='".@$id."'")->row_array();
}

public function get_one_escort_tour($id)
{
    return $this->db->query("select * from escort_tour where escort_id='".@$id."' and ture_status !='Done' ")->result_array();
}

public function get_one_escort_social_link($id)
{
    return $this->db->query("select * from social_login where user_id='".@$id."'")->row_array();
}


public function get_one_escort_gallsery_image($ids)
{
    return $this->db->query("select * from gallery_image where user_id='".@$ids."' ORDER BY id DESC")->result_array();
}

public function get_all_my_escort($ids)
{
    $data=$this->db->query("select * from user_login where `USERID` IN ('".implode("','",$ids)."')")->result_array();
    return $data;
}

public function get_all_escort_id_of_agecy($id)
{
    $ids=$this->db->query("select escort_id from escort_info where agency_id='".@$id."' and escort_id !='".@$id."'")->result_array();
  $set_ids=[];
  foreach ($ids as $id_get) {
      array_push($set_ids, $id_get["escort_id"]);
  }
  return $set_ids;
}

public function get_all_escort_rate_of_one_agency($ids)
{
        $data=$this->db->query("SELECT * FROM `escort_rate` WHERE `escort_id` IN ('".implode(",",$ids)."')")->result_array();
    return $data;
}




public function set_social_link($data)
{
    $check_id=$this->db->query("select * from social_login where user_id='".$data["user_id"]."'")->row_array();
  
    if($check_id)
    {
        $this->db->where(array("user_id"=>$data["user_id"]));
        $this->db->update("social_login",$data);

    }
    else
    {
        $this->db->insert("social_login",$data);
    }
}

    public function update_tour_info_of_escort($id)
    {
        $data=$this->db->query("select * from escort_tour where escort_id='".$id."' and ture_status !='Done'")->result_array();
       if($data)
       {
        foreach($data as $dat) {
            $set_status="Pending";
            if($dat["from_date_in_string"]<=strtotime(date('d-m-Y')))
            {
              $set_status='Running';
            }
            if($dat["to_date_in_string"]<=strtotime(date('d-m-Y')))
            {
              $set_status='Done';
            }

            
            $this->db->query("UPDATE escort_tour SET ture_status='". $set_status."' , last_update='".date("d-M-y")."' WHERE id='". $dat["id"]."'");

        }
       }
    }

     public function policy_setting()

    {

        $query = $this->db->query("SELECT * FROM `policy_settings` WHERE `status` = 0 ;");

        $result = $query->result_array();

        return $result;                  

    }

    

    public function profile($user_id)

    {

        $query = $this->db->query("SELECT members.*,(SELECT `profession_name` FROM `profession` WHERE id = members.profession ) as profession_name FROM `members` WHERE `USERID` = $user_id AND `verified` = 0 AND `status` = 0 ;");

        $result = $query->row_array();

        return $result;          

    }

   

     public function country_list()

    {   

        $query = $this->db->query("SELECT * FROM `country` WHERE `country_status` = 1 ;");

        $result = $query->result_array();

        return $result;                  

    }



  public function state_list()

    {   

       $query = $this->db->query("SELECT * FROM `states` WHERE `country_id` = 231 AND `state_status` = 1");

        $result = $query->result_array();

        return $result;                  

    }



    public function check_username($username)

    {        

        $query = $this->db->query("SELECT * FROM `user_login` WHERE `username` = '".$username."'");

        $result = $query->row_array();

        return $result;          

    }

    public function check_phone($phone)

    {        

        $query = $this->db->query("SELECT * FROM `user_login` WHERE `contact` = '$phone';");
var_dump($this->db->last_query());
        $result = $query->num_rows();

        return $result;          

    }

    public function check_email($email)

    {        

        $query = $this->db->query("SELECT * FROM `user_login` WHERE `email` = '$email';");

 

        $result = $query->num_rows();

        return $result;          

    }   

    public function get_client_list()

    {

        $query = $this->db->query("SELECT * FROM `client` WHERE `status` = 0 ;");

        $result = $query->result_array();

        return $result;                  

    }

     public function categories()

    {

        $query = $this->db->query(" SELECT * FROM `categories` WHERE `status` = 0 AND parent = 0 AND delete_sts =0 ");

        $result = $query->result_array();

        return $result;        

    }

    public function categories_subcategories()

    {

        $query = $this->db->query(" SELECT * FROM `categories` WHERE `status` = 0 AND delete_sts =0 ");

        $result = $query->result_array();

        return $result;        

    }

    public function get_logo()

    {

        $query = $this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'logo_front' ");

        $result = $query->row_array();

        return $result;                

    }

    public function get_slogan()

    {

        $query = $this->db->query("SELECT * FROM `system_settings` WHERE `key` = 'website_slogan' ");

        $result = $query->row_array();

        return $result;                

    }

    public function footer_main_menu()

    {

        $query = $this->db->query(" SELECT * FROM `footer_menu` WHERE `status` =  1 ");

        $result = $query->result_array();

        return $result;        

    }

    public function footer_sub_menu()

    {

        $query = $this->db->query(" SELECT * FROM `footer_submenu` WHERE `status` = 1  ");

        $result = $query->result_array();

        return $result;        

    }

    public function system_setting()    

    {

        $query = $this->db->query("SELECT * FROM `system_settings`");

        $result = $query->result_array();

        return $result;        

    }

     public function get_user_data($id) {

		 $st= ("SELECT a.*,cu.country,cu.sortname,st.state_name 

			 FROM `members` a

			 left join country cu on cu.id = a.country

			 left join states st on st.state_id = a.state

			 where a.USERID = ".$id." ");

		

		$query = $this->db->query($st);							 

         if ($query->num_rows()) {

               return $query->row_array();

         }

         return false;

    }

    public function membership()
    {
        $query = $this->db->query(" SELECT * from membership");
        $result = $query->result_array();
        return $result;        
    }
  

   /*public function UpdateCurrentCuuencyRate(){

	   

	   $query  = $this->db->query("SELECT * FROM `currency` ORDER BY `created_date` DESC LIMIT 0 , 1 ;");

	   $result = $query->row_array();		 

	  

	if(!empty($result))

		{

			$last_inserted_date = date('Y-m-d',strtotime($result['created_date']));

			$current_date = date('Y-m-d');

			if($current_date!=$last_inserted_date)

			{

			$from   = 'USD'; 

			$to     = 'INR';

			$url    = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';

			

			$handle = fopen($url, 'r');			

			if ($handle) 

			{

				$result = fgets($handle, 4096);

				fclose($handle);

			}			

			$allData 	 			= explode(',',$result); 

			$data['dollar_rate'] 	= $allData[1];

			$data['indian_rate']  	= (1 / $data['dollar_rate']);		

			$this->db->insert('currency',$data);	

			}

		}

		else

			{

				$from   = 'USD'; 

				$to     = 'INR';

				$url    = 'http://finance.yahoo.com/d/quotes.csv?e=.csv&f=sl1d1t1&s='. $from . $to .'=X';

				$handle = fopen($url, 'r');			

				if ($handle) 

				{

					$result = fgets($handle, 4096);

					fclose($handle);

				}			

				$allData 	 			= explode(',',$result); 

				$data['dollar_rate'] 	= $allData[1];

				$data['indian_rate']  	= (1 / $data['dollar_rate']);		

				$this->db->insert('currency',$data);				

			}

   }  */

   

    

}

?>