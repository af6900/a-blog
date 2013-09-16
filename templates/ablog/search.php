<?php foreach($search as $row):?>
   <div class="ContainTitle"><a href="<?php echo  site_url('summary').'/'.$row->id;?>"><?php echo $row->title?></a></div>
        <div class="article">
             <?php echo $row->summary ?>
   			 <?php echo $row->fulltext ?>
        </div>
<?php endforeach ?> 
