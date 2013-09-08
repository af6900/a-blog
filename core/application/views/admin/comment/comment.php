<div class="container  dir-rtl">
	<div class="row">
<div class="panel panel-default">
  <div class="panel-heading">
  <h3 class="panel-title ">نظرات کاربران </h3>
  
  </div>
  <div class="panel-body">
	<table class="table table-striped table-hover dir-rtl">
    	<thead>
        	<tr>
                <th><p class="pull-right">نام کاربر</p></th>
                <th><p class="pull-right">عنوان مطلب</p></th>
                <th><p class="pull-right">حذف</p></th>
                <th><p class="pull-right">فعال</p></th>
                <th><p class="pull-right">ویرایش</p></th>
            </tr>
        </thead>
         <?php  foreach($comment as $row):?>
         
       <tr>
       	<td><p class="pull-right"><?php echo $row->user_name?></p></td>
        <td><p class="pull-right"><?php echo $row->title?></p></td>
       	<td><p class="pull-right"><?php echo btn_delete("commentDelete/$row->id_comment")?></p></td>
        <td>
		   <?php  if($row->active == 0){?>
          	 <p class="pull-right"><?php echo btn_check("commentActive/$row->id_comment")?></p>
           <?php  }else{ ?>
          	 <p class="pull-right"><?php echo btn_uncheck("commentDeActive/$row->id_comment")?></p>
           <?php  } ?>
       </td>
       <td><p class="pull-right"><?php echo btn_edit("commentEdit/$row->id_comment")?></p></td>
      </tr>
      
         <?php  endforeach ?>
  </table>
  </div>
</div>

</div>
</div>