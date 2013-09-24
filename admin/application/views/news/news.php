<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container text-right">
	<div class="row">
		<div class="panel panel-default ">
        	<div class="panel-heading">
            	<h3 class="panel-title">ثبت اخبار</h3>
            </div> <!--panel-heading-->
            <?php echo form_open('admin-news-insert');?>
            <div class="panel-body">
            <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
             <div class="col-md-6">
                 <div class="form-group">
                    <label for="keywords">کلمات کلیدی</label>
                    <input type="text" name="keywords" required class="form-control text-right" id="keywords" placeholder="کلمات کلیدی" tabindex="2">
                  </div>
              </div>
              
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="newsTitle">عنوان خبر</label>
                    <input type="text" name="title" required class="form-control text-right" id="newsTitle" placeholder="عنوان خبر" tabindex="1">
                  </div>
              </div>
              
             <div class="col-md-6">
             <label for="newsTitle">پایان انتشار</label>
                <div class="input-group">
                  <input type="text" name="end" class="form-control datepicker text-right" required placeholder="" tabindex="4">
                   <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                </div>
              </div>
              
             <div class="col-md-6">
             <label for="newsTitle">شروع انتشار</label>
                <div class="input-group">
                  <input type="text" name="start" class="form-control datepicker text-right" required placeholder="" tabindex="3">
                   <span class="input-group-addon glyphicon glyphicon-calendar"></span>
                </div>
              </div>  
                <div class="clearfix"></div>
                <div class="form-group col-md-12">
           			<label for="newsText">متن خبر</label>
                    <?php echo form_textarea('description','','class="redactor_content" tabindex="5"')?>
                </div>

            </div> <!--panel-body-->
            <div class="panel-footer text-left">
            	
                <?php echo btn_cancel('admin')?>
                <button  class="btn btn-primary" tabindex="6">ذخبره</button>
            </div> <!--footer-->
            <?php echo form_close();?> 
        </div> <!--panel default-->
	</div>
</div>


