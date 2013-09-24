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
	add_javascript('bgstretcher.js');
	
    add_javaScript_base_url();
			
	add_css('bootstrap/css/bootstrap.min.css');
	add_css('bootstrap/css/bootstrap-theme.min.css');
	add_css('index.css');
	add_css('ticker-style.css');
	add_css('bgstretcher.css');

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
<script type="text/javascript">
	$(document).ready(function(){
	  
		$('body').bgStretcher({
			images: ['<?php echo site_url('templates/ablog/images/sample-1.jpg')?>', 
					'<?php echo site_url('templates/ablog/images/sample-2.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-3.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-4.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-5.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-6.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-7.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-8.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-9.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-10.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-11.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-12.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-13.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-14.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-15.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-16.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-17.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-18.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-19.jpg')?>',
					'<?php echo site_url('templates/ablog/images/sample-20.jpg')?>'],
			imageWidth: 1024, 
			imageHeight: 768, 
			slideDirection: 'N',
			slideShowSpeed: 1000,
			transitionEffect: 'fade',
			sequenceMode: 'normal',
			buttonPrev: '#prev',
			buttonNext: '#next',
			pagination: '#nav',
			anchoring: 'left center',
			anchoringImg: 'left center'
		});
		
	});
</script>
</html>