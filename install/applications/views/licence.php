<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
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

    	</div>
        
    	<div class="col-md-9 content pull-left text-right">
        	<h1><?php echo lang('page_title_welcome'); ?></h1>
        
        	<p><?php echo lang('text_welcome'); ?></p>
            
			<h2><?php echo lang('box_title_license'); ?></h2>
        
            <div class="license">
                <?php echo $licence; ?>
            </div>
        	
        	<div class="control-group clearfix" style="margin-top: 8px;">
            	<label class="checkbox control-label pull-left" for="license"><?php echo lang('label_agree_to_the_license'); ?>&nbsp;&nbsp;<input type="checkbox" id="license" name="license" /></label>
            </div>
            
            <div class="control-group clearfix">
            	<a id="continue-button" href="<?php echo site_url('index.php/index/index/check'); ?>" class="btn btn-info pull-left disabled"><i class="glyphicon glyphicon-ok"></i>&nbsp;&nbsp;<?php echo lang('image_button_continue'); ?></a>
            </div>
    	</div>
    </div>
</div>

<script type="text/javascript">
(function($){
	var $button = $('#continue-button');

	//observe the checkbox event
	$('#license').on('change',function() {
		if($(this).attr('checked')) {
		    $button.removeClass('disabled');
		} else {
		    $button.addClass('disabled');
		}
	});

	$button.on('click',function() {
		var $this = $(this);

		//return false to disable link click
		if ($this.hasClass('disabled')) {
			return false;
		}
	});
})(jQuery);
</script>