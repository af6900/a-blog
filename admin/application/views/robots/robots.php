<div class="container">
	<div class="row">
<?php echo form_open('robots-save')?>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">روبات</h3>
  </div>
  <div class="panel-body">
    <textarea class="form-control" rows="10" class="" name="text"><?php echo $string?></textarea>
  </div>
  <div class="panel-footer">
  <input type="submit" class="btn btn-primary" value="ذخیره">
  </div>
</div>

 <?php echo form_close()?> 

</div>
</div>

