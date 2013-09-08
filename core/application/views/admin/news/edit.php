<div class="container dir-rtl">
	<div class="row">
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ویرایش</h3>
  </div>
  <?php echo form_open('admin-news-update');?>
  <div class="panel-body">    
<?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 

        	<?php echo form_hidden('id',$id)?>
             <div class="col-md-6">
                 <div class="form-group">
                    <label for="keywords">کلمات کلیدی</label>
                    <input type="text" value="<?php echo $keywords?>" name="keywords" required class="form-control text-right" id="keywords" placeholder="کلمات کلیدی" tabindex="2">
                  </div>
              </div>
              
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="newsTitle">عنوان خبر</label>
                    <input type="text" value="<?php echo $title?>" name="title" required class="form-control text-right" id="newsTitle" placeholder="عنوان خبر" tabindex="1">
                  </div>
              </div>
              
             <div class="col-md-6">
             <label for="newsTitle">پایان انتشار</label>
                <div class="input-group">
                  <input type="text" value="<?php echo $endDate?>" name="end" class="form-control datepicker text-right" required placeholder="" tabindex="4">
                   <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                </div>
              </div>
              
             <div class="col-md-6">
             <label for="newsTitle">شروع انتشار</label>
                <div class="input-group">
                  <input type="text" value="<?php echo $startDate?>" name="start" class="form-control datepicker text-right" required placeholder="" tabindex="3">
                   <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                </div>
              </div>  
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
           			<label for="newsText">متن خبر</label>
                    <?php echo form_textarea('description',$description,'class="redactor_content" tabindex="5"')?>
                </div>
        
  </div>
  <div class="panel-footer">
  <input type="submit" class="btn btn-primary" value="ذخیره">
  </div>
</div>
       <?php echo form_close();?> 
</div>
</div>