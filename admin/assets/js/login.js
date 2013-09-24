// JavaScript Document
$(document).ready(function(e) {
    $('#pwreset').click(function(){
		$('.pwreset').slideToggle('slow','easeOutBounce');
	});
	
	
	 $('#reset').click(function(){
		 var email = $('.email').val();
		 $.ajax({
			   type:'GET',
			 	url:base_url+"admin/login/passReset",
				data:{'email' : email},
				dataType:"json",
				 success: function(data){
					 if(data == true){
			         $('.msg').slideToggle('slow','easeOutBounce').html('رمز جدید برای شما ارسال شد.').delay(3000).slideToggle('hide','easeOutBounce');
						 } else {
							 
					 $('.msg').slideToggle('slow','easeOutBounce').html('ایمیل شما نا معتبر است .').delay(3000).slideToggle('hide','easeOutBounce'); 
							 
							 }

					 }
			 });
		 });
	
	
		
});