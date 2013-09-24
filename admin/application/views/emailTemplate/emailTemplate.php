<div class="container dir-rtl">
	<div class="row">
	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">قالب ایمیل ها</h3>
        </div>
        <div class="panel-body">
<?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
    <table class="table table-striped dir-rtl">
    	<thead>
        	<tr>
            	<th><p class="pull-right">نام</p></th>
                <th class="col-md-1 text-center"><p>ویرایش</p></th>
            </tr>
        </thead>
        <?php foreach($EmailTemplate as $row):?>
        <tr>
        	<td><p class="pull-right"><?php echo $data['title']= $row->title;?></p></td>
            <td class="text-center"><p><?php echo btn_edit("edit-email-tamplate/$row->id")?></p></td>
        </tr>
        <?php endforeach ?>
    </table>
       </div>
    	<div class="panel-footer">
        
        </div>
    </div> 
</div>
</div>

