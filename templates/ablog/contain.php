<link rel="stylesheet" type="text/css" href="/blog/admin/assets/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/blog/admin/assets/bootstrap/css/bootstrap-theme.min.css">
<?php echo status();?>
<?php echo communique(); ?>
  
<?php foreach($article as $row):?>
	<div class="panel panel-default text-right dir-rtl">
    	<div class="panel-heading">
        	<h3 class="panel-title">
    		<?php echo summary($row->title,$row->title);?>
            </h3>
        </div>
        
    	<div class="panel-body BHoma" style="text-align:justify">
   
        
		<?php if($row->image !=''):?>
			<?php echo article_image($row->image,$row->title);?>
         <?php endif ?>
         
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
              <label class="pull-left"><a href="<?php echo site_url('summary'.'/'.str_replace(' ','-',urldecode($row->title)));?>">ادامه مطلب</a></label>
          <?php endif ?>
        </div>
    </div>
<?php endforeach ?> 
