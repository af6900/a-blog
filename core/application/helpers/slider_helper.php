<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
*	@author  Afshin Nj 
*/

if (!function_exists('slider'))
{
 
 	function slider()
	{
		$getfile = get_dir_file_info("./upload/slider");
		?>
        <script language="javascript" type="text/javascript"> 
			$(document).ready(function(e) {
                $('.slider').carousel();
            });
        </script>
         <div id="carousel-example-generic" class="carousel slide slider">
       
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
          <?php $i = 0?>
          <?php foreach($getfile as $row):?>
          	<?php $i++?>
            <div class="item <?php if($i == 1){echo 'active';}?>">
              <img src="<?php echo site_url('upload/slider/'.$row['name'])?>" alt="...">
            </div>
		 <?php endforeach ?>
            
          </div>
        
          <!-- Controls -->
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="icon-prev"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="icon-next"></span>
          </a>
        </div>
        <?php	
	}
 
 
}