<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    $root_dir    = realpath(dirname(__FILE__) . '/../../../');
    $files       = array( '/core/application/config/config.php', 
    					  '/core/application/config/database.php');

    $directories = array( '/upload',
                          '/templates',
                          '/temporary',
                          '/assets',
                          '/core');

  
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
    	</div>
    	<div class="col-md-9 content text-right">
        	<h1><?php echo lang('page_title_pre_installation_check'); ?></h1>
        
        	<p><?php echo lang('text_pre_installation_check'); ?></p>
        
        	<div class="info text-left">
      			<div style="float: right;">
                    <table border="0" width="300" cellspacing="0" cellpadding="2">
                        <tr>
                          	<th class="text-right"><?php echo lang('box_directory_permissions'); ?></th>
                          	<th align="right" width="25"></th>
                        </tr>
                        <?php
                            foreach ($directories as $directory) :
                        ?>
                        <tr>
                          	<td><?php echo $directory; ?></td>
                          	<td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (is_writable($root_dir . $directory) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <?php 
                            endforeach;
                        ?>
                    </table>
    			</div>
    			<div>
                    <table border="0" width="300" cellspacing="0" cellpadding="2">
                        <tr>
                            <th class="text-right"><?php echo lang('box_server_php_settings'); ?></th>
                            <th align="right"></th>
                            <th align="right" width="25"></th>
                        </tr>
                        <tr>
                            <td><?php echo lang('box_server_safe_mode'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('safe_mode') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('safe_mode') === 0) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_register_globals'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('register_globals') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('register_globals') === 0) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                            <td><?php echo lang('box_server_magic_quotes'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('magic_quotes') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('magic_quotes') === 0) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_file_uploads'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('file_uploads') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('file_uploads') === 1) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_session_auto_start'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('session.auto_start') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('session.auto_start') === 0) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_session_use_trans_sid'); ?></td>
                            <td align="right"><?php echo (((int)ini_get('session.use_trans_sid') === 0) ? lang('box_server_off') : lang('box_server_on')); ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (((int)ini_get('session.use_trans_sid') === 0) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        </table>
        
                        <table border="0" width="300" cellspacing="0" cellpadding="2">
                        <tr>
                            <th><?php echo lang('box_server_php_version'); ?></th>
                            <th align="right"><?php echo phpversion(); ?></th>
                            <th align="right" width="25"><img src="<?php echo base_url(); ?>assets/img/<?php echo ((phpversion() >= '5.1.6') ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></th>
                        </tr>
                    </table>
    
                    <table border="0" width="300" cellspacing="0" cellpadding="2" class="pull-left">
                        <tr>
                            <th><b class="text-right"><?php echo lang('box_server_php_extensions'); ?></b></th>
                            <th align="right" width="25"></th>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_mysql'); ?></td>
                        	<td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (extension_loaded('mysql') ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_gd'); ?></td>
                        	<td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (extension_loaded('gd') ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_curl'); ?></td>
                        	<td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (extension_loaded('curl') ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <tr>
                          	<td><?php echo lang('box_server_openssl'); ?></td>
                        	<td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (extension_loaded('openssl') ? 'ok.png' : 'warning.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                    </table>
    
                    <table border="0" width="300" cellspacing="0" cellpadding="2" class="pull-right">
                        <tr>
                          	<th class="text-right"><?php echo lang('box_file_permissions'); ?></th>
                          	<th align="right" width="25"></th>
                        </tr>
                        <?php
                            foreach ($files as $file) :
                        ?>
                        <tr>
                            <td><?php echo $file; ?></td>
                            <td align="right"><img src="<?php echo base_url(); ?>assets/img/<?php echo (is_writable($root_dir . $file) ? 'ok.png' : 'error.png'); ?>" border="0" width="16" height="16"></td>
                        </tr>
                        <?php 
                        	endforeach;
                        ?>
    	      		</table>
                    <div class="clearfix"></div>
          		</div>
          	</div>
            
            <div id="msg_alert" class="alert alert-error" style="display: none;"><?php echo lang('warning_msg_check');?></div>
            <div class="control-group">
                <div class="controls pull-right">
                	<a class="btn btn-info" href="javascript:void(0);" onclick="javascript: window.location.reload();"><i class="glyphicon glyphicon-refresh"></i> &nbsp;<?php echo lang('image_button_retry'); ?></a>
    				<a class="btn btn-info" href="javascript:void(0);" onclick="javascript: history.go(-1);"><i class="glyphicon glyphicon-remove"></i> &nbsp;<?php echo lang('image_button_cancel'); ?></a>
    				<a id="continue-button" class="btn btn-info" href="<?php echo site_url('index.php/index/index/database'); ?>"><i class="glyphicon glyphicon-ok"></i> &nbsp;<?php echo lang('image_button_continue'); ?></a>
                </div>
            </div>
    	</div>
	</div>
</div>

<script type="text/javascript">
(function($){
	var $errors = $('img[src="<?php echo base_url(); ?>assets/img/error.png"]');
	var $info = $('#msg_alert');
	var $button = $('#continue-button');

	if ($errors.size() > 0) {
		$info.fadeIn();
		$button.addClass('disabled');
	} else {
		$info.hide();
		$button.removeClass('disabled');
	}

	$button.on('click',function() {
		var $this = $(this);

		//return false to disable link click
		if ($this.hasClass('disabled')) {
			return false;
		}
	});
})(jQuery);
</script>