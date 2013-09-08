<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>ورود به مدیریت</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Le styles -->
    <link rel="stylesheet" type="text/css" href="<?php assets("bootstrap/css/bootstrap.min.css")?>">
    <link rel="stylesheet" type="text/css" href="<?php assets("bootstrap/css/bootstrap-theme.min.css")?>">
    <link href="<?php  assets('css/login.css')?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../../../../assets/admin/bootstrap/css/bootstrap-theme.min.css">
    <script src="<?php assets('js/jquery-1.8.2.js')?>"></script>
    <script src="<?php assets('js/jquery.easing.1.3.js')?>"></script>
    <script src="<?php assets('js/login.js')?>"></script>
    <script type="text/javascript" language="javascript">
   	 var base_url="<?php echo site_url()?>";
$(document).ready(function(e){$('#enter').click(function(){var name = $('.name').val();var pass=$('.pass').val();if(name==''){$('.msg').fadeIn(500,'easeOutBounce').html('<p>نام کاربری خود را وارد کنید.</p>').delay(3000).fadeOut(500,'easeOutBounce');exit()}if(pass==''){$('.msg').fadeIn(500,'easeOutBounce').html('<p>رمز عبور خود را وارد کنید.</p>').delay(3000).fadeOut(500,'easeOutBounce');exit()}if(name!=''&& pass!=''){$('#enter').html('<img src="<?php echo site_url('assets/admin/img/loader.gif')?>" > درحال ارسال');$.ajax({type:'GET',url:base_url+"validate_credentials",data:{'name':name,'pass':pass},dataType:"json",success:function(data){if(data=='login'){$('.msg').fadeIn(500,'easeOutBounce').html('نام کاربری یا رمز عبور اشتباه است.').delay(2000).fadeOut(500,'easeOutBounce',function(){$('#enter').html('ورود');});
exit()}else if(data == 'admin'){$('.msg').fadeIn(500,'easeOutBounce').delay(2000).fadeOut(500,'easeOutBounce',function(){window.location=base_url+data}).html('خوش آمدید.')}else{$('.msg').fadeIn('slow','easeOutBounce').delay(2000).fadeOut('hide','easeOutBounce',function(){window.location=base_url+data;}).html('مرحله دوم ورود.')}}})}})}) 
								
    </script>
    </head>

    <body>
    <noscript><div class="alert alert-danger">جاوا اسکریپت مرورگر شما غیر فعال است.</div></noscript> 
  		<div class="container">
        	<div class="row">
            	<div class="col-lg-4 col-md-offset-4">
                	<div class="panel panel-default">
                   		<div class="panel-heading text-center">
                        	<img src="<?php echo site_url('assets/admin/img/ablog-logo.png')?>" width="165" height="50">
                        </div>
                        <div class="panel-body">
                        <div class="msg text-center alert alert-info"></div>
                        	<div class="form-group">
                            	<div class="input-group">
                                  <input type="text" class="form-control name text-right" name ="name" placeholder="نام کاربری را وارد کنید">
                                  <span class="input-group-addon glyphicon glyphicon-user"></span>
                                </div>
                            </div>
                        	<div class="form-group">
                            	<div class="input-group">
                                  <input type="password" class="form-control pass text-right" name ="password" placeholder="رمز عبور را وارد کنید">
                                  <span class="input-group-addon glyphicon glyphicon-lock"></span>
                                </div>
                            </div>
                        	<div class="form-group">
                                <button class="btn btn-warning" id="enter" type="button">ورود</button>
                                <a href="javascript:void=null" id='pwreset' class="text-info pull-right">فراموشی رمز عبور</a> 
                            </div>
                        </div>
                        <div class="panel-footer pwreset">
                          	<div class="form-group">
                            	<div class="input-group">
                                  <input type="text" class="form-control email text-right" name ="email" placeholder="ایمل خود را وارد کنید">
                                  <span class="input-group-addon glyphicon glyphicon-envelope"></span>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-warning" id="reset" type="button">ارسال</button>
                            </div>
                        </div>
                        
                        <div class="panel-footer text-center">
                        	 <p class="text-center">Copyright © <?php echo date('Y');?> <strong>aBlog v:1.0.0 </strong></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
  
  
  
	</body>
</html>
