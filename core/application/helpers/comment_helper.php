<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function comment($date,$id,$ShowComment)
{
	
	if($ShowComment == 1){
		?>
        <script language="javascript" type="text/javascript">
$(document).ready(function(e) {

	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}
		mycaptcha();
		
		function mycaptcha(){
			$.ajax({
				type:'GET',
					url:base_url+"ajax/captcha",
					success: function(data){
						$('.LIcaptcha').html(data);
						}
				});
				
			}	
		$('.refresh').click(function(){
			mycaptcha();
			})	
		$('.commentSend').click(function(){
			var dat	  = $('.dat').val();
			var articleId = $('.articleId').val();
			var name = $('.UserName').val();
			if(name == ''){
				$('.NameError').html('نام خود را وارد کنید');
				exit();
				}else{
					$('.NameError').html('');
					}
				
			var email = $('.email').val();
			if(email == ''){
				$('.EmailError').html('ایمیل خود را وارد کنید');
				exit();
				}else{
					$('.EmailError').html('');
					}
			
				var is = IsEmail($('.email').val());
				if(is == false){
					$('.EmailError').html('ایمیل شما نامعتبر است');
					exit();
					}else{
						$('.EmailError').html('');
						}
				
					
			var text = $('.text').val();
			if(text == ''){
				$('.TextError').html('متن پیام را وارد کنید');
				exit();
				}else{
					$('.TextError').html('');
					}
			var captcha = $('.captcha').val();
			 if(captcha == ''){
				$('.CaptchaError').html('کد امنیتی را وارد کنید');
				exit();
				}else{
					$('.CaptchaError').html('');
					}
				
			var author = $('.author').attr('author');

			var captcha = $('.captcha').val();	
			$.ajax({
				type:'GET',
					url:base_url+"ajax/validation_captcha",
						data:{'captcha' : captcha},
							success: function(data){
								if(data == 1){
									$.ajax({
										type:'GET',
											url:base_url+"ajax/comment",
												data:{'date' : dat,
													 'articleId' : articleId,
													  'name' : name, 'email' : email, 'text' : text, 'author' : author},
												success: function(data){
													if(data == 1){
														$('.UserName').val('');
														$('.email').val('');
														$('.text').val('');
														$('.captcha').val('');
														$('.msg').fadeIn(500).delay(5000).fadeOut(500);
														mycaptcha();
														}
													}
										});
									
									}else{
										$('.CaptchaError').html('کد امنیتی را اشتباه وارد کردید.');
										}
								}
				});
			});



//---------------------------------------------------
    });
        </script>
        <?php
		
	 $tag = "<div class='panel panel-default text-right'>
	 			<div class='panel-heading'>
					<h3 class='panel-title'>ثبت نظر</h3>
				</div>
				<div class='panel-body'>
					<div class='alert alert-success msg' style='display:none'>
						<h4>با تشکر از شما ، تظرتان با موفقیت ثبت شد، بعداز تائید نشان داده خواهد شد</h4>
					</div>
					<input type='hidden' value='".$date."' class='dat'>
         			<input type='hidden' value='".$id."' class='articleId'>
	
					<div class='col-md-6'>				
					  <div class='form-group'>
						<input type='email' class='email form-control text-right' id='exampleInputEmail' tabindex='2' placeholder='".lang('contact_Send_Email_email')."'>
						<p class='help-block EmailError'></p>
					  </div>
					</div>
					
					<div class='col-md-6'>
					  <div class='form-group'>
						<input type='text' class='UserName form-control text-right' id='name' tabindex='1' placeholder='".lang('contact_Send_Email_name')."'>
						<p class='help-block NameError'></p>
					  </div>	
					</div>	
									
					<div class='form-group clearfix'>
						<textarea class='text form-control text-right' tabindex='3' placeholder='".lang('contact_Send_Email_text')."'> </textarea>
						<p class='help-block TextError'></p>
				   </div>
				   
				   <div class='col-md-4 pull-right'>
					   <div class='form-group clearfix'>
							<div  style= 'margin-bottom:10px !important;'>
								<span class='glyphicon glyphicon-refresh refresh' style='cursor:pointer'></span>
								<span class='LIcaptcha'></span> 
						    </div> 
				     <input type='text' class='captcha form-control text-right' id='captcha' placeholder='".lang('contact_Send_Email_Captcha')."'>
							<p class='help-block CaptchaError'></p>
					   </div>
					</div>
					
				</div>
				<div class='panel-footer text-left'>
					<button type='button' class='commentSend btn btn-primary'>".lang('contact_Send_Email_btn')."</button>
				</div>
			 </div>	";	  		
		
		echo stripslashes($tag);
	 }
	 

}
