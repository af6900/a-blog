
<div class="panel author">
   	<div class="panel-heading BYekan dir-rtl">
        درباره نویسنده
        <?php if($UserAvatar == ''):?>
        	<?php image('avatar.jpg','width="120px" class="img-rounded pull-left"');?> 
        <?php else:?>
        	 <img class="img-rounded pull-left" src="<?php echo site_url('upload/avatar/'.$UserAvatar);?>"> 
        <?php endif?>
        
    </div>
	<div class="panel-body text-right BKoodakBold">
   
    	<ul class="list-unstyled">
        	<li> <?php echo $name;?>   <span class="glyphicon glyphicon-user"></span></li>
            <li> <?php echo $mobile;?>   <span class="glyphicon glyphicon-phone"></span></li>
            <li> <?php echo $email;?>   <span class="glyphicon glyphicon-envelope"></span></li>
        </ul>
       
    </div>
</div>
