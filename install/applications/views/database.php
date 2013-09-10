<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 
    $messages = array(
        'connection_test' => array('icon' => 'progress.gif', 'message' => lang('rpc_database_connection_test')),
        'database_connection_error' => array('icon' => 'failed.gif', 'message' => lang('rpc_database_connection_error')),
        'database_importing' => array('icon' => 'progress.gif', 'message' => lang('rpc_database_importing')),
        'database_imported' => array('icon' => 'success.gif', 'message' => lang('rpc_database_imported')),
        'database_import_error' => array('icon' => 'failed.gif', 'message' => lang('rpc_database_import_error')));
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
        
    	<div class="col-md-9 content text-right">
          	<h1><?php echo lang('page_title_database_server_setup'); ?></h1>
          
          	<p><?php echo lang('text_database_server_setup'); ?></p>
            
            <form name="install" id="installForm" action="<?php echo site_url('index/index/db_create'); ?>" method="post" onsubmit="prepareDB(); return false;">
            <div class="info dir-rtl">
            	<div class="col-md-6 pull-right">
            		 <div class="form-group">
                         <label class="control-label" for="DB_SERVER"><?php echo lang('param_database_server'); ?>:</label>
                         <input type="text" class="form-control" id="DB_SERVER" name="DB_SERVER" />
                         <p class="help-block"><?php echo lang('param_database_server_description'); ?></p>
                      </div> 
                      
                	 <div class="form-group">
                        <label class="control-label" for="DB_SERVER_USERNAME"><?php echo lang('param_database_username'); ?>:</label>
                        <input type="text" class="form-control" id="DB_SERVER_USERNAME" name="DB_SERVER_USERNAME" />
                         <p class="help-block"><?php echo lang('param_database_username_description'); ?></p>
                      </div> 
                      
                	 <div class="form-group">
                         <label class="control-label" for="DB_SERVER_PASSWORD"><?php echo lang('param_database_password'); ?>:</label>
                         <input type="password" class="form-control" id="DB_SERVER_PASSWORD" name="DB_SERVER_PASSWORD" />
                         <p class="help-block"><?php echo lang('param_database_password_description'); ?></p>
                      </div> 
                  </div> 
                  
                  <div class="col-md-6">               
                     <div class="form-group">
                        <label class="control-label" for="DB_DATABASE"><?php echo lang('param_database_name'); ?>:</label>
                        <input type="text" class="form-control" id="DB_DATABASE" name="DB_DATABASE" />
                        <p class="help-block"><?php echo lang('param_database_name_description'); ?></p>
                      </div> 
                      
                     <div class="form-group">
                        <label class="control-label" for="DB_DATABASE_CLASS"><?php echo lang('param_database_type'); ?>:</label>
                     
                        <select name="DB_DATABASE_CLASS" class="form-control">
                        	<option value="mysql">MySQL - MyISAM (Default)</option>
                            <option value="mysqli">MySQLi (PHP 5 / MySQL 4.1)</option>
                        </select>
                        <p class="help-block"><?php echo lang('param_database_type_description'); ?></p>
                      </div> 
                      
                     <div class="form-group">
                        <label class="control-label" for="DB_TABLE_PREFIX"><?php echo lang('param_database_prefix'); ?>:</label>
                        <input type="text" class="form-control dir-ltr" id="DB_TABLE_PREFIX" name="DB_TABLE_PREFIX" <?php if(!empty($DB_TABLE_PREFIX)){echo "value='$DB_TABLE_PREFIX'";}else{echo "value='toc_'";} ?> />
                        <p class="help-block"><?php echo lang('param_database_prefix_description'); ?></p>
                      </div>
                  </div>
                  
                  <div class="clearfix"></div>
            </div>


                
                <div class="control-group ">
                    <div class="controls pull-left">
                    	<a href="<?php echo site_url(); ?>" class="btn btn-info" href="<?php echo site_url(); ?>"><i class="glyphicon glyphicon-remove "></i> &nbsp;<?php echo lang('image_button_cancel'); ?></a>
                        <button id="continue-button" type="button" class="btn btn-info"><i class="glyphicon glyphicon-ok"></i> &nbsp;<?php echo lang('image_button_continue'); ?></button>
                    </div>
                </div>
            </form>
        </div>
	</div>
</div>
<script type="text/javascript">
    (function($){
        var $mBox = $('#mBox');
        var $mBoxContents = $('#mBoxContents');
        var tpl_message = '<p style="width:180px;"><img src="<?php echo base_url(); ?>assets/img/{info_icon}" align="right" hspace="5" vspace="5" border="0" />{info_message}</p>';
        var messages = <?php echo json_encode($messages); ?>;

        /**
		 * Display message
		 */
		function display_message(type, feedback) {
			var data = messages[type];
			var info = tpl_message.replace('{info_icon}', data.icon);

			if (feedback == undefined) {
			    info = info.replace('{info_message}', data.message);
			} else {
				feedback = data.message.replace('%s', feedback);
				info = info.replace('{info_message}', feedback);
		    }
			    
			$mBoxContents.html(info);
		}
        
        $('#continue-button').bind('click', function() {
            var $this = $(this);

            //disable continue button
            if ($this.hasClass('disabled')) {
				return;
            }

            //show message box
            $mBox.show();
            display_message('connection_test');
            
            $this.addClass('disabled');
            $.ajax({
                type: 'post',
                url: '<?php echo site_url('index.php/database/connect_db') ?>',
                data: $('input[name=DB_SERVER], input[name=DB_SERVER_USERNAME], input[name=DB_SERVER_PASSWORD], input[name=DB_DATABASE], select[name=DB_DATABASE_CLASS], input[name=DB_TABLE_PREFIX]'),
                dataType: 'json',
                success: function(result) {
                    //if false then enable and button and retry
                    if (result.success == false) {
						//enable the button
                        $this.removeClass('disabled');
                        
                        display_message('database_connection_error', result.error);
                    } 
					//if success start to import sql
                    else {
                        display_message('database_importing');
                        
                        $.ajax({
                            type: 'post',
                            url: '<?php echo site_url('index.php/database/import_sql') ?>',
                            data: $('input[name=DB_SERVER], input[name=DB_SERVER_USERNAME], input[name=DB_SERVER_PASSWORD], input[name=DB_DATABASE], select[name=DB_DATABASE_CLASS], input[name=DB_TABLE_PREFIX]'),
                            dataType: 'json',
                            error: function() {
                                $this.removeClass('disabled');
                            },
                            success: function(result) {
                                $this.removeClass('disabled');
                              
                                if (result.success == false) {
                                    display_message('database_connection_error', result.error);
                                } else {
                                    display_message('database_imported');

                                    setTimeout(function() {
                                        window.location = '<?php echo site_url('index.php/index/index/setting'); ?>';
                                    }, 3000);
                                }
                            }
                        });
                    }
                }
            });
        });
    })($);
</script>