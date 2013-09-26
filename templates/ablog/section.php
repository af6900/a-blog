<?php foreach($article as $row):?>
	<div class="panel panel-default text-right dir-rtl">
    	<div class="panel-heading">
        	<h3 class="panel-title">
    		<?php echo summary($row->title,$row->title);?>

            </h3>
        </div>
        
    	<div class="panel-body">
       	 <?php echo $row->summary; ?>
        </div>

        <div class="panel-footer">
           <span class="label label-info" >
			   <?php
                 echo $this->lib_database->get_filde('article_section',array('id'=>$row->sectionId),'title')
               ?>
           </span>
         <label class="pull-left">
            <?php echo summary($row->title,'دیدگاه');?>
         </label>
          <?php if($row->fulltext != ''):?>
              <label class="pull-left"><?php echo summary($row->title,'ادامه مطلب');?></label>
          <?php endif ?>
        </div>
    </div>
<?php endforeach ?> 