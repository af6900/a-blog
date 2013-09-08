<div class="container dir-rtl">
	<div class="row">
    	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">بلوک ها</h3>
        </div>
        <div class="panel-body">
<div class="tabbable text-right"> <!-- Only required for left/right tabs -->

  <ul class="nav nav-tabs">
    <li class="active pull-right"><a href="#tab1" data-toggle="tab">نصب بلوک</a></li>
    <li class="pull-right"><a href="#tab2" data-toggle="tab">لیست بلوک ها</a></li>
  </ul>
  
  
  <div class="tab-content">
  
    <div class="tab-pane active" id="tab1">
      <?php echo form_open_multipart('save_boxes');?>
        <table border="0" dir="rtl" width="100%">
            <tr>
                <td align="left" class="text-right" ><input type="file" name="userfile" size="20"  /></td>
                <td>
                <button type="submit" class="btn btn-primary">نصب</button> 
                </td>
            </tr>
        </table>
     <?php  echo form_close();?>
    </div>
    
    <div class="tab-pane" id="tab2">
    	<table class="table dir-rtl table-striped">
        	<thead>
            	<tr>
                    <th><p class="pull-right">عنوان</p></th>
                    <th><p class="pull-right">ویرایش</p></th>
                </tr>
            </thead>
          <?php foreach($boxes as $row):?>
            <tr>
                <td><p class="pull-right"> <?php echo $row->title?> </p></td>
                <td><p class="pull-right"><?php echo btn_edit("edit-box/$row->id")?></p></td>
            </tr>
	     <?php endforeach ?>
        </table>
       
    </div><!--tab2-->
    
  </div><!--tab-content-->
  
</div><!--tabbable-->
       </div>
    	<div class="panel-footer">
        
        </div>
    </div> 
</div>
</div>