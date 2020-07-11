<div class="row" id="sortable">
 	<?php if(@$data) { foreach ($data as $dat) { 
$images_data_get=$this->db->query("select * from gallery_image where id='".$dat["priborty"]."'")->row_array();


        if(@$images_data_get["image"])
        {
        	 $set_image=@$images_data_get["image"];
           $id=@$images_data_get["id"];
        }
        else
        {
        	$set_image=@$dat["image"];
           $id=@$dat["id"];
        }
 		?>
 	<div class="col-md-3 get_image_sumber" data-id="<?php echo @$id; ?>">
 		<img src="assets/uploads/<?php echo @$set_image; ?>" alt="Isabella - Image 1" class="img-responsive img-thumb">
 	</div>
 	<?php } } ?>
 	
 	

 </div>


 <script>
  $( function() {
    $( "#sortable" ).sortable();
    $( "#sortable" ).disableSelection();
  } );
  </script>