<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css"/>
<div class="container text-right">
	<div class="row">
     <div class="panel panel-default"> 
     	<div class="panel-heading">
        	<h3 class="panel-title">ایجاد نظرسنجی</h3>
        </div>
     	<div class="panel-body">
        	<?php echo btn_new('new-poll','ایجاد نظر سنجی جدید')?>
            <ul class="list-group" style="margin-top:20px;">
            <?php foreach ($polls as $row):?>
            	<li class="list-group-item">
					<?php echo $row->polls_title; ?>
                    <span class="pull-left" style="margin-right:20px;"><?php echo btn_delete('admin-poll-delete/'.$row->id_polls);?></span>
                    <span class="pull-left" style="margin-right:20px;"><?php echo btn_edit('edit-poll/'.$row->id_polls);?></span>
					 <?php if($row->active==1):?>
                     <span class="pull-left" style="margin-right:20px;"><?php echo btn_check('admin/poll');?></span>
                      <?php else:?>
                     <span class="pull-left" style="margin-right:20px;"><?php echo btn_uncheck('admin/poll');?></span>
                     <?php endif?> 
                </li>
            <?php endforeach ?>
            </ul>
        </div>

     	<div class="panel-footer dir-rtl">
                     <span style="margin-right:20px"><?=btn_edit(NULL)?> : ویرایش نظر</span>
             <span style="margin-right:20px"><?=btn_delete(NULL)?> : حذف نظر</span>
             <span style="margin-right:20px"><?=btn_check(NULL)?> : فعال کردن نظر سنجی</span>
             <span style="margin-right:20px"><?=btn_uncheck(NULL)?> : غیر فعال کردن نظر سنجی</span>
        </div>
     </div>

</div>
</div>