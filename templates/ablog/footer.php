<div class="DivPage">
  <?php if(isset($page)){ echo $page ;}?>
</div>
</div>
<div class="LeftDiv">
					<?php image('logo.png','class="logo" alt="Logo"')?>
  <ul class="UlLeftTop">
  <?php echo add_box('top')?>
  </ul>    


     <?php echo add_box('left');?>  
<div class="rss" >
 <a id="rss" href="<?php echo base_url();?>feed"></a>
</div>

</div>
<div style="clear:both"></div>
</div>
<div class="footer">
</div>

</body>
</html>