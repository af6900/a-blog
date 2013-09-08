<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="keywords" content="<?php get_keywords();?>">
<meta name="description" content="<?php get_description();?>">
<title><?php get_web_title();?></title>
<?php 
	add_javascript('jquery-1.8.2.js');
	add_javascript('jquery-ui-1.9.0.custom.js');
	add_javascript('jquery.ui.datepicker-cc.all.min.js');
	add_javascript('index.js');
	
	add_javascript('polls.js');			
	add_css('style.css');
	add_javaScript_base_url();
//	shortcut_icon('favicon.ico');
//	apple_touch_icon('apple-touch-icon.png');
//	apple_touch_icon('apple-touch-icon-72x72.png');
//	apple_touch_icon('apple-touch-icon-114x114.png');	
?>

</head>
<body>

    <div class="header">
    		<div class="menu">
            	<?php echo add_box('top'); ?>
			
            </div> 
            <?php echo status(); ?>
            <?php echo form_open('search');?>
            <input name="search" type="text" class="search" placeholder="جستجو در وبلاگ"/>
            <input value="جستجو" type="submit" class="button" />
            <?php echo form_close();?>
    </div>
  <div class="container">
		<div class="contain">
