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
	add_javascript('jquery-ui-1.10.3.custom.min.js');
	add_javascript('bootstrap.min.js');

	
    add_javaScript_base_url();
			
	add_css('bootstrap/css/bootstrap.min.css');
	add_css('bootstrap/css/bootstrap-theme.min.css');
	add_css('index.css');
	add_css('ticker-style.css');


?>
</head>
<body>

    <div class="container ">
    	<div class="row well-sm">
			<?php echo slider();?>
        	<?php echo nav();?>

            <div class="col-md-3">
				<?php echo add_box('left');?>
            </div>
            
            <div class="col-md-6">
            	<?php echo contain()?> 
                <ul class="pagination pagination-sm dir-rtl">
                     <?php if(isset($page)){ echo $page ;}?>
                </ul>
            </div>
            <div class="col-md-3">
            	<?php echo add_box('right')?>
            </div>
            

        </div>
    </div>

</body>

</html>