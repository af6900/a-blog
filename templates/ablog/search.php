<?php echo news(); ?>

<?php foreach($search as $row):?>
	
   <div class="ContainTitle"><a href="<?php echo  base_url();?>site/summary/<?php echo  $row->id?>"><?php echo $row->title?></a>
    </div>
        <div class="article">
             <?php echo $row->summary ?>
    <?php echo $row->fulltext ?>
        </div>
<?php endforeach ?> 
