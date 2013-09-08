// JavaScript Document
$(document).ready(function() {
 	var count=2;
	$('.insert').click(function(){
		count ++;
		$('.answer').append('<tr><td align="center" >'+count+'</td><td><input type="text" id="'+count+'" class="pull-right form-control"/></td></tr>');
	})
	
$('.save').click(function(){
	var question = $('#question').val();
	if (question ==''){
		alert('گزینه های سوال را پر کنید');
		exit();
		}	
	var answer = new Array();

	var status = $('.radio:checked').attr('id');
	for (var i=1;i<=count;i++)
	{
		answer[i]=$('#'+i).val();      
	}
	if (answer ==''){
		alert('گزینه های پاسخ را پر کنید');
		exit();
		}
	$.ajax({
		type:'GET',
			url:base_url+"ajax/new_polls",
				data:{'question' : question, 'answer' : answer, 'status' : status},
				success: function(data){
					window.location=base_url+'poll';
					},error:function(a,b,c){
						alert(c);
						}
		});
	}) 

$('.GetAnswer').click(function(){
	var id = $(this).attr('idAnswer');
	$.ajax({
			type:'GET',
			url:base_url+"ajax/get_answer",
			data:{'id' : id},
			success: function(data){
					$('#'+id).append(data);
					answer = true;
			},error: function(a,b,c){
					alert(c);
			}
		});
	});
$('.DelAnswer').click(function(){
	var id = $(this).attr('delAnswer');
	$.ajax({
		type:'GET',
		url:base_url+"ajax/delete_polls",
		data:{'id' : id},
		success: function(data){
			$('#'+id).fadeOut();
			}
		});
	});
	
$('.BtnAnswer').click(function(){
	alert('as');
	})	
	
	
});