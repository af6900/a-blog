// JavaScript Document
$(document).ready(function() {
$('.BtnAnswer').click(function(){
	var idAnswer = $('.radio:checked').val();
	if(idAnswer == undefined){
		alert('یکی از گزینه ها را انتخاب کنید');
		exit();
		}
	var polls_id = $('#polls_id').val();
	var user_ip = $('#user_ip').val();	
	$.ajax({
		type:'GET',
		url:base_url+"ajax/save_answer",
		data:{'idAnswer' : idAnswer ,'user_votes' : polls_id,'userIp' : user_ip},
		success: function(data){
			$('.poll_votes').fadeOut(500,function(){
				$('.poll_result').fadeIn(500);
				})
			},error:function(a,b,c){
				alert(c);
				}
		});
	})	

});