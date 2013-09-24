<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

function form($option){
	if($option == 3)
	{
	?>
    <script language="javascript">
    $(document).ready(function(e) {
		captchas();
		
		$('.crefresh').click(function(){
			captchas();
			})
		function captchas(){
			$.ajax({type:'GET',url:base_url+"ajax/captcha",success: function(data){$('.LIcaptcha').html(data);}});
		}
		
       	function IsEmail(email) {
		  var regex = /^([a-zA-Z0-9_\.\-\+])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		  return regex.test(email);
		} 
		
		$('.send').click(function(){
			var name = $('.userName').val()
			if( name == ''){ $('.name').html('نام خود را وارد کنید')}else{$('.name').html('')}
			
			var email = $('.userEmail').val()
			if( email == ''){ $('.email').html('ایمیل خود را وارد کنید')}else{$('.email').html('')}

			var is = IsEmail($('.userEmail').val());
			if(is == false){$('.email').html('ایمیل شما نامعتبر است');exit();}else{ $('.email').html('');}
	

			var subject = $('.userSubject').val()
			if( subject == ''){ $('.subject').html('موضوع تماس خود را وارد کنید')}else{$('.subject').html('')}

			var message = $('.userMessage').val()
			if( message == ''){ $('.message').html('موضوع تماس خود را وارد کنید')}else{$('.message').html('')}
			
			var captcha = $('.userCaptcha').val();
			$.ajax({
				type:'GET',
					url:base_url+"ajax/validation_captcha",
						data:{'captcha' : captcha},
							success: function(data){
								if(data == '1'){
									$.ajax({
										type:'GET',
											url:base_url+"ajax/contact",
												data:{'name' : name, 'email' : email, 'subject' : subject , 'message' : message, 'captcha' : captcha},
												success: function(data){
													if(data == 'OK'){
														$('.userName').val('');
														$('.userEmail').val('');
														$('.userSubject').val('');
														$('.userCaptcha').val('');
														$('.userMessage').val('');
														$('.msg').fadeIn(500).delay(5000).fadeOut(500);
														captchas();
														}
													}
										});
									
									
									}else{
										captchas();
										$('.captcha').val('کد امنیتی وارد شده اشتباه است.');
										}
								}
			})
			})/* end function send*/
		
    });
    </script>
    <div class="panel panel-default dir-rtl">
    	<div class="panel-heading BYekan">
        	<?php echo lang('form_contact_title');?>
        </div>
        <div class="panel-body">
                <div class="alert alert-success BYekan msg hidden">
                	با تشکر از شما ، پیام تان برای مدیر ارسال شد .	
                </div>
        	  <div class="form-group">
                <label for="name"><?php echo lang('contact_Send_Email_name')?></label>
                <input type="text" class="form-control userName" id="name">
                <p class="help-block text-danger name"></p>
              </div>
             <div class="form-group">
                <label for="email"><?php echo lang('contact_Send_Email_email')?></label>
                <input type="email" class="form-control userEmail" id="email">
                <p class="help-block text-danger email"></p>
              </div>
              <div class="form-group">
                <label for="subject"><?php echo lang('contact_Send_Email_subject')?></label>
                <input type="txet" class="form-control userSubject" id="subject" >
                <p class="help-block text-danger subject"></p>
              </div>
              <div class="form-group">
                <label for="text"><?php echo lang('contact_Send_Email_text')?></label>
                <textarea class="form-control userMessage"></textarea>
                <p class="help-block text-danger message"></p>
              </div>
              
              <div class="col-lg-4">
                  <div class="form-group">
                    <span class="glyphicon glyphicon-refresh pull-left crefresh" style="cursor:pointer"></span>
                    <div class="LIcaptcha" style="margin-bottom:10px;"></div>
                    <input type="number" class="form-control userCaptcha" id="captcha" placeholder="<?php echo lang('contact_Send_Email_Captcha')?>">
                    <p class="help-block text-danger captcha"></p>
                  </div>
              </div>
        </div>
        <div class="panel-footer text-left">
        	<button class="btn btn-primary send"><?php echo lang('contact_Send_Email_btn')?></button>
        </div>
    </div>
    
    <?php	
	}
	
	
 
}