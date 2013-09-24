<div class="container text-right">
	<div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">لیست</h3>
          </div>
          <div class="panel-body">    
                <?php foreach($news as $row):?>
                    <ul class="list-group">
                        <li class="list-group-item"><?php echo $row->title?>
                           
						   <span class="pull-left" style="margin-right:30px;"><?php echo btn_delete("admin-news-delete/$row->id")?></span>
                           <span class="pull-left"><?php echo btn_edit("admin-news-edit/$row->id")?></span>
                        </li>
                        
                        
                    </ul>
               <?php endforeach ?>
          </div>
          <div class="panel-footer">
          </div>
        </div>

	</div>
</div>