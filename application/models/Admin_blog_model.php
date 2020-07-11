<?php 
class admin_blog_model extends CI_Model
{

public function get_blog_category()
{
    $data=$this->db->query("SELECT * FROM `blog_categories` ORDER BY `blog_categories`.`id` DESC");
    $data=$data->result_array();
    return $data;
}

public function edit_category_blog_cat($category_id)
{
    $data= $this->db->query("select * from blog_categories where id='".$category_id."'");
   
   $data2=$data->row_array();
    return $data2;
}


public function get_content_for_Blog(){
    $data=$this->db->query("SELECT * FROM `our_blog` ORDER BY `our_blog`.`id` DESC");
    $data=$data->result_array();
    return $data;
}

public function get_cat_for_blog()
{
     $data=$this->db->query("SELECT * FROM `blog_categories` where status='0' ORDER BY `blog_categories`.`name` ASC");
    $data=$data->result_array();
    return $data;
}


public function edit_content_blog_cat($id)
{
    $data= $this->db->query("select * from our_blog where id='".$id."'");
   
   $data2=$data->row_array();
    return $data2;
}    

public function get_cat_for_content()
{
     $data=$this->db->query("SELECT * FROM `blog_categories` where status='0' ORDER BY `blog_categories`.`name` ASC");
    $data=$data->result_array();
    return $data;
}

}
?>