<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo $title; ?></title>
<link href="<?php echo base_url();?>assets/site/style/email.css" rel="stylesheet" type="text/css"/>
</head>

<body>
<?php echo form_open('email/validation');?>
<?php echo form_hidden('id',$id);?>
<table width="600" border="0" align="center" dir="rtl" >
  <tr>
    <td colspan="2" align="center">فرستادن به دوستان</td>
  </tr>
  <tr>
    <td valign="top"><?php echo form_input('to',set_value('to'),'placeholder="ایمیل گیرنده"')?>
    	<label style="color:#F00"><?php echo form_error('to'); ?></label>
    </td>
    <td valign="top" ><?php echo form_input('subject',set_value('subject'),'placeholder="عنوان"')?>
    	<label style="color:#F00"><?php echo form_error('subject'); ?></label>
     </td>
  </tr>
  <tr>
    <td valign="top" ><?php echo form_input('yourEmail',set_value('yourEmail'),'placeholder="ایمیل شما"')?>
    	<label style="color:#F00"><?php echo form_error('yourEmail'); ?></label>
    </td>
    <td valign="top" ><?php echo form_input('yourName',set_value('yourName'),'placeholder="نام شما"')?>
    	<label style="color:#F00"><?php echo form_error('yourName'); ?></label>
   </td>
  </tr>
  <tr>
    <td colspan="2" class="article"><?php echo $summary . $fulltext;?></td>
  </tr>
  <tr>
    <td colspan="2"><input type="submit" value="ارسال"/></td>
  </tr>
</table>
<?php echo form_close();?>

</body>
</html>
