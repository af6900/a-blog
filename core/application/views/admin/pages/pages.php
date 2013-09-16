<div class="container dir-rtl">
	<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ایجاد صفحه جدید</h3>
      </div>
	  <?php echo form_open('save-pages');?>
      <div class="panel-body">
        <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 

<div class="span4 dir-rtl control-group">
	<label class="control-label">کلمات کلیدی</label>
    <div class="controls">
    	<input type="text" name="keywords" class="form-control text-right"/>
    </div>
</div>



<div class="span4 dir-rtl control-group">
	<label class="control-label">عنوان انگلیسی</label>
    <div class="controls">
    	<input type="text" name="enTitle" class="form-control text-right"/>
    </div>
</div>


<div class="span4 dir-rtl control-group">
	<label class="control-label">عنوان صفحه</label>
    <div class="controls">
    	<input type="text" name="title" class="form-control text-right"/>
    </div>
</div>

<div class="span12"><?php echo form_textarea('desc',NULL,'class="redactor_content"')?></div>


<div class="span12 dir-rtl ">
	<label class="control-label title">پلاگین ها</label>
    <div class="controls ">
    	<label class="label label-info" for="comment"><span>فرم نظر دهی</span> <input id="comment" type="radio" name="option" value="1" disabled="disabled"/></label>
        <label class="label label-info" for="register"><span>فرم ثبت نام</span> <input id="register" type="radio" name="option" value="2" disabled="disabled"/></label>
        <label class="label label-info" for="contact"><span>فرم تماس با ما</span> <input id="contact" type="radio" name="option" value="3"/></label>
    </div>
</div>


      </div>
      <div class="panel-footer">
       
 <?php echo form_submit('submit','ذخیره','class="btn btn-primary"')?>
      </div>
<?php echo form_close();?>
    </div>




</div>
</div>
	

