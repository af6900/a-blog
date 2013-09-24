<div class="container">
	<div class="row">
	<div class="panel panel-default">
    	<div class="panel-heading text-right">
        	<h3 class="panel-title">ویرایش قالب ایمیل</h3>
        </div>
      <?php echo form_open('admin/EmailTemplate/save');?>
        <div class="panel-body">

        	<?php echo form_hidden('id',$id);?>
            <?php echo form_textarea('template',$template,'class="form-control"')?>
       
        </div>
        <div class="panel-footer text-left">
            <button type="submit" class="btn btn-primary">ذخیره</button>
        </div>
     <?php echo form_close();?> 
    </div>


</div>
</div>