<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container dir-rtl">
	<div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">مشخصات سایت</h3>
          </div>
          <?php echo messages(2,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?>
           <?php echo form_open('SaveWebConfig')?>
          <div class="panel-body">
            <div class="col-md-12 well-sm pull-right" style="background-color:#FFF !important">
            
              <div class="form-group">
                <label for="webTitle">عنوان سایت</label>
                <input type="text" name="title" value="<?php echo $this->model_web_config->get_one(array('id'=>1),'Web_Title')?>" class="form-control" id="webTitle" placeholder="عنوان سایت را وارد کنید">
              </div>
              
              <div class="form-group">
                <label for="adminEmail">ایمیل مدیر سایت</label>
                <input type="email" name="email" value="<?php echo $this->web_config->get_admin_email()?>" class="form-control" id="adminEmail" placeholder="ایمیل مدیر سایت">
                <p class="help-block">برای دریافت ایمیل از طریق تماس با ما به کار میرود</p>
              </div>
              
              <div class="form-group">
                <label for="keywords">کلمات کلیدی</label>
                <input type="text" name="keywords" value="<?php echo $this->model_web_config->get_one(array('id'=>1),'Keywords')?>" class="form-control" id="keywords" placeholder="کلمات کلیدی سایت">
                <p class="help-block">کلمات,کلیدی</p>
              </div>
              
              <div class="form-group">
                <label for="description">توضیحات سایت</label>
                <textarea name="description" class="form-control" id="description"><?php echo $this->model_web_config->get_one(array('id'=>1),'Description')?></textarea>
                
                
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
