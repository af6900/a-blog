<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');
/*
*   aBlog cms
*	www.a-blog.ir
*	@author  Afshin Nj 
*/

if (!function_exists('nav'))
{
 
 	function nav()
	{
		$CI =& get_instance();
		?>
		<nav class="navbar navbar-default" role="navigation">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url()?>"><?php echo $CI->lib_database->get_filde('web_config',array('id'=>1),'Web_Title')?></a>
              </div>
            
              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">


                <ul class="nav navbar-nav navbar-right">
                  
                  <?php echo add_box('top'); ?>
                </ul>
              </div><!-- /.navbar-collapse -->
            </nav>
        <?php	
	}
 
 
}