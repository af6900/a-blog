<div class="container">
	<div class="row">
     	<div class="panel panel-default">
        	<div class="panel-heading text-right">
            	<h3 class="panel-title">ایجاد منو</h3>
            </div>
            <div class="panel-body">
           		 <?php echo validation_errors(); ?>  
            	<ul class="nav nav-pills" id="myTab" style="padding-right:5px; margin-bottom:20px;">
                  <li class="active pull-right"><a href="#home">ایجاد منو</a></li>
                  <li class="pull-right"><a href="#profile">لیست منو</a></li>
                </ul>
                
                <div class="tab-content">
                  <div class="tab-pane active" id="home">
                          <div class="col-md-6 pull-right">
								<?php echo form_open('insert-menu');?>
                                <table class="table dir-rtl pull-right">
                                    <tr>
                                        <td align="left" class="col-md-2">نام :</td>
                                        <td><?php echo form_input('name','','class="form-control pull-right"');?>
                                         
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">بلوک :</td>
                                        <td>
                                            <select name="block" class="form-control pull-right">
                                                <?php foreach($block as $row):?>
                                                <option value="<?php echo $row->id;?>"><?php echo $row->name;?></option>
                                                <?php endforeach ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td align="left">آدرس منو :</td>
                                        <td><?php echo form_input('link','','id="link" class="pull-right form-control"');?></td>
                                    </tr>
                                    <tr>
                                    	<td></td>
                                        <td><button type="submit" class="btn btn-primary pull-left">ذخیره</button></td>
                                    </tr>
                                </table>
                                <?php echo form_close();?>
                             </div> 
                        <div class="col-md-6" >     
                            <div class="panel panel-info" style="background-color:#FFF">
                                <div class="panel-body text-right" style="overflow:auto; height:400px" >
                                        <div class="list-group">
                                          <a href="#" class="list-group-item active">
                                            صفحات
                                          </a>
                                          <a href="javascript:void(nul);" class="ALink list-group-item" link="index">صفحه اصلی</a>
                                          <?php foreach($pages as $row):?>
  <a href="javascript:void(nul);" class="ALink list-group-item" link="<?php echo 'pages/'.$row->enTitle?>"><?php echo $row->title?></a>
<?php endforeach?>
                                          <a href="#" class="list-group-item active">
                                            بخش ها
                                          </a>
                                         <?php foreach($section as $row):?>
                                            <a href="javascript:void(nul);" class="ALink list-group-item" link="site/section/<?php echo $row->title;?>"><?php echo $row->title;?></a>
                                            <?php endforeach ?> 
                                          <a href="#" class="list-group-item active">
                                            مقاله ها
                                          </a>
                                          <?php foreach($article as $row):?>
<a href="javascript:void(nul);" class="ALink list-group-item" link="site/summary/<?php echo $row->id;?>"><?php echo $row->title;?></a>

<?php endforeach ?>
                                        </div>


                                </div>
                            </div>
                        </div>
                  
                  </div><!--ایجاد منو-->
                  
                  <div class="tab-pane" id="profile">
                      <table class="table dir-rtl">
                        <?php foreach($parent as $row):?>
                       <tr>
                         <td><p class="text-right"><?php echo $row->name?></p></td>
                         <td class="text-right"><p class="text-right"><?php echo btn_delete("delete-menu/$row->id")?></p></td>
                         <td><p class="text-right"><?php echo btn_edit("edit-menu/$row->id")?></p></td>
                       </tr>
                       <?php endforeach ?>
                     </table>
                  
                  </div><!--لیست منو ها-->
                  
                </div>

            </div>
            <div class="panel-footer">
            </div>
        </div>
	</div>
</div>