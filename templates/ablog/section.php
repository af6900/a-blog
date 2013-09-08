<?php  foreach($article as $row):?>
	<div class="ContainTitle"><a href="<?php echo $row->title?>"><?php echo $row->title?></a></div>
        <div class="article">
         <?php echo $row->summary?>
        </div>
    <div class="ContainFooter">
		 <label class="author">نویسنده : <?php echo $row->author?></label>
          <label class="date"><?php echo $row->date?></label>          
          <?php  if($row->fulltext != ''):?>
              <label class="summary"><a href="<?php echo base_url();?>summary/<?php echo $row->id?>">ادامه مطلب</a></label>
          <?php  endif ?>
             <label class="lblcomment"><a href="<?php echo base_url();?>summary/<?php echo $row->id?>">نظر دهید</a></label>
    </div>
 <?php  endforeach ?> 