<div class="container dir-rtl">
	<div class="row">
    	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">ثبت کاربر</h3>
        </div>
       <div class="well-sm"><span class="label label-danger">پر کردن همه فیلد ها الزامی است</span></div>
       <?php echo form_open_multipart('admin-user-update');?>
        <div class="panel-body">
		<?php echo form_hidden('id',$id)?> 
		<div class="col-md-6 pull-right">
             <div class="form-group">
                <label for="name">نام</label>
                <input type="test" value="<?php echo $name?>" class="form-control" name="name" id="name" placeholder="نام خود را وارد کنید" required="required" tabindex="1"  autofocus>
              </div>
             <div class="form-group">
                <label for="userPassword">رمز عبور</label>
                <input type="password" name="LoginPass" value="<?php echo form_error('LoginPass'); ?>" min="6" class="form-control" id="userPassword" placeholder="رمز عبور را وارد کنید" required="required" tabindex="3" >
                <p class="help-block" >حداقل 6 کاراکتر باید وارد شود</p>
                <p class="help-block" style="color:#F00">
                <?php echo form_error('LoginPass'); ?>
                </p>
              </div>
             <div class="form-group">
                <label for="mobile">موبایل</label>
                <input type="text" value="<?php echo $mobile?>" name="mobile" value="<?php echo set_value('mobile')?>" class="form-control" id="mobile" required="required" placeholder="موبایل" tabindex="5">
                <p class="help-block" style="color:#F00">
                	<?php echo form_error('mobile'); ?>
                </p>
              </div>
        </div>

        <div class="col-md-6 pull-left">
             <div class="form-group">
                <label for="userName">نام کاربری</label>
                <input type="text" value="<?php echo $userName?>" name="LoginName" value="<?php echo set_value('LoginName')?>" class="form-control" id="userName" placeholder="نام کاربری خود را وارد کنید" required="required" tabindex="2">
               <p class="help-block" style="color:#F00">
               <?php echo form_error('LoginName'); ?></span>
              </div>
             <div class="form-group">
                <label for="cUserPassword">تکرار رمز عبور</label>
                <input type="password" name="LoginPassconf"  class="form-control" id="cUserPassword" placeholder="تکرار رمز عبور" required="required" tabindex="4">
                <p class="help-block">حداقل 6 کاراکتر باید وارد شود</p>
                <p class="help-block" style="color:#F00">
                <?php echo form_error('LoginPassconf'); ?>
                </p>
              </div>
             <div class="form-group">
                <label for="email">ایمیل</label>
                <input type="email" value="<?php echo $email?>" name="UserEmail" value="<?php echo set_value('UserEmail')?>" class="form-control" id="email" placeholder="ایمیل" required="required" tabindex="6">
                <p class="help-block" style="color:#F00">
                	<?php echo form_error('UserEmail'); ?>
                </p>
              </div>
        </div>
        <div class="col-md-6 text-left">
        	<?php if($avatar != ''):?>
        	<img src="<?php echo site_url('upload/avatar/'.$avatar)?>" width="100" class="img-thumbnail"/>
            <?php else:?>
            <img src="<?php echo site_url('assets/admin/img/avatar.jpg')?>" width="100" class="img-thumbnail"/>
            <?php endif?>
        </div>
        <div class="col-md-6">
       		 <div class="form-group">
          <label for="exampleInputFile">عکس کاربر</label>
          <input type="file" name="userfile" size="20"/>
          <p class="help-block">از این برای نشان دادن عکس کاربر در زیر نوشته ها استفاده میشود.</p>
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
