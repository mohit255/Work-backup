<?php 
$services_name=explode("*#*",$list_data['benifits']);
$values=explode("*#*",$list_data['values']);
$sub_heading=explode("*#*",$list_data['sub_heading']);
 
 ?>
<table class="table table-striped table-condensed table-bordered no-margin">
                                 <thead>
                                    <tr>
                                       <th>#</th>
                                       <th>Services Name</th>
                                       <th>Value</th>
                                       <th>Text</th>
                                       
                                    </tr>
                                 </thead>
                                  <tbody>
                                    <?php for($i=0; $i<count($services_name); $i++) { ?>
                                    <tr>
                                       <td><?php echo @$i+1; ?></td>
                                       <td><?php echo @$services_name[$i]; ?></td>
                                       <td><?php echo @$values[$i]; ?></td>
                                       <td><?php echo @$sub_heading[$i]; ?></td>
                                       
                                    </tr>
                                    <?php } ?>
                                    
                                 </tbody>
                                 <tfoot>
                                    <tr>
                                       <th>#</th>
                                       <th>Services Name</th>
                                       <th>Value</th>
                                       <th>Text</th>
                                    </tr>
                                 </tfoot>
                                
                              </table>