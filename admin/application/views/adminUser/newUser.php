<div class="container dir-rtl">
	<div class="row">
    	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">ثبت کاربر</h3>
        </div>
        
       <div class="well-sm"><span class="label label-danger">پر کردن همه فیلد ها الزامی است</span></div>
       <?php echo form_open_multipart('admin-user-save');?>
       
        <div class="panel-body">
		<?php echo messages($msg,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?>
        <div class="col-md-6">
             <div class="form-group">
                <label for="userName">نام کاربری</label>
                <input type="text" name="LoginName" value="<?php echo set_value('LoginName')?>" class="form-control" id="userName" placeholder="نام کاربری خود را وارد کنید" required tabindex="2">
               <p class="help-block" style="color:#F00">
               <?php echo form_error('LoginName'); ?></span>
              </div>
             <div class="form-group">
                <label for="cUserPassword">تکرار رمز عبور</label>
                <input type="password" name="LoginPassconf"  class="form-control" id="cUserPassword" placeholder="تکرار رمز عبور" required tabindex="4">
                <p class="help-block" style="color:#F00">
                <?php echo form_error('LoginPassconf'); ?>
                </p>
              </div>
             <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" name="UserEmail" value="<?php echo set_value('UserEmail')?>" oninput="check(this)" class="form-control email" 
                id="email" placeholder="ایمیل" required tabindex="6">
                <p class="help-block" style="color:#F00">
                	<?php echo form_error('UserEmail'); ?>
                </p>
              </div>
        </div>
        <div class="col-md-6">
             <div class="form-group">
                <label for="name">نام</label>
                <input type="test" class="form-control" name="name" id="name" placeholder="نام خود را وارد کنید" required tabindex="1" >
              </div>
             <div class="form-group">
                <label for="userPassword">رمز عبور</label>
                <input type="password" name="LoginPass" value="<?php echo form_error('LoginPass'); ?>" class="form-control" id="userPassword" placeholder="رمز عبور را وارد کنید" required tabindex="3" >
                
                <p class="help-block" style="color:#F00">
                <?php echo form_error('LoginPass'); ?>
                </p>
              </div>
             <div class="form-group">
                <label for="mobile">موبایل</label>
                <input type="text" name="mobile" value="<?php echo set_value('mobile')?>" class="form-control" id="mobile" required placeholder="موبایل" tabindex="5">
                <p class="help-block" style="color:#F00">
                	<?php echo form_error('mobile'); ?>
                </p>
              </div>
        </div>
        
        <div class="col-md-3">
            <div class="form-group">
              <label for="exampleInputFile">آیدی یاهو</label>
              <input type="text" name="yahoo" value="<?php echo set_value('yahoo')?>" class="form-control" id="email" placeholder="یاهو ایدی" required tabindex="7">
            </div>
        </div>
        <div class="col-md-3">    
            <div class="form-group">
              <label for="exampleInputFile">فیس بوک</label>
              <input type="url" name="facebook" value="<?php echo set_value('facebook')?>" class="form-control" id="email" placeholder="فیس بوک" required tabindex="8">
            </div>
         </div>
         <div class="col-md-3">
            <div class="form-group">
              <label for="exampleInputFile">تویتر</label>
              <input type="url" name="twitter" value="<?php echo set_value('twitter')?>" class="form-control" id="email" placeholder="تویتر" required tabindex="9">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
              <label for="exampleInputFile">اینستاگرام</label>
               <input type="url" name="instagram" value="<?php echo set_value('instagram')?>" class="form-control" id="email" placeholder="اینستاگرام" required tabindex="10">
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputFile">عکس کاربر</label>
              <input type="file" name="userfile" size="20"/>
              <p class="help-block">از این برای نشان دادن عکس کاربر در زیر نوشته ها استفاده میشود.</p>  
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="form-group">
              <label for="exampleInputFile">درباره من</label>
              <textarea name="about" class="form-control"><?php echo set_value('about')?></textarea>
            </div>
        </div>
        
       </div>
    	<div class="panel-footer text-left">
        <button type="submit" class="btn btn-primary">ذخیره</button>
        </div>
        <?php echo form_close();?>
    </div> 
</div>
</div>