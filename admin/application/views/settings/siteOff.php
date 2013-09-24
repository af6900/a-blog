<div class="container dir-rtl">
  <div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">بستن سایت</h3>
      </div>
      <?php echo form_open('SaveSiteOff')?>
      <div class="panel-body"> <?php echo messages(2,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?>
        <div class="form-group ">
          <label> بلی :
            <input name="siteOff" type="radio" title="On" value="0" <?php echo $WebOn?> />
          </label>
          <label> خیر :
            <input name="siteOff" type="radio" title="Off" value="1" <?php echo $WebOff?>/>
          </label>
        </div>
        <div class="form-group">
          <textarea name="description" class="form-control redactor_content" id="OffDescription" >
         <?php echo $OffDescription?>
         </textarea>
        </div>
      </div>
      <div class="panel-footer text-left">
        <button type="submit" class="btn btn-primary">ذخیره</button>
      </div>
      <?php echo form_close();?> </div>
  </div>
</div>
