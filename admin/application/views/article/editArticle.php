<div class="container text-right">
	<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ثبت مطلب جدید</h3>
      </div>
       <?php echo form_open('update-article');?>
      <div class="panel-body">
            <?php echo validation_errors(); ?>
	 <?php echo form_hidden('id',$id);?>
         <div class="clearfix"></div>
          <div class="form-group col-md-6">
          
            <label for="section">بخش</label>
            <?php echo section_dropdown('section', $allSection, $section,'class="form-control text-right"');?>
          </div>
          <div class="form-group col-md-6">
            <label for="title">عنوان مطلب</label>
            <input type="text" name="title" class="form-control text-right" id="title" value="<?php echo $title ?>" placeholder="عنوان مطلب">
          </div>
           <div class="clearfix"></div>
          <div class="form-group col-md-12">
            <label for="keywords">کلمات کلیدی</label>
           <input type="text" name="keywords" class="form-control text-right" id="keywords" value="<?php echo $keywords ?>" placeholder="کلمات کلیدی">
          </div>
          
         
         <div class="form-group col-md-6">
          		<label for="title">پایان انتشار</label>
              <div class="input-group">
                    <input type="text" class="form-control text-right datepicker" name="endPublic" value="<?php echo $publish_down?>" placeholder="پایان انتشار">
                    <span class="input-group-addon glyphicon glyphicon-calendar"></span>
               </div>
          </div>

        <div class="form-group col-md-6">
        	<label for="title">شروع انتشار</label>
            <div class="input-group">
              <input type="text" class="form-control text-right datepicker" name="startPublic" value="<?php echo $publish_up?>" placeholder="شروع انتشار">
              <span class="input-group-addon glyphicon glyphicon-calendar"></span>
            </div>
        </div>
          <div class="clearfix"></div>
           <div class="form-group col-md-12">
            <label for="summary">خلاصه مطلب</label>
            <?php echo form_textarea('summary',$summary,'class="redactor_content form-control"')?>
          </div>
          <div class="form-group col-md-12">
            <label for="fulltext">ادامه مطلب</label>
            <?php echo form_textarea('fulltext',$fulltext,'class="redactor_content form-control"')?>
          </div>
          <div class="form-group col-md-12">
        	<label for="fulltext">عکس</label>
            <input type="file" name="userfile" size="30"/>
        </div>
      </div>
      <div class="panel-footer">
   		<div class="text-left">      
         
         <?php echo btn_cancel('admin')?>
         <button type="submit" class="btn btn-primary">ذخیره</button>
 		</div>   
      </div>
       <?php echo form_close();?>
    </div>
    
    

    </div>
</div>