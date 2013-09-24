<div class="container well well-sm dir-rtl">
	<div class="row well-sm">
	<fieldset>
    	<legend class="text-right">ویرایش نظر و جواب داد</legend>
	<?php echo form_open('updateComment');?>
        <table class="table dir-rtl table-bordered">
		
           <?php echo form_hidden('id',$id);?>
           <?php echo form_hidden('email',$email);?>
          <tr>
                <td><p class="pull-right"><?php echo form_label("نظر کاربر : $user_name")?></p></td>
           </tr>
           <tr>
                <td><?php echo form_textarea('comment',$comment,'class="redactor_content"')?></td>
           </tr>
           <tr>
          		<td><p class="pull-right"><?php echo form_label('جواب :')?></p></td>
           </tr>
           <tr>
               <td><?php echo form_textarea('answer',$answer,'class="redactor_content"')?></td>
           </tr> 
           <tr>
                <td><?php echo form_submit('submit','ذخیره','class="btn btn-primary"')?></td>
           </tr> 
        
       </table>
	 <?php echo form_close();?>  
    </fieldset>
</div>
</div>
