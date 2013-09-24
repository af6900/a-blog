<div class="container dir-rtl">
<div class="row">

	<div class="panel panel-default">
    	<div class="panel-heading">
        	<h3 class="panel-title">قالب سایت</h3>
        </div>
        <div class="panel-body">
<?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
    <table class="table table-striped dir-rtl">
    	<thead>
        	<tr>
            	<th><p class="pull-right">نام</p></th>
                <th class="span3"><p class="pull-right">حذف</p></th>
            </tr>
        </thead>
        <?php foreach($template as $row):?>
        <tr>
        	<td><p class="pull-right"><?php echo $row->name;?></p></td>
            <td><p class="pull-right"><?php echo btn_delete("delete-web-tamplate/$row->id")?></p></td>
        </tr>
        <?php endforeach ?>
    </table>
    </div>
    	<div class="panel-footer">
        
        </div>
    </div>
</div>
</div>

