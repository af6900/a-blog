<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $www_location = 'http://' . $_SERVER['HTTP_HOST'];
    
    if (isset($_SERVER['REQUEST_URI']) && (empty($_SERVER['REQUEST_URI']) === false)) {
        $www_location .= $_SERVER['REQUEST_URI'];
    } else {
        $www_location .= $_SERVER['SCRIPT_FILENAME'];
    }
    
    $www_location = substr($www_location, 0, strpos($www_location, 'install'));

?>
<div class="container clearfix">
    <div class="row">
        	<div class="col-md-3 pull-right">
            <div class="list-group text-right">
                <a class="list-group-item <?php echo ($step == 1) ? 'active' : ''; ?>" href="javascript:void(0);" title="<?php echo lang('nav_menu_step_1_text'); ?>"><i class="glyphicon glyphicon-chevron-left pull-left"></i> <?php echo lang('nav_menu_step_1_text'); ?></a>
                <a class="list-group-item <?php echo ($step == 2) ? 'active' : ''; ?>" href="javascript:void(0);" title="<?php echo lang('nav_menu_step_2_text'); ?>"><i class="glyphicon glyphicon-chevron-left pull-left"></i> <?php echo lang('nav_menu_step_2_text'); ?></a>
                <a class="list-group-item <?php echo ($step == 3) ? 'active' : ''; ?>" href="javascript:void(0);" title="<?php echo lang('nav_menu_step_3_text'); ?>"><i class="glyphicon glyphicon-chevron-left pull-left"></i> <?php echo lang('nav_menu_step_3_text'); ?></a>
                <a class="list-group-item <?php echo ($step == 4) ? 'active' : ''; ?>" href="javascript:void(0);" title="<?php echo lang('nav_menu_step_4_text'); ?>"><i class="glyphicon glyphicon-chevron-left pull-left"></i> <?php echo lang('nav_menu_step_4_text'); ?></a>
                <a class="list-group-item <?php echo ($step == 5) ? 'active' : ''; ?>" href="javascript:void(0);" title="<?php echo lang('nav_menu_step_5_text'); ?>"><i class="glyphicon glyphicon-chevron-left pull-left"></i> <?php echo lang('nav_menu_step_5_text'); ?></a>
            </div>
            <div id="mBox"><div id="mBoxContents"></div></div>  
    
            <div id="mainBlock">
            </div>
    	</div>
        
    	<div class="col-md-9 content text-right dir-rtl">
    		<h1><?php echo lang('page_title_finished'); ?></h1>
    		
    		<div><?php echo lang('text_finished'); ?></div>
    		
    		<p class="alert alert-danger">
    		    <b><?php echo lang('text_remove_install_dir'); ?></b>
    		</p>
    		
    		<div class="row large">
    			<div class="col-md-6"><a class="btn btn-primary catalog" alt="Catalog" href="<?php echo $www_location; ?>" target="_blank"><i class="glyphicon glyphicon-home"></i>&nbsp;&nbsp;<?php echo lang('btn_view_site'); ?></a></div>
    			<div class="col-md-6 text-left"><a class="btn btn-primary admin" alt="Administration Tool" href="<?php echo $www_location; ?>admin" target="_blank"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;<?php echo lang('btn_admin_panel'); ?></a></div>
    		</div>
    	</div>
	</div>
</div>