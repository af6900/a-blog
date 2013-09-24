<div class="container dir-rtl">
	<div class="row">
    	   <div class="panel panel-default">
        	<div class="panel-heading">
            	<h3 class="panel-title">ایجاد منو</h3>
            </div>
            <div class="panel-body">
     <?php echo validation_errors(); ?>  
     <div class="tabbable"> <!-- Only required for left/right tabs -->
    <ul class="nav nav-tabs ">
        <li class="active pull-right"><a href="#tab1" data-toggle="tab">ویرایش منو</a></li>
    </ul>
    
    <div class="tab-content">
        <div class="tab-pane active" id="tab1">
        <div class="row">
        <div class="span6 pull-right">
        <?php echo form_open('admin/menu/update');?>
        <input type="hidden" value="<?php echo $id?>" name="id" />
    	<table class="table dir-rtl pull-right">
        	<tr>
            	<td align="left" class="span2">نام :</td>
                <td><?php echo form_input('name',$name,'class="pull-right"');?>
                 <button type="submit" class="btn btn-primary pull-left">ذخیره</button>
                </td>
            </tr>
        	<tr>
            	<td align="left">بلوک :</td>
                <td><?php echo block_dropdown('block', $dropdown, $selected, 'class="pull-right"');?></td>
                
            </tr>
        	<tr>
            	<td align="left">آدرس منو :</td>
                <td><?php echo form_input('link',$link,'id="link" class="pull-right"');?>
                <a href="javascript:void(nul);" id="addres" >آدرس</a>
                </td>
            </tr>
        </table>
        <?php echo form_close();?>
          </div>    
        <div class="body dir-rtl col-md-4 pull-left" style="overflow:auto; height:200px;">
            <div class="link"><a href="javascript:void(nul);" id="homeLink" link="site/index">صفحه اصلی</a></div>
            <div class="link"><a href="javascript:void(nul);" id="aboutLink" link="pages/about">درباره ما</a></div>
            <div class="link"><a href="javascript:void(nul);" id="contactLink" link="pages/تماس-با-ما">تماس با ما</a></div>
        <div class="title">بخش ها</div>
        <?php foreach($section as $row):?>
        <div class="link"><a href="javascript:void(nul);" class="ALink" link="site/section/<?php echo $row->title;?>"><?php echo $row->title;?></a>
        </div>
        <?php endforeach ?>
        <div class="title">مقاله ها</div>
        <?php foreach($article as $row):?>
        <div class="link"><a href="javascript:void(nul);" class="ALink" link="site/summary/<?php echo $row->id;?>"><?php echo $row->title;?></a>
        </div>
        <?php endforeach ?>
        </div>
        
         </div>
         </div>
           
    </div>
    </div></div>
    </div>
</div>