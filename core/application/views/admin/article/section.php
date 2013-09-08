<div class="container dir-rtl">
<div class="row">

<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">ثبت بخش </h3>
  </div>
  <?php echo form_open('save-section');?>
  <div class="panel-body">
 <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
   <div class="form-group col-md-6 pull-right">
    <label for="section" class="control-label">نام بخش</label>
    <input type="text" class="form-control" name="title" id="text" placeholder="نام بخش جدید">
    <p class="help-block"><?php echo validation_errors(); ?></p>
  </div>  



		
<table class="table dir-rtl well">
	<thead class="">
    	<tr>
        	<th><p class="pull-right">عنوان</p></th>
            <th><center><p>ویرایش</p></center></th>
            <th><center><p>حذف</p></center></th>
        </tr>
    </thead>
	<?php  foreach($section as $row):?>
    <tr>
      <td><p class="pull-right"><?php echo $row->title?></p></td>
      <td class="col-md-1"><center><p><?php echo btn_delete("delete-section/$row->id")?></p></center></td>
      <td class="col-md-1"><center><p><?php echo btn_edit("edit-section/$row->id")?></p></center></td>
    </tr>
    <?php  endforeach ?>
</table>        	
			
 <?php echo $sectionCout; ?>
  </div>
  <div class="panel-footer text-left">

     <button type="submit" class="btn btn-primary">ذخیره</button>
     <?php echo btn_cancel('admin')?>

  </div>
  <?php echo form_close();?> 
</div>

           
</div>
</div>
    

