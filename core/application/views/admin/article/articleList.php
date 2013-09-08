<div class="container text-right">
	<div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">لیست مطالب</h3>
          </div>
          <div class="panel-body table-responsive">
          
          <ul class="list-group">
		   <?php  foreach($article as $row):?>
              <li class="list-group-item">
			  		<?php echo $row->title?>
                    <span class="pull-left" style="margin-right:20px" title="حذف مطلب"><?=btn_delete("delete-article/$row->id")?></span>
                    <span class="pull-left" style="margin-right:20px" title="آرشیو مطلب"><?=btn_archive("archive-article/$row->id")?></span>
                    <span class="pull-left" style="margin-right:20px" title="ویرایش مطلب"><?=btn_edit("edit-article/$row->id")?></span>
                    <?php if($row->comment == 1):?>
                    <span class="pull-left" style="margin-right:20px" title="غیر فعال کردن امکان نظر دهی"><?=btn_uncheck("hide-comment/$row->id")?></span>
					<?php else: ?>
                      <span class="pull-left" style="margin-right:20px" title="فعال کردن امکان نظر دهی"><?=btn_check("show-comment/$row->id")?></span>
					<?php endif ?>
              </li>
		   <?php  endforeach ?>
         </ul>          
          </div>
          <div class="dir-rtl ">
          	 <span style="margin-right:20px"><?=btn_archive(NULL)?> : آرشیو مطالب</span>
             <span style="margin-right:20px"><?=btn_edit(NULL)?> : ویرایش مطالب</span>
             <span style="margin-right:20px"><?=btn_delete(NULL)?> : حذف مطالب</span>
             <span style="margin-right:20px"><?=btn_check(NULL)?> : فعال کردن امکان نظر دهی</span>
             <span style="margin-right:20px"><?=btn_uncheck(NULL)?> : غیر فعال کردن امکان نظر دهی</span>
          </div>
          <div class="panel-footer text-center">
              <ul class="pagination" style="margin-top:1px !important; margin-bottom:1px !important;">
                <?php echo $articleCout;?>
              </ul>
          </div>
        </div>

</div>
</div> 


 