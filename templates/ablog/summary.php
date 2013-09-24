<link rel="stylesheet" type="text/css" href="/blog/core/application/views/ablog/assets/style/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="/blog/core/application/views/ablog/assets/style/bootstrap/css/bootstrap-theme.min.css">
<div class="panel panel-default text-right dir-rtl" style="margin-bottom:80px;">
	<div class="panel-heading">
	 	<h3 class="panel-title "><?php echo $title?></h3>
     </div>
     <div class="panel-body">
	 	<?php echo $summary?> <?php echo $fullText?>
    </div>
    <div class="panel-footer">
      <label><?php echo $date?></label>
        <label class="pull-left" style="margin-right:20px">
         		<?php echo facebook($title)?>
         </label>
      <span class="pull-left"><?php qr_url($url);?> </span>
    </div>
</div>

<div class="panel author">
   	<div class="panel-heading BYekan dir-rtl">
        درباره نویسنده
         <img class="img-rounded pull-left" src="<?php echo site_url('upload/avatar/'.$UserAvatar);?>"> 
    </div>
	<div class="panel-body text-right BKoodakBold">
   
    	<ul class="list-unstyled">
        	<li> <?php echo $author;?>   <span class="glyphicon glyphicon-user"></span></li>
            <li> <?php echo $mobile;?>   <span class="glyphicon glyphicon-phone"></span></li>
            <li> <?php echo $email;?>   <span class="glyphicon glyphicon-envelope"></span></li>
            
        </ul>
       
    </div>
</div>


<?php  foreach ($comment as $row):?>
    <div class="panel dir-rtl comment">
      <div class="panel-heading BYekan" >
	  	<span style="padding-right:20px;"><?php echo $row->user_name . ' | ' . $row->contact_date?></span>
        <img src="<?php echo gravatar($row->user_email);?>" class="img-rounded pull-right">
        </div>
      <div class="panel-body BKoodakBold" style="padding-right:110px; text-align:justify">
	  	<?php echo $row->comment?>
      </div>
      <?php  if($row->answer !=''):?>
      	 <div class="panel-footer BYekan" style="color:#F00">جواب مدیر</div>
     	 <div class="panel-body BKoodakBold" style="background-color:#F5F5F5"><?php echo $row->answer?></div>
      <?php  endif ?>
    </div>
<?php  endforeach ?>

<?php echo comment($date,$id,$showComment);?> 