<div class="container text-right">
	<div class="row well-sm">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">آرشیو</h3>
          </div>
          <div class="panel-body">
            <ul class="list-group">
            <?php  foreach($archive as $row):?>
              <li class="list-group-item">
              	<?php echo $row->title?>
                <p class="pull-left">
					<?php echo btn_delete("delete-article/$row->id"," ","id='trash'")?>&nbsp;&nbsp;&nbsp;
					<?php echo btn_edit("edit-article/$row->id"," ","id='edit'")?>&nbsp;&nbsp;&nbsp;
					<?php echo btn_restore("restore-article/$row->id"," ","id='Restore'")?></p>
              </li>
             <?php  endforeach ?>
            </ul>
          </div>
          <div class="panel-footer">
             <label> حذف <span class="glyphicon glyphicon-trash"></span> </label>
             <label> ویرایش <span class="glyphicon glyphicon-edit"></span></label>
             <label> باز کردان<span class="glyphicon glyphicon-repeat"></span></label>
          </div>
        </div>
        
	</div>
</div>
