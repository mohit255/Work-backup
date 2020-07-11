<?php

class Cron extends CI_Controller{

    public function __construct(){    

    parent::__construct();

    error_reporting(0);


   
}

	public function index()
    {
    	$current_live_user =$this->db->query("select * from user_login where status='0' and verified='0' and types='Escort' and login_status='Login' and package_id!='' ORDER BY available_till DESC")->result_array();
		for ($i=0; $i < count($current_live_user); $i++) { 
		  if($current_live_user[$i]['available_till'] < date('Y-m-d H:i:s')){
		 // var_dump($current_live_user[$i]['USERID']."/".$current_live_user[$i]['available_till'])."<br>";
		    $this->db->where(array("USERID"=>@$current_live_user[$i]['USERID']));
		    $this->db->update('user_login',array("available_till"=>""));
		}}
		// echo date('Y-m-d H:i:s');
		// exit();

    }
    	

    

}

?>