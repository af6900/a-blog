<div class="container dir-rtl">
	<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ویرایش بخش</h3>
      </div>
      <?php echo form_open('update-section');?>
      <div class="panel-body">
          <ul class="list-unstyled dir-rtl">
		
                <?php echo form_hidden('id',$id);?>
                <li><?php echo form_label('عنوان :');?></li>
                <li><?php echo form_input('title',$section,'class="form-control"');?></li>
            
        </ul>
      </div>
      <div class="panel-footer text-left"><?php echo form_submit('submit','ذخیره','class="btn btn-primary"');?></div>
	  <?php echo form_close();?> 
    </div>
    

    
</div>
</div>    
