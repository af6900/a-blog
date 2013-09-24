<!DOCTYPE html>
<html>
<head>	
	<title>مدیریت سایت</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?php assets("bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php assets("bootstrap/css/bootstrap-theme.min.css")?>">
	<link rel="stylesheet" type="text/css" href="<?php assets("css/master.css")?>" /> 
    <link rel="stylesheet" type="text/css" href="<?php assets("css/jquery-ui-1.10.1.custom.min.css")?>" />
    <link href="<?php assets("editor/redactor/redactor.css")?>" type="text/css" rel="stylesheet" /> 
    <script src="<?php assets("js/jquery-1.8.2.js")?>"></script>
    <script src="<?php assets("js/jquery-ui-1.9.0.custom.js")?>"></script>
    <script src="<?php assets('js/jquery.ui.datepicker-cc.all.min.js')?>" language="javascript" type="text/javascript"></script>		
	<script src="<?php assets("bootstrap/js/bootstrap.min.js")?>" language="javascript" type="text/javascript"></script>
	<script src="<?php assets("editor/redactor/redactor.js")?>" language="javascript" type="text/javascript" ></script>
    <script src="<?php assets('editor/redactor/fa.js');?>"></script>
    <script src="<?php assets('js/menu.js')?>" language="javascript" type="text/javascript"></script>
    <script language="javascript">
    $(document).ready(function(e) {
      
                $('.redactor_content').redactor({
					imageUpload: '<?php assets('editor/scripts/image_upload.php');?>',
                    lang: 'fa',
                    direction:'rtl',
                    autoresize: true
                });
    });
    var base_url="<?php echo site_url()?>";
    </script>
<script src="<?php assets('js/admin.js');?>" language="javascript" type="text/javascript"></script>
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->		

</head>
<body>

<?php $this->load->view('panel/topMenu');?>


