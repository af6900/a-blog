<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container text-right">
	<div class="row">
    	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">ارسال ایمیل</h3>
        </div>
        
        <div class="panel-body">
        <?php echo form_open('form-admin-user-send-email')?>
        	<input type="hidden" value="<?php echo $id?>" name="id" />
			  <div class="form-group">
                <label for="emailTitle">عنوان ایمیل</label>
                <input name="title" type="text" class="form-control text-right" id="emailTitle" placeholder="عنوان ایمیل" required>
              </div>
              <?php echo form_textarea('text','','class="redactor_content form-control"')?>
        </div>
    	<div class="panel-footer text-left">
        	<button type="submit" class="btn btn-primary">ارسال</button>
        </div>
       <?php echo form_close()?>
    </div> 
</div>
</div>