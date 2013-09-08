<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>اعتبار سنجی</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link href="../../../../../assets/admin/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/bootstrap.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/bootstrap-responsive.css')?>" rel="stylesheet" type="text/css">
    <link href="<?php echo site_url('assets/admin/css/master.css')?>" rel="stylesheet" type="text/css">
    <style type="text/css">
      body {
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
      }

    </style>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="../assets/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>
		<div >
        <center>
        <?php echo form_open('validate_code');?>
        	<div class="row well-small"><span class="label label-warning">کد ارسال شده را وارد کنید</span></div>
            
       		<div class="row"><input type="text" class="text-center" name="validate_code"></div>
            <div class="row"><input class="btn btn-warning" type="submit" value="ارسال" ></div>
        <?php echo form_close();?>
        </center>
        </div>
  </body>
</html>
