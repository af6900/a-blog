           <?php add_javascript('comment.js');?>
				<div class="ContainTitle"><?php echo $title?></div>
                    <div class="article">
                        <?php echo $summary?>
                        <?php echo $fullText?>
                    </div> 
                    <div style="clear:both"></div>
                 <div class="ContainFooter">
                	<label class="date"><?php echo $date?></label> 
					<label class="author" author ="<?php echo $author?>" >نویسنده : <?php echo $author?></label>
                </div>

             <?php  foreach ($comment as $row):?>
           		 <div class="usercomment">
				 		<div class="name"><?php echo $row->user_name?></div>
                         <?php echo $row->comment?>
                         <?php  if($row->answer !=''):?>
                         <div class="answer">جواب مدیر</div>
                         <?php echo $row->answer?>
                         <?php  endif ?>
                 </div>
                <?php  endforeach ?> 
                
            	<?php echo comment($date,$id,$showComment);?>
            

         <div style="clear:both"></div>