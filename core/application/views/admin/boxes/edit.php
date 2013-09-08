<div class="container dir-rtl">
	<div class="row">
<div class="tabbable text-right"> <!-- Only required for left/right tabs -->

  <ul class="nav nav-tabs">
    <li class="active pull-right"><a href="#tab1" data-toggle="tab">ویرایش باکس ها</a></li>
  </ul>
  
  
  <div class="tab-content">
  
    <div class="tab-pane active" id="tab1">
    <?php echo form_open_multipart('update-boxes');?>
        <table border="0" dir="rtl" width="100%">
            <tr>
                <td align="left"></td>
                <td>

					<?php echo edit_box($id);?>

                </td>
            </tr>
        </table>
   
     <?php echo form_close();?>
    </div>  
  </div><!--tab-content-->
  
</div><!--tabbable-->
</div>
</div>