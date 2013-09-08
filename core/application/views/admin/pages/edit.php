<script language="javascript">
$(document).ready(function(e) {
 	$('#deletePage').click(function(){
		var id = $(this).attr('delId');
	 	$.ajax({
			 type:'GET',
			 url:base_url+"ajaxProcessor/pages/delete",
			 data:{'id' : id},
			 success: function(data){
				 if(data == 1){
					 window.location=base_url+'admin'
					 }
				 }
			});
		}) 
});
</script>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/css/bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/css/bootstrap-responsive.css"/>
<div class="container dir-rtl">
	<div class="row">
		<div class="panel panel-default">
        	<div class="panel-heding">
            	<h3 class="panel-title">ویرایش</h3>
            </div>
            <div class="panel-body">
                
<?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
<?php echo form_open('update-pages');?>
<input type="hidden" id="delete" value="<?php echo $id?>" />
<div class="span12 dir-rtl">
 <div class="controls text-left">
 
 <?php echo form_submit('submit','ذخیره','class="btn btn-primary"')?>
 <input type="button" value="حذف" id="deletePage" class="btn btn-danger" delId='<?php echo $id?>' />
 </div>

</div>

<div class="span4 dir-rtl control-group">
	<label class="control-label">کلمات کلیدی</label>
    <div class="controls">
    	<input type="text" name="keywords" class="form-control text-right" value="<?php echo $keywords ?>"/>
    </div>
</div>



<div class="span4 dir-rtl control-group">
	<label class="control-label">عنوان انگلیسی</label>
    <div class="controls">
    	<input type="text" name="enTitle" class="form-control text-right" value="<?php echo $enTitle ?>"/>
    </div>
</div>


<div class="span4 dir-rtl control-group">
	<label class="control-label">عنوان صفحه</label>
    <div class="controls">
    	<input type="text" name="title" class="form-control text-right" value="<?php echo $title ?>"/>
    </div>
</div>

<div class="span12"><?php echo form_textarea('desc',$desc,'class="redactor_content"')?></div>


<div class="span12 dir-rtl ">
	<label class="control-label title">پلاگین ها</label>
    <div class="controls ">
    	<label class="label label-info" for="comment"><span>فرم نظر دهی</span> 
        	<input id="comment" type="radio" name="option" value="1"/  <?php if(isset($option) AND $option == 1){ echo 'checked="checked"';}?>></label>
        <label class="label label-info" for="register"><span>فرم ثبت نام</span> 
        	<input id="register" type="radio" name="option" value="2"  <?php if(isset($option) AND $option == 2){ echo 'checked="checked"';}?>/></label>
        <label class="label label-info" for="contact"><span>فرم تماس با ما</span> 
        	<input id="contact" type="radio" name="option" value="3"  <?php if(isset($option) AND $option == 3){ echo 'checked="checked"';}?>/></label>
    </div>
</div>

<?php echo form_close();?>
</div> <!--end div row-->
            </div>
            <div class="panel-footer">
            
            </div>
        </div>
	</div>
</div>
	

	

