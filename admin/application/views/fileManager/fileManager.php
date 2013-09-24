<link  href="<?php echo site_url('assets/elfinder/css/elfinder.min.css')?>" rel="stylesheet" type="text/css">
<link  href="<?php echo site_url('assets/elfinder/css/theme.css')?>" rel="stylesheet" type="text/css">


<script src="<?php echo site_url('assets/elfinder/js/jquery-1.7.2.js')?>"></script>


<script src="<?php echo site_url('assets/elfinder/js/elfinder.min.js')?>"></script>
<script src="<?php echo site_url('assets/elfinder/js/elfinder.fa.js')?>"></script>
<script type="text/javascript" charset="utf-8">
	$().ready(function() {
		var elf = $('#elfinder').elfinder({
			url : '<?php echo site_url('assets/elfinder/connector.php') ?>',
			lang: 'ar',             
		}).elfinder('instance');
	});
</script>
<script src="<?php echo site_url('assets/elfinder/js/jquery-ui-1.8.21.custom.min.js')?>"></script>
<style>
.elfinder-toolbar{
	background:#EAEAEA !important
	
	}
.elfinder-statusbar{
	background:#EAEAEA !important
	}
.elfinder-path{
	margin-left:5px !important;
	float:left !important;
	}
.elfinder-stat-size{
	margin-right:10px;
	float:right !important;
	}			
.elfinder-button{
	width:25px !important;
	height:25px !important;
	}
.elfinder-button-search{
	width:160px !important;
	left:10px !important;
	}		
</style>
<div class="container dir-rtl">
	<div class="row">
    		
            <div class="panel panel-default">
    
                <div class="panel-body">
               		<div id="elfinder"></div>
                </div>
            </div>
	</div>
</div>