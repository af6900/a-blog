<script src="<?php assets('ajax/polls.js');?>" language="javascript" type="text/javascript"></script>
<div class="container dir-rtl">
	<div class="row">
		<div class="panel panel-default">
        	<div class="panel panel-heading">
            	<h3 class="panel-title">نظر سنجی</h3>
            </div>
            <div class="panel-body">
           <div class="col-md-6 pull-right">
            <div class="form-group">
                <label for="question">سوال نظر سنجی</label>
                <input type="text" id="question" class="form-control" placeholder="سوال نظر سنجی"/>
            </div>
           </div> 
           <div class="clearfix"></div>
           <div class="col-md-6 pull-right">
             <table class="answer table table-responsive dir-rtl" width="100%" border="0"> 
                <thead>
                    <tr>
                        <th></th>
                        <th><p class="pull-right">پاسخ</p></th>
                    </tr>
                </thead>
                 <tr><td align="center">1</td><td><input type="text" id="1" class="pull-right form-control"/></td></tr>
                 <tr><td align="center">2</td><td><input type="text" id="2" class="pull-right form-control"/></td></tr>
                 <tfoot>
                    <tr>
                        <td></td>
                        <td><input type="button" value="اضافه کردن" class="insert btn btn-primary" /></td>
                    </tr>
                 </tfoot>
            </table>
           </div>
           <div class="col-md-6">
        	<table class="table dir-rtl">
        	<thead>
            	<tr>
                	<th class="span1"></th>
                    <th><p class="pull-right">تنظیمات</p></th>
                </tr>
            </thead>
            <tr>
            	<td><p class="pull-right">فعال</p></td>
                <td><p class="pull-right"><input type="radio" name="poll" class="radio" checked id="1"/></p></td>
            </tr>
            <tr>
            	<td><p class="pull-right">غیر فعال</p></td>
                <td><p class="pull-right"><input type="radio" name="poll" class="radio" id="0"/></p></td>
            </tr>
            <tfoot>
            	<tr>
                	<td></td>
                    <td>
                     <p class="pull-right">با انتخاب گزینه غیر فعال، نظرسنجی خارج از دست رس  کاربر خواهد شد.</p></td>
                </tr>
            </tfoot>
        </table>
        	</div>
            
            </div>
            <div class="panel-footer text-left">
            	<button type="button" class="save btn btn-primary"> ذخیره<i class='icon-share'></i></button>
                
				<?php echo anchor('polls','انصراف','class="btn btn-danger" style="margin-right:5px;"')?>
            </div>
        </div>
	</div> <!-- end row div -->
</div>