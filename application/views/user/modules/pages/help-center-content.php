<div class="container">
<div class="row">
  <div class="col-md-10 col-md-offset-1">
    
  <h2><?php echo implode(" ", explode("-", $page_title)); ?></h2>
 
  <div class="panel-group" id="accordion">
    <?php if(@$contect) { foreach($contect as $cont) { ?>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo @$cont["id"]; ?>"><?php echo @$cont["name"]; ?></a>
        </h4>
      </div>
      <div id="collapse_<?php echo @$cont["id"]; ?>" class="panel-collapse collapse">
        <div class="panel-body"><?php echo @$cont["page_content"]; ?></div>
      </div>
    </div>
   <?php } } ?>
  </div> 
</div>
  </div>
</div>