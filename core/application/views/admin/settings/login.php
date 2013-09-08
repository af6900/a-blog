<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container dir-rtl">
    <div class="row">
    
  		<div class="col-lg-6 pull-right">
       <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">تنظیمات کش</h3>
          </div>
          <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت اطلاعات با مشکل مواجه شد');?>
          <?php echo form_open('cache')?>
          <div class="panel-body"> 
        <span class="label label-info">
                     <center><span class="label label-inverse">فعال کردن کش</span></center>
                     
                     <label>
                        <input type="radio" name="cache" value="1" <?php echo $cacheOn?>/>
                        فعال 
                     </label>
                     <label>
                        <input type="radio" name="cache" value="0" <?php echo $cacheOff?>/>
                     غیر فعال 
                     </label>
               </span>
          </div>
          <div class="panel-footer text-left">
            <button type="submit" class="btn btn-primary">ذخیره</button>
          </div>
            <?php echo form_close()?>
      </div>
      </div>


  		<div class="col-lg-6 pull-left">
       <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">ورود دو مرحله ای</h3>
          </div>
          <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت اطلاعات با مشکل مواجه شد');?>
          <?php echo form_open('savelogin')?>
          <div class="panel-body"> 
			<ul>
                <li>با استفاده از این امکان میتوانید امنیت سایت  خود را بالا ببرید</li>
                <li>درهر بار ورود به مدیریت یک کد امنیتی برای شما ارسال می شود.</li>
                <li>کد امنیتی از طریق  ایمیل و اس ام اس به کاربر اسال می شود.</li>
            </ul>
            <div class="col-md-3 pull-right">
            <label for="exampleInputEmail1">مرحله دوم</label>
              <div class="form-group">
                 <label>
                 	<input type="radio" name="login" value="1" <?php echo $on?>/>
                    فعال 
                 </label>
               </div>
               <div class="form-group">
                 <label>
                 	<input type="radio" name="login" value="0" <?php echo $off?>/>
                    غیر فعال 
                 </label>
              </div>
              </div>
              
              <div class="col-md-7 pull-left">
              <label for="exampleInputEmail1">ارسال از طریق</label>
              <div class="form-group">
              	 <label class=""> &nbsp;&nbsp;<input type="checkbox"  name="email" value="1" <?php echo $email?> />&nbsp;&nbsp;ایمیل </label>
              </div>
              <div class="form-group">
               <label class=""> &nbsp;&nbsp;<input type="checkbox"  name="sms" value="1" <?php echo $sms?> />&nbsp;&nbsp;sms </label>
              </div>
              </div>
          </div>
          <div class="panel-footer text-left">
            <button type="submit" class="btn btn-primary">ذخیره</button>
          </div>
            <?php echo form_close()?>
      </div>
      </div>      
      
	</div>
</div>




