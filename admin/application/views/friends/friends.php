<div class="container dir-rtl">
	<div class="row">
    	  <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">اظافه کردن لینک دوستان</h3>
            </div>
            <div class="panel-body">
        <?php echo form_open('newFriend')?>
              <div class="form-group">
                <label for="siteName">نام سایت</label>
                <input type="text" name="name" class="form-control" id="siteName" placeholder="نام سایت را وارد کنید">
              </div>
              <div class="form-group">
                <label for="siteAddres">آدرس سایت</label>
                <input type="text" name="link" class="form-control" id="siteAddress" placeholder="آدرس سایت">
              </div>
              <?php echo form_submit('submit','ذخیره','class="btn btn-primary"')?>
          <?php echo form_close()?>  
       </div>
    	<div class="panel-footer">
		   <?php  foreach($friends as $row):?>
               <div class="dir-rtl col-md-6" style="border:1px solid #CCC;padding-top:10px;">
                <p class="pull-right"><?php echo $row->name?></p>
                 <p class="pull-left"><?php echo btn_delete("deleteFriende/$row->id")?></p>
              </div>
          <?php  endforeach ?>  
          <div class="clearfix"></div>      
        </div>
    </div> 
</div>
</div>
