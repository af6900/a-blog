// JavaScript Document
$(document).ready(function(e) {
        //$( "input[type=submit],input[type=button]" ).button()
	$( "#tabs" ).tabs();

	$('.datepicker').datepicker({});
		
	
	$( ".success" ).fadeIn(1000).delay(5000).fadeOut(3000);
	
	$('#myTab a').click(function (e) {
		e.preventDefault()
		$(this).tab('show')
	  })
});
//function check(input){
//	
//    if(input.validity.typeMismatch){  
//        input.setCustomValidity(" ایمیل وارد شده معتبر نمی باشد.'" + input.value + "'");  
//    }  
//    else {  
//        input.setCustomValidity();  
//    }
//
//}

