<div class="tabbable text-right"> <!-- Only required for left/right tabs -->

  <ul class="nav nav-tabs">
    <li class="active pull-right"><a href="#tab1" data-toggle="tab">ویرایش قالب</a></li>
  </ul>
  
  
  <div class="tab-content">
  
    <div class="tab-pane active" id="tab1">
		<?php echo form_open('admin/EmailTemplate/save');?>
        	<?php echo form_hidden('id',$id);?>
            <?php echo form_textarea('template',$template,'class="span12"')?>
            <p><?php echo form_submit('submit','ذخیره','class="btn btn-primary pull-left"')?></p>
        <?php echo form_close();?> 
    </div><!--tab1-->
    
  </div><!--tab-content-->
  
</div><!--tabbable-->
