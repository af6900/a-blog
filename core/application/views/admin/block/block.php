<div class="container text-right">
	<div class="row">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">ایجاد بلوک</h3>
          </div>
          <div class="panel-body">
            <?php echo messages(NULL,'ذخیره','ثبت با موفقیت انجام شد','ثبت با موفقیت انجام نشد.');?> 
<div class="tabbable text-right"> <!-- Only required for left/right tabs -->

  <ul class="nav nav-tabs" style="padding-right:0 !important">
    <li class="active pull-right"><a href="#tab1" data-toggle="tab">ایجاد بلوک</a></li>
    <li class="pull-right"><a href="#tab2" data-toggle="tab">لیست بلوک</a></li>
  </ul>
  <div class="tab-content">
  
    <div class="tab-pane active dir-rtl" id="tab1"> 
    <div class="col-md-6 pull-right">
       <?php echo form_open('insert_block');?>
       	<div>
        	
        </div>
		  <div class="form-group">
            <label for="name">نام</label>
            <input type="text" name="name" class="form-control" id="name" placeholder="نام بلوک">
             <p class="help-block"><?php echo form_error('name'); ?></p>
          </div>

		  <div class="form-group">
            <label for="name">بلوک</label>
            <select name="box" class="pull-right form-control">
                  		<option> </option>
                  	<?php foreach($boxes as $row):?>
                  		<option value="<?php echo $row->id?>"><?php echo $row->title?></option>
                     <?php endforeach ?>   
                       </select>
          </div>    
                
		  <div class="form-group">
            <label for="name">موقعیت</label>
            <?php echo position_dropdown('position',NULL,"class='pull-right form-control'");?>
          </div>

       	  <div class="form-group">
            <label for="name">وضعیت</label>
            <select name="active" class="pull-right form-control"><option value="1">فعال</option><option value="0">غیر فعال</option></select>
          </div>  
          
         <div class="form-group">
            <label for="name">وضعیت</label>
            <?php echo form_input('row','','class="pull-right form-control"');?>
            <p class="help-block"><?php echo form_error('row'); ?></p>
          </div> 
      		
          <?php echo form_submit('submit','ذخیره','class="btn btn-primary pull-left"')?>

       <?php echo form_close();?>
    </div>   
    </div><!--tab1-->
    
    <div class="tab-pane" id="tab2">
    	<?php foreach($position as $row):?>
        	<?php $block = $this->lib_database->get('a_block',NULL,array('position'=>"$row"),'row','ASC');?>
            		<label><?php echo $row?></label> 
            		<ul id='order' class="list-group order">
						<?php foreach($block as $rows):?>
                         <li id="item-<?php echo $rows->id?>" class="list-group-item">
						 	<?php echo $rows->name?> <span class="glyphicon glyphicon-resize-vertical"></span>
                         </li>
                        <?php endforeach ?> 
                        </ul>
		<?php endforeach?> 
        

        
        
    </div><!--tab2-->
    
  </div><!--tab-content-->
</div><!--tabbable-->
          </div>
          <div class="panel-footer">
          
          </div>
        </div>   

	</div>
</div> 


 <script>

$(document).ready(function() {

        $( ".order" ).sortable({
            opacity: 0.6,
            cursor: 'move',
            update: function(event, ui){
			 var order = $(this).sortable("serialize");
			// alert(order);
                $.ajax({
                    url: base_url+"ajaxProcessor/block/save",
                    type: 'GET',
                    data: order,
                    success: function (data) {
                       //alert(data)
                    }

                });
                }

            });

});
</script>