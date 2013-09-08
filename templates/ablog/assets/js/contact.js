// JavaScript Document

$(document).ready(function(e) {

	function IsEmail(email) {
	  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	  return regex.test(email);
	}

		$.ajax({
			type:'GET',
				url:base_url+"ajax/captcha",
				success: function(data){
					$('.LIcaptcha').html(data);
					}
			});
			
			
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
													  'name' : name, 'email' : email, 'text' : text},
												success: function(data){
													if(data == 1){
														$('.UserName').val('');
														$('.email').val('');
														$('.text').val('');
														$('.captcha').val('');
														$('.msg').fadeIn(500).delay(5000).fadeOut(500);
														$.ajax({
															type:'GET',
																url:base_url+"ajax/captcha",
																success: function(data){
																	$('.LIcaptcha').html(data);
																	}
															});
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