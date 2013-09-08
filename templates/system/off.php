<!DOCTYPE html>
<html lang="fa">
<head>
	<meta charset="utf-8">
	<title><?php get_web_title();?></title>
	<meta name="description" content="<?php echo $OffDescription?>">
	<meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<style>
body{background: #EEEEEE;font-family:Tahoma;font-size:9pt;color:Black;padding:0px;margin:10px;text-shadow:1px 1px 0px White; direction:rtl;}
a{text-decoration:none;color:Black}
a:hover{color:Blue}
h2{font-size:10pt;padding:0px;margin:0px 0px 8px 0px}
#content{background:#FFD7D7;border:#FF4F4F 1px solid;padding:10px;margin: 0px 0px 8px 0px;border-radius:5px;-moz-border-radius:5px;-webkit-border-radius:5px}

</style>

<?php
	shortcut_icon('system','favicon.ico');
	apple_touch_icon('system','apple-touch-icon.png');
	apple_touch_icon('system','apple-touch-icon-72x72.png');
	apple_touch_icon('system','apple-touch-icon-114x114.png');
?>
</head>
<body>

<div id="content">
<h2><img src="<?php assets('img/slash-button.png')?>" /> سایت غیرفعال است</h2>
 <span><?php echo $OffDescription?></span>
</div>
     
</body>
</html>