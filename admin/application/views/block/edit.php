<div class="container dir-rtl">
	<div class="row">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">ویرایش بلوک</h3>
      </div>
       <?php echo form_open('update_block');?>
      <div class="panel-body">
        <?php echo form_hidden('id',$id);?>
			<table class="table pull-right dir-rtl col-md-6">
            	<tr>
                  <td align="left" class="col-md-1">نام :</td>
                  <td><?php echo form_input('name',$name,'class="pull-right form-control"');?></td>
                </tr>
                <tr>
                  <td align="left">بلوک :</td>
                  <td><?php echo block_dropdown('box',$boxes,$box,'class="pull-right form-control"');?></td>
                </tr>
                <tr>
                  <td align="left">موقعیت :</td>
                  <td><?php echo position_dropdown('position', $position,'class="pull-right form-control"');?></td>
                </tr>
                <tr>
                  <td align="left">وضعیت :</td>
                  <td><?php echo status_dropdown('active', $status,'class="pull-right form-control"')?></td>
                </tr>
                <tr>
                 <tr>
                  <td align="left">ردیف :</td>
                  <td><?php echo form_input('row',$row,'class="pull-right form-control"');?></td>
                </tr>
                <tr>
                  <td align="left"></td>
                  <td align="left"></td>
                </tr>
            </table>
        
      </div>
      <div class="panel-footer text-left">
      <input type="submit" value="ذخیره" class="btn btn-primary"/>
      </div>
       <?php echo form_close();?>      
    </div>


</div>
</div>
