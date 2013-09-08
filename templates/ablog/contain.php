<?php echo communique(); ?>

<?php foreach($article as $row):?>
	<div class="ContainTitle"><a href="<?php echo  base_url();?>summary/<?php echo  $row->id?>"><?php echo $row->title?></a>
    </div>
    	<div class="ContainTools">
 		 <!--<a target="new" href="<?php echo site_url('email/send/'.$row->id)?>" >ارسال</a>-->
          <label class="date"><?php

		   echo $this->lib_database->get_filde('a_article_section',array('id'=>$row->sectionId),'title')
		   ?></label>
        </div>
        <div class="article">
         <?php echo $row->summary; ?>
        </div>
        <div class="Tag">
			<?php $tag = explode(',',$row->keywords);?>
            <?php foreach($tag as $key):?>
                <a href="<?php echo base_url();?>summary/<?php echo $row->id?>"><?php echo $key; ?></a>
            <?php endforeach?>
        </div>
        <div style="clear:both;"></div>
    <div class="ContainFooter">
    	<label class="lblcomment" style="margin-top:5px;"><a href="http://www.facebook.com/share.php?u=<?php echo base_url();?>summary/<?php echo  $row->id?>">
        <?php echo image('fb.png','width="20"')?>
        </a></label>
		 <label class="author">نویسنده : <?php echo $row->author?></label>  <label class="author"><?php echo $row->date?></label>
         <?php if($row->fulltext != ''):?>
              <label class="summary"><a href="<?php echo base_url();?>summary/<?php echo $row->id; ?>">ادامه مطلب</a></label>
          <?php endif ?>
             <label class="lblcomment"><a href="<?php echo base_url();?>summary/<?php echo $row->id; ?>">دیدگاه</a></label>
    </div>
<?php endforeach ?> 
