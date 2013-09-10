<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="images/tomatocart.ico" type="image/x-icon" />
    <title>ablog سیستم مدیریت محتوای</title>
    <meta name="robots" content="noindex,nofollow">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo site_url('assets/css/stylesheet.css');?>">
    <script src="<?php echo site_url('assets/js/jquery-1.8.2.min.js')?>" type="text/javascript"></script>
</head>
<body>

<div id="header" class="text-right">
    <div class="container">
    	<div class="row">
        	<div class="col-md-4 text-left">
    			<a href="index.php"><img src="<?php echo site_url('assets/img/logo.png'); ?>" border="0" title="TomatoCart, Open Source Shopping Cart Solutions" style="margin: 10px 10px 0px 10px;" /></a>
        	</div>
        	<div class="col-md-8">
            	<div class="row clearfix">
                    <ul class="languages pull-right">
                        <li><b><?php echo lang('title_language'); ?></b></li>
                        <?php
                            foreach (get_languages() as $language) :
							
                        ?>
                        <li><?php echo '<a href="index.php?language=' . $language['code'] . '">
						<img src="' . get_language_flag($language['code']) . '" title="' . $language['title'] . '" alt="' . $language['title'] . '" />
						</a>'; ?></li>
                        <?php
                            endforeach;
                        ?>
                    </ul>
            	</div>
        		<div class="links pull-right">
                	<a href="http://www.a-blog.ir" target="_blank"><?php echo lang('head_tomatocart_support_title'); ?></a>
            	</div>
        	</div>
        </div>
    </div>
</div>